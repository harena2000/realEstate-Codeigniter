<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\HouseModel;

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
        if($this->session->get('security') != 1)
                return redirect()->to('/');

            $model = new HouseModel();

            if ($model->ForSaleHouse() != null) {
                $donnee = [
                    "isActive" => 3,
                    "title" => "All House",
                    "message" => "Welcome to our web site",
                    "proprety" => $model->ForSaleHouse()
                ];
    
            echo view("Templates/header",$donnee);
            echo view("Client/sale",$donnee);
            echo view("Templates/footer");   
            } else {
                return redirect()->to(base_url("Client/Acceuil/"))->with("msg","All the houses are sold. Houses are still under construction");
            }
    }
}
