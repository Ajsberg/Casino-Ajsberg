<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasyno Ajsberg</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="media/casinoicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'kasyno_mrowiec');
        $query = "SELECT * FROM login WHERE login='{$_SESSION['login']}'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        $_SESSION['saldo'] = $user['saldo'];
        $stanKonta = $_SESSION['saldo'];
        $imie = $_SESSION['imie'];
    ?>
</head>
<body>
    
    <div class="navbar">
        
        <div class="logo">Kasyno Ajsberg</div>
   
        <ul>
            <li><a href="index.php">Strona Główna</a></li>
            <?php
            echo '<li class="saldo">Witaj, '.$imie.'</li>';
            echo '<li class="saldo">Twoje saldo: '.$stanKonta.' zł</li>';
            $db->close();
            ?>
            <li><a href="wplac.html">Wpłać</a></li>
            <li><a href="wyloguj.php">Wyloguj się</a></li>
        </ul>
    </div>

    <div class="meritum"> <!-- Gra Meritum -->
        <p>MERITUM</p>
        <div class="losowanie">
            <div id="meritumwyn1">0</div>
            <div id="meritumwyn2">0</div>
            <div id="meritumwyn3">0</div>
        </div>
        <div id="gratulacje">PODAJ STAWKĘ I WCIŚNIJ GRAJ</div>
        <div><button id="guzikgraj">GRAJ</button></div>
        <div class="stawka">Twoja stawka:</div>
        <input type="number" id="tstawka" placeholder="zł">
    </div>

    <div class="zasady">
        Wylosuj 3 takie same oceny aby 20-sto krotnie pomnożyć swój zakład!
    </div>


    
    <script src="meritum.js"></script> <!-- Odnośnik do skryptu Meritum.js -->
</body>
</html>

<!--Autor: Kamil Mrowiec GitHub: https://github.com/Ajsberg/Casino-Ajsberg -->