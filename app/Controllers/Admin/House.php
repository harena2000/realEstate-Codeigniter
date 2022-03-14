<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\HouseModel;
use CodeIgniter\I18n\Time;

class House extends BaseController
{
    public function __construct()
    {         
        helper('date');    
        $this->session = session();  
        $this->session->start();   
    }
    
    public function index($idMaison)
    {
        if($this->session->get('security') != 0)
                return redirect()->to('/');

            $model = new HouseModel();

            $msg = session()->getFlashdata("msg");

            $donnee = [
                "isActive" => 2,
                "title" => "House Details",
                "message" => $msg,
                "proprety" => $model->getHouse($idMaison),
                "nombre" => $model->getCountRoomImage($idMaison),
                "image" => $model->getRoomImage($idMaison),
                "proprety" => $model->getHouse($idMaison),
                "bedroom" => $model->getBedroom($idMaison),
                "kitchen" => $model->getKitchen($idMaison),
                "bathroom" => $model->getBathroom($idMaison),
                "garage" => $model->getGarage($idMaison),
                "stats" => $model->statHouse($idMaison),
            ];

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/House",$donnee);
        echo view("Templates/Admin/footer");   
    }
}
