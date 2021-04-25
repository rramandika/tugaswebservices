<?php

header("Content-type:application/json");

//koneksi 
$connection = mysqli_connect("localhost", "root", "", "db_xml_json") or die("Error " . mysqli_error($connection));

//table data_json
$sql = "select * from data_json";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//array
while ($row = mysqli_fetch_assoc($result)) {
    $ArrData[] = $row;
}

echo json_encode($ArrData, JSON_PRETTY_PRINT);

//tutup koneksi 
mysqli_close($connection);
