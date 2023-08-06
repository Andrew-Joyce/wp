<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie = $_POST["movie"]; 
    $session = $_POST["session"];

    $standardAdultSeats = $_POST["seats"]["STA"];
    $standardConcessionSeats = $_POST["seats"]["STP"];
    $standardChildSeats = $_POST["seats"]["STC"];

    $goldClassAdultSeats = $_POST["seats"]["FCA"];
    $goldClassConcessionSeats = $_POST["seats"]["FCP"];
    $goldClassChildSeats = $_POST["seats"]["FCC"];

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