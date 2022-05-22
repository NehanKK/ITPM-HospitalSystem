<?php
session_start();
?>

<html lang="en">

<head>
    <title>Bogger Loging</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php  
if (isset($_REQUEST["submit1"])) {
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    require_once "dbConnect.php";
    $queryLogin = "SELECT * FROM user WHERE email='$email'";
    $result = $conn -> query($queryLogin);
     if (($result -> num_rows) == 1) {
         $dataSet = $result -> fetch_array(MYSQLI_ASSOC);
         if (password_verify($password, $dataSet["password"])) {
             $_SESSION["f_name"] = $dataSet["f_name"];
              header("Location: editBlog.php");
             exit();
         } else {
             echo "<script>alert('Invalid Email or Password!');</script>"; 
         }
     }
     else {
         echo "<script>alert('Invalid Email or Password!');</script>"; 
         // $_SESSION["loginFail"] = "Invalid username or password!";
         // header("Location: login.php");
         exit();
     }
}
?>

<body>
<h1>Bolgger Login</h1>

<?php

if (isset($_SESSION["signupSuccess"])) {
    echo "<div>" . $_SESSION["signupSuccess"] . "</div>";
    session_destroy();
}
if (isset($_SESSION["loginFail"])) {
    echo "<div>" . $_SESSION["loginFail"] . "</div>";
    session_destroy();
}

?>

<p>Please fill the form below and click Login!</p>
<div class="form-input">
    <form  method="post">

        <input name="email" placeholder="E-Mail Address" value="email" type="text" title="Email will be used as your login username." required>

        <input name="password" placeholder="Password" value="password" type="password" title="Password" required>

        <input name="submit1" type="submit" value="Login">
        <!-- name="submit" -->
    </form>

</div>

</body>

</html>