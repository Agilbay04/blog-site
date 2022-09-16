<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Memanggil model yang dibutuhkan
use App\Models\AdminModel;

class Admin extends BaseController
{
    // Deklarasikan model admin
    protected $AdminModel;

    public function __construct()
    {   
        // Deklrasi model admin
        $this->AdminModel = new AdminModel();
    }

    // Method untuk menampilkan data admin
    public function index()
    {
        $data = [
            "title" => "Data Admin",
            "dt_admin" => $this->AdminModel->findAll()
        ];
        return view("admin/v_admin", $data);
    }

    // Method untuk simpan data admin
    public function save()
    {
        $data = [
            "nama" => $this->request->getVar("nama"),
            "username" => $this->request->getVar("username"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT)
        ];
        $this->AdminModel->save($data);
        return redirect()->to("/admin");
    }

    // Method untuk update data admin
    public function update()
    {
        $data = [
            "id" => $this->request->getVar("id"),
            "nama" => $this->request->getVar("nama"),
            "username" => $this->request->getVar("username"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT)
        ];

        $no_psw = [
            "id" => $this->request->getVar("id"),
            "nama" => $this->request->getVar("nama"),
            "username" => $this->request->getVar("username")
        ];

        if ($this->request->getVar("password") == null) {
            $this->AdminModel->save($no_psw);
        } else {
            $this->AdminModel->save($data);
        }

        return redirect()->to("/admin");
    }

    // Method untuk delete data admin
    public function delete()
    {
        $id = $this->request->getVar("id");
        $this->AdminModel->delete($id);
        return redirect()->to("/admin");
    }
}
