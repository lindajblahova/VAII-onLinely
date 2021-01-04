<?php

require 'db-password.inc.php';

 try {

     $connection = new PDO('mysql:host=mysql;dbname=onlinely_db', dbData[0],  dbData[1]);

     print "Connected to the database!";

 } catch (PDOException $e) {
     print "Error!: " . $e->getMessage() . "<br/>";
     die();
 }

?>
