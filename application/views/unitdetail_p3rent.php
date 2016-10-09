<?php
$POID=$rowUnit->POID;
$PID=$rowUnit->PID;

$getCondoSpec1=$this->search->getCondoSpec($POID,1);
$getCondoSpec2=$this->search->getCondoSpec($POID,2);
$getCondoSpec3=$this->search->getCondoSpec($POID,3);

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
$TotalDepositPRent=number_format($TotalPrice2*$DepositPRent, 0,'',',');
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
$sumArea=$useArea;
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
?>
<!--Add new-->

<div class="col-lg-7 col-md-8 col-lg-offset-1  col-xs-12 unitdetail-container" style="overflow: hidden;">
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">ค่าเช่าและเงื่อนไข</h3>
		</div>
		<div class="col-xs-12 detail-section">
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs">
				ค่าเช่า
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<h4 class="col-xs-7 field-text extra-p text-left nowrap">ค่าเช่ารวมค่าส่วนกลาง</h4>
				<h4 class="col-xs-5 field-text extra-p text-right nowrap"><?=$TotalPrice;?> <span class="field-subtext">บาท</span></h4>
				<h4 class="col-xs-7 field-text extra-p text-left nowrap">ระยะเวลาเช่าขั้นต่ำ</h4>
				<h4 class="col-xs-5 field-text extra-p text-right nowrap"><?=$MinTimePRent;?> <span class="field-subtext">เดือน</span></h4>
				<h4 class="col-xs-7 field-text extra-p text-left nowrap">ค่ามัดจำ <?=$DepositPRent;?> เดือน</h4>
				<h4 class="col-xs-5 field-text extra-p text-right nowrap"><?=$TotalDepositPRent;?> <span class="field-subtext">บาท</span></h4>
				<h4 class="col-xs-7 field-text extra-p text-left nowrap">เงินล่วงหน้า</h4>
				<h4 class="col-xs-5 field-text extra-p text-right nowrap"><?=$AdvancePRent;?> เดือน</h4>
			</div>
		</div>

		<div class="col-xs-12 detail-section">
			<div class="col-xs-6 col-sm-4 field-headerrow hidden-xs">
				นิติบุคคล
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<h4 class="col-xs-7 field-text extra-p text-left nowrap">ยอมเซ็นสัญญากับนิติบุคคล</h4>
				<h4 class="col-xs-5 field-text extra-p text-right nowrap">				
					<? echo ($PRentCO=="1") ? "ใช่" : "ไม่รับ"?>					
				</h4>
			</div>
		</div>

		<div class="col-xs-12 detail-section">
			<div class="col-xs-6 col-sm-4 field-headerrow hidden-xs">
				นายหน้า
			</div>
			<div class="col-xs-6 col-sm-8 field-data">
				<?php 
				if($AgentPRent=="1"){
					?>
					<div class="col-xs-6 field-text extra-p">
						ค่านายหน้า 1 เดือน
					</div>
					<div class="col-xs-6 field-text extra-p text-right">
						<?=$TotalPrice;?>
						<span class='field-subtext'>บาท</span>
					</div>
					<?
				}else{
					?>
					<div class="col-xs-6 field-text extra-p">
						<span style='color:red'>ไม่รับนายหน้า</span>
					</div>
					<?
				}
				?>
			</div>
		</div>
		<div class="col-xs-12 detail-section">
			<div class="col-xs-6 col-sm-4 field-headerrow hidden-xs">
				ยอมรับการเช่าลักษณะเหล่านี้ได้
			</div>
			<div class="col-xs-6 col-sm-8 field-data">
				<h4 class="col-xs-12 field-text text-right nowrap">								
					<?
					if ($PRentAllNational=="1"){ $rentrule += " ผู้เช่าทุกสัญชาติ";};
					if ($PRentChild=="1"){ $rentrule +=  " เด็กเล็ก";};
					if ($PRentPet=="1"){ $rentrule +=  " สุนัขและแมว";};
					if ($PRentEmptyRoom=="1"){ $rentrule +=  " ห้องเปล่า";};
					if ($PRentGas=="1"){ $rentrule +=  " ใช้เตาแก๊ส";};
					if ($rentrule==''){$rentrule = '---';};
					echo $rentrule;
					?>				
				</h4>
			</div>
		</div>
		<div class="col-xs-12 field-btn pointer nopadding text-right hidden" onclick="UnitDetailFold(this)">
			<div class="glyphicon glyphicon-menu-up"></div>
			<hr class="col-xs-12" style="margin-top: 5px;">
		</div>
	</div>
</div>
<div class="clearfix"></div>