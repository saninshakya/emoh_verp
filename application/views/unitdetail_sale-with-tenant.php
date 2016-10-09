<?php
if($firstname!=''){
  $fullname=$firstname.' '.$lastname;
}else{
  $fullname='';
}
$max_location=3;
$mainunit=array();
$location=array();
$rowUnit=$unit->row();
if ($project!=null){
  $rowProject=$project->row();
}
array_push($mainunit,'','',$rowUnit->ProjectName,$rowUnit->Lat,$rowUnit->Lng,'/img/pin-property.png',0);
$location[]=$mainunit;

$POID=$rowUnit->POID;
$PID=$rowUnit->PID;
$TOAdvertising=$rowUnit->TOAdvertising;
$TOProperty=$rowUnit->TOProperty;
$RefID="(ID".$TOProperty.$TOAdvertising."-".$POID.")";
$Active=$rowUnit->Active;
$PName_th=$rowUnit->ProjectName;
$queryAllPost=$this->unitdetail->getAllPostFromPIDandTOAdvertising($PID,$TOAdvertising,$Active,$PName_th);
//echo $PID;
//echo $rowUnit->Lat;
//echo $rowUnit->Lng;
$arrayList=$this->search->selectCountingList($POID,$PID);

$CountViewList=$this->search->ContViewList($POID);
$CountSoldPerMonth=$this->search->CountSoldPerMonth($PID);
$Img=$this->search->SelectImgFromPOID($POID);
$DistBTSMRT=$this->search->DistMRTBTS2($PID);
$DistEducation=$this->search->DistFromType2($PID,"Education");
$DistHospital=$this->search->DistFromType2($PID,"Hospital");
$DistShopingMall=$this->search->DistFromType2($PID,"ShopingMall");
$DistExpressway=$this->search->DistFromType2($PID,"Expressway");
$DistMinimart=$this->search->DistFromType2($PID,"Minimart");
for($i=1;$i<=$max_location;$i++){
	if($DistBTSMRT[$i]){
		$location[]=$DistBTSMRT[$i];
	}
	if($DistEducation[$i]){
		$location[]=$DistEducation[$i];
	}
	if($DistHospital[$i]){
		$location[]=$DistHospital[$i];
	}
	if($DistShopingMall[$i]){
		$location[]=$DistShopingMall[$i];
	}
	if($DistExpressway[$i]){
		$location[]=$DistExpressway[$i];
	}
	if($DistMinimart[$i]){
		$location[]=$DistMinimart[$i];
	}
}

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
$DTransferPayment=$rowUnit->TotalPrice;
$cRate=($PLoan/12)/100;
$cPeriod=$PLoanMonth*12;
$Var1=$DTransferPayment*$cRate;
$Var2=1-(1/pow((1+$cRate),$cPeriod));
$PayPerMonth=$Var1/$Var2;

?>
<input type=hidden id="poid" name="poid" value="<?php echo $POID; ?>">
<hr class="border-top-grey">
<div class="container-fluid clear-margin-padding">
        <div class="row">  
          <div class="col-md-12">
               <ul class="list-inline">
                  <li><h3 class="text-primary padding-left-20"><?=$rowUnit->ProjectName;?>&nbsp;<?=$RefID;?></h3></li>
                  <li><span class="glyphicon glyphicon glyphicon-star text-primary" aria-hidden="true"></span>
          </div>
        </div>
        <div class="row display-none">  
          <div class="col-md-3 col-xs-3 text-primary"><?=$arrayList[0];?> จาก <?=$arrayList[1];?> ในรายการ</div>
          <div class="col-md-3 col-xs-3 text-primary">กำลังต่อรองอยู่ <?=$CountViewList;?> ราย</div>
          <div class="col-md-3 col-xs-3 text-primary"><?=$CountSoldPerMonth;?> Sold/Moth</div>
          <div class="col-md-3 col-xs-3 text-primary">&nbsp;</div>
        </div>
        
        <div class="row">
           <div class="col-md-12">
            <span class="glyphicon glyphicon-menu-left btn-back-img" id="backImg"></span>
            <span class="glyphicon glyphicon-menu-right btn-next-img" id="nextImg"></span>
            <img class="img-responsive unit-fixsize" src="<?php if (sizeof($Img)!=0){ echo $Img[0];};?>" id="imgHUnit">
           

           </div>
        </div>
        <!--start move-->
        
         <div class="col-md-3 col-md-offset-1 col-md-push-7">
          <br/>
          <div class="row border-grey2">
             <div class="col-md-12 min-height2">
               <ul class="list-inline2 pull-right padding-none margin-r18">
                    <li class="text-primary padding-none"><?=$rowUnit->DateShow;?> </li>
                    <li class="padding-none"><a href="#"><img src="/img/sun-icon2.png"></a></li>
                    <li class="text-primary padding-none"> <?=$CountViewList;?></li>
                    <li class="text-primary"><a href="#"><span style="padding-bottom: 5px;" class="glyphicon glyphicon-earphone text-primary fix-glyphicon input-sm3"></span></a></li>
               </ul>
               <div class="clearfix2"></div>            
              </div>
            <div class="col-md-12 bg-box-grey">
               <div class="col-md-12">
                <ul class="list-inline padding-top3 padding-lr2">
                      <li class="pull-left text-white">
                        <h2 class="text-white padding-none margin-left4 text-left">฿<?=$TotalPrice;?></h2>
                        <h6 class="resize-mobile padding-t5"> +ค่าโอน-ภาษี ฿350,000-450,000</h6>
                      </li>
                      <li class="pull-right text-white padding-t7">
                        <h8 class="text-right">฿ <?=number_format($rowUnit->PricePerSq, 0,'',',');?>/ม<sup>2</sup></h8>
                        <h6 class="text-right resize-mobile padding-t5">มีผู้เช่า ฿35,000/ด. </h6>
                      </li>

                </ul>
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
                         <div class="h7 text-white pull-left">
						             	<span class="glyphicon padding-left-clear input-sm <?php if($rowUnit->TOOwner=='1'){echo 'glyphicon-remove';}else{echo 'glyphicon-ok';}?>" aria-hidden="true" style="font-size:17px;"></span>
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
              <h5 class="text-white">โทรหาเจ้าของ</h5><div id="sTel"></div> <!--revised 9oct58-->
              <ul class="list-inline">
                 <li class="clear-none"><span class="glyphicon glyphicon-earphone text-white input-md clear-none"></span></li>
                 <li><h7 class="text-white"><a id="down-b1" class="text-white" style="cursor:pointer;">099-XXX-XXX</a></h7></li>
              </ul>
              <!--</div>-->
              <div class="display-none col-md-12 target-b2 text-white text-center">
                  <div>คุณใช้โควต้าของวันนี้แล้ว</div>
                  <div>แชร์ ZmyHome เพื่อดูเพิ่มวันนี้อีก 1 ครั้ง</div>
                  <div class="padding-top2"><button type="button" class="btn btn-warning btn-sm" onclick="shareOnFacebook();"><h6><a href="#" onclick="" class"text-white">facebook </a></h6></button>
                  </div>
                  <div id="fb-root"></div>
                  <script>
                    window.fbAsyncInit = function() {
                      FB.init({
                        appId                : "417656831761780",
                        //appId                : "1635586383372949",
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
			<div class="col-md-1"></div> 
			<div class="col-md-12 text-center padding-top1"><div class="text-primary">แจ้ง! : 
				<?php
				foreach ($qProblem->result() as $row)
				{
					echo '<a class="text-primary" href="#" style="padding-left:7px;" data-toggle="modal" data-target="#myModal" onclick="send_problem('.$row->id.')">'.$row->name_th.'</a>';
				}
				?>
				<!--<a class="text-primary" href="#" data-toggle="modal" data-target="#myModal"> ไม่ใช่เจ้าของ</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" style="padding-left:7px;" href="#">  ขายแล้ว</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" href="#" style="padding-left:7px;">  ขึ้นราคา</a> <a class="text-primary" data-toggle="modal" data-target="#myModal" href="#" style="padding-left:7px;">  ข้อมูลผิด</a>-->
			</div></div>
			<div class="clearfix"></div><br>
          </div>
         <div class="clearfix"></div>
		 <!--Alert-->
         <!-- Button trigger modal -->
            

            <!-- Modal -->
            <div class="modal modal-sm fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-blue">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="text-white padding-none text-center" id="myModalLabel">แจ้งประกาศไม่มีคุณภาพ</h4>
                  </div>
                  <div class="modal-body text-grey row">
                      <div class="col-md-12">เราพยายามตรวจสอบคุณภาพประกาศเสมอ<br>ขอบคุณที่ร่วมพัฒนาชุมชนของเรา</div>
                      <div class="clearfix"></div>
                      <br>
                      <div class="col-md-12"><input id="pfullname" name="informer_name" class="form-control" placeholder="ชื่อ-สกุล" style="width:250px;" value="<?=$fullname;?>"></div>
                      <div class="clearfix"></div>
                  
                      <div class="col-md-12 padding-top10"><input id="pemail" name="informer_email" class="form-control" placeholder="อีเมล" style="width:250px;" value="<?=$email;?>"></div>
                      <div class="clearfix"></div>
                      <div class="col-md-12 padding-top10"><input id="ptelphone" name="informer_telphone" class="form-control" placeholder="เบอร์ติดต่อ" style="width:250px;"></div>

                      <div class="clearfix"></div>
                  
                      <div class="col-md-12 padding-top10">
                       
                        <select id="ptype" name="problem_type" class="input-md form-control text-grey" style="width:250px;">
							<option value="" class="text-grey">กรุณาระบุ</option>
						<?php
							foreach ($qProblem->result() as $row)
							{
								if ($problem_type==$row->id){
									$sel="selected";
								} else {
									$sel="";
								}
								echo '<option value="'.$row->id.'" class="text-grey" '.$sel.'>'.$row->name_th.'</option>';
							}
						?>
                        </select>
                       
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-md-12 padding-top10"><textarea id="pdetail" name="problem_detail" class="form-control" placeholder="คุณทราบได้อย่างไร" rows="3" style="width:250px;"></textarea></div>
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
         <div class="row border-grey2 text-grey"><br>
            <div class="col-xs-6 text-center"><a class="text-grey" href="#"><span class="glyphicon glyphicon-heart text-grey"></span> รายการสนใจ<a/><br></div> 
            <div class="col-xs-6 text-center"><a class="text-grey" href="#">แจ้งลดราคา</a><br></div> 
            <br><br>
            <div class="col-xs-4 text-grey text-center border-top padding-top3"><a href="#"><span class="glyphicon glyphicon-envelope text-grey"></span></a></div>
            <div class="col-xs-4 text-grey text-center border-left border-top padding-top3"><a class="text-grey" href="#">Facebook</a></div>
            <div class="col-xs-4 text-grey text-center border-left border-top padding-top3"><a class="text-grey" href="#">อื่นๆ..</a></div>
            <br>
         </div>
        </div>

        <!--end move-->
        <div class="col-md-7 col-md-offset-1 col-md-pull-4 resize-mobile" style="padding-left:0px;">
          <br/>
          <p class="text-center"><strong><?=$rowUnit->Soi;?>&nbsp;<?=$rowUnit->Road;?>&nbsp;<?=$rowUnit->Area;?>&nbsp;<?=$rowUnit->Province;?></strong></p>
          <br/>
          <h5 class="text-primary text-center">ทำเลที่ตั้ง</h5>
          <br>
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
          <!-- row1 -->
          <div class="col-md-12">
            <div class="col-md-4 col-xs-4 text-grey">
			
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-left"><h5 class="text-grey"><?=$DistBTSMRT[1][2];?></h5></span>
				<span class="pull-right"><h5 class="text-grey"><?=$DistBTSMRT[1][0];?> กม.</h5></span>
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
				<span class="pull-right"><h5 class="text-grey"><?=$DistExpressway[1][0];?> กม.</h5></span>
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
					<span class="pull-right"><h5 class="text-grey"><?=$DistMinimart[1][0];?> กม.</h5></span>
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
				<span class="pull-right"><?=$DistBTSMRT[2][0];?> กม.</span>
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
					<span class="pull-right"><?=$DistExpressway[2][0];?> กม.</span>
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
					<span class="pull-right"><?=$DistMinimart[2][0];?> กม.</span>
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
					<span class="pull-right"><?=$DistBTSMRT[3][0];?> กม.</span>
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
					<span class="pull-right"><?=$DistExpressway[3][0];?> กม.</span>
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
					<span class="pull-right"><?=$DistMinimart[3][2];?> กม.</span>
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
                <div class="text-grey"><?php if (isset($getCondoSpec1[0])){echo $getCondoSpec1[0];} else {echo "&nbsp;";};?></div>
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey"><?php if (isset($getCondoSpec2[0])){echo $getCondoSpec2[0];} else {echo "&nbsp;";};?></div> 
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey"><?php if (isset($getCondoSpec3[0])){echo $getCondoSpec3[0];} else {echo "&nbsp;";};?></div>
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
                <div class="text-grey padding-top10"><?php if (isset($getCondoSpec1[$i])){echo $getCondoSpec1[$i];} else {echo "&nbsp;";};?></div>
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey padding-top10"><?php if (isset($getCondoSpec2[$i])){echo $getCondoSpec2[$i];} else {echo "&nbsp;";};?></div> 
              </div>
              <div class="col-md-4 col-xs-4 text-center border-left">
                 <div class="text-grey padding-top10"><?php if (isset($getCondoSpec3[$i])){echo $getCondoSpec3[$i];} else {echo "&nbsp;";};?></div>
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


        <!--Add new 25 Sep 2558-->

        <div class="text-grey">
          <h5 class="text-primary text-center">ราคาและรายละเอียดการขาย</h5>
          <br>
          <!--row a-->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
                 <h5 class="text-primary">ราคาและรายละเอียด</h5>
                </div>
                <div class="col-md-4">
                  <h5 class="text-grey">- ราคาขายสุทธิ</h5>
                </div>
                <div class="col-md-4">
                  <h5 class="text-grey">฿<?=$TotalPrice;?></h5>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">
                       <h5 class="text-grey">+ค่าโอน-ภาษี*(โดยประมาณ)</h5>
                    </div>
                    <div class="col-md-4 padding-top10">
                     <h5 class="text-grey"> ฿350,000-฿450,000</h5>
                    </div>
                    <div class="clearfix"></div>
                <!--hide a-->
                <div class="target-ra display-none">
                    <!--r1-->
                    
                    
                    <!--end-r1-->
                    <!--r2-->
                    <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">
                      - ค่าธรรมเนียมการทำนิติกรรม<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="2% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน" ><span class="glyphicon glyphicon-info-sign text-grey2 input-sm4  padding-clear" aria-hidden="true"></span></a>
                      
                    </div>
                    <div class="col-md-4 padding-top10">
                       ฿____
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">- ภาษีธุรกิจเฉพาะ<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="3.3% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน" ><span class="glyphicon glyphicon-info-sign text-grey2 input-sm4  padding-clear" aria-hidden="true"></span></a>
                     
                    </div>
                    <div class="col-md-4 padding-top10">฿____
                    </div>
                     <div class="clearfix"></div>
                    <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">
                       - อากรแสตมป์<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="0.5% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน" ><span class="glyphicon glyphicon-info-sign text-grey2 input-sm4  padding-clear" aria-hidden="true"></span></a>
                       
                    </div>
                    <div class="col-md-4 padding-top10">
                      ไม่เสียเพราะจ่ายภาษีธุรกิจเฉพาะ
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">
                      - ภาษีเงินได้บุคคลธรรมดา
                      <div class="margin-l10">
                      <small class="text-grey2">- ราคาประเมิน ฿____/ตร.ม. หรือ ฿____ <span class="text-red">(ใช้ราคาซื้อขายคำนวณ)</span> </small>
                      <br><small class="text-grey2">- ถือครองมา __ปี หักค่าใช้จ่าย __% เหลือ ฿____</small>
                      <br><small class="text-grey2">- เงินได้เฉลี่ยต่อปี ฿____</small>
                      <br><small class="text-grey2">- ภาษีเงินได้ต่อปี ฿____</small>
                      </div>
                    
                    </div>
                    <div class="col-md-4 padding-top10">
                       ฿____
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">- ค่าจดจำนอง (1.0% ของยอดเงินกู้)
                    </div>
                    <div class="col-md-4 padding-top10">฿____
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4 padding-top10">&nbsp;
                    </div>
                    <div class="col-md-8 padding-top10"><span class="text-red">*เพื่อประโยชน์ต่อทั้งผู้ขายและผู้ซื้อ ตรวจสอบที่กรมที่ดินด้วยตัวเองทุกครั้ง</span>
                    </div>
                  
                    <!--end-r2-->
                    <div class="clearfix"></div>
                
                  

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
                <div class="col-md-4">
                 <h5 class="text-primary">การชำระเงิน</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey">- ทำสัญญาจะซื้อจะขาย</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey">฿<?=number_format($rowUnit->DepositPrice, 0,'',',');?></h5>
                </div>
                <!--hide b-->
                <div class="target-rb display-none">
                    <!--r1-->
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> - โอนหลังจากทำสัญญาจะซื้อจะขาย </div>
                    <div class="col-md-4"><?=$rowUnit->DayOfDeposit;?> วัน</div>
                    
          
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
        
                <!-Added on 5Nov-->
          <!-row 6->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
                 <h5 class="text-primary">รายละเอียดผู้เช่า</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey">- ค่าเช่า</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey"> 20,000 บาท/เดือน</h5>
                </div>
                <!-hide 6->
                <div class="target-r6 display-none">
                    <!-r1->
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> - สัญชาติ </div>
                    <div class="col-md-4"> ไทย</div>
                    <div class="clearfix"></div>
                    
                    <!-end-r1->

                    <!-r2->
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10"> - เซ็นสัญญาในนาม </div>
                    <div class="col-md-4 padding-top10"> นิติบุคคล</div>
                    <div class="clearfix"></div>
                  
                    <!-end-r2->

                    <!-r3->
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10"> - หมดสัญญา </div>
                    <div class="col-md-4 padding-top10"> 15 พ.ย. 2558</div>
                    <div class="clearfix"></div>
                    
                    <!-end-r3->

                    <!-r4->
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10"> - เลิกสัญญาได้โดยไม่มีค่าปรับ </div>
                    <div class="col-md-4 padding-top10"> ใช่</div>
                    <div class="clearfix"></div>
                  
                    <!-end-r4->

                </div>
                <!-end hide 6->
          </div>
          <div>
                    <div class="pull-right">
                       <span id="down-r6" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
                       <span id="up-r6" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div>                 
          </div>
        <div class="clearfix"></div>
        <!-end row e->
        <hr class="padding-none">
        <br>
        <!-End Added on 5Nov->

         <!--row c-->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
                 <h5 class="text-primary">ยอมรับนายหน้า</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey">- ราคาขายของนายหน้า</h5>
                </div>
                <div class="col-md-4">
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
                <!--hide b-->
                <div class="target-rc display-none">
                    <!--r1-->
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> - ค่าคอมมิชชั่น</div>
                    <div class="col-md-4">฿<?=number_format(($rowUnit->BrokerPrice), 0,'',',');?><br><span class="small2">(2% ของราคาหักค่าธรรมเนียม)</span></div>
                    
          
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
                <div class="col-md-4">
                   <h5 class="text-primary">ประมาณการสินเชื่อ</h5>
                </div>
                <div class="col-md-4"><h5 class="text-grey">- ระยะเวลากู้ <?=$PLoanMonth;?>ปี ดอกเบี้ย <?=$PLoan;?>% </h5></div>
                <div class="col-md-4"> <h5 class="text-grey">฿<?=number_format($PayPerMonth, 0,'',',');?>/เดือน</h5></div>
                <div class="clearfix"></div>
                <!--hide c-->
                <div class="target-rd display-none">
                    
                    <div class="col-md-4"></div><div class="col-md-4"> - ยอดเงินกู้</div><div class="col-md-4">฿<?=$TotalPrice;?></div>
                    <div class="clearfix">&nbsp;</div>
                     <div class="col-md-4"></div><div class="col-md-4"><span class="text-turq2"> คำนวณความพร้อมของการขอสินเชื่อ</span></div><div class="col-md-4"></div>
                      <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">เงินเดือน <span class="small2">(ปลอดภาระ)</span></div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x1" onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ระบุอัตราดอกเบี้ย <span class="small2">(%)</span> </div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x2" value="6.5"  onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10">ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span></div><div class="col-md-4 padding-top10" ><input class="btn-xs" id="x3" value="20"  onchange="Function_CreditLineMulti()"></div>
                    <input type="hidden" id="x4" value="<?=$rowUnit->TotalPrice;?>">
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ความสามารถในการผ่อน*</div>
                    <div class="col-md-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showPayPerMonth" disabled></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ประมาณยอดเงินที่กู้ได*้</div>
                    <div class="col-md-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showLoan" disabled></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10"> ชำระเพิ่ม ณ วันโอน</div>
                    <div class="col-md-4 padding-top10" style="padding-bottom:40px;"><input class="btn-xs borderless2" type="text" id="showPayTransfer" disabled></div>
                    </div>
<!--                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">เงินเดือน -รายได้อื่นปลอดภาระ <span class="small2">(บาท)*</span></div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x1" onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">อัตราดอกเบี้ย </div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x2" value="6.5"  onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10">ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span></div><div class="col-md-4 padding-top10" ><input class="btn-xs" id="x3" value="20"  onchange="Function_CreditLineMulti()"></div>
                    <input type="hidden" id="x4" value="<?=$rowUnit->DTransferPayment;?>">
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ความสามารถในการผ่อนต่อเดือน*</div>
                    <div class="col-md-4 padding-top10" >B20,000</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ประมาณยอดเงินที่กู้ได้*</div>
                    <div class="col-md-4 padding-top10" >B10,000,000</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10"> ชำระเพิ่ม ณ วันโอน</div>
                    <div class="col-md-4 padding-top10" style="padding-bottom:40px;">1,125,000</div>
                    </div>
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


        

          
      

     


<div class="col-md-12 padding-top1">
  
  <div class="bg-grey2"><!--new grey bg-->

          <div class="bg-grey2 col-md-6 col-md-offset-1 resize-mobile">
            <br>
            <h5 class="text-primary text-center">เปรียบเทียบโครงการเดียวกันและคนสนใจ</h5>
             <div class="table-responsive">
              <table class="table borderless">
                <tr class="text-primary">
                  <td class="text-center">&nbsp;</td>
                  <td class="text-center">ราคาปัจจุบัน</td>
                  <td class="text-center">ราคาเดิม</td>
                </tr>
              </table>
              <table class="table borderless">
                <tr class="text-primary">
                  <td>ชั้น</td>
                  <td>ทิศ</td>
                  <td>ตร.ม.</td>
                  <td>บาท/ม2.</td>
                  <td>+/-</td>
                  <td><img src="/img/sun-icon5.png"></a></td>
                  <td><a href="#"><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></a></td>
                  <td>บาท/ม2.</td>
                  <td>+/-</td>
                  <td><img src="/img/sun-icon5.png"></a></td>
                  <td><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></td>
                </tr>
<?php
	foreach ($queryAllPost->result() as $rowAllPost){	
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
                  <td><?=$rowAllPost->Floor;?></td>
                  <td><?php
						if (($rowUnit->Direction)!=0){
							echo $this->unitdetail->convertDirection($rowUnit->Direction);
						} else {
							echo "ไม่ระบุ";
						}
						?>
				  </td>
                  <td><?=number_format(($rowAllPost->useArea)+($rowAllPost->terraceArea), 0,'',',');?></td>
                  <td><?=number_format(($rowAllPost->PricePerSq), 0,'',',');?></td>
                  <td><p class="text-green">&nbsp;</p></td>
                  <td><?=$rowAllPost->DateShow;?></td>
                  <td><?=$this->search->ContViewList($rowAllPost->POID);?></td>
                  <td>&nbsp;</td>
                  <td><p class="text-red">-&nbsp;</p></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
<?php
		  };
?>
              </table>
            </div>
            </div>
           

            <div class="clearfix"></div>
            <br>

            </div>

            <!--end new grey bg-->

            <div class="clearfix"></div>
            <br>
   
            <div class="text-center text-primary col-md-7 col-md-offset-1 resize-mobile "> 
              <h5 class="text-primary text-center">สรุปโครงการ </h5>
            </div>
            <div class="clearfix"></div>
            <br>
            <!-- row5 -->
            <div class="col-md-7 col-md-offset-1 text-grey">
               <div class="col-md-4 col-xs-4">
                <span class="pull-left">สร้างเสร็จ&nbsp;</span>
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-right"><?=$rowProject->YearEnd;?></span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left">ที่จอดรถ</span>
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-right"><?=$rowProject->CarParkUnit;?> คัน</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left">
                <span class="pull-left">ค่าส่วนกลาง</span>
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-right">
				<?php
				   $PriceCamFee=($rowProject->CamFee)*$sumArea;
				?>
					฿<?=number_format($PriceCamFee, 0,'',',');?>/ด
				</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <!--end row5-->


            <!-- hide detail -->
            <div class="col-md-7 col-md-offset-1 resize-mobile text-grey target-r4 display-none">
               <div class="col-md-4 col-xs-4 padding-top10">
                <span class="pull-left">&nbsp;</span><span class="pull-right">&nbsp;</span>
               </div>
               <div class="col-md-4 col-xs-4 border-left padding-top10">
                <span class="pull-left">จำนวนห้องชุด</span>
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-right"><?=$rowProject->CondoUnit;?> ยูนิต</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left padding-top10">
                <span class="pull-left">ค่าส่วนกลางรายปี</span>
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-right">
					฿<?=number_format($PriceCamFee*12, 0,'',',');?>/ด
				</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <!--end detail-->


           
            <div class="col-md-8">
              <div class="pull-right">
                 <span id="down-r4" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
              </div>
              <div class="pull-right">
                 <span id="up-r4" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
              </div>             
            
            </div>

            <div class="clearfix"></div>
            
            

  
             <!-- row6 -->
            <div class="bg-grey2"><!--new bg grey--> 

            <div class="col-md-7 col-md-offset-1 text-grey bg-grey2 resize-mobile ">
               <br>
               <h5 class="text-primary text-center">สิ่งอำนวยความสะดวกโดยรอบ</h5>
               <div class="clearfix"></div>
               <br>
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
               <div class="clearfix"></div>
               <br>
            

            <div class="text-grey">
               <div class="col-md-4 col-xs-4">
			   	<?php 
					if ($project!=null){
			   ?>
                <span class="pull-left"><?=$DistEducation[1][2];?></span>
				<span class="pull-right"><?=$DistEducation[1][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left min-height1">
			   	<?php 
					if ($project!=null){
			   ?>
                <span class="pull-left"><?=$DistShopingMall[1][2];?></span>
				<span class="pull-right"><?=$DistShopingMall[1][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left min-height1">
			   	<?php 
					if ($project!=null){
			   ?>
                <span class="pull-left"><?=$DistHospital[1][2];?></span>
				<span class="pull-right"><?=$DistHospital[1][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <!--end row6-->


            <!-- hide detail -->
            <div class="text-grey target-r5 display-none">
               <div class="col-md-4 col-xs-4">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistEducation[2][2];?></span>
				  <span class="pull-right"><?=$DistEducation[2][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left min-height1">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistShopingMall[2][2];?></span>
				  <span class="pull-right"><?=$DistShopingMall[2][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left min-height1">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistHospital[2][2];?></span>
				  <span class="pull-right"><?=$DistHospital[2][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <div class="text-grey target-r5 display-none">
               <div class="col-md-4 col-xs-4">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistEducation[3][2];?></span>
				  <span class="pull-right"><?=$DistEducation[3][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left min-height1">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistShopingMall[3][2];?></span>
				  <span class="pull-right"><?=$DistShopingMall[3][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
               <div class="col-md-4 col-xs-4 border-left min-height1">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistHospital[3][2];?></span>
				  <span class="pull-right"><?=$DistHospital[3][0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <!--end detail-->

            <div>
                    <div class="pull-right">
                       <span id="down-r5" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                    </div>
                    <div class="pull-right">
                       <span id="up-r5" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
                    </div> 
            </div>

            </div> <!--end new bg grey-->

            <div class="clearfix"></div>


            </div>  



     
      <div class="clearfix"></div>

      <br>

      <div id="map_canvas"></div>
          <!--<img class="img-responsive" src="/img/map03.png">-->
        </div>
        <div class="clearfix"></div>
        <br/>
        <div class="resize-mobile"><h5 class="text-primary text-center">ที่อยู่อาศัยคล้ายกัน</h5></div>
        <div class="row" id="cImgUnits">
           <!-- insert image node here -->
        </div>
</div>



</div>
<!--End Container-->


<br/><br/>
<!--- footer -->
<div class="col-md-12 blog-bg-grey">

    <br>
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center"><h3 class="text-white copyright">THE BETTER INFORMATION YOU GIVE,<br>
THE FASTER YOU BUY & SELL</h3>
    </div>
    <div class="col-md-2"></div>
    <div class="clearfix"></div><br>
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
      <ul class="list-inline">
        <li><a href="https://www.facebook.com/ZmyHome-426180034240172" target="_blank"><img src="/img/fb-icon.png"></a></li>
        <li><a href="#"><img src="/img/twitter-icon.png"></a></li>
        <li><a href="#"><img src="/img/gg-icon.png"></a></li>
        <li><a href="#"><img src="/img/up-icon.png"></a></li>
      </ul>
    </div>
    <div class="col-md-4"></div>

    <div class="col-md-10">
        <p>
          <small class="text-white">COPYRIGHT © 2015 , Z Home Ltd. ALL RIGHTS RESERVED </small>
        </p>
    </div>
    <div class="col-md-2">
          <div class="col-xs-2 pull-right"><small class="text-white">Security</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Terms</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Privacy</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Policy</small></div>
        </div>
    </div>

  </div>
  <br>
</div>
<!-- end footer -->


     <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
    
     <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
      <script type="text/javascript" src="/js/markerwithlabel.js"></script>
     <script type="text/javascript">
      // $('.selectpicker').selectpicker();
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
            $("#down-rd").click(function(){
               $(".target-rd").slideDown( 'fast', function(){});
               $("#down-rd").hide( 'fast', function(){});
               $("#up-rd ").show( 'fast', function(){});      
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
            $("#up-rd").click(function(){
               $(".target-rd").slideUp( 'fast', function(){});
               $("#down-rd").show( 'fast', function(){});  
               $("#up-rd ").hide( 'fast', function(){});  
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
			 $("#down-b1").click(function(){
               $(".target-b1").slideDown( 'fast', function(){});
              
               $("#up-b1").show( 'fast', function(){});      
            });
             $("#up-b1").click(function(){
               $(".target-b1").hide( 'fast', function(){});
               $("#down-b1").show( 'fast', function(){});  
               $("#up-b1 ").hide( 'fast', function(){});  
            });
            $("#down-b2").click(function(){
               //$(".target-b2").show( 'fast', function(){});
             
              getOwnerPhone();
              $(".target-b1").hide( 'fast', function(){});
            });
            $("#up-b2").click(function(){
               $(".target-b2").slideUp( 'fast', function(){});
               $("#down-b1").show( 'fast', function(){});  
               //$("#up-b2 ").hide( 'fast', function(){});  
            });

            $("#up-b3").click(function(){
               $(".target-b2").slideUp( 'fast', function(){});
             
               //$("#up-b2 ").hide( 'fast', function(){});  
            });
             
             $("#down-r6").click(function(){
               $(".target-r6").slideDown( 'fast', function(){});
               $("#down-r6").hide( 'fast', function(){});
               $("#up-r6").show( 'fast', function(){});      
             });
             $("#up-r6").click(function(){
               $(".target-r6").slideUp( 'fast', function(){});
               $("#down-r6").show( 'fast', function(){});  
               $("#up-r6").hide( 'fast', function(){});  
            });

         });
      </script> 
      <script type="text/javascript">
      var totalImg = <?php echo sizeof($Img)?>;
      var indexImg = 0;
        $(function(){

          $('.toggle').click(function (event) {
              event.preventDefault();
              var target = $(this).attr('href');
              $(target).toggleClass('hidden show');
          });
      //mSendPIDToGetImg();
      
      totalImg = parseInt(totalImg);
      
      if(totalImg>1){
        
        $('#nextImg').show("slow");
        $('#backImg').hide();
        
      }else{
        $('#backImg').hide();
        $('#nextImg').hide();
      }
      $('#backImg').click({index:indexImg},changeImgIndex);
      $('#nextImg').click({index:indexImg},changeImgIndex);
      
      
      
      initMap();
      mSendPIDToGetImg();
      //getOwnerPhone();
      
      });
      
      function changeImgIndex(evt){
        
         evt.preventDefault();
        var total = totalImg-1;
        if(evt.target.id=="nextImg"&&indexImg<total){
          
          indexImg += 1;
        }
    if(evt.target.id=="backImg"&&indexImg>0){
      
          indexImg -= 1;
        }
        
      if(indexImg>0){
          
          $('#backImg').show("slow");
        }else{
          
          $('#backImg').hide();
        }
        
        if(indexImg<total){
          
          $('#nextImg').show("slow");
        }else{
          
          $('#nextImg').hide();
        } 
        
        
  
   
    var imgurl = <?php echo json_encode($Img)?>;
  
   
    $('#imgHUnit').fadeOut(500, function() {
      
        $('#imgHUnit').attr("src",imgurl[indexImg]);
        $('#imgHUnit').fadeIn(500);
    });

        
  }
  
   function getOwnerPhone(){
  	
  	var poid = <?php echo $POID ?>;
  	
  	
  	
	var getOPhone = $.getJSON("/zhome/getOwnerNumber",{ POID:poid}, function(json) {
          console.log( "success" );
        })
          .done(function() {
          console.log( "second success" );
          })
          .fail(function() {
          console.log( "error" );
          })
          .always(function(json) {
            var tresult = json;
            //alert(tresult);
             $('#otel').val(tresult);
           
            console.log( "complete" );
          });

	// Set another completion function for the request above
	getOPhone.complete(function() {
  		console.log( "second complete" );
  		setShowTel();
	});
}
 function setShowTel(){
  	var tel = $('#otel').val();
  	var node;
  	
  	if(tel.length>20){
  		
  		node = tel;
  		$(".target-b2").show( 'fast', function(){});
  	}else{
  		var tel1 = tel.substring(0,3);
  		var tel2 = tel.substring(3,6);
  		var tel3 = tel.substring(6,tel.length);
  		var telformat = tel1+"-"+tel2+"-"+tel3;
  		node = telformat;
  		
  	}
  	
  	$('#down-b1').contents().replaceWith(node);
  }
  
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
  
var imgUnits = [];
function mSendPIDToGetImg(){
  
  var pid = <?php echo $PID ?>;
  //alert(pid);
  
  var propType = 1;
  var nBed = '';
  var nYear = '';
  var tSale = 1;
  var minP = '';
  var maxP = '';
  
  var getImgUnits = $.getJSON("/zhome/getImgUnit",{ PID:pid,TOProperty:propType,Bedroom:nBed,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP }, function(json) {
          console.log( "success" );
        })
          .done(function() {
          console.log( "second success" );
          })
          .fail(function() {
          console.log( "error" );
          })
          .always(function(json) {
            
            imgUnits = json;
            //alert(imgUnits.length);
            console.log( "complete" );
          });

// Set another completion function for the request above
getImgUnits.complete(function() {
  console.log( "second complete" );
  displayImgUnits();
});
}

function displayImgUnits(){
  var imgNode = "";
  //alert("poid : "+$('#poid').val());
  for(var i=0;i<imgUnits.length;i++){
    
    if($('#'+imgUnits[i].POID).length==0&&imgUnits[i].POID!=$('#poid').val()){
        imgNode +=  '<div class="col-md-4 col-sm-6" style="margin-bottom:10px; margin-left:0px; padding-left:0px;" id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'" onclick=setPOID(this);>';
        imgNode +=  '<div><div class="unit-show2"><div style="padding-left:13px;cursor:pointer;"><h3 class="padding-none s-name"> '+imgUnits[i].ProjectName+'</h3></div>';
        imgNode +=  '<div class="bg-grey2 text-center" style="position:relative;background-color:#87CED5;height:auto;cursor:pointer;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive center-block"><h4  class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';
        imgNode +=   '<table class="table borderless2 fsize-unitsearch unit-table" style="padding:0;margin:0;cursor:pointer;">';
        imgNode +=   '<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;">';
        imgNode +=   '<td style="padding-left:13px;"> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' นอน '+imgUnits[i].useArea+'ม&sup2;  ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
        imgNode +=  '<td class="s-padding-left"><strong class="s-price">&#3647; <span class="text-primary">'+imgUnits[i].Price+'</span></strong></td>';
        imgNode +=  '<td class="text-right"><strong class="s-price">&#3647; <span class="text-primary text-right">'+imgUnits[i].PricePerSq+'</span>/ม&sup2;</strong></td>';
        imgNode +=  '</tr>';
        imgNode +=  '<tr style="border-bottom: 1px solid #dbdbdb">';
        imgNode +=  '<td style="padding-left:13px;">'+imgUnits[i].DistName+'</td>';
        imgNode +=  '<td class="s-padding-left"><span class="text-blue">'+imgUnits[i].DateShow+' </span> <img src="/img/sun-s-icon.png"> <span class="text-blue"> '+imgUnits[i].ViewTel+' </span> <span width="3px" class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
        imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';
        imgNode +=   '</tr>';
        imgNode +=   '</table>';
        imgNode +=   '</div></div></div></div>';    
             
        }
  }
  $('#cImgUnits').append(imgNode);
  
}

var locate_array = <?php echo json_encode($location);?>;
function initMap(){
    //alert(returnSearch[0]+"proj 1 : "+returnSearch[1].ProjectName+" total :"+returnSearch.length);
    var grayStyles = [
        {
          featureType: "all",
          stylers: [
            { saturation: -90 },
            { lightness: 20 }
          ]
        },
      ];
    
        
	var latLng = new google.maps.LatLng(<?php echo $rowUnit->Lat; ?>, <?php echo $rowUnit->Lng; ?>);
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
		zoom: 14,
		center: latLng,
		styles:grayStyles,
		mapTypeId: google.maps.MapTypeId.ROADMAPgx
	});
	var shape = {
		coords: [1, 1, 1, 20, 18, 20, 18, 1],
		type: 'poly'
	};
	
	for (var i = 0; i < locate_array.length; i++) {
		var location = locate_array[i];
		var myLatlng = new google.maps.LatLng(location[3],location[4]);
		var myIcon = location[5];
		var myTitle = location[2];
		var myDistance = location[0];
		if(location[0]!=''){
			var myDistance=myDistance+' km.';
		}
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			//icon: image,
			icon: {url: myIcon,
				//scaleSize: new google.maps.Size(25, 30),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(0, 0)
			},
			shape: shape,
			//zIndex: i,
			title: myTitle
		});
		
		var content='<div>'+myTitle+' '+myDistance+'</div>';
		var infowindow = new google.maps.InfoWindow({
			content: content,
			maxWidth: 200
		});
		
		google.maps.event.addListener(marker,'mouseover', (function(marker,content,infowindow){ 
			return function() {
				infowindow.setContent(content);
				infowindow.open(map,marker);
			};
		})(marker,content,infowindow));
		
		google.maps.event.addListener(marker,'mouseout', (function(marker,content,infowindow){ 
			return function() {
				infowindow.close();
			};
		})(marker,content,infowindow));
	}
  
}

</script>   
<script type="text/javascript" src="/js/jssharefb.js"></script>

<script type="text/javascript">
$('#myModal').modal(options);

function send_problem(value){
	$('#ptype').val(value);
	$('#ptype option[value="'+value+'"]').attr('selected','selected');
}

function submitFormHelpdesk()
{
	var a=document.getElementById("poid").value;
	var b=document.getElementById("pfullname").value;
	var c=document.getElementById("pemail").value;
	var d=document.getElementById("ptelphone").value;
	var e=document.getElementById("ptype").value;
	var f=document.getElementById("pdetail").value;

	if (b=="")
	{
		document.getElementById("pfullname").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pfullname").style.borderColor = "#CCCCCC";
	}
	if (c=="")
	{
		document.getElementById("pemail").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pemail").style.borderColor = "#CCCCCC";
	}
	if (d=="")
	{
		document.getElementById("ptelphone").style.borderColor = "#FF0000";
	} else {
		document.getElementById("ptelphone").style.borderColor = "#CCCCCC";
	}
	if (e=="")
	{
		document.getElementById("ptype").style.borderColor = "#FF0000";
	} else {
		document.getElementById("ptype").style.borderColor = "#CCCCCC";
	}
	if (f=="")
	{
		document.getElementById("pdetail").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pdetail").style.borderColor = "#CCCCCC";
	}
			
	if (b!="" && c!="" && d!="" && e!="" && f!="")
	{
		$('#ckproblem').hide();
		$.post("/zhome/add_Helpdesk", { 'poid':a, 'informer_name': b, 'informer_email':c, 'informer_telphone':d, 'problem_type':e, 'informer_detail':f });
		$('#myModal').modal('hide');
	} else {
		$('#ckproblem').show();
		return false;
	}
}

function showUnit(url){
	window.open(url);
}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

</body>
</html>