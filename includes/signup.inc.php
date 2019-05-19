<?php

if (isset($_POST['signup-submit'])) //kollar om anvandaren kom hit genom att klicka på submit i skapa anvandare sidan
{

    require 'dbh.inc.php';

    $anvandarnamn  = $_POST['skapa_anvandarnamn'];
    $losenord1 = $_POST['skapa_losenord'];
    $losenord2 = $_POST['skapa_losenord2'];

    if(empty($anvandarnamn)||empty($losenord1)||empty($losenord2) )
    {
        header("Location: ../skapa_användare.php?error=tomt-falt&skapa_anvandarnamn=".$anvandarnamn );
        exit();
    }
    else if($losenord1 !== $losenord2)
    {
        header("Location: ../skapa_användare.php?error=losenord-matchar-ej&skapa_anvandarnamn=".$anvandarnamn );
        exit();
    }
    else 
    {
        $sql = "SELECT anvandarnamn FROM anvandare WHERE anvandarnamn = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../skapa_användare.php?error=Anvandarnamn_upptaget");
                exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $anvandarnamn);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck = mysqli_stmt_num_rows($stmt);
            if ($resultcheck > 0)
            {
                header("Location: ../skapa_användare.php?error=Anvandarnamn_upptaget");
                exit();
            }
            else 
            {
                $sql = "INSERT INTO anvandare (anvandarnamn,losenord) VALUES (?,?)" ;
                $stmt = mysqli_stmt_init($conn);
            
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    header("Location: ../skapa_användare.php?error2=sqlerror");
                    exit();
                }  
                else 
                {
                    mysqli_stmt_bind_param($stmt,"ss", $anvandarnamn,$losenord1);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../skapa_användare.php?skapa anvandare=lyckad");
                    exit();
                }     
            }
     
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else 
{
    header("Location: ../skapa_anvandare.php");
    exit();
}