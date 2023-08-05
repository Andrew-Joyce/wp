<?php

$moviesObject = [
    'ACT' => [
        'title' => 'Indiana Jones and the Dial of Destiny',
        'rating' => 'PG-13',
        'genre' => 'Action, Adventure',
        'summary' => 'Experience the return of legendary hero, Indiana Jones, in the fifth installment of this beloved swashbuckling series of films.',
        'plot' => 'Finding himself in a new era, approaching retirement, Indy wrestles with fitting into a world that seems to have outgrown him. But as the tentacles of an all-too-familiar evil return in the form of an old rival, Indy must don his hat and pick up his whip once more to make sure an ancient and powerful artifact doesn&apos;t fall into the wrong hands.',
        'imdb' => 'tt1462764',
        'screening-summary' => 'Monday - Tuesday: 9pm, Wednesday - Friday: 9pm, Saturday - Sunday: 6pm',
        'screenings' => [
            'MON' => [
                'time' => '9pm',
                'rate' => 'discount'
            ],
            'TUE' => [
                'time' => '9pm',
                'rate' => 'regular'
            ],
            'WED' => [
                'time' => '9pm',
                'rate' => 'regular'
            ],
            'THU' => [
                'time' => '9pm',
                'rate' => 'regular'
            ],
            'FRI' => [
                'time' => '9pm',
                'rate' => 'regular'
            ],
            'SAT' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'SUN' => [
                'time' => '6pm',
                'rate' => 'regular'
            ]
        ]
    ],
    'RMC' => [
        'title' => 'Barbie',
        'rating' => 'PG',
        'genre' => 'Romance, Comedy',
        'summary' => 'Enter the fascinating world of Barbie and join her on an exciting adventure. Experience a heartwarming story filled with friendship, courage, and dreams. Barbie will captivate you with her charm and inspire you to believe in yourself. Get ready for an unforgettable journey with Barbie!',
        'plot' => 'The plot details for Barbie movie.',
        'imdb' => 'tt1517268',
        'screening-summary' => 'Wednesday - Friday: 12pm, Saturday - Sunday: 3pm',
        'screenings' => [
            'WED' => [
                'time' => '12pm',
                'rate' => 'regular'
            ],
            'THU' => [
                'time' => '12pm',
                'rate' => 'regular'
            ],
            'FRI' => [
                'time' => '12pm',
                'rate' => 'regular'
            ],
            'SAT' => [
                'time' => '3pm',
                'rate' => 'regular'
            ],
            'SUN' => [
                'time' => '3pm',
                'rate' => 'regular'
            ]
        ]
    ],
    'ANM' => [
        'title' => 'Teenage Mutant Ninja Turtles: Mutant Mayhem',
        'rating' => 'PG',
        'genre' => 'Animation, Action, Adventure',
        'summary' => 'Join the fearless Teenage Mutant Ninja Turtles in their latest mission to save the city from the clutches of evil. Watch as Leonardo, Donatello, Michelangelo, and Raphael unleash their ninja skills to combat powerful enemies. Get ready for an adrenaline-pumping adventure with the heroes in a half-shell!',
        'plot' => 'The plot details for Teenage Mutant Ninja Turtles movie.',
        'imdb' => 'tt8589698',
        'screening-summary' => 'Monday - Tuesday: 12pm, Wednesday - Friday: 6pm, Saturday - Sunday: 6pm',
        'screenings' => [
            'MON' => [
                'time' => '12pm',
                'rate' => 'regular'
            ],
            'TUE' => [
                'time' => '12pm',
                'rate' => 'regular'
            ],
            'WED' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'THU' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'FRI' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'SAT' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'SUN' => [
                'time' => '6pm',
                'rate' => 'regular'
            ]
        ]
    ],
    'DRM' => [
        'title' => 'Oppenheimer',
        'rating' => 'PG-13',
        'genre' => 'Drama',
        'summary' => 'Discover the untold story of J. Robert Oppenheimer, the brilliant scientist behind the development of the atomic bomb. Dive into the complex world of physics, politics, and moral dilemmas as Oppenheimer grapples with the consequences of his groundbreaking work. Experience a thought-provoking journey through history and ethics.',
        'plot' => 'The plot details for Oppenheimer movie.',
        'imdb' => 'tt15398776',
        'screening-summary' => 'Monday - Tuesday: 6pm, Saturday - Sunday: 9pm',
        'screenings' => [
            'MON' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'TUE' => [
                'time' => '6pm',
                'rate' => 'regular'
            ],
            'SAT' => [
                'time' => '9pm',
                'rate' => 'regular'
            ],
            'SUN' => [
                'time' => '9pm',
                'rate' => 'regular'
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
