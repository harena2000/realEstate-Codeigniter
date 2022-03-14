<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class HistoryModel extends Model {

        public function insertHistory($idClient,$idMaison,$payment)
        { 
          $table = $this->db->table("check_liste");

          $element = [
            "idClient" => $idClient,
            "idMaison" => $idMaison,
            "depot" => $payment
          ];

          $table->insert($element);
        }

        public function displayHistory($idClient)
        {
          $querry = "SELECT * from check_liste,maison,achete,pays where check_liste.idClient = ? 
                    and check_liste.idMaison = maison.idMaison and check_liste.idMaison = achete.idMaison 
                    and maison.paysMaison = pays.idPays
                    GROUP BY idCheck ORDER BY dateDepot ASC";
                    
          $resultat = $this->db->query($querry, array($idClient));

          return $resultat->getResult();
        }
    }
?>