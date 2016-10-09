<?php
$POID=$rowUnit->POID;
$PID=$rowUnit->PID;

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
$Address_show="";
if($rowProject->Address){
	$Address_show.=$rowProject->Address;
}
if($rowUnit->Soi){
	$Address_show.=" ซ.".$rowUnit->Soi;
}
if($rowUnit->Road){
	$Address_show.=" ถ.".$rowUnit->Road;
}
if($rowUnit->District){
	$Address_show.=" แขวง".$rowUnit->District;
}
if($rowUnit->Area){
	$Address_show.=" เขต".$rowUnit->Area;
}
if($rowUnit->Province){
	$Address_show.=" จ.".$rowUnit->Province;
}
?>
		<div class="col-md-7 col-md-offset-1 col-md-pull-4 resize-mobile" style="padding-left:0px;">
			<br/>
			<p class="text-center"><strong><?=$Address_show;?></strong></p>
			<br/>
			<h5 class="text-primary text-center">ทำเลที่ตั้ง</h5>
			<br>
			<div class="col-md-12">
				<div class="col-md-4 col-xs-4 text-center">
					<ul class="list-inline resize-mobile">
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
						<li><img src="/img/shop-icon.png"></li><li class="text-primary">สะดวกซื้อ</li>
					</ul>
				</div>
			</div>
			<!-- row1 -->
			<div class="col-md-12">
				<div class="col-md-4 col-xs-4 text-grey">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><h5 class="text-grey"><?=$DistBTSMRT[1][2];?></h5></span>
					<span class="pull-right"><h5 class="text-grey"><?=$DistBTSMRT[1][0];?>
					<?php 
						if ($DistBTSMRT[1][0]!=""){echo " กม.";};
					?>					
					</h5></span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
				</div>
				<div class="col-md-4 col-xs-4 text-center border-left text-grey">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><h5 class="text-grey"><?=$DistExpressway[1][2];?></h5></span>
						<span class="pull-right"><h5 class="text-grey"><?=$DistExpressway[1][0];?>
					<?php 
						if ($DistExpressway[1][0]!=""){echo " กม.";};
					?>					
					</h5></span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
				?>
				</div>
				<div class="col-md-4 col-xs-4 text-center border-left text-grey">
				   <?php 
						if ($project!=null){
				   ?>
						<span class="pull-left"><h5 class="text-grey"><?=$DistMinimart[1][2];?></h5></span>
						<span class="pull-right"><h5 class="text-grey"><?=$DistMinimart[1][0];?>
					<?php 
						if ($DistMinimart[1][0]!=""){echo " กม.";};
					?>					
						</h5></span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
				</div>
			</div>
			<!--end row1-->
			<div class="clearfix"></div>
			<!--hide data-->
			<div class="col-md-12 target-r1 display-none">
				<div class="col-md-4 col-xs-4">
					<div class="text-grey">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><?=$DistBTSMRT[2][2];?></span>
						<span class="pull-right"><?=$DistBTSMRT[2][0];?>
					<?php 
						if ($DistBTSMRT[2][0]!=""){echo " กม.";};
					?>											
						</span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
					</div>
				</div>
				<div class="col-md-4 col-xs-4 text-center border-left">
					<div class="text-grey">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><?=$DistExpressway[2][2];?></span>
						<span class="pull-right"><?=$DistExpressway[2][0];?>
					<?php 
						if ($DistExpressway[2][0]!=""){echo " กม.";};
					?>					
						</span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
					</div> 
				</div>
				<div class="col-md-4 col-xs-4 text-center border-left">
					<div class="text-grey">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><?=$DistMinimart[2][2];?></span>
						<span class="pull-right"><?=$DistMinimart[2][0];?>
					<?php 
						if ($DistMinimart[2][0]!=""){echo " กม.";};
					?>					
						</span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
					</div>
				</div>
			</div>
			<!--end hide-->
			<!--hide data-->
			<div class="col-md-12 target-r1 display-none">
				<div class="col-md-4 col-xs-4">
					<div class="text-grey padding-top1">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><?=$DistBTSMRT[3][2];?></span>
						<span class="pull-right"><?=$DistBTSMRT[3][0];?>
					<?php 
						if ($DistBTSMRT[3][0]!=""){echo " กม.";};
					?>					
					    </span>
					<?php 
						} else {
					?>
						<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
					</div>
				</div>
				<div class="col-md-4 col-xs-4 text-center border-left">
					<div class="text-grey padding-top1">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><?=$DistExpressway[3][2];?></span>
						<span class="pull-right"><?=$DistExpressway[3][0];?>
					<?php 
						if ($DistExpressway[3][0]!=""){echo " กม.";};
					?>					
						</span>
					<?php 
						} else {
					?>
					<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
					</div> 
				</div>
				<div class="col-md-4 col-xs-4 text-center border-left">
					<div class="text-grey padding-top1">
					<?php 
						if ($project!=null){
					?>
						<span class="pull-left"><?=$DistMinimart[3][2];?></span>
						<span class="pull-right"><?=$DistMinimart[3][0];?>
					<?php 
						if ($DistMinimart[3][0]!=""){echo " กม.";};
					?>					
						</span>
					<?php 
						} else {
					?>
					<span class="pull-left">ไม่มีข้อมูลโครงการ</span>
					<?php
						}
					?>
					</div>
				</div>
			</div>
			<!--end hide-->
			<!--toggle-->
			<div class="clearfix"></div>
			<div class="col-md-12">
				<div class="pull-right"><span id="down-r1" class="glyphicon glyphicon-menu-down btn-sm text-grey padding-right-0 width-10" aria-hidden="true"></span></div>
				<div class="pull-right"><span id="up-r1" class="glyphicon glyphicon-remove btn-sm text-grey display-none padding-right-0 width-10" aria-hidden="true"></span></div>
			</div>
			<div class="clearfix"></div>
			<!--end toggle-->
        
			<div class="col-md-12 bg-grey2">
				<br>
				<h5 class="text-primary text-center">จุดเด่นห้องชุด</h5>
				<br>

				<!-- row2 -->
				<div class="col-md-12">
					<div class="col-md-4 col-xs-4">
						<div class="text-grey"><span><?php if (isset($getCondoSpec1[0])){echo $getCondoSpec1[0];} else {echo "&nbsp;";};?></span></div>
					</div>
					<div class="col-md-4 col-xs-4 text-center border-left">
						<div class="text-grey"><span><?php if (isset($getCondoSpec2[0])){echo $getCondoSpec2[0];} else {echo "&nbsp;";};?></span></div> 
					</div>
					<div class="col-md-4 col-xs-4 text-center border-left">
						<div class="text-grey"><span><?php if (isset($getCondoSpec3[0])){echo $getCondoSpec3[0];} else {echo "&nbsp;";};?></span></div>
					</div>
				</div>
				<!--end row2-->
				<!--hide data2-->
				<?php
				$i=1;
				while ($i<$maxSpec){
				?>
					<div class="col-md-12 target-r2 display-none">
						<div class="col-md-4 col-xs-4">
							<div class="text-grey padding-top10"><span><?php if (isset($getCondoSpec1[$i])){echo $getCondoSpec1[$i];} else {echo "&nbsp;";};?></span></div>
						</div>
						<div class="col-md-4 col-xs-4 text-center border-left">
							<div class="text-grey padding-top10"><span><?php if (isset($getCondoSpec2[$i])){echo $getCondoSpec2[$i];} else {echo "&nbsp;";};?></span></div> 
						</div>
						<div class="col-md-4 col-xs-4 text-center border-left">
							<div class="text-grey padding-top10"><span><?php if (isset($getCondoSpec3[$i])){echo $getCondoSpec3[$i];} else {echo "&nbsp;";};?></span></div>
						</div>
					</div>
				<?php
					$i++;
				}; 
				?>
				<!--end hide data2-->
				<div>
					<div class="pull-right">
						<span id="down-r2" class="glyphicon glyphicon-menu-down btn-sm text-grey padding-right-0 width-10" aria-hidden="true"></span>
					</div>
					<div class="pull-right">
						<span id="up-r2" class="glyphicon glyphicon-remove btn-sm text-grey display-none padding-right-0 width-10" aria-hidden="true"></span>
					</div> 
				</div> 
				<div class="clearfix"></div>
			</div>
  
			<!-- row2 -->
        
			<div class="clearfix"></div><br>
		</div>