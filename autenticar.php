<?php
@session_start();
// Inclua o arquivo de conexão
    require_once("conexão.php");
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha_crip = md5($senha);
   

    $cpf_sistema = str_replace(['.', '-'], '', $cpf_sistema);

    // Exemplo de consulta para verificar o usuário e senha no banco de dados
        $query = $pdo->prepare("SELECT * from usuarios where email = :email and senha_crip = :senha" );
        $query->bindValue(":email", "$usuario"); 
        $query->bindValue(":senha", "$senha_crip"); 
    
        $query->execute();
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
        $linhas = @count($resultado);

        if ($linhas > 0){
                if($resultado[0]['ativo'] !='Sim') {
                echo '<script>window.alert("Seu acesso foi desativado.")</script>';
                echo '<script>window.location="index.php"</script>'; 
                                                    }

            $_SESSION['nome'] = $resultado[0]['nome'];
            $_SESSION['id'] = $resultado[0]['id'];
            $_SESSION['categoria'] = $resultado[0]['categoria'];
                
            
        echo '<script>window.location="painel"</script>';

        }else{
            echo '<script>window.alert("Email ou senha incorretos. Tente novamente.")</script>';
            echo '<script>window.location="index.php"</script>';
                        };

?>




