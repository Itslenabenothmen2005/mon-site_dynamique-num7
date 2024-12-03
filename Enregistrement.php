<?php
    $nr = $_POST['nr'];
    $hs = $_POST['hs'];
    $m = $_POST['m'];
    $la = $_POST['la'];
    $lo = $_POST['lo'];
    $ds = $_POST['ds'];
    $d = $ds . " " . $hs;

$cnx = mysqli_connect("localhost", "root", "", "bd_seisme") or die("erreur cnx");
$req2="select codesta, s.numreg,dateseisme from seisme s, region r where 
 s.numreg=r.numreg and codesta='$st' and NomReg='$nr' and DateSeisme='$d' ;";
$res2=mysqli_query($cnx,$req2)or die("erreur req2".mysqli_error($cnx));
if(mysqli_num_rows($res2)>0){
    die("Activité déjà enregistrée");
}
$req3="select numreg  from region where nomreg='$nr' ;";
$res3=mysqli_query($cnx,$req3) or die("erreur req3".mysqli_error($cnx));
if(mysqli_num_rows($res3)>0){
    $tb=mysqli_fetch_array($res3);
    $numrg=$tb[0];
    $req4="insert into seisme values('$st','$numrg','$d','$la','$lo','$m');";
    $res4=mysqli_query($cnx,$req4)or die("pb req4".mysqli_error($cnx));
    if(mysqli_affected_rows($res4)>0){
        echo("Activité enregistrée avec succès");
    }

}
else{
    $req5="insert into region (nomreg) values('$nr');";
    $res5=mysqli_query($cnx,$req5)or die("erreur req5".mysqli_error($cnx));
    $req6="select numreg from region where nomreg='$nr';";
    $res6=mysqli_query($cnx,$req6)or die("erreur req6".mysqli_error($cnx));
    $tt=mysqli_fetch_array($res6);
    $nrg=$tt[0];
    $req7="insert into seisme values('$st','$nrg','$d','$la','$lo','$m');";
    $res7=mysqli_query($cnx,$req7) or die("erreur req7".mysqli_error($cnx));
    if(mysqli_affected_rows($cnx)>0){
        echo("Région et activité enregistrées avec succès");
    }
}
mysqli_close($cnx);
?> 




