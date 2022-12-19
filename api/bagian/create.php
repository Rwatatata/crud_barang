<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../../database/database.php";

$data = json_decode(file_get_contents("php://input"));
$barcode = $data->barcode;
$nama = $data->nama_barang;
$satuan = $data->satuan;
$harga_pokok = $data->harga_pokok;
$stok = $data->stok;


$hasil["success"] = false;
$hasil["data"] = array();

$insert_sql = "INSERT INTO barang VALUES ('$barcode','$nama_barang','$satuan','$harga_pokok','$stok')";
$result = mysqli_query($connection,$insert_sql);
if($result){
    $hasil["success"] = true;
    $hasil["data"] = $data;
}

echo json_encode($hasil);

?>