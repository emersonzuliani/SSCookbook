<div class="container">
<h2>Buscar Receitas</h2>

<?php

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

echo form_open("receitas/receitas/buscar");

//cat_codigo - categorias
echo form_label("Categoria", "cat_codigo");
echo form_dropdown('cat_codigo',$opccat,'','id="cat_codigo" class = "form-control" onchange="load_dropdown_content($(\'#sca_codigo\'), this.value)"');
echo form_error("cat_codigo");

//sca_codigo - sub-categorias
echo form_label("Sub-Categoria", "sca_codigo");
echo form_dropdown('sca_codigo',array("0" => '...'),'',"id='sca_codigo' class = 'form-control' ");
echo form_error("sca_codigo");

//cla_codigo - Classificação
echo form_label("Classificacao", "cla_codigo");
echo form_dropdown('cla_codigo',$opcclas,'','id="cla_codigo" class="form-control"');
echo form_error("cla_codigo");
echo '<br>';
	
//rec_nome
echo form_label("Nome da Receita", "rec_nome");
echo form_input(array(
		"name" => "rec_nome",
		"class" => "form-control",
		"id" => "rec_nome",
		"maxlength" => "255"));
echo form_error("rec_nome");

//pesquisar
echo form_button(array(
		"class" => "btn btn-primary",
		"content" => "<span class='glyphicon glyphicon-ok'></span> Pesquisar",
		"type" => "submit"));

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

