<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Viaje_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
     public function total(){
            $sql=  $this->db->get('viajes');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
                $this->db->where('viajes.idCliente = cliente.idCliente');
                $this->db->where('viajes.idProcedencia = procedencia.idProcedencia');
                $this->db->where('destino.idDestino= viajes.idDestino');
//                $this->db->where('viajes.idHotel = hotel.idHotel');
//            $sql=$this->db->get('viajes, cliente, procedencia, destino, hotel', $cant, $segmento);
            $sql=$this->db->get('viajes, cliente, procedencia, destino', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
    
    
    
    public function getViajes($id = null){
        $this->db->select('*');
        $this->db->from('viajes, cliente, procedencia, destino');
        $this->db->where('viajes.idCliente = cliente.idCliente');
        $this->db->where('viajes.idProcedencia = procedencia.idProcedencia');
        $this->db->where(' destino.idDestino = viajes.idDestino ');
        if($id != null){
            $this->db->where('idViajes', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
    public function addViajes($n, $p, $num, $i, $lv, $idC, $idP, $idD){
        $dato = array(
            'idViajes' => 0,
            'Nombre'     => $n,
            'Precio'  => $p,
            'NumEntradas'  => $num,
            'Itinerario'  => $i,
            'LugaresVisitados'  => $lv,
            'idCliente'  => $idC,
            'idProcedencia'  => $idP,
            'idDestino'  => $idD
//            'TotalViaje'  => $tv,
//            'Preciohotel'  => $pHo
        );
       return $this->db->insert('viajes', $dato);
        
	
    }
    
  
    
    public function upViajes($id,$n, $p, $num, $i, $lv, $idC, $idP, $idD ){
        //UPDATE Usuario SET (username= '$u', password='$p',
        //        email = '$e') WHERE idUsuario = $id
        $dato = array(
            'Nombre'     => $n,
            'Precio'  => $p,
            'NumEntradas'  => $num,
            'Itinerario'  => $i,
            'LugaresVisitados'  => $lv,
            'idCliente'  => $idC,
            'idProcedencia'  => $idP,
            'idDestino'  => $idD,
//            'TotalViaje'  => $tv,
//            'Preciohotel'  => $pHo
            
        );
        $this->db->where('idViajes', $id);
        return $this->db->update('viajes', $dato);
    }
    
    public function delViajes($id){
    //DELETE FROM Usuario WHERE $idUsuario = $id
        $this->db->where('idViajes', $id);
        return $this->db->delete('viajes');
    }
    
    
    
    public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('viajes');
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
            $fields=  $this->db->field_data('viajes');
            $query=  $this->db->get('viajes');
            return array ("fields" => $fields, "query" => $query);
        }
        
    
    
    
    
}
