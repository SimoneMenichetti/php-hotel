<!-- //data php -->
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
    // filtriamo fra gli hotel quale di questi hanno il parcheggio 

    $HotelsFiltered = isset($_GET['parking']) && $_GET['parking']== 'yes'?
    array_filter($hotels, fn($hotel)=> $hotel['parking']) : $hotels;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>php-hotel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- BONUS 1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio. -->
        <form action="" class="mb-4" method="GET">
            <div class="form-check"> 
                <input type="checkbox" class="check-input" id="parking" name="parking" value="yes" <?php if (isset($_GET['parking']) && $_GET['parking'] == 'yes') echo 'checked'; ?>>
                <label class="form-check-label" for="parking">Mostra solo hotel con parcheggio</label>
            </div>
            <!-- inserimento bottone submit per filtrare -->
            <button type="submit" class="btn btn-primary mt-2">Filtra</button>
        </form>

        <!-- creazione container per la table con bootstrap -->
        <div class='container mt-5'>
            <h1 class='mb-4'>php-hotel</h1>
            <!-- inserimento tabella bootstrap -->
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <!-- intestazione -->
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parking</th>
                    <th>Vote</th>
                    <th>Distance to Center (km)</th>
                </tr>
            </thead>
            <!-- corpo tabella -->
            <tbody>
                <!-- utilizzo del foreach per iterare nell array $Hotels e generare dinamicamente i tb della table -->

                <!-- bonus cambiamo l array hotels per utilizzare la chiamata get e filtrare nell array  -->
                 
                <?php foreach ($HotelsFiltered  as $hotel): ?>
                    <tr>
                        <td><?php echo $hotel['name']; ?></td>
                        <td><?php echo $hotel['description']; ?></td>
                        <!-- trasformare il valore boleano parking  a SI/NO utilizzando un ternario-->
                        <td><?php echo $hotel['parking']?'yes': 'no'; ?></td>
                        <td><?php echo $hotel['vote']; ?></td>
                        <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>