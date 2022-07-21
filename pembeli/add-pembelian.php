<?php 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }
ob_start();
 ?>
<?php include_once("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambah Pembelian</title>
  <link rel="stylesheet" href="add-pembelian.css">
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

            <?php require_once 'cart.php'; ?>
            
         <table class="table-conten">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col"></th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Harga</th>
            <th scope="col">Pembelian</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>

          <?php
           $query = mysqli_query($koneksi, "SELECT * FROM dt_menu");
          $no = 1;
          while ($ds = $query->fetch_assoc()) :
            ?>

            <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
              <input type="hidden" name="id_menu" value="<?= $ds['id_menu']; ?>"></input>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><img src="../gambar/<?php echo $ds['foto'] ?>" width="100" height="120"></td>
                <td><?= $ds['nama_produk']; ?></td>
                <td><?= $ds['harga']; ?></td>
                <td width="106">
                  <input class="form-control form-control-sm" type="number" name="pembelian" value="1" min="1" max="10"></td>
                  <td>
                    <button class="btn btn-primary btn-sm" type="submit" name="submit">
                      <i class="fa fa-shopping-cart"></i>
                    </button>
                  </td>
                </tr>
              </form>

            <?php endwhile; ?>

          </tbody>
        </table>
        <div class="tombol-1">
        <a href="data-pembelian.php">
            <input type="submit" name="" value="KEMBALI"></a>
        </div>
        </section>
</body>
</html>