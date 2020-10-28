<?php
	include('head.php');
        include 'connect.php';
        
	if( isset($_POST['recordNum']) )  {
 		$id = $_POST['recordNum'];
		$sql_join = mysqli_query($conn, "UPDATE Tasks SET status='1' WHERE id=".$id);
		header( "url=view.php" );
		$conn->close();
	}
?>
