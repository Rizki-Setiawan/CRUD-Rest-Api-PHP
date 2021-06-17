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

function deleteData() {   
        include 'conn.php';
        $id = addslashes(htmlentities($_POST['id']));
        $getdata = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
        $rows = mysqli_num_rows($getdata);
        $sql = "DELETE FROM produk WHERE id = '$id'";;
        $koneksi = mysqli_query($conn, $sql);
}

if (isValid($_GET)) {
    jsonOut("Success", "Delete Data Succes", deleteData());
} else {
    jsonOut("Not Success", "Delete Data Not Success");
}

?>