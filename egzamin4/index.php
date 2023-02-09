<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Portal ogłoszeniowy</title>
</head>
<body>
    <header>
        <h1>Portal ogłoszeniowy</h1>
    </header>
    <div class="cont">
        <div class="left">
            <div class="first">
                <h3>Kategorie ogłoszeń</h3>
                <ol type="I">
                    <li>Książki</li>
                    <li>Muzyka</li>
                    <li>Filmy</li>
                </ol>
            </div>
            <div class="second">
                <img src="books.jpg" alt="Kupię / sprzedam książkę">
            </div>
            <div class="third">
                <table>
                    <tr>
                        <td>Liczba ogłoszeń</td><td>Cena ogłoszenia</td><td>Bonus</td>
                    </tr>
                    <tr>
                        <td>1 - 10</td><td>1 PLN</td><td rowspan="3">Subskybcja newslettera to upust 0,20 PLN na ogłoszenie</td>
                    </tr>
                    <tr>
                        <td>11 - 50</td><td>0,80 PLN</td>
                    </tr>
                    <tr>
                        <td>51 i więcej</td><td>0,60 PLN</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="blank"></div>
        <div class="right">
            <h1>Ogłoszenie kategori książek</h1>
            <!-- SKRYPT PHP -->
            <?php
                $name = 'localhost';
                $login = 'root';
                $paswd = '';
                $base = 'ogloszenia';

                $conn = mysqli_connect($name, $login, $paswd, $base);

                if(!$conn){
                    echo('Nie połączono z bazą danych');
                }else{
                    // echo('Połączono z bazą danych');

                    $query1 = 'SELECT id, tytul, tresc FROM ogloszenie WHERE kategoria=1;';

                    $sql1 = mysqli_query($conn, $query1);

                    while($data = mysqli_fetch_assoc($sql1)){
                        echo('<h2>' . $data['id'] . '. ' . $data['tytul'] . '</h2>');
                        echo('<p>' . $data['tresc'] . '</p>');

                        $query2 = 'SELECT uzytkownik.telefon FROM ogloszenie INNER JOIN uzytkownik ON ogloszenie.uzytkownik_id = uzytkownik.id WHERE ogloszenie.id=' . $data["id"] . ';';

                        $sql2 = mysqli_query($conn, $query2);

                        while($data1 = mysqli_fetch_assoc($sql2)){
                            echo('<p>Telefon kontaktowy: ' . $data1['telefon'] . '</p>');
                        }
                    }

                    mysqli_close($conn);
                }
            ?>
        </div>
    </div>
    <footer>
        <p>Stronę utworzył: Mateusz Czernik</p>
    </footer>
</body>
</html>