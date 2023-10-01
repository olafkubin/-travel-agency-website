<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biuro Podróży Kubin | Home</title>
    <link rel="stylesheet" type="text/css" href="styl.css">
    <link rel="icon" type="image/x-icon" href="IMG/favicon.ico">
    <script src="data_czas.js"></script>
</head>
<body onload="czas()">
    <header>
        <div id="Left-Header">
            <a href="home.html"><img src="IMG/logo.png" alt=""></a>
        </div>
        <div id="Right-Header">
            <p>Najlepsze kurorty narciarskie!</p>
        </div>
    </header>
    <main>
        <div id="Left-Main">
            <nav>
            <ul>
                <li><a href="promocje.html">Promocje</a></li>
                <li><a href="oferty.html">Oferty</a ></li>
                <li><a href="galeria.html">Galeria</a></li>
                <li><a href="kontakt-formularz.html">Kontakt</a></li>
                <li><a href="opinie-formularz.php">Opinie</a></li>
            </ul>
            </nav>
            <hr>
            <p><span id="data"></span><br><span id="czas"></span></p>
            <div id="socialmedia">
                <a href="https://www.messenger.com"><img src="IMG/messenger-icon.png" alt="" target="_blank"></a>
                <a href="https://www.instagram.com"><img src="IMG/instagram-icon.png" alt="" target="_blank"></a>
                <a href="https://www.facebook.com"><img src="IMG/facebook-icon.png" alt="" target="_blank"></a>
                <a href="https://www.tiktok.com"><img src="IMG/tiktok-icon.png" alt="" target="_blank"></a>
            </div>
        </div>
        <div id="Right-Main"> 
            <form method="post" action="opinie-podsumowanie.php">
                <label for="imie">Imie:</label>
                <input type="text" name="imie">
                <label for="email">Email:</label>
                <input type="email" name="email">
                <label for="opinia">Twoja opinia:</label> 
                <input type="text" name="opinia">
                <label for="ocena">Ocena:</label>
                <select name="ocena">
                    <option value="1">1 ★</option>
                    <option value="2">2 ★</option>
                    <option value="3">3 ★</option>
                    <option value="4">4 ★</option>
                    <option value="5" selected="selected">5 ★</option>
                </select>
                <button type="submit" name="button" onclick="wysylanie()">Wyślij</button>
                </form>
                <hr>
                <h1>Opinie innych <span id="l_opini"></span> użytkowników!</h1>
                <p>Średnia ocen: <span id="avg"></span></p>
                <form method="post">
                <select name='sortowanie'>
                    <option value="imie asc">Imie (rosnąco)</option>
                    <option value="imie desc">Imie (malejąco)</option>
                    <option value="ocena asc">Ocena (rosnąco)</option>
                    <option value="ocena desc" selected="selected">Ocena (malejąco)</option>
                </select>
                <input type="submit"  value="Sortuj">
                    </form>
                    <hr>
                <div id="opinie">
                <?php
                
                $host = 'localhost';
                $user = 'root'; 
                $pass='';
                $baza = 'btk';
                $ocena="";
                $suma = 0;
                $l_opini=0;
                @$sortowanie = $_POST['sortowanie'];
                $polacz=mysqli_connect($host,$user,$pass,$baza);
                if(isset($_POST['sortowanie'])){
                $wynik = mysqli_query($polacz, "SELECT * FROM opinie order by $sortowanie");
                } else $wynik = mysqli_query($polacz, "SELECT * FROM opinie order by ocena desc");
                echo "<table>";
                while ($r = mysqli_fetch_array($wynik)){
                    for($i=0; $i <= $r['ocena']-2; $i++){
                        $ocena.=" ★";
                    }
                    $suma+=$r['ocena'];
                    echo "<tr>";
                    echo "<td>".$r['imie']."</td>";
                    echo "<td>".$r['opinia']."</td>";
                    echo "<td>".$ocena." ★</td>";
                    echo "</tr>";

                    $ocena="";
                    $l_opini++;

                };
                echo "</table>";
                $avg = $suma/$l_opini;
                mysqli_close($polacz);

                ?>
                <script>
                document.getElementById("l_opini").innerHTML=<?php echo $l_opini ?>;
                document.getElementById("avg").innerHTML=(<?php echo $avg ?>).toFixed(2);
                </script>
                </div>
            
                
        </div>
    </main>
    <footer>
            Copyright &copy; Olaf Kubin 4i ZSE
    </footer>


</body>
</html>