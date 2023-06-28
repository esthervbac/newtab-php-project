<?php

$hostname = 'localhost:3305';
$username = 'root';
$password = '';
$dbName = 'phpprojeto';

try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbName", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conectado com sucesso!";
} catch (PDOException $e) {
    echo "Conexão falhou!: " . $e->getMessage();
}
