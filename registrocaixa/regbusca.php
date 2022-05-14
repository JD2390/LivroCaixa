<?php
  include('testasessao.php');
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

  <title>Consulta de Vendas</title>

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
    <div class="text-center" style="width: 25rem;">
      <h1 class="text-dark">Consulta de Vendas</h1>
    </div>
    <!-- SEARCH FORM -->
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
            <a href="../sair.php" class="nav-link">
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
          <!-- /.col -->
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
							  
								<?php
								if(isset($_GET['mess'])){
									  //verifica se o valor de mess é erro
									  if($_GET['mess'] == 'deleteok'){
										  //escreve mensagem de login errado
										  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Atenção!</strong> Registro excluído com sucesso!
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>';
									  }
									  if($_GET['mess'] == 'deleteerro'){
										  //escreve mensagem de login errado
										  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Atenção!</strong> Erro ao excluir registro!
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>';
									  }
									  //verifica se o valor de mess é erro
									  if($_GET['mess'] == 'updateok'){
										  //escreve mensagem de login errado
										  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong>Atenção!</strong> Registro atualizado com sucesso!
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>';
									  }
									  if($_GET['mess'] == 'updateerro'){
										  //escreve mensagem de login errado
										  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong>Atenção!</strong> Erro ao atualizar registro!
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>';
									  }
									  
								}
								?>							
					<div class="form-group">
						<div class="col-md-12">
							<a href="../principal.php" class="btn btn-default" /><i class='fa fa-arrow-left'></i>&nbsp;Voltar</a>						
						</div>
					</div>
        <form id="formbusca" method="POST" action="regbusca.php">							
					<div class="col-md-12" >
						<div class="form-group ">             
						    <label>Digite o nome do Cliente</label>			  
						    <div class="input-group text-left">				  
									<input id="texto" name="texto" type="text" class="form-control input" placeholder="Insira a data busca"id="texto" required title="Digite uma texto para a busca">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-primary" type="submit" id="btnbuscar"><i class='fa fa-search'></i>&nbsp;Buscar</button></span>
								</div>
						</div>  
					</div>
					<div class="alert alert-light">
						Legenda: <span class="badge badge-danger">Compra</span>&nbsp;<span class="badge badge-success">Venda</span>
					</div>
					<div style="overflow:scroll;height:400px">
					 <table class="table table-hover table-checkable full-width" style="overflow:auto;">
						<thead class="thead-light">
						<tr>
							<th> ID </th>
						  <th> Cliente </th>
						  <th> Fornecedor </th>					                                                
							<th> Tipo </th>					                                                
							<th> Item </th>
							<th> Valor </th>
							<th> Data & Hora</th>
						  <th> Ações </th>
						</tr>
						</thead>
						<tbody>
							<?php
							  if(isset($_POST['texto'])){
								 include('../db/PdoConexao.class.php');
								 include('../db/InterfaceCRUD.class.php');
								 include('../db/Regcaixa.class.php');
								 include('../db/RegcaixaCRUD.class.php');
								 
								 //criando objeto da classe RegcaixaCRUD
								 $regcaixaCRUD = new RegcaixaCRUD();
								 
								 //criamos o sql pra consulta
								 $sql = "select *, date_format(data,'%d/%m/%Y') as databr from tbregistro where cliente like '%".$_POST['texto']."%' order by databr";
								 
								 //array com os dados da consulta
								 $busca = $regcaixaCRUD->consultar($sql);
								 //echo '<pre>';
								 //var_dump($busca);
								 									 
								 foreach($busca as $linha){
									 echo '<tr>						   
											   <td>'.$linha['id_registro'].'</td>';
									 if($linha['tipo'] != "vd" ){
									 	$linha['tipo'] = "compra";
										echo ' <td><span class="badge badge-danger">'.$linha['cliente'].'</span></td>';
									 }else{
									 	$linha['tipo'] = "venda";
										echo '<td><span class="badge badge-success">'.$linha['cliente'].'</span></td>'; 
									 }	
									 
									 echo '	   <td>'.$linha['fornecedor'].'</td>
									 			 <td>'.$linha['tipo'].'</td>
											   <td>'.$linha['item'].'</td>
											   <td>'.$linha['valor'].'</td>
											   <td>'.$linha['databr'].' '.$linha['hora'].'</td>
											   <td width="20%">
											   <a href="frmalt.php?id='.$linha['id_registro'].'&cliente='.$linha['cliente'].'&fornecedor='.$linha['fornecedor'].'" title="Alterar" class="btn btn-sm btn-info">
												 <i class="fa fa-book"></i>&nbsp;Alterar
											   </a>
											   <a href="../controle/regcaixa/apagar.php?id='.$linha['id_registro'].'" onclick="validarDelete()" title="Excluir" class="btn btn-sm btn-danger" >
												 <i class="fa fa-trash"></i>&nbsp;Excluir
											   </a>
											   </td>
											</tr>';
								 }
								}								 
							  
							?>
							
						</tbody>
					 </table>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Opções</h5>
      <a href="#">
      <p><i class="nav-icon fas fa-cog"></i>Configurações</p>
      </a>
      <a href="../sair.php">
      <p><i class="nav-icon fas fa-sign-out-alt"></i>Sair</p>
      </a>
    </div>
  </aside>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<script>
  function validarDelete(){
	  if(!confirm('Deseja realmente excluir o registro?')){
		 event.stopPropagation();
		 event.preventDefault();
		 return false;
	  }
  }
</script>
</body>
</html>
