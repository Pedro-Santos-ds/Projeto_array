<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg,  #006400,#2F4F4F);
            color: #fff;
        }
        .login-title {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: #fff;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.15); 
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-control {
            margin-bottom: 15px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: none;
        }
        .form-control::placeholder {
            color: #ccc;
        }
        .btn-login {
            background-color: #28a745;
            border: none;
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-login:hover {
            background-color: #218838;
        }
        .alert {
            margin-top: 10px;
            color: #ffcccc;
        }
    </style>
</head>
<body>
<?php
$infos = [
    'email' => 'Pedro@gmail.com',
    'senha' => md5('123')
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);
    
    if ($email === $infos['email'] && $senha === $infos['senha']) {
        header('Location: destino.php');
        exit;
    } else {
        echo '<div class="alert">Email ou senha incorretos</div>';
    }
}
?>

<div class="login-box">
    <h2 class="login-title">LOGIN</h2>
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-login">Entrar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
