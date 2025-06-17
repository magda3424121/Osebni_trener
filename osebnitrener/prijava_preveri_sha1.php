<?php
include 'baza.php';
require_once 'seja.php';
$e=$_POST['email'];
$g=$_POST['geslo'];
//echo "$e,$g";
$salt="blabla";
$gkod= sha1($g.$salt);

$sql2="SELECT * FROM uporabniki WHERE email ='$e' AND geslo='$gkod';";

$result2=mysqli_query($link, $sql2);

$st= mysqli_num_rows($result2);
if($st===1){
    $row= mysqli_fetch_array($result2);
    $_SESSION['idu']=$row['id_u'];
    $_SESSION['id_vu'] = $row['id_vu'];
    $_SESSION['ime']=$row['ime'];
    $_SESSION['priimek']=$row['priimek'];
   
    //echo "Prijavljeni ste kot ".$row['ime']." ".$row['priimek'].".";
    header("Location: index.php");
}
 else{
    header("Refresh:3 url=prijava.php");
    echo ("email ali geslo ni pravilno.");
 }