<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Memanggil model yang dibutuhkan
use App\Models\KategoriModel;
use App\Models\AdminModel;

class Kategori extends BaseController
{
    // Deklarasi model kategori
    protected $KategoriModel;

    public function __construct()
    {
        // Deklarasi kategori model
        $this->KategoriModel = new KategoriModel();
        $this->AdminModel = new AdminModel();
        $this->CheckUser = $this->AdminModel
            ->where('username', session()->get('username'))
            ->first();
    }

    // Method menampilkan data kategori
    public function index()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $data = [
                "title" => "Data Kategori",
                "dt_ktg" => $this->KategoriModel->findAll()
            ];
            return view("admin/v_kategori", $data);
        }
    }

    // Method simpan data kategori
    public function save()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $data = [
                "kategori" => $this->request->getVar("kategori")
            ];
            $this->KategoriModel->save($data);
            return redirect()->to("/kategori");
        }
    }

    // Method update data kategori
    public function update()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $data = [
                "id" => $this->request->getVar("id"),
                "kategori" => $this->request->getVar("kategori")
            ];
            $this->KategoriModel->save($data);
            return redirect()->to("/kategori");
        }
    }

    // Method hapus data kategori
    public function delete()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $id = $this->request->getVar("id");
            $this->KategoriModel->delete($id);
            return redirect()->to("/kategori");
        }
    }
}
