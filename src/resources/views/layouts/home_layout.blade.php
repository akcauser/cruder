<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- REQUIRED SCRIPTS -->
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("assets/dist/css/adminlte.min.css") }}>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- jQuery -->
    <script src={{ asset("assets/plugins/jquery/jquery.min.js") }}></script>
    <!-- Bootstrap 4 -->
    <script src={{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset("assets/dist/js/adminlte.min.js") }}></script>


    <title>App Name - </title>
</head>
<body>

    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
            </ul>
        </nav>
    
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href={{ URL::to('/home_layout') }} class="brand-link">
                <img src={{ asset("img/logo.png") }}
                    alt="Laravel"
                    class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Akcauser Cruder</span>
            </a>
    
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                       @include('akcauser.cruder.layouts.sidebar_template')
                    </ul>
                </nav>
            </div>
        </aside>
    </div>

    @include("akcauser.cruder.layouts.data_list_layout")

</body>
</html>
