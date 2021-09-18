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
        $this->db->select('tareas.id, etiquetas.nombre as etiqueta, tareas.nombre as tarea');
        $this->db->from('tareas');
        $this->db->join('etiquetas_tareas', 'tareas.id = etiquetas_tareas.id_tarea');
        $this->db->join('etiquetas', 'etiquetas_tareas.id_etiqueta = etiquetas.id');
        $this->db->order_by('tareas.id');
        $tareas = $this->db->get()->result();

        return $tareas;
    }

    public function baja($id){
        $this->db->delete("tareas", array("id" => $id));
    }
}
?>