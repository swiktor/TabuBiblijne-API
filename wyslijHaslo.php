<?php
require 'ConnectToDB.php';

if (is_null($_POST['haslo']) || !isset($_POST['haslo'])) {
    $haslo = $_GET['haslo'];
} else {
    $haslo = $_POST['haslo'];
}

if (is_null($_POST['zgadniety']) || !isset($_POST['zgadniety'])) {
    $zgadniety = $_GET['zgadniety'];
} else {
    $zgadniety = $_POST['zgadniety'];
}

if (is_null($_POST['personId']) || !isset($_POST['personId'])) {
    $personId = $_GET['personId'];
} else {
    $personId = $_POST['personId'];
}

$kwerenda_znajdzID = "call znajdzID('$haslo');";

if ($wynik_znajdzID=mysqli_query($link, $kwerenda_znajdzID)) {
    $komorka_znajdzID = mysqli_fetch_array($wynik_znajdzID);
    $id_hasla = $komorka_znajdzID['id_hasla'];
    mysqli_close($link);
} else {
    echo "NIE OK";
    mysqli_close($link);
}

require 'ConnectToDB.php';
$kwerenda_wyslij_haslo = "call wyslijHaslo('$id_hasla', '$zgadniety', '$personId');";
$wynik_wyslij_haslo=mysqli_query($link, $kwerenda_wyslij_haslo);

if ($wynik_wyslij_haslo) {

    $komorka_pobierz_punkty = mysqli_fetch_array($wynik_wyslij_haslo);
    $zwrotka =  $komorka_pobierz_punkty['punkty'];
    mysqli_close($link);
} else {
    $zwrotka = "Nie można pobrać punktów";
    mysqli_close($link);
}

$JSON= array("zwrotka"=>$zwrotka);
echo json_encode($JSON);