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
?>
        <!--Add new-->
		<div class="col-md-7 col-md-offset-1 col-md-pull-4 resize-mobile" style="padding-left:0px;">
			<div class="col-md-12 text-grey">
				<h5 class="text-primary text-center">ค่าเช่าและเงื่อนไข</h5>
				<br>
				<!--row a-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<div class="text-orange">ค่าเช่า</div>
					</div>
					<div class="col-md-4 col-xs-4">
						<div>- ค่าเช่ารวมค่าส่วนกลาง</div>
						<div class="padding-top1">- ระยะเวลาเช่าขั้นต่ำ</div>
						<div class="padding-top1">- มัดจำ</div>
						<div class="padding-top1">- เงินล่วงหน้า</div>
					</div>
					<div class="col-md-4 col-xs-4 text-right">
						<div>฿ <?=$TotalPrice;?></div>
						<div class="padding-top1"><?=$MinTimePRent;?> เดือน</div>
						<div class="padding-top1"><?=$TotalDepositPRent;?> บาท (<?=$DepositPRent;?> เดือน)</div>
						<div class="padding-top1"><?=$AdvancePRent;?> เดือน</div>
					</div>
					<!--hide a-->
					<div class="target-ra display-none">
						<div class="clearfix"></div>
						<br>
						<!--r2-->
						<div class="col-md-4">
							<div class="text-orange">ยอมเซ็นสัญญากับนิติบุคคล</div><br>
							<div class="text-orange">ยอมรับนายหน้า</div><br>
							<div class="text-orange">ยอมรับการเช่าลักษณะเหล่านี้ได้</div><br>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4 text-right">
							<div>
								<?php
									if ($PRentCO=="1"){
										echo "ใช่";
									} else {
										echo "ไม่รับ";
									};
								?>
							</div><br>
							<div>
								<?php
									if ($AgentPRent=="1"){
										echo "ใช่(ค่านายหน้า ".$TotalPrice." บาท)";
									} else {
										echo "ไม่รับ";
									};
								?>
							 
							</div><br>
							<div>
								<?php
								if ($PRentAllNational=="1"){ echo "&nbsp;ผู้เช่าทุกสัญชาติ";};
								if ($PRentChild=="1"){ echo "&nbsp;เด็กเล็ก";};
								if ($PRentPet=="1"){ echo "&nbsp;สุนัขและแมว";};
								if ($PRentEmptyRoom=="1"){ echo "&nbsp;ห้องเปล่า";};
								if ($PRentGas=="1"){ echo "&nbsp;ใช้เตาแก๊ส";};
								?>
							</div>
						</div>
						<!--end-r2-->
					</div>
					<!--end hide a-->
				</div>
				<div>
                    <div class="pull-right">
						<span id="down-ra" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
						<span id="up-ra" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row a-->

				<div class="clearfix"></div>
				<!--end row c-->
			<!--end new-->
         
			</div>
			<div class="clearfix"></div><br>
       
		</div>