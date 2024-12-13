<?php
    include 'config/koneksi.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="login-box shadow">
        <form action="" method="post">
            <div>
                <h5 class="card-title text-center pb-0 fs-4">Selamat Datang</h5>
                <p class="text-center small">Masukkan Username dan Password untuk masuk</p>
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div>
                <button class="btn btn-success form-control mt-3" type="submit" name="loginbtn">Login</button>
            </div>
            <div class="login-help">
                <a href="register.php">Register</a> • <a href="#">Forgot Password</a>
            </div>
            <br>
            <?php
                if(isset($_POST['loginbtn'])){
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);
                
                    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                
                    if($countdata > 0){
                        if (password_verify($password, $data['password'])) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login'] = true;
                            header('location: beranda.php');
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Password salah</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Akun tidak tersedia</div>';
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>
