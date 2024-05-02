<?php
namespace App\Models;

class UserModel extends \CodeIgniter\Model {
    protected $table = 'users';

    protected $allowedFields = ['username', 'password', 'first_name', 'last_name', 'phone_number', 'user_type', 'sp_type', "account_status"];
}