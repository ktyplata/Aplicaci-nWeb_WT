<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model{
   
     public function __construct() {
        parent::__construct();
    }
    
     public function total(){
            $sql=  $this->db->get('users');
            return $sql->num_rows();
        }
        
        public function paginados($cant, $segmento){
            $sql=$this->db->get('users', $cant, $segmento);
            if ($sql->num_rows()>0){
                foreach ($sql->result()as $res){
                    $data[]=$res;
                } 
                return $data;
            }
            return FALSE;
        }
    
   public function getUsuarios($id = null){
        $this->db->select('*');
        $this->db->from('users');
        if($id != null){
            $this->db->where('idUsuario', $id);
        }
        $sql = $this->db->get();   
        
        if($sql->num_rows() > 0){
            return $sql->result();
        }
    }
    
    
     public function  sesion($u, $p){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user', $u);
        $this->db->where('password', $p);
        $sql=$this->db->get();
        
        if($sql->num_rows()> 0){
            return $sql->row();
        }else{
            return null;
            
        }
        
    }
    
    public function addUsuario($u, $p){
        $dato = array(
            'idUsuario' => 0,
            'user'     => $u,
            'password'  => $p
        );
       return $this->db->insert('users', $dato);
        
    }
    
    public function upUsuario($id,  $u, $p){
        //UPDATE Usuario SET (username= '$u', password='$p',
        //        email = '$e') WHERE idUsuario = $id
        $dato = array(
            'user'     => $u,
            'password'  => $p
            
        );
        $this->db->where('idUsuario', $id);
        return $this->db->update('users', $dato);
    }
    
    public function delUsuario($id){
    //DELETE FROM Usuario WHERE $idUsuario = $id
        $this->db->where('idUsuario', $id);
       
        return $this->db->delete('users');
         
    }
    
    
    
    public function tuXML (){
            $this->load->dbutil();
            $consulta=  $this->db->get('users');
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
            $fields=  $this->db->field_data('users');
            $query=  $this->db->get('users');
            return array ("fields" => $fields, "query" => $query);
        }
    
    
   
}
