<?php

Header('Content-type: text/xml');
//koneksi 
$connection = mysqli_connect("localhost", "root", "", "db_xml_json") or die("Error " . mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');

//table data_xml
$sql = "select * from data_xml";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//array
while ($row = mysqli_fetch_assoc($result)) {

    $track = $xml->addChild('id');
    $track->addChild('nama', $row['nama']);
    $track->addChild('alamat', $row['alamat']);
    $track->addChild('umur', $row['umur']);
}

print($xml->asXML());
//tutup koneksi ke database
mysqli_close($connection);
