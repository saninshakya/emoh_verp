<?php
$attributes = array('id' => 'myform');
echo form_open('/zhome/unitDetail', $attributes);
$Advertising_check1="";
$Advertising_check2="";
$Advertising_check3="";
$Advertising_check4="";
$Advertising_check5="";
$Advertising_select1="";
$Advertising_select2="";
$Advertising_select3="";
$Advertising_select4="";
$Advertising_select5="";
$unit_baht="ล้านบาท";
$Advertising_array=explode(",",$TOAdvertising);
for($i=0;$i<count($Advertising_array);$i++){
	if($Advertising_array[$i]==1){$Advertising_select1="selected";$Advertising_check1="checked";}
	if($Advertising_array[$i]==2){$Advertising_select2="selected";$Advertising_check2="checked";}
	if($Advertising_array[$i]==5){$Advertising_select3="selected";$Advertising_check3="checked";$unit_baht="บาท";}
	if($Advertising_array[$i]==6){$Advertising_select4="selected";$Advertising_check4="checked";}
	if($Advertising_array[$i]==7){$Advertising_select5="selected";$Advertising_check5="checked";$unit_baht="บาท";}
}
$Bedroom_array=explode(",",$Bedroom);
for($i=0;$i<count($Bedroom_array);$i++){
	if($Bedroom_array[$i]==99){$Bedroom_select99="selected";}
	if($Bedroom_array[$i]==1){$Bedroom_select1="selected";}
	if($Bedroom_array[$i]==2){$Bedroom_select2="selected";}
	if($Bedroom_array[$i]==3){$Bedroom_select3="selected";}
	if($Bedroom_array[$i]==4){$Bedroom_select4="selected";}
}
$Bathroom_array=explode(",",$Bathroom);
for($i=0;$i<count($Bathroom_array);$i++){
	if($Bathroom_array[$i]==1){$Bathroom_select1="selected";}
	if($Bathroom_array[$i]==2){$Bathroom_select2="selected";}
	if($Bathroom_array[$i]==3){$Bathroom_select3="selected";}
	if($Bathroom_array[$i]==4){$Bathroom_select4="selected";}
	if($Bathroom_array[$i]==5){$Bathroom_select5="selected";}
}
if($minPrice==0){$minPrice="";}
if($maxPrice==0){$maxPrice="";}
$nowyear=date('Y')+543;
//$distance_length=3000;
$MaxYearProject=$this->search->getMaxYearProject();
?>
<div class="margin-t50 padding-0 height-0"></div>
<input type="hidden" id="url_link" value="<?=uri_string();?>">
<input type="hidden" id="mobile_detect" value="0">
<input type="hidden" id="namePoint" name="namePoint" value="<?=$namePoint;?>">
<input type="hidden" id="toAd" name="toAd" value="<?=$TOAdvertising;?>">
<input type="hidden" id="nowyear" name="nowyear" value="<?=$nowyear;?>">
<input type="hidden" id="market_info_check" name="market_info_check" value="0">
<input type="hidden" id="iDistance_ref" value="<?=$distance_length;?>">
<input type="hidden" id="iRefPlace_ref" value="<?=$RefPlace;?>">
<input type="hidden" id="sTypeSale_ref" value="<?=$TOAdvertising;?>">
<input type="hidden" id="sPropType_ref" value="<?=$TOProperty;?>">
<input type="hidden" id="sNBdroom_ref" value="<?=$Bedroom;?>">
<input type="hidden" id="sNBtroom_ref" value="<?=$Bathroom;?>">
<input type="hidden" id="sTransDist_ref" value="<?=$TransDist;?>">
<input type="hidden" id="sPYear_ref" value="<?=$PYear;?>">
<input type="hidden" id="minPrice_ref" value="<?=$minPrice;?>">
<input type="hidden" id="maxPrice_ref" value="<?=$maxPrice;?>">
<input type="hidden" id="price_ref" value="1">
<input type="hidden" id="sOrder_ref" value="<?=$order;?>">
<input type="hidden" id="nOptSearch_ref" value="">
<input type="hidden" id="nListing_ref" value="2">
<hr class="border-top-grey padding-tb0">
<div class="n-container padding-none">
	<div class="row padding-none hidebar2">  
		<!--menu mobile Add Nov12-->
		<div class="padding-bottom5 container-fluid visible-sm visible-xs menu-mobilez">
            <div class="hidebar">
				<!--<div class="pull-left xs-w10  text-center hidden-xs">
                    <select id="iDistance_mb" name="iDistance_mb" class="borderless3 text-center pull-left padding-none hidden-xs">
						<option value="500">0.5 km</option>
						<option value="1000">1.0 km</option>
						<option value="1500">1.5 km</option>
						<option value="3000" selected="selected">3.0 km</option>
						<option value="5000">5.0 km</option>
						<option value="10000">10.0 km</option>
						<option value="20000">20.0 km</option>
						<option value="30000">30.0 km</option>
						<option value="50000">50.0 km</option>
					</select>
				</div>-->
				<div class="pull-left w5 padding-t3 text-center hidden-xs">จาก</div>
				<div class="pull-left xs-w25 border-right text-center">
                    <input type="text" value="" id="iRefPlace_mb" name="iRefPlace_mb"  placeholder=" รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control input-place" style="font-size:16px;">
				</div> 

				<div class="pull-left xs-w15 text-center padding-l5">
					<button id="showfilter" type="button" class="btn btn-sm2x btn-white-s"> <a id="showfilter" href="#" class="text-orange2">ตัวกรอง</a></button>
				</div>
				<div class="pull-left xs-w15 text-center visible-xs">
					<button id="show_idetail" type="button" class="btn btn-sm2x btn-white-s"> <a href="#" class="text-orange2">ข้อมูลหมุด</a></button>
				</div>
			</div>


              <!--Not Working Dec25-->
               <div class="pull-left w20 text-center padding-l5">
		        <div id="float_menu2" class="hidden-xs border-grey2">
					<span id="nprice_mb" class="td-grey text-center hidden-xs"><?=$unit_baht;?></span><span id="npricem_mb" class="text-center hidden-xs">บาท/ม2.</span>
				</div>
			   </div>
			   <div class="pull-left w25 text-center padding-l5">

				<div id="float_menu3" class="text-center hidden-xs">
					<select id="nOptSearch_mb" class="form-control input-md no-border selectpicker text-center td-grey hidden-xs" data-style="btn-noborder" data-width="100%">
						<option value="0" disabled="disabled" class="text-center text-blue pull-left">ข้อมูลโครงการ</option>
						<option value="1" selected="selected" class="pull-left">จำนวนประกาศ</option>
						<option value="2" class="pull-left">ปีสร้างเสร็จ</option>
						<?php if($checkAdmin==1){?>
							<option value="3" class="pull-left">จำนวนยูนิต</option>
						<?}?>
						<option value="4" class="pull-left">ค่าส่วนกลาง</option>
						<option value="7" class="pull-left">ราคาต่ำสุด-สูงสุด</option>
						<option value="8" class="pull-left">รถไฟฟ้าใกล้สุด(กม.)</option>
					</select> 
				</div>
			  </div>
			 <!--End Not Working Dec25-->
       
            </div>
           
            
			<!--Added on Nov17-->
            <div class="idetail display-none">
				<div class="row display-none">
					<div class="col-md-12">
						<div class="col-xs-6"><a id="hide_idetail" href="#" class="text-orange2">ตกลง</a></div>
						<div class="col-xs-6"><a id="hide_idetail2" href="#" class="text-orange2 pull-right">ยกเลิก</a></div>
					</div>
				</div>
				<div class="col-md-12 bg-grey3 padding-t5 padding-b5  text-center" style="margin-bottom:12px;"><h4 class="text-grey">แสดงราคาเป็น</h4></div>

			
				
				<ul class="col-md-12 list-inline">
					<li class="hilight-on col-xs-6 text-white text-center" id="mprice" onclick="updateContentMarker_mb('');"><?=$unit_baht;?></li>
					<li class="hilight-off col-xs-6 text-center" id="mpricem" onclick="updateContentMarker_mb('');">บาท/ม2.</li>
				</ul>
				<br>
				<hr>
				<div class="row col-md-12 text-center">
				    <div class="bg-grey3 padding-t5 padding-b4"><h4 class="text-grey">เลือกข้อมูลโครงการ</h4></div>
					<hr style="padding:0px;margin:0px;">
					<div class="col-md-12">
					<ul class="nav navbar-nav">
                       <li style="border-bottom:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('1');">จำนวนยูนิตที่ลงประกาศ</a></li>
                                     
                       <li style="border-bottom:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('2');">ปีที่สร้างเสร็จ</a></li>
					  
					<?php if($checkAdmin==1){?>
					   <li style="border-bottom:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('3');">จำนวนยูนิตทั้งหมด</a></li>
					  
						
					<?}?>

					    <li style="border-bottom:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('4');">ค่าส่วนกลาง</a></li>
					  
					    <li style="border-bottom:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('7');">ช่วงราคาต่ำสุด-สูงสุด</a></li>
					  
					    <li style="border-bottom:1px solid #eeeeee; "><a class="idetail_link" href="#" onclick="updateContentMarker_mb('8');">ระยะทางจากรถไฟฟ้าใกล้สุด</a></li>
					  
                    </ul>
                    </div>

					<!--<div><a href="#" onclick="updateContentMarker_mb('1');">จำนวนยูนิตที่ลงประกาศ</a></div>
					<hr>
					<div><a href="#" onclick="updateContentMarker_mb('2');">ปีที่สร้างเสร็จ</a></div>
					<hr>
					<?php if($checkAdmin==1){?>
						<div><a href="#" onclick="updateContentMarker_mb('3');">จำนวนยูนิตทั้งหมด</a></div>
						<hr>
					<?}?>
					<div><a href="#" onclick="updateContentMarker_mb('4');">ค่าส่วนกลาง</a></div>
					<hr>
					<div><a href="#" onclick="updateContentMarker_mb('7');">ช่วงราคาต่ำสุด-สูงสุด</a></div>
					<hr>
					<div><a href="#" onclick="updateContentMarker_mb('8');">ระยะทางจากรถไฟฟ้า(ใกล้สุด)</a></div>
					<hr>-->
				</div>
            </div>
            <!--End added on Nov17-->

            <!--filter box mobile-->
			
			
		</div>
          <!--end menu mobile Add Nov12-->
	    
		<div id ="search-page" class="padding-bottom5 container-fluid hidden-sm hidden-xs bg-white fixed margin-t50" style="z-index:100000;">
			<div class="col-md-3 padding-t7">
				<div class="pull-left w20 text-left padding-none">
					<select id="iDistance" name="iDistance" class="borderless3 text-left pull-left padding-none">
						<option value="500">0.5 km</option>
						<option value="1000">1.0 km</option>
						<option value="1500">1.5 km</option>
						<option value="3000" selected="selected">3.0 km</option>
						<option value="5000">5.0 km</option>
						<option value="10000">10.0 km</option>
						<option value="20000">20.0 km</option>
						<!--<option value="30000">30.0 km</option>
						<option value="50000">50.0 km</option>-->
					</select>
				</div>
				<div class="pull-left w20 padding-t3 text-center">จาก</div>
				<div class="pull-left w60 border-right text-center">
					<input type="text" value="" id="iRefPlace" name="iRefPlace"  placeholder=" เขต, รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control z-index-100000">
				</div>
            </div>

            <hr class="visible-xs blank">
           
            <div class="col-md-6 hidden-sm hidden-xs padding-t7">
				<div class="pull-left w20 border-right text-center padding-none">
					<select id="sTypeSale" name="sTypeSale" multiple="multiple" class="borderless3 text-left pull-left">
						<option value="1" data-content="<span class='glyphicon glyphicon-stop' style='color:#FF0000'></span>" <?=$Advertising_select1;?>>ขาย</option>
						<option value="2" data-content="<span class='glyphicon glyphicon-stop' style='color:#4682B4'></span>" <?=$Advertising_select2;?>>ขายดาวน์</option>
						<option value="5" data-content="<span class='glyphicon glyphicon-stop' style='color:#008040'></span>" <?=$Advertising_select3;?>>เช่า</option>
						<option value="6" data-content="<span class='glyphicon glyphicon-stop' style='color:#008040'></span>" <?=$Advertising_select4;?>>ขายแล้ว</option>
						<option value="7" data-content="<span class='glyphicon glyphicon-stop' style='color:#008040'></span>" <?=$Advertising_select5;?>>เช่าแล้ว</option>
					</select>
				</div>
				<div class="pull-left w20 border-right text-center padding-none">
					<!--Add Nov18-->
					<select id="sPropType" name="sPropType" multiple="multiple" class="borderless3 text-left pull-left padding-none">
						<option value="1" selected>คอนโด</option>
					</select>

				</div>
				<div class="pull-left w20 border-right text-center">
					<!--Add Nov18-->
					<select id="sNBdroom" name="sNBdroom" multiple="multiple" class="borderless3 text-left pull-left padding-none">
						<option value="99" <?=$Bedroom_select99;?>>สตูดิโอ</option>
						<option value="1" <?=$Bedroom_select1;?>>1 นอน</option>
						<option value="2" <?=$Bedroom_select2;?>>2 นอน</option>
						<option value="3" <?=$Bedroom_select3;?>>3 นอน</option>
						<option value="4" <?=$Bedroom_select4;?>>>3 นอน</option>
					</select>
				</div>
				<div class="pull-left w20 border-right text-center display-none">
				<!--Add Nov19-->
					<select id="sNBtroom" name="sNBtroom" multiple="multiple" class="borderless3 text-left pull-left padding-none">
						<option value="1" <?=$Bathroom_select1;?>>1 น้ำ</option>
						<option value="2" <?=$Bathroom_select2;?>>2 น้ำ</option>
						<option value="3" <?=$Bathroom_select3;?>>3 น้ำ</option>
						<option value="4" <?=$Bathroom_select4;?>>4 น้ำ</option>
						<option value="5" <?=$Bathroom_select5;?>>>4 น้ำ</option>
					</select>
				</div>
				<!--End Add Nov19-->  
				<div class="pull-left w20 border-right text-center">
					<select id="sTransDist" name="sTransDist" class="borderless3 text-left pull-left padding-none">
						<option value="" <?if($TransDist=='' || $TransDist==0){echo "selected";}?>>ระยะห่างรถไฟฟ้า</option>
						<option value="500" <?if($TransDist==500){echo "selected";}?>>0.5 km</option>
						<option value="1000" <?if($TransDist==1000){echo "selected";}?>>1.0 km</option>
						<option value="1500" <?if($TransDist==1500){echo "selected";}?>>1.5 km</option>
						<option value="3000" <?if($TransDist==3000){echo "selected";}?>>3.0 km</option>
					</select>
				</div>
				<div class="pull-left w20 border-right text-center">
					<select id="sPYear" name="sPYear" class="borderless3 text-left pull-left padding-none">
						<option value="" <?if($PYear=='' || $PYear==0){echo "selected";}?>>อายุตึก</option>
						<option value="1" <?if($PYear==1){echo "selected";}?>>อายุตึก <1ปี</option>
						<option value="3" <?if($PYear==3){echo "selected";}?>>อายุตึก <3ปี</option>
						<option value="5" <?if($PYear==5){echo "selected";}?>>อายุตึก <5ปี</option>
						<option value="10" <?if($PYear==10){echo "selected";}?>>อายุตึก <10ปี</option>
						<option value="-10" <?if($PYear==-10){echo "selected";}?>>อายุตึก >10ปี</option>
					</select>
				</div>
            </div>
        
            <hr class="visible-xs blank">

            <div class="col-md-3 hidden-sm hidden-xs padding-t7">
				<div class="pull-left w40 text-center">
					<input type="text" value="" id="minPrice" name="minPrice" placeholder=" ราคาต่ำสุด" class="form-control">  
				</div>
                <div class="pull-left w10 text-right padding-t3 text-center">
					-
				</div>
				<div class="pull-left w40 text-center padding-r20">
					<input type="text" value="" id="maxPrice" name="maxPrice" placeholder=" ราคาสูงสุด" class="form-control">
				</div>
               
				
				<div class="pull-left w10  text-center">                   
					<button id="down" type="button" class="btn btn-sm2 bg-white" disabled>อื่นๆ</button>
					<!--new menu nov17-->
					<div class="row display-none">
						<div class="col-lg-12">
							<div class="button-group">
								<button type="button" class="btn btn-default dropdown-toggle borderless3  text-grey padding-t5" data-toggle="dropdown"><strong>อื่นๆ</strong> <span class="caret"></span></button>
								<ul class="dropdown-menu list-inline">
									<li> 
									  ห้องน้ำ<br>
										<input type="checkbox"/> 1
									<li>
										<input type="checkbox"/> 2
									</li>
									<li>
										<input type="checkbox"/> 3
									</li>
									<li>
										<input type="checkbox"/> 4
									</li>
									<li>
										ขนาด (ม2.)<br>
										<div class="row">
											<div class="col-xs-5 padding-right-clear"><input type="text"  value="" id="xminPrice" name="xminPrice" placeholder="ต่ำสุด" class="form-control input-sm"></div> 
											<div class="col-xs-1 padding-none">&nbsp;&nbsp;-</div>
											<div class="col-xs-5 margin-left1 padding-left-clear"><input type="text" value="" id="xmaxPrice" name="xmaxPrice" placeholder="สูงสุด" class="form-control input-sm"></div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
                   <!--end new menu nov 17-->
				</div>
            </div>

        </div> 

      <!--end row-->


      
     
     
      <!--slider menu ---------------->
      <div class="target display-none hidden-sm hidden-xs">
           <div class="row">
                 <br>
                  <h3 class="text-orange text-center">  ฟังก์ชั่นนี้อยู่ในระหว่างการพัฒนา</h3>
                  <br>
                  
                  <br>
                <div class="col-md-2 col-xs-6"></div>
                <div class="col-md-3 col-xs-6"></div>
                <div class="col-md-3 col-xs-6"></div>
                <div class="col-md-3 col-xs-6">
                  <button id="up" type="button" class="bg-white btn-sm3">ยกเลิก</button> &nbsp;
                  <button id="up2" type="button" class="bg-green btn-sm6">บันทึก</button>
                </div>
                <div class="col-md-1"></div>
           </div>
           <div class="clearfix"></div>
           <br/>
           <!--end-row-->
           <div class="row col-md-12 hidden-sm hidden-xs">
               <div class="col-md-2 col-xs-6">
                  คุณสมบัติ
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ชั้น</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                                <option>+6</option>
                                <option>+7</option>
                                <option>+8</option>
                                <option>+9</option>
                                <option>+10</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ห้องน้ำ&nbsp;&nbsp;</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ขนาด (ม2.)</li>
                      <li><input type="text" size="8" value="" size="100">
                      </li>
                  </ul>
               </div>
               <div class="col-md-1"></div>
           </div>
          <!--end-row-->
           <div class="row col-md-12">
               <div class="col-md-2">

               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ทิศ</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>ตะวันออก</option>
                                <option>ตะวันออกเฉียงเหนือ</option>
                                <option>ตะวันออกเฉียงใต้</option>
                                <option>เหนือ</option>
                                <option>ใต้</option>
                                <option>ตะวันตกเฉียงเหนือ</option>
                                <option>ตะวันตกเฉียงใต้</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-3 col-xs-6">
                  <ul class="list-inline">
                      <li>ที่จอดรถ</li>
                      <li>
                        <select class="form-control input-sm no-border selectpicker" data-style="btn-noborder" data-width="100">
                                <option>+0</option>
                                <option>+1</option>
                                <option>+2</option>
                                <option>+3</option>
                                <option>+4</option>
                                <option>+5</option>
                        </select>
                      </li>
                  </ul>
               </div>
               <div class="col-md-1"></div>
           </div>
           <hr>

           
          <!--end-row-->
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">วิว</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">วิวแม่น้ำ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">วิวสวนสาธารณะ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">วิวสวนสาธารณะ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>   
               </div>
          </div>
          <!--end-row-->

          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">พื้นที่ใช้สอย</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ห้องมุม</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ฝ้าสูง 2 ชั้น</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ระเบียงใหญ่กว่า 8 ม2.</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>   
               </div>
          </div>
          <!--end-row-->
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">การตกแต่ง</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">เฟอร์นิเจอร์ครบ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">บิลท์อิน</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ห้องเปล่า</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>   
               </div>
          </div>
          <!--end-row-->
          <hr/>
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">โครงการ</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">เลี้ยงสัตว์ได้</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ความหนาแน่นต่ำ</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ที่จอดรถเกิน 70%</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>

               </div>
          </div>
          <!--end-row-->
          <div class="row col-md-12">
               <div class="col-md-2">
                  <div class="margin-top1">ลักษณะประกาศ</div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ประกาศใหม่</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ลดราคา</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" value=""><p class="text-grey">ขายด่วน</p>
                          </label>
                  </div>
               </div>
               <div class="col-md-1">
                 <a href="#">
                    <span class="glyphicon glyphicon-chevron-down margin-top1 btn-sm text-grey" aria-hidden="true"></span>
                 </a>               
               </div>
          </div>
          <!--end-row-->
          <hr/>  
		<div class="clearfix"></div>
      </div>
      <!--End slider menu -->
   

   <!--show on mobile for new search dec22-->
    <div class="margin-t30 hidden-sm hidden-xs"></div>
    <div><!--remove class row-->
    <!-- start map -->
    <!-- <div class="col-md-8 padding-none" style="position: fixed;min-height:100%; height:100%;">-->
    <div class="w70x col-md-8-search">
          	<?php //echo $map['html']; ?>
	<div id="wrapper_map">
		<div id="map_canvas" class="map_resize_small border-grey2" style="height:auto; z-index:100px;"></div>

        <!--Select menu-->
        <div id="float_menu4" class="hidden-xs hidden-sm blue-tooltip" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['unit_tooltip'][0];?>">
			<span id="nprice" class="td-grey text-center"><?=$unit_baht;?></span><span id="npricem" class="text-center">บาท/ม2.</span>
		</div>

		<div id="float_menu5" class="text-center hidden-xs hidden-sm">
			<select id="nOptSearch" class="form-control input-md no-border text-center td-grey blue-tooltip" data-style="btn-noborder" data-width="100%" data-toggle="tooltip" data-placement="right" title="<?=$qLabel['optsearch_tooltip'][0];?>">
				<option value="0" disabled="disabled" class="text-center text-blue pull-left"><h3>ข้อมูลโครงการ</h3></option>
				<option value="1" selected="selected" class="pull-left"><h4>จำนวนประกาศ</h4></option>
				<option value="2" class="pull-left">ปีสร้างเสร็จ</option>
				<?php if($checkAdmin==1){?>
					<option value="3" class="pull-left">จำนวนยูนิต</option>
				<?}?>
				<option value="4" class="pull-left">ค่าส่วนกลาง</option>
				<option value="7" class="pull-left">ราคาต่ำสุด-สูงสุด</option>
				<option value="8" class="pull-left">รถไฟฟ้าใกล้สุด(กม.)</option>
			</select> 
		</div>
        <!--End Select menu-->

		<div id="float_bt" class="display-none" >
		       
				<div id="xmarket_cont" class="text-grey text-center display-none" style="vertical-align:middle;text-align:center;">
					<div class="container market-center" style="vertical-align:middle;text-align:center;">
						&nbsp;<span class="text-primary big-menumap" id="xmk_unit"><!--Area Unit--></span>
						&nbsp;ประกาศ&nbsp;&nbsp;เฉลี่ย <span class="text-primary big-menumap" id="xmk_square"><!--Square Price--></span>
						&nbsp;บาท/ตร.ม. &nbsp;
	                    <span id="xmarket-info-show" class="glyphicon glyphicon-signal text-white padding-none cursor display-none" width="5px" aria-hidden="true"></span>
	                    <span id="xmarket-info-close" class="display-none glyphicon glyphicon glyphicon-remove text-white padding-none cursor display-none"  width="5px" aria-hidden="true"></span>
					</div>
				</div>
		</div><!--end float_menu-->

	
	</div><!--endwrapper_map-->
	    

      
	    <!--<div style="position:absolute;bottom:23%;left:95%;z-index:1000000;">-->
	  
        <div class="pull-right w3 hidden-xs">
			        
			 <button type="button" class="btn-close text-grey2" onclick="showMarket();">
			   <span id="bt_resize2" class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
			 </button>
	    </div>
        
		<div id="market_div" style="min-height:29%; height:29%; height:auto!important;" class="hidden-xs w97">
          
			<div id="market-detail" class="market-info">
	          
	          <div class="col-md-12 text-center padding-none padding-top10 padding-bottom5">
	            <h3 class="market-detail1 text-orange padding-none">สรุปตลาดคอนโด <span id="mk_distance"><?=number_format($distance_length/1000,0);?></span> กม. รอบ <span id="mk_point"><?=$namePoint;?></span>
		            
		        </h3>
	          </div>
	          <br>
			  <div>
	            <div class="col-md-4 col-sm-4 text-center padding-bottom5">
	              
	                <div><h3 class="market-detail2 text-turq3 padding-none padding-bottom5">อุปทาน&nbsp;<span id="mk_info_unit_now"><!--Unit Now--></span> ยูนิต</h3></div>
	                
	                <div class="font18">ปี <span id="mk_info_nowyear"><?=$MaxYearProject;?></span><span class="text-red"> <span id="mk_info_unit_future"><!--Unit Future--></span><span class="text-grey"> ยูนิต </span><span class="text-red">+<span id="mk_info_unit_percent"></span>%</span></div>
	              
	            </div>

	            <div class="col-md-4 col-sm-4 border-l-r-grey text-center padding-bottom5">
	             
	                <div><h3 class="market-detail2 text-turq3 padding-none padding-bottom5"><span id="mk_info_unit_active"><!--Unit Active--></span> ประกาศ</h3></div>
	          
	                <div class="font18">
	                    <span class="text-grey">ขาย <span id="mk_info_unit_active_sale"><!--Unit Active Sale--></span></span>&nbsp; 
	                    <span class="text-grey">เช่า <span id="mk_info_unit_active_rent"><!--Unit Active Rent--></span></span>&nbsp; 
	                    <span class="text-grey">ขายดาวน์ <span id="mk_info_unit_active_down"><!--Unit Active Down--></span></span>
	                </div>
	              
	            </div>

	            <div class="col-md-4 col-sm-4 text-center padding-bottom5" style="background-color:#ffffff;">
	             
	                    <div><h3 class="market-detail2 text-turq3 padding-none padding-bottom5">ผลตอบแทน N/A</h3></div>
		                <div class="font18">
		                   <span class="text-grey">ราคาเฉลี่ย<span id="mk_info_unit_sale_m2"> N/A </span></span> &nbsp; &nbsp; 
		                   <span class="text-grey">ค่าเช่าเฉลี่ย<span id="mk_info_unit_rent_m2"> N/A </span></span>
		                </div>
	              
	            </div>

          </div>  
          <!--end hide market detail-->
		  <div class="clearfix"></div>
          
          </div>
	

		</div>			
    </div>

    <div class="clearfix"></div>

    <div class="w30x col-md-4-result padding-none clear-padding-lr padding-t10x">

		<!--filter box for mobile-->
		<div class="text-left visible-sm" style="background-color:orange; padding-left:5px; padding-right:15px;padding-bottom:8px;height:40px;">
			<div id="market_cont_mb" class="pull-left text-white" style="width:30%; padding-top:2px; padding-left:10px;">
				<span class="text-white big-menumap" id="mk_unit_mb"><!--Area Unit--></span>
				<span class="text-white small15">ยูนิต&nbsp;&nbsp;</span>
			</div>

			<div class="pull-right display-none" style="margin-left:3px;">
				<button type="button" id="picture_listing_mb" class="btn btn-list2" aria-label="Left Align">
					<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-large text-white" aria-hidden="true"></span></a>
				</button>
				<button type="button" id="data_listing_mb" class="btn btn-list" aria-label="Left Align">
					<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-list text-white" aria-hidden="true"></span></a>
				</button>
			</div>
			<div class="padding-none pull-right" style="width:129px; padding-top:3px; padding-bottom:3px;">
				<select id="sOrder_mb" class="form-control no-border selectpicker padding-none input-sm; z-index:3000000000;" data-style="btn-noborder" data-width="129px" data-height="50px">
					<option class="pull-left" value="1">ราคา ต่ำ-สูง</option>
					<option class="pull-left" value="2">ราคา/ตร.ม. ต่ำ-สูง</option>
					<option class="pull-left" value="3">ราคา/ตร.ม. สูง-ต่ำ</option>
					<option class="pull-left" value="4">ปีสร้างเสร็จ ใหม่-เก่า</option>
					<option class="pull-left" value="5">ระยะจากจุดที่ค้นหา</option>
					<option class="pull-left" value="6">ระยะจากรถไฟฟ้า</option>
				</select>
			</div>
		</div>

		<!--end filter box-->
		
		<!--wrapper-->
        <div class="hidden-sm hidden-xs" style="position: fixed; left: 70%;top: 85; border-top:11px solid #ffffff; z-index: 100;width: 30%;">
			<!--banner-->
			<div id="cImgBanner" class="heightratio bg-grey3 text-center hidden-sm hidden-xs" style="width: 100%;">
			   Banner
			</div>
			<!--end banner-->
			<!--orange box-->
			<div class="text-left padding-none filter-hide-mobile visible-lg visible-md hidden-sm" style="width:100%;background-color:orange; padding-left:8px; height: 40px;">
				<div id="market_cont" class="pull-left text-white market_cont_box">
					<span class="text-white big-menumap" id="mk_unit"><!--Area Unit--></span>
					<span class="text-white small13">ยูนิต&nbsp;&nbsp;</span><span class="text-white small13 hidden-sm">เฉลี่ย </span><span class="text-white big-menumap hidden-sm">฿</span><span class="text-white big-menumap hidden-sm" id="mk_square"><!--Square Price--></span><span class="text-white small13 hidden-sm">&nbsp;/ม&sup2</span>
				</div>
				<div style="margin-top:0px; padding-right:6px;">
					<!--b-list-->
					<div id="show_listing" class="pull-right blue-tooltip" style="margin-left:0px;" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['list_tooltip'][0];?>">
						<button type="button" id="picture_listing" class="btn btn-list2" aria-label="Left Align">
							<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-large text-white" aria-hidden="true"></span></a>
						</button>
						<button type="button" id="data_listing" class="btn btn-list" aria-label="Left Align">
							<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-list text-white" aria-hidden="true"></span></a>
						</button>
					</div>
					<!--end-b-list-->
					<select id="sOrder" class="form-control  input-sm no-border clear-none pull-right padding-none hidden-md small2"  style="width:auto; margin-top: 5px; position: fixed; right: 58px " data-style="btn-noborder" data-width="auto">
						<option class="small2" value="1">ราคา ต่ำ-สูง</option>
						<option class="small2" value="2">ราคา/ตร.ม. ต่ำ-สูง</option>
						<option class="small2" value="3">ราคา/ตร.ม. สูง-ต่ำ</option>
						<option class="small2" value="4">ปีสร้างเสร็จ ใหม่-เก่า</option>
						<option class="small2" value="5">ระยะจากจุดที่ค้นหา</option>
						<option class="small2" value="6">ระยะจากรถไฟฟ้า</option>
					</select>
				</div>
			</div>
			<!--endbox-->
		</div>
		<!--endwrapper-->
			
		<input name="POID" id="POID" type="hidden" value="" >
		<!--<span id="mobile_resize" class="glyphicon glyphicon glyphicon-remove padding-none cursor pull-right text-grey2 w2 display-none" aria-hidden="false"></span>-->

		<div id='cImgUnits' class="padding-none margin-t40xs"></div>
        
		<div id="table_listing" class="padding-none hidden-xs col-md-12" style="padding:0;">
			<div id='cImgUnits2' class="padding-none fixed4 hidden-xs hidden-sm" style="margin-top:43px;background-color:#ffffff;padding:0;"></div>
			<!--show list below header-->
			<div id="cListUnits" class="padding-none hidden-xs units_margin_top padding-top-large" style="z-index:1;height:auto;overflow-y: auto;padding:0;"></div>
		</div>
		<div id="cImgUnitsMobile" class="col-md-12 padding-none margin-t13x" style="background-color:#ffffff;padding:0;"></div>
		<div id="cListUnitsMobile" class="col-md-12 padding-none"></div>
	</div>
</div>




<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <br>
      <h3 class="text-orange text-center">ฟังก์ชั่นนี้อยู่ในระหว่างการพัฒนา</h3>
      <br>
      <br>
    </div>
  </div>
</div>
<!--end show on mobile dec22-->

<!--
<link type="text/css" rel="stylesheet" href="/css/modal_loader.css"/>
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/js/markerwithlabel.min.js"></script>
<script type='text/javascript' src='/js/quicksilver.min.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.min.js'></script>
-->
<!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>-->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.23&key=AIzaSyCtVQu_lH0VTmN4d_f2clThtixIAgakva4&amp;sensor=false"></script>
<?php 
$this->usermenu->inc_file('jquery-1.11.3.min.js','js');
$this->usermenu->inc_file('jquery-ui.min.js','js');
$this->usermenu->inc_file('bootstrap.min.js','js');
$this->usermenu->inc_file('bootstrap-select.min.js','js');
$this->usermenu->inc_file('markerwithlabel.min.js','js');
$this->usermenu->inc_file('quicksilver.min.js','js');
$this->usermenu->inc_file('jquery.quickselect.min.js','js');
$this->usermenu->inc_file('bootstrap-multiselect.js','js');
$this->usermenu->inc_file('jquery.easing.1.3.js','js');
$this->usermenu->inc_file('jquery.mouseSwipe.js','js');

$this->usermenu->inc_file('mouseSwipe.css','css');
$this->usermenu->inc_file('maplabel.min.css','css');
$this->usermenu->inc_file('bootstrap-multiselect.min.css','css');
$this->usermenu->inc_file('modal_loader.css','css');
?>

<script type="text/javascript">
	$('#myModal').modal(options);
</script>
<script type="text/javascript">
$(document).on({
    ajaxStart: function() { $("body").addClass("loading");},
	ajaxStop: function() { $("body").removeClass("loading"); }
});

$(document).ready(function() {
	$(document).bind("dragstart", function() { return false; });
	$("#down").click(function(){
	   $(".col-md-4-result").hide();
	   $(".target").slideDown( 'slow', function(){ 
		  $(".log").text('');
	   });
	});
	$("#showfilter").click(function(){
		$(".filter").slideDown( 'slow', function(){ 
			$(".log").text('');
		});
		$( "#wrapper_map" ).hide();
		$( ".lunderNav" ).hide();
		$( ".navbar" ).hide();
		$( ".hidebar" ).hide();
		$( ".hidebar2" ).hide();
		$( "#cImgUnits" ).hide();
		$( "#cImgUnits2" ).hide();
		$( "#cListUnits" ).hide();
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$( ".filter-hide-mobile" ).hide();
		$( ".margin-t50").hide();
	});
	$("#show_idetail").click(function(){
	   $(".idetail").slideDown( 'fast', function(){ 
		  $(".log").text('');
	   });
	   $( ".lunderNav" ).hide();
	   $( ".navbar" ).hide();
	   $( ".hidebar" ).hide();   
	   $( ".margin-t50" ).hide();
	   $( "#wrapper_map" ).hide();

		
	   
	});


	$("#hidefilter").click(function(){
		$(".filter").slideUp( 'slow', function(){ 
			$(".log").text('');
		});
		$( "#wrapper_map" ).show();
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();
		$( "#cImgUnits" ).show();
		$( "#cImgUnits2" ).show();
		$( "#cListUnits" ).show();
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$('#map_canvas').removeClass('map_resize_smaller');
		$('#map_canvas').addClass('map_resize_small');
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
		var tSale = '';
		var propType = '';
		var nBed = '';
		var nBath = '';
		var nYear = '';
		$('#iDistance_ref').val($('#iDistance_mb').val());
		$('#sTransDist_ref').val($('#sTransDist_mb').val());
		$('.sTypeSale_mb').each(function(){
			if($(this).is(':checked')){
				var sale = $(this).val();
				tSale += sale+',';
			}
		});
		$('.sPropType_mb').each(function(){
			if($(this).is(':checked')){
				var prop = $(this).val();
				propType += prop+',';
			}
		});
		$('.sNBdroom_mb').each(function(){
			if($(this).is(':checked')){
				var bed = $(this).val();
				nBed += bed+',';
			}
		});
		$('.sNBtroom_mb').each(function(){
			if($(this).is(':checked')){
				var bath = $(this).val();
				nBath += bath+',';
			}
		});
		$('.sPYear_mb').each(function(){
			if($(this).is(':checked')){
				nYear = $(this).val();
			}
		});
		$('#sTypeSale_ref').val(tSale);
		$('#sPropType_ref').val(propType);
		$('#sNBdroom_ref').val(nBed);
		$('#sNBtroom_ref').val(nBath);
		$('#sPYear_ref').val(nYear);
		updateSearch();
	});

	$("#hidefilter2").click(function(){
		$(".filter").slideUp( 'slow', function(){ 
			$(".log").text('');
		});
		$( "#wrapper_map" ).show();
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();
		$( "#cImgUnits" ).show();
		$( "#cImgUnits2" ).show();
		$( "#cListUnits" ).show();
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$('#map_canvas').removeClass('map_resize_smaller');
		$('#map_canvas').addClass('map_resize_small');
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
	});

	$("#hide_idetail").click(function(){
	   $(".idetail").slideUp( 'fast', function(){ 
		  $(".log").text('');
	   });
	   $( "#wrapper_map" ).show();
	   $( ".navbar" ).show();
	   $( ".hidebar" ).show();
	   $( ".hidebar2" ).show();
	   $( ".margin-t50" ).show();

	});
	$("#hide_idetail2").click(function(){
	   $(".idetail").slideUp( 'fast', function(){ 
		  $(".log").text('');
	   });
	   $( "#wrapper_map" ).show();
	   $( ".navbar" ).show();
	   $( ".hidebar" ).show();

	});


	$("#up").click(function(){
	   $(".col-md-4-result").show();
	   $(".target").slideUp( 'fast', function(){ 
		  $(".log").text('');
	   });
	});

	 $("#up2").click(function(){
	   $(".col-md-4-result").show();
	   $(".target").slideUp( 'fast', function(){ 
		  $(".log").text('');
	   });
	});

/*$(".hilight-on").click(function(){
  $("#mprice, #mpricem").toggleClass("hilight-on", 1000,"hilight-off");
  $("#mpricem, #mprice").toggleClass("hilight-off", 1000,"hilight-on");
});

$(".hilight-off").click(function(){
  $("#mpricem, #mprice").toggleClass( "hilight-off", 1000,"hilight-on");
  $("#mprice, #mpricem").toggleClass( "hilight-on", 1000,"hilight-off");
});*/

	var options = [];

	$( '.dropdown-menu a' ).on( 'click', function( event ) {

	   var $target = $( event.currentTarget ),
		   val = $target.attr( 'data-value' ),
		   $inp = $target.find( 'input' ),
		   idx;

	   if ( ( idx = options.indexOf( val ) ) > -1 ) {
		  options.splice( idx, 1 );
		  setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
	   } else {
		  options.push( val );
		  setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
	   }

	   $( event.target ).blur();
		  
	   console.log( options );
	   return false;
	});
});

$(function(){
	var defaultSale="";
	var np = $('#namePoint').val();
	var tad = $('#toAd').val();
	tad = parseInt(tad);
	
	if(np){
		$('#iRefPlace').val(np);
		$('#iRefPlace_mb').val(np);
		$('#iRefPlace_ref').val(np);
	}
	$('#table_listing').hide();
	$('#iDistance').val($('#iDistance_ref').val());
	$('#iDistance_mb').val($('#iDistance_ref').val());
	$('#sTypeSale option:selected').each(function(){
		var dsale = $(this).val();
		defaultSale += dsale+',';
	});
	$('#sTypeSale_ref').val(defaultSale);
	$('#minPrice').val($('#minPrice_ref').val());
	$('#minPrice_mb').val($('#minPrice_ref').val());
	$('#maxPrice').val($('#maxPrice_ref').val());
	$('#maxPrice_mb').val($('#maxPrice_ref').val());
	$('#sOrder').val($('#sOrder_ref').val());
	$('#sOrder_mb').val($('#sOrder_ref').val());
	$('.selectpicker').selectpicker();
	//Check Mobile Device
	(function(a,b){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))$('#mobile_detect').val(b)})(navigator.userAgent||navigator.vendor||window.opera,'1');
	
	var s = document.createElement("script");
	s.type = "text/javascript";
	if($('#mobile_detect').val()==1){
		/*if($('#iDistance_ref').val()!=50000){
			$('#iDistance_ref').val(3000);
		}*/
		$('#nListing_ref').val('1');
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		s.src = "/js/markerclusterer_compiled.js";
	}else{
		s.src = "/js/markerclustererplus.min.js";
		$('#nOptSearch').tooltip('show');
		$('#float_menu4').tooltip('show');
		$('#show_listing').tooltip('show');
		$(document).on('shown.bs.tooltip', function (e) {
			setTimeout(function () {
				$(e.target).tooltip('hide');
			}, 30000);
		});
	}
	$("head").append(s);
	//firstSearch();
	updateSearch();
});

$('#iDistance').change(function(){
	$('#iDistance_ref').val($('#iDistance').val());
	setTimeout(updateSearch);
});
$('#iDistance').keypress(function(e) {
	if(e.keyCode==13){
		$('#iDistance_ref').val($('#iDistance').val());
		setTimeout(updateSearch);
	}
});
$('#sTypeSale').change(function(){
	var tSale='';
	$('#sTypeSale option:selected').each(function(){
		var sale = $(this).val();
		tSale += sale+',';
	});
	$('#sTypeSale_ref').val(tSale);
	setTimeout(updateSearch,1500);
});
$('#sPropType').change(function(){
	var propType='';
	$('#sPropType option:selected').each(function(){
		var prop = $(this).val();
		propType += prop+',';
	});
	$('#sPropType_ref').val(propType);
	setTimeout(updateSearch,1500);
});
$('#sNBdroom').change(function(){
	var nBed='';
	$('#sNBdroom option:selected').each(function(){
		var bed = $(this).val();
		nBed += bed+',';
	});
	$('#sNBdroom_ref').val(nBed);
	setTimeout(updateSearch,1500);
});
$('#sNBtroom').change(function(){
	var nBath='';
	$('#sNBtroom option:selected').each(function(){
		var bath = $(this).val();
		nBath += bath+',';
	});
	$('#sNBtroom_ref').val(nBath);
	setTimeout(updateSearch,1500);
});
$('#sTransDist').change(function(){
	nTrans = $('#sTransDist option:selected').val();
	$('#sTransDist_ref').val(nTrans);
	setTimeout(updateSearch);
});
$('#sPYear').change(function(){
	nYear = $('#sPYear option:selected').val();
	$('#sPYear_ref').val(nYear);
	setTimeout(updateSearch);
});
$('#minPrice').change(function(){
	$('#minPrice_ref').val($('#minPrice').val());
	setTimeout(updateSearch);
});
$('#minPrice').keypress(function(e) {
	if(e.keyCode==13){
		$('#minPrice_ref').val($('#minPrice').val());
		setTimeout(updateSearch);
	}
});
$('#maxPrice').change(function(){
	$('#maxPrice_ref').val($('#maxPrice').val());
	setTimeout(updateSearch);
});
$('#maxPrice').keypress(function(e) {
	if(e.keyCode==13){
		$('#maxPrice_ref').val($('#maxPrice').val());
		setTimeout(updateSearch);
	}
});
$('#sOrder').change(function(){
	$('#sOrder_ref').val($('#sOrder').val());
	setTimeout(getImageUnit);
});
$("#nprice").click({param1: "p"}, updatePriceMarker);
$("#npricem").click({param1: "psqm"}, updatePriceMarker);
$("#mprice").click({param1: "p"}, updatePriceMarker);
$("#mpricem").click({param1: "psqm"}, updatePriceMarker);
$('#nOptSearch').change(function(){
	$('#nOptSearch_ref').val($('#nOptSearch').val());
	setTimeout(updateContentMarker);
});
$('#picture_listing').click(function(){
	if($('#nListing_ref').val()!=1){
		$('#nListing_ref').val('1');
		//$('#table_listing').hide();
		//setTimeout(displayImgUnits);
		displayImgUnitsMobile('list_pic',0);
	}
});
$('#data_listing').click(function(){
	if($('#nListing_ref').val()!=2){
		$('#nListing_ref').val('2');
		//$('#table_listing').show();
		//setTimeout(displayImgUnits);
		displayImgUnitsMobile('list_data',0);
		displayImgUnitsMobile2('list_data',0);
	}
});
//For Mobile
$('#minPrice_mb').change(function(){
	$('#minPrice_ref').val($('#minPrice_mb').val());
	//setTimeout(updateSearch);
});
$('#maxPrice_mb').change(function(){
	$('#maxPrice_ref').val($('#maxPrice_mb').val());
	//setTimeout(updateSearch);
});
$('#sOrder_mb').change(function(){
	$('#sOrder_ref').val($('#sOrder_mb').val());
	setTimeout(getImageUnit);
});
$("#nprice_mb").click({param1: "p"}, updatePriceMarker);
$("#npricem_mb").click({param1: "psqm"}, updatePriceMarker);
$('#nOptSearch_mb').change(function(){
	$('#nOptSearch_ref').val($('#nOptSearch_mb').val());
	setTimeout(updateContentMarker);
});
$('#picture_listing_mb').click(function(){
	if($('#nListing_ref').val()!=1){
		$('#nListing_ref').val('1');
		$('#table_listing').hide();
		setTimeout(displayImgUnits);
	}
});
$('#data_listing_mb').click(function(){
	if($('#nListing_ref').val()!=2){
		$('#nListing_ref').val('2');
		$('#table_listing').show();
		setTimeout(displayImgUnits);
	}
});
$('#mobile_resize').click(function(){
	//if($('#mobile_detect').val()==1){
		$('#cImgUnits').addClass('display-none');
		$('#mobile_resize').addClass('display-none');
		$('#map_canvas').removeClass('map_resize_smaller');
		$('#map_canvas').addClass('map_resize_small');
	//}
});

/// array to keep data return for marker ////
var map;
var returnSearch=[];
var markerArray=[];
var markerArrayCl=[];
var globalMarker = [];
var iw=[];
var markerClusterer = null;
var infowindowCluster;
var Py=44;
var zmapIconH = {
	path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
	strokeColor: '#FFFFFF',
	strokeOpacity: 1,
	strokeWeight: 2,
	fillColor: '#de761b',
	fillOpacity: 1,
	scale: 1.9
};

function initMap() {
  	var grayStyles = [
        {
          featureType: "all",
          stylers: [
            { saturation: -90 },
            { lightness: 20 }
          ]
        },
	];
	
	if($('#mobile_detect').val()==1){
		var scroll=false;
		var mapTypeShow=false;
		var zoomClick=true;
	}else{
		var scroll=true;
		var mapTypeShow=true;
		var zoomClick=false;
	}
  
	var refPl=$('#iRefPlace_ref').val();
	var distance=parseInt($('#iDistance_ref').val());
	var optsearch = $('#nOptSearch_ref').val();
	var tSale=$('#sTypeSale_ref').val();
	//var latLng = new google.maps.LatLng(13.71307945, 100.53356171);
	var cLatLng = new google.maps.LatLng(returnSearch[0].cLat,returnSearch[0].cLng);
	var cIcon = returnSearch[0].Icon;
	if(distance==50000 || distance==30000){
		var setzoom=10;
	}else if(distance==20000){
		var setzoom=11;
	}else if(distance==10000){
		var setzoom=12;
	}else if(distance==5000){
		var setzoom=13;
	}else if(distance==3000){
		var setzoom=14;
	}else if(distance==1500 || distance==1000){
		var setzoom=15;
	}else{
		var setzoom=16;
	}
	if(tSale=='7,'){
		var labelstyle="labels-grey";
	}else{
		var labelstyle="labels";
	}
	var zindex_val=returnSearch.length;
	map = new google.maps.Map(document.getElementById('map_canvas'), {
		center: cLatLng,
		zoom: setzoom,
		styles:grayStyles,
		scrollwheel: scroll,
		//draggable: !("ontouchend" in document),
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
			position:google.maps.ControlPosition.TOP_RIGHT
		},
		streetViewControlOptions: {
			position:google.maps.ControlPosition.TOP_RIGHT
		},
		mapTypeControl:mapTypeShow,
		mapTypeControlOptions: {
			position:google.maps.ControlPosition.LEFT_BOTTOM
		},
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
	var expandControlDiv = document.createElement('div');
	var expandControl = new ExpandControl(expandControlDiv,map,cLatLng,setzoom);
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(expandControlDiv);
	
	// Create a DIV to hold the control and call HomeControl()
	var homeControlDiv = document.createElement('div');
	var homeControl = new HomeControl(homeControlDiv,map,cLatLng,refPl);
	//  homeControlDiv.index = 1;
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(homeControlDiv);
	
	var zoomControlDiv = document.createElement('div');
	var zoomControl = new ZoomControl(zoomControlDiv,map,cLatLng,setzoom);
	map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(zoomControlDiv);
	var circle={
		strokeColor: "#2190ab",
		strokeOpacity: 0.8,
		strokeWeight: 1,
		fillColor: "#2190ab",
		fillOpacity: 0.05,
		map: map,
		center: cLatLng,
		radius: distance
	};
	if($('#mobile_detect').val()==0){
		var drawCircle = new google.maps.Circle(circle);
	}
	
	//var marker;
	//var checkP = $("#nprice").attr('class');
	var checkP = $("#price_ref").val();
	var contentMobile = [];
	var contentCluster = [];

	for(var i=0;i<returnSearch.length;i++){
		var pLatLng = new google.maps.LatLng(returnSearch[i].Lat, returnSearch[i].Lng);
		var lunit = returnSearch[i].NumUnit;
		var lprice = returnSearch[i].PriceShow;
		var lcontent;
		var content = checkRSContent(returnSearch[i]);
		if(!content){content="-";}
		content = content.toString();
				
		if(returnSearch[i].ProjectCheck==1){//search Project
			var fill_color='#de761b';//brown
		}else{
			var fill_color=returnSearch[i].AdColor;
		}
		//if(checkP=="td-grey text-center"){
		if(checkP=="1"){
			var contentLower = returnSearch[i].PriceShow;
		}else{
			var contentLower = returnSearch[i].MinPricePerSqShow;
		}
		if(!contentLower){contentLower="-";}
		contentLower = contentLower.toString();
	  
		var Px=parseInt(checkLabelPosition(returnSearch[i].Advertising,optsearch,content.length,contentLower.length));
		var lanchor = new google.maps.Point(Px, Py);
		var goldStar = {
			path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
			strokeColor: '#FFFFFF',
			strokeOpacity: 1,
			strokeWeight: 2,
			fillColor: fill_color,
			fillOpacity: 1,
			scale: 1.9,
			//offsetT:-50,
			//offsetL:-40
		};

		lcontent = "<div class='line-map'>"+content+"</div>"+contentLower;
		contentCluster[i]=content;
		var pos = new google.maps.LatLng(returnSearch[i].Lat,returnSearch[i].Lng);
		
		if(i==0){
			if(returnSearch[i].Type=='Project'){
				if(returnSearch[i].MinPrice==0){
					lcontent = "<div style='display:table;'>0 ประกาศ</div>";
					var lanchor = new google.maps.Point(24, 37);
				}
				var marker = new MarkerWithLabel({
					position: cLatLng,
					map: map,
					icon: goldStar,
					labelContent: lcontent,
					labelAnchor: lanchor,
					labelClass: labelstyle, // the CSS class for the label
					zIndex: zindex_val+i,
					title: returnSearch[i].ProjectName
				});
			}else{
				var marker = new google.maps.Marker({
					position: cLatLng,
					map: map,
					icon: cIcon,
					//title: 'Your search location point'
					title: "Location : "+returnSearch[i].CenterName
				});
			}
		}else{
			var marker = new MarkerWithLabel({
				position: pLatLng,
				icon: goldStar,
				map: map,
				draggable: false,
				raiseOnDrag: false,
				labelContent: lcontent,
				labelAnchor: lanchor,
				labelClass: labelstyle, // the CSS class for the label
				labelInBackground: false,
				zIndex: zindex_val,
				title: returnSearch[i].ProjectName
			});
			markerArrayCl.push(marker);
		}
		marker.set("id", i);
		marker.set("project", returnSearch[i].ProjectName);
		zindex_val -= i;
		markerArray.push(marker);
		
		if(returnSearch[i].CenterName){
			attachProjectDetail(markerArray[i],returnSearch[i].CenterName,cLatLng,lcontent,i);
		}else{
			if(returnSearch[i].ProjectName){
				attachProjectDetail(markerArray[i],returnSearch[i].ProjectName,pLatLng,lcontent,i);
			}else{
				if(i!=0){
					attachProjectDetail(markerArray[i],refPl,cLatLng,'',contentMobile[i],i);
				}
			}
		}
	}
	
	var style = [{
        url: '/img/clusterIcon.png',
        height: 35,
        width: 35,
        anchor: [0, 0],
        textColor: '#ffffff',
        textSize: 14
	}];
	
	var mcOptions = {
		gridSize: 50,
		maxZoom: 18,
		styles: style,
		zoomOnClick: zoomClick,
		ignoreHidden:true
	};
	markerClusterer = new MarkerClusterer(map, markerArray,mcOptions);
	if($('#mobile_detect').val()==0){
		google.maps.event.addListener(markerClusterer, 'clusteringend', function (cluster) {
			/*var clusters = cluster.getClusters(); // use the get clusters method which returns an array of objects
			for( var i=0;i<clusters.length;i++ ){
				for( var j=0, le=clusters[i].markers_.length; j<le; j++ ){
					markerc = clusters[i].markers_[j]; // <-- Here's your clustered marker
				}
			}*/
		});
		
		google.maps.event.addListener(markerClusterer, 'mouseover', function (cluster) {
			var markers = cluster.getMarkers();
			var content = '';
			var idCluster = [];
			var minVal = 999999999;
			var minValSq = 999999999;
			var minPrice = [];
			var minPricePerSq = [];
			for (var i = 0; i < markers.length; i++) {
				var marker = markers[i];
				var num = marker.get("id");
				idCluster=num;
				minPrice[i]=parseFloat(returnSearch[num].MinPrice);
				minPricePerSq[i]=parseFloat(returnSearch[num].MinPricePerSq);
				/*if(contentCluster[num]!='-'){
					content += '<div><a href="#" id="cluster_title'+num+'" onclick="sortSearchResult('+num+');" style="text-decoration: none;">';
				}else{
					content += '<div class="text-blue">';
				}
				content += marker.title;
				if(contentCluster[num]!='-'){
					content += '</a>';
				}
				content += '</div>';*/
				if(minPrice[i]<minVal){
					minVal=minPrice[i].toFixed(1);
				}
				if(minPricePerSq[i]<minValSq){
					minValSq=minPricePerSq[i].toFixed(0);
				}
				if(returnSearch[num].Advertising=='5'){
					minValShow=minVal+'k';
					minValSqShow=minValSq;
				}else{
					minValShow=minVal+'M';
					minValSqShow=minValSq+'k';
				}
			}
			//content += '<div><a href="#" class="" style="text-decoration: none;">ราคาต่ำสุด '+minValShow+' ('+minValSqShow+' บ./ตร.ม.)</a></div>';
			content += 'ราคาต่ำสุด <b>'+minValShow+'</b> | <b>'+minValSqShow+'</b> บ/ม&sup2</a></div>';
			//content += ("<div><a href='#' class='cluster_zoom font-blue'>Zoom</a></div>");
			infowindowCluster = new google.maps.InfoWindow();
			infowindowCluster.setPosition(cluster.getCenter());
			infowindowCluster.setContent(content);
			infowindowCluster.open(map);
		});
		google.maps.event.addListener(markerClusterer, 'mouseout', function (cluster) {
			infowindowCluster.close();
		});
		google.maps.event.addListener(markerClusterer, 'click', function (cluster) {
			var markers = cluster.getMarkers();
			for (var i = 0; i < markers.length; i++) {
				var marker = markers[i];
				var num = marker.get("id");
				sortSearchResult(num);
			}
		});
	}else{
		google.maps.event.addListener(map, 'zoom_changed', function () {
			//infowindowCluster.close();
			//zoomLevel = map.getZoom();
			if($('#map_canvas').hasClass('map_resize_smaller')){
				$('#cImgUnits').addClass('display-none');
				$('#mobile_resize').addClass('display-none');
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
			}
		});
		google.maps.event.addListener(map, 'click', function() {
			if($('#map_canvas').hasClass('map_resize_smaller')){
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').addClass('display-none');
				$('#mobile_resize').addClass('display-none');
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
			}
		});
	}
}

function ZoomControl(controlDiv,map,position,zoom) {
	controlDiv.style.padding = '9px';
	var controlUI = document.createElement('div');
	controlUI.style.cursor = 'pointer';
	controlUI.style.marginBottom = '-15px';
	controlUI.style.textAlign = 'center';
	controlUI.title = 'Resize Map';
	controlDiv.appendChild(controlUI);
	var controlText = document.createElement('div');
	controlText.style.fontFamily='Arial,sans-serif';
	controlText.innerHTML = '<button type="button" class="btn-close2 text-grey"><span class="glyphicon glyphicon glyphicon-zoom-out" aria-hidden="true"></span></button>';
	controlUI.appendChild(controlText);

	google.maps.event.addDomListener(controlUI, 'click', function() {
		map.setZoom(zoom);
	});
}

function HomeControl(controlDiv,map,position,refPl) {
	controlDiv.style.padding = '9px';
	var controlUI = document.createElement('div');
	controlUI.style.backgroundColor = '#FFFFFF';
	//controlUI.style.border='1px solid #000';
	controlUI.style.cursor = 'pointer';
	//controlUI.style.marginBottom = '-7px';
	controlUI.style.textAlign = 'center';
	controlUI.title = 'Return to '+refPl+' Location';
	controlDiv.appendChild(controlUI);
	var controlText = document.createElement('div');
	controlText.style.fontFamily='Arial,sans-serif';
	//controlText.style.fontSize='20px';
	//controlText.style.paddingLeft = '4px';
	//controlText.style.paddingRight = '4px';
	controlText.innerHTML = '<button type="button" class="btn-close2 text-grey"><span class="glyphicon glyphicon-screenshot" aria-hidden="true"></span></button>';
	controlUI.appendChild(controlText);

	google.maps.event.addDomListener(controlUI, 'click', function() {
		map.setCenter(position);
	});
}

function ExpandControl(controlDiv,map,position,zoom) {
	controlDiv.style.padding = '9px';
	var controlUI = document.createElement('div');
	//controlUI.style.backgroundColor = '#FFFFFF';
	//controlUI.style.border='1px solid #000';
	controlUI.style.cursor = 'pointer';
	controlUI.style.marginBottom = '-7px';
	controlUI.style.textAlign = 'center';
	controlUI.title = 'Resize Map';
	controlDiv.appendChild(controlUI);
	var controlText = document.createElement('div');
	controlText.style.fontFamily='Arial,sans-serif';
	//controlText.style.fontSize='20px';
	//controlText.style.paddingLeft = '4px';
	//controlText.style.paddingRight = '4px';
	if($('#mobile_detect').val()==0){
		controlText.innerHTML = '<button type="button" id="bt_resize" class="btn-close2 text-grey" style="display:none;"><span class="glyphicon glyphicon glyphicon-signal text-orange2" aria-hidden="true"></span></button>';
	}
	controlUI.appendChild(controlText);

	google.maps.event.addDomListener(controlUI, 'click', function() {
		$('#market_div').show('blind',500);
		$('#map_canvas').removeClass('map_resize_full');
		$('#map_canvas').addClass('map_resize_small');
		$('#bt_resize').css('display','none');
		map.panTo(position);
		map.setZoom(zoom);
	});
}

function attachProjectDetail(marker,message,latlng,lcontent,i){
	var infowindow = new google.maps.InfoWindow({
		content:message
	});
	marker.addListener('mouseover',function(){
		infowindow.open(marker.get('map'),marker);
		changeSizeIcon(i,'1');
	});
	marker.addListener('mouseout',function(){
		infowindow.close();
		changeSizeIcon(i,'0');
	});
	if($('#mobile_detect').val()==1){
		var clicke="click";
	}else{
		var clicke="click";
	}
	marker.addListener(clicke,function(evt){
		//mSendPIDToGetImg(i);
		map.panTo(latlng);
		if($('#mobile_detect').val()==1){
			$('#cImgUnits').removeClass('display-none');
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#mobile_resize').removeClass('display-none');
			$('#map_canvas').removeClass('map_resize_small');
			$('#map_canvas').addClass('map_resize_smaller');
			displayImgUnitsMobile('map',i);
		}else{
			sortSearchResult(i);
		}
		//changeColorIcon(this,i);
	});
	
	if($('#mobile_detect').val()==0){
		marker.addListener('dblclick',function(evt){
			openUnit(returnSearch[i].POID,returnSearch[i].PName_en,returnSearch[i].NamePath);
		});
	}
}

function changeColorIcon(obj,num){
	var maxlength=markerArray.length;
	var optsearch = $('#nOptSearch_ref').val();
	var tSale=$('#sTypeSale_ref').val();
	if(tSale=='7,'){
		var labelstyle="labels-grey-b2";
	}else{
		var labelstyle="labels-b2";
	}
	for(var i=0;i<maxlength;i++){
		if(i!=0 && i==num){
			var contentUpper = checkRSContent(returnSearch[i]);
			if(!contentUpper){contentUpper="-";}
			contentUpper = contentUpper.toString();
					
			if(checkP=="td-grey text-center"){
			   var contentLower = returnSearch[i].PriceShow;
			}else{
			   var contentLower = returnSearch[i].MinPricePerSqShow;
			}
			if(!contentLower){contentLower="-";}
			contentLower = contentLower.toString();
			if(returnSearch[i].ProjectCheck && returnSearch[i].NumUnit==0){
				var Px=24;
				var Py_new=44;
			}else{
				var Px=parseInt(checkLabelPosition(returnSearch[i].Advertising,optsearch,contentUpper.length,contentLower.length));
				var Py_new=54;
			}
			var Px_new=Px+4;
			var lanchor = new google.maps.Point(Px_new, Py_new);
			var zmapIcon = {
				path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
				strokeColor: '#FFFFFF',
				strokeOpacity: 1,
				strokeWeight: 2,
				fillColor: '#de761b',
				fillOpacity: 1,
				scale: 2.3
			};
			markerArray[i].setIcon(null);
			markerArray[i].setIcon(zmapIcon);
			markerArray[i].labelAnchor = lanchor;
			markerArray[i].labelClass = labelstyle;
			markerArray[i].label.setStyles(); // Force label to redraw (makes update visible)
			markerArray[i].setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
			var pos = new google.maps.LatLng(returnSearch[i].Lat,returnSearch[i].Lng);
			markerArray[i].setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
		}else{
			if(i!=0){
				var fill_color=returnSearch[i].AdColor;
				var zmapIcon = {
					path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
					strokeColor: '#FFFFFF',
					strokeOpacity: 1,
					strokeWeight: 2,
					fillColor: fill_color,
					fillOpacity: 1,
					scale: 1.9
				};
				markerArray[i].setIcon(zmapIcon);
				markerArray[i].setZIndex(maxlength - i);
			}
		}
	}
}

function changeSizeIcon(num,type){
	var maxlength=markerArray.length;
	var optsearch = $('#nOptSearch_ref').val();
	//var checkP = $("#nprice").attr('class');
	var checkP = $("#price_ref").val();
	var tSale=$('#sTypeSale_ref').val();
	//var map = new google.maps.Map(document.getElementById("map_canvas"));
	if(tSale=='7,'){
		var labelstyle="labels-grey";
		var labelstyle2="labels-grey-b2";
	}else{
		var labelstyle="labels";
		var labelstyle2="labels-b2";
	}
	for(var i=0;i<maxlength;i++){
		if(i==num && returnSearch[i].ProjectName){
			if(returnSearch[i].ProjectCheck==1){//search Project
				var fill_color='#de761b';//brown
			}else{
				var fill_color=returnSearch[i].AdColor;
			}
			var contentUpper = checkRSContent(returnSearch[i]);
			if(!contentUpper){contentUpper="-";}
			contentUpper = contentUpper.toString();
					
			if(checkP=="1"){
			   var contentLower = returnSearch[i].PriceShow;
			}else{
			   var contentLower = returnSearch[i].MinPricePerSqShow;
			}
			if(!contentLower){contentLower="-";}
			contentLower = contentLower.toString();
			if(returnSearch[i].ProjectCheck && returnSearch[i].NumUnit==0){
				var Px=24;
				var Py_old=37;
				var Py_new=44;
			}else{
				var Px=parseInt(checkLabelPosition(returnSearch[i].Advertising,optsearch,contentUpper.length,contentLower.length));
				var Py_old=Py;
				var Py_new=54;
			}
			var Px_new=Px+4;
			var Px_old=Px;
			
			var lanchor_old = new google.maps.Point(Px_old, Py_old);
			var lanchor = new google.maps.Point(Px_new, Py_new);
			if(type==1){
				var zmapIcon = {
					path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
					strokeColor: '#FFFFFF',
					strokeOpacity: 1,
					strokeWeight: 2,
					fillColor: fill_color,
					fillOpacity: 1,
					scale: 2.3
				};
				markerArray[i].setIcon(null);
				markerArray[i].setIcon(zmapIcon);
				markerArray[i].labelAnchor = lanchor;
				markerArray[i].labelClass = labelstyle2;
				markerArray[i].label.setStyles(); // Force label to redraw (makes update visible)
				markerArray[i].setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
			}else{
				var zmapIcon = {
					path: 'M 0,0 5,-5 20,-5 20,-25 -20,-25 -20,-5 -5,-5 z',
					strokeColor: '#FFFFFF',
					strokeOpacity: 1,
					strokeWeight: 2,
					fillColor: fill_color,
					fillOpacity: 1,
					scale: 1.9
				};
				markerArray[i].setIcon(null);
				markerArray[i].setIcon(zmapIcon);
				markerArray[i].labelAnchor = lanchor_old;
				markerArray[i].labelClass = labelstyle;
				markerArray[i].label.setStyles(); // Force label to redraw (makes update visible)
				markerArray[i].setZIndex(maxlength - i);
			}
		}
	}
}

function deleteMarkers() {
	if (markerArray) {
		for(var i=0;i<markerArray.length;i++){
			markerArray[i].setMap(null);
			markerArray[i]=null;
		}
		markerArray.length = 0;
	}
	
	if (markerArrayCl) {
		for(var i=0;i<markerArrayCl.length;i++){
			markerArrayCl[i].setMap(null);
			markerArrayCl[i]=null;
		}
		markerArrayCl.length = 0;
	}
}

function firstSearch(){
	var viewmode = 1;
	var dist = $('#iDistance_ref').val();
	var refPl = $('#iRefPlace_ref').val();
	var tSale = $('#sTypeSale_ref').val();
	var propType = $('#sPropType_ref').val();
	var nBed = $('#sNBdroom_ref').val();
	var nBath = $('#sNBtroom_ref').val();
	var nTransDist = $('#sTransDist_ref').val();
	var nYear = $('#sPYear_ref').val();
	var minP = $('#minPrice_ref').val();
	var maxP = $('#maxPrice_ref').val();
	var Order = $('#sOrder_ref').val();
	if(!refPl || refPl=='')return false;
	
	var createMarker = $.getJSON("/zhome/getUpdateMarker",{ viewmode:viewmode,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }, function(json) {
			console.log( "success" );
		})
		.done(function() {
			console.log( "second success" );
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function(json) {
			returnSearch = json;
			console.log( "complete" );
		});

	// Set another completion function for the request above
	createMarker.complete(function(json) {
		getMarketCont();
		initMap();
		getImageUnit();
	});
}

var imgUnits = [];
var market_cont = [];
function updateSearch(){
	var viewmode = 1;
	var dist = $('#iDistance_ref').val();
	var refPl = $('#iRefPlace_ref').val();
	if(!dist || dist=='')return false;
	if(!refPl || refPl=='')return false;
	var tSale = $('#sTypeSale_ref').val();
	var propType = $('#sPropType_ref').val();
	var nBed = $('#sNBdroom_ref').val();
	var nBath = $('#sNBtroom_ref').val();
	var nTransDist = $('#sTransDist_ref').val();
	var nYear = $('#sPYear_ref').val();
	var minP = $('#minPrice_ref').val();
	var maxP = $('#maxPrice_ref').val();
	var Order = $('#sOrder_ref').val();
	var nowyear = $('#nowyear').val();
	var url_link = $('#url_link').val();
	var refPl2 = refPl.split(' ').join('-');
	var propType2 = propType.split(',').join('-');
	var tSale2 = tSale.split(',').join('-');
	var nBed2 = nBed.split(',').join('-');
	var nBath2 = nBath.split(',').join('-');
	if(minP==''){minP2=0;}else{minP2=minP;}
	if(maxP==''){maxP2=0;}else{maxP2=maxP;}
	if(nBed==''){nBed2=0;}
	if(nBath==''){nBath2=0;}
	if(nTransDist==''){nTransDist2=0;}else{nTransDist2=nTransDist;}
	if(nYear==''){nYear2=0;}else{nYear2=nYear;}
	var txt_link="/Zhome/searchResult/0/"+refPl2+"/"+minP2+"/"+maxP2+"/"+dist+"/"+tSale2+"/"+propType2+"/"+nBed2+"/"+nBath2+"/"+nTransDist2+"/"+nYear2;
	var new_url_link=url_link+txt_link;
	
	$.when($.getJSON("/zhome/getUpdateMarker",{ viewmode:1,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }),
	$.getJSON("/zhome/getUpdateMarker",{ viewmode:2,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }),
	$.getJSON("/zhome/getImageBanner",{ viewtype:'searchmap',distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }),
	$.getJSON("/zhome/getMarketCont",{ namepoint:refPl,distance:dist,advertising:tSale,nowyear:nowyear,proptype:propType,bedroom:nBed,bathroom:nBath,transdist:nTransDist,age:nYear,minPrice:minP,maxPrice:maxP })
	).then(function(json1,json2,json3,json4){
		returnSearch = json1[0];
		imgUnits = json2[0];
		imgBanner = json3[0];
		market_cont = json4[0];
		if(tSale==3){
			$("#nprice").text('บาท');
			$("#nprice_mb").text('บาท');
			$("#mprice").text('บาท');
			$("#mprice_mb").text('บาท');
		}else{
			$("#nprice").text('ล้านบาท');
			$("#nprice_mb").text('ล้านบาท');
			$("#mprice").text('ล้านบาท');
			$("#mprice_mb").text('ล้านบาท');
		}
		$('#cImgUnits').empty();
		$('#cImgUnits2').empty();
		$('#cListUnits').empty();
		deleteMarkers();
		initMap();
		displayMarketCont();
		updateContentMarker();
		displayImgBanner();
		if(imgUnits.length==1 && (imgUnits[0].POID==undefined) || imgUnits[0].POID=== null){
			$('#cImgUnitsMobile').empty();
			$('#cListUnitsMobile').empty();
		}else{
			if($('#mobile_detect').val()==0){//not mobile
				//displayImgUnits();
				displayImgUnitsMobile('list_data',0);
				displayImgUnitsMobile2('list_data',0);
			}else{
				//displayImgUnitsMobile();
				displayImgUnitsMobile('list_pic',0);
			}
			window.history.pushState('', '', txt_link);
			//window.history.replaceState(url_link, 'Title', new_url_link);
			$('#url_link').val(new_url_link);
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-68226296-1', 'auto');
			ga('send', 'pageview');
		}
	});
}

function displayMarketCont(){
	//$('#market_cont').empty();
	var cont = "";
	var dist=$("#iDistance_ref").val();
	var market_show_display="";
	var market_close_display="display-none";
	if($("#market_info_check").val()==1){
		var market_show_display="display-none";
		var market_close_display="";
	}
	
	if(market_cont.AreaName!=''){
		var distance_show = '';
		//var areasqprice_show = market_cont.AreaSqPrice.toFixed(0);
		dist=(dist/1000);
		if(!market_cont.AreaUnit){
			var area_unit="0";
		}else{
			var area_unit=market_cont.AreaUnit;
		}
		if(dist<1){
			distance_show = '< '+Math.ceil(dist);
		}else{
			distance_show=dist.toFixed(1);
		}
		var UnitNow = market_cont.ProjectUnit_untilnow;
		var UnitTotal = market_cont.ProjectUnit_total;
		var UnitFuture = market_cont.ProjectUnit_future;
		var UnitPercent = market_cont.Projectunit_percent;
		$("#mk_distance").text(distance_show);
		$("#mk_point").text(market_cont.AreaName);
		$("#mk_unit").text(area_unit);
		$("#mk_square").text(market_cont.AreaSqPrice);
		
		$("#mk_unit_mb").text(area_unit);
		
		$("#mk_info_unit_now").text(UnitNow);
		$("#mk_info_unit_future").text(UnitTotal);
		$("#mk_info_unit_percent").text(UnitPercent);
		
		$("#mk_info_unit_active").text(market_cont.ProjectUnit_active);
		$("#mk_info_unit_active_sale").text(market_cont.ProjectUnit_active_sale);
		$("#mk_info_unit_active_down").text(market_cont.ProjectUnit_active_down);
		$("#mk_info_unit_active_rent").text(market_cont.ProjectUnit_active_rent);
	}
	//$('#market_cont').append(cont);
}

function getImageUnit(){
	if($('#mobile_detect').val()==0){//not mobile
		//displayImgUnits();
		displayImgUnitsMobile('list_data',0);
		displayImgUnitsMobile2('list_data',0);
	}else{
		//displayImgUnitsMobile();
		displayImgUnitsMobile('list_pic',0);
	}
}

/// end update search ///
function mSendPIDToGetImg(i){
	var pid = returnSearch[i].PID;
	var refPl = $('#iRefPlace_ref').val();
	var tSale = $('#sTypeSale_ref').val();
	var propType = $('#sPropType_ref').val();
	var nBed = $('#sNBdroom_ref').val();
	var nBath = $('#sNBtroom_ref').val();
	var nYear = $('#sPYear_ref').val();
	var minP = $('#minPrice_ref').val();
	var maxP = $('#maxPrice_ref').val();
	if(!refPl || refPl=='')return false;
	
	var getImgUnits = $.getJSON("/zhome/getImgUnit",{ PID:pid,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP }, function(json) {
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
	var listNode = "";
	var list=$('#nListing_ref').val();
	var order=$('#sOrder_ref').val();
	var pref=$('#price_ref').val();
	$('#cImgUnits').empty();
	$('#cImgUnits2').empty();
	$('#cListUnits').empty();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	imgUnits.sort(function(a, b){
		if(order==1){
			var a1= parseFloat(a.Price), b1= parseFloat(b.Price);
		}else if(order==2){
			var a1= parseFloat(a.PricePerSq), b1= parseFloat(b.PricePerSq);
		}else if(order==3){
			var a1= parseFloat(b.PricePerSq), b1= parseFloat(a.PricePerSq);
		}else if(order==4){
			var a1= parseInt(a.YearEnd), b1= parseInt(b.YearEnd);
		}else if(order==5){
			var a1= parseInt(a.DistanceFromPoint), b1= parseInt(b.DistanceFromPoint);
		}else if(order==6){
			var a1= parseFloat(a.DistanceList), b1= parseFloat(b.DistanceList);
		}
		if(a1== b1) return 0;
		return a1> b1? 1: -1;
	});
	if(list==1){
		for(var i=0;i<imgUnits.length;i++){
			if($('#'+imgUnits[i].POID).length==0){
				// imgNode +=  '<div>';
				imgNode +=  '<div class="col-md-12 col-sm-6 col-xs-12 padding-none" id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'"><div class="col-md-12 col-sm-12" style="margin-bottom:10px;"><a href="/zhome/unitDetail2/'+imgUnits[i].POID+'/'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
				imgNode +=  '<div><div class="padding-none" style="padding-top:15px;"><div class="unit-show hilight_project" style="cursor:pointer;"><h3 class="padding-none text-grey projectname-mobile" style="padding-left:5px;padding-top:5px;" onmouseover=this.style.color="#ff8000"; onmouseout=this.style.color="";> '+imgUnits[i].ProjectName+'</h3></div></div>';
				imgNode +=  '<div class="text-center unit-show hilight_project" style="position:relative;height:auto;cursor:pointer;background-color:#FBFBFB;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive center-block" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'"><h4 class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';
				imgNode +=	'<table class="table borderless2 fsize-unitsearch unit-table" style="padding:0;margin:0;cursor:pointer;">';
				imgNode +=	'<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;">';
				imgNode +=	'<td class="padding-none"> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' '+imgUnits[i].useArea+'ม&sup2;  ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
				imgNode +=  '<td class="text-right dprice '+display_price+'"><strong class="s-price">&#3647; <span class="text-primary">'+imgUnits[i].PriceShow+'</span></strong></td>';
				imgNode +=  '<td class="text-right dpricesq '+display_pricesq+'"><strong class="s-price">&#3647; <span class="text-primary text-right">'+imgUnits[i].PricePerSqShow+'</span>/ม&sup2;</strong></td>';
				imgNode +=  '</tr>';
				imgNode +=  '<tr style="border-bottom: 1px solid #dbdbdb">';
				imgNode +=  '<td>'+imgUnits[i].DistName+'</td>';
				imgNode +=  '<td class="text-right"><span class="text-blue">'+imgUnits[i].DateShow+' </span><img src="/img/sun-s-icon.png"> &nbsp;<span class="text-blue"> '+imgUnits[i].ViewTel+' </span><span width="3px" class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
				/*imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';*/
				imgNode +=	'</tr>';
				imgNode +=	'</table>';
				imgNode +=	'</a></div></div>';
				//imgNode +=   '</div>';
			}
		}
		$('#cImgUnits').append(imgNode);
	}else if(list==2){
		for(var i=0;i<imgUnits.length;i++){
			if($('#'+imgUnits[i].POID).length==0){
				if(i==0){
					displayImgUnits2('0',i);
				}
				listNode += '<div id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'" class="unit-show hilight_project padding-none">';
				listNode += '<table class="table borderless2 unit-table col-md-12 padding-none" style="padding:0;margin:0;font-size:16px; width:100%;" onmouseover=focusMapIcon(this,'+i+','+imgUnits[i].PID+',1); onmouseout=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0); onclick=displayImgUnits2(1,'+i+'); ondblclick=openUnit('+imgUnits[i].POID+','+imgUnits[i].PName_en+','+imgUnits[i].NamePath+');>';
				listNode += '<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;cursor:pointer;">';
				listNode += '<td class="w35 s-padding-left text-primary text-grey text-left">'+imgUnits[i].ProjectNameCenter+'</td>';
				listNode += '<td class="w5 text-primary text-grey text-right">'+imgUnits[i].DistNameList+'</td>';
				listNode += '<td class="w15 text-primary text-grey text-right">'+imgUnits[i].BedroomList+'</td>';
				listNode += '<td class="w15 text-primary text-grey text-right">'+imgUnits[i].useArea+'</td>';
				listNode += '<td class="w10 text-primary text-grey text-right">'+imgUnits[i].Floor+'</td>';
				listNode += '<td class="w20 text-primary text-grey text-right dprice '+display_price+'">'+imgUnits[i].PriceShow+'</td>';
				listNode += '<td class="w20 text-primary text-grey text-right dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</td>';
				listNode += '</tr>';
				listNode += '</table>';
				listNode += '<input type="hidden" id="idImg_'+i+'" class="idImg" value="'+i+'">';
				listNode += '</div>';

			}
		}
		$('#cImgUnits2').append(imgNode);
		$('#cListUnits').append(listNode);
	}
	$(window).scrollTop(0);
}

function displayImgUnits2(mode,i){
	var pref=$('#price_ref').val();
	var imgNode = "";
	$('#cImgUnits2').empty();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	imgNode +=  '<table class="table borderless2 unit-table col-md-12 padding-none" style="width:100%; margin-top:13px;padding-left:0;padding-right:0;"><tr style="background-color:#FFFFFF;" class="padding-none" style="margin-left:0; margin-right:0; padding-left:0; padding-right:0;"><td class="padding-none" style="margin-left:0; margin-right:0; padding-left:0; padding-right:0;"><div class="col-md-12 col-sm-12" style="margin-bottom:10px;"><a href="/zhome/unitDetail2/'+imgUnits[i].POID+'/'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
	imgNode +=  '<div><div class="padding-none"><div class="unit-show hilight_project" style="cursor:pointer;"><h3 class="padding-none text-grey projectname-mobile" style="padding-left:5px;padding-top:5px;" onmouseover=this.style.color="#ff8000"; onmouseout=this.style.color="";> '+imgUnits[i].ProjectName+'</h3></div></div>';
	imgNode +=  '<div class="text-center unit-show hilight_project" style="position:relative;height:auto;cursor:pointer;background-color:#FBFBFB;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive center-block" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'"><h4 class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';
	imgNode +=	'<table class="table borderless2 fsize-unitsearch unit-table" style="padding:0;margin:0;cursor:pointer;padding-left:0;padding-right:0;">';
	imgNode +=	'<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;">';
	imgNode +=	'<td class="padding-none"> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' '+imgUnits[i].useArea+'ม&sup2;  ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
	imgNode +=  '<td class="text-right dprice '+display_price+'"><strong class="s-price">&#3647; <span class="text-primary">'+imgUnits[i].PriceShow+'</span></strong></td>';
	imgNode +=  '<td class="text-right dpricesq '+display_pricesq+'"><strong class="s-price">&#3647; <span class="text-primary text-right">'+imgUnits[i].PricePerSqShow+'</span>/ม&sup2;</strong></td>';
	imgNode +=  '</tr>';
	imgNode +=  '<tr style="border-bottom: 1px solid #dbdbdb">';
	imgNode +=  '<td>'+imgUnits[i].DistName+'</td>';
	imgNode +=  '<td class="text-right"><span class="text-blue">'+imgUnits[i].DateShow+' </span><img src="/img/sun-s-icon.png"> &nbsp; <span class="text-blue"> '+imgUnits[i].ViewTel+' </span><span width="3px" class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
	/*imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';*/
	imgNode +=	'</tr>';
	imgNode +=	'</table>';
	imgNode +=	'</a></div></td></tr></table>';
	/*som added*/
	imgNode +=	'<br>';
	imgNode +=	'<table class="col-md-12 table borderless2 unit-table" style="padding:0px 0px 0px 0px;margin:0;font-size:16px;width:100%;z-index:1000000000">';
	imgNode +=	'<tr style="padding:0;margin:0;background-color:#FBFBFB;">';
	imgNode +=	'<td class="w35 s-padding-left text-primary text-blue text-left">โครงการ</td>';
	imgNode +=	'<td class="w5 text-primary text-blue text-center">รถไฟฟ้า</td>';
	imgNode +=	'<td class="w15 text-primary text-blue text-center">นอน</td>';
	imgNode +=	'<td class="w15 text-primary text-blue text-centerx">ตร.ม.</td>';
	imgNode +=	'<td class="w10 text-primary text-blue text-center">ชั้น</td>';
	imgNode +=	'<td class="w20 text-primary text-blue text-right dprice '+display_price+'">บาท</td>';
	imgNode +=	'<td class="w20 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</td>';
	imgNode +=	'</tr>';
	imgNode +=	'</table>';

	/*end som added*/
	$('#cImgUnits2').append(imgNode);
	if(mode==1){
		var sLatLng = new google.maps.LatLng(imgUnits[i].Lat,imgUnits[i].Lng);
		map.panTo(sLatLng);
		//map.setZoom(19);
	}
}

function openUnit(POID,PName_en,NamePath){
//	window.open("/zhome/unitDetail2/"+POID, "_blank");
//	window.open("/condo/คอนโด/"+POID, "_blank");
	window.open("/"+NamePath+"/condo/"+PName_en+"/"+POID, "_blank");
}

function setPOID(obj){
	$('#POID').val(obj.id);
	$("#myform").attr('target','_blank');
	$("#myform").submit();
}

function sortSearchResult(n){
	var list=$('#nListing_ref').val();
	/*if(list==1){
		$('#cImgUnits').children('div').each(function(){
			if(returnSearch[n].ProjectName==$(this).attr('data-project')){
				swapToFirst($(this));
				//setUnitClick($(this));
			}else{
				//setUnitShow($(this));
			}
		});
	}else if(list==2){
		$('#cListUnits').children('div').each(function(){
			if(returnSearch[n].ProjectName==$(this).attr('data-project')){
				displayImgUnits2('0',$(this).find('.idImg').val());
				swapToFirst($(this));
				//setUnitClick($(this));
			}else{
				//setUnitShow($(this));
			}
		});
	}*/
	if(list==1){
		$('#cImgUnitsMobile').find('div.item').each(function(){
			if(returnSearch[n].ProjectName==$(this).attr('data-project')){
				swapToFirst($(this));
			}
		});
	}else if(list==2){
		$('#cListUnitsMobile').find('div.unit-show').each(function(){
			if(returnSearch[n].ProjectName==$(this).attr('data-project')){
				x=$(this).find('.idImg').val();
			}
		});
		displayImgUnitsMobile('list_data',x);
		displayImgUnitsMobile2('list_data',x);
		$('#cListUnitsMobile').find('div.unit-show').each(function(){
			if(returnSearch[n].ProjectName==$(this).attr('data-project')){
				swapToFirst($(this));
			}
		});
	}
	$(window).scrollTop(0);
}

function setUnitClick(elem){
	elem.find('div.hilight_project').removeClass('unit-show');
	elem.find('table').removeClass('unit-show');
	elem.find('div.hilight_project').addClass('unit-click');
	elem.find('table').addClass('unit-click');
}

function setUnitShow(elem){
	elem.find('div.hilight_project').removeClass('unit-click');
	elem.find('table').removeClass('unit-click');
	elem.find('div.hilight_project').addClass('unit-show');
	elem.find('table').addClass('unit-show');
}

function swapToFirst(elem){
	hilightImgUnit(elem);
	var list=$('#nListing_ref').val();
	if(list==1){
		//elem.insertBefore($("#cImgUnits").children().first());
		elem.insertBefore($("#cImgUnitsMobile").find('div .item').first());
	}else if(list==2){
		//elem.insertBefore($("#cListUnits").children().first());
		//$("#cListUnits").scrollTop(0);
		elem.insertAfter($("#cListUnitsMobile .list-show"));
		$("#cListUnitsMobile").scrollTop(0);
	}
}

function hilightImgUnit(elem){
	elem.find('div.hilight_project').effect( "highlight", {color:"#87CED5"}, 3000 );
	elem.find('tr').effect( "highlight", {color:"#87CED5"}, 3000 );
}

function focusMapIcon(obj,num,PID,type){
	if(type==1){
		obj.style.backgroundColor="#ff8000";
		var clusters = markerClusterer.getClusters();
		var sLatLng = new google.maps.LatLng(imgUnits[num].Lat,imgUnits[num].Lng);
		//var sContent = "<div style='display:table;'>";
		//sContent += "<p>"+imgUnits[num].ProjectName+"<p>";
		sContent = "<b>"+imgUnits[num].PriceShow+"</b> | <b>"+imgUnits[num].PricePerSqShow+"</b> บ/ม&sup2";
		//sContent += "</div>";
		for( var x=0, l=clusters.length; x<l; x++ ){
			if(clusters[x].markers_.length>1){
				for( var y=0, le=clusters[x].markers_.length; y<le; y++ ){
					marker = clusters[x].markers_[y]; //clustered marker
					if(marker.get("project")==imgUnits[num].ProjectName){
						tempmarker = new google.maps.Marker({
							position: sLatLng,
							map: map,
							icon: "img/blank.png"
						});
						var infowindow = new google.maps.InfoWindow({
							content:sContent,
							pixelOffset: new google.maps.Size(0, 5)
						});
						infowindow.open(tempmarker.get('map'),tempmarker);
					}
				}
			}
		}
	}else{
		obj.style.backgroundColor="";
		tempmarker.setMap(null);
	}
	for(var i=0;i<returnSearch.length;i++){
		if(returnSearch[i].PID==PID){
			changeSizeIcon(i,type);
		}
	}
}

function updatePriceMarker(evt){
	var p = evt.data.param1;
	if(p=='p'){
		$('#price_ref').val('1');
		$('.dprice').removeClass('display-none');
		$('.dpricesq').addClass('display-none');
	}else{
		$('#price_ref').val('2');
		$('.dprice').addClass('display-none');
		$('.dpricesq').removeClass('display-none');
	}
	updateMarkerLabelBottom(p);
	//displayImgUnits();
	
	if(evt.target.id=="nprice"){
		$("#nprice").attr('class','td-grey text-center');
		$("#npricem").attr('class','text-center');
	}else{
		$("#npricem").attr('class','td-grey text-center');
		$("#nprice").attr('class','text-center');
	}

	if(evt.target.id=="mprice"){
		$("#mprice").attr('class','hilight-on col-xs-6 text-center text-white');
		$("#mpricem").attr('class','hilight-off col-xs-6 text-center');
	}else{
		$("#mprice").attr('class','hilight-off col-xs-6 text-center');
		$("#mpricem").attr('class','hilight-on col-xs-6 text-center text-white');
	}
	if(evt.target.id=="mprice" || evt.target.id=="mpricem"){
		//$("#hide_idetail").click();
	}
   
    if(evt.target.id=="nprice_mb"){
		$("#nprice_mb").attr('class','td-grey text-center');
		$("#npricem_mb").attr('class','text-center');
	}else{
		$("#npricem_mb").attr('class','td-grey text-center');
		$("#nprice_mb").attr('class','text-center');
	}

    if(evt.target.id=="mprice_mb"){
		$("#mprice_mb").attr('class','hilight-on col-xs-6 text-center text-white');
		$("#mpricem_mb").attr('class','hilight-off col-xs-6 text-center');
	}else{
		$("#mprice_mb").attr('class','hilight-off col-xs-6 text-center');
		$("#mpricem_mb").attr('class','hilight-on col-xs-6 text-center text-white');
	}

}

function updateMarkerLabelBottom(ptype){
	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var price;
			var content = checkRSContent(returnSearch[i]);
			if(!content)content="-";
			content = content.toString();
			var optsearch = $('#nOptSearch_ref').val();
			if(ptype=="p"){
				var contentLower = returnSearch[i].MinPriceShow;
			}else{
			 	var contentLower = returnSearch[i].MinPricePerSqShow;
			}
			contentLower = contentLower.toString();
			var Px=parseInt(checkLabelPosition(returnSearch[i].Advertising,optsearch,content.length,contentLower.length));
			var anchor_point=new google.maps.Point(Px, Py);
			
			price = "<div class='line-map'>"+content+"</div>"+contentLower;
			
			markerArray[i].set("labelContent",price);
			markerArray[i].set("labelAnchor",anchor_point);
		}
	}
}

function updateContentMarker(){
	var optsearch = $('#nOptSearch_ref').val();
	var checkP = $("#price_ref").val();
	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var allcontent;
			var content = checkRSContent(returnSearch[i]);
			if(!content){content="-";}
			content = content.toString();
			//var checkP = $("#nprice").attr('class');
			if(checkP=="1"){
				var contentLower=returnSearch[i].MinPriceShow;
			}else{
				var contentLower=returnSearch[i].MinPricePerSqShow;
			}
			contentLower=contentLower.toString();
			var Px=parseInt(checkLabelPosition(returnSearch[i].Advertising,optsearch,content.length,contentLower.length));
			var anchor_point=new google.maps.Point(Px, Py);
			
	   		allcontent = "<div class='line-map'>"+content+"</div>"+contentLower;
			markerArray[i].set("labelContent",allcontent);
			markerArray[i].set("labelAnchor",anchor_point);
			
		}
	}
}

function updateContentMarker_mb(optsearch){
	$('#nOptSearch_ref').val(optsearch);
	$("#hide_idetail").click();
	updateContentMarker();
}

function checkLabelPosition(Advertising,optSearch,contentLength,contentLowerLength){
	if(Advertising==5){
		val=10;
		if(contentLength>=7){
			val=21;
		}else if(contentLength==6){
			val=18;
		}else if(contentLength==4){
			val=13;
		}
		if(contentLowerLength==4){
			if(contentLength>=6){
				//val+=1;
			}else if(contentLength==1 || contentLength==2){
				val+=4;
			}else{
				val+=1;
			}
		}
	}else{
		val=13;
		if(contentLength==13){
			val=37;
		}else if(contentLength==11){
			val=32;
		}else if(contentLength==10){
			val=29;
		}else if(contentLength==9){
			val=27;
		}else if(contentLength==8){
			val=25;
		}else if(contentLength==7){
			val=21;
		}else if(contentLength==6){
			val=18;
		}else if(contentLength==1 || contentLength==2 || contentLength==4){
			val=13;
		}
		if(contentLength<contentLowerLength){
			if(contentLowerLength==3){
				if(contentLength==1 || contentLength==2){
					val-=3;
				}
			}else if(contentLowerLength==5){
				val=15;
			}else if(contentLowerLength==6){
				val=19;
			}
		}
	}
	return val;
}

function checkRSContent(obj){
	var opt = $('#nOptSearch_ref').val();
    var type;
	switch(opt){
		case "1":
    		return obj.NumUnit;
        break;
		case "2":
        	return obj.YearEnd;
        break;
		case "3":
        	return obj.CondoUnit;
        break;
		case "4":
        	return parseInt(obj.CamFee);
        break;
		case "5":
			return obj.AvgPriceShow;
        break;
		/*case 6:
        break;*/
		case "7":
			return obj.MinPriceShow+"-"+obj.MaxPriceShow;
		break;
		case "8":
			return obj.StationDist+" km";
		break;
		default:
    
    	return obj.NumUnit;
    	break;
	}
}

function check_typesale(){
	$('.sTypeSale_mb').each(function(){
		if($('input:checkbox[value=5]').is(':checked')){
			$('input:checkbox[value=1]').prop('checked',false);
			$('input:checkbox[value=2]').prop('checked',false);
		}else{
			$('input:checkbox[value=5]').prop('checked',false);
		}
	});
}

function sendRefPlace(type){
	if(type==1){//PC
		$('#iRefPlace_ref').val($('#iRefPlace').val());
	}else{//Mobile
		$('#iRefPlace_ref').val($('#iRefPlace_mb').val());
		if($('#map_canvas').hasClass('map_resize_smaller')){
			$('#cImgUnits').addClass('display-none');
			$('#cImgUnitsMobile').addClass('display-none');
			$('#cListUnitsMobile').addClass('display-none');
			$('#mobile_resize').addClass('display-none');
			$('#map_canvas').removeClass('map_resize_smaller');
			$('#map_canvas').addClass('map_resize_small');
		}
	}
	updateSearch();
}

function showMarket(){
	$('#market_div').hide('blind',500);
	$('#map_canvas').removeClass('map_resize_small');
	$('#map_canvas').addClass('map_resize_full');
	$('#bt_resize').css('display','');
}
</script>
<?php $qMarker=$this->search->qMarker();
?>
<script type="text/javascript" language="javascript">
$(function () {
	/*$('#iDistance').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ระยะทาง',
		buttonClass: 'btn btn-link',
	});
	$('#iDistance_mb').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ระยะทาง',
		buttonClass: 'btn btn-link',
	});*/
	
	$('#sTypeSale').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ประเภทประกาศ',
		buttonClass: 'btn btn-link',
		onChange: function(option, checked, select) {
			if($(option).val()==5){
				$('#sTypeSale').multiselect('deselect', ['1','2','6','7']);
			}else if($(option).val()==1 || $(option).val()==2){
				$('#sTypeSale').multiselect('deselect', ['5','6','7']);
			}else if($(option).val()==6){
				$('#sTypeSale').multiselect('deselect', ['1','2','5','7']);
			}else if($(option).val()==7){
				$('#sTypeSale').multiselect('deselect', ['1','2','5','6']);
			}
		}
	});

	$('#sPropType').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ประเภทบ้าน',
		buttonClass: 'btn btn-link',
	});

	$('#sNBdroom').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ห้องนอน',
		buttonClass: 'btn btn-link',
	});
	
	$('#sNBtroom').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ห้องน้ำ',
		buttonClass: 'btn btn-link',
	});

	$('#sPYear').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'อายุตึก',
		buttonClass: 'btn btn-link',
	});
	
	$('#sTransDist').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ระยะทางจากรถไฟฟ้า',
		buttonClass: 'btn btn-link',
	});
});

$('#iRefPlace').quickselect({
  maxItemsToShow:10,
  exactMatch:true,
  data:[
	  
<?php
	$endLine=sizeof($qMarker);
	$i=0;
	While ($i<$endLine)
	{
		if ($i!=$endLine){
			echo '"'.$qMarker[$i].'",';
		} else {
			echo '"'.$qMarker[$i].'"';
		}
		$i++;
	}
?>
  ],
  onItemSelect:function(){sendRefPlace('1');}
  
});

$('#iRefPlace_mb').quickselect({
  maxItemsToShow:10,
  exactMatch:true,
  data:[
	  
<?php
	$endLine=sizeof($qMarker);
	$i=0;
	While ($i<$endLine)
	{
		if ($i!=$endLine){
			echo '"'.$qMarker[$i].'",';
		} else {
			echo '"'.$qMarker[$i].'"';
		}
		$i++;
	}
?>
  ],
  onItemSelect:function(){sendRefPlace('2');}
  
});	
  
$('#myModal').modal(options);

 $(document).ready(function() {
	$("#market-info-show").click(function(){
		$(".market-info").show( 'fast', function(){});
		$("#market-info-close").show( 'fast', function(){});
		$("#market-info-show").hide( 'fast', function(){});
		$("#market_info_check").val(1);
	});
	$("#market-info-close").click(function(){
		$(".market-info").hide( 'fast', function(){});
		$("#market-info-close").hide( 'fast', function(){});
		$("#market-info-show").show( 'fast', function(){});
		$("#market_info_check").val(0);
	});
});

function market_info(){
	$("#market-info-show").click(function(){
		$(".market-info").slideDown( 'fast', function(){});
		$("#market-info-close").show( 'fast', function(){});
		$("#market-info-show").hide( 'fast', function(){});
		$("#market_info_check").val(1);
	});
	$("#market-info-close").click(function(){
		$(".market-info").hide( 'fast', function(){});
		$("#market-info-close").hide( 'fast', function(){});
		$("#market-info-show").show( 'fast', function(){});
		$("#market_info_check").val(0);
	});
}

function displayImgUnitsMobile(type,n){
	var pref=$('#price_ref').val();
	var order=$('#sOrder_ref').val();
	var imgNode = "";
	var count=0;
	$('#cImgUnitsMobile').empty();
	imgUnits.sort(function(a, b){
		if(order==1){
			var a1= parseFloat(a.Price), b1= parseFloat(b.Price);
		}else if(order==2){
			var a1= parseFloat(a.PricePerSq), b1= parseFloat(b.PricePerSq);
		}else if(order==3){
			var a1= parseFloat(b.PricePerSq), b1= parseFloat(a.PricePerSq);
		}else if(order==4){
			var a1= parseInt(a.YearEnd), b1= parseInt(b.YearEnd);
		}else if(order==5){
			var a1= parseInt(a.DistanceFromPoint), b1= parseInt(b.DistanceFromPoint);
		}else if(order==6){
			var a1= parseFloat(a.DistanceList), b1= parseFloat(b.DistanceList);
		}
		if(a1== b1) return 0;
		return a1> b1? 1: -1;
	});
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	if($('#mobile_detect').val()==0 || ($('#mobile_detect').val()==1 && type=='list_data')){
		imgNode += '<div id="myCarousel" class="carousel slide carousel-top heightratio" data-ride="carousel" data-interval="false" >';
		imgNode += '<div class="carousel-inner" role="listbox">';
		if(type=='list_data'){
			var x=n;
		}else{
			var x=0;
		}
		list_class="";
		list_style="";
		list_style2="";
		if(type=='list_data'){
			list_class="hidden-xs hidden-sm";
			list_style="position: fixed;left:70%;width: 30%;z-index: 9";   <!--top thumbnail on list view -->
			list_style2="position: fixed;left:70%;width: 30%;z-index: 9"; <!--header bar on list view-->
		}else{
			$('#cListUnitsMobile').empty();
		}
		for(var i=x;i<imgUnits.length;i++){
			if((type=='map' && imgUnits[i].PID==returnSearch[n].PID) || (type=='list_data' && i==x) || (type=='list_pic' && i==count)){
				count++;
				if(type=='map'){
					if(count==1){
						active='active';
					}else{
						active='active';
					}
				}else{
					active='active';
				}
				if(imgUnits[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				imgNode += '<div class="item heightratio '+list_class+' '+active+'" data-project="'+imgUnits[i].ProjectName+'" style="overflow:hidden;margin: 0px 0px;background-image:url('+imgUnits[i].Picture[0]+') ; background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0; '+list_style+'" onmouseover=focusMapIcon(this,'+i+','+imgUnits[i].PID+',1); onmouseout=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0);>';
				imgNode += '<div class="carousel-caption-rt">';
				imgNode += '<span class="text-white">'+imgUnits[i].DateShow+'</span> <img src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000); filter: drop-shadow(2px 2px 4px #000);"> &middot; <span class="text-white">'+imgUnits[i].ViewPost+'</span> <span width="3px"class="glyphicon glyphicon-eye-open text-white input-sm"></span>&middot; <span class="text-white">'+imgUnits[i].ViewTel+'</span> <span width="3px" class="glyphicon glyphicon-earphone text-white input-sm"></span>';
				imgNode += '<a href="#'+i+'" title="Add to Favourite" onclick="updateFavorite('+imgUnits[i].POID+','+i+');">';
				imgNode += '<span id="favourite_show_'+i+'" class="glyphicon glyphicon-heart '+fav_color+' font14" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
				imgNode += '</a>';
				imgNode += '</div>';
				//imgNode += '<a href="/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'/'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
				imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
				imgNode += '<div class="layer-invisible"></div>';
				imgNode += '<div class="carousel-caption-lb" style="width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				imgNode += '<div class="text-white"><span>'+imgUnits[i].AdvertisingName+'</span></div>';
				imgNode += '<div class="text-white"><span class="font22 dprice '+display_price+'">'+imgUnits[i].PriceShowNew+'</span><span class="font22 dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</span> | <span>'+imgUnits[i].Bedroom+'</span> | <span> '+imgUnits[i].Bathroom+'</span> | <span>'+imgUnits[i].useArea+'ม&sup2;</span></div>';
				imgNode += '<div class="text-white font14"><span>'+imgUnits[i].ProjectNameCenter+' ('+imgUnits[i].DistName+')</span></div>';
				imgNode += '</div>';
				imgNode += '</a>';
				imgNode += '<input type="hidden" id="favourite_check_'+i+'" value="'+imgUnits[i].Favourite+'">';
				imgNode += '</div>';
				imgNode += '<div style="padding-bottom:1;"></div>';
				if(type=='list_data'){
					if($('#mobile_detect').val()==0){
						/*imgNode +=	'<div class="hidden-sm hidden-xs" style="margin-top:170px"></div>'
						imgNode +=	'<table class="col-md-12 table borderless2 unit-table hidden-sm hidden-xs" style="padding:0px 0px 0px 0px;margin:0px;font-size:16px;position:fixed;width:30%; '+list_style2+'">';
						imgNode +=	'<tr style="padding:0;margin:0;background-color:#FBFBFB;">';
						imgNode +=	'<td class="w35 s-padding-left text-primary text-blue text-left">โครงการ</td>';
						imgNode +=	'<td class="w5 text-primary text-blue text-center">รถไฟฟ้า</td>';
						imgNode +=	'<td class="w15 text-primary text-blue text-center">นอน</td>';
						imgNode +=	'<td class="w15 text-primary text-blue text-centerx">ตร.ม.</td>';
						imgNode +=	'<td class="w10 text-primary text-blue text-center">ชั้น</td>';
						imgNode +=	'<td class="w20 text-primary text-blue text-right dprice '+display_price+'">บาท</td>';
						imgNode +=	'<td class="w20 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</td>';
						imgNode +=	'</tr>';
						imgNode +=	'</table>';*/
					}else{
						/* for mobile*/
						imgNode +=	'<table class="col-md-12 table borderless2 unit-table visible-xs visible-sm border-red" style="padding:0px 0px 0px 0px;margin:0px;font-size:16px;width:100%;z-index: 9;">';
						imgNode +=	'<tr style="padding:0;margin:0;background-color:#FBFBFB;">';
						imgNode +=	'<td class="w35 s-padding-left text-primary text-blue text-left">โครงการ</td>';
						imgNode +=	'<td class="w5 text-primary text-blue text-center">รถไฟฟ้า</td>';
						imgNode +=	'<td class="w15 text-primary text-blue text-center">นอน</td>';
						imgNode +=	'<td class="w15 text-primary text-blue text-centerx">ตร.ม.</td>';
						imgNode +=	'<td class="w10 text-primary text-blue text-center">ชั้น</td>';
						imgNode +=	'<td class="w20 text-primary text-blue text-right dprice '+display_price+'">บาท</td>';
						imgNode +=	'<td class="w20 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</td>';
						imgNode +=	'</tr>';
						imgNode +=	'</table>';
						/* end mobile*/
					}
				}
			}
		}
		imgNode += '</div>';
		/*if(type=='map' && count>1){
			imgNode += '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">';
			imgNode += '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
			imgNode += '<span class="sr-only">Previous</span>';
			imgNode += '</a>';
			imgNode += '<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">';
			imgNode += '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
			imgNode += '<span class="sr-only">Next</span>';
			imgNode += '</a>';
		}*/
		imgNode += '</div>';
	}else{
		imgNode += '<div id="pagenum1" class="display-none">1</div>';
		imgNode += '<div class="heightratio">';
		imgNode += '<div id="mapviewport" class="heightratio2" onselectstart="return false;">';
		imgNode += '<div id="mapmouseSwipe" class="heightratio2">';
		for(var i=0;i<imgUnits.length;i++){
			if(type=='map' && imgUnits[i].PID==returnSearch[n].PID){
				if(imgUnits[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				imgNode += '<div class="panel heightratio2" data-project="'+imgUnits[i].ProjectName+'" style="background-image:url('+imgUnits[i].Picture[0]+');background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0;">';
				imgNode += '<div style="right:1%;top:0px;z-index:10;padding-top:5px;padding-right:1%;color:#fff;text-align:right;text-shadow:1px 1px 2px black,0 0 10px black,0 0 5px darkblue">';
				imgNode += '<span class="text-white">'+imgUnits[i].DateShow+'</span> <img src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000); filter: drop-shadow(2px 2px 4px #000);"> &middot; <span class="text-white">'+imgUnits[i].ViewPost+'</span> <span width="3px"class="glyphicon glyphicon-eye-open text-white input-sm"></span>&middot; <span class="text-white">'+imgUnits[i].ViewTel+'</span> <span width="3px" class="glyphicon glyphicon-earphone text-white input-sm"></span>';
				imgNode += '<a href="#'+i+'" title="Add to Favourite" onclick="updateFavorite('+imgUnits[i].POID+','+i+');">';
				imgNode += '<span id="favourite_show_'+i+'" class="glyphicon glyphicon-heart '+fav_color+' font14" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
				imgNode += '</a>';
				imgNode += '</div>';
				imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
				//imgNode += '<div class="layer-invisible"></div>';
				imgNode += '<div style="bottom:0px;z-index:10;padding-top:17%;padding-bottom:2px;padding-left:2%;color:#fff;text-align:left;text-shadow:1px 1px 2px black,0 0 10px black,0 0 5px darkblue;width:100%;height:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				imgNode += '<div class="text-white"><span>'+imgUnits[i].AdvertisingName+'</span></div>';
				imgNode += '<div class="text-white"><span class="font22 dprice '+display_price+'">'+imgUnits[i].PriceShow+'</span><span class="font22 dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</span> | <span>'+imgUnits[i].Bedroom+'</span> | <span> '+imgUnits[i].Bathroom+'</span> | <span>'+imgUnits[i].useArea+'ม&sup2;</span></div>';
				imgNode += '<div class="text-white font14"><span>'+imgUnits[i].ProjectNameCenter+' ('+imgUnits[i].DistName+')</span></div>';
				imgNode += '</div>';
				imgNode += '</a>';
				imgNode += '<input type="hidden" id="favourite_check_'+i+'" value="'+imgUnits[i].Favourite+'">';
				imgNode += '</div>';
			}
		}
		imgNode += '</div>';
		imgNode += '</div>';
		imgNode += '</div>';
	}
	$('#cImgUnitsMobile').append(imgNode);
	if(type=='map'){
		$('#mapmouseSwipe').swipe({
			TYPE:'panelSwipe',
			HORIZ: false,
			SNAPDISTANCE:10,
			DURATION:250,
			EASING:'swing',
			ARROWS:true,
			FADEARROWS:true,
			PAGENUM:'#pagenum1'
		});
	}
}

function displayImgUnitsMobile2(type,n){
	var pref=$('#price_ref').val();
	var listNode = "";
	$('#cListUnitsMobile').empty();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	listNode +=	'<div class="hidden-sm hidden-xs"></div>';
	listNode +=	'<table class="col-md-12 table borderless2 unit-table hidden-sm hidden-xs " style="padding:0px 0px 0px 0px;margin:0px;font-size:16px;position: fixed;left:70%;width: 30%;z-index: 9;">';
	listNode +=	'<tr style="padding:0;margin:0;background-color:#FBFBFB;">';
	listNode +=	'<td class="w35 s-padding-left text-primary text-blue text-left">โครงการ</td>';
	listNode +=	'<td class="w5 text-primary text-blue text-center">รถไฟฟ้า</td>';
	listNode +=	'<td class="w15 text-primary text-blue text-center">นอน</td>';
	listNode +=	'<td class="w15 text-primary text-blue text-centerx">ตร.ม.</td>';
	listNode +=	'<td class="w10 text-primary text-blue text-center">ชั้น</td>';
	listNode +=	'<td class="w20 text-primary text-blue text-right dprice '+display_price+'">บาท</td>';
	listNode +=	'<td class="w20 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</td>';
	listNode +=	'</tr>';
	listNode +=	'</table>';
	listNode += '<div class="list-show hidden-sm hidden-xs" style="height:25px;"></div>';
	for(var i=0;i<imgUnits.length;i++){
		listNode += '<div id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'" class="unit-show hilight_project padding-none; margin-top:25px;">';
		//listNode += '<table class="table borderless2 unit-table col-md-12 padding-none" style="padding:0;margin:0;font-size:16px; width:100%;" onclick=displayImgUnitsMobile("list_data",'+i+'); onmouseover=focusMapIcon(this,'+i+','+imgUnits[i].PID+',1); onmouseout=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0); ondblclick=window.open("/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'/'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'"); onmousedown=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0);>';
		listNode += '<table class="table borderless2 unit-table col-md-12 padding-none" style="padding:0;margin:0;font-size:16px; width:100%;" onclick=displayImgUnitsMobile("list_data",'+i+'); onmouseover=focusMapIcon(this,'+i+','+imgUnits[i].PID+',1); onmouseout=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0); ondblclick=window.open("/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'"); onmousedown=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0);>';
		listNode += '<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;cursor:pointer;">';
		listNode += '<td class="w35 s-padding-left text-primary text-grey text-left">'+imgUnits[i].ProjectNameCenter+'</td>';
		listNode += '<td class="w5 text-primary text-grey text-right">'+imgUnits[i].DistNameList+'</td>';
		listNode += '<td class="w15 text-primary text-grey text-right">'+imgUnits[i].BedroomList+'</td>';
		listNode += '<td class="w15 text-primary text-grey text-right">'+imgUnits[i].useArea+'</td>';
		listNode += '<td class="w10 text-primary text-grey text-right">'+imgUnits[i].Floor+'</td>';
		listNode += '<td class="w20 text-primary text-grey text-right dprice '+display_price+'">'+imgUnits[i].PriceShow+'</td>';
		listNode += '<td class="w20 text-primary text-grey text-right dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</td>';
		listNode += '</tr>';
		listNode += '</table>';
		listNode += '<input type="hidden" id="idImg_'+i+'" class="idImg" value="'+i+'">';
		listNode += '</div>';
	}
	$('#cListUnitsMobile').append(listNode);
}

function updateFavorite(POID,i){
	var user="<?echo $this->session->userdata('user_id');?>";
	var fav=$('#favourite_check_'+i).val();
	if(!user){
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		if(fav=='1'){
			$('#favourite_check_'+i).val(0);
			$('#favourite_show_'+i).removeClass('text-pink');
			$('#favourite_show_'+i).addClass('text-white');
			fav_status=0;
		}else{
			$('#favourite_check_'+i).val(1);
			$('#favourite_show_'+i).removeClass('text-white');
			$('#favourite_show_'+i).addClass('text-pink');
			fav_status=1;
		}
		$.post("/zhome/updateFavorite", { 'POID':POID,'user_id':"<?echo $this->session->userdata('user_id');?>",'Token':"<?echo $this->session->userdata('token');?>",'favourite_status': fav_status });
	}
}

function displayImgBanner(){
	var listBanner = "";
	if(imgBanner.length>0){
		$('#cImgBanner').empty();
		listBanner += '<div id="myCarouselBanner" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000" data-wrap="true">';
		listBanner += '<div class="carousel-inner" role="listbox">';
		for(var i=0;i<imgBanner.length;i++){
			if(i==0){
				active='active';
			}else{
				active='';
			}
			listBanner += '<div class="item hidden-xs hidden-sm '+active+'">';
			if(imgBanner[i].Link!=''){
				listBanner += '<a href="'+imgBanner[i].Link+'" target="_blank">';
			}
			listBanner += '<img src="'+imgBanner[i].Picture+'" alt="..." style="overflow:hidden;margin: 0px 0px;height: 100%;width:100%; padding-left: 0; padding-right: 0;z-index: 5;">';
			if(imgBanner[i].Link!=''){
				listBanner += '</a>';
			}
			listBanner += '</div>';
		}
		listBanner += '</div>';
		/*listBanner += '<a class="left carousel-control" href="#myCarouselBanner" role="button" data-slide="prev">';
		listBanner += '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
		listBanner += '<span class="sr-only">Previous</span>';
		listBanner += '</a>';
		listBanner += '<a class="right carousel-control" href="#myCarouselBanner" role="button" data-slide="next">';
		listBanner += '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
		listBanner += '<span class="sr-only">Next</span>';
		listBanner += '</a>';*/
	}
	listBanner += '</div>';
	$('#cImgBanner').append(listBanner);
	$('#myCarouselBanner').carousel().next();
}
</script>

<div class="clearfix"></div>
<div class="modal_loading"></div>

<!--filter box for mobile-->
<div class="row padding-none">
<div class="col-md-12 col-xs-12 filter display-none">
				<br class="hidebar">
				<hr class="hidebar">
				<div class="row bg-grey3 margin-t10">
					<div class="col-xs-6"><a id="hidefilter2" href="#" class="text-orange3 pull-left" style="color: #f36b22;font-size: 20px;padding-top: 11px;padding-bottom: 10px;padding-left: 12px;padding-right: 12px;">ยกเลิก</a>
					</div>
					<div class="col-xs-6"><a id="hidefilter" href="#" class="text-orange3 pull-right" style="color: #f36b22;font-size: 20px;padding-top: 11px;padding-bottom: 10px;padding-left: 12px;padding-right: 12px;">ตกลง</a>
					</div>
				</div>
				<div class="clearfix"></div>
				<hr>
				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-xs-12"><span>ระยะห่างจากจุดที่ค้นหา</span>
							<select id="iDistance_mb" name="iDistance_mb" class="form-control pull-left font16">
								<option value="500">0.5 km</option>
								<option value="1000">1.0 km</option>
								<option value="1500">1.5 km</option>
								<option value="3000" selected="selected">3.0 km</option>
								<option value="5000">5.0 km</option>
								<option value="10000">10.0 km</option>
							</select>
						</div>
					</div>
				</div>
				<hr>
				
				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-xs-12"><span>ระยะห่างจากรถไฟฟ้า</span>
							<select id="sTransDist_mb" name="sTransDist_mb" class="form-control pull-left font16">
								<option value="" selected="selected">ไม่สนใจ</option>
								<option value="500">0.5 km</option>
								<option value="1000">1.0 km</option>
								<option value="1500">1.5 km</option>
								<option value="3000">3.0 km</option>
							</select>
						</div>
					</div>
				</div>
				<hr>

				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[1]" value="1" <?=$Advertising_check1;?> onclick="check_typesale();"><div class="padding-t2">ขาย</div>
							</label>
						</div>
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[2]" value="2" <?=$Advertising_check2;?> onclick="check_typesale();"><div class="padding-t2">ขายดาวน์</div>
							</label>
						</div>
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[3]" value="5" <?=$Advertising_check3;?> onclick="check_typesale();"><div class="padding-t2">เช่า</div>
							</label>
						</div>
					</div>
				</div>
				<hr>


				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-md-12">ประเภทอาคาร</div>
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sPropType_mb" name="sPropType_mb" checked value="1"><div class="padding-t2">คอนโด</div>
							</label>
						</div>
					</div>
				</div>
				<hr>

				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-md-12">ห้องนอน</div>
						<div class="col-md-12">
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[1]" value="99"><div class="padding-t2">สตูดิโอ </div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[2]" value="1"><div class="padding-t2">1</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[3]" value="2"><div class="padding-t2">2</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[4]" value="3"><div class="padding-t2">3</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[5]" value="4"><div class="padding-t2">> 3</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<hr>
				
				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-md-12">ห้องน้ำ</div>
						<div class="col-md-12">
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[1]" value="1"><div class="padding-t2">1</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[2]" value="2"> <div class="padding-t2">2</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[3]" value="3"> <div class="padding-t2">3</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[4]" value="4"> <div class="padding-t2">4</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[5]" value="5"> <div class="padding-t2">> 4</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<hr>

				<div class="row clear-padding-lr">

					<div class="col-md-12 clear-padding-lr"> 
						<div class="col-md-12">อายุตึก(ไม่เกิน)</div>
						<div class="col-md-12">
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="" checked><div class="padding-t2">ไม่ระบุ</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="1"><div class="padding-t2">< 1 </div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="3"><div class="padding-t2">< 3</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="5"><div class="padding-t2">< 5</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="10"><div class="padding-t2">< 10</div>
								</label>
							</div>
							<div class="w20 pull-left hidden-xs">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="-10"><div class="padding-t2">> 10</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<hr>
				 
				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr"> 
						<div class="col-md-12">ราคา</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="minPrice_mb" name="minPrice_mb" value="" placeholder="ต่ำสุด" class="form-control font16" width="100%">  
						</div>
						<div class="col-xs-2 text-right padding-t3 text-center">
							-
						</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="maxPrice_mb" name="maxPrice_mb" value="" placeholder="สูงสุด" class="form-control font16" width="100%">
						</div>
					</div>
				</div>
				<hr>

				<div class="row clear-padding-lr">
					<div class="col-md-12 clear-padding-lr">
						<div class="col-md-12">ขนาด (ม2.)</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="minArea_mb" name="minArea_mb" value="" placeholder="ต่ำสุด" width="100%" class="form-control font16">  
						</div>
						<div class="col-xs-2 text-right padding-t3 text-center">
							-
						</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="maxArea_mb" name="maxArea_mb" value="" placeholder="สูงสุด" width="100%" class="form-control font16">
						</div>
					</div>
				</div>
				<hr>
	        </div>
</div>
<!--end filter box for mobile-->