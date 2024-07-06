<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Anggaran Dana</title>
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
            $iddana = $_POST['iddana'];
            $jenispenelitian = $_POST['jenispenelitian'];
            $anggarandana = $_POST['anggarandana'];

            // Verifikasi keunikan email
            $verify_query = mysqli_query($con, "SELECT iddana FROM dbdana WHERE iddana='$iddana'");

            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                        <p>This ID is used, Try another One Please!</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            }
            else{
                // Perbaikan sintaks pada query INSERT
                $query = "INSERT INTO dbdana (iddana, jenispenelitian, anggarandana) 
                        VALUES ('$iddana', '$jenispenelitian', '$anggarandana')";

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

        <header>Anggaran Dana</header>
        <form action="" method="post">
            <div class="field input">
                <label for="iddana">ID Dana</label>
                <input type="number" name="iddana" id="iddana" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="jenispenelitian">Jenis Penelitian</label>
                <select name="jenispenelitian" required>
                    <option value="Personal">Personal</option>
                    <option value="Kelompok">Kelompok</option>
                    <option value="Instansi">Instansi</option>
                </select>
            </div>

            <div class="field input">
                <label for="anggarandana">Anggaran Dana</label>
                <select name="anggarandana" required>
                    <option value="< Rp.1.000.000">< Rp.1.000.000</option>
                    <option value="Rp.1.000.000 - Rp.5.000.000">Rp.1.000.000 - Rp.5.000.000</option>
                    <option value="> Rp.5.000.000">> Rp.5.000.000</option>
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
