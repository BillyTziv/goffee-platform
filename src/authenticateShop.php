<?php
	session_start();
	/* Require a connection with the database */
	require('core/connect.php');

	// Check if username and password are set
	if ( isset($_POST['shopID']) || isset($_POST['password']) ) {
		// Check if username and password are empty
		if( !empty($_POST['shopID']) && !empty($_POST['password']) ) {
			
			$shopid = $_POST['shopID'];
			$password = md5($_POST['password']);

			$myq = " SELECT * FROM shops WHERE shopid='$shopid' AND password='$password' ";
			//echo $myq;
			//exit();
			$sql = mysqli_query($conn, $myq) or die("Database select error: ".mysqli_error($conn));
			//echo mysqli_num_rows($sql);
			
			if( mysqli_num_rows($sql) == '1' ) {	// Successfully logged in and redirected to the interface
				$_SESSION['user_id'] = $shopid;
				
				$sucMsg = "Επιτυχής σύνδεση!";
				//echo $sucMsg;
				//echo $_SESSION['user_id'];
				header( "Location: core/view.php" );
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