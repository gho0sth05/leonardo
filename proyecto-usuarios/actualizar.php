<?php
$db = new PDO('sqlite:usuarios.db');

$stmt = $db->prepare(
    "UPDATE usuarios SET nombre=:nombre, correo=:correo WHERE id=:id"
);

$stmt->execute([
    ':nombre' => $_POST['nombre'],
    ':correo' => $_POST['correo'],
    ':id' => $_POST['id']
]);

header("Location: usuarios.php");
