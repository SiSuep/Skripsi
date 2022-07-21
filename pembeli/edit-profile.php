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
     <link rel="stylesheet" href="edit-profile.css">
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
        <div class="tombol-1"><a href="profil.php"><button>KEMBALI</button></a></div>
        <h1>EDIT</h1>
        <h2>PROFIL</h2>
    </div>
     <div class="bawah">
        <form action="edit-profile.php" method="POST" enctype="multipart/form-data" name="POST">
        <table>
            <input type="text" hidden="" value="<?php echo $id_saya; ?>" name="id_user">
            <div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Nama :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Lengkap" name="nama" value="<?php echo $data['nama']?>"></p>
        </div>
        <div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Alamat :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat Lengkap" name="alamat" value="<?php echo $data['alamat']?>"></p>
        </div>
        <div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Telepon :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nomor Telepon" name="telepon" value="<?php echo $data['telepon']?>"></p>
        </div>
         <div class="mb-3">
               <p><label for="formGroupExampleInput" class="form-label">foto :</label></p>
                <p><input type="file" accept=".jpeg,.jpg,.png" name="file" class="form-control" type="file" id="formFile">
                    <input type="hidden" name="foto2" value="<?php echo $data['foto']?>">
                    <img width="40px" src="../gambar/<?php echo $data['foto']?>"><?php echo $data['foto']?>
            </p>
            </div>
            <div class="col-auto">
        <input type="hidden" name="jabatan2" value="<?php echo $data['jabatan']?>">
        </div>
        <div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Username :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="username" value="<?php echo $data['username']?>"></p>
        </div>
        <div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Password :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Password" name="password"value="<?php echo $data['password']?>"></p>
        </div>
                <p><div class="tombol-2"><input type="submit" name="Submit" value="EDIT"></div></p>
    </table>
</form>
        </div>
            </div>

            <?php

    if(isset($_POST['Submit'])) 
    {
         $id_user = $_POST['id_user'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $jabatan = $_POST['jabatan'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hidden1 = $_POST['foto2'];
        $hidden2 = $_POST['jabatan2'];

         $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);  


if($ukuran < 1044070){     
    if (!empty($filename)){ 
        $xx = $rand.'_'.$filename;
        move_uploaded_file($temp, '../gambar/'.$xx);
        mysqli_query($koneksi, "UPDATE dt_user SET id_user='$id_user', nama='$nama', alamat='$alamat', telepon='$telepon', jabatan='$jabatan',  username='$username', password='$password', foto='$xx' WHERE id_user='$id_user'");
        header("location:profil.php?alert=berhasil");
        }elseif(empty($filename)){
            move_uploaded_file($temp, '../gambar/'.$hidden1);
             mysqli_query($koneksi, "UPDATE dt_user SET id_user='$id_user', nama='$nama', alamat='$alamat', telepon='$telepon', jabatan='$hidden2',  username='$username', password='$password', foto='$hidden1' WHERE id_user='$id_user'");
        ob_clean();

        ob_flush();
        header("location:profil.php?alert=berhasil");
        }
    }else{
        header("location:profil.php?alert=gagak_ukuran");
    }
        echo "<a href='profil.php'></a>";
    }
?>
        </section>
</body>
</html>