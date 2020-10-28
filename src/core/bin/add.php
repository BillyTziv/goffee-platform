<!DOCTYPE html>
<html>
   <head>
      <?php include('head.php'); ?>
      <link href="../css/add_style.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <?php include('mainHeader.php'); ?>
      <div id="main"> 
         <div id="pageTitle">
            <div id="pageTitleInner">New Task</div>
         </div>
         
         <div id="add_main_inside">   
            <?php 
               if(isset($sql)){ 
                  $res = mysql_result($sql, 0, 0); 
               } 
            ?>
            <div id="step2_data">
               <form method="post" action="insert.php">
                  <table cellspacing="10">
                     <tr id="datesHeader">
                        <th style="font-size: 22px;text-align: center;">Entry Date </th>
                        <th style="font-size: 22px;text-align: center;">Deadline</th>
                     </tr>
                     <tr id="datesText">
                        <td style="padding:15px;text-align: center; ">
                           <input style="text-align:center;font-size:16px;" type="date" value=<?php echo "\"".date('d/m/Y')."\""; ?> name="entyDate" />
                        </td>
                        <td style="padding:15px;text-align: center; ">
                           <input style="text-align:center;font-size:16px;" type="date" value=<?php echo "\"".date('d/m/Y')."\""; ?> name="deadline" />
                           
                        </td>
                     </tr>
                  </table >
                     <table>
                        <tr>
                           <th>Responsible:</th>
                           <td>
                              <?php
                                 $responsible = "SELECT realName FROM Users ";
                                 $result1 = mysqli_query ($conn, $responsible) or die("Error");
                              ?>
                              <select name="responsible">
                                 <option value=""></option>
                                 <?php
                                    while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
                                       echo "<option value='".$row[realName]."'>".$row[realName]."</option>";
                                    }
                                 ?>
                              </select>
                           </td>
                        </tr>
                     
                     
                        <tr>
                           <th>Task Name: </th>
                           <td>
                              <?php
                                 if ( empty($res) && empty($res) ) {
                              ?>
                                    <input type="text" name="taskName" />
                              <?php
                                 }else {
                              ?>
                                    <?php echo $taskName = mysqli_query ($conn, $sql) or die("Error"); ?>
                                    <input type="hidden" name="taskName" <?php echo "value='".$taskName."' " ?> />
                              <?php
                                 }
                              ?>
                           </td>
                        </tr>
                        
                        <tr>
                           <th>Rating(1-3): </th>
                           <td>
                              <?php
                                 if ( empty($res) && empty($res) ) {
                              ?>
                                    <input type="text" name="rating" />
                              <?php
                                 }else {
                              ?>
                                    <?php echo $rating = mysql_result($sql, 0, 2); ?>
                                    <input type="hidden" name="rating" <?php echo "value='".$rating."' " ?> />
                              <?php
                                 }
                              ?>
                           </td>
                        </tr>
                        
                     
                       
                        <tr>
                           <th>Comments</th>
                           <td>
                              <textarea value="-" name="comment"></textarea>
                           </td>
                        </tr>
                        <tr>
                           <th> Failure resolved</th>
                           <td>
                              <input type="checkbox" name="status" value="on" />
                           </td>
                        </tr>
                     </table>
                     <table>
                        <tr>
                           <td>
                                 <input id="submitButton" type="submit" name="ok" value="Submit" />
                           </td>
                        </tr>
                     </table>
               </form>
            </div> 
         </div> 
      </div> <!-- End of main div --><br><br><br>
      
      <?php //include('footer.php'); ?>
   </body> 
</html>
