<?php 
	session_start();
	if($_SESSION['status_login'] != true){
	echo '<script>window.location="../login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ABOUT</title>
	<link rel="stylesheet" href="about.css">
	 <?php require_once 'header.php'; ?>
</head>
<body>
	<?php include_once("koneksi.php"); ?>
<section id="tampilan-1">
	<div class="navbar">
		<div class="navbar-kiri">
			<img src="../gambar/logo-nav.png">
		</div>
		<div class="navbar-tengah">
			<ul>
			<li><a href="home.php">Home</a></li>
      		<li><a href="menu.php">Menu</a></li>
     		<li><a href="about.php">About</a></li>
			<li class="dropdown"><a href="#.php">Pemesanan</a>
				<ul class="isi-dropdown">
					<li><a href="data-pembelian.php">Beli Produk</a></li>
                    <li><a href="cara-pemesanan.php">Cara Pemesanan</a></li>
			 </ul>
		</ul>
	</li>
</ul>
		</div>
		<div class="navbar-kanan">
			<div class="nav-k-kiri">
				<div class="kiri-foto">
					<img src="../gambar/<?php echo $_SESSION['user_global']->foto ?>">
				</div>
			</div>
			<div class="nav-k-kanan">
				<ul>
					<li class="dropdown"><a href="profil.php"><?php echo $_SESSION['user_global']->nama ?></a>
					<ul class="isi-dropdown">
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</li>
		</ul>
			</div>
		</div>
	</div>
	<div class="about-judul">
		<div class="judul-kiri">
			<div class="kiri-atas">
				<h1>TENTANG KAMI</h1>
				<h3>Memberikan informasi tentang kami mulai dari lokasi, jam buka, dan informasi lebih detail tentang kami sehingga pelanggan lebih mudah dalam mengunjungi lokasi kami</h3>
			</div>
			<div class="kiri-bawah"></div>
		</div>
		<div class="judul-kanan">
			<div class="kanan-atas">
				<div class="atas-kiri"></div>
				<div class="atas-kanan"></div>
			</div>
			<div class="kanan-bawah">
				<div class="bawah-kiri">
					<h1>.SATU KOPI</h1>
				</div>
				<div class="bawah-kanan"></div>
			</div>
		</div>
	</div>
	<div class="about-isi">
		<div class="isi-kiri">
			<div class="isi-background"></div>
		</div>
		<div class="isi-kanan">
			<div class="isi-keterangan">
				<h3>INFORMASI KAMI</h3>
				<h1>Alamat :</h1>
				<h2>Jl. Jenggolo No. 1B Bedrek Siwalanpanji Kecamatan Buduran Kabupaten Sidoarjo Provinsi Jawa Timur</h2>
				<h1>Jam Buka :</h1>
				<h2>10.00 - 23.00 WIB (Close Order 22.00 WIB) </h2>
				<h1>Keterangan :</h1>
				<h2>Kafe Titik Satu Kopi yang berada di Jl. Jenggolo No. 1B Bedrek Siwalanpanji Kecamatan Buduran Kabupaten Sidoarjo Provinsi Jawa Timur. Di Kafe Titik Satu Kopi terdapat banyak sekali menu yang ada mulai dari makanan ringan dan minuman yang dibuat dari beberapa jenis kopi yaitu robusta dan arabica yang memiliki beberapa karakter. Tidak hanya kopi, terdapat jenis minuman lain yang berkaitan dengan susu dan cokelat seperti choco cheese dan banana killer. Makanannya pun juga beragam mulai dari kentang goreng, donat, kue coklat dan lain sebagainya.</h2>
			</div>
		</div>
	</div>
</section>
</body>
</html>