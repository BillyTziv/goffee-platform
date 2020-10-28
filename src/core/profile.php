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
  <link href="../css/profile_style.css" rel="stylesheet" type="text/css" />

  <!-- Add fa fa * icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    .profileMainBox label, h2 {
      color: white;
    }

    #updateMessage {
      color: #24C81E;
      font-family: Tahoma;
      font-size: 16px;
      text-align: center;
    }
  </style>

  <?php
    header('Content-Type:text/html; charset=UTF-8');
    require('functions.php');
    

    // Check if the session was successfully set.
    if( !isset($_SESSION['user_id']) ){
      $debug_msg = "User cookie was not set!";
      header('Location: ../index.php');
    }

    if( isset($_POST['recordNum']) )  {
          $id = $_POST['recordNum'];
          
          $sql_join = mysqli_query($conn, "SELECT status FROM orders WHERE id=".$id);
          if ($sql_join !== FALSE) {
        $rows = $sql_join->fetch_all(MYSQLI_ASSOC);
      }
      $row_cnt = $sql_join->num_rows;
      $value = $rows[0]['status']+1;
      if($value>=1 and $value <=3) {
        $sql_join = mysqli_query($conn, "UPDATE clients SET coffee='" . $field_coffee . "', address='" . $field_address . "', sugar='" . $field_sugar . "', comments='" . $field_comments . "' WHERE username=".$username);
      }
      }
      if(isset($_POST['field_coffee'])) {
              require 'connect.php';  // Connect to the database and get client ID.

        $updQuery = "UPDATE clients SET coffee='" . $_POST['field_coffee'] . "', address='" . $_POST['field_address'] . "', sugar='" . $_POST['field_sugar'] . "', comments='" . $_POST['field_comments'] . "' WHERE username='".$_SESSION['user_id']."'";
        $sql_join = mysqli_query($conn, $updQuery);
        if ($sql_join == FALSE) {
          $updateStatus = "Ουπς, κάτι πήγε στραβά. Προσπάθησε ξανά ή ανέφερε τον κωδικό σφάλματος $325423";
        }else {
          $updateStatus = "Η ανανέωση ολοκληρώθηκε επιτυχώς!";
        }
      }

  ?>
</head>
<body>
  <?php
    //require('debug_bar.php');     // Top bar about the error code messages.
  ?>

  <?php
    require('logo_bar.php');    // Bar that contains the logo and login user profile.
  ?>
  
  <?php
    require 'connect.php';  // Connect to the database and get client ID.

    
    $user_id = $_SESSION['user_id'];
    //echo "SELECT * FROM clients WHERE `username`=='$user_id'";
    $sql_join = mysqli_query($conn, "SELECT * FROM clients WHERE username='$user_id'");
    if ($sql_join !== FALSE) {
      $rows = $sql_join->fetch_all(MYSQLI_ASSOC);
    }
    $row_cnt = $sql_join->num_rows;
    $username =  $rows[0]['username'];
    $email =  $rows[0]['email'];
    $coffee =  $rows[0]['coffee'];
    $sugar =  $rows[0]['sugar'];
    $address =  $rows[0]['address'];
    $comments =  $rows[0]['comments'];
    $profile_image = $rows[0]['profile_image'];
   ?>
   <div class="profileMainBox">
    <div class="container">
      <h2>Προφίλ του χρήστη: <?php echo $username; ?></h2> </br> </br>
      <div class="row">
          <div class="col-xs-4" style="height: 420px; line-height: 420px; text-align: center; ">
            <img class="img-thumbnail" class="img-responsive" src="../profileImages/<?php echo $profile_image; ?>"  alt="Profile"> 
          </div>
          <div class="col-xs-6" >
              <form  action="" method="post" >
                <div class="form-group">
                  <label for="usr">Τύπος Καφέ: </label>
                  <input type="text" class="form-control" id="field_coffee" name="field_coffee" value="<?php echo $coffee; ?>">
                </div>
                <div class="form-group">
                  <label for="pwd">Ποσότητα ζάχαρης: </label>
                  <input type="text" class="form-control" name="field_sugar"  value="<?php echo $sugar; ?>" id="field_sugar" >
                </div>
                <div class="form-group">
                  <label for="usr">Διεύθυνση: </label>
                  <input type="text" class="form-control" name="field_address" id="field_address" value="<?php echo $address; ?>" >
                </div>
                
                <div class="form-group">
                  <label for="pwd">Σχόλια: </label>
                  <textarea class="form-control" rows="5" name="field_comments" id="field_comment"><?php echo $comments; ?></textarea>
                </div>
                <div class="form-group">
                  <input type="submit"  class="form-control" id="submit" value="Ενημέρωση" />
                </div>
              </form>
              <?php if( isset($updateStatus)) {
                echo "<span id=\"updateMessage\">$updateStatus</span>";
              } ?>
          </div>
      </div> 
    </div>
  </div>
  <?php //require('footer.php'); ?>
</body>
</html>
