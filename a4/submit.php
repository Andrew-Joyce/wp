<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = $_POST["movie"];
    $session = $_POST["session"];
    $seats = $_POST["seats"];
    $name = $_POST["name"];
    $mobileNumber = $_POST["mobile"];
    $email = $_POST["email"];

    echo "PHP is working!";

    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='stylesheet' href='style.css'>
        <title>Booking Form</title>
    </head>

    <body>
        <header style='text-align: center;'>
            <div style='display: flex; justify-content: center; align-items: center;'>
                <img src='../../media/Cinema.png' alt='Cinema' class='responsive-image' style='margin-right: 10px;'>
                <h1 style='display: inline;'>Lunardo Cinema</h1>
            </div>
        </header>

        <nav id='navbar'>
            <a href='https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#now-showing'>Now Showing</a>
            <a href='https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#seats-&-prices'>Seats & Prices</a>
            <a href='https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#about-us'>About Us</a>
        </nav>

        <h1>Booking Summary</h1>";

    echo "<p><strong>Movie:</strong> $movie</p>";
    echo "<p><strong>Session:</strong> $session</p>";

    echo "<p><strong>Selected Seats:</strong></p>";
    echo "<ul>";
    foreach ($seats as $seatType => $quantity) {
        if (!empty($quantity)) {
            echo "<li>$seatType: $quantity</li>";
        }
    }
    echo "</ul>";

    echo "<p><strong>Full Name:</strong> $name</p>";
    echo "<p><strong>Mobile Number:</strong> $mobileNumber</p>";
    echo "<p><strong>Email:</strong> $email</p>";

    echo "</body>
    </html>";
}
?>