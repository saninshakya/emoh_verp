<?php
	$rowUnit=$unit->row();
	$POID=$rowUnit->POID;
	$PID=$rowUnit->PID;
	$arrayList=$this->search->selectCountingList($POID,$PID);
	$CountViewList=$this->search->ContViewList($POID);
	$CountSoldPerMonth=$this->search->CountSoldPerMonth($PID);
	$Img=$this->search->SelectImgFromPOID($POID);
	$DistBTSMRT=$this->search->DistMRTBTS($PID);
	$getCondoSpec1=$this->search->getCondoSpec($POID,1);
	$getCondoSpec2=$this->search->getCondoSpec($POID,2);
	$getCondoSpec3=$this->search->getCondoSpec($POID,3);
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

?>
<hr class="border-top-grey">
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
          <div class="col-xs-4 text-center">
            <ul class="list-inline">
                  <li><img src="/img/bts-icon.png"></li><li class="text-primary">รถไฟฟ้า</li>
            </ul>
            <p class="text-grey"><span class="pull-left"><?=$DistBTSMRT[2];?></span><span class="pull-right"><?=$DistBTSMRT[0];?> กม.</span></p>
          </div>
          <div class="col-xs-4 border-left text-center">
            <ul class="list-inline">
                  <li><img src="/img/road-icon.png"></li><li class="text-primary">ทางด่วน</span></li>
            </ul>
              <p class="text-grey"><span class="pull-left">รัชดาภิเษก</span><span class="pull-right"> 2.5 กม.</span></p> 
          </div>
          <div class="col-xs-4 border-left border-left text-center">
            <ul class="list-inline">
                  <li><img src="/img/shop-icon.png"></li><li class="text-primary">ร้านสะดวกซื้อ</li>
            </ul>
            <p class="text-grey"><span class="pull-left">7-11</span><span class="pull-right"> 0.2 กม.</span>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-12">
              <div class="pull-right"><span id="down" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span></div> 
          </div>
    
          <div class="clearfix"></div>
          <! Hide Div ----------> 
          <div class="target display-none row bg-grey2">
            <h5 class="text-primary text-center">จุดเด่นห้องชุด</h5>
            <div class="col-xs-4 text-center">
			  <?php
				foreach ($getCondoSpec1 as $Name){
			  ?>
              <p class="text-grey"><?=$Name;?></p>
			  <?php
				};
			   ?>
            </div>
            <div class="col-xs-4 border-left text-center">
			  <?php
				foreach ($getCondoSpec2 as $Name){
			  ?>
			  <p class="text-grey"><?=$Name;?></p>
			  <?php
				};
			   ?>
            </div>
            <div class="col-xs-4 border-left border-left text-center">
			  <?php
				foreach ($getCondoSpec3 as $Name){
			  ?>
            <p class="text-grey"><?=$Name;?></p>
			  <?php
				};
			   ?>
            </div>
        

            <div class="clearfix"></div>
            <div class="col-md-12">
               <div class="pull-right"><span id="up" style="width:35px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span></div>
            </div>
            <div class="clearfix"></div>

        </div>

        <h5 class="text-primary text-center">รายละเอียดราคาและการชำระเงิน</h5>
          <div class="col-xs-4 text-center">
            <p class="text-primary">ราคา</p>
            <p class="text-grey">฿<?=$TotalPrice;?></p>
            <p class="text-grey">฿<?=$PricePerSq;?>/ม2.</p>
          </div>
          <div class="col-xs-4 border-left text-center">
            <p class="text-primary">การชำระเงิน</p>
            <div class="text-grey">
                <div class="pull-left">ทำสัญญา</div>
                <div class="pull-right"> B500,000</div>
            </div> <br>
            <div class="text-grey padding-top1">
              <div class="pull-left">โอน</div>
              <div class="pull-right"> 12,000,000</div><br>
            </div>
            
          </div>
          <div class="col-xs-4 border-left text-center">
            <ul class="list-inline">
                  <li class="text-primary">ประมาณยอดผ่อน</li>
                  <li><a href="#"><img src="/img/cal-icon.png"></a></li>
            </ul>
            <p class="text-grey">~B78,000/ด.*</p>
            <p class="text-grey">ดอกเบี้ย _% __ปี</p>
          </div>
          <div class="col-md-12">
              <div class="pull-right"><span id="down2" style="width:10px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span></div> 
          </div>

          <div class="clearfix"></div>
          

          <! Hide Div ----------> 
          <div class="target2 display-none row bg-grey2">
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
               <div class="col-md-12">
                  <div class="pull-right"><span id="up2" style="width:35px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
                  </div>
               </div>
            </div>
            <!--End Hide-->

            <div class="clearfix"></div>
            <div class="text-center text-primary">
              <strong>สรุปโครงการ </strong>
            </div>
            <br>
            <table class="table">
                <tr class="text-grey">
                  <td><span class="pull-left">สร้างเสร็จ </span><span class="pull-right">2540  รวม 19 ปี</span></td>
                  <td class="border-left"><span class="pull-left">ที่จอดรถ</span><span class="pull-right">43คัน 54%</span></td>
                  <td class="border-left"><span class="pull-left">ค่าส่วนกลาง</span><span class="pull-right">B5,000/ด.</span></td>
            </table>
            <div class="col-md-12">
                  <div class="pull-right"><span id="down3" style="width:5px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span>
            </div>
            </div>
            <div class="clearfix"></div>
            
            <!-Hide Div-->
            <div class="target3 display-none row bg-grey2">
               <h5 class="text-primary text-center">สิ่งอำนวยความสะดวกโดยรอบ</h5>
               <div class="col-xs-4 text-center">
               <ul class="list-inline">
                  <li><img src="/img/sc-icon.png"></li><li class="text-primary">โรงเรียน</li>
               </ul>
               <p class="text-grey"><span class="pull-left">มาร์แตร์เดอีร์</span><span class="pull-right">0.5 กม.</span></p>
            </div>
            <div class="col-xs-4 border-left text-center">
              <ul class="list-inline">
                  <li><img src="/img/store-icon.png"></li><li class="text-primary">ซุปเปอร์มาร์เก็ต</span></li>
              </ul>
              <p class="text-grey"><span class="pull-left">พารากอน</span><span class="pull-right"> 2.5 กม.</span></p> 
            </div>
            <div class="col-xs-4 border-left border-left text-center">
            <ul class="list-inline">
                  <li><img src="/img/hospital-icon.png"></li><li class="text-primary">โรงพยาบาล</li>
            </ul>
            <p class="text-grey"><span class="pull-left">โรงพยาบาลบำรุงราษฎร</span><span class="pull-right"> 0.9กม.</span>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12">
              <div class="pull-right"><span id="up3" style="width:35px;" class="glyphicon glyphicon-menu-down btn-sm text-grey" aria-hidden="true"></span></div> 
            </div>
          </div>
          <div class="clearfix"></div><br>
          <! End Hide Div ----------> 

        </div>
        

          
      

        <div class="col-md-4">
          <br/>
          <div class="row border-grey2">
             <div class="col-md-12">
               <ul class="list-inline pull-right">
                    <li class="text-primary">30</li>
                    <li><a href="#"><img src="/img/sun-icon2.png"></a></li>
                    <li class="text-primary">5</li>
                    <li class="text-primary"><a href="#"><span class="glyphicon glyphicon-earphone text-primary fix-glyphicon"></a></li>
               </ul>
               <div class="clearfix"></div>            </div>
            <div class="col-md-12 bg-grey min-h-150">
                <ul class="list-inline padding-top1">
                      <li class="pull-left"><h5 class="text-white">B12,500,000</h5></li>
                      <li class="text-white pull-right">นายหน้า</li><br/>
                      <li class="text-white pull-right">+B245,000</li>
                      <div class="clearfix"></div>
                </ul>
                <hr class="text-white">
                <div class="col-xs-2 text-white">นอน <br> 3.5
                </div>
                <div class="col-xs-4 text-white border-left ">
                  <ul class="list-inline">
                    <li class="pull-left">น้ำ</li>
                    <li class="pull-right">ตร.ม.</li><br>
                    <li class="pull-left">2.5</li>
                    <li class="pull-right">100</li>
                </div>
                <div class="col-xs-4 text-white border-left">
                  <ul class="list-inline">
                    <li class="pull-left">ตร.ว.</li>
                    <li class="pull-right">ทิศ</li><br>
                    <li class="pull-left">245</li>
                    <li class="pull-right">E/N</li>
                </div>
                <div class="col-xs-2 text-white border-left">
                  ชั้น</br>3<br>
                </div>

            </div>
            <div class="clearfix"></div>
            <br>

            <div class="col-md-1"></div>
            <div class="col-md-10 bg-blue text-white text-center padding-top2">
              <p>โทรหาเจ้าของ</p>
              <span class="glyphicon glyphicon-earphone text-white"></span> <a class="text-white" href="#">099-XXX-XXXX</a>
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


        <div class="row padding-top1">
          <img class="img-responsive" src="/img/map03.png">
        </div>
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


     <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script type="text/javascript">
       $('.selectpicker').selectpicker();
     </script>
     <script type="text/javascript" language="javascript">

         $(document).ready(function() {

            $("#down").click(function(){
               $(".target").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
            });

            $("#down2").click(function(){
               $(".target2").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
            });

            $("#down3").click(function(){
               $(".target3").slideDown( 'slow', function(){ 
                  $(".log").text('');
               });
            });


            $("#up").click(function(){
               $(".target").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
            });

            $("#up2").click(function(){
               $(".target2").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
            });

            $("#up3").click(function(){
               $(".target3").slideUp( 'slow', function(){ 
                  $(".log").text('');
               });
            });


         });
      </script>    
    
</body>
</html>