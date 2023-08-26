<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = $_POST["movie"]; 
    $session = $_POST["session"];

    $standardAdultSeats = $_POST["seats"]["STA-dis"];
    $standardConcessionSeats = $_POST["seats"]["STP-dis"];
    $standardChildSeats = $_POST["seats"]["STC-dis"];

    $goldClassAdultSeats = $_POST["seats"]["FCA-dis"];
    $goldClassConcessionSeats = $_POST["seats"]["FCP-dis"];
    $goldClassChildSeats = $_POST["seats"]["FCC-dis"];

    $fullName = $_POST["name"];
    $mobileNumber = $_POST["mobile"];
    $email = $_POST["email"];

    echo "Movie: " . $movie . "<br>";
    echo "Session: " . $session . "<br>";

    echo "Standard Adult Seats: " . $standardAdultSeats . "<br>";
    echo "Standard Concession Seats: " . $standardConcessionSeats . "<br>";
    echo "Standard Child Seats: " . $standardChildSeats . "<br>";

    echo "Gold Class Adult Seats: " . $goldClassAdultSeats . "<br>";
    echo "Gold Class Concession Seats: " . $goldClassConcessionSeats . "<br>";
    echo "Gold Class Child Seats: " . $goldClassChildSeats . "<br>";

    echo "Full Name: " . $fullName . "<br>";
    echo "Mobile Number: " . $mobileNumber . "<br>";
    echo "Email: " . $email . "<br>";
}
?>