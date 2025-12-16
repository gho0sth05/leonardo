<?php
$db = new PDO('sqlite:usuarios.db');

$stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $_GET['id']]);

header("Location: usuarios.php");
