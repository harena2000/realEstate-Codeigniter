<?php
    namespace App\Models\AdminModel;
    use CodeIgniter\Model;

    class UserModel extends Model {

        public function getClient($id){
            $query = "SELECT * FROM (client,user,pays) WHERE idClient = ? and emailClient = emailUser
                        and idPays = pays";
            $resultat = $this->db->query($query, array($id));

            return $resultat->getRow();
        }

        public function getAgents($id){
            $query = "SELECT * FROM (agence,user,pays) WHERE idAgence = ? and emailAgence = emailUser
                        and idPays = paysAgence";
            $resultat = $this->db->query($query, array($id));

            return $resultat->getRow();
        }

        public function allClient()
        {
            $query = "SELECT * FROM (client,user,pays) WHERE emailClient = emailUser 
                        and permision = ? and idPays = pays ORDER BY idClient ASC";
            $resultat = $this->db->query($query,array(0));

            return $resultat->getResult();
        }

        public function allAgents()
        {
            $query = "SELECT * FROM (agence,user,pays) WHERE emailAgence = emailUser 
                        and permision = ? and idPays = paysAgence ORDER BY idAgence ASC";
            $resultat = $this->db->query($query,array(2));

            return $resultat->getResult();
        }

        public function lastUsersAdd()
        {
          $querry = "SELECT * from client,user where permision = 0 and
                    emailUser = emailClient ORDER BY idClient DESC LIMIT 4";
                    
          $resultat = $this->db->query($querry);
          return $resultat->getResult();
        }

        public function searchClient($keyword)
        {
          $querry = "SELECT * from client,user
                      WHERE (nomClient LIKE ? 
                      OR prenomClient LIKE ? 
                      OR adresse LIKE ? 
                      OR ville LIKE ? 
                      OR pays LIKE ?
                      OR lieuNaissanceClient LIKE ?
                      OR profession LIKE ?) 
                      and (emailClient = emailUser)";
          $resultat = $this->db->query($querry,array("%$keyword%","%$keyword%","%$keyword%","%$keyword%","%$keyword%","%$keyword%","%$keyword%"));

          return $resultat->getResult();
        }

        public function searchAgence($keyword)
        {
          $querry = "SELECT * from agence,user
                      WHERE (nomAgence LIKE ? 
                      OR prenomAgence LIKE ? 
                      OR adresseAgence LIKE ? 
                      OR villeAgence LIKE ?
                      OR lieuNaissanceAgence LIKE ?)
                      and (emailAgence = emailUser)";
          $resultat = $this->db->query($querry,array("%$keyword%","%$keyword%","%$keyword%","%$keyword%","%$keyword%"));

          return $resultat->getResult();
        }
    }
?>