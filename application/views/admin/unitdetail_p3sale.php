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
//$DTransferPayment=$rowUnit->DTransferPayment;
$DTransferPayment=$TotalPrice2;
$cRate=($PLoan/12)/100;
$cPeriod=$PLoanMonth*12;
$Var1=$DTransferPayment*$cRate;
$Var2=1-(1/pow((1+$cRate),$cPeriod));
$PayPerMonth=$Var1/$Var2;
?>
        <!--Add new 25 Sep 2558-->
		<div class="col-md-7 col-md-offset-1 col-md-pull-4 resize-mobile" style="padding-left:0px;">
			<div class="text-grey">
				<h5 class="text-primary text-center">ราคาและรายละเอียดการขาย</h5>
				<br>
				<!--row a-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<h5 class="text-primary">ราคาและรายละเอียด</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">- ราคาขาย</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">฿<?=$TotalPrice;?></h5>
					</div>
					<div class="clearfix"></div>
					<!--hide a-->
					<div class="target-ra display-none">
						<!--r1-->
						<div class="col-md-4 col-xs-4">&nbsp;</div>
						<div class="col-md-4 col-xs-4">
						- ราคาขายต่อตารางเมตร
						</div>
						<div class="col-md-4 col-xs-4">
						฿<?=$PricePerSq;?>
						</div>
<!--Hide 04/12/2015
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						- ค่าโอน ภาษีธุรกิจเฉพาะ ภาษีเงินได้*
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						ผู้ขายจ่าย*
						</div>
						<div class="clearfix"></div>
-->
						<!--end-r1-->
						<!--r2-->
<!--Hide 04/12/2015
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						- ค่าจดจำนอง*
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
							<span class="text-red">ผู้ซื้อจ่าย*</span>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						- กองทุนนิติบุคคน-ส่วนกลาง (ถ้ามี)*
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						มอบให้ผู้ซื้อ*
						</div>
						<div class="clearfix"></div>
						<div class="col-md-4 col-xs-4 padding-top10">
						&nbsp;
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						- เงินประกันมิเตอร์ไฟฟ้า*
						</div>
						<div class="col-md-4 col-xs-4 padding-top10">
						มอบให้ผู้ซื้อ*
						</div>
-->
						<!--end-r2-->
<!-- Hide 04/12/2015
						<div class="clearfix"></div>
-->
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
				<hr class="padding-none">
				<br>
				<!--row b-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<h5 class="text-primary">การชำระเงิน</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">- ทำสัญญาจะซื้อจะขาย</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">฿<?=number_format($rowUnit->DepositPrice, 0,'',',');?></h5>
					</div>
					<div class="clearfix"></div>
					<!--hide b-->
					<div class="target-rb display-none">
						<!--r1-->
						<div class="col-md-4 col-xs-4">&nbsp;</div>
						<div class="col-md-4 col-xs-4"> - โอนหลังจากทำสัญญาจะซื้อจะขาย </div>
						<div class="col-md-4 col-xs-4"><?=$rowUnit->DayOfDeposit;?> วัน</div>
						<!--end-r1-->
						<div class="clearfix"></div>
						<br>
					</div>
					<!--end hide b-->
				</div>
				<div>
                    <div class="pull-right">
						<span id="down-rb" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
						<span id="up-rb" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row b-->
				<hr class="padding-none">
				<br>
        
				<!--row c-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<h5 class="text-primary">ยอมรับนายหน้า</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<h5 class="text-grey">- ราคาขายของนายหน้า</h5>
					</div>
					<div class="col-md-4 col-xs-4">
						<?php if($rowUnit->Broker=='1'){
							echo "<h5 class='text-grey'>฿";
							echo number_format(($rowUnit->TotalPrice)+($rowUnit->BrokerPrice), 0,'',',');
						}else{
							echo "<h5 class='text-red'>";
							echo "ไม่รับนายหน้า";
						}
						?>
						</h5>
					</div>
					<div class="clearfix"></div>
					<!--hide b-->
					<div class="target-rc display-none">
						<!--r1-->
						<div class="col-md-4 col-xs-4">&nbsp;</div>
						<div class="col-md-4 col-xs-4"> - ค่าคอมมิชชั่น</div>
						<div class="col-md-4 col-xs-4">฿<?=number_format(($rowUnit->BrokerPrice), 0,'',',');?><br><span class="small2">(2% ของราคาหักค่าธรรมเนียม)</span></div>
						<!--end-r1-->
						<div class="clearfix"></div>
						<br>
					</div>
					<!--end hide c-->
				</div>
				<div>
                    <div class="pull-right">
						<span id="down-rc" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
						<span id="up-rc" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row c-->
				<hr class="padding-none">
				<br>

				<!--row d-->
				<div class="col-md-12 text-grey text-left">
					<div class="col-md-4 col-xs-4">
						<h5 class="text-primary">ประมาณการสินเชื่อ</h5>
					</div>
					<div class="col-md-4 col-xs-4"><h5 class="text-grey">- ระยะเวลากู้ <?=$PLoanMonth;?>ปี ดอกเบี้ย <?=$PLoan;?>% </h5></div>
					<div class="col-md-4 col-xs-4"> <h5 class="text-grey">฿<?=number_format($PayPerMonth, 0,'',',');?>/เดือน</h5></div>
					<div class="clearfix"></div>
					<!--hide c-->
					<div class="target-rd display-none">
                    
						<div class="col-md-4 col-xs-4"></div><div class="col-md-4"> - ยอดเงินกู้</div><div class="col-md-4">฿<?=$TotalPrice;?></div>
						<div class="clearfix">&nbsp;</div>
						<div class="col-md-4 col-xs-4"></div><div class="col-md-4"><span class="text-turq2"> คำนวณความพร้อมของการขอสินเชื่อ</span></div><div class="col-md-4"></div>
						<div class="clearfix">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">เงินเดือน <span class="small2">(ปลอดภาระ)</span></div>
						<div class="col-md-4 col-xs-4 padding-top10"><input class="btn-xs" id="x1" onchange="Function_CreditLineMulti()"></div>
						<div class="col-md-4 col-xs-4 padding-top10"></div>
						<div class="col-md-4 col-xs-4 padding-top10">ระบุอัตราดอกเบี้ย <span class="small2">(%)</span> </div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x2" value="6.5"  onchange="Function_CreditLineMulti()"></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span></div><div class="col-md-4 padding-top10" ><input class="btn-xs" id="x3" value="20"  onchange="Function_CreditLineMulti()"></div>
						<input type="hidden" id="x4" value="<?=$rowUnit->TotalPrice;?>">
						<div class="clearfix">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">ความสามารถในการผ่อน*</div>
						<div class="col-md-4 col-xs-4 col-xs-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showPayPerMonth" disabled></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10">ประมาณยอดเงินที่กู้ได*้</div>
						<div class="col-md-4 col-xs-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showLoan" disabled></div>
						<div class="col-md-4 col-xs-4 padding-top10">&nbsp;</div>
						<div class="col-md-4 col-xs-4 padding-top10"> ชำระเพิ่ม ณ วันโอน</div>
						<div class="col-md-4 col-xs-4 padding-top10" style="padding-bottom:40px;"><input class="btn-xs borderless2" type="text" id="showPayTransfer" disabled></div>
                    </div>
<!--                <div class="col-md-4 padding-top10"></div>
					<div class="col-md-4 padding-top10">เงินเดือน -รายได้อื่นปลอดภาระ <span class="small2">(บาท)*</span></div>
					<div class="col-md-4 padding-top10"><input class="btn-xs" id="x1" onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div>
					<div class="col-md-4 padding-top10">อัตราดอกเบี้ย </div>
					<div class="col-md-4 padding-top10"><input class="btn-xs" id="x2" value="6.5"  onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10">ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span></div>
					<div class="col-md-4 padding-top10" ><input class="btn-xs" id="x3" value="20"  onchange="Function_CreditLineMulti()"></div>
                    <input type="hidden" id="x4" value="<?=$rowUnit->DTransferPayment;?>">
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4 padding-top10"></div>
					<div class="col-md-4 padding-top10">ความสามารถในการผ่อนต่อเดือน*</div>
                    <div class="col-md-4 padding-top10" >B20,000</div>
                    <div class="col-md-4 padding-top10"></div>
					<div class="col-md-4 padding-top10">ประมาณยอดเงินที่กู้ได้*</div>
                    <div class="col-md-4 padding-top10" >B10,000,000</div>
                    <div class="col-md-4 padding-top10"></div>
					<div class="col-md-4 padding-top10"> ชำระเพิ่ม ณ วันโอน</div>
                    <div class="col-md-4 padding-top10" style="padding-bottom:40px;">1,125,000</div>
  -->
				<!--end hide d-->
				</div>
				<div>
                    <div class="pull-right">
						<span id="down-rd" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
						<span id="up-rd" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div>                 
				</div>
				<div class="clearfix"></div>
				<!--end row d-->
			<!--end new-->
         
			</div>
			<div class="clearfix"></div><br>
       
		</div>

  <!--End added 25 sep 2558-->