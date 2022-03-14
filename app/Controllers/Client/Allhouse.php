<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\HouseModel;

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
        if($this->session->get('security') != 1)
                return redirect()->to('/');

            $model = new HouseModel();
            $donnee = [
                "isActive" => 2,
                "title" => "All House",
                "message" => "Welcome to our web site",
                "proprety" => $model->getAllHouse(),
            ];

        echo view("Templates/header",$donnee);
        echo view("Client/all_house",$donnee);
        echo view("Templates/footer");   
    }
}
