<?php
    namespace App\Controllers\Admin;

    use App\Controllers\BaseController;
    use App\Models\AdminModel\CrudHouse;
    
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
          if($this->session->get('security') != 0)
            return redirect()->to('/');

            $donnee = [
              "isActive" => 3,
              "title" => "Add new House",
              // "message" => $msg,
              // "proprety" => $model->getHouse($id),
              // "stats" => $model->statHouse($id)
          ];

            echo view("Templates/Admin/header",$donnee);
            echo view("Admin/newHouse");
            echo view("Templates/Admin/footer");   
        }

        public function ouvrir()
        {

          if($this->session->get('security') != 0)
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
          $douche = $this->request->getPost('douche');
          $garage = $this->request->getPost('garage');
          $prix = $this->request->getPost('prix');
          $description = $this->request->getPost('description');

          if ($idMaison == null) {
            $insert->insertHouse($nomMaison, $adresseMaison, $villeMaison, $paysMaison, 
                                $couleur, $grandeur, $chambre, $douche, $garage, $prix, $description);
                          
            return redirect()->to(base_url("Admin/Allhouse"));  
          }
          else {
            $insert->updateHouse($idMaison,$nomMaison, $adresseMaison, $villeMaison, $paysMaison, 
                                $couleur, $grandeur, $chambre, $douche, $garage, $prix, $description);
                          
            return redirect()->to(base_url("Admin/House/index/".$idMaison)); 
          }
        }

        function upload()
        {
            $upload = new CrudHouse();

            $idMaison = $this->request->getPost('idMaison');  
            
            $file = $this->request->getFile('image');
            $file->move('assets/img/House/',$idMaison.".jpg");
            $upload->uploadHouse($idMaison,$idMaison.".jpg");

            return redirect()->to('')->with('msg','Success Image Upload');
        }

    }
?>