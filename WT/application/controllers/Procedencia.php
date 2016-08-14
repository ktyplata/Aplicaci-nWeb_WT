<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Procedencia
 *
 * @author katy
 */
class Procedencia extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Procedencia_model');
        $this->load->model('Proveedor_model');
    }
    
    public function getProcedencia(){
  
        $dato['content'] = 'Admin/procedencia';
        
        
        
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Procedencia/pagina';
            
            $config['total_rows']=  $this->Procedencia_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['proce']=  $this->Procedencia_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
        
        
    }
    
     public function addProcedencia(){
          $this->form_validation->set_rules('LugarSalida', 'Lugar Salida','trim|is_unique[procedencia.LugarSalida]|required|alpha' );
           $this->form_validation->set_rules('HorarioSalida', 'Horario Salida', 'trim|required');
           $this->form_validation->set_rules('idProveedor', 'Proveedor', 'trim|required');
         
        
       if($this->form_validation->run ()=== false):
        $data['content'] = 'Admin/frmProcedencia';
        $this->load->view('plantillaAdmin', $data);
       else:
        $ls = $this->input->post('LugarSalida');
        $hs = $this->input->post('HorarioSalida');
        $idP = $this->input->post('idProveedor');
        
        
        $this->Procedencia_model->addProcedencia($ls,$hs,$idP);
        redirect ('Procedencia/getProcedencia');
        $this->getProcedencia();
         endif;
    }
         /*public function addProcedencia(){
          
        $ls = $this->input->post('LugarSalida');
        $hs = $this->input->post('HorarioSalida');
        $idP = $this->input->post('idProveedor');
        
        
        $this->Procedencia_model->addProcedencia($ls,$hs,$idP);
        redirect ('Procedencia/getProcedencia');
        $this->getProcedencia();
    }*/
        public function upProcedencia(){
           $this->form_validation->set_rules('LugarSalida', 'Lugar Salida','trim|required' );
           $this->form_validation->set_rules('HorarioSalida', 'Horario Salida', 'trim|required');
           $this->form_validation->set_rules('idProveedor', 'Proveedor', 'trim|required');
           $id = $this->input->post('idProcedencia');
        
       if($this->form_validation->run ()=== false):
         $dato['procedencias'] = $this->Procedencia_model->getProcedencia($id);
         $dato['content'] = 'Admin/frmUpProcedencia';
        $this->load->view('plantillaAdmin', $dato);
        else:
        $id = $this->input->post('idProcedencia');
        $ls = $this->input->post('LugarSalida');
        $hs = $this->input->post('HorarioSalida');
        $idP = $this->input->post('idProveedor');
        
        $this->Procedencia_model->upProcedencia($id,$ls,$hs,$idP);
        
        redirect('Procedencia/getProcedencia');
        endif;
    }
    
     /*public function upProcedencia(){
        $id = $this->input->post('idProcedencia');
         $ls = $this->input->post('LugarSalida');
        $hs = $this->input->post('HorarioSalida');
        $idP = $this->input->post('idProveedor');
        
        $this->Procedencia_model->upProcedencia($id,$ls,$hs,$idP);
        
        redirect('Procedencia/getProcedencia');
    }*/
    
     public function frmUpProcedencia($id){
        $dato['procedencias'] = $this->Procedencia_model->getProcedencia($id);
         $dato['content'] = 'Admin/frmUpProcedencia';
         $this->load->model('Proveedor_model');
         $dato['prove'] = $this->Proveedor_model->getProv();
        $this->load->view('plantillaAdmin', $dato);
    }
   
    public function delProcedencia($id){
        $this->Procedencia_model->delProcedencia($id);
        
        redirect('Procedencia/getProcedencia');
    }
    
    
    public function tuXML($nombre){
            $xml=  $this->Procedencia_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Procedencia_model->tuExcel(), "Procedencias");
        }
        
        
    
}
