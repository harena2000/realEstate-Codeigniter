<?php
    namespace App\Models\AgenceModel;
    use CodeIgniter\Model;

    class CrudHouse extends Model {

      public function insertHouse($nom,$adresse,$ville,$pays,$couleur,
                                  $grandeur,$chambre,$cuisine,$douche,$garage,$prix,$nomMaison,$description)
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
            "cuisine" => $cuisine,
            "douche" => $douche,
            "garage" => $garage,
            "prix" => $prix,
            "imgMaison" => $nomMaison,
            "description" => $description
        ];

        $table->insert($element);
        
      }  

      public function getIdHouse()
      {
        $query = "SELECT * FROM maison ORDER BY idMaison DESC LIMIT 1";
        $resultat = $this->db->query($query);

        return $resultat->getRow();
      }

      public function insertAgence_house($idUser, $idMaison)
      {
        $table = $this->db->table("agence_maison");

        $element = [
            "idAgence" => $idUser,
            "idMaison" => $idMaison
        ];

        $table->insert($element);
      }
      
      public function updateHouse($idMaison,$nomMaison, $adresseMaison, $villeMaison, $paysMaison, 
                                  $couleur, $grandeur, $chambre, $cuisine, $douche, $garage, $prix, $description)
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
              "cuisine" => $cuisine,
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
      function saveImageHouse($idMaison,$nomChambre,$image)
      {
        $table = $this->db->table("maison_image");

        $element = [
            "idMaison" => $idMaison,
            "nomChambre" => $nomChambre,
            "imgChambre" => $image
        ];

        $table->insert($element);
      }

    }
?>