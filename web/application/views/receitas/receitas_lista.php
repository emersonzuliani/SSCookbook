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
			>
		</td>
		<td>
		   <?= anchor("/receitas/receitas/getReceita/".$lista["rec_codigo"], $lista["rec_nome"]) ?>	
		</td>
		<td>
		   <?= $lista["rec_ingredientes"] ?>
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
