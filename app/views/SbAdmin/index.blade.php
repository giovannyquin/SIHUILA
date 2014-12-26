<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield("Titulo")</title>
    <!-- Bootstrap Core CSS -->
    {{HTML::style('bootstrap/css/bootstrap.min.css')}}
    <!-- Custom CSS -->
    {{HTML::style('css/sb-admin.css')}}
    <!-- Morris Charts CSS -->
    {{HTML::style('css/plugins/morris.css')}}
    <!-- Custom Fonts -->
    {{HTML::style('font-awesome-4.1.0/css/font-awesome.min.css')}}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield("css")
</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio">SIHuila</a>
                <div class="navbar-text">Proyecto Piloto</div>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
<!--                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                       
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                        
                    </ul>
                </li>-->
<!--                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->primer_nombre.' '.Auth::user()->primer_apellido }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
<!--                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>-->
<!--                            {{ link_to("cerrarSesion", "Cerrar SesiÃ³n", array("class" => "fa fa-fw fa-power-off")) }}-->
                        <a href="{{ URL::to("cerrarSesion") }}"><i class="fa fa-fw fa-power-off"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ URL::to("inicio") }}"><i class="fa fa-fw fa-home"></i> Inicio</a>
                    </li>
                    <!--<li>
                        <a href="vendedor"><i class="fa fa-fw fa-bar-chart-o"></i> Vendedores</a>
                    </li>
                    <li>
                        <a href="producto"><i class="fa fa-fw fa-table"></i> Productos</a>
                    </li>-->
                    @if(Auth::user()->id_menu==1)
                    <li>
                        <!--{{ link_to("usuario", "Usuarios", array("class" => "fa fa-fw fa-edit")) }}-->
                        <a href="{{ URL::to("usuario") }}"><i class="fa fa-fw fa-edit"></i> Usuarios</a>
                    </li>
                    @endif
<!--                    <li>
                        <a href="{{ URL::to("listaMina") }}"><i class="fa fa-fw fa-desktop"></i> Ejecución Minas</a>
                    </li>-->
                    
                    <li>
                        <!--{{ link_to("listaMina", "EjecuciÃ³n Minas", array("class" => "fa fa-fw fa-edit")) }}-->
                        <a href="{{ URL::to("ListarUnidades") }}"><i class="fa fa-fw fa-desktop"></i> Unidades Mineras</a>
                    </li>
                    
                    @if(Auth::user()->id_menu==1 || Auth::user()->id==14)
                    <li>
<!--                        {{ link_to("datosMina", "Crear Minas", array("class" => "fa fa-fw fa-edit")) }}-->
                        <a href="javascript:;" data-toggle="collapse" data-target="#mineria"><i class="fa fa-fw fa-wrench"></i> Adm Mineria <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="mineria" class="collapse">
                            <li>
                                <a href="{{ URL::to("UnidadMinera") }}"><i class="fa fa-fw fa-wrench"></i> Adm Unidades Mineras</a>
                            </li>

<!--                            <li>
                                <a href="{{ URL::to("datosMina") }}"><i class="fa fa-fw fa-wrench"></i> Crear Unidades Mineras</a>
                            </li>-->
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->id_menu==1)
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Adm Encuestas <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="{{ URL::to("listaTiposEnc") }}">Editar Encuestas</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="{{ URL::to("EncSocial") }}"><i class="fa fa-fw fa-file"></i> Social</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-xs-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-file"></i> @yield("NombrePagina")
                            </li>
                        </ol>
                    </div>
                </div>
                @yield("SeccionTrabajo")
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    {{ HTML::script('bootstrap/js/jquery.js') }}
    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
    <!-- Morris Charts JavaScript -->
    {{ HTML::script('js/plugins/morris/raphael.min.js') }}
    {{ HTML::script('js/plugins/morris/morris.min.js') }}
    {{ HTML::script('js/plugins/morris/morris-data.js') }}
    {{ HTML::script('js/google/analytics.js') }}
    <!-- Seccion para adjuntar mas js o jquery -->
    @yield("JsJQuery")
</body>

</html>
