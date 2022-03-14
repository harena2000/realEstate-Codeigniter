<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel\UserModel;

class Allagents extends BaseController
{
    public function __construct()
    {         
        helper('date');    
        $this->session = session();  
        $this->session->start();   
    }
    
    public function index()
    {
        if($this->session->get('security') != 0)
                return redirect()->to('/');
                
            $users = new UserModel();

            $donnee = [
                "isActive" => 7,
                "title" => "All Agence",
                // "message" => $msg,
                // "proprety" => $payment->myHouse($idClient),
                "users" => $users->allAgents()
            ];
        
        echo view("Templates/Admin/header",$donnee);
        echo view("Admin/allAgents",$donnee);
        echo view("Templates/Admin/footer");    
            
    }
}
