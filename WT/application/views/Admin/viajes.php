 
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
<section  class="col-sm-12">
        <div class="panel-warning">
            <div class="panel-heading" style=" text-align: center">Este es el Módulo de Viajes</div>
<table class="table  table-responsive table-striped table-hover table-bordered" >
    <tr><td colspan="13" >
            <a href="<?php echo base_url();?>index.php/Admin/frmViajes" class="btn btn-info">Nuevo</a>
            <a href="<?php echo base_url();?>index.php/Viajes/tuXML/viajes" class="btn btn-info">Descargar XML</a>
            <a href="<?php echo base_url();?>index.php/Viajes/tuExcel" class="btn btn-info">Descargar Excel</a>
        </td></tr>
    <tr>
        <td>IdViajes</td>
        <td>Nombre</td>
        <td class="hidden-xs">Precio</td>
        <td class="hidden-xs">Número Entradas</td>
        <td class="hidden-xs">Itinerario</td>
        <td class="hidden-xs">Lugares Visitados</td>
        <td class="hidden-xs">idCliente Nombre</td>
        <td class="hidden-xs">idProcedencia</td>
        <td class="hidden-xs">idDestino</td>
        <td class="hidden-xs">Total Viaje</td>
        <td class="hidden-xs">Precio Hotel</td>
        
        <td colspan="2" style=" text-align: center">Acciones</td>
    </tr>
<?php
if(isset($viajes)){
    foreach ($viajes as $n){
        echo "<tr>  <td>" . $n->idViajes . "</td>"
        . "<td>" . $n->Nombre . "</td>" .
            "<td class='hidden-xs'>" . $n->Precio. "</td>" .
            "<td class='hidden-xs'>" . $n->NumEntradas. "</td>" .
            "<td class='hidden-xs'>" . $n->Itinerario. "</td>" .
            "<td class='hidden-xs'>" . $n->LugaresVisitados. "</td>" .
            "<td class='hidden-xs'>" . $n->idCliente.  "<br>" . $n->NombreC. "</td>"  .
            "<td class='hidden-xs'>" . $n->idProcedencia. "<br>" . $n->LugarSalida. "</td>"  .
            "<td class='hidden-xs'>" . $n->idDestino.  "<br>" . $n->LugarLlegada. "</td>"  .
            "<td class='hidden-xs'>" . $n->TotalViaje.  "</td>" .
            "<td class='hidden-xs'>" . $n->Preciohotel. "</td>"  ;
        
//            "<td class='hidden-xs'>" . $n->idCliente.  "<br>" . $n->NombreC."</td>"  .
//            "<td class='hidden-xs'>" . $n->idProcedencia.  "<br>" . $n->LugarSalida."</td>"  .
//            "<td class='hidden-xs'>" . $n->idDestino.  "<br>" . $n->LugarLlegada."</td>"  .
//            "<td class='hidden-xs'>" . $n->TotalViaje.  "</td>" .
//            "<td class='hidden-xs'>" . $n->Preciohotel. "<br>" . $n->CostoHotel."</td>"  ;
            
        ?>
       <td><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/Viajes/frmUpViajes/<?php echo $n->idViajes;?>">Modificar</a></td>
       <td><a class="btn btn-danger" href="<?php echo base_url(); ?>index.php/Viajes/delViajes/<?php echo$n->idViajes;?>" onclick="return confirmar()">Eliminar</a></td></tr>;
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
        if(confirm('¿Realmente deseas eliminar este viaje ?'))
            return true;
        
                else
                    return false;
        }
        </script>

</section>





