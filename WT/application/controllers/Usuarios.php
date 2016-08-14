 <script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo="
			  crossorigin="anonymous"></script>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Usuarios extends CI_Controller{
     public function __construct() {
        parent::__construct();
         $this->load->library('calendar');
        $this->load->model('Usuario_model');
    }
   
    
      public function getUsuarios(){
        
        $dato['content'] = 'Admin/usuarios'; 
        $page=5;
            $this->load->library('pagination');
            $config['base_url']=  base_url().
                    'index.php/Usuarios/pagina';
            
            $config['total_rows']=  $this->Usuario_model->total();
            
            $config['per_page']=$page;
            $config['num_links']=30;
            
            $this->pagination->initialize($config);
            
            $dato['usuarios']=  $this->Usuario_model->paginados($config['per_page'], $this->uri->segment(3));
            
        $this->load->view('plantillaAdmin', $dato);  
        
    }
    
         public function addUsuario(){
         $this->form_validation->set_rules('user', 'Usuario', 'trim|is_unique[users.user]|required');
         $this->form_validation->set_rules('password', 'Password', 'trim|is_unique[users.password]|required');
       if($this->form_validation->run ()=== false):
            $data['content'] = 'Admin/registro';
        $this->load->view('plantillaAdmin', $data);
          else:
          $u = $this->input->post('user');
        $p = $this->input->post('password');
        $this->Usuario_model->addUsuario($u,$p);
        redirect ('Usuarios/getUsuarios');
        $this->getUsuarios();
       endif;
    }
         /*public function addUsuario(){
          
        $u = $this->input->post('user');
        $p = $this->input->post('password');
        $this->Usuario_model->addUsuario($u,$p);
        redirect ('Usuarios/getUsuarios');
        $this->getUsuarios();
        
    }*/
         public function upUsuario(){
         $this->form_validation->set_rules('user', 'Usuario', 'trim|is_unique[users.user]|required');
         $this->form_validation->set_rules('password', 'Password', 'trim|is_unique[users.password]|required');
         $id = $this->input->post('idUsuario');
         
       if($this->form_validation->run ()=== false):
         $dato['usuarios'] = $this->Usuario_model->getUsuarios($id);
         $dato['content'] = 'Admin/frmUpUsuario';
        $this->load->view('plantillaAdmin', $dato);
       
        else:
        $id = $this->input->post('idUsuario');
        $u = $this->input->post('user');
        $p = $this->input->post('password');
        
        $this->Usuario_model->upUsuario($id,$u,$p);
        
        redirect('Usuarios/getUsuarios');
        endif;
    }
     /*public function upUsuario(){
        $id = $this->input->post('idUsuario');
        $u = $this->input->post('user');
        $p = $this->input->post('password');
        
        $this->Usuario_model->upUsuario($id,$u,$p);
        
        redirect('Usuarios/getUsuarios');
    }*/
    
     public function frmUpUsuario($id){
        $dato['usuarios'] = $this->Usuario_model->getUsuarios($id);
         $dato['content'] = 'Admin/frmUpUsuario';
        $this->load->view('plantillaAdmin', $dato);
    }
    
    public function delUsuario($id){
        $this->Usuario_model->delUsuario($id);
        
       redirect('Usuarios/getUsuarios');
         echo '<script>
        alert("Usuario eliminado con éxito");
        
        </script>'; 
    }
    
    
   
     
     public function login(){
    $u=$this->input->post('user');
        $p=$this->input->post('password');
        //verificar en la bd si existe el usuario
        $usuario= $this->Usuario_model->sesion($u, $p);
        
        if($usuario){
            $arreglo_usuario = array(
                'idUsuario' => $usuario->idUsuario,
                        'user'=> $usuario->user,
                'password'=> $usuario->password,
                        'autentificado' =>TRUE
        );
        $this->session->set_userdata($arreglo_usuario);
        redirect('Usuarios/logeado');
            
        }  else {  
            
           echo "<script>
        alert('No se quien eres');
        
        </script>";  $this->load->view('Admin/login');
            
           
           
        }
     }
     
     
        public function logeado() {
        if($this->session->userdata('autentificado')){
            $dato['id']=  $this->session->userdata('idUsuario');
            $dato['u']=  $this->session->userdata('user');
            $dato['p']=  $this->session->userdata('password');
            $dato ['calendario'] = $this->calendar->generate();
              $dato['content'] = 'Admin/home';
        $this->load->view('plantillaAdmin', $dato);
             
        }else{
            redirect('Admin/login');
            
               }
    
    
}


public function cerrarSesion() {
    $arreglo_usuario=array('autentificado'=> false);
    $this->session->set_userdata($arreglo_usuario);
    $this->session->sess_destroy($arreglo_usuario);
    redirect('Admin/login');
    
    
}
 /* public function validar(){
         $this->form_validation->set_rules('user', 'Usuario', 'required');
         $this->form_validation->set_rules('password', 'Password', 'required');
       if($this->form_validation->run ()=== false):
          $this->load->view('Admin/login');
          else:
          $data['content'] = 'Admin/home';
        $this->load->view('plantillaAdmin', $data);
       endif;
    }*/


           

            public function tuXML($nombre){
            $xml=  $this->Usuario_model->tuXML();
            $this->load->helper('download');
            $nombre .='.xml';
            force_download($nombre, $xml);
        }
        
        public function tuExcel(){
            $this->load->helper('mysql_to_excel');
            to_excel($this->Usuario_model->tuExcel(), "Usuarios");
        }


}


