<?php
session_start();
include 'tools.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Form</title>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const selectedMovie = urlParams.get('movie');

        document.addEventListener('DOMContentLoaded', () => {
            const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
            sessionFieldsets.forEach((fieldset) => {
                fieldset.style.display = 'none';
            });

            if (selectedMovie) {
                const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
                if (selectedFieldset) {
                    selectedFieldset.style.display = 'block';
                }
            }
        });
    </script>
</head>

<body>
    <header style="text-align: center;">
        <div style="display: flex; justify-content: center; align-items: center;">
            <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php">
                <img src="../../media/Cinema.png" alt="Cinema" style="margin-right: 10px; width: 100px; height: auto;">
                <h1 style="display: inline;">Lunardo Cinema</h1>
            </a>
        </div>
    </header>
    <nav id="navbar">
        <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#now-showing">Now Showing</a>
        <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#seats-&-prices">Seats & Prices</a>
        <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#about-us">About Us</a>
    </nav>

    <main>
        <form method="POST" action="" id="booking-form">
            <?php foreach ($moviesObject as $movieCode => $movieDetails) {
                $screenings = $movieDetails['screenings'];
            ?>
                <fieldset id="fieldset-session-<?php echo $movieCode; ?>">
                    <div class="movie-details" id="<?php echo strtolower(str_replace(' ', '-', $movieDetails['title'])); ?>" style="display: block;">
                        <div class="trailer">
                            <div class="responsive-video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($movieDetails['trailer'], strrpos($movieDetails['trailer'], '/') + 1); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="synopsis">
                            <p><?php echo $movieDetails['summary']; ?></p>
                            <p><strong>Starring</strong> - <?php echo isset($movieDetails['cast']) ? $movieDetails['cast'] : 'N/A'; ?></p>
                             <p><strong>Screening Times:</strong> <?php echo $movieDetails['screening-summary']; ?></p>
                            <p>For more information, visit <a href="<?php echo $movieDetails['imdb']; ?>" target="_blank">IMDb</a>.</p>
                        </div>
                    </div>
                    <legend><?php echo $movieDetails['title']; ?></legend>
                    <div class="<?php echo strtolower(str_replace(' ', '-', $movieDetails['title'])); ?>">
                        <h3>Select Session</h3>
                        <?php foreach ($screenings as $day => $screening) { ?>
                            <div class="session">
                                <input type="radio" name="session[<?php echo $movieCode; ?>]" id="session-<?php echo $movieCode . '-' . $day; ?>" value="<?php echo $screening; ?>">
                                <label for="session-<?php echo $movieCode . '-' . $day; ?>"><?php echo $day; ?> - <?php echo $screening['time']; ?> (<?php echo $screening['rate']; ?>)</label>
                            </div>
                        <?php } ?>
                    </div>
                </fieldset>
            <?php } ?>

            <fieldset>
                <legend>Select Standard Seats</legend>
                <div id="standard-seats">
                    <div class="seats-container">
                        <div class="seat standard-seat">
                            <label for="seats[STA]">Standard Adult</label>
                            <input type="number" name="seats[STA]" min="0" placeholder="Enter quantity" required>
                            <span class="seat-price">Full Price: $21.50 / Discount: $16.00</span>
                        </div>
                        <div class="seat concession-seat">
                            <label for="seats[STP]">Concession</label>
                            <input type="number" name="seats[STP]" min="0" placeholder="Enter quantity" required>
                            <span class="seat-price">Full Price: $19.50 / Discount: $14.00</span>
                        </div>
                        <div class="seat child-seat">
                            <label for="seats[STC]">Child</label>
                            <input type="number" name="seats[STC]" min="0" placeholder="Enter quantity" required>
                            <span class="seat-price">Full Price: $17.50 / Discount: $12.00</span>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Gold Class Seats</legend>
                <div id="gold-class-seats">
                    <div id="seats-&-prices">
                        <div class="seats-container">
                            <div class="seat standard-seat">
                                <label for="seats[FCA]">First Class Adult</label>
                                <input type="number" name="seats[FCA]" min="0" placeholder="Enter quantity" required>
                                <span class="seat-price">Full Price: $31.00 / Discount: $25.00</span>
                            </div>
                            <div class="seat concession-seat">
                                <label for="seats[FCP]">First Class Concession</label>
                                <input type="number" name="seats[FCP]" min="0" placeholder="Enter quantity" required>
                                <span class="seat-price">Full Price: $28.00 / Discount: $23.50</span>
                            </div>
                            <div class="seat child-seat">
                                <label for="seats[FCC]">First Class Child</label>
                                <input type="number" name="seats[FCC]" min="0" placeholder="Enter quantity" required>
                                <span class="seat-price">Full Price: $25.00 / Discount: $22.00</span>
                            </div>
                        </div>
                    </div>
            </fieldset>

            <fieldset>
                <legend>Total Price</legend>
                <div id="total-price">Total Price: $0</div>
            </fieldset>

            <fieldset>
                <legend>Contact Information:</legend>
                <div class="contact-info">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" required>

                    <label for="mobile">Mobile Number:</label>
                    <input type="tel" name="mobile" id="mobile" required pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number">

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
            </fieldset>

            <button type="submit">Submit</button>
        </form>
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
</body>

</html>


    