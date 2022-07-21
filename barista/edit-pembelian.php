<?php 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Pembelian</title>
	<link rel="stylesheet" href="edit-pembelian.css">
     <?php require_once 'header.php'; ?>
	</head>
<body>
    <section id="tampilan-2">
         <div class="container-1">
            <div class="atas">
        <div class="tombol-1"><a href="data-pembelian.php"><button>KEMBALI</button></a></div>
        <h2>STATUS PEMBELIAN</h2>
    </div>
    <div class="bawah">
	  <?php include_once("koneksi.php"); ?>
	  <form action="edit-pembelian.php" method="post" enctype="multipart/form-data" name="form1">
	  	<table>
	  		<input type="text" hidden="" value="<?php echo $_GET['id_pembelian']; ?>" name="id">
	  		<div class="col-auto">
                <p><label for="formGroupExampleInput" class="form-label">Pilih Satus Pembelian :</label></p>
                <p> <select class="form-select" id="autoSizingSelect" name="kondisi">
                    <option selected>Pilih Status Pembelian</option>
                <option value="Sudah Diantar">Sudah Diantar</option>
            </select></p>
        </div>
            <div class="tombol-2"><input type="submit" name="Submit" value="UBAH">
	  	</table>

	  	<?php

    if(isset($_POST['Submit'])) {
    	$status = "2";
    	$id = $_POST['id'];
        $kondisi = $_POST['kondisi'];

        mysqli_query($koneksi, "UPDATE dt_pembelian SET status='$status', kondisi='$kondisi' WHERE id_pembelian='$id'");
        header("location:data-pembelian.php?alert=berhasil");
    }
    ?>
</div>
</table>
</form>
</div>
</div>
</section>
	</body>
	</html>