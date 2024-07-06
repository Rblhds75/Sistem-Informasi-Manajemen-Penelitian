<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Publikasi Jurnal</title>
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
<div class="container">
    <div class="box form-box">

        <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $idpublikasi = $_POST['idpublikasi'];
            $tglsubmit = $_POST['tglsubmit'];
            $jenispublikasi = $_POST['jenispublikasi'];

            // Verifikasi keunikan email
            $verify_query = mysqli_query($con, "SELECT idpublikasi FROM dbpublikasi WHERE idpublikasi='$idpublikasi'");

            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                        <p>This ID is used, Try another One Please!</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            }
            else{
                // Perbaikan sintaks pada query INSERT
                $query = "INSERT INTO dbpublikasi (idpublikasi, tglsubmit, jenispublikasi) 
                        VALUES ('$idpublikasi', '$tglsubmit', '$jenispublikasi')";

                if(mysqli_query($con, $query)){
                    echo "<div class='message'>
                            <p>Submit successfully!</p>
                        </div> <br>";
                    echo "<a href='home.php'><button class='btn'>HomePage</button></a>";
                } else {
                    echo "Error: " . mysqli_error($con);
                }
            }

        } else {

        ?>

        <header>Publikasi Jurnal</header>
        <form action="" method="post">
            <div class="field input">
                <label for="idpublikassi">ID Publikasi</label>
                <input type="number" name="idpublikasi" id="idpublikasi" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="tglsubmit">Tanggal Submit</label>
                <input type="date" name="tglsubmit" id="tglsubmit" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="jenispublikasi">Jenis Publikasi</label>
                <select name="jenispublikasi" required>
                    <option value="Artikel">Artikel</option>
                    <option value="Paper">Paper</option>
                    <option value="Jurnal">Jurnal</option>
                </select>
            </div>

            <div class="field">
                <input type="submit" class="btn" name="submit" value="Submit">
            </div>
            <div class="links">
                <a href="home.php">Cancel</a>
            </div>
        </form>
    </div>
    <?php } ?>
</div>
</body>
</html>
