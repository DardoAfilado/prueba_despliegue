<?php
class Modelo_tarea extends CI_Model{
    public $id;
    public $nombre;
    public $estado;
    
    public function __construct(){
        $this->load->database();
    }

    public function alta($nombre, $estado){
        $this->nombre = $nombre;
        $this->estado = $estado;
       
        $this->db->insert('tareas', $this);

        return $this->db->insert_id();
    }

    public function listar() {
        
    }
}
?>