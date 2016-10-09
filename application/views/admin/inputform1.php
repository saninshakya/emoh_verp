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
<input type="hidden" name="key_change" id="key_change" value="0">
<input type="hidden" name="last_page" id="last_page" value="1">
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
            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="valLat()" > ถัดไป</button>
            </div>
            <div class="clearfix"></div>
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
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
</form>