<?php
    session_start(); //Pobierz dane z istniejącej sesji
    session_destroy(); //Usuń dane sesji
    header('Location: index.php'); //Przekieruj spowrotem na stronę główną
    exit;
?>

<!--Autor: Kamil Mrowiec GitHub: TBA -->