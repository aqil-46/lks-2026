<?php
include "config/koneksi.php";

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $user = mysqli_fetch_assoc($data);

    if($user){
        if(password_verify($password,$user['password'])){
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if($user['role']=="admin"){
                header("Location: admin/dashboard.php");
                exit;
            } else {
                header("Location: siswa/daftar_event.php");
                exit;
            }
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Email tidak terdaftar!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-body">

<div class="auth-card">
    <h2>Login</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="login">Masuk</button>
    </form>

    <div class="auth-link">
        Belum punya akun? <a href="register.php">Daftar</a>
    </div>
</div>

</body>
</html>
