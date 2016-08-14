<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->library('calendar');
        $this->load->model('Procedencia_model');
        $this->load->model('Destino_model');
        $this->load->model('Cliente_model');
        $this->load->model('Viaje_model');
         $this->load->model('Cotizacion_model');
         $this->load->model('Descripcion_model');
    }
    
   public function indexAdmin()
    {
        $data ['calendario'] = $this->calendar->generate();
        $data['content'] = 'Admin/home';
        $this->load->view('plantillaAdmin', $data);
	
    }
    
     public function usuarios()
    {
        $data['content'] = 'Admin/usuarios';
        $this->load->view('plantillaAdmin', $data);
    }
    
    public function clientes()
    {
        $data['content'] = 'Admin/clientes';
        $this->load->view('plantillaAdmin', $data);
    }
    
    public function viajes()
    {
        $data['content'] = 'Admin/viajes';
        $this->load->view('plantillaAdmin', $data);
    }
    
    public function cotizacion()
    {
        $data['content'] = 'Admin/cotizacion';
        $this->load->view('plantillaAdmin', $data);
    }
    
     public function descripcion()
    {
        $data['content'] = 'Admin/descripcion';
        $this->load->view('plantillaAdmin', $data);
    }
     public function proveedor()
    {
        $data['content'] = 'Admin/proveedor';
        $this->load->view('plantillaAdmin', $data);
    }
    
    public function registro()
    {
        $data['content'] = 'Admin/registro';
        $this->load->view('plantillaAdmin', $data);
    }
    
     public function frmViajes()
    {
        $this->load->model('Viaje_model');
        $this->load->model('Cliente_model');
        $data['vi'] = $this->Viaje_model->getViajes();
        $data['c'] = $this->Cliente_model->getCliente();
        $data['p'] = $this->Procedencia_model->getProcedencia();
        $data['d'] = $this->Destino_model->getDestino();
        $data['content'] = 'Admin/frmViajes';
        $this->load->view('plantillaAdmin', $data);
    }
    
        
    public function frmCot()
    {   
        $data['via'] = $this->Viaje_model->getViajes();
        $data['content'] = 'Admin/frmCot';
        $this->load->view('plantillaAdmin', $data);
    }
     
    public function frmDes()
    {
        $data['viaj'] = $this->Viaje_model->getViajes();
        $data['content'] = 'Admin/frmDes';
        $this->load->view('plantillaAdmin', $data);
    }
    public function frmClientes()
    {
        $data['content'] = 'Admin/frmClientes';
        $this->load->view('plantillaAdmin', $data);
    }
    
     public function frmHotel()
    {
        $data['content'] = 'Admin/frmHotel';
        $this->load->view('plantillaAdmin', $data);
    }
    
    public function frmTransporte()
    {
        $data['content'] = 'Admin/frmTransporte';
        $this->load->view('plantillaAdmin', $data);
    }
    
     public function frmProv()
    {
        $this->load->model('Proveedor_model');
        $this->load->model('Transporte_model');
        $data['prove'] = $this->Proveedor_model->getProv();
        $data['tra'] = $this->Transporte_model->getTransporte();
        $data['content'] = 'Admin/frmProv';
        $this->load->view('plantillaAdmin', $data);
    }
    
     public function frmDestino()
    {
        $this->load->model('Destino_model');
        $this->load->model('Hotel_model');
        $data['arrDest'] = $this->Destino_model->getDestino();
        $data['ho'] = $this->Hotel_model->getHotel();
        $data['content'] = 'Admin/frmDestino';
        $this->load->view('plantillaAdmin', $data);
    }
    
   
    
     public function frmProcedencia()
    {
        $this->load->model('Procedencia_model');
        $this->load->model('Proveedor_model');
        $data['arrProv'] = $this->Procedencia_model->getProcedencia();
        $data['pro'] = $this->Proveedor_model->getProv();
        $data['content'] = 'Admin/frmProcedencia';
        $this->load->view('plantillaAdmin', $data);
    }
    
   
    
    public function login(){
        $this->load->view('Admin/login');
        
        
    }
    
       public function frmUpCot(){
            $this->load->model('Cotizacion_model');
        $data['cot'] = $this->Cotizacion_model->getCot();
        $data['vi'] = $this->Viaje_model->getViajes();
        $data['content'] = 'Admin/frmUpCot';
        $this->load->view('plantillaAdmin', $data);
    }
        public function frmUpDes(){
            $this->load->model('Descripcion_model');
         
        $data['descr'] = $this->Descripcion_model->getDes();
        $data['viajee'] = $this->Viaje_model->getViajes();
         $data['content'] = 'Admin/frmUpDes';
         
        $this->load->view('plantillaAdmin', $data);
    }
    
       
        public function frmUpViajes(){
           $data['viajes'] = $this->Viaje_model->getViajes();
           $data['cl'] = $this->Cliente_model->getCliente();
           $data['pr'] = $this->Procedencia_model->getProcedencia();
           $data['de'] = $this->Destino_model->getDestino();
           $data['content'] = 'Admin/frmUpViajes';
        $this->load->view('plantillaAdmin', $data);
       }
       
       public function frmUpHotel(){
           $data['content'] = 'Admin/frmUpHotel';
        $this->load->view('plantillaAdmin', $data);
       }
       
       public function frmUpTransporte(){
           $data['content'] = 'Admin/frmUpTransporte';
        $this->load->view('plantillaAdmin', $data);
       }
       
       public function frmUpProv(){
           $this->load->model('Proveedor_model');
           $this->load->model('Transporte_model');
           $data['prove'] = $this->Proveedor_model->getProv();
           $data['t'] = $this->Transporte_model->getTransporte();
           $data['content'] = 'Admin/frmUpProv';
           $this->load->view('plantillaAdmin', $data);
       }


        public function frmUpDestino(){
            $this->load->model('Destino_model');
            $this->load->model('Hotel_model');
            $data['datos'] = $this->Destino_model->getDestino();
            $data['h'] = $this->Hotel_model->getHotel();
            $data['content'] = 'Admin/frmUpDestino';
            $this->load->view('plantillaAdmin', $data);
       }
       
        public function frmUpProcedencia(){
            $this->load->model('Procedencia_model');
            $this->load->model('Proveedor_model');
            $data['dat'] = $this->Procedencia_model->getProcedencia();
            $data['prove'] = $this->Proveedor_model->getProv();
            $data['content'] = 'Admin/frmUpProcedencia';
            $this->load->view('plantillaAdmin', $data);
       }
        
     
    
    
}
