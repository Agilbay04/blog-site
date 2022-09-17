<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// Memanggil model yang dibutuhkan
use App\Models\AdminModel;

class Dashboard extends BaseController
{
    protected $AdminModel;
    
    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->CheckUser = $this->AdminModel
            ->where('username', session()->get('username'))
            ->first();
    }

    public function index()
    {
        $data = [
            "title" => "Dashboard"
        ];

        return view("admin/v_dashboard", $data);
    }
}
