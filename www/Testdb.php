<?php

 $dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject';
 $user = 'root';
 $pass = '';

 echo "test av db innan";
 $db = new PDO($dsn,$user,$pass);
 echo "test av db";
 $res = ($db -> query("SELECT 1337"));
 print_r($res);

echo 'hej';

 for($res as $row) {
 	echo 'row';
 	print_r($row);
 }

 echo 'hopp';

 ?>