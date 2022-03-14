<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\AgendaModel;
use App\Models\LoginModel;
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
        if($this->session->get('security') != 3)
                return redirect()->to('/');

            $model = new HouseModel();
            $paysMaison = new LoginModel();
            $agenda = new AgendaModel();

            $msg = session()->getFlashdata("msg");

            $countHouse = $model->countHouseAgence($this->session->get("idUser"));

            if ($countHouse->countHouse != 0) {
                $donnee = [
                    "isActive" => 4,
                    "title" => "House Details",
                    "message" => $msg,
                    "pays" => $paysMaison->allPays(),
                    "nombre" => $model->getCountRoomImage($id),
                    "image" => $model->getRoomImage($id),
                    "proprety" => $model->getHouse($id),
                    "bedroom" => $model->getBedroom($id),
                    "kitchen" => $model->getKitchen($id),
                    "bathroom" => $model->getBathroom($id),
                    "garage" => $model->getGarage($id),
                    "stats" => $model->statHouse($id),
                    "agenda" => $agenda->showDateVisit($id)
                ];

                echo view("Templates/Agence/header",$donnee);
                echo view("Agence/House",$donnee);
                echo view("Templates/Agence/footer");   
            }
            
            else if ($countHouse->countHouse == 0){
                return redirect()->to(base_url('Agence/Newhouse'))->with("msg","There's no activity added in your account");
            }
    }

    public function delete($idMaison)
    {
         if($this->session->get('security') != 3)
            return redirect()->to('/');

            $model = new HouseModel();

            $model->deleteMaison($idMaison);
            $model->deleteAgenceMaison($idMaison);
            $model->deleteMaisonImage($idMaison);

            return redirect()->to(base_url('Agence/Allhouse'))->with("success","House is removed with success");
            
    }
}
