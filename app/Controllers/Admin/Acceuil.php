<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\HouseModel;
use App\Models\AdminModel\UserModel;

class Acceuil extends BaseController
{
    public function __construct()
    {         
        //helper('url');    
        $this->session = session();  
        $this->session->start();      
    }
    
    public function index()
    {
        if($this->session->get('security') != 0)
                return redirect()->to('/');
            
            $search = new UserModel();
            $house = new HouseModel();

            $msg = session()->getFlashdata("msg");
            
            $donnee = [
                "isActive" => 1,
                "title" => "Home",
                "message" => $msg,
                "client" => $search->lastUsersAdd(),
                "maison" => $house->lastHouseAdd(),
                "display" => $house->styleSite()
            ];

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/acceuil",$donnee);
        echo view("Templates/Admin/footer");   
    }
}
