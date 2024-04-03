<?php

namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class AppointmentController extends BaseController
{
    public function book()
    {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        return view('Appointment/book.php', ['user' => $user]);
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
            'a_time' => $appointmentTime,
            'a_status' => 'available'
            

        ]);

        if($result === false) {
            return redirect()->back()
                ->with('errors', $users->errors())
                ->with('warning', 'Invaild data');
        } else {
            return redirect()->to('/dashboard');
        }

        
    }

    public function viewAvailable() {
        $model = new \App\Models\AppointmentModel;

        $type = $this->request->getPost("apptType");
        if($type === '1') {
            $at = 'Medical';
        } elseif($type === '2') {
            $at = 'Beauty';
        } elseif($type === '3') {
            $at = 'Fitness';
        }
        $appointments = $model->where('a_type', $at)
                               ->where('a_status', 'available')
                               ->findAll();

        $users = new \App\Models\UserModel;
        $id = session()->get('user');
                       
        $user = $users->find($id);

        return view('Appointment/viewAvailable.php', ['appointments' => $appointments, 'user' => $user]);
    }

    public function claimAppointment($appointmentId = null) {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');
                       
        $user = $users->find($id);

        $appointmentModel = new \App\Models\AppointmentModel;

        $data = [
            'a_status' => 'booked',
            'a_user' => $user['username'],
            'a_userId' => $user['id']

        ];

        // $appointmentModel->where('a_id', $appointmentId)->set($data)->update();
        $appointmentModel->update($appointmentId, $data);


        return redirect()->to('/dashboard');

    }

    public function cancelAppointment($appointmentId = null) {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');
                       
        $user = $users->find($id);

        $appointmentModel = new \App\Models\AppointmentModel;

        $data = [
            'a_status' => 'canceled',
            'a_user' => '',
            'a_userId' => 0

        ];

        // $appointmentModel->where('a_id', $appointmentId)->set($data)->update();
        $appointmentModel->update($appointmentId, $data);

        $mail = new PHPMailer(true);

        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.office365.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'spring2024bookingsappcs341@outlook.com';
        $mail->Password = 'uwladminusercs341!';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('spring2024bookingsappcs341@outlook.com', 'Mailer');
        $mail->addAddress('wixom3568@uwlax.edu', 'GreyWixom');

        $mail->isHTML(true);
        $mail->Subject = 'Appointment Canceled';
        $mail->Body = '<h1>TEST<h1>';
        $mail->AltBody = 'Failed to load HTML';
        $mail->send();


        return redirect()->to('/dashboard');

    }
}
