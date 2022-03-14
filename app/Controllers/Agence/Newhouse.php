<?php
    namespace App\Controllers\Agence;

    use App\Controllers\BaseController;
    use App\Models\AgenceModel\CrudHouse;
    use App\Models\AgenceModel\HouseModel;
    use App\Models\LoginModel;
    
    class Newhouse extends BaseController
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

            $paysMaison = new LoginModel();
            $house = new HouseModel();

            $msg = session()->getFlashdata("msg");
            $info = session()->getFlashdata("msg");

            $lastIdMaison = ($house->lastIdMaison() == null) ? 1 : $house->lastIdMaison()->idMaison;
              

            $donnee = [
              "isActive" => 4,
              "title" => "Add new House",
              "message" => $msg,
              "info" => $info,
              "pays" => $paysMaison->allPays(),
              "lastIdMaison" => $lastIdMaison
              // "stats" => $model->statHouse($id)
          ];

            echo view("Templates/Agence/header",$donnee);
            echo view("Agence/newHouse");
            echo view("Templates/Agence/footer");   
        }

        public function ouvrir()
        {

          if($this->session->get('security') != 3)
            return redirect()->to('/');

          $insert = new CrudHouse();

          $idMaison = $this->request->getPost('idMaison');    
          $nomMaison = $this->request->getPost('nomMaison');
          $adresseMaison = $this->request->getPost('adresseMaison');
          $villeMaison = $this->request->getPost('villeMaison');
          $paysMaison = $this->request->getPost('paysMaison');
          $couleur = $this->request->getPost('couleur');
          $grandeur = $this->request->getPost('area');
          $chambre = $this->request->getPost('chambre');
          $cuisine = $this->request->getPost('cuisine');
          $douche = $this->request->getPost('douche');
          $garage = $this->request->getPost('garage');
          $prix = $this->request->getPost('prix');
          $description = $this->request->getPost('description');

          $dossierImage = $this->request->getFile('dossierImage');
          $lastIdMaison = $this->request->getPost('lastIdMaison');

          if ($idMaison == null) {
            
            $idMaison = $lastIdMaison + 1;
            $nomFichier = "affiche".$idMaison.".jpg";
            $dossierImage->move("assets/img/House/$idMaison/", $nomFichier);

            $insert->insertHouse($nomMaison, $adresseMaison, $villeMaison, $paysMaison, 
                                $couleur, $grandeur, $chambre, $cuisine, $douche, $garage, $prix, $nomFichier, $description);

            $getIdHouse = $insert->getIdHouse()->idMaison;

            $insert->insertAgence_House($this->session->get("idUser"),$getIdHouse);
                          
            return redirect()->to(base_url("Agence/Allhouse"))->with("success","House Added Successfully!!!");  
          }
          else {
            $insert->updateHouse($idMaison,$nomMaison, $adresseMaison, $villeMaison, $paysMaison, 
                                $couleur, $grandeur, $chambre, $cuisine, $douche, $garage, $prix, $description);
                          
            return redirect()->to(base_url("Agence/House/index/".$idMaison)); 
          }
        }

        function uploadImage()
        {
            $imageBlob = $this->request->getPost("image");
            $idMaison = $this->request->getPost("idMaison");
            $icon = 'info';
            $success = false;
            $msg = 'No message';
            $fn = 'Image empty';


            // if ($imageBlob != "") {
                $remove_type = explode(";", $imageBlob);
            
                $remove_base = explode(",", $remove_type[1]);
                $final_data = $remove_base[1];

                $final_data_de = base64_decode($final_data);


                $fn = "affiche".$idMaison.'.png';
                file_put_contents("assets/img/House/$idMaison/".$fn, $final_data_de);

                $success = true;
                $icon = "success";
                $msg = "Image update with Success";
            // }

            // else {
            //     $success = false;
            //     $msg = "No image was Selected!";
            //     $icon = "error";
            //     $fn = "empty";
            // }

            $response = [
                'icon' => $icon,
                'success' =>$success,
                'data' => $fn,
                'msg' => $msg,
            ];
 
            $upload = new CrudHouse();
            $upload->uploadHouse($idMaison,$fn);

            return $this->response->setJSON($response);
        }

    }
?>