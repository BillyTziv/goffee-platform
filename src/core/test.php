<!DOCTYPE html>
<html>
<head>
  <?php session_start(); ?>

  <title>GOFFEE</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Add a favicon at the tab of the website -->
  <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>

  <!-- CSS files will be listed here -->
  <link href="../css/general.css"  rel="stylesheet" type="text/css" />

  <?php
    header('Content-Type:text/html; charset=UTF-8');
    require('functions.php');
    
  ?>
</head>
<body>

  <?php
    require('logo_bar.php');    // Bar that contains the logo and login user profile.
  ?>
  

</body>
</html>
