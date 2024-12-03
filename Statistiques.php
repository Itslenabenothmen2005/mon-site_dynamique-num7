<?php

$cnx=mysqli_connect("localhost","root","","bd_seisme")or die("erreur cnx");
$req1="select * from station;";
$res1=mysqli_query($cnx,$req1);
echo("<table border='1'>")
while($t=mysqli_fetch_array($res1)){
    $cs=$t[0];
$req2="select max(magnitude), count(code sta)from seisme where code sta='$cs';  ";
$ta=mysqli_fetch_array($res2);
$res2=mysqli_query($cns,$req2);
echo("<tr><td>$t[2]</td><td>$ta[1]</td><td>$ta[0]</td></tr>");
}
echo("</table>");
mysqli_close($cnx);
?>