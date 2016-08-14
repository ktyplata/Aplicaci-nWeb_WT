<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Procedencia_model
 *
 * @author katy
 */
class Procedencia_model extends CI_Model  {
    public function __construct() {
        parent::__construct();
    }
    
    
     public function total(){
            $sql=  $this->db->get('procedencia');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
            $this->db->where('procedencia.idProveedor = proveedortransporte.idProveedor');
            $sql=$this->db->get('procedencia, proveedortransporte', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
    
     public function getProcedencia($id = null){
        $this->db->select('*');
        $this->db->from('procedencia, proveedortransporte');
        $this->db->where('procedencia.idProveedor = proveedortransporte.idProveedor');
        if($id != null){
            $this->db->where('idProcedencia', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
      public function addProcedencia($ls,$hs,$idP ){
        $dato = array(
            'idProcedencia' => 0,
            'LugarSalida'     => $ls,
            'HorarioSalida'  => $hs,
            'idProveedor'  => $idP
        );
       return $this->db->insert('procedencia', $dato);
        
	
    }
    
  
    
    public function upProcedencia($id,$ls,$hs,$idP){
     
        $dato = array(
            'LugarSalida'     => $ls,
            'HorarioSalida'  => $hs,
            'idProveedor'  => $idP
            
        );
        $this->db->where('idProcedencia', $id);
        return $this->db->update('procedencia', $dato);
    }
    
    public function delProcedencia($id){
   
        $this->db->where('idProcedencia', $id);
        return $this->db->delete('procedencia');
    }
    
    public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('procedencia');
            $config=array(
                'root'      => 'respaldo_agencia2',
                'element'   => 'elemento',
                'newline'   => "\n",
                'tab'       => "\t"
                );
            $respuestaXML =  
                            $this->dbutil->xml_from_result($consulta, $config);
            return $respuestaXML;
        }
        
        
        public function tuExcel(){
            // Obtener la formula de los campos
            $fields=  $this->db->field_data('procedencia');
            $query=  $this->db->get('procedencia');
            return array ("fields" => $fields, "query" => $query);
        }
    
}
