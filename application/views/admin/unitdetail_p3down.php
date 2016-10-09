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
			<div class="text-grey">
				<h5 class="text-primary text-center">รายละเอียดราคาและการชำระเงิน</h5>
				<br>
				<!--row a-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4  col-xs-4">
						<h5 class="text-grey">ราคา ค่าธรรมเนียม และโปรโมชั่น</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">- ราคาขาย</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">฿<?=$TotalPrice;?></h5>
					</div>
					<!--hide a-->
					<div class="target-ra display-none">
						<!--r1-->
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4">
						 &nbsp;
						</div>
						<div class="col-md-4 col-xs-4">- ราคาขายต่อตารางเมตร
						</div>
						<div class="col-md-4 col-xs-4">
						  ฿<?=$PricePerSq;?>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4 padding-top10">
						&nbsp;
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						   - ยืนยันราคาถึงวันที่
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						  (<?=$DateExpire;?>)   
						</div>
						<!--end-r1-->
						<div class="clearfix"></div>
					
						<!--r2-->
						<div class="col-md-4 col-xs-4 padding-top10">
						 &nbsp;
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
							- โปรโมชั่นที่ได้รับ
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
							<?php if ($rowUnit->DFreeTransfer=='1'){echo "ฟรีค่าธรรมเนียมการโอน<br>";};?>
							<?php if ($rowUnit->DFreeContract=='1'){echo "ฟรีค่าจดจำนอง<br>";};?>
							<?php if ($rowUnit->DFreeMember=='1'){echo "ฟรีเงินกองทุนนิติบุคคลฯ <br>";};?>
							<?php if ($rowUnit->DFreeFeeMember!='0' and $rowUnit->DFreeFeeMember!=null){echo "ฟรีค่าใช้จ่ายส่วนกลาง ".$rowUnit->DFreeFeeMember." ปี<br>";};?>
							<?php if ($rowUnit->DDiscount!='0' and $rowUnit->DDiscount!=null){echo "- ส่วนลด ณ วันโอน ".number_format($rowUnit->DDiscount, 0,'',',')." บาท<br>";};?>
							<?php if ($rowUnit->DFreeMeter=='1'){echo "ฟรีค่ามิเตอร์<br>";};?>
							<?php if ($rowUnit->DFreeFurniture!=null and $rowUnit->DFreeFurniture!=""){echo "เฟอร์นิเจอร์ (".$rowUnit->DFreeFurniture.")<br>";};?>
							<?php if ($rowUnit->DFreeElectric!=null and $rowUnit->DFreeElectric!=""){echo "เครี่องใช้ไฟฟ้า (".$rowUnit->DFreeElectric.")<br>";};?>
							<?php if ($rowUnit->DFreeVoucher!=null and $rowUnit->DFreeVoucher!=""){echo "คูปองสมนาคุณ (".$rowUnit->DFreeVoucher.")<br>";};?>
							<?php if ($rowUnit->DFreeETC!=null and $rowUnit->DFreeETC!=""){echo "- อื่นๆ (".$rowUnit->DFreeETC.") <br>";};?>
						</div>
						<!--end-r2-->
					</div>
					<!--end hide a-->
				</div>
				<div>
					<div class="pull-right">
						<span id="down-ra" class="glyphicon glyphicon-menu-down btn-sm text-grey width-10" aria-hidden="true"></span>
					</div>
					<div class="pull-right">
						<span id="up-ra" class="glyphicon glyphicon-remove btn-sm text-grey display-none width-10" aria-hidden="true"></span>
					</div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row a-->
				<hr class="padding-none">
				<br>
				<!--row b-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">การชำระเงิน</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">- ขายดาวน์</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">฿<?=number_format($rowUnit->DDownTotalPrice, 0,'',',');?></h5>
					</div>
					<!--hide b-->
					<div class="target-rb display-none">
						<!--r1-->
						<div class="col-md-4 col-xs-4">&nbsp;</div>
						<div class="col-md-4 col-xs-4"> - ผ่อนต่อกับโครงการ </div>
						<div class="col-md-4 col-xs-4">฿<?=number_format($rowUnit->DStalePayment, 0,'',',');?></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">- จำนวนงวดที่เหลือกับโครงการ</div>
						<div class="col-md-4 col-xs-4 padding-top10"> <?=$rowUnit->DStalePaymentMonth;?> งวด </div>
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
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10"> - ชำระ ณ วันโอน</div>
						<div class="col-md-4 col-xs-4 padding-top10">฿<?=number_format($rowUnit->DTransferPayment, 0,'',',');?></div>
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-8 col-xs-8 padding-top10">  <span class="small2">(สอบถามค่าธรรมเนียมและภาษีกับโครงการก่อนวันโอน)</span></div> 
						<!--end-r1-->
						<div class="clearfix"></div>
						<br>
					</div>
					<!--end hide b-->
				</div>
				<div>
					<div class="pull-right">
						<span id="down-rb" class="glyphicon glyphicon-menu-down btn-sm text-grey width-10" aria-hidden="true"></span>
					</div>
					<div class="pull-right">
						<span id="up-rb" class="glyphicon glyphicon-remove btn-sm text-grey display-none width-10" aria-hidden="true"></span>
					</div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row b-->
				<hr class="padding-none">
				<br>
				<!--row c-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">สินเชื่อ</h5>
					</div>
					<div class="col-md-4 col-xs-4" ><h5 class="text-grey">- ผ่อนต่อเดือน <span class="small2">(กู้ <?=$PLoanMonth;?> ปีดอกเบี้ย <?=$PLoan;?>%)</span> </h5></div>
					<div class="col-md-4 col-xs-4"> <h5 class="text-grey">฿<?=number_format($PayPerMonth, 0,'',',');?></h5></div>
					<div class="clearfix"></div>
					<!--hide c-->
					<div class="target-rc display-none">
						<div class="col-md-4 col-xs-4">&nbsp;</div>
						<div class="col-md-4 col-xs-4"> - ยอดโอนหรือกู้ไม่รวมค่านายหน้า*</div>
						<div class="col-md-4 col-xs-4">฿<?=number_format($rowUnit->DTransferPayment, 0,'',',');?></div>
						<div class="clearfix">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4 padding-top10">เงินเดือน <span class="small2">(ปลอดภาระ)</span></div><div class="col-md-4 col-xs-4 padding-top10"><input class="btn-xs" id="x1" onchange="Function_CreditLineMulti()">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4 padding-top10">ระบุอัตราดอกเบี้ย <span class="small2">(%)</span> </div><div class="col-md-4 col-xs-4 padding-top10"><input class="btn-xs" id="x2" value="6.5"  onchange="Function_CreditLineMulti()">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span></div><div class="col-md-4 col-xs-4 padding-top10" ><input class="btn-xs" id="x3" value="20"  onchange="Function_CreditLineMulti()">&nbsp;</div>
						<input type="hidden" id="x4" value="<?=$rowUnit->DTransferPayment;?>">
						<div class="clearfix">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4 padding-top10">ความสามารถในการผ่อน*</div>
						<div class="col-md-4 col-xs-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showPayPerMonth" disabled>&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4 padding-top10">ประมาณยอดเงินที่กู้ได*้</div>
						<div class="col-md-4 col-xs-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showLoan" disabled>&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div><div class="col-md-4 col-xs-4 padding-top10"> ชำระโครงการเพิ่ม ณ วันโอน</div>
						<div class="col-md-4 col-xs-4 padding-top10" style="padding-bottom:40px;"><input class="btn-xs borderless2" type="text" id="showPayTransfer" disabled>&nbsp;</div>
					</div>
					<!--end hide c-->
				</div>
				<div>
					<div class="pull-right">
						<span id="down-rc" class="glyphicon glyphicon-menu-down btn-sm text-grey width-10" aria-hidden="true"></span>
					</div>
					<div class="pull-right">
						<span id="up-rc" class="glyphicon glyphicon-remove btn-sm text-grey display-none width-10" aria-hidden="true"></span>
					</div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row c-->
			
				<!--end new-->
			 
			</div>
			<div class="clearfix"></div><br>
       
		</div>