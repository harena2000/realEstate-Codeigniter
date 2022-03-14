<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\UserModel;

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
        if($this->session->get('security') != 3)
                return redirect()->to('/');
            
            $house = new HouseModel();

            $msg = session()->getFlashdata("msg");

            $countHouse = $house->countHouseAgence($this->session->get("idUser"));

            if ($countHouse->countHouse != 0) {
                $donnee = [
                    "isActive" => 1,
                    "title" => "Home",
                    "message" => $msg,
                    "maison" => $house->getAllHouseAgence($this->session->get("idUser")),
                    "display" => $house->styleSite($this->session->get("idUser"))
                ];

                echo view("Templates/Agence/header",$donnee);
                echo view("Agence/acceuil",$donnee);
                echo view("Templates/Agence/footer");   
            }
            else if ($countHouse->countHouse == 0){
                return redirect()->to(base_url('Agence/Newhouse'))->with("msg","There's no activity added in your account");
            }
            
    }
}
