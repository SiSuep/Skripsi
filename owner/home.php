<?php 
	session_start();
	if($_SESSION['status_login'] != true){
	echo '<script>window.location="../login.php"</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home Owner</title>
	<link rel="stylesheet" href="home.css">
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
			<li class="dropdown"><a href="#.php">Data</a>
				<ul class="isi-dropdown">
					<li><a href="data-menu.php">Data Menu</a></li>
					<li><a href="data-user.php">Data User</a></li>
					<li><a href="data-event.php">Data Event</a></li>
					<li><a href="data-pembelian.php">Data Pembelian</a></li>
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
	<div class="home">
		<div class="isi-home">
			<div class="home-kiri">
				<div class="event">
					<div class="event-atas">
						<div class="event-judul">
							<?php
							$total_event = mysqli_query($koneksi, " SELECT * FROM dt_event");
							$eventt1 = mysqli_num_rows($total_event);
							?>
							<h1>TOTAL KEGIATAN</h1>
							<h2>CAFE .SATUKOPI</h2>
							<h3><?=$eventt1;?></h3>
						</div>
					</div>
					<div class="event-bawah">
						<div class="kegiatan-judul">
							<h1>KEGIATAN TERAKHIR</h1>
						</div>
						<div class="kegiatan-isi">
							<?php
										$event = mysqli_query($koneksi, "SELECT* FROM dt_event ORDER BY id_event DESC limit 1");
										if(mysqli_num_rows($event) > 0){
										while ($e = mysqli_fetch_array($event)) {
										?>
							<div class="tema">
								<div class="tema-isi">
									<div class="tema-kiri">
										<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-boombox-fill" viewBox="0 0 16 16">
  										<path d="M14.5.5a.5.5 0 0 0-1 0V2H1a1 1 0 0 0-1 1v2h16V3a1 1 0 0 0-1-1h-.5V.5ZM2.5 4a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm7.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm1.5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1Zm-7-1h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1Zm-2 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm.5-1.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Zm6.5 1.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm0-1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Z"/>
  										<path d="M16 6H0v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V6ZM4.5 13a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Zm7 0a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z"/>
										</svg>
									</div>
									<div class="tema-kanan">
										<h1>TEMA :</h1>
										<h2><?php echo $e['tema'] ?></h2>
									</div>
								</div>
							</div>
							<div class="waktu">
								<div class="waktu-isi">
									<div class="waktu-kiri">
										<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-calendar2-week-fill" viewBox="0 0 16 16">
  										<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zM8.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM3 10.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
										</svg>
									</div>
									<div class="waktu-kanan">
										<h1>WAKTU :</h1>
										<h2><?php echo $e['tanggal'] ?> Jam <?php echo $e['jam'] ?> WIB</h2>
									</div>
								</div>
							</div>
							<div class="pelaksana">
								<div class="pelaksana-isi">
									<div class="pelaksana-kiri">
										<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
  										<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z"/>
										</svg>
									</div>
									<div class="pelaksana-kanan">
										<h1>PELAKSANA :</h1>
										<h2><?php echo $e['pelaksana'] ?></h2>
									</div>
								</div>
							</div>
							<div class="keterangan">
								<div class="keterangan-isi">
									<div class="keterangan-kiri">
										<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-info-square-fill" viewBox="0 0 16 16">
  										<path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
										</svg>
									</div>
									<div class="keterangan-kanan">
										<h1>INFORMASI :</h1>
										<h2><?php echo $e['keterangan'] ?></h2>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<?php }}else{ ?>
			<p>Event Tidak Ada</p>
			<?php } ?>
			</div>
			<div class="home-kanan">
				<div class="kanan-atas">
					<div class="selamat-datang">
						<div class="selamat-kiri">
							<img src="../gambar/selamat-datang.png">
						</div>
						<div class="selamat-kanan">
							<h1>HALLO..</h1>
							<h2>SELAMAT DATANG</h2>
							<h3><?php echo $_SESSION['user_global']->nama ?> DI WEB ADMIN OWNER .SATUKOPI</h3>
						</div>
					</div>
				</div>
				<div class="kanan-tengah">
					<div class="tengah-kiri">
						<div class="box-a-kiri">
							<div class="makanan">
								<div class="makanan-atas">
									<img src="../gambar/icon-home-admin2.png">
								</div>
								<div class="makanan-bawah">
									<?php
							$makanan = mysqli_query($koneksi, " SELECT * FROM dt_menu WHERE tipe = 'makanan' ");
							$total4 = mysqli_num_rows($makanan);
							?>
							<h1>TOTAL MENU</h1>
							<h2>MAKANAN</h2>
							<h3><?=$total4;?></h3>
								</div>
							</div>
						</div>
						<div class="box-a-kanan">
							<div class="non-coffee">
								<div class="non-coffee-atas">
									<img src="../gambar/icon-home-admin3.png">
								</div>
								<div class="non-coffee-bawah">
								<?php
							$menu_non_coffee = mysqli_query($koneksi, " SELECT * FROM dt_menu WHERE tipe = 'minuman non coffee' ");
							$total2 = mysqli_num_rows($menu_non_coffee);
							?>
							<h1>TOTAL MENU</h1>
							<h2>NON COFFEE</h2>
							<h3><?=$total2;?></h3>
								</div>
							</div>
						</div>
					</div>
					<div class="tengah-kanan">
						<div class="box-b-kiri">
							<div class="coffee">
								<div class="coffee-atas">
									<img src="../gambar/icon-home-admin1.png">
								</div>
								<div class="coffee-bawah">
							<?php
							$menu_coffee = mysqli_query($koneksi, " SELECT * FROM dt_menu WHERE tipe = 'minuman coffee' ");
							$total3 = mysqli_num_rows($menu_coffee);
							?>
							<h1>TOTAL MENU</h1>
							<h2>COFFEE</h2>
							<h3><?=$total3;?></h3>
								</div>
							</div>
						</div>
						<div class="box-b-kanan">
							<div class="total">
								<div class="total-atas">
									<img src="../gambar/icon-home-admin4.png">
								</div>
								<div class="total-bawah">
								<?php
							$total_menu = mysqli_query($koneksi, " SELECT * FROM dt_menu");
							$total1 = mysqli_num_rows($total_menu);
							?>
							<h1>TOTAL MENU</h1>
							<h2>.SATUKOPI</h2>
							<h3><?=$total1;?></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="kanan-bawah">
					<div class="bawah-kiri">
						<div class="transaksi-total">
							<?php
							$total_pembelian = mysqli_query($koneksi, " SELECT * FROM dt_pembelian");
							$pembelian1 = mysqli_num_rows($total_pembelian);
							?>
						<h1>TOTAL TRANSAKSI</h1>
						<h2>CAFE .SATUKOPI</h2>
						<h3><?=$pembelian1;?></h3>
						</div>
					</div>
					<div class="bawah-kanan">
						<div class="transaksi">
							<div class="transaksi-sudah">
								<?php
							$total_diantar = mysqli_query($koneksi, " SELECT * FROM dt_pembelian WHERE kondisi = 'Sudah Diantar' ");
							$diantar1 = mysqli_num_rows($total_diantar);
							?>
							<h1>TOTAL PESANAN</h1>
						 <h2>Sudah Terbayarkan</h2>
						 <h3><?=$diantar1;?></h3>
							</div>
							<div class="transaksi-belum">
								<?php
							$total_belum = mysqli_query($koneksi, " SELECT * FROM dt_pembelian WHERE kondisi = 'Belum Bayar' ");
							$belum1 = mysqli_num_rows($total_belum);
							?>
							<h1>TOTAL PESANAN</h1>
						 <h2>Belum Terbayarkan</h2>
						 <h3><?=$belum1;?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="tampilan-2">
	<div class="menu-terbanyak">
		<div class="terbanyak-atas">
			<div class="terbanyak-khusus">
				<?php
			$menu = mysqli_query($koneksi, "SELECT dt_menu.*, SUM(pembelian) as jumlah FROM dt_detail_pembelian inner join dt_menu on dt_detail_pembelian.id_menu=dt_menu.id_menu GROUP BY dt_detail_pembelian.id_menu ORDER BY jumlah DESC limit 4");
			if(mysqli_num_rows($menu) > 0){
				$no=1;
				while ($e = mysqli_fetch_array($menu)) {
				?>
				<div class="khusus-isi">
					<div class="khusus-box">
					<div class="khusus-kiri">
						<img src="../gambar/<?php echo $e['foto']; ?>">
					</div>
					<div class="khusus-tengah">
						<h1>PRODUK TERBANYAK #<?php echo $no++; ?></h1>
								<h2><?php echo $e['nama_produk']; ?></h2>
					</div>
					<div class="khusus-kanan">
						<h1><?php echo $e['jumlah']; ?></h1>
					</div>
					</div>
				</div>
				<?php
				} }else{
				echo "Tidak ada data";
				}
				?>
			</div>
		</div>
		<div class="terbanyak-bawah">
			<div class="terbanyak-tabel">
			<table class="table-conten">
  <thead>
   <tr>
   	<th>No</th>
    <th>Nama Menu</th>
    <th>Total Dipesan</th>
   </tr>
  </thead>
  <tbody>

  <?php
   //pagingnya
        $batas = 6;
        $qjum = mysqli_query($koneksi,"SELECT * FROM dt_detail_pembelian GROUP BY id_menu");
        $jum = mysqli_num_rows($qjum);
        $halaman = ceil($jum/$batas);
        $page = (isset($_GET['page'])) ? $_GET["page"]:1;
        $posisi =($page - 1) * $batas;
//batas paging
        //$data dapet tambahan LIMIT $posisi,$batas
			$menu = mysqli_query($koneksi, "SELECT dt_menu.*, SUM(pembelian) as jumlah FROM dt_detail_pembelian inner join dt_menu on dt_detail_pembelian.id_menu=dt_menu.id_menu GROUP BY dt_detail_pembelian.id_menu ORDER BY jumlah DESC LIMIT $posisi,$batas");
			if(mysqli_num_rows($menu) > 0){
				$no=1;
				while ($e = mysqli_fetch_array($menu)) {
				?>
                <tr>
                	<td align="center"><?= $no++; ?></td>
                    <td><?php echo $e['nama_produk']; ?></td>
                     <td><?php echo $e['jumlah']; ?></td>
    </tr>
  </tbody>
  <?php
				} }else{
				echo "Tidak ada data";
				}
				?>
 </table>
 <div class="paging">
            <?php
            for ($x=1; $x<=$halaman; $x++) {
            ?>
            <a <?php if($x==$page){echo"class ='active' ";} ?> href="?page=<?php echo $x; ?>">
                <?php echo $x; ?>
            </a> 
               <?php 
            }
            ?>
        </div>
        </div>
		</div>
	</div>
</section>
</body>
</html>