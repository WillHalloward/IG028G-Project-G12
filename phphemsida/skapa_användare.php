<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<title>HTML Tutorial</title>
<body>

<h1>Skapa anvandare</h1>
<p>This is a paragraph.</p>

<form action="includes/signup.inc.php" method="Post"> <!--skickar data till fil signup.inc.php i mappen includes-->
<input type="text" name="skapa_anvandarnamn" placeholder = "Anvandarnamn"> 
<input type="password" name="skapa_losenord" placeholder = "Losenord"> 
<input type="password" name="skapa_losenord2" placeholder = "Repitera Losenord"> 
<button type="submit" name="signup-submit">Skapa anvandare</button>
</form> 

</body>
</html>