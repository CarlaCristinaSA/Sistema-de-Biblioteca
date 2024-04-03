<?php 
$tabela = 'usuarios';
require_once("../../../conexão.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$categoria = $_POST['categoria'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$senha = '123';
$senha_crip = md5($senha);
$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;

//validacao email
$query = $pdo->query("SELECT * from $tabela where email = '$email'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id_usuario != $id_reg){
	echo 'Email já Cadastrado!';
	exit();
}

//validacao telefone
$query = $pdo->query("SELECT * from $tabela where telefone = '$telefone'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];
if(@count($res) > 0 and $id_usuario != $id_reg){
	echo 'Telefone já Cadastrado!';
	exit();
}


if($id_usuario == ""){
$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, email = :email, senha = '', senha_crip = '$senha_crip', categoria = '$categoria', ativo = 'Sim', foto = 'sem-foto.jpg', telefone = :telefone, data = curDate(), endereco = :endereco, cpf = :cpf ");
	
}else{
$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, email = :email, categoria = '$categoria', telefone = :telefone, endereco = :endereco, cpf = :cpf where id = '$id'");
}
$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":endereco", "$endereco");
$query->bindValue(":cpf", "$cpf");
$query->execute();

echo 'Salvo com Sucesso';
 ?>
