<?php
require 'ConnectToDB.php';

$haslo = $_POST['haslo'];

$link = $_POST['link'];

$zakazane_1 = $_POST['zakazane_1'];

$zakazane_2 = $_POST['zakazane_2'];

$zakazane_3 = $_POST['zakazane_3'];

$zakazane_4 = $_POST['zakazane_4'];

$zakazane_5 = $_POST['zakazane_5'];


$kw_dodajHaslo="call dodajHaslo('$haslo','$link');";
echo $kw_dodajHaslo . "<br>";
$kw_dodajZakazane = "call dodajZakazane('$zakazane_1');";
echo $kw_dodajZakazane. "<br>";
$kw_dodajZakazane = "call dodajZakazane('$zakazane_2');";
echo $kw_dodajZakazane. "<br>";
$kw_dodajZakazane = "call dodajZakazane('$zakazane_3');";
echo $kw_dodajZakazane. "<br>";
$kw_dodajZakazane = "call dodajZakazane('$zakazane_4');";
echo $kw_dodajZakazane. "<br>";
$kw_dodajZakazane = "call dodajZakazane('$zakazane_5');";
echo $kw_dodajZakazane. "<br>";
$kw_laczCalosc = "call laczCalosc('$haslo', '$link','$zakazane_1', '$zakazane_2', '$zakazane_3', '$zakazane_4', '$zakazane_5');";
echo $kw_laczCalosc. "<br>";
?>

<!DOCTYPE html>
<html lang="pl" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Dodawacz haseł</title>
  </head>
  <body>
<form class="" action="dodawaczHasel.php" method="post">

<label for="haslo">Hasło</label>
<input id="haslo" type="text" name="haslo" value="">

<br>

<label for="link">Link</label>
<input id="link" type="text" name="link" value="">

<br>

<label for="zakazane_1">Zakazane 1</label>
<input id="zakazane_1" type="text" name="zakazane_1" value="">

<br>

<label for="zakazane_2">Zakazane 2</label>
<input id="zakazane_2" type="text" name="zakazane_2" value="">

<br>

<label for="zakazane_3">Zakazane 3 </label>
<input id="zakazane_3" type="text" name="zakazane_3" value="">

<br>

<label for="zakazane_4">Zakazane 4</label>
<input id="zakazane_4" type="text" name="zakazane_4" value="">

<br>

<label for="zakazane_5">Zakazane 5</label>
<input id="zakazane_5" type="text" name="zakazane_5" value="">

<br>

<input type="submit" name="" value="Wyślij">
</form>

  </body>
</html>
