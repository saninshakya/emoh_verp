</div>
<?php
$POID=$rowUnit->POID;
if($ChkLogin!=1){$this->session->set_userdata('POID',$POID);}
$PID=$rowUnit->PID;
$PName_th=$rowUnit->ProjectName;
$TOAdvertising=$rowUnit->TOAdvertising;
$TOProperty=$rowUnit->TOProperty;
$RefID="(ID".$TOProperty.$TOAdvertising."-".$POID.")";
$Active=$rowUnit->Active;
$queryAllPost=$this->unitdetail->getAllPostFromPIDandTOAdvertising($PID,$TOAdvertising,$Active,$PName_th);
$arrayList=$this->search->selectCountingList($POID,$PID);

$CountViewPost=$this->dashboard->countViewPost($rowUnit->POID);
$CountViewList=$this->search->ContViewList($POID);
$CountSoldPerMonth=$this->search->CountSoldPerMonth($PID);

$useArea=$rowUnit->useArea;
$terraceArea=$rowUnit->terraceArea;
$sumArea=$useArea;
$Direction=$this->search->KeyDirection($rowUnit->Direction);
$PRentStatus=-1;
$PRentTxt="";
$TaxTxt="";
$unitStatusTxt="";
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
if($rowUnit->ProvinceName!=null){
	$Address_show.=" จ.".$rowUnit->ProvinceName;
}else if($rowUnit->Province!='' or $rowUnit->Province!=null){
	$Address_show.=" จ.".$rowUnit->Province;
}
if ($rowUnit->TOAdvertising==1){//sale
	$TotalPrice=$rowUnit->NetPrice;
	$TotalTax=$rowUnit->TotalTax;
	$PricePerSq=$rowUnit->PricePerSq;
	$Broker=$rowUnit->Broker;
	if ($PricePerSq==0){
		$PricePerSq=($TotalPrice)/($rowUnit->useArea);
		$this->unitdetail->update_pricepersq($POID,$PricePerSq);
	}
	if ($TotalTax==0){
		$TaxTxt="ค่าโอน-ภาษี  NA.";
	} else {
		$TotalTax=number_format($TotalTax, 0,'',',');
		$TaxTxt="ค่าโอน-ภาษี ".$TotalTax."บาท";
	}
	$Check_PRentStatus=$rowUnit->StatusPRent;
	if ($Check_PRentStatus!=0 and $Check_PRentStatus!=-1){
		$PRentPrice=$rowUnit->PRentPrice;
		if ($PRentPrice!=0){
			$PRentPrice=number_format($PRentPrice, 0,'',',');
			$PRentTxt="มีผู้เช่า ฿".$PRentPrice."/ด";
		}
	}
	if($rowUnit->Active==82){
		$unitStatusTxt="Sold";
	}
}
if ($rowUnit->TOAdvertising==2){//down
	$TotalPrice=$rowUnit->DTotalPrice;
	$DDownTotalPrice=$rowUnit->DDownTotalPrice;
	$DDownTotalPrice=number_format($DDownTotalPrice, 0,'',',');
	$TaxTxt="ราคาขายดาวน์ ".$DDownTotalPrice."บาท";
	$PricePerSq=$rowUnit->PricePerSq;
	if ($PricePerSq==0 || $PricePerSq==null){
		$PricePerSq=($TotalPrice)/($rowUnit->useArea);
		$this->unitdetail->update_pricepersq($POID,$PricePerSq);
	}
	$Broker=$rowUnit->DBroker;
	if($rowUnit->Active==82){
		$unitStatusTxt="Sold";
	}
}
if ($rowUnit->TOAdvertising==5){//rent
	$TotalPrice=$rowUnit->PRentPrice;
	$PRentStatus=$rowUnit->StatusPRent;
	$Broker=$rowUnit->AgentPRent;
	if ($PRentStatus==0){
		$PRentTxt="ว่าง";
	}else{
		if($PRentStatus!=-1){
			$end_date = date_create_from_format('d-M-Y', $rowUnit->PRentEnd);
			$this_date=date_create_from_format('d-M-Y', date('d-M-Y'));
			if ($this_date>$end_date){
				$PRentTxt="ว่าง";
				$this->unitdetail->update_prentstatus($POID,'0');
			} else {
				$end_date=date_format($end_date, 'j/m/Y');
				$PRentTxt="ว่างหลัง ".$end_date."";
			}
		}
	}
	$PricePerSq=$rowUnit->PricePerSq;
	if ($PricePerSq==0 || $PricePerSq==null){
		$PricePerSq=($TotalPrice)/($rowUnit->useArea);
		$this->unitdetail->update_pricepersq($POID,$PricePerSq);
	}
	if($rowUnit->Active==81){
		$unitStatusTxt="Rent";
		$PRentTxt="-";
	}else if($rowUnit->Active==82){
		$unitStatusTxt="Sold";
		$PRentTxt="";
	}
}
if($rowUnit->CloseDate!='0000-00-00'){
	$CloseDate=date_create($rowUnit->CloseDate);
	if($unitStatusTxt!=""){$unitStatusTxt.=" ".date_format($CloseDate,"Y/m");}
}
$countViewTel=$this->unitdetail->checkViewTel($POID);
if($countViewTel>0){
	$Tel=substr($rowUnit->Telephone1,0,3).'-'.substr($rowUnit->Telephone1,3,3).'-XXXX';
	$Tel2=substr($rowUnit->Telephone1,0,3).'-'.substr($rowUnit->Telephone1,3,3).'-'.substr($rowUnit->Telephone1,6,4);
}else{
	//$Tel=substr($rowUnit->Telephone1,0,3)."-XXX-XXXX";
	$Tel='ดูเบอร์โทรเจ้าของ';
	$Tel2='';
}
$TotalPrice2=$TotalPrice;
$TotalPrice=number_format($TotalPrice, 0,'',',');
$problem_type="";
$favourite_check=0;
if($rowFavourite->ID){
	$favourite_check=1;
}
?>

<input type="text" id="mobile_detect" class="hidden">
<input type="hidden" id="poid" name="poid" value="<?=$POID;?>">
<input type="hidden" id="Tel2" value="<?=$Tel2;?>">
<input type="hidden" id="clickTel" value="<?=$clickTel;?>">
<input type="hidden" id="BannerStatus" value="<?=$BannerStatus;?>">
<input type="hidden" id="favourite_check" name="favourite_check" value="<?=$favourite_check;?>">
<input type="hidden" id="checkQuestionnair" value="<?=$checkQuestionnair;?>">
<div id="debug-box"></div>
<div class="container-fluid clear-margin-padding">
	<div class="col-lg-7 col-md-8 col-lg-offset-1   resize-mobile padding-lr0">
		<!--photo-->
		<div class="row padding-none">
			<div class="col-xs-12 text-center padding-none">
				<ul class="list-inline padding-none padding-top-clear">
					<?php
					if ($rowUnit->TOAdvertising=='5'){
						$txtAdv="เจ้าของให้เช่าเอง" ;
					} else {
						$txtAdv="เจ้าของขายเอง";
					}
					?>
					<li class="padding-top-clear">
						<h1 class="text-primary"><?=$rowUnit->AdvertisingName;?>&nbsp;<?=$rowUnit->PropertyName.$rowUnit->ProjectName;?>
							&nbsp;
							<br class="visible-xs visible-sm"><?=$txtAdv;?>&nbsp;<?=$RefID;?>
						</h1>
					</li>


					<!--<li><span class="glyphicon glyphicon glyphicon-star text-primary" aria-hidden="true"></span></li>-->
				</ul>
			</div>
		</div>
		<div class="col-xs-12 display-none">
			<div class="col-xs-3 text-primary"><?=$arrayList[0];?> จาก <?=$arrayList[1];?> ในรายการ</div>
			<div class="col-xs-3 text-primary">กำลังต่อรองอยู่ <?=$CountViewList;?> ราย</div>
			<div class="col-xs-3 text-primary"><?=$CountSoldPerMonth;?> Sold/Moth</div>
			<div class="col-xs-3 text-primary">&nbsp;</div>
		</div>

		<div class="col-xs-12 border-img nopadding">
			<button id="backButton" type="button" class="btn btn-default btn-sm btn-back-img" style="height:40px;width:40px;background:rgba(0,0,0,0.6);border:1px solid;border-radius:2px;border-color:#C0C0C0;">
				<span id="backImg" class="glyphicon glyphicon-menu-left"></span>
			</button>
			<img id="imgHUnit" class="img-responsive unit-fixsize padding-top-clear" src="<?php if (sizeof($Img)!=0){ echo $Img[0];};?>">
			<button id="nextButton" type="button" class="btn btn-default btn-sm btn-next-img" style="height:40px;width:40px;background:rgba(0,0,0,0.6);border:1px solid;border-radius:2px;border-color:#C0C0C0;">
				<span id="nextImg" class="glyphicon glyphicon-menu-right"></span>
			</button>
		</div>
		<!--end photo-->
		<br/>
		<div class="col-xs-12 text-center padding-t10">
			<strong><?=$Address_show;?></strong>
		</div>
		<div class="col-md-12"><div class="col-xs-12 bg-grey6"></div></div>
	</div><!--end col-md-7-->

	<div class="unitdetail-sidebar col-lg-5 col-md-4 col-xs-12 clear-padding-md">
		<!--right box-->
		<div class="col-xs-12 nopadding">
			<?if($rowUnit->Active==81 || $rowUnit->Active==82){?>
				<!-- <div style="padding:4 4 0 4"> -->
				<div class="col-xs-4 text-white text-center unitdetail-info-1" style="padding:10px 0px;background-color:#FF0000;"><?=$unitStatusTxt;?>
				</div>
				<!-- </div> -->
			<?}else{?>
				<div class="col-xs-4"></div>
			<?}?>
			<div class="col-xs-8 nopadding unitdetail-info-1">
				<ul class="list-inline2 pull-right padding-none margin-r18">
					<li class="padding-none"><span href="#" class="text-primary"><?=$rowUnit->ActiveDay;?> <img src="/img/sun-icon6.png"></span></li>&nbsp;
					<li class="padding-none"> <span href="#" class="text-primary"><?=$CountViewPost;?><span width="3px" class="glyphicon glyphicon-eye-open text-primary fix-glyphicon input-sm"></span></span></li>&nbsp;
					<li class="padding-none"> <span href="#" class="text-primary"><?=$CountViewList;?><span style="padding-bottom: 5px;" class="glyphicon glyphicon-earphone text-primary fix-glyphicon input-sm"></span></span></li>
				</ul>
			</div>
		</div>
		<div class="col-xs-12 nopadding border-grey2">
			<div class="col-xs-12 bg-box-grey q-price-div">
				<div class="col-xs-8 col-md-8 col-lg-8 nopadding ">
					<div class="pull-left text-white">
						<h2 class="q-tprice text-white nomargin">฿<?=$TotalPrice;?></h2>
					</div>
					<div class="row"></div>
					<div class="pull-left text-white">
						<h6 class="text-right resize-mobile"><?=$TaxTxt;?></h6>
					</div>
				</div>
				<div class="col-xs-4 col-md-4 col-lg-4 text-right text-left-md" style="padding:13px 0px 0px 0px;">
					<div class="pull-right pull-left-md text-white">
						<h4 class="q-sprice text-white nomargin">
							฿
							<?php
							if ($rowUnit->PricePerSq==0 || $rowUnit->PricePerSq==NULL){
								echo number_format($PricePerSq, 0,'',',');
							} else {
								echo number_format($rowUnit->PricePerSq, 0,'',',');
							}
							?>
							/ม<sup>2</sup></h8>
						</h4>
					</div>
					<div class="row"></div>
					<div class="pull-right text-white" style="padding-top:5px;">
						<h6 class="q-renttxt text-white resize-mobile"><?=$PRentTxt;?></h6>
					</div>
				</div>
				<div class="clearfix"></div>
				<hr class="q-b-grey padding-none2">
				<div class="padding-top4"></div>
				<div class="unitdetail-info-2">
					<div class="pull-left w14 padding-r5">
						<div class="pull-right text-white"><h6>นอน</h6></div>
						<div class="clearfix"></div>
						<div class="pull-right h7 text-white">
							<?php
							if ($rowUnit->Bedroom=="99"){
								echo "S";
							} else {
								echo $rowUnit->Bedroom;
							}
							?>
						</div>
					</div>
					<div class="pull-left w36">
						<div class="pull-left q-b-l q-b-grey padding-l5">
							<div><h6 class="text-white">น้ำ</h6></div>
							<div class="h7 text-white"><?=$rowUnit->Bathroom;?></div>
						</div>
						<div class="pull-right padding-r5">
							<div class="pull-right text-white"><h6>ตร.ม.</h6></div>
							<div class="h7 text-white"><?=$sumArea;?></div>
						</div>
					</div>
					<div class="pull-left w34">
						<div class="pull-left q-b-l q-b-grey padding-l5">
							<div><h6 class="text-white">ชั้น</h6></div>
							<div class="h7 text-white"><?=$rowUnit->Floor;?></div>
						</div>
						<div class="pull-right padding-r5">
							<div class="pull-right text-white"><h6>ทิศ</h6></div>
							<div class="h7 text-white"><?=$Direction;?></div>
						</div>
					</div>
					<div class="pull-left q-b-l q-b-grey padding-l5 w12">
						<div><h6 class="text-white">ตัวแทน</h6></div>
						<div class="h7 text-white">
							<span class="glyphicon padding-left-clear input-sm <?php if($Broker=='0'){echo 'glyphicon-remove';}else{echo 'glyphicon-ok';}?>" aria-hidden="true" style="font-size:17px;"></span>
						</div>
					</div>
				</div>
				<div class="clearfix padding-bottom2"></div>
			</div>
			<div class="clearfix"></div>
			<?if($rowUnit->Active!=81 and $rowUnit->Active!=82){?>
				<!--<div class="col-md-12 report-div text-center padding5" style="padding:5px;">
					<div class="col-md-12 col-xs-12 bluetel bg-blue text-white text-center box-shadow2">-->
				<div class="col-md-12 report-div text-center padding5">
					<div class="col-md-12 col-xs-12" style="padding: 5px 10px 5px 10px;">
						<div class="col-md-12 col-xs-12 bluetel text-center">
							<div class="col-md-12 col-xs-12" id="<?if($countViewTel==0 or $checkQuestionnair==0){echo "down-b1";}?>">
								<input type="hidden" id="otel" value="">
								<!--<h5 class="nomargin text-white">โทรหาเจ้าของ</h5>-->
								<!-- <a id="down-b1" class="text-white bluetel-text" style="cursor:pointer;">โทรหาเจ้าของ</a> -->
								<!--revised 9oct58-->
								<ul class="nomargin list-inline">
									<li class="clear-none height-22"><span class="glyphicon glyphicon-earphone text-white input-md clear-none"></span></li>
									<li class="height-22"><h7 class="text-white"><a class="showtel text-white" style="cursor:pointer;" <?if($countViewTel>0 and $checkQuestionnair==1){?>onclick="showViewTel();"<?}?>><?=$Tel;?></a></h7></li>
								</ul>
							</div>
							<div class="display-none col-md-12 target-b2 text-white text-center">
								<div>คุณใช้โควต้าของวันนี้แล้ว</div>
								<div>แชร์ ZmyHome เพื่อดูเพิ่มวันนี้อีก 2 ครั้ง</div>
								<div class="padding-top2"><button type="button" class="btn btn-warning btn-sm" onclick="shareOnFacebook('<?=current_url();?>','<?=$Img[0];?>','<?=$POID;?>');"><h6><a href="#" onclick="" class"text-white">facebook </a></h6></button>
								</div>
								<div id="fb-root"></div>
								<script>
									window.fbAsyncInit = function() {
										FB.init({
										//appId                : "417656831761780",
										//appId                : "1635586383372949",
											appId                : "<?=$facebook_id;?>",
											status               : true, // check login status
											cookie               : true, // enable cookies to allow the server to access the session
											xfbml                : false,  // parse XFBML
											perms                : 'read_stream',
											access_token         : "USER ACCESS TOkEN",
											frictionlessRequests : true
										});
									};

									// Load the SDK Asynchronously
									(function(d, s, id) {
										var js, fjs = d.getElementsByTagName(s)[0];
										if (d.getElementById(id)) return;
										js = d.createElement(s); js.id = id;
										js.src = "//connect.facebook.net/pt_BR/all.js";
										fjs.parentNode.insertBefore(js, fjs);
									}(document, 'script', 'facebook-jssdk'));
								</script>
								<div>เพื่อดูเพิ่มวันนี้อีกครัง</div>
							</div>
							<div class="display-none col-md-12 target-b1 text-white text-center">
								<div>ดูเบอร์ติดต่อได้ฟรีวันนี้ 2 ครั้ง</div>
								<div class="clearfix"></div>
								<ul class="list-inline">
									<!--<li><button type="button" class="btn btn-white btn-xs"><h6><a id="up-b1" href="#" class="text-white" onclick="return false;">ยกเลิก</a></h6></button></li>-->
									<!--<li><button type="button" class="btn btn-warning btn-xs"><h6><a id="down-b2" href="#" onclick="return false;">ยืนยัน</a></h6></button></li>-->
									<li><button id="up-b1" type="button" class="btn btn-xs carousel-inner" onclick="return false;"><h6>ยกเลิก</h6></button></li>
									<li><button id="down-b2" type="button" class="btn btn-warning btn-xs" onclick="return false;"><h6>ยืนยัน</h6></button></li>
								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<!--<div class="clearfix"></div>-->
					<div class="text-primary padding-none">แจ้ง! :
						<?php
						foreach ($qProblem->result() as $row)
						{
							echo '<a class="text-primary font14" href="#" style="padding-left:7px;" data-toggle="modal" data-target="#myModal" onclick="send_problem('.$row->id.')">'.$row->name_th.'</a>';
						}
						?>
						<!--<a class="text-primary" href="#" data-toggle="modal" data-target="#myModal"> ไม่ใช่เจ้าของ</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" style="padding-left:7px;" href="#">  ขายแล้ว</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" href="#" style="padding-left:7px;">  ขึ้นราคา</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" href="#" style="padding-left:7px;">  ข้อมูลผิด</a>-->
					</div>
				</div>
			<?}?>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>

		<!--Alert-->
		<!-- Button trigger modal -->
		<?if($rowUnit->Active!=81 and $rowUnit->Active!=82){?>
			<div class="socialize-div col-md-12 col-xs-12 text-grey padding-none">
				<div class="col-xs-4 text-center"><a class="text-grey" href="#favourite" style="text-decoration: none;" onclick="updateFavorite();"><button type="button" class="btn bg-white padding-none" style="border:0px;"><span id="favourite_show" class="glyphicon glyphicon-heart <?php if($favourite_check==1){echo "text-orange2";}else{echo "text-grey";}?>" aria-hidden="true"></span> รายการสนใจ</button></a></div>
				<div class="col-xs-4 text-grey text-center"><a class="text-grey" href="#" onclick="shareOnFacebook('<?=current_url();?>','<?=$Img[0];?>','<?=$POID;?>');">Facebook</a></div>
				<div class="col-xs-4 text-grey text-center"><a class="text-grey" href="#"><button type="button" class="btn bg-white padding-none" style="border:0px;" onclick="checkLogin(<?=$POID;?>);">ติดตาม</button></a></div>
			</div>
		<?}?>
		<div class="clearfix"></div>
		<div class="height3"></div>
		<!--<br>--><!--space between infobox and banner-->
		
		<div class="col-xs-12 col-md-12 padding-none banner-desktop q-banner-height-controller bg-grey3 text-center" style="width: 100%;">
			<div id="myCarouselBanner" class="carousel slide carousel-fade" data-ride="carousel" data-interval="20000" data-wrap="true">
			<?if(count($Banner)>0){
				$banner_link='';
			?>
				<div class="carousel-inner" role="listbox">
					<?for($i=0;$i<count($Banner);$i++){
						if($Banner[$i]['BannerStatus']==1){
							$banner_link='/bn';
						}
						if($Banner[$i]['POID']==0){
							?>
							<div class="item <?if($i==1){echo "active";}?>">
								<a href="/<?=$Banner[$i]['Link'];?>" target="_blank"><img src="<?=$Banner[$i]['Picture'];?>" alt="..." style="overflow:hidden;margin: 0px 0px;height: 100%;width:100%; padding-left: 0; padding-right: 0;z-index: 5;"></a>
							</div>
							<?
						}else{
							if($Banner[$i]['Favourite']==1){
								$fav_color='text-pink';
							}else{
								$fav_color='text-white';
							}
							?>
							<div class="item q-unit-item thumbnail-banner <?if($i==0){echo "active";}?>">
								<div style="background-image:url('<?=$Banner[$i]['Picture'];?>');background-repeat: no-repeat;background-position: center center;background-size:cover; padding-left: 0; padding-right: 0;">
									<div style="right:1%;top:1%;z-index:10;padding-top:5px;color:#fff;text-align:right;text-shadow:1px 1px 2px black,0 0 10px black,0 0 5px darkblue;height:100%;">
										<div class="unit-item-infogdiv">
											<span class="unit-item-infog text-white"><?=$Banner[$i]['DateShow'];?></span>
											<img src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000); filter: drop-shadow(2px 2px 4px #000);">
										</div>
										<div class="unit-item-infogdiv">
											<span class="unit-item-infog text-white"><?=$Banner[$i]['ViewPost'];?></span>
											<span class="unit-item-infog glyphicon glyphicon-eye-open text-white"></span>
										</div>
										<div class="unit-item-infogdiv">
											<span class="unit-item-infog text-white"><?=$Banner[$i]['ViewTel'];?></span>
											<span class="unit-item-infog glyphicon glyphicon-earphone text-white"></span>
										</div>
										<a href="/<?=$Banner[$i]['NamePath'];?>/condo/<?=$Banner[$i]['PName_en'];?>/<?=$Banner[$i]['POID'].$banner_link;?>" target="_blank" alt="<?=$Banner[$i]['AdvertisingName'];?>-<?=$Banner[$i]['PropertyName'];?>-<?=$Banner[$i]['ProjectNameAnchor'];?>" style="text-decoration: none;">
											<div class="layer-invisible"></div>
											<div class='unit-item-textset' style="margin-bottom:40px;z-index:10;padding-bottom:1px;padding-left:2%;color:#fff;text-align:left;text-shadow:1px 1px 2px black,0 0 10px black,0 0 5px darkblue;width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8));position:absolute;bottom:0px;">
												<div class="text-white"><span><?=$Banner[$i]['AdvertisingName'];?></span></div>
												<div class="text-white"><span class="font25"><?=$Banner[$i]['PriceShow'];?></span> | <span><?=$Banner[$i]['Bedroom'];?></span> | <span> <?=$Banner[$i]['Bathroom'];?></span> | <span><?=$Banner[$i]['useArea']." ม&sup2";?></span></div>
												<div class="text-white font14-m11"><span><?=$Banner[$i]['ProjectNameCenter']." (".$Banner[$i]['DistName'].")";?></span></div>
											</div>
										</a>

									</div>
									<div class="carousel-caption-bn">Ad</div>


								</div>
								<div class="bg-white highlight-prakard text-center">
								   <div class="highlight-prakard-text2"><?=$Banner[$i]['AdTXT'];?></div>
								</div>
								

							</div>
						<?}?>
					<?}?>
				</div>
			<?}?>
			<div class="clearfix"></div>
				<div class="height6"></div>
				<div class="col-md-12 padding-none hidden-xs hidden-sm" onclick="location.href='/zhome/ad/'">
				   <img src="/img/ZmyHome_BoostPostAds_UnitPage-pc.jpg" class="img-responsive cursor">
				</div>
				<div class="clearfix"></div>
			</div>
			<!--<a class="left carousel-control" href="#myCarouselBanner" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarouselBanner" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>-->
		</div>
		<!--<div  class="col-md-12 col-xs-12 padding-none banner-desktop bg-grey3 text-center hidden-xs hidden-sm" style="width: 100%;">
			<div class="padding-t40"><h3 class="text-white">35,000B / Mo.</h3></div>
			<div><h3 class="text-white">6 Slots</h3></div>
		</div> -->
		
	</div>

<div style="height:100px"></div>

	<!-- Modal -->
	<div class="modal modal-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="text-white padding-none text-center" id="myModalLabel">แจ้งประกาศไม่มีคุณภาพ</h4>
				</div>
				<div class="modal-body text-grey row text-center">
					<div class="col-xs-12">เราพยายามตรวจสอบคุณภาพประกาศเสมอ<br>ขอบคุณที่ร่วมพัฒนาชุมชนของเรา</div>
					<div class="clearfix"></div>
					<br>
					<div class="col-xs-12"><input id="pfullname" name="informer_name" class="form-control center-block" placeholder="ชื่อ-สกุล" style="width:250px;" value="<?=$fullname;?>"></div>
					<div class="clearfix"></div>

					<div class="col-xs-12 padding-top10"><input id="pemail" name="informer_email" class="form-control center-block" placeholder="อีเมล" style="width:250px;" value="<?=$email;?>"></div>
					<div class="clearfix"></div>
					<div class="col-xs-12 padding-top10"><input id="ptelphone" name="informer_telphone" class="form-control center-block" placeholder="เบอร์ติดต่อ" style="width:250px;"></div>

					<div class="clearfix"></div>

					<!--<div class="col-xs-12 padding-top10" style="margin-left:2px; width:99%;">-->
					<div class="col-md-12 col-xs-12 padding-top10">
						<select id="ptype" name="problem_type" class="form-control  text-grey3 modal-warnning-select-item margin-left8pc" style="width:250px;">
							<option value="" class="text-grey3 pull-left">กรุณาระบุ</option>
							<?php
							foreach ($qProblem->result() as $row)
							{
								if ($problem_type==$row->id){
									$sel="selected";
								} else {
									$sel="";
								}
								echo '<option value="'.$row->id.'" class="pull-left text-grey3" '.$sel.'>'.$row->name_th.'</option>';
							}
							?>
						</select>
					</div>
					<div class="clearfix"></div>
					<div class="col-xs-12 padding-top10"><textarea id="pdetail" name="problem_detail" class="form-control center-block" placeholder="คุณทราบได้อย่างไร" rows="3" style="width:250px;"></textarea></div>
					<div class="clearfix"></div>
					<br>
					<div id="ckproblem" class="col-xs-12" style="display:none;"><div class="text-red">กรุณากรอกข้อมูลให้ครบถ้วน</div></div>

					<div class="clearfix"></div>
					<div class="col-xs-12 padding-top10"><button type="button" class="btn btn-orange" style="width:250px;" onclick="submitFormHelpdesk()">แจ้งประกาศ</button></div>
				</div>
			</div>
		</div>
	</div>
	<!--EndAlert-->

	<!-- Modal Check Login  -->
	<div class="modal modal-sm3 modal-login fade" id="checklogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;margin-top: 130px;">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="text-white padding-none text-center" id="myModalLabel">คุณยังไม่ได้ Login เข้าระบบ</h4>
				</div>
				<div class="modal-body text-grey row text-center">
					<br>
					<div class="col-xs-12"><h4 class="text-center">กรุณา Login เข้าระบบก่อนเพื่อดูเบอร์</h4></div>
					<br>
					<br>
					<br>
					<div class="col-xs-6 padding-top10"><button type="button" onclick="showSignup2();" class="btn btn-orange" style="width:100%"><h4 class="text-white  padding-none">ไปหน้า Sign Up</h4></button></div>
					<div class="col-xs-6 padding-top10"><button type="button" onclick="showLogin2();" class="btn btn-orange" style="width:100%"><h4 class="text-white  padding-none">ไปหน้า Login</h4></button></div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal modal-sm3 modal-login fade" id="checklogin2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-left:auto; margin-right:auto;margin-top: 130px;">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="text-white padding-none text-center" id="myModalLabel">คุณยังไม่ได้ Login เข้าระบบ</h4>
				</div>
				<div class="modal-body text-grey row text-center">
					<br>
					<div class="col-xs-12"><h4 class="text-center">กรุณา Login เข้าระบบก่อน</h4></div>
					<br>
					<br>
					<br>
					<div class="col-xs-6 padding-top10"><button type="button" onclick="showSignup2();" class="btn btn-orange" style="width:100%"><h4 class="text-white  padding-none">ไปหน้า Sign Up</h4></button></div>
					<div class="col-xs-6 padding-top10"><button type="button" onclick="showLogin2();" class="btn btn-orange" style="width:100%"><h4 class="text-white  padding-none">ไปหน้า Login</h4></button></div>
				</div>
			</div>
		</div>
	</div>
	<!--End Modal Check Login-->

	<!-- Modal Follow -->
	<div class="modal modal-sm fade display-none" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="text-white padding-none text-center" id="myModalLabel">ติดตาม</h4>
				</div>
				<div class="modal-body row text-left">
					<div class="col-md-12 z-line"><span class="text-grey">ให้ ZmyHome บอกคุณเมื่อประกาศเกิดมีการเปลี่ยนแปลงดังนี้<br><span class="text-red"> (ฟังก์ชั่นนี้ใช้งานได้ <b>180วัน</b> หลังจากนั้นต้องเลือกใหม่)</span></span></div>
					<div id="line_add" class="col-md-12 display-none z-line2">
						<img src="/img/zmyhome-qrcode.png" class="img-responsive"></img>
						<div id="line_add_pc" class=""><h5 class="text-center">สแกนด้วย QR Code</h5></div>
						<div id="line_add_mb" class=""><h3 class="text-center"><a href="http://line.me/ti/p/%40zmyhome" title="คลิกเพื่อ Add Line"><span class="text-red">เพิ่ม  ZmyHome เป็นเพื่อน</span></a></h3></div>
					</div>
					<div class="clearfix"></div>

					<div id="line_alert" class="text-grey">
						<div class="col-md-12">
							<?php
							foreach ($qLineAlert->result() as $row){
							?>
								<div class="checkbox text-left">
									<label><input type="checkbox" class="LineAlert" value="<?=$row->id;?>" id="<?=$row->id;?>"><?=$row->name_th;?></label>
								</div>
							<?
							}
							?>
						</div>
						<div class="clearfix"></div>

						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10"><button id="line-bt" type="button" class="btn btn-orange btn-block text-white" onclick="submitFormLineAlert('<?=$POID;?>');">ตกลง</button></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Follow -->
	
	<!-- Modal Follow -->
	<div class="modal modal-sm fade display-none" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="text-white padding-none text-center" id="myModalLabel">แบบสอบถาม</h4>
				</div>
				<div class="modal-body row text-left">
					<div class="col-md-12 z-line"><span class="text-grey">เพื่อให้คุณได้รับบริการที่ดีจากเรา<br>กรุณาให้ข้อมูลเพิ่มเติมด้วยครับ</span></div>
					<div class="clearfix"></div>
					<div id="questionnaire" class="text-grey">
						<div class="col-md-12"><span>1) คุณคือใคร ?</span>
							<div class="checkbox text-left">
								<label class="col-md-12"><input type="radio" class="Q_buyer" name="buyer" value="1">ผู้ซื้อ</label>
								<label class="col-md-12"><input type="radio" class="Q_buyer" name="buyer" value="2">ญาติ/เพื่อนผู้ซื้อ</label>
								<label class="col-md-12"><input type="radio" class="Q_buyer" name="buyer" value="3">นายหน้า</label>
							</div>
						</div>
						<div class="clearfix"></div>
						<div style="padding-bottom: 10px;"></div>
						<div class="col-md-12"><span>2) คุณต้องการซื้อ/เช่า เมื่อไหร่ ?</span>
							<div class="checkbox text-left">
								<label class="col-md-12"><input type="radio" class="Q_buy_length" name="buy_length" value="1">ภายใน 1 เดือน</label>
								<label class="col-md-12"><input type="radio" class="Q_buy_length" name="buy_length" value="3">ภายใน 3 เดือน</label>
								<label class="col-md-12"><input type="radio" class="Q_buy_length" name="buy_length" value="99">ไม่มีกำหนด</label>
							</div>
						</div>
						<div class="clearfix"></div>
						<div style="padding-bottom: 10px;"></div>
						<div class="col-md-12 padding-top10"><button id="line-bt" type="button" class="btn btn-orange btn-block text-white" onclick="submitFormQuestionnaire('<?=$POID;?>');">ตกลง</button></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Follow -->
</div>
<!--end right box-->
