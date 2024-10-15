<?php

class User
{
    public $in_user;

    public $name_user;
    public $email_user;
    public $password_user;
    public $title_user;

    public $code_user;
    public $created_at;
    public $updated_at;


    public function __construct($name, $email, $password, $title, $code_user)
    {
        $this->name_user = $name;
        $this->email_user = $email;
        $this->password_user = password_hash($password, PASSWORD_DEFAULT); // Hash seguro da senha
        $this->title_user = $title;
        $this->code_user = $code_user;
        $this->created_at = date("Y-m-d H:i:s");
        $this->updated_at = date("Y-m-d H:i:s");
    }


    public function createDB($pdo)
    {
        $sql = 'CREATE DATABASE IF NOT EXISTS test';
        $pdo->exec($sql);
        echo "Banco de dados criado com sucesso!<br>";
    }


    public function createUserTable($pdo)
    {
        $sql = '
        CREATE TABLE IF NOT EXISTS `test`.`users` (
            `in_user` INT NOT NULL AUTO_INCREMENT, 
            `name_user` VARCHAR(30) NOT NULL, 
            `email_user` VARCHAR(40) NOT NULL, 
            `password_user` VARCHAR(128) NOT NULL, 
            `title_user` VARCHAR(74) NOT NULL, 
            `code_user` VARCHAR(40) NOT NULL, 
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL,
            PRIMARY KEY (`in_user`)
        ) ENGINE = InnoDB 
        CHARSET=utf8mb4 
        COLLATE utf8mb4_unicode_ci;';

        $pdo->exec($sql);
        echo "Tabela users criada com sucesso!<br>";
    }


    public function insertUser($pdo)
    {
        $sql =
            '
        INSERT INTO `test`.`users` (name_user, email_user, password_user, title_user, code_user, created_at, updated_at) 
    VALUES (:name, :email, :password, :title, :code, :created_at, :updated_at)';

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $this->name_user,
            ':email' => $this->email_user,
            ':password' => $this->password_user,
            ':title' => $this->title_user,
            ':code' => $this->code_user,
            ':created_at' => $this->created_at,
            ':updated_at' => $this->updated_at
        ]);

        echo "Usuário inserido com sucesso!<br>";
    }
}
