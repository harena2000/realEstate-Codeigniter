<?php
    namespace App\Models\AdminModel;
    use CodeIgniter\Model;

    class CrudHouse extends Model {

      public function insertHouse($nom,$adresse,$ville,$pays,$couleur,
                                  $grandeur,$chambre,$douche,$garage,$prix)
      {
        $table = $this->db->table("maison");

        $element = [
            "nomMaison" => $nom,
            "adresseMaison" => $adresse,
            "villeMaison" => $ville,
            "paysMaison" => $pays,
            "couleur" => $couleur,
            "grandeur" => $grandeur,
            "chambre" => $chambre,
            "douche" => $douche,
            "garage" => $garage,
            "prix" => $prix
        ];

        $table->insert($element);
        
      }  
      
      public function updateHouse($idMaison,$nomMaison, $adresseMaison, $villeMaison, $paysMaison, 
                                  $couleur, $grandeur, $chambre, $douche, $garage, $prix, $description)
      {
          $table = $this->db->table("maison");
            $table->where('idMaison', $idMaison);

            $element = [
              "nomMaison" => $nomMaison,
              "adresseMaison" => $adresseMaison,
              "villeMaison" => $villeMaison,
              "paysMaison" => $paysMaison,
              "couleur" => $couleur,
              "grandeur" => $grandeur,
              "chambre" => $chambre,
              "douche" => $douche,
              "garage" => $garage,
              "prix" => $prix,
              "description" => $description
            ];

            $table->update($element);
      }

      public function uploadHouse($idMaison,$img)
      {
          $table = $this->db->table("maison");
          $table->where('idMaison', $idMaison);

          $element = [
            "imgMaison" => $img
          ];

          $table->update($element);
      }
    }
?>