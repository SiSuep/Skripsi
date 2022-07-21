<!DOCTYPE html>
<html>
<head>
	<title>DAFTAR</title>
	<link rel="stylesheet" href="daftar.css">
	<?php require_once 'header.php'; ?>
</head>
<body>
<section id="tampilan-1">
<div class="daftar">
    <?php include_once("koneksi.php"); ?>
	<div class="daftar-kiri">
		<h1>SILAKAN DAFTAR</h1>
		<form action="daftar.php" method="post" enctype="multipart/form-data" name="form1">
            <table>
  		<div class="form-group"> 
                <label for="formGroupExampleInput" class="form-label">NAMA :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Nama Lengkap" name="nama">
        </div>
        <div class="form-group"> 
                <label for="formGroupExampleInput" class="form-label">ALAMAT :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Alamat Lengkap" name="alamat">
        </div>
        <div class="form-group"> 
                <label for="formGroupExampleInput" class="form-label">TELEPON :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Nomor Telepon" name="telepon">
        </div>
         <div class="form-group">
               <label for="formGroupExampleInput" class="form-label">FOTO :</label>
                <input type="file" accept=".jpeg,.jpg,.png" name="file" class="form-control form-control-sm" type="file" id="formFile">
            </div>
                <input type="hidden" name="jabatan" value="pembeli">
        <div class="form-group"> 
                <label for="formGroupExampleInput" class="form-label">USERNAME :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Username" name="username">
        </div>
        <div class="form-group"> 
                <label for="formGroupExampleInput" class="form-label">PASSWORD :</label>
                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="Password" name="password">
        </div>
  				<button type="submit" class="btn btn-warning text-light" name="Submit">DAFTAR</button>
            </table>
</form>
 				<p>Sudah punya akun ? Silahkan kembali ke<a href="login.php" class="text-decoration-none font-weight-bolder"> Login</a></p>
 				<?php

    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $jabatan = $_POST['jabatan'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        
         $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($ukuran < 1044070){      
        $xx = $rand.'_'.$filename;
        move_uploaded_file($temp, 'gambar/'.$xx);
        mysqli_query($koneksi, "INSERT INTO dt_user (nama, alamat, telepon, foto, jabatan, username, password) VALUES ('$nama', '$alamat', '$telepon', '$xx', '$jabatan', '$username', '$password');");
        ob_clean();

        ob_flush();
        header("location:login.php?alert=berhasil");

    }else{
        header("location:login.php?alert=gagak_ukuran");

    }
     echo "<a href='login.php'></a>";
    }
    ?>
	</div>
	<div class="daftar-kanan"></div>
</div>
</section>
</body>
</html>