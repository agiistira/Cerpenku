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
            <input type="text" name="search" placeholder="Cari Judul Cerpen" vale="<?php echo $_GET['search'] ?>">
                <input type="submit" name="cari" value="Cari">
            </form>
        </div>
    </div>     

    <div class="section">
        <div class="container">
             <h2>Tentang Kami</h2>
             <p>Cerpenku adalah Website yang berisi cerita pendek yang kami ambil dari sumber penulis terpercaya, Cerpenku
             bertujuan untuk meningkatkan minat baca masyarakat terhadap cerita pendek </p>
             <h3 class="kelompok">Kelompok Kami :</h3>
        <div class= "teams">
        <ul>
            <div class ="baru">
            <img src="img/agis2.jpg">
            <li><a href="index.php">Agistira Lamunde (180155201031)</a></li>
        </div>
        <div class= "baru">
        <ul>
            <img src="img/ekro.jpeg">
            <li><a href="index.php">Andika Setiawan (180155201061)</a></li>
        </ul>
        </div>
        <div class= "baru">
        <ul>
            <img src="img/pler.jpeg">
            <li><a href="index.php">Iqbal Firmansyah (180155201032)</a></li>
        </ul>
        </div>
        <div class= "baru">
        <ul>
            <img src="img/ijan.jpeg">
            <li><a href="index.php">M.Shahrukh Rizan (180155201040)</a></li>
        </ul>
        </div>
        <div class= "baru">
        <ul>
            <img src="img/rejak.jpeg">
            <li><a href="index.php">Reza Kurniawan (180155201036)</a></li>
        </ul>
        </div>
</div>
</div>
                    <!-- <div class="col-4">
                       <img src="img/agis.jpg">
                        <p class="nama">Agistira Lamunde(180155201031)</p>
                    </div>
                    <div class="col-4">
                        <img src="img/bal.jpeg">
                        <p class="nama">Iqbal Firmansyah(180155201032)</p>
                    </div>
                    <div class="col-4">
                        <img src="img/rejak.jpeg">
                        <p class="nama">Reza Kurniawan (180155201036)</p>
                    </div>
                    <div class="col-4">
                        <img src="img/foto.jpeg">
                        <p class="nama">Rejak(180155201031)</p>
                    </div>
                      <div class="col-4">
                        <img src="img/foto.jpeg">
                        <p class="nama">Rejak(180155201031)</p>
                    </div> -->
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