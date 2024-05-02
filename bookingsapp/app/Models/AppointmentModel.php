<?php
namespace App\Models;

class AppointmentModel extends \CodeIgniter\Model {
    protected $table = 'appointments';

    protected $primaryKey = 'id';

    protected $allowedFields = ['a_serviceProvider', 'a_SPId', 'a_userId', 'a_user', 'a_date', 'a_time', 'a_type', 'a_description', 'a_status'];
}