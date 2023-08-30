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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        .page-break {
            break-after: always;
            page-break-after: always;
        }

        .table-header {
            width: 33.33%;
            text-align: center;
        }

        .table-cell {
            width: 33.33%;
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .ticket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 20px;
        }

        .ticket-content {
            display: flex;
            align-items: center;
        }

        .ticket-image img {
            max-width: 200px;
            max-height: 300px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .ticket-metadata {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .ticket-details {
            flex: 1;
        }

        .gold {
        background-color: gold;
        color: black;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); 
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%,
                                            transparent 50%, rgba(255, 255, 255, 0.2) 50%,
                                            rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
        }

        .standard {
            background-color: blue;
            color: white;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); 
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%,
                                                transparent 50%, rgba(255, 255, 255, 0.2) 50%,
                                                rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
    </style>


    <body>
    <?php
    $bookings = array(
        array("date" => "2023-09-15", "movie" => "Movie A", "seats" => "A1, A2"),
        array("date" => "2023-09-16", "movie" => "Movie B", "seats" => "B3, B4"),
    );

    $email = $_POST["email"];
    $mobile = $_POST["mobile"];

    $foundBookings = array_filter($bookings, function($booking) use ($email, $mobile) {
        return $booking["email"] == $email && $booking["mobile"] == $mobile;
    });

    if (empty($foundBookings)) {
        echo "<p>No bookings were found for the provided information.</p>";
    } else {
        echo "<table>";
        echo "<tr><th>Date</th><th>Movie</th><th>Seats</th><th>Action</th></tr>";
        foreach ($foundBookings as $booking) {
            echo "<tr>";
            echo "<td>{$booking['date']}</td>";
            echo "<td>{$booking['movie']}</td>";
            echo "<td>{$booking['seats']}</td>";
            echo "<td><a href='receipt.php?booking_id={$booking['id']}'>View Receipt</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
