<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$kd_barang = $data->kd_barang;
$nama_barang = $data->nama_barang;
$satuan = $data->satuan;
$harga_barang = $data->harga_barang;

$hasil["success"] = false;
$hasil["data"] = array();

$update_sql = "UPDATE barang SET nama_barang='($nama_barang)', satuan='($satuan)', harga_barang='($harga_barang)' WHERE kd_barang{$kd_barang}";
$result = mysqli_query($connection,$update_sql);
if($result){
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);
