<?php
$attributes = array('id' => 'myform');
echo form_open('/zhome/unitDetail', $attributes);
$Advertising_check1="";
$Advertising_check2="";
$Advertising_check3="";
$Advertising_select1="";
$Advertising_select2="";
$Advertising_select3="";
$advertising_in="";
if($TOAdvertising==5){
	$unit_baht="บาท";
	$Advertising_check3="checked";
	$Advertising_select3="selected='selected'";
	$advertising_in="5,";
}else{
	$unit_baht="ล้านบาท";
	$Advertising_check1="checked";
	$Advertising_check2="checked";
	$Advertising_select1="selected='selected'";
	$Advertising_select2="selected='selected'";
	$advertising_in="1,2,";
}
$nowyear=date('Y')+543;
//$distance_length=3000;
$MaxYearProject=$this->search->getMaxYearProject();
?>

<input type="hidden" id="namePoint" name="namePoint" <?php echo 'value="'.$namePoint.'"' ?>>
<input type="hidden" id="toAd" name="toAd" <?php echo 'value="'.$TOAdvertising.'"' ?>>
<input type="hidden" id="nowyear" name="nowyear" <?php echo 'value="'.$nowyear.'"' ?>>
<input type="hidden" id="market_info_check" name="market_info_check" value="0">
<div class="margin-t50"></div>
<hr class="border-top-grey padding-none">
<div class="n-container padding-none">
	<div class="row">  
		<!--menu mobile Add Nov12-->
		<div class="padding-bottom5 container-fluid visible-sm visible-xs">
            <div class="col-md-12 hidebar">
              <div class="pull-left w50 border-right text-center">
                    <input type="text" value="" id="iRefPlace_mb" name="iRefPlace_mb"  placeholder=" รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control">
              </div> 
              <div class="pull-left w25 text-center">
                <button id="showfilter" type="button" class="btn btn-sm2 btn-white-s"> <a id="showfilter" href="#" class="text-orange2">ตัวกรอง</a></button>
              </div>
              <div class="pull-left w25 text-center">
               <button id="show_idetail" type="button" class="btn btn-sm2 btn-white-s"> <a href="#" class="text-orange2">ข้อมูลหมุด</a></button>
              </div>
            </div>
           
            
			<!--Added on Nov17-->
            <div class="idetail display-none">
				<div class="row display-none">
					<div class="col-md-12">
						<div class="col-xs-6"><a id="hide_idetail" href="#" class="text-orange2">ตกลง</a></div>
						<div class="col-xs-6"><a id="hide_idetail2" href="#" class="text-orange2 pull-right">ยกเลิก</a></div>
					</div>
				</div>
				<hr>
				<ul class="list-inline">
					<li class="hilight-on col-xs-6 text-white text-center" id="mprice"><?=$unit_baht;?></li>
					<li class="hilight-off col-xs-6 text-center" id="mpricem">บาท/ม2.</li>
				</ul>
				<br>
				<hr>
				<div class="col-md-12 text-center">
					<div><a href="#" onclick="updateContentMarker_mb('1');">จำนวนยูนิตที่ลงประกาศ</a></div>
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
					<hr>
				</div>
            </div>
            <!--End added on Nov17-->
			<div class="filter display-none">
				<br class="hidebar">
				<hr class="hidebar">
				<div class="row">
					<div class="col-md-12">
						<div class="col-xs-6"><a id="hidefilter" href="#" class="text-orange2">ตกลง</a></div>
						<div class="col-xs-6"><a id="hidefilter2" href="#" class="text-orange2 pull-right">ยกเลิก</a></div>
					</div>
				</div>
				<div class="clearfix"></div>
				<hr>

				<div class="row">
					<div class="col-md-12">
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[1]" value="1" <?=$Advertising_check1;?>><div class="padding-t2">ขาย</div>
							</label>
						</div>
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[2]" value="2" <?=$Advertising_check2;?>><div class="padding-t2">ขายดาวน์</div>
							</label>
						</div>
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[3]" value="5" <?=$Advertising_check3;?>><div class="padding-t2">เช่า</div>
							</label>
						</div>
					</div>
				</div>
				<hr>


				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">ประเภทอาคาร</div>
						<div class="col-xs-4">
							<label class="checkbox-inline">
								<input type="checkbox" class="sPropType_mb" name="sPropType_mb" checked="checked" value="1"><div class="padding-t2">คอนโด</div>
							</label>
						</div>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">ห้องนอน</div>
						<div class="col-md-12">
							<div class="w20 pull-left">
								<label class="checkbox-inline">
									<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[1]" value="99"><div class="padding-t2">สตูดิโอ</div>
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
				
				<div class="row">
					<div class="col-md-12">
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

				<div class="row">

					<div class="col-md-12"> 
						<div class="col-md-12">อายุตึก(ไม่เกิน)</div>
						<div class="col-md-12">
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value=""><div class="padding-t2">ไม่ระบุ</div>
								</label>
							</div>
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="1"><div class="padding-t2">< 1</div>
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
							<div class="w20 pull-left">
								<label class="radio-inline">
									<input type="radio" class="sPYear_mb" name="sPYear_mb" value="-10"><div class="padding-t2">> 10</div>
								</label>
							</div>
						</div>
					</div>
				</div>
				<hr>
				 
				<div class="row">
					<div class="col-md-12"> 
						<div class="col-md-12">ราคา</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="minPrice_mb" name="minPrice_mb" value="" placeholder="ต่ำสุด" class="form-control">  
						</div>
						<div class="col-xs-2 text-right padding-t3 text-center">
							-
						</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="maxPrice_mb" name="maxPrice_mb" value="" placeholder="สูงสุด" class="form-control">
						</div>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">ขนาด (ม2.)</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="minArea_mb" name="minArea_mb" value="" placeholder="ต่ำสุด" class="form-control">  
						</div>
						<div class="col-xs-2 text-right padding-t3 text-center">
							-
						</div>
						<div class="col-xs-5 text-center">
							<input type="text" id="maxArea_mb" name="maxArea_mb" value="" placeholder="สูงสุด" class="form-control">
						</div>
					</div>
				</div>
				<hr>
			</div>
		</div>
          <!--end menu mobile Add Nov12-->
		  
		<div id ="search-page" class="padding-bottom5 container-fluid hidden-sm hidden-xs">
			<div class="col-md-3">
				<div class="pull-left w20 text-center padding-none">
					<!--<input type="text" value="" id="iDistance" name="iDistance" placeholder="0" class="form-control">-->
					<select id="iDistance" name="iDistance" class="borderless3 text-center pull-left padding-none">
						<option value="500">0.5 km</option>
						<option value="1000">1.0 km</option>
						<option value="1500">1.5 km</option>
						<option value="3000" selected="selected">3.0 km</option>
						<option value="5000">5.0 km</option>
						<option value="10000">10.0 km</option>
						<option value="20000">20.0 km</option>
						<option value="30000">30.0 km</option>
					</select>
				</div>
				<div class="pull-left w20 padding-t3 text-center">จาก</div>
				<div class="pull-left w60 border-right text-center">
					<input type="text" value="" id="iRefPlace" name="iRefPlace"  placeholder=" เขต, รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control">
				</div>
            </div>

            <hr class="visible-xs blank">
           
            <div class="col-md-6 hidden-sm hidden-xs">
				<div class="pull-left w20 border-right text-center padding-none">
					<select id="sTypeSale" name="sTypeSale" multiple="multiple" class="borderless3 text-left pull-left">
						<option value="1" data-content="<span class='glyphicon glyphicon-stop' style='color:#FF0000'></span>" <?=$Advertising_select1;?>>ขาย</option>
						<option value="2" data-content="<span class='glyphicon glyphicon-stop' style='color:#4682B4'></span>" <?=$Advertising_select2;?>>ขายดาวน์</option>
						<option value="5" data-content="<span class='glyphicon glyphicon-stop' style='color:#008040'></span>" <?=$Advertising_select3;?>>เช่า</option>
					</select>
				</div>
				<div class="pull-left w20 border-right text-center padding-none">
					<!--Add Nov18-->
					<select id="sPropType" name="sPropType" multiple="multiple" class="borderless3 text-left pull-left padding-none">
						<option value="1" selected>คอนโด</option>
						<!--<option value="2">หมู่บ้าน</option>
						<option value="3">ตึกแถว</option>-->
					</select>
					<!--<div class="button-group">
						<button type="button" class="btn btn-default btn-xs dropdown-toggle borderless3 text-grey padding-t5" data-toggle="dropdown">คอนโด<span class="caret"></span></button>
						<ul class="list-inline dropdown-menu">
							<li><input type="checkbox" class="sPropType">คอนโด</li>
						</ul>
					</div>-->
                <!--End-->
                <!--<select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sPropType" name="sPropType">
                          <option value="1" selected="selected">คอนโด</option>
                          <!--<option value="2" disabled="disabled">หมู่บ้าน</option>
                          <option value="3" disabled="disabled">ตึกแถว</option>
                </select>-->
				</div>
				<div class="pull-left w20 border-right text-center">
					<!--Add Nov18-->
					<select id="sNBdroom" name="sNBdroom" multiple="multiple" class="borderless3 text-left pull-left padding-none">
						<option value="99">สตูดิโอ</option>
						<option value="1">1 นอน</option>
						<option value="2">2 นอน</option>
						<option value="3">3 นอน</option>
						<option value="4">>3 นอน</option>
					</select>
					<!--End Add Nov18-->       
					<!--<select class="selectpicker" data-style="btn-noborder" data-width="auto" id="sNBdroom" name="sNBdroom">
                          <option value="0">นอน</option>
                          <option value="99">สตูดิโอ</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
					</select>-->
				</div>
				<div class="pull-left w20 border-right text-center">
				<!--Add Nov19-->
					<select id="sNBtroom" name="sNBtroom" multiple="multiple" class="borderless3 text-left pull-left padding-none">
						<option value="1">1 น้ำ</option>
						<option value="2">2 น้ำ</option>
						<option value="3">3 น้ำ</option>
						<option value="4">4 น้ำ</option>
						<option value="5">>4 น้ำ</option>
					</select>
				</div>
				<!--End Add Nov19-->  
				<div class="pull-left w20 border-right text-center">
					<select id="sPYear" name="sPYear" class="borderless3 text-left pull-left padding-none">
						<option value="" selected="selected">ไม่ระบุ</option>
						<option value="1">อายุตึก <1ปี</option>
						<option value="3">อายุตึก <3ปี</option>
						<option value="5">อายุตึก <5ปี</option>
						<option value="10">อายุตึก <10ปี</option>
						<option value="-10">อายุตึก >10ปี</option>
					</select>

            <!--<select id="sPYear" name="sPYear" class="borderless3 text-left" style="cursor:pointer;" onmouseover="this.style.textDecoration='underline';"  onmouseout="this.style.textDecoration='none';" data-style="btn-noborder" data-width="auto">
						<option value="0">อายุตึก</option>
						<option value="1"> <1ปี</option>
						<option value="2"> <2ปี</option>
						<option value="3"> <3ปี</option>
						<option value="5"> <5ปี</option>
						<option value="7"> <7ปี</option>
						<option value="10"> <10ปี</option>
						<option value="15"> <15ปี</option>
                    </select>-->
				</div>
            </div>

            <hr class="visible-xs blank">

            <div class="col-md-3 hidden-sm hidden-xs">
				<div class="pull-left w40 text-center">
					<input type="text"  value="" id="minPrice" name="minPrice" placeholder=" ราคาต่ำสุด" class="form-control">  
				</div>
                <div class="pull-left w10 text-right padding-t3 text-center">
					-
				</div>
				<div class="pull-left w40 text-center padding-r20">
					<input type="text"   value="" id="maxPrice" name="maxPrice" placeholder=" ราคาสูงสุด" class="form-control">
				</div>
               
				
				<div class="pull-left w10  text-center">                   
					<button id="down" type="button" class="btn btn-sm2 bg-white">อื่นๆ</button>
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
											<div class="col-xs-5 padding-right-clear"><input type="text"  value="" id="minPrice" name="minPrice" placeholder="ต่ำสุด" class="form-control input-sm"></div> 
											<div class="col-xs-1 padding-none">&nbsp;&nbsp;-</div>
											<div class="col-xs-5 margin-left1 padding-left-clear"><input type="text"   value="" id="maxPrice" name="maxPrice" placeholder="สูงสุด" class="form-control input-sm"></div>
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

        <div class="row">
        	<!-- start map -->
          <div class="col-md-12">
          	<?php echo $map['html']; ?>
          	<!--<div style="position:absolute;top:0px">
                <div class="text-grey text-center padding-top1">
                 <span class="text-primary big">253</span> ยูนิต &nbsp;ผู้ซื้อ <span class="text-primary big">45</span> &nbsp;เฉลี่ย <span class="text-primary big">B93,678</span>/ตร.ม. &nbsp;ประเมิน <span class="text-primary big">B45,321</span>/ม2. &nbsp;&nbsp;ค่าเช่า <span class="text-primary big">678</span>/ม2.&nbsp; Y <span class="text-primary big">7.8%</span>
                </div>
           </div>-->
	<div id="wrapper_map">
           
		<div id="map_canvas"></div>
			
		<div id="float_menu2" class="hidden-xs">
			<span class="td-grey text-center" id="nprice"><?=$unit_baht;?></span><span class="text-center" id="npricem">บาท/ม2.</span>
		</div>

		<div id="float_menu3" class="text-center hidden-xs">
          
			<select class="form-control input-md no-border selectpicker text-center td-grey" data-style="btn-noborder" data-width="100%" id="nOptSearch">
				<option value="0" disabled="disabled" class="text-center text-blue pull-left">ข้อมูลโครงการ</option>
				<option value="1" selected="selected" class="pull-left">จำนวนยูนิตที่ลงประกาศ</option>
				<option value="2" class="pull-left">ปีที่สร้างเสร็จ</option>
				<?php if($checkAdmin==1){?>
					<option value="3" class="pull-left">จำนวนยูนิตทั้งหมด</option>
				<?}?>
				<option value="4" class="pull-left">ค่าส่วนกลาง</option>
				<!--<option value="5" class="text-danger pull-left">ราคาเฉลี่ย</option>-->
				<!--<option value="6"  disabled="disabled" class="text-danger pull-left" style="color:red">อัตราการเข้าพัก</option>-->
				<option value="7" class="pull-left">ช่วงราคาต่ำสุด-สูงสุด</option>
				<option value="8" class="pull-left">ระยะทางจากรถไฟฟ้า(ใกล้สุด)</option>
			</select> 
		</div>

		<div id="float_menu">
			<div id="market_cont" class="text-grey text-center" style="vertical-align:middle;text-align:center;">
				<div class="container market-center" style="vertical-align:middle;text-align:center;">
					&nbsp;<span class="text-primary big-menumap" id="mk_unit"><!--Area Unit--></span>
					&nbsp;ประกาศ&nbsp;&nbsp;เฉลี่ย <span class="text-primary big-menumap" id="mk_square"><!--Square Price--></span>
					&nbsp;บาท/ตร.ม. &nbsp;
                    <span id="market-info-show" class="glyphicon glyphicon-signal text-white padding-none cursor" width="5px" aria-hidden="true"></span>
                    <span id="market-info-close" class="display-none glyphicon glyphicon glyphicon-remove text-white padding-none cursor"  width="5px" aria-hidden="true"></span>
				</div>
			</div>
		</div>
	</div>
			
       
      <!--<div class="visible-xs text-center" style="vertical-align:middle;display:table-cell;">&nbsp;เขต<?=$AreaName;?> คอนโด&nbsp; <span class="text-primary big-menumap"><?=$AreaUnit;?></span> ยูนิต &nbsp;ปี &nbsp;<?=$nowyear;?>&nbsp;: <span class="text-primary big-menumap"><?=$ProjectUnit_now;?></span> ยูนิต&nbsp; อนาคต&nbsp;: <span class="text-primary big-menumap"><?=$ProjectUnit_future;?></span> ยูนิต &nbsp;</div>-->
         

          
          
          <!--hide market detail-->
          <div id="market-detail"class="market-info display-none">
          <br>
          <div class="col-md-12 text-center padding-none"><h2 class="market-detail1 text-turq3 padding-none">สรุปตลาดคอนโด <span id="mk_distance"><?=number_format($distance_length/1000,0);?></span> กม. รอบ <span id="mk_point"><?=$namePoint;?></span></h2></div>
          <br><br>
		  <div class="col-md-12">
            <div class="col-md-4 text-center padding-bottom5">
              <div class="bg-grey2 padding-pro7">
                <div><h1 class="market-detail2 text-turq3">อุปทาน&nbsp;<span id="mk_info_unit_now"><!--Unit Now--></span> ยูนิต</h1></div>
                <br>
                <div class="font22">ปี <span id="mk_info_nowyear"><?=$MaxYearProject;?></span><span class="text-red"> <span id="mk_info_unit_future"><!--Unit Future--></span><span class="text-grey"> ยูนิต </span><span class="text-red">+<span id="mk_info_unit_percent">13.9</span>%</span></div>
              </div>
            </div>

            <div class="col-md-4 text-center padding-bottom5">
              <div class="bg-grey2 padding-pro7">
                <div><h1 class="market-detail2 text-turq3"><span id="mk_info_unit_active"><!--Unit Active--></span> ประกาศ</h1></div>
                <br>
                <div class="font22"><span class="text-grey">ขาย <span id="mk_info_unit_active_sale"><!--Unit Active Sale--></span> &nbsp; &nbsp; </span><span class="text-grey">   เช่า <span id="mk_info_unit_active_rent"><!--Unit Active Rent--></span> &nbsp; &nbsp; </span><span class="text-grey">   ขายดาวน์ <span id="mk_info_unit_active_down"><!--Unit Active Down--></span></span></div>
              </div>
            </div>

            <div class="col-md-4 text-center padding-bottom5">
              <div class="bg-grey2 padding-pro7">
                <div><h1 class="market-detail2 text-turq3">ผลตอบแทน N/A</h1></div>
                <br>
                <div class="font22"><span class="text-grey">ราคาเฉลี่ย<span id="mk_info_unit_sale_m2"> N/A </span></span> &nbsp; &nbsp; <span class="text-grey">ค่าเช่าเฉลี่ย<span id="mk_info_unit_rent_m2"> N/A </span></span></div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <br>
          </div>
          <!--end hide market detail-->
			<div class="clearfix"></div>
			<div class="col-md-12 text-center padding-none  filter-hide-mobile">
				<select id="sOrder" class="form-control input-md no-border selectpicker clear-none text-center padding-none" data-style="btn-noborder" data-width="200">
						<!-- <option>เรียงตามระยะรถไฟฟ้า</option>-->
						<option class="pull-left" value="1">ราคา ต่ำ-สูง</option>
						<option class="pull-left" value="2">ราคา/ตร.ม. ต่ำ-สูง</option>
						<option class="pull-left" value="3">ราคา/ตร.ม. สูง-ต่ำ</option>
						<option class="pull-left" value="4">ปีสร้างเสร็จ ใหม่-เก่า</option>
						<option class="pull-left" value="5" selected="selected">ระยะทางจากจุดที่ค้นหา ใกล้-ไกล</option>
						<!-- <option>เรียงตามราคาต่อตารางเมตร </option>
						<option>เรียงตามราคาพื้นที่ใช้สอย ใหญ่-เล็ก</option>
						<option>เรียงตามราคาพื้นที่ใช้สอย เล็ก-ใหญ่</option>-->
				</select>
             
			</div>
          
        <input name="POID" id="POID" type="hidden" value="" >
        <div class="col-md-12" id='cImgUnits'>
        	
            <!--<div class="col-md-4" onclick="alert(imgUnits[0].Picture[0])">
              <img src="img/list01.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong</td>
                  <td><strong>B <span class="text-primary"> 14.45M</span></span></td>
                  <td><strong>B <span class="text-primary">138,000</span></span>/ม2.</td>
                </tr>
                <tr>
                  <td><span class="text-grey">2 นอน 150ม. ชั้น 15</span></td>
                  <td><span class="text-blue">5 </span> <img src="img/sun-icon.png"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><span class="text-blue">089-123-4567</span></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <img src="img/list02.png" class="img-responsive">
              <table class="table">
                <tr>
                  <td><strong>มิลเลเนียมเรสซิเดนซ์</strong</td>
                  <td><strong>B <span class="text-primary"> 14.45M</span></strong></td>
                  <td><strong>B <span class="text-primary">138,000</span>/ม2.</strong></td>
                </tr>
                <tr>
                  <td><span class="text-grey">2 นอน 150ม. ชั้น 15</span></td>
                  <td><span class="text-blue">5 </span> <img src="imgUnits[0].Picture[0]"> <span class="text-blue"> 1 </span> <span class="glyphicon glyphicon-earphone text-blue"></span></td>
                  <td><a class="text-blue" href="#">โทรหาทันที</a></td>
                </tr>
              </table>
            </div>
            <div class="col-md-4">
              <img src="img/list03.png" class="img-responsive">
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
            </div>-->
		</div>
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



<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<script type="text/javascript" src="/js/markerwithlabel.js"></script>
<script type="text/javascript" src="/js/markerclusterer_compiled.js"></script>
<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>

<script type="text/javascript">
      // $('.selectpicker').selectpicker();
</script>
 <script type="text/javascript">
	$('#myModal').modal(options);
 </script>
<script type="text/javascript">

$(document).ready(function() {

	$("#down").click(function(){
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
	   $( "#cImgUnits" ).hide();
	   $( ".filter-hide-mobile" ).hide();
	   
	   
	});
	$("#show_idetail").click(function(){
	   $(".idetail").slideDown( 'slow', function(){ 
		  $(".log").text('');
	   });
	   $( ".lunderNav" ).hide();
	   $( ".navbar" ).hide();
	   $( ".hidebar" ).hide();
	   
	});


	$("#hidefilter").click(function(){
	   $(".filter").slideUp( 'slow', function(){ 
		  $(".log").text('');
	   });
	   $( "#wrapper_map" ).show();
	   $( ".navbar" ).show();
	   $( ".hidebar" ).show();
	   $( "#cImgUnits" ).show();
	   $( ".filter-hide-mobile" ).show();
	   updateSearch();

	});

	$("#hidefilter2").click(function(){
	   $(".filter").slideUp( 'slow', function(){ 
		  $(".log").text('');
	   });
	   $( "#wrapper_map" ).show();
	   $( ".navbar" ).show();
	   $( ".hidebar" ).show();
	   $( "#cImgUnits" ).show();
	   $( ".filter-hide-mobile" ).show();
	});

	$("#hide_idetail").click(function(){
	   $(".idetail").slideUp( 'slow', function(){ 
		  $(".log").text('');
	   });
	   $( "#wrapper_map" ).show();
	   $( ".navbar" ).show();
	   $( ".hidebar" ).show();

	});
	$("#hide_idetail2").click(function(){
	   $(".idetail").slideUp( 'slow', function(){ 
		  $(".log").text('');
	   });
	   $( "#wrapper_map" ).show();
	   $( ".navbar" ).show();
	   $( ".hidebar" ).show();

	});


	$("#up").click(function(){
	   $(".target").slideUp( 'slow', function(){ 
		  $(".log").text('');
	   });
	});

	 $("#up2").click(function(){
	   $(".target").slideUp( 'slow', function(){ 
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
/// array to keep data return for marker ////         
var returnSearch=[];

$(function(){
	
	var np = $('#namePoint').val();
	var tad = $('#toAd').val();
	tad = parseInt(tad);
	
	if(np){
		$('#iRefPlace').val(np);
		$('#iRefPlace_mb').val(np);
	}
	
	$('#iDistance').val(<?=$distance_length;?>);
	firstSearch();
	$('.selectpicker').selectpicker();
	/**/
	
});
       
var markerArray=[];
var markerArrayCl=[];
var iw=[];
var markerClusterer = null;
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
  
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		var refPl=$('#iRefPlace_mb').val();
	}else{
		var refPl=$('#iRefPlace').val();
	}
	var latLng = new google.maps.LatLng(13.71307945, 100.53356171);
	//var homeLatLng = new google.maps.LatLng(13.71307945, 100.53356171);
	//alert("return [0] : "+returnSearch[0]);
	var cLatLng = new google.maps.LatLng(returnSearch[0].Lat,returnSearch[0].Lng);
	var distance=parseInt($('#iDistance').val());
	if(distance==30000){
		var setzoom=10;
	}else if(distance==20000){
		var setzoom=11;
	}else if(distance==10000){
		var setzoom=12;
	}else if(distance==5000){
		var setzoom=13;
	}else{
		var setzoom=14;
	}
	var zindex_val=returnSearch.length;
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
		center: cLatLng,
		zoom: setzoom,
		styles:grayStyles,
		//scrollwheel: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
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
	var drawCircle = new google.maps.Circle(circle);
	
	//var marker;
	var checkP = $("#nprice").attr('class');	

	for(var i=0;i<returnSearch.length;i++){
		var pLatLng = new google.maps.LatLng(returnSearch[i].Lat, returnSearch[i].Lng);
		var lunit = returnSearch[i].NumUnit;
		var lprice = returnSearch[i].Price;
		
		var lcontent;
		
		var content = checkRSContent(returnSearch[i]);
		if(!content){content="-";}
		content = content.toString();
				
		if(returnSearch[i].ProjectCheck==1){//search Project
			var fill_color='#de761b';//brown
		}else if(returnSearch[i].Advertising=='1'){//ขาย
			var fill_color='#ff3e3e';//red
		}else if(returnSearch[i].Advertising=='2'){//ขายดาวน์
			var fill_color='#4682B4';//blue
		}else if(returnSearch[i].Advertising=='5'){//เช่า
			var fill_color='#008040';//green
		}else{
			var fill_color='#de761b';//brown
		}
		if(returnSearch[i].Advertising=='5'){//เช่า
			var lanchor = new google.maps.Point(12, 45);
		}else{
			var lanchor = new google.maps.Point(15, 45);
		}
		
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

		if(checkP=="td-grey text-center"){
		   lcontent = "<div class='line-map'>"+content+"</div>"+lprice;
		}else{
		   lcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
		}
		var pos = new google.maps.LatLng(returnSearch[i].Lat,returnSearch[i].Lng);
		
		if(returnSearch[i].ProjectName){
			var marker = new MarkerWithLabel({
				position: pLatLng,
				icon: goldStar,
				map: map,
				draggable: false,
				raiseOnDrag: false,
				labelContent: lcontent,
				labelAnchor: lanchor,
				labelClass: "labels", // the CSS class for the label
				labelInBackground: false,
				zIndex: zindex_val
			});
			markerArrayCl.push(marker);
		}else{
			if(returnSearch[i].Type!='Project'){
				var marker = new google.maps.Marker({
					position: cLatLng,
					map: map,
					//icon: goldStar,
					title: 'Your search location point'
				});
			}else{
				if(returnSearch[i].ProjectCheck){
					lcontent = "<div style='display:table;'>0 ประกาศ</div>";
					var lanchor = new google.maps.Point(24, 37);
				}else{
					lcontent = "";
				}
				var marker = new MarkerWithLabel({
					position: cLatLng,
					map: map,
					icon: goldStar,
					labelContent: lcontent,
					labelAnchor: lanchor,
					labelClass: "labels", // the CSS class for the label
					zIndex: zindex_val+i
				});
			}
		}
		zindex_val -= i;
		markerArray.push(marker);
		
		if(returnSearch[i].ProjectName){
			attachProjectDetail(markerArray[i], returnSearch[i].ProjectName,i);
		}else{
			if(returnSearch[i].CenterName){
				attachProjectDetail(markerArray[i], returnSearch[i].CenterName,i);
			}else{
				attachProjectDetail(markerArray[i], refPl,i);
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
	
	var mcOptions = {gridSize: 50, maxZoom: 13,styles: style};
	markerClusterer = new MarkerClusterer(map, markerArray,mcOptions);
	
	google.maps.event.addListener(map, 'zoom_changed', function() {
		zoomLevel = map.getZoom();
	});
}

function attachProjectDetail(marker,message,i){
	
	var infowindow = new google.maps.InfoWindow({
		content:message
	});
	marker.addListener('mouseover',function(){
		infowindow.open(marker.get('map'),marker);
	});
	marker.addListener('mouseout',function(){
		infowindow.close();
	});
	
	marker.addListener('click',function(evt){
		sortSearchResult(i);
		changeColorIcon(this,i);
	});
}

function changeColorIcon(obj,num){
	
	var maxlength=markerArray.length;
	for(var i=0;i<maxlength;i++){
		if(i!=0 && i==num){
			markerArray[i].setIcon(zmapIconH);
			var pos = new google.maps.LatLng(returnSearch[i].Lat,returnSearch[i].Lng);
			markerArray[i].setZIndex(google.maps.Marker.MAX_ZINDEX + 1);
		}else{
			if(i!=0){
				if(returnSearch[i].Advertising=='1'){//ขาย
					var fill_color='#ff3e3e';//red
				}else if(returnSearch[i].Advertising=='2'){//ขายดาวน์
					var fill_color='#4682B4';//blue
				}else if(returnSearch[i].Advertising=='5'){//เช่า
					var fill_color='#008040';//green
				}else{
					var fill_color='#de761b';//brown
				}
				
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

$('#iDistance').change(function(){
	setTimeout(updateSearch);
});
$('#iDistance').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
  //console.log( "Handler for .keypress() called."+e.keyCode );
});

//$('#iRefPlace').change(updateSearch);
/*$('#iRefPlace').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
  //console.log( "Handler for .keypress() called."+e.keyCode );
});*/
//$("#iRefPlace").blur(updateSearch);
$('#sTypeSale').change(function(){
	setTimeout(updateSearch,1500);
});
$('#sPropType').change(function(){
	setTimeout(updateSearch,1500);
});
$('#sNBdroom').change(function(){
	setTimeout(updateSearch,1500);
});
$('#sNBtroom').change(function(){
	setTimeout(updateSearch,1500);
});
$('#sPYear').change(updateSearch);
$('#minPrice').change(updateSearch);
$('#minPrice').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
});
$('#maxPrice').change(updateSearch);
$('#maxPrice').keypress(function(e) {
	if(e.keyCode==13){
		updateSearch();
	}
});
$('#sOrder').change(getImageUnit);

function firstSearch(){
	var viewmode = 1;
	var dist = $('#iDistance').val();
	var tSale = '';
	var propType = '';
	var nBed = '';
	var nBath = '';
	var nYear = '';
	//For Mobile
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		var refPl = $('#iRefPlace_mb').val();
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
	}else{
		var refPl = $('#iRefPlace').val();
		$('#sTypeSale option:selected').each(function(){
			var sale = $(this).val();
			tSale += sale+',';
		});
		$('#sPropType option:selected').each(function(){
			var prop = $(this).val();
			propType += prop+',';
		});
		$('#sNBdroom option:selected').each(function(){
			var bed = $(this).val();
			nBed += bed+',';
		});
		$('#sNBtroom option:selected').each(function(){
			var bath = $(this).val();
			nBath += bath+',';
		});
		nYear = $('#sPYear option:selected').val();
	}
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	var Order = $('#sOrder').val();
	if(!refPl || refPl=='')return false;
	
	var createMarker = $.getJSON("/zhome/getUpdateMarker",{ viewmode:viewmode,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }, function(json) {
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

function updateSearch(){
	var viewmode = 1;
	var dist = $('#iDistance').val();
	var tSale = '';
	var propType = '';
	var nBed = '';
	var nBath = '';
	var nYear = '';
	//For Mobile
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		var refPl = $('#iRefPlace_mb').val();
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
	}else{
		var refPl = $('#iRefPlace').val();
		$('#sTypeSale option:selected').each(function(){
			var sale = $(this).val();
			tSale += sale+',';
		});
		$('#sPropType option:selected').each(function(){
			var prop = $(this).val();
			propType += prop+',';
		});
		$('#sNBdroom option:selected').each(function(){
			var bed = $(this).val();
			nBed += bed+',';
		});
		$('#sNBtroom option:selected').each(function(){
			var bath = $(this).val();
			nBath += bath+',';
		});
		nYear = $('#sPYear option:selected').val();
	}
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	var Order = $('#sOrder').val();
	if(!dist || dist=='')return false;
	if(!refPl || refPl=='')return false;
	
	var updateMarker = $.getJSON("/zhome/getUpdateMarker",{ viewmode:viewmode,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }, function(json) {
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
	updateMarker.complete(function(json) {
		console.log( "second complete" );	 
		if(tSale==3){
			$("#nprice").text('บาท');
		}else{
			$("#nprice").text('ล้านบาท');
		}
		$('#cImgUnits').empty();
		getMarketCont();
		deleteMarkers();
		initMap();
		getImageUnit();
	});
}

var market_cont = [];
function getMarketCont(){
	var nowyear = $('#nowyear').val();
	var dist = $('#iDistance').val();
	var tSale = '';
	var propType = '';
	var nBed = '';
	var nBath = '';
	var nYear = '';
	
	//For Mobile
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		var refPl = $('#iRefPlace_mb').val();
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
	}else{
		var refPl = $('#iRefPlace').val();
		$('#sTypeSale option:selected').each(function(){
			var sale = $(this).val();
			tSale += sale+',';
		});
		$('#sPropType option:selected').each(function(){
			var prop = $(this).val();
			propType += prop+',';
		});
		$('#sNBdroom option:selected').each(function(){
			var bed = $(this).val();
			nBed += bed+',';
		});
		$('#sNBtroom option:selected').each(function(){
			var bath = $(this).val();
			nBath += bath+',';
		});
		nYear = $('#sPYear option:selected').val();
	}
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	
	var MarketCont = $.getJSON("/zhome/getMarketCont",{ namepoint:refPl,distance:dist,advertising:tSale,nowyear:nowyear,proptype:propType,bedroom:nBed,bathroom:nBath,age:nYear,minPrice:minP,maxPrice:maxP }, function(json) {
			console.log( "success" );
		})
		.done(function() {
			console.log( "second success" );
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function(json) {
			market_cont = json;
			console.log( "complete" );
		});

	// Set another completion function for the request above
	MarketCont.complete(function() {
		console.log( "second complete" );
		displayMarketCont();
	});
}

function displayMarketCont(){
	//$('#market_cont').empty();
	var cont = "";
	var distance=$("#iDistance").val();
	var market_show_display="";
	var market_close_display="display-none";
	if($("#market_info_check").val()==1){
		var market_show_display="display-none";
		var market_close_display="";
	}
	
	if(market_cont.AreaName!=''){
		var distance_show = '';
		//var areasqprice_show = market_cont.AreaSqPrice.toFixed(0);
		distance=(distance/1000);
		if(!market_cont.AreaUnit){
			var area_unit="0";
		}else{
			var area_unit=market_cont.AreaUnit;
		}
		if(distance<1){
			distance_show = '< '+Math.ceil(distance);
		}else{
			distance_show=distance.toFixed(1);
		}
		var UnitNow = market_cont.ProjectUnit_untilnow;
		var UnitTotal = market_cont.ProjectUnit_total;
		var UnitFuture = market_cont.ProjectUnit_future;
		var UnitPercent = market_cont.Projectunit_percent;
		$("#mk_distance").text(distance_show);
		$("#mk_point").text(market_cont.AreaName);
		$("#mk_unit").text(area_unit);
		$("#mk_square").text(market_cont.AreaSqPrice);
		
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

var imgUnits = [];
function getImageUnit(){
	var viewmode = 2;
	var dist = $('#iDistance').val();
	var tSale = '';
	var propType = '';
	var nBed = '';
	var nBath = '';
	var nYear = '';
	
	//For Mobile
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		var refPl = $('#iRefPlace_mb').val();
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
	}else{
		var refPl = $('#iRefPlace').val();
		$('#sTypeSale option:selected').each(function(){
			var sale = $(this).val();
			tSale += sale+',';
		});
		$('#sPropType option:selected').each(function(){
			var prop = $(this).val();
			propType += prop+',';
		});
		$('#sNBdroom option:selected').each(function(){
			var bed = $(this).val();
			nBed += bed+',';
		});
		$('#sNBtroom option:selected').each(function(){
			var bath = $(this).val();
			nBath += bath+',';
		});
		nYear = $('#sPYear option:selected').val();
	}
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
	var Order = $('#sOrder').val();
	
	if(!dist || dist=='')return false;
	if(!refPl || refPl=='')return false;
	
	var getImgUnits = $.getJSON("/zhome/getUpdateMarker",{ viewmode:viewmode,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,Year:nYear, TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }, function(json) {
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
	getImgUnits.complete(function(json){
		console.log( "second complete" );
		displayImgUnits();
	});
}

/// end update search ///
function mSendPIDToGetImg(i){
	//alert(this)
	//alert("msend : "+i)
	//($PID,$TOProperty,$Bedroom,$Year,$TOAdvertising,$minPrice,$maxPrice);
	var pid = returnSearch[i].PID;
	var tSale = '';
	var propType = '';
	var nBed = '';
	var nBath = '';
	var nYear = '';
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ){
		var refPl = $('#iRefPlace_mb').val();
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
	}else{
		var refPl = $('#iRefPlace').val();
		$('#sTypeSale option:selected').each(function(){
			var sale = $(this).val();
			tSale += sale+',';
		});
		$('#sPropType option:selected').each(function(){
			var prop = $(this).val();
			propType += prop+',';
		});
		$('#sNBdroom option:selected').each(function(){
			var bed = $(this).val();
			nBed += bed+',';
		});
		$('#sNBtroom option:selected').each(function(){
			var bath = $(this).val();
			nBath += bath+',';
		});
		nYear = $('#sPYear option:selected').val();
	}
	var minP = $('#minPrice').val();
	var maxP = $('#maxPrice').val();
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
	$('#cImgUnits').empty();
	for(var i=0;i<imgUnits.length;i++){
		if($('#'+imgUnits[i].POID).length==0){
		// imgNode +=  '<div>';
        imgNode +=  '<div class="col-md-4 col-sm-6" style="margin-bottom:10px;" id="'+imgUnits[i].POID+'" data-project="'+imgUnits[i].ProjectName+'"><a href="/zhome/unitDetail2/'+imgUnits[i].POID+'/'+imgUnits[i].ProjectName+'#" target="_blank" style="text-decoration: none;">';
		   
        imgNode +=  '<div><div class="unit-show" style="margin-top:0px; padding-top:0px;""><div style="padding-left:13px;cursor:pointer;"><h3 class="padding-none s-name; padding-top:0px;" onmouseover=this.style.color="#ff8000"; onmouseout=this.style.color="";> '+imgUnits[i].ProjectName+'</h3></div></div>';
        imgNode +=  '<div class="bg-grey2 text-center" style="position:relative;background-color:#87CED5;height:auto;cursor:pointer;"><img src="'+imgUnits[i].Picture[0]+'" class="t-img-responsive center-block"><h4  class="text-center" style="color:#ffffff; position:absolute; width:160px; bottom:0;right:0; margin-bottom:0; padding-top:8px; background-color: #2190ab;">ZmyHome เท่านั้น</h4></div></div>';
        imgNode +=	'<table class="table borderless2 fsize-unitsearch unit-table" style="padding:0;margin:0;cursor:pointer;">';
        imgNode +=	'<tr style="border-bottom: 1px solid #dbdbdb; padding:0;margin:0;">';
        imgNode +=	'<td style="padding-left:13px;"> <strong><span class="text-grey">'+imgUnits[i].Bedroom+' '+imgUnits[i].useArea+'ม&sup2;  ชั้น '+imgUnits[i].Floor+'</span></strong</td>';
        imgNode +=  '<td class="s-padding-left"><strong class="s-price">&#3647; <span class="text-primary">'+imgUnits[i].Price+'</span></strong></td>';
        imgNode +=  '<td class="text-right"><strong class="s-price">&#3647; <span class="text-primary text-right">'+imgUnits[i].PricePerSq+'</span>/ม&sup2;</strong></td>';
        imgNode +=  '</tr>';
        imgNode +=  '<tr style="border-bottom: 1px solid #dbdbdb">';
        imgNode +=  '<td style="padding-left:13px;">'+imgUnits[i].DistName+'</td>';
        imgNode +=  '<td class="s-padding-left"><span class="text-blue">'+imgUnits[i].DateShow+' </span><img src="/img/sun-s-icon.png"><span class="text-blue"> '+imgUnits[i].ViewTel+' </span><span width="3px" class="glyphicon glyphicon-earphone text-blue input-sm3"></span></td>';
        imgNode +=  '<td class="text-right"><span class="text-blue text-right">'+imgUnits[i].Tel+'</span></td>';
        imgNode +=	'</tr>';
        imgNode +=	'</table>';
        imgNode +=	'</a></div></div></div></div>';
        //imgNode +=   '</div>';
        }
	}
	
	$('#cImgUnits').append(imgNode);
}

$("#nprice").click({param1: "p"}, updatePriceMarker);
$("#npricem").click({param1: "psqm"}, updatePriceMarker);
$("#mprice").click({param1: "p"}, updatePriceMarker);
$("#mpricem").click({param1: "psqm"}, updatePriceMarker);
$('#nOptSearch').change(updateContentMarker);

function setPOID(obj){
	    $('#POID').val(obj.id);
	    $("#myform").attr('target','_blank');
      $("#myform").submit();
}

function sortSearchResult(n){
	$('#cImgUnits').children('div').each(function(){
		
		if(returnSearch[n].ProjectName==$(this).attr('data-project')){
			swapToFirst($(this));
			setUnitClick($(this));
		}else{
			setUnitShow($(this));
		}
	});
		//alert(" j : "+j+"..."+JSON.stringify(allDisplayUnits[j]));
}

function setUnitClick(elem){
	elem.removeClass('unit-show');
	elem.addClass('unit-click');
}

function setUnitShow(elem){
	elem.removeClass('unit-click');
	elem.addClass('unit-show');
}

function swapToFirst(elem){
		hilightImgUnit(elem);
		elem.insertBefore($("#cImgUnits").children().first() );
}

function hilightImgUnit(elem){
		elem.effect( "highlight", {color:"#87CED5"}, 3000 );
}

function updatePriceMarker(evt){
	var p = evt.data.param1;
	updateMarkerLabelBottom(p);
	
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

}

function updateMarkerLabelBottom(ptype){
	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var price;
			var content = checkRSContent(returnSearch[i]);
			if(!content)content="-";
			content = content.toString();
			var optsearch = $('#nOptSearch').val();
			if(optsearch==1){
				var anchor_point=new google.maps.Point(13, 45);
			}else{
				var anchor_point=new google.maps.Point(15, 45);
			}
			
			if(ptype=="psqm"){
			 	//price = "<div class='line-map'>"+returnSearch[i].NumUnit+"</div>"+returnSearch[i].MinPricePerSq;
			 	price = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
			}else{
			 	//price = "<div class='line-map'>"+returnSearch[i].NumUnit+"</div>"+returnSearch[i].MinPrice;
			 	price = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPrice;
			}
			
			markerArray[i].set("labelContent",price);
			markerArray[i].set("labelAnchor",anchor_point);
		}
	}
}

function updateContentMarker(){
 //alert("update");
	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var allcontent;
			var content = checkRSContent(returnSearch[i]);
			if(!content){content="-";}
			content = content.toString();
			var optsearch = $(this).val();
			if(returnSearch[i].Advertising==5){
				if(optsearch==7){
					var anchor_point=new google.maps.Point(23, 45);
				}else{
					var anchor_point=new google.maps.Point(12, 45);
				}
			}else{
				if(optsearch==7){
					var anchor_point=new google.maps.Point(30, 45);
				}else if(optsearch==8){
					var anchor_point=new google.maps.Point(18, 45);
				}else{
					var anchor_point=new google.maps.Point(15, 45);
				}
			}
			
			var checkP = $("#nprice").attr('class');
			if(checkP=="td-grey text-center"){
	   			allcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPrice;
			}else{
	   			allcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
			}
			markerArray[i].set("labelContent",allcontent);
			markerArray[i].set("labelAnchor",anchor_point);
			
		}
	}
}

function updateContentMarker_mb(optsearch){
	for(var i=0;i<markerArray.length;i++){
		if(returnSearch[i].ProjectName){
			var allcontent;
			var content = checkRSContent_mb(returnSearch[i],optsearch);
			if(!content){content="-";}
			content = content.toString();
			if(returnSearch[i].Advertising==5){
				if(optsearch==7){
					var anchor_point=new google.maps.Point(23, 45);
				}else{
					var anchor_point=new google.maps.Point(12, 45);
				}
			}else{
				if(optsearch==7){
					var anchor_point=new google.maps.Point(30, 45);
				}else if(optsearch==8){
					var anchor_point=new google.maps.Point(18, 45);
				}else{
					var anchor_point=new google.maps.Point(15, 45);
				}
			}
			
			var checkP = $("#nprice").attr('class');
			if(checkP=="td-grey text-center"){
	   			allcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPrice;
			}else{
	   			allcontent = "<div class='line-map'>"+content+"</div>"+returnSearch[i].MinPricePerSq;
			}
			markerArray[i].set("labelContent",allcontent);
			markerArray[i].set("labelAnchor",anchor_point);
		}
	}
	$("#hide_idetail").click();
}

function checkRSContent(obj){
	var opt = $('#nOptSearch').val();
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
			return obj.AvgPrice;
        break;
		/*case 6:
        break;*/
		case "7":
			return obj.MinPrice+"-"+obj.MaxPrice;
		break;
		case "8":
			return obj.StationDist+" km";
		break;
		default:
    
    	return obj.NumUnit;
    	break;
	}
}

function checkRSContent_mb(obj,opt){
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
			return obj.AvgPrice;
        break;
		/*case 6:
        break;*/
		case "7":
			return obj.MinPrice+"-"+obj.MaxPrice;
		break;
		case "8":
			return obj.StationDist+" km";
		break;
		default:
    
    	return obj.NumUnit;
    	break;
	}
}
</script>    
<?php $qMarker=$this->search->qMarker();
?>
<script>

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
  onItemSelect:function(){updateSearch();}
  
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
  onItemSelect:function(){updateSearch();}
  
});	
</script>

<script type="text/javascript">
  
$('#myModal').modal(options);
</script>
<!--multi select-->
<link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css"/>
<script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
$(function () {
	$('#iDistance').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ระยะทาง',
		buttonClass: 'btn btn-link',
	});
	
	$('#sTypeSale').multiselect({
		//includeSelectAllOption: true
		nonSelectedText: 'ประเภทประกาศ',
		buttonClass: 'btn btn-link',
		onChange: function(option, checked, select) {
			if($(option).val()==5){
				$('#sTypeSale').multiselect('deselect', ['1','2']);
			}else if($(option).val()==1 || $(option).val()==2){
				$('#sTypeSale').multiselect('deselect', '5');
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
});
</script>
   
<!--end multiselect-->
<script type="text/javascript" language="javascript">
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
</script>

<div class="clearfix"></div>         

<?php include 'footerstandard.php';?>
</body>
</html>