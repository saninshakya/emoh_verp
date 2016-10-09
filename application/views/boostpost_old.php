<div class="container padding-right-clear padding-left-clear">
	<div class="margin-t50 hidden-sm hidden-xs"></div>

	<aside class="col-md-2 hidden-xs hidden-sm">
		<ul class="nav">
			<li>
				<h4>
					<a href="/zhome/dashboard/owner" id="owner" class="<?php if($type=='owner'){echo "nav-active";}else{echo "text-grey2";}?>">ประกาศของคุณ </a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/favourite" id="favourite" class="<?php if($type=='favourite'){echo "nav-active";}else{echo "text-grey2";}?>">ทรัพย์สินที่สนใจ</a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/lastview" id="lastview" class="<?php if($type=='lastview'){echo "nav-active";}else{echo "text-grey2";}?>">รายการล่าสุด</a>
				</h4>
			</li>
			<!--<br>
			<li class=""><h4><a href="#" id="agent" class="<?php if($type=='agent'){echo "nav-active";}else{echo "text-grey2";}?>">งานนายหน้า</a></h4></li>-->
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/profile" id="profile" class="<?php if($type=='profile'){echo "nav-active";}else{echo "text-grey2";}?>">ข้อมูลส่วนบุคคล</a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/payment" id="profile" class="<?php if($type=='payment'){echo "nav-active";}else{echo "text-grey2";}?>">สั่งซื้อเหรียญ</a>
				</h4>
			</li>
		</ul>
		<div class="h360 hidden-xs"></div>
	</aside>

	<div class="col-md-10 col-sm-12 col-xs-12 padding-none">
<div class="step2 display-none">
Step2
</div> 



<?php
$curyear=date('Y')+1;
	if ($ListPostType1->num_rows()==0){
?>         
        

		
<?php
	} else {
?>
         
           
<?php
	//loop ListPostType1 detail
	foreach ($ListPostType1->result() as $row){
		$POID=$row->POID;
		$Address=$row->Address;
		$RoomNumber=$row->RoomNumber;
		
		$ProjectName=$row->ProjectName;
		$PricePerSqShow=number_format($row->PricePerSq, 0,'',',');
		$OwnerName=$row->OwnerName;
		$queryDistMarker=$this->db->query('Select a.Distance,a.Station,a.Type,b.KeyName from DistMarker a left join KeyMarker b on a.Station=b.KeyID Where a.PID="'.$row->PID.'" and (a.Type="BTS" or a.Type="MRT" or a.Type="BRT" or a.Type="ARL") order by a.Distance limit 1');
		$rowDistMarker=$queryDistMarker->row();
		$Distance=$rowDistMarker->Distance;
		$Distance=$Distance/1000;
		$DistanceList=$Distance;
		$Distance=number_format($Distance,1,'.',',');
		$KeyName=$rowDistMarker->KeyName;
		$DistName=$KeyName." ".$Distance." กม.";
		$Telephone=$row->Telephone1;
		$Active=$row->Active;
		$ActivePrefix="";
		if ($row->Active==81){
			$ActivePrefix="(ให้เช่าแล้ว)";
		}
		if ($row->Active==82){
			$ActivePrefix="(ขายแล้ว)";
		}
		if ($row->Active==92){
			$ActivePrefix="(ประกาศหมดอายุ)";
		}
		if ($row->Active==93){
			$ActivePrefix="(ซ่อนประกาศ)";
		}
		

		if ($Address!=null and $Address!=''){ 
			$prefix=$Address;
		} else {
			$prefix=$RoomNumber;
		};
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==2){
			$Price=$row->DTotalPrice;
			$prefixTOAdv="ขายดาวน์";
			$modal_id="InformSold";
		}else if ($TOAdvertising==5){
			$Price=$row->PRentPrice;
			$prefixTOAdv="เช่า";
			$modal_id="InformRent";
		}else if ($TOAdvertising==1){
			$Price=$row->TotalPrice;
			$prefixTOAdv="ขาย";
			$modal_id="InformSold";
		}
		if ($TOAdvertising=='5'){
			$PriceShow=number_format($Price, 0, '', ',');
		} else {
			//$PriceShow=number_format(($Price/1000000), 2, '.', '')."M";
			$PriceShow=number_format($Price, 0, '', ',');
		}
		$useArea=$row->useArea;
		$terraceArea=$row->terraceArea;
		$sumArea=$useArea;
		if ($sumArea!=0){
			$PricePerSq=$Price/$sumArea;
		} else {
			$PricePerSq=0;
		};
		$Token=$row->Token;
		$Floor=$row->Floor;
		if($row->Bedroom=="99"){
			$Bedroom="สตูดิโอ";
			$Bedroom_mb="สตูดิโอ";
		}else{
			$Bedroom=$row->Bedroom." นอน";
			$Bedroom_mb=$row->Bedroom." นอน";
		}
		$Bathroom=$row->Bathroom." น้ำ";
		$Bathroom_mb=$row->Bathroom." น้ำ";
		$NumExpire=$this->dashboard->DateExpireNum($Token);
		$DateExpire=date("d/m/Y",mktime(0,0,0,date("m"),date("d")+$NumExpire,date("Y")));
		if ($Active!=82){ 
			
?>         
            <div class="height5"></div>
            <div class="col-md-12 padding-none"> 
            <div class="height10"></div>
       
            <div class="clearfix"></div>
            <div class="height5"></div>
           
            <div class="row col-md-12 col-sm-6 col-xs-12 padding-none3 sm-padding">
              <div class="col-md-12 clear-margin-padding click hidden-xs hidden-sm">
                <span class="glyphicon glyphicon-remove input-sm-clear-bt text-grey2 padding-none pull-right hidden-xs hidden-sm" aria-hidden="true" onclick='if (confirm("คุณแน่ใจที่จะลบประกาศนี้?")) window.location.href="/zhome/dpost/<?=$Token?>"'></span>
              </div>

              <div class="col-md-4 text-shadow2 bg-responsive4" onclick="window.open('/zhome/unitDetailOwner/<?=$row->POID;?>', '_blank')" style="background-image: linear-gradient(rgba(255,255,255,0.3),rgba(51,51,51,0.3)), url('<?=$this->dashboard->imageList($row->POID);?>');">
                 <!--Mobile-->
                 <div class="visible-xs visible-sm">
						<div class="pull-left col-xs-12" style="position:absolute;bottom:0;left:0;"> 
							<div class="text-white"><span><?=$prefixTOAdv?></span></div>
							<div class="text-white"><span class="font20">฿ <?=$PriceShow?></span> | <span ><?=$Bedroom?></span> | <span><?=$Bathroom?></span> | <span><?=$sumArea?> ม&sup2;</span></div>
							<div class="text-white small"><?=$ProjectName?> <span>(<?=$DistName?>)</span> </div>
						</div>
				
						<div class="pull-right col-xs-12" style="position:absolute;top:2;right:0; padding-right: 10px; margin-right: 0px;">
							<div class="text-white text-right">
						      <span><img src="/img/sun-s-icon-white.png" class="text-shadow"> </span>
						       <span class="text-white"><?=$row->ActiveDay;?>&nbsp;&nbsp;</span>
						       <span class="glyphicon glyphicon-eye-open text-white clear-margin-padding input-sm3"></span>
		                       <span class="padding-none text-white"><?=$this->dashboard->countViewPost($POID);?>&nbsp;&nbsp;
		                       </span>
							  
							  <span width="3px" class="glyphicon glyphicon-earphone text-white input-sm3 clear-margin-padding">
							  </span>
							  <span class="text-white">
							  <?=$this->dashboard->countTelPost($POID);?>
							  </span>
							</div>
				        </div>
				    <div class="clearfix"></div>
				 </div>

                
                 <!--End Mobile-->
              
                
              </div>

             
              
              
              <div id="dash-list" class="col-md-4 col-xs-6 hidden-xs hidden-sm" >
                <div style="padding: 0px 0px 5px 0px">
                   <h4 class="text-grey"><?=$ActivePrefix." ".$prefix." ".$ProjectName?><h4>
				   <div class="text-grey">
					 	<span>ชั้น<?=$Floor?></span>
						<span> <?=$Bedroom?></span>
						<span> <?=$Bathroom?></span>  
						<span> <?=$sumArea?> ตร.ม.</span> 
				    </div>
				    <div class="text-grey2" style="padding-top: 12px;">
				       <span><?=$DistName?></span> 
				    </div>
                
                </div>
              
                 	
				
				<div class="col-md-6 text-grey i5-paading-top8 display-none" style="padding: 0px 0px 0px 6px">
					
				</div>               
              </div>

              <div id="dash-list2" class="col-md-4 col-xs-6 padding-lr0 hidden-xs hidden-sm">
                <div style="">
                    <div class="text-grey col-md-12 col-xs-12 padding-lr0 pull-right">
                       <div class="text-right padding-none">
                          <span class="text-blue padding-none h4s"><h4>฿ <?=$PriceShow?></h4></span>
                       </div>
                       <div class="text-right padding-none"><h4 class="text-grey2">฿ <?=$PricePerSqShow;?>/ม<sup>2</sup></h4>
                       </div>                 	                  
                    </div>
                
               
                 <div class="clearfix"></div>
                

                 <div class="col-md-6 text-blue padding-l1" style="padding: 0px 9px 0px 0px">
                    <span class="pull-right text-blue"> <?=$row->ActiveDay;?></span>
                    <span class="padding-l15 padding-none pull-right"> <img src="/img/sun-s-icon.png"></span>
                 </div>
                 <div class="col-md-6 text-blue padding-l1" style="padding: 0px 0px 12px 0px ">
                 
	                    <div class="col-md-6 col-xs-6 clear-margin-padding">
	                       <div class="pull-right">
		                        <span class="glyphicon glyphicon-eye-open text-blue"></span>
		                        <span class="padding-none text-blue"><?=$this->dashboard->countViewPost($POID);?></span>
		                   </div>
		                    
		                    
	                    </div>
	                    <div class="col-md-6 col-xs-6 clear-margin-padding">
	                       <div class="pull-right">
		                    
		                    <span class="glyphicon glyphicon-earphone text-blue"></span>
		                    <span class="padding-none text-blue"><?=$this->dashboard->countTelPost($POID);?></span>
		                   </div>

		                </div>
	               
                 </div>
                </div>

              
               		
              </div>

              
            <!--end col md4-->
            </div>
          
               
            
              <div class="clearfix visible-xs"></div>
              <div class="height2 visible-xs"></div>
             

           
            
<?php
	};
	//end loop ListPostType1 detail
	};
?>
            <!--end row-->
           
<?php
	};
?>
<?php	
	if ($unlist->num_rows()>0){
?>
        <div class="clearfix"></div>
         <div class="row hidden-xs hidden-sm">
              <div class="col-md-12 clear-margin-padding padding-l10-m"> <h3 class="text-orange">รอประกาศ</h3>
              </div>
              <hr class="clear-margin-padding">
           </div>
           <div class="row visible-xs visible-sm padding-none3">
              <div class="col-md-12 clear-margin-padding padding-l15"> <h3 class="text-orange">รอประกาศ</h3>
              </div>
              <hr class="clear-margin-padding">
           </div> 


<?php
	$attributes = array('class' => 'email', 'id' => 'EditPost');
	echo form_open('/zhome/EditPost', $attributes);
?>
	<input type="hidden" name="Token" id="Token">
<?php
	//loop unlist detail
	foreach ($unlist->result() as $row){
		$POID=$row->POID;
		if ($row->Active=="3"){
			$Msg=$this->dashboard->checkMsg($POID);
		} else {
			$Msg="";
		};
		$Address=$row->Address;
		$RoomNumber=$row->RoomNumber;
		$ProjectName=$row->ProjectName;
		$OwnerName=$row->OwnerName;
		$Telephone=$row->Telephone1;
		$PricePerSqShow=number_format($row->PricePerSq, 0,'',',');
		$queryDistMarker=$this->db->query('Select a.Distance,a.Station,a.Type,b.KeyName from DistMarker a left join KeyMarker b on a.Station=b.KeyID Where a.PID="'.$row->PID.'" and (a.Type="BTS" or a.Type="MRT" or a.Type="BRT" or a.Type="ARL") order by a.Distance limit 1');
		$rowDistMarker=$queryDistMarker->row();
		$Distance=$rowDistMarker->Distance;
		$Distance=$Distance/1000;
		$DistanceList=$Distance;
		$Distance=number_format($Distance,1,'.',',');
		$KeyName=$rowDistMarker->KeyName;
		$DistName=$KeyName." ".$Distance." กม.";
		$Active=$row->Active;
		if ($Address!=null and $Address!=''){ 
			$prefix=$Address;
		} else {
			$prefix=$RoomNumber;
		};
		$TOAdvertising=$row->TOAdvertising;
		if ($TOAdvertising==2){
			$Price=$row->DTotalPrice;
			$prefixTOAdv="ขายดาวน์";
		}else if ($TOAdvertising==5){
			$Price=$row->PRentPrice;
			$prefixTOAdv="เช่า";
		}else if ($TOAdvertising==1){
			$Price=$row->TotalPrice;
			$prefixTOAdv="ขาย";
		}
		if ($TOAdvertising=='5'){
			$PriceShow=number_format($Price, 0, '', ',');
		} else {
			//$PriceShow=number_format(($Price/1000000), 2, '.', '')."M";
			$PriceShow=number_format($Price, 0, '', ',');
		}
		$useArea=$row->useArea;
		$terraceArea=$row->terraceArea;
		$sumArea=$useArea+$terraceArea;
		if ($sumArea!=0){
			$PricePerSq=$Price/$sumArea;
		} else {
			$PricePerSq=0;
		};
		$Token=$row->Token;
		$wStep=5-($row->Step1)-($row->Step2)-($row->Step3)-($row->Step4)-($row->Step5);
		$Floor=$row->Floor;
		$Bedroom=$row->Bedroom;
		if ($Bedroom=="99"){
			$Bedroom="สตูดิโอ";
		} else {
			$Bedroom=$Bedroom." นอน";
		}
		$Bathroom=$row->Bathroom." น้ำ";
		$Bathroom_mb=$row->Bathroom." น้ำ";
		$NumExpire=$this->dashboard->DateExpireNum($Token);

?>
     <!---New Waiting-->
     <div class="row col-md-12 col-sm-6 col-xs-12 padding-none3 sm-padding display-none">

              <div class="col-md-12 col-xs-12 clear-margin-padding click hidden-sm hidden-xs"><span class="glyphicon glyphicon-remove input-sm-clear-bt text-grey2 padding-none pull-right clear-margin-padding hidden-sm hidden-xs" aria-hidden="true" onclick='if (confirm("คุณแน่ใจที่จะลบประกาศนี้?")) window.location.href="/zhome/dpost/<?=$Token?>"'></span></div>

              <div class="col-md-4 col-xs-12 text-shadow2 bg-responsive4" onclick="window.open('/zhome/unitDetailOwner/<?=$row->POID;?>', '_blank')" style="background-image: linear-gradient(rgba(255,255,255,0.3),rgba(51,51,51,0.3)), url('<?=$this->dashboard->imageList($row->POID);?>');">
                 <!--Mobile-->
                 <div class="visible-xs visible-sm">
						<div class="pull-left" style="position:absolute;bottom:0;left:0;"> 
							<div class="text-white padding-l15"><span><?=$prefixTOAdv?></span></div>
							<div class="text-white padding-l15"><span class="font20">฿ <?=$PriceShow;?></span> | <span ><?=$Bedroom?></span> | <span><?=$Bathroom?></span> | <span><?=$sumArea?> ม&sup2;</span></div>
							<div class="text-white small padding-l15"><?=$ProjectName?> <span>(<?=$DistName?>)</span> </div>
							
						
						</div>

				
				
						<div class="pull-right w40" style="position:absolute;top:2;right:0; padding-right: 10px; margin-right:0px;">
							<div class="text-white text-right">
						      <span><img src="/img/sun-s-icon-white.png" class="text-shadow"> </span>
						       <span class="text-white"><?=$row->ActiveDay;?>&nbsp;&nbsp;</span>
						       <span class="glyphicon glyphicon-eye-open text-white clear-margin-padding input-sm3"></span>
		                       <span class="padding-none text-white"><?=$this->dashboard->countViewPost($POID);?>&nbsp;&nbsp;
		                       </span>
							  
							  <span width="3px" class="glyphicon glyphicon-earphone text-white input-sm3 clear-margin-padding">
							  </span>
							  <span class="text-white">
							  <?=$this->dashboard->countTelPost($POID);?>
							  </span>
							  <span class="text-white">
							  		<a href="#" onclick="updateFavorite('<?=$row->POID;?>');"><span width="3px" id="favourite_show" class="glyphicon glyphicon-heart text-pink " aria-hidden="true">
							  			
							  		</span>
							  		</a>
							  </span>
							</div>
				        </div>
				    <div class="clearfix"></div>
				 </div>

                
                 <!--End Mobile-->
                
                
              </div>

              
              

              
              <div id="dash-list" class="col-md-4 col-xs-6 hidden-xs hidden-sm" >
                <div style="padding: 0px 0px 5px 0px">
                   <h4 class="text-grey"><?=$ActivePrefix." ".$prefix." ".$ProjectName?><h4>
				   <div class="text-grey">
					 	<span>ชั้น<?=$Floor?></span>
						<span> <?=$Bedroom?></span>
						<span> <?=$Bathroom?></span>  
						<span> <?=$sumArea?> ตร.ม.</span> 
				    </div>
				    <div class="text-grey2" style="padding-top: 12px;">
				       <span><?=$DistName?></span> 
				    </div>
                
                </div>
              
                 	<div class="col-md-6 text-grey" style="padding: 0px 6px 0px 0px"> 
	                
	                 

				</div>
				<div class="col-md-6 text-grey i5-paading-top8" style="padding: 0px 0px 0px 6px">
			
				</div>               
              </div>

              <div id="dash-list2" class="col-md-4 col-xs-6 padding-lr0 hidden-xs hidden-sm">
                <div style="">
                    <div class="text-grey col-md-12 col-xs-12 padding-lr0 pull-right">
                       <div class="text-right padding-none">
                          <span class="text-blue padding-none h4s"><h4>฿ <?=$PriceShow;?></h4></span>
                       </div>
                       <div class="text-right padding-none"><h4 class="text-grey2">฿ <?=$PricePerSqShow;?>/ม<sup>2</sup></h4></div>                 	                  
                    </div>
                
               
                 <div class="clearfix"></div>
                

                 <div class="col-md-6 text-blue padding-l1" style="padding: 0px 9px 0px 0px">
                    <span class="pull-right text-blue"> <?=$row->ActiveDay;?></span>
                    <span class="padding-l15 padding-none pull-right"> <img src="/img/sun-s-icon.png"></span>
                 </div>
                 <div class="col-md-6 text-blue padding-l1" style="padding: 0px 0px 12px 0px ">
                 
	                    <div class="col-md-6 col-xs-6 clear-margin-padding">
	                       <div class="pull-right">
		                        <span class="glyphicon glyphicon-eye-open text-blue"></span>
		                        <span class="padding-none text-blue"><?=$this->dashboard->countViewPost($POID);?></span>
		                   </div>
		                    
		                    
	                    </div>
	                    <div class="col-md-6 col-xs-6 clear-margin-padding">
	                       <div class="pull-right">
		                    
		                    <span class="glyphicon glyphicon-earphone text-blue"></span>
		                    <span class="padding-none text-blue"><?=$this->dashboard->countTelPost($POID);?></span>
		                   </div>

		                </div>
	               
                 </div>
                </div>

              
                				
						
              </div>

              
            <!--end col md4-->
            </div>
            
            
             
            
     <!--End Waiting-->
 
 
<?php
	//end loop unlist detail
	}
?>
            <br>
<?php
	//end loop unlist
	};
?>
</form>
              <!--boost post-->
              <div class="clearfix"></div>
              <div class="height15"></div>
              <hr class="bg-grey7 height10 padding-none">
              <div class="clearfix"></div>
              <div class="height15"></div>
              <div class="padding-l38">
                   <span class="glyphicon glyphicon-signal text-grey2 padding-none" width="5px" aria-hidden="true"></span>
                   <span class="text-black"> สถิติโพสต์ ตั้งแต่วันที่ __/__/__</span>
              </div> 
              <div class="height10"></div>
              <hr class="bg-grey7 padding-none height1">
              <div class="height5"></div>
              <div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2">11,123</h5><small class="text-grey">เห็นประกาศ</small></div>
              <div class="col-md-4 col-xs-4 border-right text-center"><h5 class="padding-none text-green2">1,123</h5><small class="text-grey">คลิกดูประกาศ</small></div>
              <div class="col-md-4 col-xs-4 text-center"><h5 class="padding-none text-green2">2</h5><small class="text-grey">คลิกดูเบอร์โทร</small></div>
              <div class="clearfix"></div>
              <div class="height5"></div>
              <hr class="bg-grey7 padding-none height1">
              <div class="height10"></div>
              <div class="col-xs-12 text-center"><a href="#" class="text-black">ดูรายละเอียด > </div>
              
              <div class="clearfix"></div>
              <div class="height5"></div>
              <hr class="bg-grey7 padding-none height10">
                <div class="height15"></div>
				  <div class="clearfix"></div>
				  <div class="height15"></div>
                
		          <div class="col-md-12">
		               <div class="text-black text-center">โฆษณาคอนโดของคุณกับผู้ซื้อในรัศมี 5 กม.</div>
		               <div class="text-center"><h3 class="text-warning">0 ครั้ง</h3></div>
		               <div class="text-center text-black">จำนวนโฆษณาคงเหลือ (1 ครั้ง / 1 เหรียญ)</div>

		          </div>
                  <div class="clearfix"></div>
                  <div class="height15"></div>
           
            <div class="clearfix"></div>
              <div class="height15"></div>
              <hr class="bg-grey7 height10 padding-none">
                  <div class="height15"></div>
				  <div class="clearfix"></div>
				  <div class="height15"></div>
				  <div class="row padding-none">
				    <div class="col-md-12 padding-l20">
			              <div class="col-xs-12 padding-l15">
			                    <div class="pull-left">
			                            <p class="text-black padding-none "> เลือกจำนวณโฆษณาที่ต้องการแสดงต่อวัน</p>

			                    </div>
			              </div>

			              <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
			              <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12 "> 
							       <label onclick="clear_custom_ads();">
							         <div class="pull-left"><input type="radio"  name="optionsRadios2" id="optionsRadios1" value="option1" selected ></div>
							         <div class="text-black pull-left margin-t21m">100 ครั้ง</div>
							       </label>
							    </div>
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12"> 
							      <label onclick="clear_custom_ads();">
							        <div class="pull-left"><input type="radio" name="optionsRadios2" id="optionsRadios2" value="option2"></div>
							        <div class="text-black pull-left margin-t21m">300 ครั้ง</div>
							      </label>
							     </div>
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12"> 
							      <label onclick="clear_custom_ads();">
							        <div class="pull-left"><input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3"></div>
							        <div class="text-black pull-left margin-t21m">300 ครั้ง</div>
							      </label>
							     </div>
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12"> 
							     <label onclick="custom_ads();">
							         <div class="pull-left"><input type="radio" name="optionsRadios2" id="option_custom" value="option4"></div>
							         <div id="div_custom" class="text-black pull-left margin-t21m">กำหนดเอง</div>
							        <div class="pull-left"><input id="option_custom2"  type="text" class="form-control input-sm display-none"> </div>
							        <div id="div_custom2" class="text-black display-none pull-left margin-left5 margin-t5"> ครั้ง</div>
							     </label>
							    </div>
							 
						  </div>



			
	             
			              <div class="clearfix"></div>
			              <div class="height15"></div>
		       

						  <div class="text-blue col-md-12"><p class="text-blue">กรณีที่มีโฆษณาหลายประกาศในพื้นที่เดียวกัน ระบบจะแสดงโฆษณาที่ใกล้และสอดคล้องกับการค้นหาก่อน</p></div>
						  <div class="clearfix"></div>
						  <div class="height10"></div>
				  				    </div><!--end col-md-12-->
			      </div><!--end row-->
				  <hr class="bg-grey7 height10 padding-none">
				  <div class="height15"></div>
				  <div class="clearfix"></div>
				  <div class="height15"></div>

				  <div class="row padding-none">
				    <div class="col-md-12 padding-l20">
						  <div class="col-md-12 col-xs-12 padding-l15">
			                    <div class="pull-left">
			                            <p class="text-black padding-none "> เลือกจำนวนวันที่ต้องการแสดงโฆษณา</p>

			                    </div>
			              </div>

			          
			                 
			             
			              <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
			              <div class="col-xs-12 radio padding-none">

							    <div class="col-xs-12"> 
							      <label>
							       <div class="pull-left"><input type="radio" name="optionsRadios2" id="optionsRadios1" value="option1" selected></div>
							       <div class="text-black pull-left margin-t21m">1 วัน</div>
							      </label>
							    </div>
							
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12"> 
							      <label>
							        <div class="pull-left"><input type="radio" name="optionsRadios2" id="optionsRadios2" value="option2"></div>
							        <div class="text-black pull-left margin-t21m">7 วัน</div>
							      </label>
						  </div>
							 
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12"> 
							      <label>
							          <div class="pull-left"> <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3" selected></div>
							          <div class="text-black pull-left margin-t21m">30 วัน</div>
							      </label>
							    </div>
							  
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-12"> 
							       <label onclick="custom_ads2();">
							        <div>
							          <div class="pull-left"><input type="radio" name="optionsRadios2" id="optionsRadios4" value="option4"></div>
							          <div id="date_custom" class="pull-left text-black margin-t21m">แสดงประกาศถึงวันที่</div>

		                            </div>
		                            <div id="date_custom2" class="form-group col-xs-12 display-none padding-none">
						                <div class='input-group date' id='boostpost-date'>
						                    <input type="text" id="datepicker">
						                   
						                </div>
						            </div>

							       </label>
							    </div>
							 
						  </div>
				    </div><!--end col-md-12-->
			      </div><!--end row-->

				  <div class="clearfix"></div>
	              <div class="height15"></div>
	              <hr class="bg-grey7 height10 padding-none">
	              <div class="height15"></div>
				  <div class="clearfix"></div>
				  <div class="height15"></div>
				  
				  <div class="row padding-none">
				  <div class="col-md-12 padding-l20">

						  <div class="col-xs-12 padding-l15">
			                    <div class="pull-left">
			                            <p class="text-black padding-none "> สั่งซื้อเหรียญ</p>

			                    </div>
			              </div>
			              <div class="clearfix"></div>
						  <div class="height25"></div>
						  <div class="clearfix"></div>
                          <div class="col-xs-12">
                           
                            <a href="#"" class="promotioncode text-blue" onclick="promotioncode();"> <span class="glyphicon glyphicon-tag"></span> ป้อนรหัสคูปองหรือโปรโมชั่น</a>
                       
                            <div class="col-md-12 col-xs-12 display-none entercode padding-none">
                              <div class="col-md-8 col-xs-8 padding-none">
                                 <input type="text" class="form-control input-z padding-left-clear" placeholder="PROMOCODE (ถ้ามี)" style="padding:0; margin:0">
                              </div>
                              <div class="col-md-4 col-xs-4  padding-none">
                              <button class="btn btn-sm w100 btn-green2 cursor input-z  text-white col-xs-4 col-xs-12">ตกลง</button>
                              </div>
                            </div>
                          </div>
						  <div class="clearfix"></div>
			           
						  <div class="height25"></div>
						  <div class="clearfix"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
			              <div class="col-xs-12 radio padding-none">

							    <div class="col-xs-5"> 
							      <label onclick="checkpayment1()">
							        <div class="pull-left"><input type="radio"  name="payment" id="coin1" value="500" ></div>
							        <div class="text-black margin-t21m pull-left">500 เหรียญ</div>
							      </label>
							    </div>
							    <div class="col-xs-7 text-right margin-t21m">500 บาท</div>  
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-5"> 
							      <label onclick="checkpayment2();">
							        <div class="pull-left"><input type="radio" class="clear-checkbox" name="payment" id="coin2" value="1200"  selected="selected"></div>
							        <div class="pull-left margin-t21m text-black">1,200 เหรียญ</div>
							      </label>
							    </div>
							    <div class="col-xs-7 text-right margin-t21m"> 1,000 บาท</div>  
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-5"> 
							      <label onclick="checkpayment3();">
							         <div class="pull-left"><input type="radio" class="clear-checkbox" name="payment" id="coin3" value="3000" selected></div>
							         <div class="pull-left margin-t21m text-black">3,000 เหรียญ</div>
							      </label>
							    </div>
							    <div class="col-xs-7 text-right margin-t21m"> 2,000 บาท</div>  
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-5"> 
							      <label onclick="checkpayment4();">
							         <div class="pull-left"><input type="radio" name="payment" id="coin4" value="6000"></div>
							         <div class="pull-left margin-t21m text-black">6,000 เหรียญ</div>
							       </label>
							    </div>
							    <div class="col-xs-7 text-right margin-t21m"> 3,000 บาท</div>  
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12"><hr class="padding-none"></div>
						  <div class="height15"></div>
						  <div class="col-xs-12 radio padding-none">
							    <div class="col-xs-5"> 
							      <label onclick="checkpayment5();">
							        <div class="pull-left"><input type="radio" name="payment" id="coin5" value="15000"></div>
							        <div class="text-black margin-t21m">15,000 เหรียญ</div>
							      </label>
							    </div>
							    <div class="col-xs-7 text-right margin-t21m"> 5,000 บาท</div>  
						  </div>
						    <div class="clearfix"></div>
						  <div class="height15"></div>
						
						  <div class="height15"></div>
		                  <div class="clearfix"></div>
						 
		                  <div class="col-md-12"><a class="text-black" href="#">เงือ่นไขการโฆษณา</a><span class="text-red">(อ่านก่อนกดลงโฆษณา)*</div>
		                  <div class="clearfix"></div>
		                  <div class="height15"></div>
		                   <div class="col-xs-12 checkbox padding-none">
							    <div class="col-xs-12"> <label><input type="checkbox" name="optionsCondition" id="optionsCondition" value="" onchange="checkCondition();" ><span class="text-blue">ข้าพเจ้าจะใช้ภาพถ่ายแนวนอนและเก็บห้องให้เรียบร้อย โดยเว็บไซต์มีสิทธิไม่อนุมัติหากภาพถ่ายไม่ได้คุณภาพ</span></label></div> 
						  </div>
						  <div class="clearfix"></div>
						  <div class="height15"></div>
						  <div class="text-blue col-md-12"><p class="text-blue">สอบถามคุณภาพภาพถ่ายที่ xxx-xxx-xxxx</p></div>
						  <div class="clearfix"></div>
						  <div class="height10"></div>
						  <div class="height15"></div>

				    </div><!--end col-md-12-->
				  </div><!--end row-->

	              <hr class="bg-grey7 padding-none height15">
	              <div class="clearfix"></div>
	              <div class="height15"></div>

	              <div class="clearfix"></div>
              <br><br><br><br>

              <!--payment bt-->
              <div class="col-md-12 bg-grey7 boost-map-height bg-grey" style="position:fixed; bottom:0; left:0; width:100%;">
              	 <div class="clearfix"></div>
                 <div class="height15"></div>
                 <button type="submit" id="payment-bt" class="btn btn-green2 cursor input-z col-xs-12 text-white" onclick="checkCondition2();"> <h5 class="text-white padding-none padding-t2"><p id="text-payment-bt">ชำระค่าโฆษณา</p></h5>
                 </button>
                 <div class="clearfix"></div>
                 <div class="height5"></div>
                 <div class="text-black text-center">
                     <small class="text-black">การคลิกปุ่มด้านบนเป็นการยอมรับ 
                      <a href="#" class="text-blue">นโยบายการให้บริการของ ZmyHome</a><br>
                      <a href="#" class="text-blue"> และนโยบายการลงโฆษณา</a>
                     </small>
                  </div>

                  <div class="clearfix"></div>
                  <div class="height5"></div>
                   
              </div><!--end payment bt-->
              <div class="clearfix"></div>
              <div class="height15"></div>
 
              <!--end boost post-->
</div><!--end col md10-->
</div><!--end container-->
</div>
</div>
<!-- Modal Check Condition -->
<div class="modal modal-sm fade display-none" id="modalCondition" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto; width:43vh;">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3">กรุณาเช็คเงื่อนไขการโฆษณาก่อน</h4>
			</div>
			<div class="modal-body" style="height:250px">
			    <br><br><br>
				<h4>กรุณาเช็คเงื่อนไขการโฆษณาก่อน</h4>
			</div>
		</div>
	</div>
</div>
<!--End-->
<!-- Modal Check Condition -->
<div class="modal modal-sm fade display-none" id="modalCheckcredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto; width:43vh;">
	<div class="modal-dialog" role="document">
		<div class="modal-content text-center">
			<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
				<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><big>&times;</big></span></button></div>
				<h4 class="text-white text-center padding-none padding-t3">กรุณาเช็คเครดิต</h4>
			</div>
			<div class="modal-body" style="height:250px">
			    <br><br><br>
				<h4>กรุณาเช็คเครดิตก่อน</h4>
			</div>
		</div>
	</div>
</div>
<!--End-->
<script type="text/javascript">
$(window).load(function(){
  $('#payment-bt').addClass('disabled');
});


function checkpayment1(){
   $("#text-payment-bt").text("ชำระค่าโฆษณา 500 บาท");
}
function checkpayment2(){
   $("#text-payment-bt").text("ชำระค่าโฆษณา 1,000 บาท");
}
function checkpayment3(){
   $("#text-payment-bt").text("ชำระค่าโฆษณา 2,000 บาท");
}

function checkpayment4(){
   $("#text-payment-bt").text("ชำระค่าโฆษณา 3,000 บาท");
}

function checkpayment5(){
   $("#text-payment-bt").text("ชำระค่าโฆษณา 5,000 บาท");
}



$( "#datepicker" ).datepicker();






</script>
