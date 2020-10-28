<?php
	session_start();
	/* Require a connection with the database */
	require('core/connect.php');

	// Check if username and password are set
	if ( isset($_POST['username']) || isset($_POST['password']) ) {
		// Check if username and password are empty
		if( !empty($_POST['username']) && !empty($_POST['password']) ) {
			
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$myq = " SELECT * FROM clients WHERE username='$username' AND password='$password' ";
			//echo $myq;
			$sql = mysqli_query($conn, $myq) or die("Database select error: ".mysqli_error($conn));

			if( mysqli_num_rows($sql) == 1 ) {	// Successfully logged in and redirected to the interface
				$_SESSION['user_id'] = $username;
				//$sucMsg = "Επιτυχής σύνδεση!";
				//echo $_SESSION['user_id'];
				header( "Location: core/profile.php" );
			}else {
				echo "Ο συνδυασμός του αριθμού καταστήματος και του κωδικού πρόσβασης είναι λανθασμένος!";
				exit();
			}
		}else {
			echo "Δεν καθορίστηκε ο αριθμός καταστήματος ή/και ο κωδικός πρόσβασης! Ξαναπροσπαθήστε.";
			exit();
		}
	}else {
		echo "Αυτό δεν έπρεπε να γίνει! Ξαναπροσπαθήστε.";
		exit();
	}
?>