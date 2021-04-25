<?php

//koneksi 
$connection = mysqli_connect("localhost", "root", "", "db_xml_json") or die("Error " . mysqli_error($connection));

$file = simplexml_load_file("databaru.xml");

$i = 1;
echo 'Data baru :<br />';
foreach ($file as $key => $value) {
    echo $i . "<br />";
    echo "nama : " . $value->nama . "<br />";
    echo "alamat : " . $value->alamat . "<br />";
    echo "umur : " . $value->umur . "<br /><br />";
    $sql = "INSERT into data_xml(nama,alamat,umur) VALUES('" . $value->nama . "','" . $value->alamat . "','" . $value->umur . "')";
    mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));
    $i++;
}
//tutup koneksi ke database
mysqli_close($connection);
