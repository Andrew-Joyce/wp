<?php
session_start();
include 'tools.php';

if (!isset($_SESSION["booking_data"])) {
    header("Location: index.php");
    exit();
}

$bookingData = $_SESSION["booking_data"];
$seatsData = isset($bookingData["seats"]) && is_array($bookingData["seats"]) ? $bookingData["seats"] : array();
$seatPricesData = isset($bookingData["seat_prices"]) && is_array($bookingData["seat_prices"]) ? $bookingData["seat_prices"] : array(); 
$formattedSession = formatSession($bookingData["session"]);

var_dump($_SESSION["booking_data"]);

unset($_SESSION["booking_data"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Receipt</title>
</head>
<body>
    <div class="receipt-container">
        <header style="text-align: center;">
            <div style="display: flex; justify-content: center; align-items: center;">
                <img src="../../media/Cinema.png" alt="Cinema" class="responsive-image" style="margin-right: 10px;">
                <h1 style="display: inline;">Lunardo Cinema</h1>
            </div>
        </header>
        
        <main>
            <div class="receipt-container">
                <div class="receipt-grid">
                    <strong>Seat Type</strong>
                </div>
                <div class="receipt-grid">
                    <strong>Quantity</strong>
                </div>
                <div class="receipt-grid">
                    <strong>Subtotal</strong>
                </div>
                <?php foreach ($seatsData as $seatType => $quantity): ?>
                    <div class="receipt-grid">
                        <?php echo $seatType; ?>
                    </div>
                    <div class="receipt-grid">
                        <?php echo $quantity; ?>
                    </div>
                    <div class="receipt-grid">
                        <?php echo isset($seatPricesData[$seatType]) ? number_format($quantity * $seatPricesData[$seatType], 2) : '0.00'; ?>
                    </div>
                <?php endforeach; ?>
                <div class="receipt-grid" style="grid-column: span 2; text-align: right;">
                    <strong>Total</strong>
                </div>
                <div class="receipt-grid">
                    <?php echo number_format(array_sum(array_map(function($quantity, $price) { return $quantity * $price; }, $seatsData, $seatPricesData)), 2); ?>
                </div>
                <div class="receipt-grid" style="grid-column: span 2; text-align: right;">
                    <strong>GST (10%)</strong>
                </div>
                <div class="receipt-grid">
                    <?php echo number_format(array_sum(array_map(function($quantity, $price) { return $quantity * $price; }, $seatsData, $seatPricesData)) / 11, 2); ?>
                </div>
            </div>
        </main>

        <footer>
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p><strong>Email:</strong> <a href="mailto:info@ourcinema.com">info@ourcinema.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+61-123-456-789">+61 123 456 789</a></p>
            <p><strong>Address:</strong> 123 Cinema Street, MovieTown, Australia</p>
        </div>
        <div>&copy;<script>
                document.write(new Date().getFullYear());
            </script>Andrew Joyce, student number - S3876520. Last modified <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
        </footer>

        <div id="debug-module">
            <h2>Debug Information</h2>
            <h3>Request Data:</h3>
            <pre><?php echo json_encode($_GET, JSON_PRETTY_PRINT); ?></pre>
            <pre><?php echo json_encode($_POST, JSON_PRETTY_PRINT); ?></pre>
            
            <h3>Session Contents:</h3>
            <pre><?php echo json_encode($_SESSION, JSON_PRETTY_PRINT); ?></pre>
            
            <h3>Page Code:</h3>
            <pre><?php echo htmlspecialchars(file_get_contents(__FILE__)); ?></pre>
        </div>
    <script src="script.js"></script>
</body>
</html>

