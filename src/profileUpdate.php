<?php
	//  Read the profile data and return them to the client
	//echo "The full REQUEST from the client was: </br>";
	//print_r($_REQUEST);
	//echo "</br>";

	// Connect to the database
	require ("core/connect.php");
	//echo "Database connection established successfully!";

	// Receive the client ID
	$clientid = $_REQUEST['productNo'];
	//echo "Client ID: ". $clientid ."</br>";

	// Verify the client ID with the database
	$qry = "SELECT * from clients WHERE `id`='" . $clientid ."'";
	//echo $qry;

	// Execute the query to the database
	$res = mysqli_query($conn, $qry);
	if ($res !== FALSE) {
		$rows = $res->fetch_all(MYSQLI_ASSOC);
	}

	// Number of the result set returned
	$row_cnt = $res->num_rows;
	$product = $rows[0]['coffee'];
	$address = $rows[0]['address'];
	$sugar = $rows[0]['sugar'];
	$name = $rows[0]['name'];
	$comment = $rows[0]['comments'];
?>

<?php	//echo "Product: ".$product; ?> <br>
<?php	//echo "Sugar quantity: ".$sugar; ?> <br>
<?php   //echo "Address: ".$address; ?> <br>
<?php	//echo "Name: ".$name; ?> <br>
<?php	//echo "Comment: ".$comment; ?> <br>


<?php //echo "Message start" ?>
<?php echo "product=".$product."&sugar=".$sugar."&address=".$address."&comments=".$comment ?>
<?php //echo "Message end" ?>

<?php
	$time= date("h:i");
	$date = date("y:m:d");
	//echo $time;
	//echo $date;
	//header('Content-Type: text/html; charset=utf-8');
	//mysqli_query($conn, "INSERT INTO orders (product, sugar, address, name, comment, order_date, order_time) VALUES('$product', '$sugar','$address','$name','$comment', '$date', '$time') ");
	//header('Location: view.php');

?>
