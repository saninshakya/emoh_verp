


<input type="hidden" id="unitToken" name="unitToken" value="">

<form action="http://zhome.aofdev.com/zhome/changePage1" class="email" id="myform" method="post" accept-charset="utf-8">
<input type="hidden" name="key_change" id="key_change" value="2">
<input type="hidden" name="last_page" id="last_page" value="2">
<input type="hidden" name="unit_token" id="unit_token" value="860337b046f4e0987c6b1edca56b0e32">
<div class="container">
	<div class="row">
		<div class="col-md-7 col-md-push-2">
          <!--input1-->
		  <div class="input1">
	            
	      <div class="col-md-12 bg-orange margin-t20">
			          <div class="clearfix"></div>
			          <div class="visble-xs visible-sm height5"></div>
			          <h3 class="text-white">ข้าพเจ้า/คนในครอบครัวเป็นเจ้าของทรัพย์สินที่ลงประกาศ</h3>
			          <div class="checkbox">
			            <label>
			              <input class="margin-t4im" type="checkbox"  value="" name="Agree_Owner" id="Agree_Owner" onClick=""><p class="padding-none font20 text-white" id="showAgree_Owner">ยืนยัน</p>
			            </label>
			          </div>
			          <div class="height5"></div>
		          </div>
		          <hr>

		   <div class="row">
		          <div class="clearfix"></div>
		          <div class="height10 hidden-xs hidden-sm"></div>
		          <div class="col-md-12">
		              <h5>กรุณาระบุเบอร์โทรศัพท์และ Line ID (แอด Line@ : ZmyHome  เพื่อสอบถามวิธีลงประกาศ)</h5>
		          </div>
		      </div>
		      <div class="row">
		        <div class="col-xs-12 col-md-4">
		          <div class='q-formtitle' id="showTelephone1"><?=$qLabel['telephone'][0];?></div>
		          <input name="Telephone1" id="Telephone1" class="form-control q-input" type="tel" placeholder="โปรดระบุ" <?php if ($Telephone1!=""){echo 'Value="'.$Telephone1.'"';};?> onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)">
		        </div>
		        <div class="col-xs-12 col-md-4">
		          <div class='q-formtitle'><?=$qLabel['line_id'][0];?></div>
		          <div class='checkbox'>
		            <input class='q-input-chk' type="checkbox" <?php if ($this->post->checkPost('TelLineID')==1){echo "Checked";};?> value="<?php echo $this->post->checkPost('TelLineID');?>" name="TelLineID" id="TelLineID" onClick="updateTelLineID(this.value)">
		            <label for='TelLineID' class="text-grey noselect"> ใช้เบอร์มือถือนี้ผูกกับ Line ID</label>
		          </div>
		        </div>
		        <div class="col-xs-12 col-md-4 q-input-line-id">
		          <div class="q-formtitle hidden-xs">&nbsp;</div>
		          <input name="LineID" id="LineID" class="form-control q-input fade03s" type="text"  placeholder="ระบุ ID Line" onchange="updatePost('LineID');" value="<?php echo $this->post->checkPost('LineID');?>" <?php if ($this->post->checkPost('TelLineID')==1){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['line_id_title'][0];?>');" onmouseout="hide_title();">
		        </div>
		   </div>
		   <hr>
		   <div class="row">
		              <div class="col-xs-12 col-md-4">
		                <div class="normal_msg q-formtitle" id="ShowTOOwner"><?=$qLabel['owner_type'][0];?></div>
		                <select class="form-control selectpicker" name="TOOwner" id="TOOwner" onchange="updatePost('TOOwner')" onmouseover="show_title('<?=$qLabel['owner_type_title'][0];?>');" onmouseout="hide_title();"  data-style="btn-zmyhome" data-width="100%">
		                  <option disabled selected value="0" class="col-xs-12">เลือก</option>
		                  <?php
		                  $prefix="TOOName_".$this->session->userdata('lang');
		                  foreach ($qTOOwner->result() as $row)
		                  {
		                    if ($TOOwner==$row->TOOID){
		                     $sel="selected";
		                   } else {
		                     $sel="";
		                   };
		                   echo '<option class="col-xs-12" value="'.$row->TOOID.'" '.$sel.'>'.$row->$prefix.'</option>';
		                 }
		                 ?>
		               </select>
		             </div>
		             <div class="col-xs-12 col-md-8">
		              <div class='q-formtitle' id="ShowOwnerName"><?=$qLabel['owner_name'][0];?></div>
		              <input name="OwnerName" id="OwnerName" class="form-control q-input" type="text" <?php if ($OwnerName!=""){echo 'Value="'.$OwnerName.'"';};?> placeholder="โปรดระบุ" onchange="updatePost('OwnerName')" onmouseover="show_title('<?=$qLabel['owner_name_title'][0];?>');" onmouseout="hide_title();">
		            </div>
		  </div>


          <div class="row">
             <div class="col-md-4">
              <div class='q-formtitle' id="ShowTOAdvertising"><?=$qLabel['advertising'][0];?></div>
     
              <select id="ShowType" class="form-control selectpicker" name="TOAdvertising" data-style="btn-zmyhome" data-width="100%">
                <option disabled selected value="0" class="col-xs-12">เลือก</option>
                <option value="1" class="col-xs-12">ขาย</option>
                <option value="2" class="col-xs-12">ขายดาวน์</option>
                <option value="3" class="col-xs-12">เช่า</option>
                <option value="4" class="col-xs-12">ขายสิทธิการเช่า</option>
             </select>
             
           </div>
           <div class="col-md-8 padding-none">
              <div class="col-md-12 title-z"></div>
              <div id="t1" class="col-md-12 display-none">
                ข้อมูลจำเป็นเพื่อลงประกาศ [ขาย]<br>
                1.รูปถ่ายโฉนด หน้า-หลัง<br>
                2.รูปถ่ายห้องจริง (แนวนอน)
              </div>
              <div id="t2" class="col-md-12 display-none">
                ข้อมูลจำเป็นเพื่อลงประกาศ [ขายดาวน์]<br>
                1.รูปถ่ายหน้าสัญญาจะซื้อจะขาย แสดงรายละเอียดการผ่อนดาวน์<br>
                2.รูปจากเว็บโครงการหรือรูปถ่ายห้องตัวอย่าง (แนวนอน)
              </div>
              <div id="t3" class="col-md-12 display-none">
                ข้อมูลจำเป็นเพื่อลงประกาศ [เช่า]<br>
                1.รูปถ่ายโฉนด หน้า-หลัง<br>
                2.รูปถ่ายห้องจริง (แนวนอน)
              </div>
              <div id="t4" class="col-md-12 display-none">
                ข้อมูลจำเป็นเพื่อลงประกาศ [ขายสิทธิการเช่า]<br>
                1.รูปถ่ายหนังสือสัญญาเช่าระยะยาว<br>
                2.รูปถ่ายห้องจริง (แนวนอน)
              </div>
           </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-md-4">
              <div class='q-formtitle' id="ShowTOProperty"><?=$qLabel['property_type'][0];?></div>
              <select id="house-types" class="form-control selectpicker" name="TOProperty" id="TOProperty" data-toggle="tooltip" data-placement="bottom" data-style="btn-zmyhome" data-width="100%">
                  <option disabled selected value="0" class="col-xs-12">เลือก</option>
                  <option value="1" class="col-xs-12">คอนโดมิเนี่ยม</option>
                  <option value="2" class="col-xs-12">บ้านเดี่ยว</option>
                  <option value="3" class="col-xs-12">บ้านแฝด</option>
                  <option value="4" class="col-xs-12">ทาวน์เฮาส์</option>
                  <option value="5" class="col-xs-12">ตึกแถว</option>
                  <!--<?php
                  $prefix="TOPName_".$this->session->userdata('lang');
                  foreach ($qTOProperty->result() as $row)
                  {
                    if ($TOProperty==$row->TOPID){
                     $sel="selected";
                   } else {
                     $sel="";
                   };
                   echo '<option value="'.$row->TOPID.'" '.$sel.'>'.$row->$prefix.'</option>';
                 }
                 ?>-->
             </select>
           </div>

           <div class="col-xs-12 col-md-8"> 
              <div id="condo-input" class="display-none">
                <div class="title-z" id="ShowProjectName">ระบุชิ้อโครงการ (คอนโดมิเนียม)<?//=$qLabel['project_name'][0];?></div>
                <input id="ProjectName" Name="ProjectName" class="form-control q-input" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['project_name_title'][0];?>" type="text" <?php if ($ProjectName!=""){echo 'Value="'.$ProjectName.'"';};?> placeholder="โปรดระบุ" onchange="updateProjectName();" onmouseover="show_title('<?=$qLabel['project_name_title'][0];?>');" onmouseout="hide_title();">
              </div>
              <div id="house-input" class="display-none">
                <div class="title-z" id="ShowHouseName">ที่อยู่ตามโฉนด (ระบุชื่อโครงการด้วย หากทรัพย์สินอยู่ในโครงการ)</div>
                <input id="HouseName" Name="HousetName" class="form-control q-input" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['house_name_title'][0];?>" type="text"  placeholder="โปรดระบุ"  onmouseover="" onmouseout="">
              </div>
          </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-4">
              <div class='title-z' id="ShowTOProperty">จังหวัด</div>
              <select id="" class="form-control  selectpicker text-grey pull-left"   data-style="btn-zmyhome" data-width="100%">
                  <option disabled selected value="0" class="col-xs-12">เลือก</option>
                  <option value="1" class="col-xs-12">กรุงเทพ</option>
                  
             </select>
            </div>
            <div class="col-xs-12 col-md-4">
              <div class='title-z' id="ShowTOProperty">เขต/อำเภอ</div>
              <select id="" class="form-control selectpicker" data-style="btn-zmyhome" data-width="100%">
                  <option disabled selected value="0" class="col-xs-12">เลือก</option>
                  <option value="1" class="col-xs-12">บางเขน</option>
                  
              </select>
            </div>
        </div>


       
	     <?php
	     if (isset($txtMapChange)){
	      if ($txtMapChange!="disabled"){
	       echo "<h5 class='text-primary'>".$txtMapChange."</h5>";
	     }
	   }
	   ?>     
	   <hr>   
	   <div class="row">
	    <div class="col-md-12">
	     <div class="q-formtitle">
	       <p>ปักหมุดลงแผนที่</p>
	       <p style="color:rgba(0,0,0,0.4); font-size: 15px;">(เลื่อนหมุดไปไว้ตำแหน่งที่ถูกต้อง ถ้าไม่เห็นหมุดให้ซูมออก)</p>
	     </div>
	     <input name="lat" id="lat" type="hidden" value="<?php echo $rowChk->Lat;?>">
	     <input name="lng" id="lng" type="hidden" value="<?php echo $rowChk->Lng;?>">
	   </div>
	   <div class="col-xs-12">
	     <?php echo $map['html']; ?>
	   </div>             
	 </div>
	 <div class="clearfix"></div>
	 <div class="height20"></div>
	 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
	    <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
	 </div>
	 <hr>



	  <div class="row">
			<div class="col-xs-6 col-md-5 col-lg-3">
						
			</div> 
			<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
						<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput2();">ถัดไป</button>
			</div>
	  </div>
	  <br>

	</div>
	<!--end input1-->

	<!--input2-->
	<div class="input2 display-none">
			
	        
	          <h3 class="text-primary">ข้อมูลพื้นฐาน</h3>
		      <div class="checkbox">
		        <p class="text-primary big2">ระบุข้อมูลให้ถูกต้อง หากไม่แน่ใจ สามารถตรวจสอบโฉนดหรือเอกสารโครงการแล้วกลับมาแก้ไขได้</p>
		      </div>
		      <hr>

		      <div class="row">
			       <div class="col-md-4">
			          <h5>ข้อมูลกายภาพ</h5>
			       </div>
		      </div>
              <div class="row">
                 <div class="col-md-4 col-sm-7 title-z">
				      <div><?=$qLabel['tower_name'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ไม่ต้องกรอกหากมีโครงการเดียว" ><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
				      <input class="form-control input-z" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['tower_name_title'][0];?>" type="text" placeholder="โปรดระบุ" name="Tower" id="Tower" onchange="updatePost('Tower')" value="<?php echo $this->post->checkPost('Tower');?>" onmouseover="show_title('<?=$qLabel['tower_name_title'][0];?>');" onmouseout="hide_title();">
			     </div>
			    <div class="col-md-4 col-sm-7 title-z">
			      <div id="ShowRoomNumber"><?=$qLabel['room_no'][0];?></div>
			      <input class="form-control input-z" type="text" placeholder="โปรดระบุ"name="RoomNumber" id="RoomNumber" onchange="updatePost('RoomNumber')" value="<?php echo $this->post->checkPost('RoomNumber');?>" onmouseover="show_title('<?=$qLabel['room_no_title'][0];?>');" onmouseout="hide_title();">
			    </div>
			    <div class="col-md-4 col-sm-7 title-z">
			      <div id="ShowAddress"><?=$qLabel['address'][0];?></div>
			      <input class="form-control input-z" type="text" placeholder="โปรดระบุ"name="Address" id="Address" onchange="updatePost('Address')" value="<?php echo $this->post->checkPost('Address');?>" <?php if($this->post->checkPost('TOAdvertising')=="2"){ echo "disabled";};?> onmouseover="show_title('<?=$qLabel['address_title'][0];?>');" onmouseout="hide_title();">
			    </div>
             </div>
             <br>
             <div class="row">
			   <div class="col-md-4 col-sm-7 title-z">
			     <div id="ShowFloor"><?=$qLabel['floor'][0];?></div>
			     <input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="Floor" id="Floor" onchange="updatePost('Floor')" value="<?php echo $this->post->checkPost('Floor');?>" maxlength="5" onmouseover="show_title('<?=$qLabel['floor_title'][0];?>');" onmouseout="hide_title();">
			   </div>
			   <div class="col-md-4 col-sm-7 title-z">
			     <div id="ShowBedroom"><?=$qLabel['bedroom_no'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องนอนที่ไม่มีห้องน้ำนับเป็น 0.5"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
			     <select class="form-control input-z" name="Bedroom" id="Bedroom" onchange="updatePost('Bedroom')" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['bedroom_no_title'][0];?>" onmouseover="show_title('<?=$qLabel['bedroom_no_title'][0];?>');" onmouseout="hide_title();">
			      <option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
			      <option value="99" <?php if ($this->post->checkPost('Bedroom')==99){echo "selected";};?>>สตูดิโอ</option>
			      <?php
			      $i=1;
			      while ($i<=7){
			        ?>
			        <option value="<?echo $i;?>" <?php if ($this->post->checkPost('Bedroom')==$i){echo "selected";};?>><?echo $i;?> ห้องนอน</option>
			        <?php
			        $i=$i+0.5;
			      }
			      ?>
			    </select>
			  </div>
			  <div class="col-md-4 col-sm-7 title-z">
			    <div id="ShowBathroom"><?=$qLabel['bathroom_no'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องน้ำที่ไม่มีส่วนอาบน้ำนับเป็น 0.5 ห้องน้ำ"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
			    <select class="form-control input-z" name="Bathroom" id="Bathroom" onchange="updatePost('Bathroom')" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['bathroom_no_title'][0];?>" onmouseover="show_title('<?=$qLabel['bathroom_no_title'][0];?>');" onmouseout="hide_title();">
			      <option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
			      <?php
			      $i=1;
			      while ($i<=10){
			        ?>
			        <option value="<?echo $i;?>" <?php if ($this->post->checkPost('Bathroom')==$i){echo "selected";};?>><?echo $i;?> ห้องน้ำ</option>
			        <?php
			        $i=$i+0.5;
			      }
			      ?> 
			    </select>
			  </div>
			</div>
			<br>

			<div class="row">
				 <div class="col-md-4 col-sm-7 title-z">
				  <div><?=$qLabel['direction'][0];?></div>
				  <select class="form-control input-z" name="Direction" id="Direction" onchange="updatePost('Direction')" onmouseover="show_title('<?=$qLabel['direction_title'][0];?>');" onmouseout="hide_title();">
				    <option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
				    <?php
				    $query=$this->post->direction();
				    foreach ($query->result() as $row){
				      ?>
				      <option value="<?echo $row->DID;?>" <?php if ($this->post->checkPost('Direction')==$row->DID){echo "selected";};?>><?echo $row->DName;?></option>
				      <?php
				    }
				    ?> 
				  </select>               
				</div>
				<div class="col-md-4 col-sm-7 title-z">
				  <div id="ShowuseArea"><?=$qLabel['usearea'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="พื้นที่ที่ระบุในสัญญา/โฉนด"><span class="glyphicon glyphicon-info-sign  input-sm4  padding-clear" aria-hidden="true"></span></a></div>
				  <input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="useArea" id="useArea" onchange="updatePost('useArea')" value="<?php echo $this->post->checkPost('useArea');?>" OnKeyPress="return chkNumber(this)" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['usearea_title'][0];?>" onmouseover="show_title('<?=$qLabel['usearea_title'][0];?>');" onmouseout="hide_title();">
				</div>
				<div class="col-md-4 col-sm-7 title-z display-none">
				  <div><?=$qLabel['terracearea'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้าไม่ระบุ ค่าธรรมเนียมซื้อขายที่คำนวณจะสูงกว่าความเป็นจริงเล็กน้อย"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
				  <input class="form-control input-z" type="text" placeholder="โปรดระบุ"name="terraceArea" id="terraceArea" onchange="updatePost('terraceArea')" value="<?php echo $this->post->checkPost('terraceArea');?>"  OnKeyPress="return chkNumber(this)" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['terracearea_title'][0];?>" onmouseover="show_title('<?=$qLabel['terracearea_title'][0];?>');" onmouseout="hide_title();">
				</div>
				</div>
				<hr/>
				<div class="row">
				 <div class="col-md-4">
				  <h5><?=$qLabel['ocarpark'][0];?></h5>
				</div>
				</div>

			<div class="row">
				 

				<div class="col-md-4 col-sm-7">
					  <div class="q-formtitle" ><?=$qLabel['ocarpark_nofixed'][0];?></div>

					  <select class="form-control input-z" name="NCarPark" id="NCarPark"  onchange="updatePost('NCarPark')" onmouseover="show_title('<?=$qLabel['ocarpark_nofixed_title'][0];?>');" onmouseout="hide_title();">
					    <option selected="true" value=0>โปรดเลือก</option>
					    <?php
					    $i=1;
					    while ($i<=5){
					      ?>
					      <option value="<?echo $i;?>" <?php if ($this->post->checkPost('NCarPark')==$i){echo "selected";};?>>ไม่ระบุช่องจอด <?php if($i!=0){echo $i;};?>คัน</option>
					      <?php
					      $i++;
					    }
					    ?>
					  </select>

				</div>
				<div class="col-md-4 col-sm-7">
				  <div class="q-formtitle" ><?=$qLabel['ocarpark_fixed'][0];?></div>

				  <select class="form-control q-input" name="ACarPark" id="ACarPark" onchange="updatePost('ACarPark')" onmouseover="show_title('<?=$qLabel['ocarpark_fixed_title'][0];?>');" onmouseout="hide_title();">
				    <option selected="true" value=0>โปรดเลือก</option>
				    <?php
				    $i=1;
				    while ($i<=5){
				      ?>
				      <option value="<?echo $i;?>" <?php if ($this->post->checkPost('ACarPark')==$i){echo "selected";};?>>ระบุช่องจอด <?php if($i!=0){echo $i;};?>คัน</option>
				      <?php
				      $i++;
				    }
				    ?>
				  </select>

				</div>
				<div class="col-md-4 col-sm-7">
				  <div class="q-formtitle"><?=$qLabel['ocarpark_certificate'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้ามีโฉนดเฉพาะสำหรับที่จอดรถ"><span class="glyphicon glyphicon-info-sign  input-sm4  padding-clear" aria-hidden="true"></span></a></div>

				  <select class="form-control q-input is-disabled" name="OCarPark" id="OCarPark" onchange="updatePost('OCarPark')" data-toggle="tooltip" data-placement="bottom" onmouseover="show_title('<?=$qLabel['ocarpark_certificate_title'][0];?>');" onmouseout="hide_title();">
				    <option selected="true" value=0>โปรดเลือก</option>
				    <?php
				    $i=1;
				    while ($i<=5){
				      ?>
				      <option value="<?echo $i;?>" <?php if ($this->post->checkPost('OCarPark')==$i){echo "selected";};?>>มีโฉนดที่จอดรถ <?php if($i!=0){echo $i;};?>คัน</option>
				      <?php
				      $i++;
				    }
				    ?>
				  </select> 

				</div>
				
			</div>

			<hr/> 


			<div class="row">
			  <div class="col-md-4">
			    <h5><?=$qLabel['special_features'][0];?></h5>
			  </div>
			</div>
			<div class="row">
			 <div class="col-md-4 col-sm-4 col-xs-12">
			   <?php
			   foreach ($TOCondoSpec1->result() as $row){
			     ?>
			     <label class="checkbox bg-info padding-pro noselect pointer">
			       <label>
			         <input type="checkbox" value="<?php echo $row->TOCSID;?>" onClick="updateCondoSpec(this.value)" <?php echo $this->post->checkCondoSpec($row->TOCSID);?>><p class="text-grey"><?php echo $row->CSName_th;?></p>
			       </label>
			     </label>
			     <?php
			   }
			   ?>
			 </div>

			 <div class="col-md-4 col-sm-4 col-xs-12">
			   <?php
			   foreach ($TOCondoSpec2->result() as $row){
			     ?>
			     <label class="checkbox bg-warning padding-pro noselect pointer">
			       <label>
			         <input type="checkbox" value="<?php echo $row->TOCSID;?>" onClick="updateCondoSpec(this.value)" <?php echo $this->post->checkCondoSpec($row->TOCSID);?>><p class="text-yellow"><?php echo $row->CSName_th;?></p>
			       </label>
			     </label>
			     <?php
			   }
			   ?>

			 </div>

			 <div class="col-md-4 col-sm-4 col-xs-12">

			   <?php
			   foreach ($TOCondoSpec3->result() as $row){
			     ?>
			     <label class="checkbox bg-success padding-pro noselect pointer">
			       <label>
			         <input type="checkbox" value="<?php echo $row->TOCSID;?>" onClick="updateCondoSpec(this.value)" <?php echo $this->post->checkCondoSpec($row->TOCSID);?>><p class=""><?php echo $row->CSName_th;?></p>
			       </label>
			     </label>
			     <?php
			   }
			   ?>
			  </div>
			 </div>
			<div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
			<hr>




            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput1()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput3()">ถัดไป</button>
				</div>
			</div>
			<br>
    </div>
    <!--end input2-->

		<!--input31-->
		<div class="input3 input31 display-none">
		   <h3 class="text-primary">ตั้งราคาขาย</h3>

		   <div class="checkbox">
				<p class="text-primary">เพื่อป้องกันความสับสน ราคาที่ประกาศให้ผู้ขายรวมค่าใช้จ่ายทุกอย่างแล้ว <small class="text-primary">ยกเว้นค่าจดจํานอง</small></p>
				<p class="text-grey">
					1. ปรับราคาประกาศขาย เพื่อให้ได้ราคาสุทธิที่ท่านต้องการ<br/>
					2. กำหนดเวลายืนยันราคาขาย<br/>
					3. ยืนยันการใช้บริการ<span class="text-danger">นายหน้า</span>เพื่อให้คุณได้ลูกค้าเร็วขึ้น (คุณยังได้ราคาสุทธิเท่าเดิม)<br/>
		
				</p>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-12">
					<h5>กำหนดราคาและการชำระเงิน</h5>
				</div>

				<div class="col-md-8">
					<div class="title-z"><span id="showNetPrice">ราคาสุทธิที่ต้องการ (บาท) *</span></div>
					<ul class="list-inline">
						<li class="col-md-6"><input class="form-control input-z enter-prize" type="text" placeholder="ราคาบาท" name="NetPrice" id="NetPrice" onclick="this.value=document.getElementById('HNetPrice').value;" onchange="updatePost('NetPrice');changeformat();" value="<?php echo '฿'.number_format($this->post->checkPost('NetPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['netprice_title'][0];?>');" onmouseout="hide_title();"></li>  
						<li class="col-md-6"><div class="input-z"><span id="avg">฿<?php echo number_format((($this->post->checkPost('NetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?></span><span class="sqm display-none">/ตร.ม.</span></div></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title-z">ยืนยันราคาขาย (วัน) *</div>
					<select class="form-control input-z" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')" onmouseover="show_title('<?=$qLabel['agreepostday_title'][0];?>');" onmouseout="hide_title();">
						<?php
						$i=30;
						while ($i<=180){
							?>
							<option value="<?php echo $i;?>" <?php if ($AgreePostDay==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
							<?php
							$i=$i+30;
						}
						?>
					</select>

				</div>
			</div>

			<div class="clearfix"></div><br class="hidden-xs">



		  
            
           
		   
            <div class="col-md-12 padding-none"><hr></div>
           

            
			<div class="col-md-12 padding-none">
					<h5>เพิ่มโอกาสในการขายด้วยนายหน้า </h5>
					<div class="col-md-12 padding-none">(ไม่จำเป็นต้องเลือก หากไม่ต้องการใชบริการนายหน้า)</div>
				    <div class="clearfix"></div>
				    <br>
					<ul class="list-inline">
						<li class="col-md-4">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox" name="Broker" id="Broker"  value="0" onclick="changeValue('Broker');updatePost('Broker');"><p class="text-grey">ตกลง</p>
								</label>
							</div>
						</li>
						<li class="col-md-8 padding-t11"><div class="input-z"><span class="text-danger">ตัวอย่างค่าบริการ 2.0% </span><span class="text-danger" id="showBrokerPrice">฿0</span></div></li>
					</ul>

				
					<div class="clearfix"></div>
					<p class="text-grey">ราคาสำหรับนายหน้านำไปเสนอขาย <span class="text-green" id="showTotalPriceBroker">฿<?php echo number_format($this->post->checkPost('TotalPriceBroker'),0,'.',',');?></span> หรือ <span class="text-green" id="showTotalPriceBroker2">฿<?php echo number_format((($this->post->checkPost('TotalPriceBroker'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p> 
			</div>
			
			
			<div class="col-md-12 padding-none"><hr></div>
            <div class="row padding-none">
	            <div class="col-md-12 padding-none">
						<h5>สถานะปัจจุบันของบ้าน/ห้องชุดที่จะขาย</h5>
			    </div>
		    </div>
           
            <div class="row">
		        <div class="col-md-4">
					<div class="title-z normal_msg" id="ShowStatusPRent"><?=$qLabel['residence_status_now'][0];?></div>
					<select class="form-control input-z" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();" onmouseover="show_title('<?=$qLabel['residence_status_now_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected value="3">ว่าง/มีผู้เช่า</option>
						<option value="0" <?php if ($this->post->checkPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
						<option value="1" <?php if ($this->post->checkPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
					</select>
				</div>
			</div>

		    <div class="clearfix"></div>
			<div class="col-md-12 padding-none"><hr></div>
            <div class="row">
				<div class="col-md-12"><h5>รายละเอียดการเช่า</h5></div>
				<div class="col-md-4">
					<div class="title-z normal_msg">ค่าเช่าสุทธิที่ได้(บาท/เดือน)</div>
					<input class="form-control input-z" type="text">
					
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['residence_detail_rent_nation'][0];?></div>
					<select class="form-control input-z" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected>ระบุสัญชาติผู้เช่ากรณีมีผู้เช่าอยู่</option>
						<?php
						$query=$this->post->qRentNational();
						foreach ($query->result() as $row){
							$i=$row->RNID;
							$name=$row->Name_th;
							?>
							<option value="<?php echo $i;?>" <?php if ($this->post->checkPost('PRentNational')==$i){echo "selected";};?>><?php echo $name;?></option>
							<?php
						}
						?>
					</select>
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['residence_detail_rent_end'][0];?></div>
					<input class="form-control input-z" type="text" name="PRentEnd" id="PRentEnd" data-date-format="yyyy-mm-dd" onblur="setTimeout(function(){updatePost('PRentEnd')}, 500);" value="<?php echo $this->post->checkPost('PRentEnd');?>" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['residence_detail_rent_end_title'][0];?>');" onmouseout="hide_title();">
				</div>
				<div class="clearfix"></div>
				<div class="col-md-12"><hr></div>
			</div>







			<div class="col-md-12 padding-none">
				<div class="checkbox">
						<label class="padding-none">
							<input type="checkbox" name="" id=""><div class="padding-t3"><h5 class="margin-top-clear">ยืนยันค่าโอนคนละครึ่งเป็นมาตรฐาน</p></div>
						</label>
			    </div>
			    <div class="col-md-12 padding-none">รายละเอียดอื่นๆ(ขอสงวนสิทธิในการลงชื่อเบอร์โทร)</div>	
			</div>
            



           


       
		    <div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
            <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput2back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput4()">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>

		<!--end input3-->

		<!--input32-->
		<div  id="input32" class="input32 display-none">
            <h3 class="text-primary">ตั้งราคาขายดาวน์</h3>
			<p class="text-primary big2">เพื่อป้องกันความสับสน ราคาที่ประกาศจะแสดงราคาขายสุทธิเป็นหลัก<br>- ราคาขายสุทธิ = ราคาที่ซื้อมาจากโครงการ + กำไรที่ต้องการ<br>- ราคาขายดาวน์ = เงินที่จ่ายโครงการแล้วทั้งหมด + กำไรที่ต้องการ</p>
			<hr>
		
			<div class="row">
				<div class="col-md-4">
					<h5 class="margin-bottom-clear-pc">ราคาหน้าสัญญาจะซื้อจะขาย <a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm  padding-none" aria-hidden="true"></span></a></h5>
					
					<input class="form-control input-z">
				</div>
				<div class="height20 visible-xs visible-sm"></div>
				<div class="col-md-4">
				   <h5>ชำระแล้ว (บาท)</h5>
				   <input class="form-control input-z">
				</div>
				<div class="height20 visible-xs visible-sm"></div>
				<div class="col-md-4">
                <h5 id="showAgreePostDay9" class="margin-bottom-clear-pc"><?=$qLabel['agreepostday'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ไม่ขึ้นราคาเมื่อมีผู้โทรมาสอบถาม" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm  padding-clear" aria-hidden="true"></span></a></h5>
					<select class="form-control input-z" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['agreepostday_title'][0];?>" onmouseover="show_title('<?=$qLabel['agreepostday_title'][0];?>');" onmouseout="hide_title();">
					<option value=0 disabled selected>โปรดเลือก</option>
					<?php
					$i=30;
					while ($i<=180){
					?>
						<option value="<?php echo $i;?>" <?php if ($AgreePostDay==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
					<?php
						$i=$i+30;
					}
					?>
					</select>
				</div>
				<div class="clearfix"></div>
				<div class="height20"></div>
				<div class="col-md-4">
				   <h5>เหลือผ่อนชำระ (งวด)</h5>
				   <input class="form-control input-z">
				</div>
            </div> 
            <br/> 
            <div class="row">
				<div class="col-md-4">
					<h5  id="showPrefixDProfitPrice9"><?=$qLabel['dprofitprice_prefix'][0];?></h5>
					<select class="form-control input-z" name="PrefixDProfitPrice" id="PrefixDProfitPrice" onchange="updatePost('PrefixDProfitPrice');calDTotalPrice();" onmouseover="show_title('<?=$qLabel['dprofitprice_prefix_title'][0];?>');" onmouseout="hide_title();">
						<option value="3" disabled selected>โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('PrefixDProfitPrice')==1){echo "selected";};?>>ต้องการกำไร</option>
						<option value="0" <?php if ($this->post->checkPost('PrefixDProfitPrice')==0){echo "selected";};?>>ยอมขาดทุน</option>
						<option value="2" <?php if ($this->post->checkPost('PrefixDProfitPrice')==2){echo "selected";};?>>ขายเท่าทุน</option>
					</select>
				</div>
				<br class="visible-xs visible-sm">
				<div class="col-md-4">
					<h5 id="showDProfitPrice9"><?=$qLabel['dprofitprice'][0];?></h5>
					<input class="form-control input-z" type="text" name="showDProfitPrice" id="showDProfitPrice" value="฿<?php echo number_format($this->post->checkPost('DProfitPrice'),0,'.',',');?>" onclick="this.value=document.getElementById('DProfitPrice').value" onchange="changeFormat('showDProfitPrice','DProfitPrice');calDAllPayment();setTimeout(function(){calDTotalPrice()}, 100);" OnKeyPress="return chkNumber(this)" onmouseover="show_title('<?=$qLabel['dprofitprice_title'][0];?>');" onmouseout="hide_title();">
				</div>
            </div>
            <br/>
            <div class="row">
				<div class="col-md-8">
				 <div class="col-md-12 padding-left-clear">ราคาขายสุทธิ  ฿________ </div>
				 <div class="col-md-12 padding-left-clear">ราคายายดาวน์ ฿________  </div>
				</div>
		
            </div>    
            <br>
            <hr/>

             
            <div class="row">
				<div class="col-md-12">
					<h5>ส่งภาพถ่ายหน้าสัญญาจะซื้อจะขาย</h5>
					<p>ทีมงานใช้เพื่อตรวจสอบความถูกต้องของประกาศและยืนยันความเป็นเจ้าของเท่านั้น (ข้อมูลปกปิด)</p>
					<div class="height10"></div>
					<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
	                    <div class="col-md-6 col-xs-12 clicker pull-left padding-none">
			           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addcontractphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
			           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
			                        <div class="" style="position:relative; height:200px">
			                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
			                            <div id="waiting4"></div>   
			                         
			                             
			                          </div>
			                          <div class="col-md-12 col-xs-12">
			                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
			                           </div>
			                        </div>

							
							
								
									 </a>
			                    </div>
					     
						 </div>
				    </form>
				</div>
			</div>
			<br>
            <hr/>
            <div class="row">
				<div class="col-md-12">
					<h5><?=$qLabel['broker'][0];?></h5>
					<p class="text-red"><?=$qLabel['broker_description'][0];?></p>
                    <ul class="list-inline">
						<li>
							<div class="checkbox padding-pro4 table-bordered">
								<label>
									<input type="checkbox" name="DBroker" id="DBroker" <?php if ($this->post->checkPost('DBroker')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('DBroker');?>" onclick="changeValue('DBroker');updatePost('DBroker');">
									<p class="text-grey">ตกลง</p>
								</label>
							</div>
						</li>
						<li><span class="hidden-xs hidden-sm" style="margin-left:16px;"></span><span class="text-danger"><?=$qLabel['broker_price'][0];?> </span><span class="text-danger" id="showDBrokerPrice">฿<?php echo number_format($this->post->checkPost('DBrokerPrice'),0,'.',',');?></span></li>
                    </ul>
					<div class="clearfix"></div>
                    <p class="text-grey"><?=$qLabel['broker_price_total'][0];?> <span class="text-green" id="showDBrokerTotalPrice">฿<?php echo number_format($this->post->checkPost('DBrokerTotalPrice'),0,'.',',');?></span>
					<div class="clearfix"></div>
					
				</div>
            </div>
           
			
			
	
			<br>
			<hr/>
            <div class="row">
				<div class="col-md-12"><h5>โปรโมชั่นที่ได้รับจากโครงการ</h5></div>
				<br>
				<div class="col-md-4">
                    <div class="checkbox table-bordered padding-checkbox">
						<label>
							<input type="checkbox" name="DFreeTransfer" id="DFreeTransfer" <?php if ($this->post->checkPost('DFreeTransfer')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('DFreeTransfer');?>" onclick="changeValue2('DFreeTransfer');"><p class="text-grey">ฟรีค่าธรรมเนียมการโอน</p>
						</label>
                    </div>
					<div style="padding-top:29px"></div>
					<!--may11-->
                    <div class="checkbox table-bordered padding-checkbox">
						<label>
							<input type="checkbox" name="DFreeMember" id="DFreeMember" <?php if ($this->post->checkPost('DFreeMember')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('DFreeMember');?>" onclick="changeValue2('DFreeMember');"><p class="text-grey">ฟรีเงินกองทุนนิติบุคคล</p>
						</label>
                    </div>
					<div class="title-z">เฟอร์นิเจอร์</div>
                    <input class="form-control input-z" type="text" placeholder="ระบุ"name="DFreeFurniture" id="DFreeFurniture"  value="<?php echo $this->post->checkPost('DFreeFurniture');?>" onchange="updatePost('DFreeFurniture');">
                    
				</div>
				<div class="col-md-4">
                    <br class="visible-xs visible-sm">
                    <div class="checkbox table-bordered padding-checkbox">
						<label>
							<input type="checkbox" name="DFreeContract" id="DFreeContract" <?php if ($this->post->checkPost('DFreeContract')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('DFreeContract');?>" onclick="changeValue2('DFreeContract');"><p class="text-grey">ฟรีค่าจดจำนอง</p>
						</label>
                    </div>
                    <div class="title-z">ฟรีค่าส่วนกลาง</div>
                    <select class="form-control input-z" name="DFreeFeeMember" id="DFreeFeeMember" onchange="updatePost('DFreeFeeMember');">
						<?php
						$i=0;
						while ($i<=10){
						?>
							<option value="<?php echo $i;?>" <?php if ($this->post->checkPost('DFreeFeeMember')==$i){echo "selected";};?>><?php echo $i;?>ปี</option>
						<?php
							$i++;
						}
						?>
                    </select>
                    <div class="title-z">เครื่องใช้ไฟฟ้า</div>
                    <input class="form-control input-z" type="text" placeholder="ระบุ"name="DFreeElectric" id="DFreeElectric"  value="<?php echo $this->post->checkPost('DFreeElectric');?>" onchange="updatePost('DFreeElectric');">       
				</div>
				<div class="col-md-4">
					<br class="visible-xs visible-sm">
                    <div class="checkbox table-bordered padding-checkbox">
                          <label>
                           <input type="checkbox" name="DFreeMeter" id="DFreeMeter" <?php if ($this->post->checkPost('DFreeMeter')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('DFreeMeter');?>" onclick="changeValue2('DFreeMeter');"><p class="text-grey">เงินประกันมิเตอร์ น้ำ/ไฟ</p>
                          </label>
                    </div>
					<div class="title-z">ส่วนลดจากโครงการ (บาท)</div>
                    <input class="form-control input-z" type="text" placeholder="ระบุ"name="DDiscount" id="DDiscount"  value="<?php echo $this->post->checkPost('DDiscount');?>" onchange="updatePost('DDiscount');">
                    <div class="title-z">Voucher</div>
                    <input class="form-control input-z" type="text" placeholder="ระบุ"name="DFreeVoucher" id="DFreeVoucher"  value="<?php echo $this->post->checkPost('DFreeVoucher');?>" onchange="updatePost('DFreeVoucher');">
				</div> 
				<div class="col-md-8">
				<div class="title-z">รายละเอียดอื่นๆ</div>
                    <textarea  class="form-control input-z" type="text" placeholder="ระบุ" rows="8"></textarea>
				</div>                
            </div>
            <div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
            <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput2back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput4()">ถัดไป</button>
				</div>
			</div>
			<br>
	    </div>
		<!--end input32-->
		
		<!--input35-->
		<div class="input35 display-none">

		    <h3 class="text-primary">กำหนดค่าเช่าและเงื่อนไขการเช่า</h3>
			<div class="checkbox">
				<p class="text-primary">เพื่อป้องกันความสับสน ค่าเช่าที่ประกาศเป็นค่าเช่าที่รวมค่าใช้จ่ายส่วนกลางแล้วเท่านั้น</p>
			</div>
			<hr>
			
			<div class="row">
				<div class="col-md-12">
					<h5><?=$qLabel['residence_detail_rent'][0];?></h5>
				</div>
				<div class="col-md-8">
					<div class="title-z normal_msg" id="ShowPRentPrice2"><h5><?=$qLabel['residence_detail_rent_price'][0];?> </h5></div>
					<div class="col-md-6 padding-right-clear-m padding-left-clear">
						<input class="form-control input-z" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value=document.getElementById('PRentPrice').value;" onchange="changeformat2();"  value="<?php echo '฿'.number_format($this->post->checkPost('PRentPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['residence_detail_rent_price_title'][0];?>');" onmouseout="hide_title();">
					</div>                
				</div>
				<div class="col-md-4">
                    <div class="title-z normal_msg"><h4>ยืนยันราคาค่าเช่า (วัน)</h4></div>
                    <div class="col-md-12 padding-none">
	                    <select class="form-control input-z margin-left-clear">
							<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
							<option value="1">60 วัน</option>
						
						</select>
					</div>
				</div>
			</div>
			<!--Edit-->
			<div class="row">
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowMinTimePRent"><h5><?=$qLabel['residence_detail_rent_mintime'][0];?></h5></div>
					<select class="form-control input-z" name="MinTimePRent" id="MinTimePRent" onchange="updatePost('MinTimePRent');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_mintime_title'][0];?>');" onmouseout="hide_title();">
						<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('MinTimePRent')=="1"){echo "selected";};?>>1 เดือน</option>
						<option value="2" <?php if ($this->post->checkPost('MinTimePRent')=="2"){echo "selected";};?>>2 เดือน</option>
						<option value="3" <?php if ($this->post->checkPost('MinTimePRent')=="3"){echo "selected";};?>>3 เดือน</option>
						<option value="6" <?php if ($this->post->checkPost('MinTimePRent')=="6"){echo "selected";};?>>6 เดือน</option>
						<option value="12" <?php if ($this->post->checkPost('MinTimePRent')=="12"){echo "selected";};?>>1 ปี</option>
					</select>
				</div>
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowDepositPRent"><h5><?=$qLabel['residence_detail_rent_pledge'][0];?></h5></div>
					<select class="form-control input-z" name="DepositPRent" id="DepositPRent" onchange="updatePost('DepositPRent');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_pledge_title'][0];?>');" onmouseout="hide_title();">
						<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('DepositPRent')=="1"){echo "selected";};?>>1เดือน</option>
						<option value="2" <?php if ($this->post->checkPost('DepositPRent')=="2"){echo "selected";};?>>2เดือน</option>
						<option value="3" <?php if ($this->post->checkPost('DepositPRent')=="3"){echo "selected";};?>>3เดือน</option>
					</select>
				</div>
				<br class="visible-xs visible-sm">
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowAdvancePRent"><h5><?=$qLabel['residence_detail_rent_advance'][0];?></h5></div>
					<select class="form-control input-z" name="AdvancePRent" id="AdvancePRent" onchange="updatePost('AdvancePRent');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_advance_title'][0];?>');" onmouseout="hide_title();">
						<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('AdvancePRent')=="1"){echo "selected";};?>>1เดือน</option>
						<option value="2" <?php if ($this->post->checkPost('AdvancePRent')=="2"){echo "selected";};?>>2เดือน</option>
						<option value="3" <?php if ($this->post->checkPost('AdvancePRent')=="3"){echo "selected";};?>>3เดือน</option>            
					</select>
				</div>
			</div>
			<!--End Edit-->
			<br>
			<div class="row">
				<div class="col-xs-12">
					<span class="text-red">*ค่าเช่าที่ต้องการต่อเดือน โดยปกติจะรวมค่าส่วนกลางแล้ว แต่ไม่รวมค่าใช้จ่ายอื่นๆ เช่น เคเบิ้ลทีวี อินเตอร์เน็ท ค่าแม่บ้าน ค่าน้ำ ค่าไฟ ยกเว้นการเช่าที่มีมูลค่าสูง เจ้าของห้องต้องตรวจสอบถามความต้องการของผู้เช่าให้ครบถ้วน เมื่อมีการต่อรองเรื่องราคา</span>
				</div>
			</div>
		    <hr>
			<div class="row">
				<div class="col-xs-12">
					<h5>ยอมรับผู้เช่าที่เซ็นสัญญาในนามบริษัท/นิติบุคคล</h5>
					<ul class="list-inline">
						<li class="col-md-4 col-xs-4">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox" name=""><p class="text-grey">ตกลง</p>
								</label>
							</div>
						</li>
						<li class="col-md-8 col-xs-8 padding-t11"><div class="input-z"><span class="text-grey">บริษัท/นิติบุคคล จะมีการหักภาษีณที่จ่ายจากค่าใช้จ่ายบริษัท</span></div></li>
					</ul>

				

				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
				    <h5>เพิ่มโอกาสในการปล่อยเช่าด้วยนายหน้า</h5>
                    <div>* ไม่จำเป็นต้องเลือก หากไม่ต้องการใช้บริการนายหน้า</div>
                    <ul class="list-inline">
						<li class="col-md-4 col-xs-4">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox" name=""><p class="text-grey">ตกลง</p>
								</label>
							</div>
						</li>
						<li class="col-md-8 col-xs-8 padding-t11"><div class="input-z"><span class="text-grey">ค่าบริการ 1 เดือน ต่อสัญญา 1 ปี</span></div></li>
					</ul>
					
				</div>
			</div>
           	<hr>
			<div class="row">
				<div class="col-md-12"><h5>สถานะปัจจุบันของบ้าน/ห้องชุดที่จะปล่อยเช่า</h5></div>
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowStatusPRent"><h5><?=$qLabel['residence_status_now'][0];?></h5></div>
					<select class="form-control input-z" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();" onmouseover="show_title('<?=$qLabel['residence_status_now_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected value="3">ว่าง/มีผู้เช่า</option>
						<option value="0" <?php if ($this->post->checkPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
						<option value="1" <?php if ($this->post->checkPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
					</select>
				</div>
				<div class="col-md-4">
					<div class="title-z"><h5><?=$qLabel['residence_detail_rent_nation'][0];?></h5></div>
					<select class="form-control input-z" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected>ระบุสัญชาติผู้เช่ากรณีมีผู้เช่าอยู่</option>
						<?php
						$query=$this->post->qRentNational();
						foreach ($query->result() as $row){
							$i=$row->RNID;
							$name=$row->Name_th;
							?>
							<option value="<?php echo $i;?>" <?php if ($this->post->checkPost('PRentNational')==$i){echo "selected";};?>><?php echo $name;?></option>
							<?php
						}
						?>
					</select>
				</div>
				
				<div class="col-md-4">
					<div class="title-z"><h5><?=$qLabel['residence_detail_rent_end'][0];?></h5></div>
					<input class="form-control input-z" type="text" name="PRentEnd" id="PRentEnd" data-date-format="yyyy-mm-dd" onblur="setTimeout(function(){updatePost('PRentEnd')}, 500);" value="<?php echo $this->post->checkPost('PRentEnd');?>" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['residence_detail_rent_end_title'][0];?>');" onmouseout="hide_title();">
				</div>
				
			</div>

			<hr>
			
			
			<div class="row">
				<div class="col-xs-12">
					<h5>เลือกหากคุณยอมรับการเช่าลักษณะด้านล่างนี้ได้</h5>
				</div>
			</div>
			<div class="row">
				

                 <div class="col-md-4 col-sm-4 col-xs-12 padding-right-clear">
			        <label class="checkbox bg-info padding-pro noselect pointer">
				       <label>
				         <input type="checkbox" ><p class="text-grey">ทุกสัญชาติ</p>
				       </label>
			        </label>

			        <label class="checkbox bg-info padding-pro noselect pointer">
				       <label>
				         <input type="checkbox" ><p class="text-grey">ให้เช่าห้องเปล่า</p>
				       </label>
			        </label>
			     </div>

			     <div class="col-md-4 col-sm-4 col-xs-12 padding-right-clear">
			        <label class="checkbox bg-warning padding-pro noselect pointer">
				       <label>
				         <input type="checkbox" ><p class="text-grey">เด็กอายุไม่เกิน 8 ปี</p>
				       </label>
			        </label>

			        <label class="checkbox bg-warning padding-pro noselect pointer">
				       <label>
				         <input type="checkbox" ><p class="text-grey">ใช้เตาแก๊ส</p>
				       </label>
			        </label>
			     </div>

			     <div class="col-md-4 col-sm-4 col-xs-12 padding-right-clear">
			        <label class="checkbox bg-success padding-pro noselect pointer">
				       <label>
				         <input type="checkbox" ><p class="text-grey">สุนัข-แมวเล็ก</p>
				       </label>
			        </label>    
			     </div>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-12">
					<h5>รายละเอียดอื่นๆ</h5>
				</div>
				<div class="col-md-8">
					<textarea class="form-control" rows="8"></textarea>
				</div>	
			
			</div>

		    <div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
			<hr>
            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput2back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput4()">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>
		<!--end input35-->

		<!--input4-->
		<div class="input4 display-none">
		      
		          <div class="row padding-none">
		             <h3 class="text-primary">รูปถ่าย</h3>
		          </div>
		          <div class="col-md-12 padding-none"><p class="text-primary">รูปถ่ายที่ดีทำให้ขายได้เร็ว และรูปถ่ายแนวกว้าง(Pano) แสดงที่ว่างในห้องได้ชัดเจน</p></div><br>
		          <div class="col-md-12 padding-none"><p class="text-red">รูปถ่ายที่ไม่อนุญาติให้ใช้ลงประกาศ</p></div><br>
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_01.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary padding-none">มีชื่อเบอร์โทรศัพท์หรือช่องทางติดต่ออื่นๆ</div>
			      </div>
			      <br class="visible-xs">
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_02.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary  padding-none">ชื่อบริษัทหรือเว็บไซท์มีการตัดต่อหรือดัดแปลงรูปถ่าย</div>
			      </div>
			      <br class="visible-xs">
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_03.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary padding-none">มีลายน้ำตราสัญลักษณ์</div>
			      </div>
			      <div class="clearfix"></div><br>
			      
			      <div class="clearfix"></div>  <br>
			      <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5>รูปถ่ายภายในห้อง</h5></li>
                          
                </ul>
              </div>
         

            <?php

            	/*foreach ($imgRoom->result() as $row)
				{
					//echo $row->file;

					$imgid = $row->ImgID;
					echo  '<div class="col-md-6" id="'."img".$imgid.'">';
					echo '<div class="thumbnail drop-shadow imgContainer nclick">';
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
					echo '<img  style="height:180px; width:auto;" alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
					echo '<div>';
					echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					//echo $elem;
				}*/

            ?>
         
            <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
             <div class="col-md-6 col-xs-12 clicker pull-left ">
		           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
		           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
		                        <div class="" style="position:relative; height:200px">
		                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
		                            <div id="waiting4"></div>   
		                            <!--<div class="col-md-12 col-xs-12">
                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
		                            </div>-->
		                             
		                          </div>
		                          <div class="col-md-12 col-xs-12">
		                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
		                           </div>
		                        </div>

						
						
					
						 </a>
                    </div>
		     
			 </div>
		    </form>



            </div>
            <hr/>


            <div class="row">
              <div class="col-md-12">
                <ul class="list-inline">
                          <li><h5>รูปส่วนกลางโครงการและชุมชนแวดล้อม (ถ้ามี)</h5></li>
                          <li></li>
                </ul>
              </div>
        
             <?php
            	/*foreach ($imgFac->result() as $row)
				{
					//echo $row->file;

					$imgid = $row->ImgID;
					echo  '<div class="col-md-6" id="'."img".$imgid.'">';
					echo '<div class="thumbnail drop-shadow imgContainer nclick">';
					echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="false" id="'."delImg".$imgid.'"></span>';
					echo '<img height="130px" style="height:200px; width:auto;" alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
					echo '<div>';
					echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปวิว เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
					echo '</div>';
					echo '</div>';
					echo '</div>';
				}*/

            ?>

      


          <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
             <div class="col-md-6 col-xs-12 clicker pull-left">
                <div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto3" onmouseover="show_title('<?=$qLabel['central_picture_title'][0];?>');" onmouseout="hide_title();">
                   <a href="#" class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none cursor" style="position: relative;overflow: hidden;  "> 
                            <div class="" style="position:relative; height:200px">
                                <div class="col-md-12 col-xs-12" style="position:absolute;  top:135px; position: absolute;position: absolute; left: 35%;"> 
                                     <div id="waiting6"></div>   
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload3[]" id="filesToUpload3" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "facilities";'/>
                                </div>
                            </div>

            
            
          
                   </a>
                </div>
         
            </div>
          </form>

          </div>

                

          		
       
            <hr>
            <div class="row">

              <div class="col-md-12"><h5>เลือกรูปโครงการที่มีในระบบ</h5>
              </div>

           

            </div>
            <br/>
          


			<?php
				$total = sizeof($imgProjShare);
				echo '<input type="hidden" id="totalImgShare" name="totalImgShare" value="'.$total.'">';
				for($i=0;$i<$total;$i++){
					//$imgpath = addcslashes($imgProjShare[$i]," ");
					//if($i%3==0)echo '<div class="row">';

					echo '<div class="col-md-4 imgShareMargin" id="cImgS'.$i.'">';
					echo '<div>';
					echo '<img class="" src="/'.$imgProjShare[$i].'" width="187" height="128" id="imgSh'.$i.'">';
					echo '<input class="checkbox-photo" type="checkbox" value="" id="share'.$i.'">';
					echo '</div>';
					echo '</div>';
					//if($i%3==0)echo '</div>';

				}
			?>
					
          
           
           

             
           
            <div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
	        <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput3back()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6 text-white">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput5()">ถัดไป</button>
				</div>
			</div>
			<br>

		</div>

		<!--end input4-->

		<!--input5-->
		<div class="input5 display-none">
            
        
            <h3 class="text-primary">รายละเอียดการติดต่อ</h3>
            <div class="text-primary big2">กรอกหมายเลขโทรศัพท์มือถือและอีเมลล์อย่างน้อย 1 เบอร์โทร และ 1 อีเมลล์ หรือกรอกทุกรายการ เพื่อให้ไม่พลาดการติดต่อจากผู้ซื้อและทีมงาน</div><hr>
            <ul class="list-inline padding-top1m">
              <li class="width-100"><h5 id="showTelephone1"><?=$qLabel['telephone1'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="Telephone1" id="Telephone1" type="text" placeholder="081xxxxxxx" value="<?=$this->post->checkPost('Telephone1')?>" onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)"></li>
             
            </ul>
            <ul class="list-inline padding-top1m" onmouseover="show_title('<?=$qLabel['telephone2_title'][0];?>');" onmouseout="hide_title();">
              <li class="width-100"><h5><?=$qLabel['telephone2'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" type="text" name="Telephone2" id="Telephone2" placeholder="089xxxxxxx" value="<?=$this->post->checkPost('Telephone2')?>" onchange="updatePost('Telephone2')" OnKeyPress="return chkNumber(this)"></li>
              <li>
                <label>
                  <input type="checkbox" name="AgreeTelephone2" class="display-none" id="AgreeTelephone2"  value="<?=$this->post->checkPost('AgreeTelephone2')?>" <?php if ($this->post->checkPost('AgreeTelephone2')==1){echo "checked";};?> onclick="changeValue2('AgreeTelephone2')">
                </label>
              </li>
            </ul>
            <ul class="list-inline padding-top1m">
              <li class="width-100"><h5 id="showEmail1"><?=$qLabel['email1'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="Email1" id="Email1" type="text" placeholder="Email@hotmail.com"  onchange="updatePost('Email1')" value="<?=$email;?>"></li>
              
            </ul>
          
            <ul class="list-inline padding-top1m">
              <li class="width-100"><h5><?=$qLabel['email2'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="Email2" id="Email2" type="text" placeholder="Email@gmail.com" value="<?=$this->post->checkPost('Email2')?>" onchange="updatePost('Email2')"></li>
              
            </ul>
             <ul class="list-inline padding-top1m">
              <li class="width-100"><h5><?=$qLabel['line_id'][0];?></h5></li>
              <li class="w50x"><input class="form-control input-z" name="LineID" id="LineID" type="text" placeholder="Line ID" value="<?=$this->post->checkPost('LineID')?>" onchange="updatePost('LineID')"></li>
              <li>
                <label>
          &nbsp;
        </label>
              </li>
            </ul>
	        
            <div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
            <div class="col-md-12 padding-none"><hr></div>

            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput4()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12  text-white" onclick="submitInput5()">สิ้นสุด</button>
				</div>
			</div>
			<br>

		</div>
		<!--end input5-->


<!--input home-->
        
       <!--inputhome2-->
		    <div class="inputhome2 display-none">
			<h3 class="text-primary">ข้อมูลพื้นฐาน</h3>
			<div class="checkbox">
				<p class="text-primary big2">ระบุข้อมูลให้ถูกต้อง หากไม่แน่ใจ สามารถตรวจสอบโฉนดหรือเอกสารโครงการแล้วกลับมาแก้ไขได้</p>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4">
					<h5>ข้อมูลกายภาพ</h5>
				</div>
			</div>
            
			<div class="row">
				<div class="col-md-4 col-sm-7">
					<div class='title-z'>ขนาดที่ดิน (ตร.วา)</div>
					<input class="form-control input-z" data-toggle="tooltip" data-placement="bottom" title="โปรดระบุ" type="text" placeholder="โปรดระบุ" name="Tower" id="Tower" onchange="updatePost('')" value="" onmouseover="show_title('');" onmouseout="hide_title();">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class='title-z' id="">หน้ากว้าง (ม.)</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id="r" onchange="updatePost('RoomNumber')" value="" onmouseover="show_title('');" onmouseout="hide_title();">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z" id="">จำนวนชั้น</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id="" onchange="updatePost('')" value="" onmouseover="show_title('');" onmouseout="hide_title();">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 col-sm-7">
					<div class="title-z" id="">พื้นที่ใช้สอย(ตร.ม.)</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id="" onchange="updatePost('')" value="">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z"  id="ShowBedroom">จำนวนห้องนอน *<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องนอนที่ไม่มีห้องน้ำนับเป็น 0.5"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
					<select class="form-control input-z" name="Bedroom" id="Bedroom" onchange="" data-toggle="tooltip" data-placement="bottom" title="" onmouseover="" onmouseout="hide_title();">
						<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
						<option value="99" selected>สตูดิโอ</option>
													<option value="1" >1 ห้องนอน</option>
													<option value="1.5" >1.5 ห้องนอน</option>
													<option value="2" >2 ห้องนอน</option>
													<option value="2.5" >2.5 ห้องนอน</option>
													<option value="3" >3 ห้องนอน</option>
													<option value="3.5" >3.5 ห้องนอน</option>
													<option value="4" >4 ห้องนอน</option>
													<option value="4.5" >4.5 ห้องนอน</option>
													<option value="5" >5 ห้องนอน</option>
													<option value="5.5" >5.5 ห้องนอน</option>
													<option value="6" >6 ห้องนอน</option>
													<option value="6.5" >6.5 ห้องนอน</option>
													<option value="7" >7 ห้องนอน</option>
											</select>
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="q-formtitle" id="ShowBathroom">จำนวนห้องน้ำ *<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องน้ำที่ไม่มีส่วนอาบน้ำนับเป็น 0.5 ห้องน้ำ"><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
					<select class="form-control q-input" name="Bathroom" id="Bathroom" onchange="updatePost('Bathroom')" data-toggle="tooltip" data-placement="bottom" title="ห้องน้ำที่ไม่มีส่วนอาบน้ำ ให้นับเป็น 0.5 ห้อง" onmouseover="show_title('ห้องน้ำที่ไม่มีส่วนอาบน้ำ ให้นับเป็น 0.5 ห้อง');" onmouseout="hide_title();">
						<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
													<option value="1" selected>1 ห้องน้ำ</option>
													<option value="1.5" >1.5 ห้องน้ำ</option>
													<option value="2" >2 ห้องน้ำ</option>
													<option value="2.5" >2.5 ห้องน้ำ</option>
													<option value="3" >3 ห้องน้ำ</option>
													<option value="3.5" >3.5 ห้องน้ำ</option>
													<option value="4" >4 ห้องน้ำ</option>
													<option value="4.5" >4.5 ห้องน้ำ</option>
													<option value="5" >5 ห้องน้ำ</option>
													<option value="5.5" >5.5 ห้องน้ำ</option>
													<option value="6" >6 ห้องน้ำ</option>
													<option value="6.5" >6.5 ห้องน้ำ</option>
													<option value="7" >7 ห้องน้ำ</option>
													<option value="7.5" >7.5 ห้องน้ำ</option>
													<option value="8" >8 ห้องน้ำ</option>
													<option value="8.5" >8.5 ห้องน้ำ</option>
													<option value="9" >9 ห้องน้ำ</option>
													<option value="9.5" >9.5 ห้องน้ำ</option>
													<option value="10" >10 ห้องน้ำ</option>
						 
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 col-sm-7">
					<div class="title-z">ทิศ (ประตูหน้าบ้าน)</div>
					<select class="form-control input-z" name="Direction" id="Direction" onchange="updatePost('Direction')" onmouseover="show_title('ระบุทิศให้ถูกต้อง เพราะมีผลต่อการพิจารณาของผู้ซื้ออย่างมาก');" onmouseout="hide_title();">
						<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
												  <option value="1" >ทิศตะวันออก</option>
												  <option value="2" >ทิศตะวันออกเฉียงเหนือ</option>
												  <option value="3" >ทิศตะวันออกเฉียงใต้</option>
												  <option value="4" >ทิศเหนือ</option>
												  <option value="6" >ทิศใต้</option>
												  <option value="7" >ทิศตะวันตกเฉียงเหนือ</option>
												  <option value="8" >ทิศตะวันตกเฉียงใต้</option>
												  <option value="9" >ทิศตะวันตก</option>
											</select>               
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z"  id="">ที่จอดรถ (คัน)</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="" id=""  data-toggle="tooltip" data-placement="bottom" title="" onmouseover="" onmouseout="h">
				</div>
				<div class="col-md-4 col-sm-7">
					<div class="title-z" >ปีสร้างเสร็จ/ปรับปรุงทั้งหลัง</div>
					<input class="form-control input-z" type="text" placeholder="โปรดระบุ" name="terraceArea" id="" onchange="" value=""  OnKeyPress="" data-toggle="tooltip" data-placement="bottom" title="" onmouseover="" onmouseout="">
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<h5>ลักษณะพิเศษของบ้าน (เลือกได้มากกว่า 1 ข้อ)</h5>
				</div>
			</div>
			<div class="row">
			  <div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวแม่น้ำ/ทะเล/บึง/สระ</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
						<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวสวนสาธารณะ</p>
						</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวสระว่ายน้ำ</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">วิวสวนในโครงการ</p>
							</label>
						</label>
                 </div>
                 
                 <div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ติดถนนใหญ่ 6 เลนส์ขึ้นไป</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">หลังมุม</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องแม่บ้านและห้องน้ำ</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องครัวปิด</p>
							</label>
						</label>
                        <label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องเก็บของ</p>
							</label>
						</label>
                 </div>
                 
                 <div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ห้องเปล่า</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
						<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">บิลท์อิน</p>
						</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">เครื่องปรับอากาศทุกห้อง</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">เฟอร์นิเจอร์ครบ</p>
							</label>
						</label>
                        <label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" >
								<p class="text-grey">เครื่องใช้ไฟฟ้า</p>
							</label>
						</label>
                 </div>         
				
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-12">
					<h5>สิ่งอำนวยความสะดวกในโครงการ (เลือกได้มากกว่า 1 ข้อ)</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12">
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">เดินสายไฟฟ้าใต้ดิน</p>
							</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
						<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">รปภ. 24 ชม.</p>
						</label>
						</label>
						<label class="checkbox bg-warning padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">CCTV ทั้งโครงการ</p>
							</label>
						</label>
						
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
							<label class="checkbox bg-warning padding-pro noselect pointer">
                                <label>
                                    <input type="checkbox" value="" onClick="" ><p class="text-grey">ร้านสะดวกซื้อ</p>
                                </label>
						    </label>
					 		<label class="checkbox bg-warning padding-pro noselect pointer">
                                <label>
                                    <input type="checkbox" value="" onClick="" ><p class="text-grey">ร้านอาหาร</p>
                                </label>
						    </label>
					 		<label class="checkbox bg-warning padding-pro noselect pointer">
                                <label>
                                    <input type="checkbox" value="" onClick="" ><p class="text-grey">ร้านเสริมสวย</p>
                                </label>
						    </label>
					 		
					 	
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					    <label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">สระว่ายน้ำ</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">ฟิตเนส</p>
							</label>
						</label>
						<label class="checkbox bg-info padding-pro noselect pointer">
							<label>
								<input type="checkbox" value="" onClick="" ><p class="text-grey">สนามเทนนิส</p>
							</label>
						</label>
				</div>
			</div>
			<br>
			<hr>
            
			<div class="row">
				<div class="col-md-12">
					<h5>ข้อมูลอื่นๆ (ระบุ ชื่อ เบอร์โทร อีเมลล์ LineID FB ในพื้นที่ที่จัดให้เท่านั้น ห้ามกรอกในช่องข้างล่างนี้)</h5>
				</div>
			</div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <textarea class="form-control bg-grey2  border-green" rows="7" ></textarea>
                </div>
            </div>
            <div class="clearfix"></div><br>
            <hr>
            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput1()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput3()">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>
		<!--end inputhome2-->

		<!--inputhome3-->
		<div class="inputhome3 display-none">
		   <h3 class="text-primary">ตั้งราคาขาย</h3>

		   <div class="checkbox">
				<p class="text-primary">เพื่อป้องกันความสับสน ราคาที่ประกาศให้ผู้ขายรวมค่าใช้จ่ายทุกอย่างแล้ว <small class="text-primary">ยกเว้นค่าจดจํานอง</small></p>
				<p class="text-grey">
					1. ปรับราคาประกาศขาย เพื่อให้ได้ราคาสุทธิที่ท่านต้องการ<br/>
					2. กำหนดเวลายืนยันราคาขาย<br/>
					3. ยืนยันการใช้บริการ<span class="text-danger">นายหน้า</span>เพื่อให้คุณได้ลูกค้าเร็วขึ้น (คุณยังได้ราคาสุทธิเท่าเดิม)<br/>
					4. กรอกปีที่เริ่มถือครองทรัพย์
				</p>
			</div>
			<hr>

			<div class="row">
				<div class="col-md-12">
					<h5>กำหนดราคาและการชำระเงิน</h5>
				</div>

				<div class="col-md-8">
					<div class="title-z"><span id="showNetPrice">ราคาสุทธิที่ต้องการ (บาท) *</span></div>
					<ul class="list-inline">
						<li class="col-md-6"><input class="form-control input-z" type="text" placeholder="ราคาบาท" name="NetPrice" id="NetPrice" onclick="this.value=document.getElementById('HNetPrice').value;" onchange="updatePost('NetPrice');changeformat();" value="<?php echo '฿'.number_format($this->post->checkPost('NetPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['netprice_title'][0];?>');" onmouseout="hide_title();"></li>  
						<li class="col-md-6"><div class="input-z"><span id="avg">฿<?php echo number_format((($this->post->checkPost('NetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></div></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title-z">ยืนยันราคาขาย (วัน) *</div>
					<select class="form-control input-z" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')" onmouseover="show_title('<?=$qLabel['agreepostday_title'][0];?>');" onmouseout="hide_title();">
						<?php
						$i=30;
						while ($i<=180){
							?>
							<option value="<?php echo $i;?>" <?php if ($AgreePostDay==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
							<?php
							$i=$i+30;
						}
						?>
					</select>

				</div>
			</div>

			<div class="clearfix"></div><br class="hidden-xs"><br>

			<div class="col-md-12 padding-none">

			    <ul class="list-inline">
						<li class="col-md-4">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox" name="" id="" ><h5 class="margin-top-clear padding-t2">ขายพร้่อมผู้เช่า</h5>
								</label>
							</div>
						</li>
						
					</ul>

				
					

			</div>



		  
            
            <div class="row">
            	<div class="col-md-4">
					<div class="title-z">ค่าเช่าสุทธิที่ได้(บาท/เดือน)</div>
					<input class="form-control input-z" type="text" name="">
					
				</div>
				
				
				<div class="col-md-4">
					<div class="title-z">สัญชาติของผู้เช่า</div>
					<select class="form-control input-z" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected>ระบุสัญชาติผู้เช่ากรณีมีผู้เช่าอยู่</option>
						<?php
						$query=$this->post->qRentNational();
						foreach ($query->result() as $row){
							$i=$row->RNID;
							$name=$row->Name_th;
							?>
							<option value="<?php echo $i;?>" <?php if ($this->post->checkPost('PRentNational')==$i){echo "selected";};?>><?php echo $name;?></option>
							<?php
						}
						?>
					</select>
				</div>

				<div class="col-md-4">
					<div class="title-z">วันสิ้นสุดสัญญา</div>
					<input class="form-control input-z" type="text" name="PRentEnd" id="PRentEnd">
				</div>
		    </div>
		   
            <hr>
            <div class="clearfix"></div>
           

            
			<div class="col-md-12 padding-none">
					<h5>เพิ่มโอกาสในการขายด้วยนายหน้า (ไม่ต้องเลือก หากไม่ต้องการใช้นายหน้า)</h5>
				
					<ul class="list-inline">
						<li class="col-md-4">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox" name="Broker" id="Broker"  value="0" onclick="changeValue('Broker');updatePost('Broker');"><p class="text-grey">ตกลง</p>
								</label>
							</div>
						</li>
						<li class="col-md-8 padding-t11"><div class="input-z"><span class="text-danger">ตัวอย่างค่าบริการ 2.0% </span><span class="text-danger" id="showBrokerPrice">฿0</span></div></li>
					</ul>

				
					<div class="clearfix"></div>
					<p class="text-grey">ราคาสำหรับนายหน้านำไปเสนอขาย <span class="text-green" id="showTotalPriceBroker">฿<?php echo number_format($this->post->checkPost('TotalPriceBroker'),0,'.',',');?></span> หรือ <span class="text-green" id="showTotalPriceBroker2">฿<?php echo number_format((($this->post->checkPost('TotalPriceBroker'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p> 
			</div>
			
			<hr/>
			<div class="clearfix"></div><br class="hidden-xs">

			<div class="col-md-12 padding-none">
				<div class="checkbox">
				        <ul class="list-inline">
						<li class="col-md-12">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox"  value="0"><h5  class="margin-top-clear padding-t2">ยืนยันค่าใช้จ่าย ณ กรมที่ดินตามรายละเอียดด้านล่าง (ประกาศจะไม่แสดงหากไม่ยืนยัน)</h5>
								</label>
							</div>
						</li>
						
					</ul>
					<p class="text-grey">เพื่อให้ผู้ซื้อเปรียบเทียบค่าใช้จ่ายในการซื้อทรัพย์สินได้ง่าย ผู้ขายบน ZmyHome จึงต้องขายบนเงื่อนไขเรื่องค่าธรรมเนียมเหมือนกัน ผู้ขายปรับราคาขายขึ้นได้เพื่อให้ได้ราคาสุทธิที่ต้องการ</p>


			    </div>	
			</div>

            <div class="clearfix"></div>
			<div class="col-md-12 bg-grey3">
              <br>
			  <div class="col-md-9 col-xs-9">- ค่าธรรมเนียมการทำนิติกรรม (2% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)</div>
			  <div class="col-md-3 col-xs-3">ผู้ซื้อ - ผู้ขาย 50:50</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- ภาษีธุรกิจเฉพาะ (3.3% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)<br>(ไม่ต้องเสียถ้าถือครองทรัพย์สินเกิน 5ปี หรือมีชื่อเจ้าของในทะเบียนบ้านเกิน 1 ปี)</div>
			  <div class="col-md-3 col-xs-3">ผู้ขายจ่าย</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- อากรสแตมป์ 0.5% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน <br>(ชำระเฉพาะกรณีไม่ต้องเสียภาษีธุรกิจเฉพาะ)</div>
			  <div class="col-md-3 col-xs-3">ผู้ขายจ่าย</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- ภาษีเงินได้บุคคลธรรมดา <br>(ขึ้นอยู่กับราคาประเมิน และระยะเวลาในการถือครอง)</div>
			  <div class="col-md-3 col-xs-3">ผู้ขายจ่าย</div>
			  <div class="clearfix"></div><br>
			  <div class="col-md-9 col-xs-9">- ค่าจดจำนอง</div>
			  <div class="col-md-3 col-xs-3">ผู้ซื้อจ่าย</div>
			  <div class="clearfix"></div><br>          
			</div>


       
		    <div class="clearfix"></div>
		    <br>
            <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput2()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput4()">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>

		<!--end inputhome3-->

		<!--inputhome4-->
		<div class="inputhome4 display-none">
		      
		          <h3 class="text-primary">มาตรฐานการลงภาพถ่าย</h3><br>
		          <div class="text-primary">ZmyHome ขอสงวนสิทธิ์ในการอนุมัติประกาศ ที่ใช้รูปประกอบที่มีลักษณะดังต่อไปนี้</div><br>
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_01.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary padding-none">มีชื่อเบอร์โทรศัพท์หรือช่องทางติดต่ออื่นๆ</div>
			      </div>
			      <br class="visible-xs">
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_02.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary  padding-none">ชื่อบริษัทหรือเว็บไซท์มีการตัดต่อหรือดัดแปลงรูปถ่าย</div>
			      </div>
			      <br class="visible-xs">
			      <div class="col-md-4 col-sm-4 text-center padding-none">
			        <img class="drop-shadow2 img-responsive" src="/img/ZmyHome_PicProhibited_03.jpg" style="width:200px; height:auto;">
			        <br>
			        <div class="text-primary padding-none">มีลายน้ำตราสัญลักษณ์</div>
			      </div>
			      <div class="clearfix"></div><br>
			      
			      <div class="clearfix"></div>  <br>
			      <h5>เพิ่มรูปภายนอกบ้าน (ต้องมีภาพด้านหน้าบ้าน ถ้ามีบ้านหลายหลังในภาพให้วงภาพทรัพย์สิน)</h5>

			        <div class="col-md-6 col-sm-6 padding-left-clear">
			            <div class="thumbnail drop-shadow2 imgContainer nclick">
			               <span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="true"></span>
			               <img  style="height:180px; width:auto;" alt="" src="http://static.zmyhome.com/projImg/838/Picture/2.jpg"/>
			                  <div>
			                    <textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3"></textarea> 
			                  </div>
			            </div>
			        </div>
			        <div class="col-md-6 col-sm-6 padding-left-clear">
			            <div class="thumbnail drop-shadow2 imgContainer nclick">
			               <span class="glyphicon glyphicon-trash binIcon binIcon-s text-grey" aria-hidden="true"></span>
			               <img  style="height:180px; width:auto;" alt="" src="http://static.zmyhome.com/userImg/2936/56ce810edbe89.jpg"/>
			                  <div>
			                    <textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3" ></textarea> 
			                  </div>
			            </div>
			        </div> 

			         <div class="clearfix"></div>        
		            
		             <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
					             <div class="col-md-6 col-xs-12 clicker pull-left  padding-left-clear">
							           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
							           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
							                        <div class="" style="position:relative; height:200px">
							                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
							                            <div id="waiting4"></div>   
							                            <!--<div class="col-md-12 col-xs-12">
					                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
							                            </div>-->
							                             
							                          </div>
							                          <div class="col-md-12 col-xs-12">
							                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
							                           </div>
							                        </div>

											
											
										
											 </a>
					                    </div>
							     
								 </div>
					 </form>
			       
			         <div class="clearfix"></div><br>
			         
			         <h5>เพิ่มรูปห้องต่างๆในบ้าน (ควรเห็นครบทุกห้อง รวมถึงพื้นที่ระเบียง)</h5>
			         <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
					        <div class="col-md-6 col-xs-12 clicker pull-left  padding-left-clear">
							           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
							           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
							                        <div class="" style="position:relative; height:200px">
							                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
							                            <div id="waiting4"></div>   
							                            <!--<div class="col-md-12 col-xs-12">
					                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
							                            </div>-->
							                             
							                          </div>
							                          <div class="col-md-12 col-xs-12">
							                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
							                           </div>
							                        </div>
											 </a>
					                    </div>
							</div>
					 </form>
					 <div class="clearfix"></div><br>
			         
                     <h5>เพิ่มรูปสภาพแวดล้อมรอบๆบ้าน (ถ้ามี)</h5>
			         <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
					        <div class="col-md-6 col-xs-12 clicker pull-left  padding-left-clear">
							           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
							           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
							                        <div class="" style="position:relative; height:200px">
							                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
							                            <div id="waiting4"></div>   
							                            <!--<div class="col-md-12 col-xs-12">
					                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
							                            </div>-->
							                             
							                          </div>
							                          <div class="col-md-12 col-xs-12">
							                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
							                           </div>
							                        </div>
											 </a>
					                    </div>
							</div>
					 </form>
					 <div class="clearfix"></div><br>

			         <h5>เพิ่มรูปสิ่งอำนวยความสะดวกภายในโครงการ (ถ้ามี)</h5>
			         <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
					        <div class="col-md-6 col-xs-12 clicker pull-left  padding-left-clear">
							           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
							           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
							                        <div class="" style="position:relative; height:200px">
							                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
							                            <div id="waiting4"></div>   
							                            <!--<div class="col-md-12 col-xs-12">
					                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
							                            </div>-->
							                             
							                          </div>
							                          <div class="col-md-12 col-xs-12">
							                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
							                           </div>
							                        </div>
											 </a>
					                    </div>
							</div>
					 </form>
					 <div class="clearfix"></div><br>

			         <h5>เพิ่มรูปชุมชนหรือสิ่งอำนวยความสะดวกรอบๆ (ถ้ามี)</h5>
			         <form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
					        <div class="col-md-6 col-xs-12 clicker pull-left  padding-left-clear">
							           	<div class="col-md-12 col-xs-12 thumbnail drop-shadow vclick padd-none bg-addphoto" onmouseover="show_title('<?=$qLabel['room_picture_title'][0];?>');" onmouseout="hide_title();">
							           	   <a class="col-md-12 col-xs-12 text-red2 col-md-12 padding-none" style="position: relative;overflow: hidden;" href='#'> 
							                        <div class="" style="position:relative; height:200px">
							                          <div class="col-md-12 col-xs-12" style="position:absolute; top:135px; position: absolute;position: absolute; left: 35%;"> 
							                            <div id="waiting4"></div>   
							                            <!--<div class="col-md-12 col-xs-12">
					                                     <h5 class="text-red"><?=$qLabel['room_picture_add'][0];?></h5>
							                            </div>-->
							                             
							                          </div>
							                          <div class="col-md-12 col-xs-12">
							                         	 <input style="position:absolute;top:0;left:0;opacity:0; height:200px;width:700px; overflow:hidden;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/>
							                           </div>
							                        </div>
											 </a>
					                    </div>
							</div>
					 </form>
					
          
           
           

             
           
            <div class="clearfix"></div>
			<br>
	        <hr>



            <div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput3()">ก่อนหน้า</button>
				</div> 
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="submitInput5()">ถัดไป</button>
				</div>
			</div>
			<br>

		</div>

		<!--end inputhome4-->

<!--end input home-->



       
		</div><!--end col-md-7-->
		

		<br>


		<div class="col-md-3 col-md-push-2 property-info hidden-xs">
					<div class="text-center">
						<h3 class="z-tip">"ผู้ซื้อได้ข้อมูลครบ<div class="padding-tip-top">ประหยัดเวลาตอบซ้ำ"</div></h3>
						<br>
						<div class="savetime">ประหยัดเวลาขึ้น</div>
						<div><img src="/img/clock-05.png" class="img-responsive center-block"></div>
						<div id="title_panel" class="center-block display-none" style="width:85%;">
						  <br/>
						  <div><img src="/img/tip.png"></div>
						  <h2 class="z-tip">คำแนะนำ</h2>
						  <h3 class="z-tip" id="title_detail"></h3>
						</div>
						<div class="display-none">
							<hr/>
							<div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
							<h5>ห้องนอน</h5>
							<p>ห้องนอนที่ไม่มีห้องน้ำในตัว<br/>ให้นับเป็นครึ่งห้อง</p>
						</div>
						<div class="display-none" id="show_tooltip">
							<hr>
							<h5><div id="text_tooltip"></div></h5>
						</div>
					</div>
			<br/>
		</div>
		<aside class="col-md-2 col-md-pull-10 hidden-xs">
			<ul class="nav padding-top8">
				<li class="step1 active"><a class="cursor" href="#" onclick="submitInput1()">เริ่มต้น</a></li>
				<li class="step2"><a class="cursor"href="#" onclick="submitInput2()">พื้นฐาน</a></li>
				<li class="step3"><a class="cursor" href="#" onclick="submitInput3()">ตั้งราคา</a></li>
				<li class="step4"><a class="cursor" href="#" onclick="submitInput4()">รูปถ่าย</a></li>
				<li class="step5"><a class="cursor" href="#" onclick="submitInput5()">การสื่อสาร</a></li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li>&nbsp;</li>
				<li class="padding-l15"><div><span class="showstepleft0">เหลือ</span> <span class="green showstepleft">4 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
			</ul>
			<img src="/img/ZmyHome_BoostPostAds_SideBanner_pc.jpg" class="img-responsive visible-md visible-lg">
		</aside>
	</div>
	<!-- Modal -->
	<div class="modal modal-sm fade display-none" id="myModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<h4 class="text-white text-center padding-none padding-t3" id="myModalLabel" style="">Confirm</h4>
				</div>
				<div class="modal-body row">
					<div class="col-md-12 text-center padding-t120 padding-b120"><h4 class="text-grey">คุณกรอกข้อมูลไม่ครบถ้วน ต้องการไปยังหน้าถัดไป</h4></div>
					<div id="modal_submit" class="col-md-12 padding-top10">
						<button type="button" class="btn btn-orange4 btn-block text-white" onclick="$('#myModalConfirm').modal('hide');$('#myform').submit();">ตกลง</button>
					</div>
					<div class="col-md-12 padding-top10">
						<button type="button" class="btn btn-grey btn-block text-white" data-dismiss="modal" aria-label="Close" onclick="$('#myModalConfirm').modal('hide');">ยกเลิก</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</form>