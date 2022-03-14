<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\UserModel;
use App\Models\LoginModel;

class Profil extends BaseController
{
    public function __construct()
    {         
        helper(["form", "url"]);
        $this->validate =  \Config\Services::validation();
        $this->session = session();  
        $this->session->start();        
    }
    
    public function index()
    {
        if($this->session->get('security') != 3)
                return redirect()->to('/');
            
            $search = new UserModel();

            $msg = session()->getFlashdata("msg");
            $pays = new LoginModel();

            $donnee = [
                "isActive" => 5,
                "title" => "Agence Profil",
                "message" => $msg,
                "pays" => $pays->allPays(),
                "liste" => $search->getAgence($this->session->get('idUser'), $this->session->get('emailUser'))
            ];    

        echo view("Templates/Agence/header",$donnee);
        echo view("Agence/profil",$donnee);
        echo view("Templates/Agence/footer");   
    }

    
    public function AccountSetting()
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');

            $msg = session()->getFlashdata("msg");
            $error = session()->getFlashdata("error");
            $success = session()->getFlashdata("success");

            $donnee = [
                "isActive" => 5,
                "title" => "Setting",
                "message" => $msg,
                "error" => $error,
                "success" => $success
            ];    

            echo $error;

        echo view("Templates/Agence/header",$donnee);
        echo view("Agence/accountSetting",$donnee);
        echo view("Templates/Agence/footer");
    }

    public function changeMail($emailCurrent,$password)
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');

            $verify = new UserModel();
            $psd = new LoginModel();

            if ($verify->verifyMail($emailCurrent) == null) {

                if ($verify->checkPassword($this->session->get("emailUser"),$password) != null) {
                    
                    $verify->updateEmailUser($this->session->get("emailUser"),$emailCurrent);
                    $verify->updateEmailClient($this->session->get("emailUser"),$emailCurrent);

                    $this->session->set("emailUser",$emailCurrent);
                    return redirect()->to(base_url("Agence/Profil/AccountSetting"))->with("success","Changed with success");
                }
                else{
                    return redirect()->to(base_url("Agence/Profil/AccountSetting"))->with("error","Your password is Incorect");
                }
            }
            else if ( $verify->verifyMail($emailCurrent) != null ) {
                return redirect()->to(base_url("Agence/Profil/AccountSetting"))->with("error","This email is already exists!");
            }

    }

    public function changePassword()
    {
        if($this->session->get('security') != 3)
            return redirect()->to('/');

            $lastPassword = $this->request->getPost("lastPassword");
            $newPassword = $this->request->getPost("newPassword");

            $verify = new UserModel();
                
            if ($verify->checkPassword($this->session->get("emailUser"),$lastPassword) != null) {
                    
                $verify->updatePassword($this->session->get("emailUser"),$newPassword);

                return redirect()->to(base_url("Agence/Profil/AccountSetting"))->with("success","Your Password is updated with success");
            }
            else{
                return redirect()->to(base_url("Agence/Profil/AccountSetting"))->with("error","Incorrect Current Password");
            }

    }

}
