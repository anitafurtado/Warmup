<?php
    include_once 'navigation.php';
?>
    <div id="signUpSection">
        <form action="includes/signup.inc.php" method="post" id="signUpForm">
          <input type="text" name="firstName" placeholder="First Name">
          <input type="text" name="lastName" placeholder="Last Name">
          <input type="text" name="email" placeholder="Email">
          <input type="text" name="username" placeholder="Username">
          <input type="password" name="password" placeholder="Password">
          <input type="password" name="reenterPass" placeholder="Re-Enter Password">
          <button type="submit" name="submit">Sign up</button>
        </form>
        <?php
          if (isset($_GET["error"])) { //data inside url that we can see(POST we can't see)
            if ($_GET["error"]=="emptyField") {
              echo "<p>Please fill in all fields.</p>";
            }
            else if ($_GET["error"]=="invalidEmail") {
              echo "<p>Please enter valid email.</p>";
            }
            else if ($_GET["error"]=="passwordsDoNotMatch") {
              echo "<p>Your passwords do not match.</p>";
            }
            else if ($_GET["error"]=="passwordLengthInvalid") {
              echo "<p>Please ensure your password is 8 characters or more.</p>";
            }
            else if ($_GET["error"]=="usernameAlreadyExists") {
              echo "<p>This username already exists, please enter a new username.</p>";
            }
            else if ($_GET["error"]=="statementFailed") {
              echo "<p>An error occured, please try again later.</p>";
            }
            else if ($_GET["error"]=="none") {
              echo "<p>Sign up successful! Welcome!</p>";
            }
          }
         ?>
    </div>




<?php
    include_once 'footer.php';
?>
