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
$DTransferPayment=$rowUnit->DTransferPayment;
$cRate=($PLoan/12)/100;
$cPeriod=$PLoanMonth*12;
$Var1=$DTransferPayment*$cRate;
$Var2=1-(1/pow((1+$cRate),$cPeriod));
$PayPerMonth=$Var1/$Var2;
?>
<!--Add new-->
<div class="col-lg-7 col-md-8 col-lg-offset-1  col-xs-12  unitdetail-container" style="overflow: hidden;">
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">รายละเอียดราคาและการชำระเงิน</h3>
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

				<div class="col-xs-6 field-text extra-p">
					<span>ยืนยันราคาถึงวันที่</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<? echo (isset($DateExpire)) ? $DateExpire : "---";?> 
				</div>	
				<div class="col-xs-6 field-text extra-p">
					โปรโมชั่น
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<? 
					/*$promotion_counter = ($rowUnit->DFreeTransfer)+($rowUnit->DFreeContract)+($rowUnit->DFreeMember)+($rowUnit->DFreeFeeMember)+($rowUnit->DDiscount)+($rowUnit->DFreeMeter)+($rowUnit->DFreeFurniture)+($rowUnit->DFreeElectric)+($rowUnit->DFreeVoucher)+($rowUnit->DFreeETC);
					if ($promotion_counter != 0) {*/
					if(($rowUnit->DFreeTransfer<>0) || ($rowUnit->DFreeContract<>0) || ($rowUnit->DFreeMember<>0) || ($rowUnit->DFreeFeeMember<>0) || ($rowUnit->DFreeMeter<>0) || ($rowUnit->DDiscount<>'NULL') || ($rowUnit->DFreeFurniture<>'NULL') || ($rowUnit->DFreeElectric<>'NULL') || ($rowUnit->DFreeVoucher<>'NULL') || ($rowUnit->DFreeETC<>'NULL')){
						if ($rowUnit->DFreeTransfer=='1'){echo "ฟรีค่าธรรมเนียมการโอน<br>";};
						if ($rowUnit->DFreeContract=='1'){echo "ฟรีค่าจดจำนอง<br>";};
						if ($rowUnit->DFreeMember=='1'){echo "ฟรีเงินกองทุนนิติบุคคลฯ <br>";};
						if ($rowUnit->DFreeFeeMember!='0' and $rowUnit->DFreeFeeMember!=null){echo "ฟรีค่าใช้จ่ายส่วนกลาง ".$rowUnit->DFreeFeeMember." ปี<br>";};
						if ($rowUnit->DDiscount!='0' and $rowUnit->DDiscount!=null){echo "- ส่วนลด ณ วันโอน ".number_format($rowUnit->DDiscount, 0,'',',')." บาท<br>";};
						if ($rowUnit->DFreeMeter=='1'){echo "ฟรีค่ามิเตอร์<br>";};
						if ($rowUnit->DFreeFurniture!=null and $rowUnit->DFreeFurniture!=""){echo "เฟอร์นิเจอร์ (".$rowUnit->DFreeFurniture.")<br>";};
						if ($rowUnit->DFreeElectric!=null and $rowUnit->DFreeElectric!=""){echo "เครี่องใช้ไฟฟ้า (".$rowUnit->DFreeElectric.")<br>";};
						if ($rowUnit->DFreeVoucher!=null and $rowUnit->DFreeVoucher!=""){echo "คูปองสมนาคุณ (".$rowUnit->DFreeVoucher.")<br>";};
						if ($rowUnit->DFreeETC!=null and $rowUnit->DFreeETC!=""){echo "- อื่นๆ (".$rowUnit->DFreeETC.") <br>";};
					} else {
						echo "---";
					}
					?> 
				</div>	
			</div>

		</div>
		<div class="col-xs-12 detail-section">
			<div class="col-xs-12 col-sm-4 field-headerrow hidden-xs">
				การชำระเงิน
			</div>
			<div class="col-xs-12 col-sm-8 field-data">
				<div class="col-xs-6 field-text extra-p">
					<span>ขายดาวน์</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span>
						<? echo (isset($rowUnit->DDownTotalPrice)) ? number_format($rowUnit->DDownTotalPrice, 0,'',',')."<span class='field-subtext'> บาท</span>" : "---" ;?>

					</span>
				</div>	
				<div class="col-xs-6 field-text extra-p">
					<span>ผ่อนต่อกับโครงการ</span>
				</div>	
				<div class="col-xs-6 field-text extra-p text-right">
					<span>
						<? 
						if($rowUnit->DStalePayment!=''){
							echo number_format($rowUnit->DStalePayment, 0,'',',')."<span class='field-subtext'> บาท</span>";
						}else {
							echo "ไม่ระบุ";
						}
						?>

					</span>
				</div>	
				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p">
						<span>จำนวนงวดที่เหลือกับโครงการ</span>
					</div>
					<div class="col-xs-6 field-text extra-p text-right">
						<span>
							<? echo ($rowUnit->DStalePaymentMonth!='') ? number_format($rowUnit->DStalePaymentMonth, 0,'',',') : "ไม่ระบุ" ;?>
						</span>
					</div>
				</div>

				<?php
				if ($rowUnit->DContractPrice1!=null){
					$DContractDate1=$rowUnit->DContractDate1;
					$date = date_create_from_format('d-M-Y', $DContractDate1);
					$DContractDate1=date_format($date, 'd/m/Y');
					?>
					<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4">เงินทำสัญญางวดที่ 1</div><div class="col-md-4 col-xs-4">฿<?=number_format($rowUnit->DContractPrice1, 0,'',',');?> (<?=$DContractDate1;?>)</div>
					<?php
				};
				?>
				<?php
				if ($rowUnit->DContractPrice2!=null){
					$DContractDate2=$rowUnit->DContractDate2;
					$date = date_create_from_format('d-M-Y', $DContractDate2);
					$DContractDate2=date_format($date, 'd/m/Y');
					?>
					<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4">เงินทำสัญญางวดที่ 2</div><div class="col-md-4 col-xs-4">฿<?=number_format($rowUnit->DContractPrice2, 0,'',',');?> (<?=$DContractDate2;?>)</div>
					<?php
				};
				?>
				<?php
				if ($rowUnit->DContractPrice3!=null){
					$DContractDate3=$rowUnit->DContractDate3;
					$date = date_create_from_format('d-M-Y', $DContractDate3);
					$DContractDate3=date_format($date, 'd/m/Y');
					?>
					<div class="col-md-4 col-xs-4">&nbsp;</div><div class="col-md-4 padding-top10">เงินทำสัญญางวดที่ 3</div><div class="col-md-4 col-xs-4">฿<?=number_format($rowUnit->DContractPrice3, 0,'',',');?> (<?=$DContractDate3;?>)</div>
					<?php
				};
				?>
				<?php
				if ($DPayment->num_rows()!=0){
					?>
					<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
					<div class="col-md-4 col-xs-4">ผ่อนดาวน์อีก</div>
					<div class="col-md-4 col-xs-4"><?=$DPayment->num_rows();?> งวด</div>
					<?php
					foreach ($DPayment->result() as $rowDPayment){
						$DPaymentDate=$rowDPayment->DPaymentDate;
						$date = date_create_from_format('d-M-Y', $DPaymentDate);
						$DPaymentDate=date_format($date, 'd/m/Y');
						?>
						<div class="col-md-4 col-xs-4">&nbsp;</div>
						<div class="col-md-4 col-xs-4">   งวดที่ <?=$rowDPayment->DPaymentTime;?></div>
						<div class="col-md-4 col-xs-4">฿<?=number_format($rowDPayment->DPaymentPrice, 0,'',',');?> (<?=$DPaymentDate;?>)</div>
						<?php
					};
					?>
					<?php
				}
				?>

				<div class="col-xs-12 nopadding">
					<div class="col-xs-6 field-text extra-p">
						<span>ชำระ ณ วันโอน</span>
					</div>
					<div class="col-xs-6 field-text extra-p text-right">
						<span>
							<? echo ($rowUnit->DTransferPayment!=0) ? number_format($rowUnit->DTransferPayment, 0,'',',')."<span class='field-subtext'> บาท</span>" : "---" ;?>

						</span>
					</div>
				</div>
				<div class="col-xs-1 field-text extra-p">
				</div> 		
				<div class="col-xs-11 field-text extra-p text-right">
					<span class="small2 field-subtext">(สอบถามค่าธรรมเนียมและภาษีกับโครงการก่อนวันโอน)</span>
				</div>
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
						ผ่อนต่อเดือน <span class="small2">(กู้ <?=$PLoanMonth;?> ปีดอกเบี้ย <?=$PLoan;?>%)</span>
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
	<div class="clearfix"></div>
</div>