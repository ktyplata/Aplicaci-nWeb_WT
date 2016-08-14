<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller{
    
     public function __construct() {
        parent::__construct();
        $this->load->library('calendar');
    }
      public function index()
    {
           $data ['calendario'] = $this->calendar->generate();
        $data['content'] = 'Cliente/home';
        $this->load->view('plantillaFrond', $data);
        
    }
    
    
    public function conocenos()
    {
        $data['content'] = 'Cliente/conocenos';
        $this->load->view('plantillaFrond', $data);
    }
    
     public function contactanos()
    {
        $data['content'] = 'Cliente/contactanos';
        $this->load->view('plantillaFrond', $data);
    }
    
     public function faq()
    {
        $data['content'] = 'Cliente/faq';
        $this->load->view('plantillaFrond', $data);
    }
    
     public function galeria()
    {
        $data['content'] = 'Cliente/galeria';
        $this->load->view('plantillaFrond', $data);
    }
    
    
}
