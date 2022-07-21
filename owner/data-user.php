<?php 
    session_start();
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="../login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>DATA USER</title>
    <link rel="stylesheet" href="data-user.css">
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
        <h1>INFORMASI</h1>
        <h2>DATA USER</h2>
    </div>
    <?php 
        if(isset($_GET['alert'])){
            if($_GET['alert']=='gagal_ekstensi'){
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                    Ekstensi Tidak Diperbolehkan
                </div>                              
                <?php
            }elseif($_GET['alert']=="gagal_ukuran"){
                ?>
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> Peringatan !</h4>
                    Ukuran File terlalu Besar
                </div>                              
                <?php
            }elseif($_GET['alert']=="berhasil"){
                ?>
                <div class="alert alert-success alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> Success</h4>
                    Berhasil Disimpan
                </div>                              
                <?php
            }
        }
        ?>
        <div class="tombol-1">
        <a href="add-user.php">
            <input type="submit" name="" value="TAMBAH DATA"></a>
        </div>
        <table class="table-conten">
            <thead>
                <tr>
                <th>ID</th> 
                <th>NAMA</th> 
                <th>ALAMAT</th> 
                <th>TELEPON</th> 
                <th>FOTO</th> 
                <th>JABATAN</th> 
                <th>USERNAME</th> 
                <th>PASSWORD</th> 
                <th>UPDATE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                //pagingnya
        $batas = 8;
        $qjum = mysqli_query($koneksi,"SELECT * FROM dt_user");
        $jum = mysqli_num_rows($qjum);
        $halaman = ceil($jum/$batas);
        $page = (isset($_GET['page'])) ? $_GET["page"]:1;
        $posisi =($page - 1) * $batas;
//batas paging
        //$data dapet tambahan LIMIT $posisi,$batas
            $data = mysqli_query($koneksi,"SELECT * from dt_user LIMIT $posisi,$batas");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['id_user']; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['alamat']; ?></td>
                    <td><?php echo $d['telepon']; ?></td>
                    <td><img src="../gambar/<?php echo $d['foto'] ?>" width="35" height="40"></td>
                    <td><?php echo $d['jabatan']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['password']; ?></td>
                    <td><?php  echo "<a href='edit-user.php? id_user=$d[id_user]'><button>EDIT</button></a><a href='delete-user.php?id_user=$d[id_user]'><button>DELETE</button></a></tr>";?> </td>   
                </tr>
                <?php
            }
 
            ?>
            </tbody>
        </table>
        <div class="paging">
            <?php
            for ($x=1; $x<=$halaman; $x++) {
            ?>
            <a <?php if($x==$page){echo"class ='active' ";} ?> href="?page=<?php echo $x; ?>">
                <?php echo $x; ?>
            </a> 
               <?php 
            }
            ?>
        </div>
        </div>
        </section>
</body>
</html>