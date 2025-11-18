<?php 

date_default_timezone_set('America/Sao_Paulo');

$url_sistema = "http://$_SERVER[HTTP_HOST]/";
$url = explode("//", $url_sistema);
if($url[1] == 'localhost/'){
	$url_sistema = "http://$_SERVER[HTTP_HOST]/locadora/";
}

//dados conexão bd local
$servidor = 'localhost';
$banco = 'locadora';
$usuario = 'root';
$senha = '';

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Erro ao conectar ao banco de dados!<br>';
	echo $e;
}

//variaveis globais
$nome_sistema = 'Nome Sistema';
$email_sistema = 'contato@hugocursos.com.br';
$telefone_sistema = '(31)97527-5084';

$query = $pdo->query("SELECT * from usuarios order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($res);

if($linhas > 0){
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

		echo "ID: $id <br>";
		echo "Nome: $nome <br>";
		echo "Telefone: $telefone <br>";
		echo "Email: $email <br>";
		echo "Senha: $senha <br>";
		echo "Foto: $foto <br>";
		echo "Nível: $nivel <br>";
		echo "Endereço: $endereco <br>";
		echo "Ativo: $ativo <br>";
		echo "Data: $data <br>";
		echo "<hr>"; 

	}
}

?>