<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\HouseModel;
use App\Models\UserModel;

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
        if($this->session->get('security') != 1)
                return redirect()->to('/');
            
            $search = new UserModel();
            $house = new HouseModel();

            $msg = session()->getFlashdata("msg");
            
            $donnee = [
                "isActive" => 1,
                "title" => "Home",
                "message" => $msg,
                "client" => $search->getClient($this->session->get('idUser')),
                "maison" => $house->lastHouseAdd(),
                "display" => $house->styleSite()
            ];

        echo view("Templates/header",$donnee);
        echo view("Client/acceuil",$donnee);
        echo view("Templates/footer");   
    }
}
