<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = $_POST["movie"];
    $session = $_POST["session"];

    $seats = $_POST["seats"];

    $fullName = $_POST["name"];
    $mobileNumber = $_POST["mobile"];
    $email = $_POST["email"];

    echo "Movie: " . $movie . "<br>";
    echo "Session: " . $session . "<br>";

    echo "Standard Adult Seats: " . $seats["STA"] . "<br>";
    echo "Standard Concession Seats: " . $seats["STP"] . "<br>";
    echo "Standard Child Seats: " . $seats["STC"] . "<br>";

    echo "Gold Class Adult Seats: " . $seats["FCA"] . "<br>";
    echo "Gold Class Concession Seats: " . $seats["FCP"] . "<br>";
    echo "Gold Class Child Seats: " . $seats["FCC"] . "<br>";

    echo "Full Name: " . $fullName . "<br>";
    echo "Mobile Number: " . $mobileNumber . "<br>";
    echo "Email: " . $email . "<br>";
}

?>