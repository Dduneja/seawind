<?php

$BL = $_POST["BL"];
$shipperName = $_POST["shipper-name"];
$shipAdd1 = $_POST["ship-add-l-1"];
$shipAdd2 = $_POST["ship-add-l-2"];
$shipAdd3 = $_POST["ship-add-l-3"];
$shipEmail = $_POST["ship-email"];
$shipMobile = $_POST["ship-mobile"];

$conName = $_POST["con-name"];
$conAdd1 = $_POST["con-add-l-1"];
$conAdd2 = $_POST["con-add-l-2"];
$conAdd3 = $_POST["con-add-l-3"];
$conEmail = $_POST["con-email"];
$conMobile = $_POST["con-mobile"];
if(isset($_POST["con-alt-mobile"])){
    $conAltMobile = $_POST["con-alt-mobile"];
}
else{
    $conAltMobile = "";
}


$notifyName = $_POST["notify-name"];
$notifyAdd1 = $_POST["notify-add-l-1"];
$notifyAdd2 = $_POST["notify-add-l-2"];
$notifyAdd3 = $_POST["notify-add-l-3"];
$notifyEmail = $_POST["notify-email"];
$notifyMobile = $_POST["notify-mobile"];
if(isset($_POST["notify-alt-mobile"])){
    $notifyAltMobile = $_POST["notify-alt-mobile"];
}
else{
    $notifyAltMobile = "";
}

$POL = $_POST["pol"];
$POD = $_POST["pod"];
$vessel = $_POST["vessel"];
$voyage = $_POST["voyage"];
$shipLine = $_POST["ship-line"];

$despGood = $_POST["desp-good"];
$kindPack = $_POST["kind-pack"];
$HScode = $_POST["HS-code"];
$SB = $_POST["SB-code"];
$date = $_POST["SB-date"];
$noContainer = $_POST["no-of-cont"];

$containerArr = serialize($_POST["container-no:"]);
$containerSizeArr = serialize($_POST["container-size:"]);
$LineSealNumberArr = serialize($_POST["line-seal-number:"]);
$stuffedPackagesArr = serialize($_POST["stuffed-packages:"]);
$grossWeightArr = serialize($_POST["gross-weight:"]);
$netWeightArr = serialize($_POST["net-weight:"]);






if(isset($_POST["other-desp"])){
    $otherDesp = $_POST["other-desp"];
}
else{
    $otherDesp = "";
}



$freightPayment = $_POST["freight"];
$freightPayable = $_POST["fright-payable"];
$placeOfIssue = $_POST["place-of-issue"];
$dateOfIssue = $_POST["date-of-issue"];

$containerArr = unserialize($containerArr);

$contstr = "";

foreach($containerArr as $e){
    $contstr.="<div>".$e."</div>";
}


$stuffedPackagesArr = unserialize($stuffedPackagesArr);

$noofPackages = 0;
$packagestr ="";

foreach($stuffedPackagesArr as $e){
    $noofPackages += (int)$e;
    $packagestr.="<div>".$e."</div>";
}

$package = $noofPackages." ".$kindPack;


$grossWeightArr = unserialize($grossWeightArr);

$grossweight = 0;
$grossstr = "";

foreach($grossWeightArr as $e){
    $grossweight += floatval($e);
    $grossstr.="<div>".$e." KGS</div>";
}

$netWeightArr = unserialize($netWeightArr);

$netweight = 0;

foreach($netWeightArr as $e){
    $netweight += floatval($e);
}


$containerSizeArr = unserialize($containerSizeArr);
$LineSealNumberArr = unserialize($LineSealNumberArr);

$contTable = "";
$i = 0;
while(isset($containerArr[$i])){
    $contTable .= "<tr>
        <td>".($i+1)."</td>
        <td>".$containerArr[$i]."</td>
        <td>".$containerSizeArr[$i]."</td>
        <td>".$LineSealNumberArr[$i]."</td>
        <td>".$stuffedPackagesArr[$i]."</td>
        <td>".$grossWeightArr[$i]."</td>
        <td>".$netWeightArr[$i]."</td>
    </tr>";
    $i++;
}



$desp = $noContainer." X D20 CONTAINER SAID TO CONTAIN<br>".$package."<br><br>DESCRIPTION OG GOODS<br>".$despGood."<br><br>HS CODE: ".$HScode."<br><br>GROSS WEIGHT: ".$grossweight." KGS<br><br>NET WEIGHT: ".$netweight." KGS<br><br>SB CODE: ".$SB." DATE: ".$date;

$html = file_get_contents('../../job.html');

$html = str_replace(['{{title}}','{{ shippername }}', '{{ shipper-addressline1 }}', '{{ shipper-addressline2 }}', '{{ shipper-addressline3 }}', '{{ shipper-mail }}', '{{ consigneename }}', '{{ consignee-addressline1 }}','{{ consignee-addressline2 }}','{{ consignee-addressline3 }}', '{{ consignee-tax-id }}', '{{BL}}', '{{PA}}', '{{POD}}', '{{Vessel}}', '{{Voyage-no.}}', '{{MOT}}', '{{Route}}', '{{Cont}}', '{{NPac}}', '{{Desc}}','{{GRW}}', '{{Measurement}}', '{{DA}}', '{{FA}}', "{{FRP}}", '{{NMTDS}}', '{{PAD}}'],["job_".$BL,$shipperName, $shipAdd1, $shipAdd2, $shipAdd3, $shipEmail, $conName, $conAdd1, $conAdd2, $conAdd3, $conEmail, $BL, $POL, $POD, $vessel, $voyage, "PORT-TO-PORT", $POL." to ".$POD, $contstr, $packagestr, $desp, $grossstr, "", "", "", "", "", $placeOfIssue." ".$dateOfIssue],$html);

$html = str_replace(['{{ FA }}', '{{ FRP }}','{{other-desp}}','{{cont-detail}}', '{{totalPack}}', '{{totalgross}}', '{{totalnet}}', '{{ notifyname }}', '{{ notify-addressline1 }}','{{ notify-addressline2 }}','{{ notify-addressline3 }}', '{{ notify-tax-id }}'],[$freightPayment, $freightPayable, $otherDesp, $contTable, $noofPackages, number_format($grossweight,2), number_format($netweight,2) , $notifyName, $notifyAdd1, $notifyAdd2, $notifyAdd3, $notifyEmail], $html);

echo $html;

?>