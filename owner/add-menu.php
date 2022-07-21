<?php 
 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }

    ob_start();

    
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah Menu</title>
	<link rel="stylesheet" href="add-menu.css">
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
        <h1>TAMBAH</h1>
        <h2>DATA MENU</h2>
    </div>
     <div class="bawah">
        <form action="add-menu.php" method="post" enctype="multipart/form-data" name="form1">
        <table>
        	<div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Nama :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Menu" name="nama_produk"></p>
        </div>
            <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Harga :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Harga Menu" name="harga"></p>
        </div>
                <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">keterangan :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Informasi Menu" name="keterangan"></p>
        </div>
                 <div class="col-auto">
                <p><label for="formGroupExampleInput" class="form-label">Tipe Menu :</label></p>
                <p> <select class="form-select" id="autoSizingSelect" name="tipe">
                    <option selected>Pilih Tipe Menu</option>
                <option value="makanan">makanan</option>
                <option value="minuman coffee">minuman Coffee</option>
                <option value="minuman non coffee">minuman Non Coffee</option>
            </select></p>
        </div>
         <div class="mb-3">
               <p><label for="formGroupExampleInput" class="form-label">foto :</label></p>
                <p><input type="file" accept=".jpeg,.jpg,.png" name="file" class="form-control" type="file" id="formFile"></p>
            </div>
                <p><div class="tombol-2"><input type="submit" name="Submit" value="TAMBAH"></div></p>
    </table>
</form>
        </div>
            </div>

            <?php

    if(isset($_POST['Submit'])) {
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $tipe = $_POST['tipe'];

        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($ukuran < 1044070){      
        $xx = $rand.'_'.$filename;
        move_uploaded_file($temp, '../gambar/'.$xx);
        mysqli_query($koneksi, "INSERT INTO dt_menu (nama_produk, harga, keterangan, tipe, foto) VALUES ('$nama_produk', '$harga', '$keterangan', '$tipe', '$xx');");
         ob_clean();

        ob_flush();
        header("location:data-menu.php?alert=berhasil");
    }else{
        header("location:data-menu.php?alert=gagak_ukuran");
    }
        echo "User added successfully.<a href='data-menu.php'>View Users</a>";
    }
    ?>
        </section>
</body>
</html>