<?php 
	session_start();
	if($_SESSION['status_login'] != true){
	echo '<script>window.location="../login.php"</script>';
	}
?>
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
	<div class="detail">
		<div class="detail-kiri"><img src="../gambar/<?php echo $p->foto ?>"></div>
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