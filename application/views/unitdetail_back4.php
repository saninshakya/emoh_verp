<?php
  $rowUnit=$unit->row();
  if ($project!=null){
	  $rowProject=$project->row();
  }
  $POID=$rowUnit->POID;
  $PID=$rowUnit->PID;
  $PName_th=$rowUnit->ProjectName;
  $TOAdvertising=$rowUnit->TOAdvertising;

  $TOProperty=$rowUnit->TOProperty;
  $RefID="(ID".$TOProperty.$TOAdvertising."-".$POID.")";
  
  $Active=$rowUnit->Active;
  $queryAllPost=$this->unitdetail->getAllPostFromPIDandTOAdvertising($PID,$TOAdvertising,$Active,$PName_th);
  //echo $PID;
  //echo $rowUnit->Lat;
  //echo $rowUnit->Lng;
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
  $DTransferPayment=$rowUnit->DTransferPayment;
  $cRate=($PLoan/12)/100;
  $cPeriod=$PLoanMonth*12;
  $Var1=$DTransferPayment*$cRate;
  $Var2=1-(1/pow((1+$cRate),$cPeriod));
  $PayPerMonth=$Var1/$Var2;

?>
<input type=hidden id="poid" name="poid" value="<?php echo $POID; ?>">
<div class="container">
        <div class="row">  
          <div class="col-md-12">
               <ul class="list-inline">
                  <li><h3 class="text-primary"><?=$rowUnit->ProjectName;?>&nbsp;<?=$RefID;?></h3></li>
                  <li><span class="glyphicon glyphicon glyphicon-star text-primary" aria-hidden="true"></span>
          </div>
        </div>
        <div class="row display-none">  
          <div class="col-md-3 col-xs-3 text-primary"><?=$arrayList[0];?> จาก <?=$arrayList[1];?> ในรายการ</div>
          <div class="col-md-3 col-xs-3 text-primary">กำลังต่อรองอยู่ <?=$CountViewList;?> ราย</div>
          <div class="col-md-3 col-xs-3 text-primary"><?=$CountSoldPerMonth;?> Sold/Moth</div>
          <div class="col-md-3 col-xs-3 text-primary">&nbsp;</div>
        </div>
        
        
           <div class="col-md-12 border-img">
              <span class="glyphicon glyphicon-menu-left btn-back-img" id="backImg"></span>
              <span class="glyphicon glyphicon-menu-right btn-next-img" id="nextImg"></span>
              <img class="img-responsive unit-fixsize" src="<?php if (sizeof($Img)!=0){ echo $Img[0];};?>" id="imgHUnit">
           </div>
        
        <!-start move->
        
         <div class="col-md-4 col-md-push-8">
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
               <div class="col-md-12"">
                <ul class="list-inline padding-top3 padding-lr2">
                      <li class="pull-left"><h2 class="text-white padding-none margin-left4">฿<?=$TotalPrice;?>

</h2></li>
                      <li class="text-white pull-right padding-top6"><h8>B <?=number_format($rowUnit->PricePerSq, 0,'',',');?>/ม<sup>2</sup></h8></li>                      
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
                         <div class="h7 text-white">-</div>
                      </div>
                  </div>
                <div class="clearfix padding-bottom2"></div>
              </div><!-end -padding->
                
            </div>

            <div class="clearfix"></div>
            <br>

            <div class="col-md-1"></div>
            <div class="col-md-10 bg-blue text-white text-center padding-top2"><input type="hidden" id="otel" value="">
              <h5 class="text-white">โทรหาเจ้าของ</h5>
              
              <!--revised 9oct58-->
              <ul class="list-inline">
                 <li class="clear-none"><span class="glyphicon glyphicon-earphone text-white input-md clear-none"></span></li>
                 <li><h7 class="text-white"> <a id="down-b1" class="text-white">099-XXX-XXX</a></h7></li>
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
             <div class="col-md-12 text-center padding-top1"><div class="text-primary">แจ้ง! : <a class="text-primary" href="#"> ไม่ใช่เจ้าของ</a> <a class="text-primary" style="padding-left:7px;" href="#">  ขายแล้ว</a> <a class="text-primary" href="#" style="padding-left:7px;">  ขึ้นราคา</a> <a class="text-primary" href="#" style="padding-left:7px;">  ข้อมูลผิด</a> </div></div>
             <div class="clearfix"></div><br>
          </div>
         <div class="clearfix"></div> 
        
         <br>
         <div class="row border-grey2 text-grey"><br>
            <div class="col-xs-6 text-center"><a class="text-grey" href="#"><span class="glyphicon glyphicon-heart text-grey"></span> รายการสนใจ<a/><br></div> 
            <div class="col-xs-6 text-center"><a class="text-grey" href="#">แจ้งลดราคา</a><br></div> 
            <br><br>
            <div class="col-xs-4 text-grey text-center border-top padding-top3"><a href="#"><span class="glyphicon glyphicon-envelope text-grey"></span></a></div>
            <div class="col-xs-4 text-grey text-center border-left border-top padding-top3"><a class="text-grey" href="#" onclick="shareOnFacebook();">Facebook</a></div>
            <div class="col-xs-4 text-grey text-center border-left border-top padding-top3"><a class="text-grey" href="#">อื่นๆ..</a></div>
            
            <br>
         </div>
        </div>

        <!-end move->
        <div class="col-md-8 col-md-pull-4">
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
          <!-- row1 ---->
          <div class="col-md-12">
            <div class="col-md-4 col-xs-4 text-grey">
			
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-left"><h5 class="text-grey"><?=$DistBTSMRT[2];?></h5></span>
				<span class="pull-right"><h5 class="text-grey"><?=$DistBTSMRT[0];?> กม.</h5></span>
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
				<span class="pull-left"><h5 class="text-grey"><?=$DistExpressway[2];?></h5></span>
				<span class="pull-right"><h5 class="text-grey"><?=$DistExpressway[0];?> กม.</h5></span>
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
					<span class="pull-left"><h5 class="text-grey"><?=$DistMinimart[2];?></h5></span>
					<span class="pull-right"><h5 class="text-grey"><?=$DistMinimart[0];?> กม.</h5></span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-left">ไม่มีข้อมูลโครงการ</span>
				 <?php
					}
				 ?>
			
            </div>
          </div>
          <!-end row1->
          <div class="clearfix"></div>
          <!-hide data-->
          <div class="col-md-12 target-r1 display-none">
            <div class="col-md-4 col-xs-4">
              <div class="text-grey">
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-left"><?=$DistBTSMRT[5];?></span>
				<span class="pull-right"><?=$DistBTSMRT[3];?> กม.</span>
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
					<span class="pull-left"><?=$DistExpressway[5];?></span>
					<span class="pull-right"><?=$DistExpressway[3];?> กม.</span>
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
					<span class="pull-left"><?=$DistMinimart[5];?></span>
					<span class="pull-right"><?=$DistMinimart[3];?> กม.</span>
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
          <!-end hide->
          <!-hide data-->
          <div class="col-md-12 target-r1 display-none">
            <div class="col-md-4 col-xs-4">
              <div class="text-grey padding-top1">
			   <?php 
					if ($project!=null){
			   ?>
					<span class="pull-left"><?=$DistBTSMRT[8];?></span>
					<span class="pull-right"><?=$DistBTSMRT[6];?> กม.</span>
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
					<span class="pull-left"><?=$DistExpressway[8];?></span>
					<span class="pull-right"><?=$DistExpressway[6];?> กม.</span>
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
					<span class="pull-left"><?=$DistMinimart[8];?></span>
					<span class="pull-right"><?=$DistMinimart[6];?> กม.</span>
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
             <br>
             <h5 class="text-primary text-center">จุดเด่นห้องชุด</h5>
             <br>

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

        <div class="text-grey">
          <h5 class="text-primary text-center">รายละเอียดราคาและการชำระเงิน</h5>
          <br>
          <!-row a->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
                 <h5 class="text-grey">ราคา ค่าธรรมเนียม และโปรโมชั่น</h5>
                </div>
                <div class="col-md-4">
                  <h5 class="text-grey">- ราคาขาย</h5>
                </div>
                <div class="col-md-4">
                  <h5 class="text-grey">฿<?=$TotalPrice;?></h5>
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
                    <div class="col-md-4 padding-top10">
                    </div>
                    <div class="col-md-4 padding-top10">
                       - ยืนยันราคาขายถึงวันที่
                    </div>
                    <div class="col-md-4 padding-top10">
                      (<?=$DateExpire;?>)   
                    </div>
                    <!-end-r1->
                    <div class="clearfix"></div>
                
                    <!-r2->
                    <div class="col-md-4 padding-top10">
                     &nbsp;
                    </div>
                    <div class="col-md-4 padding-top10">
                        - โปรโมชั่นที่ได้รับ
                    </div>
                    <div class="col-md-4 padding-top10">
                       <?php if ($rowUnit->DFreeTransfer=='1'){echo "ฟรีค่าธรรมเนียมการโอน<br>";};?>
                       <?php if ($rowUnit->DFreeContract=='1'){echo "ฟรีค่าจดจำนอง<br>";};?>
                       <?php if ($rowUnit->DFreeMember=='1'){echo "ฟรีเงินกองทุนนิติบุคคลฯ <br>";};?>
                       <?php if ($rowUnit->DFreeFeeMember!='0' and $rowUnit->DFreeFeeMember!=null){echo "ฟรีค่าใช้จ่ายส่วนกลาง ".$rowUnit->DFreeFeeMember." ปี<br>";};?>
                       <?php if ($rowUnit->DDiscount!='0' and $rowUnit->DDiscount!=null){echo "- ส่วนลด ณ วันโอน ".number_format($rowUnit->DDiscount, 0,'',',')." บาท<br>";};?>
             <?php if ($rowUnit->DFreeMeter=='1'){echo "ฟรีค่ามิเตอร์<br>";};?>
             <?php if ($rowUnit->DFreeFurniture!=null and $rowUnit->DFreeFurniture!=""){echo "เฟอร์นิเจอร์ (".$rowUnit->DFreeFurniture.")<br>";};?>
             <?php if ($rowUnit->DFreeElectric!=null and $rowUnit->DFreeElectric!=""){echo "เครี่องใช้ไฟฟ้า (".$rowUnit->DFreeElectric.")<br>";};?>
                       <?php if ($rowUnit->DFreeVoucher!=null and $rowUnit->DFreeVoucher!=""){echo "คูปองสมนาคุณ (".$rowUnit->DFreeVoucher.")<br>";};?>
                       <?php if ($rowUnit->DFreeETC!=null and $rowUnit->DFreeETC!=""){echo "- อื่นๆ (".$rowUnit->DFreeETC.") <br>";};?>
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
        <hr class="padding-none">
        <br>
        <!-row b->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
                 <h5 class="text-grey">การชำระเงิน</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey">- ขายดาวน์</h5>
                </div>
                <div class="col-md-4">
                 <h5 class="text-grey">฿<?=number_format($rowUnit->DDownTotalPrice, 0,'',',');?></h5>
                </div>
                <!-hide b->
                <div class="target-rb display-none">
                    <!-r1->
                    <div class="col-md-4"></div>
                    <div class="col-md-4"> - ผ่อนชำระต่อกับโครงการ </div>
                    <div class="col-md-4">฿<?=number_format($rowUnit->DStalePayment, 0,'',',');?></div>
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10">- จำนวนงวดที่เหลือกับโครงการ</div>
                    <div class="col-md-4 padding-top10"> <?=$rowUnit->DStalePaymentMonth;?> งวด </div>
          <?php
            if ($rowUnit->DContractPrice1!=null){
              $DContractDate1=$rowUnit->DContractDate1;
              $date = date_create_from_format('d-M-Y', $DContractDate1);
              $DContractDate1=date_format($date, 'd/m/Y');
          ?>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4">เงินทำสัญญางวดที่ 1</div><div class="col-md-4">฿<?=number_format($rowUnit->DContractPrice1, 0,'',',');?> (<?=$DContractDate1;?>)</div>
          <?php
            };
          ?>
          <?php
            if ($rowUnit->DContractPrice2!=null){
              $DContractDate2=$rowUnit->DContractDate2;
              $date = date_create_from_format('d-M-Y', $DContractDate2);
              $DContractDate2=date_format($date, 'd/m/Y');
          ?>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4">เงินทำสัญญางวดที่ 2</div><div class="col-md-4">฿<?=number_format($rowUnit->DContractPrice2, 0,'',',');?> (<?=$DContractDate2;?>)</div>
          <?php
            };
          ?>
          <?php
            if ($rowUnit->DContractPrice3!=null){
              $DContractDate3=$rowUnit->DContractDate3;
              $date = date_create_from_format('d-M-Y', $DContractDate3);
              $DContractDate3=date_format($date, 'd/m/Y');
          ?>
                    <div class="col-md-4"></div><div class="col-md-4 padding-top10">เงินทำสัญญางวดที่ 3</div><div class="col-md-4">฿<?=number_format($rowUnit->DContractPrice3, 0,'',',');?> (<?=$DContractDate3;?>)</div>
          <?php
            };
          ?>
            <?php
            
            if ($DPayment->num_rows()!=0){
          ?>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4">ผ่อนดาวน์อีก</div><div class="col-md-4"><?=$DPayment->num_rows();?> งวด</div>
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
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10"> - ชำระ ณ วันโอนกรรมสิทธิ</div>
                    <div class="col-md-4 padding-top10">฿<?=number_format($rowUnit->DTransferPayment, 0,'',',');?></div>
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-8 padding-top10">  <span class="small2">(สอบถามค่าธรรมเนียมและภาษีกับโครงการก่อนวันโอน)</small></div> 
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
        <hr class="padding-none">
        <br>
        <!-row c->
          <div class="col-md-12 text-grey text-left">
                <div class="col-md-4">
                   <h5 class="text-grey">สินเชื่อ</h5>
                </div>
                <div class="col-md-4"><h5 class="text-grey">- ผ่อนต่อเดือน <span class="small2">(กู้ <?=$PLoanMonth;?> ปีดอกเบี้ย <?=$PLoan;?>%)</span> </h5></div>
                <div class="col-md-4"> <h5 class="text-grey">฿<?=number_format($PayPerMonth, 0,'',',');?></h5></div>
                <div class="clearfix"></div>
                <!-hide c->
                <div class="target-rc display-none">
                    
                    <div class="col-md-4"></div><div class="col-md-4"> - ยอดโอนหรือกู้ไม่รวมค่านายหน้า*</div><div class="col-md-4">฿<?=number_format($rowUnit->DTransferPayment, 0,'',',');?></div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">เงินเดือน <span class="small2">(ปลอดภาระ)</span></div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x1" onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ระบุอัตราดอกเบี้ย <span class="small2">(%)</span> </div><div class="col-md-4 padding-top10"><input class="btn-xs" id="x2" value="6.5"  onchange="Function_CreditLineMulti()"></div>
                    <div class="col-md-4 padding-top10"></div>
                    <div class="col-md-4 padding-top10">ระยะเวลากู้ <span class="small2">(สูงสุด 30 ปี/65-อายุผู้กู้)</span></div><div class="col-md-4 padding-top10" ><input class="btn-xs" id="x3" value="20"  onchange="Function_CreditLineMulti()"></div>
                    <input type="hidden" id="x4" value="<?=$rowUnit->DTransferPayment;?>">
                    <div class="clearfix">&nbsp;</div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ความสามารถในการผ่อน*</div>
                    <div class="col-md-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showPayPerMonth" disabled></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10">ประมาณยอดเงินที่กู้ได*้</div>
                    <div class="col-md-4 padding-top10" ><input class="btn-xs borderless2" type="text" id="showLoan" disabled></div>
                    <div class="col-md-4 padding-top10"></div><div class="col-md-4 padding-top10"> ชำระโครงการเพิ่ม ณ วันโอน</div>
                    <div class="col-md-4 padding-top10" style="padding-bottom:40px;"><input class="btn-xs borderless2" type="text" id="showPayTransfer" disabled></div>
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
       
            </div>


        

          
      

     


<div class="col-md-12 padding-top1">
  
  <div class="bg-grey2"><!-new grey bg->

          <div class="bg-grey2 col-md-8">
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
                  <td><img src="/img/sun-icon4.png"></a></td>
                  <td><a href="#"><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></a></td>
                  <td>บาท/ม2.</td>
                  <td>+/-</td>
                  <td><img src="/img/sun-icon4.png"></a></td>
                  <td><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></td>
                </tr>
<?php
	foreach ($queryAllPost->result() as $rowAllPost){	
?>
                <tr
				<?php
					if (($rowAllPost->POID)==$POID){
				?>
					class="row-active-green"
				<?php
					} else {
				?>
					class="text-grey"
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

            <!-end new grey bg->

            <div class="clearfix"></div>
            <br>
   
            <div class="text-center text-primary col-md-8"> 
              <h5 class="text-primary text-center">สรุปโครงการ </h5>
            </div>
            <div class="clearfix"></div>
            <br>
            <!-- row5 ---->
            <div class="col-md-8 text-grey">
               <div class="col-md-4 col-xs-4">
                <span class="pull-left">สร้างเสร็จ&nbsp;</span>
			   <?php 
					if ($project!=null){
			   ?>
				<span class="pull-left"><?=$rowProject->YearEnd;?></span>
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
            <!-end row5-->


            <!-- hide detail ---->
            <div class="col-md-8 text-grey target-r4 display-none">
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
            <!-end detail->


           
            <div class="col-md-8">
              <div class="pull-right">
                 <span id="down-r4" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
              </div>
              <div class="pull-right">
                 <span id="up-r4" style="width:10px;" class="glyphicon glyphicon-remove btn-sm text-grey display-none" aria-hidden="true"></span>
              </div>             
            
            </div>

            <div class="clearfix"></div>
            
            

  
             <!-- row6 ---->
            <div class="bg-grey2"><!-new bg grey-> 

            <div class="col-md-8 text-grey bg-grey2">
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
            

            <div class="col-md-12 text-grey">
               <div class="col-md-4 col-xs-4">
			   	<?php 
					if ($project!=null){
			   ?>
                <span class="pull-left"><?=$DistEducation[2];?></span>
				<span class="pull-right"><?=$DistEducation[0];?> กม.</span>
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
                <span class="pull-left"><?=$DistShopingMall[2];?></span><span class="pull-right"><?=$DistShopingMall[0];?> กม.</span>
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
                <span class="pull-left"><?=$DistHospital[2];?></span><span class="pull-right"><?=$DistHospital[0];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <!-end row6-->


            <!-- hide detail ---->
            <div class="col-md-12 text-grey target-r5 display-none">
               <div class="col-md-4 col-xs-4">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistEducation[5];?></span><span class="pull-right"><?=$DistEducation[3];?> กม.</span>
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
                  <span class="pull-left"><?=$DistShopingMall[5];?></span><span class="pull-right"><?=$DistShopingMall[3];?> กม.</span>
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
                  <span class="pull-left"><?=$DistHospital[5];?></span><span class="pull-right"><?=$DistHospital[3];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
               </div>
            </div>
            <div class="col-md-12 text-grey target-r5 display-none">
               <div class="col-md-4 col-xs-4">
			   	<?php 
					if ($project!=null){
			   ?>
                  <span class="pull-left"><?=$DistEducation[8];?></span><span class="pull-right"><?=$DistEducation[6];?> กม.</span>
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
                  <span class="pull-left"><?=$DistShopingMall[8];?></span><span class="pull-right"><?=$DistShopingMall[6];?> กม.</span>
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
                  <span class="pull-left"><?=$DistHospital[8];?></span><span class="pull-right"><?=$DistHospital[6];?> กม.</span>
				<?php 
					 } else {
				 ?>
				 <span class="pull-right">ไม่มีข้อมูล</span>
				 <?php
					}
				 ?>
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

            </div> <!-end new bg grey->

            <div class="clearfix"></div>


            </div>  



     
      <div class="clearfix"></div>

      <br>

      <div id="map_canvas"></div>
          <!--<img class="img-responsive" src="/img/map03.png">-->
        </div>
        <div class="clearfix"></div>
        <br/>
        <div class="row text-center"><strong>ที่อยู่อาศัยคล้ายกัน</strong></div><br>
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
          <small class="text-white">COPYRIGHT © 2015 , Z Estate CO, LTD ALL RIGHTS RESERVED </small>
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
            //alert('unitdetail : '+tresult);
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
  	//<span class="glyphicon glyphicon-earphone text-white"></span> <a class="text-white" href="#">099-XXX-XXXX</a> -->
     //<a class="text-white" href="#"><h7 class="text-white"> พร้อมแสดงผล 1/10/58</h7></a>-->
  	
  	if(tel.length>20){
  		//node = '<a class="text-white" href="#"><h7 class="text-white">'+tel+'</h7></a>';
  		node = tel;
  		$(".target-b2").show( 'fast', function(){});
  	}else{
  		var tel1 = tel.substring(0,3);
  		var tel2 = tel.substring(3,6);
  		var tel3 = tel.substring(6,tel.length);
  		var telformat = tel1+"-"+tel2+"-"+tel3;
  		node = telformat;
  		//node = '<span class="glyphicon glyphicon-earphone text-white"></span><a class="text-white" href="#"><h7 class="text-white">'+" "+telformat+'</h7></a>';
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
  var tSale = 2;
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
    imgNode +=  '<div class="col-md-4" id="'+imgUnits[i].POID+'">';
        imgNode +=  '<img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive" width="360px" height="172px">';
        imgNode +=   '<table class="table">';
        imgNode +=   '<tr>';
        imgNode +=   '<td><strong>'+imgUnits[i].ProjectName+'</strong</td>';
        imgNode +=  '<td><strong>B <span class="text-primary">'+imgUnits[i].Price+'</span></span></td>';
        imgNode +=  '<td><strong>B <span class="text-primary">'+imgUnits[i].PricePerSq+'</span></span>/ม&sup2;.</td>';
        imgNode +=  '</tr>';
        imgNode +=  '<tr>';
        imgNode +=  '<td><span class="text-grey">'+imgUnits[i].Bedroom+' นอน '+imgUnits[i].useArea+'ม&sup2;. ชั้น '+imgUnits[i].Floor+'</span></td>';
        imgNode +=  '<td><span class="text-blue">'+imgUnits[i].DateShow+' </span> <img src="img/sun-icon.png"> <span class="text-blue"> '+imgUnits[i].ViewTel+' </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>';
        imgNode +=  '<td><span class="text-blue">'+imgUnits[i].Tel+'</span></td>';
        imgNode +=   '</tr>';
        imgNode +=   '</table>';
        imgNode +=   '</div>';    
             
        }
  }
  $('#cImgUnits').append(imgNode);
  
}
function initMap() {
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
    
    
    var lat = <?php echo $rowUnit->Lat; ?>;
    var lng = <?php echo $rowUnit->Lng; ?>;
    
     var latLng = new google.maps.LatLng(<?php echo $rowUnit->Lat; ?>, <?php echo $rowUnit->Lng; ?>);
     //var homeLatLng = new google.maps.LatLng(13.71307945, 100.53356171);
     //alert("return [0] : "+returnSearch[0]);
  // var cLatLng = new google.maps.LatLng(returnSearch[0].Lat,returnSearch[0].Lng);
  //alert(map);
     var map = new google.maps.Map(document.getElementById('map_canvas'), {
       zoom: 18,
       center: latLng,
       styles:grayStyles,
       mapTypeId: google.maps.MapTypeId.ROADMAPgx
     });
     var marker = new google.maps.Marker({
      position: latLng,
      map: map,
      title: 'Your search location point',
      draggable:false
  });
  
  var message = <?php echo '"'.$rowUnit->ProjectName.'"'; ?>;
  
    var infowindow = new google.maps.InfoWindow({
    content:message
  });
  marker.addListener('mouseover',function(){
    infowindow.open(marker.get('map'),marker);
  });
  marker.addListener('mouseout',function(){
    infowindow.close();
  });
  
}

</script> 

<script type="text/javascript" src="/js/jssharefb.js"></script>

      <script type="text/javascript">
          $(function () {

          $('.toggle').click(function (event) {
              event.preventDefault();
              var target = $(this).attr('href');
              $(target).toggleClass('hidden show');
          });

      });
      </script>     

</body>
</html>