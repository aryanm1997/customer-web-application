<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        helper(['form']);

        if ($this->request->getMethod() === 'POST')
        {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new UserModel();

            $user = $userModel
                    ->where('email', $email)
                    ->first();

            if ($user)
            {
                if (password_verify($password, $user['password']))
                {
                    session()->set([
                        'user_id' => $user['id'],
                        'name' => $user['name'],
                        'logged_in' => true
                    ]);

                    return redirect()->to('/dashboard');
                }
            }

            return redirect()->back()
                ->with('error', 'Invalid Email or Password');
        }

        return view('login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}