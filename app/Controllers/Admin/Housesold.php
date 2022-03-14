<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\HouseModel;

class Housesold extends BaseController
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
                "isActive" => 4,
                "title" => "All House",
                "message" => "Welcome to our web site",
                "proprety" => $model->HouseSold()
            ];

            echo view("Templates/Admin/header",$donnee);
            echo view("Admin/houseSold",$donnee);
            echo view("Templates/Admin/footer");   
    }
}
