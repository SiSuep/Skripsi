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
    <title>Data Pembelian</title>
    <link rel="stylesheet" href="scan.css">
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
    <div class="container-1">
        <div class="kiri">
            <div class="box-1">
                <h1>SCAN DISINI</h1>
                 <h3>NMID : ID1020052827901</h3>
                <img src="../gambar/scan-ovo.jpg">
                 <h2>OVO</h2>
            </div>
        </div>
        <div class="kanan">
            <div class="box-1">
                 <h1>SCAN DISINI</h1>
                <h3>NMID : ID10200527543337</h3>
                <img src="../gambar/scan-linkaja.jpg">
                 <h2>LinkAja</h2>     
            </div>
        </div>
    </div>
</section>
<section id="tampilan-3">
    <div class="tombol-1">
        <a href="data-pembelian.php">
            <button type="submit" name="" value="">KEMBALI</button></a>
        </div>
</section>