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

function jsonOut($status, $message, $data) {
    $respon = ["status" => $status, "message" => $message, "data" => $data];

    header("Content-type: application/json");
    echo json_encode($respon);
}

function getData() {   
        include 'conn.php';
        $sql = "select * from produk";
        $koneksi = mysqli_query($conn, $sql);

        while ($data = mysqli_fetch_array($koneksi)){
            $datanya[]=array(
                'id' => $data['id'],
                'nama' => $data['nama'],
                'kategori' => $data['kategori'],
                'harga' => $data['harga']
            );
        }
    return $datanya;
}

if (isValid($_GET)) {
    jsonOut("Success", "Api Key Valid", getData());
} else {
    jsonOut("Not Success", "Api Key Not Valid", null);
}

?>