<?php

require_once 'vendor/autoload.php';

if (is_null($_POST['idToken']) || !isset($_POST['idToken'])) {
    $idToken = $_GET['idToken'];
} else {
    $idToken = $_POST['idToken'];
}

if (is_null($_POST['personId']) || !isset($_POST['personId'])) {
    $personId = $_GET['personId'];
} else {
    $personId = $_POST['personId'];
}


if (!is_null($idToken) && isset($idToken)) {
    $link = "https://oauth2.googleapis.com/tokeninfo?id_token=".$idToken;

    $json = file_get_contents($link);
    $obj = json_decode($json);

    $sub =  $obj->sub;
    $imie = $obj->given_name;
    $nazwisko = $obj->family_name;
    $email = $obj->email;
    $weryfikacja = $obj->email_verified;

    if ($weryfikacja) {
        echo $sub . "<br>";
        echo $imie . "<br>";
        echo $nazwisko . "<br>";
        echo $email . "<br>";
        echo $weryfikacja . "<br>";
        // TODO: insert into uzytkownicy values ... // call dodajUzytkownika + profil na 0 w rankingu
    } else {
        "Adres email niezweryfikowany";
    }
}

if (is_null($idToken) && !isset($idToken) && !is_null($personId) && isset($personId)) {




}