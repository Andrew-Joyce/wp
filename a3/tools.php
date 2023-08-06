<?php

$moviesObject = [
    'ACT' => [
        'title' => 'Indiana Jones and the Dial of Destiny',
        'rating' => 'PG-13',
        'genre' => 'Action, Adventure',
        'summary' => 'Experience the return of legendary hero, Indiana Jones, in the fifth installment of this beloved swashbuckling series of films.',
        'plot' => 'Finding himself in a new era, approaching retirement, Indy wrestles with fitting into a world that seems to have outgrown him. But as the tentacles of an all-too-familiar evil return in the form of an old rival, Indy must don his hat and pick up his whip once more to make sure an ancient and powerful artifact doesn&apos;t fall into the wrong hands.',
        'imdb' => 'https://www.imdb.com/title/tt1462764/',
        'trailer' => 'https://www.youtube.com/embed/eQfMbSe7F2g',
        'cast' => 'Harrison Ford, Antonio Banderas, Phoebe Waller-Bridge, Mads Mikkelsen and Karen Allen',
        'screening-summary' => 'Monday - Tuesday: 9pm, Wednesday - Friday: 9pm, Saturday - Sunday: 6pm',
        'screenings' => [
            'MON' => [
                'time' => '9pm',
                'rate' => 'dis'
            ],
            'TUE' => [
                'time' => '9pm',
                'rate' => 'reg'
            ],
            'WED' => [
                'time' => '9pm',
                'rate' => 'reg'
            ],
            'THU' => [
                'time' => '9pm',
                'rate' => 'reg'
            ],
            'FRI' => [
                'time' => '9pm',
                'rate' => 'reg'
            ],
            'SAT' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'SUN' => [
                'time' => '6pm',
                'rate' => 'reg'
            ]
        ]
    ],
    'RMC' => [
        'title' => 'Barbie',
        'rating' => 'PG',
        'genre' => 'Romance, Comedy',
        'summary' => 'Enter the fascinating world of Barbie and join her on an exciting adventure. Experience a heartwarming story filled with friendship, courage, and dreams. Barbie will captivate you with her charm and inspire you to believe in yourself. Get ready for an unforgettable journey with Barbie!',
        'plot' => 'The plot details for Barbie movie.',
        'imdb' => 'https://www.imdb.com/title/tt1517268/',
        'trailer' => 'https://www.youtube.com/embed/pBk4NYhWNMM',
        'cast' => 'Margot Robbie, Ryan Gosling, Kate McKinnon, Dua Lipa and America Ferrera',
        'screening-summary' => 'Wednesday - Friday: 12pm, Saturday - Sunday: 3pm',
        'screenings' => [
            'WED' => [
                'time' => '12pm',
                'rate' => 'reg'
            ],
            'THU' => [
                'time' => '12pm',
                'rate' => 'reg'
            ],
            'FRI' => [
                'time' => '12pm',
                'rate' => 'reg'
            ],
            'SAT' => [
                'time' => '3pm',
                'rate' => 'reg'
            ],
            'SUN' => [
                'time' => '3pm',
                'rate' => 'reg'
            ]
        ]
    ],
    'ANM' => [
        'title' => 'Teenage Mutant Ninja Turtles: Mutant Mayhem',
        'rating' => 'PG',
        'genre' => 'Animation, Action, Adventure',
        'summary' => 'Join the fearless Teenage Mutant Ninja Turtles in their latest mission to save the city from the clutches of evil. Watch as Leonardo, Donatello, Michelangelo, and Raphael unleash their ninja skills to combat powerful enemies. Get ready for an adrenaline-pumping adventure with the heroes in a half-shell!',
        'plot' => 'The plot details for Teenage Mutant Ninja Turtles movie.',
        'imdb' => 'https://www.imdb.com/title/tt8589698/',
        'trailer' => 'https://www.youtube.com/embed/IHvzw4Ibuho',
        'cast' => 'Micah Abbey, Shamon Brown Jr., Nicolas Cantu, Brady Noon and John Cena',
        'screening-summary' => 'Monday - Tuesday: 12pm, Wednesday - Friday: 6pm, Saturday - Sunday: 6pm',
        'screenings' => [
            'MON' => [
                'time' => '12pm',
                'rate' => 'regular'
            ],
            'TUE' => [
                'time' => '12pm',
                'rate' => 'reg'
            ],
            'WED' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'THU' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'FRI' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'SAT' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'SUN' => [
                'time' => '6pm',
                'rate' => 'reg'
            ]
        ]
    ],
    'DRM' => [
        'title' => 'Oppenheimer',
        'rating' => 'PG-13',
        'genre' => 'Drama',
        'summary' => 'Discover the untold story of J. Robert Oppenheimer, the brilliant scientist behind the development of the atomic bomb. Dive into the complex world of physics, politics, and moral dilemmas as Oppenheimer grapples with the consequences of his groundbreaking work. Experience a thought-provoking journey through history and ethics.',
        'plot' => 'The plot details for Oppenheimer movie.',
        'imdb' => 'https://www.imdb.com/title/tt15398776/',
        'trailer' => 'https://www.youtube.com/embed/bK6ldnjE3Y0',
        'cast' => 'Cillian Murphy, Matt Damon, Emily Blunt, Robert Downey Jr. and Kenneth Branagh',
        'screening-summary' => 'Monday - Tuesday: 6pm, Saturday - Sunday: 9pm',
        'screenings' => [
            'MON' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'TUE' => [
                'time' => '6pm',
                'rate' => 'reg'
            ],
            'SAT' => [
                'time' => '9pm',
                'rate' => 'reg'
            ],
            'SUN' => [
                'time' => '9pm',
                'rate' => 'reg'
            ]
        ]
    ],
];
?>

<?php
function getMovieDetails($movieCode)
{
    global $moviesObject;
    if (isset($moviesObject[$movieCode])) {
        return $moviesObject[$movieCode];
    }
    return null;
}

?>
