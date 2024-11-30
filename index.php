<?php
require 'db.php';
include 'includes/header.php';

// Obtener todos los usuarios
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<h1 class="text-center mb-4">Lista de Usuarios</h1>
<div class="text-end mb-3">
    <a href="create.php" class="btn btn-primary">Agregar Usuario</a>
</div>
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
                <a href="edit.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger" 
                   onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include 'includes/footer.php'; ?>
