<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model {

        public function getClient($mail){
            $query = "SELECT * FROM (client,user,pays) WHERE emailClient = ? and emailClient = emailUser and idPays = pays";
            $resultat = $this->db->query($query, array($mail));

            return $resultat->getRow();
        }

        public function getAgence($idMaison)
        {
            $query = "SELECT * FROM (agence,agence_maison) WHERE agence_maison.idMaison = ? and agence.idAgence = agence_maison.idAgence";
            $resultat = $this->db->query($query, array($idMaison));

            return $resultat->getRow();
        }

        public function updateClient($id, $name, $firstName, $sexe, $dateNaissance, $lieuNaissance, $adresse, $ville, $pays, $status, $contact, $profession)
        {
            $table = $this->db->table("client");
            $table->where('idClient', $id);
            $element = [
                "nomClient" => "$name",
                "prenomClient" => "$firstName",
                "sexe" => $sexe,
                "dateNaissanceClient" => $dateNaissance,
                "lieuNaissanceClient" => $lieuNaissance,
                "adresse" => "$adresse",
                "ville" => "$ville",
                "pays" => "$pays",
                "status" => "$status",
                "contactClient" => "$contact",
                "profession" => "$profession"
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
            $query = "SELECT * FROM (client,user) WHERE emailUser = ? and emailClient = emailUser";
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
            $table = $this->db->table("client");
            $table->where('emailClient', $mail);
            $element = [
               "emailClient" => $newMail
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

    }
?>