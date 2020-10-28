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
                    <button type="submit" name="no_button" id="menu_button_no" class="btn"><i class="fa fa-angle-down"></i>Νο</button><!--
                    --><button type="submit" name="product_button" id="menu_button_product" class="btn"><i class="fa fa-angle-down"></i>Προιον</button><!--
                    --><button type="submit" name="sugar_button" id="menu_button_sugar"class="btn">Ζάχαρη</button><!--
                    --><button type="submit" name="name_button" id="menu_button_name" class="btn">Όνομα</button><!--
                    --><button type="submit" name="action_button" id="menu_button_action" class="btn">Ενέργεια</button>
                </form>
            </div>
             <div class="faq-row-container">
    <?php
    for($i=0; $i<$row_cnt; $i++) {
    ?>
        <div class="faq-row open">
            <a href="javascript:;" class="faq-row-handle">
                <?php
                    if($i % 2 == 0) {                          
                        echo "<div class=\"order_record_odd\">";
                        echo "<div class=\"status_block\" style=\"//background: red; width: 15%;\">" . $rows[$i]['id'] . "</div>";
                    }else {
                        echo "<div class=\"order_record_even\">";
                        echo "<div class=\"status_block\" style=\"//background: red; width: 15%;\" >" . $rows[$i]['id'] . "</div>";
                    }
                   
                    echo "<div class=\"tableCol\" style=\"//background: purple; width: 25%;\">" . $rows[$i]['product']. "</div>";
                    echo "<div class=\"tableCol\" style=\"//background: green; width: 10%;\">" . $rows[$i]['sugar']. "</div>";
                    echo "<div class=\"tableCol\" style=\"//background: black; width: 35%;\">" . str_replace("-","/",$rows[$i]['name']) . "</div>";
                ?>

                <div class="actionButton">
                    <form action="" method="post">
                        <input type="hidden" name="recordNum" value="<?php echo $rows[$i]['id']; ?>" />
                        <?php
                            if($rows[$i]['status'] == 1) {
                                echo "<input type=\"submit\" value=\"Ανοιχτή\" style=\"background: darkred;\" />";
                                //echo "<input type=\"hidden\" name="debug_msg" value=$debug_msg />
                                //$debug_msg = "Η παραγγελία με αριθμό " . $rows[$i]['id'] . "βρίσκεται σε αναμονή.";
                            }elseif( $rows[$i]['status'] == 2) {
                                echo "<input type=\"submit\" value=\"Σε εξέλιξη\" style=\"background: darkorange;\" />";
                                //$debug_msg = "Η παραγγελία με αριθμό " . $rows[$i]['id'] . "βρίσκεται σε εξέλιξη.";
                            }elseif( $rows[$i]['status'] == 3) {
                                echo "<input type=\"submit\" value=\"Ολοκληρωμένη\" style=\"background: darkgreen;\" />";
                                //$debug_msg = "Η παραγγελία με αριθμό " . $rows[$i]['id'] . "ολοκληρώθηκε.";
                            }
                        ?>
                    </form>
                </div>
            </a>

            <div class="faq-row-content" style="display:block;">
                <?php
                    echo "<div style=\"width: 100%; height: 50px; background: rgba(0, 0, 0, 0.85); color: white;\"> Διεύθυνση: " . $rows[$i]['address']. "</div>";
                    echo "<div style=\"width: 100%; height: 50px; background: rgba(0, 0, 0, 0.85); color: white;\"> Σχόλια: " . str_replace("-","/",$rows[$i]['comment']) . "</div>";
                ?>
            </div>
        </div>
    </div>
    <?php
        }
    ?>
</div>
        </div>
    </div> <!-- view -->
</div> <!-- main -->
<?php //include('footer.php'); ?>