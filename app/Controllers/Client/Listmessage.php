<?php

namespace App\Controllers\Client;

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
        if($this->session->get('security') != 1)
            return redirect()->to('/');
            
            $house = new HouseModel();
            $message = new MessageModel();

            $msg = session()->getFlashdata("msg");

            $countHouse = $house->countHouseAgence($this->session->get("idUser"));

            $donnee = [
                "isActive" => 7,
                "title" => "Message List",
                "message" => $msg,
                "group" => $message->getGroup($this->session->get("emailUser"))
            ];

            echo view("Templates/header",$donnee);
            echo view("Client/listeMessage",$donnee);
            echo view("Templates/footer");   
            
    }

}
