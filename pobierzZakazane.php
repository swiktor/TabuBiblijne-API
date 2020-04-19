<?php
require 'ConnectToDB.php';

if (is_null($_POST['haslo']) || !isset($_POST['haslo'])) {
    $haslo = $_GET['haslo'];
} else {
    $haslo = $_POST['haslo'];
}

$kwerenda_pobierzZakazene = "call pobierzZakazene('$haslo');";

if ($wynik_pobierzZakazene=mysqli_query($link, $kwerenda_pobierzZakazene)) {
    // We have results, create an array to hold the results
    // and an array to hold the data
    $resultArray = array();
    $tempArray = array();

    // Loop through each result
    while ($row = $wynik_pobierzZakazene->fetch_object()) {
        // Add each result into the results array
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }

    // Encode the array to JSON and output the results
    echo json_encode($resultArray);
}

// Close connections
mysqli_close($con);
?>
