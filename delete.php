<?php
require 'db.php';

$id = $_GET['id'];

// Eliminar usuario
$stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
