<?php
include 'navigation.php';

$name= isset( $_POST['name'] )? $_POST['name'] : '';
$lastname= isset( $_POST['lastname'] )? $_POST['lastname'] : '';
$telephone= isset( $_POST['telephone'] )? $_POST['telephone'] : '';
$email= isset( $_POST['email'] )? $_POST['email'] : '';
$address= isset( $_POST['address'] )? $_POST['address'] : '';
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
if(isset($_POST['submit'])){
        $sql_command="INSERT INTO people(id, name, lastname, telephone, email, address) 
    values (NULL, '$name', '$lastname', '$telephone', '$email', '$address')";

    //check sql commands
    if(mysqli_query($connection, $sql_command)){
        echo "SQL Command ok";
    } else {
        echo "SQL ERROR " . mysqli_error($connection);
    }
}


//get report on delete page
$get_all="SELECT * FROM people";
$action= mysqli_query($connection, $get_all);


echo "<h1>Results:  </h1>";
echo "<table width='80%' cellspan='2' border='2'><tr bgcolor='yellow'>";
echo "<td>Name</td>";
echo "<td>Lastname</td>";
echo "<td>Telephone</td>";
echo "<td>Email</td>";
echo "<td>Address</td></tr>";

while ($line= mysqli_fetch_assoc($action)){
   echo "<tr><td>" . $line["id"] ."</td>
   <td>" . $line["name"] ." </td>
   <td>" . $line["lastname"] ." </td>
   <td>" . $line["telephone"] ." </td>
   <td>" . $line["email"] ." </td>
   <td>" . $line["address"] . "</tr>";
} 
echo"</table>";


?>