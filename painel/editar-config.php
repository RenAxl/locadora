<?php 
$tabela = 'config';
require_once("../conexao.php");

// 1) CAMPOS ENVIADOS PELO FORMULÁRIO
$nome      = $_POST['nome_sistema'];
$email     = $_POST['email_sistema'];
$telefone  = $_POST['telefone_sistema'];
$endereco  = $_POST['endereco_sistema'];
$instagram = $_POST['instagram_sistema'];


// 2) BUSCAR CONFIG ATUAL (PARA MANTER LOGOS QUANDO NÃO TROCAR)
$query_conf = $pdo->query("SELECT * FROM $tabela WHERE id = 1");
$res_conf   = $query_conf->fetch(PDO::FETCH_ASSOC);

// Se não vier nada, define valores padrão
$logo_atual     = $res_conf['logo']     ?? 'logo.png';

// Variáveis que serão salvas no banco
$logo     = $logo_atual;

// 3) PASTA FÍSICA DAS IMAGENS
// __DIR__ aqui é /opt/lampp/htdocs/locadora/painel
// então ../img = /opt/lampp/htdocs/locadora/img
$pasta_img = __DIR__ . '/../img/';


// ================= LOGO ==================
$imagem_temp_logo  = @$_FILES['foto-logo']['tmp_name']; 
$nome_original_logo = @$_FILES['foto-logo']['name'];

if($nome_original_logo != ""){
    $ext = strtolower(pathinfo($nome_original_logo, PATHINFO_EXTENSION));

    if($ext == 'png'){

        $nome_logo    = $nome_original_logo; // nome fixo que será usado no disco
        $caminho_logo = $pasta_img . $nome_logo;

        // Remove logo antiga se existir
        if(file_exists($caminho_logo)){
            @unlink($caminho_logo);
        }

        if(!move_uploaded_file($imagem_temp_logo, $caminho_logo)){
            echo "Erro ao salvar logo em: $caminho_logo";
            exit();
        }

        // Atualiza variável que será gravada no banco
        $logo = $nome_logo;

        

    }else{
        echo 'Extensão não permitida para a Logo! (somente .png)';
        exit();
    }
}

// ================= LOGO RELATÓRIO ==================
$imagem_temp_logo_rel  = @$_FILES['foto-logo-rel']['tmp_name']; 
$nome_original_logo_rel = @$_FILES['foto-logo-rel']['name'];

if($nome_original_logo_rel != ""){
    $ext = strtolower(pathinfo($nome_original_logo_rel, PATHINFO_EXTENSION));

    if($ext == 'jpg' || $ext == 'jpeg'){

        $nome_logo_rel    = $nome_original_logo_rel;
        $caminho_logo_rel = $pasta_img . $nome_logo_rel;

        if(file_exists($caminho_logo_rel)){
            @unlink($caminho_logo_rel);
        }

        if(!move_uploaded_file($imagem_temp_logo_rel, $caminho_logo_rel)){
            echo "Erro ao salvar logo do relatório em: $caminho_logo_rel";
            exit();
        }

        $logo_rel = $nome_logo_rel;

    }else{
        echo 'Extensão não permitida para Logo do Relatório! (somente .jpg)';
        exit();
    }
}


// ================= ÍCONE ==================
$imagem_temp_icone  = @$_FILES['foto-icone']['tmp_name']; 
$nome_original_icone = @$_FILES['foto-icone']['name'];

if($nome_original_icone != ""){
    $ext = strtolower(pathinfo($nome_original_icone, PATHINFO_EXTENSION));

    if($ext == 'png'){

        $nome_icone    = $nome_original_icone;
        $caminho_icone = $pasta_img . $nome_icone;

        if(file_exists($caminho_icone)){
            @unlink($caminho_icone);
        }

        if(!move_uploaded_file($imagem_temp_icone, $caminho_icone)){
            echo "Erro ao salvar ícone em: $caminho_icone";
            exit();
        }

        $icone = $nome_icone;

    }else{
        echo 'Extensão não permitida para Ícone! (somente .png)';
        exit();
    }
}


// 4) UPDATE NO BANCO, INCLUINDO OS LOGOS
$query = $pdo->prepare("UPDATE $tabela SET 
    nome      = :nome, 
    email     = :email, 
    telefone  = :telefone, 
    endereco  = :endereco, 
    instagram = :instagram,
    logo      = :logo,
    logo_rel  = :logo_rel,
    icone     = :icone
    WHERE id = 1
");

$query->bindValue(":nome",      $nome);
$query->bindValue(":email",     $email);
$query->bindValue(":telefone",  $telefone);
$query->bindValue(":endereco",  $endereco);
$query->bindValue(":instagram", $instagram);
$query->bindValue(":logo",      $logo);
$query->bindValue(":logo_rel",  $logo_rel);
$query->bindValue(":icone",     $icone);

$query->execute();

echo 'Editado com Sucesso';
?>
