<?php
$this->session->set_userdata('last_page','35');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="5">
<input type="hidden" name="last_page" id="last_page" value="35">
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
<input type="hidden" name="PRentCO" id="PRentCO" value="<?php echo $this->post->checkPost('PRentCO');?>">
<input type="hidden" name="AgentPRent" id="AgentPRent" value="<?php echo $this->post->checkPost('AgentPRent');?>">
<div class="container">
        <div class="row">
          
          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">กำหนดค่าเช่าและเงื่อนไขการเช่า</h3>
            <div class="checkbox">
                <p class="text-primary">เพื่อป้องกันความสับสน ค่าเช่าที่ประกาศเป็นค่าเช่าที่รวมค่าใช้จ่ายส่วนกลางแล้วเท่านั้น</p>
               
            </div>
            <hr>

            <div class="row">
                
                <div class="col-md-12"><h5>สถานะปัจจุบันของบ้าน/ห้องชุดที่จะปล่อยเช่า</div>
                <div class="col-md-4">
                         <h5 class="normal_msg" id="ShowStatusPRent">สถานะห้องว่างปัจจุบัน *</h5>
                          <select class="form-control selectpicker input-md" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();">
                              <option disabled selected>ว่าง/มีผู้เช่า</option>
                              <option value="0" <?php if ($this->post->checkPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
                              <option value="1" <?php if ($this->post->checkPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
                          </select>
                </div>
                <div class="col-md-4">
                         <h5>สัญชาติของผู้เช่า</h5>
                         <select class="form-control selectpicker input-md" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');">
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
                         <h5>วันสิ้นสุดสัญญา</h5>
                         <input class="form-control input-md" type="text" name="PRentEnd" id="PRentEnd" onblur="setTimeout(function(){updatePost('PRentEnd')}, 500);" value="<?php echo $this->post->checkPost('PRentEnd');?>" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?>>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-md-12"><hr></div>

                <div class="col-md-12">
                         <h5>รายละเอียดการเช่า</h5>
                </div>
                <div class="col-md-8">
                    <h5 class="normal_msg" id="ShowPRentPrice2">ค่าเช่าสุทธิที่ต้องการ *(บาท/เดือน)</h5>
                    <div class="col-md-6"  style="padding-left:0px">
                     <input class="form-control input-md" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value=document.getElementById('PRentPrice').value;" onchange="changeformat2();"  value="<?php echo '฿'.number_format($this->post->checkPost('PRentPrice'),0,'.',',');?>" >
                    </div>                
                </div>
              
               
                <div class="clearfix"></div>
                <br>

                <!-Edit->

                 <div class="col-md-4">
                    <h5  class="normal_msg" id="ShowMinTimePRent">ระยะเวลาเช่าขั้นต่ำ *(เดือน)</h5>
                    <select class="form-control selectpicker input-md" name="MinTimePRent" id="MinTimePRent" onchange="updatePost('MinTimePRent');">
                              <option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
                              <option value="1" <?php if ($this->post->checkPost('MinTimePRent')=="1"){echo "selected";};?>>1 เดือน</option>
                              <option value="2" <?php if ($this->post->checkPost('MinTimePRent')=="2"){echo "selected";};?>>2 เดือน</option>
                              <option value="3" <?php if ($this->post->checkPost('MinTimePRent')=="3"){echo "selected";};?>>3 เดือน</option>
							  <option value="6" <?php if ($this->post->checkPost('MinTimePRent')=="6"){echo "selected";};?>>6 เดือน</option>
							  <option value="12" <?php if ($this->post->checkPost('MinTimePRent')=="12"){echo "selected";};?>>1 ปี</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <h5 class="normal_msg" id="ShowDepositPRent">เงินมัดจำ *(เดือน)</h5>
                    <select class="form-control selectpicker input-md" name="DepositPRent" id="DepositPRent" onchange="updatePost('DepositPRent');">
                              <option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
                              <option value="1" <?php if ($this->post->checkPost('DepositPRent')=="1"){echo "selected";};?>>1เดือน</option>
                              <option value="2" <?php if ($this->post->checkPost('DepositPRent')=="2"){echo "selected";};?>>2เดือน</option>
                              <option value="3" <?php if ($this->post->checkPost('DepositPRent')=="3"){echo "selected";};?>>3เดือน</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <h5 class="normal_msg" id="ShowAdvancePRent">ค่าเช่าล่วงหน้า *(เดือน)</h5>
                    <select class="form-control selectpicker input-md" name="AdvancePRent" id="AdvancePRent" onchange="updatePost('AdvancePRent');">
                              <option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
                              <option value="1" <?php if ($this->post->checkPost('AdvancePRent')=="1"){echo "selected";};?>>1เดือน</option>
                              <option value="2" <?php if ($this->post->checkPost('AdvancePRent')=="2"){echo "selected";};?>>2เดือน</option>
                              <option value="3" <?php if ($this->post->checkPost('AdvancePRent')=="3"){echo "selected";};?>>3เดือน</option>                          
                    </select>
                </div>

                <!End Edit->

                <div class="clearfix"></div>
                <br>
                <div class="col-md-12">
                        <span class="text-red">*ค่าเช่าสุทธิที่ต้องการ โดยปกติจะรวมค่าส่วนกลาง แต่ไม่รวมค่าใช้จ่ายอื่นๆ เช่น เคเบิ้ลทีวี อินเตอร์เน็ท ยกเว้นการเช่าที่มีค่าเช่าสูง เจ้าของต้องตามความต้องการของผู้เช่าให้ครบถ้วนเมื่อมีการต่อรองเรื่องราคา</span>
                </div>
                <div class="clearfix"></div>
                <br>
               
                
                <div class="col-md-12">
                    <h5>ยอมรับผู้เช่าที่เซ็นสัญญาในนามบริษัท/นิติบุคคล</h5>
                </div>
                <div class="col-md-4">
                    <div class="radio table-bordered padding-pro2">
                          <label class="radio-inline">
                           <input type="radio" name="PRentCO2" id="ChkPRentCO" value="1" <?php if ($this->post->checkPost('PRentCO')=='1'){echo "Checked";};?> onclick="document.getElementById('PRentCO').value=1;updatePost('PRentCO');"><p class="text-grey"> ใช่</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="radio table-bordered padding-pro2">
                          <label class="radio-inline">
                           <input type="radio" name="PRentCO2" id="UnChkPRentCO" value="0" <?php if ($this->post->checkPost('PRentCO')=='0'){echo "Checked";};?> onclick="document.getElementById('PRentCO').value=0;updatePost('PRentCO');"><p class="text-grey"> ไม่ใช่</p>
                          </label>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12"><hr></div>

                <div class="col-md-12">
                    <h5>ต้องการนายหน้าที่เห็นประกาศช่วยหาลูกค้า (ค่าบริการ 1 เดือนต่อสัญญา1ปี)</h5>
                </div>
                <div class="col-md-4">
                    <div class="radio table-bordered padding-pro2">
                          <label class="radio-inline">
                           <input type="radio" name="AgentPRent2" id="ChkAgentPRent" value="1" <?php if ($this->post->checkPost('AgentPRent')=='1'){echo "Checked";};?> onclick="document.getElementById('AgentPRent').value=1;updatePost('AgentPRent');"><p class="text-grey"> ต้องการ</p>
                          </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="radio table-bordered padding-pro2">
                          <label class="radio-inline">
                           <input type="radio" name="AgentPRent2" id="ChkAgentPRen" value="0" <?php if ($this->post->checkPost('PRentCO')=='1'){echo "Checked";};?> onclick="document.getElementById('AgentPRent').value=0;updatePost('AgentPRent');"><p class="text-grey"> ไม่ต้องการ</p>
                          </label>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-md-12"><hr></div>

                <div class="col-md-12"><h5>เลือกหากคุณยอมรับการเช่าลักษณะด้านล่างนี้ได้</h5>
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

            <div class="clearfix"></div>
            <hr/>

            <div class="pull-right">
              <button type="button" class="btn btn-warning btn-sm" onclick="val1(2)" >ก่อนหน้า  </button> <button type="button" class="btn btn-warning btn-sm" onclick="val1(4)" > ถัดไป</button>
            </div>
            <div class="clearfix"></div>
            <br>
          </div>

          <div class="col-md-3 col-md-push-3 property-info" style="background-image:/img/zhome-table.png">
              <div class="text-center">
                <h3 class="text-red">ข้อมูลค่าเช่าครบ<br/>
    ลดความขัดแย้ง</h3>
            
                <div><img src="/img/progress-10.png" class="img-responsive center-block"></div>
                   
                   <div class="display-none"> 
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

                </div>
              <br/>
          </div>
          <aside class="col-md-2 col-md-pull-10 hidden-xs">
            <ul class="nav">
              <li><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li class="active"><a>ตั้งราคา</a></li>
              <li><a>รูปถ่าย</a></li>
              <li><a>การสื่อสาร</a></li>
            </ul>
            <div class="h360 hidden-xs"></div>
            <div>เหลือ <span class="green">2 ขั้นตอน</span><br> เพื่อลงประกาศ</div>
          </aside>
          </div>
      </div>
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
