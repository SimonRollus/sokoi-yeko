<?php

session_start();

if (isset($_POST["email"]) and  !empty($_POST["email"])) {
  if (isset($_POST["username"]) and  !empty($_POST["username"])) {
    if (isset($_POST["password"]) and  !empty($_POST["password"])) {
      if (isset($_POST["password2"]) and  !empty($_POST["password2"])) {
        $bdd = mysqli_connect("localhost", "root", "", "sokoi");

        $query = "SELECT `id` FROM `members` WHERE `email` ='". $_POST["email"] . "'";

        $result = mysqli_query($bdd, $query);

        $email_already_used = false;

        while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          $email_already_used = true;
        }

        if (!$email_already_used) {
          $query = "SELECT `id` FROM `members` WHERE `username` ='". $_POST["username"] . "'";

          $result = mysqli_query($bdd, $query);

          $username_already_used = false;

          while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $username_already_used = true;
          }

          if (!$username_already_used) {
            if ($_POST["password"] == $_POST["password2"]) {
              $query = "INSERT INTO `members`(`username`, `password`, `email`, `isValidated`) VALUES ('". $_POST['username']."','". password_hash($_POST['password'], PASSWORD_DEFAULT) ."','". $_POST['email'] ."', 0)";
              mysqli_query($bdd, $query);
              $_SESSION["username"] = $_POST["username"];
              $_SESSION["is_logged"] = true;
              header("Location: index.php");
            } else {
              echo "Passwords don't match";
            }
          } else {
            echo "Username already took";
          }
        } else {
          echo "Email already used";
        }
      }
    }
  }
}


?>

<link rel="stylesheet" href="styles/sign.css">
<form class="" action="sign.php?type=up" method="post">
  <h1>Sign up</h1>
  <label for="email">Email<span style="color: var(--red)">*</span></label>
  <input type="email" name="email" value="">
  <br>
  <label for="username">Username<span style="color: var(--red)">*</span></label>
  <input type="text" name="username" value="">
  <br>
  <label for="password">Password<span style="color: var(--red)">*</span></label>
  <input type="password" name="password" value="">
  <br>
  <label for="password2">Retype your password<span style="color: var(--red)">*</span></label>
  <input type="password" name="password2" value="">
  <br>
  <p class="note">You've already an account, <a href="sign.php?type=in">sign in.</a></p>
  <input type="submit" name="send" id="send" value="Sign up">
</form>
