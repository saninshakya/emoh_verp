<?php
$POID=$rowUnit->POID;
$PID=$rowUnit->PID;
$PName_th=$rowUnit->ProjectName;
$TOAdvertising=$rowUnit->TOAdvertising;
$TOAdvertisingName=$this->search->getAdvertising($TOAdvertising,'AName_th');
$Active=$rowUnit->Active;
$queryAllPost=$this->unitdetail->getAllPostFromPIDandTOAdvertising($PID,$TOAdvertising,$Active,$PName_th);//ประเภทประกาศที่เหมือนกันภายในโครงการ
$queryAllPost2=$this->unitdetail->getAllPostFromPIDandTOAdvertising2($PID,$TOAdvertising,$Active,$PName_th);//ประเภทประกาศอื่นๆภายในโครงการ
$DistEducation=$this->search->DistFromType2($PID,"Education");
$DistHospital=$this->search->DistFromType2($PID,"Hospital");
$DistShopingMall=$this->search->DistFromType2($PID,"ShopingMall");
$DistExpressway=$this->search->DistFromType2($PID,"Expressway");
$DistMinimart=$this->search->DistFromType2($PID,"Minimart");
$unitStatusTxt="";
if ($rowUnit->TOAdvertising==1){
	$TotalPrice=$rowUnit->TotalPrice;
	if($rowUnit->Active==82){
		$unitStatusTxt="ขายแล้ว";
	}
}
if ($rowUnit->TOAdvertising==2){
	$TotalPrice=$rowUnit->DTotalPrice;
	if($rowUnit->Active==82){
		$unitStatusTxt="ขายดาวน์แล้ว";
	}
}
if ($rowUnit->TOAdvertising==5){
	$TotalPrice=$rowUnit->PRentPrice;
	if($rowUnit->Active==82){
		$unitStatusTxt="มีผู้เช่าแล้ว";
	}
}
$TotalPrice2=$TotalPrice;
$TotalPrice=number_format($TotalPrice, 0,'',',');
$useArea=$rowUnit->useArea;
$terraceArea=$rowUnit->terraceArea;
//$sumArea=$useArea+$terraceArea;
$sumArea=$useArea;
$limit_list=100;
?>
<div class="col-lg-7 col-md-8 col-lg-offset-1  col-xs-12 unitdetail-container nopadding bg-grey2"><!--new grey bg-->
	<div class="col-xs-12 col-md-12 unitdetail-container" style="overflow: hidden;">
		<div class="col-xs-12 nopadding unitdetail-stage folded">
			<div class="col-xs-12 detail-header">
				<h3 class="text-primary text-center"><span class="text-orange">เปรียบเทียบราคา<?=$TOAdvertisingName;?> คอนโด<?=$PName_th;?></span></h3>
			</div>
			<div class="col-xs-12 detail-section">
				<div class="table-responsive">
					<table class="table borderless field-table">
						<tr class="text-primary text-orange">
							<td class="text-center">&nbsp;</td>
							<td class="text-center">ราคาปัจจุบัน</td>
							<td class="text-center">ราคาเดิม</td>
						</tr>
					</table>
					<table class="table borderless field-table">
						<tr class="text-primary text-orange">
							<td align="center" style="width:10px;">ตึก</td>
							<td align="center" style="width:10px;">ชั้น</td>
							<td align="center" style="width:15px;">ทิศ</td>
							<td align="right" style="width:15px;">ตร.ม.</td>
							<?php
							if (($TOAdvertising==1)||($TOAdvertising==2)){
							?>
								<td align="right" style="width:30px;">ล้าน</td>
							<?php
							} else {
							?>
								<td align="right" style="width:30px;">บาท</td>
							<?}?>
							<td align="right">บาท/ม2.</td>
							<td align="right">+/-</td>
							<td align="right"><img src="/img/sun-icon5.png"></a></td>
							<td align="right"><a href="#"><span class="glyphicon glyphicon-earphone text-primary"></a></td>
							<td align="right">บาท/ม2.</td>
							<td align="right">+/-</td>
							<td align="right"><img src="/img/sun-icon5.png"></a></td>
							<td align="right"><span class="glyphicon glyphicon-earphone text-primary"></td>
						</tr>
						<?php
						$countPost=0;
						foreach ($queryAllPost->result() as $rowAllPost){
							$countPost++;
						?>
							<tr onmouseover="this.style.cursor='pointer';this.style.backgroundColor='#ffff97';" onmouseout="this.style.backgroundColor='';"
							<?php
							if (($rowAllPost->POID)==$POID){
							?>
								class="row-active-green"
							<?php
							} else {
							?>
								class="text-grey" onclick="showUnit('<?=base_url('zhome/unitdetail2')."/".$rowAllPost->POID;?>')"
							<?php
							}
							?>
							>
							<td><?=$rowAllPost->Tower;?></td>
							<td><?=$rowAllPost->Floor;?></td>
							<td><?php
								if (($rowUnit->Direction)!=0){
									echo $this->unitdetail->convertDirection($rowAllPost->Direction);
								} else {
									echo "ไม่ระบุ";
								}
								?>
							</td>						
							<td align="right"><?=number_format($rowAllPost->useArea, 0,'',',');?></td>
							<td align="right">
								<?php
								if (($rowAllPost->TOAdvertising==1) || ($rowAllPost->TOAdvertising==2)){
									$TotalPriceA=round((($rowAllPost->TotalPrice)/1000000),1);
								} else {
									$TotalPriceA=number_format($rowAllPost->PRentPrice, 0,'',',');
								}
								echo $TotalPriceA
								?>
							</td>
							<?php
							$TrackPrice=$this->unitdetail->TrackPricePOID($rowAllPost->POID);
							if ($TrackPrice[0]==0){
								?>
								<td align="right"><?=number_format(($rowAllPost->PricePerSq), 0,'',',');?></td>
								<td align="right"><p class="text-green">&nbsp;</p></td>
								<td align="right"><?=$rowAllPost->DateShow;?></td>
								<td align="right"><?=$this->search->ContViewList($rowAllPost->POID);?></td>
								<?php
							} else {
								?>
								<td align="right"><?=number_format($TrackPrice[1],0,'',',');?></td>
								<td align="right"><p class="text-green"><?=$TrackPrice[2];?></p></td>
								<td align="right"><?=$TrackPrice[3];?></td>
								<td align="right"><?=$TrackPrice[4];?></td>
								<?php
							}
							if ($rowAllPost->Active==81 or $rowAllPost->Active==82){
								$originalDate = $rowAllPost->CloseDate;
								if ($originalDate!="0000-00-00"){
									$CloseDate = date("m/y", strtotime($originalDate));
								} else {
									$CloseDate = "";
								}
								if ($rowAllPost->Active==81){
									?>
									<td style="color:#FF0000;" colspan="4" align="center">เช่าแล้ว  <?=$CloseDate;?></td>										
									<?php
								} else {										
									?>
									<td style="color:#FF0000;" colspan="4" align="center">ขายแล้ว  <?=$CloseDate;?></td>										
									<?php
								}
							} else {
								if ($TrackPrice[0]>1){
									?>
									<td align="right"><?=number_format($TrackPrice[5],0,'',',');?></td>
									<td align="right"><p class="text-green"><?php if ($TrackPrice[6]==""){echo "-";}else{echo $TrackPrice[6];};?></p></td>
									<td align="right"><?=$TrackPrice[7];?></td>
									<td align="right"><?=$TrackPrice[8];?></td>
									<?php 	
								} else {
									?>
									<td>&nbsp;</td>
									<td><p class="text-red">&nbsp;</p></td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<?php
								}
							};
							?></tr><?
						}?>
					</table>
					<?if($countPost>$limit_list){?>
						<table style="padding-bottom:10px;">
							<tr>
								<td class="text-right"><a href="#"><span class="text-red">ดูข้อมูลเพิ่มเติม</span></a></td>
							</tr>
						</table>
					<?}?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php
		$AdvertisingCheck='';
		$countPost=0;
		foreach ($queryAllPost2->result() as $rowAllPost2){
			$countPost++;
			if($AdvertisingCheck!=$rowAllPost2->TOAdvertising){
				$TOAdvertisingName2=$this->search->getAdvertising($rowAllPost2->TOAdvertising,'AName_th');
				if($rowAllPost2->TOAdvertising==2){$font_class='text-blue';}
				else if($rowAllPost2->TOAdvertising==5){$font_class='text-turq3';}
				if($AdvertisingCheck!=''){
		?>
								</table>
								<?if($countPost>$limit_list){?>
									<table style="padding-bottom:10px;">
										<tr>
											<td class="text-right"><a href="#"><span class="text-red">ดูข้อมูลเพิ่มเติม</span></a></td>
										</tr>
									</table>
								<?}?>
							</div>
						</div>
					</div>
				<?php
				}
				?>
				<div class="clearfix" style="border-bottom:solid 1px #CCCCCC;"></div>
				<div class="col-xs-12 nopadding unitdetail-stage folded">
					<div class="col-xs-12 detail-header">
						<h3 class="text-primary text-center"><span class="<?=$font_class;?>">เปรียบเทียบราคา<?=$TOAdvertisingName2;?> คอนโด<?=$PName_th;?></span></h3>
					</div>
					<div class="col-xs-12 detail-section">
						<div class="table-responsive">
							<table class="table borderless field-table">
								<tr class="text-primary <?=$font_class;?>">
									<td class="text-center">&nbsp;</td>
									<td class="text-center">ราคาปัจจุบัน</td>
									<td class="text-center">ราคาเดิม</td>
								</tr>
							</table>
							<table class="table borderless field-table">
								<tr class="text-primary <?=$font_class;?>">
									<td align="center" style="width:10px;">ตึก</td>
									<td align="center" style="width:10px;">ชั้น</td>
									<td align="center" style="width:15px;">ทิศ</td>
									<td align="right" style="width:15px;">ตร.ม.</td>
									<?php
									if (($rowAllPost2->TOAdvertising==1)||($rowAllPost2->TOAdvertising==2)){
									?>
										<td align="right" style="width:30px;">ล้าน</td>
									<?php
									} else {
									?>
										<td align="right" style="width:30px;">บาท</td>
									<?}?>
									<td align="right">บาท/ม2.</td>
									<td align="right">+/-</td>
									<td align="right"><img src="/img/sun-icon5.png"></a></td>
									<td align="right"><a href="#"><span class="glyphicon glyphicon-earphone text-primary"></a></td>
									<td align="right">บาท/ม2.</td>
									<td align="right">+/-</td>
									<td align="right"><img src="/img/sun-icon5.png"></a></td>
									<td align="right"><span class="glyphicon glyphicon-earphone text-primary"></td>
								</tr>
		<?php
				$AdvertisingCheck=$rowAllPost2->TOAdvertising;
				$countPost=1;
			}
		?>
								<tr onmouseover="this.style.cursor='pointer';this.style.backgroundColor='#ffff97';" onmouseout="this.style.backgroundColor='';"
									<?php
									if (($rowAllPost2->POID)==$POID){
									?>
										class="row-active-green"
									<?php
									} else {
									?>
										class="text-grey" onclick="showUnit('<?=base_url('zhome/unitdetail2')."/".$rowAllPost2->POID;?>')"
									<?php
									}
									?>
									>
									<td><?=$rowAllPost2->Tower;?></td>
									<td><?=$rowAllPost2->Floor;?></td>
									<td><?php
										if (($rowUnit->Direction)!=0){
											echo $this->unitdetail->convertDirection($rowAllPost2->Direction);
										} else {
											echo "ไม่ระบุ";
										}
										?>
									</td>						
									<td align="right"><?=number_format($rowAllPost2->useArea, 0,'',',');?></td>
									<td align="right">
										<?php
										if (($rowAllPost2->TOAdvertising==1) || ($rowAllPost2->TOAdvertising==2)){
											$TotalPriceA=round((($rowAllPost2->TotalPrice)/1000000),1);
										} else {
											$TotalPriceA=number_format($rowAllPost2->PRentPrice, 0,'',',');
										}
										echo $TotalPriceA
										?>
									</td>
									<?php
									$TrackPrice=$this->unitdetail->TrackPricePOID($rowAllPost2->POID);
									if ($TrackPrice[0]==0){
										?>
										<td align="right"><?=number_format(($rowAllPost2->PricePerSq), 0,'',',');?></td>
										<td align="right"><p class="text-green">&nbsp;</p></td>
										<td align="right"><?=$rowAllPost2->DateShow;?></td>
										<td align="right"><?=$this->search->ContViewList($rowAllPost2->POID);?></td>
										<?php
									} else {
										?>
										<td align="right"><?=number_format($TrackPrice[1],0,'',',');?></td>
										<td align="right"><p class="text-green"><?=$TrackPrice[2];?></p></td>
										<td align="right"><?=$TrackPrice[3];?></td>
										<td align="right"><?=$TrackPrice[4];?></td>
										<?php
									}
									if ($rowAllPost2->Active==81 or $rowAllPost2->Active==82){
										$originalDate = $rowAllPost2->CloseDate;
										if ($originalDate!="0000-00-00"){
											$CloseDate = date("m/y", strtotime($originalDate));
										} else {
											$CloseDate = "";
										}
										if ($rowAllPost2->Active==81){
											?>
											<td style="color:#FF0000;" colspan="4" align="center">เช่าแล้ว  <?=$CloseDate;?></td>										
											<?php
										} else {										
											?>
											<td style="color:#FF0000;" colspan="4" align="center">ขายแล้ว  <?=$CloseDate;?></td>										
											<?php
										}
									} else {
										if ($TrackPrice[0]>1){
											?>
											<td align="right"><?=number_format($TrackPrice[5],0,'',',');?></td>
											<td align="right"><p class="text-green"><?php if ($TrackPrice[6]==""){echo "-";}else{echo $TrackPrice[6];};?></p></td>
											<td align="right"><?=$TrackPrice[7];?></td>
											<td align="right"><?=$TrackPrice[8];?></td>
											<?php 	
										} else {
											?>
											<td>&nbsp;</td>
											<td><p class="text-red">&nbsp;</p></td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<?php
										}
									}
									?>
								</tr>
		<?php
		}
		?>
					</table>
					<?if($countPost>$limit_list){?>
						<table style="padding-bottom:10px;">
							<tr>
								<td class="text-right"><a href="#"><span class="text-red">ดูข้อมูลเพิ่มเติม</span></a></td>
							</tr>
						</table>
					<?}?>
				</div>
			</div>
		</div>
		<div class="clearfix" style="border-bottom:solid 1px #CCCCCC;"></div>
	</div>
</div>


<div class="col-lg-7 col-md-8 col-lg-offset-1  col-xs-12 unitdetail-container" style="overflow: hidden;">
	<hr class="col-xs-12 visible-xs">

	<!-- FACILITY 2 -->
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">
				<span>Facilities </span>
				<span class="visible-lg" style="display:inline-block !important;">รอบ คอนโด <?=$PName_th;?></span>
			</h3>
		</div>

		<div class="col-xs-12 col-sm-4 detail-section">
			<div class="col-xs-4 col-sm-12 field-header">
				<span><img src="/img/sc-icon.png"></span>
				<span>โรงเรียน</span>
			</div>
			<div class="col-xs-8 col-sm-12 field-data ex-pt">
				<? for ($i=1; $i <= 3; $i++) { 
					if ($DistEducation[$i][2] == '' && $i == 1) {
						?><h4 class="col-xs-12 field-text field-subtext text-right-xs text-center">- ไม่พบในพื้นที่ใกล้เคียง -</h4><?
						break;
					}
					$animatable = ($i>1) ? 'animatable' : '';
					?>
					<h4 class="col-xs-8 field-text text-left <?=$animatable?>">
						<span><?=$DistEducation[$i][2];?></span>
					</h4>
					<h4 class="col-xs-4 field-text text-right nowrap <?=$animatable?>">
						<span><?=$DistEducation[$i][0];?></span>
						<span class="field-subtext">
							<? echo ($DistEducation[$i][0] != '') ? "กม." : "" ?>
						</span>
					</h4>
					<?
				} ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 detail-section">
			<div class="col-xs-4 col-sm-12 field-header">
				<span><img src="/img/store-icon.png"></span>
				<span>ช้อปปิ้ง</span>
			</div>
			<div class="col-xs-8 col-sm-12 field-data ex-pt">
				<? for ($i=1; $i <= 3; $i++) { 
					if ($DistShopingMall[$i][2] == '' && $i == 1) {
						?><h4 class="col-xs-12 field-text field-subtext text-right-xs text-center">- ไม่พบในพื้นที่ใกล้เคียง -</h4><?
						break;
					}
					$animatable = ($i>1) ? 'animatable' : '';
					?>
					<h4 class="col-xs-8 field-text text-left <?=$animatable?>">
						<span><?=$DistShopingMall[$i][2];?></span>
					</h4>
					<h4 class="col-xs-4 field-text text-right nowrap <?=$animatable?>">
						<span><?=$DistShopingMall[$i][0];?></span>
						<span class="field-subtext">
							<? echo ($DistShopingMall[$i][0] != '') ? "กม." : "" ?>
						</span>
					</h4>
					<?
				} ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 detail-section">
			<div class="col-xs-4 col-sm-12 field-header">
				<span><img src="/img/hospital-icon.png"></span>
				<span>โรงพยาบาล</span>
			</div>
			<div class="col-xs-8 col-sm-12 field-data ex-pt">
				<? for ($i=1; $i <= 3; $i++) { 
					if ($DistHospital[$i][2] == '' && $i == 1) {
						?><h4 class="col-xs-12 field-text field-subtext text-right-xs text-center">- ไม่พบในพื้นที่ใกล้เคียง -</h4><?
						break;
					}
					$animatable = ($i>1) ? 'animatable' : '';
					?>
					<h4 class="col-xs-8 field-text text-left <?=$animatable?>">
						<span><?=$DistHospital[$i][2];?></span>
					</h4>
					<h4 class="col-xs-4 field-text text-right nowrap <?=$animatable?>">
						<span><?=$DistHospital[$i][0];?></span>
						<span class="field-subtext">
							<? echo ($DistHospital[$i][0] != '') ? "กม." : "" ?>
						</span>
					</h4>
					<?
				} ?>
			</div>
		</div>
		<div class="col-xs-12 field-btn pointer nopadding text-right" onclick="UnitDetailFold(this)">
			<div class="glyphicon glyphicon-menu-up"></div>
			<hr class="col-xs-12" style="margin-top: 5px;">
		</div>
	</div>
</div>

<!--end new grey bg-->

<div class="clearfix"></div>

<div class="col-xs-12 col-md-12 unitdetail-container" style="overflow: hidden;">
	<div id="map_canvas2" class="map_canvas unitdetail-map border-grey2"></div>
	<div class="clearfix">&nbsp;</div>
<!--<img class="img-responsive" src="/img/map03.png">-->
	<?
	if($queryAllPost->num_rows()>1){
		?>
		<div class="col-xs-12 nopadding unitdetail-stage folded">
			<div class="col-xs-12 detail-header">
				<h3 class="text-primary text-center">รวมคอนโด<?=$rowUnit->AdvertisingName;?> โครงการ<?=$PName_th;?></h3>
			</div>
			<div id="cImgUnits" class="col-xs-12 col-md-12 padding-none q-banner-height-controller text-center" style="width: 100%;"></div>
		</div>
		<?
	}
	?>
	
</div>
<div class="col-xs-12 col-md-12 unitdetail-container visible-xs visible-sm" style="overflow: hidden;padding-top:0px;">
	<div  class="col-xs-12 col-md-12 visible-xs visible-sm text-center border-grey2 pull-left padding-none" style="width: 97%;margin-left:6px;"><a href="/zhome/ad/"><img src="/img/ZmyHome_BoostPostAds_UnitPage-pc.jpg" class="img-responsive cursor visible-xs visible-sm" style="width:100%"></a>
	</div>	
</div>
<div class="clearfix visible-xs visible-sm"></div>


