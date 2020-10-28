<div id="main">
	<div id="view">
		<div id="filter_section">
			<!-- Filters section -->
			<!--<div id="filter_section_button">
				<button id="filterButton" name="Προσθήκη παραγγελίας" onclick="showFilterMenu()"></button>
			</div>-->
			<div id="filter_section_menu">
				<?php require('filters.php'); ?>
			</div>

			<!-- Search section -->
			
			<div id="search_section_menu">
				<?php require('search.php'); ?>
			</div>
		</div>
			
		<div id="view_table">
				<div id="table_header_bar">
					<form method="POST" action="" >
						<!--<div class="table_header" style="width: 5%;">Νο</div>
						<div class="table_header" style="width: 14%;">
							<input type="hidden" name="product_order" value="0" />
							<input type="submit" name="product_button" value="Προιόν" />
						</div>
						<div class="table_header" style="width: 6%;">Ζάχαρη</div>
						<div class="table_header" style="width: 25%;">Διεύθυνση</div>
						<div class="table_header" style="width: 20%;">Όνομα</div>
						<div class="table_header" style="width: 15%;">Σχόλια</div>
						<div class="table_header" style="width: 10%;">Eνέργεια</div> </br></br>-->
						<button type="submit" name="no_button" id="menu_button_no" class="btn"><i class="fa fa-angle-down"></i> Νο</button>
						<button type="submit" name="product_button" id="menu_button_product" class="btn"><i class="fa fa-angle-down"></i> Προιον</button>
						<button type="submit" name="sugar_button" id="menu_button_sugar"class="btn"> Ζάχαρη</button>
						<button type="submit" name="address_button" id="menu_button_address" class="btn"><i class="fa fa-angle-down"></i> Διεύθυνση</button>
						<button type="submit" name="name_button" id="menu_button_name" class="btn"> Όνομα</button>
						<button type="submit" name="comments_button" id="menu_button_comments" class="btn"> Σχόλια</button>
						<button type="submit" name="action_button" id="menu_button_action" class="btn"> Ενέργεια</button>
					</form>
				</div>

				<?php
					for($i=0; $i<$row_cnt; $i++) {
						/*if($rows[$i]['status'] == 1) {
        					//echo "<div class=\"status_block\" id=\"status_open\"><table><tr><td>" . $rows[$i]['id'] . "</td><tr><td><a href=\"#\"> <img src=\"../images/arrow_down.png\" width=30px /> </a></td></tr></table></div>";
        					echo "<div class=\"status_block\" id=\"status_open\">" . $rows[$i]['id'] . "</div>";
							echo "<div class=\"tableRow1\">";
		                }elseif( $rows[$i]['status'] == 2) {
		                	echo "<div class=\"status_block\" id=\"status_working\"><table><tr><td>" . $rows[$i]['id'] . "</td><tr><td><a href=\"#\"> <img src=\"../images/arrow_down.png\" width=30px /> </a></td></tr></table></div>";
							echo "<div class=\"tableRow2\">";
		                }elseif( $rows[$i]['status'] == 3) {
		                	echo "<div class=\"status_block\" id=\"status_closed\"><table><tr><td>" . $rows[$i]['id'] . "</td><tr><td><a href=\"#\"> <img src=\"../images/arrow_down.png\" width=30px /> </a></td></tr></table></div>";
							echo "<div class=\"tableRow3\">";
		                }*/
		                if($i % 2 == 0) {
        					//echo "<div class=\"status_block\" id=\"status_open\"><table><tr><td>" . $rows[$i]['id'] . "</td><tr><td><a href=\"#\"> <img src=\"../images/arrow_down.png\" width=30px /> </a></td></tr></table></div>";
        					
							echo "<div class=\"order_record_odd\">";
							echo "<div class=\"status_block\" style=\"margin: auto 2px auto 0px;width: 5%;\">" . $rows[$i]['id'] . "</div>";
		                }else {
        					
							echo "<div class=\"order_record_even\">";
							echo "<div class=\"status_block\" style=\"margin: auto 2px auto 0px;width: 5%;\" >" . $rows[$i]['id'] . "</div>";
		                }

						echo "<div class=\"tableCol\" style=\"//background: purple; width: 15%; margin: auto 2px auto 2px;\">" . $rows[$i]['product']. "</div>";
    					echo "<div class=\"tableCol\" style=\"//background: green;width: 10%; margin: auto 2px auto 2px;\">" . $rows[$i]['sugar']. "</div>";
    					echo "<div class=\"tableCol\" style=\"//background: orange;width: 20%; margin: auto 2px auto 2px;\">" . $rows[$i]['address']. "</div>";
						echo "<div class=\"tableCol\" style=\"//background: black;width: 15%; margin: auto 2px auto 2px;\">" . str_replace("-","/",$rows[$i]['name']) . "</div>";
						echo "<div class=\"tableCol\" style=\"//background: green;width: 23%; margin: auto 2px auto 2px;\">" . str_replace("-","/",$rows[$i]['comment']) . "</div>";
				?>
						<div class="tableCol"  style="width: 10%; margin: auto 2px auto 2px;">
							<form action="" method="post">
								<input type="hidden" name="recordNum" value="<?php echo $rows[$i]['id']; ?>" />
								<?php
									if($rows[$i]['status'] == 1) {
					                	echo "<input type=\"image\" src=\"../images/red_button.png\"  />";
					                	//echo "<input type=\"hidden\" name="debug_msg" value=$debug_msg />
					                	//$debug_msg = "Η παραγγελία με αριθμό " . $rows[$i]['id'] . "βρίσκεται σε αναμονή.";
					                }elseif( $rows[$i]['status'] == 2) {
					                	echo "<input type=\"image\" src=\"../images/orange_button.png\"  />";
							            //$debug_msg = "Η παραγγελία με αριθμό " . $rows[$i]['id'] . "βρίσκεται σε εξέλιξη.";
					                }elseif( $rows[$i]['status'] == 3) {
					                	echo "<input type=\"image\" src=\"../images/green_button.png\" />";
					                	//$debug_msg = "Η παραγγελία με αριθμό " . $rows[$i]['id'] . "ολοκληρώθηκε.";
					                }
		        				?>	
							</form>
						</div>
					</div>
				<?php
					}
				?>
		</div>
	</div>
	</div> <!-- end of main div element -->
<?php //include('footer.php'); ?>