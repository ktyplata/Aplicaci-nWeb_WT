<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Hotel_model');
    }
    
    
    public function getHotel(){
      
        $dato['content'] = 'Admin/hoteles';
       
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Hotel/pagina';
            
            $config['total_rows']=  $this->Hotel_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['hoteles']=  $this->Hotel_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
    }
         public function addHotel(){
           $this->form_validation->set_rules('NombreHotel', 'NombreHotel', 'trim|is_unique[hotel.NombreHotel]|required');
           $this->form_validation->set_rules('Direccion', 'Dirección', 'trim|required');
         $this->form_validation->set_rules('Telefono', 'Teléfono', 'trim|required|numeric');
         $this->form_validation->set_rules('CostoHotel', 'Costo Hotel', 'trim|required|numeric');
       if($this->form_validation->run ()=== false):
            $data['content'] = 'Admin/frmHotel';
        $this->load->view('plantillaAdmin', $data);
        else:
        $n = $this->input->post('NombreHotel');
        $d = $this->input->post('Direccion');
        $t = $this->input->post('Telefono');
        $ch = $this->input->post('CostoHotel');
        
        $this->Hotel_model->addHotel($n,$d, $t, $ch);
        redirect ('Hotel/getHotel');
        $this->getHotel();
        endif;
    }
    
    /*public function addHotel(){
          
        $n = $this->input->post('NombreHotel');
        $d = $this->input->post('Direccion');
        $t = $this->input->post('Telefono');
        $ch = $this->input->post('CostoHotel');
        
        $this->Hotel_model->addHotel($n,$d, $t, $ch);
        redirect ('Hotel/getHotel');
        $this->getHotel();
    }*/
    
     /*public function upHotel(){
        $id = $this->input->post('idHotel');
        $n = $this->input->post('NombreHotel');
        $d = $this->input->post('Direccion');
        $t = $this->input->post('Telefono');
        $ch = $this->input->post('CostoHotel');
        
        $this->Hotel_model->upHotel($id,$n,$d, $t, $ch);
        
        redirect('Hotel/getHotel');
    }*/
    
    
     public function upHotel(){
         $this->form_validation->set_rules('NombreHotel', 'NombreHotel', 'trim|required');
         $this->form_validation->set_rules('Direccion', 'Dirección', 'trim|required');
         $this->form_validation->set_rules('Telefono', 'Teléfono', 'trim|required|numeric');
         $this->form_validation->set_rules('CostoHotel', 'Costo Hotel', 'trim|required|numeric');
         $id = $this->input->post('idHotel');
         
       if($this->form_validation->run ()=== false):
         $dato['hoteles'] = $this->Hotel_model->getHotel($id);
         $dato['content'] = 'Admin/frmUpHotel';
         $this->load->view('plantillaAdmin', $dato);
       
        else:
        $id = $this->input->post('idHotel');
        $n = $this->input->post('NombreHotel');
        $d = $this->input->post('Direccion');
        $t = $this->input->post('Telefono');
        $ch = $this->input->post('CostoHotel');
        
        $this->Hotel_model->upHotel($id,$n,$d, $t, $ch);
        
        redirect('Hotel/getHotel');
        endif;
    }
    
     public function frmUpHotel($id){
        $dato['hoteles'] = $this->Hotel_model->getHotel($id);
         $dato['content'] = 'Admin/frmUpHotel';
        $this->load->view('plantillaAdmin', $dato);
    }
    
    public function delHotel($id){
        $this->Hotel_model->delHotel($id);
        
        redirect('Hotel/getHotel');
    }
    
    
    public function tuXML($nombre){
            $xml=  $this->Hotel_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Hotel_model->tuExcel(), "Hoteles");
        }
    
}
