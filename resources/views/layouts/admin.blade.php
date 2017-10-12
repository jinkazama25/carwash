<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" type="text/css" href=" {{asset('css/metisMenu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/sb-admin-2.css')}}">  
    <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
    
</head>

<body>

    <div id="wrapper">

        
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SISTEMA CARWASH</a>
            </div>
           

            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Ajustes</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('usuario/create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{Url('usuario/')}}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Cliente<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('cliente/create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{Url('cliente/')}}"><i class='fa fa-list-ol fa-fw'></i> Clientes</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-car" aria-hidden="true"></i> Automovil<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('carro/create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{Url('carro/')}}"><i class='fa fa-list-ol fa-fw'></i> Automovil</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-tint" aria-hidden="true"></i> Lavado<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('lavado/create')}}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="{{Url('lavado/')}}"><i class='fa fa-list-ol fa-fw'></i> Lavado</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bug" aria-hidden="true"></i> Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('lavado/fecha')}}"><i class="fa fa-calendar" aria-hidden="true"></i> Lavados del Dia</a>
                                </li>
                                <li>
                                    <a href="{{Url('/lavado/lista')}}"><i class="fa fa-money" aria-hidden="true"></i> Monto del Dia</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Exportar<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('excel/index')}}"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Reporte del Dia Excel</a>
                                </li>
                                <li>
                                    <a href="{{Url('/pdfMonto')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Monto del Dia Pdf</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i></i> Consultas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{Url('/reporte')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> Entre Dos Fechas</a>
                                </li>
                                <li>
                                    <a href="{{Url('reporte/carrosLavo')}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Mas Trabajador</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.js')}}"></script>
   
   
</body>

</html>
