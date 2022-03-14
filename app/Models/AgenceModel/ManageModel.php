<?php
    namespace App\Models\AgenceModel;
    use CodeIgniter\Model;

    class ManageModel extends Model {

      public function displayManage(){
          
        $querry = "SELECT * FROM (achete, client, maison, user) WHERE maison.statusMaison = ? 
                  and achete.idClient = client.idClient and idUser = client.idClient 
                  and achete.idMaison = maison.idMaison ORDER BY contrat ASC ";

        $resultat = $this->db->query($querry,array(1));

        return $resultat->getResult();
      }

      public function disableUser($idUser,$isActive)
      {
          $table = $this->db->table("user");
            $table->where('idUser', $idUser);

            $element = [
              "disable" => $isActive
            ];

            $table->update($element);
      }     
  }

?>