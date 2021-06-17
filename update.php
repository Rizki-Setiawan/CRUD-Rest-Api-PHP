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

function updateData() {   
        include 'conn.php';
        $id = addslashes(htmlentities($_POST['id']));
		$nama = addslashes(htmlentities($_POST['nama']));
		$kategori = addslashes(htmlentities($_POST['kategori']));
		$harga = addslashes(htmlentities($_POST['harga']));
        $getdata = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
        $rows = mysqli_num_rows($getdata);
        $sql = "UPDATE produk SET nama='$nama',kategori='$kategori',harga='$harga' WHERE id='$id'";;
        $koneksi = mysqli_query($conn, $sql);
}

if (isValid($_GET)) {
    jsonOut("Success", "Update Data Succes", updateData());
} else {
    jsonOut("Not Success", "Update Data Not Success");
}

?>