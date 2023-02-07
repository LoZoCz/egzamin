<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl_1.css">
    <title>Wędkowanie</title>
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>
    </header>
    <div class="lewy">
        <div class="jeden">
            <h3>Ryby zamieszkujące rzeki</h3>
            <!-- Lista numerowana -->
            <ol>
                <?php
                    // echo('<li>test</li>');

                    $name = 'localhost';
                    $login = 'root';
                    $pswd = '';
                    $base = 'baza';

                    $connect = mysqli_connect($name, $login, $pswd, $base);

                    if(!$connect){
                        // echo('Nie połączono z bazą!');
                        mysqli_close($connect);
                    } else{
                        // echo('Połączono z bazą!');

                        $query = 'SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo FROM ryby INNER JOIN lowisko ON ryby.id=lowisko.Ryby_id WHERE ryby.wystepowanie LIKE "%rzeki%";';
                        
                        $result = $connect->query($query);

                        while($row = $result->fetch_assoc()){
                            echo("<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen'] . ", " . $row['wojewodztwo'] . '</li>');
                        }

                        mysqli_close($connect);
                    }
                ?>
            </ol>
        </div>
        <div class="dwa">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <thead>
                    <th>L.p.</th><th>Gatunek</th><th>Występowanie</th>
                </thead>
                <!-- Tabela z rekordami -->
                <?php
                    // echo('<li>test</li>');

                    $name = 'localhost';
                    $login = 'root';
                    $pswd = '';
                    $base = 'baza';

                    $connect = mysqli_connect($name, $login, $pswd, $base);

                    if(!$connect){
                        // echo('Nie połączono z bazą!');
                        mysqli_close($connect);
                    } else{
                        // echo('Połączono z bazą!');

                        $query = 'SELECT `id`, `nazwa`, `wystepowanie` FROM `ryby` WHERE styl_zycia=1;';

                        $sql = mysqli_query($connect, $query);
                        
                        $result = $connect->query($query);

                        $rows = mysqli_num_rows($sql);

                        // echo($rows);

                        for($i = 0; $i<$rows; $i++){
                            while($row = $result->fetch_assoc()){
                                $i++;
                    
                                echo("<tbody><td>" . $i . "</td><td>" . $row['nazwa'] . "</td><td>" . $row['wystepowanie'] . '</td></tbody>');
                            }
                        }


                        mysqli_close($connect);
                    }
                ?>
            </table>
        </div>
    </div>
    <div class="prawy">
        <img src="ryba1.jpg" alt="Sum">
        <a href="kwerendy.txt">Pobierz kwerendy</a>
    </div>
    <footer>
        <p>Stronę wykonał: Mateusz Czernik (PESEL)</p>
    </footer>
</body>
</html>