<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>SSCookBook 1.0</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url("css/bootstrap.css") ?>">
</head>
<body>

	<script src="<?= base_url("js/jquery.js") ?>"> </script>
	<script src="<?= base_url("js/bootstrap.js") ?>"> </script>		

	<div class="container">

	<?php foreach($receitas as $lista) : ?>
		<h2><?=$lista["rec_nome"] ?></h2>
		<p><strong>Ingredientes</strong></br>		
		<?= nl2br($lista["rec_ingredientes"]) ?></p>
		
		<p><strong>Modo de Preparo</strong><br>
		<?= nl2br($lista["rec_modopreparo"]) ?></p>
		
		<p><strong>Tempo de Preparo:</strong>
		<?= $lista["rec_tmp_preparo"]?></p>
		
		<p><strong>Rendimento:</strong>
		<?= $lista["rec_rendimento"]?></p>
			
	<?php endforeach; ?>	
			
	</div>

</body>
</html>
