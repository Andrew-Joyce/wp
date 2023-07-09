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
  <header style="text-align: center;">
    <div style="display: flex; justify-content: center; align-items: center;">
        <img src="../../media/Cinema.png" alt="Cinema" style="margin-right: 10px; width: 100px; height: auto;">
        <h1 style="display: inline;">Lunardo Cinema</h1>
    </div>
    </header>
    <nav id="navbar">
        <a href="#about-us">About Us</a>
        <a href="#seats-&-prices">Seats and Prices</a>
        <a href="#now-showing">Now Showing</a>
    </nav>
    
    <main>
    <section id="about-us">
  <div class="about-container">
    <div class="about-text">
      <h2>About Us</h2>
      <p>Welcome to our cinema! Nestled in the heart of our beautiful town in Australia, our cinema has been a cornerstone of the community for many years. We are ecstatic to reopen our doors after extensive improvements and renovations that have transformed our cinema into a state-of-the-art movie destination.</p>
      <h3>A Fresh New Look</h3>
      <p>Our renovations encompass a complete overhaul of the interiors with a contemporary aesthetic that still pays homage to the rich history of our cinema. From the moment you step in, you’ll be welcomed by a stylish and comfortable ambiance that sets the stage for an unforgettable movie-going experience.</p>
      <h3>Upgraded Seating for Ultimate Comfort</h3>
      <p>With the comfort of our audience as a priority, we’ve installed plush new seating. Our standard seats have been designed to offer generous legroom and superior comfort. For those looking for an extra luxurious experience, our first-class reclining seats offer the ultimate in comfort and elegance, ensuring that you can relax and lose yourself in the movie.</p>
      <h3>World-Class Projection and Sound Systems</h3>
      <p>Our commitment to delivering the ultimate movie experience is evident in our technological upgrades. The installation of 3D Dolby Vision projection ensures every frame is razor-sharp with colors that are more vibrant. Accompanying the stunning visuals is our Dolby Atmos sound system. Whether it’s the subtlest of dialogues or the most explosive action scenes, Dolby Atmos encapsulates you in a multi-dimensional sound experience that is unparalleled.</p>
      <h3>Serving the Local Community</h3>
      <p>As a cinema deeply rooted in our community, we strive to be more than just a movie theatre. We aim to be a hub for culture and entertainment. We will be hosting a series of community events, special screenings, and thematic nights that celebrate the diversity and spirit of our town.</p>
      <h3>Sustainable and Eco-Friendly</h3>
      <p>In line with our commitment to the environment, our renovations also include eco-friendly initiatives. Our energy-efficient lighting and optimized HVAC systems not only enhance your experience but also minimize our carbon footprint. Our commitment to sustainability also extends to using locally sourced concessions, and we are actively engaging in recycling programs.</p>
      <p>Learn more about <a href="https://professional.dolby.com/cinema/" target="_blank" rel="noopener noreferrer">Dolby Vision</a> and <a href="https://professional.dolby.com/cinema/dolby-atmos" target="_blank" rel="noopener noreferrer">Dolby Atmos</a>.</p>
      <p>We eagerly welcome both our loyal patrons and new guests to join us in experiencing the new chapter of our cinema. With our top-of-the-line amenities and community-driven approach, we promise an unmatched movie experience that will keep you coming back for more.</p>
    </div>
    <div class="about-image">
      <img src="../../media/Capri.png" alt="Cinema Image">
    </div>
  </div>
</section>

<section>
  <h2>Seats & Pricing</h2>

  <div class="seat-type">
    <h3>Standard Seats</h3>
    <p>
      Our cinema offers comfortable and spacious standard seats, designed to provide you with the perfect balance of relaxation and enjoyment during your movie experience. With generous legroom and ergonomic designs, our standard seats ensure that you can sit back, unwind, and immerse yourself in the magic of cinema. Whether you're watching the latest blockbuster or a timeless classic, our standard seats guarantee a comfortable and enjoyable viewing experience for all movie enthusiasts. Sit back, relax, and let our standard seats enhance your cinematic journey.
    </p>

    <table>
      <caption>Seat Prices</caption>
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
      </tbody>
    </table>

    <img src="../../media/Profern-Standard-Twin.png" alt="Standard Seats">
  </div>

  <div class="seat-type">
    <h3>Gold Class Seats</h3>
    <p>
      Experience luxury and indulgence with our Gold Class seats. With plush leather upholstery and spacious seating arrangements, our Gold Class seats provide a premium movie-watching experience. Immerse yourself in comfort as you enjoy the latest films with the utmost convenience. Our Gold Class theaters offer table service, ensuring that you can savor gourmet food and beverages while you watch your favorite movies.
    </p>

    <table>
      <caption>Seat Prices</caption>
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

    <img src="../../media/Profern-Verona-Twin.png" alt="Gold Class Seats">
  </div>
</section>


     
        <section id="now-showing">
    <h2>Now Showing</h2>
    <div class="movie-container">
        <!-- Movie 1 -->
        <div class="movie-card" tabindex="0">
            <div class="movie-front">
                <img src="../../media/indiana-jones-poster.png" alt="Indiana Jones and the Dial of Destiny">
                <div>
                    <h3>Indiana Jones and the Dial of Destiny</h3>
                    <p>Rating: PG</p>
                </div>
            </div>
            <div class="movie-back">
                <p>Daredevil archaeologist Indiana Jones races against time to retrieve a legendary dial that can change the course of history. Accompanied by his goddaughter, he soon finds himself squaring off against Jürgen Voller, a former Nazi who works for NASA.</p>
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
                <img src="../../media/barbie-poster.png" alt="Barbie">
                <div>
                    <h3>Barbie</h3>
                    <p>Rating: G</p>
                </div>
            </div>
            <div class="movie-back">
                <p>Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.</p>
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
                <img src="../../media/ninja-turtles-poster.png" alt="Teenage Mutant Ninja Turtles: Mutant Mayhem">
                <div>
                    <h3>Teenage Mutant Ninja Turtles: Mutant Mayhem</h3>
                    <p>Rating: PG-13</p>
                </div>
            </div>
            <div class="movie-back">
                <p>After years of being sheltered from the human world, the Turtle brothers set out to win the hearts of New Yorkers and be accepted as normal teenagers. Their new friend, April O'Neil, helps them take on a mysterious crime syndicate, but they soon get in over their heads when an army of mutants is unleashed upon them.</p>
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
                <img src="../../media/oppenheimer-poster.png" alt="Oppenheimer">
                <div>
                    <h3>Oppenheimer</h3>
                    <p>Rating: R</p>
                </div>
            </div>
            <div class="movie-back">
                <p>The story of American scientist J. Robert Oppenheimer and his role in the development of the atomic bomb.</p>
                <ul>
                    <li>Mon - Tue: 6pm</li>
                    <li>Sat - Sun: 9pm</li>
                </ul>
                <a href="booking.php?movie=DRM" class="book-now">Book Now</a>
            </div>
        </div>
    </div>
</section>
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