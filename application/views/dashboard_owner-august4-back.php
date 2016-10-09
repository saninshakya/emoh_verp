<?php
$curyear=date('Y')+1;
	if ($ListPostType1->num_rows()==0){
?>         
        

		  <div class="row hidden-xs hidden-sm">
              <div class="col-md-12 clear-margin-padding padding-l10-m"> <h3 class="text-orange dash-title">ไม่มีประกาศ</h3>
              </div>
              <hr class="clear-margin-padding">
           </div>
           <div class='clearfix'></div>
           <div class="row visible-xs visible-sm padding-none3">
              <div class="col-md-12 clear-margin-padding padding-l15"> 
                <h3 class="text-orange">ไม่มีประกาศ</h3>
              </div>
              <hr class="clear-margin-padding">
           </div> 
<?php
	} else {
?>
           <div class="row hidden-xs hidden-sm">
              <div class="col-md-12 clear-margin-padding padding-l10-m"> <h3 class="text-orange dash-title">ประกาศ</h3>
              </div>
              <hr class="clear-margin-padding">
           </div>
           <div class='clearfix'></div>
           <div class="row visible-xs visible-sm padding-none3">
              <div class="col-md-12 clear-margin-padding padding-l15"> <h3 class="text-orange">ประกาศ</h3> 
              </div>
              <hr class="clear-margin-padding">
           </div> 
           
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
  
              <!--mobile bt-->

               <div class="visible-xs visible-sm col-xs-12 clear-margin-padding">
                    <div class="col-xs-12 clear-margin-padding-mobile  visible-sm visible-xs">
                        <button type="button" class="btn btn-blue cursor" onclick="showBoostPost()">Boast Post</button>
                    </div>
                    <div class="clearfix"></div>
					<div class="col-xs-6 clear-margin-padding-mobile  visible-sm visible-xs">
					<?php
	                if ($Active==93){
					?>
						<button type="button" class="btn btn-white" data-toggle="modal" data-target="#ShowMobileNumber" onclick="$('#modal_token').val('<?=$Token;?>');">ยกเลิกซ่อนเบอร์โทร</button>
					<?}else{?>
						<button type="button" class="btn btn-white" data-toggle="modal" data-target="#HideMobileNumber" onclick="$('#modal_token').val('<?=$Token;?>');">ซ่อนเบอร์โทร</button>
					<?}?>
					 </div>
	                 <div class="col-xs-6 clear-margin-padding-mobile  visible-sm visible-xs">
		                <?php
							if ($Active!=81){
						?>
							<button type="button" class="btn btn-white"  data-toggle="modal" data-target="#InformSold">
							<span onclick="$('#modal_token').val('<?=$Token;?>');">แจ้ง ขาย/เช่าได้แล้ว </span>
						<?php
							} else {
						?>
							<button type="button" class="btn btn-white">
							<span onclick="location.href='/zhome/reopenpost/<?=$Token?>'">แสดงประกาศใหม่</span>
						<?php
							}
						?>
	                    </button>
	                 </div>
	                 <br>
	           	     <div class="col-xs-6 clear-margin-padding-mobile  visible-sm visible-xs">
		           	    <?php
						if ($Active==1||$Active==92||$Active==93){
							if ($NumExpire<0){
								$txt_expire="หมดอายุ";
							}else{
								$txt_expire="เหลือ ".$NumExpire." วัน ";
							}
						?>
						<?php 
							if ($NumExpire<30){
						?>
								<button type="button" class="btn btn-white">
								<span onclick="location.href='/zhome/AddDateExpire/<?=$Token?>/60'"><?=$txt_expire;?> ต่ออายุ 2 เดือนฟรี</span>
						<?php
							}else{
						?>
								<button type="button" class="btn btn-white" data-toggle="modal" data-target="#ExpandTime" onclick="$('#modal_numexpire').val('<?=$NumExpire;?>');$('#modal_dateexpire').val('<?=$DateExpire;?>');$('#modal_token').val('<?=$Token;?>');sendModalExpire();"><?=$txt_expire;?>
						<?
							}
						} else if ($Active==81){
						?>
							<button type="button" class="btn btn-white" disabled>
							ให้เช่าไปแล้วประกาศถูกปิด 
						<?php
						}
						?>
					</button>
	           	     </div>
	           		 <div class="col-xs-6 clear-margin-padding-mobile  visible-sm visible-xs"><button type="button" class="btn btn-white" onclick="location.href='/zhome/EditPost2/<?=$Token?>'">แก้ไขประกาศ</button>
	                 </div>  
	             </div>  
              <!--end mobile bt-->
              
              
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
	                
	                     <?php
	                	if ($Active==93){
	                     ?>	

	                	<button type="button" class="btn btn-orange2 btn-dash" data-toggle="modal" data-target="#ShowMobileNumber"  onclick="$('#modal_token').val('<?=$Token;?>');">ยกเลิกซ่อนเบอร์โทร</button>
	                     <?php 
	                	 } else {
	                     ?>
	                	<button type="button" class="btn btn-orange2 btn-dash" data-toggle="modal" data-target="#HideMobileNumber"  onclick="$('#modal_token').val('<?=$Token;?>');">ซ่อนเบอร์โทร</button>
		                <?php
							}
						?>

				</div>
				<div class="col-md-6 text-grey i5-paading-top8" style="padding: 0px 0px 0px 6px">
					<?php
						if ($Active!=81){
					?>
						<button type="button" class="btn btn-orange2 btn-dash"  data-toggle="modal" data-target="#<?=$modal_id;?>">
						<!--<span onclick="location.href='/zhome/closepost/<?=$Token?>'">แจ้ง ขาย/เช่าได้แล้ว </span>-->
						<span onclick="$('#modal_token').val('<?=$Token;?>');">แจ้ง ขาย/เช่าได้แล้ว </span>
					<?php
						} else {
					?>
						<button type="button" class="btn btn-orange2 btn-dash">
						<span onclick="location.href='/zhome/reopenpost/<?=$Token?>'">แสดงประกาศใหม่</span>
					<?php
						}
					?>
					</button>
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
                

                <div class="col-md-6" style="padding: 0px 6px 0px 0px">

					<?php
					if ($Active==1||$Active==92||$Active==93){
						if ($NumExpire<0){
							$txt_expire="หมดอายุ";
						}else{
							$txt_expire="เหลือ ".$NumExpire." วัน ";
						}
					?>
					<?php 
						if ($NumExpire<30){
					?>
							<button type="button" class="btn btn-green2 btn-dash padding-left-clear padding-right-clear text-center">
							<span onclick="location.href='/zhome/AddDateExpire/<?=$Token?>/60'"><?=$txt_expire;?> ต่ออายุ 2 เดือนฟรี</span>
					<?php
						}else{
					?>
							<button type="button" class="btn btn-green2 btn-dash padding-left-clear padding-right-clear text-center" data-toggle="modal" data-target="#ExpandTime" onclick="$('#modal_numexpire').val('<?=$NumExpire;?>');$('#modal_dateexpire').val('<?=$DateExpire;?>');$('#modal_token').val('<?=$Token;?>');sendModalExpire();"><?=$txt_expire;?>
					<?
						}
				    } else if ($Active==81){
					?>
						<button type="button" class="btn btn-green2 btn-dash padding-left-clear padding-right-clear text-center" disabled>
						ให้เช่าไปแล้วประกาศถูกปิด 
					<?php
				    }
					?>
					</button>
               
                </div>    				
				<div class="col-md-6 i5-paading-top8" style="padding: 0px 0px 0px 6px"> 
					<button type="button" class="btn btn-green2 btn-dash pull-right" onclick="location.href='/zhome/EditPost2/<?=$Token?>'">แก้ไขประกาศ</button>
				</div>				
              </div>
               <div class="clearfix hidden-xs hidden-sm"></div>
               <div class="height5  hidden-xs hidden-sm"></div>
               <div class="col-md-12 padding-none  hidden-xs">
                        <button type="button" class="btn btn-blue cursor  hidden-xs hidden-sm" onclick="showBoostPost()">Boast Post</button>
               </div> 
              

              
            <!--end col md4-->
            </div>
          
            
              <div class="col-md-12 hidden-sm clear-margin-padding">
                 <hr>
              </div>
              <div class="clearfix visible-xs"></div>
              <div style="height:14px;" class="visible-xs"></div>
             

           
            
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
     <div class="row col-md-12 col-sm-6 col-xs-12 padding-none3 sm-padding">

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
              <!--mobile bt-->
               <div class="visible-xs visible-sm col-xs-12 pull-right clear-margin-padding">

					
	           		 <div class="col-xs-12 clear-margin-padding-mobile visible-sm visible-xs"><button type="button" class="btn btn-green3" onclick="location.href='/zhome/EditPost2/<?=$Token?>'">แก้ไขประกาศ</button>
	                 </div>  
	             </div>  
              <!--end mobile bt-->
              
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

              
                <div class="col-md-6" style="padding: 0px 6px 0px 0px">

	            
               
                </div>    				
				<div class="col-md-6 i5-paading-top8" style="padding: 0px 0px 0px 6px"> 
					<button type="button" class="btn btn-green2 btn-dash pull-right" onclick="location.href='/zhome/EditPost2/<?=$Token?>'">แก้ไขประกาศ</button>
				</div>				
              </div>

              
            <!--end col md4-->
            </div>
            
            
              <div class="col-md-12 hidden-sm clear-margin-padding">
                 <hr>
              </div>
              <div class="clearfix visible-xs"></div>
              <div style="height:14px;" class="visible-xs"></div>
            
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
<!-- Modal Hide Mobile Number -->
		<div class="modal modal-sm fade display-none" id="HideMobileNumber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">

						<h4 class="text-white text-center padding-none padding-t3"  style="">ซ่อนเบอร์โทร</h4>
					</div>
					<div class="modal-body row">
						<div class="col-md-12  text-center padding-t120 padding-b120"><h4 class="text-turq4">ซ่อนไม่ให้แสดงเบอร์โทรของคุณ</h4></div>
						
							
						<div class="clearfix"></div>
						
						
						
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10">
							    <button  type="button" class="btn btn-orange4 btn-block text-white" onclick="hideMobile();">ตกลง</button>
						</div>
						<div class="col-md-12 padding-top10">
							    <button type="button" class="btn btn-grey btn-block text-white" onclick="" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
						</div>

				    </div>
				
				</div>
			</div>
		</div>
<!--End-->

<!-- Modal Show Mobile Number -->
		<div class="modal modal-sm fade display-none" id="ShowMobileNumber" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">

						<h4 class="text-white text-center padding-none padding-t3"  style="">แสดงเบอร์โทร</h4>
					</div>
					<div class="modal-body row">
						<div class="col-md-12  text-center padding-t120 padding-b120"><h4 class="text-turq4">ผู้ใช้สามารถดูเบอร์ติดต่อของคุณ</h4></div>
						
							
						<div class="clearfix"></div>
						
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10">
							    <button  type="button" class="btn btn-orange4 btn-block text-white" onclick="showMobile();">ตกลง</button>
						</div>
						<div class="col-md-12 padding-top10">
							    <button type="button" class="btn btn-grey btn-block text-white" onclick="" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
						</div>

				    </div>
				
				</div>
			</div>
		</div>
<!--End Modal3-->

<!-- Modal Expand Time -->
		<div class="modal modal-sm fade display-none" id="ExpandTime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">

						<h4 class="text-white text-center padding-none padding-t3"  style="">เพิ่มอายุประกาศ</h4>
					</div>
					<div class="modal-body row">
						<div class="col-md-12  text-center padding-t70">
						   <h4 id="txt_expire" class="text-turq4">ประกาศจะหมดอายุวันที่__</h4>
						   <h4 id="txt_expire2" class="text-turq4">(เหลือ __ วัน)</h4>
						</div>
						<div class="col-md-12  text-center">
						   <h4 class="text-grey">เลือกเพิ่มอายุประกาศฟรี</h4>
						</div>
						<div class="col-md-3 col-xs-3"></div>
						<div class="col-md-6  text-center form-group padding-b60 text-center">
						  
						  <select id="select_day" class="form-control borderless3 center-block">
						    <option value ="30">30 วัน</option>
						    <option value ="60">60 วัน</option>
						    <option value="120">120 วัน</option>
						    <option value="180">180 วัน</option>
						    
						  </select>
						</div>
						<div class="col-md-3 col-xs-3"></div>

						
							
						<div class="clearfix"></div>
						
						
						
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10">
							<button  type="button" class="btn btn-orange4 btn-block text-white" onclick="updateDate();">ตกลง</button>
						</div>
						<div class="col-md-12 padding-top10">
							<button type="button" class="btn btn-grey btn-block text-white" onclick="" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
						</div>

				    </div>
				
				</div>
			</div>
		</div>
<!--End-->

<!-- Modal Inform Sold -->
		<div class="modal modal-sm fade display-none" id="InformSold" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">

						<h4 class="text-white text-center padding-none padding-t3"  style="">แจ้งขายได้แล้ว</h4>
					</div>
					<div class="modal-body row">
						<div class="col-md-12  text-center padding-t70"><h4 class="text-turq4"><b>ขอแสดงความยินดี!</b><br><br>ยืนยันว่าทรัพย์สินได้ถูกขายแล้ว</h4>
						</div>
						<div class="clearfix"></div>
						<br>
						<div class="col-md-12  text-center padding-b70"><p class="text-grey">คุณจะไม่สามารถดูหรือแก้ไขประกาศได้อีก</p>
						</div>
							
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10">
							    <button  type="button" class="btn btn-orange4 btn-block text-white" onclick="updateUnit();">ตกลง</button>
						</div>
						<div class="col-md-12 padding-top10">
							    <button type="button" class="btn btn-grey btn-block text-white" onclick="" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
						</div>

				    </div>
				
				</div>
			</div>
		</div>
<!--End-->

<!-- Modal Inform Rent -->
		<div class="modal modal-sm fade display-none" id="InformRent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">

						<h4 class="text-white text-center padding-none padding-t3"  style="">แจ้งเช่าได้แล้ว</h4>
					</div>
					<div class="modal-body row">
						<div class="col-md-12  text-center padding-t70"><h4 class="text-turq4"><b>ขอแสดงความยินดี!</b><br><br>ยืนยันว่าทรัพย์สินให้เช่าได้แล้ว</h4>
						</div>
						<div class="clearfix"></div>
						<br>
						<div class="col-md-12  text-center"><p class="text-grey">ระบุเดือน-ปีที่สัญญาจะหมดอายุเพื่อให้ประกาศแสดงผลล่วงหน้า 2 เดือน อัตโนมัติ</p>
						</div>
							
						<div class="clearfix"></div>
						<br>
						<div class="col-md-6 col-xs-6  text-center form-group padding-b60 text-center">
						  <select id="select_month" class="form-control borderless3 center-block">
						      <option disabled="">เดือน</option>
						      <option value="01">มกราคม</option>
							  <option value="02">กุมภาพันธ์</option>
							  <option value="03">มีนาคม</option>
							  <option value="04">เมษายน</option>
							  <option value="05">พฤษภาคม</option>
							  <option value="06">มิถุนายน</option>
							  <option value="07">กรกฏาคม</option>
							  <option value="08">สิงหาคม</option>
							  <option value="09">กันยายน</option>
							  <option value="10">ตุลาคม</option>
							  <option value="11">พฤศจิกายน</option>
							  <option value="12">ธันวาคม</option>
						  </select>
						</div>
						<div class="col-md-6 col-xs-6  text-center form-group padding-b60 text-center">
						  <select id="select_year" class="form-control borderless3 center-block">
						    <option value disabled="">ปี</option>
							<?for($d=$curyear;$d<=($curyear+5);$d++){?>
								<option value ="<?=$d;?>"><?=$d+543;?></option>
							<?}?>
						  </select>
						</div>
						
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10">
							<button  type="button" class="btn btn-orange4 btn-block text-white" onclick="updateUnit();">ตกลง</button>
						</div>
						<div class="col-md-12 padding-top10">
							<button type="button" class="btn btn-grey btn-block text-white" onclick="" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
						</div>
				    </div>
				
				</div>
			</div>
		</div>
<!--End-->



