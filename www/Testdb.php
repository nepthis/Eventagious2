<?php
 include "database.php";

 $UserId = 1;
 $sth = $db->prepare('SELECT name
    FROM User
    WHERE UserID = :UserId');
 $sth->bindParam(':UserId',$UserId, PDO::PARAM_INT);

 $sth->execute();

 echo "test av db";


 foreach($sth as $row) {
 	echo 'row';
 	print_r($row);
 }
 echo "Klart!";



 ?>