<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>
    <div id="loginForm" class="form-container">
        <h2>Login</h2>
        <form method="POST" action="index.php">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <button type="submit" name="acao" value="login">Entrar</button>
        </form>
        <p>Não tem uma conta? <a href="javascript:showCadastroForm()">Cadastre-se</a></p>
    </div>

    <div id="cadastroForm" class="form-container" style="display:none;">
        <h2>Cadastrar</h2>
        <form method="POST" action="index.php">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email_cadastro" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha_cadastro" required>
            <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
        </form>
        <p>Já tem uma conta? <a href="javascript:showLoginForm()">Faça login</a></p>
    </div>

    <script>
        function showCadastroForm() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('cadastroForm').style.display = 'block';
        }

        function showLoginForm() {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('cadastroForm').style.display = 'none';
        }
    </script>

    <?php
    require '../modelo/ClassUsuario.php';
    require '../modelo/ClassUsuarioDAO.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $usuarioDAO = new ClassUsuarioDAO();

        if ($_POST['acao'] == 'login') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $usuario = $usuarioDAO->login($email, $senha);
            if ($usuario) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                echo "<script>alert('Login bem-sucedido!');</script>";
                header('Location: pagInicial.php');
            } else {
                echo "<script>alert('Email ou senha incorretos');</script>";
            }
        }

        if ($_POST['acao'] == 'cadastrar') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $novoUsuario = new Usuario($nome, $email, $senha);
            if ($usuarioDAO->cadastrar($novoUsuario)) {
                echo "<script>alert('Cadastro realizado com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar usuário');</script>";
            }
        }
    }
    ?>
</body>
</html>