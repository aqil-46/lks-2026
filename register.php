<?php
include "config/koneksi.php";

// Proses register
if(isset($_POST['register'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = "siswa"; 
    $users_id = uniqid('user'); 
    $nomor_peserta = uniqid('NP-'); 
    $cek = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Email sudah terdaftar!');</script>";
    } else {
        
        mysqli_query($conn,"INSERT INTO users (nama,email,password,role,nomor_peserta,status,id) VALUES ('$nama','$email','$password','$role','$nomor_peserta','pending','$users_id')");
        $user_id = mysqli_insert_id($conn);

        echo "<script>alert('Registrasi berhasil! Silakan login.');window.location='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="auth-body">

<div class="auth-card">
    <h2>Register</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="register">Daftar</button>
    </form>

    <div class="auth-link">
        Sudah punya akun? <a href="login.php">Login</a>
    </div>
</div>

</body>
</html>
