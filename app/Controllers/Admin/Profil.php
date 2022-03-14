<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\UserModel;
use App\Models\AdminModel\HouseModel;

class Profil extends BaseController
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
                "isActive" => 5,
                "title" => "User Profil",
                "liste" => $search->getClient($idUser),
                "maison" => $house->myHouse($idUser)
            ];    

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/profil",$donnee);
        echo view("Templates/Admin/footer");   
    }

}
