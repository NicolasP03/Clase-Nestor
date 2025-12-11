<?php
require_once "personas.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $persona = new Persona(
        $_POST["nombre"],
        $_POST["apellido"],
        $_POST["fechaNacimiento"],
        $_POST["email"],
        $_POST["telefono"],
        $_POST["genero"]
    );

    // Guardar en JSON
    $archivo = "personas.json";
    $data = [];

    if (file_exists($archivo)) {
        $data = json_decode(file_get_contents($archivo), true);
    }

    $data[] = [
        "nombre" => $persona->getNombre(),
        "apellido" => $persona->getApellido(),
        "nombreCompleto" => $persona->getNombreCompleto(),
        "fechaNacimiento" => $persona->getFechaNacimiento(),
        "edad" => $persona->getEdad(),
        "email" => $persona->getEmail(),
        "telefono" => $persona->getTelefono(),
        "genero" => $persona->getGenero()
    ];

    file_put_contents($archivo, json_encode($data, JSON_PRETTY_PRINT));

    $mensaje = "Persona registrada correctamente.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Persona</title>
    <style>
        body{font-family: Arial;padding:20px;}
        form{width:300px;margin:auto;}
        input,select{width:100%;margin:5px 0;padding:8px;}
        .ok{background:#c8f7c5;padding:10px;margin:10px 0;}
    </style>
</head>
<body>

<?php if ($mensaje): ?>
<div class="ok"><?= $mensaje ?></div>
<?php endif; ?>

<h2>Registrar Persona</h2>

<form method="POST">
    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="date" name="fechaNacimiento" required>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="text" name="telefono" placeholder="Teléfono" required>

    <select name="genero">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
    </select>

    <button type="submit">Guardar</button>
</form>

</body>
</html>
