<!DOCTYPE html>
<html>
<head>
	<title>DETAIL PRODUK</title>
	<link rel="stylesheet" href="detail-produk.css">
	 <?php require_once 'header.php'; ?>
</head>
<body>
<?php 
	include_once("koneksi.php");
	?>

	<?php 
	$produk = mysqli_query($koneksi, "SELECT * FROM dt_menu WHERE id_menu = '".$_GET['id_menu']."' ");
	$p = mysqli_fetch_object($produk);
	?>
<section id="tampilan-1">
	<div class="navbar">
		<img src="gambar/logo-nav.png" class="logo">
		<ul>
			<li><a href="home.php">HOME</a></li>
			<li><a href="menu.php">MENU</a></li>
			<li><a href="about.php">ABOUT</a></li>
			<li><a href="login.php"><input type="submit" name="" value="MASUK"></a></li>
		</ul>
	</div>
	<div class="detail">
		<div class="detail-kiri"><img src="gambar/<?php echo $p->foto ?>"></div>
		<div class="detail-kanan">
			<div class="kanan-judul">
				<h1>DETAIL PRODUK</h1>
			</div>
			<div class="kanan-isi">
				<h1><?php echo $p->nama_produk ?></h1>
				<h2>Harga : Rp <?php echo $p->harga ?></h2>
				<span class="garis-1"></span>
				<h3>INFORMASI PRODUK :</h3>
				<h4><?php echo $p->keterangan ?></h4>
				<a href="home.php"><input type="submit" name="" value="HOME"></a><a href="menu.php"><input type="submit" name="" value="MENU"></a>
			</div>
		</div>
	</div>
</section>
</body>
</html>