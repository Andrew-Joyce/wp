<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Form</title>
</head>

<body>
    <header>
        <img src="logo.png" alt="Lunardo Cinema">
        <h1>Lunardo Cinema</h1>
    </header>

    <nav id="navbar">
        <a href="#about-us">About Us</a>
        <a href="#seats-and-prices">Seats and Prices</a>
        <a href="#now-showing">Now Showing</a>
    </nav>

    <main>
        <h2>Movie Booking Form</h2>
        <form action="confirmation.php" method="post">
            <fieldset>
                <legend>Select Movie</legend>
                <input type="radio" name="movie" value="indiana-jones" id="indiana-jones">
                <label for="indiana-jones">Indiana Jones and the Dial of Destiny</label><br>

                <input type="radio" name="movie" value="barbie" id="barbie">
                <label for="barbie">Barbie</label><br>

                <input type="radio" name="movie" value="ninja-turtles" id="ninja-turtles">
                <label for="ninja-turtles">Teenage Mutant Ninja Turtles: Mutant Mayhem</label><br>

                <input type="radio" name="movie" value="oppenheimer" id="oppenheimer">
                <label for="oppenheimer">Oppenheimer</label>
            </fieldset>

            <fieldset>
                <legend>Select Date and Time</legend>
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required><br>
                <label for="time">Time:</label>
                <input type="time" name="time" id="time" required>
            </fieldset>

            <fieldset>
                <legend>Select Tickets</legend>
                <label for="standard-tickets">Standard Tickets:</label>
                <input type="number" name="standard-tickets" id="standard-tickets" min="0" value="0"><br>
                
                <label for="first-class-tickets">First Class Tickets:</label>
                <input type="number" name="first-class-tickets" id="first-class-tickets" min="0" value="0">
            </fieldset>

            <fieldset>
                <legend>Contact Information</legend>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br>
                <label for="phone">Phone:</label>
                <input type="tel" name="phone" id="phone" required>
            </fieldset>

            <input type="submit" value="Submit Booking">
        </form>
    </main>

    <footer>
                    ...
            <div class="contact-info">
                <h3>Contact Us</h3>
                <p><strong>Email:</strong> <a href="mailto:info@ourcinema.com">info@ourcinema.com</a></p>
                <p><strong>Phone:</strong> <a href="tel:+61-123-456-789">+61 123 456 789</a></p>
                <p><strong>Address:</strong> 123 Cinema Street, MovieTown, Australia</p>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Lunardo Cinema. All rights reserved.</p>
            </div>
        </footer>
    </body>

</html>
