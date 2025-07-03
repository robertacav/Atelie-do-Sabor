<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index.css">
    <title>Atelie do Sabor</title>
</head>
<body>

    <div class="container">
        <h1 class="titulo-doceria">Atelie do Sabor 🍰</h1>

        <!-- Inicio do formulario -->
        <form method="POST" action="" class="form-login">
            <label>Usuário: </label>
            <input type="text" name="usuario" placeholder="digite o usuário" required><br><br>

            <label>Senha: </label>
            <input type="password" name="senha_usuario" placeholder="digite a senha" required><br><br>

            <input type="submit" name="Sendlogin" value="Acessar">
        </form>
        <!-- fim do formulario -->

        <?php
        // Configurações do banco de dados
        $host = 'localhost';
        $user = 'root'; // usuário padrão do XAMPP
        $password = ''; // senha padrão do XAMPP (vazia)
        $database = 'atelie'; // substitua pelo nome do seu banco de dados

        // Conectar ao banco de dados
        $conn = new mysqli($host, $user, $password, $database);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Criptografia de senha (apenas para exemplo/criação de usuários)
        // echo password_hash(123456, PASSWORD_DEFAULT);

        // Receber dados do forms
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        // Acessar o IF quando o usuario clicar no botão de acesso do formulario
        if (!empty($dados["Sendlogin"])) {
            // Preparar a consulta SQL
            $query_usuario = "SELECT id, senha FROM usuarios WHERE usuario = ? LIMIT 1";
            $stmt = $conn->prepare($query_usuario);
            $stmt->bind_param("s", $dados["usuario"]);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado->num_rows == 1) {
                // Usuário encontrado, verificar senha
                $row_usuario = $resultado->fetch_assoc();
                if (md5($dados["senha_usuario"], $row_usuario['senha'])) {
                    // Senha correta - iniciar sessão e redirecionar
                    session_start();
                    $_SESSION['id'] = $row_usuario['id'];
                    $_SESSION['usuario'] = $dados["usuario"];

                    header("Location: home.php"); // redireciona para página restrita
                    exit();
                } else {
                    echo "<p class='erro'>Erro: Senha incorreta!</p>";
                }
            } else {
                echo "<p class='erro'>Erro: Usuário não encontrado!</p>";
            }
        }
        ?>
    </div>

</body>
</html>
