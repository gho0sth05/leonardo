<?php
$db = new PDO('sqlite:usuarios.db');

$stmt = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
$stmt->execute([':id' => $_GET['id']]);
$user = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<body>

<h3>Editar Usuario</h3>

<form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <input type="text" name="nombre" value="<?= $user['nombre'] ?>" required>
    <input type="email" name="correo" value="<?= $user['correo'] ?>" required>
    <button type="submit">Actualizar</button>
</form>

</body>
</html>
