
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
    
    
    
<h1 class="mbr-header__text">Modificar Proveedor</h1>

        

<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Proveedor/upProv" method="post">
    <?php foreach($prove as $n){ ?>

     <input type="hidden" name ="idProveedor" value="<?php echo $n->idProveedor; ?>">
  
   
        <label for="Nombre" >Nombre </label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>
         <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre" required="required" value="<?php echo $n->Nombre; ?>">
        
    </div>
 
      <label  for="Telefono">Telefono</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-bus"></i> </span>  
         <input class="form-control" type="tel" id="Telefono" name="Telefono" placeholder="Telefono" required="required" value="<?php echo $n->Telefono; ?>">
    </div>
        
        <label  for="Email">Email</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-bus"></i> </span>  
         <input class="form-control" type="email" id="Email" name="Email" placeholder="Email" required="required" value="<?php echo $n->Email; ?>">
    </div>
        
        <label  for="Direccion">Dirección</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-bus"></i> </span>  
         <input class="form-control" type="text" id="Direccion" name="Direccion" placeholder="Direccion" required="required" value="<?php echo $n->Direccion; ?>">
    </div>
        
        
        <label  for="idTransporte">idTransporte</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user-secret"></i> </span>  
         
          <select class="form-control" name="idTransporte" required="required">
              
             <option value="<?php echo $n->idTransporte; ?>"> <?php echo $n->NomTransporte; ?> </option>
             <?php foreach($t as $p){ ?>
        
                                        <option value="<?php echo $p->idTransporte; ?>"><?php echo $p->NomTransporte; ?></option>
                                    <?php } ?>
                            </select>
    </div>

   
     <div class="form-group">
           <input type="submit"  name="submit" onclick="return confirmar()"   value="Modificar" class="btn btn-success btn-lg"  required="required" >
           <a  href="<?php echo base_url();?>index.php/Proveedor/getProv"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    <?php } ?>
</form>

                     
                          
                       

                   
</div>
<script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas modificar este proveedor ?'))
            return true;
        
                else
                    return false;
        }
        </script>  
