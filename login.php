<?php
    include_once 'navigation.php';
?>
    <div id = "loginFormSection">
        <form action="includes/login.inc.php" method="post" id="loginForm">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <button type="submit" name="submit">Log in</button>
        </form>
        <?php
          if (isset($_GET["error"])) { //data inside url that we can see(POST we can't see)
            if ($_GET["error"]=="emptyField") {
              echo "<p>Please fill in all fields.</p>";
            }
            else if ($_GET["error"]=="incorrectUsernameOrPassword") {
              echo "<p>Incorrect Username and/or Password. Please try again.</p>";
            }
          }
         ?>
    </div>




<?php
    include_once 'footer.php';
?>
