<div class="container">
<h2>Cadastro de Sub-categorias</h2>

<?php
$cat_codigo = $categoria['cat_codigo'];
$cat_descricao = $categoria['cat_descricao'];
?>

<div class="bg-info">
	<h3><strong>Categoria:</strong> <?= $cat_codigo ?> - <?= $cat_descricao ?> </p>
</div>

<?php

$codigo = $subcategoria["sca_codigo"] === "" ? set_value("sca_codigo","") : $subcategoria["sca_codigo"];
$desc = $subcategoria['sca_descricao'];

echo form_open("categoria/subcategoria/salvar", "class='form-inline'");

echo form_hidden("cat_codigo",$cat_codigo,'');

echo "<div class='form-group'>";
echo form_label("Código", "sca_codigo");
echo form_input(array(
		"name" => "sca_codigo",
		"class" => "form-control",
		"id" => "sca_codigo",
		"maxlength" => "10",
		"type" => "number",
		"value" => $codigo), '', 'readonly');

echo "</div>";

echo "<div class='form-group'>";
echo form_label("Descrição", "sca_descricao");
echo form_input(array(
		"name" => "sca_descricao",
		"class" => "form-control",
		"id" => "sca_descricao",
		"maxlength" => "255",
		"value" => ($desc === "") ? set_value("sca_descricao","") : $desc
), '', 'autofocus');
echo "</div>";

echo form_button(array(
		"class" => "btn btn-primary",
		"content" => "<span class='glyphicon glyphicon-ok'></span> Adicionar",
		"type" => "submit"));

echo form_error("sca_codigo");
echo form_error("sca_descricao");

echo form_close();

?>

<!-- Incluir a grid com as sub-categorias -->

<div class="table-responsive">
<table class="table table-condensed table-striped">
	<tr>
		<th>#</th>
		<th>Código</th>
		<th>Descrição</th>
	</tr>
	
	<?php foreach($listasubcat as $lista) : ?>
	<tr>
		<td>
		   <?= anchor("categoria/subcategoria/excluir/{$lista['cat_codigo']}/{$lista['sca_codigo']}",'<img src='. base_url("img/delete.png") . '>' ) ?>	
		</td>
		<td>
		   <?= $lista["sca_codigo"] ?>					
		</td>			
		<td>
		   <?= $lista["sca_descricao"] ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>

<?php 
  echo anchor("/categoria/categoria", "Voltar", array('class' => 'btn btn-default btn-sm active', 'role' => 'button'));
?>



