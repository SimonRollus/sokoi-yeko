<?php include("head.php") ?>
  <?php if ($_GET["type"] == "up") {
          include("signup.php");
        } elseif ($_GET["type"] == "in") {
          include("signin.php");
        }
        include("foot.php") ?>
