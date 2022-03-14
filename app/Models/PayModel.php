<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class PayModel extends Model {

        public function creditCompte($idUser,$credit)
        {
            $table = $this->db->table("argent");
            $table->where('idClient', $idUser);
            $element = [
                "solde" => $credit
            ];

            $table->update($element);
        }

        public function payment($idMaison,$payment)
        {
            $table = $this->db->table("achete");
            $table->where('idMaison', $idMaison);
            $element = [
                "reste" => $payment
            ];

            $table->update($element);
        }

        public function insertContrat($idUser, $idHouse, $reste, $dateD,$dateF,$annee,$statusRemise)
        {
          $table = $this->db->table("achete");

          $element = [
            "idClient" => $idUser,
            "idMaison" => $idHouse,
            "reste" => $reste,
            "debutContrat" => $dateD,
            "finContrat" => $dateF,
            "contrat" => $annee,
            "remise" => $statusRemise
          ];

          $table->insert($element);
        }

        public function editStatus($idHouse)
        {
            $table = $this->db->table("maison");
            $table->where('idMaison', $idHouse);
            $element = [
                "statusMaison" => 1
            ];

            $table->update($element);
        }

        public function myHouse($idClient)
        {
          $querry = "SELECT * from achete,maison where idClient = ? 
                    and achete.idMaison = maison.idMaison ORDER BY contrat ASC";
          $resultat = $this->db->query($querry, array($idClient));

          return $resultat->getResult();
        }

        public function theHouse($idMaison)
        {
          $querry = "SELECT * from achete where idMaison = ? ";
          $resultat = $this->db->query($querry, array($idMaison));

          return $resultat->getRow();
        }

        public function salaireAgence($idAgence,$montant)
        {
            $table = $this->db->table("argent_agence");

            $element = [
              "idAgence" => $idAgence,
              "salaire" => $montant
            ];

            $table->insert($element);
        }
    }
?>