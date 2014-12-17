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
