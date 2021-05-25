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
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
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
            <h3>Tambah Data Cerpen</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                <form action="" method="POST" enctype="multipart/form-data">
                   <select class="input-control" name="kategori" required>
                        <option value="">--Pilih--</option>
                        <?php
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($kategori)){
                        ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                   </select>
                    <input type="text" name="nama" class="input-control" placeholder="Judul Cerpen" required> 
                    <input type="text" name="penulis" class="input-control" placeholder="Nama Penulis" required> 
                    <input type="file" name="gambar" class="input-control"required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                    <input type="text" name="sumber" class="input-control" placeholder="Sumber" required>
                    <select class="input-control" name="status">
                        <option value="">---Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>                        
                    </select>        
                    <input type="submit" name="submit" placeholder="Submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){
                        $kategori   = $_POST['kategori'];
                        $nama       = $_POST['nama'];
                        $penulis    = $_POST['penulis'];
                        $deskripsi  = $_POST['deskripsi'];
                        $sumber     = $_POST['sumber'];
                        $status     = $_POST['status'];

                        $filename = $_FILES['gambar']['name'];
                        $tmp_name = $_FILES['gambar']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'produk'.time().'.'.$type2;

                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                        if(!in_array($type2, $tipe_diizinkan)){
            
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        }else{
                            
                            move_uploaded_file($tmp_name, './produk/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                        null,
                                        '".$kategori."',
                                        '".$nama."',
                                        '".$penulis."',
                                        '".$deskripsi."',
                                        '".$sumber."',
                                        '".$newname."',
                                        '".$status."',
                                        null
                                            )");
                            if($insert){
                                echo '<script>alert("Tambah data berhasil")</script>';
                                echo '<script>window.location="data-cerpen.php"</script>';
                            }else {
                                echo 'Gagal' .mysqli_error($conn);
                            }    
                        }

                    } 
                ?>
            </div>
        </div>
    </div>




    <footer>
        <div class="container">
            <small>Copyright &copy; 2021 - Florist</small>
        </div> 
    </footer>

    <script>
           CKEDITOR.replace( 'deskripsi' );
    </script>

</body>
</html>