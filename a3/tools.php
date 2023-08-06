<?php

$moviesObject = [
    'ACT' => [
        'title' => 'Indiana Jones and the Dial of Destiny',
        'rating' => 'PG-13',
        'genre' => 'Action, Adventure',
        'summary' => 'Daredevil archaeologist Indiana Jones races against time to retrieve a legendary dial that can change the course of history. Accompanied by his goddaughter, he soon finds himself squaring off against Jürgen Voller, a former Nazi who works for NASA.',
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
        'summary' => 'Barbie and Ken are having the time of their lives in the colorful and seemingly perfect world of Barbie Land. However, when they get a chance to go to the real world, they soon discover the joys and perils of living among humans.',
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
        'summary' => 'After years of being sheltered from the human world, the Turtle brothers set out to win the hearts of New Yorkers and be accepted as normal teenagers. Their new friend, April O''Neil, helps them take on a mysterious crime syndicate, but they soon get in over their heads when an army of mutants is unleashed upon them.',
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
        'summary' => 'During World War II, Lt. Gen. Leslie Groves Jr. appoints physicist J. Robert Oppenheimer to work on the top-secret Manhattan Project. Oppenheimer and a team of scientists spend years developing and designing the atomic bomb. Their work comes to fruition on July 16, 1945, as they witness the world''s first nuclear explosion, forever changing the course of history.',
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
