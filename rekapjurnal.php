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
<div class="rekap">
<?php
// Koneksi ke database
include 'php/config.php';

// Query untuk menampilkan seluruh data dari tabel rekap
$sql = "SELECT dbpeneliti.namapeneliti, dbjurnal.namajurnal AS juduljurnal, dbjurnal.temajurnal, dbdana.jenispenelitian, dbdana.anggarandana, dbpublikasi.tglsubmit, dbpublikasi.jenispublikasi 
        FROM dbrekap 
        JOIN dbpeneliti ON dbrekap.Idpeneliti = dbpeneliti.Idpeneliti
        JOIN dbjurnal ON dbrekap.Idjurnal = dbjurnal.Idjurnal
        JOIN dbdana ON dbrekap.Iddana = dbdana.Iddana
        JOIN dbpublikasi ON dbrekap.Idpublikasi = dbpublikasi.Idpublikasi";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output judul tabel untuk menampilkan data
    echo "<table border='1'>";
    echo "<tr>
        <th>No</th>
        <th>Nama Peneliti</th>
        <th>Judul Jurnal</th>
        <th>Tema Jurnal</th>
        <th>Jenis Penelitian</th>
        <th>Anggaran Dana</th>
        <th>Tanggal Submit</th>
        <th>Jenis Publikasi</th>
        </tr>";

    // Output data dari setiap baris hasil query
    $no = 1;
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . $row["namapeneliti"] . "</td>";
        echo "<td>" . $row["juduljurnal"] . "</td>";
        echo "<td>" . $row["temajurnal"] . "</td>";
        echo "<td>" . $row["jenispenelitian"] . "</td>";
        echo "<td>" . $row["anggarandana"] . "</td>";
        echo "<td>" . $row["tglsubmit"] . "</td>";
        echo "<td>" . $row["jenispublikasi"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data yang ditemukan.";
}
$con->close();
?> 
</div>
</body>
</html>
