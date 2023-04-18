<?php
session_start();

// Połączenie z bazą danych
$db = mysqli_connect('localhost', 'root', '', 'kasyno_mrowiec');

// Sprawdzenie, czy formularz został wysłany
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Pobranie danych z formularza
  $username = $_POST['login'];
  $password = $_POST['password'];
  $hashpassword = hash("sha256", $password);

  // Sprawdzenie, czy użytkownik istnieje w bazie danych
  $query = "SELECT * FROM login WHERE login='$username'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    // Sprawdzenie, czy podane hasło jest poprawne
    if ($hashpassword == $user['haslo']) {
      
      // Utworzenie sesji i zapisanie informacji o zalogowanym użytkowniku
      $_SESSION['login'] = $user['login'];
      $_SESSION['saldo'] = $user['saldo'];
      $_SESSION['imie'] = $user['imie'];
      
      header('Location: index.php'); // Przekierowanie do strony głównej
      exit();
    } else {
      header('Location: logowanie.html'); //Przekierowanie spowrotem na stronę logowania, jeśli dane są niepoprawne.
    }
  } else {
    header('Location: logowanie.html');
  }
}
?>

<!--Autor: Kamil Mrowiec GitHub: TBA -->