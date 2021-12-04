<?php
include 'navigation.php';

echo '
<form action="update_all_script.php" method="post">
<label>Update ID: </label><br>
<input type="text" name="id">
<br><br>

<label>Name</label><br>
<input type="text" name="name">
<br><br>

<label>Last Name</label><br>
<input type="text" name="lastname">
<br><br>

<label>Telephone</label><br>
<input type="text" name="telephone">
<br><br>

<label>Email</label><br>
<input type="text" name="email">
<br><br>

<label>Address</label><br>
<input type="text" name="address">
<br><br>

<input type="submit" value="Submit">

</form> ';

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