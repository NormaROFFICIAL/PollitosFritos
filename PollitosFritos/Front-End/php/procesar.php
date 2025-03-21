<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $apellido = $_POST['apellido'] ?? '';
    $departamento = $_POST['departamento'] ?? '';
    $puesto = $_POST['puesto'] ?? '';
    $correo = $_POST['correo'] ?? '';
    $telefono = $_POST['telefono'] ?? '';

    // Procesar la imagen si se subió
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto_nombre = $_FILES['foto']['name'];
        $foto_tmp = $_FILES['foto']['tmp_name'];
        $ruta_destino = "uploads/" . $foto_nombre;

        // Mover la imagen a la carpeta de uploads
        if (move_uploaded_file($foto_tmp, $ruta_destino)) {
            echo "<p>Foto subida con éxito.</p>";
        } else {
            echo "<p>Error al subir la foto.</p>";
        }
    }

    echo "<h2>Empleado Registrado</h2>";
    echo "<p>Nombre: $nombre $apellido</p>";
    echo "<p>Departamento: $departamento</p>";
    echo "<p>Puesto: $puesto</p>";
    echo "<p>Correo: $correo</p>";
    echo "<p>Teléfono: $telefono</p>";
}
?>
