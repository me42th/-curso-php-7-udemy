<?php
$con = new PDO("mysql:dbname=goat_coin;host=localhost","root","root");

$stmt = $con->prepare("SELECT * FROM transac");
$stmt->execute();
echo($con->connection_status);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row)
    foreach($row as $key => $value)
        echo "<strong>$key: </strong> $value <br>"
?>