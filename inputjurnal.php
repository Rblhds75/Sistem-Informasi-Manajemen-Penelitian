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
<div class="container">
    <div class="box form-box">

        <?php
        include("php/config.php");
        if(isset($_POST['submit'])){
            $idjurnal = $_POST['idjurnal'];
            $namajurnal = $_POST['namajurnal'];
            $temajurnal = $_POST['temajurnal'];

            // Verifikasi keunikan email
            $verify_query = mysqli_query($con, "SELECT idjurnal FROM dbjurnal WHERE idjurnal='$idjurnal'");

            if(mysqli_num_rows($verify_query) != 0){
                echo "<div class='message'>
                        <p>This ID is used, Try another One Please!</p>
                    </div> <br>";
                echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
            }
            else{
                // Perbaikan sintaks pada query INSERT
                $query = "INSERT INTO dbjurnal (idjurnal, namajurnal, temajurnal) 
                        VALUES ('$idjurnal', '$namajurnal', '$temajurnal')";

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

        <header>Input Jurnal</header>
        <form action="" method="post">
            <div class="field input">
                <label for="idjurnal">ID Jurnal</label>
                <input type="number" name="idjurnal" id="idjurnal" autocomplete="off" required>
            </div>
            <div class="field input">
                <label for="namajurnal">Nama Jurnal</label>
                <input type="text" name="namajurnal" id="namajurnal" autocomplete="off" required>
            </div>

            <div class="field input">
                <label for="temajurnal">Tema Jurnal</label>
                <select name="temajurnal" required>
                    <option value="Teknologi">Teknologi</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Sosial">Sosial</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Budaya">Budaya</option>
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
