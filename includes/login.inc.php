<?php

if (isset($_POST['login-submit']))
{
    require 'dbh.inc.php';

    $anvandarnamn  = $_POST['anvandarnamn'];
    $losenord = $_POST['losenord'];

    if(empty($anvandarnamn)||empty($losenord))
    {
        header("Location: ../index.php?error=tomtfält");
        exit();
    }
    else
    {
        $sql = "SELECT * FROM anvandare WHERE anvandarnamn=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            
            echo "error".$conn -> error;
            exit(); 
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $anvandarnamn);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result))
            {
               
                if($losenord!==$row['losenord'])
                {
                    header("Location: ../index.php?error=fel-lösenord&");
                    exit(); 
                }
                else if($losenord==$row['losenord'])
                {
                    session_start();
                    $_SESSION['anvandarid'] = $row['anvandarid'];
                    $_SESSION['anvandarnamn'] = $row['anvandarnamn'];
                    header("Location: ../index.php?inloggning=lyckad");
                    exit();    
                }
                else
                {
                    header("Location: ../index.php?h");
                    exit(); 
                }
            }
            else
            {
                header("Location: ../index.php?error=fel-användarnamn");
                exit();    
            }
        }
            
    }

    

}
else
{
    header("Location: ../index.php");
    exit();
}