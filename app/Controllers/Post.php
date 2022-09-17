<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\AdminModel;
use App\Models\KategoriModel;
use CodeIgniter\Commands\Help;
use CodeIgniter\Files\File;

class Post extends BaseController
{
    // Memanggil helpers form
    protected $helpers = ['form'];
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

        $this->CheckUser = $this->AdminModel
            ->where('username', session()->get('username'))
            ->first();
    }

    // Method menampilkan data post
    public function index()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
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
    }

    // Method simpan data post
    public function save()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $validationRule = [
                "gambar" => [
                    "rules" => "uploaded[gambar]"
                        . "|is_image[gambar]"
                        . "|mime_in[gambar,image/jpg,image/jpeg,image/png]"
                        . "|max_size[gambar,2048]",
                ],
            ];

            if (!$this->validate($validationRule)) {
                $data = ['errors' => $this->validator->getErrors()];
                return redirect()->to("/post");
            }

            $img = $this->request->getFile("gambar");
            $new_name = $img->getRandomName();

            $img->move('../public/dist/img/', $new_name);

            $data = [
                "admin_id" => session('id'),
                "kategori_id" => $this->request->getVar("kategori"),
                "judul" => $this->request->getVar("judul"),
                "gambar" => $new_name,
                "isi" => $this->request->getVar("isi"),
                "slug" => str_replace(" ", "-", strtolower($this->request->getVar("judul"))),
            ];
            $this->PostModel->save($data);
            return redirect()->to("/post");
        }
    }

    // Method update data post
    public function update()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $id = $this->request->getVar("id");
            $image_file = $this->PostModel->find($id);
            $img = $this->request->getFile("gambar");
            if ($img != null) {
                if (file_exists("dist/img/" . $image_file["gambar"])) {
                    unlink("dist/img/" . $image_file["gambar"]);
                }

                $validationRule = [
                    "gambar" => [
                        "rules" => "uploaded[gambar]"
                            . "|is_image[gambar]"
                            . "|mime_in[gambar,image/jpg,image/jpeg,image/png]"
                            . "|max_size[gambar,2048]",
                    ],
                ];

                if (!$this->validate($validationRule)) {
                    $data = ['errors' => $this->validator->getErrors()];
                    return redirect()->to("/post");
                }

                $new_name = $img->getRandomName();

                $img->move('../public/dist/img/', $new_name);
            } else {
                $new_name = $image_file["gambar"];
            }

            $data = [
                "post_id" => $id,
                "kategori_id" => $this->request->getVar("kategori"),
                "judul" => $this->request->getVar("judul"),
                "gambar" => $new_name,
                "isi" => $this->request->getVar("isi"),
                "slug" => str_replace(" ", "-", strtolower($this->request->getVar("judul"))),
            ];
            $this->PostModel->save($data);
            return redirect()->to("/post");
        }
    }

    // Method hapus data post
    public function delete()
    {
        if ($this->CheckUser == null) {
            return redirect()->to('/');
        } else {
            $id = $this->request->getVar("id");
            $image_file = $this->PostModel->find($id);
            if (file_exists("dist/img/" . $image_file["gambar"])) {
                unlink("dist/img/" . $image_file["gambar"]);
            }
            $this->PostModel->delete($id);
            return redirect()->to("/post");
        }
    }

    public function homepost()
    {
        $data = [
            "dt_ktg" => $this->KategoriModel->findAll(),
            "dt_post" => $this->PostModel
                ->join("kategori", "kategori.id = post.kategori_id")
                ->join("admin", "admin.id = post.admin_id")
                ->findAll(),
        ];

        return view("user/blog", $data);
    }

    public function det_post($slug)
    {
        $data = [
            "dt_post" => $this->PostModel
                ->join("kategori", "kategori.id = post.kategori_id")
                ->join("admin", "admin.id = post.admin_id")
                ->where("slug", $slug)
                ->first(),
        ];

        return view("user/det_blog", $data);
    }
}
