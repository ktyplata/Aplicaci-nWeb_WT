<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor_model
 *
 * @author katy
 */
class Proveedor_model extends CI_Model{
    //put your code here
     public function __construct() {
        parent::__construct();
    }
    
    
     public function total(){
            $sql=  $this->db->get('proveedortransporte');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
            $this->db->where('proveedortransporte.idTransporte = transporte.idTransporte');
            $sql=$this->db->get('transporte, proveedortransporte',$cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
        
        
        public function getProv($id = null){
        $this->db->select('*');
        $this->db->from('transporte, proveedortransporte');
        $this->db->where('proveedortransporte.idTransporte = transporte.idTransporte');
        if($id != null){
            $this->db->where('idProveedor', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
      public function addProv($n,$t ,$em, $d, $idT){
        $dato = array(
            'idProveedor' => 0,
            'Nombre'     => $n,
            'Telefono'  => $t,
            'Email'  => $em,
            'Direccion'  => $d,
            'idTransporte'  => $idT
        );
       return $this->db->insert('proveedortransporte', $dato);
        
	
    }
    
  
    
    public function upProv($id,$n,$t ,$em, $d, $idT){
     
        $dato = array(
             'Nombre'     => $n,
            'Telefono'  => $t,
            'Email'  => $em,
            'Direccion'  => $d,
            'idTransporte'  => $idT
            
        );
        $this->db->where('idProveedor', $id);
        return $this->db->update('proveedortransporte', $dato);
    }
    
    public function delProv($id){
   
        $this->db->where('idProveedor', $id);
        return $this->db->delete('proveedortransporte');
    }
    
    
     public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('proveedortransporte');
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
            $fields=  $this->db->field_data('proveedortransporte');
            $query=  $this->db->get('proveedortransporte');
            return array ("fields" => $fields, "query" => $query);
        }
    
}
