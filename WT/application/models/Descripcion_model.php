<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Descripcion
 *
 * @author katy
 */
class Descripcion_model extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    
     public function total(){
            $sql=  $this->db->get('descripcionhotel');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
            $this->db->where('descripcionhotel.idViajes = viajes.idViajes');
            $sql=$this->db->get('descripcionhotel, viajes', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
        
     public function getDes($id = null){
        $this->db->select('*');
        $this->db->from('descripcionhotel, viajes');
        $this->db->where('descripcionhotel.idViajes = viajes.idViajes');
        if($id != null){
            $this->db->where('idDesc', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
      public function addDes($idV,$ch){
       $this->db->query("call sp_adddescripcion($idV,$ch)");
          
       return $this->db->set('descripcionhotel');
        
	
    }
    
    
      public function upDes($id,$idV, $ch){
     
        $dato = array(
            'idViajes'     => $idV,
            'Costohotel'  => $ch
            
        );
        $this->db->where('idDesc', $id);
        return $this->db->update('descripcionhotel', $dato);
    }
    
  
    
    public function delDes($id){
        $this->db->query("call sp_deldescripcion('$id')");
        $this->db->where('idDesc', $id);
        return $this->db->delete('descripcionhotel');
    }
    
    
    
    public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('descripcionhotel');
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
            $fields=  $this->db->field_data('descripcionhotel');
            $query=  $this->db->get('descripcionhotel');
            return array ("fields" => $fields, "query" => $query);
        }
}
