<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Home Page</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
@@ -111,93 +110,92 @@
        </section>

        <section id="now-showing">
 	<h2>Now Showing</h2>
		<div class="movie-container">
   		 <!-- Movie 1 -->
    			<div class="movie-card" tabindex="0">
        		<div class="movie-front">
            	<a href="https://www.youtube.com/watch?v=eQfMbSe7F2g" target="_blank">
                <img src="indiana-jones-poster.jpg" alt="Indiana Jones and the Dial of Destiny">
            </a>
            <div>
                <h3>Indiana Jones and the Dial of Destiny</h3>
                <p>Rating: PG</p>
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
                <img src="barbie-poster.jpg" alt="Barbie">
            </a>
            <div>
                <h3>Barbie</h3>
                <p>Rating: G</p>
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
                <img src="ninja-turtles-poster.jpg" alt="Teenage Mutant Ninja Turtles: Mutant Mayhem">
            </a>
            <div>
                <h3>Teenage Mutant Ninja Turtles: Mutant Mayhem</h3>
                <p>Rating: PG-13</p>
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

	<!-- Movie 4 -->
	<div class="movie-card" tabindex="0">
    	<div class="movie-front">
        	<a href="https://www.youtube.com/watch?v=uYPbbksJxIg" target="_blank">
            <img src="oppenheimer-poster.jpg" alt="Oppenheimer">
        </a>
        <div>
            <h3>Oppenheimer</h3>
            <p>Rating: R</p>
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
