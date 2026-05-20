<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "bpw_dzaki";

$conn = mysqli_connect($host, $user, $pass, $db);

if($conn){
    echo "koneksi berhasil";
}else{
    echo "koneksi gagal";
}