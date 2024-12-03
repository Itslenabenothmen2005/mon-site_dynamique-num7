<?php
$st=$_POST["st"];
$an=$_POST["annee"];
$cnx=mysqli_connect("localhost","root", "","bd_seisme") or die("erreur accés à la base");
$req1="select * from seisme as se ,station as st where se.codesta=st.codesta and nomsta='$st order by(date seisme)asc;";
$res1=mysqli_query($cnx,$req1) or die("erreur execution req1: ".mysqli_error($cnx));
if(mysqli_num_rows($res1)<1){
    die("Aucune activité sismique enregistrée");
}
else{
    echo("<table border=\"1\">");
    echo("<tr><th>Date et heure </th><th>Magnitude (Deg. Richter)</th><th>Nom Région</th></tr>");
    while($t=mysqli_fetch_array($res1)){
        $nr=$t['numreg'];
        $req2="select NomReg from region where NumReg='$nr';";
        $res2=mysqli_query($cnx,$req2) or die("erreur execution req2: ".mysqli_error($cnx));
        $ta=mysqli_fetch_array($res2);
        echo("<tr><td>$t['date seisme']<td><td>$t['magnitude']<td><td>$ta[0]<td></tr>");
    }
    echo("</table>");
}
mysqli_close($cnx);
?>