<?php
  session_start();
  if (isset($_POST["email"]) and  !empty($_POST["email"])) {
    if (isset($_POST["password"]) and  !empty($_POST["password"])) {
      $bdd = mysqli_connect("localhost", "root", "", "sokoi");

      $query = "SELECT `password` FROM `members` WHERE `email` ='". $_POST["email"] . "'";

      $result = mysqli_query($bdd, $query);

      $line = mysqli_fetch_array($result, MYSQLI_ASSOC);

      if (password_verify($_POST["password"], $line["password"])) {

        $query = "SELECT `username` FROM `members` WHERE `email` ='". $_POST["email"] . "'";

        $result = mysqli_query($bdd, $query);

        $line = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $_SESSION["username"] = $line["username"];
        $_SESSION["is_logged"] = true;
        header("Location: index.php");
      }
    }
  }

 ?>
<link rel="stylesheet" href="styles/sign.css">
<form class="" action="sign.php?type=in" method="post">
  <h1>Sign in</h1>
  <label for="email">Email</label>
  <input type="email" name="email" value="">
  <br>
  <label for="password">Password</label>
  <input type="password" name="password" value="">
  <br>
  <p class="note">You don't have an account, <a href="sign.php?type=up">sign up.</a></p>
  <input type="submit" name="send" id="send" value="Sign in">
</form>
