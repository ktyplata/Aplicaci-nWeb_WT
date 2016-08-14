<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Transporte
 *
 * @author katy
 */
class Transporte extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Transporte_model');
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
    
    public function getTransporte($id=null){
        $dato['transport']=$this->Transporte_model->getTransporte($id);
        $dato['content'] = 'Admin/transporte';
      
        
        
        
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Transporte/pagina';
            
            $config['total_rows']=  $this->Transporte_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['transport']=  $this->Transporte_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
        
    }
         /*public function addTransporte(){
          
        $nl = $this->input->post('NumLugares');
        $nt = $this->input->post('NomTransporte');
        
        $this->Transporte_model->addTransporte($nl,$nt);
        redirect ('Transporte/getTransporte');
        $this->getTransporte();
        
        
         }*/
    
    public function addTransporte(){
          $this->form_validation->set_rules('NumLugares', 'Número Lugares','trim|required|numeric' );
         $this->form_validation->set_rules('NomTransporte', 'Nombre Transporte', 'trim|required' );
        
       if($this->form_validation->run ()=== false):
           $data['content'] = 'Admin/frmTransporte';
            $this->load->view('plantillaAdmin', $data);
       else:
        $nl = $this->input->post('NumLugares');
        $nt = $this->input->post('NomTransporte');
        
        $this->Transporte_model->addTransporte($nl,$nt);
        redirect ('Transporte/getTransporte');
        $this->getTransporte();
          endif;
        
         }
         
         public function upTransporte(){
         
         $this->form_validation->set_rules('NumLugares', 'Número Lugares','trim|required|numeric' );
         $this->form_validation->set_rules('NomTransporte', 'Nombre Transporte', 'trim|is_unique[transporte.NomTransporte]|required' );
         $id = $this->input->post('idTransporte');
         
       if($this->form_validation->run ()=== false):
           $dato['transportes'] = $this->Transporte_model->getTransporte($id);
           $dato['content'] = 'Admin/frmUpTransporte';
        $this->load->view('plantillaAdmin', $dato);
       else:
        $id = $this->input->post('idTransporte');
        $nl = $this->input->post('NumLugares');
        $nt = $this->input->post('NomTransporte');
        
        $this->Transporte_model->upTransporte($id,$nl,$nt);
        
        redirect('Transporte/getTransporte');
        endif;
    }
     /*public function upTransporte(){
        $id = $this->input->post('idTransporte');
        $nl = $this->input->post('NumLugares');
        $nt = $this->input->post('NomTransporte');
        
        $this->Transporte_model->upTransporte($id,$nl,$nt);
        
        redirect('Transporte/getTransporte');
    }*/
    
     public function frmUpTransporte($id){
        $dato['transportes'] = $this->Transporte_model->getTransporte($id);
         $dato['content'] = 'Admin/frmUpTransporte';
        $this->load->view('plantillaAdmin', $dato);
    }
    
    public function delTransporte($id){
        $this->Transporte_model->delTransporte($id);
        
        redirect('Transporte/getTransporte');
    }
    
    
    public function tuXML($nombre){
            $xml=  $this->Transporte_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Transporte_model->tuExcel(), "Transporte");
        }
        
        
}
