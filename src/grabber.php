<?php
	print_r($_REQUEST);
?>
<?php require ("goffee/core/connect.php"); 
echo "I am here";

?>
<?php	echo "Product: ".$product = $_REQUEST['product']; ?> <br>
<?php	echo "Sugar quantity: ".$sugar = $_REQUEST['sugar']; ?> <br>
<?php   echo "Address: ".$address = $_REQUEST['address']; ?> <br>
<?php	echo "Name: ".$name = $_REQUEST['name']; ?> <br>
<?php	echo "Comment: ".$comment = $_REQUEST['comment']; ?> <br>
<?php
$time= date("h:i");
$date = date("y:m:d");
	echo "All good here.";
	echo $time;
	echo $date;
	header('Content-Type: text/html; charset=utf-8');
	mysqli_query($conn, "INSERT INTO orders (product, sugar, address, name, comment, order_date, order_time) VALUES('$product', '$sugar','$address','$name','$comment', '$date', '$time') ");
	//header('Location: view.php');
?>

?>