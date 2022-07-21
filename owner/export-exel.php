<html>
<head>
	<title>EXPORT DATA</title>
</head>
<body>
	<?php include_once("koneksi.php"); ?>
	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pembelian.xls");
	?>
 
	<center>
		<h1>DATA PEMBELIAN <br/> CAFE TITIK SATU KOPI</h1>
	</center>
 
	 <table class="table-conten">
  <thead>
   <tr>
    <th>Id User</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Waktu</th>
    <th>Total Menu</th>
    <th>Total Bayar</th>
    <th>Foto</th>
    <th>Kondisi</th>
    <th>Total Pembelian</th> 
   </tr>
  </thead>
  <tbody>

    <?php
   $query = mysqli_query($koneksi, "SELECT * FROM dt_pembelian");
   $query1 = mysqli_query($koneksi, "SELECT SUM(dt_detail_pembelian.pembelian) as jumlah, dt_detail_pembelian.*, dt_menu.*, dt_pembelian.* FROM dt_detail_pembelian JOIN dt_menu on dt_menu.id_menu = dt_detail_pembelian.id_menu join dt_pembelian on dt_pembelian.id_pembelian = dt_detail_pembelian.id_pembelian WHERE dt_detail_pembelian.id_pembelian = dt_pembelian.id_pembelian group by dt_detail_pembelian.id_pembelian;")or die($koneksi->error);
   $no = 1;
   while ($d = $query1->fetch_assoc()) :
    ?>
                <tr>
                    <!-- <td><?php echo $no++; ?></td> -->
                    <td style=""width="50" height="50" align="middle"><?php echo $d['id_user']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['waktu']; ?></td>
                    <td><?php echo $d['total_menu']; ?></td>
                    <td><?php echo $d['total_bayar']; ?></td>
                    <td><img src="http://localhost/skripsirevisi/gambar/<?php echo $d['foto'] ?>" width="35" height="40"></td>
                    <td><?php echo $d['kondisi']; ?></td>  
                    <td><?php echo $d['jumlah']." Produk"; ?></td> 
     
    </tr>
    <?php endwhile; ?>
  </tbody>
 </table>
  </table>
</body>
</html>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pembelian.xls");
?>
