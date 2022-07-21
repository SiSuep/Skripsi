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
    <title>Upload Bukti</title>
    <link rel="stylesheet" href="upload-bukti.css">
     <?php require_once 'header.php'; ?>
    </head>
<body>
    <section id="tampilan-2">
         <div class="container-1">
            <div class="atas">
        <div class="tombol-1"><a href="data-pembelian.php"><button>KEMBALI</button></a></div>
        <h2>UPLOAD BUKTI PEMBELIAN</h2>
    </div>
    <div class="bawah">
      <?php include_once("koneksi.php"); ?>
	  <form action="upload-bukti.php" method="post" enctype="multipart/form-data" name="form1">
	  	<table>
	  		<input type="text" hidden="" value="<?php echo $_GET['id_pembelian']; ?>" name="id">
	  		<div class="mb-3">
               <p><label for="formGroupExampleInput" class="form-label">foto :</label></p>
                <p><input type="file" accept=".jpeg,.jpg,.png" name="file" class="form-control" type="file" id="formFile"></p>
           </div>
            <div class="tombol-2"><input type="submit" name="Submit" value="UPLOAD">
	  	</table>

	  	<?php

    if(isset($_POST['Submit'])) {
    	$status = "1";
    	$id = $_POST['id'];
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = $_FILES['file']['name'];
        $ukuran = $_FILES['file']['size'];
        $temp = $_FILES['file']['tmp_name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if($ukuran < 1044070){      
        $xx = $rand.'_'.$filename;
        move_uploaded_file($temp, '../gambar/'.$xx);
        mysqli_query($koneksi, "UPDATE dt_pembelian SET status='$status', foto='$xx', kondisi='Masih Diproses' WHERE id_pembelian='$id'");
         ob_clean();

        ob_flush();
        header("location:data-pembelian.php?alert=berhasil");
    }else{
        header("location:data-pembelian.php?alert=gagak_ukuran");
    }
        echo "User added successfully.<a href='data-pembelian.php'>View Users</a>";
    }
    ?>
	</body>
	</html>