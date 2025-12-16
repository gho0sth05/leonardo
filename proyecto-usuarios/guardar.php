<?php
try {
    // Conectar con PDO en lugar de SQLite3
    $db = new PDO('sqlite:usuarios.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Crear tabla si no existe
    $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        nombre TEXT NOT NULL,
        correo TEXT UNIQUE NOT NULL
    )");
    
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    
    // Preparar consulta
    $stmt = $db->prepare('INSERT INTO usuarios (nombre, correo) VALUES (:nombre, :correo)');
    $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindValue(':correo', $correo, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        echo "<h2>✅ Registro guardado correctamente</h2>";
        echo "<a href='index.html'>Volver</a>";
    } else {
        echo "<h2>❌ Error al guardar</h2>";
        echo "<a href='index.html'>Volver</a>";
    }
    
} catch(PDOException $e) {
    echo "<h2>❌ Error: " . $e->getMessage() . "</h2>";
    echo "<a href='index.html'>Volver</a>";
}
?>