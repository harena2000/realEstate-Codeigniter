<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\UserModel;
use App\Models\AgenceModel\HouseModel;

class Search extends BaseController
{
    public function __construct()
    {         
        helper(["form", "url"]);
        $this->session = session();  
        $this->session->start();        
    }
    
    public function index($keyword)
    {
        if($this->session->get('security') != 3)
                return redirect()->to('/');
            
            $user = new UserModel();
            $house = new HouseModel();

            $donnee = [
                "isActive" => 0,
                "title" => "Search $keyword",
                "house" => $house->searchHouse($keyword,$this->session->get('idUser')),
                "client" => $user->searchClient($keyword)
            ];    

        echo view("Templates/Agence/header",$donnee);
        echo view("Agence/search",$donnee);
        echo view("Templates/Agence/footer");   
    }

}
