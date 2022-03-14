<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\UserModel;
use App\Models\MessageModel;

class Ajoutermembre extends BaseController
{
    public function __construct()
    {         
        //helper('url');    
        $this->session = session();  
        $this->session->start();      
    }
    
    public function index($nameChat)
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');
            
            $house = new HouseModel();
            $client = new UserModel();

            $msg = session()->getFlashdata("msg");

            $donnee = [
                "isActive" => 7,
                "title" => "Ajouter Membre",
                "message" => $msg,
                "nameGroup" => $nameChat,
                "client" => $client->getAllClient($nameChat),
                "emailAgence" => $this->session->get("emailUser")
            ];

            echo view("Templates/Agence/header",$donnee);
            echo view("Agence/AjouterMembre",$donnee);
            echo view("Templates/Agence/footer");   
            
    }

    public function ajouter($emailClient,$nameGroup)
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');

            $message = new MessageModel();

            $message->createGroup($nameGroup,$this->session->get("emailUser"),$emailClient);

            return redirect()->to(base_url("Agence/Ajoutermembre/index/$nameGroup"));

    }

}
