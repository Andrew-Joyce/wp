<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Home Page</title>

    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
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
        <section id="about-us">
    	<h2>About Us</h2>

    	<p>Welcome to our cinema! Nestled in the heart of our beautiful town in Australia, our cinema has been a cornerstone of the community for many years. We are ecstatic to reopen our doors after extensive improvements and renovations that have transformed our cinema into a state-of-the-art 	movie destination.</p>
    
    	<h3>A Fresh New Look</h3>
   	 <p>Our renovations encompass a complete overhaul of the interiors with a contemporary aesthetic that still pays homage to the rich history of our cinema. From the moment you step in, you’ll be welcomed by a stylish and comfortable ambience that sets the stage for an unforgettable movie-	going experience.</p>

    	<h3>Upgraded Seating for Ultimate Comfort</h3>
   	 <p>With the comfort of our audience as a priority, we’ve installed plush new seating. Our standard seats have been designed to offer generous legroom and superior comfort. For those looking for an extra luxurious experience, our first-class reclining seats offer the ultimate in comfort and 	elegance, ensuring that you can relax and lose yourself in the movie.</p>

    	<h3>World-Class Projection and Sound Systems</h3>
    	<p>Our commitment to delivering the ultimate movie experience is evident in our technological upgrades. The installation of 3D Dolby Vision projection ensures every frame is razor-sharp with colours that are more vibrant. Accompanying the stunning visuals is our Dolby Atmos sound system. 	Whether it’s the subtlest of dialogues or the most explosive action scenes, Dolby Atmos encapsulates you in a multi-dimensional sound experience that is unparalleled.</p>
    
   	 <h3>Serving the Local Community</h3>
    	<p>As a cinema deeply rooted in our community, we strive to be more than just a movie theatre. We aim to be a hub for culture and entertainment. We will be hosting a series of community events, special screenings, and thematic nights that celebrate the diversity and spirit of our town.</p>

    	<h3>Sustainable and Eco-Friendly</h3>
   	 <p>In line with our commitment to the environment, our renovations also include eco-friendly initiatives. Our energy-efficient lighting and optimised HVAC systems not only enhance your experience but also minimise our carbon footprint. Our commitment to sustainability also extends to using 	locally sourced concessions, and we are actively engaging in recycling programs.</p>

    	<p>Learn more about <a href="https://professional.dolby.com/cinema/" target="_blank" rel="noopener noreferrer">Dolby Vision</a> and <a href="https://professional.dolby.com/cinema/dolby-atmos" target="_blank" rel="noopener noreferrer">Dolby Atmos</a>.</p>

    	<p>We eagerly welcome both our loyal patrons and new guests to join us in experiencing the new chapter of our cinema. With our top-of-the-line amenities and community-driven approach, we promise an unmatched movie experience that will keep you coming back for more.</p>
       </section>
        
        <section id="seats-and-prices">
            <h2>Seats and Prices</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Seat Type</th>
                            <th>Seat Code</th>
                            <th>Discounted Prices</th>
                            <th>Normal Prices</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Standard Adult</td>
                            <td>STA</td>
                            <td>16.00</td>
                            <td>21.50</td>
                        </tr>
                        <tr>
                            <td>Standard Concession</td>
                            <td>STP</td>
                            <td>14.50</td>
                            <td>19.00</td>
                        </tr>
                        <tr>
                            <td>Standard Child</td>
                            <td>STC</td>
                            <td>13.00</td>
                            <td>17.50</td>
                        </tr>
                        <tr>
                            <td>First Class Adult</td>
                            <td>FCA</td>
                            <td>25.00</td>
                            <td>31.00</td>
                        </tr>
                        <tr>
                            <td>First Class Concession</td>
                            <td>FCP</td>
                            <td>23.50</td>
                            <td>28.00</td>
                        </tr>
                        <tr>
                            <td>First Class Child</td>
                            <td>FCC</td>
                            <td>22.00</td>
                            <td>25.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        
        <section id="now-showing">
    <h2>Now Showing</h2>
    < class="movie-container">
        <!-- Movie 1 -->
        <div class="movie-card" tabindex="0">
            <div class="movie-front">
                <a href="https://www.youtube.com/watch?v=eQfMbSe7F2g" target="_blank">
                    <img src="../media/indiana-jones-poster.jpg" alt="Indiana Jones and the Dial of Destiny">
                </a>
                <div>
                    <h3>Indiana Jones and the Dial of Destiny</h3>
                    <p>Rating: PG</p>
                </div>
            </div>
            <div class="movie-back">
                <p>A short synopsis of the Indiana Jones movie plot.</p>
                <ul>
                    <li>Mon - Tue: 9pm</li>
                    <li>Wed - Fri: 9pm</li>
                    <li>Sat - Sun: 6pm</li>
                </ul>
                <a href="booking.php?movie=ACT" class="book-now">Book Now</a>
            </div>
        </div>

        <!-- Movie 2 -->
        <div class="movie-card" tabindex="0">
            <div class="movie-front">
                <a href="https://www.youtube.com/watch?v=pBk4NYhWNMM" target="_blank">
                    <img src="../media/barbie-poster.jpg" alt="Barbie">
                </a>
                <div>
                    <h3>Barbie</h3>
                    <p>Rating: G</p>
                </div>
            </div>
            <div class="movie-back">
                <p>A short synopsis of the Barbie movie plot.</p>
                <ul>
                    <li>Wed - Fri: 12pm</li>
                    <li>Sat - Sun: 3pm</li>
                </ul>
                <a href="booking.php?movie=RMC" class="book-now">Book Now</a>
            </div>
        </div>

        <!-- Movie 3 -->
        <div class="movie-card" tabindex="0">
            <div class="movie-front">
                <a href="https://www.youtube.com/watch?v=IHvzw4Ibuho" target="_blank">
                    <img src="../media/ninja-turtles-poster.jpg" alt="Teenage Mutant Ninja Turtles: Mutant Mayhem">
                </a>
                <div>
                    <h3>Teenage Mutant Ninja Turtles: Mutant Mayhem</h3>
                    <p>Rating: PG-13</p>
                </div>
            </div>
            <div class="movie-back">
                <p>A short synopsis of the Teenage Mutant Ninja Turtles movie plot.</p>
                <ul>
                    <li>Mon - Tue: 12pm</li>
                    <li>Wed - Fri: 6pm</li>
                    <li>Sat - Sun: 12pm</li>
                </ul>
                <a href="booking.php?movie=ANM" class="book-now">Book Now</a>
            </div>
        </div>

        <div class="movie-card" tabindex="0">
            <div class="movie-front">
                <a href="https://www.youtube.com/watch?v=uYPbbksJxIg" target="_blank">
                    <img src="../media/oppenheimer-poster.jpg" alt="Oppenheimer">
                </a>
                <div>
                    <h3>Oppenheimer</h3>
                    <p>Rating: R</p>
                </div>
            </div>
            <div class="movie-back">
                <p>A short synopsis of the Oppenheimer movie plot.</p>
                <ul>
                    <li>Mon - Tue: 6pm</li>
                    <li>Sat - Sun: 9pm</li>
                </ul>
                <a href="booking.php?movie=DRM" class="book-now">Book Now</a>
            </div>
        </div>

    </div>

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
         </script>Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
         <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
         <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
   </footer>

  </body>
</html>
