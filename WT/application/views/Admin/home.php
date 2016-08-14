<?php
              if($this->session->userdata('autentificado')){


              	?>
<h1 style="float: left; color: wheat; margin-left: 5%;"> Bienvenid@ <?php  echo $this->session->userdata('user'); 
	?> al CPanel  </h1> 
            <?php	
              }  else {
                  redirect('Admin/login');
}
              ?>


<?php

echo '<script>
        alert("Bienvenido al CPANEL World Tur");
        
        </script>';?>
        


            <?php
                if(!$this->session->userdata('autentificado')){
                    	 ?>
                   <?php
               }else{
               	?>
<a  href="<?php echo base_url();?>index.php/Usuarios/cerrarSesion"><button  class="btn btn-warning" style="color: white; margin-top: 10px; float: right; margin-right: 5%;"> Cerrar Sesion</button></a>
<?php
                        }
                        ?>
<br>

<div class="center wow fadeInDown"><br><br>

   <p class="lead"> <br>Calendario</p>
   <?php
    echo $calendario;
    ?>
	</div>