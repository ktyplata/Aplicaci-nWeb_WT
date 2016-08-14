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
class Descripcion extends CI_Controller {
    //put your code here
     public function __construct() {
        parent::__construct();
        $this->load->model('Descripcion_model');
        
    }
    
        public function getDes(){
      
        $dato['content'] = 'Admin/descripcion';
       
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Descripcion/pagina';
            
            $config['total_rows']=  $this->Descripcion_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['de']=  $this->Descripcion_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
    }
         public function addDes(){
           $this->form_validation->set_rules('idViajes', 'idViajes', 'trim|required');
         $this->form_validation->set_rules('CostoHotel', 'Costo Hotel', 'trim|required|numeric');
       
       if($this->form_validation->run ()=== false):
            $data['content'] = 'Admin/frmDes';
        $this->load->view('plantillaAdmin', $data);
        else:
        $idV = $this->input->post('idViajes');
        $ch = $this->input->post('CostoHotel');
      
        $this->Descripcion_model->addDes($idV,$ch);
        redirect ('Descripcion/getDes');
        $this->getDes();
        endif;
    }
    
  
    
     public function upDes(){
          $this->form_validation->set_rules('idViajes', 'idViajes', 'trim|required');
         $this->form_validation->set_rules('CostoHotel', 'Costo Hotel', 'trim|numeric|required');
         
         
         $id = $this->input->post('idDesc');
         
       if($this->form_validation->run ()=== false):
         $dato['descr'] = $this->Descripcion_model->getDes($id);
         $dato['content'] = 'Admin/frmUpDes';
         $this->load->view('plantillaAdmin', $dato);
       
        else:
        $id = $this->input->post('idDesc');
        $idV = $this->input->post('idViajes');
        $ch = $this->input->post('CostoHotel');
        
        
        
        $this->Descripcion_model->upDes($id,$idV,$ch);
        
        redirect('Descripcion/getDes');
        endif;
    }
    
     public function frmUpDes($id){
         $this->load->model('Viaje_model');
        $dato['descr'] = $this->Descripcion_model->getDes($id);
        $dato['viajee'] = $this->Viaje_model->getViajes();
         $dato['content'] = 'Admin/frmUpDes';
         
        $this->load->view('plantillaAdmin', $dato);
    }
    
    public function delDes($id){
        $this->Descripcion_model->delDes($id);
        
        redirect('Descripcion/getDes');
    }
    
    
    public function tuXML($nombre){
            $xml=  $this->Descripcion_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Descripcion_model->tuExcel(), "Costos Hotel-Viajes");
        }
}
