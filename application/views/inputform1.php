<?php
$this->session->set_userdata('last_page','1');
$unit_token=$this->session->userdata('token');
$rowChk=$qPost->row();
$OwnerName=$rowChk->OwnerName;
$TOOwner=$rowChk->TOOwner;
$TOProperty=$rowChk->TOProperty;
$ProjectName=$rowChk->ProjectName;
$TOAdvertising=$rowChk->TOAdvertising;
$Telephone1=$rowChk->Telephone1;
$TelLineID=$rowChk->TelLineID;
$LineID=$rowChk->LineID;
if(!isset($TOProperty) || $TOProperty==0){$TOProperty=1;}

$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="0">
<input type="hidden" name="last_page" id="last_page" value="1">
<input type="hidden" name="unit_token" id="unit_token" value="<?=$unit_token;?>">
<div class="container">
  <div class="row">

    <div class="col-md-7 col-md-push-2">
      <h3 class="text-primary">เริ่มต้นประกาศ</h3>
      <div class="checkbox">
        <label>
          <input type="checkbox" <?php if ($this->post->checkPost('Agree_Owner')==1){echo "Checked";};?> value="<?php echo $this->post->checkPost('Agree_Owner');?>" name="Agree_Owner" id="Agree_Owner" onClick="updateAgreeOwner(this.value)"><p class="text-primary big2" id="showAgree_Owner">คุณเป็นเจ้าของ / คนในครอบครัวที่ตัดสินใจได้ กรอกข้อมูลให้ครบถ้วนถูกต้อง *<br>
          ประกาศของคุณจะถูกระงับ หากคุณไม่ใช่เจ้าของ หรือกรอกข้อมูลสำคัญผิด</p>
        </label>
      </div>
      <hr>

      <!--Added New-->
      <div class="row">
        <div class="col-md-12">
          <h5>เบอร์โทรศัพท์และ Line ID (แอด Line Official Account : ZmyHome  เพื่อสอบถามวิธีลงประกาศ)</h5>
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

      <!--End------>
<!--             <div class="row">
              <div class="col-md-12">
                <h5>ข้อมูลเริ่มต้น</h5>
              </div>
            </div> -->
            <div class="row">
              <div class="col-xs-12 col-md-4">
                <div class="normal_msg q-formtitle" id="ShowTOOwner"><?=$qLabel['owner_type'][0];?></div>
                <select class="form-control q-input" name="TOOwner" id="TOOwner" onchange="updatePost('TOOwner')" onmouseover="show_title('<?=$qLabel['owner_type_title'][0];?>');" onmouseout="hide_title();">
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
             <div class="col-xs-12 col-md-8">
              <div class='q-formtitle' id="ShowOwnerName"><?=$qLabel['owner_name'][0];?></div>
              <input name="OwnerName" id="OwnerName" class="form-control q-input" type="text" <?php if ($OwnerName!=""){echo 'Value="'.$OwnerName.'"';};?> placeholder="โปรดระบุ" onchange="updatePost('OwnerName')" onmouseover="show_title('<?=$qLabel['owner_name_title'][0];?>');" onmouseout="hide_title();">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-4">
              <div class='q-formtitle' id="ShowTOProperty"><?=$qLabel['property_type'][0];?></div>
              <select class="form-control q-input" name="TOProperty" id="TOProperty" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['property_type_title'][0];?>" onchange="updatePost('TOProperty')" onmouseover="show_title('<?=$qLabel['property_type_title'][0];?>');" onmouseout="hide_title();">
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

           <div class="col-xs-12 col-md-8"> 
            <div class="q-formtitle" id="ShowProjectName"><?=$qLabel['project_name'][0];?></div>
            <input id="ProjectName" Name="ProjectName" class="form-control q-input" data-toggle="tooltip" data-placement="bottom" title="<?=$qLabel['project_name_title'][0];?>" type="text" <?php if ($ProjectName!=""){echo 'Value="'.$ProjectName.'"';};?> placeholder="โปรดระบุ" onchange="updateProjectName();" onmouseover="show_title('<?=$qLabel['project_name_title'][0];?>');" onmouseout="hide_title();">
          </div>
        </div>
        <div class="row">
         <div class="col-md-4">
          <div class='q-formtitle' id="ShowTOAdvertising"><?=$qLabel['advertising'][0];?></div>
          <select class="form-control q-input" name="TOAdvertising" id="TOAdvertising" onchange="updatePost('TOAdvertising')" onmouseover="show_title('<?=$qLabel['advertising_title'][0];?>');" onmouseout="hide_title();">
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
  <div class="col-xs-6 col-md-5 col-lg-3"></div>
  <div class="col-xs-6 col-md-5 col-md-offset-2 col-lg-3 col-lg-push-4">
    <button type="button" class="btn btn-warning col-xs-12 text-white" onclick="valLat()" >ถัดไป</button>
  </div>
</div>
<br>
</div>
<br>
<div class="col-md-3 col-md-push-2 property-info hidden-xs">
  <div class="text-center">
    <h3 class="z-tip">"ข้อมูลดี ขายเร็ว ได้ราคาดี"<div class="padding-tip-top">&nbsp;</div></h3>
    <br>
    <div class="savetime">ประหยัดเวลาขึ้น</div>
    <div><img src="/img/clock-00.png" class="img-responsive center-block"></div>
			   <!--<div class="panel panel-primary" id="title_panel" style="display:none;">
    				<div class="panel-heading">
    					<span class="glyphicon glyphicon-info-sign" aria-hidden="true"><h3 class="panel-title"><?=$qLabel['description'][0];?></h3></span>
    				</div>
    				<div class="panel-body" id="title_detail"></div>
    			</div>-->
         <div id="title_panel" class="center-block display-none" style="width:85%;">
          <br/>
          <div><img src="/img/tip.png"></div>
          <h2 class="z-tip"><?=$qLabel['description'][0];?></h3>
            <h3 class="z-tip" id="title_detail"></h3>
          </div>


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
          <img src="/img/ZmyHome_BoostPostAds_SideBanner_pc.jpg" class="img-responsive">

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
					<div class="col-md-12 text-center padding-t120 padding-b120 line-height1"><h4 class="text-grey">คุณกรอกข้อมูลไม่ครบถ้วน<br> ต้องการไปยังหน้าถัดไป</h4></div>
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
	<div class="modal modal-sm fade display-none" id="myModalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content text-center">
				<div class="modal-header bg-blue">
					<h4 class="text-white text-center padding-none padding-t3" id="myModalLabel" style="">Warning</h4>
				</div>
				<div class="modal-body row">
					<div id="txt_alert" class="col-md-12 text-center padding-t120 padding-b120 font19"><h4 class="text-grey">คุณยังไม่ได้ระบุประเภทประกาศ</h4></div>
					<div id="modal_submit" class="col-md-12 padding-top10">
						<button type="button" class="btn btn-orange4 btn-block text-white" onclick="$('#myModalAlert').modal('hide');">ตกลง</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
</form>