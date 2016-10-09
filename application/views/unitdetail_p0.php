<?php
if($firstname!=''){
  $fullname=$firstname.' '.$lastname;
}else{
  $fullname='';
}
$max_location=3;
$mainunit=array();
$location=array();
$rowUnit=$unit->row();
if ($project!=null){
  $rowProject=$project->row();
}
array_push($mainunit,'','',$rowUnit->ProjectName,$rowUnit->Lat,$rowUnit->Lng,'/img/pin-property.png',0);
$location[]=$mainunit;

$POID=$rowUnit->POID;
$PID=$rowUnit->PID;
$PName_th=$rowUnit->ProjectName;
$TOAdvertising=$rowUnit->TOAdvertising;
$TOProperty=$rowUnit->TOProperty;
$RefID="(ID".$TOProperty.$TOAdvertising."-".$POID.")";
$Active=$rowUnit->Active;
$queryAllPost=$this->unitdetail->getAllPostFromPIDandTOAdvertising($PID,$TOAdvertising,$Active,$PName_th);
//echo $PID;
//echo $rowUnit->Lat;
//echo $rowUnit->Lng;
$arrayList=$this->search->selectCountingList($POID,$PID);

$CountViewList=$this->search->ContViewList($POID);
$CountSoldPerMonth=$this->search->CountSoldPerMonth($PID);
$Img=$this->search->SelectImgFromPOID($POID);
$DistBTSMRT=$this->search->DistMRTBTS2($PID);
$DistEducation=$this->search->DistFromType2($PID,"Education");
$DistHospital=$this->search->DistFromType2($PID,"Hospital");
$DistShopingMall=$this->search->DistFromType2($PID,"ShopingMall");
$DistExpressway=$this->search->DistFromType2($PID,"Expressway");
$DistMinimart=$this->search->DistFromType2($PID,"Minimart");
for($i=1;$i<=$max_location;$i++){
	if($DistBTSMRT[$i]){
		$location[]=$DistBTSMRT[$i];
	}
	if($DistEducation[$i]){
		$location[]=$DistEducation[$i];
	}
	if($DistHospital[$i]){
		$location[]=$DistHospital[$i];
	}
	if($DistShopingMall[$i]){
		$location[]=$DistShopingMall[$i];
	}
	if($DistExpressway[$i]){
		$location[]=$DistExpressway[$i];
	}
	if($DistMinimart[$i]){
		$location[]=$DistMinimart[$i];
	}
}

$getCondoSpec1=$this->search->getCondoSpec($POID,1);
$getCondoSpec2=$this->search->getCondoSpec($POID,2);
$getCondoSpec3=$this->search->getCondoSpec($POID,3);
$maxSpec=0;
if ($maxSpec<sizeof($getCondoSpec1)){
	$maxSpec=sizeof($getCondoSpec1);
}
if ($maxSpec<sizeof($getCondoSpec2)){
	$maxSpec=sizeof($getCondoSpec2);
}
if ($maxSpec<sizeof($getCondoSpec3)){
	$maxSpec=sizeof($getCondoSpec3);
}
//echo $maxSpec;
if ($rowUnit->TOAdvertising==1){
	$TotalPrice=$rowUnit->TotalPrice;
}
if ($rowUnit->TOAdvertising==2){
	$TotalPrice=$rowUnit->DTotalPrice;
}
if ($rowUnit->TOAdvertising==5){
	$TotalPrice=$rowUnit->PRentPrice;
}
$TotalPrice2=$TotalPrice;
$TotalPrice=number_format($TotalPrice, 0,'',',');
$MinTimePRent=$rowUnit->MinTimePRent;
$DepositPRent=$rowUnit->DepositPRent;
$TotalDepositPRent=number_format($TotalPrice*$DepositPRent, 0,'',',');
$AdvancePRent=$rowUnit->AdvancePRent;
$PRentCO=$rowUnit->PRentCO;
$AgentPRent=$rowUnit->AgentPRent;
$PRentAllNational=$rowUnit->PRentAllNational;
$PRentChild=$rowUnit->PRentChild;
$PRentPet=$rowUnit->PRentPet;
$PRentEmptyRoom=$rowUnit->PRentEmptyRoom;
$PRentGas=$rowUnit->PRentGas;
$PRentStatus=$rowUnit->StatusPRent;
$PRentEnd=$rowUnit->PRentEnd;
$useArea=$rowUnit->useArea;
$terraceArea=$rowUnit->terraceArea;
$sumArea=$useArea+$terraceArea;
if ($sumArea!="0"){
	$PricePerSq=number_format($TotalPrice2/$sumArea, 0,'',',');
} else {
	$PricePerSq="ยังไม่ได้พื้นที่";
};
$DateExpire=$rowUnit->DateExpire;
$date = date_create_from_format('Y-m-d', $DateExpire);
$DateExpire=date_format($date, 'd/m/Y');
$DPayment=$this->search->getPostDCondo($POID,0);
$Direction=$this->search->KeyDirection($rowUnit->Direction);
$PLoan=6.5;
$PLoanMonth=20;
$DTransferPayment=$rowUnit->DTransferPayment;
$cRate=($PLoan/12)/100;
$cPeriod=$PLoanMonth*12;
$Var1=$DTransferPayment*$cRate;
$Var2=1-(1/pow((1+$cRate),$cPeriod));
$PayPerMonth=$Var1/$Var2;

$problem_type="";
?>