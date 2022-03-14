<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\UserModel;
use App\Models\AdminModel\HouseModel;

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
        if($this->session->get('security') != 0)
                return redirect()->to('/');
            
            $user = new UserModel();
            $house = new HouseModel();

            $donnee = [
                "isActive" => 0,
                "title" => "Search $keyword",
                "user" => $user->searchClient($keyword),
                "house" => $house->searchHouse($keyword),
                "agence" => $user->searchAgence($keyword)
            ];    

        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/search",$donnee);
        echo view("Templates/Admin/footer");   
    }

}
