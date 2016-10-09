<?php
$POID=$rowUnit->POID;
$PID=$rowUnit->PID;
$PName_th=$rowUnit->ProjectName;

$DistBTSMRT=$this->search->DistMRTBTS2($PID);
$DistEducation=$this->search->DistFromType2($PID,"Education");
$DistHospital=$this->search->DistFromType2($PID,"Hospital");
$DistShopingMall=$this->search->DistFromType2($PID,"ShopingMall");
$DistExpressway=$this->search->DistFromType2($PID,"Expressway");
$DistMinimart=$this->search->DistFromType2($PID,"Minimart");

$getCondoSpec1=$this->search->getCondoSpec($POID,1);
$getCondoSpec2=$this->search->getCondoSpec($POID,2);
$getCondoSpec3=$this->search->getCondoSpec($POID,3);
$maxSpec=0;
if($maxSpec<sizeof($getCondoSpec1)){
	$maxSpec=sizeof($getCondoSpec1);
}
if($maxSpec<sizeof($getCondoSpec2)){
	$maxSpec=sizeof($getCondoSpec2);
}
if($maxSpec<sizeof($getCondoSpec3)){
	$maxSpec=sizeof($getCondoSpec3);
}

$useArea=$rowUnit->useArea;
$sumArea=$useArea;
if($rowProject->CarParkUnit>0){
	$CarParkUnit=$rowProject->CarParkUnit;
}else{
	$CarParkUnit="N/A";
}
?>

<!-- ROOM PoI -->
<div class="col-lg-7 col-md-8 col-lg-offset-1 col-xs-12  unitdetail-container" style="overflow: hidden;">


	<hr class="col-xs-12 visible-xs visible-sm" style="margin-top:90px;">

	<!-- FACILITY -->
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">ทำเลที่ตั้ง</h3>
		</div>

		<div class="col-xs-12 col-sm-4 detail-section">
			<div class="col-xs-4 col-sm-12 field-header">
				<span><img src="/img/bts-icon.png"></span>
				<span>รถไฟฟ้า</span>
			</div>
			<div class="col-xs-8 col-sm-12 field-data ex-pt">
				<? for ($i=1; $i <= 3; $i++) { 
					if ($DistBTSMRT[$i][2] == '' && $i == 1) {
						?><h4 class="col-xs-12 field-text field-subtext text-right-xs text-center">- ไม่พบในพื้นที่ใกล้เคียง -</h4><?
						break;
					}
					$animatable = ($i>1) ? 'animatable' : '';
					?>
					<h4 class="col-xs-8 field-text text-left <?=$animatable?>">
						<span><?=$DistBTSMRT[$i][2];?></span>
					</h4>
					<h4 class="col-xs-4 field-text text-right nowrap <?=$animatable?>">
						<span><?=$DistBTSMRT[$i][0];?></span>
						<span class="field-subtext">
							<? echo ($DistBTSMRT[$i][0] != '') ? "กม." : "" ?>
						</span>
					</h4>
					<?
				} ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 detail-section">
			<div class="col-xs-4 col-sm-12 field-header">
				<span><img src="/img/road-icon.png"></span>
				<span>ทางด่วน</span>
			</div>
			<div class="col-xs-8 col-sm-12 field-data ex-pt">
				<? for ($i=1; $i <= 3; $i++) { 
					if ($DistExpressway[$i][2] == '' && $i == 1) {
						?><h4 class="col-xs-12 field-text field-subtext text-right-xs text-center">- ไม่พบในพื้นที่ใกล้เคียง -</h4><?
						break;
					}
					$animatable = ($i>1) ? 'animatable' : '';
					?>
					<h4 class="col-xs-8 field-text text-left <?=$animatable?>">
						<span><?=$DistExpressway[$i][2];?></span>
					</h4>
					<h4 class="col-xs-4 field-text text-right nowrap <?=$animatable?>">
						<span><?=$DistExpressway[$i][0];?></span>
						<span class="field-subtext">
							<? echo ($DistExpressway[$i][0] != '') ? "กม." : "" ?>
						</span>
					</h4>
					<?
				} ?>
			</div>
		</div>
		<div class="col-xs-12 col-sm-4 detail-section">
			<div class="col-xs-4 col-sm-12 field-header">
				<span><img src="/img/shop-icon.png"></span>
				<span>สะดวกซื้อ</span>
			</div>
			<div class="col-xs-8 col-sm-12 field-data ex-pt">
				<? for ($i=1; $i <= 3; $i++) { 
					if ($DistMinimart[$i][2] == '' && $i == 1) {
						?><h4 class="col-xs-12 field-text field-subtext text-right-xs text-center">- ไม่พบในพื้นที่ 500 ม. -</h4><?
						break;
					}
					$animatable = ($i>1) ? 'animatable' : '';
					?>
					<h4 class="col-xs-8 field-text text-left <?=$animatable?>">
						<span><?=$DistMinimart[$i][2];?></span>
					</h4>
					<h4 class="col-xs-4 field-text text-right nowrap <?=$animatable?>">
						<span><?=$DistMinimart[$i][0];?></span>
						<span class="field-subtext">
							<? echo ($DistMinimart[$i][0] != '') ? "กม." : "" ?>
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
	<hr class="col-xs-12 visible-xs">
	
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">จุดเด่นห้องชุด</h3>
		</div>
		<?php
		$i=0;
		$animatable = '';
		$getCondoSpec = [$getCondoSpec1,$getCondoSpec2,$getCondoSpec3];
		while ($i<3){
			?>
			<div class="col-xs-12 col-sm-4 detail-section">
				<div class="col-xs-12 field-data">
					<? for ($n=0; $n < $maxSpec; $n++) { 
						$animatable = ($n>0) ? 'animatable' : '';
						if (isset($getCondoSpec[$i][$n])){
							$roompoint = $getCondoSpec[$i][$n];
							$hidden_xs = '';
						} else {
							$roompoint = '';
							$hidden_xs = 'hidden-xs';
						};
						?>
						<li class="col-xs-6 col-sm-12 field-text text-center extra-p <?=$animatable?> <?=$hidden_xs?>">
							<?=$roompoint?>
						</li>
						<?
					} ?>
				</div>
			</div>
			<?php
			$i++;
		}; 
		?>
		<div class="col-xs-12 field-btn pointer nopadding text-right" onclick="UnitDetailFold(this)">
			<div class="glyphicon glyphicon-menu-up"></div>
			<hr class="col-xs-12" style="margin-top: 5px;">
		</div>
	</div>

	<hr class="col-xs-12 visible-xs">

	<!-- PROJECT PoI -->
	<div class="col-xs-12 nopadding unitdetail-stage folded">
		<div class="col-xs-12 detail-header">
			<h3 class="text-primary text-center">คอนโด <?=$PName_th;?></h3>
		</div>
		<div class="col-xs-12 col-sm-6 detail-section">
			<div class="col-xs-12 field-data">
				<div class="col-xs-6 field-text extra-p">
					<span>สร้างเสร็จ</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><? echo ($project!=null) ? $rowProject->YearEnd : 'ไม่มีข้อมูล' ?></span>
				</div>				
				<div class="col-xs-6 field-text extra-p">
					<span>จำนวนห้องชุด</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">
					<span><? echo ($project!=null) ? $rowProject->CondoUnit." <span class='field-subtext'>ยูนิต</span>" : 'ไม่มีข้อมูล' ?></span>
				</div>
				<div class="col-xs-6 field-text extra-p">
					<span>ที่จอดรถ</span>
				</div>			
				<div class="col-xs-6 field-text extra-p text-right">			
					<span><? echo ($project!=null) ? $CarParkUnit." <span class='field-subtext'>คัน</span>" : 'ไม่มีข้อมูล' ?></span>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 detail-section">
			<div class="col-xs-12 field-data">
				<div class="col-xs-6 field-text extra-p">
					<span>ค่าส่วนกลาง</span>
				</div>
				<div class="col-xs-6 field-text extra-p text-right">				
					<span><? 
						if ($project!=null) {
							$PriceCamFee=($rowProject->CamFee)*$sumArea;
							echo number_format($PriceCamFee, 0,'',',');
							?><span class='field-subtext'> บ/ด</span><?
						} else {
							echo "ไม่มีข้อมูล";
						}
						?>	
					</span>
				</div>
				<div class="col-xs-6 col-sm-6 field-text extra-p">
					<span>ค่าส่วนกลางรายปี</span>
				</div>			
				<div class="col-xs-6 col-sm-6 field-text extra-p text-right">			
					<span><? 
						if ($project!=null) {
							$PriceCamFee=($rowProject->CamFee)*$sumArea;
							echo number_format($PriceCamFee*12, 0,'',',');
							?><span class='field-subtext'> บาท</span><?
						} else {
							echo "ไม่มีข้อมูล";
						}
						?>	
					</span>
				</div>
				<div class="col-xs-6 col-sm-6 field-text extra-p text-right">
					<span style="opacity:0">x</span>
				</div>
			</div>
<!-- 			<div class="col-xs-12 field-btn nopadding text-right">
				<div class="glyphicon glyphicon-menu-up" style="opacity:0;"></div>
				<hr class="col-xs-12" style="margin-top: 5px;">
			</div> -->
		</div>
		<div class="col-xs-12">
			<hr class="col-xs-12">			
		</div>
	</div>
</div>

