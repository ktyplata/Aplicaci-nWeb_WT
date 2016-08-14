<?php 

$this->load->view('Plantilla_Admin/begin.php');
$this->load->view('Plantilla_Admin/header');
$this->load->view('Plantilla_Admin/nav');

$this->load->view($content);
$this->load->view('Plantilla_Admin/footer');
$this->load->view('Plantilla_Admin/end');


