<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\LoginModel;
    use App\Models\AgenceModel\HouseModel;
    use CodeIgniter\Validation\Validation;


class Login extends BaseController{

        public function __construct()
        {
            helper(['form', 'url']);
            $this->session = session();
            $this->session->start();   
        }

        public function index(){

            $msg = session()->getFlashdata("msg");
            $success = session()->getFlashdata("success");

            $data = [
                "error" => $msg,
                "success" => $success
            ];
            return view("login",$data);
        }

        public function identified(){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $loginModel = new LoginModel();

            //Check Mail and Password Add
            $res = $loginModel->getEmailAndPassword($email, $password);

            if ($res != null){
                //session

                //Check permission if the user have ADMIN PERMISSION

                if ($res->permision == 0) {

                    //Check if the user respect her Contract

                    if ($res->disable == 0) {
                                        
                        $sold = $loginModel->getSold($loginModel->getIdUser($email)->idClient);
                        
                        $this->session->set('security', 1);
                        $this->session->set('idUser',$loginModel->getIdUser($email)->idClient);
                        $this->session->set('emailUser',$loginModel->verifyMail($email)->emailUser);


                        // AUTO GENERATE SOLD

                        if ($sold != null) {

                            if ($sold->solde > 0) {
                                return redirect()->to(base_url('Client/Acceuil'));
                            } else {
                                $debit = 20000000;
                                $loginModel->emptyCompte($loginModel->getIdUser($email)->idClient,$debit);
                                return redirect()->to(base_url('Client/Acceuil'))->with("msg","Your Account has been accredited");
                            }
                        }
                        else{
                            $loginModel->creditCompte($loginModel->getIdUser($email)->idClient);
                            return redirect()->to(base_url('Client/Acceuil'))->with("msg","Your Account has been added and accredited");
                        }
                    }
                    
                    //Redirect to Payment to complete Contract

                    else {
                        $this->session->set('security', 2);
                        $this->session->set('idUser',$loginModel->getIdUser($email)->idClient);
                        return redirect()->to(base_url('Client/Payment/respectContrat/'))->with("msg","Your account is Deactive until you finished to pay!");
                    }
                
                //If user Have ADMIN PERMISSION, Redirect to ADMIN PAGE

                } else if($res->permision == 1) {
                    $this->session->set('security', 0);
                    return redirect()->to(base_url('Admin/Acceuil'));
                }

                // If user is an Agence Permission, Redirect to AGENCE PAGE
                else if ($res->permision == 2) {

                    $house = new HouseModel();
                    
                    $this->session->set('idUser',$loginModel->getIdAgence($email)->idAgence);
                    $this->session->set('emailUser',$loginModel->verifyMail($email)->emailUser);

                    $countHouse = $house->countHouseAgence($loginModel->getIdAgence($email)->idAgence);

                    if ($countHouse->countHouse != 0) {
                        $this->session->set('security', 3);
                        $this->session->set('idUser',$loginModel->getIdAgence($email)->idAgence);
                        return redirect()->to(base_url('Agence/Acceuil'));
                    }
                    else if($countHouse->countHouse == 0) {
                        $this->session->set('security', 3);
                        $this->session->set('idUser',$loginModel->getIdAgence($email)->idAgence);
                        return redirect()->to(base_url('Agence/Newhouse'))->with("msg","Add your first activity");
                    }
                    

                }
            }
            else {
                return redirect()->to("/")->with("msg","Username not found! Verify your email or password");
            }
        }
        
        public function logout(){
            $this->session->destroy();
            return redirect()->to('/');
        }      
    }
?>