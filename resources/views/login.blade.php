<!DOCTYPE html>
<html lang="en">
<head>

		<style>
				.button {
				  
				  border-radius: 10px;
				  background-color: black;
				  border: none;
				  color: #FFFFFF;
				  text-align: auto;
				  font-size: 25px;
				  padding: 20px;
				  width: 200px;
				  height: 70px;
				  transition: all 0.5s;
				  cursor: pointer;
				  margin: 5px;
				  position: relative;
				  left: 30px;
				}
				
				.button span {
				  cursor: pointer;
				  display: inline-block;
				  position: relative;
				  transition: 0.5s;
				}
				
				.button span:after {
				  content: '\00bb';
				  position: absolute;
				  opacity: 0;
				  top: 0;
				  right: -20px;
				  transition: 0.5s;
				}
				
				.button:hover span {
				  padding-right: 25px;
				}
				
				.button:hover span:after {
				  opacity: 1;
				  right: 0;
				}
				</style>

	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body>
			@if($x == true)
			<script>Swal.fire("Realize um Login Valido!")</script>
			@endif
<form action="<?php echo route('login');?>" method="get" autocomplete="off">
	<div class="limiter">
		<div class="container-login100" style="background-color: black">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-48">
						<img src='img/book.png' style="border-radius: 25%; width:50%">
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="user" id="user">
						<span class="focus-input100" data-placeholder="Usuário"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Senha">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" id="pass">
						<span class="focus-input100" data-placeholder="Senha"></span>
					</div>
					<div style="align-self: center">
						<button type="submit" class="button" name='login' style="padding-left: 20px"><span>Login</span></button>
					</div>

					<div class="text-center p-t-115">
						<a class="txt2" href="#" onclick="forgot()">
							Esqueçeu a senha?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
			</form>
			

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
<script>
	function forgot(){
        Swal.fire("Pergunte a Josue!")
	}
</script>
</html>