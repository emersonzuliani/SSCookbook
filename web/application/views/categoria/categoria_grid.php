<div class="container">
<h2>Categoria</h2>

<?= anchor('categoria/categoria/cadastro',"<span class='glyphicon glyphicon-plus'></span> Novo", array("class" => "btn btn-primary"))?>
<div class="table-responsive">
<table class="table table-condensed table-striped">
	<tr>
		<th>#</th>
		<th>Código</th>
		<th>Descrição</th>
		<th>--</th>
	</tr>

	<?php foreach($categoria as $lista) : ?>
	<tr>
		<td>
		   <?= anchor("categoria/categoria/editar/{$lista["cat_codigo"]}",'<img src='. base_url("img/edit.png") . '>' ) ?>
		   <?= anchor("categoria/categoria/excluir/{$lista["cat_codigo"]}",'<img src='. base_url("img/delete.png") . '>' ) ?>	
		</td>
		<td>
		   <?= $lista["cat_codigo"] ?>					
		</td>			
		<td>
		   <?= $lista["cat_descricao"] ?>
		</td>
		<td>
			<?= anchor("categoria/subcategoria/cadastro/{$lista["cat_codigo"]}",'Sub Categorias' ) ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div>
