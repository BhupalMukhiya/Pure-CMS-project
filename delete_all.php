<?php
//Config

$server="localhost";
$user="root";
$password="";
$database= "address_book";

//Establising a connection to MYSQL  server
$connection=mysqli_connect($server, $user, $password, $database);

//check connection
if(!$connection) {
    die("<h2>Total Fail</h2>" . mysqli_connect_error());

} else{
    echo "Connection is Successfull <br>";
}

//sql command 
$sql_command="TRUNCATE TABLE people";

if(mysqli_query($connection,$sql_command)){
    echo "SQL Command OK";
} else {
      echo" SQL Error " . mysqli_error($connection);
}


?>