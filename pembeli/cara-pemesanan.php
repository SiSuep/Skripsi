<?php 
  session_start();
  if($_SESSION['status_login'] != true){
  echo '<script>window.location="../login.php"</script>';
  }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cara Pemesanan</title>
	<link rel="stylesheet" href="cara-pemesanan.css">
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
</section>
    <section id="tampilan-2">
      <div class="tata-cara">
        <div class="kiri-cara">
          <div class="kiri-atas">
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan1.png">
                <h1>1. DAFTAR AKUN</h1>
                <h2>Lakukan Pendaftaran jika kalian belum memiliki akun dengan mengisi beberapa form informasi kalian</h2>
              </div>
            </div>
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan2.png">
                <h1>2. LOGIN AKUN</h1>
                <h2>Lakukan login pada akun anda dengan menginputkan ussername dan password yang sebelumnya sudah anda daftarkan</h2>
              </div>
            </div>
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan3.png">
                <h1>3. MENU PEMBELIAN</h1>
                <h2>Masuk ke menu pembelian pada menu di atas yaitu pada pemesanan dan beli produk</h2>
              </div>
            </div>
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan4.png">
                <h1>4. PILIH MENU</h1>
                <h2>Pilih menu makanan dan minuman yang anda inginkan</h2>
              </div>
            </div>
          </div>
          <div class="kiri-bawah">
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan5.png">
                <h1>5. MASUKKAN ALAMAT</h1>
                <h2>Setelah memilih menu yang diinginkan selanjutkan masukkan alamat yang akan di antarkan setelah itu tekan cekout</h2>
              </div>
            </div>
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan6.png">
                <h1>6. PILIH PEMBAYARAN</h1>
                <h2>Setelah menginputkan menu dan alamat selanjutkan pilih metode pembayaran yang diinginkan</h2>
              </div>
            </div>
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan7.png">
                <h1>7. UPLOAD PEMBAYARAN</h1>
                <h2>screenshot bukti pembayaran dan upload ke data pembelian yang baru saja anda pesan</h2>
              </div>
            </div>
            <div class="isi-cara">
              <div class="cara-kotak">
                <img src="../gambar/cara-pesan8.png">
                <h1>8. PESAN DIANTARKAN</h1>
                <h2>Barista akan memproses menu yang anda pesan dan akan mengantarkannya segera</h2>
              </div>
            </div>
          </div>
        </div>
        <div class="kanan-cara">
          <div class="isi-persyaratan">
            <h1>PERSYARATAN PEMBELIAN !!</h1>
              <h3>1. Hanya berlaku pada daerah sidoarjo pusat atau berjarak maksimal 30km dari toko</h3>
              <h3>2. Pembelian tidak bisa dibatalkan bila sudah melakukan pembayaran </h3>
              <h3>3. Bila terjadi masalah silakan hubungi nomer kami</h3>
              <h3>4. Batas pembelian setiap menu adalah 10</h3>
          </div>
        </div>
      </div>
</body>
</html>