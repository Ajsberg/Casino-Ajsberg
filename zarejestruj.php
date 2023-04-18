<?php
session_start();

// Połączenie z bazą danych
$db = mysqli_connect('localhost', 'root', '', 'kasyno_mrowiec');

// Sprawdzenie, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Pobranie danych z formularza i zaszyfrowanie hasła
  $username = $_POST['login'];
  $password = $_POST['password'];
  $hashpassword = hash("sha256", $password);
  $imie = $_POST['imie'];
  $nazwisko = $_POST['nazwisko'];

  // Wprowadzenie nowego użytkownika do bazy danych wraz z bonusowym 1000 zł na start
  $query = "INSERT INTO login (login, haslo, saldo, imie, nazwisko) VALUES ('$username', '$hashpassword', 1000, '$imie', '$nazwisko')";
  $result = mysqli_query($db, $query);
  $_SESSION['login'] = $username;
  $_SESSION['imie'] = $imie;
  header('Location: index.php');
}
?>

<!--Autor: Kamil Mrowiec GitHub: TBA -->