<?php
session_start();

if (!isset($_SESSION["booking_data"])) {
    header("Location: index.php");
    exit();
}

$bookingData = $_SESSION["booking_data"];
$seatsData = isset($bookingData["seats"]) && is_array($bookingData["seats"]) ? $bookingData["seats"] : array(); // Check if seats data is set and an array
$seatPricesData = isset($bookingData["seat_prices"]) && is_array($bookingData["seat_prices"]) ? $bookingData["seat_prices"] : array(); // Check if seat prices data is set and an array

unset($_SESSION["booking_data"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .receipt-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <header>
            <img src="../../media/Cinema.png" alt="Cinema Logo">
            <h1>Lunardo Cinema</h1>
        </header>
        
        <main>
            <h2>Receipt</h2>
            <h3>Customer Details</h3>
            <p><strong>Name:</strong> <?php echo $bookingData["name"]; ?></p>
            <p><strong>Email:</strong> <?php echo $bookingData["email"]; ?></p>
            <p><strong>Mobile:</strong> <?php echo $bookingData["mobile"]; ?></p>

            <h3>Booking Summary</h3>
                <p><strong>Film:</strong> <?php echo $bookingData["movie_code"]; ?></p>
                <p><strong>Session:</strong> <?php echo $bookingData["session"]; ?></p>

            <table>
                <tr>
                    <th>Seat Type</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach ($seatsData as $seatType => $quantity): ?>
                <tr>
                    <td><?php echo $seatType; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td><?php echo isset($seatPricesData[$seatType]) ? $quantity * $seatPricesData[$seatType] : 0; ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2">Total</td>
                    <td><?php echo array_sum(array_map(function($quantity, $price) { return $quantity * $price; }, $seatsData, $seatPricesData)); ?></td>
                </tr>
                <tr>
                    <td colspan="2">GST (10%)</td>
                    <td><?php echo array_sum(array_map(function($quantity, $price) { return $quantity * $price; }, $seatsData, $seatPricesData)) / 11; ?></td>
                </tr>
            </table>
        </main>

        <footer>
            <p>Company Address: 123 Cinema St, City</p>
            <p>Email: info@lunardocinema.com</p>
            <p>Phone: 123-456-7890</p>
        </footer>
    </div>
</body>
</html>

