<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="home.css">
	 <?php require_once 'header.php'; ?>
</head>
<body>
	<?php include_once("koneksi.php"); ?>
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
	<div class="home">
		<div class="teks-besar"> Selamat Datang</div>
		<div class="teks-kecil"><p><a style="color: #e37401">-------</a> di web informasi cafe .SATUKOPI kami <a style="color: #e37401">-------</a></p></div>
		<div class="garis"> <span class="garis-1"></span><br> </div>
	</div>
</section>
<section id="tampilan-2">
	<div class="kualitas">
		<div class="kiri"><h1>KUALITAS</h1>
			<p>Memberikan produk berkualitas untuk semua pelanggan dengan memberikan menu menu terbaik kami yang dapat memanjakan diri anda</p></div>
		<div class="kanan"></div>
	</div>
	<div class="kenyamanan">
		<div class="kiri"></div>
		<div class="kanan"><h1>KENYAMANAN</h1>
			<p>Memberikan kenyamanan kepada pelanggan dengan pelayanan yang terbaik dan menambah kegiatan-kegiatan yang dapat menghibur anda </p></div>
	</div>
</section>
<section id="tampilan-3">
	<div class="hiasan">
		<div class="box">
		<img src="gambar/iconhome2.png">
		<h1>Makanan Ringan</h1>
		<p>Menyediakan berbagai jenis makanan ringan dengan harga yang bersahabat dan kualitas yang bagus sehingga dapat memberikan kenyamanan ke pelanggan</p>
	</div>

	<div class="box">
		<img src="gambar/iconhome1.png">
		<h1>Minuman Coffee</h1>
		<p>Menyediakan berbagai jenis minuman coffee dengan berbagai jenis biji kopi pula yang kami kombinasikan sehingga memberikan rasa yang pas</p>
	</div>

	<div class="box">
		<img src="gambar/iconhome3.png">
		<h1>Minuman Non Coffee</h1>
		<p>Menyediakan berbagai minuman non coffee yang kami racik dan memberikan kombinasi rasa yang pas dan menyegarkan untuk pelanggan</p>
	</div>
	</div>
	<div class="judul">
		<div class="teks-judul">MENU TERBARU</div>
	</div>
	<div class="menu">
		<?php
			$produk = mysqli_query($koneksi, "SELECT * FROM dt_menu ORDER BY id_menu DESC LIMIT 5");
			if(mysqli_num_rows($produk) > 0){
				while ($p = mysqli_fetch_array($produk)) {
		?>
		<a href="detail-produk.php?id_menu=<?php echo $p['id_menu']?>" >
		<div class="menu-box">
			<div class="gambar">
			<div class="box-new"><img src="gambar/iconhome4.png"></div>
			<img src="gambar/<?php echo $p['foto'] ?>">
			</div>
		<div class="harga">
			<h1><?php echo $p['nama_produk'] ?></h1>
			<h2>Rp <?php echo $p['harga'] ?></h2>
		</div>
		</div>
	</a>
	<?php }}else{ ?>
			<p>Produk Tidak Ada</p>
			<?php } ?>
	</div>
</section>
<section id="tampilan-4">
	<div class="event">
		<?php
			$event = mysqli_query($koneksi, "SELECT* FROM dt_event ORDER BY id_event DESC limit 1");
			if(mysqli_num_rows($event) > 0){
				while ($e = mysqli_fetch_array($event)) {
		?>
		<div class="event-kiri">
			<div class="event-atas">
				<div class="judul-atas">
					<h1>KEGIATAN EVENT</h1>
					<h2>CAFE .SATUKOPI</h2>
				</div>
				<div class="judul-bawah">
					<h1>Informasi kegiatan yang akan diadakan di cafe titik satukopi untuk menghibur anda, di buka untuk umum dan untuk semua kalangan. Ayo datang dan ramaikan kegiatan tersebut</h1>
				</div>
			</div>
			<div class="event-bawah">
				<div class="box-e-atas">
					<div class="col-a-kiri">
						<div class="event-tema">
							<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-boombox-fill" viewBox="0 0 16 16">
  							<path d="M14.5.5a.5.5 0 0 0-1 0V2H1a1 1 0 0 0-1 1v2h16V3a1 1 0 0 0-1-1h-.5V.5ZM2.5 4a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm7.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm1.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm-7-1h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm-2 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm.5-1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm6.5 1.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm0-1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
  							<path d="M16 6H0v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V6ZM4.5 13a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Zm7 0a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/>
							</svg>
							<h1>NAMA :</h1>
							<h2><?php echo $e['tema'] ?></h2>
						</div>
					</div>
					<div class="col-a-kanan">
						<div class="event-waktu">
							<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
  							<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
							</svg>
							<h1>TANGGAL/JAM :</h1>
							<h2><?php echo $e['tanggal'] ?> Jam <?php echo $e['jam'] ?> WIB</h2>
						</div>
					</div>
				</div>
				<div class="box-e-bawah">
					<div class="col-b-kiri">
						<div class="event-pelaksana">
							<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
  							<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
							</svg>
							<h1>PELAKSANA :</h1>
							<h2><?php echo $e['pelaksana'] ?></h2>
						</div>
					</div>
					<div class="col-b-kanan">
						<div class="event-informasi">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-info-square-fill" viewBox="0 0 16 16">
  							<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
							</svg>
							<h1>INFORMASI :</h1>
							<h2><?php echo $e['keterangan'] ?></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="event-kanan">
			<img src="gambar/<?php echo $e['foto'] ?>">
			<?php }}else{ ?>
			<p>Event Tidak Ada</p>
			<?php } ?>
		</div>
	</div>
</section>
</body>
</html>