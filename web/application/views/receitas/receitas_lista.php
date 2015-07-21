<div class="container">
<h2>Receitas</h2>

<div class="table-responsive">
<table class="table table-condensed table-striped">
	<tr>
		<th>#</th>
		<th>Nome</th>
		<th>Ingredientes</th>
		<th>Categoria</th>
		<th>Sub-Categoria</th>
		<th>Tmp. Preparo</th>
		<th>Dificuldade</th>
		<th>Classificação</th>		
	</tr>

	<?php foreach($receitas as $lista) : ?>
	<tr>
		<td>
		   <?= anchor("/receitas/receitas/getReceita/{$lista["rec_codigo"]}",'<img src='. base_url("img/edit.png") . '>' ) ?>
		   <?= anchor("/receitas/receitas/excluir/{$lista["rec_codigo"]}",'<img src='. base_url("img/delete.png") . '>' ) ?>
		   <?= anchor_popup("/receitas/receitas/imprimir/{$lista["rec_codigo"]}",'<img src='. base_url("img/print.png") . '>' ) ?>
		</td>
		<td>
		   <?= $lista["rec_nome"] ?>	
		</td>
		<td>
		   <?= substr_replace($lista["rec_ingredientes"], '...', 30);  ?>
		</td>			
		<td>
		   <?= $lista["cat_descricao"] ?>
		</td>
		<td>
		   <?= $lista["sca_descricao"] ?>		
		</td>
		<td>
		   <?= $lista["rec_tmp_preparo"] ?>		
		</td>
		<td>
		   <?= $lista["rec_nivel_dificuldade"] ?>		
		</td>
		<td>
		   <?= $lista["rec_classificacao"] ?>		
		</td>	
		
	</tr>
	<?php endforeach; ?>
</table>
</div>
</div>
