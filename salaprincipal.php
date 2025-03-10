<?php
session_start();

// Verificar si la sesión del usuario está activa
if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

// Obtener el nombre de usuario y el tipo de usuario de la sesión
$nombre = $_SESSION['nombre'];
$rol = $_SESSION['tipo_usuario'];

// Incluir la conexión a la base de datos
include('constant/conexionDB.php');
// include('controlador/createUser.php');

// Obtener los datos de la tabla empresas
$sql = "SELECT EMPNOMBRE, EMPVALORUNITARIO, EMPCANTIDADACCIONES, EMPTIPOMONEDA FROM EMPRESAS";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result === false) {
    die("Error en la consulta de empresas.");
}

$empresas = [];
foreach ($result as $row) {
    $empresas[$row['EMPNOMBRE']] = [
        'valor' => $row['EMPVALORUNITARIO'],
        'cantidadAcciones' => $row['EMPCANTIDADACCIONES'],
        'color' => '#' . dechex(rand(0x000000, 0xFFFFFF)) // Color aleatorio
    ];
}

if (!isset($_SESSION['dinero_usuario'])) {
    $_SESSION['dinero_usuario'] = 200;
}

$dinero_usuario = $_SESSION['dinero_usuario'];

// Manejo de datos enviados por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['empresa']) && isset($_POST['accion']) && isset($_POST['cantidad'])) {
        $empresa = htmlspecialchars($_POST['empresa']);
        $accion = htmlspecialchars($_POST['accion']);
        $cantidad = (int) htmlspecialchars($_POST['cantidad']);

        if (array_key_exists($empresa, $empresas)) {
            if ($accion === 'comprar' && $cantidad * $empresas[$empresa]['valor'] <= $dinero_usuario) {
                // Comprar acciones
                $dinero_usuario -= $cantidad * $empresas[$empresa]['valor'];
                $empresas[$empresa]['cantidadAcciones'] -= $cantidad;

                // Actualizar la empresa en la base de datos
                $sql = "UPDATE EMPRESAS SET EMPVALORUNITARIO=?, EMPCANTIDADACCIONES=? WHERE EMPNOMBRE=?";
                $stmt = $conn->prepare($sql);
                $nuevoValor = $empresas[$empresa]['valor'] + ($cantidad * 1); // Aumento del valor por cada acción comprada
                $stmt->execute([$nuevoValor, $empresas[$empresa]['cantidadAcciones'], $empresa]);

            } elseif ($accion === 'vender' && $cantidad <= $empresas[$empresa]['cantidadAcciones']) {
                // Vender acciones
                $dinero_usuario += $cantidad * $empresas[$empresa]['valor'];
                $empresas[$empresa]['cantidadAcciones'] += $cantidad;

                // Actualizar la empresa en la base de datos
                $sql = "UPDATE EMPRESAS SET EMPVALORUNITARIO=?, EMPCANTIDADACCIONES=? WHERE EMPNOMBRE=?";
                $stmt = $conn->prepare($sql);
                $nuevoValor = $empresas[$empresa]['valor'] - ($cantidad * 1); // Disminución del valor por cada acción vendida
                $stmt->execute([$nuevoValor, $empresas[$empresa]['cantidadAcciones'], $empresa]);
            }

            // Actualizar la sesión con los nuevos valores
            $_SESSION['empresas'] = $empresas;
            $_SESSION['dinero_usuario'] = $dinero_usuario;

            // Responder con éxito
            echo json_encode(['success' => true]);
            exit();
        } else {
            // Empresa no encontrada
            echo json_encode(['success' => false, 'message' => 'Empresa no encontrada.']);
            exit();
        }
    } else {
        // Datos incompletos
        echo json_encode(['success' => false, 'message' => 'Datos incompletos.']);
        exit();
    }
}

// Seleccionar una categoría aleatoria
$sql = "SELECT CATID, CATNOMBRE FROM CATEGORIAS ORDER BY RAND() LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$categoria = $stmt->fetch(PDO::FETCH_ASSOC);

if ($categoria) {
    $categoriaIDSeleccionada = $categoria['CATID'];

    // Obtener una noticia positiva
    $sql = "SELECT NOTID, NOTDESCRIPCION, NOTSENTIMIENTO FROM NOTICIAS WHERE SALID = ? AND NOTSENTIMIENTO = 1 ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$categoriaIDSeleccionada]);
    $noticiaPositiva = $stmt->fetch(PDO::FETCH_ASSOC);

    // Obtener una noticia negativa
    $sql = "SELECT NOTID, NOTDESCRIPCION, NOTSENTIMIENTO FROM NOTICIAS WHERE SALID = ? AND NOTSENTIMIENTO = 0 ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$categoriaIDSeleccionada]);
    $noticiaNegativa = $stmt->fetch(PDO::FETCH_ASSOC);

    $noticiasPorCategoria = [
        [
            'CategoriaID' => $categoriaIDSeleccionada,
            'Nombre' => $categoria['CATNOMBRE'],
            'Noticias' => [
                $noticiaPositiva,
                $noticiaNegativa
            ]
        ]
    ];
} else {
    $noticiasPorCategoria = [];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz de Acciones</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Tu CSS aquí */
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo">
                <img src="image/valores.jpg" alt="Logo">
            </div>
            <div class="user-info">
                <img src="image/user.png" alt="User">
                <div class="user-text">
                    <span><?php echo htmlspecialchars($nombre); ?></span>
                    <span class="host"><?php echo ($tipo_usuario == 1) ? "HOST" : $tipo_usuario; ?></span>
                </div>
            </div>
            <button class="settings-icon">⚙️</button>
        </div>
    </header>

    <div class="container">
        <div class="card">
            <canvas id="myChart"></canvas>
        </div>
        <div class="card">
            <h3 class="text-2xl font-semibold text-center mb-4">Noticias Positivas</h3>
            <table class="table">
                <tbody id="tabla-noticias-positivas">
                    <?php
                    if (!empty($noticiasPorCategoria)):
                        foreach ($noticiasPorCategoria as $categoria):
                            foreach ($categoria['Noticias'] as $noticia):
                                if ($noticia['NOTSENTIMIENTO'] == 1):
                                    echo '<tr class="positive"><td>' . htmlspecialchars($noticia['NOTDESCRIPCION']) . '</td></tr>';
                                endif;
                            endforeach;
                        endforeach;
                    else:
                        echo '<tr><td>No se encontraron noticias.</td></tr>';
                    endif;
                    ?>
                </tbody>
            </table>

            <h3 class="text-2xl font-semibold text-center mt-8 mb-4">Noticias Negativas</h3>
            <table class="table">
                <tbody id="tabla-noticias-negativas">
                    <?php
                    if (!empty($noticiasPorCategoria)):
                        foreach ($noticiasPorCategoria as $categoria):
                            foreach ($categoria['Noticias'] as $noticia):
                                if ($noticia['NOTSENTIMIENTO'] == 0):
                                    echo '<tr class="negative"><td>' . htmlspecialchars($noticia['NOTDESCRIPCION']) . '</td></tr>';
                                endif;
                            endforeach;
                        endforeach;
                    else:
                        echo '<tr><td>No se encontraron noticias.</td></tr>';
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div id="modal-principal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('modal-principal')">&times;</span>
            <p>¡Buena suerte en el simulador!</p>
            <p>Redirigiendo en <span id="countdown" class="countdown">10</span> segundos...</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalPrincipal = document.getElementById("modal-principal");
            const spanPrincipal = document.querySelector("#modal-principal .close");

            setTimeout(() => {
                modalPrincipal.style.display = "block";
                let countdown = 10;
                const countdownElement = document.getElementById("countdown");
                const countdownInterval = setInterval(() => {
                    countdown--;
                    countdownElement.textContent = countdown;
                    if (countdown === 0) {
                        clearInterval(countdownInterval);
                        window.location.href = "salacompraventa.php";
                    }
                }, 1000);
            }, 45000);

            spanPrincipal.onclick = function () {
                modalPrincipal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modalPrincipal) {
                    modalPrincipal.style.display = "none";
                }
            }

            const empresas = <?php echo json_encode($empresas); ?>;
            const labels = Object.keys(empresas);
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Cantidad de Acciones',
                    data: labels.map(empresa => empresas[empresa].cantidadAcciones),
                    backgroundColor: labels.map(empresa => empresas[empresa].color),
                    borderColor: labels.map(empresa => empresas[empresa].color),
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    indexAxis: 'y', // Cambiado a barra horizontal
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
        });

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
        
    </script>
</body>
</html>
