<?php
   $host = "localhost";//caso esteja usando o xampp ou wamp
   $user = "root";
   $pass = "L0t1s4!@#";
   $db = "tecnologia";
   $conn = mysql_connect($host, $user, $pass) or die (mysql_error());
   
   @mysql_select_db($db);
   
   ?>