<?php
$this->session->set_userdata('last_page','2');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/admin/changePage1', $attributes);
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
    
              
            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="val1()" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val2()" > ถัดไป</button>
            </div>

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
          </div>
      </div>
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs hidden hidden">

</form>