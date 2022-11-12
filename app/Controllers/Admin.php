<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\GroupsUsersModel;
use App\Models\RoleUpdateModel;
use Myth\Auth\Entities\User;
use Myth\Auth\Password;

class Admin extends BaseController
{
    // Users Model
    protected $usersModel;
    protected $roleModel;
    protected $config;
    protected $RoleUpdateModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->roleModel = new GroupsUsersModel();
        $this->RoleUpdateModel = new RoleUpdateModel();
        $this->config = config('Auth');
    }

    // User list
    public function index()
    {
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $data = [
            'title' => 'Account Validation',
            'users' => $this->usersModel->getUsers(),
        ];
        // dd($data['users']);
        return view('admin/index', $data);
    }

    // Detail page
    public function detail($users_id = 0)
    // public function detail($username)
    {
        $query = $this->usersModel->getDetail($users_id);
        // $query = $this->usersModel->getDetail($username);

        $data = [
            'title' => 'User Detail',
            'user' => $query[0],
            'validation' => \Config\Services::validation()
            // [0] pengganti first()
        ];
        // dd($data['user']);

        if (empty($data['user'])) {
            // return redirect()->to('/admin');
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User with id "' . $users_id . '" not found');
            // throw new \CodeIgniter\Exceptions\PageNotFoundException('User with id "' . $username . '" not found');
        }
        return view('admin/detail', $data);
    }

    // Create User
    public function create()
    {
        $data = [
            'title' => 'Form Create User'
        ];

        return view('admin/create', $data);
    }

    // Register User
    public function register()
    {
        // Check if registration is allowed
        if (!$this->config->allowRegistration) {
            return redirect()->back()->withInput()->with('error', lang('Auth.registerDisabled'));
        }

        $users = model(UserModel::class);

        // Validate basics first since some password rules rely on these fields
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            session()->setFlashdata('register', '<strong>WELL DONE!</strong> You have successfully created user. <br>Please confirm the account by clicking the activation link in the email we have sent.');
            return redirect()->to('admin');
        }

        // Success!
        session()->setFlashdata('register', '<strong>WELL DONE!</strong> You have successfully created user.');
        return redirect()->to('admin');
    }

    // Delete user
    public function delete($users_id)
    {
        // Search user image based on id
        $users = $this->usersModel->find($users_id);

        // Check if user image default, dont detele it
        if ($users['user_image'] != 'profile_av.jpg') {
            // delete user image, when the user remove from database
            unlink('assets/images/user_image/' . $users['user_image']);
        }

        $this->usersModel->delete($users_id);
        session()->setFlashdata('delete', '<strong>WELL DONE!</strong> You have successfully deleted user.');
        return redirect()->to('admin');
    }

    // Update data user
    public function update($users_id)
    {
        // dd($this->request->getPost());

        // Search user image based on id
        $users = $this->usersModel->find($users_id);

        // Check the username
        $old_username = $this->usersModel->getDetail($users_id)[0]['username'];
        // dd($old_username);

        if ($old_username == $this->request->getPost('username')) {
            $rule_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]';
        } else {
            $rule_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }

        // Validation
        if (!$this->validate([
            // key -> take the name from input
            'username' => [
                'rules' => $rule_username
            ],
            'user_image' => [
                // no space between parameters
                'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'The max size of the file is 1 MB',
                    'is_image' => 'You did not choose an image',
                    'mime_in' =>  'Please choose an image'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('admin/' . $this->request->getPost('username'))->withInput()->with('validation', $validation);
            return redirect()->to('admin/' . $users_id)->withInput();
        }

        // Take the user image
        $user_image = $this->request->getFile('user_image');

        // Check, is there file to upload. 4 means no file.
        if ($user_image->getError() == 4) {
            // $user_image_name = 'profile_av.jpg';
            $user_image_name = $this->request->getPost('old_user_image');
        } else {
            // Get the name of user image
            // $fileUserImage_name = $fileUserImage->getName();
            $user_image_name = substr($user_image->getRandomName(), 18);

            // Replace the user image file to folder public
            // $fileUserImage->move('assets/images/user_image');

            $user_image->move('assets/images/user_image', $user_image_name);

            // Check if user image default, dont detele it
            if ($users['user_image'] != 'profile_av.jpg') {
                // delete user image, when the user remove from database
                unlink('assets/images/user_image/' . $this->request->getPost('old_user_image'));
            }
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'user_image' => $user_image_name
        ];

        $this->usersModel->update($users_id, $data);
        session()->setFlashdata('update_profile', '<strong>WELL DONE!</strong> You have successfully updated user data.');
        // return redirect()->to('admin/' . $this->request->getPost('username'));
        return redirect()->to('admin/' . $users_id);
    }

    // Update password
    public function update_password($users_id)
    {
        // Validation
        if (!$this->validate([
            // key -> take the name from input
            'new_password' => 'required|strong_password',
            'repeat_password' => 'required|matches[new_password]',
        ])) {
            return redirect()->to('admin/' . $users_id)->withInput();
        }

        $new_password = $this->request->getPost('new_password');

        // new password
        $data = ['password_hash' => Password::hash($new_password)];
        // Save new password to database
        $this->usersModel->update($users_id, $data);
        session()->setFlashdata('update_password', '<strong>WELL DONE!</strong> You have successfully updated user password.');
        return redirect()->to('admin/' . $users_id);
    }

    // role update  user
    public function role_update($users_id)
    {
        // $roleModel = new \App\Models\RoleModel();

        $data = $this->request->getPost();
        // dd($data);

        $this->roleModel->update($users_id, $data);
        session()->setFlashdata('role_update', '<strong>WELL DONE!</strong> You have successfully updated user role.');
        // return redirect()->to('admin/' . $this->request->getPost('username'));
        return redirect()->to('admin/' . $users_id);
    }

    // Validation user --> Accept
    public function validation($users_id)
    {
        // dd($this->request->getPost('active') == 0);

        $data = $this->request->getPost();

        if ($this->request->getPost('group_id') == 3) {
            $this->roleModel->update($users_id, $data);
            session()->setFlashdata('accept', '<strong>WELL DONE!</strong> You have validated the user.');
            return redirect()->to('admin/index');
        } elseif ($this->request->getPost('active') == 0) {
            $this->usersModel->update($users_id, $data);
            session()->setFlashdata('reject', '<strong>WELL DONE!</strong> You have rejected the user.');
            return redirect()->to('admin/index');
        }
    }

    // role update user by request (view)
    public function role_update_validation()
    {
        $data = [
            'title' => 'Role Update Validation',
            'users' => $this->RoleUpdateModel->getRole(),
        ];

        // dd($data);
        return view('admin/role_update', $data);
    }

    // Validation role update--> Accept
    public function validation_role($users_id)
    {
        $data = $this->request->getPost();
        // dd($data);

        if ($this->request->getPost('group_id') == 1 | $this->request->getPost('group_id') == 2) {
            $this->roleModel->update($users_id, $data);
            session()->setFlashdata('accept', '<strong>WELL DONE!</strong> You validated request role update.');
            return redirect()->to('admin/role_update_validation');
        } elseif ($this->request->getPost('req_active') == 0) {
            $this->RoleUpdateModel->update($users_id, $data);
            session()->setFlashdata('reject', '<strong>WELL DONE!</strong> Rejected request role update.');
            return redirect()->to('admin/role_update_validation');
        }
    }
}
