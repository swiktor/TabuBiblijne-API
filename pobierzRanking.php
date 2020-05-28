<?php
require 'ConnectToDB.php';

$kwerenda_pobierz_ranking = "call pobierzRanking();";

if ($wynik_pobierz_ranking=mysqli_query($link, $kwerenda_pobierz_ranking)) {
    // We have results, create an array to hold the results
    // and an array to hold the data
    $resultArray = array();
    $tempArray = array();

    // Loop through each result
    while ($row = $wynik_pobierz_ranking->fetch_object()) {
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