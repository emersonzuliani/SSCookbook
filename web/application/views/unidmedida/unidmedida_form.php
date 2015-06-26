<div class="container">
<h2>Cadastro de Unidade de Medida</h2>

<?php

$codigo = $und_codigo;
$desc = $und_descricao;

if ($codigo === "") {
	$codigo = set_value("und_codigo","");
}

echo form_open("unidmedida/unidmedida/salvar");

echo form_label("Código", "und_codigo");
echo form_input(array(
		"name" => "und_codigo",
		"class" => "form-control",
		"id" => "und_codigo",
		"maxlength" => "5",
		"value" => $codigo),'','autofocus');
echo form_error("und_codigo");

echo form_label("Descrição", "und_descricao");
echo form_input(array(
		"name" => "und_descricao",
		"class" => "form-control",
		"id" => "und_descricao",
		"maxlength" => "255",
		"value" => ($desc === "") ? set_value("und_descricao","") : $desc
));
echo form_error("und_descricao");

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

