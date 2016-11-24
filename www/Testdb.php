<?php
 include "database.php";

 $mail = "test@example.com";
 $sth = $db->prepare('SELECT username
    FROM members
    WHERE email = :mail');
 $sth->bindParam(':mail',$mail);

 $sth->execute();

 echo "test av db";


 foreach($sth as $row) {
 	echo 'row';
 	print_r($row);
 }
 echo "Klart!";



 ?>