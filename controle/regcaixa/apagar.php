<?php
   if(isset($_GET['id'])){
	  include('../../db/PdoConexao.class.php');   
	  include('../../db/Regcaixa.class.php');   
	  include('../../db/InterfaceCRUD.class.php');   
	  include('../../db/RegcaixaCRUD.class.php');
		 
	  //criar um objeto da classe RegcaixaCRUD
	  $regcaixaCRUD = new RegcaixaCRUD();
	
	  if($regcaixaCRUD->apagar($_GET['id'])){
		 header('Location: ../../registrocaixa/regbusca.php?mess=deleteok');
	  }else{
		 header('Location: ../../registrocaixa/regbusca.php?mess=deleteerro');
	  }
	 
   }
?>