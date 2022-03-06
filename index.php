<?php

// set cookie

$cookie_name = "user";
$cookie_value = "Ali Abdu";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <!-- _REQUEST -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>
<br/>

<!-- get -->
<a href="index.php?subject=PHP&web=W3schools.com">GET</a>

<br>
<!-- post -->
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Name: <input type="text" name="fname">
  <input type="submit">
</form>

<!-- files -->
    <form action="" method="post" enctype="multipart/form-data">
    <p>Pictures:
    <input type="file" name="pictures[]" />
    <input type="file" name="pictures[]" />
    <input type="file" name="pictures[]" />
    <input type="submit" value="Send" />
    </p>
    </form>

    <?php
    echo "hello ali";

    // GLOBALS

    $x = 75;
    $y = 25;
    
    function addition() {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
    }
    
    addition();
    echo '<br/>'.$z;

    // server -----------------------------------

    echo "<br>";
    echo $_SERVER['PHP_SELF'];
    echo "<br>";
    echo $_SERVER['SERVER_NAME'];
    echo "<br>";
    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    // echo $_SERVER['HTTP_REFERER'];
    echo "<br>";
    echo $_SERVER['HTTP_USER_AGENT'];
    echo "<br>";
    echo $_SERVER['SCRIPT_NAME'];

    // $_REQUEST--------------------
    echo "<br>";
    echo "<br>";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $name = $_REQUEST['fname'];
        if (empty($name)) {
          echo "Name is empty";
        } else {
          echo $name;
        }
      }

    // $GET--------------------
    echo "<br>";

    echo "Study " . $_GET['subject'] . " at " . $_GET['web'];

  // $POST --------------------
  echo "<br>";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['fname'];
    if (empty($name)) {
      echo "Name is empty";
    } else {
      echo $name;
    }
  }

  // session ------------------------------------

   // Set session variables
    $_SESSION["favcolor"] = "green";
    $_SESSION["favanimal"] = "cat";
    echo "Session variables are set.";
    echo "<br>";

    print_r($_SESSION);

    // cookie -----------------------------------------
    echo "<br>";


    if(!isset($_COOKIE[$cookie_name])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
      } else {
        echo "Cookie '" . $cookie_name . "' is set!<br>";
        echo "Value is: " . $_COOKIE[$cookie_name];
      }

      // file -----------------------------------
      echo "<br>";
      echo "<br>";

      echo readfile("ali.txt");

      // $_Files ------------------------------------------

      foreach ($_FILES["pictures"]["error"] as $key => $error) {
          if ($error == UPLOAD_ERR_OK) {
              $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
              // basename() may prevent filesystem traversal attacks;
              // further validation/sanitation of the filename may be appropriate
              $name = basename($_FILES["pictures"]["name"][$key]);
              move_uploaded_file($tmp_name, "data/$name");
          }
      }


      // _ENV -----------------------------------
      echo "<br>";
      echo "<br>";


      echo 'My username is ' .$_ENV["USER"] . '!';


    ?>

</body>
</html>