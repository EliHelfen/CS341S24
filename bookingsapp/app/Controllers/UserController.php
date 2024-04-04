<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function login()
    {
        return view('User/login.php');
    }

    public function logout() {

        if (session()->has('user')) {
            session()->remove('user');
        }

        return redirect()->to('/');


    }

    public function attemptLogin() {
        $users = new \App\Models\UserModel;

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        $user = $users->where('username', $username)->first();

        if (password_verify($password, $user['password'])) {
            // The passwords match.
            session()->set('user', $user['id']);
            if($user['user_type'] = 3) {
                return redirect()->to('/adminDashboard');
            } else {
                return redirect()->to('/dashboard');
            }
            
        } else {
            // The passwords do not match.
            return redirect()->to('/');
        }

        // if($user['password'] === $password) {
        //     session()->set('user', $user['id']);
        //     return redirect()->to('/dashboard');
        // } else {
        //     return redirect()->to('/');
        // }
    }

    public function register() {
        return view('User/register.php');

       
    }

    public function attemptRegister() {

        $users = new \App\Models\UserModel;

        $password = $this->request->getPost("password");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $result = $users->insert([
            'first_name' => $this->request->getPost("firstName"),
            'last_name' => $this->request->getPost("lastName"),
            'phone_number' => $this->request->getPost("number"),
            'username' => $this->request->getPost("username"),
            'user_type' => $this->request->getPost("userType"),
            'sp_type' => $this->request->getPost("spType"),
            // 'password' => $this->request->getPost("password")
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

    public function dashboard() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        $appointmentModel = new \App\Models\AppointmentModel;

        $appointments = $appointmentModel->where('a_userId', $user['id'])->findAll();


        return view('User/dashboard.php', ['user' => $user, 'appointments' => $appointments]);

    }

    public function adminDashboard() {
        $users = new \App\Models\UserModel;
        $id = session()->get('user');

        $user = $users->find($id);
        $appointmentModel = new \App\Models\AppointmentModel;

        $appointments = $appointmentModel->findAll();


        return view('User/adminDashboard.php', ['user' => $user, 'appointments' => $appointments]);

    }
}
