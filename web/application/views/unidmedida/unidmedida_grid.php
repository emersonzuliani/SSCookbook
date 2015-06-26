<div class="container">
<h2>Unidade de Medida</h2>

<?= anchor('unidmedida/unidmedida/cadastro',"<span class='glyphicon glyphicon-plus'></span> Novo", array("class" => "btn btn-primary"))?>
<div class="table-responsive">
<table class="table table-condensed table-striped">
	<tr>
		<th>#</th>
		<th>Código</th>
		<th>Descrição</th>
	</tr>	
	
	<?php foreach($unidmedida as $lista) : ?>
	<tr>
		<td>
		   <?= anchor("unidmedida/unidmedida/editar/{$lista["und_codigo"]}",'<img src='. base_url("img/edit.png") . '>' ) ?>
		   <?= anchor("unidmedida/unidmedida/excluir/{$lista["und_codigo"]}",'<img src='. base_url("img/delete.png") . '>' ) ?>	
		</td>
		<td>
		   <?= $lista["und_codigo"] ?>					
		</td>			
		<td>
		   <?= $lista["und_descricao"] ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div>

