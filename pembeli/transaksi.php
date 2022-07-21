<?php
session_start();

require_once 'koneksi.php';

$alamat= $_POST['alamat'];
$kelas= $_POST['kelas'];
$kategori= $_POST['kategori'];
$id_user = $_SESSION['user_global']->id_user;
$nama = $_SESSION['user_global']->nama;

if (!isset($_SESSION['cart'])) {
 header('Location: add-pembelian.php');
}

$cart = unserialize(serialize($_SESSION['cart']));
$total_menu = 0;
$total_bayar = 0;


for ($i=0; $i<count($cart); $i++) { 
 $total_menu += $cart[$i]['pembelian'];
 $total_bayar += $cart[$i]['pembelian'] * $cart[$i]['harga'];
 if ($i==count($cart)-1)
 {
 	if ($kategori=="umum") {
 		$total_bayar=$total_bayar+10000;
 	}else{
 		$total_bayar=$total_bayar+5000;
 	}
 }
}
// proses penyimpanan data
if ($kategori=="umum") {
	$query = mysqli_query($koneksi, "INSERT INTO dt_pembelian (nama, id_user, alamat, kategori, total_menu, total_bayar, waktu, kondisi, status) VALUES ('$nama', '$id_user', '$alamat', '$kategori', '$total_menu', '$total_bayar', '" . date('Y-m-d H:i') . "','Belum bayar','0')");
}else{
	$query = mysqli_query($koneksi, "INSERT INTO dt_pembelian (nama, id_user, kelas, kategori, total_menu, total_bayar, waktu, kondisi, status) VALUES ('$nama', '$id_user', '$kelas', '$kategori', '$total_menu', '$total_bayar', '" . date('Y-m-d H:i') . "','Belum bayar','0')");
}


$id_pembelian = mysqli_insert_id($koneksi);

for ($i=0; $i<count($cart); $i++) { 
 $id_menu = $cart[$i]['id_menu'];
 $pembelian = $cart[$i]['pembelian'];

 $query = mysqli_query($koneksi, "INSERT INTO dt_detail_pembelian (id_pembelian, id_menu, pembelian) VALUES ('$id_pembelian', '$id_menu', '$pembelian')");
}

// unset session
unset($_SESSION['cart']);
$_SESSION['pesan'] = "Pembelian sedang diproses, terimakasih.";
header('Location: data-pembelian.php');