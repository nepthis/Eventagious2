<?php
 $dsn = 'mysql:unix_socket=/cloudsql/eventagious3:us-central1:mysql;dbname=EventagiousProject'
 $user = 'root'
 $pass = ''

 $db = new PDO($dsn,$user,$pass);

 $res = $db -> query("SELECT 1337");
 echo $res;

 ?>