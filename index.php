<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>
<body>
<header>

<h1>This is a heading</h1>
<p>This is a paragraph.</p>
<div>
<?php
    if(isset($_SESSION['anvandarid']))
    {
        echo '<form action="includes/logout.inc.php" method="Post"> <!--skickar data till fil logout.inc.php i mappen includes-->
        <button type="submit" name="logout-submit">Logga ut</button>
        </form> ';
    }
    else
    {
        echo '<form action="includes/login.inc.php" method="Post"> <!--skickar data till fil login.inc.php i mappen includes-->
        <input type="text" name="anvandarnamn" placeholder = "Anvandarnamn"> 
        <input type="password" name="losenord" placeholder = "losenord">
        <button type="submit" name="login-submit">Logga in</button>
        </form> <a href="skapa_användare.php">Skapa anvandare</a> ';
    }
?>






</div>
</header>
</body>
</html>