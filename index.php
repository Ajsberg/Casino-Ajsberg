<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasyno Mrowiec S.A.</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="media/casinoicon.ico" type="image/x-icon">
    <?php //Rozpoczęcie sesji oraz pobranie danych użytkownika jeśli jest zalogowany, lub wyświetlenie oświadczenia jeśli nie jest zalogowany
    session_start();
    if(isset($_SESSION['login'])){
        $db = mysqli_connect('localhost', 'root', '', 'kasyno_mrowiec');
        $query = "SELECT * FROM login WHERE login='{$_SESSION['login']}'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        $_SESSION['saldo'] = $user['saldo'];
        $stanKonta = $_SESSION['saldo'];
        $imie = $_SESSION['imie'];
    } else {
        echo '<script src="oswiadczenie.js"></script>';
    }
    ?>
</head>
<body>
    
    <div class="navbar"> <!--Pasek nawigacyjny-->
        
        <div class="logo">Kasyno Mrowiec</div>
   
        <ul>
            <li><a href="index.php">Strona Główna</a></li>
            <li><a href="help.html">Pomoc</a></li>
            <?php
            if(isset($_SESSION['login'])) {
                echo '<li class="saldo">Witaj, '.$imie.'</li>';
                echo '<li class="saldo">Twoje saldo: '.$stanKonta.' zł</li>';
                echo '<li><a href="wplac.html">Wpłać</a></li>';
                echo '<li><a href="wyloguj.php">Wyloguj się</a></li>';
            } else {
                echo '<li><a href="logowanie.html">Zaloguj się</a></li>';
                echo '<li><a href="zarejestruj.html">Zarejestruj się</a></li>';
            }
            ?>
        </ul>
    </div>
    <div class="games">GRY</div> <!-- Lista gier -->
    <div class="main">
        <div class="gra">
            <img src="meritum.png" alt="Meritum"><br>
            <p>Meritum</p><br>
            <?php
            if(isset($_SESSION['login'])){
                echo '<a href="meritum.php">ZAGRAJ</a>';
            } else {
                echo '<a href="logowanie.html">ZALOGUJ SIĘ, ABY ZAGRAĆ</a>';
            }
            ?>
        </div>
    </div>
</body>
</html>

<!--
    Autor: Kamil Mrowiec GitHub: TBA 
    Znane błędy:
    -Niema dolnego limitu gry (można grać na debet w nieskończoność),
    -Po utracie/zarobieniu pieniędzy w grze "Meritum" trzeba odświeżyć stronę aby "Twoje saldo" wskazywało kwotę faktyczny stan konta, niema to jednak znaczenia z uwagi na pkt.1
-->