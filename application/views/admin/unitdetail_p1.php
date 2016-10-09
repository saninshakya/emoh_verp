<?php
$POID=$rowUnit->POID;
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
		$unitStatusTxt="ขายแล้ว";
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
		$unitStatusTxt="ขายดาวน์แล้ว";
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
	if($rowUnit->Active==82){
		$unitStatusTxt="มีผู้เช่าแล้ว";
	}
}
$Tel=substr($rowUnit->Telephone1,0,3)."-XXX-XXXX";
$TotalPrice2=$TotalPrice;
$TotalPrice=number_format($TotalPrice, 0,'',',');
$problem_type="";
$favourite_check=0;
if($rowFavourite->ID){
	$favourite_check=1;
}
?>
<input type="hidden" id="poid" name="poid" value="<?=$POID;?>">
<input type="hidden" id="favourite_check" name="favourite_check" value="<?=$favourite_check;?>">
<div class="container-fluid clear-margin-padding">
	<div class="row padding-none">  
	  <div class="col-md-12 text-center">
		   <ul class="list-inline">
			  <li><h3 class="text-primary padding-left-20"><?=$rowUnit->AdvertisingName.$rowUnit->PropertyName." ".$rowUnit->ProjectName;?>&nbsp;<?=$RefID;?></h3></li>
			  <li><span class="glyphicon glyphicon glyphicon-star text-primary" aria-hidden="true"></span></li>
		   </ul>
	  </div>
	</div>
	<div class="row display-none">
	  <div class="col-md-3 col-xs-3 text-primary"><?=$arrayList[0];?> จาก <?=$arrayList[1];?> ในรายการ</div>
	  <div class="col-md-3 col-xs-3 text-primary">กำลังต่อรองอยู่ <?=$CountViewList;?> ราย</div>
	  <div class="col-md-3 col-xs-3 text-primary"><?=$CountSoldPerMonth;?> Sold/Moth</div>
	  <div class="col-md-3 col-xs-3 text-primary">&nbsp;</div>
	</div>
	
	
	<div class="col-md-12 border-img padding-none">
		<span class="glyphicon glyphicon-menu-left btn-back-img" id="backImg"></span>
		<span class="glyphicon glyphicon-menu-right btn-next-img" id="nextImg"></span>
		<img class="img-responsive unit-fixsize" src="<?php if (sizeof($Img)!=0){ echo $Img[0];};?>" id="imgHUnit">
	</div>
	
	<!--start move-->
	
	<div class="col-md-3 col-md-offset-1 col-md-push-7">
		<br/>
		<div class="row border-grey2 resize-xl-80">
			<div class="col-md-12 min-height2">
				<ul class="list-inline2 pull-right padding-none margin-r18">
					<li class="padding-none"><a href="#" class="text-primary"><?=$rowUnit->DateShow;?> <img src="/img/sun-icon6.png"></a></li>&nbsp;
					<li class="padding-none"> <a href="#" class="text-primary"><?=$CountViewPost;?><span width="3px" class="glyphicon glyphicon-eye-open text-primary fix-glyphicon input-sm"></span></a></li>&nbsp;
					<li class="padding-none"> <a href="#" class="text-primary"><?=$CountViewList;?><span style="padding-bottom: 5px;" class="glyphicon glyphicon-earphone text-primary fix-glyphicon input-sm"></span></a></li>
				</ul>
				<div class="clearfix2"></div>
			</div>
			<br class="visible-xs">
			<div class="col-md-12 bg-box-grey">
				<div class="col-md-12">
					<div class="padding-top3">
						<div class="pull-left w60">
							<div class="pull-left text-white" style="height:35px;"><h2 class="text-white padding-none text-left">฿<?=$TotalPrice;?></h2></div>
							<div class="clearfix"></div>
							<div class="pull-left text-white"><h6 class="text-right resize-mobile"><?=$TaxTxt;?></h6></div>
						</div>
						<div class="pull-right">
							<div class="pull-right text-white" style="height:35px;"><h8 class="text-right padding-t6">฿ 
								<?php
								if ($rowUnit->PricePerSq==0 || $rowUnit->PricePerSq==NULL){
									echo number_format($PricePerSq, 0,'',',');
								} else {
									echo number_format($rowUnit->PricePerSq, 0,'',',');	
								} 
								?>
							/ม<sup>2</sup></h8></div>
							<div class="clearfix"></div>
							<div class="pull-right text-white"><h6 class="text-right resize-mobile"><?=$PRentTxt;?></h6></div>
						</div>
					</div>
					<div class="clearfix"></div>
					<hr class="text-white padding-none2">
					<div class=" padding-top4"></div>
					<div>
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
							<div class="pull-left border-left padding-l5">
								<div><h6 class="text-white">น้ำ</h6></div>
								<div class="h7 text-white"><?=$rowUnit->Bathroom;?></div>
							</div>
							<div class="pull-right padding-r5">
								<div class="pull-right text-white"><h6>ตร.ม.</h6></div>
								<div class="h7 text-white"><?=$sumArea;?></div>
							</div>
						</div>
						<div class="pull-left w34">
							<div class="pull-left border-left padding-l5">
								<div><h6 class="text-white">ชั้น</h6></div>
								<div class="h7 text-white"><?=$rowUnit->Floor;?></div>
							</div>
							<div class="pull-right padding-r5">
								<div class="pull-right text-white"><h6>ทิศ</h6></div>
								<div class="h7 text-white"><?=$Direction;?></div>
							</div>
						</div>
						<div class="pull-left border-left padding-l5 w12">
							<div><h6 class="text-white">ตัวแทน</h6></div>
							<div class="h7 text-white">
								<span class="glyphicon padding-left-clear input-sm <?php if($Broker=='0'){echo 'glyphicon-remove';}else{echo 'glyphicon-ok';}?>" aria-hidden="true" style="font-size:17px;"></span>
							</div>
						</div>
					</div>
					<div class="clearfix padding-bottom2"></div>
				</div><!--end -padding-->
			</div>

			<div class="clearfix"></div>
			<br>

			<div class="col-md-1"></div>
			<div class="col-md-10 bg-blue text-white text-center padding-top2"><input type="hidden" id="otel" value="">
				<?if($rowUnit->Active!=81 and $rowUnit->Active!=82){?>
					<h5 class="text-white">เจ้าของขายเอง</h5>
					<!--revised 9oct58-->
					<ul class="list-inline">
						<li class="clear-none"><span class="glyphicon glyphicon-earphone text-white input-md clear-none"></span></li>
						<li><h7 class="text-white"><a id="down-b1" class="text-white" style="cursor:pointer;"><?=$Tel;?></a></h7></li>
					</ul>
				<?}else{?>
					<h5 class="text-white"><?=$unitStatusTxt;?></h5>
				<?}?>
			
				<div class="display-none col-md-12 target-b2 text-white text-center">
					<div>คุณใช้โควต้าของวันนี้แล้ว</div>
					<div>แชร์ ZmyHome เพื่อดูเพิ่มวันนี้อีก 1 ครั้ง</div>
					<div class="padding-top2"><button type="button" class="btn btn-warning btn-sm" onclick="shareOnFacebook('<?=current_url();?>','<?=$Img[0];?>');"><h6><a href="#" onclick="" class"text-white">facebook </a></h6></button>
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
					<br>
				</div>
				<div class="display-none col-md-12 target-b1 text-white text-center">
					<div>ดูเบอร์ติดต่อได้ฟรีวันนี้ 1 ครั้ง</div>
					<div class="clearfix"></div>
					<ul class="list-inline">
						<li><button type="button" class="btn btn-white btn-xs"><h6><a id="up-b1"  href="#" class="text-white" onclick="return false;">ยกเลิก</a></h6></button></li>
						<li><button type="button" class="btn btn-warning btn-xs"><h6><a id="down-b2" href="#" onclick="return false;">ยืนยัน</a></h6></button></li>
					</ul>
					<div class="clearfix"></div><br>
				</div>
			</div>
	   
			<!--End 9oct58-->
			<?if($rowUnit->Active!=81 and $rowUnit->Active!=82){?>
				<div class="col-md-1"></div> 
				<div class="col-md-12 text-center padding-top1">
					<div class="text-primary">แจ้ง! : 
					<?php
					foreach ($qProblem->result() as $row)
					{
						echo '<a class="text-primary" href="#" style="padding-left:7px;" data-toggle="modal" data-target="#myModal" onclick="send_problem('.$row->id.')">'.$row->name_th.'</a>';
					}
					?>
					<!--<a class="text-primary" href="#" data-toggle="modal" data-target="#myModal"> ไม่ใช่เจ้าของ</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" style="padding-left:7px;" href="#">  ขายแล้ว</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" href="#" style="padding-left:7px;">  ขึ้นราคา</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" href="#" style="padding-left:7px;">  ข้อมูลผิด</a>-->
					</div>
				</div>
			<?}?>
			<div class="clearfix"></div><br>
		</div>
		<div class="clearfix"></div>
		<!--Alert-->
		<!-- Button trigger modal -->
		

		<!-- Modal -->
		<div class="modal modal-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="text-white padding-none text-center" id="myModalLabel">แจ้งประกาศไม่มีคุณภาพ</h4>
					</div>
					<div class="modal-body text-grey row text-center">
						<div class="col-md-12">เราพยายามตรวจสอบคุณภาพประกาศเสมอ<br>ขอบคุณที่ร่วมพัฒนาชุมชนของเรา</div>
						<div class="clearfix"></div>
						<br>
						<div class="col-md-12"><input id="pfullname" name="informer_name" class="form-control center-block" placeholder="ชื่อ-สกุล" style="width:250px;" value="<?=$fullname;?>"></div>
						<div class="clearfix"></div>
				  
						<div class="col-md-12 padding-top10"><input id="pemail" name="informer_email" class="form-control center-block" placeholder="อีเมล" style="width:250px;" value="<?=$email;?>"></div>
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10"><input id="ptelphone" name="informer_telphone" class="form-control center-block" placeholder="เบอร์ติดต่อ" style="width:250px;"></div>

						<div class="clearfix"></div>
				  
						<!--<div class="col-md-12 padding-top10" style="margin-left:2px; width:99%;">-->
						<div class="col-md-12 padding-top10 modal-warnning-select">
							<select id="ptype" name="problem_type" class="form-control input-sm selectpicker center-block text-grey3 modal-warnning-select-item">
								<option value="" class="text-grey3 pull-left" style="color: #999999;">กรุณาระบุ</option>
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
						<div class="col-md-12 padding-top10"><textarea id="pdetail" name="problem_detail" class="form-control center-block" placeholder="คุณทราบได้อย่างไร" rows="3" style="width:250px;"></textarea></div>
						<div class="clearfix"></div>
						<br>
						<div id="ckproblem" class="col-md-12" style="display:none;"><div class="text-red">กรุณากรอกข้อมูลให้ครบถ้วน</div></div>
				   
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10"><button type="button" class="btn btn-orange" style="width:250px;" onclick="submitFormHelpdesk()">แจ้งประกาศ</button></div>
					</div>
				</div>
			</div>
		</div>
		<!--EndAlert-->
		<br>
		<div class="row border-grey2 resize-xl-80 text-grey"><br>
			<div class="col-xs-6 text-center"><a class="text-grey" href="#favourite" style="text-decoration: none;" onclick="updateFavorite();"><button type="button" class="btn btn-default" style="border:0px;"><span id="favourite_show" class="glyphicon glyphicon-heart <?php if($favourite_check==1){echo "text-orange2";}else{echo "text-grey";}?>" aria-hidden="true"></span> รายการสนใจ</button><a/><br></div>
			<div class="col-xs-6 text-center"><a class="text-grey" href="#"><button type="button" class="btn btn-default" style="border:0px;">แจ้งลดราคา</button></a><br></div>
			<br><br>
			<div class="col-xs-4 text-grey text-center border-top padding-top3"><a href="#"><span class="glyphicon glyphicon-envelope text-grey"></span></a></div>
			<div class="col-xs-4 text-grey text-center border-left border-top padding-top3"><a class="text-grey" href="#" onclick="shareOnFacebook('<?=current_url();?>','<?=$Img[0];?>');">Facebook</a></div>
			<div class="col-xs-4 text-grey text-center border-left border-top padding-top3"><a class="text-grey" href="#">อื่นๆ..</a></div>
			
			<br>
		</div>
	</div>
	<!--end move-->