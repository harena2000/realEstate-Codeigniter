<?php
    namespace App\Controllers\Client;

    use App\Controllers\BaseController;
    use App\Models\UserModel;    
    
    class Edit extends BaseController
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
            if($this->session->get('security') != 1)
                return redirect()->to('/');

            $update = new UserModel();

            $id = $this->session->get('idUser');
            $name = $this->request->getPost('name');
            $firstName = $this->request->getPost('firstName');
            $sexe = $this->request->getPost('sexe');
            $dateNaissance = $this->request->getPost('dateNaissance');
            $lieuNaissance = $this->request->getPost('lieuNaissance');
            $adresse = $this->request->getPost('adresse');
            $ville = $this->request->getPost('ville');
            $pays = $this->request->getPost('pays');
            $status = $this->request->getPost('status');
            $contact = $this->request->getPost('contact');
            $profession = $this->request->getPost('profession');

            $update->updateClient($id, $name, $firstName, $sexe,$dateNaissance, $lieuNaissance, $adresse, $ville, $pays,
                                        $status, $contact, $profession);
                            
            return redirect()->to("Profil");    
        }

        public function uploadImage()
        {
            $imageBlob = $this->request->getPost("image");
            $icon = 'info';
            $success = false;
            $msg = 'No message';
            $fn = 'Image empty';

            if ($imageBlob != "") {
                $remove_type = explode(";", $imageBlob);
            
                $remove_base = explode(",", $remove_type[1]);
                $final_data = $remove_base[1];

                $final_data_de = base64_decode($final_data);


                $fn = $this->session->get("idUser").'.png';
                file_put_contents("assets/img/User/".$fn, $final_data_de);

                $success = true;
                $icon = "success";
                $msg = "Image update with Success";
            }

            else {
                $success = false;
                $msg = "No image was Selected!";
                $icon = "error";
                $fn = "empty";
            }

            $response = [
                'icon' => $icon,
                'success' =>$success,
                'data' => $fn,
                'msg' => $msg,
            ];
 
            $upload = new UserModel();
            $upload->uploadProfil($this->session->get("emailUser"),$fn);

            return $this->response->setJSON($response);
        }
    }
?>