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

        return view('User/login.php');


    }

    public function attemptLogin() {
        $users = new \App\Models\UserModel;

        $username = $this->request->getPost("username");
        $password = $this->request->getPost("password");

        $user = $users->where('username', $username)->first();

        if($user['password'] === $password) {
            session()->set('user', $user['id']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/');
        }
    }

    public function register() {
        return view('User/register.php');

       
    }

    public function attemptRegister() {

        $users = new \App\Models\UserModel;

        $result = $users->insert([
            'first_name' => $this->request->getPost("firstName"),
            'last_name' => $this->request->getPost("lastName"),
            'phone_number' => $this->request->getPost("number"),
            'username' => $this->request->getPost("username"),
            'user_type' => $this->request->getPost("userType"),
            'sp_type' => $this->request->getPost("spType"),
            'password' => $this->request->getPost("password")

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


        return view('User/dashboard.php', ['user' => $user]);

    }
}
