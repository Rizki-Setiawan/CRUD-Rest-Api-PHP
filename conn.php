<?php	
	$conn = mysqli_connect("localhost","root","","187006101_tugasws");
	if (mysqli_connect_errno()){
		echo "Koneksi database gagal : " . mysqli_connect_error();
	} else{
		echo "Koneksi database berhasil";
	}
?>