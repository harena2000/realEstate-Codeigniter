<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class HouseModel extends Model {

        public function getAllHouse(){
          
          $querry = "SELECT * from maison order by prix DESC";
          $resultat = $this->db->query($querry);
          return $resultat->getResult();

        }

        public function ForSaleHouse()
        {
          $querry = "SELECT * from maison where statusMaison = ?";
          $resultat = $this->db->query($querry,array(0));
          return $resultat->getResult();
        }

        public function getHouse($id)
        {
          $query = "SELECT * FROM maison,pays WHERE idMaison = ? and idPays = paysMaison";
          $resultat = $this->db->query($query, array($id));

          return $resultat->getRow();
        }

        public function getHouseAgent($id)
        {
          $querry = "SELECT * from (maison,agence,agence_maison,pays,user) 
                    where maison.idMaison = ? 
                    and agence.idAgence = agence_maison.idAgence 
                    and maison.idMaison = agence_maison.idMaison
                    and maison.paysMaison = pays.idPays
                    and emailUser = emailAgence";

          $resultat = $this->db->query($querry,array($id));
          return $resultat->getRow();
        }

        public function verifyRemise($idClient)
        {
          $querry = "SELECT count(*) as counting from (achete) WHERE idClient = ?";
          $resultat = $this->db->query($querry,array($idClient));
          return $resultat->getRow();
        }

        public function styleSite()
        {
          $querry = "SELECT * from (maison,pays) 
                    where maison.paysMaison = pays.idPays
                    order by maison.idMaison ASC LIMIT 10";
          $resultat = $this->db->query($querry);
          return $resultat->getResult();
        }

        public function lastHouseAdd()
        {
          $querry = "SELECT * from maison ORDER BY idMaison DESC LIMIT 4";
          $resultat = $this->db->query($querry);

          return $resultat->getResult();
        }

        public function allPays()
        {
            $query = "SELECT * FROM pays";
            $resultat = $this->db->query($query);

            return $resultat->getResult();
        }

        public function getCountImageRoom($idMaison, $nomChambre)
        {
          $querry = "SELECT count(*) as countRoom from maison_image WHERE idMaison = ? and nomChambre = ?";
          $resultat = $this->db->query($querry,array($idMaison,$nomChambre));

          return $resultat->getRow();
        }

        public function getCountRoomImage($idMaison)
        {
          $querry = "SELECT count(*) as nombreRoom from maison_image WHERE idMaison = ?";
          $resultat = $this->db->query($querry,array($idMaison));

          return $resultat->getRow();
        }
        
        public function getRoomImage($idMaison)
        {
          $querry = "SELECT * from maison_image WHERE idMaison = ?";
          $resultat = $this->db->query($querry,array($idMaison));

          return $resultat->getResult();
        }

        public function getBedroom($idMaison)
        {
          $querry = "SELECT * FROM maison_image WHERE idMaison = ? AND nomChambre LIKE '%bedroom%'";
          $resultat = $this->db->query($querry,array($idMaison));

          return $resultat->getResult();
        }

        public function getKitchen($idMaison)
        {
          $querry = "SELECT * from maison_image WHERE idMaison = ? and nomChambre LIKE '%kitchen%'";
          $resultat = $this->db->query($querry,array($idMaison));

          return $resultat->getResult();
        }

        public function getBathroom($idMaison)
        {
          $querry = "SELECT * from maison_image WHERE idMaison = ? and nomChambre LIKE '%bathroom%'";
          $resultat = $this->db->query($querry,array($idMaison));

          return $resultat->getResult();
        }

        public function getGarage($idMaison)
        {
          $querry = "SELECT * from maison_image WHERE idMaison = ? and nomChambre LIKE '%garage%'";
          $resultat = $this->db->query($querry,array($idMaison));

          return $resultat->getResult();
        }

    }
?>