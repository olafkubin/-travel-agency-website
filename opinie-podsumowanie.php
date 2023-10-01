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
            <?php   
                    $host = 'localhost';
                    $user = 'root'; 
                    $pass='';
                    $baza = 'btk';
                        if(!empty($_POST['imie'])&&!empty($_POST['email'])&&!empty($_POST['opinia'])&&!empty($_POST['ocena'])){
                            $polacz=mysqli_connect($host,$user,$pass,$baza);  
                            $imie=$_POST['imie'];
                            $email=$_POST['email'];
                            $opinia = $_POST['opinia'];
                            $ocena = $_POST['ocena'];
                            mysqli_query($polacz,"INSERT INTO opinie VALUES ('$imie','$email','$opinia','$ocena');");
                            mysqli_close($polacz);

                            echo("<h1>Dziękujemy za Twoją opinię!</h1>");
                            echo("<button class='opinie-button' onclick='history.go(-1)'>Powrót do opini</button>'");

                        } else {
                            print"<p>Nie podano dancyh</p>";
                            echo("<button class='opinie-button' onclick='history.go(-1)'>Powrót do opini</button>'");
                        }
                        ?>  
                </div>
            
                
        </div>
    </main>
    <footer>
            Copyright &copy; Olaf Kubin 4i ZSE
    </footer>


</body>
</html>