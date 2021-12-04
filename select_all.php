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
$sql_command="SELECT * FROM people";
$action= mysqli_query($connection, $sql_command);

/*while ($line= mysqli_fetch_assoc($action)){
    echo "ID:" . $line["id"] . "<br>";
    echo "Name:" . $line["name"] . "<br>";
    echo "Lastname:" . $line["lastname"] . "<br>";
    echo "Telephone:" . $line["telephone"] . "<br>";
    echo "Email:" . $line["email"] . "<br>";
    echo "Address:" . $line["address"] . "<br>";
    echo "Date/Time:" . $line["meta"] . "<br>";
    echo"<hr>";
}
*/
echo "<h1>Results:  </h1>";
while ($line= mysqli_fetch_assoc($action)){
   echo "ID:" . $line["id"] .
    " Name:" . $line["name"] .
    " Lastname:" . $line["lastname"] .
    " Telephone:" . $line["telephone"] .
    " Email:" . $line["email"] .
    " Address:" . $line["address"] .
    " Date/Time:" . $line["meta"]
     . "<hr>";
}



?>