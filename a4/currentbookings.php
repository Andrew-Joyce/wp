<?php
session_start();
include 'tools.php';

$bookings = [];

$filePath = __DIR__ . "/bookings.txt";
if (file_exists($filePath)) {
    $fileContents = file_get_contents($filePath);
    $lines = explode(PHP_EOL, $fileContents);
    
    foreach ($lines as $line) {
        $bookingData = explode("\t", $line);
        
        if (count($bookingData) >= 6) {
            $booking = [
                'date' => date("Y-m-d H:i:s"),
                'movie' => $bookingData[0], 
                'seat_numbers' => $bookingData[5], 
                'id' => uniqid()
            ];
            
            $bookings[] = $booking;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Home Page</title>
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
  <body>
    <header style="text-align: center;">
      <div style="display: flex; justify-content: center; align-items: center;">
          <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a4/index.php">
              <img src="../../media/Cinema.png" alt="Cinema" class="responsive-image" style="margin-right: 10px;">
              <h1 style="display: inline;">Lunardo Cinema</h1>
          </a>
      </div>
  </header>
  <nav id="navbar">
    <a class="nav-link nav-section" href="#now-showing">Now Showing</a>
    <a class="nav-link nav-section" href="#seats-prices">Seats & Prices</a>
    <a class="nav-link nav-section" href="#about-us">About Us</a>
  </nav>

  <div class="container">
    <h2>Your Current Bookings</h2>
    <?php
    if (empty($bookings)) {
        echo "<p>No bookings were found.</p>";
    } else {
        echo "<table>
                <tr>
                    <th>Date</th>
                    <th>Movie</th>
                    <th>Seats</th>
                    <th>Actions</th>
                </tr>";

    foreach ($bookings as $booking) {
        $movieDetails = getMovieDetails($booking['movie']);
        $movieTitle = isset($movieDetails['title']) ? $movieDetails['title'] : 'Unknown Movie'; 
                
        $seats = $booking['seats'];
        $totalSeats = array_sum(array_map('intval', $seats));
                
        echo "<tr>
                <td>{$booking['date']}</td>
                <td>{$movieTitle}</td>
                <td>{$totalSeats}</td>
                <td>
                    <a href=\"receipt.php?booking_id={$booking['id']}\">View Receipt</a>
                </td>
            </tr>";
        }
        }

        echo "</table>";
    ?>


        <div class="booking-reminder">
            <h3>Retrieve Your Booking</h3>
            <form action="currentbookings.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="mobile">Mobile Phone Number:</label>
                <input type="tel" id="mobile" name="mobile" required>
                
                <button type="submit">Retrieve Booking</button>
            </form>
        </div>
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
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()' disabled>Toggle Wireframe CSS</button></div>
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
</body>
</html>
