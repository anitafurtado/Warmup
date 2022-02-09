<?php
    include_once 'navigation.php';
    include_once 'includes/allwarmups.inc.php'
?>

<div id="allWarmupsSection">
  <?php
    if (isset($_SESSION["allData"])) {
      for($i=0; $i<count($_SESSION["allData"]); $i++){
        ?>
        <div class="warmup-entry">
          <p class="warmup-name"><?php echo $_SESSION["allData"][$i][1]; ?></p>
          <audio class="warmup-audio" src="<?php echo $_SESSION["allData"][$i][5] ?>" controls>

          </audio>
          <p class=warmup-star>&#11088;</p>
        </div>
        <?php
      }
    }
   ?>

</div>
<?php
  if (isset($_GET["error"])) { //data inside url that we can see(POST we can't see)
    if ($_GET["error"]=="statementFailed") {
      echo "<p>An error occured, please try again later.</p>";
    }
    else if ($_GET["error"]=="noData") {
      echo "<p>An error occured, please try again later.</p>";
    }
  }
 ?>



<?php
    include_once 'footer.php';
?>
