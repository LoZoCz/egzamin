<?php
    $name = 'localhost';
    $login = 'root';
    $paswd = '';
    $base = 'baza1';

    $conn = mysqli_connect($name, $login, $paswd, $base);

    if(!$conn){
        echo('Nie działa');
    }else{
        // echo('Działa');
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>
    </header>
    <div class="cont">
        <h2>Opinie naszych klientów</h2>
        <!-- SKRYPT PHP -->
        <?php
            $que = 'SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM klienci INNER JOIN opinie ON klienci.id = opinie.Klienci_id WHERE klienci.Typy_id = 2 OR klienci.Typy_id = 3;';

            $sql = mysqli_query($conn, $que);

            while($row = mysqli_fetch_assoc($sql)){
                echo('<div class = "opinion">');
                echo('<img src="zad3/' . $row['zdjecie'] . '">');
                echo('<p class="cyt">' . $row['opinia'] . '</p>');
                echo('<h4>' . $row['imie'] . '</h4>');
                echo('</div>');
            }
        ?>
    </div>
    <footer>
        <div class="foot-1">
            <h3>Współpracują z nami</h3>
            <a href=" http://sklep.pl/">Sklep 1</a>
        </div>
        <div class="foot-2">
            <h3>Nasi top klienci</h3>
            <ul>
                <!-- SKRYPT PHP -->
                <?php
                    $que = 'SELECT imie, nazwisko, punkty FROM klienci GROUP BY punkty DESC LIMIT 3;';

                    $sql = mysqli_query($conn, $que);

                    while($row = mysqli_fetch_assoc($sql)){
                        echo('<li>' . $row['imie'] . ' ' . $row['nazwisko'] . ', ' .  $row['punkty'] . ' pkt.</li>');
                    }

                    mysqli_close($conn);
                ?>
            </ul>
        </div>
        <div class="foot-3">
            <h3>Skontaktuj się</h3>
            <p>telefon: 111222333</p>
        </div>
        <div class="foot-4">
            <p>Autor: MATUESZ CZERNIK</p>
        </div>
    </footer>
</body>
</html>