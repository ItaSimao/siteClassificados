<?php 
session_start();
try {
    $pdo = new PDO("mysql:host=localhost;dbname=classificados", "root", "");
} catch (PDOException $e) {
    echo "Falhou: " . $e->getMessage();
}
