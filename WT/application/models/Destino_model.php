<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Destino_model
 *
 * @author katy
 */
class Destino_model extends CI_Model{
     public function __construct() {
        parent::__construct();
    }
    
     public function total(){
            $sql=  $this->db->get('destino');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
            $this->db->where('destino.idHotel = hotel.idHotel');
            $sql=$this->db->get('destino, hotel', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
    
     public function getDestino($id = null){
        $this->db->select('*');
        $this->db->from('destino, hotel');
        $this->db->where('destino.idHotel = hotel.idHotel');
        if($id != null){
            $this->db->where('idDestino', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
      public function addDestino($ll,$hl,$idH ){
        $dato = array(
            'idDestino' => 0,
            'LugarLlegada'     => $ll,
            'HorarioLlegada'  => $hl,
            'idHotel'  => $idH
        );
       return $this->db->insert('destino', $dato);
        
	
    }
    
        
    public function upDestino($id,$ll,$hl,$idH){
     
        $dato = array(
            'LugarLlegada'     => $ll,
            'HorarioLlegada'  => $hl,
            'idHotel'  => $idH
            
        );
        $this->db->where('idDestino', $id);
        return $this->db->update('destino', $dato);
    }
    
    public function delDestino($id){
   
        $this->db->where('idDestino', $id);
        return $this->db->delete('destino');
    }
    
    public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('destino');
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
            $fields=  $this->db->field_data('destino');
            $query=  $this->db->get('destino');
            return array ("fields" => $fields, "query" => $query);
        }
}
