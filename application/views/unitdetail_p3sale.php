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
//$DTransferPayment=$rowUnit->DTransferPayment;
$DTransferPayment=$TotalPrice2;
$cRate=($PLoan/12)/100;
$cPeriod=$PLoanMonth*12;
$Var1=$DTransferPayment*$cRate;
$Var2=1-(1/pow((1+$cRate),$cPeriod));
$PayPerMonth=$Var1/$Var2;
?>
<!--Add new 25 Sep 2558-->

<div class="col-lg-7 col-md-8 col-lg-offset-1  col-xs-12 unitdetail-container" style="overflow: hidden;">
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">ราคาและรายละเอียดการขาย</h3>
		</div>


		<div class="col-xs-12 detail-section">
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs">
				ราคา
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<div class="col-xs-6 field-text extra-p">
					<span>ราคาขาย</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><?=$TotalPrice;?></span>
					<span class="field-subtext">บาท</span>
				</div>
				<div class="col-xs-6 field-text extra-p">
					<span>ราคาต่อตารางเมตร</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><? echo (isset($PricePerSq)) ? $PricePerSq."<span class='field-subtext'> บ/ม<sup>2</sup></span>" : "---";?></span>
				</div>
			</div>
		</div>
		<div class="col-xs-12 detail-section">
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs">
				การชำระเงิน
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<div class="col-xs-6 field-text extra-p">
					<span>ทำสัญญาจะซื้อจะขาย</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><? echo (isset($rowUnit->DepositPrice)) ? number_format($rowUnit->DepositPrice, 0,'',',')."<span class='field-subtext'> บาท</span>" : "---" ;?></span>
				</div>
				<div class="col-xs-6 field-text extra-p">
					<span>โอนหลังจากทำสัญญา</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><? echo (isset($rowUnit->DayOfDeposit)) ? $rowUnit->DayOfDeposit."วัน" : '---';?></span>
				</div>
			</div>
		</div>
		<div class="col-xs-12 detail-section">
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs">
				นายหน้า
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<?php 
				if($rowUnit->Broker=='1'){
					?>
					<div class="col-xs-6 field-text extra-p">
						ค่าคอมมิชชั่น 2 %
					</div>
					<div class="col-xs-6 field-text extra-p text-right">
						<?=number_format($rowUnit->BrokerPrice, 0,'',',');?>
						<span class='field-subtext'>บาท</span>
					</div>
					<div class="col-xs-6 field-text extra-p">
						ราคาขายของนายหน้า
					</div>
					<div class="col-xs-6 field-text extra-p text-right">
						<?=number_format(($rowUnit->TotalPrice)+($rowUnit->BrokerPrice), 0,'',',');?>
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
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs">
				ประมาณการสินเชื่อ
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<div class="col-xs-6 field-text extra-p">
					<span>ยอดเงินกู้</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><?=$TotalPrice;?></span>
					<span class='field-subtext'> บาท</span>
				</div>
				<div class="col-xs-6 field-text extra-p">
					<span>ระยะเวลากู้ <?=$PLoanMonth;?> ปี ดอกเบี้ย <?=$PLoan;?>%</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><?=number_format($PayPerMonth, 0,'',',');?></span>
					<span class='field-subtext'> บ/ด</span>
				</div>
			</div>
		</div>
		<div class="col-xs-12 detail-section">
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs animatable">
				คำนวณสินเชื่อ
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p animatable">
						เงินเดือน <span class="small2">(ปลอดภาระ)</span>
					</div>
					<div class="col-xs-6 field-text extra-p animatable">
						<input class="btn-xs field-input" id="x1" onchange="Function_CreditLineMulti()">
					</div>
				</div>
				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p animatable">
						ระบุอัตราดอกเบี้ย <span class="small2">(%)</span> 
					</div>
					<div class="col-xs-6 field-text extra-p animatable">
						<input class="btn-xs field-input" id="x2" value="6.5"  onchange="Function_CreditLineMulti()">
					</div>
				</div>
				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p animatable">
						ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span>
					</div>
					<div class="col-xs-6 field-text extra-p animatable" >
						<input class="btn-xs field-input" id="x3" value="20"  onchange="Function_CreditLineMulti()">
					</div>
				</div>
				<input type="hidden" id="x4" value="<?=$rowUnit->TotalPrice;?>">

				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p animatable">
						ความสามารถในการผ่อน*
					</div>
					<div class="col-xs-6 field-text extra-p animatable" >
						<input class="btn-xs field-input borderless2" type="text" id="showPayPerMonth" disabled>
					</div>
				</div>
				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p animatable">
						ประมาณยอดเงินที่กู้ได*้
					</div>
					<div class="col-xs-6 field-text extra-p animatable" >
						<input class="btn-xs field-input borderless2" type="text" id="showLoan" disabled>
					</div>
				</div>
				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p animatable">
						ชำระเพิ่ม ณ วันโอน
					</div>
					<div class="col-xs-6 field-text extra-p animatable">
						<input class="btn-xs field-input borderless2" type="text" id="showPayTransfer" disabled>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 field-btn pointer nopadding text-right" onclick="UnitDetailFold(this)">
			<div class="glyphicon glyphicon-menu-up"></div>
			<hr class="col-xs-12" style="margin-top: 5px;">
		</div>
	</div>

	<hr class="col-xs-12 visible-xs">
</div>
<div class="clearfix"></div>



  <!--End added 25 sep 2558-->