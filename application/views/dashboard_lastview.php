<?php
		$Advertising="";
		foreach ($qLastView->result() as $row){
			if($Advertising!=$row->TOAdvertising){
				echo "<div class='row  hidden-xs hidden-sm'>
				         <div class='col-md-12  padding-l10-m'>
				           <h3 class='text-orange dash-title'>".$row->AName_th."</h3>
				         </div>
				         <hr class='clear-margin-padding'>
				       </div>";
				echo "<div class='clearfix'></div><div class='row visible-xs visible-sm padding-none3'>
				         <div class='col-md-12 clear-margin-padding padding-l15'>
				           <h3 class='text-orange'>".$row->AName_th."</h3>
				         </div>
				         <hr class='clear-margin-padding'>  
				      </div>";

				$Advertising=$row->TOAdvertising;
			}
			if($row->Bedroom=="99"){
				$Bedroom="สตูดิโอ";
				$Bedroom_mb="สตูดิโอ";
			}else{
				$Bedroom=$row->Bedroom." นอน";
				$Bedroom_mb=$row->Bedroom." นอน";
			}
			$Bathroom=$row->Bathroom." น้ำ";
			$Bathroom_mb=$row->Bathroom." น้ำ";
			if ($row->TOAdvertising=='5'){
				$PriceShow=number_format(($row->Price), 0, '', ',');
			} else {
				//$PriceShow=number_format(($row->Price/1000000), 2, '.', '')."M";
				$PriceShow=number_format($row->Price, 0, '.', ',');
			}
			$PricePerSqShow=number_format($row->PricePerSq, 0,'',',');
			$ProjectName=$row->ProjectName;
			$queryDistMarker=$this->db->query('Select a.Distance,a.Station,a.Type,b.KeyName from DistMarker a left join KeyMarker b on a.Station=b.KeyID Where a.PID="'.$row->PID.'" and (a.Type="BTS" or a.Type="MRT" or a.Type="BRT" or a.Type="ARL") order by a.Distance limit 1');
			$rowDistMarker=$queryDistMarker->row();
			$Distance=$rowDistMarker->Distance;
			$Distance=$Distance/1000;
			$DistanceList=$Distance;
			$Distance=number_format($Distance,1,'.',',');
			$KeyName=$rowDistMarker->KeyName;
			$DistName=$KeyName." ".$Distance." กม.";
			$Telephone=$row->Telephone1;
			$Telephone=substr_replace($Telephone, '-', 3, 0);
			$Telephone=substr_replace($Telephone, '-', 7, 0);
			$viewTelStatus=$this->dashboard->viewTelDashboard($row->POID);
			if($viewTelStatus==1){
				$TelephoneShow=substr($row->Telephone1,0,3).'-'.substr($row->Telephone1,3,3).'-XXXX';
				$TelephoneShow2=substr($row->Telephone1,0,3).'-'.substr($row->Telephone1,3,3).'-'.substr($row->Telephone1,6,4);
			}else{
				$TelephoneShow="โทรหาเจ้าของ";
				$TelephoneShow2="";
			}
			$qFavourite=$this->unitdetail->get_favourite($row->POID);
			if($qFavourite->num_rows()>0){
				$Favourite=1;
				$fav_color="text-pink";
			}else{
				$Favourite=0;
				$fav_color="text-white";
			}
		?>


			<div id="FavRow<?=$row->POID;?>" class="row col-md-12 col-sm-6 col-xs-12 padding-none3 sm-padding">
				<input type="hidden" id="favourite_check_<?=$row->POID;?>" value="<?=$Favourite;?>">
                <div class="col-md-4 text-shadow2 bg-responsive4" style="position: relative;background-image: linear-gradient(rgba(255,255,255,0),rgba(51,51,51,0.5)), url('<?=$this->dashboard->imageList($row->POID);?>');">
                 <!--invisble layer-->
                  <div class="layer-invisible" onclick="window.open('/zhome/unitDetailOwner/<?=$row->POID;?>', '_blank')">
                  </div>
                  <!--end invisble layer-->
					<!--fav bt-->
					<div class="hidden-sm hidden-xs " style="position:absolute;top:2;right:0; padding-right:0px;">
						<span class="text-white pull-right hidden-sm hidden-xs">
							<a href="#<?=$row->POID;?>" onclick="updateFavorite2('<?=$row->POID;?>');" title="คลิกเพื่อเอาออกจากรายการที่สนใจ"><span width="3px" id="favourite_show" class="glyphicon glyphicon-heart <?=$fav_color;?> hidden-sm hidden-xs" style="padding-top:3px;padding-right:5px;" aria-hidden="true">
							</span></a>
						</span>
					</div>
					<!--end fav bt-->
					<!--Mobile-->
					<div class="infodashboard visible-xs visible-sm">
						<div class="infodashboard-box pull-left" style="position:absolute;bottom:2;left:0;" onclick="window.open('/zhome/unitDetailOwner/<?=$row->POID;?>', '_blank')">
							<div class="text-white padding-l15"><span><?=$prefixTOAdv?></span></div>
							<div class="text-white padding-l15"><span class="font20" style="font-size:25px;">฿ <?=$PriceShow;?></span> | <span ><?=$Bedroom_mb;?></span> | <span><?=$Bathroom_mb;?></span> | <span><?=$row->useArea;?> ม&sup2;</span></div>
							<div class="infodashboard-data-sub text-white padding-l15"><?=$ProjectName?> <span>(<?=$DistName?>)</span> </div>
						</div>
				
						<div class="pull-right w60" style="position:absolute;top:2;right:0; margin-right: 0px;padding-right:10px;font-size:18px;">
							<div class="text-white text-right">
								<span><img src="/img/sun-s-icon-white.png" class="infodashboard-icon text-shadow"> </span>
								<span class="infodashboard-data text-white"><?=$row->ActiveDay;?>&nbsp;&nbsp;</span>
								<span class="infodashboard-icon glyphicon glyphicon-eye-open text-white clear-margin-padding input-sm3"></span>
								<span class="padding-none text-white"><?=$this->dashboard->countViewPost($POID);?>&nbsp;&nbsp;</span>
								<span class="infodashboard-icon glyphicon glyphicon-earphone text-white input-sm3 clear-margin-padding"></span>
								<span class="infodashboard-data text-white"><?=$this->dashboard->countTelPost($POID);?></span>
								<span class="text-white">
							  		<a href="#<?=$row->POID;?>" onclick="updateFavorite2('<?=$row->POID;?>');">
										<span id="favourite_show_mb" class="infodashboard-fav glyphicon glyphicon-heart <?=$fav_color;?>" aria-hidden="true"></span>
							  		</a>
								</span>
							</div>
				        </div>
					</div>
					<!--End Mobile-->
				</div>
				<!--end-->
			    
			    <!--mobile bt-->
				<div class="visible-xs visible-sm col-xs-12 clear-margin-padding">
					<div class="col-xs-6 clear-margin-padding-mobile visible-sm visible-xs">
						<button type="button" id="ownerTel_mb<?=$row->POID;?>" class="btn btn-orange3" onclick="checkShowTel('<?=$row->POID;?>','<?=$viewTelStatus?>','<?=$TelephoneShow2;?>');"><?=$TelephoneShow;?></button>
					</div>
					<div class="col-xs-6 clear-margin-padding-mobile visible-sm visible-xs">
	                    <button type="button" class="btn btn-orange3" data-toggle="modal" data-target="#myModal">แจ้งประกาศ</button>
					</div>
	           	    <div class="col-xs-6 clear-margin-padding-mobile visible-sm visible-xs">
						<button type="button" class="btn btn-green3" data-toggle="modal" disabled="disabled" data-target="#myModal2" onclick="$('#modal_poid').val('<?=$row->POID;?>');">ติดตาม</button>
					</div>
					<div class="col-xs-6 clear-margin-padding-mobile visible-sm visible-xs">
						<button type="button" class="btn btn-green3" onclick="$('#modal_poid').val('<?=$row->POID;?>');$('#modal_pic').val('<?=$this->dashboard->imageList($row->POID);?>');shareOnFacebook();"><i class="fa fa-facebook" aria-hidden="true"></i>  แชร์</button>
					</div>
				</div>
				<!--end mobile bt-->
				
				<div id="dash-list" class="col-md-4 col-xs-6 hidden-xs hidden-sm">
					<div style="padding: 0px 0px 5px 0px">
					   <h4 class="text-grey"> <a href="/zhome/unitDetailOwner/<?=$row->POID;?>" target="_blank"><?=$row->ProjectName?></a></h4><?if ($row->Active=="93"){ echo "<br>(ประกาศถูกซ่อน)";};?>
						<div class="text-grey">
							<span>ชั้น <?=$row->Floor;?></span>
							<span> <?=$Bedroom;?></span>
							<span> <?=$Bathroom;?></span>
							<span> <?=$row->useArea;?> ตร.ม.</span>
						</div>
				        <div class="text-grey2" style="padding-top: 8px;">
					  	  <span><?=$DistName;?></span>
					    </div>
					</div>

                 	<div class="col-md-6 text-grey" style="padding: 7px 6px 0px 0px">
						<button type="button" id="ownerTel<?=$row->POID;?>" class="btn btn-orange2 btn-dash" onclick="checkShowTel('<?=$row->POID;?>','<?=$viewTelStatus?>','<?=$TelephoneShow2;?>');"><?=$TelephoneShow;?></button>
					</div>
					<div class="col-md-6 text-grey i5-paading-top8" style="padding: 7px 0px 0px 6px">
					   <button type="button" class="btn btn-orange2 btn-dash" data-toggle="modal" data-target="#myModal">แจ้งประกาศ</button>
					</div>
					<div class="padding-top32"><strong><font color="red"><?=$Msg;?></font></strong></div>
				</div>

				
				<div id="dash-list2" class="col-md-4 col-xs-6 padding-lr0 hidden-xs hidden-sm">
					<div>
						<div class="text-grey col-md-12 col-xs-12 padding-lr0 pull-right">
							
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

					<div class="col-md-6" style="padding: 0px 6px 0px 0px">
						<button type="button" disabled="disabled" class="btn btn-green2 btn-dash padding-left-clear padding-right-clear text-center" data-toggle="modal" data-target="#myModal2" onclick="$('#modal_poid').val('<?=$row->POID;?>');">ติดตาม</button>
					</div>
					<div class="col-md-6 i5-paading-top8" style="padding: 0px 0px 0px 6px">
						<button type="button" class="btn btn-green2 btn-dash pull-right" onclick="$('#modal_poid').val('<?=$row->POID;?>');$('#modal_pic').val('<?=$this->dashboard->imageList($row->POID);?>');shareOnFacebook();"><i class="fa fa-facebook" aria-hidden="true"></i>  แชร์</button>
					</div>
				</div>
			</div>
			<div class="col-md-12 hidden-sm clear-margin-padding">
                 <hr>
            </div>
			<div class="clearfix visible-xs"></div>
            <div style="height:14px;" class="visible-xs"></div>

		<?php
		}
		?>
			
		


		<!-- Modal -->
		<div class="modal modal-sm fade display-none" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="text-white padding-none text-center" id="myModalLabel">แจ้งประกาศไม่มีคุณภาพ</h4>
					</div>
					<div class="modal-body text-grey row text-left">
						<div class="col-md-12">เราพยายามตรวจสอบคุณภาพประกาศเสมอ ขอบคุณที่ร่วมพัฒนาชุมชนของเรา</div>
						<div class="clearfix"></div>
						<br>
						<div class="col-md-12"><input id="pfullname" name="informer_name" class="form-control center-block " placeholder="ชื่อ-สกุล"  value="<?=$fullname;?>"></div>
						<div class="clearfix"></div>
				  
						<div class="col-md-12 padding-top10"><input id="pemail" name="informer_email" class="form-control center-block " placeholder="อีเมล" value="<?=$email;?>"></div>
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10"><input id="ptelphone" name="informer_telphone" class="form-control center-block " placeholder="เบอร์ติดต่อ"></div>

						<div class="clearfix"></div>
				  
						<div class="col-md-12 padding-top10 modal-warnning-select">
							<select id="ptype" name="problem_type" class="form-control input-sm selectpicker center-block text-grey3 modal-warnning-select-item">
								<option value="" class="text-grey3 pull-left" style="color: #999999;">กรุณาระบุ</option>
								<?php
								foreach ($qProblem->result() as $row){
									if($problem_type==$row->id){
										$sel="selected";
									}else{
										$sel="";
									}
									echo '<option value="'.$row->id.'" class="pull-left text-grey3" '.$sel.'>'.$row->name_th.'</option>';
								}
								?>
							</select>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10"><textarea id="pdetail" name="problem_detail" class="form-control center-block  " placeholder="คุณทราบได้อย่างไร" rows="3"></textarea></div>
						<div class="clearfix"></div>
						
						<div id="ckproblem" class="col-md-12" style="display:none;"><div class="text-red">กรุณากรอกข้อมูลให้ครบถ้วน</div></div>
				   
						<div class="clearfix"></div>
						<div class="col-md-12 padding-top10"><button type="button" class="btn btn-orange btn-block" onclick="submitFormHelpdesk()">แจ้งประกาศ</button></div>
					</div>
				</div>
			</div>
		</div>
		<!--End Modal-->
		
		<!-- Modal2 -->
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
							<div class="col-md-12 padding-top10"><button id="line-bt" type="button" class="btn btn-orange btn-block text-white" onclick="submitFormLineAlert();">ตกลง</button></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Modal2-->

		<!-- Modal3 -->
		<div class="modal modal-sm fade display-none" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content text-center">
					<div class="modal-header bg-blue">
						<h4 class="text-white text-center padding-none padding-t3" id="myModalLabel" style="">โทรหาเจ้าของ</h4>
					</div>
					<div class="modal-body row">
						<div id="txt_freecall" class="col-md-12 text-center padding-t120 padding-b120"><h4 class="text-grey">ดูเบอร์ติดต่อได้ฟรีวันนี้ 1 ครั้ง</h4></div>
						<div id="txt_quotacall" class="col-md-12 text-center padding-t120 padding-b120 display-none"><h4 class="text-grey">คุณใช้โควต้าของวันนี้แล้วกรุณา Share ประกาศเพื่อดูเพิ่มวันนี้อีก 1 ครั้ง</h4></div>
						<div class="clearfix"></div>
						<div class="clearfix"></div>
						<div id="modal_share" class="col-md-12 padding-top10 display-none">
							<button type="button" class="btn btn-orange4 btn-block text-white" onclick="shareOnFacebook();">Facebook</button>
						</div>
						<div id="modal_submit" class="col-md-12 padding-top10">
							<button type="button" class="btn btn-orange4 btn-block text-white" onclick="getOwnerPhone();">ตกลง</button>
						</div>
						<div class="col-md-12 padding-top10">
							<button type="button" class="btn btn-grey btn-block text-white" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
						</div>
				    </div>
				</div>
			</div>
		</div>
		<!--End Modal3-->