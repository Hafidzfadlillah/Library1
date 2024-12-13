<?php
    include 'config/koneksi.php';

    if (isset($_POST['submit'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);
        $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
        $jenis_kelamin = htmlspecialchars($_POST['jenis_kelamin']);
        
        $cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        $cek_login = mysqli_num_rows($cek_user);

        if ($cek_login > 0) {
            echo "<script>
                alert('Username telah terdaftar');
                window.location ='register.php';
            </script>";
        } else {
            if ($password != $password2) {
                echo "<script>
                alert('Password tidak sama');
                window.location ='register.php';
            </script>";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO user (nama, username, password, tgl_lahir, jenis_kelamin) 
                          VALUES ('$nama', '$username', '$hashed_password', '$tgl_lahir', '$jenis_kelamin')";
                
                if (mysqli_query($conn, $query)) {
                    echo "<script>
                    alert('Registrasi berhasil');
                    window.location ='login.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Registrasi gagal: " . mysqli_error($conn) . "');
                    window.location ='register.php';
                    </script>";
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<style>
.card-header {
    background-color: #999DA0;
    color: white;
}
.card-footer {
    background-color: #999DA0;
    color: white;
}
</style>
<body>
    <div class="row">
        <!-- awal col -->
        <div class="card-kotak col-md-5 mx-auto">
            <!-- awal card -->
            <div class="card mt-3 shadow">
                <div class="card-header text-center" style="height: 40px;">
                    Register
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="user" class="form-label">Nama</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Username</label>
                            <input type="text" class="form-control" id="email" name="username" placeholder="Username" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control"  name="tgl_lahir" placeholder="Tanggal Lahir" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="pass" name="password2" placeholder="Confirm Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success" style="float: right;">Simpan</button>
                        <p><button onclick="history.back()">Kembali</button></p>
                    </form>
                </div>
                <div class="card-footer" style="height: 40px;">
                </div>
            </div>
            <!-- akhir card -->
        </div>
    </div>
</body>
</html>
