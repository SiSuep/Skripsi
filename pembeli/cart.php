<?php

if (isset($_POST['id_menu'], $_POST['pembelian'])) {
 
 $id_menu = $_POST['id_menu'];
 $pembelian = $_POST['pembelian'];

 $produk = mysqli_query($koneksi, "SELECT * FROM dt_menu WHERE id_menu = '$id_menu'");
 $dt_menu = $produk->fetch_assoc();

 if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

 $index = -1;
 $cart = unserialize(serialize($_SESSION['cart']));

 // jika produk sudah ada dalam cart maka pembelian akan diupdate
 for ($i=0; $i<count($cart); $i++) {
  if ($cart[$i]['id_menu'] == $id_menu) {
   $index = $i;
   $_SESSION['cart'][$i]['pembelian'] = $pembelian;
   break;
  }
 }

 // jika produk belum ada dalam cart
 if ($index == -1) {
  $_SESSION['cart'][] = [
   'id_menu' => $id_menu,
   'nama' => $dt_menu['nama_produk'],
   'harga' => $dt_menu['harga'],
   'pembelian' => $pembelian
  ];
 }
}

if (!empty($_SESSION['cart'])) { 
?>
<style type="text/css">
  #hidden_div {
    display: none;
  }
  </style>
  <h4>DAFTAR BELANJA ANDA</h4>
  <br>
  <form id="myform" action="transaksi.php" method="POST">
  <div class="mb-3">
    <p><label for="formGroupExampleInput" class="form-label">Pilih tipe pembeli : </label></p>
    <select class="form-select form-select-sm" name="kategori" onchange="showDiv(this)">
      <option value="umum">Umum</option>
      <option value="siswa">Siswa</option>
    </select>
  </div>
  <div class="mb-3">
    <p><label for="formGroupExampleInput" class="form-label">Masukkan Alamat Anda Setelah Memilih Semua Menu Yang Diinginkan : </label></p>
    <input id="divehe" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Alamat Disini" name="alamat">
    <select id="hidden_div" name="kelas" class="form-select form-select-sm">
      <option value="TATA BUSANA 1 KELAS 1">TATA BUSANA 1 KELAS 1 </option>
      <option value="TATA BUSANA 2 KELAS 1">TATA BUSANA 2 KELAS 1 </option>
      <option value="TATA BUSANA 3 KELAS 1">TATA BUSANA 3 KELAS 1 </option>
      <option value="TATA BUSANA 3 KELAS 2">TATA BUSANA 1 KELAS 2 </option>
      <option value="TATA BUSANA 3 KELAS 2">TATA BUSANA 2 KELAS 2 </option>
      <option value="TATA BUSANA 3 KELAS 2">TATA BUSANA 3 KELAS 2 </option>
      <option value="TATA BUSANA 1 KELAS 3">TATA BUSANA 1 KELAS 3 </option>
      <option value="TATA BUSANA 2 KELAS 3">TATA BUSANA 2 KELAS 3 </option>
      <option value="TATA BUSANA 3 KELAS 3">TATA BUSANA 3 KELAS 3 </option>
      <option value="PERHOTELAN 1 KELAS 1">PERHOTELAN 1 KELAS 1 </option>
      <option value="PERHOTELAN 2 KELAS 1">PERHOTELAN 2 KELAS 1 </option>
      <option value="PERHOTELAN 3 KELAS 1">PERHOTELAN 3 KELAS 1 </option>
      <option value="PERHOTELAN 1 KELAS 2">PERHOTELAN 1 KELAS 2 </option>
      <option value="PERHOTELAN 2 KELAS 2">PERHOTELAN 2 KELAS 2 </option>
      <option value="PERHOTELAN 3 KELAS 2">PERHOTELAN 3 KELAS 2 </option>
      <option value="PERHOTELAN 1 KELAS 3">PERHOTELAN 1 KELAS 3 </option>
      <option value="PERHOTELAN 2 KELAS 3">PERHOTELAN 2 KELAS 3 </option>
      <option value="PERHOTELAN 3 KELAS 3">PERHOTELAN 3 KELAS 3 </option>
      <option value="TATA BOGA 1 KELAS 1">TATA BOGA 1 KELAS 1 </option>
      <option value="TATA BOGA 2 KELAS 1">TATA BOGA 2 KELAS 1 </option>
      <option value="TATA BOGA 3 KELAS 1">TATA BOGA 3 KELAS 1 </option>
      <option value="TATA BOGA 1 KELAS 2">TATA BOGA 1 KELAS 2 </option>
      <option value="TATA BOGA 2 KELAS 2">TATA BOGA 2 KELAS 2 </option>
      <option value="TATA BOGA 3 KELAS 2">TATA BOGA 3 KELAS 2 </option>
      <option value="TATA BOGA 1 KELAS 3">TATA BOGA 1 KELAS 3 </option>
      <option value="TATA BOGA 2 KELAS 3">TATA BOGA 2 KELAS 3 </option>
      <option value="TATA BOGA 3 KELAS 3">TATA BOGA 3 KELAS 3 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 1 KELAS 1">KECANTIKAN KULIT DAN RAMBUT 1 KELAS 1 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 2 KELAS 1">KECANTIKAN KULIT DAN RAMBUT 2 KELAS 1 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 3 KELAS 1">KECANTIKAN KULIT DAN RAMBUT 3 KELAS 1 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 1 KELAS 2">KECANTIKAN KULIT DAN RAMBUT 1 KELAS 2 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 2 KELAS 2">KECANTIKAN KULIT DAN RAMBUT 2 KELAS 2 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 3 KELAS 2">KECANTIKAN KULIT DAN RAMBUT 3 KELAS 2 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 1 KELAS 3">KECANTIKAN KULIT DAN RAMBUT 1 KELAS 3 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 2 KELAS 3">KECANTIKAN KULIT DAN RAMBUT 2 KELAS 3 </option>
      <option value="KECANTIKAN KULIT DAN RAMBUT 3 KELAS 3">KECANTIKAN KULIT DAN RAMBUT 3 KELAS 3 </option>
      <option value="SPA AND BEAUTY THERAPY 1 KELAS 1">SPA AND BEAUTY THERAPY 1 KELAS 1 </option>
      <option value="SPA AND BEAUTY THERAPY 2 KELAS 1">SPA AND BEAUTY THERAPY 2 KELAS 1 </option>
      <option value="SPA AND BEAUTY THERAPY 3 KELAS 1">SPA AND BEAUTY THERAPY 3 KELAS 1 </option>
      <option value="SPA AND BEAUTY THERAPY 1 KELAS 2">SPA AND BEAUTY THERAPY 1 KELAS 2 </option>
      <option value="SPA AND BEAUTY THERAPY 2 KELAS 2">SPA AND BEAUTY THERAPY 2 KELAS 2 </option>
      <option value="SPA AND BEAUTY THERAPY 3 KELAS 2">SPA AND BEAUTY THERAPY 3 KELAS 2 </option>
      <option value="SPA AND BEAUTY THERAPY 1 KELAS 3">SPA AND BEAUTY THERAPY 1 KELAS 3 </option>
      <option value="SPA AND BEAUTY THERAPY 2 KELAS 3">SPA AND BEAUTY THERAPY 2 KELAS 3 </option>
      <option value="SPA AND BEAUTY THERAPY 3 KELAS 3">SPA AND BEAUTY THERAPY 3 KELAS 3 </option>
      <option value="USAHA PERJALANAN WISATA 1 KELAS 1">USAHA PERJALANAN WISATA 1 KELAS 1 </option>
      <option value="USAHA PERJALANAN WISATA 2 KELAS 1">USAHA PERJALANAN WISATA 2 KELAS 1 </option>
      <option value="USAHA PERJALANAN WISATA 3 KELAS 1">USAHA PERJALANAN WISATA 3 KELAS 1 </option>
      <option value="USAHA PERJALANAN WISATA 1 KELAS 2">USAHA PERJALANAN WISATA 1 KELAS 2 </option>
      <option value="USAHA PERJALANAN WISATA 2 KELAS 2">USAHA PERJALANAN WISATA 2 KELAS 2 </option>
      <option value="USAHA PERJALANAN WISATA 3 KELAS 2">USAHA PERJALANAN WISATA 3 KELAS 2 </option>
      <option value="USAHA PERJALANAN WISATA 1 KELAS 3">USAHA PERJALANAN WISATA 1 KELAS 3 </option>
      <option value="USAHA PERJALANAN WISATA 2 KELAS 3">USAHA PERJALANAN WISATA 2 KELAS 3 </option>
      <option value="USAHA PERJALANAN WISATA 3 KELAS 3">USAHA PERJALANAN WISATA 3 KELAS 3 </option>
      <option value="DESAIN FESYEN 1 KELAS 1">DESAIN FESYEN 1 KELAS 1 </option>
      <option value="DESAIN FESYEN 2 KELAS 1">DESAIN FESYEN 2 KELAS 1 </option>
      <option value="DESAIN FESYEN 3 KELAS 1 ">DESAIN FESYEN 3 KELAS 1 </option>
      <option value="DESAIN FESYEN 1 KELAS 2">DESAIN FESYEN 1 KELAS 2 </option>
      <option value="DESAIN FESYEN 2 KELAS 2">DESAIN FESYEN 2 KELAS 2 </option>
      <option value="DESAIN FESYEN 3 KELAS 2">DESAIN FESYEN 3 KELAS 2 </option>
      <option value="DESAIN FESYEN 1 KELAS 3">DESAIN FESYEN 1 KELAS 3 </option>
      <option value="DESAIN FESYEN 2 KELAS 3">DESAIN FESYEN 2 KELAS 3 </option>
      <option value="DESAIN FESYEN 3 KELAS 3">DESAIN FESYEN 3 KELAS 3 </option>
    </select>
        </div>
  </form>
        <br>
  <table class="table table-bordered">
   <tr align="center">
    <th>#</th>
    <th>Nama Produk</th>
    <th>Pembelian</th>
    <th>Harga</th>
    <th>Total</th>
    <th>Aksi</th>
   </tr>

   <?php
   if(isset($_SESSION['cart'])) {
    $kat_pembeli = 
    $cart = unserialize(serialize($_SESSION['cart']));
    $index = 0;
    $no = 1;
    $total = 0;
    $total_bayar = 0;
    $jumlah = count($cart);
    for ($i=0; $i<$jumlah; $i++) {
     $total = $_SESSION['cart'][$i]['harga'] * $_SESSION['cart'][$i]['pembelian'];
     $total_bayar += $total;
     ?>

     <tr>
      <td align="center"><?= $no++;?></td>
      <td><?= $cart[$i]['nama'];?></td>
      <td align="center"><?= $cart[$i]['pembelian'];?></td>
      <td><?= $cart[$i]['harga'];?></td>
      <td><?= $total; ?></td>
      <td align="center">
       <a href="?index=<?= $index; ?>">
        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
       </a>  
      </td>
     </tr>
     <tr>
     <?php
      if ($no==$no)
      {
        ?>
        
        <?php
      }
      ?>
     </tr>

     <?php
     $index++;
    }

  // hapus produk dalam cart
    if(isset($_GET['index'])) {
     $cart = unserialize(serialize($_SESSION['cart']));
     unset($cart[$_GET['index']]);
     $cart = array_values($cart);
     $_SESSION['cart'] = $cart;
    }
   }
   ?>
  <td align="center"><?= $jumlah+1;?></td>
          <td>Biaya Pengiriman</td>
          <td align="center">-</td>
          <td id="ongkir">10000</td>
          <td id="ongkir1">10000</td>
          <td align="center">-</td>
   <tr>
   </tr>
    <td colspan="4" align="right"><strong>Total Bayar</strong></td>
    <td><strong><input id="bayar" type="text" readonly="" value="<?= $total_bayar;
    ?>"></strong></td>
    <td align="center">
     <button  class="btn btn-success btn-sm" form="myform" type="submit">Checkout</button>
    </td>
   </tr>
  </table>
  <br><hr>
  <script type="text/javascript">
    total_bayar = <?php echo $total_bayar ;?>;
    document.getElementById('bayar').value = total_bayar+10000;

    function showDiv(select)
{
    if(select.value=='siswa'){

    document.getElementById('hidden_div').style.display = "block";
    document.getElementById('divehe').style.display = "none";
    document.getElementById('bayar').value = total_bayar+5000;
    document.getElementById('ongkir').innerHTML = 5000;
    document.getElementById('ongkir1').innerHTML = 5000;
   } else{
    document.getElementById('hidden_div').style.display = "none";
    document.getElementById('divehe').style.display = "block";
    document.getElementById('bayar').value = total_bayar+10000;
    document.getElementById('ongkir').innerHTML = 10000;
    document.getElementById('ongkir1').innerHTML = 10000;
   }

}
  </script>

<?php
}

if (isset($_GET['index'])) {
ob_clean();
ob_flush();
 header('Location: add-pembelian.php');
}
?>