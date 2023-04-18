<?php
session_start();
if(isset($_POST['saldo']) && $_POST['saldo'] > 0 && $_POST['platnosc']){
    $db = mysqli_connect('localhost', 'root', '', 'kasyno_mrowiec'); //Połączenie z bazą
    $query = "SELECT saldo FROM login WHERE login='{$_SESSION['login']}'"; //Pobierz z bazy obecne saldo i zapisz do tab. asocjacyjnej
    $result = mysqli_query($db, $query);
    $rzad = mysqli_fetch_assoc($result);
    $obsaldo = $rzad['saldo'];
    $nsaldo = $obsaldo + $_POST['saldo']; //Dodaj wpłacaną kwotę do obecnego salda
    $query2 = "UPDATE login SET saldo = $nsaldo WHERE login='{$_SESSION['login']}'"; //Zaktualizuj wartość salda w bazie
    $result2 = mysqli_query($db, $query2);
    $db->close();
    header('Location: sukces.html'); //Przenieś na stronę główną
} else {
    header('Location: wplac.html'); //Przenieś spowrotem na stronę wpłat
}
?>

<!--Autor: Kamil Mrowiec GitHub: https://github.com/Ajsberg/Casino-Ajsberg -->