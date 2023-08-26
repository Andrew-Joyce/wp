<!DOCTYPE html>
<html lang="en">
<head>
<header style="text-align: center;">
        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="../../media/Cinema.png" alt="Cinema" class="responsive-image" style="margin-right: 10px;">
            <h1 style="display: inline;">Lunardo Cinema</h1>
        </div>
    </header>
</head>
<body>
    <h1>Booking Summary</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $movie = $_GET["movie"];
        $session = $_GET["session"];
        $seats = $_GET["seats"];
        $name = $_GET["name"];
        $mobileNumber = $_GET["mobile"];
        $email = $_GET["email"];

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
