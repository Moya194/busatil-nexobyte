<?php
session_start();

// Verify if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: auth-login.php");
    exit();
}

// Check if we have a room ID from session or from URL
if (isset($_GET['salaID'])) {
    $salaID = intval($_GET['salaID']);
    $_SESSION['salaID'] = $salaID;
} elseif (isset($_SESSION['salaID'])) {
    $salaID = $_SESSION['salaID'];
} else {
    echo "Error: No sala ID specified.";
    exit();
}

// Get user information
$user_id = $_SESSION['user_id'];
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario";
$tipo_usuario = isset($_SESSION['tipo_usuario']) ? $_SESSION['tipo_usuario'] : 0;

// Include database connection
include('constant/conexionDB.php');

// Check if the room is active
try {
    $query = "SELECT r.RANESTADO, s.SALNOMBRE, s.SALDESCRIPCION, s.SALNUMEROTURNOS 
              FROM RANKING r 
              JOIN SALAS s ON r.SALID = s.SALID 
              WHERE r.SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();
    $roomInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$roomInfo) {
        echo "Error: Room not found.";
        exit();
    }
    
    if ($roomInfo['RANESTADO'] !== 'Activa') {
        header("Location: sala-espera.php?salaID=" . $salaID);
        exit();
    }
    
    // Check if user is part of this room's ranking
    $query = "SELECT RANID FROM RANKING 
              WHERE SALID = :salaID AND 
              (RANIDUSERUNO = :userID OR RANIDUSERDOS = :userID OR RANIDUSERTRES = :userID OR 
               RANIDUSERCUATRO = :userID OR RANIDUSERCINCO = :userID OR RANIDUSERSEIS = :userID OR 
               RANIDUSERSIETE = :userID OR RANIDUSEROCHO = :userID OR RANIDUSERNUEVE = :userID OR 
               RANIDUSERDIEZ = :userID)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->bindParam(':userID', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() === 0) {
        echo "Error: You are not part of this room.";
        exit();
    }
    
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit();
}

// Initialize user's money if not set
if (!isset($_SESSION['dinero_usuario'])) {
    $_SESSION['dinero_usuario'] = 200;
}
$dinero_usuario = $_SESSION['dinero_usuario'];

// Get user's portfolio from database or create it if it doesn't exist
try {
    // Check if user has a portfolio for this room
    $query = "SELECT * FROM USER_PORTFOLIO WHERE USEID = :userID AND SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userID', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() === 0) {
        // Create a new portfolio
        $query = "INSERT INTO USER_PORTFOLIO (USEID, SALID, DINERO_DISPONIBLE) VALUES (:userID, :salaID, :dinero)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userID', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
        $stmt->bindParam(':dinero', $dinero_usuario);
        $stmt->execute();
    } else {
        // Get existing portfolio data
        $portfolio = $stmt->fetch(PDO::FETCH_ASSOC);
        $dinero_usuario = $portfolio['DINERO_DISPONIBLE'];
        $_SESSION['dinero_usuario'] = $dinero_usuario;
    }
} catch (PDOException $e) {
    // If USER_PORTFOLIO table doesn't exist, create it
    try {
        $query = "CREATE TABLE IF NOT EXISTS USER_PORTFOLIO (
                     PORTFOLIO_ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                     USEID INT,
                     SALID INT,
                     DINERO_DISPONIBLE DECIMAL(10,2) DEFAULT 200.00,
                     FOREIGN KEY (USEID) REFERENCES USER(USEID),
                     FOREIGN KEY (SALID) REFERENCES SALAS(SALID)
                  )";
        $conn->exec($query);
        
        // Create portfolio_stocks table
        $query = "CREATE TABLE IF NOT EXISTS PORTFOLIO_STOCKS (
                     ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                     PORTFOLIO_ID INT,
                     EMPID INT,
                     CANTIDAD INT DEFAULT 0,
                     PRECIO_COMPRA DECIMAL(10,2) DEFAULT 0.00,
                     FOREIGN KEY (PORTFOLIO_ID) REFERENCES USER_PORTFOLIO(PORTFOLIO_ID),
                     FOREIGN KEY (EMPID) REFERENCES EMPRESAS(EMPID)
                  )";
        $conn->exec($query);
        
        // Try again to create user portfolio
        $query = "INSERT INTO USER_PORTFOLIO (USEID, SALID, DINERO_DISPONIBLE) VALUES (:userID, :salaID, :dinero)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userID', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
        $stmt->bindParam(':dinero', $dinero_usuario);
        $stmt->execute();
    } catch (PDOException $e2) {
        echo "Error setting up portfolio: " . $e2->getMessage();
        exit();
    }
}

// Get companies for this room
try {
    $query = "SELECT e.EMPID, e.EMPNOMBRE, e.EMPVALORUNITARIO, e.EMPCANTIDADACCIONES, e.EMPTIPOMONEDA, c.CATNOMBRE 
              FROM EMPRESAS e
              LEFT JOIN CATEGORIAS c ON e.CATID = c.CATID
              WHERE e.SALID = :salaID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if (empty($result)) {
        // Create some default companies if none exist
        $defaultCompanies = [
            ['nombre' => 'TechCorp', 'valor' => 10.50, 'acciones' => 1000, 'moneda' => 'USD', 'categoria' => 'Tecnología'],
            ['nombre' => 'AgriGlobal', 'valor' => 8.25, 'acciones' => 1500, 'moneda' => 'USD', 'categoria' => 'Agricultura'],
            ['nombre' => 'EnergyX', 'valor' => 15.75, 'acciones' => 800, 'moneda' => 'USD', 'categoria' => 'Energía'],
            ['nombre' => 'HealthPlus', 'valor' => 22.30, 'acciones' => 600, 'moneda' => 'USD', 'categoria' => 'Salud']
        ];
        
        foreach ($defaultCompanies as $company) {
            // Check if category exists, create if not
            $query = "SELECT CATID FROM CATEGORIAS WHERE CATNOMBRE = :nombre";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':nombre', $company['categoria']);
            $stmt->execute();
            
            if ($stmt->rowCount() === 0) {
                $query = "INSERT INTO CATEGORIAS (CATNOMBRE) VALUES (:nombre)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':nombre', $company['categoria']);
                $stmt->execute();
                $catID = $conn->lastInsertId();
            } else {
                $catID = $stmt->fetch(PDO::FETCH_ASSOC)['CATID'];
            }
            
            // Create company
            $query = "INSERT INTO EMPRESAS (SALID, CATID, EMPNOMBRE, EMPVALORUNITARIO, EMPCANTIDADACCIONES, EMPTIPOMONEDA) 
                      VALUES (:salaID, :catID, :nombre, :valor, :acciones, :moneda)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
            $stmt->bindParam(':catID', $catID, PDO::PARAM_INT);
            $stmt->bindParam(':nombre', $company['nombre']);
            $stmt->bindParam(':valor', $company['valor']);
            $stmt->bindParam(':acciones', $company['acciones']);
            $stmt->bindParam(':moneda', $company['moneda']);
            $stmt->execute();
        }
        
        // Fetch the newly created companies
        $query = "SELECT e.EMPID, e.EMPNOMBRE, e.EMPVALORUNITARIO, e.EMPCANTIDADACCIONES, e.EMPTIPOMONEDA, c.CATNOMBRE 
                  FROM EMPRESAS e
                  LEFT JOIN CATEGORIAS c ON e.CATID = c.CATID
                  WHERE e.SALID = :salaID";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Error loading companies: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sala de Trading - <?php echo htmlspecialchars($roomInfo['SALNOMBRE']); ?></title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .stock-card {
            transition: transform 0.3s;
        }
        .stock-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .money-display {
            font-size: 1.5rem;
            font-weight: bold;
            color: #28a745;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <?php include('includes/navbar.php'); ?>
    
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <h1><?php echo htmlspecialchars($roomInfo['SALNOMBRE']); ?></h1>
                <p><?php echo htmlspecialchars($roomInfo['SALDESCRIPCION']); ?></p>
            </div>
            <div class="col-md-4 text-end">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tu Dinero</h5>
                        <div class="money-display">$<?php echo number_format($dinero_usuario, 2); ?></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Portfolio Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4>Tu Portafolio</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Empresa</th>
                                        <th>Cantidad</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio Actual</th>
                                        <th>Valor Total</th>
                                        <th>Ganancia/Pérdida</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="portfolio-table">
                                    <?php
                                    try {
                                        // Get user's portfolio ID
                                        $query = "SELECT PORTFOLIO_ID FROM USER_PORTFOLIO WHERE USEID = :userID AND SALID = :salaID";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bindParam(':userID', $user_id, PDO::PARAM_INT);
                                        $stmt->bindParam(':salaID', $salaID, PDO::PARAM_INT);
                                        $stmt->execute();
                                        $portfolioID = $stmt->fetch(PDO::FETCH_ASSOC)['PORTFOLIO_ID'];
                                        
                                        // Get user's stocks
                                        $query = "SELECT ps.*, e.EMPNOMBRE, e.EMPVALORUNITARIO 
                                                  FROM PORTFOLIO_STOCKS ps
                                                  JOIN EMPRESAS e ON ps.EMPID = e.EMPID
                                                  WHERE ps.PORTFOLIO_ID = :portfolioID AND ps.CANTIDAD > 0";
                                        $stmt = $conn->prepare($query);
                                        $stmt->bindParam(':portfolioID', $portfolioID, PDO::PARAM_INT);
                                        $stmt->execute();
                                        $stocks = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        
                                        $totalPortfolioValue = 0;
                                        
                                        foreach ($stocks as $stock) {
                                            $totalValue = $stock['CANTIDAD'] * $stock['EMPVALORUNITARIO'];
                                            $totalPortfolioValue += $totalValue;
                                            $originalValue = $stock['CANTIDAD'] * $stock['PRECIO_COMPRA'];
                                            $profit = $totalValue - $originalValue;
                                            $profitClass = $profit >= 0 ? 'text-success' : 'text-danger';
                                            $profitSign = $profit >= 0 ? '+' : '';
                                            
                                            echo '<tr>';
                                            echo '<td>' . htmlspecialchars($stock['EMPNOMBRE']) . '</td>';
                                            echo '<td>' . $stock['CANTIDAD'] . '</td>';
                                            echo '<td>$' . number_format($stock['PRECIO_COMPRA'], 2) . '</td>';
                                            echo '<td>$' . number_format($stock['EMPVALORUNITARIO'], 2) . '</td>';
                                            echo '<td>$' . number_format($totalValue, 2) . '</td>';
                                            echo '<td class="' . $profitClass . '">' . $profitSign . '$' . number_format($profit, 2) . '</td>';
                                            echo '<td>';
                                            echo '<button class="btn btn-sm btn-success me-1 sell-stock" data-emp-id="' . $stock['EMPID'] . '" data-emp-name="' . htmlspecialchars($stock['EMPNOMBRE']) . '" data-emp-price="' . $stock['EMPVALORUNITARIO'] . '" data-emp-quantity="' . $stock['CANTIDAD'] . '">Vender</button>';
                                            echo '</td>';
                                            echo '</tr>';
                                        }
                                        
                                        if (empty($stocks)) {
                                            echo '<tr><td colspan="7" class="text-center">No tienes acciones en tu portafolio.</td></tr>';
                                        }
                                    } catch (PDOException $e) {
                                        echo '<tr><td colspan="7" class="text-center text-danger">Error loading portfolio: ' . $e->getMessage() . '</td></tr>';
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-info">
                                        <th colspan="4">Valor Total del Portafolio</th>
                                        <th>$<?php echo isset($totalPortfolioValue) ? number_format($totalPortfolioValue, 2) : '0.00'; ?></th>
                                        <th colspan="2"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Market Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4>Mercado de Acciones</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($result as $company): ?>
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card stock-card h-100">
                                    <div class="card-header">
                                        <h5 class="card-title"><?php echo htmlspecialchars($company['EMPNOMBRE']); ?></h5>
                                        <span class="badge bg-info"><?php echo htmlspecialchars($company['CATNOMBRE']); ?></span>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="text-center mb-3">$<?php echo number_format($company['EMPVALORUNITARIO'], 2); ?></h4>
                                        <p class="card-text">Acciones disponibles: <?php echo number_format($company['EMPCANTIDADACCIONES']); ?></p>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary buy-stock" 
                                                data-emp-id="<?php echo $company['EMPID']; ?>" 
                                                data-emp-name="<?php echo htmlspecialchars($company['EMPNOMBRE']); ?>" 
                                                data-emp-price="<?php echo $company['EMPVALORUNITARIO']; ?>" 
                                                data-emp-available="<?php echo $company['EMPCANTIDADACCIONES']; ?>">
                                                Comprar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Buy Modal -->
    <div class="modal fade" id="buyModal" tabindex="-1" aria-labelledby="buyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="buyModalLabel">Comprar Acciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="buyForm">
                        <input type="hidden" id="buyEmpID" name="empID">
                        <div class="mb-3">
                            <label for="buyCompanyName" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="buyCompanyName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="buyPrice" class="form-label">Precio por Acción</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" id="buyPrice" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="buyQuantity" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="buyQuantity" name="quantity" min="1" value="1">
                        </div>
                        <div class="mb-3">
                            <label for="buyTotal" class="form-label">Total a Pagar</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" id="buyTotal" readonly>
                            </div>
                        </div>
                        <div class="alert alert-info">
                            Dinero disponible: $<span id="availableMoney"><?php echo number_format($dinero_usuario, 2); ?></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmBuy">Confirmar Compra</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sell Modal -->
    <div class="modal fade" id="sellModal" tabindex="-1" aria-labelledby="sellModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sellModalLabel">Vender Acciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="sellForm">
                        <input type="hidden" id="sellEmpID" name="empID">
                        <div class="mb-3">
                            <label for="sellCompanyName" class="form-label">Empresa</label>
                            <input type="text" class="form-control" id="sellCompanyName" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="sellPrice" class="form-label">Precio por Acción</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" id="sellPrice" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="sellQuantity" class="form-label">Cantidad (Máximo: <span id="maxSellQuantity"></span>)</label>
                            <input type="number" class="form-control" id="sellQuantity" name="quantity" min="1" value="1">
                        </div>
                        <div class="mb-3">
                            <label for="sellTotal" class="form-label">Total a Recibir</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" id="sellTotal" readonly>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="confirmSell">Confirmar Venta</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Buy stock modal
            $('.buy-stock').click(function() {
                const empID = $(this).data('emp-id');
                const empName = $(this).data('emp-name');
                const empPrice = $(this).data('emp-price');
                
                $('#buyEmpID').val(empID);
                $('#buyCompanyName').val(empName);
                $('#buyPrice').val(empPrice.toFixed(2));
                $('#buyQuantity').val(1);
                $('#buyTotal').val(empPrice.toFixed(2));
                
                $('#buyModal').modal('show');
            });
            
            // Calculate total when quantity changes
            $('#buyQuantity').on('input', function() {
                const quantity = parseInt($(this).val()) || 0;
                const price = parseFloat($('#buyPrice').val());
                $('#buyTotal').val((quantity * price).toFixed(2));
            });
            
            // Confirm buy
            $('#confirmBuy').click(function() {
                const empID = $('#buyEmpID').val();
                const quantity = $('#buyQuantity').val();
                const total = parseFloat($('#buyTotal').val());
                const availableMoney = parseFloat($('#availableMoney').text().replace(/,/g, ''));
                
                if (total > availableMoney) {
                    alert('No tienes suficiente dinero para esta compra.');
                    return;
                }
                
                // AJAX call to buy stocks
                $.ajax({
                    url: 'api/buy-stock.php',
                    method: 'POST',
                    data: {
                        empID: empID,
                        quantity: quantity,
                        salaID: <?php echo $salaID; ?>
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Compra realizada con éxito.');
                            location.reload(); // Refresh the page to update portfolio
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error en la comunicación con el servidor.');
                    }
                });
                
                $('#buyModal').modal('hide');
            });
            
            // Sell stock modal
            $('.sell-stock').click(function() {
                const empID = $(this).data('emp-id');
                const empName = $(this).data('emp-name');
                const empPrice = $(this).data('emp-price');
                const maxQuantity = $(this).data('emp-quantity');
                
                $('#sellEmpID').val(empID);
                $('#sellCompanyName').val(empName);
                $('#sellPrice').val(empPrice.toFixed(2));
                $('#maxSellQuantity').text(maxQuantity);
                $('#sellQuantity').attr('max', maxQuantity);
                $('#sellQuantity').val(1);
                $('#sellTotal').val(empPrice.toFixed(2));
                
                $('#sellModal').modal('show');
            });
            
            // Calculate total when quantity changes for selling
            $('#sellQuantity').on('input', function() {
                const quantity = parseInt($(this).val()) || 0;
                const price = parseFloat($('#sellPrice').val());
                $('#sellTotal').val((quantity * price).toFixed(2));
            });
            
            // Confirm sell
            $('#confirmSell').click(function() {
                const empID = $('#sellEmpID').val();
                const quantity = $('#sellQuantity').val();
                const maxQuantity = parseInt($('#maxSellQuantity').text());
                
                if (quantity > maxQuantity) {
                    alert('No puedes vender más acciones de las que tienes.');
                    return;
                }
                
                // AJAX call to sell stocks
                $.ajax({
                    url: 'api/sell-stock.php',
                    method: 'POST',
                    data: {
                        empID: empID,
                        quantity: quantity,
                        salaID: <?php echo $salaID; ?>
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Venta realizada con éxito.');
                            location.reload(); // Refresh the page to update portfolio
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Error en la comunicación con el servidor.');
                    }
                });
                
                $('#sellModal').modal('hide');
            });
        });
    </script>
</body>
</html>