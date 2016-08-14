
<?php
              if($this->session->userdata('autentificado')){


              	?>
<h1 style="float: left; color: wheat; margin-left: 5%;"> Bienvenid@ <?php  echo $this->session->userdata('user'); 
	?> al CPanel  </h1> 
            <?php	
              }  else { ?>
                  <?php echo "<script>
        alert('No se quien eres');
        
        </script>";?>
            <?php
                  redirect('Admin/login');
}
              ?>


        


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

<script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo="
			  crossorigin="anonymous"></script>
<div class="col-sm-6 col-sm-offset-2" >
    
    
    
<h1 class="mbr-header__text">Modificar Transporte</h1>

        

<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Transporte/upTransporte" method="post">
    
    <?php foreach($transportes as $n){ ?>

    
   <input type="hidden" name ="idTransporte" value="<?php echo $n->idTransporte; ?>">
 
        <label for="NumLugares" >Número Lugares </label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>
         <input class="form-control" type="number" id="NumLugares" name="NumLugares" placeholder="Número Lugares" required="required" value="<?php echo $n->NumLugares; ?>">
        
    </div>
        
        
        <label  for="NomTransporte">Nombre Transporte</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-bus"></i> </span>  
         <input class="form-control" type="text" id="NomTransporte" name="NomTransporte" placeholder="Nombre Transporte" required="required"  value="<?php echo $n->NomTransporte; ?>">
    </div>
        
        
    <div class="form-group">
           <input type="submit"  name="submit" onclick="return confirmar()"   value="Modificar" class="btn btn-success btn-lg"  required="required" >
           <a  href="<?php echo base_url();?>index.php/Transporte/getTransporte"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    <?php } ?>
</form>

                     
                          
                       

                   
</div>



<script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas modificar este transporte ?'))
            return true;
        
                else
                    return false;
        }
        </script>  
