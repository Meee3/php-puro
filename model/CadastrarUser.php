<?php
require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/User.php';

$pdo = DB::getInstance()->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    echo "Formulário enviado com Sucesso";
    header('Location: ../public/pg_login.html');
    exit;
} else {

    header('Location: ../public/pg_cadastro_user.html');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $code_user = $_POST['code_user'];
    $title = buscaTitle($code_user);

    if (!$title) {
        $title = $_POST['title'];
    }


    $user = new User($nome, $email, $password, $title, $code_user);


    $user->createUserTable($pdo);


    $user->insertUser($pdo);


    header('Location: ../public/pg_login.html');
    exit;
} else {

    header('Location: ../public/pg_cadastro_user.html');
    exit;
}

function buscaTitle($codigo)
{
    $url = "https://jsonplaceholder.typicode.com/posts/$codigo";
    $response = file_get_contents($url);

    if ($response) {
        $data = json_decode($response, true);
        return isset($data['title']) ? $data['title'] : '';
    }

    return '';
}
