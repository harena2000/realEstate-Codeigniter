<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\UserModel;
use App\Models\MessageModel;

class Message extends BaseController
{
    public function __construct()
    {         
        //helper('url');    
        $this->session = session();  
        $this->session->start();      
    }
    
    public function index($nameChat,$emailClient)
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');
            
            $house = new HouseModel();
            $message = new MessageModel();

            $msg = session()->getFlashdata("msg");

            $countHouse = $house->countHouseAgence($this->session->get("idUser"));

            $donnee = [
                "isActive" => 6,
                "title" => "Message",
                "message" => $msg,
                "nameGroup" => $nameChat,
                "emailClient" => $emailClient,
                "emailAgence" => $this->session->get("emailUser"),
            ];

            echo view("Templates/Agence/header",$donnee);
            echo view("Agence/message",$donnee);
            echo view("Templates/Agence/footer");   
            
    }

    public function loadMessage()
    {
        $chatModel = new MessageModel();
        $nameGroup = $this->request->getGet("nameGroup");
        $data = $chatModel->getMessage($nameGroup);
        return json_encode($data);
    }


    public function sendMessagePage()
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');

            $chatModel = new MessageModel();

            $name = $this->request->getPost("groupName");
            $message = $this->request->getPost("message");

            // echo $this->session->get("emailUser");
            $chatModel->sendMessage($name,$this->session->get("emailUser"),$message);

            $response = [
                "icon" => "success",
                "title" => "Date Inserted!",
                "message" => "Event add successfully!"  
            ];

            return $this->response->setJSON($response);
    }
}
