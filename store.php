<?php
require 'db.php';

// Insertar nuevo usuario
$name = $_POST['name'];
$email = $_POST['email'];

$stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
$stmt->execute(['name' => $name, 'email' => $email]);

header("Location: index.php");
