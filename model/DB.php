<?php

require 'User.php';

class DB
{
    private static $instance = null;
    private $pdo;


    private function __construct()
    {

        $this->loadEnv('../.env');

        try {

            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
            $this->pdo = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro ao conectar: ' . $e->getMessage());
        }
    }


    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new DB();
        }
        return self::$instance;
    }


    public function getConnection()
    {
        return $this->pdo;
    }


    public function loadEnv($path)
    {
        if (!file_exists($path)) {
            throw new Exception("Arquivo .env não encontrado: " . $path);
        }


        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);

            $name = trim($name);
            $value = trim($value);

            $_ENV[$name] = $value;
        }
    }
}
