<?php
//session_start(); // Iniciar sesión

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario'])) {
    $emp = $_SESSION['usuario']; // Recuperar el objeto usuario de la sesión
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body style="background: linear-gradient(to right, #3a7bd5, #3a6073);">
    <div>
        <h1 style="text-align:center;">Bienvenido a nuestra página</h1>
        <br>
        <center>
            <img src="https://www.shutterstock.com/image-vector/spanish-language-vector-template-welcome-260nw-1792430023.jpg" alt="BIENVENIDO">
        </center>
        <br>
        <p style="text-align:center;">
            Aquí, en nuestro tutorial educativo podrás ingresar a toda la información correspondiente a JIRA de una forma efectiva, rápida y dinámica.
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
<?php
} else {
    // Redirigir al controlador principal si no está autenticado
    header("Location: controlador/controlador.php?menu=Principal");
    exit();
}
?>