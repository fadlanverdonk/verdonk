<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register Ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                    <?php
                                        if(isset($_POST['register'])) {
                                            $nama = $_POST['nama'];
                                            $password = md5($_POST['password']);
                                            $alamat = $_POST['alamat'];
                                            $no_telepon = $_POST['no_telepon'];
                                            $email = $_POST['email'];
                                            $username = $_POST['username'];
                                            $level = $_POST['level'];
                                            
                                            
                                            $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password,level) VALUES ('$nama','$email','$alamat','$no_telepon','$username','$password','$level')");

                                                if($insert){
                                                    echo '<script>alert("Selamat, register berhasil, Silahkan Login"); location.href="login.php"</script>';
                                                }else{

                                                    echo '<script>alert("Register Gagal, Silahkan Ulangi Kembali.");</script>';
                                            }

                                        }
                                        
                                    ?>
                                        <form method="post">
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama Lengkap" required />
                                                <label class="small mb-1">Nama Lengkap</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="text"required name ="email" placeholder="Masukkan Email" required />
                                                <label class="small mb-1">Email</label>
                                            </div>
                                                <div class="form-floating mb-2">
                                                <input class="form-control" type="text"required name ="no_telepon" placeholder="Masukkan No. Telepon" required />
                                                <label class="small mb-1">No. Telepon</label>
                                            </div>
                                                <div class="form-floating mb-2">
                                                <textarea class="form-control" placeholder="alamat" name="alamat" id="floatingTextarea" style="height: 100px" required class="form-control py-4"></textarea>
                                                <label class="small mb-1">Alamat</label>
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" type="username" required name="username" placeholder="Masukkan Username" required />
                                                <label class="small mb-1">Username</label> 
                                            </div>
                                            <div class="form-floating mb-2">
                                                <input class="form-control" id="inputPassword" type="password" required name="password" placeholder="Masukkan Password" required />
                                                <label class="small mb-1">Password</label>  
                                            <div class="form-floating mb-2">
                                                <select name="level" required class="form-control" id="floatingSelectGrid">
                                                    <option selected>---</option>
                                                    <option value="peminjam">Peminjam</option> 
                                                    <option value="admin">Admin</option>
                                            </select> 
                                            <label for="floatingSelectGrid">Level</label>                                                                                                                                                    
                                            </div>
                                            <div class="form-grup d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="login.php">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            &copy;Perpustakaan Digital 2024.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
