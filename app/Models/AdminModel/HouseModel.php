<?php
    namespace App\Models\AdminModel;
    use CodeIgniter\Model;

    class HouseModel extends Model {

        public function getAllHouse(){
          
          $querry = "SELECT * from maison";
          $resultat = $this->db->query($querry);
          return $resultat->getResult();

        }

        public function styleSite()
        {
          $querry = "SELECT * from (maison,pays) 
                    where maison.paysMaison = pays.idPays
                    order by maison.idMaison ASC LIMIT 10";
          $resultat = $this->db->query($querry);
          return $resultat->getResult();
        }

        public function ForSaleHouse()
        {
          $querry = "SELECT * from maison where statusMaison = ?";
          $resultat = $this->db->query($querry,array(0));
          return $resultat->getResult();
        }

        public function HouseSold()
        {
          $querry = "SELECT * from maison where statusMaison = ?";
          $resultat = $this->db->query($querry,array(1));
          return $resultat->getResult();
        }

        public function getHouse($id)
        {
          $query = "SELECT * FROM maison,agence_maison,agence,user WHERE maison.idMaison = ? 
                    and maison.idMaison = agence_maison.idMaison
                    and agence.idAgence = agence_maison.idAgence
                    and agence.emailAgence = user.emailUser";
          $resultat = $this->db->query($query, array($id));

          return $resultat->getRow();
        }

        public function statHouse($id)
        {
          $query = "SELECT * FROM maison,achete,client WHERE maison.idMaison = ? 
                    and achete.idMaison = maison.idMaison 
                    and client.idClient = achete.idClient GROUP BY maison.idMaison";
          $resultat = $this->db->query($query, array($id));

          return $resultat->getRow();
        }

        public function myHouse($idClient)
        {
          $querry = "SELECT * from achete,maison,agence_maison where idClient = ? 
                    and achete.idMaison = maison.idMaison 
                    and maison.idMaison = agence_maison.idMaison 
                    ORDER BY contrat ASC";
          $resultat = $this->db->query($querry, array($idClient));

          return $resultat->getResult();
        }

        public function myHouseAgents($idAgence)
        {
          $querry = "SELECT * from agence_maison,maison where idAgence = ? 
                    and agence_maison.idMaison = maison.idMaison ORDER BY idAgenceMaison ASC";
          $resultat = $this->db->query($querry, array($idAgence));

          return $resultat->getResult();
        }

        public function lastHouseAdd()
        {
          $querry = "SELECT * from maison ORDER BY idMaison DESC LIMIT 4";
          $resultat = $this->db->query($querry);

          return $resultat->getResult();
        }

        
        public function countHouseAgence($idAgence)
        {
          $querry = "SELECT count(*) as countHouse from agence_maison WHERE idAgence = ?";
          $resultat = $this->db->query($querry,array($idAgence));

          return $resultat->getRow();
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

        public function searchHouse($keyword)
        {
          $querry = "SELECT * from maison
                      WHERE nomMaison LIKE ? 
                      OR adresseMaison LIKE ? 
                      OR villeMaison LIKE ? 
                      OR description LIKE ? ";
          $resultat = $this->db->query($querry,array("%$keyword%","%$keyword%","%$keyword%","%$keyword%"));

          return $resultat->getResult();
        }
    }
?>