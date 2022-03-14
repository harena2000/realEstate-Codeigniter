<?php
    namespace App\Models\AgenceModel;
    use CodeIgniter\Model;

    class AgendaModel extends Model {

      public function getAllData($idAgence)
      {

        $query = "SELECT * FROM calendrier where idAgence = ? ORDER BY idCalendrier";
        $resultat = $this->db->query($query,array($idAgence));

        return $resultat->getResult();

      }

      public function getAllDataVisite($idAgence)
      {

        $query = "SELECT * FROM agence_maison,calendrier_visite where calendrier_visite.idAgence = ? 
                  AND calendrier_visite.idAgence = agence_maison.idAgence
                  AND calendrier_visite.idMaison = agence_maison.idMaison
                  ORDER BY idVisite";
        $resultat = $this->db->query($query,array($idAgence));

        return $resultat->getResult();

      }

      public function insertData($idUser,$titreEvent,$startEvent,$endEvent)
      {
            $table = $this->db->table("calendrier");

            $element = [
                "idAgence" => $idUser,
                "titreEvent" => $titreEvent,
                "startEvent" => $startEvent,
                "endEvent" => $endEvent,
            ];

            $table->insert($element);
      }

      public function updateData($id,$title,$start,$end)
      {
          $table = $this->db->table("calendrier");
          $table->where('idCalendrier', $id);

          $element = [
            "titreEvent" => $title,
            "startEvent" => $start,
            "endEvent" => $end
          ];

          $table->update($element);
      }

      public function deleteData($id)
      {
          $table = $this->db->table("calendrier");
          $table->where('idCalendrier', $id)->delete();
      }

      public function addVisite($idMaison,$titreVisite,$dateStart,$dateEnd,$color)
      {
            $table = $this->db->table("calendrier_visite");

            $element = [
                "idMaison" => $idMaison,
                "titreEvent" => $titreVisite,
                "startEvent" => $dateStart,
                "endEvent" => $dateEnd,
                "labelColor" => $color
            ];

            $table->insert($element);
      }
      
      public function showDateVisit($idMaison)
      {
          $query = "SELECT * FROM calendrier_visite where idMaison = ? ORDER BY idVisite ASC";
          $resultat = $this->db->query($query,array($idMaison));

          return $resultat->getResult();
      }

      public function deleteVisite($idVisite)
      {
          $table = $this->db->table("calendrier_visite");
          $table->where('idVisite', $idVisite)->delete();
      }

      public function deleteVisiteAgenda($titre)
      {
          $table = $this->db->table("calendrier");
          $table->where('titreEvent', $titre)->delete();
      }

    }
?>