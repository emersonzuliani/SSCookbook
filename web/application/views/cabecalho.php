<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SSCookBook 1.0</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>
	<!-- Carregar imagem com título do sistema -->

	<!-- Menu -->
	<nav class="navbar navbar-default">
		 <div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="dropdown">
          				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros<span class="caret"></span></a>
          				<ul class="dropdown-menu" role="menu">  				        				
            				<li><?= anchor("/classificacao/classificacao", "Classificação") ?></li>
            				<li><?= anchor("/categoria/categoria", "Categoria") ?></li>
            				<li><?= anchor("/unidmedida/unidmedida", "Unidade de Medida") ?></li>
            				<li class="divider"></li>
            				<li><a href="#">Tabela de Conversão</a></li>
          				</ul>
          			</li>     		
        			<li><?= anchor("/receitas/receitas", "Cadastrar Receitas") ?></li>
        			<li><?= anchor("/receitas/receitas/filtroReceitas", "Buscar Receitas") ?></li>
        			<li><a href="#">Favoritas</a></li>
        			<li><a href="#">Conversão de Medidas</a></li>        
      			</ul>	  
			</div>
		</div>
	</nav>
	
	<!-- Fim do Menu -->
	<script src="<?= base_url("js/jquery.js") ?>"> </script>
	<script src="<?= base_url("js/bootstrap.js") ?>"> </script>		

	<div class="container">
<?php if($this->session->flashdata("success")) :?>
	<p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
<?php endif ?>

<?php if($this->session->flashdata("danger")) : ?>	
	<p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
<?php endif ?>
	</div>
	