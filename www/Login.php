<?php
   session_start();
   env_variables:
   # Replace project, instance, database, user and password with the values obtained
   # when configuring your Cloud SQL instance.
   MYSQL_DSN: mysql:unix_socket=/cloudsql/mysqldatabase;dbname=DATABASE
   MYSQL_USER: root
   MYSQL_PASSWORD: 'root'
   // Create connection
   $conn = new mysqli(null, "root", 'root', "DATABASE", null, "/cloudsql/mysqldatabase"));

   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   } 
   echo "Connected successfully";
?>