<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\ManageModel;
use CodeIgniter\I18n\Time;

class Manage extends BaseController
{
    public function __construct()
    {         
        helper('date');    
        $this->session = session();  
        $this->session->start();   
    }
    
    public function index()
    {
        if($this->session->get('security') != 0)
                return redirect()->to('/');

            $model = new ManageModel();

            $msg = session()->getFlashdata("msg");

            $donnee = [
                "isActive" => 6,
                "title" => "Manage the Site",
                "message" => $msg,
                "proprety" => $model->displayManage(),
            ];

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/manage",$donnee);
        echo view("Templates/Admin/footer");   
    }

    public function disabled($idUser,$isActive)
    {
        $model = new ManageModel();
        $model->disableUser($idUser,$isActive);

        return redirect()->to(base_url("Admin/Manage/"))->with("msg","The User is Disabled");
    }
}
