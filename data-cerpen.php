<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] !=true){
        echo '<script>window.location="login.php"</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerpenku</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<style type="text/css">
h1 { font-family: "Dancing Script", sans-serif; }
body {font-family: "Quicksand" , sans-serif; }
</style>
</head>
<body>
    <header>
        <div class="container">
        <div class="beranda">
        <h1><a href="beranda.php">Cerpenku</a></h1>
        </div>
        <ul>
            <li><a href="profile.php">Edit Admin</a></li>
            <li><a href="data-kategori.php">Edit Kategori</a></li>
            <li><a href="data-cerpen.php">Edit Data Cerpen</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    </header>


    <div class="section">
        <div class="container">
            <h3>Data Cerpen</h3>
            <div class="box">
                <p><a href="tambah-cerpen.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Judul Cerpen</th>
                            <th>Nama Penulis</th>
                         
                            <th>Gambar</th>
                            <th>Sumber</th>
                            <th>Status</th>
                            <th width="100px">Aksi</aksi>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no = 1;
                        $produk = mysqli_query($conn, "SELECT *FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                        if(mysqli_num_rows($produk) > 0){
                        while($row = mysqli_fetch_array($produk)){
                    ?>
                        <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td><?php echo $row['penulis']?></td>
                           
                            <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="produk/<?php echo $row['product_image'] ?>" width="50px"></a></td>
                            <td><?php echo $row['sumber']?></td>
                            <td><?php echo ($row['product_status'] ==0)? 'Tidak Tersedia' : 'Tersedia' ?></td>
                            <td>
                                <a href="edit-cerpen.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="hapus.php?idp=<?php echo $row['product_id'] ?>" onclick="return confirm('Yakin Ingin Menghapus Data?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }} else { ?>
                            <tr>
                                <td colspan="9">Tidak ada data</td>
                            </tr>
                       <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Cerpenku</small>
        </div> 
    </footer>
</body>
</html>