<?php
// Contains functions in PHP language which are commonly used.

// Return the real name of the user input
function real_name() {
  require 'connect.php';  // Connect to the database and get client ID.
  $id = $_SESSION['user_id'];
  /*$result = mysqli_query($conn, "SELECT shopid FROM shops WHERE `shopid`='$id' ");
  if ($result !== FALSE) {
    $result = $result->fetch_all(MYSQLI_ASSOC);
  }
  $conn->close();
  return $result;()*/
  return $id;
}

?>