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
$kwerenda_wyslij_haslo = "call wyslijHaslo('$id_hasla', '$zgadniety');";

if ($wynik_wyslij_haslo=mysqli_query($link, $kwerenda_wyslij_haslo)) {
    echo "OK";
    mysqli_close($link);
} else {
    echo "NIE OK";
    mysqli_close($link);
}
