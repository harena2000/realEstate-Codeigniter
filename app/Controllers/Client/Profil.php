<?php

namespace App\Controllers\Client;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\LoginModel;

class Profil extends BaseController
{
    public function __construct()
    {         
        helper(["form", "url"]);
        $this->session = session();  
        $this->session->start();        
    }
    
    public function index()
    {
        if($this->session->get('security') != 1)
                return redirect()->to('/');
            
            $search = new UserModel();
            $pays = new LoginModel();

            $msg = session()->getFlashdata("msg");

            $donnee = [
                "isActive" => 6,
                "title" => "User Profil",
                "message" => $msg,
                "pays" => $pays->allPays(),
                "liste" => $search->getClient($this->session->get('emailUser'))
            ];    

        echo view("Templates/header",$donnee);
        echo view("Client/profil",$donnee);
        echo view("Templates/footer");   
    }

    public function AccountSetting()
    {
        if($this->session->get('security') != 1)
            return redirect()->to('/');

            $msg = session()->getFlashdata("msg");
            $error = session()->getFlashdata("error");
            $success = session()->getFlashdata("success");

            $donnee = [
                "isActive" => 6,
                "title" => "Setting",
                "message" => $msg,
                "error" => $error,
                "success" => $success
            ];    

            echo $error;

        echo view("Templates/header",$donnee);
        echo view("Client/accountSetting",$donnee);
        echo view("Templates/footer");
    }

    public function changeMail($emailCurrent,$password)
    {
        if($this->session->get('security') != 1)
            return redirect()->to('/');

            $verify = new UserModel();

            if ($verify->verifyMail($emailCurrent) == null) {

                if ($verify->checkPassword($this->session->get("emailUser"),$password) != null) {
                    
                    $verify->updateEmailUser($this->session->get("emailUser"),$emailCurrent);
                    $verify->updateEmailClient($this->session->get("emailUser"),$emailCurrent);

                    $this->session->set("emailUser",$emailCurrent);
                    return redirect()->to(base_url("Client/Profil/AccountSetting"))->with("success","Changed with success");
                }
                else{
                    return redirect()->to(base_url("Client/Profil/AccountSetting"))->with("error","Incorrect password");
                }
            }
            else if ( $verify->verifyMail($emailCurrent) != null ) {
                return redirect()->to(base_url("Client/Profil/AccountSetting"))->with("msg","This email is already exists!");
            }

    }

    public function changePassword()
    {
        if($this->session->get('security') != 1)
            return redirect()->to('/');

            $lastPassword = $this->request->getPost("lastPassword");
            $newPassword = $this->request->getPost("newPassword");

            $verify = new UserModel();
                
            if ($verify->checkPassword($this->session->get("emailUser"),$lastPassword) != null) {
                    
                $verify->updatePassword($this->session->get("emailUser"),$newPassword);

                return redirect()->to(base_url("Client/Profil/AccountSetting"))->with("success","Changed with success");
            }
            else{
                return redirect()->to(base_url("Client/Profil/AccountSetting"))->with("error","Incorrect password");
            }

    }

}
