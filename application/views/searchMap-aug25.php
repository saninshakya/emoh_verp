<?php
$attributes = array('id' => 'myform');
echo form_open('/zhome/unitDetail', $attributes);
$Advertising_check1="";$Advertising_check2="";$Advertising_check3="";$Advertising_check4="";$Advertising_check5="";$Advertising_check6="";
$unit_baht="ล้านบาท";
$Advertising_array=explode(",",$TOAdvertising);
for($i=0;$i<count($Advertising_array);$i++){
	if($Advertising_array[$i]==1){$Advertising_check1="checked";}
	if($Advertising_array[$i]==2){$Advertising_check2="checked";}
	if($Advertising_array[$i]==5){$Advertising_check3="checked";$unit_baht="บาท";}
	if($Advertising_array[$i]==6){$Advertising_check4="checked";}
	if($Advertising_array[$i]==7){$Advertising_check5="checked";$unit_baht="บาท";}
	if($Advertising_array[$i]==8){$Advertising_check6="checked";}
}
$Bedroom_check99="";$Bedroom_check1="";$Bedroom_check2="";$Bedroom_check3="";$Bedroom_check4="";
$Bedroom_array=explode(",",$Bedroom);
for($i=0;$i<count($Bedroom_array);$i++){
	if($Bedroom_array[$i]==99){$Bedroom_check99="checked";}
	if($Bedroom_array[$i]==1){$Bedroom_check1="checked";}
	if($Bedroom_array[$i]==2){$Bedroom_check2="checked";}
	if($Bedroom_array[$i]==3){$Bedroom_check3="checked";}
	if($Bedroom_array[$i]==4){$Bedroom_check4="checked";}
}
$Bathroom_check1="";$Bathroom_check2="";$Bathroom_check3="";$Bathroom_check4="";$Bathroom_check5="";
$Bathroom_array=explode(",",$Bathroom);
for($i=0;$i<count($Bathroom_array);$i++){
	if($Bathroom_array[$i]==1){$Bathroom_check1="checked";}
	if($Bathroom_array[$i]==2){$Bathroom_check2="checked";}
	if($Bathroom_array[$i]==3){$Bathroom_check3="checked";}
	if($Bathroom_array[$i]==4){$Bathroom_check4="checked";}
	if($Bathroom_array[$i]==5){$Bathroom_check5="checked";}
}
$TransType_check1="";$TransType_check2="";
$TransType_array=explode(",",$TransType);
for($i=0;$i<count($TransType_array);$i++){
	if($TransType_array[$i]==1){$TransType_check1="checked";}
	if($TransType_array[$i]==0){$TransType_check2="checked";}
}
if($minPrice==0){$minPrice="";}
if($maxPrice==0){$maxPrice="";}
$nowyear=date('Y')+543;
//$distance_length=3000;
$MaxYearProject=$this->search->getMaxYearProject();
?>
<div id="debug-box"></div>
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
<input type="hidden" id="sTransType_ref" value="<?=$TransType;?>">
<input type="hidden" id="sPYear_ref" value="<?=$PYear;?>">
<input type="hidden" id="minPrice_ref" value="<?=$minPrice;?>">
<input type="hidden" id="maxPrice_ref" value="<?=$maxPrice;?>">
<input type="hidden" id="minArea_ref" value="<?=$minArea;?>">
<input type="hidden" id="maxArea_ref" value="<?=$maxArea;?>">
<input type="hidden" id="price_ref" value="1">
<input type="hidden" id="sOrder_ref" value="<?=$order;?>">
<input type="hidden" id="nOptSearch_ref" value="">
<input type="hidden" id="nListing_ref" value="1">
<input type="hidden" id="mapShow_ref" value="0">
<input type="hidden" id="iDistance_default" value="<?=$distance_length;?>">
<input type="hidden" id="sTypeSale_default" value="<?=$TOAdvertising;?>">
<input type="hidden" id="sPropType_default" value="<?=$TOProperty;?>">
<input type="hidden" id="sNBdroom_default" value="<?=$Bedroom;?>">
<input type="hidden" id="sNBtroom_default" value="<?=$Bathroom;?>">
<input type="hidden" id="sTransDist_default" value="<?=$TransDist;?>">
<input type="hidden" id="sTransType_default" value="<?=$TransType;?>">
<input type="hidden" id="sPYear_default" value="<?=$PYear;?>">
<input type="hidden" id="minPrice_default" value="<?=$minPrice;?>">
<input type="hidden" id="maxPrice_default" value="<?=$maxPrice;?>">
<input type="hidden" id="minArea_default" value="<?=$minArea;?>">
<input type="hidden" id="maxArea_default" value="<?=$maxArea;?>">
<!-- <hr class="border-top-grey padding-tb0"> -->
<div class="n-container padding-none">
	<div id="mapmenu-mb" class="container-fluid padding-none hidebar2" style="margin-bottom:0px;">
	    <!--menu ipad-->
		<div class="container-fluid visible-sm padding-none padding-clear-bottom display-none">
			<div class="">
			    <div class="col-xs-6 padding-none text-center" style="padding-bottom: 0; padding-top: 0; margin-top:1px;">
                    <span class="pull-left w50">
						<button type="button" class="btn bg-white col-xs-12 border-left showfilter-bt">
							<img id="checkfilter" src="/img/red-point.png" class="display-none" style="width:7px;height:7px; margin-bottom:3px;">
							<span class="text-orange2 font19 text-center padding-none bold search_m-button">กรอง</span>
						</button>
                     </span>
                     <span class="pull-left w50">
						<button id="" type="button" class="btn bg-white col-xs-12 border-left  budget_mb-bt">
							<span class="text-orange2 font19 text-center padding-none search_m-button bold">เลือกงบ</span>
						</button>
					</span>
				</div>
				<div id="" class="col-xs-6 text-center padding-left-clear padding-right-clear search_m-button-p2" >
					<span class="pull-left w50">
						<button type="button" id="" class="btn bg-white col-xs-12 border-left show_idetail-bt">
							<img id="checkfilter" src="/img/red-point.png" class="display-none" style="width:7px;height:7px; margin-bottom:3px;">
							<span class="text-orange2 font19 text-center padding-none bold search_m-button">ข้อมูลหมุด</span>
						</button>
                     </span>
                     <span class="pull-left w50">
						<button id="" type="button" class="btn bg-white col-xs-12 border-left order_mb-bt">
							<span class="text-orange2 font19 text-center padding-none search_m-button bold">เรียง</span>
						</button>
					</span>
				</div>
			</div>
		</div>
		<!--menu ipad end-->
		<!--menu mobile Add Nov12-->
		<div class="container-fluid visible-xs padding-none padding-clear-bottom">
			<div class="hidebar">
				<div id="col_show_filter" class="col-xs-3 text-center padding-left-clear padding-right-clear search_m-button-p1">
					<span id="unitcounter_mb" class="text-grey  search_m-button bold"></span>
				</div>
				<div id="c" class="col-xs-6 padding-none text-center" style="padding-bottom: 0; padding-top: 0; margin-top:1px;">
                    <span class="pull-left w50">
						<button type="button" id="showfilter" class="btn bg-white col-xs-12 border-left showfilter-bt">
							<img id="checkfilter" src="/img/red-point.png" class="display-none" style="width:7px;height:7px; margin-bottom:3px;">
							<span class="text-orange2 text-center padding-none bold search_m-button">กรอง</span>
						</button>
                     </span>
                     <span class="pull-left w50">
						<!--<button type="button" id="sOrder_mb2" class="btn  bg-white col-xs-12">-->
						<button id="order_mb" type="button" class="btn bg-white col-xs-12 border-left border-right order_mb-bt">
							<span class="text-orange2 text-center padding-none search_m-button bold">เรียง</span>
						</button>
						<!--search by map-->
						<button id="budget_mb" type="button" class="btn bg-white col-xs-12 border-left border-right display-none budget_mb-bt">
							<span class="text-orange2 font18 text-center padding-none search_m-button bold">เลือกงบ</span>
						</button>
					</span>
				</div>
				<div id="col_list-photo" class="col-xs-3 padding-none padding-t5 text-center">
					<button type="button" id="picture_listing_mb" class="btn btn-list2 padding-none padding-top-clear" style="padding-right:5px;" aria-label="Right Align">
						<span class="btn_pict_list glyphicon glyphicon-picture text-orange2" aria-hidden="true" disabled="disabled" style="font-size: 25px;"></span>
					</button>
					<button type="button" id="data_listing_mb" class="btn btn-list padding-none padding-top-clear padding-l3" style="padding-right:10px;" aria-label="Right Align">
						<span class="btn_data_list glyphicon glyphicon-th-list text-grey2" aria-hidden="true" style="font-size: 25px;"></span>
					</button>
				</div>
				<div id="col_show_idetail" class="col-xs-3 text-center visible-xs display-none2 padding-left-clear padding-right-clear search_m-button-p2" >
					<button id="show_idetail" type="button" class="btn  btn-white-s col-xs-12 w100p show_idetail-bt"> 
					   <a href="#" class="text-orange2  bold search_m-button">ข้อมูลหมุด</a>
					</button>
				</div>
			</div>


			<div class="pull-left w20 text-center padding-l5">
				<div id="float_menu2" class="hidden-xs border-grey2">
					<span id="nprice_mb" class="td-grey text-center hidden-xs"><?=$unit_baht;?></span><span id="npricem_mb" class="text-center hidden-xs">บาท/ม&sup2 </span>
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
		
			</div>
			
		</div>
		<!--end menu mobile Add Nov12-->

		<div id="mapmenu" class="container-fluid hidden-xs  bg-white fixed margin-t50" style="z-index:1000;">
			<div class="w21-sm pull-left">
				<div class="pull-left w20 padding-t4 margin-t4 text-left padding-l10-clear">
					<div class="btn-group pos-rlt hidden-sm">
						<button type="button" class="button-distance btn dropdown-toggle padding-none padding-t2" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ระยะห่าง <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="500" <?if($distance_length==500){echo "checked";}?> data-checkbox-text="0.5 km"> 0.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="1000" <?if($distance_length==1000){echo "checked";}?> data-checkbox-text="1.0 km"> 1.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="1500" <?if($distance_length==1500){echo "checked";}?> data-checkbox-text="1.5 km"> 1.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="3000" <?if($distance_length==3000){echo "checked";}?> data-checkbox-text="3.0 km"> 3.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="iDistance" name="iDistance" value="5000" <?if($distance_length==5000){echo "checked";}?> data-checkbox-text="5.0 km"> 5.0 km</label></li>
						</ul>
					</div>

				</div>
				<div class="pull-left w20 padding-t6 text-center font14 padding-l12 hidden-sm">จาก</div>
				<div class="pull-left w60 padding-t3 text-center padding-r5 hidden-sm">
					<input type="text" value="" id="iRefPlace" name="iRefPlace"  placeholder=" เขต, รถไฟฟ้า, โครงการ" autocomplete="off" class="form-control z-index-100000">
				</div>
			</div>

			<hr class="visible-xs blank">

			<div class="w33-sm nopadding pull-left">
				<div class="col-xs-4 border-right border-left text-center padding-none pos-rlt">
					<div class="btn-group">
						<button type="button" id="button-typesale" class="btn dropdown-toggle" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ประเภทประกาศ <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;
								<label class="filter-legend">
									<input type="checkbox" class="sTypeSale" name="sTypeSale" value="1" <?=$Advertising_check1;?> data-checkbox-text="ขาย"> 
									<span>ขาย</span>							
									<div style="background-color:#00a2b7;"></div>
									<!-- <span class='glyphicon glyphicon-stop' style='color:#00a2b7'></span> -->
								</label>
							</li>
							<li>
								&nbsp;&nbsp;
								<label class="filter-legend">
									<input type="checkbox" class="sTypeSale" name="sTypeSale" value="2" <?=$Advertising_check2;?> data-checkbox-text="ขายดาวน์"> 
									ขายดาวน์
									<div style='background-color:#183299'></div>
								</label>
							</li>
							<li>
								&nbsp;&nbsp;
								<label class="filter-legend">
									<input type="checkbox" class="sTypeSale" name="sTypeSale" value="8" <?=$Advertising_check6;?> data-checkbox-text="ขายห้องใหม่"> 
									ขายห้องใหม่
									<div style='background-color:#37C198'></div>
								</label>
							</li>
							<li>
								&nbsp;&nbsp;
								<label class="filter-legend">
									<input type="checkbox" class="sTypeSale" name="sTypeSale" value="5" <?=$Advertising_check3;?> data-checkbox-text="เช่า">
									เช่า
									<div style='background-color:#008040'></div>
								</label>
							</li>
							<li>
								&nbsp;&nbsp;
								<label class="filter-legend">
									<input type="checkbox" class="sTypeSale" name="sTypeSale" value="6" <?=$Advertising_check4;?> data-checkbox-text="ขายแล้ว">
									ขายแล้ว
									<div style='background-color:#808080'></div>
								</label>
							</li>
							<li>
								&nbsp;&nbsp;
								<label class="filter-legend">
									<input type="checkbox" class="sTypeSale" name="sTypeSale" value="7" <?=$Advertising_check5;?> data-checkbox-text="เช่าแล้ว">
									เช่าแล้ว
									<div style='background-color:#CCCCCC'></div>
								</label>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-xs-4 border-right text-center padding-none pos-rlt">
					<div class="btn-group">
						<button type="button" id="button-typeprop" class="btn dropdown-toggle" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ประเภทอสังหา <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sPropType" name="sPropType" value="1" checked data-checkbox-text="คอนโด"> คอนโด</label></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-4 border-right text-center padding-none pos-rlt">
					<div class="btn-group">
						<button type="button" id="button-bedroom" class="btn dropdown-toggle" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ห้องนอน <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBdroom" name="sNBdroom" value="99" <?=$Bedroom_check99;?> data-checkbox-text="สตู"> สตูดิโอ</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBdroom" name="sNBdroom" value="1" <?=$Bedroom_check1;?> data-checkbox-text="1"> 1 นอน</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBdroom" name="sNBdroom" value="2" <?=$Bedroom_check2;?> data-checkbox-text="2"> 2 นอน</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBdroom" name="sNBdroom" value="3" <?=$Bedroom_check3;?> data-checkbox-text="3"> 3 นอน</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBdroom" name="sNBdroom" value="4" <?=$Bedroom_check4;?> data-checkbox-text=">3"> >3 นอน</label></li>
						</ul>
					</div>
				</div>
				<!--<div class="col-xs-4 border-right text-center padding-none pos-rlt display-none">
					<div class="btn-group">
						<button type="button" id="button-bathroom" class="btn dropdown-toggle" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							จำนวนห้องน้ำ <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBtroom" name="sNBtroom" value="1" <?=$Bathroom_checked1;?> data-checkbox-text="1"> 1 น้ำ</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBtroom" name="sNBtroom" value="2" <?=$Bathroom_checked2;?> data-checkbox-text="2"> 2 น้ำ</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBtroom" name="sNBtroom" value="3" <?=$Bathroom_checked3;?> data-checkbox-text="3"> 3 น้ำ</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBtroom" name="sNBtroom" value="4" <?=$Bathroom_checked4;?> data-checkbox-text="4"> 4 น้ำ</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sNBtroom" name="sNBtroom" value="5" <?=$Bathroom_checked5;?> data-checkbox-text=">4"> >4 น้ำ</label></li>
						</ul>
					</div>
				</div>-->
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6  visible-sm"></div>
			<!--End Add Nov19-->  
			<div class="w23-sm nopadding pull-left">
				<div class="col-xs-6 border-right text-center pos-rlt padding-none">
					<div class="btn-group">
						<button type="button" id="button-stransdist" class="btn dropdown-toggle" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							ระยะห่างรถไฟฟ้า <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="radio" class="sTransDist" name="sTransDist" value="" <?if($TransDist=='' || $TransDist==0){echo "checked";}?>> ไม่ระบุ</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sTransDist" name="sTransDist" value="500" <?if($TransDist==500){echo "checked";}?>> 0.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sTransDist" name="sTransDist" value="1000" <?if($TransDist==1000){echo "checked";}?>> 1.0 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sTransDist" name="sTransDist" value="1500" <?if($TransDist==1500){echo "checked";}?>> 1.5 km</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sTransDist" name="sTransDist" value="3000" <?if($TransDist==3000){echo "checked";}?>> 3.0 km</label></li>
							<li role="separator" class="divider"></li>
							<!--<li><a href="#">สถานะรถไฟฟ้า</a></li>-->
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sTransType" name="sTransType" value="1" <?=$TransType_check1;?>> สถานีปัจจุบัน</label></li>
							<li>&nbsp;&nbsp;<label><input type="checkbox" class="sTransType" name="sTransType" value="0" <?=$TransType_check2;?>> สถานีในอนาคต</label></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-6 border-right text-center pos-rlt">
					<div class="btn-group">
						<button type="button" id="button-year" class="btn dropdown-toggle" style="background-color:#FFFFFF;border:0;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							อายุตึก <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="radio" class="sPYear" name="sPYear" value="" <?if($PYear=='' || $PYear==0){echo "checked";}?> data-checkbox-text="ไม่ระบุ"> ไม่ระบุ </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sPYear" name="sPYear" value="1" <?if($PYear==1){echo "selected";}?> data-checkbox-text="อายุตึก <1ปี"> อายุตึก <1ปี</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sPYear" name="sPYear" value="3" <?if($PYear==3){echo "selected";}?> data-checkbox-text="อายุตึก <3ปี"> อายุตึก <3ปี</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sPYear" name="sPYear" value="5" <?if($PYear==5){echo "selected";}?> data-checkbox-text="อายุตึก <5ปี"> อายุตึก <5ปี</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sPYear" name="sPYear" value="10" <?if($PYear==10){echo "selected";}?> data-checkbox-text="อายุตึก <10ปี"> อายุตึก <10ปี</label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="sPYear" name="sPYear" value="-10" <?if($PYear==-10){echo "selected";}?> data-checkbox-text="อายุตึก >10ปี"> อายุตึก >10ปี</label></li>
						</ul>
					</div>
				</div>
			</div>
			<hr class="visible-xs blank">
			<div class="w20-sm pull-left hidden-xs padding-t-ipad">
				<div class="pull-left w45 padding-t3 text-center padding-l5-clear hidden-sm">
					<input type="text" value="" id="minPrice" name="minPrice" placeholder="ราคาต่ำสุด" class="form-control">  
				</div>
				<div class="pull-left w5 padding-t6 text-right padding-t3 text-center padding-none hidden-sm">
					-
				</div>
				<div class="pull-left w45 padding-t3 text-center border-right-sm padding-r5-clear hidden-sm">
					<input type="text" value="" id="maxPrice" name="maxPrice" placeholder="ราคาสูงสุด" class="form-control">
				</div>
				<div class="btn bg-white col-xs-8 visible-sm pull-left border-right">
					<div class="btn-group padding-none text-center">
						<button type="button" id="" class="btn dropdown-toggle text-grey"  style="background-color:#FFFFFF;border:0; margin:0; padding:0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							เลือกงบ <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="0" data-checkbox-text="ไม่ระบุ"> ไม่ระบุงบ </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="1" data-checkbox-text="< 1ล้าน"> < 1ล้าน </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="2" data-checkbox-text="1-2 ล้าน"> 1-2 ล้าน </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="3" data-checkbox-text="2-3 ล้าน"> 2-3 ล้าน </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="4" data-checkbox-text="3-5 ล้าน"> 3-5 ล้าน </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="5" data-checkbox-text="5-10 ล้าน"> 5-10 ล้าน </label></li>
							<li>&nbsp;&nbsp;<label><input type="radio" class="showprice_ipad" name="showprice_ipad" value="6" data-checkbox-text="> 10 ล้าน"> > 10 ล้าน </label></li>
						</ul>
					</div>
				</div>


				<div class="pull-left w3  text-center padding-t2 padding-l5-clear">                   
					<button id="down" type="button" class="btn btn-sm2 bg-white padding-none"  disabled>อื่นๆ</button>
					<!--new menu nov17-->
					<div class="row display-none">
						<div class="col-lg-12">
							<div class="button-group">
								<button type="button" class="btn btn-default dropdown-toggle borderless3  text-grey padding-t5" data-toggle="dropdown"><strong>อื่นๆ</strong> <span class="caret"></span></button>
								<ul class="dropdown-menu list-inline">
									<li>ห้องน้ำ</li>
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


		<!-- Upper Display's Space Control -->
		<div id="q-filterbar-spacecontroll" class="col-xs-12 absolute-0-h"></div>
		<div class="col-xs-12 nopadding"><!--remove class row-->
			<!-- start map -->
			<!-- <div class="col-md-8 padding-none" style="position: fixed;min-height:100%; height:100%;">-->
			<div class="w70x col-md-8-search">
				<?php //echo $map['html']; ?>
				<div id="wrapper_map">
					<div id="map_canvas" class="border-grey2" style="z-index:100px;"></div>

					<!--Select menu-->


					<div class="map-float-menu hidden-xs">
						<div class="unitcounter2">
							<span id="unitcounter" class="padding-none font18"></span>
						</div>
						<div class="nOptSearch-container">
							<div class="nOptSearch-btn pointer" onclick="f_nOptSearch(1)" data-noptsearch='1'>
								<span class="glyphicon glyphicon-triangle-right"></span>จำนวนประกาศ
							</div>
							<div class="nOptSearch-btn pointer" onclick="f_nOptSearch(2)" data-noptsearch='2'>
								<span class="glyphicon glyphicon-triangle-right"></span>ปีสร้างเสร็จ
							</div>
							<?php if($checkAdmin==1){
								?>
								<div class="nOptSearch-btn pointer" onclick="f_nOptSearch(3)" data-noptsearch='3'>
									<span class="glyphicon glyphicon-triangle-right"></span>จำนวนยูนิต
								</div>
								<?
							}?>
							<div class="nOptSearch-btn pointer" onclick="f_nOptSearch(4)" data-noptsearch='4'>
								<span class="glyphicon glyphicon-triangle-right"></span>ค่าส่วนกลาง
							</div>
							<div class="nOptSearch-btn pointer" onclick="f_nOptSearch(7)" data-noptsearch='7'>
								<ch='7'>
								<span class="glyphicon glyphicon-triangle-right"></span>ราคาต่ำสุด-สูงสุด
							</div>
							<div class="nOptSearch-btn pointer" onclick="f_nOptSearch(8)" data-noptsearch='8'>
								<span class="glyphicon glyphicon-triangle-right"></span>รถไฟฟ้าใกล้สุด(กม.)
							</div>
						</div>
						<div id="float_menu4" class="hidden-xs blue-tooltip" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['unit_tooltip'][0];?>">
							<span id="nprice" class="td-grey text-center"><?=$unit_baht;?></span>
							<span id="npricem" class="text-center">บาท/ม&sup2 </span>
						</div>
					</div>	


<!-- 					<div id="float_menu5" class="text-center hidden-xs hidden-sm">
						<select id="nOptSearch" class="form-control input-md no-border text-center td-grey blue-tooltip" data-style="btn-noborder" data-width="100%" data-toggle="tooltip" data-placement="right" title="<?=$qLabel['optsearch_tooltip'][0];?>">
							<option value="0" disabled="disabled" class="text-center text-blue pull-left"><h3>ข้อมูลโครงการ</h3></option>
							<option value="1" selected="selected" class="pull-left"><h4>จำนวนประกาศ</h4></option>
							<option value="2" class="pull-left">ปีสร้างเสร็จ</option>
							<?php if($checkAdmin==1){?>
								<option value="3" class="pull-left">จำนวนยูนิต</option>
								<?
							}?>
							<option value="4" class="pull-left">ค่าส่วนกลาง</option>
							<option value="7" class="pull-left">ราคาต่ำสุด-สูงสุด</option>
							<option value="8" class="pull-left">รถไฟฟ้าใกล้สุด(กม.)</option>
						</select> 
					</div> -->
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
				<div  id="xmarket-info-show-ipad" class="display-none text-center "><span id="" class="glyphicon glyphicon-signal text-orange cursor" width="5px" aria-hidden="true"></span></div>
				<div id="market_div" style="height:110px;box-shadow:none;" class="hidden-xs">
					<button type="button" class="btn-close market-close text-grey2 hidden-sm" onclick="showMarket();">
						<span id="bt_resize2" class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<!--ipad-->
					
		            <button type="button" class="btn-close market-close2 text-grey2 visible-sm">
						<span id="bt_resize-ipad" class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>		
					</button>
				
					<!--end-->

					<div id="market-detail" class="market-info">
						<div class="col-md-12 text-center padding-none padding-top10 padding-bottom5">
							<h3 class="market-detail1 text-orange padding-none">สรุปตลาดคอนโด <span id="mk_distance"><?=number_format($distance_length/1000,0);?></span> กม. รอบ <span id="mk_point"><?=$namePoint;?></span>

							</h3>
						</div>
						<div class="col-md-4 col-sm-4 text-center padding-bottom5">

							<div>
								<h3 class="market-detail2 text-turq3 padding-none padding-bottom5">อุปทาน&nbsp;<span id="mk_info_unit_now"><!--Unit Now--></span> ยูนิต</h3>
							</div>

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

							<div><h3 class="market-detail2 text-turq3 padding-none padding-bottom5">ราคาเฉลี่ย <span id="mk_info_unit_sale_m2"> N/A </span></h3></div>
							<div class="font18">
								
								<span class="text-grey">ค่าเช่าเฉลี่ย <span id="mk_info_unit_rent_m2"> N/A </span></span>
							</div>

						</div>

						<!--end hide market detail-->
						<div class="clearfix"></div>

					</div>


				</div>			
			</div>

			

			<div class="clearfix"></div>
			<div id="showWarning-inactive" class="col-md-12 text-center display-none"><b>* หน้านี้จะแสดงผลได้ดี ก็ต่อเมื่อแสดงผลในแนวนอน</b></div>

			<div class="w30x col-md-4-result padding-none clear-padding-lr padding-t10x" id="searchmapsidebar">

				<!--filter box for mobile-->
				<div class="text-left display-none" style="width:100%;background-color:orange; padding-left:8px; padding: 5px 0px;height:40px;">
					<div class="col-xs-3 col-sm-2 col-lg-2 nowrap text-right text-white" style="line-height:30px;">เรียงตาม</div>
					<div class="col-xs-5 col-sm-8 col-lg-7 nopadding" style="line-height:30px;">
						<select id="sOrder_mb" class="col-xs-12 input-sm no-border padding-none small2" data-style="btn-noborder" data-width="auto">									
							<option class="small2" disabled="disabled" value="">เรียงตาม..</option>
							<option class="small2" value="0">ชื่อโครงการ</option>
							<option class="small2" value="1">ราคา ต่ำ-สูง</option>
							<option class="small2" value="8">ราคา สูง-ต่ำ</option>
							<option class="small2" value="2">ราคา/ตร.ม. ต่ำ-สูง</option>
							<option class="small2" value="3">ราคา/ตร.ม. สูง-ต่ำ</option>
							<option class="small2" value="4">ปีสร้างเสร็จ ใหม่-เก่า</option>
							<option class="small2" value="5">ระยะจากจุดที่ค้นหา</option>
							<option class="small2" value="6">ระยะจากรถไฟฟ้า</option>
							<option class="small2" value="7">จำนวนห้องนอน</option>
						</select>
					</div>		
					<!--b-list-->
					<div id="show_listing" class="col-xs-4 col-sm-2 col-lg-3 blue-tooltip text-right nowrap" style="line-height:30px;" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['list_tooltip'][0];?>">
						<button type="button" id="picture_listing2" class="btn nopadding" style="background-color:transparent;" aria-label="Left Align">
							<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-large text-white" aria-hidden="true"></span></a>
						</button>
						<button type="button" id="data_listing2" class="btn nopadding" style="background-color:transparent;" aria-label="Left Align">
							<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-list text-white" aria-hidden="true"></span></a>
						</button>
					</div>	
				</div>

				<!--end filter box-->

				<!--wrapper-->
				<div class="hidden-xs" id="searchmapshowcase" style="position: fixed; left: 70%;z-index: 100;width: 30%;">
					<!--banner-->
					<div id="cImgBanner" class="heightratio bg-grey3 text-center hidden-sm hidden-xs" style="width: 100%;">
						Banner
					</div>
					<!--end banner-->
					<!--orange box-->
					<div class="text-left padding-none filter-hide-mobile visible-lg visible-md hidden-sm" style="width:100%;background-color:orange; padding-left:8px; padding: 5px 0px;height:40px;">
						<div id="market_cont" class="pull-left text-white market_cont_box display-none">
							<span class="text-white big-menumap padding-none" id="mk_unit"><!--Area Unit--></span>
							<span class="text-white small13">ยูนิต&nbsp;&nbsp;</span><span class="text-white small13 hidden-sm hidden-md">เฉลี่ย </span><span class="text-white big-menumap hidden-sm hidden-md">฿</span><span class="text-white big-menumap hidden-sm hidden-md" id="mk_square"><!--Square Price--></span><span class="text-white small13 hidden-sm hidden-md">&nbsp;/ม&sup2 </span>
						</div>
						<div class="col-xs-12 nopadding">
							<!--end-b-list-->								
							<div class="col-xs-3 col-lg-2 nowrap text-right text-white" style="line-height:30px;">เรียงตาม</div>
							<div class="col-xs-5 col-lg-7 nopadding" style="line-height:30px;">
								<select id="sOrder" class="col-xs-12 input-sm no-border padding-none small2 pointer hidden-sm" data-style="btn-noborder" data-width="auto">									
									<option class="small2" disabled="disabled" value="">เรียงตาม..</option>
									<option class="small2" value="0">ชื่อโครงการ</option>
									<option class="small2" value="1">ราคา ต่ำ-สูง</option>
									<option class="small2" value="8">ราคา สูง-ต่ำ</option>
									<option class="small2" value="2">ราคา/ตร.ม. ต่ำ-สูง</option>
									<option class="small2" value="3">ราคา/ตร.ม. สูง-ต่ำ</option>
									<option class="small2" value="4">ปีสร้างเสร็จ ใหม่-เก่า</option>
									<option class="small2" value="5">ระยะจากจุดที่ค้นหา</option>
									<option class="small2" value="6">ระยะจากรถไฟฟ้า</option>
									<option class="small2" value="7">จำนวนห้องนอน</option>
								</select>
							</div>		
							<!--b-list-->
							<div id="show_listing" class="col-xs-4 col-lg-3 blue-tooltip text-right nowrap" style="line-height:30px;" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['list_tooltip'][0];?>">
								<button type="button" id="picture_listing" class="btn nopadding" style="background-color:transparent;" aria-label="Left Align">
									<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-large text-white" aria-hidden="true"></span></a>
								</button>
								<button type="button" id="data_listing" class="btn nopadding" style="background-color:transparent;" aria-label="Left Align">
									<a href="#" class="btn-lg padding-none"><span class="glyphicon glyphicon-th-list text-white" aria-hidden="true"></span></a>
								</button>
							</div>						
						</div>
					</div>
					<!--endbox-->			
					<div id="cImgUnitsMobile" class="padding-none" style="background-color:#FFFFFF;padding:0;"></div>						
					<div id="cListTableHead" class="padding-none"></div>
				</div>
				<!--endwrapper-->

				<input name="POID" id="POID" type="hidden" value="" >
				<!--<span id="mobile_resize" class="glyphicon glyphicon glyphicon-remove padding-none cursor pull-right text-grey2 w2 display-none" aria-hidden="false"></span>-->

				<!--<div id='cImgUnits' class="padding-none margin-t40xs"></div>-->

		<!--<div id="table_listing" class="padding-none hidden-xs col-md-12" style="padding:0;">
			<div id='cImgUnits2' class="padding-none fixed4 hidden-xs hidden-sm" style="margin-top:43px;background-color:#ffffff;padding:0;"></div>
			<div id="cListUnits" class="padding-none hidden-xs units_margin_top padding-top-large" style="z-index:1;height:auto;overflow-y: auto;padding:0;"></div>
		</div>-->
		
		<div id="cListUnitsMobile" class="col-md-12 padding-none hidden-sm"></div>
		<div id="cImgUnitsMobile2" class="col-md-12 col-xs-12 padding-none q-sooth hidden-sm" style="background-color:#FFFFFF;padding:0;margin-top:94px;position: fixed;top:0px;left:0px;"></div>
		<div id="" class="padding-none visible-sm" style="width:100%;background-color:#FFFFFF;padding:0;margin-top:94px;position: fixed;bottom:0px;left:0px;">
		   

			<div id="cImgBanner2" class="col-sm-6 thumb-ipad-height padding-none">Banner</div>
			<div id="cListUnitsMobile2" class="col-sm-6 padding-none thumb-ipad-height"></div>
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
<!-- for Dev -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
<!-- for Production -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.23&key=AIzaSyCtVQu_lH0VTmN4d_f2clThtixIAgakva4&amp;sensor=false"></script>-->
<?php 
$this->usermenu->inc_file('jquery-ui.min.js','js');
$this->usermenu->inc_file('bootstrap-select.min.js','js');
$this->usermenu->inc_file('markerwithlabel.min.js','js');
$this->usermenu->inc_file('quicksilver.min.js','js');
$this->usermenu->inc_file('jquery.quickselect.min.js','js');
$this->usermenu->inc_file('bootstrap-multiselect.js','js');
$this->usermenu->inc_file('jquery.easing.1.3.js','js');
$this->usermenu->inc_file('jquery.mouseSwipe.js','js');

$this->usermenu->inc_file('mouseSwipe.css','css');
$this->usermenu->inc_file('maplabel.min.css','css');
$this->usermenu->inc_file('bootstrap-multiselect.css','css');
$this->usermenu->inc_file('modal_loader.css','css');
?>

<script type="text/javascript">
	$('#myModal').modal(options);
</script>
<script type="text/javascript">
var firstload=1;
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
    
    /*added june24*/
    $(".showfilter-bt").click(function(){
		$(".filter").slideDown('slow', function(){ 
			$(".log").text('');
		});
		$("#wrapper_map" ).hide();
		$(".lunderNav" ).hide();
		$(".navbar" ).hide();
		$(".hidebar" ).hide();
		$(".hidebar2" ).hide();
		$("#cImgUnits" ).hide();
		$("#cImgUnits2" ).hide();
		$("#cListUnits" ).hide();
		$('.filter').removeClass('filter-fold');
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$('#cImgUnitsMobile2').addClass('display-none');
		$(".filter-hide-mobile" ).hide();
		$(".margin-t50").hide();
		$(".heightratio3").hide();
	});
     
     /*added june24*/
	 $(".order_mb-bt").click(function(){
		$(".order-box").slideDown('slow', function(){ 
			$(".log").text('');
		});
		$("#wrapper_map" ).hide();
		$(".lunderNav" ).hide();
		$(".navbar" ).hide();
		$(".hidebar" ).hide();
		$(".hidebar2" ).hide();
		$("#cImgUnits" ).hide();
		$("#cImgUnits2" ).hide();
		$("#cListUnits" ).hide();
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$('#cImgUnitsMobile2').addClass('display-none');
		$(".filter-hide-mobile" ).hide();
		$(".margin-t50").hide();
		$(".heightratio3").hide();
	});

	/*added june24*/
	$(".budget_mb-bt").click(function(){
		$(".budget-box").slideDown('slow', function(){ 
			$(".log").text('');
		});
		$("#wrapper_map" ).hide();
		$(".lunderNav" ).hide();
		$(".navbar" ).hide();
		$(".hidebar" ).hide();
		$(".hidebar2" ).hide();
		$("#cImgUnits" ).hide();
		$("#cImgUnits2" ).hide();
		$("#cListUnits" ).hide();
		$('#cImgUnits').addClass('display-none');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$('#cImgUnitsMobile2').addClass('display-none');
		$(".filter-hide-mobile" ).hide();
		$(".margin-t50").hide();
		$(".heightratio3").hide();
	});
	
    /*added june24*/
	$(".show_idetail-bt").click(function(){
		$(".idetail").slideDown( 'fast', function(){ 
			$(".log").text('');
		});
		$(".lunderNav" ).hide();
		$(".navbar" ).hide();
		$(".hidebar" ).hide();   
		$(".margin-t50" ).hide();
		$("#wrapper_map" ).hide();
		$('.idetail').removeClass('filter-fold');
		$('#cImgUnitsMobile').addClass('display-none');
		$('#cListUnitsMobile').addClass('display-none');
		$('#cImgUnitsMobile2').addClass('display-none');
	});
	/*end added june24*/

	$("#hidefilter").click(function(){
		$(".filter").slideUp( 'slow', function(){
			$(".log").text('');
		});
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();			
		$('.filter').addClass('filter-fold');
		if($('#nListing_ref').val()==1){
			if($('#mapShow_ref').val()==1){
				$('#wrapper_map').show();
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').addClass('display-none');
			}else{
				$('.heightratio3').show();
				$('#cImgUnitsMobile').removeClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').removeClass('display-none');
			}
		}else{
			$('.heightratio3').show();
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#cImgUnitsMobile2').removeClass('display-none');
		}
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
		var tTransType = '';
		var tSale = '';
		var propType = '';
		var nBed = '';
		var nBath = '';
		var nYear = '';
		$('#iDistance_ref').val($('#iDistance_mb').val());
		$('#sTransDist_ref').val($('#sTransDist_mb').val());
		$('.sTransType_mb').each(function(){
			if($(this).is(':checked')){
				var transtype = $(this).val();
				tTransType += transtype+',';
			}
		});
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
		$('#sTransType_ref').val(tTransType);
		$('#sTypeSale_ref').val(tSale);
		$('#sPropType_ref').val(propType);
		$('#sNBdroom_ref').val(nBed);
		$('#sNBtroom_ref').val(nBath);
		$('#sPYear_ref').val(nYear);
		if($('#iDistance_default').val()!=$('#iDistance_ref').val() || $('#sTransDist_default').val()!=$('#sTransDist_ref').val() || $('#sTransType_default').val()!=$('#sTransType_ref').val() || $('#sTypeSale_default').val()!=$('#sTypeSale_ref').val() || $('#sPropType_default').val()!=$('#sPropType_ref').val() || $('#sNBdroom_default').val()!=$('#sNBdroom_ref').val() || $('#sNBtroom_default').val()!=$('#sNBtroom_ref').val() || $('#sPYear_default').val()!=$('#sPYear_ref').val()){
			$('#checkfilter').removeClass('display-none');
		}else{
			$('#checkfilter').addClass('display-none');
		}
		updateSearch();
	});

	$("#hidefilter2").click(function(){
		$(".filter").slideUp( 'slow', function(){ 
			$(".log").text('');
		});
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();
		$('.filter').addClass('filter-fold');
		if($('#nListing_ref').val()==1){
			if($('#mapShow_ref').val()==1){
				$('#wrapper_map').show();
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').addClass('display-none');
				$('#cImgUnitsMobile2').addClass('display-none');
			}else{
				$('.heightratio3').show();
				$('#cImgUnitsMobile').removeClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').removeClass('display-none');
			}
		}else{
			$('.heightratio3').show();
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#cImgUnitsMobile2').removeClass('display-none');
		}
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
	});

	$("#hideidetail").click(function(){
		$(".idetail").slideUp( 'fast', function(){ 
			$(".log").text('');
		});

		$('.idetail').addClass('filter-fold');
		/* set to not show on list*/
		$( "#wrapper_map" ).show();
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();
		$( ".margin-t50" ).show();
		$( ".heightratio3").show();

	});
	$("#hideidetail2").click(function(){
		$(".idetail").slideUp( 'fast', function(){ 
			$(".log").text('');
		});

		$('.idetail').addClass('filter-fold');
		$( "#wrapper_map" ).show();
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".heightratio3").show();
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


    /*New*/

	$("#hideorder").click(function(){
		$(".order-box").slideUp( 'slow', function(){
			$(".log").text('');
		});
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();			
		$('.order-box').addClass('display-none');
		if($('#nListing_ref').val()==1){
			if($('#mapShow_ref').val()==1){
				$('#wrapper_map').show();
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').addClass('display-none');
			}else{
				$('.heightratio3').show();
				$('#cImgUnitsMobile').removeClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').removeClass('display-none');
			}
		}else{
			$('.heightratio3').show();
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#cImgUnitsMobile2').removeClass('display-none');
		}
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
		$('.sOrder_mb').each(function(){
			if($(this).is(':checked')){
				$('#sOrder_ref').val($(this).val());
			}
		});
		setTimeout(getImageUnit);
	});
	$("#hideorder2").click(function(){
		$(".order-box").slideUp( 'slow', function(){
			$(".log").text('');
		});
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();			
		$('.order-box').addClass('display-none');
		if($('#nListing_ref').val()==1){
			if($('#mapShow_ref').val()==1){
				$('#wrapper_map').show();
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').addClass('display-none');
			}else{
				$('.heightratio3').show();
				$('#cImgUnitsMobile').removeClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').removeClass('display-none');
			}
		}else{
			$('.heightratio3').show();
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#cImgUnitsMobile2').removeClass('display-none');
		}
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
	
	});

	$("#hidebudget2").click(function(){
		$(".budget-box").slideUp( 'slow', function(){
			$(".log").text('');
		});
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();			
		$('.budget-box').addClass('display-none');
		if($('#nListing_ref').val()==1){
			if($('#mapShow_ref').val()==1){
				$('#wrapper_map').show();
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').addClass('display-none');
			}else{
				$('.heightratio3').show();
				$('#cImgUnitsMobile').removeClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').removeClass('display-none');
			}
		}else{
			$('.heightratio3').show();
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#cImgUnitsMobile2').removeClass('display-none');
		}
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
	
	});

	$("#hidebudget").click(function(){
		$(".budget-box").slideUp( 'slow', function(){
			$(".log").text('');
		});
		$( ".navbar" ).show();
		$( ".hidebar" ).show();
		$( ".hidebar2" ).show();			
		$('.budget-box').addClass('display-none');
		if($('#nListing_ref').val()==1){
			if($('#mapShow_ref').val()==1){
				$('#wrapper_map').show();
				$('#map_canvas').removeClass('map_resize_smaller');
				$('#map_canvas').addClass('map_resize_small');
				$('#cImgUnits').addClass('display-none');
				$('#cImgUnitsMobile').addClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').addClass('display-none');
			}else{
				$('.heightratio3').show();
				$('#cImgUnitsMobile').removeClass('display-none');
				$('#cListUnitsMobile').removeClass('display-none');
				$('#cImgUnitsMobile2').removeClass('display-none');
			}
		}else{
			$('.heightratio3').show();
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#cImgUnitsMobile2').removeClass('display-none');
		}
		$( ".margin-t50" ).show();
		$( ".filter-hide-mobile" ).show();
		$('.showprice').each(function(){
			if($(this).is(':checked')){
				nPriceList=$(this).val();
			}
		});
		if(nPriceList==0){minPrice=0;maxPrice=0;}
		if(nPriceList==1){minPrice=0;maxPrice=1000000;}
		if(nPriceList==2){minPrice=1000000;maxPrice=2000000;}
		if(nPriceList==3){minPrice=2000000;maxPrice=3000000;}
		if(nPriceList==4){minPrice=3000000;maxPrice=5000000;}
		if(nPriceList==5){minPrice=5000000;maxPrice=10000000;}
		if(nPriceList==6){minPrice=10000000;maxPrice=0;}
		$('#minPrice_ref').val(minPrice);
		$('#maxPrice_ref').val(maxPrice);
		$('#minPrice_mb').val(minPrice);
		$('#maxPrice_mb').val(maxPrice);
		setTimeout(updateSearch);
	});
   /****/

});

function SearchListPositionControl(){

	FilterBarSpaceController();

	var state_a = 0;
	var state_b = 0;

	if($('#mobile_detect').val()==0){
		var devicetype = 'desktop';	
		var state_a = ($('#searchmapshowcase').outerHeight());
	} else {
		var devicetype = 'mobile';
		var member = ["#header-navbar", "#mapmenu-mb"];		
		var header_height = GetHeight('outer',member);

		if($('#nListing_ref').val()==1){
			// pic thumbnail top range
			$("#cListUnitsMobile").css('top','0px');
		}
		if($('#nListing_ref').val()==2){
			// list table top range
			var state_a = ($('#cImgUnitsMobile2').outerHeight());
			// list thumbnail top range
			$("#cImgUnitsMobile2").css('top',header_height);				
		}
		// map mobile resize
		var devicearealeft = (window.screen.height) - header_height - 20;
	}
	$("#cListUnitsMobile").css('margin-top',state_a);
	$("#cImgUnitsMobile2").css('margin-top',state_b);
}
function GetHeight(area,member){	
	// Calculate Height
	var total_height = 0;
	for (var i = member.length - 1; i >= 0; i--) {
		if (area == 'outer') {
			total_height += $(member[i]).outerHeight();
		}
		if (area == 'inner') {
			total_height += $(member[i]).innerHeight();
		}		
	}
	return total_height;
}
function FilterBarSpaceController() {
	var filterbarheight = $('#mapmenu').innerHeight();
	if (filterbarheight < 10) {
		filterbarheight = $('#mapmenu-mb').innerHeight()+2;
	}
	// $("#debug-box").html(filterbarheight);
	$('#q-filterbar-spacecontroll').css('margin-top',filterbarheight);
}
function MapResize(){

	var member = ["#header-navbar", "#mapmenu"];
	var header_height = GetHeight('outer',member);

	if($('#mobile_detect').val()==0){
		if((window.innerWidth) >= 780){
			var y_usedspace = header_height+$('#market_div').outerHeight();
			var devicearealeft = (window.innerHeight) - y_usedspace;
			$("#map_canvas").css('height',devicearealeft);
		} else {
			$("#map_canvas").css('height','50%');
		}
	} else {
		var devicearealeft = (window.screen.height) - header_height - 20;
		$("#map_canvas").css('height',devicearealeft);
	}
}
$(window).resize(function(){
	SearchListPositionControl();
	MapResize();
});
window.setInterval(function(){
	SearchListPositionControl();
	MapResize();
}, 500);

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

$(function(){
	var np = $('#namePoint').val();
	var tad = $('#toAd').val();
	tad = parseInt(tad);
	
	if(np){
		$('#iRefPlace').val(np);
		$('#iRefPlace_mb').val(np);
		$('#iRefPlace_ref').val(np);
	}
	$('#table_listing').hide();
	$('#iDistance_mb').val($('#iDistance_ref').val());
	//var defaultDistancetxt = $('.iDistance:checked').attr('data-checkbox-text');
	var defaultDistancetxt=($('#iDistance_ref').val()/1000)+' km';
	$('.button-distance').html(defaultDistancetxt+' <span class="caret"></span>');
	var defaultSale="";
	var defaultSaletxt="";
	$('.sTypeSale:checkbox:checked').each(function(){
		var dsale = $(this).val();
		var dsaletxt = $(this).attr('data-checkbox-text');
		defaultSale += dsale+',';
		defaultSaletxt += dsaletxt+',';
	});
	if(defaultSaletxt!=''){
		var n=defaultSaletxt.length;
		var dSaletxt=defaultSaletxt.substr(0,n-1);
		$('#button-typesale').html(dSaletxt+' <span class="caret"></span>');
		$('#button-typesale').addClass('filteractive');
	}else{
		$('#button-typesale').html('ประเภทประกาศ <span class="caret"></span>');
		$('#button-typesale').removeClass('filteractive');
	}
	$('#sTypeSale_ref').val(defaultSale);
	var defaultProp="";
	var defaultProptxt="";
	$('.sPropType:checkbox:checked').each(function(){
		var dprop = $(this).val();
		var dproptxt = $(this).attr('data-checkbox-text');
		defaultProp += dprop+',';
		defaultProptxt += dproptxt+',';
	});
	if(defaultProptxt!=''){
		var n=defaultProptxt.length;
		var dProptxt=defaultProptxt.substr(0,n-1);
		$('#button-typeprop').html(dProptxt+' <span class="caret"></span>');
		$('#button-typeprop').addClass('filteractive');
	}else{
		$('#button-typeprop').html('ประเภทอสังหา <span class="caret"></span>');
		$('#button-typeprop').removeClass('filteractive');
	}
	var nTrans = $('input[name="sTransDist"]:checked').val();
	if(nTrans != ''){
		nTrans = (nTrans/1000)+" .กม";
		$('#button-stransdist').html(nTrans+' <span class="caret"></span>');
		$('#button-stransdist').addClass('filteractive');
	}else{
		$('#button-stransdist').html('ระยะจากรถไฟฟ้า <span class="caret"></span>');
		$('#button-stransdist').removeClass('filteractive');
	}

	var tBed='';
	var tBedtxt='';
	$('.sNBdroom:checkbox:checked').each(function(){
		var bed = $(this).val();
		var bedtxt = $(this).attr('data-checkbox-text');
		tBed += bed+',';
		tBedtxt += bedtxt+',';
	});
	if(tBedtxt!=''){
		var n=tBedtxt.length;
		tBedtxt=tBedtxt.substr(0,n-1);
		$('#button-bedroom').html(tBedtxt+' <span class="caret"></span>');
		$('#button-bedroom').addClass('filteractive');
	}else{
		$('#button-bedroom').html('ห้องนอน <span class="caret"></span>');
		$('#button-bedroom').removeClass('filteractive');
	}

	$('#sPropType_ref').val(defaultProp);
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
		//$('#nListing_ref').val('1');
		//$('#cImgUnits').addClass('display-none');
		//$('#cImgUnitsMobile').addClass('display-none');
		//$('#cListUnitsMobile').addClass('display-none');
		$('#map_canvas').addClass('display-none');
		s.src = "/js/markerclusterer_compiled.js";
	}else{
		s.src = "/js/markerclustererplus.min.js";
		/*$('#nOptSearch').tooltip('show');
		$('#float_menu4').tooltip('show');
		$('#show_listing').tooltip('show');
		$(document).on('shown.bs.tooltip', function (e) {
			setTimeout(function () {
				$(e.target).tooltip('hide');
			}, 30000);
		});*/
		$('#map_canvas').addClass('map_resize_small');
		var windowWidth=window.innerWidth;
		var windowHeight=window.innerHeight;
		var windowRatio=windowWidth/windowHeight;
		if(windowRatio<1.33){
			$('#cImgBanner').hide();
			$('#cImgUnitsMobile').hide();
			$('#cImgUnitsMobile2').hide();
			//$('#cListUnitsMobile').css('margin-top:0px;');
			$('#showWarning').removeClass('display-none');
			$('#showTb1').addClass('display-none');
			$('#showTb2').removeClass('display-none');
		}
		window.addEventListener('orientationchange', function () {
			var windowWidth=window.innerWidth;
			var windowHeight=window.innerHeight;
			var windowRatio=windowWidth/windowHeight;
			if(windowRatio<1.33){
				$('#cImgBanner').hide();
				$('#cImgUnitsMobile').hide();
				$('#cImgUnitsMobile2').hide();
				//$('#cListUnitsMobile').css('margin-top:0px;');
				$('#showWarning').removeClass('display-none');
				$('#showTb1').addClass('display-none');
				$('#showTb2').removeClass('display-none');
				if( /iPad/i.test(navigator.userAgent) ) {
					displayImgUnitsMobile('mapIpad',0,1,0);
					displayImgBannerIpad();
				}
			}else{
				$('#cImgBanner').show();
				$('#cImgUnitsMobile').show();
				$('#cImgUnitsMobile2').show();
				//$('#cListUnitsMobile').css('margin-top:64vw;');
				$('#showWarning').addClass('display-none');
				$('#showTb1').removeClass('display-none');
				$('#showTb2').addClass('display-none');
				if( /iPad/i.test(navigator.userAgent) ){
					displayImgUnitsMobile('list_pic',0,1,0);
				}
			}
			/*if (window.orientation == -90) {
				document.getElementById('orient').className = 'orientright';
			}
			if (window.orientation == 90) {
				document.getElementById('orient').className = 'orientleft';
			}
			if (window.orientation == 0) {
				document.getElementById('orient').className = '';
			}*/
		}, true);
	}
	$("head").append(s);
	//firstSearch();
	updateSearch();
});

$('.iDistance').change(function(){
	$('#iDistance_ref').val($(this).val());
	var defaultDistancetxt = $(this).attr('data-checkbox-text');
	$('.button-distance').html(defaultDistancetxt+' <span class="caret"></span>');
	setTimeout(updateSearch);
});
$('#iDistance').keypress(function(e) {
	if(e.keyCode==13){
		$('#iDistance_ref').val($('#iDistance').val());
		setTimeout(updateSearch);
	}
});
$('.sTypeSale').change(function(){
	var tSale='';
	var tSaletxt='';
	var tSelect=$(this).val();
	if(tSelect==1 || tSelect==2 || tSelect==8){
		$('.sTypeSale:checkbox[value=5]').prop('checked',false);
		$('.sTypeSale:checkbox[value=6]').prop('checked',false);
		$('.sTypeSale:checkbox[value=7]').prop('checked',false);
	}
	if(tSelect==5){
		$('.sTypeSale:checkbox[value=1]').prop('checked',false);
		$('.sTypeSale:checkbox[value=2]').prop('checked',false);
		$('.sTypeSale:checkbox[value=6]').prop('checked',false);
		$('.sTypeSale:checkbox[value=7]').prop('checked',false);
		$('.sTypeSale:checkbox[value=8]').prop('checked',false);
	}
	if(tSelect==6){
		$('.sTypeSale:checkbox[value=1]').prop('checked',false);
		$('.sTypeSale:checkbox[value=2]').prop('checked',false);
		$('.sTypeSale:checkbox[value=5]').prop('checked',false);
		$('.sTypeSale:checkbox[value=7]').prop('checked',false);
		$('.sTypeSale:checkbox[value=8]').prop('checked',false);
	}
	if(tSelect==7){
		$('.sTypeSale:checkbox[value=1]').prop('checked',false);
		$('.sTypeSale:checkbox[value=2]').prop('checked',false);
		$('.sTypeSale:checkbox[value=5]').prop('checked',false);
		$('.sTypeSale:checkbox[value=6]').prop('checked',false);
		$('.sTypeSale:checkbox[value=8]').prop('checked',false);
	}
	$('.sTypeSale:checkbox:checked').each(function(){
		var sale = $(this).val();
		var saletxt = $(this).attr('data-checkbox-text');
		tSale += sale+',';
		tSaletxt += saletxt+',';
	});
	$('#sTypeSale_ref').val(tSale);
	if(tSaletxt!=''){
		var n=tSaletxt.length;
		tSaletxt=tSaletxt.substr(0,n-1);
		$('#button-typesale').html(tSaletxt+' <span class="caret"></span>');
		$('#button-typesale').addClass('filteractive');
	}else{
		$('#button-typesale').html('ประเภทประกาศ <span class="caret"></span>');
		$('#button-typesale').removeClass('filteractive');
	}
	setTimeout(updateSearch,1500);
});
$('.sPropType').change(function(){
	var tProp='';
	var tProptxt='';
	$('.sPropType:checkbox:checked').each(function(){
		var prop = $(this).val();
		var proptxt = $(this).attr('data-checkbox-text');
		tProp += prop+',';
		tProptxt += proptxt+',';
	});
	$('#sPropType_ref').val(tProp);
	if(tProptxt!=''){
		var n=tProptxt.length;
		tProptxt=tProptxt.substr(0,n-1);
		$('#button-typeprop').html(tProptxt+' <span class="caret"></span>');
		$('#button-typeprop').addClass('filteractive');
	}else{
		$('#button-typeprop').html('ประเภทอสังหา <span class="caret"></span>');
		$('#button-typeprop').removeClass('filteractive');
	}
	setTimeout(updateSearch,1500);
});
$('.sNBdroom').change(function(){
	var tBed='';
	var tBedtxt='';
	$('.sNBdroom:checkbox:checked').each(function(){
		var bed = $(this).val();
		var bedtxt = $(this).attr('data-checkbox-text');
		tBed += bed+',';
		tBedtxt += bedtxt+',';
	});
	$('#sNBdroom_ref').val(tBed);
	if(tBedtxt!=''){
		var n=tBedtxt.length;
		tBedtxt=tBedtxt.substr(0,n-1);
		$('#button-bedroom').html(tBedtxt+' <span class="caret"></span>');
		$('#button-bedroom').addClass('filteractive');
	}else{
		$('#button-bedroom').html('จำนวนห้องนอน <span class="caret"></span>');
		$('#button-bedroom').removeClass('filteractive');
	}
	setTimeout(updateSearch,1500);
});
$('.sNBtroom').change(function(){
	var tBath='';
	var tBathtxt='';
	$('.sNBtroom:checkbox:checked').each(function(){
		var bath = $(this).val();
		var bathtxt = $(this).attr('data-checkbox-text');
		tBath += bath+',';
		tBathtxt += bathtxt+',';
	});
	$('#sNBtroom_ref').val(nBath);
	if(tBathtxt!=''){
		var n=tBathtxt.length;
		tBathtxt=tBathtxt.substr(0,n-1);
		$('#button-bathroom').html(tBedtxt+' <span class="caret"></span>');
		$('#button-bathroom').addClass('filteractive');
	}else{
		$('#button-bathroom').html('จำนวนห้องน้ำ <span class="caret"></span>');
		$('#button-bathroom').removeClass('filteractive');
	}
	setTimeout(updateSearch,1500);
});
$('.sTransDist').change(function(){
	nTrans = $('input[name="sTransDist"]:checked').val();
	$('#sTransDist_ref').val(nTrans);
	if(nTrans != ''){
		nTrans = (nTrans/1000)+" กม";
		$('#button-stransdist').html(nTrans+' <span class="caret"></span>');
		$('#button-stransdist').addClass('filteractive');
	}else{
		$('#button-stransdist').html('ระยะจากรถไฟฟ้า <span class="caret"></span>');
		$('#button-stransdist').removeClass('filteractive');
	}
	setTimeout(updateSearch);
});
$('.sTransType').change(function(){
	var nTransType='';
	$('input[name="sTransType"]:checked').each(function(){
		var transtype = $(this).val();
		nTransType += transtype+',';
	});
	$('#sTransType_ref').val(nTransType);
	setTimeout(updateSearch);
});
$('.sPYear').change(function(){
	nYear = $('input[name="sPYear"]:checked').val();
	$('#sPYear_ref').val(nYear);
	if(nYear != ''){
		nYear = nYear+" ปี";
		$('#button-year').html(nYear+' <span class="caret"></span>');
		$('#button-year').addClass('filteractive');
	}else{
		$('#button-year').html('อายุตึก <span class="caret"></span>');
		$('#button-year').removeClass('filteractive');
	}
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
function f_nOptSearch(svar){
	$('#nOptSearch_ref').val(svar);
	setTimeout(updateContentMarker);
}
$('#picture_listing').click(function(){
	if($('#nListing_ref').val()!=1){
		$('#nListing_ref').val('1');
		//$('#table_listing').hide();
		//setTimeout(displayImgUnits);
		displayImgUnitsMobile('list_pic',0,1,0);
	}
	SearchListPositionControl();
});
$('#data_listing').click(function(){
	if($('#nListing_ref').val()!=2){
		$('#nListing_ref').val('2');
		//$('#table_listing').show();
		//setTimeout(displayImgUnits);
		displayImgUnitsMobile('list_data',0,1,0);
		displayImgUnitsMobile2('list_data',0);
	}
	SearchListPositionControl();
});
$('#picture_listing2').click(function(){
	if($('#nListing_ref').val()!=1){
		$('#nListing_ref').val('1');
		//$('#table_listing').hide();
		//setTimeout(displayImgUnits);
		displayImgUnitsMobile('list_pic',0,1,0);
	}
	SearchListPositionControl();
});
$('#data_listing2').click(function(){
	if($('#nListing_ref').val()!=2){
		$('#nListing_ref').val('2');
		//$('#table_listing').show();
		//setTimeout(displayImgUnits);
		displayImgUnitsMobile('list_data',0,1,0);
		displayImgUnitsMobile2('list_data',0);
	}
	SearchListPositionControl();
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
	if(returnSearch[0].Type=='Project'){
		var setzoom=18;
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
				if(returnSearch[i].CenterMinPrice==0){
					lcontent = "<div style='display:table;'>0 ประกาศ</div>";
					var lanchor = new google.maps.Point(24, 37);
					var centerLatLng=cLatLng;
					var centerName=returnSearch[i].CenterName;
				}else{
					var centerLatLng=pLatLng;
					var centerName=returnSearch[i].ProjectName;
				}
				var marker = new MarkerWithLabel({
					position: centerLatLng,
					map: map,
					icon: goldStar,
					labelContent: lcontent,
					labelAnchor: lanchor,
					labelClass: labelstyle, // the CSS class for the label
					zIndex: zindex_val+i,
					title: centerName
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
		
		if(returnSearch[i].ProjectName){
			attachProjectDetail(markerArray[i],returnSearch[i].ProjectName,pLatLng,lcontent,i);
		}else{
			if(i!=0){
				attachProjectDetail(markerArray[i],refPl,cLatLng,'',contentMobile[i],i);
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
			$('#mobile_map_banner').hide();
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
		// $('#market_div').show('blind',500);
		$('#market_div').removeClass('market-div-hidden');
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
	marker.addListener('click',function(evt){
		//mSendPIDToGetImg(i);
		//map.panTo(latlng);
		if($('#mobile_detect').val()==1){
			$('#cImgUnits').removeClass('display-none');
			$('#cImgUnitsMobile').removeClass('display-none');
			$('#cListUnitsMobile').removeClass('display-none');
			$('#mobile_resize').removeClass('display-none');
			$('#map_canvas').removeClass('map_resize_small');
			$('#map_canvas').addClass('map_resize_smaller');
			displayImgUnitsMobile('map',i,1,0);
		}else{
			sortSearchResult(i);
		}
		//changeColorIcon(this,i);
	});
	if($('#mobile_detect').val()==0){
		marker.addListener('mouseover',function(){
			infowindow.open(marker.get('map'),marker);
			changeSizeIcon(i,'1');
		});
		marker.addListener('mouseout',function(){
			infowindow.close();
			changeSizeIcon(i,'0');
		});
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

/*Main Search*/
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
	var nTransType = $('#sTransType_ref').val();
	var nYear = $('#sPYear_ref').val();
	var minP = $('#minPrice_ref').val();
	var maxP = $('#maxPrice_ref').val();
	var minA = $('#minArea_ref').val();
	var maxA = $('#maxArea_ref').val();
	var Order = $('#sOrder_ref').val();
	var nowyear = $('#nowyear').val();
	var url_link = $('#url_link').val();
	var refPl2 = refPl.split(' ').join('_').replace('&','-and-');
	var refPl2 = refPl2.replace('/','-sl-');
	var propType2 = propType.split(',').join('-');
	var tSale2 = tSale.split(',').join('-');
	var nBed2 = nBed.split(',').join('-');
	var nBath2 = nBath.split(',').join('-');
	var nTransType2 = nTransType.split(',').join('-');
	if(minP==''){minP2=0;}else{minP2=minP;}
	if(maxP==''){maxP2=0;}else{maxP2=maxP;}
	if(nBed==''){nBed2=0;}
	if(nBath==''){nBath2=0;}
	if(nTransDist==''){nTransDist2=0;}else{nTransDist2=nTransDist;}
	if(nYear==''){nYear2=0;}else{nYear2=nYear;}
	if(minA==''){minA2=0;}else{minA2=minA;}
	if(maxA==''){maxA2=0;}else{maxA2=maxA;}
	var txt_link="/Zhome/searchResult/0/"+refPl2+"/"+minP2+"/"+maxP2+"/"+dist+"/"+tSale2+"/"+propType2+"/"+nBed2+"/"+nBath2+"/"+nTransDist2+"/"+nTransType2+"/"+nYear2+"/"+minA2+"/"+maxA2;
	var new_url_link=url_link+txt_link;
	
	$.when($.getJSON("/zhome/getUpdateMarker",{ viewmode:1,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,TransType:nTransType,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,minArea:minA,maxArea:maxA,Order:Order }),
	$.getJSON("/zhome/getUpdateMarker",{ viewmode:2,distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,TransType:nTransType,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,minArea:minA,maxArea:maxA,Order:Order }),
	$.getJSON("/zhome/getImageBanner",{ viewtype:'searchmap',distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,TransType:nTransType,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }),
	$.getJSON("/zhome/getImageBanner",{ viewtype:'searchmapunit',distance:dist,namePoint:refPl,TOProperty:propType,Bedroom:nBed,Bathroom:nBath,TransDist:nTransDist,TransType:nTransType,Year:nYear,TOAdvertising:tSale,minPrice:minP,maxPrice:maxP,Order:Order }),
	$.getJSON("/zhome/getMarketCont",{ namepoint:refPl,distance:dist,advertising:tSale,nowyear:nowyear,proptype:propType,bedroom:nBed,bathroom:nBath,transdist:nTransDist,TransType:nTransType,age:nYear,minPrice:minP,maxPrice:maxP,minArea:minA,maxArea:maxA })
	).then(function(json1,json2,json3,json4,json5){
		returnSearch = json1[0];
		imgUnits = json2[0];
		imgBanner = json3[0];
		imgBannerUnit = json4[0];
		market_cont = json5[0];
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
		displayImgBannerIpad();
		if(imgUnits.length==1 && (imgUnits[0].POID==undefined) || imgUnits[0].POID=== null){
			$('#cImgUnitsMobile').empty();
			$('#cImgUnitsMobile2').empty();
			$('#cListUnitsMobile').empty();
			$('#cListUnitsMobile2').empty();
			$('#cListTableHead').empty();
		}else{
			if(returnSearch[0].ProvinceSearch==0){
				$('#iDistance').prop('disabled','disabled');
				$('#iDistance_mb').prop('disabled','disabled');
				if($('#mobile_detect').val()==0){
					var distanceMax=parseInt(returnSearch[0].DistanceMax);
					if(distanceMax>=30000){var setzoom=10;
					}else if(distanceMax<30000 && distanceMax>=20000){var setzoom=11;
					}else if(distanceMax<20000 && distanceMax>=10000){var setzoom=12;
					}else if(distanceMax<10000 && distanceMax>=5000){var setzoom=13;
					}else if(distanceMax<5000 && distanceMax>=3000){var setzoom=14;
					}else if(distanceMax<3000 && distanceMax>=1000){var setzoom=15;
					}else{var setzoom=16;}
					//setzoom-=1;
					map.setZoom(setzoom);
					//drawCircle.setRadius(4000);
				}
			}else{
				$('#iDistance').prop('disabled',false);
				$('#iDistance_mb').prop('disabled',false);
			}
			if(returnSearch[0].Type=='Project'){
				$('#sOrder').val(5);
				$('#sOrder_ref').val(5);
			}
			var windowWidth=window.innerWidth;
			var windowHeight=window.innerHeight;
			var windowRatio=windowWidth/windowHeight;
			if( /iPad/i.test(navigator.userAgent) ) {
				list='mapIpad';
				if(windowRatio>=1.33){
					list='list_pic';
				}
			}else if($('#nListing_ref').val()==1){
				list='list_pic';
				if($('#mapShow_ref').val()==1){
					list='map';
				}
			}else if($('#nListing_ref').val()==2){
				list='list_data';
			}
			if($('#mobile_detect').val()==0){//not mobile
				//displayImgUnits();
				displayImgUnitsMobile(list,0,1,0);
				if(list=='list_data'){
					displayImgUnitsMobile2(list,0);
				}
			}else{
				displayImgUnitsMobile(list,0,1,1);
				if(list=='list_data'){
					displayImgUnitsMobile2(list,0);
				}
				if(list=='map'){
					displayImgBannerMobile();
				}
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
			//var area_unit=market_cont.AreaUnit;
			var area_unit=imgUnits.length;
		}
		var info_mb=area_unit+' ลิสต์ '
		if(dist<1){
			distance_show = '< '+Math.ceil(dist);
		}else{
			distance_show=dist.toFixed(1);
		}
		var UnitNow = market_cont.ProjectUnit_untilnow;
		var UnitTotal = market_cont.ProjectUnit_total;
		var UnitFuture = market_cont.ProjectUnit_future;
		var UnitPercent = market_cont.Projectunit_percent;
		var PriceSale = market_cont.MeanPriceSale;
		if(PriceSale==0){PriceSale='N/A';}
		var PriceRent = market_cont.MeanPriceRent;
		if(PriceRent==0){PriceRent='N/A';}
		$("#mk_distance").text(distance_show);
		$("#mk_point").text(market_cont.AreaName);
		$('#unitcounter').text(area_unit+' ยูนิต');
		$('#unitcounter_mb').text(area_unit+' ยูนิต');
		$("#mk_square").text(market_cont.AreaSqPrice);
		$("#mk_info_unit_sale_m2").text(PriceSale);
		$("#mk_info_unit_rent_m2").text(PriceRent);
		
		$("#mk_unit_mb").text(info_mb);
		
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
	if($('#nListing_ref').val()==1){
		list='list_pic';
	}else{
		list='list_data';
	}
	if($('#mobile_detect').val()==0){//not mobile
		//displayImgUnits();
		displayImgUnitsMobile(list,0,1,0);
		if(list=='list_data'){
			displayImgUnitsMobile2(list,0);
		}
	}else{
		//displayImgUnitsMobile();
		displayImgUnitsMobile(list,0,1,1);
		if(list=='list_data'){
			displayImgUnitsMobile2(list,0);
		}
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
	var windowWidth=window.innerWidth;
	var windowHeight=window.innerHeight;
	var windowRatio=windowWidth/windowHeight;
	if( /iPad/i.test(navigator.userAgent) && windowRatio<1.33){
		list=3;
	}else{
		list=1;
	}
	if(list==1){
		if($('#mobile_detect').val()==1){
			$('#cImgUnitsMobile2').find('div.item').each(function(){
				if(returnSearch[n].PID==$(this).attr('data-project-id')){
					swapToFirst($(this));
				}
			});
		}else{
			$('#cListUnitsMobile').find('div.item').each(function(){
				if(returnSearch[n].PID==$(this).attr('data-project-id')){
					x=$(this).find('.idImg').val();
				}
			});
			displayImgUnitsMobile('list_pic',x,1,0);
			$('#cListUnitsMobile').find('div.item').each(function(){
				if(returnSearch[n].PID==$(this).attr('data-project-id')){
					swapToFirst($(this));
				}
			});
		}
	}else if(list==2){
		if($('#cListUnitsMobile').find('div.unit-show').first().attr('data-project-id')!=returnSearch[n].PID){
			$('#cListUnitsMobile').find('div.unit-show').each(function(){
				if(returnSearch[n].PID==$(this).attr('data-project-id')){
					x=$(this).find('.idImg').val();
				}
			});
			displayImgUnitsMobile('list_data',x,1,0);
			displayImgUnitsMobile2('list_data',x);
			$('#cListUnitsMobile').find('div.unit-show').each(function(){
				if(returnSearch[n].PID==$(this).attr('data-project-id')){
					swapToFirst($(this));
				}
			});
		}
	}else if(list==3){
		$('#cListUnitsMobile2').find('div.item').each(function(){
			if(returnSearch[n].PID==$(this).attr('data-project-id')){
				x=$(this).find('.idImg').val();
			}
		});
		displayImgUnitsMobile('mapIpad',x,1,0);
		$('#cListUnitsMobile2').find('div.item').each(function(){
			if(returnSearch[n].PID==$(this).attr('data-project-id')){
				swapToFirst($(this));
			}
		});
	}
	$(window).scrollTop(0);
}

function swapToFirst(elem){
	hilightImgUnit(elem);
	var list=$('#nListing_ref').val();
	var windowWidth=window.innerWidth;
	var windowHeight=window.innerHeight;
	var windowRatio=windowWidth/windowHeight;
	if( /iPad/i.test(navigator.userAgent) && windowRatio<1.33){
		list=3;
	}else{
		list=1;
	}
	if(list==1){
		//elem.insertBefore($("#cImgUnits").children().first());
		if($('#mobile_detect').val()==1){
			elem.insertBefore($("#cImgUnitsMobile2").find('div .item').first());
		}else{
			elem.insertBefore($("#cListUnitsMobile").find('div .item').first());
		}
	}else if(list==2){
		//elem.insertBefore($("#cListUnits").children().first());
		//$("#cListUnits").scrollTop(0);
		elem.insertAfter($("#cListUnitsMobile .list-show"));
		$("#cListUnitsMobile").scrollTop(0);
	}else if(list==3){
		elem.insertBefore($("#cListUnitsMobile2").find('div .item').first());
	}
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
		$("#hideidetail").click();
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
	$('.nOptSearch-btn').each(function(){
		if (optsearch == '' && $(this).attr('data-noptsearch') == 1) {
			$(this).addClass('activated');
		} else 
		if($(this).attr('data-noptsearch') == optsearch){
			$(this).addClass('activated');
		} else {
			$(this).removeClass('activated');
		}
	});
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
	if(optsearch!=''){
		$('#nOptSearch_ref').val(optsearch);
	}
	$("#hideidetail").click();
	updateContentMarker();
}

function checkLabelPosition(Advertising,optSearch,contentLength,contentLowerLength){
	if(Advertising==5){
		val=10;
		if(contentLength>=7){
			val=21;
		}else if(contentLength==6){
			val=18;
		}else if(contentLength==5){
			val=15;
		}else if(contentLength==4){
			val=13;
		}
		if(contentLowerLength==3){
			val-=1;
		}else if(contentLowerLength==4){
			if(contentLength>=6){
				//val+=1;
			}else if(contentLength==1 || contentLength==2){
				val+=4;
			}else{
				val+=1;
			}
		}else if(contentLowerLength>=5){
			val+=(contentLowerLength-1);
		}
		if(contentLength<contentLowerLength){
			if(contentLowerLength==2){
				val-=3;
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
				val=17;
			}else if(contentLowerLength==7){
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
		return obj.CamFee;
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

function check_typesale(Tsale){
	if(Tsale==5){
		$('.sTypeSale_mb:checkbox[value=1]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=2]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=6]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=7]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=8]').prop('checked',false);
	}
	if(Tsale==6){
		$('.sTypeSale_mb:checkbox[value=1]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=2]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=5]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=7]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=8]').prop('checked',false);
	}
	if(Tsale==7){
		$('.sTypeSale_mb:checkbox[value=1]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=2]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=5]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=6]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=8]').prop('checked',false);
	}
	if(Tsale==1 || Tsale==2 || Tsale==8){
		$('.sTypeSale_mb:checkbox[value=5]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=6]').prop('checked',false);
		$('.sTypeSale_mb:checkbox[value=7]').prop('checked',false);
	}
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
	checkRefPlaceType();
}

function checkRefPlaceType(){
	var RefPlace=$('#iRefPlace_ref').val();
	$.ajax({
		type:'POST',
		url:'/zhome/checkRefPlaceType',
		data:{RefPlace:RefPlace},
		dataType:'html',
		success:function(data){
			if(data=='Project'){
				$('#iDistance_ref').val(500);
				$('input:radio[name="iDistance"][value="500"]').prop('checked',true);
				$('#iDistance_mb').val(500);
				$('.button-distance').html(0.5+' km <span class="caret"></span>');
			}else{
				$('#iDistance_ref').val(3000);
				$('input:radio[name="iDistance"][value="3000"]').prop('checked',true);
				$('#iDistance_mb').val(3000);
				$('.button-distance').html(3.0+' km <span class="caret"></span>');
			}
			updateSearch();
		}
	});
}

function showMarket(){
	// $('#market_div').hide('blind',500);
	$('#market_div').addClass('market-div-hidden');
	$('#map_canvas').removeClass('map_resize_small');
	$('#map_canvas').addClass('map_resize_full');
	$('#bt_resize').css('display','');

	MapResize();
}
</script>
<?php $qMarker=$this->search->qMarker();
?>
<script type="text/javascript" language="javascript">
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
		$(".market-close2").click(function(){
			$("#market_div").hide( 'fast', function(){});
			$(".market-info").hide( 'fast', function(){});
			$("#market-info-close").hide( 'fast', function(){});
			$(".market-close2").hide( 'fast', function(){});
			$('#map_canvas').switchClass('map_resize_small','map_resize_full',1000,'swing');         
			$("#xmarket-info-show-ipad").show( 'fast', function(){});
		});
       
        $("#xmarket-info-show-ipad").click(function(){
        	$("#market_div").show( 'fast', function(){});
			$(".market-info").show( 'fast', function(){});
			$("#market-info-close").show( 'slow', function(){});
			$(".market-close2").show( 'slow', function(){});
			$('#map_canvas').switchClass('map_resize_full','map_resize_small',1000,'swing');
			$("#xmarket-info-show-ipad").hide( 'slow', function(){});
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

function displayImgUnitsMobile(type,n,mode,showbanner){
	var pref=$('#price_ref').val();
	var order=$('#sOrder_ref').val();
	var imgNode = "";
	var imgNode_thead = "";
	var count=0;
	var i=-1;
	$('#cImgUnitsMobile').empty();
	$('#cImgUnitsMobile2').empty();
	if($('#mobile_detect').val()==0){
		var openLink='target="_blank"';
	}else{
		var openLink='';
	}
	//if(imgUnits[0].Type!='Project'){
		if(mode==1){
			imgUnits.sort(function(a, b){
				if(order==0){
					var a1= a.ProjectName, b1= b.ProjectName;
				}else if(order==1){
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
				}else if(order==7){
					var a1= parseFloat(a.BedroomNo), b1= parseFloat(b.BedroomNo);
				}else if(order==8){
					var a1= parseFloat(b.Price), b1= parseFloat(a.Price);
				}
				if(a1== b1) return 0;
				return a1> b1? 1: -1;
			});
		}
	//}
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	list_class="heightratio";
	list_style="";
	list_style2="";
	var mobile_banner=0;
	if(type=='list_data'){
		if($('#mobile_detect').val()==1){
			list_class="";
			list_style="width: 100%;height:47.61vw;";
		}else{
		//list_class="hidden-xs hidden-sm";
		//list_style="position: fixed;left:70%;width: 30%;z-index: 9; margin-top:35px;";<!--top desktop thumbnail on list view -->
		//list_style2="position: fixed;left:70%;width: 30%;z-index: 9;";<!--header bar on list view-->
		}
	}else if(type=='list_pic'){
		if($('#mobile_detect').val()==1){
			list_class="res121";
		}
		$('#cListUnitsMobile').empty();
		$('#cListTableHead').empty();
	}
	if(($('#mobile_detect').val()==0 && type!='mapIpad') || ($('#mobile_detect').val()==1 && type!='map')){
		imgNode += '<div id="myCarousel" class="carousel slide'+list_class+'" data-ride="carousel" data-interval="false" >';
		imgNode += '<div class="carousel-inner" role="listbox">';
		if(type=='list_data'){
			var x=n;
			var m=1;
		}else{
			var x=0;
			var m=imgBannerUnit.length;
		}
		if($('#mobile_detect').val()==1 && i==-1 && showbanner==1){
			if(imgBannerUnit.length>0){
				for(b=0;b<m;b++){
					if(imgBannerUnit[b].Favourite==1){
						fav_color='text-pink';
					}else{
						fav_color='text-white';
					}
					imgNode += '<div class="item active '+list_class+' thumbnail-banner infosearchmap" style="border:8px solid #f36b22;overflow:hidden;margin: 0px 0px;background-color:#ffffff; background-image:url('+imgBannerUnit[b].Picture+') ; background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0; '+list_style+'">';
					if(imgBannerUnit[b].POID!='0'){
						imgNode += '<div class="carousel-caption-rt">';
						imgNode += '<div class="infogp-box">';
						imgNode += '<span class="infogp-data">'+imgBannerUnit[b].DateShow+'</span>';
						imgNode += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
						imgNode += '</div>';
						// imgNode += '<span>&middot</span>';
						imgNode += '<div class="infogp-box">';
						imgNode += '<span class="infogp-data">'+imgBannerUnit[b].ViewPost+'</span>';
						imgNode += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
						imgNode += '</div>';
						imgNode += '<div class="infogp-box">';
						imgNode += '<span class="infogp-data">'+imgBannerUnit[b].ViewTel+'</span>';
						imgNode += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
						imgNode += '</div>';	
						imgNode += '<a href="#3" title="Add to Favourite" onclick="updateFavorite('+imgBannerUnit[b].POID+',3);">';
						imgNode += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
						imgNode += '</a>';
						imgNode += '</div>';
						imgNode += '<div class="carousel-caption-bn">';
						imgNode += 'Ad';
						imgNode += '</div>';
					}
					if(imgBannerUnit[b].Link!=''){
						imgNode += '<a href="/'+imgBannerUnit[b].NamePath+'/condo/'+imgBannerUnit[b].PName_en+'/'+imgBannerUnit[b].POID+'" '+openLink+' alt="'+imgBannerUnit[b].AdvertisingName+'-'+imgBannerUnit[b].PropertyName+'-'+imgBannerUnit[b].ProjectNameAnchor+'" style="text-decoration: none;" onclick="updateViewBanner('+imgBannerUnit[b].POID+');">';
					}
					imgNode += '<div class="layer-invisible"></div>';
					imgNode += '<div class="carousel-caption-lb" style="width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
					imgNode += '<div class="infosearchmap-data text-white"><span class="infosearchmap-data">'+imgBannerUnit[b].AdvertisingName+'</span></div>';
					imgNode += '<div class="text-white"><span class="infosearchmap-price dprice '+display_price+'">'+imgBannerUnit[b].PriceShow+'</span><span class="infosearchmap-price dpricesq '+display_pricesq+'">'+imgBannerUnit[b].PricePerSqShow+'</span> | <span class="infosearchmap-data">'+imgBannerUnit[b].Bedroom+'</span> | <span class="infosearchmap-data"> '+imgBannerUnit[b].Bathroom+'</span> | <span class="infosearchmap-data">'+imgBannerUnit[b].useArea+'ม&sup2;</span></div>';
					imgNode += '<div class="text-white"><span class="infosearchmap-data-sub">'+imgBannerUnit[b].ProjectNameCenter+' ('+imgBannerUnit[b].DistName+')</span></div>';
					imgNode += '</div>';
					if(imgBannerUnit[b].Link!=''){
						imgNode += '</a>';
					}
					imgNode += '</div>';
					imgNode += '<div style="padding-bottom:1;"></div>';
				}
				mobile_banner=1;
			}
		}
		for(i=x;i<imgUnits.length;i++){
			if((type=='list_data' && i==x) || (type=='list_pic' && i==count)){
				count++;
				active='active';
				if(imgUnits[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				if(mobile_banner==0 || (mobile_banner==1 && (type=='list_data' && i!=0)) || type=='list_pic'){
					imgNode += '<div class="item '+active+' '+list_class+' infosearchmap" data-project="'+imgUnits[i].ProjectName+'" data-project-id="'+imgUnits[i].PID+'" style="overflow:hidden;margin: 0px 0px;background-color:#ffffff; background-image:url('+imgUnits[i].Picture[0]+') ; background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0; '+list_style+'" onmouseover=focusMapIcon(this,'+i+','+imgUnits[i].PID+',1); onmouseout=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0);>';
					imgNode += '<div class="carousel-caption-rt">';
					imgNode += '<div class="infogp-box">';
					imgNode += '<span class="infogp-data">'+imgUnits[i].DateShow+'</span>';
					imgNode += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
					imgNode += '</div>';
					// imgNode += '<span>&middot</span>';
					imgNode += '<div class="infogp-box">';
					imgNode += '<span class="infogp-data">'+imgUnits[i].ViewPost+'</span>';
					imgNode += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
					imgNode += '</div>';
					imgNode += '<div class="infogp-box">';
					imgNode += '<span class="infogp-data">'+imgUnits[i].ViewTel+'</span>';
					imgNode += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
					imgNode += '</div>';	
					imgNode += '<a href="#3" title="Add to Favourite" onclick="updateFavorite('+imgUnits[i].POID+','+i+');">';
					imgNode += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
					imgNode += '</a>';
					imgNode += '</div>';
					if(imgUnits[i].Active=='81' || imgUnits[i].Active=='82'){
						imgNode += '<div class="carousel-caption-bn2" style="background-color:#FF0000;border:1px solid;border-color:#FFFFFF;">';
						if(imgUnits[i].Active=='81'){imgNode += 'RENT';}else if(imgUnits[i].Active=='82'){imgNode += 'SOLD';}else if(imgUnits[i].BannerStatus=='1'){imgNode += 'Ad';}
						imgNode += '</div>';
					}
					//imgNode += '<a href="/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'/'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
					imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" '+openLink+' alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
					imgNode += '<div class="layer-invisible"></div>';
					imgNode += '<div class="carousel-caption-lb" style="width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
					imgNode += '<div class="text-white"><span class="infosearchmap-data">'+imgUnits[i].AdvertisingName+'</span></div>';
					imgNode += '<div class="text-white"><span class="infosearchmap-price dprice '+display_price+'">'+imgUnits[i].PriceShowNew+'</span><span class="infosearchmap-price dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</span> | <span class="infosearchmap-data">'+imgUnits[i].Bedroom+'</span> | <span class="infosearchmap-data"> '+imgUnits[i].Bathroom+'</span> | <span class="infosearchmap-data">'+imgUnits[i].useArea+'ม&sup2;</span></div>';
					imgNode += '<div class="infosearchmap-data-sub text-white"><span>'+imgUnits[i].ProjectNameCenter+' ('+imgUnits[i].DistName+')</span></div>';
					imgNode += '</div>';
					imgNode += '</a>';
					imgNode += '<input type="hidden" id="favourite_check_'+i+'" value="'+imgUnits[i].Favourite+'">';
					imgNode += '</div>';		
					imgNode += '<div style="padding-bottom:1;"></div>';
					imgNode += '<input type="hidden" class="idImg" value="'+i+'">';
				}
				if(type=='list_data'){
					if($('#mobile_detect').val()==1){
						/* for mobile*/
						imgNode += '<div class="rTable unit-table visible-sm visible-xs nomargin">';
						imgNode += '<div class="rTableHeading">';
						imgNode += '<div class="rTableHead w39 text-primary text-blue text-left">โครงการ</div>';
						imgNode += '<div class="rTableHead w14 text-primary text-blue text-center">รถไฟฟ้า</div>';
						imgNode += '<div class="rTableHead w10 text-primary text-blue text-center">นอน</div>';
						imgNode += '<div class="rTableHead w12 text-primary text-blue text-right">ตร.ม.</div>';
						imgNode += '<div class="rTableHead w10 text-primary text-blue text-right">ชั้น</div>';
						imgNode += '<div class="rTableHead w15 text-primary text-blue text-right dprice '+display_price+'">บาท</div>';
						imgNode += '<div class="rTableHead w15 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</div>';
						imgNode += '</div>';
						imgNode += '</div>';
						/* end mobile*/
					}
				}
			}
		}
		imgNode += '</div>';
		imgNode += '</div>';
	}else if(type=='mapIpad'){
		imgNode += '<div id="pagenum1" class="display-none">1</div>';
		imgNode += '<div class="" style="width:100%;">';
		imgNode += '<div id="mapviewport" class="thumb-ipad-height" onselectstart="return false;">';
		imgNode += '<div id="mapmouseSwipe" class="thumb-ipad-height">';
		for(var i=0;i<imgUnits.length;i++){
			//if(imgUnits[i].PID==returnSearch[n].PID){
				$('#cListUnitsMobile2').empty();
				if(imgUnits[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				imgNode += '<div class="panel item q-mbmap-item thumb-ipad-height infosearchmap" data-project="'+imgUnits[i].ProjectName+'" data-project-id="'+imgUnits[i].PID+'" style="height:23.8vw;background-image:url('+imgUnits[i].Picture[0]+');background-repeat: no-repeat;background-position: center center;background-size:120%; padding-left: 0; padding-right: 0;">';
				imgNode += '<div class="carousel-caption-rt thumb-ipad-height">';
				imgNode += '<div class="infogp-box">';
				imgNode += '<span class="infogp-data">'+imgUnits[i].DateShow+'</span>';
				imgNode += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
				imgNode += '</div>';
				// imgNode += '<span>&middot</span>';
				imgNode += '<div class="infogp-box">';
				imgNode += '<span class="infogp-data">'+imgUnits[i].ViewPost+'</span>';
				imgNode += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
				imgNode += '</div>';
				imgNode += '<div class="infogp-box">';
				imgNode += '<span class="infogp-data">'+imgUnits[i].ViewTel+'</span>';
				imgNode += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
				imgNode += '</div>';	
				imgNode += '<a href="#3" title="Add to Favourite" onclick="updateFavorite('+imgUnits[i].POID+','+i+');">';
				imgNode += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
				imgNode += '</a>';
				imgNode += '</div>';
				imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
				//imgNode += '<div class="layer-invisible"></div>';
				imgNode += '<div class="carousel-caption-lb" style="width:100%; background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				imgNode += '<div class="text-white"><span class="infosearchmap-data">'+imgUnits[i].AdvertisingName+'</span></div>';
				imgNode += '<div class="text-white"><span class="infosearchmap-price dprice '+display_price+'">'+imgUnits[i].PriceShowNew+'</span><span class="infosearchmap-price dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</span> | <span class="infosearchmap-data">'+imgUnits[i].Bedroom+'</span> | <span class="infosearchmap-data"> '+imgUnits[i].Bathroom+'</span> | <span class="infosearchmap-data">'+imgUnits[i].useArea+'ม&sup2;</span></div>';
				imgNode += '<div class="text-white infosearchmap-data-sub"><span>'+imgUnits[i].ProjectNameCenter+' ('+imgUnits[i].DistName+')</span></div>';
				imgNode += '</div>';
				imgNode += '</a>';
				imgNode += '<input type="hidden" id="favourite_check_'+i+'" value="'+imgUnits[i].Favourite+'">';
				imgNode += '</div>';
			//}
		}
		imgNode += '</div>';
		imgNode += '</div>';
		imgNode += '</div>';
	}else{
		imgNode += '<div id="pagenum1" class="display-none">1</div>';
		imgNode += '<div class="res121 q-mbmap-thumbnail">';
		imgNode += '<div id="mapviewport" class="heightratio2" onselectstart="return false;">';
		imgNode += '<div id="mapmouseSwipe" class="heightratio2">';
		for(var i=0;i<imgUnits.length;i++){
			if(type=='map' && imgUnits[i].PID==returnSearch[n].PID){
				$('#cListUnitsMobile').empty();
				if(imgUnits[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				imgNode += '<div class="panel item q-mbmap-item heightratio2 infosearchmap" data-project="'+imgUnits[i].ProjectName+'" data-project-id="'+imgUnits[i].PID+'" style="background-image:url('+imgUnits[i].Picture[0]+');background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0;">';
				imgNode += '<div class="carousel-caption-rt">';
				imgNode += '<div class="infogp-box">';
				imgNode += '<span class="infogp-data">'+imgUnits[i].DateShow+'</span>';
				imgNode += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
				imgNode += '</div>';
				// imgNode += '<span>&middot</span>';
				imgNode += '<div class="infogp-box">';
				imgNode += '<span class="infogp-data">'+imgUnits[i].ViewPost+'</span>';
				imgNode += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
				imgNode += '</div>';
				imgNode += '<div class="infogp-box">';
				imgNode += '<span class="infogp-data">'+imgUnits[i].ViewTel+'</span>';
				imgNode += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
				imgNode += '</div>';	
				imgNode += '<a href="#3" title="Add to Favourite" onclick="updateFavorite('+imgUnits[i].POID+','+i+');">';
				imgNode += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
				imgNode += '</a>';
				imgNode += '</div>';
				imgNode += '<a href="/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'" target="_blank" alt="'+imgUnits[i].AdvertisingName+'-'+imgUnits[i].PropertyName+'-'+imgUnits[i].ProjectNameAnchor+'" style="text-decoration: none;">';
				//imgNode += '<div class="layer-invisible"></div>';
				imgNode += '<div class="carousel-caption-lb" style="width:100%; background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				imgNode += '<div class="text-white"><span class="infosearchmap-data">'+imgUnits[i].AdvertisingName+'</span></div>';
				imgNode += '<div class="text-white"><span class="infosearchmap-price dprice '+display_price+'">'+imgUnits[i].PriceShowNew+'</span><span class="infosearchmap-price dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</span> | <span class="infosearchmap-data">'+imgUnits[i].Bedroom+'</span> | <span class="infosearchmap-data"> '+imgUnits[i].Bathroom+'</span> | <span class="infosearchmap-data">'+imgUnits[i].useArea+'ม&sup2;</span></div>';
				imgNode += '<div class="text-white infosearchmap-data-sub"><span>'+imgUnits[i].ProjectNameCenter+' ('+imgUnits[i].DistName+')</span></div>';
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
	if($('#mobile_detect').val()==0){
		if(type=='mapIpad') {
			$('#cListUnitsMobile2').append(imgNode);
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
		}else if(type=='list_data'){
			$('#cImgUnitsMobile').append(imgNode);
		}else if(type=='list_pic'){
			$('#cListUnitsMobile').append(imgNode);
		}
	}else{
		if(type=='map'){
			$('#cListUnitsMobile').append(imgNode);
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
		}else{
			if(type=='list_data'){
				$('#cImgUnitsMobile2').append(imgNode);
			}else if(type=='list_pic'){
				$('#cListUnitsMobile').append(imgNode);
			}
			//$('#cImgUnitsMobile2').append(imgNode);
		}
	}
	//firstload=0;
}

function displayImgUnitsMobile2(type,n){
	var pref=$('#price_ref').val();
	var listNode = "";
	var listNode_2 = "";
	$('#cListUnitsMobile').empty();
	$('#cListTableHead').empty();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	listNode +=	'<div class="hidden-sm hidden-xs"></div>';
	listNode_2 += '<div id="showTb1">';
	listNode_2 += '<div class="rTable unit-table hidden-sm hidden-xs">';
	listNode_2 += '<div class="rTableHeading">';
	listNode_2 += '<div class="rTableHead w39 text-primary text-blue text-left">โครงการ</div>';
	listNode_2 += '<div class="rTableHead w14 text-primary text-blue text-center">รถไฟฟ้า</div>';
	listNode_2 += '<div class="rTableHead w10 text-primary text-blue text-center">นอน</div>';
	listNode_2 += '<div class="rTableHead w12 text-primary text-blue text-right">ตร.ม.</div>';
	listNode_2 += '<div class="rTableHead w10 text-primary text-blue text-right">ชั้น</div>';
	listNode_2 += '<div class="rTableHead w15 text-primary text-blue text-right dprice '+display_price+'">บาท</div>';
	listNode_2 += '<div class="rTableHead w15 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</div>';
	listNode_2 += '</div>';
	listNode_2 += '</div>';
	listNode_2 += '</div>';
	if ($('#mobile_detect').val()!=1) {
		listNode += '<div id="showTb2">';
		listNode += '<div class="rTable unit-table hidden-md hidden-lg">';
		listNode += '<div class="rTableHeading">';
		listNode += '<div class="rTableHead w39 text-primary text-blue text-left">โครงการ</div>';
		listNode += '<div class="rTableHead w14 text-primary text-blue text-center">รถไฟฟ้า</div>';
		listNode += '<div class="rTableHead w10 text-primary text-blue text-center">นอน</div>';
		listNode += '<div class="rTableHead w12 text-primary text-blue text-right">ตร.ม.</div>';
		listNode += '<div class="rTableHead w10 text-primary text-blue text-right">ชั้น</div>';
		listNode += '<div class="rTableHead w15 text-primary text-blue text-right dprice '+display_price+'">บาท</div>';
		listNode += '<div class="rTableHead w15 text-primary text-blue text-right dpricesq '+display_pricesq+'">บาท/ม&sup2</div>';
		listNode += '</div>';
		listNode += '</div>';
		listNode += '</div>';
	}
	listNode += '<div class="list-show hidden-sm hidden-xs";"></div>';
	listNode += '<div class="rTableBody">';
	for(var i=0;i<imgUnits.length;i++){
		useArea=Math.round(imgUnits[i].useArea);
		listNode += '<div id="'+imgUnits[i].POID+'" class="rTableRow unit-show unit-table hilight_project padding-none;" data-project="'+imgUnits[i].ProjectName+'" data-project-id="'+imgUnits[i].PID+'" onclick=displayImgUnitsMobile("list_data",'+i+',0,0); onmouseover=focusMapIcon(this,'+i+','+imgUnits[i].PID+',1); onmouseout=focusMapIcon(this,'+i+','+imgUnits[i].PID+',0); ondblclick=window.open("/'+imgUnits[i].NamePath+'/condo/'+imgUnits[i].PName_en+'/'+imgUnits[i].POID+'"); onmousedown=ListPanMap('+i+');>';
		listNode += '<div class="rTableCell w39 text-primary text-grey text-left">'+imgUnits[i].ProjectNameCenter+'</div>';
		listNode += '<div class="rTableCell w14 text-primary text-grey text-right">'+imgUnits[i].DistNameList+'</div>';
		listNode += '<div class="rTableCell w10 text-primary text-grey text-right">'+imgUnits[i].BedroomList+'</div>';
		listNode += '<div class="rTableCell w12 text-primary text-grey text-right">'+useArea+'</div>';
		listNode += '<div class="rTableCell w10 text-primary text-grey text-right">'+imgUnits[i].Floor+'</div>';
		listNode += '<div class="rTableCell w15 text-primary text-grey text-right dprice '+display_price+'">'+imgUnits[i].PriceShow+'</div>';
		listNode += '<div class="rTableCell w15 text-primary text-grey text-right dpricesq '+display_pricesq+'">'+imgUnits[i].PricePerSqShow+'</div>';
		listNode += '<input type="hidden" class="idImg" value="'+i+'">';
		listNode += '</div>';
	}
	listNode +='</div>';
	$('#cListUnitsMobile').append(listNode);
	$('#cListTableHead').append(listNode_2);
}

function ListPanMap(num){
	if($('#mobile_detect').val()==0){
		var sLatLng = new google.maps.LatLng(imgUnits[num].Lat,imgUnits[num].Lng);
		map.panTo(sLatLng);
	}
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
	var pref=$('#price_ref').val();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	if(imgBanner.length>0){
		$('#cImgBanner').empty();
		listBanner += '<div id="myCarouselBanner" class="carousel slide carousel-fade" data-ride="carousel" data-interval="20000" data-wrap="true">';
		listBanner += '<div class="carousel-inner" role="listbox">';
		for(var i=0;i<imgBanner.length;i++){
			if(i==0){
				active='active';
			}else{
				active='';
			}
			if(imgBanner[i].POID!='0'){
				if(imgBanner[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				listBanner += '<div class="item '+active+' heightratio thumbnail-banner infosearchmap" style="overflow:hidden;margin: 0px 0px;background-color:#ffffff; background-image:url('+imgBanner[i].Picture+') ; background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0;">';
				listBanner += '<div class="carousel-caption-rt">';
				listBanner += '<div class="infogp-box">';
				listBanner += '<span class="infogp-data">'+imgBanner[i].DateShow+'</span>';
				listBanner += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
				listBanner += '</div>';
				// listBanner += '<span>&middot</span>';
				listBanner += '<div class="infogp-box">';
				listBanner += '<span class="infogp-data">'+imgBanner[i].ViewPost+'</span>';
				listBanner += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
				listBanner += '</div>';
				listBanner += '<div class="infogp-box">';
				listBanner += '<span class="infogp-data">'+imgBanner[i].ViewTel+'</span>';
				listBanner += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
				listBanner += '</div>';	
				listBanner += '<a href="#" title="Add to Favourite" onclick="updateFavorite('+imgBanner[i].POID+',3);">';
				listBanner += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
				listBanner += '</a>';
				listBanner += '</div>';
				listBanner += '<div class="carousel-caption-bn">';
				listBanner += 'Ad';
				listBanner += '</div>';
				if(imgBanner[i].Link!=''){
					listBanner += '<a href="/'+imgBanner[i].NamePath+'/condo/'+imgBanner[i].PName_en+'/'+imgBanner[i].POID+'" target="_blank" alt="'+imgBanner[i].AdvertisingName+'-'+imgBanner[i].PropertyName+'-'+imgBanner[i].ProjectNameAnchor+'" style="text-decoration: none;" onclick="updateViewBanner('+imgBanner[i].POID+');">';
				}
				listBanner += '<div class="layer-invisible"></div>';
				listBanner += '<div class="carousel-caption-lb" style="width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				listBanner += '<div class="text-white"><span class="infosearchmap-data">'+imgBanner[i].AdvertisingName+'</span></div>';
				listBanner += '<div class="text-white"><span class="infosearchmap-price dprice '+display_price+'">'+imgBanner[i].PriceShow+'</span><span class="infosearchmap-price dpricesq '+display_pricesq+'">'+imgBanner[i].PricePerSqShow+'</span> | <span class="infosearchmap-data">'+imgBanner[i].Bedroom+'</span> | <span class="infosearchmap-data"> '+imgBanner[i].Bathroom+'</span> | <span class="infosearchmap-data">'+imgBanner[i].useArea+'ม&sup2;</span></div>';
				listBanner += '<div class="text-white infosearchmap-data-sub"><span>'+imgBanner[i].ProjectNameCenter+' ('+imgBanner[i].DistName+')</span></div>';
				listBanner += '</div>';
				if(imgBanner[i].Link!=''){
					listBanner += '</a>';
				}
				listBanner += '</div>';
			}else{
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

function displayImgBannerIpad(){
	var listBanner = "";
	var pref=$('#price_ref').val();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	if(imgBanner.length>0){
		$('#cImgBanner2').empty();
		listBanner += '<div id="myCarouselBanner2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000" data-wrap="true">';
		listBanner += '<div class="carousel-inner" role="listbox">';
		for(var i=0;i<imgBanner.length;i++){
			if(i==0){
				active='active';
			}else{
				active='';
			}
			if(imgBanner[i].POID!='0'){
				if(imgBanner[i].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				listBanner += '<div class="item '+active+'  thumbnail-banner" style="height: 23.8vw;overflow:hidden;margin: 0px 0px;background-color:#ffffff; background-image:url('+imgBanner[i].Picture+') ; background-repeat: no-repeat;background-position: top center;background-size:100%; padding-left: 0; padding-right: 0;">';
				listBanner += '<div class="carousel-caption-rt">';
				listBanner += '<div class="infogp-box">';
				listBanner += '<span class="infogp-data">'+imgBanner[i].DateShow+'</span>';
				listBanner += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
				listBanner += '</div>';
				// listBanner += '<span>&middot</span>';
				listBanner += '<div class="infogp-box">';
				listBanner += '<span class="infogp-data">'+imgBanner[i].ViewPost+'</span>';
				listBanner += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
				listBanner += '</div>';
				listBanner += '<div class="infogp-box">';
				listBanner += '<span class="infogp-data">'+imgBanner[i].ViewTel+'</span>';
				listBanner += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
				listBanner += '</div>';	
				listBanner += '<a href="#" title="Add to Favourite" onclick="updateFavorite('+imgBanner[i].POID+',3);">';
				listBanner += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
				listBanner += '</a>';
				listBanner += '</div>';
				listBanner += '<div class="carousel-caption-bn">';
				listBanner += 'Ad';
				listBanner += '</div>';
				if(imgBanner[i].Link!=''){
					listBanner += '<a href="/'+imgBanner[i].NamePath+'/condo/'+imgBanner[i].PName_en+'/'+imgBanner[i].POID+'" target="_blank" alt="'+imgBanner[i].AdvertisingName+'-'+imgBanner[i].PropertyName+'-'+imgBanner[i].ProjectNameAnchor+'" style="text-decoration: none;" onclick="updateViewBanner('+imgBanner[i].POID+');">';
				}
				listBanner += '<div class="layer-invisible"></div>';
				listBanner += '<div class="carousel-caption-lb" style="width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				listBanner += '<div class="text-white"><span>'+imgBanner[i].AdvertisingName+'</span></div>';
				listBanner += '<div class="text-white"><span class="font22 dprice '+display_price+'">'+imgBanner[i].PriceShow+'</span><span class="font22 dpricesq '+display_pricesq+'">'+imgBanner[i].PricePerSqShow+'</span> | <span>'+imgBanner[i].Bedroom+'</span> | <span> '+imgBanner[i].Bathroom+'</span> | <span>'+imgBanner[i].useArea+'ม&sup2;</span></div>';
				listBanner += '<div class="text-white font14"><span>'+imgBanner[i].ProjectNameCenter+' ('+imgBanner[i].DistName+')</span></div>';
				listBanner += '</div>';
				if(imgBanner[i].Link!=''){
					listBanner += '</a>';
				}
				listBanner += '</div>';
			}else{
				listBanner += '<div class="item hidden-xs '+active+'">';
				if(imgBanner[i].Link!=''){
					listBanner += '<a href="'+imgBanner[i].Link+'" target="_blank">';
				}
				listBanner += '<img src="'+imgBanner[i].Picture+'" alt="..." style="overflow:hidden;margin: 0px 0px;height: 100%;width:100%; padding-left: 0; padding-right: 0;z-index: 5;">';
				if(imgBanner[i].Link!=''){
					listBanner += '</a>';
				}
				listBanner += '</div>';
			}
		}
		listBanner += '</div>';
		/*listBanner += '<a class="left carousel-control" href="#myCarouselBanner2" role="button" data-slide="prev">';
		listBanner += '<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>';
		listBanner += '<span class="sr-only">Previous</span>';
		listBanner += '</a>';
		listBanner += '<a class="right carousel-control" href="#myCarouselBanner2" role="button" data-slide="next">';
		listBanner += '<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>';
		listBanner += '<span class="sr-only">Next</span>';
		listBanner += '</a>';*/
	}
	listBanner += '</div>';
	$('#cImgBanner2').append(listBanner);
	$('#myCarouselBanner2').carousel().next();
}

function displayImgBannerMobile(){
	var imgNode = "";
	var pref=$('#price_ref').val();
	if(pref==1){
		display_price="";
		display_pricesq="display-none";
	}else{
		display_price="display-none";
		display_pricesq="";
	}
	if($('#mobile_detect').val()==1){
		if(imgBannerUnit.length>0){
			$('#cListUnitsMobile').empty();
			imgNode += '<div id="mobile_map_banner" class="res121 q-mbmap-thumbnail">';
			imgNode += '<div class="heightratio2">';
			for(b=0;b<imgBannerUnit.length;b++){
				if(imgBannerUnit[b].Favourite==1){
					fav_color='text-pink';
				}else{
					fav_color='text-white';
				}
				imgNode += '<div class="item active '+list_class+' thumbnail-banner" style="overflow:hidden;margin: 0px 0px;background-color:#ffffff; background-image:url('+imgBannerUnit[b].Picture+') ; background-repeat: no-repeat;background-position: center center;background-size:100%; padding-left: 0; padding-right: 0;position: relative; '+list_style+'">';
				if(imgBannerUnit[b].POID!='0'){
					imgNode += '<div class="carousel-caption-rt">';
					imgNode += '<div class="infogp-box">';
					imgNode += '<span class="infogp-data">'+imgBannerUnit[b].DateShow+'</span>';
					imgNode += '<img class="infogp-icon" src="/img/sun-s-icon-white.png" style="-webkit-filter: drop-shadow(2px 2px 4px #000);">';
					imgNode += '</div>';
					// imgNode += '<span>&middot</span>';
					imgNode += '<div class="infogp-box">';
					imgNode += '<span class="infogp-data">'+imgBannerUnit[b].ViewPost+'</span>';
					imgNode += '<span width="3px"class="glyphicon glyphicon-eye-open text-white infogp-icon"></span>';
					imgNode += '</div>';
					imgNode += '<div class="infogp-box">';
					imgNode += '<span class="infogp-data">'+imgBannerUnit[b].ViewTel+'</span>';
					imgNode += '<span width="3px" class="glyphicon glyphicon-earphone text-white infogp-icon"></span>';	
					imgNode += '</div>';	
					imgNode += '<a href="#3" title="Add to Favourite" onclick="updateFavorite('+imgBannerUnit[b].POID+',3);">';
					imgNode += '<span id="favourite_show_3" class="infogp-fav glyphicon glyphicon-heart '+fav_color+'" aria-hidden="true" onmouseover=$(this).removeClass("'+fav_color+'");$(this).addClass("text-orange"); onmouseout=$(this).addClass("'+fav_color+'");></span>';
					imgNode += '</a>';
					imgNode += '</div>';
					imgNode += '<div class="carousel-caption-bn">';
					imgNode += 'Ad';
					imgNode += '</div>';
				}
				if(imgBannerUnit[b].Link!=''){
					imgNode += '<a href="/'+imgBannerUnit[b].NamePath+'/condo/'+imgBannerUnit[b].PName_en+'/'+imgBannerUnit[b].POID+'" target="_blank" alt="'+imgBannerUnit[b].AdvertisingName+'-'+imgBannerUnit[b].PropertyName+'-'+imgBannerUnit[b].ProjectNameAnchor+'" style="text-decoration: none;" onclick="updateViewBanner('+imgBannerUnit[b].POID+');">';
				}
				imgNode += '<div class="layer-invisible"></div>';
				imgNode += '<div class="carousel-caption-lb" style="width:100%;background: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.8))">';
				imgNode += '<div class="text-white"><span>'+imgBannerUnit[b].AdvertisingName+'</span></div>';
				imgNode += '<div class="text-white"><span class="font22 dprice '+display_price+'">'+imgBannerUnit[b].PriceShow+'</span><span class="font22 dpricesq '+display_pricesq+'">'+imgBannerUnit[b].PricePerSqShow+'</span> | <span>'+imgBannerUnit[b].Bedroom+'</span> | <span> '+imgBannerUnit[b].Bathroom+'</span> | <span>'+imgBannerUnit[b].useArea+'ม&sup2;</span></div>';
				imgNode += '<div class="text-white font14"><span>'+imgBannerUnit[b].ProjectNameCenter+' ('+imgBannerUnit[b].DistName+')</span></div>';
				imgNode += '</div>';
				if(imgBannerUnit[b].Link!=''){
					imgNode += '</a>';
				}
				imgNode += '</div>';
				imgNode += '<div style="padding-bottom:0;"></div>';
			}
			mobile_banner=1;
			imgNode += '</div>';
			imgNode += '</div>';
		}
	}
	$('#cListUnitsMobile').append(imgNode);
	$("#mobile_map_banner").delay(5000).fadeOut("slow");
}

function updateViewBanner(POID){
	if(POID!=0){
		$.post("/zhome/updateViewBanner", { 'POID':POID,'Page':"searchmap" });
	}
}
</script>

<div class="clearfix"></div>
<div class="modal_loading"></div>

<!--filter box for mobile-->
<div class="row padding-none">
	<div class="col-xs-12 filter filter-fold">
		<div class="q-mbfilter-btng col-xs-12 nopadding">
			<div class="col-xs-6" style="padding:2px">
				<a id="hidefilter2" href="#" class="q-mbfilter-btn q-mbfilter-btnx col-xs-12">ยกเลิก</a>
			</div>
			<div class="col-xs-6" style="padding:2px">
				<a id="hidefilter" href="#" class="q-mbfilter-btn col-xs-12">ตกลง</a>
			</div>
		</div>
		<div class="row padding-none">
		  <div class="col-xs-12">
		    <br>
			<h5>ตัวกรองการค้นหา</h5>
			
		  </div>
		</div>
		
       
		<hr style="padding-bottom:0; margin-bottom:0;">
		
		<div class="row ">
			<div class="col-md-12 ">
				<div class="col-xs-12 mbfilter-header"><h4>ระยะห่างจากจุดที่ค้นหา</h4></div>
				<div class="col-xs-12">
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
		<div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">

		<div class="row ">
			<div class="col-md-12 ">
				<div class="col-xs-12 mbfilter-header"><h4>ระยะห่างจากรถไฟฟ้า</h4></div>				
				<div class="col-xs-12">
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
		<br>
		<div class="row ">
			<div class="col-md-12">
				<div class="col-xs-12" style="margin-left:20px;">
					<label class="checkbox">
						<input type="checkbox" class="sTransType_mb" name="sTransType_mb" value="1" checked><div class="padding-t2">สถานีปัจจุบัน</div>
					</label>
				</div>
				<div class="col-xs-12" style="margin-left:20px;">
					<label class="checkbox">
						<input type="checkbox" class="sTransType_mb" name="sTransType_mb" value="0" checked><div class="padding-t2">สถานีในอนาคต</div>
					</label>
				</div>
			</div>
		
		</div>
		<div class="clearfix"></div>
        <br>
		<hr>

		<div class="row ">
			<div class="col-md-12" style="margin-left:20px;">
				<div class="col-xs-4">
					<label class="checkbox">
						<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[1]" value="1" <?=$Advertising_check1;?> onclick="check_typesale(this.value);"><div class="padding-t2">ขาย</div>
					</label>
				</div>
				<div class="col-xs-4">
					<label class="checkbox">
						<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[2]" value="2" <?=$Advertising_check2;?> onclick="check_typesale(this.value);"><div class="padding-t2">ขายดาวน์</div>
					</label>
				</div>
				<div class="col-xs-4">
					<label class="checkbox">
						<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[6]" value="8" <?=$Advertising_check6;?> onclick="check_typesale(this.value);"><div class="padding-t2">ขายห้องใหม่</div>
					</label>
				</div>
				<div class="col-xs-4">
					<label class="checkbox">
						<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[3]" value="5" <?=$Advertising_check3;?> onclick="check_typesale(this.value);"><div class="padding-t2">เช่า</div>
					</label>
				</div>
			</div>
			<div class="col-md-12 " style="margin-left:20px;">
				<div class="col-xs-4">
					<label class="checkbox">
						<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[4]" value="6" <?=$Advertising_check4;?> onclick="check_typesale(this.value);"><div class="padding-t2">ขายแล้ว</div>
					</label>
				</div>
				<div class="col-xs-4">
					<label class="checkbox">
						<input type="checkbox" class="sTypeSale_mb" name="sTypeSale_mb[5]" value="7" <?=$Advertising_check5;?> onclick="check_typesale(this.value);"><div class="padding-t2">เช่าแล้ว</div>
					</label>
				</div>
			</div>
			
		</div>
		<div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">
		


		<div class="row ">
			<div class="col-md-12 ">

				<div class="col-xs-12 mbfilter-header"><h4>ประเภทอสังหา</h4></div>
				<div class="col-xs-4" style="margin-left:20px;">
					<label class="checkbox">
						<input type="checkbox" class="sPropType_mb" name="sPropType_mb" checked value="1"><div class="padding-t2">คอนโด</div>
					</label>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">
		

		<div class="row ">
			<div class="col-md-12 ">

				<div class="col-xs-12 mbfilter-header"><h4>ห้องนอน</h4></div>
				<div class="col-xs-12" style="margin-left:20px;">
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[1]" value="99"><div class="padding-t2">สตูดิโอ </div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[2]" value="1"><div class="padding-t2">1</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[3]" value="2"><div class="padding-t2">2</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[4]" value="3"><div class="padding-t2">3</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBdroom_mb" name="sNBdroom_mb[5]" value="4"><div class="padding-t2">> 3</div>
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">
		

		<div class="row ">
			<div class="col-md-12 ">
				<div class="col-xs-12 mbfilter-header"><h4>ห้องน้ำ</h4></div>
				<div class="col-xs-12" style="margin-left:20px;">
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[1]" value="1"><div class="padding-t2">1</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[2]" value="2"> <div class="padding-t2">2</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[3]" value="3"> <div class="padding-t2">3</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[4]" value="4"> <div class="padding-t2">4</div>
						</label>
					</div>
					<div class="w20 pull-left">
						<label class="checkbox">
							<input type="checkbox" class="sNBtroom_mb" name="sNBtroom_mb[5]" value="5"> <div class="padding-t2">> 4</div>
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">
	
		<div class="row ">
			<div class="col-md-12 "> 
				<div class="col-xs-12 mbfilter-header"><h4>อายุตึก(ไม่เกิน)</h4></div>
				<div class="col-xs-12">
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
		
		<div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">
		<div class="row">
			<div class="col-xs-12 "> 
				<div class="col-xs-12 mbfilter-header"><h4>ราคา</h4></div>
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
		
       <div class="clearfix"></div>
        <br>
		<hr style="padding-bottom:0; margin-bottom:0;">
		<div class="row">
			<div class="col-md-12 ">
				<div class="col-xs-12 mbfilter-header"><h4>ขนาด (ม2.)</h4></div>
				<div class="col-xs-5 text-center">
					<input type="text" id="minArea_mb" name="minArea_mb" value="" placeholder="ต่ำสุด" width="100%" class="form-control font16">  
				</div>
				<div class="col-xs-2 text-right padding-t3 text-center">
					-
				</div>
				<div class="col-xs-5 text-center">
					<input type="text" id="maxArea_mb" name="maxArea_mb" value="" placeholder="สูงสุด" width="100%" class="form-control font16">
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<br>
		<div class="clearfix"></div>
		<hr>
		<br><br><br>
	</div>

	<!--Added on Nov17-->
	<div class="col-xs-12 idetail filter-fold">
		<div class="q-mbidetail-btng col-xs-12 nopadding">
			<div class="col-xs-6" style="padding:2px">
				<a id="hideidetail2" href="#" class="q-mbidetail-btn q-mbidetail-btnx col-xs-12">ยกเลิก</a>
			</div>
			<div class="col-xs-6" style="padding:2px">
				<a id="hideidetail" href="#" class="q-mbidetail-btn col-xs-12">ตกลง</a>
			</div>
		</div>

		<h5>ข้อมูลบนหมุด</h5>
		<hr>
		<div class="row col-md-12 text-center">
			<div class="mbfilter-header"><h4 class="text-grey">แสดงราคาเป็น</h4></div>
			<div class="col-md-12 list-inline">
				<ul class="nav navbar-nav">
					<li class="showpriceMB td-grey text-center col-xs-6" style="border:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="$('#price_ref').val('1');updateContentMarker_mb('');"><?=$unit_baht;?></a></li>
					<li class="showpriceMB text-center col-xs-6" style="border:1px solid #eeeeee;"><a class="idetail_link" href="#" onclick="$('#price_ref').val('2');updateContentMarker_mb('');">บาท/ม&sup2 </a></li>
				</ul>
			</div>
			<hr>
			<div class="mbfilter-header"><h4 class="text-grey">เลือกข้อมูลโครงการ</h4></div>
			<div class="col-md-12">
				<ul class="nav navbar-nav">
					<li class="contentMb td-grey"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('1');">จำนวนยูนิตที่ลงประกาศ</a></li>
					<li class="contentMb"><a class="idetail_link" href="#" onclick="updateContentMarker_mb('2');">ปีที่สร้างเสร็จ</a></li>
					<?php 
					if($checkAdmin==1){
						?>
						<li><a class="idetail_link" href="#" onclick="updateContentMarker_mb('3');">จำนวนยูนิตทั้งหมด</a></li>
						<?
					}?>
					<li class="contentMb""><a class="idetail_link" href="#" onclick="updateContentMarker_mb('4');">ค่าส่วนกลาง</a></li>
					<li class="contentMb""><a class="idetail_link" href="#" onclick="updateContentMarker_mb('7');">ช่วงราคาต่ำสุด-สูงสุด</a></li>
					<li class="contentMb" "><a class="idetail_link" href="#" onclick="updateContentMarker_mb('8');">ระยะทางจากรถไฟฟ้าใกล้สุด</a></li>
				</ul>
			</div>
		</div>
		<br><br>
	</div>
	<!--End added on Nov17-->
	<!--filter box mobile-->
</div>

<!-- order for mobile-->
<div class="row padding-none display-none order-box">
	<div class="col-xs-12">
		<div class="q-mbfilter-btng col-xs-12 nopadding">
			<div class="col-xs-6" style="padding:2px">
				<a id="hideorder2" href="#" class="q-mbfilter-btn q-mbfilter-btnx col-xs-12">ยกเลิก</a>
			</div>
			<div class="col-xs-6" style="padding:2px">
				<a id="hideorder" href="#" class="q-mbfilter-btn col-xs-12">ตกลง</a>
			</div>
		</div>
		<div class="row padding-none">
			<div class="col-xs-12">
				<br>
				<h3>เรียงตาม</h3>
				<hr style="padding-bottom:10; margin-bottom:0;">
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="0" class="sOrder_mb"><h4 class="margin-t2 text-grey">ชื่อโครงการ</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="1" class="sOrder_mb" checked><h4 class="margin-t2 text-grey">ราคา ต่ำ-สูง</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="8" class="sOrder_mb"><h4 class="margin-t2 text-grey">ราคา สูง-ต่ำ</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="2" class="sOrder_mb"><h4 class="margin-t2 text-grey">ราคา/ตร.ม. ต่ำ-สูง</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="3" class="sOrder_mb"><h4 class="margin-t2 text-grey">ราคา/ตร.ม. สูง-ต่ำ</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="4" class="sOrder_mb"><h4 class="margin-t2 text-grey">ปีสร้างเสร็จ ใหม่-เก่า</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="5" class="sOrder_mb"><h4 class="margin-t2 text-grey">ระยะจากจุดที่ค้นหา</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="6" class="sOrder_mb"><h4 class="margin-t2 text-grey">ระยะจากรถไฟฟ้า</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="optradio" value="7" class="sOrder_mb"><h4 class="margin-t2 text-grey">จำนวนห้องนอน</label>
				</div>
			</div>
		</div>
		<hr style="padding-bottom:0; margin-bottom:0;">
	</div>
</div><!--end order-->

<!-- choose budget for mobile-->
<div class="row padding-none display-none budget-box">
	<div class="col-xs-12">
		<div class="q-mbfilter-btng col-xs-12 nopadding">
			<div class="col-xs-6" style="padding:2px">
				<a id="hidebudget2" href="#" class="q-mbfilter-btn q-mbfilter-btnx col-xs-12">ยกเลิก</a>
			</div>
			<div class="col-xs-6" style="padding:2px">
				<a id="hidebudget" href="#" class="q-mbfilter-btn col-xs-12">ตกลง</a>
			</div>
		</div>
		<div class="row padding-none">
		  <div class="col-xs-12">
		    <br>
			<h3>ระบุงบ</h3>
			<hr style="padding-bottom:10; margin-bottom:0;">
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="0" class="showprice" checked><h4 class="margin-t2 text-grey"> ไม่ระบุงบ</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="1" class="showprice"><h4 class="margin-t2 text-grey"> < 1 ล้าน</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="2" class="showprice"><h4 class="margin-t2 text-grey"> 1-2 ล้าน</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="3" class="showprice"><h4 class="margin-t2 text-grey"> 2-3 ล้าน</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="4" class="showprice"><h4 class="margin-t2 text-grey"> 3-5 ล้าน</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="5" class="showprice"><h4 class="margin-t2 text-grey"> 5-10 ล้าน</h4></label>
				</div>
				<div class="radio padding-t15">
				  <label><input type="radio" name="showprice" value="6" class="showprice"><h4 class="margin-t2 text-grey"> > 10 ล้าน</h4></label>
				</div>
		  </div>
		</div>
		<hr style="padding-bottom:0; margin-bottom:0;">
	</div>
	

	
</div><!--end budget-->



<script type="text/javascript">
//For Mobile
$('.navbar_button').click(function(){
	$('.navbar_icon').toggle();
})
$('#minPrice_mb').change(function(){
	$('#minPrice_ref').val($('#minPrice_mb').val());
	//setTimeout(updateSearch);
});
$('#maxPrice_mb').change(function(){
	$('#maxPrice_ref').val($('#maxPrice_mb').val());
	//setTimeout(updateSearch);
});
$('#minArea_mb').change(function(){
	$('#minArea_ref').val($('#minArea_mb').val());
	//setTimeout(updateSearch);
});
$('#maxArea_mb').change(function(){
	$('#maxArea_ref').val($('#maxArea_mb').val());
	//setTimeout(updateSearch);
});
$('#sOrder_mb').change(function(){
	$('#sOrder_ref').val($('#sOrder_mb').val());
	setTimeout(getImageUnit);
});
$('#sOrder_mb2').change(function(){
	$('#sOrder_ref').val($('#sOrder_mb2').val());
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
		displayImgUnitsMobile('list_pic',0,1,1);
	}
	$('.btn_pict_list').removeClass('text-grey2');
	$('.btn_pict_list').addClass('text-orange2');
	$('.btn_data_list').addClass('text-grey2');
	$('.btn_data_list').removeClass('text-orange2');
	SearchListPositionControl();
});
$('#data_listing_mb').click(function(){
	if($('#nListing_ref').val()!=2){
		$('#nListing_ref').val('2');
		displayImgUnitsMobile('list_data',0,1,1);
		displayImgUnitsMobile2('list_data',0);
	}
	$('.btn_pict_list').addClass('text-grey2');
	$('.btn_pict_list').removeClass('text-orange2');
	$('.btn_data_list').removeClass('text-grey2');
	$('.btn_data_list').addClass('text-orange2');
	SearchListPositionControl();
});
$('#mobile_resize').click(function(){
	//if($('#mobile_detect').val()==1){
		$('#cImgUnits').addClass('display-none');
		$('#mobile_resize').addClass('display-none');
		$('#map_canvas').removeClass('map_resize_smaller');
		$('#map_canvas').addClass('map_resize_small');
	//}
});
$('.showprice_ipad').change(function(){
	nPriceList = $('input[name="showprice_ipad"]:checked').val();
	if(nPriceList==0){minPrice=0;maxPrice=0;}
	if(nPriceList==1){minPrice=0;maxPrice=1000000;}
	if(nPriceList==2){minPrice=1000000;maxPrice=2000000;}
	if(nPriceList==3){minPrice=2000000;maxPrice=3000000;}
	if(nPriceList==4){minPrice=3000000;maxPrice=5000000;}
	if(nPriceList==5){minPrice=5000000;maxPrice=10000000;}
	if(nPriceList==6){minPrice=10000000;maxPrice=0;}
	$('#minPrice_ref').val(minPrice);
	$('#maxPrice_ref').val(maxPrice);
	$('#minPrice_mb').val(minPrice);
	$('#maxPrice_mb').val(maxPrice);
	setTimeout(updateSearch);
});
$('#show_list-btn').click(function(){
	$('#nListing_ref').val('2');
	$('#mapShow_ref').val('0');
	$('#show_list-btn').removeClass('display');
	$('#show_list-btn').addClass('display-none');
	$('#show_map-btn').removeClass('display-none');
	$('#show_map-btn').addClass('display');
	$('#col_show_idetail').removeClass('display');
	$('#col_show_idetail').addClass('display-none2');
	$('#col_show_bedroom').removeClass('display-none2');
	$('#col_show_bedroom').addClass('display');
	$('#sNBdroom2').removeClass('display-none2');
	$('#sNBdroom2').addClass('display');
	$('#map_canvas').addClass('display-none');
	$('#map_canvas').removeClass('map_resize_small');
	$('#map_canvas').removeClass('map_resize_smaller');
	$('#cImgUnitsMobile').removeClass('display-none');
	$('#cImgUnitsMobile2').removeClass('display-none');
	$('#cListUnitsMobile').removeClass('display-none');
	$('#col_showprice').removeClass('display');
	$('#col_showprice').addClass('display-none');
	$('#order_mb').removeClass('display-none');
	$('#order_mb').addClass('display');
	$('#col_sort_filter').removeClass('display-none');
	$('#col_sort_filter').addClass('display');
	$('#mk_unit_mb').removeClass('display-none');
	$('#mk_unit_mb').addClass('display');
	$('#col_list-photo').removeClass('display-none');
	$('#col_list-photo').addClass('display');
	//$('.mb_list_button').removeClass('display-none');
	//$('#picture_listing_mb').click();
	$('.btn_pict_list').addClass('text-gray2');
	$('.btn_pict_list').removeClass('text-orange2');
	$('.btn_data_list').removeClass('text-gray2');
	$('.btn_data_list').addClass('text-orange2');
	$('#budget_mb').removeClass('display');
	$('#budget_mb').addClass('display-none');

	displayImgUnitsMobile('list_data',0,1,1);
	displayImgUnitsMobile2('list_data',0);
});
$('#show_map-btn').click(function(){
	$('#nListing_ref').val('1');
	$('#mapShow_ref').val('1');
	$('#wrapper_map').show();
	$('#show_map-btn').removeClass('display');
	$('#show_map-btn').addClass('display-none');
	$('#show_list-btn').removeClass('display-none');
	$('#show_list-btn').addClass('display');
	$('#col_show_idetail').removeClass('display-none2');
	$('#col_show_idetail').addClass('display');
	$('#col_show_bedroom').removeClass('display');
	$('#col_show_bedroom').addClass('display-none2');
	$('#map_canvas').removeClass('display-none');
	$('#cImgUnitsMobile').addClass('display-none');
	$('#cImgUnitsMobile2').addClass('display-none');
	//$('#cListUnitsMobile').addClass('display-none');
	$('#col_showprice').removeClass('display-none');
	$('#col_showprice').addClass('display');
	$('#order_mb').removeClass('display');
	$('#order_mb').addClass('display-none');
	$('#budget_mb').removeClass('display-none');
	$('#budget_mb').addClass('display');
	$('#col_sort_filter').addClass('display-none');
	$('#mk_unit_mb').addClass('display-none');
	$('#col_list-photo').addClass('display-none');
	//$('.mb_list_button').addClass('display-none');
	updateSearch();
});

$('.showpriceMb').click(function() {
	$('.showpriceMb').removeClass('td-grey');
	$(this).addClass('td-grey');
});
$('.contentMb').click(function() {
	//$('.contentMb').each(function(){}
	$('.contentMb').removeClass('td-grey');
	//$(this).parent().addClass('td-grey').siblings().removeClass('td-grey');
	$(this).addClass('td-grey');
});
</script>
<!--end filter box for mobile-->
<?php $this->session->set_userdata('referred_from', current_url());?>