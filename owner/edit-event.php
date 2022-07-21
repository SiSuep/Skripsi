<?php
 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }

 ob_start();
include_once("koneksi.php");
    $id_event = $_GET["id_event"];
    $ambildata = mysqli_query($koneksi, "SELECT * FROM dt_event WHERE id_event = '$id_event'");
    $data = mysqli_fetch_array($ambildata)

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="edit-event.css">
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
        <h1>EDIT</h1>
        <h2>DATA EVENT</h2>
    </div>
     <div class="bawah">
        <form action="edit-event.php" method="POST" enctype="multipart/form-data" name="POST">
        <table>
            <input type="text" hidden="" value="<?php echo $_GET['id_event']; ?>" name="id_event">
        	<div class="form-group"> 
                <p><label for="formGroupExampleInput" class="form-label">Tema :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tema Event" name="tema" value="<?php echo $data['tema']?>"></p>
        </div>
            <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Tanggal :</label></p>
                <p><input type="date" class="form-control" id="formGroupExampleInput" name="tanggal" value="<?php echo $data['tanggal']?>">
                </p>
        </div>
        <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Jam :</label></p>
                <p><input type="time" class="form-control" id="formGroupExampleInput" name="jam" value="<?php echo $data['jam']?>">
                </p>
        </div>
                <div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">Pelaksana :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Pelaksana" name="pelaksana" value="<?php echo $data['pelaksana']?>"></p>
        </div>
            	<div class="mb-3">
                <p><label for="formGroupExampleInput" class="form-label">keterangan :</label></p>
                <p><input type="text" class="form-control" id="formGroupExampleInput" placeholder="Keterangan Event" name="keterangan" value="<?php echo $data['keterangan']?>"></p>
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
       $id_event = $_POST['id_event'];
        $tema = $_POST['tema'];
        $tanggal = $_POST['tanggal'];
        $jam = $_POST['jam'];
        $pelaksana = $_POST['pelaksana'];
        $keterangan = $_POST['keterangan'];
        $hidden = $_POST['foto2'];

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
        mysqli_query($koneksi, "UPDATE dt_event SET id_event='$id_event', tema='$tema', tanggal='$tanggal', jam='$jam', pelaksana='$pelaksana',  keterangan='$keterangan', foto='$xx' WHERE id_event='$id_event'");
        header("location:data-event.php?alert=berhasil");
    }elseif(empty($filename)){
        move_uploaded_file($temp, '../gambar/'.$hidden);
        mysqli_query($koneksi, "UPDATE dt_event SET id_event='$id_event', tema='$tema', tanggal='$tanggal', jam='$jam', pelaksana='$pelaksana',  keterangan='$keterangan', foto='$hidden' WHERE id_event='$id_event'");
         ob_clean();

        ob_flush();
        header("location:data-event.php?alert=berhasil");
    }
    }else{
        header("location:data-event.php?alert=gagak_ukuran");
    }
        echo "User added successfully.<a href='data-event.php'>View Users</a>";
    }
?>
			
</section>
</body>
</html>