<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use App\Models\LoginModel;
use App\Models\PayModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Achete extends BaseController
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

            $idClient = $this->session->get("idUser");
            $idMaison = $this->request->getPost("idMaison");
            $payment = $this->request->getPost("firstPayment");
            $contrat = $this->request->getPost("yearContract");
            $prixMaison = $this->request->getPost("prixMaison");
            $remise = $this->request->getPost("remise");
    
            if($payment == ""){
                return redirect()->to(base_url("Client/House/index/".$idMaison))->with("msg","Empty, Fill in the number bar for Pay!");
            }
            else if($payment < 0){
                return redirect()->to(base_url("Client/House/index/".$idMaison))->with("msg","Fatal Error, Number value error!");
            }
            else if($contrat == 0){
                return redirect()->to(base_url("Client/House/index/".$idMaison))->with("msg","IMPORTANT, You must specify how many years your contract will be! Maximum : 20 years");
            }
            else if($contrat <= -1){
                return redirect()->to(base_url("Client/House/index/".$idMaison))->with("msg","Fatal Error, Number value error!");
            }
            else if($contrat > 20){
                return redirect()->to(base_url("Client/House/index/".$idMaison))->with("msg","You cannot exceed the 20 year contract!");
            }
            else
            {
                $model = new PayModel();
                $creditModel = new LoginModel();
                $historique = new HistoryModel();
                
                $voir = $creditModel->getSold($idClient);

                if ($remise == 0) {
                    if ($payment <= $voir->solde) {

                        $credit = $voir->solde - $payment;

                        $reste = $prixMaison - $payment;
                        $debut = Time::createFromDate();
                        $fin = Time::createFromDate(Time::createFromDate()->getYear() + $contrat);
                        $model->creditCompte($idClient,$credit);
                        $model->insertContrat($idClient,$idMaison,$reste,$debut,$fin,$contrat,0);
                        $model->editStatus($idMaison);
                        $historique->insertHistory($idClient,$idMaison,$payment);

                        // Add Salaire of Agents
                        $agence = new UserModel();
                        $getAgence = $agence->getAgence($idMaison);
                        $model->salaireAgence($getAgence->idAgence,$payment);
            
                        return redirect()->to(base_url("Client/Payment"))->with("msg","Your purchase request has just been registered");

                    } else {
                        return redirect()->to(base_url("House/index".$idMaison))->with("msg","Your balance is insufficient");
                    }
                }
                else if ($remise >= 1) {

                        $reste = $prixMaison - $payment;
                        $debut = Time::createFromDate();
                        $fin = Time::createFromDate(Time::createFromDate()->getYear() + $contrat);
                        $model->insertContrat($idClient,$idMaison,$reste,$debut,$fin,$contrat,1);
                        $model->editStatus($idMaison);
                        $historique->insertHistory($idClient,$idMaison,$payment);

                        // Add Salaire of Agents
                        $agence = new UserModel();
                        $getAgence = $agence->getAgence($idMaison);
                        $model->salaireAgence($getAgence->idAgence,$payment);
            
                        return redirect()->to(base_url("Client/Payment"))->with("msg","Your purchase request has just been registered");

                }
            }
    }
    
    public function suite()
    {

        if($this->request->getPost("firstPayment") == ""){
            return redirect()->to(base_url("Client/payment"))->with("msg","Empty, Fill in the number bar for Pay!");
        }
        else if($this->request->getPost("firstPayment") < 0){
            return redirect()->to(base_url("Client/payment"))->with("msg","Fatal Error, Number value error!");
        }
        else if($this->request->getPost("firstPayment") < 100000){
            return redirect()->to(base_url("Client/payment"))->with("msg","Please, You must pay at least 100,000!");
        }
        else{
          $model = new PayModel();
          $creditModel = new LoginModel();
          $historique = new HistoryModel();

          $idClient = $this->session->get("idUser");
          $idMaison = $this->request->getPost("idMaison");
          $payment = $this->request->getPost("firstPayment");

          $voir = $creditModel->getSold($idClient);

            if ($payment <= $voir->solde) {
                $credit = $voir->solde - $payment;
                $reste = $model->theHouse($idMaison)->reste - $payment;

                $model->payment($idMaison,$reste);
                $model->creditCompte($idClient,$credit);
                $historique->insertHistory($idClient,$idMaison,$payment);

                // Add Salaire of Agents
                $agence = new UserModel();
                $idAgence = $agence->getAgence($idMaison);
                $model->salaireAgence($idAgence->idAgence,$payment);

                    if ($this->session->get('security') == 1) {
                        return redirect()->to(base_url("Client/Payment/"));
                    }

                    elseif ($this->session->get('security') == 2) {
                        return redirect()->to(base_url("Client/Payment/respectContrat/"));
                    }

                } else if ($payment > $voir->solde){
                
                    if ($this->session->get('security') == 1) {
                        return redirect()->to(base_url("Client/Payment"))->with("msg","Your money is insufficient");
                    }
                    elseif ($this->session->get('security') == 2) {
                        return redirect()->to(base_url("Client/Payment/respectContrat/"))->with("msg","Your money is insufficient");
                    }
            }
        }
    }
}
