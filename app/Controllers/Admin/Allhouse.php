<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\HouseModel;

class Allhouse extends BaseController
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

            $model = new HouseModel();
            $donnee = [
                "isActive" => 2,
                "title" => "All House",
                "message" => "All House",
                "proprety" => $model->getAllHouse(),
            ];

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/all_house",$donnee);
        echo view("Templates/Admin/footer");   
    }
}
