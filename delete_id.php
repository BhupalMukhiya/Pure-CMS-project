<?php
include 'navigation.php';

$get_id_to_delete= $_POST["id_to_delete"];
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
$sql_command="DELETE FROM people where  id = $get_id_to_delete";

if(mysqli_query($connection,$sql_command)){
    echo "SQL Command OK";
} else {
      echo" SQL Error " . mysqli_error($connection);
}

//get report on delete page
$get_all="SELECT * FROM people";
$action= mysqli_query($connection, $get_all);


echo "<h1>Results:  </h1>";
echo "<table width='80%' cellspan='2' border='2'><tr bgcolor='yellow'>";
echo "<td>ID</td>";
echo "<td>Name</td>";
echo "<td>Lastname</td>";
echo "<td>Telephone</td>";
echo "<td>Email</td>";
echo "<td>Address</td>";
echo "<td>Date/Time</td></tr>";

while ($line= mysqli_fetch_assoc($action)){
   echo "<tr><td>" . $line["id"] ."</td>
   <td>" . $line["name"] ." </td>
   <td>" . $line["lastname"] ." </td>
   <td>" . $line["telephone"] ." </td>
   <td>" . $line["email"] ." </td>
   <td>" . $line["address"] ." </td> 
   <td>" . $line["meta"]. "</tr>";
} 
echo"</table>";



?>