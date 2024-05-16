@extends('layout')
    @section('content')
    <?php
    // PHP-code om het spel te implementeren

    // Array met mogelijke woorden
    $woorden = array("huis", "auto", "boom", "klok", "fiets");

    // Kies willekeurig een woord uit de array
    $teRadenWoord = $woorden[array_rand($woorden)];

    // Aantal pogingen dat de gebruiker heeft
    $pogingen = 4;

    // Controleer of de gebruiker een poging heeft gedaan
    if(isset($_POST['guess'])) {
        $gebruikersWoord = strtolower($_POST['guess']); // Gebruiker geraden woord

        // Controleer of het geraden woord overeenkomt met het te raden woord
        if($gebruikersWoord == $teRadenWoord) {
            echo "<p>Gefeliciteerd! Je hebt het woord geraden: $teRadenWoord</p>";
        } else {
            $pogingen--; // Verminder het aantal pogingen
            echo "<p>Helaas, dat is niet correct. Je hebt nog $pogingen pogingen over.</p>";
        }
    }

    // Als de gebruiker nog pogingen over heeft, toon het formulier om te raden
    if($pogingen > 0) {
    ?>

    <form action="{{ route('spel') }}" method="POST" >
    @csrf <label for="guess">Raad het woord:</label>
        <input type="text" id="guess" name="guess" maxlength="5" minlength="4" pattern="[a-zA-Z]+" required>
        <button type="submit">Raad</button>
    </form>

    <?php
    } else {
        echo "<p>Je hebt alle pogingen gebruikt. Het woord was: $teRadenWoord</p>";
    }
    ?>
    @endsection