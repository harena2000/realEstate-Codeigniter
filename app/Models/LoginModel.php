<?php
    namespace App\Models;

    use CodeIgniter\Model;

class LoginModel extends Model{
    public function getEmailAndPassword($email, $password){

        $password = md5($password);
        
        $query = "SELECT * FROM user WHERE emailUser = ? and password = ?";
        $resultat = $this->db->query($query, array("$email","$password"));

        return $resultat->getRow();
    }

    public function getIdUser($email)
    {
        $query = "SELECT * FROM client WHERE emailClient = ?";
        $resultat = $this->db->query($query, array("$email"));

        return $resultat->getRow();
    }

    public function getIdAgence($email)
    {
        $query = "SELECT * FROM agence WHERE emailAgence = ?";
        $resultat = $this->db->query($query, array("$email"));

        return $resultat->getRow();
    }

    public function allPays()
    {
        $query = "SELECT * FROM pays";
        $resultat = $this->db->query($query);

        return $resultat->getResult();
    }

    public function getSold($idClient)
    {
        $query = "SELECT * FROM argent WHERE idClient = ?";
        $resultat = $this->db->query($query, array($idClient));

        return $resultat->getRow();
    }

    public function emptyCompte($idClient,$solde)
    {
        $table = $this->db->table("argent");
        $table->where('idClient', $idClient);
        $element = [
            "solde" => $solde
        ];
        $table->update($element);
    }

    public function creditCompte($idClient)
    {
        $table = $this->db->table("argent");

        $element = [
            "idClient" => $idClient
        ];
        $table->insert($element);
    }

    public function addClient($email, $name, $firstName, $sexe, 
                                $lieuNaissance, $dateNaissance,$adresse, 
                                $ville, $pays, $status, $contact, $profession){
        $table = $this->db->table("Client");

        $element = [
            "emailClient" => $email,
            "nomClient" => $name,
            "prenomClient" => $firstName,
            "sexe" => $sexe,
            "lieuNaissanceClient" => $lieuNaissance,
            "dateNaissanceClient" => $dateNaissance,
            "adresse" => $adresse,
            "ville" => $ville,
            "pays" => $pays,
            "profession" => $profession,
            "status" => $status,
            "contactClient" => $contact
        ];
        $table->insert($element);
    }

    public function addAgent($email, $name, $firstName, $sexe, $lieuNaissance, $dateNaissance, $adresse, $ville, $pays,
                                         $status, $experience, $contact){
        $table = $this->db->table("Agence");

        $element = [
            "emailAgence" => $email,
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
        $table->insert($element);
    }

    public function addUser($email, $password, $permission, $code){
        $table = $this->db->table("User");

        $element = [
            "emailUser" => $email,
            "password" => md5($password),
            "permision" => $permission,
            "code_confirmation" => md5($code)
        ];

        $table->insert($element);
    }

    public function verifyMail($mail)
    {
        $query = "SELECT * FROM user WHERE emailUser = ?";
        $resultat = $this->db->query($query, array($mail));

        return $resultat->getRow();
    }

    public function verifyCode($mail,$codeConf)
    {
        $codeConf = md5($codeConf);

        $query = "SELECT * FROM user WHERE emailUser = ? and code_confirmation = ?";
        $resultat = $this->db->query($query, array($mail,$codeConf));

        return $resultat->getRow();
    }

    public function updatePassword($email,$password)
    {
        $table = $this->db->table("user");
        $table->where('emailUser', $email);

        $element = [
            "password" => md5($password)
        ];

        $table->update($element);
    }
}
?>