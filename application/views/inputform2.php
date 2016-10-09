<?php
$this->session->set_userdata('last_page','2');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="2">
<input type="hidden" name="last_page" id="last_page" value="2">
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
     <div class="col-md-4 col-sm-7 title-z">
      <div><?=$qLabel['tower_name'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้าโครงการมีหลายอาคาร ให้ระบุชื่ออาคาร" ><span class="glyphicon glyphicon-info-sign input-sm4  padding-clear" aria-hidden="true"></span></a></div>
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
<div class="col-md-4 col-sm-7 title-z">
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
  <div class="q-formtitle"><?=$qLabel['ocarpark_certificate'][0];?><a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ถ้ามีโฉนดเฉพาะสำหรับที่จอดรถ"><span class="glyphicon glyphicon-info-sign  input-sm4  padding-clear" aria-hidden="true"></span></a></div>

  <select class="form-control q-input" name="OCarPark" id="OCarPark" onchange="updatePost('OCarPark')" data-toggle="tooltip" data-placement="bottom" onmouseover="show_title('<?=$qLabel['ocarpark_certificate_title'][0];?>');" onmouseout="hide_title();">
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
  <div class="q-formtitle" ><?=$qLabel['ocarpark_nofixed'][0];?></div>

  <select class="form-control q-input" name="NCarPark" id="NCarPark" onchange="updatePost('NCarPark')" onmouseover="show_title('<?=$qLabel['ocarpark_nofixed_title'][0];?>');" onmouseout="hide_title();">
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
    <button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1()" >ก่อนหน้า</button>
  </div> 
  <div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
    <button type="button" class="btn btn-warning col-xs-12 text-white"  data-toggle="modal" onclick="val2()">ถัดไป</button>
  </div>
</div>
<br>
</div>
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
      <h2 class="z-tip"><?=$qLabel['description'][0];?></h3>
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
    <img src="/img/ZmyHome_BoostPostAds_SideBanner_pc.jpg" class="img-responsive">

  </aside>
</div>
</div>
</div>
<!-- Modal -->
<div class="modal modal-sm fade" id="myModalConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabelConfirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-header bg-blue">
        <h4 class="text-white text-center padding-none padding-t3" id="myModalLabelConfirm" style="">Confirm</h4>
      </div>
      <div class="modal-body row">
        <div class="col-md-12 text-center padding-t40 padding-b40"><h4 class="text-grey">คุณกรอกข้อมูลไม่ครบถ้วน<br> ต้องการไปยังหน้าถัดไป</h4></div>
        <div class="col-md-12 padding-top10">
          <button type="button" class="btn btn-orange4 btn-block text-white" onclick="$('#myModalConfirm').modal('hide');$('#myform').submit();">ตกลง</button>
        </div>
        <div class="col-md-12 padding-top10">
          <button type="button" class="btn btn-grey btn-block text-white" data-dismiss="modal" aria-label="Close" onclick="$('#myModalConfirm').modal('hide');">ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal modal-sm fade" id="myModalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAlert">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
      <div class="modal-header bg-blue">
        <h4 class="text-white text-center padding-none padding-t3" id="myModalLabelAlert" style="">Warning</h4>
      </div>
      <div class="modal-body row">
        <div id="txt_alert" class="col-md-12 text-center padding-t40 padding-b40"><h4 class="text-grey">คุณยังไม่ได้ระบุประเภทประกาศ</h4></div>
        <div class="col-md-12 padding-top10">
          <button type="button" class="btn btn-orange4 btn-block text-white" onclick="$('#myModalAlert').modal('hide');">ตกลง</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!--End Modal-->
<img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs hidden hidden">

</form>