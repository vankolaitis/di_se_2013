<?php
require "vcc.php" ;
$sku = addslashes($_POST['sku']) ;
$description = addslashes($_POST['description']) ;
$priceSale = addslashes($_POST['priceSale']) ;
$priceSupply = addslashes($_POST['priceSupply']) ;
$availableSum = addslashes($_POST['availableSum']) ;
$criticalSum = addslashes($_POST['criticalSum']) ;
edit_product($sku, $description, $priceSale, $priceSupply, $availableSum, $criticalSum) ;
header("Location: ./") ;
?>
