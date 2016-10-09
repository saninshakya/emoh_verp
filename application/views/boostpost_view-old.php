</div>
<?php
$CreditBalance=$this->credit->CreditBanlance();
?>
<input type="hidden" id="CreditBalance" name="CreditBalance" value="<?=$CreditBalance;?>">
<div class="container-fluid">
	<div class="margin-t50 hidden-sm hidden-xs"></div>

	<aside class="col-md-2 hidden-xs hidden-sm">
		<ul class="nav">
		    <li>
				<h4>
					 คุณมี <span><?=$this->credit->CreditBanlance();?></span>  เหรียญ
				</h4>
			</li>
			<br>
			<li>
				<h4>
					<a href="/zhome/dashboard/owner" id="owner" class="<?php if($type=='owner'){echo "nav-active";}else{echo "text-grey2";}?>">ประกาศของคุณ </a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/favourite" id="favourite" class="<?php if($type=='favourite'){echo "nav-active";}else{echo "text-grey2";}?>">ทรัพย์สินที่สนใจ</a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/lastview" id="lastview" class="<?php if($type=='lastview'){echo "nav-active";}else{echo "text-grey2";}?>">รายการล่าสุด</a>
				</h4>
			</li>
			<!--<br>
			<li class=""><h4><a href="#" id="agent" class="<?php if($type=='agent'){echo "nav-active";}else{echo "text-grey2";}?>">งานนายหน้า</a></h4></li>-->
			<br>
			<!--<li class="">
				<h4>
					<a href="/zhome/dashboard/profile" id="profile" class="<?php if($type=='profile'){echo "nav-active";}else{echo "text-grey2";}?>">ข้อมูลส่วนบุคคล</a>
				</h4>
			</li>-->
			<!--<li class="">
				<h4>
					<a href="/zhome/payment" id="profile" class="<?php if($type=='payment'){echo "nav-active";}else{echo "text-grey2";}?>">สั่งซื้อเหรียญ</a>
				</h4>
			</li>-->
		</ul>
		<div class="h360 hidden-xs"></div>
	</aside>

	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding-none">




<?php
$curyear=date('Y')+1;
	if ($ListPostType1->num_rows()==0){
?>



<?php
	} else {
?>


<?php
	//loop ListPostType1 detail
	foreach ($ListPostType1->result() as $row){
		$POID=$row->POID;
		$Address=$row->Address;
		$RoomNumber=$row->RoomNumber;

		$ProjectName=$row->ProjectName;
		$PricePerSqShow=number_format($row->PricePerSq, 0,'',',');
		$OwnerName=$row->OwnerName;
		$queryDistMarker=$this->db->query('Select a.Distance,a.Station,a.Type,b.KeyName from DistMarker a left join KeyMarker b on a.Station=b.KeyID Where a.PID="'.$row->PID.'" and (a.Type="BTS" or a.Type="MRT" or a.Type="BRT" or a.Type="ARL") order by a.Distance limit 1');
		$rowDistMarker=$queryDistMarker->row();
		$Distance=$rowDistMarker->Distance;
		$Distance=$Distance/1000;
		$DistanceList=$Distance;
		$Distance=number_format($Distance,1,'.',',');
		$KeyName=$rowDistMarker->KeyName;
		$DistName=$KeyName." ".$Distance." กม.";
		$Telephone=$row->Telephone1;
		$Active=$row->Active;
		$ActivePrefix="";
		if ($row->Active==81){
			$ActivePrefix="(ให้เช่าแล้ว)";
		}
		if ($row->Active==82){
			$ActivePrefix="(ขายแล้ว)";
		}
		if ($row->Active==92){
			$ActivePrefix="(ประกาศหมดอายุ)";
		}
		if ($row->Active==93){
			$ActivePrefix="(ซ่อนประกาศ)";
		}


		if ($Address!=null and $Address!=''){
			$prefix=$Address;
		} else {
			$prefix=$RoomNumber;
		};
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==2){
			$Price=$row->DTotalPrice;
			$prefixTOAdv="ขายดาวน์";
			$modal_id="InformSold";
		}else if ($TOAdvertising==5){
			$Price=$row->PRentPrice;
			$prefixTOAdv="เช่า";
			$modal_id="InformRent";
		}else if ($TOAdvertising==1){
			$Price=$row->TotalPrice;
			$prefixTOAdv="ขาย";
			$modal_id="InformSold";
		}
		if ($TOAdvertising=='5'){
			$PriceShow=number_format($Price, 0, '', ',');
		} else {
			//$PriceShow=number_format(($Price/1000000), 2, '.', '')."M";
			$PriceShow=number_format($Price, 0, '', ',');
		}
		$useArea=$row->useArea;
		$terraceArea=$row->terraceArea;
		$sumArea=$useArea;
		if ($sumArea!=0){
			$PricePerSq=$Price/$sumArea;
		} else {
			$PricePerSq=0;
		};
		$Token=$row->Token;
		$Floor=$row->Floor;
		if($row->Bedroom=="99"){
			$Bedroom="สตูดิโอ";
			$Bedroom_mb="สตูดิโอ";
		}else{
			$Bedroom=$row->Bedroom." นอน";
			$Bedroom_mb=$row->Bedroom." นอน";
		}
		$Bathroom=$row->Bathroom." น้ำ";
		$Bathroom_mb=$row->Bathroom." น้ำ";
		$NumExpire=$this->dashboard->DateExpireNum($Token);
		$DateExpire=date("d/m/Y",mktime(0,0,0,date("m"),date("d")+$NumExpire,date("Y")));
		if ($Active!=82){

?>
          <!--<div class="height5 visible-xs visible-sm"></div>-->
          <div class="col-lg-12 col-md-12 padding-none">
          <!--<div class="height10 visible-xs visible-sm"></div>

            <div class="clearfix visible-xs visible-sm"></div>
            <div class="height5 visible-xs visible-sm"></div>-->

            <div class="row col-md-12 col-sm-6 col-xs-12 padding-none3 sm-padding">
				<div class="col-md-12 clear-margin-padding click display-none">
					<h4 class="text-orange pull-right padding-none"><?=$CreditBalance;?>  เหรียญ</h4>
				</div>

				<div class="col-md-6 text-shadow2 bg-responsive2" onclick="window.open('/zhome/unitDetailOwner/<?=$row->POID;?>', '_blank')" style="background-image: linear-gradient(rgba(255,255,255,0.3),rgba(51,51,51,0.3)), url('<?=$this->dashboard->imageList($row->POID);?>');">
					<!--Mobile-->
					<div class="visible-lg visible-md visible-xs visible-sm ">
						<div class="pull-left col-xs-12" style="position:absolute;bottom:0;left:0;">
							<div class="text-white"><span><?=$prefixTOAdv?></span></div>
							<div class="text-white"><span class="font20">฿ <?=$PriceShow?></span> | <span ><?=$Bedroom?></span> | <span><?=$Bathroom?></span> | <span><?=$sumArea?> ม&sup2;</span></div>
							<div class="text-white small"><?=$ProjectName?> <span>(<?=$DistName?>)</span> </div>
						</div>

						<div class="pull-right col-xs-12" style="position:absolute;top:2;right:0; padding-right: 10px; margin-right: 0px;">
							<div class="text-white text-right">
						      <span><img src="/img/sun-s-icon-white.png" class="text-shadow"> </span>
						       <span class="text-white"><?=$row->ActiveDay;?>&nbsp;&nbsp;</span>
						       <span class="glyphicon glyphicon-eye-open text-white clear-margin-padding input-sm3"></span>
		                       <span class="padding-none text-white"><?=$this->dashboard->countViewPost($POID);?>&nbsp;&nbsp;
		                       </span>

							  <span width="3px" class="glyphicon glyphicon-earphone text-white input-sm3 clear-margin-padding">
							  </span>
							  <span class="text-white">
							  <?=$this->dashboard->countTelPost($POID);?>
							  </span>
							</div>
				        </div>
						<div class="clearfix"></div>
					</div>
                 <!--End Mobile-->
				</div>
				<!--end col md4-->

				<!--stat on pc-->
				<div class="col-md-6 hidden-xs hidden-sm">
					<span class="glyphicon glyphicon-signal text-grey2 padding-none" width="5px" aria-hidden="true"></span>
					<?php
					$checkStat=$this->credit->checkBoostPost($POID);
					if ($checkStat==0){
					?>
						<span class="text-black">สถิติการโปรโมท <b>ยังไม่เคยโปรโมท</span>
						<div class="height10"></div>
						<hr class="bg-grey7 padding-none height1">
						<div class="height5"></div>
						<div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2">11,123</h5><small class="text-grey">เห็นประกาศ</small></div>
						<div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2">1,123</h5><small class="text-grey">คลิกดูประกาศ</small></div>
						<div class="col-md-4 col-xs-4 text-center"><h5 class="padding-none text-green2">2</h5><small class="text-grey">คลิกดูเบอร์โทร</small></div>
						<div class="clearfix"></div>
						<div class="height5"></div>
						<hr class="bg-grey7 padding-none height1">
						<div class="clearfix"></div>
						<div class="height20"></div>
						<div class="col-xs-12 text-center"><a href="#" class="text-black">ดูรายละเอียด > </div>
						<div class="clearfix"></div>
						<div class="height5"></div>
					<?php
					} else {
					?>
						<span class="text-black">สถิติการโปรโมท ตั้งแต่วันที่ <b><?=$this->credit->StartStat($POID);?></span>
						<div class="height10"></div>
						<hr class="bg-grey7 padding-none height1">
						<div class="height5"></div>
						<div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2"><?=$this->credit->StatView($POID);?></h5><small class="text-grey">เห็นประกาศ</small>
						</div>
						<div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2"><?=$this->credit->StatClickView($POID);?></h5><small class="text-grey">คลิกดูประกาศ</small>
						</div>
						<div class="col-md-4 col-xs-4 text-center"><h5 class="padding-none text-green2"><?=$this->credit->StatClickTel($POID);?></h5><small class="text-grey">คลิกดูเบอร์โทร</small>
						</div>
						<div class="clearfix"></div>
						<div class="height5"></div>
						<hr class="bg-grey7 padding-none height1">
						<div class="clearfix"></div>
						<div class="height20"></div>
						<div class="col-xs-12 text-center"><a href="#" class="text-black">ดูรายละเอียด > </a></div>
						<div class="clearfix"></div>
						<div class="height5"></div>
					<?php
						}
					?>

					<!--ลักษณะการซื้อ-->
					<div class="hidden-sm hidden-xs">
						<div class="clearfix"></div>
						<div class="height11"></div>
						<div class="col-md-12 padding-none-pc">
							<div class="col-xs-12 padding-none-pc">
			                    <div class="pull-left hidden-md hidden-lg">
									<span class="glyphicon glyphicon-user"></span>
			                    </div>
			                    <div class="pull-left padding-l15  hidden-md hidden-lg"></div>
			                    <div class="pull-left"><span class="padding-l10 hidden-md hidden-lg"></span> <span class="text-black padding-none "> ลักษณะการซื้อ/เช่าที่จะโปรโมท</span></div>
			                    <div class="pull-right padding-none hidden-md hidden-lg">
									<span class="glyphicon glyphicon-question-sign input-sm padding-none"></span>
			                    </div>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 padding-none-pc">
			                    <div class="pull-left text-left">
									<p class="text-black padding-none ">ประเภท : </p>
			                    </div>
								<div class="pull-left text-lef">
									<p class="text-grey padding-none ">&nbsp;ขาย</p>
			                    </div>
							</div>
							<div class="clearfix"></div>
							<div class="height15 hidden-md hidden-lg"></div>
							<div class="col-md-12 padding-none-pc">
			                    <div class="pull-left text-left">
									<p class="text-black padding-none ">ทำเล : </p>
			                    </div>
			                     <div class="pull-left text-left">
									<p class="text-grey padding-none ">&nbsp;5 กม. รอบ <b><?=$row->ProjectName;?></b></p>
			                    </div>
			                    <div class="clearfix"></div>
				                <div class="height15"></div>
							</div>
						</div>
					</div>
					<!--end ลักษณะการซื้อ-->

				</div>
				<!--end stat on pc-->
			</div>
<?php
		}
	//end loop ListPostType1 detail
	}
?>
            <!--end row-->
<?php
}
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/submitBoostPost', $attributes);
$queryBoostStat=$this->credit->getBoostStat($POID);
$rowBoostStat=$queryBoostStat->row();
?>
</div>
 <!--end stat mobile-->
<div class="clearfix hidden-sm hidden-xs "></div>
<div class="height15 hidden-sm hidden-xs "></div>
<input type="hidden" name="showCoin" id="showCoin">
<input type="hidden" name="showDate" id="showDate" value="">
<input type="hidden" id="POID" name="POID" value="<?=$POID;?>">
	<!--<hr class="bg-grey7 padding-none height10 visible-sm visible-xs">-->
	<div class="clearfix"></div>
	<div class="height15 visible-sm visible-xs"></div>
	<div class="row padding-none">
		<div id="summaryBoost" class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left padding-none-pc">
				<h5>สรุปยอด</h5>
			</div>
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none">
				<div class="col-lg-4 col-md-4 col-xs-8 text-left padding-none-pc">
					<p class="text-black padding-none ">จำนวนโปรโมทสูงสุดต่อวัน</p>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-4 text-right">
					<p class="text-grey padding-none "><?=$rowBoostStat->credit_limit_pday;?> ครั้ง</p>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="col-lg-4 col-md-4 col-xs-6 text-left padding-none-pc">
					<p class="text-black padding-none ">โปรโมทแล้ว</p>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-6 text-right ">
					<p class="text-grey padding-none "><?=$rowBoostStat->total_count_view;?> ครั้ง</p>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="col-lg-4 col-md-4 col-xs-6 text-left padding-none-pc">
					<p class="text-black padding-none ">โปรโมตเฉลี่ยต่อวัน</p>
				</div>
				 <div class="col-lg-4 col-md-4 col-xs-6 text-right">
					<p class="text-grey padding-none "><?=number_format($rowBoostStat->avg_credit_pday,0);?> ครั้ง/วัน</p>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="col-lg-4 col-md-4 col-xs-6 text-left padding-none-pc">
					<p class="text-black padding-none ">วันสิ้นสุด</p>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-6 text-right">
					<p class="text-grey padding-none "><?=$rowBoostStat->end_date;?></p>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="height15"></div>
			<?php
			if($rowBoostStat->Active==1){
				$startAdsClass="";
				$stopAdsClass="display-none";
			}else if($rowBoostStat->Active==2){
				$startAdsClass="display-none";
				$stopAdsClass="";
			}
			?>
			<a href="#summaryBoost" class="display-none pause-bt" onclick="showads3()"><div id="pauseads" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 border-grey text-center btn-stop-boost <?//=$startAdsClass;?>">
			คลิกเพื่อหยุดโปรโมทชั่วคราว
			</div></a>
			<a href="#summaryBoost" class="resume-bt display" onclick="showads2()"><div id="showads2" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 border-grey text-center <?//=$stopAdsClass;?> btn-start-boost">
			คลิกเพื่อโปรโมทต่อ
			</div></a>
			<div class="clearfix"></div>
			<div class="height15"></div>
		</div>
		<!--endสรปยอด-->

		<div class="clearfix"></div>
		<div class="height5"></div>
		<div class="row visible-sm visible-xs"><hr class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>
		<hr class="padding-none hidden-sm hidden-xs">

		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="height15 hidden-xs hidden-sm"></div>
		<!--show after click promote-->
		<div class="display-none showads2">
			<div class="col-md-12 padding-none-pc">
				<div class="col-md-12  text-left padding-none-pc">
					<div class="pull-left"><h5>เลือกจุดเด่นประกาศ(<span id="maxLengthChar">45</span> ตัวอักษร)</h5></div>
					<div class="pull-left padding-t9"><a href="#" class="text-grey"> &nbsp;(ห้ามใส่เบอร์โทร ไลน์ อีเมล์)</a></div>
				</div>
				<div class="clearfix"></div>
				<div class="height10"></div>
				<div class="col-md-4 col-xs-12 text-left padding-none-pc"><input type="text" id="textBoostPost" name="textBoostPost" class="form-control input-z input-boost" style="" maxlength="45"></div>
			</div>
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="col-xs-12 radio padding-none-pc">
				<div class="col-xs-12 padding-none-pc display-none">
					<label>
						<div class="pull-left"><input type="radio"  name="ShowOnSearch" id="optionsShow1" value="20" ></div>
						<div class="text-black pull-left margin-t21m">โชว์จุดเด่นบนหน้าค้นหา 20 เหรียญ/วัน</div>
					</label>
				</div>
				<div class="clearfix"></div>
				<div class="height10"></div>
				<div class="col-xs-12 padding-none-pc display-none">
					<label>
						<div class="pull-left"><input type="radio"  name="ShowOnSearch" id="optionsShow/" value="20" ></div>
						<div class="text-black pull-left margin-t21m">โชว์จุดเด่นถึง __/__/__ <span class="text-red">ต้องการ__เหรียญ</span></div>
					</label>
				</div>
				<div class="clearfix"></div>
				<div class="height15 display-none"></div>
				<div class="col-xs-12 visible-sm visible-xs"><hr class="padding-none"></div>
				<hr class="visible-md visible-lg padding-none">
				<div class="height15  visible-xs visible-sm"></div>
			</div>
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="col-md-12 visible-xs visible-sm">
				<div class="text-black text-center">ประมาณการค้นหาในรัศมี 5 กม.</div>
				<div class="clearfix"></div>
				<div class="height10"></div>
				<div class="text-center"><h3 class="text-green2 padding-none"><?=$this->credit->statCountViewMonth($row->PID);?> ครั้ง/วัน</h3></div>
				<div class="clearfix"></div>
				<div class="height20"></div>
				<div class="text-center text-black">จำนวนโฆษณาคงเหลือ </div>
				<div class="clearfix"></div>
				<div class="height10"></div>
				<div class="text-center"><h3 class="text-warning padding-none"><?=$CreditBalance;?> ครั้ง</h3></div>
			</div>
			<div class="clearfix visible-xs visible-sm"></div>
			<div class="height15 visible-xs visible-sm"></div>
			<div class="clearfix hidden-xs hidden-sm"></div>
			<div class="height10 hidden-xs hidden-sm"></div>
			<div class="row visible-sm visible-xs"><hr class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>
			<div class="clearfix visible-xs visible-sm"></div>
			<div class="height15 visible-xs visible-sm"></div>
			<div class="row col-lg-12 col-md-12 padding-none-pc">
				<div class="col-xs-12 padding-l15m padding-none">
					<div class="col-md-12 padding-none">
						<div class="pull-left"><h5>เลือกจำนวนโฆษณาสูงสุดต่อวัน </h5></div>
						<div class="clearfix visible-xs visible-sm"></div>
						<div class="pull-left padding-t9">&nbsp;<span class="text-grey">(ใช้ 1 เหรียญ/การโปรโมท 1 ครั้ง)</span></div>
					</div>
					<div class="clearfix"></div>
					<div class="height15"></div>
					<div class="col-md-12 padding-none text-grey hidden-xs hidden-sm">การค้นหาในรัศมี 5 ก.ม. รอบทรัพย์สิน &nbsp;<span class="text-blue">150 ครั้ง/วัน</span></div>
				</div>
				<div class="clearfix hidden-xs hidden-sm"></div>
				<div class="height15 hidden-xs hidden-sm"></div>
				<div class="col-xs-12 visible-sm visible-xs"><hr class="padding-none"></div>
					<div class="clearfix visible-xs visible-sm"></div>
				<div class="height15"></div>
				<div class="w33-boost radio padding-none border-boost">
					<div class="col-xs-12 padding-none-pc">
						<label>
							<div class="pull-left"><input type="radio"  name="CountBoostPost" id="optionsRadios1" value="100" onclick="document.getElementById('showCoin').value=this.value;changeTXTButton();" ></div>
							<div class="text-black pull-left margin-t21m">100 ครั้ง (100 เหรียญ)</div>
					   </label>
					</div>
				</div>
				<div class="clearfix visible-sm visible-xs"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div class="col-xs-12 visible-sm visible-xs"><hr class="padding-none"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div class="w33-boost radio padding-none border-boost">
					<div class="col-xs-12 padding-none-pc">
						<label>
							<div class="pull-left"><input type="radio" name="CountBoostPost" id="optionsRadios2" value="300" onclick="document.getElementById('showCoin').value=this.value;changeTXTButton();"></div>
							<div class="text-black pull-left margin-t21m">300 ครั้ง (300 เหรียญ)</div>
						</label>
					</div>
				</div>
				<div class="clearfix visible-sm visible-xs"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div class="col-xs-12 visible-sm visible-xs"><hr class="padding-none"></div>

				<div class="height15 visible-sm visible-xs"></div>
				<div class="w33-boost radio padding-none border-boost">
					<div class="col-xs-12 padding-none-pc">
						<label>
							<div class="pull-left"><input type="radio" name="CountBoostPost" id="optionsRadios3" value="500" onclick="document.getElementById('showCoin').value=this.value;changeTXTButton();"></div>
							<div class="text-black pull-left margin-t21m">500 ครั้ง (500 เหรียญ)</div>
						</label>
					</div>
				</div>
				<div class="clearfix visible-sm visible-xs"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div class="col-md-4 col-xs-12 visible-sm visible-xs"><hr class="padding-none"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div class="w33-boost radio padding-none border-boost">
					<div class="col-xs-12 padding-none-pc">
						<label onclick="custom_ads();">
							<div class="pull-left"><input type="radio" name="CountBoostPost" id="option_custom" value="define"></div>
							<div id="div_custom" class="text-black pull-left margin-t21m">กำหนดเอง</div>
							<div class="pull-left"><input name="defineCountBoostPost" id="option_custom2" type="text" class="display-none padding-none" style="width:70px;" onchange="document.getElementById('showCoin').value=this.value;changeTXTButton();" onblur="$('#option_custom2').css({'border':'none'});" value=""> </div>
							<div id="div_custom2" class="text-black display-none pull-left margin-left5 margin-t5"> ครั้ง</div>
						</label>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="col-md-12 padding-none-pc"><p class="text-blue2">กรณีที่มีโฆษณาหลายประกาศในพื้นที่เดียวกัน ระบบจะแสดงโฆษณาที่ใกล้และสอดคล้องกับการค้นหาก่อน</p></div>
				<div class="clearfix"></div>
				<div class="height5"></div>
				<div class="clearfix hidden-xs hidden-sm"></div>
				<div class="height10 hidden-xs hidden-sm"></div>
			</div><!--end row-->
			<div class="row visible-sm visible-xs"><hr class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>
			<hr class="padding-none visible-md visible-lg">
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="clearfix hidden-xs hidden-sm"></div>
			<div class="height10 hidden-xs hidden-sm"></div>
			<div class="row col-lg-12 col-md-12 padding-none-pc">
				<div class="col-md-12 col-xs-12 padding-l15m padding-none">
					<div class="pull-left"><h5>เลือกจำนวนวันที่ต้องการแสดงโฆษณา</h5></div>
				</div>
				<div class="clearfix"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<div class="col-xs-12 visible-xs visible-sm"><hr class="padding-none"></div>
				<div class="height15"></div>
				<div class="w33-boost radio padding-none border-boost">
					<label class="col-xs-12">
						<div class="col-md-2 col-xs-8  padding-none-pc pull-left">
							<div class="pull-left"><input type="radio" name="DayBoostPost" id="optionsRadios1" value="1" onclick="document.getElementById('showDate').value=document.getElementById('setDate1').innerHTML;changeTXTButton();"></div>
							<div class="text-black pull-left margin-t21m vertical-center"><span class="text-black">1 วัน</span></div>
						</div>
						<div class="col-md-10 col-xs-4 pull-left-rightm text-grey margin-t21m vertical-center"><span id="setDate1"><?=date("d/m/Y",mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));?></span></div>
					</label>


				</div>
				<div class="clearfix visible-xs visible-sm"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<div class="col-xs-12 visible-xs visible-sm"><hr class="padding-none"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<div class="w33-boost radio padding-none border-boost">
					<label class="col-xs-12">
						<div class="col-md-2 col-xs-8  padding-none-pc">
							<div class="pull-left"><input type="radio" name="DayBoostPost" id="optionsRadios2" value="7" onclick="document.getElementById('showDate').value=document.getElementById('setDate2').innerHTML;changeTXTButton();"></div>
							<div class="text-black pull-left margin-t21m">7 วัน</div>
						</div>
						<div class="col-md-10 col-xs-4 pull-left-rightm text-grey margin-t21m"><span id="setDate2"><?=date("d/m/Y",mktime(0, 0, 0, date("m")  , date("d")+7, date("Y")));?></span></div>
					</label>
				</div>
				<div class="clearfix visible-xs visible-sm"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<div class="col-xs-12 visible-xs visible-sm"><hr class="padding-none"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<div class="w33-boost col-xs-12 radio padding-none border-boost">
					<label class="col-xs-12">
						<div class="col-md-3 col-xs-8  padding-none-pc">
							<div class="pull-left"><input type="radio" name="DayBoostPost" id="optionsRadios3" value="30" onclick="document.getElementById('showDate').value=document.getElementById('setDate3').innerHTML;changeTXTButton();"></div>
							<div class="text-black pull-left margin-t21m">30 วัน</div>
						</div>
						<div class="col-md-9 col-xs-4 pull-left-rightm text-grey margin-t21m"><span id="setDate3"><?=date("d/m/Y",mktime(0, 0, 0, date("m")  , date("d")+30, date("Y")));?></span></div>
					</label>
				</div>
				<div class="clearfix visible-xs visible-sm"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<!--<div class="height10 visible-md visible-lg"></div>-->
				<div class="col-xs-12 visible-xs visible-sm"><hr class="padding-none"></div>
				<div class="height15 visible-xs visible-sm"></div>
				<div class="w33-boost col-xs-12 radio padding-none  border-boost">
					<label  class="col-xs-12" onclick="custom_ads2();">
						<div class="col-md-8 col-xs-8  padding-none-pc">
							<div class="pull-left">
								<input type="radio" name="DayBoostPost" id="optionsRadios4" value="define">
							</div>
							<div id="date_custom" class="pull-left text-black margin-t21m">กำหนดเอง</div>
							<div id="date_custom2" class="form-group col-xs-12 display-none padding-none">
								<div class='input-group date' id='boostpost-date'>
									<input name="defineDayBoostPost" type="text" id="datepicker" data-date-format="dd/mm/yyyy" class="padding-none" onchange="document.getElementById('showDate').value=this.value;changeTXTButton();" onblur="$('#datepicker').css({'border':'none'});">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-xs-4 text-right text-grey margin-t21m"></div>
					</label>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="row visible-sm visible-xs"><hr class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>
		<div class="clearfix"></div>
	</div><!--end row-->
</form>

<div class="display-none showads2">
	<!--ลักษณะการซื้อ-->
	<div class="clearfix"></div>
	<div class="height20"></div>
	<div class="col-md-12 padding-none-pc  visible-sm visible-xs">
		<div class="col-xs-12 padding-none-pc">
			<div class="pull-left hidden-md hidden-lg">
				 <span class="glyphicon glyphicon-user"></span>
			</div>
			<div class="pull-left padding-l15  hidden-md hidden-lg"></div>
			<div class="pull-left padding-l15 padding-t3"><h5 class="padding-none"> ลักษณะการซื้อ/เช่าที่จะโปรโมท</h5></div>
			<div class="pull-right padding-none hidden-md hidden-lg">
				 <span class="glyphicon glyphicon-question-sign input-sm padding-none"></span>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="col-md-4 padding-l15">
			<div class="pull-left text-left">
				<p class="text-black padding-none ">ประเภท : </p>
			</div>
			<div class="pull-left text-lef">
				<p class="text-grey padding-none ">&nbsp;ขาย/ขายดาวน์/ห้องโครงการ</p>
			</div>
		</div>
		<div class="clearfix hidden-md hidden-lg"></div>
		<div class="height15 hidden-md hidden-lg"></div>
		<div class="col-md-4 padding-l15">
			<div class="pull-left text-left">
				<p class="text-black padding-none ">ทำเล :</p>
			</div>
			 <div class="pull-left text-left">
				<p class="text-grey padding-none ">&nbsp;5 กม. รอบ <b><?=$row->ProjectName;?></b></p>
			</div>
			<div class="clearfix"></div>
			<div class="height15"></div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="height10"></div>
	<div class="row visible-sm visible-xs"><hr class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>
	<div class="clearfix"></div>
	<!--End ลักษณะการซื้อ-->

	<div class="row col-lg-12 col-md-12 padding-none-pc">
		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="clearfix"></div>
		<div class="height10"></div>
		<div class="col-md-12 padding-none-pc"><span class="text-black"><b>เงื่อนไขการโฆษณา</b></span><span class="text-red"> (กรุณาอ่านก่อนกดลงโฆษณา)*</div>
		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="col-xs-12 checkbox padding-none">
			<div class="col-xs-12  padding-none-pc"> <label><input type="checkbox" name="optionsCondition" id="optionsCondition" value="" onchange="checkCondition();" ><span class="text-grey">ข้าพเจ้าจะไม่ใช้คำไม่สุภาพ ส่อเสียด เกินจริง สื่อความหมายทางเพศในการโปรโมทประกาศ</span></label>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="col-xs-12 checkbox padding-none">
			<div class="col-xs-12  padding-none-pc"><label><input type="checkbox" name="optionsCondition" id="optionsCondition2" value="" onchange="checkCondition();" ><span class="text-grey">ข้าพเจ้าจะใช้ภาพถ่ายแนวนอนและเก็บห้องให้เรียบร้อย โดยเว็บไซต์มีสิทธิไม่อนุมัติหากภาพถ่ายไม่ได้คุณภาพ</span><span><a class="text-red" href="#">(ดูตัวอย่างที่ไม่อนุมัติ)</a></span></label>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="height15"></div>
		<div class="col-md-12  padding-none-pc"><span class="text-grey">การวินิจฉัยของ ZmyHome ถือเป็นข้อสิ้นสุดและไม่สามารถโต้แย้ง หรือขอคืนเงินโฆษณาได้</span></div>
		<div class="clearfix"></div>
		<div class="height10"></div>
		<div class="height15"></div>
	</div>
	<div class="clearfix"></div>
	<br class="visible-xs visible-sm">
	<br class="visible-xs visible-sm">
	<br class="visible-xs visible-sm">
	<br class="visible-xs visible-sm">

	<!--payment bt-->
	<div class="col-md-12 bg-grey7 boost-map-height bg-grey footer-mobile">
	<!--<div class="bg-grey7 boost-map-height bg-grey2" style="position:fixed; bottom:0; left:22.4vw; width:54.5vw;">-->
		<div class="clearfix"></div>
		<div class="height15"></div>
		<button type="submit" id="payment-bt" class="btn btn-green2 cursor input-z col-xs-12 text-white" onclick="checkCondition2();"> <h5 class="text-white padding-none padding-t2"><!--<p id="text-payment-bt">โปรโมท___ครั้ง/วัน  ถึง__/__/__</p>-->ยืนยันโฆษณา</h5>
		</button>
		<div class="clearfix"></div>
		<div class="height5"></div>
		<div class="text-black text-center">
			<small class="text-black">การคลิกปุ่มด้านบนเป็นการยอมรับ
			<a href="#" class="text-blue">นโยบายการให้บริการของ ZmyHome</a>
			<a href="#" class="text-blue"> และนโยบายการลงโฆษณา</a>
			</small>
		</div>
		<div class="clearfix"></div>
		<div class="height5"></div>
	</div><!--end payment bt-->
	<div class="clearfix"></div>
	<div class="height15"></div>
	<!--end boost post-->
</div><!--end show after click promote-->
</div><!--end col md10-->
</div><!--end container-->

<!-- Modal Check Condition -->
<div class="modal modal-sm fade display-none" id="modalCondition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto;">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center" style="height:auto; min-height:485px;">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3">กรุณาคลิกยอมรับเงื่อนไขการโฆษณา</h4>
			</div>
			<div class="modal-body" style="height:200px">
			    <br><br>
				<div style="height:15vh;"></div>
				<h4 class="text-red">กรุณาคลิกยอมรับเงื่อนไขการโฆษณา</h4>
				<div style="height:20vh;"></div>
				<br>
				<button class="btn btn-blue cursor text-white" style="padding: 10px 0 10px;" onclick="$('#modalCondition4').modal('hide');">ปิด</button>
			</div>
		</div>
	</div>
</div>
<!--End-->
<!-- Modal Check Condition -->
<div class="modal modal-sm fade display-none" id="modalCheckcredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto;">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3">กรุณาเช็คเครดิต</h4>
			</div>
			<div class="modal-body" style="height:250px">
			    <br><br><br>
				<h4>กรุณาเช็คเครดิตก่อน</h4>
			</div>
		</div>
	</div>
</div>
<!--End-->


<!-- Modal Confirm -->
<div class="modal modal-sm fade display-none" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto;">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="height:auto; min-height:485px;">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3"> ยืนยันการโฆษณา</h4>
			</div>
			<div class="modal-body padding-none" style="height:295px">
				<div class="clearfix"></div>
				<div style="height:10vh;"></div>
				<!--<div class="col-xs-4 text-right text-black">
					<p class="text-black" id="showModalCoin"></p>
				</div>-->
				<!--<div class="col-xs-12 text-blue">
					<p class="text-blue">- แสดงจุดเด่นประกาศ<span></span>วัน<span></span>เหรียญ  </p>
				</div>-->
				<!--<div class="col-xs-7 text-right text-black display-none">
					<p class="text-blue" id="showModalDate"></p>
				</div>-->
				<div class="col-xs-12" style="padding-left: 50px;"><p class="text-blue">-&nbsp&nbsp;โปรโมทประกาศเป็นเวลา <span id="showCountDay"></span> วัน<br>โดยแสดงสูงสุดไม่เกิน<span id="showCountCredit"></span> ครั้ง/วัน</p></div>
				<div class="clearfix"></div>
				<div class="height5"></div>
				<div class="col-xs-12" style="padding-left: 50px;">โฆษณาของคุณจะหยุดแสดงเมื่อ</div>
				<div class="clearfix"></div>
				<div class="height5"></div>
				<div class="col-xs-12" style="padding-left: 50px;">1) เลยวันที่คุณกำหนด</div>
				<div class="col-xs-12" style="padding-left: 50px;">2) ครบโควต้าแต่ละวัน</div>
				<div class="col-xs-12" style="padding-left: 50px;">3) เหรียญของคุณหมด</div>
				<div class="clearfix"></div>
				<div style="height:20vh;"></div>
				<div class="col-xs-12">
					<button class="btn bg-orange cursor input-z col-xs-12 text-white" onclick="document.getElementById('myform').submit();">ยืนยัน</button>
				</div>
				<div class="clearfix"></div>
                <div class="height10"></div>
				<div class="col-xs-12">
				    <button class="btn bg-grey4 cursor input-z col-xs-12 text-white" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Confirm -->

<!-- Modal NoCoin Left  -->
<div class="modal modal-sm fade display-none" id="modalNoCoin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto;">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="height:auto; min-height:485px;">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3"> เหรียญไม่พอ</h4>
			</div>
			<div class="modal-body padding-none">
				<div style="height:20vh;"></div>
				<div class="col-xs-12" style="padding-left: 70px;">
					<p class="text-blue">ต้องการ <span id="CoinReq_txt"></span> เหรียญ</p>
				</div>
				<div class="col-xs-12" style="padding-left: 70px;">
					<p class="text-blue">ขาดอยู่ <span id="CoinWant_txt" class="text-red"></span> เหรียญ</p>
				</div>
				<div style="height:33vh;"></div>
				<div class="col-xs-12">
					<button class="btn bg-orange cursor input-z col-xs-12 text-white" onclick="location.href='/zhome/payment';">ซื้อเหรียญเพิ่ม</button>
				</div>
				<div class="clearfix"></div>
				<div class="height10"></div>
				<div class="col-xs-12">
					<button class="btn bg-green2 cursor input-z col-xs-12 text-white" data-dismiss="modal" aria-label="Close" onclick="$('#modalConfirm').modal('show');">ทำรายการต่อ</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal NoCoin Left -->

<script type="text/javascript">
var max_length=45;
var nowDate = new Date();
var now = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
$('#datepicker').datepicker({
	onRender: function(date) {
		return date.valueOf() < now.valueOf() ? 'disabled' : '';
	}
}).on('changeDate', function (ev) {
	$('#showDate').val($(this).val());
	$(this).datepicker('hide');
	changeTXTButton();
});

$(window).load(function(){
  $('#payment-bt').addClass('disabled');
});

$(document).ready(function(){
	$('#textBoostPost').keyup( function(e){
		value=$(this).val();
		remain_length=max_length-value.length;
		$('#maxLengthChar').html(remain_length);
		if(value.length==max_length){
			return false;
		}
    });
	
	$('#textBoostPost').change( function(e){
		if($(this).val()==''){
			$('#maxLengthChar').html(max_length);
		}
	});
	
	$('input[name="CountBoostPost"]').click(function(){
		if($(this).val()=='define'){
			$('#showCoin').val('');
			$('#div_custom').addClass('display-none');
			$('#div_custom2').removeClass('display-none');
			$('#option_custom2').focus();
		}else{
			$('#option_custom2').val('');
			$('#div_custom').removeClass('display-none');
			$('#option_custom2').addClass('display-none');
			$('#div_custom2').addClass('display-none');
		}
		checkCondition();
	});

	$('input[name="DayBoostPost"]').click(function(){
		if($(this).val()=='define'){
			$('#showDate').val('');
			$('#date_custom').addClass('display-none');
			$('#date_custom2').removeClass('display-none');
		}else{
			$('#datepicker').val('');
			$('#date_custom').removeClass('display-none');
			$('#date_custom2').addClass('display-none');
		}
		checkCondition();
	});
	
	$('#pauseads').click(function(){
		$.post('/zhome/controlBoostPost', {Active:2,POID : $('#POID').val()} ,function(res){
			if(res==1){
				/*$('#pauseads').addClass('display-none');
				$('#showads').removeClass('display-none');*/
			}
		});
	});
	
	$('#showads').click(function(){
		$.post('/zhome/controlBoostPost', {Active:1,POID : $('#POID').val()} ,function(res){
			if(res==1){
				/*$('#pauseads').removeClass('display-none');
				$('#showads').addClass('display-none');*/
			}
		});
	});
})

function checkCondition(){

    if(($('#showCoin').val()=='') || ($('#showDate').val()=='') || ($(optionsCondition).prop('checked') == false) || ($(optionsCondition2).prop('checked') == false)){
		$('#payment-bt').addClass('disabled');
    }else{
		$('#payment-bt').removeClass('disabled');
    }
}

function  checkCondition2(){

	if(($(optionsCondition).prop('checked') == false) || ($(optionsCondition2).prop('checked') == false)){
		$('#modalCondition').modal('show');
    }else{
    	/*location.href='';*/
		if($('#showCoin').val()!='' && $('#showDate').val()!=''){
			var showDate=$('#showDate').val();
			var dateSelect=showDate.split('/');
			var dateSelectNew=dateSelect[1]+'/'+dateSelect[0]+'/'+dateSelect[2];
			var date1=new Date(dateSelectNew);
			var date2=nowDate;
			var timeDiff=Math.abs(date2.getTime() - date1.getTime());
			var diffDays=Math.ceil(timeDiff / (1000 * 3600 * 24));
			useCoin=$('#showCoin').val();
			useDay=diffDays;
			useCoinTotal=useCoin*useDay;
			useCoinTotalTxt=useCoinTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			$('#showCountCredit').html(useCoin);
			$('#showCountDay').html(diffDays);
			$('#showCountCreditTotal').html(useCoinTotalTxt);
			if($('#CreditBalance').val()==0 || $('#CreditBalance').val()<=useCoinTotal){
				wantCoin=useCoinTotal-$('#CreditBalance').val();
				wantCoinTxt=wantCoin.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
				$('#CoinReq_txt').html(useCoinTotalTxt);
				$('#CoinWant_txt').html(wantCoinTxt);
				$('#modalNoCoin').modal('show');
			}else{
				$('#modalConfirm').modal('show');
			}
		}
    }
}
function  checkCondition3(){

    if($(optionsCondition3).prop('checked') == false) {
          $('.checkCondition4').addClass('disabled');
    }
    else {
         $('.checkCondition4').removeClass('disabled');
    }
}
function  checkCondition4(){

    if($(optionsCondition3).prop('checked') == false) {

           $('#modalCondition4').modal('show');
    }
    else {
          $('.checkCondition4').addClass('disabled');
    }
}

function promotioncode(){
	$('.promotioncode').addClass('display-none');
	$('.entercode').removeClass('display-none');
	$('.entercode').addClass('display');
}


function checkListUnPost(list){
	if(list>1){
		$('#myModalUnit').modal('show');
	}else if(list==1){
		var Token=$('.unitToken:input:radio').first().val();
		location.href='/zhome/EditPost2/'+Token;
	}else if(list==0){
		location.href='/zhome/post1/newpost';
	}
}

function submitFormEditList(){
	var Token=$('#unitToken').val();
	if(Token!=''){
		location.href='/zhome/EditPost2/'+Token;
	}
}

function changeTXTButton(){
	$("#text-payment-bt").text("โปรโมท "+ $('#showCoin').val() +" ครั้ง/วัน ถึง "+$('#showDate').val());
	document.getElementById('showModalCoin').innerHTML=$('#showCoin').val() +" ครั้ง";
	document.getElementById('showModalDate').innerHTML='<?=date("d/m/Y");?>-'+$('#showDate').val();
}

function pauseads(){

	$('#pauseads').addClass('display-none');
	$('#showads').removeClass('display-none');
	$('#showads').show;
}
function showads2(){
	$('.showads2').removeClass('display-none');
	$('.showads2').show;

	$('.resume-bt').removeClass('display');
	$('.resume-bt').addClass('display-none');
	$('.pause-bt').removeClass('display-none');
	$('.pause-bt').addClass('display');
}
function showads3(){
	$('.showads2').removeClass('display');
	$('.showads2').addClass('display-none');

	$('.resume-bt').removeClass('display-none');
	$('.resume-bt').addClass('display');
	$('.pause-bt').removeClass('display');
	$('.pause-bt').addClass('display-none');

}


</script>
