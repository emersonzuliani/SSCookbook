<div class="container">
<h2>Cadastro de Classificação</h2>

<?php

$codigo = $cla_codigo;
$desc = $cla_descricao;

if ($codigo === "") {
	$codigo = set_value("cla_codigo","");
}

echo form_open("classificacao/classificacao/salvar");

echo form_label("Código", "cla_codigo");
echo form_input(array(
		"name" => "cla_codigo",
		"class" => "form-control",
		"id" => "cla_codigo",
		"maxlength" => "10",
		"type" => "number",
		"value" => $codigo), '', 'readonly');

echo form_error("cla_codigo");

echo form_label("Descrição", "cla_descricao");
echo form_input(array(
		"name" => "cla_descricao",
		"class" => "form-control",
		"id" => "cla_descricao",
		"maxlength" => "255",
		"value" => ($desc === "") ? set_value("cla_descricao","") : $desc
));
echo form_error("cla_descricao");

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
