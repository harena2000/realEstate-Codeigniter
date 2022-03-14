<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\HouseModel;

class Sale extends BaseController
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

            if ($model->ForSaleHouse() != null) {
                $donnee = [
                    "isActive" => 3,
                    "title" => "All House",
                    "message" => "Welcome to our web site",
                    "proprety" => $model->ForSaleHouse()
                ];
    
            echo view("Templates/Admin/header",$donnee);
            echo view("Admin/sale",$donnee);
            echo view("Templates/Admin/footer");   
            } else {
                return redirect()->to(base_url("Admin/Acceuil/"))->with("msg","All the houses are sold. Houses are still under construction");
            }
    }
}
