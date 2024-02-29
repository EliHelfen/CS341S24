<?php

namespace App\Controllers;

class AppointmentController extends BaseController
{
    public function book()
    {
        return view('Appointment/book.php');
    }
}
