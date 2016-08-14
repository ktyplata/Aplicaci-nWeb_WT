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
    
    
    
<h1 class="mbr-header__text">Modificar Cotización </h1>

        

<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Cotizacion/upCot" method="post">

    <?php foreach($cot as $n){ ?>

    
<input type="hidden" id="idCotizacion" name="idCotizacion" value="<?php echo $n->idCotizacion; ?>">

        <label  for="idViajes">idViajes</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user-secret"></i> </span>
        
         <select class="form-control" name="idViajes" required="required">

           <option value="<?php echo $n->idViajes; ?>"><?php echo $n->Nombre; ?></option>
            
              <?php foreach($vi as $i){ ?>
           
               <option value="<?php echo $i->idViajes; ?>"><?php echo $i->Nombre; ?></option>
                              <?php } ?>
                            </select>    
        
    </div>
        <label  for="Costohotel">Costo Hotel</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-dollar"></i> </span>  
         <input class="form-control" type="text" id="Costohotel" name="Costohotel" placeholder="Costo Hotel" required="required" value="<?php echo $n->Costohotel; ?>">
    </div>
          <label  for="Precio">Precio</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-dollar"></i> </span>  
         <input class="form-control" type="text" id="Precio" name="Precio" placeholder="Precio" required="required" value="<?php echo $n->Precio; ?>">
    </div>
        
          
    <div class="form-group">
           <input type="submit"  name="submit" onclick="return confirmar()" value="Modificar" class="btn btn-success btn-lg"  required="required" >
            <a  href="<?php echo base_url();?>index.php/Cotizacion/getCot"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    <?php } ?>
</form>


                
                          
                       

                   
</div>

  <script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas modificar esta Cotización ?'))
            return true;
        
                else
                    return false;
        }
        </script>    
