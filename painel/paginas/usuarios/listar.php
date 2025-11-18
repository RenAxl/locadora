<?php

$tabela = 'usuarios';
require_once("../../../conexao.php");

$query = $pdo->query("SELECT * from $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);
if($linhas > 0){

echo <<<HTML
<small>
  <table class="table table-hover" >
    <thead>
      <tr>
        <th>Nome</th>
        <th class="esc">Telefone</th>
        <th class="esc">Email</th>
        <th class="esc">Nível</th>
        <th class="esc">Foto</th>
        <th>Ações</th>
      </tr>
    </thead>
    <tbody>
HTML;

for($i=0; $i<$linhas; $i++){
    $id = $res[$i]['id'];
    $nome = $res[$i]['nome'];
    $telefone = $res[$i]['telefone'];
    $email = $res[$i]['email'];
    $senha = $res[$i]['senha'];
    $foto = $res[$i]['foto'];
    $nivel = $res[$i]['nivel'];
    $endereco = $res[$i]['endereco'];
    $ativo = $res[$i]['ativo'];
    $data = $res[$i]['data'];

    $dataF = implode('/', array_reverse(@explode('-', $data)));

  echo <<<HTML
      <tr>
        <td>
        <input type="checkbox"  class="form-check-input">
        {$nome}
        </td>
        <td class="esc">{$telefone}</td>
        <td class="esc">{$email}</td>
        <td class="esc">{$nivel}</td>
        <td class="esc"><img src="images/perfil/{$foto}" width="25px"></td>
        <td>
	          <big><a href="#" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

		        <a href="#" title="Excluir usuário" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

            <big><a href="#" title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>
            
            <big><a href="#" title="Ativar usuário"><i class="fa fa-check-square"></i></a></big>

            <big><a class="" href="#" title="Dar Permissões"><i class="fa fa-lock text-primary"></i></a></big>

        </td>      
      </tr>
HTML;

  }

  echo <<<HTML
</tbody>
</table>
HTML;

}else{
	echo '<small>Nenhum Registro Encontrado!</small>';
}

?>