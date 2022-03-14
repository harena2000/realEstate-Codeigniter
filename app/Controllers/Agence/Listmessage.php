<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\UserModel;
use App\Models\MessageModel;

class Listmessage extends BaseController
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
            
            $house = new HouseModel();
            $message = new MessageModel();

            $msg = session()->getFlashdata("msg");

            $countHouse = $house->countHouseAgence($this->session->get("idUser"));

            $donnee = [
                "isActive" => 6,
                "title" => "Message List",
                "message" => $msg,
                "group" => $message->getGroupAgence($this->session->get("emailUser"))
            ];

            echo view("Templates/Agence/header",$donnee);
            echo view("Agence/listeMessage",$donnee);
            echo view("Templates/Agence/footer");   
            
    }

}
