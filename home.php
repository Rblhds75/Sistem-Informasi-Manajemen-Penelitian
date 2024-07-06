<?php 
session_start();

include("php/config.php");
if(!isset($_SESSION['valid'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tes.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
        <?php 
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Age = $result['Age'];
                $res_id = $result['Id'];
            }
            ?>

            <p><a href="home.php">Uwu Jurnal</a> </p>
            <p>Hello, <?php echo $res_Uname ?></p>
        </div>

        <div class="right-links">
            <a href='edit.php?Id=$res_id'><button class="btn">Change Profile</button></a>
            

            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>

        </div>
    </div>

    <div class="main-box">
        <div class="top">
            <div class="box">
                <a href="regispeneliti.php">Registrasi Peneliti</a>
            </div>
            <div class="box">
                <a href="inputjurnal.php">Input Jurnal</a>
            </div>
            <div class="box">
                <a href="dana.php">Ajukan Dana</a>
            </div>
            <div class="box">
                <a href="publikasi.php">Publikasi Jurnal</a>
            </div>
        </div>

        <div class="middle">
            <div class="box">
                <a href="databasepeneliti.php">Data Peneliti</a>
            </div>
            <div class="box">
                <a href="databasejurnal.php">Data Jurnal</a>
            </div>
            <div class="box">
                <a href="databasedana.php">Data Dana</a>
            </div>
            <div class="box">
                <a href="databasepublikasi.php">Data Publikasi</a>
            </div>
            <div class="box">
                <a href="rekapjurnal.php">Rekapitulasi Jurnal</a>
            </div>
        </div>

        <div class="bottom">
            <div class="box">
                <p>Selamat datang di Dashboard UwU Jurnal! Di sini, Anda akan menemukan semua alat yang Anda butuhkan untuk mencatat perjalanan hidup dan refleksi pribadi Anda. Website kami dirancang dengan antarmuka yang ramah pengguna, memungkinkan Anda untuk dengan mudah menambahkan, mengedit, dan mengorganisir entri jurnal Anda. Fitur unggulan kami meliputi analisis sentimen untuk memahami suasana hati Anda.</p> 
            </div>
        </div>
    </div>
</body>
</html>