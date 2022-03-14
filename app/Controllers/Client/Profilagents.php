<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\AdminModel\UserModel;
use App\Models\AdminModel\HouseModel;

class Profilagents extends BaseController
{
    public function __construct()
    {         
        helper(["form", "url"]);
        $this->session = session();  
        $this->session->start();        
    }
    
    public function index($idUser)
    {
        if($this->session->get('security') != 1)
                return redirect()->to('/');
            
            $search = new UserModel();
            $house = new HouseModel();

            $donnee = [
                "isActive" => 2,
                "title" => "Agents Profil",
                "liste" => $search->getAgents($idUser),
                "maison" => $house->myHouseAgents($idUser)
            ];    

        echo view("Templates/header",$donnee);
        echo view("Client/profilAgents",$donnee);
        echo view("Templates/footer");   
    }

}
