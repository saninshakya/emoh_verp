<?php
$this->session->set_userdata('last_page','35');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="3">
<input type="hidden" name="TotalPrice" id="TotalPrice" value="<?php echo $this->post->checkPost('TotalPrice');?>">
<input type="hidden" name="HNetPrice" id="HNetPrice" value="<?php echo $this->post->checkPost('NetPrice');?>">
<input type="hidden" name="BrokerPrice" id="BrokerPrice" value="<?php echo $this->post->checkPost('BrokerPrice');?>">
<input type="hidden" name="AssetPrice" id="AssetPrice" value="<?php echo $this->post->checkPost('AssetPrice');?>">
<input type="hidden" name="TotalPriceBroker" id="TotalPriceBroker" value="<?php echo $this->post->checkPost('TotalPriceBroker');?>">
<input type="hidden" name="Tax1" id="Tax1" value="<?php echo $this->post->checkPost('Tax1');?>">
<input type="hidden" name="Tax2" id="Tax2" value="<?php echo $this->post->checkPost('Tax2');?>">
<input type="hidden" name="Tax3" id="Tax3" value="<?php echo $this->post->checkPost('Tax3');?>">
<input type="hidden" name="Tax4" id="Tax4" value="<?php echo $this->post->checkPost('Tax4');?>">
<input type="hidden" name="Tax5" id="Tax5" value="<?php echo $this->post->checkPost('Tax5');?>">
<input type="hidden" name="Tax6" id="Tax6" value="<?php echo $this->post->checkPost('Tax6');?>">
<input type="hidden" name="Tax7" id="Tax7" value="<?php echo $this->post->checkPost('Tax7');?>">
<input type="hidden" name="TotalTax" id="TotalTax" value="<?php echo $this->post->checkPost('TotalTax');?>">
<input type="hidden" name="useArea" id="useArea" value="<?php echo $this->post->checkPost('useArea');?>">
<input type="hidden" name="PercentTax" id="PercentTax" value="<?php echo $this->post->checkPost('PercentTax');?>">
<input type="hidden" name="PRentPrice" id="PRentPrice" value="<?php echo $this->post->checkPost('PRentPrice');?>">

<div class="container">
        <div class="row">
          
          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">ตั้งราคาค่าเช่าและเงื่อนไขการเช่า</h3>
            <div class="checkbox">
                <p class="text-primary">เพื่อป้องกันความสับสน ราคาที่ประกาศให้ผู้เช่ารวมค่าใช้จ่ายส่วนกลางแล้ว<small class="text-primary">ยกเว้นค่าจดจํานอง</small></p>
                <p class="text-grey">
				1.ระบุค่าเช่าสุทธิที่ต้องการ<br/>
				2.ระบุรายละเอียดสัญญาให้ครบถ้วน<br/>
                </p>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                <div class="col-md-4">
                         <h5>สถานะห้องว่างปัจจุบัน</h5>
                          <select class="form-control input-md" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();">
                              <option value="0" <?php if ($this->post->checkPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
                              <option value="1" <?php if ($this->post->checkPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
                          </select>
                </div>
                <div class="col-md-4">
                         <h5>สัญชาติของผู้เช่า</h5>
                         <select class="form-control input-md" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?>>
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
                         <h5>วันสิ้นสุดสัญญา</h5>
                         <input class="form-control input-md" type="text" name="PRentEnd" id="PRentEnd" onblur="setTimeout(function(){updatePost('PRentEnd')}, 500);" value="<?php echo $this->post->checkPost('PRentEnd');?>" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?>>
                </div>

                <div class="col-md-12">
                         <h5><span class="text-green">ค่าเช่าสุทธิที่ต้องการ* (บาท/เดือน)</span> รวมค่าใช้จ่ายส่วนกลางแล้ว</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control input-md" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value='';" onchange="changeformat2();"  value="<?php echo '฿'.number_format($this->post->checkPost('PRentPrice'),0,'.',',');?>" >
                </div>
                
                <div class="col-md-12 bg-warning padding-pro3"> <p>* อัตราค่าเช่าสุทธินี้ ไม่รวมค่าใช้จ่ายอื่นๆ ได้แก่ ค่าสาธารณูปโภค และบริการอื่นๆ เช่นเคเบิ้ลทีวี อินเตอร์เน็ท แม่บ้าน ฯลฯ ซึ่งต้องตกลงกับผู้เช่า และระบุในสัญญาให้ครบถ้วน</p>
                </div>
                <div class="col-md-12">
                    <h5>ยอมรับผู้เช่าที่เซ็นสัญญาในนาม</h5>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentCO" id="PRentCO" value="<?php echo $this->post->checkPost('PRentCO');?>" <?php if ($this->post->checkPost('PRentCO')=='1'){echo "Checked";};?> onclick="changeValue3('PRentCO');updatePost('PRentCO');"><p class="text-grey">บริษัท</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentIN" id="PRentIN" value="<?php echo $this->post->checkPost('PRentIN');?>" <?php if ($this->post->checkPost('PRentIN')=='1'){echo "Checked";};?> onclick="changeValue3('PRentIN');updatePost('PRentIN');"><p class="text-grey">บุคคล</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-12"><h5>ลักษณะการเช่าที่ยอมรับได้</h5>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentAllNational" id="PRentAllNational" value="<?php echo $this->post->checkPost('PRentAllNational');?>" <?php if ($this->post->checkPost('PRentAllNational')=='1'){echo "Checked";};?> onclick="changeValue3('PRentAllNational');updatePost('PRentAllNational');"><p class="text-grey">ทุกสัญชาติ</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentChild" id="PRentChild" value="<?php echo $this->post->checkPost('PRentChild');?>" <?php if ($this->post->checkPost('PRentChild')=='1'){echo "Checked";};?> onclick="changeValue3('PRentChild');updatePost('PRentChild');"><p class="text-grey">เด็กอายุไม่เกิน 8 ปี</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentPet" id="PRentPet" value="<?php echo $this->post->checkPost('PRentPet');?>" <?php if ($this->post->checkPost('PRentPet')=='1'){echo "Checked";};?> onclick="changeValue3('PRentPet');updatePost('PRentPet');"><p class="text-grey">สุนัข-แมวเล็ก</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentEmptyRoom" id="PRentEmptyRoom" value="<?php echo $this->post->checkPost('PRentEmptyRoom');?>" <?php if ($this->post->checkPost('PRentEmptyRoom')=='1'){echo "Checked";};?> onclick="changeValue3('PRentEmptyRoom');updatePost('PRentEmptyRoom');"><p class="text-grey">ให้เช่าห้องเปล่า</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="PRentGas" id="PRentGas" value="<?php echo $this->post->checkPost('PRentGas');?>" <?php if ($this->post->checkPost('PRentGas')=='1'){echo "Checked";};?> onclick="changeValue3('PRentGas');updatePost('PRentGas');"><p class="text-grey">ใช้เตาแก๊ส</p>
                          </label>
                    </div>
                </div>
                </div>
              
            </div>
            <hr/>

            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="val1('2')" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val1('4')" > ถัดไป</button>
            </div>
            <div class="clearfix"></div>
          </div>

          <div class="col-md-3 col-md-push-3 property-info" style="background-image:/img/zhome-table.png">
              <div class="text-center">
                <h3 class="text-danger">ราคา-ค่าใช้จ่ายครบ<br/>
    ลดความขัดแย้ง</h3>
            
                <div><img src="/img/progress-0.png" class="img-responsive center-block"></div>
                <hr/>
                <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                <h5>ราคาประกาศขาย</h5>
                <div class="col-md-12">
                    Z HOME กำหนดให้ราคาประกาศขาย
                    เป็นราคาที่ผู้ขายรวมค่าใช้จ่ายแล้ว
                    เพื่อลดข้อขัดแย้งภายหลัง
                    ราคาประกาศขาย<br/><br/>
                    *หากผู้ซื้อยินดีซื้อ ในราคาที่ท่าน
                    กำหนด แต่ท่านขึ้นราคาหรือไม่ขาย
                    เราขอสงวนสิทธิในการระงับประกาศ
                    ของท่าน<br/><br/>
                    *ประกาศของคุณจะไม่แสดงเมื่อ
                    ครบกำหนด คุณสามารถปรับราคา
                    หรือเวลาประกาศได้ตลอดเวลา ทาง
                    Z HOME Application ก่อนที่จะมีคน
                    ติดต่อท่าน เพื่อหลีกเลี่ยงการถูก
                    ระงับประกาศ
                  </div>
                </div>
              <br/>
          </div>
          <aside class="col-md-2 col-md-pull-10 hidden-xs">
            <ul class="nav">
              <li><a href="/zhome/changePage2/1">เริ่มต้น</a></li>
              <li><a href="/zhome/changePage2/2">พื้นฐาน</a></li>
              <li class="active"><a href="#">ตั้งราคา</a></li>
              <li><a href="/zhome/changePage2/4">รูปถ่าย</a></li>
              <li><a href="/zhome/changePage2/5">การสื่อสาร</a></li>
              <li><a href="#">ส่วนลด</a></li>
            </ul>
            <div class="h360 hidden-xs"></div>
            <div>เหลือ <span class="green">3 ขั้นตอน</span><br> เพื่อลงประกาศ</div>
          </aside>
          </div>
      </div>
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs">
