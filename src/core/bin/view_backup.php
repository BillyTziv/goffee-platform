<!DOCTYPE html>
<html>
	<head>
		<?php include('head.php'); ?>
		  <link href="../css/view_style.css" rel="stylesheet" type="text/css" />
		<?php
		if( isset($_POST['recordNum']) )  {
        	        $id = $_POST['recordNum'];
                	$sql_join = mysqli_query($conn, "UPDATE Tasks SET status='1' WHERE id=".$id);
			
	        }?>

	</head>
	<body>
		<?php include('mainHeader.php'); ?>


		<div id="main">
			<div id="pageTitle">
				<div id="pageTitleInner">Tasks</div>
			</div> 
			<div id="view">
				<?php
					header('Content-Type:text/html; charset=UTF-8');
					/* Σύνδεση με την βάση */
					require 'connect.php';
					
					/*if( isset($_POST['respName']) && isset($_POST['viewType']) ) {
						echo "Both fields have something!";
						echo "1".$_POST['respName'];
						echo "2".$_POST['viewType'];
						echo "SELECT * FROM Tasks WHERE `person`=".$_POST['respName'];
						if($_POST['viewType'] == "all") {
                                                        $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `person`='".$_POST['respName']."'");
                                                }else if($_POST['viewType'] == "active") {
                                                        $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0' AND `person`='".$_POST['respName']."'");
                                                }else if($_POST['viewType'] == "resolved") {
                                                        $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='1' AND `person`='".$_POST['respName']."'");
                                                }
                                        }else*/
					if( isset($_POST['viewType']) ) {
						//echo $_POST['viewType'];
                                                        if($_POST['viewType'] == "all") {
                                                                $sql_join = mysqli_query($conn, "SELECT * FROM Tasks");
                                                        }else if($_POST['viewType'] == "active") {
                                                                $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='0'");
                                                        }else if($_POST['viewType'] == "resolved") {
                                                                $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `status`='1'");
                                                        }

/*elseif( isset($_POST['respName'])  ) {
                                                echo $_POST['respName'];
                                                        if($_POST['respName'] == "johny") {
                                                                $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `person`='Giannis Tzoumpas'");
                                                        }else if($_POST['respName'] == "billy") {
                                                                $sql_join = mysqli_query($conn, "SELECT * FROM Tasks WHERE `person`='Vasilis Tzivaras'");
                                                        }
                                        */}else {
						//echo "General category I am getting everything!!!"; 
                                                $sql_join = mysqli_query($conn, " SELECT * FROM Tasks WHERE `status`='0'");
                                        }
                                        if ($sql_join !== FALSE) {
                                      		$rows = $sql_join->fetch_all(MYSQLI_ASSOC);
                                        }
                                        $row_cnt = $sql_join->num_rows;

				    //printf("Result set has %d rows.\n", $row_cnt);
				    $conn->close();
				?>
				<form action="" method="POST">

					<table>
						<tr>
							<td>
								<img src="../images/filter.png" width="32px"/>
							</td>
							<td style="width:20px;"></td>
							<td><strong>View:</strong></td>
							<td style="width:20px;"></td>
							<td> 
								<select style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;padding-left: 10px;" name="viewType">
									<option style="color: black;font-size: 14px;" value="active">Active Tasks</option>
									<option style="color: black;font-size: 14px;" value="all">All Tasks</option>
									<option style="color: black;font-size: 14px;" value="resolved">Resolved tasks</option>
								</select>
							</td>
							<td style="width:20px;"></td>
                                                        <td><strong>as:</strong></td> 
                                                        <td style="width:20px;"></td>

							<td style="width: 120px;">
								<select style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;padding-left: 10px;" name="respName">
									<option style="color: black;font-size: 14px;" value="Vasilis Tzivaras">Billy</option>
									<option style="color: black;font-size: 14px;" value="Giannis Tzoumpas">Johny</option>
								</select>
							</td>
<td>
                                                                <input style="height:32px;background-color: white;border-color: darkgrey;color: black;font-size: 14px;font-weight: bold;width: 100px;border-radius: 5px" type="submit" value="Update">
                                                        </td>

						</tr>
					</table></br>
				  
				</form>

				<div id="view_table">
					<table style="width: 1000px" >
						<tr>
							
							<th class="table_headers" >ID</th>
							<th class="table_headers" >Task Name</th>
							<th class="table_headers" >Deadline</th>
							<th class="table_headers" >Person</th>
							<th class="table_headers" >Entry Date</th>
							<th class="table_headers" >Comments</th>
							<th class="table_headers" >Status</th>
							<th class="table_headers" >Actions</th>
						</tr>
						
						<?php
							for($i=0; $i<$row_cnt; $i++) {
								if($rows[$i]['rating'] == 1) {
									echo "<tr style=\"background-color: #DDFFE0;\">";
									echo "<td style=\"background: #50ce2d;color: darkblue;padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['id']. "</b></td>"; 
								}elseif( $rows[$i]['rating'] == 2) {
									echo "<tr style=\"background-color: #fff1dd;\">";
									echo "<td style=\"background: #e2890b;color: darkblue;padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['id']. "</b></td>"; 
								}elseif( $rows[$i]['rating'] == 3) {
                                                                        echo "<tr style=\"background-color: #ffdddd;\">";
                                                                        echo "<td style=\"background: #e50909;color: darkblue;padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['id']. "</b></td>";
                                                                }else {
									echo "<tr style=\"background-color: black;\">";
                                                                        echo "<td style=\"background: #d8a2a2;color: darkblue;padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['id']. "</b></td>";
                                                                }

									 
                                                                         echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['taskName'] . "</td>";
                                                                         echo "<td style=\"color: darkred;padding: 0px 10px 0px 10px;\"><b>" . str_replace("-","/",$rows[$i]['deadline']) . "</b></td>";
                                                                         echo "<td style=\"padding: 0px 10px 0px 10px;\">" . $rows[$i]['person'] . "</td>";
									 echo "<td style=\"padding: 0px 15px 0px 15px;\">" . str_replace("-","/",$rows[$i]['entryDate']) . "</td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['comment'] . "</b></td>";
									 echo "<td style=\"padding: 0px 10px 0px 10px;\"><b>" . $rows[$i]['status'] . "</b></td>";

								?> 
								
								<td>
								<table>
									<tr>
										<td style="width:35px;">
											<form action="edit.php" method="post">
												<input type="hidden" name="recordNum" value="<?php echo $rows[$i]['id']; ?>" />
												<input type="image" src="../images/edit.png" height=25px width=25px />
											</form>
										</td>
										<td style="width:35px;">
											<form action="" method="post">
												<input type="hidden" name="recordNum" value="<?php echo $rows[$i]['id']; ?>" />
												<input type="image" src="../images/resolve.png" height=25px width=25px />
											</form>
										</td>
									</tr>
								</table>
								</td>
						</tr><?php
						}
						?>
					</table>
				</div>
				
			</div>
		</div> <!-- end of main div element -->

		<?php //include('footer.php'); ?>
	</body>
</html>
