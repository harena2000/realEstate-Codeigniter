<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\LoginModel;
    use App\Models\AgenceModel\HouseModel;
    use CodeIgniter\Validation\Validation;


class Forgot extends BaseController{

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
                "message" => $msg,
            ];
            return view("forgot_password",$data);
        }    

        public function change()
        {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('newPassword');
            $codeConf = $this->request->getPost('codeConf');

            $model = new LoginModel();
            $mailExist = $model->verifyMail($email);

            if ($mailExist != null) {

                $codeExist = $model->verifyCode($email,md5(intval($codeConf)));

                if ($codeExist != null) {
                    
                    $model->updatePassword($email,$password);

                    return redirect()->to(base_url('/'))->with("success","Your password is Updated with successful");
 
                }

                else {
                    ;
                    return redirect()->to(base_url('Forgot'))->with("msg","$codeConf Confirmation code Incorrect");
                }
                
            }
            else {
                // return redirect()->to(base_url('Forgot'))->with("msg","This account doesn't exist anyway!");
            }

        }
    }
?>