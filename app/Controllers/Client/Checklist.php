<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\PayModel;
use App\Models\HistoryModel;
use CodeIgniter\I18n\Time;

class Checklist extends BaseController
{
    public function __construct()
    {         
        helper('date');    
        $this->session = session();  
        $this->session->start();   
    }
    
    public function index()
    {
        if($this->session->get('security') != 1)
                return redirect()->to('/');

            $historique = new HistoryModel();

            $idClient = $this->session->get("idUser");

            $donnee = [
                    "isActive" => 5,
                    "title" => "Payment History",
                    // "proprety" => $historique->myHouse($idClient),
                    // "myAccount" => $historique->getSold($idClient),
                    "history" => $historique->displayHistory($idClient)
          ];
                              
              
          echo view("Templates/header",$donnee);
          echo view("Client/checklist",$donnee);
          echo view("Templates/footer");   
    }
}
