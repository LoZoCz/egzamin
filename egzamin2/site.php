<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Panel administratora</title>
</head>
<body>
    <header>
        <h1>Portal społecznościowy - panel administratora</h1>
    </header>
    <div class="main-cont">
        <div class="list-cont">
            <!-- php skrypt do listy -->
            <?php
                // echo('test');

                $name = 'localhost';
                $login = 'root';
                $paswd = '';
                $base = 'dane';

                $conn = mysqli_connect($name, $login, $paswd, $base);

                if(!$conn){
                    echo('Nie udało sie połączyć');
                }else{
                    // echo('Udało sie połączyć');

                    $query = 'SELECT id, imie, nazwisko, rok_urodzenia, zdjecie FROM osoby LIMIT 30;';

                    $sql = mysqli_query($conn, $query);

                    $year = date("Y");

                    // echo($year);

                    while($data = mysqli_fetch_assoc($sql)){
                        $wiek = $year - $data['rok_urodzenia'];
                        echo('<p>' . $data['id'] . '. ' . $data['imie'] . ' ' . $data['nazwisko'] . ', ' . $wiek . 'lat</p>');
                    }

                    mysqli_close($conn);
                }
            ?>
            <a href="index.txt"><button class="btn">Inne ustawienia</button></a>
        </div>
        <div class="search-cont">
            <div class="searching-section">
                <form method="post">
                    <label class="inp-name" for="id">Podaj ID</label>
                    <input type="number" name="prof_num" class="inp-id" id="id">
                    <input type="submit" value="ZOBACZ" class="btn sub" name="show_prof">
                </form>
                <hr>
                <!-- php skrypt do profilu -->
                <?php
                $name = 'localhost';
                $login = 'root';
                $paswd = '';
                $base = 'dane';

                $conn = mysqli_connect($name, $login, $paswd, $base);

                if(!$conn){
                    echo('Nie udało sie połączyć');
                }else{
                    // echo('Udało sie połączyć');

                    @$number = $_POST["prof_num"];

                    if($number == NULL){
                        echo('<h3>Wprowadź ID aby zoaczyć profil użytkowanika</h3>');
                    }

                    $query = "SELECT osoby.id, osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa FROM osoby INNER JOIN hobby ON osoby.Hobby_id=hobby.id WHERE osoby.id='$number';";

                    $sql1 = mysqli_query($conn, $query);

                    if(isset($_POST['show_prof'])){
                        // echo('Przycisk działa');
                        // echo($number);
                        if($number>30 || $number<2){
                            echo('<h3>Nie ma takiego uzytkownika</h3>');
                        } else {
                            while($data = mysqli_fetch_assoc($sql1)){
                                echo('<h3>' . $data['id'] . '. ' . $data['imie'] . ' ' . $data['nazwisko'] . '</h3>');
                                echo('<img src="' . $data['zdjecie'] . '" alt="' . $data['id']. 'zdj-profilowe' . '"/>');
                                echo('<h4>Rok urodzenia: ' . $data['rok_urodzenia'] . '</h4>');
                                echo('<h4>Opis: ' . $data['opis'] . '</h4>');
                                echo('<h4>Hobby: ' . $data['nazwa'] . '</h4>');
                            }
                        }   
                    }

                    mysqli_close($conn);
                } 
                ?>
            </div>
            <div class="info-section">

            </div>
        </div>
    </div>
    <footer>
        <h4>Autor: Mateusz Czernik (PESEL)</h4>
    </footer>
</body>
</html>