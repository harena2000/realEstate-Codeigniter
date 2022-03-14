<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\HouseModel;
use App\Models\AgenceModel\AgendaModel;
use App\Models\MessageModel;
use CodeIgniter\I18n\Time;

class House extends BaseController
{
    public function __construct()
    {         
        helper('date');    
        $this->session = session();  
        $this->session->start();   
    }
    
    public function index($id)
    {
        if($this->session->get('security') != 1)
                return redirect()->to('/');

            $model = new HouseModel();
            $agenda = new AgendaModel();
            $message = new MessageModel();

            $msg = session()->getFlashdata("msg");
            $donnee = [
                "isActive" => 3,
                "title" => "House Details",
                "proprety" => $model->getHouseAgent($id),
                "remise" => $model->verifyRemise($this->session->get("idUser")),
                "message" => $msg,
                "pays" => $model->allPays(),
                "nombre" => $model->getCountRoomImage($id),
                // "image" => $model->getRoomImage($id),
                "bedroom" => $model->getBedroom($id),
                "kitchen" => $model->getKitchen($id),
                "bathroom" => $model->getBathroom($id),
                "garage" => $model->getGarage($id),
                "agenda" => $agenda->showDateVisit($id),
                "haveGroup" => $message->verifyGroup($model->getHouseAgent($id)->idAgence,$this->session->get("emailUser"))
            ];

        echo view("Templates/header",$donnee);
        echo view("Client/House",$donnee);
        echo view("Templates/footer");   
    }
}
