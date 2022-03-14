<?php

namespace App\Controllers\Admin;

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
        if($this->session->get('security') != 0)
                return redirect()->to('/');
            
            $search = new UserModel();
            $house = new HouseModel();

            $donnee = [
                "isActive" => 7,
                "title" => "User Profil",
                "liste" => $search->getAgents($idUser),
                "maison" => $house->myHouseAgents($idUser)
            ];    

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/profilAgents",$donnee);
        echo view("Templates/Admin/footer");   
    }

}
