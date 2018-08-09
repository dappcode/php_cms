<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/img-01.jpg');">
			<div class="wrap-login100 p-t-80 p-b-30">
            <?php 
            include "../inc/config.php";
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $pass = md5($_POST['password']);
                $query = "SELECT * FROM user WHERE username='$_POST[username]' AND password='$pass' AND aktif='Y'";
                $sqlCek = mysqli_query($dblogin, $query);

                $jml=mysqli_num_rows($sqlCek);
                $data = mysqli_fetch_array($sqlCek);

                if ($jml > 0 ) {
                    session_start();
                    $_SESSION['login']               = TRUE;
                    $_SESSION['id']                  = $data['id'];
                    $_SESSION['username']            = $data['username'];
                    $_SESSION['nama']                = $data['nama_lengkap'];
                    $_SESSION['upload_gambar']       = TRUE;

                    header('location:dashboard.php');
                } else {
                    echo "Username dan password tidak di temukan!";
                }
                
            }
            ?>
				<form class="login100-form validate-form" method="post" name="login">
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../js/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>