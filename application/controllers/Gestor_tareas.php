<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestor_tareas extends CI_Controller {
	/*
        Controlador destinado a administrar el sistema de tareas
    */
	public function index()
	{
		$this->load->view('vista_gestor_tareas', null);
	}

    public function formatear_tareas($tareas) {
        $tareas_formateadas = [];

        foreach ($tareas as $tarea) {
            if(isset($tareas_formateadas[$tarea->tarea])) {
                array_push($tareas_formateadas[$tarea->tarea], $tarea->etiqueta);
            }
            else {
                $tareas_formateadas[$tarea->tarea] = array ($tarea->etiqueta);
            }
        }

        return $tareas_formateadas;
    }

    public function listar_tareas() {
        $this->load->model('Modelo_tarea');

        $tareas = $this->Modelo_tarea->listar();

        echo json_encode($tareas);
    }

    public function alta_tarea() {
        $this->load->model('Modelo_tarea');
        $this->load->model('Modelo_etiqueta_tarea');
        
        $nombre = $this->input->post('nombre');
        $etiquetas = $this->input->post('etiquetas');

        $id_tarea = $this->Modelo_tarea->alta($nombre);

        foreach($etiquetas as $etiqueta) {
            $this->Modelo_etiqueta_tarea->alta($id_tarea, $etiqueta);
        }

        $respuesta = array(
            'mensaje' => 'Alta OK',
        );

        echo json_encode($respuesta);
    }

    public function baja_tarea() {
        $this->load->model('Modelo_tarea');

        $id = $this->input->post('id');

        $this->Modelo_tarea->baja($id);

        $respuesta = array(
            'mensaje' => 'Baja OK',
        );

        echo json_encode($respuesta);
    }
}
