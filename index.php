<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<title>GoFFEE</title>
	<link rel="shortcut icon" type="image/png" href="src/images/favicon.png"/>
	<script>
		$(document).ready(function(){
			//$('#register-form-link').removeClass('active');
			document.getElementById("login-form-link").style.borderBottom = "darkorange solid 4px";
				document.getElementById("register-form-link").style.borderBottom = "grey solid 4px";

		}) 

		$(function() {
		    $('#login-form-link').click(function(e) {
				$("#login-form").delay(100).fadeIn(100);
		 		$("#register-form").fadeOut(100);
				$('#register-form-link').removeClass('active');
				$(this).addClass('active');
				document.getElementById("login-form-link").style.borderBottom = "darkorange solid 4px";
				document.getElementById("register-form-link").style.borderBottom = "grey solid 4px";

				e.preventDefault();
			});
			$('#register-form-link').click(function(e) {
				$("#register-form").delay(100).fadeIn(100);
		 		$("#login-form").fadeOut(100);
				$('#login-form-link').removeClass('active');
				$(this).addClass('active');
				document.getElementById("register-form-link").style.borderBottom = "darkorange solid 4px";
				document.getElementById("login-form-link").style.borderBottom = "grey solid 4px";



				e.preventDefault();
			});
		});
	</script>
	<style>
		body {
		    padding: 0px;
		    font-family: Tahoma;
	      	margin: 0px;
	      	  background: none;
		    background-size: cover;
		    background-position: center center;
	      	background-image: url('src/images/loginBackground.jpeg');
	      	//-webkit-filter: blur(5px); /* Safari 6.0 - 9.0 */
    		//filter: blur(5px);
		}
		
		#main {
		   position: fixed;
		   //background: linear-gradient(45deg, #214DD1, #D13921);
		   height: 100%;
		   width: 100%;

		}

		.container {
			padding-top: 30px;
			opacity: .9;

		}

		.panel-login {
			border-color: #ccc;
			-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
			box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);

		}
		.panel-login>.panel-heading {
			color: #00415d;
			background-color: #fff;
			border-color: #fff;
			text-align:center;
		}
		.panel-login>.panel-heading a{
			text-decoration: none;
			color: #666;
			//font-weight: bold;
			font-size: 18px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
			border-bottom: grey solid 4px;

		}
		.panel-login>.panel-heading a.active{
			color: #383838;
		
		}

			

		.panel-login>.panel-heading hr{
			margin-top: 10px;
			margin-bottom: 0px;
			clear: both;
			border: 0;
			height: 1px;
			background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
			background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
			background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
		}
		.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
			height: 45px;
			border: 1px solid #ddd;
			font-size: 16px;
			-webkit-transition: all 0.1s linear;
			-moz-transition: all 0.1s linear;
			transition: all 0.1s linear;
		}
		.panel-login input:hover,
		.panel-login input:focus {
			outline:none;
			-webkit-box-shadow: none;
			-moz-box-shadow: none;
			box-shadow: none;
			border-color: #ccc;
		}
		.btn-login {
			background-color: #c8341e;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #59B2E6;
			transition: 0.4s ease;
		}
		.btn-login:hover,
		.btn-login:focus {
			color: #fff;
			//background-color: #53A3CD;
			//border-color: #53A3CD;
			background-color: #CB6A0B;
			transition: 0.4s ease;
		}
		.forgot-password {
			text-decoration: underline;
			color: #888;
		}
		.forgot-password:hover,
		.forgot-password:focus {
			text-decoration: underline;
			color: #666;
		}

		.btn-register {
			background-color: #c8341e;
			outline: none;
			color: #fff;
			font-size: 14px;
			height: auto;
			font-weight: normal;
			padding: 14px 0;
			text-transform: uppercase;
			border-color: #1CB94A;
		}
		.btn-register:hover,
		.btn-register:focus {
			color: #fff;
			background-color: #1CA347;
			border-color: #1CA347;
		}

		#logo_box {
			height: 150px;
			padding-top: 40px;
			width: 100%;
			margin: auto;
			text-align: center;
			background: white;
			/*background-color: rgba(128,64,0,0.75);*/
			opacity: 0.6;
			margin-top: 50px;
		}


	</style>

</head>

<body onLoad="pageLoadFunc()">
	<div id="main">
		<div id="logo_box">
			<img src="src/images/logo.png" width="450px"/>
		</div>
		<div class="container">
	    	<div class="row">
				<div class="col-sm-6 col-sm-offset-3 login">
					<div class="panel panel-login">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-6">
									<img src="src/images/shoplogin.png" height="64px"/></br>
									<a href="#" class="active" id="login-form-link">Ιδιοκτήτης Καταστήματος</a>
								</div>
								<div class="col-xs-6">
									<img src="src/images/userlogin.png" height="64px"/></br>
									<a href="#" class="active" id="register-form-link">Χρήστης Υπηρεσίας</a>
								</div>
							</div>
							<hr>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form id="login-form" action="src/authenticateShop.php" method="post" role="form" style="display: block;">
										<div class="form-group">
											<input type="text" name="shopID" id="shopID" tabindex="1" class="form-control" placeholder="Αριθμός Καταστήματος" value="325212" autofocus>
										</div>
										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Κωδικός Πρόσβασης" value="U9vS8tuh">
										</div>
										<!--<div class="form-group text-center">
											<select class="form-control" id="loginType" name="loginType" placeholder="Επιλογή Καταστήματος">
												<option value="owner">Φιλικής Εταιρείας 38, Καρδαμίτσια</option>
												<option value="user">Ρήγα φεραίου 32, Καρδαμίτσια</option>
												<option value="user">Μακρυγιάννη 128, Αμπελόκηπους</option>
											</select>
										</div>-->
										<!--<div class="form-group text-center">
											<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
											<label for="remember">Θυμήσου με</label>
										</div>-->
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Είσοδος στο κατάστημα">
												</div>
											</div>
										</div>
										<!--
										<div class="form-group">
											<div class="row">
												<div class="col-lg-12">
													<div class="text-center">
														<a href="#" tabindex="5" class="forgot-password">Ξεχάσατε τον κωδικό πρόσβασης?/a>
													</div>
												</div>
											</div>
										</div>
									-->
									</form>

									<!-- User Login PArt -->
									<form id="register-form" action="src/authenticateUser.php" method="post" role="form" style="display: none;">
										<div class="form-group">
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Όνομα Χρήστη" value="tester">
										</div>
										
										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="2" class="form-control" value="tester" placeholder="Κωδικός Πρόσβασης">
										</div>
										<!--<div class="form-group text-center">
											<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
											<label for="remember">Θυμήσου με</label>
										</div>-->
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Είσοδος">
												</div>
											</div>
										</div>
									</form>

									<!--
									<form id="register-form" action="register.php" method="post" role="form" style="display: none;">
										<div class="form-group">
											<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Όνομα Χρήστη" value="">
										</div>
										<div class="form-group">
											<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Διεύθυνση Email" value="">
										</div>
										<div class="form-group">
											<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Κωδικός Πρόσβασης">
										</div>
										<div class="form-group">
											<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Επιβεβαίωση Κωδικού Πρόσβασης">
										</div>
										<div class="form-group text-center">
											<select class="form-control" name="loginType" id="loginΤype" placeholder="Κωδικός Πρόσβασης">
												<option value="owner">Ιδιοκτήτης Καταστήματος</option>
												<option value="user">Χρήστης Υπηρεσίας</option>
											</select>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Εγγραφή">
												</div>
											</div>
										</div>
									</form>

								-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End of main -->
</body>
</html>