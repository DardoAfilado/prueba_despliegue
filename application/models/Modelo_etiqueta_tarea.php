<?php
class Modelo_etiqueta_tarea extends CI_Model{
    public $id_tarea;
    public $id_etiqueta;
    
    public function __construct(){
        $this->load->database();
    }
    
    public function alta($id_tarea, $id_etiqueta){
        $this->id_tarea = $id_tarea;
        $this->id_etiqueta = $id_etiqueta;
       
        $this->db->insert('etiquetas_tareas', $this);

        return $this->db->insert_id();
    }
}
?>