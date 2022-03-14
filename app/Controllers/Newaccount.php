<?php
    namespace App\Controllers;

    use App\Controllers\BaseController;
    use App\Models\LoginModel;
    use CodeIgniter\Validation\Validation;

class Newaccount extends BaseController{

        public function __construct()
        {
            helper(['form']);  
            $this->validate =  \Config\Services::validation();   
        }

        public function index(){

            $pays = new LoginModel();

            $data = [ "pays" => $pays->allPays() ];

            return view('newaccount',$data);
        }

        public function agence(){

            $pays = new LoginModel();

            $data = [ "pays" => $pays->allPays() ];

            return view('newaccountAgence',$data);
        }
    }
?>