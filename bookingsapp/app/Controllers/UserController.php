<?php

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends BaseController
{

    //returns login view
    public function login()
    {
        return view('User/login.php');
    }

    //removes user value from session cache
    public function logout() {

        if (session()->has('user')) {
            session()->remove('user');
        }

        return redirect()->to('/');


    }

    //Attempts login flow 
    public function attemptLogin() {
        $users = new \App\Models\UserModel;

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        $user = $users->where('username', $username)->first();

        if (password_verify($password, $user['password'])) {
            session()->set('user', $user['id']);
            if($user['user_type'] === '3') {
                return redirect()->to('/adminDashboard');
            } elseif($user['user_type'] === '2' && $user['account_status'] === '1') {
                return redirect()->to('/serviceProviderDashboard');

            } elseif($user['account_status'] === '1' && $user['account_status'] === '1') {
                return redirect()->to('/dashboard');

            } elseif($user['account_status'] === '0') {
                return redirect()->to("/error")
                    ->with('error', 'Account has been disabled');

            }
            
        } else {
            return redirect()->to('/');
        }

    }

    //returns register view
    public function register() {
        return view('User/register.php');

       
    }

    //Attempts register flow
    public function attemptRegister() {

        $users = new \App\Models\UserModel;

        $password = $this->request->getPost("password");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $username = $this->request->getPost("username");

        $existingUsers = $users->findAll();
        foreach ($existingUsers as $user) {
            if ($user['username'] === $username) {
                return redirect()->to("/error")
                    ->with('error', 'Username already taken');
                    
            }
        }

        $result = $users->insert([
            'first_name' => $this->request->getPost("firstName"),
            'last_name' => $this->request->getPost("lastName"),
            'phone_number' => $this->request->getPost("number"),
            'username' => $this->request->getPost("username"),
            'user_type' => $this->request->getPost("userType"),
            'sp_type' => $this->request->getPost("spType"),
            'account_status' => '1',
            'password' => $hashedPassword

        ]);

        if($result === false) {
            return redirect()->back()
                ->with('errors', $users->errors())
                ->with('warning', 'Invaild data');
        } else {
            session()->set('user', $result);
        }

        return redirect()->to('/dashboard');

    }

    //returns dashboard view
    public function dashboard() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        $appointmentModel = new \App\Models\AppointmentModel;


        $appointments = $appointmentModel->where('a_userId', $user['id'])->findAll();
        

        


        return view('User/dashboard.php', ['user' => $user, 'appointments' => $appointments]);

    }

    //returns service provider dashboard
    public function serviceProviderDashboard() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        $appointmentModel = new \App\Models\AppointmentModel;

        $appointments = $appointmentModel->where('a_SPId', $user['id'])->findAll();


        return view('User/serviceProviderDashboard.php', ['user' => $user, 'appointments' => $appointments]);

    }

    //returns admin dashboard
    public function adminDashboard() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        $appointmentModel = new \App\Models\AppointmentModel;


        $appointments = $appointmentModel->findAll();


        return view('User/adminDashboard.php', ['user' => $user, 'appointments' => $appointments]);

    }

    //Disable account
    //Cancels all appointments
    //Sends cancel update via email
    public function disableAccount($userId = null) {
        $users = new \App\Models\UserModel;
        $appointmentModel = new \App\Models\AppointmentModel;

        $user = $users->find($userId);

        if($user['user_type'] === '1')  {
            $appointments = $appointmentModel->where('a_userId', $userId)->findAll();

        } else if($user['user_type'] === '2') {
            $appointments = $appointmentModel->where('a_SPId', $userId)->findAll();

        }


        foreach ($appointments as $a) {

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
        $mail->Body = '    
        <div style="font-family: Arial, sans-serif; color: #333; max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="color: #d9534f;">Appointment Canceled</h2>
        <p>Hello,</p>
        <p>Unfortunately, we must inform you that your upcoming appointment has been canceled. Please see the details below:</p>
        <ul>
            <li><strong>Service Provider: '. $a['a_serviceProvider'] .'</strong></li>
            <li><strong>Date:</strong> '. $a['a_date'] .'</li>
            <li><strong>Time:</strong> '. $a['a_time'] .'</li>
            <li><strong>Description:</strong> '. $a['a_description'] .'</li>
        </ul>
        <p>We apologize for any inconvenience this may cause. If you have any questions or need to reschedule, please contact us at your earliest convenience.</p>
    </div>';
        $mail->AltBody = 'Failed to load HTML';
        $mail->send();

            $appointmentModel->update($a['id'], ['a_status' => 'Canceled By Admin']);

        }
                       
        $updateResult = $users->update($userId, ['account_status' => '0']);

        return redirect()->to('/adminDashboardAccounts');
    }

    //Enables account and updates database 
    public function enableAccount($userId = null) {
        $users = new \App\Models\UserModel;
                       
        $updateResult = $users->update($userId, ['account_status' => '1']);

        


        return redirect()->to('/adminDashboardAccounts');
    }

    //returns admin dashboard that shows user values
    public function adminDashboardUsers() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        $users = $users->findAll();

        $appointmentModel = new \App\Models\AppointmentModel;

        $appointments = $appointmentModel->findAll();


        return view('User/adminDashboardAccounts.php', ['user' => $user, 'appointments' => $appointments, 'users' => $users]);

    }

    //returns dynamaic error page
    public function error() {
        $errors = session()->getFlashdata('errors') ?? 'Registration failed due to invalid data!';
        $error = session()->getFlashdata('error') ?? '';

        $message = $errors . ($error ? " {$error}" : '');
        return view('Error/index.php', ['message' => $message]);

    }

    //returns search view for admins
    public function adminSearch() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $users = $users->findAll();


        return view('User/adminSearch.php', ['users' => $users]);

    }

    //generate appointment report
    public function generateAdminReport() {
        $appointmentModel = new \App\Models\AppointmentModel;
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);

        $username = $this->request->getPost('username_value');
        $category = $this->request->getPost('category_value');

        $query = $appointmentModel;

        if (!empty($username) && !empty($category)) {
            $query = $query->where('a_user', $username)
                           ->where('a_type', $category);
        }
        else if (!empty($username)) {
            $query = $query->where('a_user', $username);
        }
        else if (!empty($category)) {
            $query = $query->where('a_type', $category);
        }

        $results = $query->findAll();

        $counters = [
            'Medical' => 0,
            'Beauty' => 0,
            'Fitness' => 0
        ];
    
        $today = date('Y-m-d');
    
        foreach ($results as $appointment) {
            if (isset($appointment['a_date']) && $appointment['a_date'] >= $today) {
                if (isset($appointment['a_type']) && array_key_exists($appointment['a_type'], $counters)) {
                    $counters[$appointment['a_type']]++;
                }
            }
        }
    
        return view('User/adminSearchResults.php', [
            'appointments' => $results, 
            'user' => $user, 
            'counters' => $counters
        ]);
    }
}
