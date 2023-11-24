<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona logowania</title>
</head>
<body>
<div class="contener">
<form action="login.php" method="post"> 
    <h5>Podaj login</h5>
    <input id="login" type="text" name="login" /> 
    <h5>Podaj hasło</h5>
    <input id="haslo" type="password" name="password" /> 
    <button class="button-85" role="button" type="submit">Zaloguj się</button>
    <?php 
$servername = "localhost";
$username = "admin";
$password = "test";
$database = "Mariadb";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submitted'])) {
    $query = "SELECT * FROM users WHERE login='" . mysqli_real_escape_string($conn, $_POST['login']) . "' AND haslo='" . mysqli_real_escape_string($conn, $_POST['password']) . "'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {
        session_start();
        $_SESSION["isLogged"] = "1";
        header('Location: ../https://www.youtube.com/watch?v=dQw4w9WgXcQ');
        exit();
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
$conn->close();
?>
<style>
*
{
margin:0;
padding:0;
}
.contener
{
position: absolute;
height: 759px;
width: 100%;
background: rgb(2,0,36);
background: linear-gradient(36deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 27%, rgba(0,212,255,1) 100%);
}
form
{
margin-left: 35%;
margin-top: 18%;
height: 25%;
width:25%;
background-color: chartreuse;
border-radius: 25px;
}
h5
{
font-family:"verdana" ;
margin-top:1.3%;
position: absolute;
}
#login
{
margin-top: 5%;
position: relative;
margin-left:26%;
}
#haslo
{
margin-top:5%;
position: relative;
margin-left: 26%;
}
.button-85 {
    padding: 0.6em 2em;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
    margin-left: 32.5%;
    margin-top: 20%;
    }
/*animacje do buttona*/
.button-85:before
{
    content: "";
    background: linear-gradient(
        45deg,
            #ff0000,
            #ff7300,
            #fffb00,
            #48ff00,
            #00ffd5,
            #002bff,
            #7a00ff,
            #ff00c8,
            #ff0000
        );
    
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    -webkit-filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing-button-85 20s linear infinite;
    transition: opacity 0.3s ease-in-out;
    border-radius: 10px;
}

@keyframes glowing-button-85 
{
0%  {
        background-position: 0 0;
    }
50% {
        background-position: 400% 0;
    }
100%{
        background-position: 0 0;
    }
}
.button-85:after {
    z-index: -1;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: #222;
    left: 0;
    top: 0;
    border-radius: 10px;
}
</style>
  </form>
</div>
</body>
</html>



