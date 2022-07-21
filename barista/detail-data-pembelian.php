<?php
session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }
    
if (!isset($_GET['id_pembelian'])) {
  header('Location: data-pembelian.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Pembelian</title>
    <link rel="stylesheet" href="detail-data-pembelian.css">
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
</section>
<section id="tampilan-2">
    <div class="container-1">
        <div class="atas">
        <h1>INFORMASI</h1>
        <h2>DETAIL DATA PEMBELIAN</h2>
    </div>
    <?php 
        if(isset($_GET['alert'])){
            if($_GET['alert']=='gagal_ekstensi'){
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                    Ekstensi Tidak Diperbolehkan
                </div>                              
                <?php
            }elseif($_GET['alert']=="gagal_ukuran"){
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Peringatan !</h4>
                    Ukuran File terlalu Besar
                </div>                              
                <?php
            }elseif($_GET['alert']=="berhasil"){
                ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Success</h4>
                    Berhasil Disimpan
                </div>                              
                <?php
            }
        }
        ?>
        <table class="table-conten">
            <thead>
                <tr>
                <th>#</th>
                 <th>Nama Produk</th>
                 <th>Harga</th>
                 <th>Pembelian</th>
                </tr>
            </thead>
            <tbody>
               <?php
    $query = mysqli_query($koneksi, "SELECT * FROM `dt_detail_pembelian` INNER JOIN dt_menu ON dt_detail_pembelian.id_menu = dt_menu.id_menu WHERE id_pembelian = '$_GET[id_pembelian]'");
    $no = 1;

    while($detail = $query->fetch_assoc()) :
    ?>
                <tr>
                    <td align="center"><?= $no++; ?></td>
                <td><?= $detail['nama_produk']; ?></td>
                <td><?= $detail['harga']; ?></td>
                <td align="center"><?= $detail['pembelian']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="tombol-1">
        <a href="data-pembelian.php">
           <button>KEMBALI</button></a>
        </div>
        </div>
        </section>
</body>
</html>