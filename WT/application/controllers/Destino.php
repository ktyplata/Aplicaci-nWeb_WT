<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Destino
 *
 * @author katy
 */
class Destino extends CI_Controller{
   public function __construct() {
        parent::__construct();
        $this->load->model('Destino_model');
        $this->load->model('Hotel_model');
    }
    
    public function getDestino(){
     
        $dato['content'] = 'Admin/destino';
        
        
        
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Destino/pagina';
            
            $config['total_rows']=  $this->Destino_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['destinos']=  $this->Destino_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
        
    }
        /* public function addDestino(){
          
        $ll = $this->input->post('LugarLlegada');
        $hl = $this->input->post('HorarioLlegada');
        $idH = $this->input->post('idHotel');
        
        
        $this->Destino_model->addDestino($ll,$hl,$idH);
        redirect ('Destino/getDestino');
        $this->getDestino();
    }*/
    
    
    public function addDestino(){
          $this->form_validation->set_rules('LugarLlegada', 'Lugar Llegada','trim|is_unique[destino.LugarLlegada]|required|alpha' );
           $this->form_validation->set_rules('HorarioLlegada', 'Horario Llegada', 'trim|required');
           $this->form_validation->set_rules('idHotel', 'Hotel', 'required');
         
        
       if($this->form_validation->run ()=== false):
        $data['content'] = 'Admin/frmDestino';
        $this->load->view('plantillaAdmin', $data);
       else:
        $ll = $this->input->post('LugarLlegada');
        $hl = $this->input->post('HorarioLlegada');
        $idH = $this->input->post('idHotel');
        
        
        $this->Destino_model->addDestino($ll,$hl,$idH);
        redirect ('Destino/getDestino');
        $this->getDestino();
        endif;
    }
    
     /*public function upDestino(){
        $id = $this->input->post('idDestino');
         $ll = $this->input->post('LugarLlegada');
        $hl = $this->input->post('HorarioLlegada');
        $idH = $this->input->post('idHotel');
        
        $this->Destino_model->upDestino($id,$ll,$hl,$idH);
        
        redirect('Destino/getDestino');
    }*/
    
    public function upDestino(){
         $this->form_validation->set_rules('LugarLlegada', 'Lugar Llegada','trim|required' );
         $this->form_validation->set_rules('HorarioLlegada', 'Horario Llegada', 'trim|required');
         $this->form_validation->set_rules('idHotel', 'Hotel', 'trim|required');
          $id = $this->input->post('idDestino');
        
       if($this->form_validation->run ()=== false):
         $dato['destinos'] = $this->Destino_model->getDestino($id);
         $dato['content'] = 'Admin/frmUpDestino';
         $this->load->view('plantillaAdmin', $dato);
       else:
        $id = $this->input->post('idDestino');
         $ll = $this->input->post('LugarLlegada');
        $hl = $this->input->post('HorarioLlegada');
        $idH = $this->input->post('idHotel');
        
        $this->Destino_model->upDestino($id,$ll,$hl,$idH);
        
        redirect('Destino/getDestino');
        endif;
    }
    
     public function frmUpDestino($id){
         $dato['destinos'] = $this->Destino_model->getDestino($id);
         $dato['content'] = 'Admin/frmUpDestino';
         $this->load->model('Hotel_model');
         $dato['h'] = $this->Hotel_model->getHotel();
        $this->load->view('plantillaAdmin', $dato);
    }
    
    public function delDestino($id){
        $this->Destino_model->delDestino($id);
        
        redirect('Destino/getDestino');
    }
    
    public function tuXML($nombre){
            $xml=  $this->Destino_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Destino_model->tuExcel(), "Destinos");
        }
    
}
