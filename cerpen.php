<?php 
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id =1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
        <h1><a href="index.php">Cerpenku</a></h1>
        <ul>
            <li><a href="index.php">Beranda</a></li>
            <li><a href="tentang-kami.php">Tentang Kami</a></li>
            <li><a href="cerpen.php">Cerpen Kami</a></li>
        </ul>
        </div>
    </header>

    <div class="search">
        <div class="container">
            <form action="cerpen.php">
            <input type="text" name="search" placeholder="Cari Judul Cerpen" valie="<?php echo $_GET['search'] ?>">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
    </div>     

    <div class="section">
        <div class="container">
             <h3>Koleksi Cerpen Kami</h3>
             <div class="box">
                <?php
                    if($_GET['search'] != '' || $_GET['kat'] !=''){
                        $where = "AND product_name LIKE '%".$_GET['search'] ."%' AND category_id LIKE '".$_GET['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT *FROM tb_product WHERE product_status = 1 $where  ORDER BY
                    product_id DESC ");
                    if(mysqli_num_rows($produk) >0){ 
                        while($p = mysqli_fetch_array($produk)){                        
                ?>
                    <a href="baca.php?id=<?php echo $p['product_id'] ?>">
                    <div class="col-4">
                        <img src="produk/<?php echo $p['product_image']?>">
                        <p class="nama"><?php echo substr($p['product_name'], 0, 30)?></p>
                        <p class="penulis"><?php echo $p['penulis']?></p>
                    </div>
                    </a>
                <?php }}else{ ?>
                        <p>Cerpen Tidak Ada</p>
                <?php } ?>
             </div>
        </div>
    </div>


    <footer>
        <div class="footer">
            <div class="container">
                <h4>Alamat</h4>
                <p><?php echo $a->admin_address ?></p> 

                <h4>Email</h4>
                <p><?php echo $a->admin_email ?></p>

                <h4>No. Hp</h4>
                <p><?php echo $a->admin_telp ?></p>           
                <small>Copyright &copy; 2021 - Cerpenku</small>
            </div>
        </duv>        
    </footer>       

</body>
</html>