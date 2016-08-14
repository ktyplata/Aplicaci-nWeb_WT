<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Cotizacion_model');
         $this->load->model('Viaje_model');
    }
    public function getCot(){
      
        $dato['content'] = 'Admin/cotizacion';
       
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Cotizacion/pagina';
            
            $config['total_rows']=  $this->Cotizacion_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['cotiza']=  $this->Cotizacion_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
    }
         public function addCot(){
           $this->form_validation->set_rules('idViajes', 'idViajes', 'trim|required');
         $this->form_validation->set_rules('Costohotel', 'Costo Hotel', 'trim|required|numeric');
         $this->form_validation->set_rules('Precio', 'Precio', 'trim|required|numeric');
       if($this->form_validation->run ()=== false):
            $data['content'] = 'Admin/frmCot';
        $this->load->view('plantillaAdmin', $data);
        else:
        $idV = $this->input->post('idViajes');
        $ch = $this->input->post('Costohotel');
        $p = $this->input->post('Precio');
        
        
        $this->Cotizacion_model->addCot($idV,$ch, $p);
        redirect ('Cotizacion/getCot');
        $this->getCot();
        endif;
    }
    
  
    
     public function upCot(){
          $this->form_validation->set_rules('idViajes', 'idViajes', 'trim|required');
         $this->form_validation->set_rules('Costohotel', 'Costo Hotel', 'trim|required|numeric');
         $this->form_validation->set_rules('Precio', 'Precio', 'trim|required|numeric');
         
         $id = $this->input->post('idCotizacion');
         
       if($this->form_validation->run ()=== false):
         $dato['cot'] = $this->Cotizacion_model->getCot($id);
         $dato['content'] = 'Admin/frmUpCot';
         $this->load->view('plantillaAdmin', $dato);
       
        else:
        $id = $this->input->post('idCotizacion');
        $idV = $this->input->post('idViajes');
        $ch = $this->input->post('Costohotel');
        $p = $this->input->post('Precio');
        
        
        $this->Cotizacion_model->upCot($id,$idV,$ch, $p);
        
        redirect('Cotizacion/getCot');
        endif;
    }
    
     public function frmUpCot($id){
        $dato['cot'] = $this->Cotizacion_model->getCot($id);
         $dato['content'] = 'Admin/frmUpCot';
         $dato['vi'] = $this->Viaje_model->getViajes();
        $this->load->view('plantillaAdmin', $dato);
    }
     
        
    public function delCot($id){
        $this->Cotizacion_model->delCot($id);
        
        redirect('Cotizacion/getCot');
    }
    
    
    public function tuXML($nombre){
            $xml=  $this->Cotizacion_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Cotizacion_model->tuExcel(), "Cotización Viajes");
        }
    
        
        
        
        
}


