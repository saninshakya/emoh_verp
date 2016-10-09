<?php
$this->session->set_userdata('last_page','1');
$rowChk=$qPost->row();
$OwnerName=$rowChk->OwnerName;
$TOOwner=$rowChk->TOOwner;
$TOProperty=$rowChk->TOProperty;
$ProjectName=$rowChk->ProjectName;
$TOAdvertising=$rowChk->TOAdvertising;
$Telephone1=$rowChk->Telephone1;
$TelLineID=$rowChk->TelLineID;
$LineID=$rowChk->LineID;

$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/admin/changePage1', $attributes);
?>
<?php
$user_id=$this->post->AdminCheckPost('user_id');
$query=$this->db->query('select email from users where id="'.$user_id.'"');
$rowEmail=$query->row();
$email=$rowEmail->email;
$email=str_replace("facebook|","",$email);
$email=str_replace("google|","",$email);
$Email1=$this->post->AdminCheckPost('Email1');
$Token=$this->session->userdata('token');
$query=$this->db->query('select POID from Post Where Token="'.$Token.'"');
$row=$query->row();
$POID=$row->POID;
if ($Email1!=null or $Email1!=""){
	$email=$Email1;
	$this->db->query('Update Post set Email1="'.$email.'" Where Token="'.$Token.'"');
}
?>
<input type="hidden" name="key_change" id="key_change" value="0">
<input type="hidden" name="last_page" id="last_page" value="1">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id; ?>" >
<input type="hidden" id="poid" name="poid" value="<?php echo $POID; ?>" >
<input type="hidden" id="imgType" name="imgType">
<input id="file" type="file"/>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="width:1300px">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crop and Upload Image</h4>
      </div>
      <div class="modal-body">
        <img class="cropimage" alt="" src="" cropwidth="1260" cropheight="600" id="imgUp"/>
  		 <div class="results"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveImg">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- end popup to crop image -->
<?php
	 if ($this->agent->is_mobile()){
?>
<div class="col-md-7 col-md-push-2">
<h3 class="text-primary">คุณใช้โทรศัพท์ในการส่งรูปกรุณารอจนกว่ารูปจะแสดงผล</h3>
</div>
<?php
	}
?>
<div class="container">
        <div class="row">

          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">เริ่มต้นประกาศ</h3>
            <div class="checkbox">
<!--
              <label>
                <input type="checkbox" <?php if ($this->post->AdminCheckPost('Agree_Owner')==1){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('Agree_Owner');?>" name="Agree_Owner" id="Agree_Owner" onClick="updateAgreeOwner(this.value)"><p class="text-primary big2" id="showAgree_Owner">คุณเป็นเจ้าของ / คนในครอบครัวที่ตัดสินใจได้ กรอกข้อมูลให้ครบถ้วนถูกต้อง *<br>
				ประกาศของคุณจะถูกระงับ หากคุณไม่ใช่เจ้าของ หรือกรอกข้อมูลสำคัญผิด</p>
              </label>
-->
			<input type="hidden" name="Agree_Owner" id="Agree_Owner" Value="1">
			</div>
            <hr>

            <!--Added New-->
            <div class="row">
              <div class="col-md-12">
                <h5>เบอร์โทรศัพท์และ Line ID (แอด Line Official Account : ZmyHome  เพื่อสอบถามวิธีลงประกาศ)</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h5 id="showTelephone1">เบอร์ติดต่อ (มือถือเท่านั้น)*</h5>
                <input name="Telephone1" id="Telephone1" class="form-control input-md" type="text"  placeholder="ระบุ" <?php if ($Telephone1!=""){echo 'Value="'.$Telephone1.'"';};?> onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)">
              </div>
              <div class="col-md-4">
                <h5>Line ID</h5>
                <div class="checkbox">
	                <label>
		                <input type="checkbox" <?php if ($this->post->AdminCheckPost('TelLineID')==1){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('TelLineID');?>" name="TelLineID" id="TelLineID" onClick="updateTelLineID(this.value)">
		                <div class="text-grey padding-t4"> ใช้เบอร์มือถือนี้ผูกกับ Line ID</div>
	                </label>
                </div>
              </div>
              <div class="col-md-4">
                <h5>&nbsp;</h5>
                <input name="LineID" id="LineID" class="form-control input-md" type="text"  placeholder="ระบุ ID (ไม่ผูกกับเบอร์โทรศัพท์)" onchange="updatePost('LineID');" value="<?php echo $this->post->AdminCheckPost('LineID');?>" <?php if ($this->post->AdminCheckPost('TelLineID')==1){echo "disabled";};?>>
              </div>
            </div>
            <hr>

            <!--End------>
            <div class="row">
              <div class="col-md-12">
                <h5>ข้อมูลเริ่มต้น</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <h5 class="normal_msg" id="ShowTOOwner">ประเภทเจ้าของ *</h5>
                <select class="form-control selectpicker input-md" name="TOOwner" id="TOOwner" onchange="updatePost('TOOwner')" >
                  <option disabled selected value="0">เลือก</option>
<?php
	$prefix="TOOName_".$this->session->userdata('lang');
	foreach ($qTOOwner->result() as $row)
	{
		if ($TOOwner==$row->TOOID){
			$sel="selected";
		} else {
			$sel="";
		};
		echo '<option value="'.$row->TOOID.'" '.$sel.'>'.$row->$prefix.'</option>';
	}
?>
                </select>
              </div>
              <div class="col-md-8">
                <h5 id="ShowOwnerName">เจ้าของตามที่ระบุในเอกสารสิทธิ (ชื่อ-สกุล/นิติบุคคล) *</h5>
                <input name="OwnerName" id="OwnerName" class="form-control input-md" type="text" <?php if ($OwnerName!=""){echo 'Value="'.$OwnerName.'"';};?> placeholder="โปรดระบุ" onchange="updatePost('OwnerName')">
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <h5 id="ShowTOProperty">ประเภทที่อยู่อาศัย *</h5>
                <select class="form-control selectpicker input-md" name="TOProperty" id="TOProperty" onchange="updatePost('TOProperty')">
                  <option disabled selected value="0">เลือก</option>
<?php
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
?>
                </select>
              </div>

              <div class="col-md-8">
                <h5 id="ShowProjectName">ชื่อโครงการ * (กรุณากรอกเป็นภาษาไทย)</h5>
              </div>
              <div class="col-md-8">
                <input id="ProjectName"  Name="ProjectName" class="form-control input-md" type="text" <?php if ($ProjectName!=""){echo 'Value="'.$ProjectName.'"';};?> placeholder="โปรดระบุ"  onchange="setTimeout(function(){updateProjectName()}, 1000);"  onkeypress='clearLatLng()'>
              </div>
            </div>
           <br>
            <div class="row">
             <div class="col-md-4">
                <h5 id="ShowTOAdvertising">ประเภทประกาศ *</h5>
                <select class="form-control selectpicker" name="TOAdvertising" id="TOAdvertising" onchange="updatePost('TOAdvertising')" >
                  <option disabled selected value="0">เลือก</option>
<?php
	$prefix="AName_".$this->session->userdata('lang');
	foreach ($qTOAdvertising->result() as $row)
	{
		if ($TOAdvertising==$row->TOAID){
			$sel="selected";
		} else {
			$sel="";
		};
		echo '<option value="'.$row->TOAID.'" '.$sel.'>'.$row->$prefix.'</option>';
	}
?>

                </select>
              </div>
             </div>
            <br>
<?php
	if (isset($txtMapChange)){
		if ($txtMapChange!="disabled"){
			echo "<h5 class='text-primary'>".$txtMapChange."</h5>";
		}
	}
?>
            <div class="row">
              <div class="col-md-12">
                <h5>ปักหมุดลงแผนที่ (เลื่อนหมุดไปไว้ตำแหน่งที่ถูกต้อง ถ้าไม่เห็นหมุดให้ซูมออก)</h5>
				<input name="lat" id="lat" type="hidden" value="<?php echo $rowChk->Lat;?>">
				<input name="lng" id="lng" type="hidden" value="<?php echo $rowChk->Lng;?>">
			  </div>
              <div class="col-md-12">
                  <?php echo $map['html']; ?>
              </div>
            </div>
            <br/>
            <!--
            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="valLat()" > ถัดไป</button>
            </div>
            <div class="clearfix"></div>
          -->
            <br>
          </div>
          <div class="col-md-3 col-md-push-2 property-info hidden-xs">
              <div class="text-center">
            <h3 class="z-tip">"ข้อมูลดี ขายเร็ว ได้ราคาดี"<div class="padding-tip-top">&nbsp;</div></h3>
            <br>
            <div class="savetime">ประหยัดเวลาขึ้น</div>
            <div><img src="/img/clock-00.png" class="img-responsive center-block"></div>
                <div class="display-none">
                  <hr/>
                  <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                  <h5>แผนที่</h5>
                  <p>ที่ตั้งเป็นสิ่งสำคัญที่สุดของบ้าน<br/>
                  การปักหมุดต้องถูกต้อง 100%</p>
                </div>
            </div>
          </div>
          <aside class="col-md-2 col-md-pull-10 hidden-xs">
            <ul class="nav padding-top8">
              <li class="active"><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li><a>ตั้งราคา</a></li>
              <li><a>รูปถ่าย</a></li>
              <li><a>การสื่อสาร</a></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="padding-l15"><div>เหลือ <span class="green">4 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
            </ul>

          </aside>
          </div>
      </div>
      <div class="container">
              <div class="row">

                <div class="col-md-7 col-md-push-2">
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
                     <div class="col-md-4 col-sm-6">
      				<h5>อาคาร<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้าโครงการมีหลายอาคาร ให้ระบุชื่ออาคาร" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm4  padding-clear" aria-hidden="true"></span></a></h5>
                      <input class="form-control input-md" type="text" placeholder="โปรดระบุ" name="Tower" id="Tower" onchange="updatePost('Tower')"  value="<?php echo $this->post->AdminCheckPost('Tower');?>">
                     </div>
                     <div class="col-md-4 col-sm-6">
      			   <h5 id="ShowRoomNumber">หมายเลขห้อง(ถ้ายังไม่โอน)</h5>
                      <input class="form-control input-md" type="text" placeholder="โปรดระบุ"name="RoomNumber" id="RoomNumber" onchange="updatePost('RoomNumber')" value="<?php echo $this->post->AdminCheckPost('RoomNumber');?>">
                     </div>
                     <div class="col-md-4 col-sm-6">
      			   <h5 id="ShowAddress">บ้านเลขที่*</h5>
                      <input class="form-control input-md" type="text" placeholder="โปรดระบุ"name="Address" id="Address" onchange="updatePost('Address')" value="<?php echo $this->post->AdminCheckPost('Address');?>" <?php if($this->post->AdminCheckPost('TOAdvertising')=="2"){ echo "disabled";};?>>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-4 col-sm-6">
      			          <h5 id="ShowFloor">ชั้น*</h5>
                      <input class="form-control input-md" type="text" placeholder="โปรดระบุ" name="Floor" id="Floor" onchange="updatePost('Floor')" value="<?php echo $this->post->AdminCheckPost('Floor');?>">
                     </div>
                     <div class="col-md-4 col-sm-6">
      			          <h5 id="ShowBedroom">จำนวนห้องนอน*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องนอนที่ไม่มีห้องน้ำนับเป็น 0.5"><span class="glyphicon glyphicon-info-sign text-turq2 input-sm4  padding-clear" aria-hidden="true"></span></a></h5>
                      <select class="form-control selectpicker input-md" name="Bedroom" id="Bedroom" onchange="updatePost('Bedroom')">
      				          <option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
                        <option value="99" <?php if ($this->post->AdminCheckPost('Bedroom')==99){echo "selected";};?>>สตูดิโอ</option>
      				<?php
      					$i=1;
      					while ($i<=7){
      				?>
                        <option value="<?echo $i;?>" <?php if ($this->post->AdminCheckPost('Bedroom')==$i){echo "selected";};?>><?echo $i;?> ห้องนอน</option>
      				<?php
      						$i=$i+0.5;
      					}
      				?>
                      </select>
                     </div>
                     <div class="col-md-4 col-sm-6">
      			   <h5 id="ShowBathroom">จำนวนห้องน้ำ*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ห้องน้ำที่ไม่มีส่วนอาบน้ำนับเป็น 0.5 ห้องน้ำ"><span class="glyphicon glyphicon-info-sign text-turq2 input-sm4  padding-clear" aria-hidden="true"></span></a></h5>
                      <select class="form-control selectpicker input-md" name="Bathroom" id="Bathroom" onchange="updatePost('Bathroom')">
      				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
      				<?php
      					$i=1;
      					while ($i<=10){
      				?>
                        <option value="<?echo $i;?>" <?php if ($this->post->AdminCheckPost('Bathroom')==$i){echo "selected";};?>><?echo $i;?> ห้องน้ำ</option>
      				<?php
      						$i=$i+0.5;
      					}
      				?>
                      </select>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                     <div class="col-md-4 col-sm-6">
      			   <h5>ทิศของห้อง</h5>
                      <select class="form-control selectpicker input-md" name="Direction" id="Direction" onchange="updatePost('Direction')"  >
      				<option selected="true" disabled="disabled" value="0">โปรดเลือก</option>
      				<?php
      					$query=$this->post->direction();
      					foreach ($query->result() as $row){
      				?>
                        <option value="<?echo $row->DID;?>" <?php if ($this->post->AdminCheckPost('Direction')==$row->DID){echo "selected";};?>><?echo $row->DName;?></option>
      				<?php
      					}
      				?>
                      </select>
                    </div>
                     <div class="col-md-4 col-sm-6">
      			   <h5 id="ShowuseArea">พื้นที่ใช้สอย(ตร.ม.)*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="พื้นที่ที่ระบุในสัญญา/โฉนด"><span class="glyphicon glyphicon-info-sign text-turq2 input-sm4  padding-clear" aria-hidden="true"></span></a></h5>
                      <input class="form-control input-md" type="text" placeholder="โปรดระบุ" name="useArea" id="useArea" onchange="updatePost('useArea')" value="<?php echo $this->post->AdminCheckPost('useArea');?>" OnKeyPress="return chkNumber(this)">
                     </div>
                     <div class="col-md-4 col-sm-6">
      			   <h5>พื้นที่ระเบียงตามโฉนด(ตร.ม.)<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้าไม่ระบุ ค่าธรรมเนียมซื้อขายที่คำนวณจะสูงกว่าความเป็นจริงเล็กน้อย"><span class="glyphicon glyphicon-info-sign text-turq2 input-sm4  padding-clear" aria-hidden="true"></span></a></h5>
                      <input class="form-control input-md" type="text" placeholder="โปรดระบุ"name="terraceArea" id="terraceArea" onchange="updatePost('terraceArea')" value="<?php echo $this->post->AdminCheckPost('terraceArea');?>"  OnKeyPress="return chkNumber(this)">
                     </div>
                  </div>
                  <hr/>
                  <div class="row">
                     <div class="col-md-4">
                      <h5>กรรมสิทธิที่จอดรถ</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 col-sm-6">
                      <h5>แบบมีโฉนด<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้ามีโฉนดเฉพาะสำหรับที่จอดรถ"><span class="glyphicon glyphicon-info-sign text-turq2 input-sm4  padding-clear" aria-hidden="true"></span></a></h5>

                      <select class="form-control selectpicker input-md" name="OCarPark" id="OCarPark" onchange="updatePost('OCarPark')">
                        <option selected="true" value=0>โปรดเลือก</option>
                        <?php
                          $i=1;
                          while ($i<=5){
                        ?>
                                  <option value="<?echo $i;?>" <?php if ($this->post->AdminCheckPost('OCarPark')==$i){echo "selected";};?>>มีโฉนดที่จอดรถ <?php if($i!=0){echo $i;};?>คัน</option>
                        <?php
                            $i++;
                          }
                        ?>
                      </select>

                     </div>
                     <div class="col-md-4 col-sm-6">
                      <h5>แบบระบุช่องจอด (fixed)</h5>

                      <select class="form-control selectpicker input-md" name="ACarPark" id="ACarPark" onchange="updatePost('ACarPark')">
                        <option selected="true" value=0>โปรดเลือก</option>
                        <?php
                          $i=1;
                          while ($i<=5){
                        ?>
                                  <option value="<?echo $i;?>" <?php if ($this->post->AdminCheckPost('ACarPark')==$i){echo "selected";};?>>ระบุช่องจอด <?php if($i!=0){echo $i;};?>คัน</option>
                        <?php
                            $i++;
                          }
                        ?>
                      </select>

                     </div>
                     <div class="col-md-4 col-sm-6">
                      <h5>แบบไม่ระบุช่องจอด (ไม่ fixed)</h5>

                       <select class="form-control selectpicker input-md" name="NCarPark" id="NCarPark" onchange="updatePost('NCarPark')">
                          <option selected="true" value=0>โปรดเลือก</option>
                          <?php
                            $i=1;
                            while ($i<=5){
                          ?>
                                    <option value="<?echo $i;?>" <?php if ($this->post->AdminCheckPost('NCarPark')==$i){echo "selected";};?>>ไม่ระบุช่องจอด <?php if($i!=0){echo $i;};?>คัน</option>
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
                      <h5>คุณลักษณะพิเศษ</h5>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4 col-sm-6">
      				 <?php
      					foreach ($TOCondoSpec1->result() as $row){
      				 ?>
                       <div class="checkbox bg-info padding-pro">
                         <label>
                           <input type="checkbox" value="<?php echo $row->TOCSID;?>" onClick="updateCondoSpec(this.value)" <?php echo $this->post->AdminCheckCondoSpec($row->TOCSID);?>><p class="text-grey"><?php echo $row->CSName_th;?></p>
                         </label>
                        </div>
      				 <?php
      					}
      				 ?>
                     </div>

                     <div class="col-md-4 col-sm-6">
      				 <?php
      					foreach ($TOCondoSpec2->result() as $row){
      				 ?>
                       <div class="checkbox bg-warning padding-pro">
                         <label>
                           <input type="checkbox" value="<?php echo $row->TOCSID;?>" onClick="updateCondoSpec(this.value)" <?php echo $this->post->AdminCheckCondoSpec($row->TOCSID);?>><p class="text-yellow"><?php echo $row->CSName_th;?></p>
                         </label>
                        </div>
      				 <?php
      					}
      				 ?>

                     </div>

                     <div class="col-md-4 col-sm-6">

      				 <?php
      					foreach ($TOCondoSpec3->result() as $row){
      				 ?>
                       <div class="checkbox bg-success padding-pro">
                         <label>
                           <input type="checkbox" value="<?php echo $row->TOCSID;?>" onClick="updateCondoSpec(this.value)" <?php echo $this->post->AdminCheckCondoSpec($row->TOCSID);?>><p class=""><?php echo $row->CSName_th;?></p>
                         </label>
                        </div>
      				 <?php
      					}
      				 ?>
                     </div>

                  </div>
                  <br>

                  <!--
                  <div class="pull-right">
                    <button type="button" class="btn btn-warning btn-sm" onclick="val1()" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val2()" > ถัดไป</button>
                  </div>
                -->

                  <div class="clearfix"></div>
                  <br>
                </div>

                <div class="col-md-3 col-md-push-2 property-info hidden-xs">
                  <div class="text-center">
                  <h3 class="z-tip">"ผู้ซื้อได้ข้อมูลครบ<div class="padding-tip-top">ประหยัดเวลาตอบซ้ำ"</div></h3>
                  <br>
                  <div class="savetime">ประหยัดเวลาขึ้น</div>
                  <div><img src="/img/clock-05.png" class="img-responsive center-block"></div>
                  <div class="display-none">
                      <hr/>
                      <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                      <h5>ห้องนอน</h5>
                      <p>ห้องนอนที่ไม่มีห้องน้ำในตัว<br/>ให้นับเป็นครึ่งห้อง</p>
                  </div>
                  </div>
                  <br/>
                </div>
                <!--
                <aside class="col-md-2 col-md-pull-10 hidden-xs">
                  <ul class="nav padding-top8">
                    <li><a>เริ่มต้น</a></li>
                    <li class="active"><a>พื้นฐาน</a></li>
                    <li><a>ตั้งราคา</a></li>
                    <li><a>รูปถ่าย</a></li>
                    <li><a>การสื่อสาร</a></li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li class="padding-l15"><div>เหลือ <span class="green">3 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
                  </ul>

                </aside>
              -->
                </div>
            </div>
<?php
//Wait Post3
 ?>
 <div class="container">
 <div class="row">
   <div class="col-md-7 col-md-push-2">
     <h3 class="text-primary">รูปถ่าย</h3>
     <div>
         <div class="text-primary big2">ภาพถ่ายที่ดีทำให้ขายได้เร็ว และภาพถ่ายแนวกว้าง (Pano) แสดงที่ว่างในห้องได้ชัดเจน</div>

 <hr/>

     <div class="row">
       <div class="col-md-12">
         <ul class="list-inline">
                   <li><h5>ภาพถ่าย Pano ทุกห้อง</h5></li>
                   <!--<li class="pull-right"><button type="button" class="btn btn-green btn-sm"><a href="">อัพโหลดหลายภาพ</a></button></li>-->
         </ul>
       </div>
     <!--<div class="col-md-6">
       <div class="thumbnail drop-shadow">
         <img src="/img/pano-01.png" alt="...">
         <div class="caption">
           <h5>ห้องทำงาน</h5>
         </div>
       </div>
       <div class="thumbnail drop-shadow">
         <img src="/img/pano-01.png" alt="...">
         <div class="caption">
           <h5>วิวห้อง?</h5>
         </div>
       </div>
     </div>-->
     <!--<div class="col-md-6">
       <div class="thumbnail drop-shadow">
         <img src="/img/pano-01.png" alt="...">
         <div class="caption">
           <h5>ห้องทำงาน</h5>
         </div>
       </div>
       <div class="thumbnail drop-shadow">
         <img src="/img/add-photo.png" alt="...">
         <div class="caption text-center">
           <h5><a class="text-danger" href="#">+ เพิ่มรูปห้อง</a></h5>
         </div>
       </div>
     </div>-->
     <?php
      foreach ($imgRoom->result() as $row)
{
  //echo $row->file;

  $imgid = $row->ImgID;
  echo  '<div class="col-md-6" id="'."img".$imgid.'">';
  echo '<div class="thumbnail drop-shadow imgContainer nclick">';
  echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
  echo '<img  style="height:180px; width:auto;" alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
  echo '<div>';
  echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  //echo $elem;
}

     ?>
      <!--<div class="col-md-6 clicker" id="clicker">-->
      <div class="col-md-6 clicker pull-left">
      <div class="thumbnail drop-shadow vclick">
<img src="/img/add-photo.png" alt="...">
<div align="center">
<div id="waiting4"></div>
</div>

<div class="caption text-left">
<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized" class="center-block">
    <!--Added Dec7-->
             <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปห้อง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></a></h5></div>
             <!--End Added Dec7-->
  <!--<div align="center"><input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "room";'/></div>-->
</form>
<!--
           <h5><a class="text-danger" href="#">+ เพิ่มรูปห้อง</a></h5>
-->
</div>
       </div>
     </div>



     </div>
     <hr/>
<!--
     <div class="row">
       <div class="col-md-12">
         <ul class="list-inline">
                   <li><h5>ภาพวิวจากห้องต่างๆ</h5></li>
-->
      <!--<li class="pull-right"><button type="button" class="btn btn-green btn-sm"><a href="">อัพโหลดหลายภาพ</a></button></li>-->
<!--
</ul>
       </div>
-->
<!--<div class="col-md-4">
       <div class="thumbnail drop-shadow">
         <img src="/img/view-01.png" alt="...">
         <div class="caption">
           <h5>วิวห้อง?</h5>
         </div>
       </div>

     </div>-->
     <!--<div class="col-md-4">
       <div class="thumbnail drop-shadow">
         <img src="/img/view-02.png" alt="...">
         <div class="caption">
           <h5>วิวห้องรับแขก</h5>
         </div>
       </div>
     </div>-->
<!--
      <?php
      foreach ($imgView->result() as $row)
{
  //echo $row->file;

  $imgid = $row->ImgID;
  echo  '<div class="col-md-4" id="'."img".$imgid.'">';
  echo '<div class="thumbnail drop-shadow imgContainer nclick">';
  echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
  echo '<img  alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
  echo '<div>';
  echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปวิว เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  //echo $elem;
}

     ?>
     <div class="col-md-4 clicker" id="viewClicker">
       <div class="thumbnail drop-shadow">
         <img src="/img/add-view-photo.png" alt="...">
         <div class="caption text-center">
           <h5><a class="text-danger" href="#">+ เพิ่มรูปวิว</a></h5>
         </div>
       </div>
     </div>

     </div>

     <hr/>
-->
     <div class="row">
       <div class="col-md-12">
         <ul class="list-inline">
                   <li><h5>ภาพส่วนกลางโครงการและชุมชนแวดล้อม (ถ้ามี)</h5></li>
                   <li></li>
         </ul>
       </div>

<!-- <div class="col-md-4">
       <div class="thumbnail drop-shadow">
         <img src="/img/view-03.png" alt="...">
         <div>
           <h5>ระบุชื่อรูป?</h5>
           <textarea class="form-control captext" placeholder="คำอธิบายรูป เช่น วิวจากห้องนอน" row="3"></textarea>
          </div>
       </div>

       <div class="checkbox table-bordered padding-pro">
                   <label>
                    <input type="checkbox" value=""><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p>
                   </label>
       </div>


    </div>-->
    <!-- <div class="col-md-4">
       <div class="thumbnail drop-shadow">
         <img src="/img/view-04.png" alt="...">
         <div class="caption">
           <h5>สวนขนาด 10 ไร่</h5>
         </div>
       </div>
       <div class="checkbox table-bordered padding-pro">
                   <label>
                    <input type="checkbox" value=""><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p>
                   </label>
       </div>
    </div>-->

<?php
      foreach ($imgFac->result() as $row)
{
  //echo $row->file;

  $imgid = $row->ImgID;
  echo  '<div class="col-md-4" id="'."img".$imgid.'">';
  echo '<div class="thumbnail drop-shadow imgContainer nclick">';
  echo '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'."delImg".$imgid.'"></span>';
  echo '<img height="130px" style="height:200px; width:auto;" alt="" src="'.$row->file.'" id="'."image".$imgid.'"/>';
  echo '<div>';
  echo '<textarea class="form-control captext" placeholder="คำอธิบายรูปวิว เช่น วิวจากห้องทำงาน" row="3" id="'.$imgid.'">'.$row->description.'</textarea> ';
  echo '</div>';
  echo '</div>';
  /*if($row->allow){
  echo '<div class="checkbox table-bordered padding-pro"><label><input type="checkbox" checked="'.$row->allow.'" id="'."capAllow".$imgid.'"><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p></label></div>';
  }else{
  echo '<div class="checkbox table-bordered padding-pro"><label><input type="checkbox" id="'."capAllow".$imgid.'"><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p></label></div>';

  }*/
  echo '</div>';
  //echo $elem;
}

     ?>

     <div class="col-md-4">
       <div class="thumbnail drop-shadow">
         <img src="/img/add-view-photo.png" alt="...">
<div align="center">
<div id="waiting6"></div>
</div>
         <div class="caption text-left">
<form enctype="multipart/form-data" method="post" action="/zhome/uploadResized">
             <!--Added Dec7-->
             <div align="center"><h5><a class="text-red2" style="position: relative;overflow: hidden;" href='#'>+ เพิ่มรูปส่วนกลาง<input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload3[]" id="filesToUpload3" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "facilities";'/></a></h5></div>
             <!--End Added Dec7-->

  <!--<div align="center"><input type="file" name="filesToUpload3[]" id="filesToUpload3" multiple="multiple" accept="image/*" onclick='document.getElementById("imgType").value= "facilities";'/></div>-->
</form>
<!--
  <h5><a class="text-danger" href="#">+ เพิ่มรูปส่วนกลาง</a></h5>
-->
</div>
       </div>
<!--<div class="checkbox table-bordered padding-pro">
                   <label>
                    <input type="checkbox" value=""><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p>
                   </label>
       </div>-->
</div>

     </div>
<hr>
     <div class="row">

       <div class="col-md-12"><h5>เลือกภาพส่วนกลางและชุมชนแวดล้อม</h5>
       </div>

      <!-- <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
      </div>-->
       <!--<div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>-->
       <!--<div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>-->

     </div>
     <br/>
     <!--
       <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>
       <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>
       <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>
      -->

     <!--


       <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>
       <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>
       <div class="col-md-4">
         <div>
             <img class="img-responsive" src="/img/view-03.png">
             <input class="checkbox-photo" type="checkbox" value="">
         </div>
       </div>

    -->


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
    <!--
     <div class="pull-right">
       <button type="button" class="btn btn-warning btn-sm" onclick="val1('3')" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val1('5')" > ถัดไป</button>
     </div>
   -->
     <div class="clearfix"></div>
     <br><br>


 <!-move->
 <!--
      <hr>
     <div class="row hidden-xs">

       <div class="col-md-12"><h5> คำแนะนำในการถ่ายภาพ Panorama</h5></div>
      </div>

      <div class="text-grey hidden-xs">
            ภาพถ่ายห้องทุกห้องในบ้านด้วยโหมด Pano ณ หัวมุมห้องที่แทยงกัน คุณจะได้ผู้ซื้อ/ เช่าที่สนใจจริงจากภาพถ่ายที่ดี<br/>
             1. ยืนให้ชิดมุมห้องที่สุด<br/>
             2. ตั้งกล้องโทรศัพท์มือถือให้ถ่ายด้วยระบบ (Pano) โดยถือกล้องแนวตั้ง<br/>
             3. ถ่ายภาพโดยเริ่มจากผนังที่ชิดหัวไหล่ซ้าย แพนไปจนเห็นถึงผนังที่ชิดหัวไหล่ขวา<br/>
             4. ทำซ้ำขั้นตอนกับทุมที่แทยงกัน<br/>
             5. ถ่ายภาพวิวของแต่ละห้อง (ถ้ามี)
             <br><br>
      </div>
         <br/>
          <ul class="list-inline hidden-xs">
             <li class="pull-left"><img class="img-responsive" src="/img/room-normal.png"></li>
             <li class="pull-right"><img class="img-responsive" src="/img/room-pano.png"></li>
         </ul>
         <div class="clearfix"></div>
-->
 </div>
<!--
     <hr class="">
 <div class="row hidden-xs">
     <div class="col-md-4">
       <img class="img-responsive  drop-shadow" src="/img/img-m1.png"><br/>
       <p>เลือกโหมดPanoถือโทรศัพท์แนวตั้ง</p><br/>
     </div>
     <div class="col-md-4">
       <img class="img-responsive  drop-shadow" src="/img/img-m2.png"><br/>
       <p>ถ่ายที่มุมตามภาพให้ครบทุกห้อง</p><br/>
     </div>
     <div class="col-md-4">
       <img class="img-responsive drop-shadow" src="/img/img-m3.png"><br/>
       <p>ถ่ายภาพวิวให้ครบทุกห้อง</p>
     </div>

 </div>
-->
<!--
 <div class="col-md-12 text-center hidden-xs">
   <button type="button" class="btn btn-green btn-lg"><a href="#">จ้างถ่ายภาพ Pano โทร 02-661-5001<br>ค่าบริการ 500บาท ต่อ 1 ห้องนอน </a></button>
 </div>
-->
 <!end move->
 <div class="clearfix"></div>
 <br>
</div>

<div class="col-md-3 col-md-push-2 property-info hidden-xs">
       <div class="text-center">
          <h3 class="z-tip">รูปถ่ายครบ-สวย<div class="padding-tip-top">
ได้ผู้ซื้อที่สนใจจริง</div></h3>
          <br>
         <div class="savetime">ประหยัดเวลาขึ้น</div>


         <div><img src="/img/clock-25.png" class="img-responsive center-block"></div>
         <div id="title_panel" class="center-block display-none" style="width:85%;">
           <br/>
           <div><img src="/img/tip.png"></div>
           <h2 class="z-tip"><?=$qLabel['description'][0];?></h3>
           <h3 class="z-tip" id="title_detail"></h3>
         </div>
               <div class="display-none">
                   <hr/>
                   <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                   <h5>ภาพวิว</h5>
                   <div class="col-md-12">
                       ผู้ซื้อไม่สามารถตัดสินใจซื้อได้
   หากไม่เห็นวิว ประกาศควรมี
   ภาพวิวจากทุกห้องหลัก
                   </div>
               </div>

       <br/>
   </div>
   </div>
<!--
   <aside class="col-md-2 col-md-pull-10 hidden-xs">
     <ul class="nav padding-top8">
       <li><a>เริ่มต้น</a></li>
       <li><a>พื้นฐาน</a></li>
       <li><a>ตั้งราคา</a></li>
       <li class="active"><a>รูปถ่าย</a></li>
       <li><a>การสื่อสาร</a></li>
       <li>&nbsp;</li>
       <li>&nbsp;</li>
       <li>&nbsp;</li>
       <li class="padding-l15"><div>เหลือ <span class="green">1 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
     </ul>
   </aside>
-->
    </div>
  </div>
  <div class="container">
          <div class="row">

            <div class="col-md-7 col-md-push-2">
              <!--
              <h3 class="text-primary">รายละเอียดการติดต่อ</h3>
              <div class="text-primary big2">กรอกหมายเลขโทรศัพท์มือถือและอีเมลล์ให้มากที่สดเพื่อไม่พลาดการติดต่อ<br/>ยืนยันอย่างน้อย 1 เบอร์โทร และ 1 อีเมลล์ หรือทุกรายการ เพื่อให้ผู้ซื้อติดต่อท่านได้
              </div>
            -->
              <hr>
              <ul class="list-inline padding-top1">
                <li class="width-100"><h5 id="showTelephone1">มือถือ 1 * </h5></li>
                <li><input class="form-control" name="Telephone1" id="Telephone1" type="text" placeholder="081xxxxxxx" value="<?=$this->post->AdminCheckPost('Telephone1')?>" onchange="updatePost('Telephone1')" OnKeyPress="return chkNumber(this)"></li>
                <li>
                  <label>
                    &nbsp;
                  </label>
                </li>
              </ul>
              <ul class="list-inline padding-top1">
                <li class="width-100"><h5>มือถือ 2 </h5></li>
                <li><input class="form-control" type="text" name="Telephone2" id="Telephone2" placeholder="089xxxxxxx" value="<?=$this->post->AdminCheckPost('Telephone2')?>" onchange="updatePost('Telephone2')" OnKeyPress="return chkNumber(this)"></li>
                <li>
                  <label>
                    <input type="checkbox" name="AgreeTelephone2" class="display-none" id="AgreeTelephone2"  value="<?=$this->post->AdminCheckPost('AgreeTelephone2')?>" <?php if ($this->post->AdminCheckPost('AgreeTelephone2')==1){echo "checked";};?> onclick="changeValue2('AgreeTelephone2')"> เบอร์สำรองหากหมายเลขแรกไม่สามารถติดต่อได้
                  </label>
                </li>
              </ul>
              <ul class="list-inline padding-top1">
                <li class="width-100"><h5 id="showEmail1">อีเมลล์ 1 *</h5></li>
                <li><input class="form-control " name="Email1" id="Email1" type="text" placeholder="Email@hotmail.com"  onchange="updatePost('Email1')" value="<?=$email;?>"></li>
                <li>
                  <label>
  					&nbsp;
                  </label>
                </li>
              </ul>

              <ul class="list-inline padding-top1">
                <li class="width-100"><h5>อีเมลล์ 2</h5></li>
                <li><input class="form-control " name="Email2" id="Email2" type="text" placeholder="Email@gmail.com" value="<?=$this->post->AdminCheckPost('Email2')?>" onchange="updatePost('Email2')"></li>
                <li>
                  <label>
  					&nbsp;
  				</label>
                </li>
              </ul>
               <ul class="list-inline padding-top1">
                <li class="width-100"><h5>ไลน์ ID  </h5></li>
                <li><input class="form-control " name="LineID" id="LineID" type="text" placeholder="Line ID" value="<?=$this->post->AdminCheckPost('LineID')?>" onchange="updatePost('LineID')"></li>
                <li>
                  <label>
  					&nbsp;
  				</label>
                </li>
              </ul>

              <br/>
              <div class="pull-right">
                <button type="button" class="btn btn-warning btn-sm" onclick="val2()" > ถัดไป</button>
              </div>
              <div class="clearfix"></div>
              <br>
            </div>
            <div class="col-md-3 col-md-push-2 property-info hidden-xs">
                <div class="text-center">
                <h3 class="z-tip">เบอร์ติดต่อ&ไลน์ครบ<div class="padding-tip-top">ไม่พลาดโอกาส</div>
                </h3>
                   <br>
                  <div class="savetime">ประหยัดเวลาขึ้น</div>


                  <div><img src="/img/clock-60.png" class="img-responsive center-block"></div>
                <div class="display-none">
                  <hr/>
                  <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                  <h5>Download App</h5>
                  <p>ไม่พลาดโอกาสสื่อสารกับผู้ซื้อ<br/>
      และอัพเดดราคาทรัพย์สินได้ทันที</p>
                </div>
              </div>

            </div>
        <!--
            <aside class="col-md-2 col-md-pull-10 hidden-xs">
              <ul class="nav padding-top8">
                <li><a>เริ่มต้น</a></li>
                <li><a>พื้นฐาน</a></li>
                <li><a>ตั้งราคา</a></li>
                <li><a>รูปถ่าย</a></li>
                <li class="active"><a>การสื่อสาร</a></li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li>&nbsp;</li>
                <li class="padding-l15"><div><span class="green">ขั้นตอนสุดท้าย</span></div></li>
              </ul>

            </aside>
          -->
            </div>
        </div>

    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
</form>
