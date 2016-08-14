<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proveedor
 *
 * @author katy
 */
class Proveedor extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Proveedor_model');
        $this->load->model('Transporte_model');
    }
    
    
     
    
    public function getProv(){
        
        
        $data['content'] = 'Admin/proveedor';
        
            $page=5;
            $this->load->library('pagination');
            
            $config['base_url']=  base_url().
                    'index.php/Proveedor/pagina';
            
            $config['total_rows']=  $this->Proveedor_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config); 
           
            $data['prov']=$this->Proveedor_model->paginados($config['per_page'], $this->uri->segment(3));
            
            
            $this->load->view('plantillaAdmin', $data);
            
    }
    
    
    
         /*public function addProv(){
          
        $n = $this->input->post('Nombre');
        
        $t = $this->input->post('Telefono');
        $em = $this->input->post('Email');
        $d = $this->input->post('Direccion');
        $idT = $this->input->post('idTransporte');
        
        $this->Proveedor_model->addProv($n,$t ,$em, $d, $idT);
        redirect ('Proveedor/getProv');
        $this->getProv();
    }*/
        
    public function addProv(){
           $this->form_validation->set_rules('Nombre', 'Nombre Proveedor','trim|is_unique[proveedortransporte.Nombre]|required|alpha' );
           $this->form_validation->set_rules('Telefono', 'Teléfono', 'trim|required|numeric');
           $this->form_validation->set_rules('Email', 'E-mail', 'trim|required|valid_email');
           $this->form_validation->set_rules('Direccion', 'Dirección', 'trim|required');
           $this->form_validation->set_rules('idTransporte', 'Transporte', 'trim|required');
         
        
       if($this->form_validation->run ()=== false):
           $data['content'] = 'Admin/frmProv';
           $data['prove'] = $this->Proveedor_model->getProv();
        $this->load->view('plantillaAdmin', $data);
       else:
        $n = $this->input->post('Nombre');
        
        $t = $this->input->post('Telefono');
        $em = $this->input->post('Email');
        $d = $this->input->post('Direccion');
        $idT = $this->input->post('idTransporte');
        
        $this->Proveedor_model->addProv($n,$t ,$em, $d, $idT);
        redirect ('Proveedor/getProv');
        $this->getProv();
         endif;
    }
    
    
    public function upProv(){
         $this->form_validation->set_rules('Nombre', 'Nombre Proveedor','trim|required' );
           $this->form_validation->set_rules('Telefono', 'Teléfono', 'trim|required|numeric');
           $this->form_validation->set_rules('Email', 'E-mail', 'trim|required|valid_email');
           $this->form_validation->set_rules('Direccion', 'Dirección', 'trim|required');
           $this->form_validation->set_rules('idTransporte', 'Transporte', 'trim|required');
           $id=$this->input->post('idProveedor');
        
       if($this->form_validation->run ()=== false):
          $data['prove'] =$this->Proveedor_model->getProv($id);
          $data['content'] = 'Admin/frmUpProv';
        $this->load->view('plantillaAdmin', $data);
        
        else:
        $id = $this->input->post('idProveedor');
        $n = $this->input->post('Nombre');
        $t = $this->input->post('Telefono');
        $em = $this->input->post('Email');
        $d = $this->input->post('Direccion');
        $idT = $this->input->post('idTransporte');
        
        $this->Proveedor_model->upProv($id,$n,$t ,$em, $d, $idT);
        
        redirect('Proveedor/getProv');
         endif;
       
        
    }
    
    public function frmUpProv($id){
        
        $data['prove'] =$this->Proveedor_model->getProv($id);
        $data['content'] = 'Admin/frmUpProv';
        $this->load->model('Transporte_model');
        $data['t'] = $this->Transporte_model->getTransporte();
        $this->load->view('plantillaAdmin', $data);
        
    }
    
   
     /*public function upProv(){
         
        $id = $this->input->post('idProveedor');
        $n = $this->input->post('Nombre');
        $t = $this->input->post('Telefono');
        $em = $this->input->post('Email');
        $d = $this->input->post('Direccion');
        $idT = $this->input->post('idTransporte');
        
        $this->Proveedor_model->upProv($id,$n,$t ,$em, $d, $idT);
        
        redirect('Proveedor/getProv');
        
    }*/
    
     /*public function frmUpProv($id){
         $data['prove'] = $this->Proveedor_model->getProv($id);
          $data['content'] = 'Admin/frmUpProv';
        $this->load->view('plantillaAdmin', $data);
        
    }*/
    
    public function delProv($id){
        $this->Proveedor_model->delProv($id);
        
        redirect('Proveedor/getProv');
    }
    
    
    public function tuXML($nombre){
            $xml=  $this->Proveedor_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Proveedor_model->tuExcel(), "Proveedores de Transportes");
        }
        
        
      
}
