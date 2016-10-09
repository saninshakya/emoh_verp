<?php
	$rowUnit=$unit->row();
	$POID=$rowUnit->POID;
	$PID=$rowUnit->PID;
	$arrayList=$this->search->selectCountingList($POID,$PID);
	$CountViewList=$this->search->ContViewList($POID);
	$CountSoldPerMonth=$this->search->CountSoldPerMonth($PID);
	$Img=$this->search->SelectImgFromPOID($POID);
	$DistBTSMRT=$this->search->DistMRTBTS($PID);
	$DistEducation=$this->search->DistFromType($PID,"Education");
	$DistHospital=$this->search->DistFromType($PID,"Hospital");
	$DistShopingMall=$this->search->DistFromType($PID,"ShopingMall");
	$DistExpressway=$this->search->DistFromType($PID,"Expressway");
	$DistMinimart=$this->search->DistFromType($PID,"Minimart");
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
	$TotalPrice2=$TotalPrice;
	$TotalPrice=number_format($TotalPrice, 0,'',',');
	$useArea=$rowUnit->useArea;
	$terraceArea=$rowUnit->terraceArea;
	$sumArea=$useArea+$terraceArea;
	$PricePerSq=number_format($TotalPrice2/$sumArea, 0,'',',');
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
<div class="container">
        <div class="row">  
          <div class="col-md-12">
               <ul class="list-inline">
                  <li><h3 class="text-primary"><?=$rowUnit->ProjectName;?></h3></li>
                  <li><span class="glyphicon glyphicon glyphicon-star text-primary" aria-hidden="true"></span>
          </div>
        </div>
        <div class="row">  
          <div class="col-md-3 col-xs-3 text-primary"><?=$arrayList[0];?> จาก <?=$arrayList[1];?> ในรายการ</div>
          <div class="col-md-3 col-xs-3 text-primary">กำลังต่อรองอยู่ <?=$CountViewList;?> ราย</div>
          <div class="col-md-3 col-xs-3 text-primary"><?=$CountSoldPerMonth;?> Sold/Moth</div>
          <div class="col-md-3 col-xs-3 text-primary">&nbsp;</div>
        </div>
        <br/>
        <div class="row">
           <div class="col-md-12">
            <img class="img-responsive" src="<?=$Img[0];?>">
           </div>
        </div>
        <div class="col-md-8">
          <br/>
          <p class="text-center"><strong><?=$rowUnit->Address;?>&nbsp;<?=$rowUnit->Soi;?>&nbsp;<?=$rowUnit->Road;?>&nbsp;<?=$rowUnit->Area;?>&nbsp;<?=$rowUnit->Province;?></strong></p>
          <br/>
          <h5 class="text-primary text-center">ทำเลที่ตั้ง</h5>
          <div class="col-md-12">
            <div class="col-md-4 col-xs-4 text-center">
              <ul class="list-inline">
                  <li><img src="/img/bts-icon.png"></li><li class="text-primary">รถไฟฟ้า</li>
              </ul>
            </div>
            <div class="col-md-4 col-xs-4 text-center">
              <ul class="list-inline">
                  <li><img src="/img/road-icon.png"></li><li class="text-primary">ทางด่วน</span></li>
              </ul>
            </div>
            <div class="col-md-4 col-xs-4 text-center">
              <ul class="list-inline">
                  <li><img src="/img/shop-icon.png"></li><li class="text-primary">ร้านสะดวกซื้อ</li>
              </ul>
            </div>
          </div>
          <!-- row1 ---->
          <div class="col-md-12">
            <div class="col-md-4 col-xs-4">
              <div class="text-grey"><span class="pull-left"><?=$DistBTSMRT[2];?></span><span class="pull-right"><?=$DistBTSMRT[0];?> กม.</span></div>
            </div>
            <div class="col-md-4 col-xs-4 text-center border-left">
               <div class="text-grey"><span class="pull-left"><?=$DistExpressway[2];?></span><span class="pull-right"><?=$DistExpressway[0];?> กม.</span></div> 
            </div>
            <div class="col-md-4 col-xs-4 text-center border-left">
               <div class="text-grey"><span class="pull-left"><?=$DistMinimart[2];?></span><span class="pull-right"><?=$DistMinimart[0];?> กม.</span></div>
            </div>
          </div>
          <!-end row1->
          <div class="clearfix"></div>
          <!-hide data-->
          <div class="col-md-12 target-r1 display-none">
            <div class="col-md-4 col-xs-4">
              <div class="text-grey"><span class="pull-left"><?=$DistBTSMRT[5];?></span><span class="pull-right"><?=$DistBTSMRT[3];?> กม.</span></div>
            </div>
            <div class="col-md-4 col-xs-4 text-center border-left">
               <div class="text-grey"><span class="pull-left"><?=$DistExpressway[5];?></span><span class="pull-right"><?=$DistExpressway[3];?> กม.</span></div> 
            </div>
            <div class="col-md-4 col-xs-4 text-center border-left">
               <div class="text-grey"><span class="pull-left"><?=$DistMinimart[5];?></span><span class="pull-right"><?=$DistMinimart[3];?> กม.</span></div>
            </div>
          </div>
          <!-end hide->
          <!-hide data-->
          <div class="col-md-12 target-r1 display-none">
            <div class="col-md-4 col-xs-4">
              <div class="text-grey"><span class="pull-left"><?=$DistBTSMRT[8];?></span><span class="pull-right"><?=$DistBTSMRT[6];?> กม.</span></div>
            </div>
            <div class="col-md-4 col-xs-4 text-center border-left">
               <div class="text-grey"><span class="pull-left"><?=$DistExpressway[8];?></span><span class="pull-right"><?=$DistExpressway[6];?> กม.</span></div> 
            </div>
            <div class="col-md-4 col-xs-4 text-center border-left">
               <div class="text-grey"><span class="pull-left"><?=$DistMinimart[8];?></span><span class="pull-right"><?=$DistMinimart[6];?> กม.</span></div>
            </div>
          </div>
          <!-end hide->
          <!-toggle-->
          <div class="clearfix"></div>
          <div class="col-md-12">
              <div class="pull-right"><span id="down-r1" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span></div>
              <div class="pull-right"><span id="up-r1" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span></div>
          </div>
          <div class="clearfix"></div>
          <!-end toggle->
      


          
        
          <div class="col-md-12 bg-grey2">
             <h5 class="text-primary text-center">จุดเด่นห้องชุด</h5>

            <!-- row2 ---->
            <div class="col-md-12">
              <div class="col-md-4 col-xs-4">
                <div class="text-grey"><?php if (isset($getCondoSpec1[0])){echo $getCondoSpec1[0];} else {echo "&nbsp;";};?></div>
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey"><?php if (isset($getCondoSpec2[0])){echo $getCondoSpec2[0];} else {echo "&nbsp;";};?></div> 
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey"><?php if (isset($getCondoSpec3[0])){echo $getCondoSpec3[0];} else {echo "&nbsp;";};?></div>
              </div>
            </div>
            <!-end row2->
            <!-hide data2-->
			<?php
			 $i=1;
			 while ($i<$maxSpec){
			?>
            <div class="col-md-12 target-r2 display-none">
              <div class="col-md-4 col-xs-4">
                <div class="text-grey"><?php if (isset($getCondoSpec1[$i])){echo $getCondoSpec1[$i];} else {echo "&nbsp;";};?></div>
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey"><?php if (isset($getCondoSpec2[$i])){echo $getCondoSpec2[$i];} else {echo "&nbsp;";};?></div> 
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey"><?php if (isset($getCondoSpec3[$i])){echo $getCondoSpec3[$i];} else {echo "&nbsp;";};?></div>
              </div>
            </div>
			<?php
					$i++;
				}; 
			?>
            <!-end hide data2-->
              <div>
                <div class="pull-right">
                  <span id="down-r2" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                </div>
               <div class="pull-right">
                  <span id="up-r2" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
               </div> 
              </div> 
          <div class="clearfix"></div>
          </div>

  
        <!-- row2 ----> 
        
        <div class="clearfix"></div><br>


        <!Add new->

        <div class="col-md-12 text-grey">
          <h5 class="text-primary text-center">รายละเอียดราคาและการชำระเงิน</h5>
          
          <!-row a->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
              ราคา ค่าธรรมเนียม และโปรโมชั่น
                </div>
                <div class="col-md-4">
                  - ราคาขาย
                </div>
                <div class="col-md-4">
                  ฿<?=$TotalPrice;?>
                </div>
                <!-hide a->
                <div class="target-ra display-none">
                    <!-r1->
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                      - ราคาขายต่อตารางเมตร
                    </div>
                    <div class="col-md-4">
                      ฿<?=$PricePerSq;?>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                       - ยืนยันราคาขายถึงวันที่
                    </div>
                    <div class="col-md-4">
                      (<?=$DateExpire;?>)   
                    </div>
                    <!-end-r1->
                    <div class="clearfix"></div>
                    <br>
                    <!-r2->
                    <div class="col-md-4">
                            โปรโมชั่นที่ได้รับ
                    </div>
                    <div class="col-md-4">
                       <?php if ($rowUnit->DFreeTransfer=='1'){echo "- ฟรีค่าธรรมเนียมการโอน<br>";};?>
                       <?php if ($rowUnit->DFreeContract=='1'){echo "- ฟรีค่าจดจำนอง<br>";};?>
                       <?php if ($rowUnit->DFreeMember=='1'){echo "- ฟรีเงินกองทุนนิติบุคคลฯ <br>";};?>
                       <?php if ($rowUnit->DFreeFeeMember!='0' and $rowUnit->DFreeFeeMember!=null){echo "- ฟรีค่าใช้จ่ายส่วนกลาง ".$rowUnit->DFreeFeeMember." ปี<br>";};?>
                       <?php if ($rowUnit->DDiscount!='0' and $rowUnit->DDiscount!=null){echo "- ส่วนลด ณ วันโอน ".number_format($rowUnit->DDiscount, 0,'',',')." บาท<br>";};?>
					   <?php if ($rowUnit->DFreeMeter=='1'){echo "- ฟรีค่ามิเตอร์<br>";};?>
					   <?php if ($rowUnit->DFreeFurniture!=null and $rowUnit->DFreeFurniture!=""){echo "- เฟอร์นิเจอร์ (".$rowUnit->DFreeFurniture.")<br>";};?>
					   <?php if ($rowUnit->DFreeElectric!=null and $rowUnit->DFreeElectric!=""){echo "- เครี่องใช้ไฟฟ้า (".$rowUnit->DFreeElectric.")<br>";};?>
                       <?php if ($rowUnit->DFreeVoucher!=null and $rowUnit->DFreeVoucher!=""){echo "- คูปองสมนาคุณ (".$rowUnit->DFreeVoucher.")<br>";};?>
                       <?php if ($rowUnit->DFreeETC!=null and $rowUnit->DFreeETC!=""){echo "- อื่นๆ (".$rowUnit->DFreeETC.") <br>";};?>
                    </div>
                    <div class="col-md-4">
                    </div>
                    
                    <!end-r2->

                </div>
                <!-end hide a->
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
        <!-end row a->
        <!-row b->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
              การชำระเงิน
                </div>
                <div class="col-md-4">
                - ขายดาวน์
                </div>
                <div class="col-md-4">
                 ฿<?=number_format($rowUnit->DDownTotalPrice, 0,'',',');?>
                </div>
                <!-hide b->
                <div class="target-rb display-none">
                    <!-r1->
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> - ผ่อนชำระต่อกับโครงการ </div><div class="col-md-4">฿<?=number_format($rowUnit->DStalePayment, 0,'',',');?></div>
                    <div class="col-md-4"></div><div class="col-md-4">- จำนวนงวดที่เหลือกับโครงการ</div><div class="col-md-4"> <?=$rowUnit->DStalePaymentMonth;?> งวด </div>
					<?php
						if ($rowUnit->DContractPrice1!=null){
							$DContractDate1=$rowUnit->DContractDate1;
							$date = date_create_from_format('d-M-Y', $DContractDate1);
							$DContractDate1=date_format($date, 'd/m/Y');
					?>
                    <div class="col-md-4"></div><div class="col-md-4">เงินทำสัญญางวดที่ 1</div><div class="col-md-4">฿<?=number_format($rowUnit->DContractPrice1, 0,'',',');?> (<?=$DContractDate1;?>)</div>
					<?php
						};
					?>
					<?php
						if ($rowUnit->DContractPrice2!=null){
							$DContractDate2=$rowUnit->DContractDate2;
							$date = date_create_from_format('d-M-Y', $DContractDate2);
							$DContractDate2=date_format($date, 'd/m/Y');
					?>
                    <div class="col-md-4"></div><div class="col-md-4">เงินทำสัญญางวดที่ 2</div><div class="col-md-4">฿<?=number_format($rowUnit->DContractPrice2, 0,'',',');?> (<?=$DContractDate2;?>)</div>
					<?php
						};
					?>
					<?php
						if ($rowUnit->DContractPrice3!=null){
							$DContractDate3=$rowUnit->DContractDate3;
							$date = date_create_from_format('d-M-Y', $DContractDate3);
							$DContractDate3=date_format($date, 'd/m/Y');
					?>
                    <div class="col-md-4"></div><div class="col-md-4">เงินทำสัญญางวดที่ 3</div><div class="col-md-4">฿<?=number_format($rowUnit->DContractPrice3, 0,'',',');?> (<?=$DContractDate3;?>)</div>
					<?php
						};
					?>
				    <?php
						
						if ($DPayment->num_rows()!=0){
					?>
                    <div class="col-md-4"></div><div class="col-md-4">ผ่อนดาวน์อีก</div><div class="col-md-4"><?=$DPayment->num_rows();?> งวด</div>
					<?php
							foreach ($DPayment->result() as $rowDPayment){
								$DPaymentDate=$rowDPayment->DPaymentDate;
								$date = date_create_from_format('d-M-Y', $DPaymentDate);
								$DPaymentDate=date_format($date, 'd/m/Y');
					?>
                    <div class="col-md-4"></div><div class="col-md-4">   งวดที่ <?=$rowDPayment->DPaymentTime;?></div><div class="col-md-4">฿<?=number_format($rowDPayment->DPaymentPrice, 0,'',',');?> (<?=$DPaymentDate;?>)</div>
					<?php
							};
					?>
					<?php
						}
					?>
                    <div class="col-md-4"></div><div class="col-md-4"> - ชำระ ณ วันโอนกรรมสิทธิ</div><div class="col-md-4">฿<?=number_format($rowUnit->DTransferPayment, 0,'',',');?></div>
                    <div class="col-md-4"></div><div class="col-md-4">  (สอบถามค่าธรรมเนียม ณ กรมที่ดิน กับโครงการก่อนวันโอน)</div> <div class="col-md-4"></div>
                    <!-end-r1->
                    <div class="clearfix"></div>
                    <br>
                </div>
                <!-end hide b->
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
        <!-end row b->
        <!-row c->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">สินเชื่อ</div><div class="col-md-4">- ผ่อน (ระยะเวลากู้ <?=$PLoanMonth;?> ปี ดอกเบี้ย <?=$PLoan;?>%) </div><div class="col-md-4"> ฿<?=number_format($PayPerMonth, 0,'',',');?></div>
                <div class="clearfix"></div>
                <!-hide c->
                <div class="target-rc display-none">
                    
                    <div class="col-md-4"></div><div class="col-md-4"> - ยอดเงินกู้โดยประมาณ*</div><div class="col-md-4">฿<?=number_format($rowUnit->DTransferPayment, 0,'',',');?></div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4"></div><div class="col-md-4">เงินเดือน (ปลอดภาระ)</div><div class="col-md-4"><input class="bt-sm" id="x1" onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4"></div><div class="col-md-4">ระบุอัตราดอกเบี้ย </div><div class="col-md-4"><input class="bt-sm" id="x2" value="6.5"  onchange="Function_CreditLineMulti()">%</div>
					<div class="col-md-4"></div><div class="col-md-4">ระยะเวลากู้ (สูงสุด 30 ปี / 65-อายุผู้กู้)</div><div class="col-md-4" ><input class="bt-sm" id="x3" value="20"  onchange="Function_CreditLineMulti()"></div>
					<input type="hidden" id="x4" value="<?=$rowUnit->DTransferPayment;?>">
                    <div class="clearfix">&nbsp;</div>
					<div class="col-md-4"></div><div class="col-md-4">จำนวนเงินกู้ (ยอดโอน)*</div><div class="col-md-4" ><input type="text" id="showLoan" disabled></div>
					<div class="col-md-4"></div><div class="col-md-4">ผ่อน/เดือน*</div><div class="col-md-4" ><input type="text" id="showPayPerMonth" disabled></div>
                    <div class="col-md-4"></div><div class="col-md-4"> ชำระโครงการเพิ่ม ณ วันโอน</div><div class="col-md-4" ><input type="text" id="showPayTransfer" disabled></div>
                </div>
                <!-end hide c->

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
        <!-end row c->

        
        <!end new->
         
        </div>
        <div class="clearfix"></div><br>

          <div class="bg-grey2">
            <h5 class="text-primary text-center">เปรียบเทียบโครงการเดียวกันและคนสนใจ</h5>
             <div class="table-responsive">
              <table class="table">
                <tr class="text-primary">
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">ราคาปัจจุบัน</td>
                  <td class="text-center">ราคาเดิม</td>
                </tr>
              </table>
              <table class="table">
                <tr class="text-primary">
                  <td>ชั้น</td>
                  <td>ทิศ</td>
                  <td>ตร.ม.</td>
                  <td>บาท/ม2.</td>
                  <td>+/-</td>
                  <td><img src="/img/sun-icon2.png"></a></td>
                  <td><a href="#"><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></a></td>
                  <td>บาท/ม2.</td>
                  <td>+/-</td>
                  <td><img src="/img/sun-icon2.png"></a></td>
                  <td><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></td>
                </tr>
                <tr class="text-grey">
                  <td>7</td>
                  <td>น.</td>
                  <td>60</td>
                  <td>76,000</td>
                  <td><p class="text-green">4.1%</p></td>
                  <td>5</td>
                  <td>5</td>
                  <td>73,000</td>
                  <td><p class="text-red">-5.6%</p></td>
                  <td>30</td>
                  <td>4C</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>ตอ.</td>
                  <td>100</td>
                  <td>79,000</td>
                  <td>10</td>
                  <td>1</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>ตอ.</td>
                  <td>60</td>
                  <td>77,000</td>
                  <td>8</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="row-active-green">
                  <td class="td-active-green">12</td>
                  <td class="td-active-green">ตอ.</td>
                  <td class="td-active-green">100</td>
                  <td class="td-active-green">77,000</td>
                  <td class="td-active-green"><p class="text-red">-5.9</p></td>
                  <td class="td-active-green">5</td>
                  <td class="td-active-green">5</td>
                  <td class="td-active-green">85,000</td>
                  <td class="td-active-green"></td>
                  <td class="td-active-green">16</td>
                  <td class="td-active-green">2c</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>ตอ.</td>
                  <td>100</td>
                  <td>77,000</td>
                  <td>8</td>
                  <td></td>
                  <td>ขายแล้ว</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>ตอ.</td>
                  <td>100</td>
                  <td>77,000</td>
                  <td>8</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>ตอ.</td>
                  <td>100</td>
                  <td>77,000</td>
                  <td>8</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
            </div>
           

            <div class="clearfix"></div>
            <br>
            <div class="text-center text-primary">
              <strong>สรุปโครงการ </strong>
            </div>
            <br>
            <!-- row5 ---->
            <div class="col-md-12 text-grey border-top">
               <div class="col-md-4 col-xs-4">
                <span class="pull-left">สร้างเสร็จ&nbsp;</span><span class="pull-right">2540  รวม 19 ปี</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left">ที่จอดรถ</span><span class="pull-right">43คัน 54%</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left">ค่าส่วนกลาง</span><span class="pull-right">B5,000/ด.</span>
               </div>
            </div>
            <!-end row5-->
            <!-- hide detail ---->
            <div class="col-md-12 text-grey target-r4 display-none">
               <div class="col-md-4 col-xs-4">
                <span class="pull-left">&nbsp;</span><span class="pull-right">&nbsp;</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left">จำนวนห้องชุด</span><span class="pull-right">76 ยูนิต</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left">ค่าส่วนกลางรายปี</span><span class="pull-right">B65,000</span>
               </div>
            </div>
            <!-end detail->
           
            <div class="col-md-12">
              <div class="pull-right">
                 <span id="down-r4" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
              </div>
              <div class="pull-right">
                 <span id="up-r4" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
              </div>             
            
            </div>

            <div class="clearfix"></div>
            
           


             <!-- row6 ---->
            <div class="col-md-12 text-grey border-top bg-grey2">
               <h5 class="text-primary text-center">สิ่งอำนวยความสะดวกโดยรอบ</h5>
               <div class="col-md-4 col-xs-4 text-center">
                  <img src="/img/sc-icon.png">
                  โรงเรียน
               </div>
               <div class="col-md-4 col-xs-4 text-center">
                  <img src="/img/store-icon.png">
                  ซุปเปอร์มาร์เก็ต
               </div>
               <div class="col-md-4 col-xs-4 text-center">
                 <img src="/img/hospital-icon.png">
                โรงพยาบาล
               </div>
            

            <div class="col-md-12 text-grey">
               <div class="col-md-4 col-xs-4">
                <span class="pull-left"><?=$DistEducation[2];?></span><span class="pull-right"><?=$DistEducation[0];?> กม.</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left"><?=$DistShopingMall[2];?></span><span class="pull-right"><?=$DistShopingMall[0];?> กม.</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left"><?=$DistHospital[2];?></span><span class="pull-right"><?=$DistHospital[0];?> กม.</span>
               </div>
            </div>
            <!-end row6-->


            <!-- hide detail ---->
            <div class="col-md-12 text-grey target-r5 display-none">
               <div class="col-md-4 col-xs-4">
                  <span class="pull-left"><?=$DistEducation[5];?></span><span class="pull-right"><?=$DistEducation[3];?> กม.</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                  <span class="pull-left"><?=$DistShopingMall[5];?></span><span class="pull-right"><?=$DistShopingMall[3];?> กม.</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                  <span class="pull-left"><?=$DistHospital[5];?></span><span class="pull-right"><?=$DistHospital[3];?> กม.</span>
               </div>
            </div>
            <div class="col-md-12 text-grey target-r5 display-none">
               <div class="col-md-4 col-xs-4">
                  <span class="pull-left"><?=$DistEducation[8];?></span><span class="pull-right"><?=$DistEducation[6];?> กม.</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                  <span class="pull-left"><?=$DistShopingMall[8];?></span><span class="pull-right"><?=$DistShopingMall[6];?> กม.</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                  <span class="pull-left"><?=$DistHospital[8];?></span><span class="pull-right"><?=$DistHospital[6];?> กม.</span>
               </div>
            </div>
            <!-end detail->

            <div>
                    <div class="pull-right">
                       <span id="down-r5" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
                       <span id="up-r5" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div> 
            </div>
            <div class="clearfix"></div>
            </div>
            </div>


        

          
      

        <div class="col-md-4">
          <br/>
          <div class="row border-grey2">
             <div class="col-md-12">
               <ul class="list-inline pull-right">
                    <li class="text-primary"><?=$rowUnit->DateShow;?></li>
                    <li><a href="#"><img src="/img/sun-icon2.png"></a></li>
                    <li class="text-primary"><?=$CountViewList;?></li>
                    <li class="text-primary"><a href="#"><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></a></li>
               </ul>
               <div class="clearfix"></div>            </div>
            <div class="col-md-12 bg-grey min-h-150">
                <ul class="list-inline padding-top1">
                      <li class="pull-left"><h5 class="text-white">฿<?=$TotalPrice;?></h5></li>
                      <li class="text-white pull-right">นายหน้า</li><br/>
                      <li class="text-white pull-right">--</li>
                      <div class="clearfix"></div>
                </ul>
                <hr class="text-white">
                <div class="col-xs-2 text-white">นอน <br> <?=$rowUnit->Bedroom;?>
                </div>
                <div class="col-xs-4 text-white border-left ">
                  <ul class="list-inline">
                    <li class="pull-left">น้ำ</li>
                    <li class="pull-right">ตร.ม.</li><br>
                    <li class="pull-left"><?=$rowUnit->Bathroom;?></li>
                    <li class="pull-right"><?=$sumArea;?></li>
                </div>
                <div class="col-xs-4 text-white border-left">
                  <ul class="list-inline">
                    <li class="pull-left">&nbsp;</li>
                    <li class="pull-right">ทิศ</li><br>
                    <li class="pull-left">&nbsp;</li>
                    <li class="pull-right"><?=$Direction;?></li>
                </div>
                <div class="col-xs-2 text-white border-left">
                  ชั้น</br><?=$rowUnit->Floor;?><br>
                </div>

            </div>
            <div class="clearfix"></div>
            <br>

            <div class="col-md-1"></div>
            <div class="col-md-10 bg-blue text-white text-center padding-top2">
              <p>โทรหาเจ้าของ</p>
              <!-- <span class="glyphicon glyphicon-earphone text-white"></span> <a class="text-white" href="#">099-XXX-XXXX</a> -->
              <a class="text-white" href="#">ขออภัย พร้อมแสดงผล 10/9/58</a>
            </div> 
             <div class="col-md-1"></div> 
             <div class="col-md-12 text-center padding-top1"><div class="text-primary">ฟ้อง ! : <a class="text-primary" href="#"> ไม่ใช่เจ้าของ</a> <a class="text-primary" href="#"> ขายแล้ว</a> <a class="text-primary" href="#"> ขึ้นราคา</a> <a class="text-primary" href="#"> ข้อมูลผิด</a> <a class="text-primary" href="#"> อื่นๆ</a></div></div>
             <div class="clearfix"></div><br>
          </div>
         <div class="clearfix"></div> 
         <div class="row border-grey2 text-grey"><br>
            <div class="col-xs-6 text-center"><a class="text-grey" href="#"><span class="glyphicon glyphicon-heart text-grey"></span> รายการสนใจ<a/><br></div> 
            <div class="col-xs-6 text-center"><a class="text-grey" href="#">แจ้งลดราคา</a><br></div> 
            <br><br>
            <div class="col-xs-4 text-grey text-center border-top padding-top2"><a href="#"><span class="glyphicon glyphicon-envelope text-grey"></span></a></div>
            <div class="col-xs-4 text-grey text-center border-left border-top padding-top2"><a class="text-grey" href="#">Facebook</a></div>
            <div class="col-xs-4 text-grey text-center border-left border-top padding-top2"><a class="text-grey" href="#">อื่นๆ..</a></div>
            <br>
         </div><br>
        </div>


        <div class="col-md-12 padding-top1">

          <img class="img-responsive" src="/img/map03.png">
        </div>
        <div class="clearfix"></div>
        <br/>
        <div class="row text-center"><strong>ที่อยู่อาศัยคล้ายกัน</strong></div><br>
        <div class="row">
            <div class="col-md-4">
              <img src="/img/list03.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong</td>
                  <td><strong>B <span class="text-primary"> 14.45M</span></span></td>
                  <td><strong>B <span class="text-primary">138,000</span></span>/ม2.</td>
                </tr>
                <tr>
                  <td><span class="text-grey">2 นอน 150ม. ชั้น 15</span></td>
                  <td><span class="text-blue">5 </span> <img src="/img/sun-icon.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><span class="text-blue">089-123-4567</span></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <img src="/img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong</td>
                  <td><strong>B <span class="text-primary"> 14.45M</span></strong></td>
                  <td><strong>B <span class="text-primary">138,000</span>/ม2.</strong></td>
                </tr>
                <tr>
                  <td><span class="text-grey">2 นอน 150ม. ชั้น 15</span></td>
                  <td><span class="text-blue">5 </span> <img src="/img/sun-icon.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <img src="/img/list03.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong></td>
                  <td><strong>B <span class="text-primary"> 14.49M</span></strong></td>
                  <td><strong>B <span class="text-primary">138,000</span>/ม2.</strong></td>
                </tr>
                <tr>
                  <td>2 นอน 150ม. ชั้น 15</td>
                  <td><span class="text-blue">78% REPLY</span></td>
                  <td><a class="text-blue" href="#">คุยกับเจ้าของ</a></td>
                </tr>
              </table>
            </div>
        </div>
</div>



</div>
<!--End Container-->


<br/><br/>
<!--- footer -->
<div class="container-fluid footer">
	<div class="col-md-10"><p><small>COPYRIGHT © 2015 , Z Estate CO, LTD ALL RIGHTS RESERVED </small></p>
        </div>
        <div class="col-md-2">
          <div class="col-xs-2 pull-right"><small>Security</small></div>
          <div class="col-xs-2 pull-right"><small>Terms</small></div>
          <div class="col-xs-2 pull-right"><small>Privacy</small></div>
          <div class="col-xs-2 pull-right"><small>Policy</small></div>
        </div>
</div>
<!-- end footer -->


     <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script type="text/javascript">
       $('.selectpicker').selectpicker();
     </script>
     <script type="text/javascript" language="javascript">

         $(document).ready(function() {
            $("#down-r1").click(function(){
               $(".target-r1").slideDown( 'fast', function(){});
               $("#down-r1").hide( 'fast', function(){});
               $("#up-r1 ").show( 'fast', function(){});      
            });
            $("#down-r2").click(function(){
               $(".target-r2").slideDown( 'fast', function(){});
               $("#down-r2").hide( 'fast', function(){});
               $("#up-r2 ").show( 'fast', function(){});      
            });
            $("#down-r3").click(function(){
               $(".target-r3").slideDown( 'fast', function(){});
               $("#down-r3").hide( 'fast', function(){});
               $("#up-r3 ").show( 'fast', function(){});      
            });
            $("#down-ra").click(function(){
               $(".target-ra").slideDown( 'fast', function(){});
               $("#down-ra").hide( 'fast', function(){});
               $("#up-ra ").show( 'fast', function(){});      
            });
            $("#down-rb").click(function(){
               $(".target-rb").slideDown( 'fast', function(){});
               $("#down-rb").hide( 'fast', function(){});
               $("#up-rb ").show( 'fast', function(){});      
            });
            $("#down-rc").click(function(){
               $(".target-rc").slideDown( 'fast', function(){});
               $("#down-rc").hide( 'fast', function(){});
               $("#up-rc ").show( 'fast', function(){});      
            });
            $("#down-r4").click(function(){
               $(".target-r4").slideDown( 'fast', function(){});
               $("#down-r4").hide( 'fast', function(){});
               $("#up-r4").show( 'fast', function(){});      
            });
            $("#down-r5").click(function(){
               $(".target-r5").slideDown( 'fast', function(){});
               $("#down-r5").hide( 'fast', function(){});
               $("#up-r5").show( 'fast', function(){});      
            });

            $("#up-r1").click(function(){
               $(".target-r1").slideUp( 'fast', function(){});
               $("#down-r1").show( 'fast', function(){});  
               $("#up-r1 ").hide( 'fast', function(){});  
            });
            $("#up-r2").click(function(){
               $(".target-r2").slideUp( 'fast', function(){});
               $("#down-r2").show( 'fast', function(){});  
               $("#up-r2 ").hide( 'fast', function(){});  
            });
            $("#up-r3").click(function(){
               $(".target-r3").slideUp( 'fast', function(){});
               $("#down-r3").show( 'fast', function(){});  
               $("#up-r3 ").hide( 'fast', function(){});  
            });
            $("#up-ra").click(function(){
               $(".target-ra").slideUp( 'fast', function(){});
               $("#down-ra").show( 'fast', function(){});  
               $("#up-ra ").hide( 'fast', function(){});  
            });
            $("#up-rb").click(function(){
               $(".target-rb").slideUp( 'fast', function(){});
               $("#down-rb").show( 'fast', function(){});  
               $("#up-rb ").hide( 'fast', function(){});  
            });
            $("#up-rc").click(function(){
               $(".target-rc").slideUp( 'fast', function(){});
               $("#down-rc").show( 'fast', function(){});  
               $("#up-rc ").hide( 'fast', function(){});  
            });
            $("#up-r4").click(function(){
               $(".target-r4").slideUp( 'fast', function(){});
               $("#down-r4").show( 'fast', function(){});  
               $("#up-r4 ").hide( 'fast', function(){});  
            });
            $("#up-r5").click(function(){
               $(".target-r5").slideUp( 'fast', function(){});
               $("#down-r5").show( 'fast', function(){});  
               $("#up-r5").hide( 'fast', function(){});  
            });


         });
      </script> 
      <script type="text/javascript">
          $(function () {

          $('.toggle').click(function (event) {
              event.preventDefault();
              var target = $(this).attr('href');
              $(target).toggleClass('hidden show');
          });

      });
      </script>   
<script type="text/javascript">

function formatDollar(num) {
    var p = num.toFixed(0).split();
    return  p[0].split("").reverse().reduce(function(acc, num, i, orig) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "");
}
	function Calculate_Salary(b,a,c){
			crate=(a/12)/100;
			cperiod=c*12;
			csalary=(b*40)/100;
			var1=1/(Math.pow((1+crate),cperiod));
			var2=-csalary+(csalary*Math.pow((1+crate),cperiod));
			return(var1*var2)/crate
	};

	function Function_CreditLineMulti(){
			var c=parseFloat($("#x1").val());
			var b=parseFloat($("#x2").val());
			var d=parseFloat($("#x3").val());
			var e=parseFloat($("#x4").val());
			if(!(c<=0||b<=0)){
				var a=0;creditline=Calculate_Salary(c,b,d);
				var f=e-creditline;
				$("#showPayPerMonth").val('฿'+formatDollar((c*40)/100));
				$("#showLoan").val('฿'+formatDollar(Math.round(creditline*100)/100));
				if (f<=0)
				{
					$("#showPayTransfer").val('฿'+formatDollar(Math.round(0*100)/100));
				} else {
					$("#showPayTransfer").val('฿'+formatDollar(Math.round(f*100)/100));
				}
			}

			return false
	}

</script>   

</body>
</html>