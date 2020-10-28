<?php require ("connect.php"); ?>
<?php	echo "Entry Date: ".$entryDate = $_POST['entyDate']; ?> <br>
<?php	echo "Deadline: ".$deadLine = $_POST['deadline']; ?> <br>
<?php   echo "Rating: ".$rating = $_POST['rating']; ?> <br>

<?php	echo "Responsible Name: ".$responsible = $_POST['responsible']; ?> <br>
<?php	echo "Socket code: ".$taskName = $_POST['taskName']; ?> <br>

<?php	echo "Comments: ".$comment = $_POST['comment']; ?> <br>
<?php	if(isset($_POST['status']) ) {
				echo "Status: Complete";
				$status = 1;
			}else {
				echo "Status: Active";
				$status = 0;
			}
?>

<?php
	//$output6 = str_replace("/","-",$output6);
	//$output6 = date("Y/m/d", strtotime($output6));
?>

<?php
	header('Content-Type: text/html; charset=utf-8');
	mysqli_query($conn, "INSERT INTO Tasks (rating, taskName, deadline, person, entryDate, comment, status) VALUES('$rating', '$taskName','$deadLine','$responsible','$entryDate','$comment', '$status') ");
	header('Location: view.php');
?>
