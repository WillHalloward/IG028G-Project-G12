<?php session_start(); ?>
<div>
    <?php
    if (isset($_SESSION['anvandarid'])) {
        echo '<form action="includes/logout.inc.php" method="Post"> <button type="submit" name="logout-submit">Logga ut</button> </form> ';
    } else {
        echo '<form action="includes/login.inc.php" method="Post"> <input type="text" name="anvandarnamn" placeholder = "Anvandarnamn"> <input type="password" name="losenord" placeholder = "losenord"> <button type="submit" name="login-submit">Logga in</button> </form> <a href="skapa_användare.php">Skapa anvandare</a> ';
    }
    ?>
</div>