<?php 
 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }
  

    ob_start();
    include_once("koneksi.php");
   $id_saya = $_SESSION['user_global']->id_user;
    $ambildata = mysqli_query($koneksi, "SELECT * FROM dt_user WHERE id_user = $id_saya");
    $data = mysqli_fetch_array($ambildata)
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Profil</title>
     <link rel="stylesheet" href="profil.css">
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
    <div class="profile">
        <div class="profile-kiri">
             <div class="profile-foto">
                  <img src="../gambar/<?php echo $data['foto']?>">
             </div>
        </div>
        <div class="profile-kanan">
            <div class="profile-isi">
           <table>
            <fieldset disabled>
            <div class="mb-3"> 
                <label for="disabledTextInput" class="form-label">NAMA :</label>
                <input type="text" id="disabledTextInput" class="form-control form-control-sm" placeholder="Disabled input" name="nama" value="<?php echo $data['nama']?>">
        </div>
        <div class="mb-3"> 
                <label for="formGroupExampleInput" class="form-label">ALAMAT :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Alamat Lengkap" name="alamat" value="<?php echo $data['alamat']?>">
        </div>
        <div class="mb-3"> 
                <label for="formGroupExampleInput" class="form-label">TELEPON :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Nomor Telepon" name="telepon" value="<?php echo $data['telepon']?>">
        </div>
        <div class="mb-3"> 
                <label for="formGroupExampleInput" class="form-label">USERNAME :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Username" name="username" value="<?php echo $data['username']?>">
        </div>
        <div class="mb-3"> 
                <label for="formGroupExampleInput" class="form-label">PASSWORD :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Password" name="password"value="<?php echo $data['password']?>">
        </div>
         </fieldset>
    </table>
                <div class="tombol-1"><a href="edit-profile.php"><button>EDIT</button></a></div>
            </div>
        </div>
    </div>
</section>
</body>
</html>