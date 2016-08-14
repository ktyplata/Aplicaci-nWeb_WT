<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viajes extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Viaje_model');
        $this->load->model('Cliente_model');
        $this->load->model('Procedencia_model');
        $this->load->model('Destino_model');
    }
    
    public function getViajes(){
     
        $dato['content'] = 'Admin/viajes';
  
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Viajes/pagina';
            
            $config['total_rows']=  $this->Viaje_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['viajes']=  $this->Viaje_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);   
        
        
        
    }
    
        public function addViajes(){
            $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required');
            $this->form_validation->set_rules('Precio', 'Precio', 'trim|required|numeric');
            $this->form_validation->set_rules('NumEntradas', 'Número de Entradas', 'trim|required|numeric');
            $this->form_validation->set_rules('Itinerario', 'Itinerario', 'trim|required');
            $this->form_validation->set_rules('LugaresVisitados', 'Lugares Visitados', 'trim|required|numeric');
            $this->form_validation->set_rules('idCliente', 'Cliente', 'trim|required');
            $this->form_validation->set_rules('idProcedencia', 'Procedencia', 'trim|required');
            $this->form_validation->set_rules('idDestino', 'Destino', 'trim|required');
//            $this->form_validation->set_rules('TotalViaje', 'TotalViaje', 'trim|required|numeric');
//            $this->form_validation->set_rules('Preciohotel', 'Preciohotel', 'trim|required|numeric');
       if($this->form_validation->run ()=== false):
            $data['content'] = 'Admin/frmViajes';
            $data['vi'] = $this->Viaje_model->getViajes();
            $this->load->view('plantillaAdmin', $data);
        else:
        $n = $this->input->post('Nombre');
        $p = $this->input->post('Precio');
        $num = $this->input->post('NumEntradas');
        $i = $this->input->post('Itinerario');
        $lv = $this->input->post('LugaresVisitados');
        $idC = $this->input->post('idCliente');
        $idP = $this->input->post('idProcedencia');
        $idD = $this->input->post('idDestino');
//        $tv = $this->input->post('TotalViaje');
//        $pHo = $this->input->post('Preciohotel');
        
        $this->Viaje_model->addViajes($n, $p, $num, $i, $lv, $idC, $idP, $idD);
        redirect ('Viajes/getViajes');
        $this->getViajes();
       endif;
    }
    /*public function addViajes(){
          
        $n = $this->input->post('Nombre');
        $p = $this->input->post('Precio');
        $num = $this->input->post('NumEntradas');
        $i = $this->input->post('Itinerario');
        $lv = $this->input->post('LugaresVisitados');
        $idC = $this->input->post('idCliente');
        $idP = $this->input->post('idProcedencia');
        $idD = $this->input->post('idDestino');
        $tv = $this->input->post('TotalViaje');
        $pHo = $this->input->post('Preciohotel');
        
        $this->Viaje_model->addViajes($n, $p, $num, $i, $lv, $idC, $idP, $idD, $tv, $pHo);
        redirect ('Viajes/getViajes');
        $this->getViajes();
    }*/
     public function upViajes(){
         $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required');
            $this->form_validation->set_rules('Precio', 'Precio', 'trim|required|numeric');
            $this->form_validation->set_rules('NumEntradas', 'Número de Entradas', 'trim|required|numeric');
            $this->form_validation->set_rules('Itinerario', 'Itinerario', 'trim|required');
            $this->form_validation->set_rules('LugaresVisitados', 'Lugares Visitados', 'trim|required|numeric');
            $this->form_validation->set_rules('idCliente', 'Cliente', 'trim|required');
            $this->form_validation->set_rules('idProcedencia', 'Procedencia', 'trim|required');
            $this->form_validation->set_rules('idDestino', 'Destino', 'trim|required');
//            $this->form_validation->set_rules('TotalViaje', 'TotalViaje', 'trim|required|numeric');
//            $this->form_validation->set_rules('Preciohotel', 'Preciohotel', 'trim|required|numeric');
            $id = $this->input->post('idViajes');
       if($this->form_validation->run ()=== false):
         $dato['viajes'] = $this->Viaje_model->getViajes($id);
         $dato['content'] = 'Admin/frmUpViajes';
        $this->load->view('plantillaAdmin', $dato);
       else:
        $id = $this->input->post('idViajes');
        $n = $this->input->post('Nombre');
        $p = $this->input->post('Precio');
        $num = $this->input->post('NumEntradas');
        $i = $this->input->post('Itinerario');
        $lv = $this->input->post('LugaresVisitados');
        $idC = $this->input->post('idCliente');
        $idP = $this->input->post('idProcedencia');
        $idD = $this->input->post('idDestino');
//        $tv = $this->input->post('TotalViaje');
//        $pHo = $this->input->post('Preciohotel');
         $this->Viaje_model->upViajes($id, $n, $p, $num, $i, $lv, $idC, $idP, $idD);
        redirect('Viajes/getViajes');
        endif;
    }
    
         
    
    /* public function upViajes(){
        $id = $this->input->post('idViajes');
        $n = $this->input->post('Nombre');
        $p = $this->input->post('Precio');
        $num = $this->input->post('NumEntradas');
        $i = $this->input->post('Itinerario');
        $lv = $this->input->post('LugaresVisitados');
        $idC = $this->input->post('idCliente');
        $idP = $this->input->post('idProcedencia');
        $idD = $this->input->post('idDestino');
        $tv = $this->input->post('TotalViaje');
        $pHo = $this->input->post('Preciohotel');
        
        
         $this->Viaje_model->upViajes($id, $n, $p, $num, $i, $lv, $idC, $idP, $idD, $tv, $pHo);
        
        redirect('Viajes/getViajes');
    }*/
    
     public function frmUpViajes($id){
        $dato['viajes'] = $this->Viaje_model->getViajes($id);
         $dato['content'] = 'Admin/frmUpViajes';
         $dato['cl'] = $this->Cliente_model->getCliente();
         $dato['pr'] = $this->Procedencia_model->getProcedencia();
         $dato['de'] = $this->Destino_model->getDestino();
        $this->load->view('plantillaAdmin', $dato);
    }
    
     
    public function delViajes($id){
        $this->Viaje_model->delViajes($id);
        
        redirect('Viajes/getViajes');
    }
    
    
     public function tuXML($nombre){
            $xml=  $this->Viaje_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Viaje_model->tuExcel(), "Viajes");
        }
    
    
    
}
