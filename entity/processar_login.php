<?php
session_start();

require_once '../model/DB.php';
require_once '../model/User.php';


$pdo = DB::getInstance()->getConnection();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $pdo->prepare("SELECT * FROM test.users WHERE email_user = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();


    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);


        if (password_verify($password, $user['password_user'])) {

            $_SESSION['user'] = $user['email_user'];
            header('Location: ../public/login_sucesso.php');
            exit();
        } else {

            header('Location: ../public/pg_login.html');
            exit();
        }
    } else {

        header('Location: ../public/pg_login.html');
        exit();
    }
} else {

    header('Location: ../public/pg_login.html');
    exit();
}
