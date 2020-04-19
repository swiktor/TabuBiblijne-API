<?php
petla:
require 'ConnectToDB.php';

$kwerenda_pobierz_hasla = "call pobierzHaslo();";
if ($wynik_pobierz_hasla=mysqli_query($link, $kwerenda_pobierz_hasla)) {

    $tablicaWyniki = array();
    $tablicaPomocnicza = array();

    while ($komorka_pobierz_hasla = $wynik_pobierz_hasla->fetch_object()) {
        $tablicaPomocnicza = $komorka_pobierz_hasla;
        array_push($tablicaWyniki, $tablicaPomocnicza);
    }

    if (empty($tablicaWyniki)) {
        require 'ConnectToDB.php';
        $kwerenda_pobierzID = "call licznikID();";
        $wynik_pobierzID=mysqli_query($link, $kwerenda_pobierzID);
        $komorka_pobierzID = mysqli_fetch_array($wynik_pobierzID);
        $licznikID = $komorka_pobierzID['licznik'];

        for ($i=0; $i <= $licznikID; $i++) {
            require 'ConnectToDB.php';
            $kwerenda_czyscHaslo = "call czyscHaslo($i);";
            mysqli_query($link, $kwerenda_czyscHaslo);
        }
        goto petla;
    }
    echo json_encode($tablicaWyniki);
}
mysqli_close($link);
