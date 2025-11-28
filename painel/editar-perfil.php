<?php 
$tabela = 'usuarios';
require_once("../conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$conf_senha = $_POST['conf_senha'];
$endereco = $_POST['endereco'];
$senha = $_POST['senha'];
$senha_crip = sha1($senha);
$id = $_POST['id_usuario'];

if($conf_senha != $senha){
	echo 'As senhas não se coincidem';
	exit();
}

//validacao email
$query = $pdo->query("SELECT * from $tabela where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id != $id_reg){
	echo 'Email já Cadastrado!';
	exit();
}

//validacao telefone
$query = $pdo->query("SELECT * from $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id != $id_reg){
	echo 'Telefone já Cadastrado!';
	exit();
}




//validar troca da foto
$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['foto'];
}else{
	$foto = 'sem-foto.jpg';
}



//CÓDIGO DO CHATGPT. O CÓDIGO DO PROFESSOR HUGO NÃO ESTAVA FUNCIONANDO.
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

// CAMINHO FÍSICO (no servidor) – usa o diretório do próprio editar-perfil.php
$pasta_perfil = __DIR__ . '/images/perfil/';
$caminho = $pasta_perfil . $nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
    $ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
    if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
    
        // EXCLUI A FOTO ANTERIOR (no disco)
        if($foto != "sem-foto.jpg"){
            $arquivo_antigo = $pasta_perfil . $foto;
            if(file_exists($arquivo_antigo)){
                @unlink($arquivo_antigo);
            }
        }

        if (move_uploaded_file($imagem_temp, $caminho)) {
            $foto = $nome_img; // grava só o NOME no banco
        } else {
            echo 'Erro ao salvar imagem em: ' . $caminho;
            exit();
        }

    }else{
        echo 'Extensão de Imagem não permitida!';
        exit();
    }
}


$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, email = :email, telefone = :telefone, senha = :senha, senha_crip = '$senha_crip', endereco = :endereco, foto = '$foto' where id = '$id'");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":senha", "");
$query->execute();

echo 'Editado com Sucesso';
 ?>