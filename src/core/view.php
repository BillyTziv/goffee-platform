<!DOCTYPE html>
<html>
<head>
	  <?php session_start(); ?>

	  <title>GOFFEE</title>

	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	  <!-- Add a favicon at the tab of the website -->
	  <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>

	  <!-- CSS files will be listed here -->
	  <link href="../css/general.css"  rel="stylesheet" type="text/css" />
	  <link href="../css/view_style.css" rel="stylesheet" type="text/css" />

	  <!-- Add fa fa * icon library -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  


	<?php 
		header('Content-Type:text/html; charset=UTF-8'); // Modify the HTTP header before any output is shown to the client.
		
		 	// Start a new session with the new user

		// Function tat returns the real name of the user loged in
		function real_name() {

			require 'connect.php'; 	// Connect to the database and get client ID.
			$id = $_SESSION['user_id'];
			/*$result = mysqli_query($conn, "SELECT shopid FROM shops WHERE `shopid`='$id' ");
			if ($result !== FALSE) {
				$result = $result->fetch_all(MYSQLI_ASSOC);
			}
			$conn->close();
			return $result;()*/
			return $id;
		}

		// Check if the session was successfully set.
		if( !isset($_SESSION['user_id']) ){
			$debug_msg = "User cookie was not set!";
			header('Location: ../index.php');
		}

		// This code is for the record in which the button was clickd.
		if( isset($_POST['recordNum']) )  {
      		$id = $_POST['recordNum'];
      		require('connect.php');
      		$sql_join = mysqli_query($conn, "SELECT status FROM orders WHERE id=".$id);
      		if ($sql_join !== FALSE) {
				$rows = $sql_join->fetch_all(MYSQLI_ASSOC);
			}
			$row_cnt = $sql_join->num_rows;
			$value = $rows[0]['status']+1;
			if($value>=1 and $value <=3) {
				$sql_join = mysqli_query($conn, "UPDATE orders SET status='" . $value . "' WHERE id=".$id);
			}
    	}
	?>

	<script type="text/javascript">
		var datefield=document.createElement("input")
		    datefield.setAttribute("type", "date")
		    if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
		        document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
		        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
		        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
		    }

	   function formDefault(theInput) {
	      if (theInput.value =='') {
	         theInput.value = theInput.defaultValue;
	      }
	   }
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript">

			$(document).ready(function() {
			
			var faqTab = $('.faq-row-handle'),
		        faqTabContainer = $('.faq-row-container');
			
			if(faqTab.length){
			
				faqTab.off('click').on('click', function(){
					var faqRow = $(this).parent(),
					    faqContent = $(this).parent().find('.faq-row-content');
		            
					    faqTabContainer.find('.faq-row-content').not(faqContent).stop().slideUp('slow');
		                faqTabContainer.find('.faq-row').not(faqRow).removeClass('open');
		                
					    faqContent.stop().slideToggle('slow', function() {
							faqRow.toggleClass('open', faqContent.is(':visible'));
						});
				});
				
			}
			
		});

		// On page load close all the dedails from the records in the view
		function pageLoadFunc() {
			var faqTab = $('.faq-row-handle'),
		        faqTabContainer = $('.faq-row-container');
					var faqRow = $('.faq-row-handle').parent(),
					    faqContent = $('.faq-row-handle').parent().find('.faq-row-content');
		            
					    faqTabContainer.find('.faq-row-content').not(faqContent).stop().slideUp('slow');
		                faqTabContainer.find('.faq-row').not(faqRow).removeClass('open');
		                
					    faqContent.stop().slideToggle('slow', function() {
							faqRow.toggleClass('open', faqContent.is(':visible'));
						});
		}
	</script>
</head>
<body onload="javascript:pageLoadFunc()">
	<?php
		//require('debug_bar.php'); 		// Top bar about the error code messages.
	?>

	<?php
		require('logo_bar.php');		// Bar that contains the logo and login user profile.
	?>
	
	<?php
		require 'connect.php'; 	// Connect to the database and get client ID.
		if( isset($_POST['searchText']) ) {
			$search_keyword = $_POST['searchText'];
			//echo "SELECT * FROM orders WHERE `name` LIKE '%". $search_keyword . "%' OR `address` LIKE '%". $search_keyword . "%' ORDER BY `id` ASC";

			$sql_join = mysqli_query($conn, "SELECT * FROM orders WHERE `name` LIKE '%". $search_keyword . "%' OR `address` LIKE '%". $search_keyword . "%' ORDER BY `id` ASC");
		}else {
			if( isset($_POST['no_button']) ) {
				$sql_join = mysqli_query($conn, "SELECT * FROM orders ORDER BY `id` ASC");
			}elseif( isset($_POST['product_button']) ) {
				$sql_join = mysqli_query($conn, "SELECT * FROM orders ORDER BY `product` ASC");
			}elseif( isset($_POST['address_button']) ) {
				$sql_join = mysqli_query($conn, "SELECT * FROM orders ORDER BY `address` ASC");
			}else {
				$sql_join = mysqli_query($conn, "SELECT * FROM orders ORDER BY `status` DESC");
			}
		}


		
				
		if ($sql_join !== FALSE) {
			$rows = $sql_join->fetch_all(MYSQLI_ASSOC);
		}
		$row_cnt = $sql_join->num_rows;

		require('order_list_new.php');	// Order list.
	?>
	
	<?php
		//require('footer.php');		// Footer bar at the bottom of the page.
	?>
</body>
</html>
