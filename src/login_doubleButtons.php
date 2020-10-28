<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  /* Split the screen in half */
  .split {
    height: 100%;
    width: 50%;
    position: fixed;
    z-index: 1;
    top: 0;
    overflow-x: hidden;
    padding-top: 20px;
  }

  /* Control the left side */
  .left {
    left: 0;
    //background: #c8341e;
  }

  /* Control the right side */
  .right {
    right: 0;
    //background-color: #d2eff2;
  }

  /* If you want the content centered horizontally and vertically */
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }

  /* Style the image inside the centered container, if needed */
  .centered img {
    width: 150px;
    border-radius: 50%;
  }

  a {
    text-decoration: none;
    color: black;
    font-family: Tahoma;
    font-size: 20px;
  }

  a:hover {
    color: #f2f2f2;
  }
  </style>
<style>

  body {font-family: Arial, Helvetica, sans-serif;
      margin: 0px;
   padding: 0px;
  }
#splitscreen {
   position: fixed;
   background: linear-gradient(45deg, #214DD1, #D13921);
   height: 100%;
   width: 100%;

}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #3352ad;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: #919dc1 1px solid;
    cursor: pointer;
    width: 100%;
    border-radius: 35px;
    font-family: Tahoma;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

</head>
<body>
  <div id="splitscreen">
<div class="split left">
  <div class="centered">
    <img src="images/shoplogin.png"  alt="Avatar woman">
    <h2>Ιδιοκτήτες καταστημάτων</h2>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Είσοδος</button>
  </div>
</div>

<div class="split right">
  <div class="centered">
    <img src="images/userlogin.png" alt="Avatar man">
    <h2>Χρήστες Υπηρεσίας</h2>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Είσοδος</button>
  </div>
</div>



<div id="id01" class="modal">
  
  <form class="modal-content animate" action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Όνομα Χρήστη: </b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Κωδικός Πρόσβασης: </b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit">Είσοδος</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Θυμήσου με
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Ακύρωση</button>
      <span class="psw">Ξέχασα <a href="#">τον κωδικό μου?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  </div>

</body>
</html>

