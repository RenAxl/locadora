<?php 
require_once("conexao.php");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nome_sistema ?></title>

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
 	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
 	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/icone.png">

</head>
<body>
	<div class="login">		
		<div class="form">
			<img src="img/<?php echo $logo_sistema ?>" class="imagem">
			<form method="post" action="autenticar.php">
				<input type="email" name="usuario" placeholder="Seu Email" required>
				<input type="password" name="senha" placeholder="Senha" required>
				<button>Login</button>
			</form>	
			<br>
			<p class="recuperar"><a title="Clique para recupearar a senha" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">Recuperar Senha</a></p>

		</div>
	</div>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" >
    <div class="modal-content form">
     
      <form method="post" id="form-recuperar">     

      <div class="modal-body "> 
			
			<form method="post" id="form-recuperar">
				<input placeholder="Digite seu Email" class="form-control" type="email" name="email" id="email-recuperar" required> 
				<button type="submit">Recuperar</button>
			</form>				

		</div>
       <br>
       <small><div id="mensagem-recuperar" align="center"></div></small>
  </form>
    </div>
  </div>
</div>