<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>index.php/Admin/indexAdmin">Control Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="<?php echo base_url();?>index.php/Admin/indexAdmin"><img alt="50" height="50" src="<?php echo base_url();?>img/WT.png"> World Tur</a></li>
                    <li><a href="<?php echo base_url();?>index.php/Viajes/getViajes"><i class="fa fa-globe"></i> Módulo Viajes</a></li>
                    <ul><a href="<?php echo base_url();?>index.php/Cotizacion/getCot"><i class="fa fa-tags"></i> Cotización Viaje</a></ul><br>
                    <ul><a href="<?php echo base_url();?>index.php/Descripcion/getDes"><i class="fa fa-tags"></i> Costos Hotel-Viajes</a></ul>
                    <li><a href="<?php echo base_url();?>index.php/Cliente/getCliente"><i class="fa fa-user"></i> Módulo Clientes</a></li>
                    <li><a href="<?php echo base_url();?>index.php/Usuarios/getUsuarios"><i class="fa fa-user"></i> Módulo Usuarios</a></li>
                    <li><a href="<?php echo base_url();?>index.php/Hotel/getHotel"><i class="fa fa-hotel"></i> Módulo Hotel</a></li>
                    <li><a href="<?php echo base_url();?>index.php/Transporte/getTransporte"><i class="fa fa-train"></i> Módulo Transporte</a></li>
                    <ul><a href="<?php echo base_url();?>index.php/Proveedor/getProv"><i class="fa fa-train"></i> Proveedor Transporte</a></ul>
                    <li><a href="<?php echo base_url();?>index.php/Procedencia/getProcedencia"><i class="fa fa-home"></i> Módulo Procedencia</a></li>
                    <li><a href="<?php echo base_url();?>index.php/Destino/getDestino"><i class="fa fa-globe"></i> Módulo Destino</a></li>
<!--                    <li><a href="<?php echo base_url();?>index.php/Viajes/getPaquetes"><i class="fa fa-tasks"></i> Registro Paquetes</a></li>-->
                    
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                         <ul class="breadcrumb">
                        <li><a href="<?php echo base_url();?>index.php/Admin/indexAdmin">Home</a></li>
                        <li><a href="<?php echo base_url();?>index.php/Viajes/getViajes">Viajes</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Cliente/getCliente">Clientes</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Usuarios/getUsuarios">Usuarios</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Hotel/getHotel">Hotel</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Transporte/getTransporte">Transporte</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Proveedor/getProv"> Proveedor Transporte</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Procedencia/getProcedencia">Procedencia</a></li>
                        <li class="active"><a href="<?php echo base_url();?>index.php/Destino/getDestino">Destino</a></li>
<!--                    <li class="active"><a href="<?php echo base_url();?>index.php/Viajes/getPaquetes">Paquetes</a></li>-->
                        
                     </ul>
                        
                        
                    </li>
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->session->userdata('user'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo base_url();?>index.php/Usuarios/cerrarSesion"><i class="fa fa-power-off"></i> Cerrar Sesion</a></li>

                        </ul>
                    </li>
                    <li class="divider-vertical"></li>
                    
                  

                   
                </ul>
            </div>
        </nav>
