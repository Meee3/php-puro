<?php
session_start();


if (!isset($_SESSION['user'])) {

    header('Location: pg_login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sucesso</title>
</head>

<body>
    <h2>Login bem-sucedido!</h2>
    <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
    <a href="logout.php">Sair</a>
</body>

</html>