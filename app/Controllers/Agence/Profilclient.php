<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\UserModel;
use App\Models\AdminModel\HouseModel;
use App\Models\LoginModel;

class Profilclient extends BaseController
{
    public function __construct()
    {         
        helper(["form", "url"]);
        $this->validate =  \Config\Services::validation();
        $this->session = session();  
        $this->session->start();        
    }
    
    public function index($idClient)
    {
        if($this->session->get('security') != 3)
                return redirect()->to('/');
            
            $search = new UserModel();
            $house = new HouseModel();

            $msg = session()->getFlashdata("msg");
            $pays = new LoginModel();

            $donnee = [
                "isActive" => 5,
                "title" => "Agence Profil",
                "message" => $msg,
                "pays" => $pays->allPays(),
                "liste" => $search->getClient($idClient),
                "maison" => $house->myHouse($idClient)
            ];    

        echo view("Templates/Agence/header",$donnee);
        echo view("Agence/profilClient",$donnee);
        echo view("Templates/Agence/footer");   
    }

}
