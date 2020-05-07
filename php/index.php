<!DOCTYPE html>
<!--Datei index.php-->
<html>
<head>
<title>Hello world </title>
<meta charset ="utf-8" />
</head>
<body>
<h1>Hello Word: apache/php </h1>
<h2> Willkomen auf die Seite<h2>
<?php
$load = sys_getloadavg(); ?>
Serverzeit: <?php echo date("c"); ?> <br />
Serverauslastung (load): <?php echo $load[0]; ?>

<br>
<?php
$host = 'db';  //the name of the mysql service inside the docker file.
$user = 'devuser';
$password = 'devpass';
$db = 'test_db';
$conn = new mysqli($host,$user,$password,$db);
 if($conn->connect_error){
  echo 'connection failed'. $conn->connect_error;
 }
 echo '<br>'
echo 'successfully connected to MYSQL';

//$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);

if(count($_POST) > 0):
    if( !strlen($_POST['titel']) > 0
        || !strlen($_POST['autor']) > 0
        || !strlen($_POST['seiten']) > 0
        || !strlen($_POST['isbn']) > 0
    ){
        echo "Nicht alle Werte eingegeben! <br>";
        echo "NICHT GESPEICHERT!";
    }else{
        $sql = "INSERT INTO buecher "
            ."(titel, autor, seiten, isbn) VALUES "
            ."(:titel, :autor, :seiten, :isbn)";
        
        $query = $conn->prepare($sql);
        $query->bindParam(':titel', $_POST['titel'], PDO::PARAM_STR);
        $query->bindParam(':autor', $_POST['autor'], PDO::PARAM_STR);
        $query->bindParam(':seiten', $_POST['seiten'], PDO::PARAM_INT);
        $query->bindParam(':isbn', $_POST['isbn'], PDO::PARAM_STR);
        $query->execute();
        
        if($conn->lastInsertId()){
            echo "Gespeichert!";
        }
    }

endif;

?>

<h1>Ein Buch erfassen:</h1>

<form method="POST">
<p>
     <input type="text" name="titel" size="50" placeholder="Buchtitel">
</p>

<p>
     <input type="text" name="autor" size="50" placeholder="Autor">
</p>

<p>
     <input type="text" name="seiten" size="5" placeholder="Seitenanzahl">
</p>

<p>
     <input type="text" name="isbn" size="20" placeholder="ISBN">
</p>

<p>
    <input type="submit" value="Speichern">
</p>
</form>
<footer>
    <p><a href="insert.php">Neues Buch</a> <a href="mysqlconnect.php">Buchliste</a></p>
</footer>

</body>
</html>
