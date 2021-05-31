<?php

$options = [
    'Bounty Hunter' => 'Boba Fett',
    'Human-Astroid-Relations' => 'C3P0',
    'Co-pilot' => 'Chewbacca',
    'Sith Master' => 'Darth Maul',
    'Sith Lord' => 'Darth Vader',
    'Mine Administrator' => 'Lando Calrissian',
    'Princess' => 'Leia Organa',
    'Jedi Knight' => 'Luke Skywalker',
    'Smuggler' => 'Han Solo',
    'Admiral' => 'Piett',
    'Astro Mech Droid' => 'R2D2',
    'Emperor' => 'Shev Palpatine',
    'Grand Moff' => 'Tarkin',
    'Jedi Master' => 'Yoda'
];

$episodes = [
    'Alle Folgen',
    'Die dunkle Bedrohung',
    'Angriff der Klonkrieger',
    'Die Rache der Sith',
    'Eine neue Hoffnung',
    'Das Imperium schlägt zurück',
    'Rückkehr der Jedi-Ritter',
    'Das Erwachen der Macht',
    'Die letzten Jedi',
    'Der Aufstieg Skywalkers'
];

$imagePaths = [
    'Darth Vader' => 'vader.jpg',
    'Yoda' => 'yoda.jpg',
    'Luke Skywalker' => 'luke.jpg',
    'Shev Palpatine' => 'palpatine.jpg',
    'Han Solo' => 'han.jpg',
    'Leia Organa' => 'leia.jpg',
    'Chewbacca' => 'chewie.jpg',
    'C3P0' => 'c3p0.jpg',
    'R2D2' => 'r2d2.jpg',
    'Darth Maul' => 'maul.jpg',
    'Boba Fett' => 'boba.jpg',
    'Tarkin' => 'tarkin.jpg',
    'Piett' => 'piett.jpg',
    'Lando Calrissian' => 'lando.jpg'
];

function generateEpisodeSelects($limit, $selectedNumber = 1)
{
    global $episodes;
    echo "<label for='episodes' class='form-label mt-4'>Episoden:</label>";
    echo "<select class='form-select' id='episodes' name='episode' aria-label='Star Wars Characters'>";

    for ($iterator = 1; $iterator < $limit; $iterator++) {
        if ($iterator == $selectedNumber) {
            echo "<option value='$iterator' selected>Star Wars Episode $iterator - $episodes[$iterator] (standardmäßig selektiert)</option>";
        } else {
            echo "<option value='$iterator'>Star Wars Episode $iterator: $episodes[$iterator]</option>";
        }
    }

    echo "</select>";
}

function generateCharacterSelects($options, $selectedCharacter = 'Luke Skywalker')
{
    echo "<label for='characters' class='form-label mt-4'>Figuren:</label>";
    echo "<select class='form-select' id='characters' name='characters' aria-label='Star Wars Characters'>";

    foreach ($options as $key => $option) {
        if ($option == $selectedCharacter) {
            echo "<option value='$option' selected>$option, $key (standardmäßig selektiert)</option>";
        } else {
            echo "<option value='$option'>$option, $key</option>";
        }
    }

    echo "</select>";
}

function showImage($imageKey)
{
    global $imagePaths;
    echo "<div class='row mt-4'><div class='col-md-12'>";
    echo "<img src='img/$imagePaths[$imageKey]' alt='$imageKey' class='img-fluid rounded'>";
    echo "</div>";
}

?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Formular | WIFI PHP</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">

                <h1>WIFI Star Wars Auswahlliste</h1>
                <h2>Marin Balabanov</h2>
                <p>Wählen Sie Ihre Lieblingsepisode und Lieblingsfigur aus.</h3>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

                    <?php
                    generateEpisodeSelects(count($episodes), 4);
                    generateCharacterSelects($options);
                    ?>

                    <button type="submit" class="btn btn-primary mt-4">Absenden</button>

                    <?php
                    if (isset($_POST['episode'])) {
                        $episodeNumber = $_POST['episode'];
                        echo "<h2 class='mt-4'>Lieblingsepisode: &laquo;Star Wars Episode $episodeNumber - $episodes[$episodeNumber]&raquo;</h2>";
                    }
                    if (isset($_POST['characters'])) {
                        echo "<h2 class='mt-4'>Lieblingsfigur: &laquo;$_POST[characters]&raquo;</h2>";
                        showImage($_POST['characters']);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>