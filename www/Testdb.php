<?php
 $dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject'
 $user = 'root'
 $pass = ''

 $db = new PDO($dsn,$user,$pass);
 echo "test av db";
 $res = $db -> query("SELECT 1337");
 echo $res;

 ?>