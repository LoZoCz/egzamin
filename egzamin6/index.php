<?php
    $name = 'localhost';
    $login = 'root';
    $paswd = '';
    $base = 'dane3';
   
    $conn = mysqli_connect($name, $login, $paswd, $base);
   
    if(!$conn){
        echo('nie dziala');
    }else{
        // echo('dziala');
    }
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="left__header">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>
        <div class="right__header">
            <table>
                <tr>
                    <td>Krymnały</td><td>Horror</td><td>Przygodowe</td>
                </tr>
                <tr>
                    <td>20</td><td>30</td><td>20</td>
                </tr>
            </table>
        </div>
    </header>
    <div class="cont">
        <nav>
            <h3>
                Polecamy
            </h3>
        </nav>
        <div class="recommend-box__cont">
            <!-- SKRYPT PHP -->
            <?php
                $que = 'SELECT id, nazwa, opis, zdjecie FROM produkty WHERE id IN (18, 22, 23, 25);';

                $sql = mysqli_query($conn, $que);

                while($row = mysqli_fetch_assoc($sql)){
                    echo('<div class="film' . $row['id'] . ', film-box">');
                    echo('<h4>' . $row['id'] . '. ' . $row['nazwa'] . '</h4>');
                    echo('<img src="images/' . $row['zdjecie'] . '"></img>');
                    echo('<p>' . $row['opis'] . '</p>');
                    echo('</div>');
                }
            ?>
        </div>
        <nav>
            <h3>
                Filmy fantastyczne
            </h3>
        </nav>
        <div class="fantasy-box__cont">
            <!-- SKRYPT PHP -->
            <?php
                $que = 'SELECT id, nazwa, opis, zdjecie FROM produkty WHERE Rodzaje_id = 12;';

                $sql = mysqli_query($conn, $que);

                while($row = mysqli_fetch_assoc($sql)){
                    echo('<div class="film' . $row['id'] . ', film-box">');
                    echo('<h4>' . $row['id'] . '. ' . $row['nazwa'] . '</h4>');
                    echo('<img src="images/' . $row['zdjecie'] . '"></img>');
                    echo('<p>' . $row['opis'] . '</p>');
                    echo('</div>');
                }
            ?>
        </div>
    </div>
    <footer>
        <form action="" method="post">
            <p>Usuń film nr. : </p>
            <input type="number" name="filmId">
            <input type="submit" name="deleteBtn">
            <!-- SKRYPT PHP -->
            <?php
                @$num = $_POST['filmId'];
                // $btn = $_POST['deleteBtn'];

                if(isset($_POST['deleteBtn'])){
                    if(!empty($num)){
                        // echo('dziala');

                        $que = "DELETE FROM produkty WHERE id = '$num';";

                        $sql = mysqli_query($conn, $que);
                    }else{
                        // echo('wybierz');
                    }
                }
            ?>
        </form>
        <p>Strone utworzył: Mateusz Czernik (<a href="ja@poczta.com">PESEL</a>)</p>
    </footer>
</body>
</html>