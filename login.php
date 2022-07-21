<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="login.css">
	<?php require_once 'header.php'; ?>
</head>
<body>
<section id="tampilan-1">
<div class="login">
	<div class="login-kiri"></div>
	<div class="login-kanan">
		<div class="login-box">
			<img src="gambar/logo-login.jpg">
					<h1>SILAHKAN LOGIN</h1>
					<h2>Masukkan username dan password kalian</h2>
					<form  action="" method="POST">
  					<div class="mb-3">
    				<label for="exampleInputEmail1" class="form-label text-light">USERNAME</label>
    				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user">
  					</div>
  					<div class="mb-3">
   					<label for="exampleInputPassword1" class="form-label text-light">PASSWORD</label>
   					<input type="password" class="form-control" id="exampleInputPassword1" name="pass">
    				<div id="emailHelp" class="form-text text-light">Jangan bagikan password kepada siapapun</div>
  					</div>
 					 <button type="submit" class="btn btn-warning text-light" name="submit">LOGIN</button>
					</form>
<?php 
				if(isset($_POST['submit'])){
					session_start();
					include 'koneksi.php';

					$user = $_POST['user'];
					$pass = $_POST['pass'];

					$cek = mysqli_query($koneksi, "SELECT * FROM dt_user WHERE username = '".$user."' AND password = '".($pass)."' ");
					if(mysqli_num_rows($cek) > 0){
						$d = mysqli_fetch_object($cek);
						$_SESSION['status_login'] = true;
						$_SESSION['user_global'] = $d;
						$_SESSION['id_user'] = $d->id_user;
						if ($d->jabatan=='owner')
						{
							echo '<script>window.location="owner/home.php"</script>';
						}
						else if ($d->jabatan=='barista')
						{
							echo '<script>window.location="barista/home.php"</script>';
						}
						else if ($d->jabatan=='pembeli')
						{
							echo '<script>window.location="pembeli/home.php"</script>';
						}
					}

					else {
						echo '<script>alert("Username atau Password Anda Salah!!")</script>';
					}
				}
				?>
				<p>Belum punya akun silahkan daftar<a href="daftar.php" class="text-decoration-none font-weight-bolder"> Disini</a></p>
  				<p><a href="home.php" class="text-decoration-none font-weight-bolder">Kembali ke Home</a></p>
		</div>
	</div>
</div>
</section>
</body>
</html>