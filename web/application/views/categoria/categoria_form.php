<div class="container">
<h2>Cadastro de Categoria</h2>

<?php

$codigo = $cat_codigo;
$desc = $cat_descricao;

if ($codigo === "") {
	$codigo = set_value("cat_codigo","");
}

echo form_open("categoria/categoria/salvar");

echo form_label("Código", "cat_codigo");
echo form_input(array(
		"name" => "cat_codigo",
		"class" => "form-control",
		"id" => "cat_codigo",
		"maxlength" => "10",
		"type" => "number",
		"value" => $codigo), '', 'readonly');

echo form_error("cat_codigo");

echo form_label("Descrição", "cat_descricao");
echo form_input(array(
		"name" => "cat_descricao",
		"class" => "form-control",
		"id" => "cat_descricao",
		"maxlength" => "255",
		"value" => ($desc === "") ? set_value("cat_descricao","") : $desc
), '', 'autofocus');
echo form_error("cat_descricao");

echo form_button(array(
		"class" => "btn btn-primary",
		"content" => "<span class='glyphicon glyphicon-ok'></span> Salvar",
		"type" => "submit"));

$js = 'onClick=history.back()';
echo form_button(array(
		"class" => "btn btn-default"),'Voltar' ,$js);


echo form_close();

?>
</div>