<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f0f0f0;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .acciones a{
            display:inline;
            margin-right:10px;
        }
    </style>
</head>
<body>
    <h2>Lista de Usuarios Registrados</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        <?php
        try {
            $db = new PDO('sqlite:usuarios.db');
            $result = $db->query('SELECT * FROM usuarios');
            
            foreach($result as $row):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['nombre']) ?></td>
            <td><?= htmlspecialchars($row['correo']) ?></td>
            <td class="acciones">
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                <a href="eliminar.php?id=<?= $row['id'] ?>" 
                   onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                   Eliminar
                </a>
            </td>
        </tr>
        <?php 
            endforeach;
        } catch(PDOException $e) {
            echo "<tr><td colspan='4'>Error: " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>
    <a href="index.html">← Volver al formulario</a>
</body>
</html>
