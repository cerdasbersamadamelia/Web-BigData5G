<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    // Only summary_imei table
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'fullname', 'user_image', 'password_hash', 'active'];
    protected $useSoftDeletes = false;

    // Join table users, auth_groups_users, and auth_groups
    // Index page
    public function getUsers()
    {
        return $this->db->table('users')
            ->select('users.id as users_id, email, username, fullname, user_image, reset_at, active, created_at, updated_at, group_id, name')
            ->join('auth_groups_users', '`auth_groups_users`.`user_id` = `users`.`id`')
            ->join('auth_groups', '`auth_groups`.`id` = `auth_groups_users`.`group_id`')
            ->get()->getResultArray();
    }

    // Detail page
    public function getDetail($users_id)
    // public function getDetail($username)
    {
        return $this->db->table('users')
            ->select('users.id as users_id, email, username, fullname, user_image, password_hash, reset_at, active, created_at, updated_at, group_id, name')
            ->join('auth_groups_users', '`auth_groups_users`.`user_id` = `users`.`id`')
            ->join('auth_groups', '`auth_groups`.`id` = `auth_groups_users`.`group_id`')
            ->where('users.id ', $users_id)
            // ->where('username ', $username)
            ->get()->getResultArray();
    }

    public function getGroups()
    {
        return $this->db->table('auth_groups')
            ->get()->getResultArray();
    }
}

// Source -> https://www.sinauo.com/2020/07/tutorial-menampilkan-data-join-multi.html
