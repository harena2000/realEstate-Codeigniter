<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\ManageModel;
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
        if($this->session->get('security') != 3)
                return redirect()->to('/');

            $model = new ManageModel();

            $msg = session()->getFlashdata("msg");

            $donnee = [
                "isActive" => 6,
                "title" => "Manage System",
                "message" => $msg,
                "proprety" => $model->displayManage(),
            ];

        echo view("Templates/Agence/header",$donnee);
        echo view("Agence/manage",$donnee);
        echo view("Templates/Agence/footer");   
    }

    public function disabled($idUser,$isActive)
    {
        $model = new ManageModel();
        $model->disableUser($idUser,$isActive);

        return redirect()->to(base_url("Agence/Manage/"))->with("msg","The User is Disabled");
    }
}
