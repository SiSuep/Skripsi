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
    <title>Tambah Event</title>
    <link rel="stylesheet" href="add-event.css">
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
        <div class="tombol-1"><a href="data-event.php"><button>KEMBALI</button></a></div>
        <h1>TAMBAH</h1>
        <h2>DATA EVENT</h2>
    </div>
     <div class="bawah">
        <form action="add-event.php" method="post" enctype="multipart/form-data" name="form1">
        <table>
        	<div class="mb-3"> 
                <p><label for="formGroupExampleInput" class="form-label">Tema :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tema Event" name="tema"></p>
        </div>
            <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Tanggal :</label></p>
                <p><input type="date" class="form-control" id="formGroupExampleInput" name="tanggal">
                </p>
        </div>
        <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Jam :</label></p>
                <p><input type="time" class="form-control" id="formGroupExampleInput" name="jam">
                </p>
        </div>
                <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Pelaksana :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pelaksana" name="pelaksana"></p>
        </div>
            	 <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">keterangan :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Keterangan Event" name="keterangan"></p>
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
        $tema = $_POST['tema'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $pelaksana = $_POST['pelaksana'];
        $keterangan = $_POST['keterangan'];

        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($ukuran < 1044070){      
        $xx = $rand.'_'.$filename;
        move_uploaded_file($temp, '../gambar/'.$xx);
        mysqli_query($koneksi, "INSERT INTO dt_event (tema, tanggal, jam, pelaksana, keterangan, foto) VALUES ('$tema', '$tanggal', '$jam', '$pelaksana', '$keterangan', '$xx');");
            ob_clean();

        ob_flush();
        header("location:data-event.php?alert=berhasil");
    }else{
        header("location:data-event.php?alert=gagak_ukuran");
    }
        echo "User added successfully.<a href='data-event.php'>View Users</a>";
    }
    ?>
        </section>
</body>
</html>