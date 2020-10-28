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
			$email = $_POST['email'];
			$loginType = $_POST['loginType'];

			// Check weither the user is a shop owner or a simple user
			if($loginType == "user") {
				$myq = "INSERT INTO clients (username, password, email) VALUES ('" . $username . "', '" . $password ."',  '" . $email ."')";
			}else if($loginType == "owner") {
				$myq = "INSERT INTO owners (username, password, email) VALUES ('" . $username . "', '" . $password ."',  '" . $email ."')";
			}else {
				echo "Something went wrong. User type was not set.";
				exit();
			}
			//echo $myq;
			//exit();
			$sql = mysqli_query($conn, $myq) or die("Database select error: ".mysqli_error($conn));
			//echo $sql;
			//exit();

			if( $sql == 1 ) {	// Successfully logged in and redirected to the interface
				$_SESSION['user_id'] = "$username";
				//$sucMsg = "Επιτυχής σύνδεση!";
				echo "Successfull registration!";
				header( "Location: index.php" );
			}
		}
	}
?>