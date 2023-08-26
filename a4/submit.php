<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Booking Summary</title>
</head>
<body>
    <h1>Booking Summary</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $movie = $_POST["movie"];
        $session = $_POST["session"];
        $seats = $_POST["seats"];
        $name = $_POST["name"];
        $mobileNumber = $_POST["mobile"];
        $email = $_POST["email"];

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
    }
    ?>

</body>
</html>
