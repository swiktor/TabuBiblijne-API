<?php

if (is_null($_POST['stan']) || !isset($_POST['stan'])) {
    $stan = $_GET['stan'];
} else {
    $stan = $_POST['stan'];
}

if (is_null($_POST['personId']) || !isset($_POST['personId'])) {
    $personId = $_GET['personId'];
} else {
    $personId = $_POST['personId'];
}

if (is_null($_POST['imie']) || !isset($_POST['imie'])) {
    $imie = $_GET['imie'];
} else {
    $imie = $_POST['imie'];
}

if (is_null($_POST['nazwisko']) || !isset($_POST['nazwisko'])) {
    $nazwisko = $_GET['nazwisko'];
} else {
    $nazwisko = $_POST['nazwisko'];
}

if (is_null($_POST['email']) || !isset($_POST['email'])) {
    $email = $_GET['email'];
} else {
    $email = $_POST['email'];
}

if ($stan=='nowy') {
    require 'ConnectToDB.php';
    $kwerenda_dodaj_uzytkownika = "call dodajOsobaRanking ('$personId', '$imie', '$nazwisko', '$email');";
    $wynik_dodaj_uzytkownika=mysqli_query($link, $kwerenda_dodaj_uzytkownika);

    if ($wynik_dodaj_uzytkownika) {
        $zwrotka = "Dodano użytkownika";
    } else {
        $zwrotka =  "Nie można dodać użytkownika";
    }
}

require 'ConnectToDB.php';
$kwerenda_pobierz_punkty = "call pobierzPunkty ($personId)";
$wynik_pobierz_punkty=mysqli_query($link, $kwerenda_pobierz_punkty);

    if ($wynik_pobierz_punkty) {
        $komorka_pobierz_punkty = mysqli_fetch_array($wynik_pobierz_punkty);
        $zwrotka =  $komorka_pobierz_punkty['punkty'];
    } else {
        $zwrotka = "Nie można pobrać punktów";
    }

$JSON= array("zwrotka"=>$zwrotka);
echo json_encode($JSON);
