<?php
   session_start();
   env_variables:
   # Replace project, instance, database, user and password with the values obtained
   # when configuring your Cloud SQL instance.
 
   // Create connection
   $conn = new mysqli(null, "root", 'root123', "DATABASE", null, "/cloudsql/mysql"));

   // Check connection
   if ($conn->connect_error) {
       echo "Connected failed";
       die("Connection failed: " . $conn->connect_error);
   } 
   echo "Connected successfully";
?>