<?php
session_start();
include 'koneksi.php';
?>

  <?php
  if (isset($_POST["login"])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    //lakukan kuery ngecek akun di tabel pelanggan di db


    //lakukan kuery ngecek akun di tabel pelanggan di DB

    $login = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE user='$user' AND pass='$pass'");

    // ngitung akun yang terambil
    $cek = mysqli_num_rows($login);

    //jika ada 1 akun yang cocok, maka diloginkan
    if ($cek > 0) {
      //anda sudah login
      //mendapatkan akun dalam bentuk array
      $data = mysqli_fetch_assoc($login);

      //cek jika user login sebagai admin
      if ($data['id_level'] == "1") {

        //buat session login dan username
        $_SESSION['user'] = $user;
        $_SESSION['id_level'] = "1";

        // alihkan ke halaman admin 
        echo "<script>alert('Anda Sukses Login sebagai Admin, Selamat!!!!'); </script>";
        echo "<script>location='../admin/index.php?id=$_SESSION[id_level]';</script>";
      } elseif ($data['id_level'] == "2") {

        //buat session login dan username

        $_SESSION['user'] = $user;
        $_SESSION['id_level'] = "2";

        // alihkan ke halaman dashboard pengurus
        echo "<script>alert('Anda Sukses Login sebagai Petugas, Selamat!!!!!!'); </script>";
        echo "<script>location='../staff/index.php?id=$_SESSION[id_level]';</script>";
      } else {

        //anda gagal login
        echo "<script>alert('Anda gagal Login, Periksa Akun Anda'); </script>";
        echo "<script>location='../index.php'; </script>";
      }
    } else {
      echo "Error - " . mysqli_errno($login) . "-" . mysqli_error($login);
      //echo "<script>alert('Anda gagal Login, Periksa Akun Anda'); </script>";
      //echo "<script>location='../index.php'; </script>";
    }
  }
  ?>
