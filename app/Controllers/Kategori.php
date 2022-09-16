<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Memanggil model yang dibutuhkan
use App\Models\KategoriModel;

class Kategori extends BaseController
{
    // Deklarasi model kategori
    protected $KategoriModel;

    public function __construct()
    {
        // Deklarasi kategori model
        $this->KategoriModel = new KategoriModel();
    }

    // Method menampilkan data kategori
    public function index()
    {
        $data = [
            "title" => "Data Kategori",
            "dt_ktg" => $this->KategoriModel->findAll()
        ];
        return view("admin/v_kategori", $data);
    }

    // Method simpan data kategori
    public function save()
    {
        $data = [
            "kategori" => $this->request->getVar("kategori")
        ];
        $this->KategoriModel->save($data);
        return redirect()->to("/kategori");
    }

    // Method update data kategori
    public function update()
    {
        $data = [
            "id" => $this->request->getVar("id"),
            "kategori" => $this->request->getVar("kategori")
        ];
        $this->KategoriModel->save($data);
        return redirect()->to("/kategori");
    }

    // Method hapus data kategori
    public function delete()
    {
        $id = $this->request->getVar("id");
        $this->KategoriModel->delete($id);
        return redirect()->to("/kategori");
    }
}
