<?php

namespace App\Controllers\Client;

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
    
    public function index($nameChat,$emailAgence)
    {
        if($this->session->get('security') != 1)
            return redirect()->to('/');
            
            $house = new HouseModel();
            $message = new MessageModel();

            $msg = session()->getFlashdata("msg");

            $countHouse = $house->countHouseAgence($this->session->get("idUser"));

            $donnee = [
                "isActive" => 7,
                "title" => "Message",
                "message" => $msg,
                "nameGroup" => $nameChat,
                "emailClient" => $this->session->get("emailUser"),
                "emailAgence" => $emailAgence,
            ];

            echo view("Templates/header",$donnee);
            echo view("Client/message",$donnee);
            echo view("Templates/footer");   
            
    }

    public function loadMessage()
    {
        $chatModel = new MessageModel();
        $nameGroup = $this->request->getGet("nameGroup");
        $emailAgence = $this->request->getGet("email");
        $data = $chatModel->getMessage($nameGroup);
        return json_encode($data);
    }

    public function sendMessage()
    {
        if($this->session->get('security') != 1)
            return redirect()->to('/');

            $chatModel = new MessageModel();

            $name = $this->request->getPost("groupName");
            $message = $this->request->getPost("message");
            $emailAgence = $this->request->getPost("email");

            if ($name != "") {
                
                $chatModel->createGroup($name,$emailAgence,$this->session->get("emailUser"));
                $chatModel->sendMessage($name,$this->session->get("emailUser"),$message);

                return redirect()->to(base_url("Client/Listmessage"));

            }
            else{
                $chatModel->sendMessage($name,$this->session->get("emailUser"),$message);
            }
    }

    public function sendMessagePage()
    {
        if($this->session->get('security') != 1)
            return redirect()->to('/');

            $chatModel = new MessageModel();

            $name = $this->request->getPost("groupName");
            $message = $this->request->getPost("message");

            $chatModel->sendMessage($name,$this->session->get("emailUser"),$message);

            $response = [
                "icon" => "success",
                "title" => "Date Inserted!",
                "message" => "Event add successfully!"  
            ];

            return $this->response->setJSON($response);
    }
}
