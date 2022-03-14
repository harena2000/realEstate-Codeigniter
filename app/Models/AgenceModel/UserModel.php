<?php
    namespace App\Models\AgenceModel;
    use CodeIgniter\Model;

    class UserModel extends Model {

        public function getAgence($id,$mail){
            $query = "SELECT * FROM (agence,user,pays) WHERE idAgence = ? and emailUser = ? and idPays = paysAgence";
            $resultat = $this->db->query($query, array($id,$mail));

            return $resultat->getRow();
        }

        public function getClient($id){
            $query = "SELECT * FROM (client,user,pays) WHERE client.idClient = ? and emailUser = emailClient and idPays = pays";
            $resultat = $this->db->query($query, array($id));

            return $resultat->getRow();
        }

        public function updateAgence($id, $name, $firstName, $sexe, $lieuNaissance, $dateNaissance, $adresse, $ville, $pays,
                                         $status, $experience, $contact)
        {
            $table = $this->db->table("agence");
            $table->where('idAgence', $id);
            $element = [
                "nomAgence" => $name,
                "prenomAgence" => $firstName,
                "sexeAgence" => $sexe,
                "lieuNaissanceAgence" => $lieuNaissance,
                "dateNaissanceAgence" => $dateNaissance,
                "adresseAgence" => $adresse,
                "villeAgence" => $ville,
                "paysAgence" => $pays,
                "statusAgence" => $status,
                "anneeExperience" => $experience,
                "contactAgence" => $contact
            ];

            $table->update($element);
        }

        public function uploadProfil($mail, $img)
        {
            $table = $this->db->table("user");
            $table->where('emailUser', $mail);
            $element = [
               "pdpUser" => $img
            ];

            $table->update($element);
        }

        
        public function verifyMail($email)
        {
            $query = "SELECT * FROM (agence,user) WHERE emailUser = ? and emailAgence = emailUser";
            $resultat = $this->db->query($query, array($email));

            return $resultat->getRow();
        }

        public function checkPassword($email,$password)
        {
            $password = md5($password);
        
            $query = "SELECT * FROM user WHERE emailUser = ? and password = ?";
            $resultat = $this->db->query($query, array("$email","$password"));

            return $resultat->getRow();
        }

        public function updateEmailUser($mail, $newMail)
        {
            $table = $this->db->table("user");
            $table->where('emailUser', $mail);
            $element = [
               "emailUser" => $newMail
            ];

            $table->update($element);
        }

        public function updateEmailClient($mail, $newMail)
        {
            $table = $this->db->table("agence");
            $table->where('emailAgence', $mail);
            $element = [
               "emailAgence" => $newMail
            ];

            $table->update($element);
        }

        public function updatePassword($mail, $newPassword)
        {
            $password = md5($newPassword);
            $table = $this->db->table("user");
            $table->where('emailUser', $mail);
            $element = [
               "password" => $password
            ];

            $table->update($element);
        }

        public function getAllClient($nameChat)
        {
            $query = "SELECT * FROM client WHERE NOT EXISTS 
                        (SELECT null FROM message_group where groupName = ? 
                        and message_group.emailClient = client.emailClient)";

            $resultat = $this->db->query($query,array($nameChat));

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
    }
?>