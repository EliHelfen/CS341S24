<?php

namespace App\Controllers;

class AppointmentController extends BaseController
{
    public function book()
    {
        return view('Appointment/book.php');
    }

    public function createAppointment()
    {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        return view('Appointment/createAppointment.php', ['user' => $user]);
    }

    public function addAppointment() {
        $appointments = new \App\Models\AppointmentModel;
        // medical 1
        // beauty 2
        // fitness 3

        $type = $this->request->getPost("a_type");
        if($type === '1') {
            $appointmentType = 'Medical';
        } elseif($type === '2') {
            $appointmentType = 'Beauty';
        } elseif($type === '3') {
            $appointmentType = 'Fitness';
        } else {
            $appointmentType = 'Not Provided';
        }

        $a_hour = $this->request->getPost("hour");
        $a_time = $this->request->getPost("ampm");
        $appointmentTime = $a_hour . ":00 " . $a_time;

        $result = $appointments->insert([
            'a_SPId' => $this->request->getPost("a_SPId"),
            'a_serviceProvider' => $this->request->getPost("a_serviceProvider"),
            'a_type' => $appointmentType,
            'a_description' => $this->request->getPost("description"),
            'a_date' => $this->request->getPost("date"),
            'a_time' => $appointmentTime
            

        ]);

        if($result === false) {
            return redirect()->back()
                ->with('errors', $users->errors())
                ->with('warning', 'Invaild data');
        } else {
            return redirect()->to('/dashboard');
        }

        
    }
}
