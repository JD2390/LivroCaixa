<?php
  include('testasessao.php');
  if(isset($_GET['id'])){
	include('../db/PdoConexao.class.php');
  include('../db/InterfaceCRUD.class.php');
  include('../db/Regcaixa.class.php');
  include('../db/RegcaixaCRUD.class.php');
	//criando um objeto regcaixaCRUD
	$regcaixaCRUD = new RegcaixaCRUD();
	//buscando o item do emprestimo no banco de dados
	$busca = $regcaixaCRUD->ler($_GET['id']);
  }
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Atualizar Registro</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
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
    <div class="text-center" style="width: 25rem;">
      <h1 class="text-dark">Alterar Cadastro</h1>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../principal.php" class="brand-link">
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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sair                
              </p>
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
      <div class="container-fluid">
        <div class="row mb-2">
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">	    
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="form-group">
                  <a href="regbusca.php" class="btn btn-lg btn-default" /><i class='fa fa-arrow-left'></i>&nbsp;Voltar</a>
                </div>
                <form name="f1" method="POST" action="../controle/regcaixa/atualizar.php" onsubmit="return validar()">
					
					<div class="form-group">             
						<div class="col-md-12">
						   <label>ID</label>								  
						   <div class="input-group">
						    <div class="input-group-append">
							   <div class="input-group-text">
							      <span class="fa fa-info"></span>
							   </div>
							</div>
							<input value="<?php echo $busca->getId();?>" name="id" type="text" class="form-control" readonly="true">						
						   </div>
						</div>  
					</div>
          <div class="form-group">
            <div class="col-md-12">
              <label>Cliente</label>
              <div class="input-group">                
                <input name="cliente" type="text" class="form-control" value="<?php echo $_GET['cliente'];?>" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label>Item</label>
              <div class="input-group">                
                <input name="item" type="text" class="form-control" value="<?php echo $busca->getItem();?>" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <label>Fornecedor</label>
              <div class="input-group">                
                <input name="fornecedor" type="text" class="form-control" value="<?php echo $_GET['fornecedor'];?>" required>
              </div>
            </div>
          </div>          
        <div class="form-group">
          <div class="row">
            <div class="col-md-3">
              <label>Valor</label>
              <div class="input-group">
                <div class="input-group-append">
                 <div class="input-group-text">
                    <span class="fa fa-dollar-sign"></span>
                 </div>
                </div>         
                <input name="valor" id="valor" type="text" class="form-control" value="<?php echo $busca->getValor();?>" required>
              </div>
            </div>
            <div class="col-md-3">
              <label>Tipo</label>
              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-dolly"></span>
                  </div>
                </div>               
                <select name="tipo" class="form-control">
                  <?php                  
                   if ($busca->getTipo()=="vd") {
                    echo '<option value="vd">Venda</option>
                          <option value="cp">Compra</option>';
                  } else {
                    echo '<option value="cp">Compra</option>
                          <option value="vd">Venda</option>';
                  }
                   ?>
                </select>
              </div>
            </div>                       
            <div class="col-md-3">
               <label>Data do Registro</label>                  
               <div class="input-group">
                <div class="input-group-append">
                 <div class="input-group-text">
                    <span class="fa fa-calendar"></span>
                 </div>
              </div>
              <input value="<?php date_default_timezone_set('America/Fortaleza'); echo date('Y-m-d'); ?>" name="data" type="date" class="form-control" required>            
               </div>
            </div>
            <div class="col-md-3" style="display: none">
               <label>Hora do Registro</label>                  
               <div class="input-group">
                <div class="input-group-append">
                 <div class="input-group-text">
                    <span class="fa fa-clock"></span>
                 </div>
              </div>
              <input value="<?php echo date('H:i:s');?>" name="hora" type="time" class="form-control" required>           
               </div>
            </div> 
          </div>
        </div>
					<hr>
					<div class="form-group">
					    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Atualizar</button>
						<a href="regbusca.php" class="btn btn-danger"><i class="fa fa-times"></i>&nbsp;Cancelar</a>
					</div>
					
				</form>				
              </div>
            </div><!-- /.card -->
          </div>
		  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!--<div class="float-right d-none d-sm-inline">
      Anything you want
    </div>-->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022.</strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
  function validar(){
	if(confirm('Deseja realmente atualizar o registro?')){
	   return true;	
	}else{
	   return false;
	}  
  }
  $(function() {
  $('#valor').maskMoney({ decimal: '.', thousands: '', precision: 2 });
})
</script>
</body>
</html>
