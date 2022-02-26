<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_formulario.css">
    <title>Registro Personas</title>
</head>
<body>
    <section>
        <div>
            <form name="formulario_personas" class="formulario_registro" action="registro.php" method="">
                <h3>REGISTRO PERSONAS</h3> <br>
                <label >Cédula:</label>
                <input type="number"  name="cedula" required autofocus>
                <label>Nombre:</label>
                <input type="text"  name="nombre" required>
                <label>Apellido:</label>
                <input type="text" name="apellido" required>
                <label>Fecha de Nacimiento:</label>
                <input type="date" name="fecha_nacimiento" required>
                <label>Usuario: </label>
                <input type="text"  name="usuario" required>
                <label>Contraseña: </label>
                <input type="password"  name="contrasena" required>
                <button>REGISTRAR</button>
            </form>
        </div>
    </section>
</body>
</html>