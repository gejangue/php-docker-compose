<?php
$host = 'db';  //the name of the mysql service inside the docker file.
$user = 'devuser';
$password = 'devpass';
$db = 'test_db';
$conn = new mysqli($host,$user,$password,$db);

$query = $conn->prepare("SELECT * FROM buecher");
var_dump($query);
$query->execute();
echo "<ol>";
while($book = $query->fetch()){
    //var_dump($book);
    echo "<li>".$book['titel'] . "</li><br>";
}
echo "</ol>";
?>
<footer>
    <p><a href="insert.php">Neues Buch</a> <a href="mysqlconnect.php">Buchliste</a></p>
</footer>
?>