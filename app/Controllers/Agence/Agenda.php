<?php

namespace App\Controllers\Agence;

use App\Controllers\BaseController;
use App\Models\AgenceModel\HouseModel;
use App\Models\AgenceModel\UserModel;
use App\Models\AgenceModel\AgendaModel;
use CodeIgniter\I18n\Time;

class Agenda extends BaseController
{
    public function __construct()
    {         
        //helper('url');    
        $this->session = session();  
        $this->session->start();      
    }
    
    public function index()
    {
        if($this->session->get('security') != 3)
                return redirect()->to('/');
            
            $house = new HouseModel();

            $msg = session()->getFlashdata("msg");

            $donnee = [
                "isActive" => 2,
                "title" => "Agenda",
                "message" => $msg,
            ];

            echo view("Templates/Agence/header",$donnee);
            echo view("Agence/agenda",$donnee);
            echo view("Templates/Agence/footer");               
    }

    public function load()
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $agenda = new AgendaModel();

            $result = $agenda->getAllData($this->session->get("idUser"));

            foreach ($result as $row) {

                $data[] = array(
                    "id" => $row->idCalendrier,
                    "title" => $row->titreEvent,
                    "start" => $row->startEvent,
                    "end" => $row->endEvent 
                );

            }

            echo json_encode($data);
    }

    public function loadVisite()
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $agenda = new AgendaModel();

            $result = $agenda->getAllDataVisite($this->session->get("idUser"));

            foreach ($result as $row) {

                $data[] = array(
                    "id" => $row->idVisite,
                    "title" => $row->titreEvent,
                    "start" => $row->startEvent,
                    "end" => $row->endEvent,
                    "backgroundColor" => $row->labelColor
                );

            }

            return $this->response->setJSON($data);
    }

    public function insert()
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $model = new AgendaModel();

            if ($this->request->getPost("title")) {

                $title = $this->request->getPost("title");
                $start = $this->request->getPost("start");
                $end = $this->request->getPost("end");
                $idUser = $this->session->get("idUser");

                // echo $start;

                $model->insertData($idUser,$title,$start,$end);

                $response = [
                    "icon" => "success",
                    "title" => "Date Inserted!",
                    "message" => "Event add successfully!"  
                ];

                return $this->response->setJSON($response);
            }
    }

    public function update()
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $model = new AgendaModel();

            if ($this->request->getPost("id")) {

                $id = $this->request->getPost("id");
                $title = $this->request->getPost("title");
                $start = $this->request->getPost("start");
                $end = $this->request->getPost("end");

                // echo $start;

                $model->updateData($id,$title,$start,$end);

                $response = [
                    "icon" => "success",
                    "title" => "Date Inserted!",
                    "message" => "Event add successfully!"  
                ];

                return $this->response->setJSON($response);
            }
    }

    public function delete()
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $model = new AgendaModel();

            if ($this->request->getPost("id")) {

                $id = $this->request->getPost("id");  

                $model->deleteData($id);

                $response = [
                    "icon" => "success",
                    "title" => "Date Inserted!",
                    "message" => "Event add successfully!"  
                ];

                return $this->response->setJSON($response);
            }
    }

    public function addVisite()
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $model = new AgendaModel();

            $idUser = $this->session->get("idUser");

            $idMaison = $this->request->getPost("idMaison");
            $dateVisite = $this->request->getPost("dateVisite");
            $timeVisiteStart = $this->request->getPost("timeVisiteStart");
            $timeVisiteEnd = $this->request->getPost("timeVisiteEnd");
            $color = $this->request->getPost("color");
            $titreVisite = "Visite : ".$this->request->getPost("nomMaison");

            $dateStart = $dateVisite." ".$timeVisiteStart;
            $dateEnd = $dateVisite." ".$timeVisiteEnd;

            $model->addVisite($idMaison,$titreVisite,$dateStart,$dateEnd,$color);
            $model->insertData($idUser,$titreVisite,$dateStart,$dateEnd);

            return redirect()->to(base_url("Agence/House/index/$idMaison"))->with("msg","Date saved with success!");

    }

    public function deleteVisite($idMaison,$idVisite,$titre,$start,$end)
    {
        if ($this->session->get("security" != 3))
            return redirect()->to('/');

            $model = new AgendaModel();

            $model->deleteVisite($idVisite);
            $model->deleteVisiteAgenda($titre,$start,$end);

            return redirect()->to(base_url("Agence/House/index/$idMaison"))->with("msg","Event is Removed!");

    }
}
