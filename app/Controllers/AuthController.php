<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return $this->redirectBasedOnRole();
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            $pass = $user['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $user['id'],
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'role'     => $user['role'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);
                return $this->redirectBasedOnRole();
            } else {
                $session->setFlashdata('msg', 'كلمة المرور غير صحيحة');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'البريد الإلكتروني غير موجود');
            return redirect()->to('/login');
        }
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return $this->redirectBasedOnRole();
        }
        return view('auth/register');
    }

    public function attemptRegister()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'phone' => 'required|min_length[8]|max_length[20]',
            'password' => 'required|min_length[4]|max_length[255]',
            'confpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'phone'    => $this->request->getVar('phone'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role'     => 'user' // Default role
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data['validation'] = $this->validator;
            return view('auth/register', $data);
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    private function redirectBasedOnRole()
    {
        $role = session()->get('role');
        if ($role == 'admin') {
            return redirect()->to('/admin/requests');
        } else {
            return redirect()->to('/patient/dashboard');
        }
    }
}
