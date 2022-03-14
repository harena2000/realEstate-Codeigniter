<?php
    namespace App\Models;

    use CodeIgniter\Model;

class MessageModel extends Model{
    public function verifyGroup($emailClient, $emailAgence){

        $query = "SELECT * FROM message_group WHERE emailClient = ? and emailAgence = ?";
        $resultat = $this->db->query($query, array($emailClient,$emailAgence));

        return $resultat->getRow();
    }

    public function createGroup($name,$emailAgence,$emailClient)
    {
        $table = $this->db->table("message_group");

        $element = [
            "groupName" => $name,
            "emailAgence" => $emailAgence,
            "emailClient" => $emailClient
        ];
        $table->insert($element);
    }

    public function sendMessage($name,$email,$message)
    {
        $table = $this->db->table("message");

        $element = [
            "groupName" => $name,
            "email" => $email,
            "message" => $message
        ];
        $table->insert($element);
    }

    public function getGroup($emailClient)
    {
        $query = "SELECT * FROM message_group WHERE emailClient = ?";
        $resultat = $this->db->query($query, array($emailClient));

        return $resultat->getResult();
    }

    public function getGroupAgence($emailAgence)
    {
        $query = "SELECT * FROM message_group WHERE emailAgence = ? GROUP BY groupName";
        $resultat = $this->db->query($query, array($emailAgence));

        return $resultat->getResult();
    }

    public function getMessage($nameGroup)
    {
        $query = "SELECT * FROM message,user WHERE groupName = ? and email = emailUser order by idMessage";
        $resultat = $this->db->query($query, array($nameGroup));

        return $resultat->getResult();
    }
}
?>