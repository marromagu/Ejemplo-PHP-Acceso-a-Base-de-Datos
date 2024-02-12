<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'ejemplo';
$usuarioDB = 'root';
$contrasenyaDB = 'root';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT * FROM libros;');
// Ejecuta consulta
$miConsulta->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leer - CRUD PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table td {
            border: 1px solid orange;
            text-align: center;
            padding: 1.3rem;
        }
        .button {
            border-radius: .5rem;
            color: white;
            background-color: orange;
            padding: 1rem;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <p><a class="button" href="crear.php">Crear</a></p>
    <table>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>¿Disponible?</th>
            <td></td>
            <td></td>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
           <td><?= $valor['codigo']; ?></td>
           <td><?= $valor['titulo']; ?></td>
           <td><?= $valor['autor']; ?></td>
           <td><?= $valor['disponible'] ? 'Si' : 'No'; ?></td>
           <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
           <td><a class="button" href="modificar.php?codigo=<?= $valor['codigo'] ?>">Modificar</a></td>
           <td><a class="button" href="borrar.php?codigo=<?= $valor['codigo'] ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>