<?php
// Iniciar sesión y configurar datos de ejemplo


// Datos de ejemplo para la lista de enlaces (simulando una consulta a la base de datos)
$enlaces = $_SESSION['enlaces'] ?? [
    ['id' => 1, 'nombre' => 'Google', 'tipo' => 'Buscador', 'url' => 'https://www.google.com'],
    ['id' => 2, 'nombre' => 'GitHub', 'tipo' => 'Repositorio', 'url' => 'https://github.com']
];

// Obtener datos del enlace actual para edición (simulado)
$enlace = $_SESSION['enlace'] ?? ['nombre' => '', 'tipo' => '', 'url' => ''];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Gestión de Enlaces</title>
</head>
<body>
    <div class="d-flex">
        <div class="card col-sm-6">
            <div class="card-body">
                <form action="controlador.php?menu=Enlace" method="POST">
                    <div>
                        <label>Nombre</label>
                        <input type="text" value="<?= htmlspecialchars($enlace['nombre']) ?>" name="txtNombre" class="form-control">
                    </div>
                    <div>
                        <label>Tipo</label>
                        <input type="text" value="<?= htmlspecialchars($enlace['tipo']) ?>" name="txtTipo" class="form-control">
                    </div>
                    <div>
                        <label>Url</label>
                        <input type="text" value="<?= htmlspecialchars($enlace['url']) ?>" name="txtUrl" class="form-control">
                    </div>

                    <input type="submit" name="accion" value="Agregar" class="btn btn-info">
                    <input type="submit" name="accion" value="Actualizar" class="btn btn-success">
                </form>
            </div>       
        </div>
        <div class="col-sm-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>TIPO</th>
                        <th>URL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enlaces as $en): ?>
                        <tr>
                            <td><?= htmlspecialchars($en['id']) ?></td>
                            <td><?= htmlspecialchars($en['nombre']) ?></td>
                            <td><?= htmlspecialchars($en['tipo']) ?></td>
                            <td><?= htmlspecialchars($en['url']) ?></td>
                            <td>
                                <a class="btn btn-warning" href="controlador.php?menu=Enlace&accion=Editar&id=<?= $en['id'] ?>">Editar</a>
                                <a class="btn btn-danger" href="controlador.php?menu=Enlace&accion=Delete&id=<?= $en['id'] ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer class="footer" style="position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #333; text-align: center; color: white; margin-bottom: 0px;">
        <blockquote class="blockquote text-center mx-auto" style="background: #333333; margin-bottom: 0px; color: white;">
            <p class="mb-0">CONTACTO: admin@gmail.com Tel: 1234567890</p>
        </blockquote>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
