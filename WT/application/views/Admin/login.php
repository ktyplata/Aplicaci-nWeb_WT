<?php
if($this->session->userdata('autentificado')){//si hay una session iniciada

echo '<script>
alert("Ya existe una sesion iniciada");
</script>';
   

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/local.css" />
          <link rel="shortcut icon" href="<?php echo base_url();?>img/WT.png" />

    <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

   
</head>



<div class="col-sm-4 col-sm-offset-4" >
    
    <div>
        <img alt="150" height="150" src="<?php echo base_url();?>img/WT.png"> 
    </div>
    
<h1 class="mbr-header__text">Ingresa al CPanel</h1>

        
<?php echo form_open('Usuarios/login'); ?>
 <?php echo validation_errors(); ?>
<form>
 
        <label for="user" >Usuario </label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>
         <input class="form-control" type="text" id="user" name="user" placeholder="Usuario" required="required" value="<?php echo set_value('user'); ?>">
        
    </div>
        
        
        <label  for="password">Password</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>  
         <input class="form-control" type="password" id="password" name="password" placeholder="Password" required="required">
    </div>
       
        
          
    <div class="form-group">
           <input type="submit"  name="submit"  value="Ingresar" class="btn btn-success btn-lg"  required="required" >
    </div>
    
</form>

              
					        
                          
                       

                   
</div>



</body>
</html>

