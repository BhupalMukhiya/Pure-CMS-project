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
$sql_command="INSERT INTO people(id, name, lastname, telephone, email, address) 
values (NULL, 'Bhupal', 'Mukhiya', 7772222, 'bhupal@gmail.com', 'Mattahi')";


//check sql commands
if(mysqli_multi_query($connection, $sql_command)){
    $last_entry=mysqli_insert_id($connection);
    echo "SQL Command ok, Last ID: ". $last_entry. "<hr>";
} else {
    echo "SQL ERROR " . mysqli_error($connection);
}


?>