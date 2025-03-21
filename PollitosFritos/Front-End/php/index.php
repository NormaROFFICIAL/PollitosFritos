<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Amor Hermosa 💖</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="top-bar">
        <button class="ver-empleados" onclick="window.location.href='empl.php'">Ver Empleados</button>
    </div>

    <div class="contenedor">
        <div class="imagen">
            <img src="../images/jaja.jpg" alt="Logo de la empresa">
        </div>
        <form class="formulario" action="procesar.php" method="POST" enctype="multipart/form-data">
            <h2>Registro de Empleados</h2>

            <div class="campo">
                <div>
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div>
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
            </div>

            <div class="campo">
                <div>
                    <label for="departamento">Departamento:</label>
                    <select id="departamento" name="departamento" required onchange="this.form.submit()">
                        <option value="">Selecciona...</option>
                        <option value="TI" <?= (isset($_POST['departamento']) && $_POST['departamento'] == 'TI') ? 'selected' : ''; ?>>TI</option>
                        <option value="RH" <?= (isset($_POST['departamento']) && $_POST['departamento'] == 'RH') ? 'selected' : ''; ?>>RH</option>
                        <option value="Contabilidad" <?= (isset($_POST['departamento']) && $_POST['departamento'] == 'Contabilidad') ? 'selected' : ''; ?>>Contabilidad</option>
                    </select>
                </div>
                <div>
                    <label for="puesto">Puesto:</label>
                    <select id="puesto" name="puesto" required>
                        <option value="">Selecciona departamento primero</option>
                        <?php
                        $puestos = [
                            'TI' => ['Programador', 'Soporte Redes'],
                            'RH' => ['Reclutador', 'Capacitador'],
                            'Contabilidad' => ['Contador', 'Auditor']
                        ];
                        if (isset($_POST['departamento']) && isset($puestos[$_POST['departamento']])) {
                            foreach ($puestos[$_POST['departamento']] as $p) {
                                echo "<option value='$p'>$p</option>";
                            }
                        }
                        ?>
                    </select>
                    <p class="ejemplo">
                        <?php
                        $ejemplos = [
                            'TI' => 'Ejemplo: Desarrollador de software, Técnico en redes',
                            'RH' => 'Ejemplo: Especialista en contratación, Instructor de personal',
                            'Contabilidad' => 'Ejemplo: Contador financiero, Auditor fiscal'
                        ];
                        if (isset($_POST['departamento']) && isset($ejemplos[$_POST['departamento']])) {
                            echo $ejemplos[$_POST['departamento']];
                        }
                        ?>
                    </p>
                </div>
            </div>

            <div class="campo">
                <div>
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" placeholder="nombre@PollitosFritos.com" pattern=".+@PollitosFritos\.com" required>
                </div>
                <div>
                    <label for="telefono">Número de Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" placeholder="Ejemplo: 5544332211" required>
                </div>
            </div>

            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto" accept="image/*">

            <button type="submit">Registrar</button>
        </form>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
