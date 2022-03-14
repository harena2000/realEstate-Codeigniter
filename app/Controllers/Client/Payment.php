<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\PayModel;
use CodeIgniter\I18n\Time;

class Payment extends BaseController
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

            $payment = new PayModel();
            $myAccount = new LoginModel();

            $idClient = $this->session->get("idUser");
            $msg = session()->getFlashdata("msg");

            if ($payment->myHouse($idClient) != null) {
                    $donnee = [
                              "isActive" => 4,
                              "title" => "Payment",
                              "message" => $msg,
                              "proprety" => $payment->myHouse($idClient),
                              "myAccount" => $myAccount->getSold($idClient)
                          ];
              
                    echo view("Templates/header",$donnee);
                    echo view("Client/Payment",$donnee);
                    echo view("Templates/footer");   
            } else {
                return redirect()->to(base_url("Client/Acceuil/"))->with("msg","No house was bought.Your list is empty");
            }
    }

    public function respectContrat()
    {
        if ($this->session->get('security') == 2) {

            $payment = new PayModel();
            $myAccount = new LoginModel();

            $idClient = $this->session->get("idUser");
            $msg = session()->getFlashdata("msg");
            
            $donnee = [
                    "isActive" => 4,
                    "title" => "Payment",
                    "message" => $msg,
                    "proprety" => $payment->myHouse($idClient),
                    "myAccount" => $myAccount->getSold($idClient)
                ];
              
                echo view("Templates/header",$donnee);
                echo view("Client/Payment",$donnee);
                echo view("Templates/footer");
        }
    }
}
