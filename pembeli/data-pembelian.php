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
	<link rel="stylesheet" href="data-pembelian.css">
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
        <div class="atas">
        <h1>INFORMASI</h1>
        <h2>PEMBELIAN ANDA</h2>
    </div>
            <?php 
        if(isset($_GET['alert'])){
            if($_GET['alert']=='gagal_ekstensi'){
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                    Ekstensi Tidak Diperbolehkan
                </div>                              
                <?php
            }elseif($_GET['alert']=="gagal_ukuran"){
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> Peringatan !</h4>
                    Ukuran File terlalu Besar
                </div>                              
                <?php
            }elseif($_GET['alert']=="berhasil"){
                ?>
                <div class="alert alert-success alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> Success</h4>
                    Berhasil Disimpan
                </div>                              
                <?php
            }
        }
        ?>
        <div class="tombol-1">
        <a href="add-pembelian.php">
            <button type="submit" name="" value="">PESAN MENU</button></a>
            <a href="scan.php">
            <button type="submit" name="" value="">SCAN PEMBAYARAN</button></a>
        </div>
         <table class="table-conten">
  <thead>
   <tr>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Kelas</th>
    <th>Kategori</th>
    <th>Waktu</th>
    <th>Total Menu</th>
    <th>Total Bayar</th>
    <th>Foto</th>
    <th>Kondisi</th>
    <th>Aksi</th>
   </tr>
  </thead>
  <tbody>

    <?php
     //pagingnya
        $batas = 10;
        $id_saya = $_SESSION['user_global']->id_user;
        $qjum = mysqli_query($koneksi,"SELECT * FROM dt_pembelian WHERE id_user = $id_saya ORDER BY id_pembelian");
        $jum = mysqli_num_rows($qjum);
        $halaman = ceil($jum/$batas);
        $page = (isset($_GET['page'])) ? $_GET["page"]:1;
        $posisi =($page - 1) * $batas;
        
//batas paging
        //$data dapet tambahan LIMIT $posisi,$batas
   $query = mysqli_query($koneksi, "SELECT * FROM dt_pembelian WHERE id_user = $id_saya LIMIT $posisi,$batas");
   $no = 1;
   while ($d = $query->fetch_assoc()) :
    ?>
                <tr>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['kelas']; ?></td>
                    <td><?php echo $d['kategori']; ?></td>
                    <td><?php echo $d['waktu']; ?></td>
                    <td><?php echo $d['total_menu']; ?></td>
                    <td><?php echo $d['total_bayar']; ?></td>
                    <?php
                    if($d['status']=="1" || $d['status']=="2"){
                    ?> <td><img src="../gambar/<?php echo $d['foto'] ?>" width="35" height="40"></td> <?php
                    }else{ ?>
                    <td><a href="upload-bukti.php?id_pembelian=<?= $d['id_pembelian']; ?>"><button>Upload</button></a></td>
                    <?php
                    }
                    ?>
                    <td><?php echo $d['kondisi']; ?></td>
      <td><a href="detail-data-pembelian.php?id_pembelian=<?= $d['id_pembelian']; ?>">Detail Pembelian</a></td>
    </tr>
    <?php endwhile; ?>
  </tbody>
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
        </section>
</body>
</html>