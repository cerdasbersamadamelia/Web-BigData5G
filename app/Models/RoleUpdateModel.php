<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleUpdateModel extends Model
{
    protected $table = 'role_update';
    protected $primaryKey = 'req_user_id';
    protected $allowedFields = ['req_user_id', 'req_group_id', 'req_active'];
    protected $useSoftDeletes = false;

    // Join table role update, users, auth_groups, and auth_groups_users
    // role update Validation page
    public function getRole()
    {
        return $this->db->table('role_update')
            ->select('username, name, user_image, users.id as users_id, group_id, req_group_id, req_active')
            ->join('auth_groups', '`auth_groups`.`id` = `role_update`.`req_group_id`')
            ->join('users', '`users`.`id` = `role_update`.`req_user_id`')
            ->join('auth_groups_users', '`auth_groups_users`.`user_id` = `users`.`id`')
            ->get()->getResultArray();
    }
}
