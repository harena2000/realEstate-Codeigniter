<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;

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
        if($this->session->get('security') != 3)
                return redirect()->to('/');

            $idUser = $this->session->get("idUser");

            $model = new HouseModel();

            $countHouse = $model->countHouseAgence($this->session->get("idUser"));

            if ($countHouse->countHouse != 0) {
                $donnee = [
                    "isActive" => 4,
                    "title" => "All House",
                    "message" => session()->getFlashdata("success"),
                    "proprety" => $model->getAllHouse_Agence($idUser),
                ];

                echo view("Templates/Agence/header",$donnee);
                echo view("Agence/all_house",$donnee);
                echo view("Templates/Agence/footer");   
            }
            else if ($countHouse->countHouse == 0){
                return redirect()->to(base_url('Agence/Newhouse'))->with("msg","There's no activity added in your account");
            }
            
    }
}
