<div class="col-sm-6 col-sm-offset-2" >
    
    
    
<h1 class="mbr-header__text">Modificar Hotel</h1>

<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Hotel/upHotel" method="post">
    <?php foreach($hoteles as $n){ ?>

    
   <input type="hidden" name ="idHotel" value="<?php echo $n->idHotel; ?>">
 
        <label for="NombreHotel" >NombreHotel </label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user"></i> </span>
         <input class="form-control" type="text" id="NombreHotel" name="NombreHotel" placeholder="Nombre Hotel" required="required" value="<?php echo $n->NombreHotel; ?>">
        
    </div>
        
        <label  for="Direccion">Dirección</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-home"></i> </span>  
         <input class="form-control" type="text" id="Direccion" name="Direccion" placeholder="Dirección" required="required" value="<?php echo $n->Direccion; ?>">
    </div>
        
       
        <label  for="Telefono">Teléfono</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-phone"></i> </span>  
         <input class="form-control" type="tel" id="Telefono" name="Telefono" placeholder="Teléfono" required="required" value="<?php echo $n->Telefono; ?>">
    </div>
        
         <label  for="CostoHotel">Costo Hotel</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-dollar"></i> </span>  
         <input class="form-control" type="text" id="CostoHotel" name="CostoHotel" placeholder="Costo Hotel" required="required" value="<?php echo $n->CostoHotel; ?>">
    </div>
         
        
          
    <div class="form-group">
           <input type="submit"  name="submit" onclick="return confirmar()"   value="Modificar" class="btn btn-success btn-lg"  required="required" >
            <a  href="<?php echo base_url();?>index.php/Hotel/getHotel"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    <?php } ?>
</form>

                     
                          
                       

                   
</div>


<script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas modificar este hotel ?'))
            return true;
        
                else
                    return false;
        }
        </script>    

