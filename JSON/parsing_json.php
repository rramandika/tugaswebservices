<?php
//koneksi 
$connection = new PDO("mysql:host=localhost;dbname=db_xml_json", 'root', '');

if (isset($_POST['buttonImport'])) {
    copy($_FILES['jsonfile']['tmp_name'], '/' . $_FILES['jsonfile']['name']);
    $data = file_get_contents('/' . $_FILES['jsonfile']['name']);
    $products = json_decode($data);
    foreach ($products as $data_json) {
        $stmt = $connection->prepare("INSERT INTO data_json(nama, alamat, umur) values (:nama, :alamat, :umur)");
        $stmt->bindValue('nama', $data_json->nama);
        $stmt->bindValue('alamat', $data_json->alamat);
        $stmt->bindValue('umur', $data_json->umur);
        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parsing</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        File JSON <input type="file" name="jsonfile"><br>
        <input type="submit" value="Import" name="buttonImport">
    </form>
</body>

</html>