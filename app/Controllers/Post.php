<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\AdminModel;
use App\Models\KategoriModel;

class Post extends BaseController
{
    // Deklarasi model post
    protected $PostModel;
    // Deklarasi model admin
    protected $AdminModel;
    // Deklarasi model kategori
    protected $KategoriModel;

    public function __construct()
    {
        // Deklarasi model post
        $this->PostModel = new PostModel();
        // Deklarasi model admin
        $this->AdminModel = new AdminModel();
        // Deklarasi model kategori
        $this->KategoriModel = new KategoriModel();
    }

    // Method menampilkan data post
    public function index()
    {
        $data = [
            "title" => "Data Post",
            "dt_post" => $this->PostModel
                ->join("kategori", "kategori.id = post.kategori_id")
                ->join("admin", "admin.id = post.admin_id")
                ->findAll(),
            "dt_ktg" => $this->KategoriModel->findAll()
        ];
        return view("admin/v_post", $data);
    }

    // Method simpan data post
    public function save()
    {
        $data = [
            "kategori" => $this->request->getVar("kategori")
        ];
        $this->PostModel->save($data);
        return redirect()->to("/post");
    }

    // Method update data post
    public function update()
    {
        $data = [
            "id" => $this->request->getVar("id"),
            "kategori" => $this->request->getVar("kategori")
        ];
        $this->PostModel->save($data);
        return redirect()->to("/post");
    }

    // Method hapus data post
    public function delete()
    {
        $id = $this->request->getVar("id");
        $this->PostModel->delete($id);
        return redirect()->to("/post");
    }
}
