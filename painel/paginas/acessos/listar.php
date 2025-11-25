<?php 
$tabela = 'acessos';
require_once("../../../conexao.php");

$query = $pdo->query("SELECT * from $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas > 0){
echo <<<HTML
<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr>
	<th>Nome</th>	
	<th>Chave</th>	
	<th>Grupo</th>
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i<$linhas; $i++){
	$id = $res[$i]['id'];
	$nome = $res[$i]['nome'];
	$grupo = $res[$i]['grupo'];
	$chave = $res[$i]['chave'];
	$pagina = $res[$i]['pagina'];

$query2 = $pdo->query("SELECT * from grupo_acessos where id = '$grupo' ");
$res2 = $query2->fetchAll(PDO::FETCH_ASSOC);
if(@count($res2) > 0){
	$nome_grupo = $res2[0]['nome'];
}else{
	$nome_grupo = 'Sem Grupo';
}

echo <<<HTML
<tr>
<td>
<input type="checkbox" id="seletor-{$id}" class="form-check-input" >
{$nome}
</td>
<td class="esc">{$chave}</td>
<td class="esc">{$nome_grupo}</td>
<td>
	<big><a href="#" title="Editar">
            <i class="fa fa-edit text-primary"></i>
        </a>
    </big>
    <big><a href="#" title="Excluir">
            <i class="fa fa-trash-o text-danger"></i>
        </a>
    </big>  
</td>
</tr>
HTML;

}

echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
HTML;

}else{
	echo '<small>Nenhum Registro Encontrado!</small>';
}

?>

<script type="text/javascript">

	$(document).ready( function () {		
    $('#tabela').DataTable({
    	"language" : {
            //"url" : '//cdn.datatables.net/plug-ins/1.13.2/i18n/pt-BR.json'
        },
        "ordering": false,
		"stateSave": true
    });
} );

</script>
