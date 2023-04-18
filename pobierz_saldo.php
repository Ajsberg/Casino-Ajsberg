<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'kasyno_mrowiec');

// Odbieranie danych przesłanych metodą POST i pobranie loginu użytkownika z danych sesji przeglądarki
$koszt = $_POST['koszt'];
$wygrana = $_POST['wygrana'];
$login = $_SESSION['login'];

// Aktualizacja salda użytkownika w bazie danych SQL
$sql = "UPDATE login SET saldo = saldo - $koszt + $wygrana WHERE login = '$login'";
$wykonaj = mysqli_query($db, $sql);

?>

<!--Autor: Kamil Mrowiec GitHub: TBA -->