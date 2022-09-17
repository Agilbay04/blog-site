<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    protected $AdminModel;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            "title" => "Login"
        ];
        return view("admin/v_login", $data);
    }

    // Method untuk login
    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $admin = $this->AdminModel
            ->where('username', $username)
            ->first();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                session()->set('id', $admin['id']);
                session()->set('username', $admin['username']);
                session()->set('nama', $admin['nama']);
                
                session()->setFlashdata('message', 'login');
                return redirect()->to('/dashboard');
            }
        }

        return redirect()->to('/');
    }

    // Method untuk logout
    public function logout()
    {
        session()->setFlashdata('message', 'logout');
        session()->destroy();
        return redirect()->to('/');
    }
}
