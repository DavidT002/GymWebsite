<?php
/////////////////////////////
define("db_SERVER", "localhost:3306");//define is used to declare constants
define("db_USER","root");
define("db_PASSWORD","");
define("db_DBNAME", "gymdb");
$con = mysqli_connect(db_SERVER,db_USER,db_PASSWORD,db_DBNAME);
if (!$con){ 
 echo '<script type="text/javascript">
 alert("Error connecting the server '. mysqli_connect_error(). '<
 /script>';
} 
?>