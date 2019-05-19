<?php

$servernamn = "localhost";
$dbanvandarnamn = "root";
$dblosenord = "";
$dbnamn = "inloggningssystem";

$conn = mysqli_connect($servernamn,$dbanvandarnamn,$dblosenord,$dbnamn); //skapar en anslutning till serven

if (!$conn)  //om anslutningen misslyckas "stang av" om skriv sedan Anslutning misslyckad sedan error meddelandet
{
    die("Anslutning misslyckad" .mysqli_connect_error());
}