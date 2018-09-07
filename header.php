<link rel="stylesheet" href="styles/header.css">
<header>
  <div class="logo"> <!-- LOGO -->
    <p>
      <span>Y</span>
      <span>E</span>
      <span>K</span>
      <span>O</span>
    </p>
  </div>
  <?php

    if (!isset($_SESSION["is_logged"])) {
      $_SESSION["is_logged"] = false;
    }

    if ($_SESSION["is_logged"] == true) {
      echo "<ul class=\"menu\"> <!-- Menu -->
        <li>Explorer</li>
        <li>Forum</li>
        <li>Kingdom</li>
        <li>". $_SESSION["username"]."</li>
      </ul>
      <i class=\"fas fa-cog gear\" onclick=\"optionsScript()\"></i>";
    } else {
      echo  "<ul class=\"menu\"> <!-- Menu -->
        <li>Explorer</li>
        <li>Forum</li>
      </ul>
      <div class=\"sign\"> <!-- Sign -->
        <p><a href=\"sign.php?type=in\"><b>Sign in</b></a> <i style=\"margin-right: 2px; color: #555\">or</i><a href=\"sign.php?type=up\"><b> Sign up</b></a></p>
      </div>";
    }

  ?>

  <ul class="options">
    <li>Options</li>
    <li><a href="signout.php">Sign out</a></li>
  </ul>
</header>
<script type="text/javascript">

var options = document.querySelector(".options"),
    gear = document.querySelector(".gear");

  function optionsScript() {
        gear.style.animation = "round 1s"
        turnVisiblity(options);
  }

  function turnVisiblity(object) {
    var visibility = getComputedStyle(object).visibility;
    if (visibility == "hidden") {
      object.style.visibility = "visible";
    } else {
      object.style.visibility = "hidden";
    }
  }
</script>
