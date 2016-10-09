<?php
$CreditBalance=$this->credit->CreditBanlance();
?>
<input type="hidden" id="CreditBalance" name="CreditBalance" value="<?=$CreditBalance;?>">
<div class="container padding-right-clear padding-left-clear">
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

	<div class="col-md-8 col-sm-12 col-xs-12 padding-none">




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
          <div class="col-md-12 padding-none">
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
	};
	//end loop ListPostType1 detail
	};
?>
            <!--end row-->

<?php
	};
?>

              <!--boost post-->

              <!--stat mobile-->
          <!--<div class="clearfix  visible-xs visible-sm"></div>
              <div class="height15 visible-xs visible-sm"></div>
              <hr class="bg-grey7 height10 padding-none visible-xs visible-sm">
              <div class="clearfix  visible-xs visible-sm"></div>
              <div class="height15 visible-xs visible-sm"></div>
              <div class="hidden-md hidden-lg">
		              <div class="padding-l38">
		                   <span class="glyphicon glyphicon-signal text-grey2 padding-none" width="5px" aria-hidden="true"></span>
		<?php
			$checkStat=$this->credit->checkBoostPost($POID);
			if ($checkStat==0){
		?>
											<span class="text-black"> สถิติโพสต์ <b>ยังไม่เคย Boost Post</b></span>
									</div>
									<div class="clearfix"></div>
									<div class="height15"></div>
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
										<span class="text-black"> สถิติโพสต์ ตั้งแต่วันที่ <?=$this->credit->StartStat($POID);?></span>
					 </div>
					<div class="height10"></div>
					<hr class="bg-grey7 padding-none height1 ">
					<div class="height5"></div>
					<div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2"><?=$this->credit->StatView($POID);?></h5><small class="text-grey">เห็นประกาศ</small></div>
					<div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2"><?=$this->credit->StatClickView($POID);?></h5><small class="text-grey">คลิกดูประกาศ</small></div>
					<div class="col-md-4 col-xs-4 text-center"><h5 class="padding-none text-green2"><?=$this->credit->StatClickTel($POID);?></h5><small class="text-grey">คลิกดูเบอร์โทร</small></div>
					<div class="clearfix"></div>
					<div class="height5"></div>
					<hr class="bg-grey7 padding-none height1">
					<div class="height10"></div>
					<div class="col-xs-12 text-center"><a href="#" class="text-black">ดูรายละเอียด > </a></div>

<?php
	}
?>
 </div>-->
 <!--end stat mobile-->
 <?php
$queryBoostStat=$this->credit->getBoostStat($POID);
$rowBoostStat=$queryBoostStat->row();
 ?>
			<div class="clearfix hidden-sm hidden-xs "></div>
			<div class="height15 hidden-sm hidden-xs "></div>

				<!--<hr class="bg-grey7 padding-none height10 visible-sm visible-xs">-->

				<div class="clearfix"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div id="summaryBoost" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc">
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
				</div>
			</div>
		</div>
	</div>