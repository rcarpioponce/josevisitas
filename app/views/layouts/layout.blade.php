<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Visitas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{asset('index2.html')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">JS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Visitas</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
       
          <p style="color:white"> Bienvenido: {{Auth::user()->Nombres}} {{Auth::user()->Apellidos}}</p>
       
      </div>
      <!-- search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        @include('layouts.menu')
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @section('titulo')
        @show
      </h1>
    </section>

    <!-- Main content -->
    <section class="content" id="work_area">
        @section('work_area')
        @show
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2015</strong> Todos los derechos reservados.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="{{asset('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
  });

  $(document).on('ready',function(){
    //if($('#correosSelect').length == 1){
      $('#carreraSelect').on('change',function(){
        var carrera = $(this).val();
        var request = $.ajax({
          url: "{{asset('correos/carreras')}}" + "/" + carrera,
          method: "GET",
          dataType: "json"
        });
         
        request.done(function( data ) {
          $('#correosSelect').html('');
          data.forEach(function(o){
              var option = $('<option value="' + o.Correo+ '">');
              option.html(o.Correo);
              $('#correosSelect').append(option);
          });
        });
         
        request.fail(function( jqXHR, textStatus ) {
          alert( "Request failed: " + textStatus );
        });
      });

    //}

});
</script>
</body>
</html>
