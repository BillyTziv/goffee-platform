<div style="display: none;" id="addTicketMainBox"> <br/><br/><br/><br/><br/>
   <form method="post" action="insert.php">

      <table width="100%">
        <tr>
          <th>Είδος παραγγελίας</th>
          <th>Priority</th>
          <th>Deadline</th>
          <th>Όνομα</th>
          <th>Responsible </th>
        </tr>
        <tr>
          <td>
            <input style="texl-align: center;  padding-left: 10px;" type="text" name="taskName" placeholder="Type a title for the task..." />
          </td>

          <!-- Rating section -->
          <td>
             <select name="rating">
                <option value="1">Low priority</option>
                <option value="2">Normal priority</option>
                <option value="3">High priority</option>
             </select>
          </td>

          <!-- Deadline section -->
          <td style="padding:15px;text-align: center; ">
             <input style="text-align:center;font-size:16px;" type="date" value=<?php echo "\"".date('d/m/Y')."\""; ?> name="deadline" />
          </td>

          <!-- Entry Date-->
          <td>
            <textarea value="-" name="entryDate"></textarea>
          </td>
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
          Σχολια
           <td colspan="4">
              <textarea value="-" name="comment"></textarea>
           </td>
           <td>
              <!--<input style="width: 24px;" id="resolvedBox" type="checkbox" name="status" value="on" />-->
              <input style="color: white; background-color: rgba(255, 255, 255, 0.25);height: 46px;" id="submitButton" type="submit" name="ok" value="Submit" />
           </td>
        </tr>
         </table>
   </form>
 </div>