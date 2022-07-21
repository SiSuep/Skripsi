<?php 
 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }

    ob_start();
include_once("koneksi.php");
    $id_menu = $_GET["id_menu"];
    $ambildata = mysqli_query($koneksi, "SELECT * FROM dt_menu WHERE id_menu = '$id_menu'");
    $data = mysqli_fetch_array($ambildata)
    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Menu</title>
	<link rel="stylesheet" href="edit-menu.css">
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
        <div class="tombol-1"><a href="data-menu.php"><button>KEMBALI</button></a></div>
        <h1>EDIT</h1>
        <h2>DATA MENU</h2>
    </div>
     <div class="bawah">
        <form action="edit-menu.php" method="POST" enctype="multipart/form-data" name="POST">
        <table>
            <input type="text" hidden="" value="<?php echo $_GET['id_menu']; ?>" name="id_menu">
        	<div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Nama :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Menu" name="nama_produk" value="<?php echo $data['nama_produk']?>"></p>
        </div>
            <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Harga :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Harga Menu" name="harga" value="<?php echo $data['harga']?>"></p>
        </div>
                <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">keterangan :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Informasi Menu" name="keterangan" value="<?php echo $data['keterangan']?>"></p>
        </div>
                 <div class="col-auto">
                <p><label for="formGroupExampleInput" class="form-label">Tipe Menu :</label></p>
                <p> <select class="form-select" id="autoSizingSelect" name="tipe" >
                    <option selected>Pilih Tipe Menu</option>
                <option value="makanan">makanan</option>
                <option value="minuman coffee">minuman Coffee</option>
                <option value="minuman non coffee">minuman Non Coffee</option>
            </select>
         <input type="hidden" name="tipe2" value="<?php echo $data['tipe']?>"></p>
        </div>
         <div class="mb-3">
            <p><label for="formGroupExampleInput" class="form-label">foto :</label></p>
             <p><input type="file" accept=".jpeg,.jpg,.png" name="file" class="form-control" type="file" id="formFile">
                    <input type="hidden" name="foto2" value="<?php echo $data['foto']?>">
                    <img width="40px" src="../gambar/<?php echo $data['foto']?>"><?php echo $data['foto']?>
            </p>
            </div>
                <p><div class="tombol-2"><input type="submit" name="Submit" value="EDIT"></div></p>
    </table>
</form>
        </div>
            </div>

            <?php

    if(isset($_POST['Submit']))
     {
        $id_menu = $_POST['id_menu'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $tipe = $_POST['tipe'];
        $hidden1 = $_POST['foto2'];
        $hidden2 = $_POST['tipe2'];

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
        mysqli_query($koneksi, "UPDATE dt_menu SET id_menu='$id_menu', nama_produk='$nama_produk', harga='$harga', keterangan='$keterangan', tipe='$tipe', foto='$xx' WHERE id_menu='$id_menu'");
        header("location:data-menu.php?alert=berhasil");
      }elseif(empty($filename)){
             move_uploaded_file($temp, '../gambar/'.$hidden1);
             mysqli_query($koneksi, "UPDATE dt_menu SET id_menu='$id_menu', nama_produk='$nama_produk', harga='$harga', keterangan='$keterangan', tipe='$hidden2', foto='$hidden1' WHERE id_menu='$id_menu'");
        header("location:data-menu.php?alert=berhasil");
    }
    }else{
        header("location:data-menu.php?alert=gagak_ukuran");
    }
        echo "User added successfully.<a href='data-menu.php'>View Users</a>";
    }
?>
        </section>
</body>
</html>