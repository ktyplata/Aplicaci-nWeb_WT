<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transporte_model
 *
 * @author katy
 */
class Transporte_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
     public function total(){
            $sql=  $this->db->get('transporte');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
            $sql=$this->db->get('transporte', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
    
     public function getTransporte($id = null){
       
        $this->db->select('*');
        $this->db->from('transporte');
        if($id != null){
            $this->db->where('idTransporte', $id);
        }
        $sql = $this->db->get();   
        
       if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
  
     public function addTransporte($num,$nt){
         
        $dato = array(
            'idTransporte' => 0,
            'NumLugares'     => $num,
            'NomTransporte'  => $nt
        );
       return $this->db->insert('transporte', $dato);
    }
    
    
    public function upTransporte($id,$num,$nt){
     
        $dato = array(
            'NumLugares'     => $num,
            'NomTransporte'  => $nt
            
        );
        $this->db->where('idTransporte', $id);
        return $this->db->update('transporte', $dato);
    }
    
    public function delTransporte($id){
   
        $this->db->where('idTransporte', $id);
        return $this->db->delete('transporte');
    }
    
    
    
     public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('transporte');
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
            $fields=  $this->db->field_data('transporte');
            $query=  $this->db->get('transporte');
            return array ("fields" => $fields, "query" => $query);
        }
}
