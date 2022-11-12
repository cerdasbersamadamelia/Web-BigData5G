<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\RoleUpdateModel;
use Myth\Auth\Password;

class Profile extends BaseController
{
    protected $RoleUpdateModel;
    protected $usersModel;

    public function __construct()
    {
        $this->RoleUpdateModel = new RoleUpdateModel();
        $this->usersModel = new UsersModel();
    }

    // index
    public function index()
    {
        $data = [
            'title' => 'My Profile',
            'validation' => \Config\Services::validation()
        ];
        return view('profile/index', $data);
    }

    // update profile
    public function update($users_id)
    {
        // Search user image based on id
        $users = $this->usersModel->find($users_id);

        // Check the username
        $old_username = $this->usersModel->getDetail($users_id)[0]['username'];

        if ($old_username == $this->request->getPost('username')) {
            $rule_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]';
        } else {
            $rule_username = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }

        // Validation
        if (!$this->validate([
            'username' => [
                'rules' => $rule_username
            ],
            'user_image' => [
                // no space between parameters
                'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Your file is too large',
                    'is_image' => 'You are not choose image',
                    'mime_in' =>  'You are not choose image'
                ]
            ],
        ])) {
            return redirect()->to('profile/index')->withInput();
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
        session()->setFlashdata('update_profile', '<strong>WELL DONE!</strong> You successfully updated profile.');
        return redirect()->to('profile/index');
    }

    // Update password
    public function update_password($users_id)
    {
        // Search user password based on id
        $user_password = $this->usersModel->find($users_id)['password_hash'];

        // Validation
        if (!$this->validate([
            // key -> take the name from input
            'current_password' => 'required',
            'new_password' => 'required|strong_password',
            'repeat_password' => 'required|matches[new_password]',
        ])) {
            return redirect()->to('profile/index')->withInput();
        }

        $current_password = $this->request->getPost('current_password');
        $new_password = $this->request->getPost('new_password');

        if (Password::verify($current_password, $user_password)) {
            if ($current_password !== $new_password) {
                // new password
                $data = ['password_hash' => Password::hash($new_password)];
                // Save new password to database
                $this->usersModel->update($users_id, $data);
                session()->setFlashdata('update_password', '<strong>WELL DONE!</strong> You successfully updated your password.');
                return redirect()->to('profile/index');
            } else {
                session()->setFlashdata('currpass=newpass', '<strong>OPPS!</strong> Current password cannot be the same as new password.');
                return redirect()->to('profile/index')->withInput();
            }
        } else {
            session()->setFlashdata('wrong_curr_pass', '<strong>OH SNAP!</strong> Your current password is wrong.');
            return redirect()->to('profile/index')->withInput();
        }
    }

    // request role update 
    public function role_update()
    {
        $data = [
            'title' => 'Request to Role Update',
            'users' => $this->RoleUpdateModel->getRole(),
            'validation' => \Config\Services::validation()
        ];
        // dd($data['users']);
        // dd($data['validation']);
        return view('profile/role_update', $data);
    }

    public function insert_role_update()
    {
        $data = [
            'req_user_id' => $this->request->getPost('req_user_id'),
            'req_group_id' => $this->request->getPost('req_group_id'),
        ];

        // Validation
        if (!$this->validate([
            // key -> take the name from input
            'req_user_id' => [
                // no space between parameters
                'rules' => 'is_unique[role_update.req_user_id]',
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            session()->setFlashdata('role_update_fail', '<strong>OPPS!</strong> You can only request a role update only once.');
            return redirect()->to('profile/role_update')->withInput();
        }

        //Do the insert
        $this->RoleUpdateModel->insert($data);
        session()->setFlashdata('role_update', '<strong>WELL DONE!</strong> You have submitted request to role update.');
        return redirect()->to('profile/role_update');
    }
}
