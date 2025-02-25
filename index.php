<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    
    echo '<h1 class="text-center">Hotels</h1>';


    echo '<form action="index.php" method="get">
    
        <div class="row">
            <div class="mb-3 col-6">
            <label for="vote" class="form-label">Voto</label>
            <input type="number" class="form-control" id="vote" name="vote">
            </div>
            <div class="mb-3 col-6">
            <label for="parking" class="form-label">Parcheggio disponibile</label>
            <input type="checkbox" class="form-check-input" id="parking" name="parking">
            </div>

            <div class="mb-3 col-6">
                <button type="submit" class="btn btn-primary">Filtra</button>
            </div>

        </div>
    
    
    </form>';

    
    $min_vote = isset($_GET['vote']) ? $_GET['vote'] : 0;
    $parking = isset($_GET['parking']);





    echo '<div class="container d-flex flex-wrap">';
    foreach($hotels as $hotel) {

        if(($hotel['vote'] >= $min_vote) && (!$parking || $hotel['parking'])) {
            echo '<div class="card" style="width: 24rem;">
                <div class="card-body">
                <h5 class="card-title">'.$hotel['name'].'</h5>
                <h6 class="card-subtitle mb-2 text-muted">'.$hotel['description'].'</h6>
                <p class="card-text">Voto: '.$hotel['vote'].'</p>
                <p class="card-text">Distanza dal centro: '.$hotel['distance_to_center'].' km</p>
                <p class="card-text">Parcheggio: '.($hotel['parking'] ? 'Disponibile' : 'Non disponibile').'</p>
                </div>
            </div>';
        }

        
    }
    echo '</div>';

?>
</body>
</html>