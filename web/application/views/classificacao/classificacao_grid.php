<div class="container">
<h2>Classificação</h2>

<?= anchor('classificacao/classificacao/cadastro',"<span class='glyphicon glyphicon-plus'></span> Novo", array("class" => "btn btn-primary"))?>
<div class="table-responsive">
<table class="table table-condensed table-striped">
	<tr>
		<th>#</th>
		<th>Código</th>
		<th>Descrição</th>
	</tr>
	
	
	
	<?php foreach($classificacao as $clas) : ?>
	<tr>
		<td>
		   <?= anchor("classificacao/classificacao/editar/{$clas["cla_codigo"]}",'<img src='. base_url("img/edit.png") . '>' ) ?>
		   <?= anchor("classificacao/classificacao/excluir/{$clas["cla_codigo"]}",'<img src='. base_url("img/delete.png") . '>' ) ?>	
		</td>
		<td>
		   <?= $clas["cla_codigo"] ?>					
		</td>			
		<td>
		   <?= $clas["cla_descricao"] ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div>
