<div class="container">
<h2>Cadastro de Receitas</h2>

<?php

if (isset($receita)) {
	foreach($receita as $rec => $value) {
		$$rec = $value;		
	} 
} else {
	$rec_codigo = 0;
	$rec_nome = '';
	$cat_codigo = 0;
	$sca_codigo = 0;
	$cla_codigo = 0;
	$rec_tmp_preparo = 0;
	$rec_rendimento = 0;
}

//classificações para selecionar
$classif = $classificacao;
$opcclas = array("0" => " ");
foreach ($classif as $clas) :
	$opcclas[$clas['cla_codigo']] = $clas['cla_descricao'];
endforeach;

//categorias para selecionar
$categorias = $categoria;
$opccat = array("0" => " ");
foreach ($categorias as $cat) :
	$opccat[$cat['cat_codigo']] = $cat['cat_descricao'];
endforeach;

echo form_open("receitas/receitas/salvar");


//rec_codigo
echo form_label("Código", "rec_codigo");
echo form_input(array(
		"name" => "rec_codigo",
		"class" => "form-control",
		"id" => "rec_codigo",
		"maxlength" => "10",
		"type" => "number",
		"value" => $rec_codigo), '', 'readonly');
echo form_error("rec_codigo");

//cat_codigo - categorias
echo form_label("Categoria", "cat_codigo");
echo form_dropdown('cat_codigo',$opccat,array($cat_codigo),'id="cat_codigo" class = "form-control" onchange="load_dropdown_content($(\'#sca_codigo\'), this.value)"');
echo form_error("cat_codigo");

//sca_codigo - sub-categorias
echo form_label("Sub-Categoria", "sca_codigo");
echo form_dropdown('sca_codigo',array("0" => '...'),array($sca_codigo),"id='sca_codigo' class = 'form-control' ");
echo form_error("sca_codigo");

//cla_codigo - Classificação
echo form_label("Classificacao", "cla_codigo");
echo form_dropdown('cla_codigo',$opcclas,array($cla_codigo),'id="cla_codigo" class="form-control"');
echo form_error("cla_codigo");
echo '<br>';


//rec_nome
echo form_label("Nome da Receita", "rec_nome");
echo form_input(array(
		"name" => "rec_nome",
		"class" => "form-control",
		"id" => "rec_nome",
		"maxlength" => "255",
		"value" => ($rec_nome === "") ? set_value("rec_nome","") : $rec_nome));
echo form_error("rec_nome");


//rec_ingredientes
echo form_label("Ingredientes", "rec_ingredientes");
echo form_textarea(array(
		"name" => "rec_ingredientes",
		"class" => "form-control",
		"rows" => "3",
		"id" => "rec_ingredientes",
		"maxlength" => "2000",
		"value" => set_value("rec_ingredientes","")));
echo form_error("rec_ingredientes");

//rec_modopreparo
echo form_label("Modo Preparo", "rec_modopreparo");
echo form_textarea(array(
		"name" => "rec_modopreparo",
		"class" => "form-control",
		"id" => "rec_modopreparo",
		"value" => set_value("rec_modopreparo","")));
echo form_error("rec_modopreparo");

//rec_tmp_preparo
echo form_label("Tempo Preparo (minutos)", "rec_tmp_preparo");
echo form_input(array(
		"name" => "rec_tmp_preparo",
		"class" => "form-control",
		"id" => "rec_tmp_preparo",
		"maxlength" => "10",
		"type" => "number",
		"value" => $rec_tmp_preparo));
echo form_error("rec_tmp_preparo");


//rec_rendimento
echo form_label("Rendimento (porções)", "rec_rendimento");
echo form_input(array(
		"name" => "rec_rendimento",
		"class" => "form-control",
		"id" => "rec_rendimento",
		"maxlength" => "2",
		"type" => "number",
		"value" => $rec_rendimento));
echo form_error("rec_rendimento");

?>

<div class='radio'>
<fieldset>
<legend>Nível Dificuldade</legend>

<?php 
//rec_nivel_dificuldade (inteiro)
echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_nivel_dificuldade",
		"id" => "rec_nivel_dificuldade",
		"value" => '1',
		"checked" => TRUE));
echo "Muito Fácil </label> \n";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_nivel_dificuldade",
		"id" => "rec_nivel_dificuldade"), '2', FALSE);
echo "Fácil </label> \n";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_nivel_dificuldade",
		"id" => "rec_nivel_dificuldade"), '3', FALSE);
echo "Médio </label> \n";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_nivel_dificuldade",
		"id" => "rec_nivel_dificuldade"), '4', FALSE);
echo "Difícil </label> \n";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_nivel_dificuldade",
		"id" => "rec_nivel_dificuldade"), '5', FALSE);
echo "Muito Difícil </label> \n";
echo form_error("rec_nivel_dificuldade");
?>
</fieldset>
</div>


<div class='radio form-group'>
<fieldset>
<legend>Classificação</legend>

<?php 
//rec_classificação (inteiro - 1 a 5 estrelas)
echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_classificação",
		"id" => "rec_classificação"), '1', TRUE);
echo "1 </label>";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_classificação",
		"id" => "rec_classificação"), '2', FALSE);
echo "2 </label>";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_classificação",
		"id" => "rec_classificação"), '3', FALSE);
echo "3 </label>";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_classificação",
		"id" => "rec_classificação"), '4', FALSE);
echo "4 </label>";

echo "<label class='radio-inline'>";
echo form_radio(array(
		"name" => "rec_classificação",
		"id" => "rec_classificação"), '5', FALSE);
echo "5 </label>";


echo form_error("rec_classificação");
?>
</fieldset>
</div>

<?php 
//rec_observacoes
echo form_label("Observações", "rec_observacoes");
echo form_textarea(array(
		"name" => "rec_observacoes",
		"class" => "form-control",
		"id" => "rec_observacoes",
		"value" => set_value("rec_observacoes","")));
echo form_error("rec_observacoes");


echo form_button(array(
		"class" => "btn btn-primary",
		"content" => "<span class='glyphicon glyphicon-ok'></span> Salvar",
		"type" => "submit"));

echo form_button(array(
		"class" => "btn btn-default",
		"content" => "Limpar",
		"type" => "reset"));

echo form_close();


?>

</div>
<script type="text/javascript">

function load_dropdown_content(field_dropdown, selected_value){
    var result = $.ajax({
        'url' : '<?php echo site_url('receitas/receitas/getSubCategoria'); ?>/' + selected_value,
        'async' : false
    }).responseText;
    field_dropdown.replaceWith(result);
}

</script>

