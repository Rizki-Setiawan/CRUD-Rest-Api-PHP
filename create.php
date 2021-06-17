<?php

function getKey() {
    return ["apikey1234", "apikey5678", "myapikey"];
}

function isValid($input) {
    $apikey = $input["api_key"];
    if (in_array($apikey, getKey())) {
        return true;
    } else {
        return false;
    }
}

function jsonOut($status, $message) {
    $respon = ["status" => $status, "message" => $message];

    header("Content-type: application/json");
    echo json_encode($respon);
}

function inputData() {   
        include 'conn.php';
        $id = addslashes(htmlentities($_POST['id']));
		$nama = addslashes(htmlentities($_POST['nama']));
		$kategori = addslashes(htmlentities($_POST['kategori']));
		$harga = addslashes(htmlentities($_POST['harga']));
        $sql = "INSERT INTO produk(id,nama,kategori,harga) VALUES ('$id','$nama','$kategori','$harga')";
        $koneksi = mysqli_query($conn, $sql);
}

if (isValid($_GET)) {
    jsonOut("Success", "Input Data Succes", inputData());
} else {
    jsonOut("Not Success", "Input Data Not Success");
}

?>