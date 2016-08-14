
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
                          <link rel="stylesheet" type="text/css" href="<?=base_url();?>css/jquery.datetimepicker.css"/>
<style type="text/css">


.custom-date-style {
	background-color: red !important;
}

.input{	
}
.input-wide{
	width: 500px;
}


</style>
    
<div class="col-sm-6 col-sm-offset-2" >
    
    
    
<h1 class="mbr-header__text">Modificar Destino</h1>

        

<?php echo validation_errors(); ?>
<form action="<?php echo base_url();?>index.php/Destino/upDestino" method="post">
    <?php foreach($destinos as $n){ ?>

    
   <input type="hidden" name ="idDestino" value="<?php echo $n->idDestino; ?>">
 
       <label for="LugarLlegada" >LugarLlegada </label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-home"></i> </span>
         <input class="form-control" type="text" id="LugarLlegada" name="LugarLlegada" placeholder="LugarLlegada" required="required" value="<?php echo $n->LugarLlegada; ?>">
        
    </div>
        
        
        <label  for="HorarioLlegada">HorarioLlegada</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>  
         
         <input class="form-control" type="datetime" id="datetimepicker" name="HorarioLlegada" placeholder="Horario de llegada" required="required" value="<?php echo $n->HorarioLlegada; ?>">
          <script src="<?=base_url();?>css/jquery.js"></script>
<script src="<?=base_url();?>css/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('es');

$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
	$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
	$.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'es',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],

});


$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

</script>
    </div>
       
         
        <label  for="idHotel">idHotel</label>
    <div class="form-group input-group">
         <span class="input-group-addon"><i class="fa fa-user-secret"></i> </span>  
         
         <select class="form-control" name="idHotel" required="required">

            <option  value="<?php echo $n->NombreHotel; ?>"> <?php echo $n->NombreHotel; ?></option>
            
              <?php foreach($h as $u){ ?>
           
               <option value="<?php echo $u->idHotel; ?>"><?php echo $u->NombreHotel; ?></option>
                              <?php } ?>
                            </select>    
    </div>
       
        
        
        
          
     <div class="form-group">
           <input type="submit"  name="submit" onclick="return confirmar()"   value="Modificar" class="btn btn-success btn-lg"  required="required" >
           <a  href="<?php echo base_url();?>index.php/Destino/getDestino"><button style="float:right;" type="button"   class="btn btn-info btn-lg" > Cancelar</button></a>
    </div>
    <?php } ?>
</form>

                     
                          
                       

                   
</div>

                          
                          <script type="text/javascript">
            function confirmar(){
        if(confirm('¿Realmente deseas modificar este destino ?'))
            return true;
        
                else
                    return false;
        }
        </script>  