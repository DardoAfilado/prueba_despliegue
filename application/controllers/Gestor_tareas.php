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
}
