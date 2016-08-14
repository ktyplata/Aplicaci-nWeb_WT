
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
<section  class="col-sm-8 col-sm-offset-2">
        <div class="panel-warning">
            <div class="panel-heading" style=" text-align: center">Este es el Módulo de Hotel</div>
<table class="table  table-responsive table-striped table-hover table-bordered" >
    <tr><td colspan="7" >
            <a href="<?php echo base_url(); ?>index.php/Admin/frmHotel" class="btn btn-info">Nuevo</a>
            <a href="<?php echo base_url(); ?>index.php/Hotel/tuXML/hoteles" class="btn btn-info">Descargar XML</a>
            <a href="<?php echo base_url(); ?>index.php/Hotel/tuExcel" class="btn btn-info">Descargar Excel</a>
        </td></tr>
    <tr>
        <td>idHotel</td>
        <td>Nombre</td>
        <td class="hidden-xs">Dirección</td>
        <td class="hidden-xs">Teléfono</td>
        <td class="hidden-xs">Costo Hotel</td>
        
        
        <td colspan="2" style=" text-align: center">Acciones</td>
    </tr>
<?php
if(isset($hoteles)){
    foreach ($hoteles as $n){
        echo "<tr> <td>" . $n->idHotel . "</td>"
        . "<td>" . $n->NombreHotel . "</td>" .
                "<td class='hidden-xs'>" . $n->Direccion. "</td>" .
            "<td class='hidden-xs'>" . $n->Telefono. "</td>" .
                "<td class='hidden-xs'>" . $n->CostoHotel. "</td>" 
                ;
        
                  ?>
            
        
        <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/Hotel/frmUpHotel/<?php echo $n->idHotel; ?>">Modificar</a></td>
        <td><a class="btn btn-danger" onclick="return confirmar()"  href="<?php echo base_url(); ?>index.php/Hotel/delHotel/<?php echo $n->idHotel; ?>">Eliminar</a></td></tr>;
     <?php }
}else{
    echo "Sin registros";
}
?>
</table>
            
            
            <?php
        echo $this->pagination->create_links(); 
        ?>
            <button class="btn btn-info visible-xs hidden-lg hidden-md hidden-sm" type="submit"> <span class="glyphicon glyphicon-plus-sign" >Ver Mas</span></button>
            </div>
    
    <script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas eliminar este hotel ?'))
            return true;
        
                else
                    return false;
        }
        </script>

</section>

