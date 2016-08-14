
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
            <div class="panel-heading" style=" text-align: center">Este es el Módulo de Destino</div>
<table class="table  table-responsive table-striped table-hover table-bordered" >
    <tr><td colspan="8" >
            <a href="<?php echo base_url(); ?>index.php/Admin/frmDestino" class="btn btn-info">Nuevo</a>
            <a href="<?php echo base_url(); ?>index.php/Destino/tuXML/destino" class="btn btn-info">Descargar XML</a>
            <a href="<?php echo base_url(); ?>index.php/Destino/tuExcel" class="btn btn-info">Descargar Excel</a>
        </td></tr>
    <tr>
        <td>idDestino</td>
        <td>LugarLlegada</td>
        <td class="hidden-xs"> HorarioLlegada</td>
        <td class="hidden-xs">idHotel</td>
        <td class="hidden-xs">Nombre Hotel</td>
        <td class="hidden-xs">Costo Hotel</td>
      
        
        <td colspan="2" style=" text-align: center">Acciones</td>
    </tr>
<?php
if(isset($destinos)){
    foreach ($destinos as $n){
        echo "<tr> <td>" . $n->idDestino . "</td>"
        . "<td>" . $n->LugarLlegada . "</td>" .
                 "<td class='hidden-xs'>" . $n->HorarioLlegada. "</td>"  .
              "<td class='hidden-xs'>" . $n->idHotel. "</td>" .  
                "<td class='hidden-xs'>" . $n->NombreHotel. "</td>".
                 "<td class='hidden-xs'>" . $n->CostoHotel. "</td>";
        
                 
            
         ?>
        <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/Destino/frmUpDestino/<?php echo $n->idDestino; ?>">Modificar</a></td>
        <td><a class="btn btn-danger" onclick="return confirmar()"  href="<?php echo base_url(); ?>index.php/Destino/delDestino/<?php echo $n->idDestino; ?>">Eliminar</a></td></tr>;
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
        if(confirm('¿Realmente deseas eliminar este destino ?'))
            return true;
        
                else
                    return false;
        }
        </script>
</section>


