<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Input Jurnal</title>
</head>
<body>
<div class="nav">
    <div class="logo">
        <p><a href="home.php"> Uwu Jurnal</a></p>
    </div>
    <div class="right-links">
        <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
    </div>
</div>
<div class="datapeneliti">
    <h3> Data Peneliti </h3>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Id Publikasi</th>
            <th>Tanggal Submit</th>
            <th>Jenis Publikasi</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        include 'php/config.php';
        $No = 1;
        $ambildata = mysqli_query($con, "SELECT * FROM dbpublikasi");
        while ($tampil = mysqli_fetch_array($ambildata)) {
            echo "<tr>
                <td>" . $No++ . "</td>
                <td>" . $tampil['Idpublikasi'] . "</td>
                <td>" . $tampil['tglsubmit'] . "</td>
                <td>" . $tampil['jenispublikasi'] . "</td>
                <td><a href='databasepublikasi.php?id=" . $tampil['Idpublikasi'] . "'>Hapus</a></td>
            </tr>";
        }
        ?>
    </table>
    <?php
    include "php/config.php";
    if (isset($_GET['id'])) {
        mysqli_query($con, "DELETE FROM dbpublikasi WHERE idpublikasi='$_GET[id]'");
        echo "Data Berhasil Dihapus";
        echo "<meta http-equiv='refresh' content='2;URL=databasepeneliti.php'>";
    }
    ?>
</div>
</body>
</html>
