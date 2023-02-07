<?php 
    setcookie("")
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl6.css">
    <title>Odloty samolotów</title>
</head>
<body>
    <div class="head-1">
        <h2>Odloty z lotniska</h2>
    </div>
    <div class="head-2">
        <img src="zad6.png" alt="logotyp">
    </div>
    <div class="main-cont">
        <h4>tabela odlotów</h4>
        <table>
            <thead>
                <th>l.p.</th>
                <th>mumer rejsu</th>
                <th>czas</th>
                <th>kierunek</th>
                <th>status</th>
            </thead>
            <tbody>
                <!-- SKRYPT 1 -->
                <?php
                    $name = 'localhost';
                    $login = 'root';
                    $paswd = '';
                    $base = 'egzamin';
                    
                    $conn = mysqli_connect($name, $login, $paswd, $base);

                    if(!$conn){
                        echo('Brak połaczenia z baza danych, błąd: ');
                    } else{
                        // echo('Połączono z bazą danych');

                        $sql = 'SELECT `id`, `nr_rejsu`, `czas`, `kierunek`, `status_lotu` FROM `odloty` ORDER BY czas DESC;';

                        $query = mysqli_query($conn, $sql);

                        while($row = $query->fetch_assoc()){
                            echo('<tr><td>' . $row['id'] . '</td><td>' . $row['nr_rejsu'] . '</td><td>' . $row['czas'] . '</td><td>' . $row['kierunek'] . '</td><td>' . $row['status_lotu'] . '</td></tr>');
                        }

                        mysqli_close($conn);
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="foot-1">
        <a href="PESEL/kw1.png">Pobierz obraz</a>
    </div>
    <div class="foot-2">
        <!-- SKRYPT 2 -->
        <?php
            $name = 'localhost';
            $login = 'root';
            $paswd = '';
            $base = 'egzamin';
            
            $conn = mysqli_connect($name, $login, $paswd, $base);

            if(!$conn){
                echo('Brak połaczenia z baza danych, błąd: ');
            } else{
                // echo('Połączono z bazą danych');


                mysqli_close($conn);
            }
        ?>
    </div>
    <div class="foot-3">
        <p>Autor: Mateusz Czernik (PESEL)</p>
    </div>
</body>
</html>