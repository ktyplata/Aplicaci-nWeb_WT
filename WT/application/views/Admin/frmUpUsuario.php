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
 
<h1 class="mbr-header__text">Modificar Usuarios</h1>

        

<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Usuarios/upUsuario" method="post">
    
    <?php foreach($usuarios as $n){ ?>

    
   <input type="hidden" name ="idUsuario" value="<?php echo $n->idUsuario; ?>">
 
        <label for="user" >Usuario </label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>
         <input class="form-control" type="text" id="user" name="user" placeholder="Usuario" required="required" value="<?php echo $n->user;?>" >
        
    </div>
        
        
        <label  for="password">Password</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>  
         <input class="form-control" type="password" id="password" name="password" placeholder="Password" required="required" value = "<?php echo $n->password; ?>">
    </div>
       
        
          
    <div class="form-group">
           <input type="submit"  name="submit" onclick="return confirmar()"  value="Modificar" class="btn btn-success btn-lg"  required="required" >
           <a  href="<?php echo base_url();?>index.php/Usuarios/getUsuarios"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    <?php } ?>
</form>

                     
                          
                       

                   
</div>

<script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas modificar este usuario ?'))
            return true;
        
                else
                    return false;
        }
        </script>    