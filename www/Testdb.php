<?php
 include "database.php";
 /*$dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject';
 $user = 'root';
 $pass = 'root123';

 echo "test av db innan";
 $db = new PDO($dsn,$user,$pass);*/
 $UserId = 1;
 $sth = $db->prepare('SELECT name
    FROM User
    WHERE UserID = :?');
 $sth->bindParam(1, $UserId), PDO::PARAM_INT);
 //$sth->execute(array(':UserID' => $UserId));
 $sth->execute();

 echo "test av db";
 //$res = ($db -> query("SELECT Name  FROM User WHERE UserID=1"));
 //print_r($res);

 foreach($sth as $row) {
 	echo 'row';
 	print_r($row);
 }
 echo "Klart!";



 ?>