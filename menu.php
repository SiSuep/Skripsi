<!DOCTYPE html>
<html>
<head>
	<title>MENU</title>
	<link rel="stylesheet" href="menu.css">
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
	<div class="menu">
		<div class="menu-kiri">
			<h1>FOOD ZONE</h1>
			<h2>CAFE .SATUKOPI</h2>
		</div>
		<div class="menu-kanan">
			<div class="menu1">
				<div class="box-menu1"></div>
			</div>
			<div class="menu2">
				<div class="box-menu2"></div>
			</div>
			<div class="menu3">
				<div class="box-menu3"></div>
			</div>
		</div>
	</div>
</section>
<section id="tampilan-2">
	<div class="menu-makanan">
		<div class="makanan-kiri">
			<div class="wallpaper">
				<h1>MAKANAN RINGAN</h1>
				<h2>Cafe .SATUKOPI</h2>
				<img src="gambar/icon-menu-2.png">
			</div>
		</div>
		<div class="makanan-kanan">
			<div class="makanan-atas">
				<?php
			$produk = mysqli_query($koneksi, "SELECT * FROM dt_menu WHERE tipe = 'makanan' ORDER BY id_menu ");
			if(mysqli_num_rows($produk) > 0){
				$jmlMakanan=mysqli_num_rows($produk);
				while ($p = mysqli_fetch_array($produk)) {
		?>
		<a href="detail-produk.php?id_menu=<?php echo $p['id_menu']?>" >
		<div class="box_makanan">
		<div class="gambar">
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
			<div class="makanan-bawah">
				<span class="span1">&#139;</span>
				<span class="span1">&#155;</span>
			</div>
		</div>
	</div>
	<div class="menu-coffee">
		<div class="coffee-kiri">
			<div class="coffee-atas">
				<?php
			$produk = mysqli_query($koneksi, "SELECT * FROM dt_menu WHERE tipe = 'minuman coffee' ORDER BY id_menu ");
			if(mysqli_num_rows($produk) > 0){
				$jmlKopi=mysqli_num_rows($produk);
				while ($p = mysqli_fetch_array($produk)) {
		?>
		<a href="detail-produk.php?id_menu=<?php echo $p['id_menu']?>" >
		<div class="box_coffee">
		<div class="gambar">
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
			<div class="coffee-bawah">
				<span class="span2">&#139;</span>
				<span class="span2">&#155;</span>
			</div>
		</div>
		<div class="coffee-kanan">
			<div class="wallpaper">
				<h1>MINUMAN COFFEE</h1>
				<h2>Cafe .SATUKOPI</h2>
				<img src="gambar/icon-menu-3.png">
			</div>
		</div>
	</div>
</section>
<section id="tampilan-3">
	<div class="menu-noncoffee">
		<div class="noncoffee-kiri">
			<div class="wallpaper">
				<h1>MINUMAN NON COFFEE</h1>
				<h2>Cafe .SATUKOPI</h2>
				<img src="gambar/icon-menu-1.png">
			</div>
		</div>
		<div class="noncoffee-kanan">
			<div class="noncoffee-atas">
				<?php
			$produk = mysqli_query($koneksi, "SELECT * FROM dt_menu WHERE tipe = 'minuman non coffee' ORDER BY id_menu ");
			if(mysqli_num_rows($produk) > 0){
				$jmlNonCoffee=mysqli_num_rows($produk);
				while ($p = mysqli_fetch_array($produk)) {
		?>
		<a href="detail-produk.php?id_menu=<?php echo $p['id_menu']?>" >
		<div class="box_noncoffee">
		<div class="gambar">
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
			<div class="noncoffee-bawah">
				<span class="span3">&#139;</span>
				<span class="span3">&#155;</span>
			</div>
		</div>
	</div>
</section>
<script>
	let span1 = document.getElementsByClassName('span1');
	let box_makanan = document.getElementsByClassName('box_makanan')
	let box_makanan_page = Math.ceil(box_makanan.length/4);
	let a = 0;
	let movePer1 = 200;
	let maxMove1 = 0;
	var x = "<?php echo"$jmlMakanan"?>";
	if (x<4) {
		maxMove1 = 0;
	}
	else if(x%2!=0){
		maxMove1 = (x-4)*100+100;
	}
	else {
		maxMove2 = (x-4)*100;
	}

	let right_mover1 = ()=>{
		a = a + movePer1;
		if (box_makanan == 1){a = 0; }
		for(const i of box_makanan)
		{
			if (a > maxMove1){a = a - movePer1;}
			i.style.left = '-' + a + '%';
		}

	}
	let left_mover1 = ()=>{
		a = a - movePer1;
		if (a<=0){a = 0;}
		for(const i of box_makanan){
			if (box_makanan_page>1){
				i.style.left = '-' + a + '%';
			}
		}
	}
	span1[1].onclick = ()=>{right_mover1();}
	span1[0].onclick = ()=>{left_mover1();}

	let span2 = document.getElementsByClassName('span2');
	let box_coffee = document.getElementsByClassName('box_coffee')
	let box_coffee_page = Math.ceil(box_coffee.length/4);
	let b = 0;
	let movePer2 = 200;
	let maxMove2 = 0;
	var z = "<?php echo"$jmlKopi"?>";
	if (z<4) {
		maxMove2 = 0;
	}
	else if(z%2!=0){
		maxMove2 = (z-4)*100+100;
	}
	else {
		maxMove2 = (z-4)*100;
	}

	let right_mover2 = ()=>{
		b = b + movePer2;
		if (box_coffee == 1){b = 0; }
		for(const i of box_coffee)
		{
			if (b > maxMove2){b = b - movePer2;}
			i.style.left = '-' + b + '%';
		}

	}
	let left_mover2 = ()=>{
		b = b - movePer2;
		if (b<=0){b = 0;}
		for(const i of box_coffee){
			if (box_coffee_page>1){
				i.style.left = '-' + b + '%';
			}
		}
	}
	span2[1].onclick = ()=>{right_mover2();}
	span2[0].onclick = ()=>{left_mover2();}

	let span3 = document.getElementsByClassName('span3');
	let box_noncoffee = document.getElementsByClassName('box_noncoffee')
	let box_noncoffee_page = Math.ceil(box_noncoffee.length/4);
	let c = 0;
	let movePer3 = 200;
	let maxMove3 = 0;
	var v = "<?php echo"$jmlNonCoffee"?>";
	if (v<4) {
		maxMove3 = 0;
	}
	else if(v%2!=0){
		maxMove3 = (v-4)*100+100;
	}
	else {
		maxMove3 = (v-4)*100;
	}

	let right_mover3 = ()=>{
		c = c + movePer3;
		if (box_noncoffee == 1){c = 0; }
		for(const i of box_noncoffee)
		{
			if (c > maxMove3){c = c - movePer3;}
			i.style.left = '-' + c + '%';
		}

	}
	let left_mover3 = ()=>{
		c = c - movePer3;
		if (c<=0){c = 0;}
		for(const i of box_noncoffee){
			if (box_noncoffee_page>1){
				i.style.left = '-' + c + '%';
			}
		}
	}
	span3[1].onclick = ()=>{right_mover3();}
	span3[0].onclick = ()=>{left_mover3();}
	</script>
</body>
</html>