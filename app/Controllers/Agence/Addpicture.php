<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\CrudHouse;

class Addpicture extends BaseController
{
    public function __construct()
    {         
        //helper('url');    
        $this->session = session();  
        $this->session->start();      
    }
    
    public function index($idMaison)
    {
        if($this->session->get('security') != 3)
                return redirect()->to('/');
            
            $house = new HouseModel();
            $msg = session()->getFlashdata("msg");
            $idMaisonImage = "";

            $countHouse = $house->countHouseAgence($this->session->get("idUser"));

            $bedroom = "Bedroom";
            $bathroom = "Bathroom";
            $kitchen = "Kitchen";
            $garage = "Garage";

            $roomCount = $house->getHouse($idMaison);

            $roomBedroom = $house->getCountImageRoom($idMaison,$bedroom);
            $roomBathroom = $house->getCountImageRoom($idMaison,$bathroom);
            $roomKitchen = $house->getCountImageRoom($idMaison,$kitchen);
            $roomGarage = $house->getCountImageRoom($idMaison,$garage);

            if ($countHouse->countHouse != 0) {
                $idMaisonImage = ($house->lastIdImage() == null) ? 0 : $house->lastIdImage()->idMaisonImage;
                        
                $donnee = [
                    "isActive" => 1,
                    "title" => "Home",
                    "message" => $msg,
                    "idMaison" => $idMaison,
                    "lastIdImage" => $idMaisonImage,
                    "roomCount" => $roomCount,
                    "roomBedroom" => $roomBedroom,
                    "roomBathroom" => $roomBathroom,
                    "roomKitchen" => $roomKitchen,
                    "roomGarage" => $roomGarage

                    // "chambre" => $house->get($this->session->get("idUser")),
                    // "display" => $house->styleSite($this->session->get("idUser"))
                ];

                echo view("Templates/Agence/header",$donnee);
                echo view("Agence/add_Picture",$donnee);
                echo view("Templates/Agence/footer");  
            }
            else if ($countHouse->countHouse == 0){
                return redirect()->to(base_url('Agence/Newhouse'))->with("msg","There's no activity added in your account");
            }
    }

    public function saveImage()
    {
        $imageBlob = $this->request->getPost("image");
        $roomName = $this->request->getPost("roomName");
        $idMaison = $this->request->getPost("idMaison");
        $lastIdImage = $this->request->getPost("lastIdImage");

        $remove_type = explode(";",$imageBlob);        
        $remove_base = explode(",", $remove_type[1]);

        $final_data = $remove_base[1];
        $final_data_de = base64_decode($final_data);

        $fn = $roomName.$lastIdImage.'.png';

        file_put_contents("assets/img/House/$idMaison/".$fn, $final_data_de);

        $success = true;
        $icon = "success";
        $msg = "Image update with Success";
        

        $response = [
            'icon' => $icon,
            'success' =>$success,
            'data' => $fn,
            'msg' => $msg,
        ];

        $upload = new CrudHouse();
        $upload->saveImageHouse($idMaison,$roomName,$fn);

        return $this->response->setJSON($response);
    }
}
