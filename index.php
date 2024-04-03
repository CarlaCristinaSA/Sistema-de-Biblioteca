<?php

// Verifica se o formulário de login foi enviado
if (@$_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos de login e senha foram preenchidos
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Configurações do banco de dados
        $host = 'localhost'; // Endereço do servidor MySQL
        $dbUsername = 'root'; // Nome de usuário do MySQL
        $dbPassword = ''; // Senha do MySQL
        $dbName = 'professor_nicacio'; // Nome do banco de dados

        // Conecta ao banco de dados MySQL
        $conn = mysqli_connect($host, $dbUsername,   $dbPassword, $dbName);

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Obtém as credenciais informadas no formulário de login
        $login = $_POST['email'];
        $senha = $_POST['senha'];

        // Consulta SQL para verificar as credenciais
        $sql = "SELECT * FROM login WHERE email = '$login' AND senha = '$senha'";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        // Verifica se a consulta retornou algum resultado
        if (isset($resultado) > 0) {
            // Login bem-sucedido
            //$_SESSION['username'] = $login;

            // Redirecionar para a página protegida
            header("Location: inicio.php");
            exit();
        } else {
            // Credenciais inválidas
            $error = "Credenciais inválidas. Por favor, tente novamente.";
        }

        // Fecha a conexão com o banco de dados
        @mysqli_close($conn);
    } else {
        // Campos de login e senha não preenchidos
        $error = "Por favor, preencha todos os campos.";
    }
}
?>

<?php
require_once("conexão.php");
$query = $pdo->query("SELECT * from usuarios" );
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$linhas = @count($resultado);
$senha = '123';
$senha_crip = md5($senha);
if ($linhas == 0) {
    $query = $pdo->query("INSERT INTO usuarios SET nome = '$nome_sistema' , email = '$email_sistema' , senha  = '$senha', senha_crip = '$senha_crip', categoria = 'Administrador' , ativo = 'Sim', foto = 'sem-foto.jpg', telefone = '$telefone_sistema', CPF = '$cpf_sistema', Data = curDate() ");

} 
?>


<!DOCTYPE html>
<html>
<head>
            <title>Biblioteca Professor Nicacio</title>
            <link rel= "stylesheet" type="text/css" href="css/style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel= "shortcut icon" type="image/x-icon" href="img/icone.png">
            <i class="bi bi-book-half"></i>
            
</head>


    <body> 
        <div class="login">
            <div class="form"> 
                
                <form method="post" action="autenticar.php"> 
                    <div class="container" onclick="onclick">
                        <div class="top"></div>
                            <div class="bottom"></div>
                                <div class="center">
                                <div id="mensagem-sucesso" style="display: none;">
    Login bem-sucedido!
</div>

                                <img src="img\logo.png" class="imagem"> 
                                     <h2>Conecte-se, por favor</h2>
                                        <input type="email" name="usuario" placeholder="Email"/>
                                        <input type="password" name="senha" placeholder="Password"/>
                                <button>login</button>
                                <h2>&nbsp;</h2>
                            </div>    
                        </div>
                    </div>
                </form>  
            </div>       
        </div>
       
      </body>
</html>