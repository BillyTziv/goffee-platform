<?php
	if(isset($_POST['respName'])) {
		if($_POST['respName']!="everyone") {
			if($_POST['viewType'] == "all") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `person`='".$_POST['respName']."'");
			//echo "SELECT * FROM Tasks WHERE `person`='".$_POST['respName']."'";
			}else if($_POST['viewType'] == "active") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0' AND `person`='".$_POST['respName']."'");
			//echo "SELECT * FROM Tasks WHERE `status`='0' AND `person`='".$_POST['respName']."'");
			}else if($_POST['viewType'] == "resolved") {
			$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='1' AND `person`='".$_POST['respName']."'");
			//echo "SELECT * FROM Tasks WHERE `status`='1' AND `person`='".$_POST['respName']."'";
			}
		}else {
			if($_POST['viewType'] == "all") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks ");
				//echo "SELECT * FROM Tasks WHERE`person`='".$_POST['respName']."' ORDER BY `deadline`='".$_POST['orderbyField']."'";
			}else if($_POST['viewType'] == "active") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0'");
				//echo"SELECT * FROM Tasks WHERE `status`='0' AND `person`='".$_POST['respName']."' ORDER BY `deadline`='".$_POST['orderbyField']."'";
			}else if($_POST['viewType'] == "resolved") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='1'");
				// echo "SELECT * FROM Tasks WHERE `status`='1' AND `person`='".$_POST['respName']."' ORDER BY `deadline`='".$_POST['orderbyField']."'";
			}else {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0'");			
			}
		}
	}else {
		if(isset($_POST['viewType'])) {
		    if($_POST['viewType'] == "all") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `person`='".$_POST['respName']."'");
				//echo "SELECT * FROM Tasks WHERE `person`='".$_POST['respName']."'";
			}else if($_POST['viewType'] == "active") {
				$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0' AND `person`='".$_POST['respName']."'");
			//echo "SELECT * FROM Tasks WHERE `status`='0' AND `person`='".$_POST['respName']."'");
			}else if($_POST['viewType'] == "resolved") {
			$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='1' AND `person`='".$_POST['respName']."'");
			//echo "SELECT * FROM Tasks WHERE `status`='1' AND `person`='".$_POST['respName']."'";
			}
		}else {
			$sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0'");			
		}
	}

	if ($sql_join !== FALSE) {
		$rows = $sql_join->fetch_all(MYSQLI_ASSOC);
	}

	$row_cnt = $sql_join->num_rows;
	$conn->close();
?>