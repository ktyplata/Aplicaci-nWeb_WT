
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
    
    
    
<h1 class="mbr-header__text">Registra los Costos Hotel-Viajes</h1>

        
<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Descripcion/addDes" method="post">
    
   
 <label  for="idViajes">idViajes</label>
    <div class="form-group input-group">
        <span class="input-group-addon"><i class="fa fa-user-secret"></i> </span> 
        
        <select class="form-control" name="idViajes" required="required">
                                <option value="">Elije un Viaje</option>
                                <?php foreach($viaj as $v){ ?>
                                        <option value="<?php echo $v->idViajes; ?>"><?php echo $v->Nombre; ?></option>
                                    <?php } ?>
                            </select> 
         
        
    </div>
 
          <label  for="CostoHotel">Costo Hotel</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-dollar"></i> </span>  
         <input class="form-control" type="text" id="CostoHotel" name="CostoHotel" placeholder="Costo Hotel" required="required">
    </div>
          
          
    <div class="form-group">
           <input type="submit"  name="submit"  value="Agregar" class="btn btn-success btn-lg"  required="required" >
             <a  href="<?php echo base_url();?>index.php/Descripcion/getDes"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    
</form>

                     
                          
                       

                   
</div>




