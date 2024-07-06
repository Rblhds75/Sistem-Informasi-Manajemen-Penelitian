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
            <th>Id Peneliti</th>
            <th>Nama Peneliti</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Pendidikan</th>
            <th>Nama Instansi</th>
            <th>Kota</th>
            <th>Alamat</th>
            <th>No Telphone</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        include 'php/config.php';
        $No = 1;
        $ambildata = mysqli_query($con, "SELECT * FROM dbpeneliti");
        while ($tampil = mysqli_fetch_array($ambildata)) {
            echo "<tr>
                <td>" . $No++ . "</td>
                <td>" . $tampil['idpeneliti'] . "</td>
                <td>" . $tampil['namapeneliti'] . "</td>
                <td>" . $tampil['jeniskel'] . "</td>
                <td>" . $tampil['email'] . "</td>
                <td>" . $tampil['pendidikan'] . "</td>
                <td>" . $tampil['namainstansi'] . "</td>
                <td>" . $tampil['kota'] . "</td>
                <td>" . $tampil['alamat'] . "</td>
                <td>" . $tampil['notelepon'] . "</td>
                <td><a href='databasepeneliti.php?id=" . $tampil['idpeneliti'] . "'>Hapus</a></td>
            </tr>";
        }
        ?>
    </table>
    <?php
    include "php/config.php";
    if (isset($_GET['id'])) {
        mysqli_query($con, "DELETE FROM dbpeneliti WHERE idpeneliti='$_GET[id]'");
        echo "Data Berhasil Dihapus";
        echo "<meta http-equiv='refresh' content='2;URL=databasepeneliti.php'>";
    }
    ?>
</div>
</body>
</html>
