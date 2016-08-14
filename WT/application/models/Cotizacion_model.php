<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion_model extends CI_Model {
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    
     public function total(){
            $sql=  $this->db->get('cotizacionviaje');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
             $this->db->where('cotizacionviaje.idViajes = viajes.idViajes');
            $sql=$this->db->get('cotizacionviaje, viajes', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
        
     public function getCot($id = null){
        $this->db->select('*');
        $this->db->from('cotizacionviaje, viajes');
         $this->db->where('cotizacionviaje.idViajes = viajes.idViajes');
        if($id != null){
            $this->db->where('idCotizacion', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
      public function addCot($idV,$ch, $p){
       $this->db->query("call sp_addCotizar($idV,$ch, $p)");
          
       return $this->db->set('cotizacionviaje');
        
	
    }
    
  
    
    public function upCot($id,$idV, $ch, $p){
     
        $dato = array(
            'idViajes'     => $idV,
            'Costohotel'  => $ch,
            'Precio'  => $p
            
        );
        $this->db->where('idCotizacion', $id);
        return $this->db->update('cotizacionviaje', $dato);
    }
    
    public function delCot($id){
        $this->db->query("call sp_delCotizar('$id')");
        $this->db->where('idCotizacion', $id);
        return $this->db->delete('cotizacionviaje');
    }
    
    
    
    public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('cotizacionviaje');
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
            $fields=  $this->db->field_data('cotizacionviaje');
            $query=  $this->db->get('cotizacionviaje');
            return array ("fields" => $fields, "query" => $query);
        }
}
