<?php
    namespace App\Models\AgenceModel;
    use CodeIgniter\Model;

    class HouseModel extends Model {

        public function getAllHouse(){
          
          $querry = "SELECT * from maison";
          $resultat = $this->db->query($querry);
          return $resultat->getResult();

        }

        public function getAllHouseAgence($idAgence){
          
          $querry = "SELECT * from (maison,agence,agence_maison,pays) 
                    where agence_maison.idAgence = ? 
                    and agence.idAgence = agence_maison.idAgence 
                    and maison.idMaison = agence_maison.idMaison
                    and maison.paysMaison = pays.idPays
                    order by maison.idMaison DESC LIMIT 4";
          $resultat = $this->db->query($querry,array($idAgence));
          return $resultat->getResult();

        }

        public function getAllHouse_Agence($idAgence){
          
          $querry = "SELECT * from (maison,agence,agence_maison,pays) 
                    where agence_maison.idAgence = ? 
                    and agence.idAgence = agence_maison.idAgence 
                    and maison.idMaison = agence_maison.idMaison
                    and maison.paysMaison = pays.idPays
                    order by maison.idMaison";
          $resultat = $this->db->query($querry,array($idAgence));
          return $resultat->getResult();

        }

        public function styleSite($idAgence)
        {
          $querry = "SELECT * from (maison,agence,agence_maison,pays) 
                    where agence_maison.idAgence = ? 
                    and agence.idAgence = agence_maison.idAgence 
                    and maison.idMaison = agence_maison.idMaison
                    and maison.paysMaison = pays.idPays
                    order by maison.idMaison ASC LIMIT 10";
          $resultat = $this->db->query($querry,array($idAgence));
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
          $query = "SELECT * FROM maison,pays WHERE idMaison = ? and idPays = paysMaison";
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
          $querry = "SELECT * from achete,maison where idClient = ? 
                    and achete.idMaison = maison.idMaison ORDER BY contrat ASC";
          $resultat = $this->db->query($querry, array($idClient));

          return $resultat->getResult();
        }

        public function lastHouseAdd()
        {
          $querry = "SELECT * from maison ORDER BY idMaison DESC LIMIT 3";
          $resultat = $this->db->query($querry);

          return $resultat->getResult();
        }

        public function lastIdMaison()
        {
          $querry = "SELECT * from maison ORDER BY idMaison DESC LIMIT 1";
          $resultat = $this->db->query($querry);

          return $resultat->getRow();

        }

        public function lastIdImage()
        {
          $querry = "SELECT * from maison_image ORDER BY idMaisonImage DESC LIMIT 1";
          $resultat = $this->db->query($querry);

          return $resultat->getRow();
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

        public function deleteMaison($idMaison)
        {
           $table = $this->db->table("maison");
            $table->where('idMaison', $idMaison)->delete();
        }

        public function deleteAgenceMaison($idMaison)
        {
           $table = $this->db->table("agence_maison");
            $table->where('idMaison', $idMaison)->delete();
        }
        
        public function deleteMaisonImage($idMaison)
        {
           $table = $this->db->table("maison_image");
            $table->where('idMaison', $idMaison)->delete();
        }

        public function searchHouse($keyword,$idAgence)
        {
          $querry = "SELECT * from maison,agence_maison
                      WHERE (nomMaison LIKE ? 
                      OR adresseMaison LIKE ? 
                      OR villeMaison LIKE ? 
                      OR description LIKE ?)
                      and (agence_maison.idAgence = ? and agence_maison.idMaison = maison.idMaison) ";
          $resultat = $this->db->query($querry,array("%$keyword%","%$keyword%","%$keyword%","%$keyword%",$idAgence));

          return $resultat->getResult();
        }
    }
?>