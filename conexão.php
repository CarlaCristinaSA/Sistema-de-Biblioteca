<?php
//definir fuso horário
date_default_timezone_set('America/Fortaleza');

// Configurações da conexão
$servidor = 'localhost' ;
$banco = 'professor_nicacio';
$usuario = 'root';
$senha = '';

try {
    // Cria uma instância do PDO para a conexão
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", $usuario, $senha);
    
} catch (PDOException $e) {
    // Em caso de erro na conexão, redirecione para uma página de erro
    header("Location: Erro ao Logar com o Sistema da Biblioteca Professor Nicacio"); 
    exit;
    echo "Erro ao Logar com o Sistema da Biblioteca Professor Nicacio: ";
    echo '<br>' ;
}

// variavéis globais
$nome_sistema = 'Biblioteca Municipal Professor Nicácio';
$email_sistema = 'carllacris07@gmail.com';
$cpf_sistema = '107.723.353-11';
$telefone_sistema = '(88)99404-3061';
?>
