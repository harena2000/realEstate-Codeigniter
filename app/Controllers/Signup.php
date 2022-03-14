<?php
    namespace App\Controllers;

    use App\Models\LoginModel;    
    
    class Signup extends BaseController
    {
        public function __construct()
        {
            helper(['form']); 
            $this->session = session();  
            $this->session->start();   
        }
        public function index()
        {   
            $loginModel = new LoginModel();

            $name = $this->request->getPost('name');
            $firstName = $this->request->getPost('firstName');
            $sexe = $this->request->getPost('sexe');
            $lieuNaissance = $this->request->getPost('lieuNaissance');
            $dateNaissance = $this->request->getPost('dateNaissance');
            $adresse = $this->request->getPost('adresse');
            $ville = $this->request->getPost('ville');
            $pays = $this->request->getPost('pays');
            $status = $this->request->getPost('status');
            $contact = $this->request->getPost('contact');
            $profession = $this->request->getPost('profession');
            $email = $this->request->getPost('email');
            $Password = $this->request->getPost('newPassword');
            $codeConf = $this->request->getPost('codeConf');

            $verifyMail = $loginModel->verifyMail($email);

            if ($verifyMail == null) {
                $loginModel->addClient($email, $name, $firstName, $sexe, $dateNaissance, $lieuNaissance, $adresse,$ville, $pays,
                                         $status, $contact, $profession);
                                         
                $loginModel->addUser($email,$Password,0,intval($codeConf));
                    
                return redirect()->to("/")->with("success","User added with success"); 
            }
            else {
                return redirect()->to("/")->with("msg","This account is already exist"); 
            }
        }

        public function agent()
        {
            $loginModel = new LoginModel();

            $name = $this->request->getPost('name');
            $firstName = $this->request->getPost('firstName');
            $sexe = $this->request->getPost('sexe');
            $lieuNaissance = $this->request->getPost('lieuNaissance');
            $dateNaissance = $this->request->getPost('dateNaissance');
            $adresse = $this->request->getPost('adresse');
            $ville = $this->request->getPost('ville');
            $pays = $this->request->getPost('pays');
            $status = $this->request->getPost('status');
            $contact = $this->request->getPost('contact');
            $experience = $this->request->getPost('experience');
            $email = $this->request->getPost('email');
            $Password = $this->request->getPost('newPassword');
            $codeConf = $this->request->getPost('codeConf');

            $verifyMail = $loginModel->verifyMail($email);

            if ($verifyMail == null) {
                $loginModel->addAgent($email, $name, $firstName, $sexe, $lieuNaissance, $dateNaissance, $adresse, $ville, $pays,
                                         $status, $experience, $contact);
                                         
                $loginModel->addUser($email,$Password,2,intval($codeConf));
                    
                return redirect()->to("/")->with("success","Agent account added with success"); 
            }
            else {
                return redirect()->to("/")->with("msg","This account is already exist"); 
            }
        }

    }
?>