<!doctype html>
<html lang="pt-BR">
  <head>
	<meta http-equiv="refresh" content="60"/>
	
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- fontawesome -->
	<script src="https://kit.fontawesome.com/0409d33244.js"></script>
		
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Consulta porta</title>
  </head>
  <body>
  
 	<div class="container-fluid mt-5"> 
  <div class="jumbotron">
  <h1 class="display-4">Consulta de porta</h1>
  <small> Se a porta estiver fechada no servidor onde este script esta rodando, aparecerá como fechada... </small>
  <p class="lead"></p>
</div>


<?php
if(isset($_POST['ip']) AND isset($_POST['porta']) ){
	if(stest($_POST['ip'], $_POST['porta'])){
	echo "
	<div class='alert alert-success' role='alert'>
	A Porta ".$_POST['porta']." está <b style='color: green;'>aberta</b> em ".$_POST['ip']."
	</div>
	<br>
	<br>
	<a href='javascript:history.back()' class='btn btn-primary'>Nova Consulta</a>";
	}
	else{
		echo 
		"
		<div class='alert alert-danger' role='alert'>
		A Porta ".$_POST['porta']." está <b style='color: red;'>fechada</b> em ".$_POST['ip']."
		</div>
		<br>
		<br>
		<a href='javascript:history.back()' class='btn btn-primary'>Nova Consulta</a>";
	}

}else{
	echo "
	
		<form action='index.php' method='POST'>
			<label for='ip' class='ml-3' >IP:</label>
			<input type='text' id='ip' name='ip'>

			<label for='porta' class='ml-3' >PORTA:</label>
			<input type='text' id='porta' name='porta'>

			<input class='ml-1' type='submit' value='consultar'  />
		</form> 
	
	
	";
	
}



function stest($ip, $portt) {
    $fp = @fsockopen($ip, $portt, $errno, $errstr, 0.1);
    if (!$fp) {
        return false;
    } else {
        fclose($fp);
        return true;
    }
}

?>

	</div>
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
