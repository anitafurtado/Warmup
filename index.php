
<?php
    include_once 'navigation.php';
?>
    <div id="mainContent">
        <aside id="sideBar">
            <!-- <div id="loginFormSection">
            </div> -->
            <div id="loginWelcome">
              <?php
                if (isset($_SESSION["sessionUsername"])) {
                  echo "<p>Welcome " . $_SESSION["sessionFirstName"] . "!</p>";
                }
               ?>
            </div>
            <div id="startingNote">
                <p>Need a starting note?</p>
                <div id="notes">
                    <button id="c4" data-id=261.63>C4</button>
                    <button id="d" data-id=293.66>D4</button>
                    <button id="e" data-id=329.63>E4</button>
                    <button id="f" data-id=349.23>F4</button>
                    <button id="g" data-id=392.00>G4</button>
                    <button id="a" data-id=440.00>A4</button>
                    <button id="b" data-id=493.88>B4</button>
                    <button id="c5" data-id=523.25>C5</button>
                </div>
            </div>

        </aside>

        <div id="tiles">
            <p>Revolving tiles of warmups</p>
        </div>
        <div id="important">
            <p>Why is it important to warmup?</p>
        </div>
        <!-- <div id="changingContent"></div> -->

    </div>




<?php
    include_once 'footer.php';
?>
