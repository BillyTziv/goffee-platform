<?php require ("connect.php"); ?>
<?php	echo "Ticket ID: ".$id = $_POST['ticketID']; ?> <br>

<?php	echo "Entry Date: ".$entryDate = $_POST['start_date']; ?> <br>
<?php	echo "Deadline: ".$deadLine = $_POST['final_date']; ?> <br>

<?php	echo "Responsible Name: ".$respName = $_POST['respName']; ?> <br>
<?php	echo "Socket code: ".$socketCode = $_POST['socketCode']; ?> <br>
<?php	echo "IP Address: ".$socketIPAddr = $_POST['IPAddr']; ?> <br>



<?php	echo "Contact Name: ".$contactName = $_POST['contactName']; ?> <br>
<?php	echo "Contact Phone: ".$contactPhone = $_POST['contactPhone']; ?> <br>

<?php	echo "Comments: ".$notes = $_POST['notes']; ?> <br>
<?php	if(isset($_POST['status']) ) {
			echo "Status: Complete";
			$status = 1;
		}else {
			echo "Status: Active";
			$status = 0;
		}
?>

<?php
	echo "UPDATE failures SET outlet_code='$socketCode', ip_address='$socketIPAddr', ypeuthynos='$respName', user_name='$contactName', user_phone='$contactPhone', start_date='$    entryDate', notes='$notes', final_date='$deadLine', status='$status' WHERE id='$id'";



	mysqli_query($conn, "UPDATE failures SET outlet_code='$socketCode', ip_address='$socketIPAddr', ypeuthynos='$respName', user_name='$contactName', user_phone='$contactPhone', start_date='$entryDate', notes='$notes', final_date='$deadLine', status='$status' WHERE id='$id'");
	//header('Location: view.php');
?>
