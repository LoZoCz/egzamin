<?php
    $name = 'localhost';
    $login = 'root';
    $paswd = '';
    $base = 'sklep';

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
    <title>Hurtownia papiernicza</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <header>
        <h1>W naszej hurtowni kupisz najtaniej</h1>
    </header>
    <div class="cont">
        <div class="left__cont">
            <h3>Ceny wybranych artykułów w hurtowni:</h3>
            <table>
                <!-- SKRYPT PHP -->
                <?php
                   $que = 'SELECT nazwa, cena FROM towary LIMIT 4';
                   
                   $sql = mysqli_query($conn, $que);

                   while($row = mysqli_fetch_assoc($sql)){
                    echo('<tr><td>' . $row['nazwa'] . '</td><td>' . $row['cena'] . ' zł</td></tr>');
                   }
                ?>
            </table>
        </div>
        <div class="mid__cont">
            <h3>Ile będą kosztować Twoje zakupy?</h3>
            <form action="" method="post">
                
                <label for="list">wybierz artykuł: </label>
                <select name="list" id="list">
                    <option value="">Zeszyt 60 kartek</option>
                    <option value="">Zeszyt 32 kartki</option>
                    <option value="">Cyrkiel</option>
                    <option value="">Linijka 30cm</option>
                    <option value="">Ekierka</option>
                    <option value="">Linijka 50cm</option>
                </select><br>

                <label for="number">liczba sztuk: </label>
                <input type="number" name="number" min="1" value="1" id="number"><br>

                <input type="submit" value="OBLICZ" name="subBtn" id="subBtn">
                <!-- SKRYPT PHP -->
                <?php
                    // $item = $_POST['list'];
                
                    // $que = "SELECT cena FROM towary WHERE nazwa='$item';";

                    // foreach($_POST['list'])
                   
                    $sql = mysqli_query($conn, $que);
                ?>
            </form>
        </div>
        <div class="right__cont">
            <img src="zakupy2.png" alt="hurtownia">
            <h3>Kontakt</h3>
            <p>
                telefon:<br>
                111222333<br>
                e-mail:<br>
                <a href="hurt@wp.pl">hurt@wp.pl</a><br>
            </p>
        </div>
    </div>
    <footer>
        <h4>Witrynę wykonał: Mateusz Czernik (PESEL)</h4>
    </footer>
</body>
</html>

<?php
    mysqli_close($conn);
?>