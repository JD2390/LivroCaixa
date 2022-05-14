<?php
  include('testasessao.php');
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Controle De Cheques</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <div class="text-center" >
      <h1 class="text-dark">Controle de Cheques</h1>
    </div>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../principal.php" class="brand-link">
      <i class="fa fa-home"></i>
      <span class="brand-text font-weight-light">Home</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">        
        <div class="info">
          <a class="d-block">Usuário: <?php echo $_SESSION['nome_usuario'];?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->          
          <li class="nav-item">
            <a href="sair.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Sair</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">          
          <div class="col-lg-4">
            <div class="card card-primary card-outline bg-dark">
              <a href="frmcad.php">
              <div class="card-header bg-transparent border-primary">
                <h5>Cadastrar Cheque</h5>
              </div>
              <img class="card-img-top" src="imagens/paper-and-pencil.png" alt="Card image cap">
              </a>              
            </div><!-- /.card -->
          </div>
          <div class="col-lg-4">
            <div class="card card-info card-outline bg-dark">
              <a href="frmbusca.php">
              <div class="card-header bg-transparent border-info">
                <h5>Consulta & Alterar Cheques</h5>
              </div>
              <img class="card-img-top" src="imagens/checklist.png" alt="Card image cap">
              </a>              
            </div><!-- /.card -->
          </div>          
          </div>          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!--div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    < Default to the left -->
    <strong>Copyright &copy; 2022.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
