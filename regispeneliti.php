<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Registrasi Peneliti</title>
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
            $idpeneliti = $_POST['idpeneliti'];
            $namapeneliti = $_POST['namapeneliti'];
            $jeniskel = $_POST['jeniskel'];
            $email = $_POST['email'];
            $pendidikan = $_POST['pendidikan'];
            $namainstansi = $_POST['namainstansi'];
            $kota = $_POST['kota'];
            $alamat = $_POST['alamat'];
            $notelepon = $_POST['notelepon'];

            // Verifikasi keunikan email
            $verify_query = mysqli_query($con, "SELECT Email FROM dbpeneliti WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                        <p>This email is used, Try another One Please!</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            }
            else{
                // Perbaikan sintaks pada query INSERT
                $query = "INSERT INTO dbpeneliti (idpeneliti, namapeneliti, jeniskel, email, pendidikan, namainstansi, kota, alamat, notelepon) 
                        VALUES ('$idpeneliti', '$namapeneliti', '$jeniskel', '$email', '$pendidikan', '$namainstansi', '$kota', '$alamat', '$notelepon')";

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

        <header>Registrasi Peneliti</header>
        <form action="" method="post">
            <div class="field input">
                <label for="idpeneliti">ID Peneliti</label>
                <input type="number" name="idpeneliti" id="idpeneliti" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="namapeneliti">Nama Peneliti</label>
                <input type="text" name="namapeneliti" id="namapeneliti" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="jeniskel">Jenis Kelamin</label>
                <select name="jeniskel" required>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="field input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="pendidikan">Pendidikan</label>
                <select name="pendidikan" required>
                    <option value="SMA">SMA</option>
                    <option value="D3">D3</option>
                    <option value="D4">D4</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="field input">
                <label for="namainstansi">Nama Instansi</label>
                <input type="text" name="namainstansi" id="namainstansi" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="kota">Kota</label>
                <input type="text" name="kota" id="kota" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="notelepon">No. Telpon</label>
                <input type="text" name="notelepon" id="notelepon" autocomplete="off" required>
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
