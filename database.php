<?php 

$host = "localhost";
$user = "root";
$password = "";
$database = "city_tour";
$conn = mysqli_connect($host,$user,$password,$database);

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
   
    $data = [];

    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }

    return $data;
}

?>