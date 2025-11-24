<?php 
$tabela = 'grupo_acessos';
require_once("../../../conexao.php");

echo <<<HTML
<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr>
	<th>Nome</th>	
	<th>Acessos</th>
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
<tr>
	<td>Cadastros</td>
	<td>3</td>
	<td>
		<big><a href="#" title="Editar"><i class="fa fa-edit text-primary"></i></a></big>
		<big><a href="#" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a></big>
	</td>
</tr>

<tr>
	<td>Pessoas</td>
	<td>1</td>
	<td>
		<big><a href="#" title="Editar"><i class="fa fa-edit text-primary"></i></a></big>
		<big><a href="#" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a></big>
	</td>
</tr>

<tr>
	<td>Cadastros</td>
	<td>3</td>
	<td>
		<big><a href="#" title="Editar"><i class="fa fa-edit text-primary"></i></a></big>
		<big><a href="#" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a></big>
	</td>
</tr>

<tr>
	<td>Pessoas</td>
	<td>4</td>
	<td>
		<big><a href="#" title="Editar"><i class="fa fa-edit text-primary"></i></a></big>
		<big><a href="#" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a></big>
	</td>
</tr>

HTML;


?>