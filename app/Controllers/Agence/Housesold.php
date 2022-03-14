<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;

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
        if($this->session->get('security') != 3)
                return redirect()->to('/');

            $model = new HouseModel();

            $donnee = [
                "isActive" => 4,
                "title" => "All House",
                "message" => "Welcome to our web site",
                "proprety" => $model->HouseSold()
            ];

            echo view("Templates/Agence/header",$donnee);
            echo view("Agence/houseSold",$donnee);
            echo view("Templates/Agence/footer");   
    }
}
