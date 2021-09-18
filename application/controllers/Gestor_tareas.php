<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestor_tareas extends CI_Controller {
	/*
        Controlador destinado a administrar el sistema de tareas
    */
	public function index()
	{
        $data = array (
            'mensaje' => 'Esto es una prueba'
        );

		$this->load->view('vista_gestor_tareas', $data);
	}

    public function listar_tareas() {
        $this->load->model('Modelo_tarea');

        $tareas = $this->Modelo_tareas->listar();
    }

    public function alta_tarea() {
        $this->load->model('Modelo_tarea');
        $this->load->model('Modelo_etiqueta_tarea');
        
        $nombre = $this->input->post('nombre');
        $etiquetas = $this->input->post('etiquetas');
        $estado = 1;

        $id_tarea = $this->Modelo_tarea->alta($nombre, $estado);

        foreach($etiquetas as $etiqueta) {
            $this->Modelo_etiqueta_tarea->alta($id_tarea, $etiqueta);
        }

        $respuesta = array(
            'nombre' => $nombre,
            'etiquetas' => $etiquetas,
            'id_tarea' => $id_tarea
        );

        echo json_encode($respuesta);
    }
}
