<?php
$this->session->set_userdata('last_page','34');
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
            <h3 class="text-primary">ตั้งราคาขาย/เช่า</h3>
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
               <div class="col-md-8">
                <h5>ราคาสุทธิที่ต้องการ (บาท)</h5>
                <ul class="list-inline">
                  <li><input class="form-control input-md" type="text" placeholder="ราคาบาท" name="NetPrice" id="NetPrice" onclick="this.value='';" onchange="updatePost('NetPrice');changeformat();"  value="<?php echo '฿'.number_format($this->post->checkPost('NetPrice'),0,'.',',');?>"></li>  
                  <li><span id="avg">฿<?php echo number_format((($this->post->checkPost('NetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></li>
                </ul>
                <p class="text-grey">ราคาประกาศขาย <span class="text-green" id="avg2">฿<?php echo number_format($this->post->checkPost('TotalPrice'),0,'.',',');?></span> หรือ <span class="text-green" id="avg3">฿<?php echo number_format((($this->post->checkPost('TotalPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p>
                <p class="text-grey">ประมาณค่าธรรมเนียม-ภาษี <span class="text-danger" id="showTotalTax">฿<?php echo number_format($this->post->checkPost('TotalTax'),0,'.',',');?></span> (ผู้ซื้อจ่ายค่าจดจำนอง)</p>
               </div>
               <div class="col-md-4">
                  <h5>ระยะเวลายืนยันราคาขาย**</h5>
                  <select class="form-control input-md" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')">
				  <?php
					$i=30;
					while ($i<=180){
				  ?>
                    <option value="<?php echo $i;?>" <?php if ($this->post->checkPost('AgreePostDay')==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
				  <?php
					  $i=$i+30;
					}
				  ?>
                </select>
               </div>
            </div>
            <hr/>
            <div class="row">
              <div class="col-md-12">
                   <h5>เพิ่มโอกาสในการขายด้วยนายหน้าทั่วประเทศไทย</h5>
                    <ul class="list-inline">
                      <li>
                        <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="Broker" id="Broker" <?php if ($this->post->checkPost('Broker')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Broker');?>" onclick="changeValue('Broker');updatePost('Broker');"><p class="text-grey">ยืนยันให้นายหน้าช่วยขาย</p>
                          </label>
                        </div>
                      </li>
                      <li><span class="text-danger">ค่าบริการ 2.0% </span><span class="text-danger" id="showBrokerPrice">฿<?php echo number_format($this->post->checkPost('BrokerPrice'),0,'.',',');?></span></li>
                    </ul>
                    <p class="text-grey">ราคาประกาศขายรวมค่านายหน้า <span class="text-green" id="showTotalPriceBroker">฿<?php echo number_format($this->post->checkPost('TotalPriceBroker'),0,'.',',');?></span> หรือ <span class="text-green" id="showTotalPriceBroker2">฿<?php echo number_format((($this->post->checkPost('TotalPriceBroker'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p> 
              </div>
            </div>
            <hr/>

            <div class="row">
           
                  <div class="col-md-12"><h5>ข้อมูลสำหรับประมาณการภาษีและค่าธรรมเนียม ณ กรมที่ดิน</h5></div>
                  <div class="col-md-4">
                   <h5>ท่านเริ่มถือครองทรัพย์สินปีพ.ศ.</h5>
                    <select class="form-control input-md" name="OwnerYear" id="OwnerYear" onchange="CalOwnerYear();">
					<?php
						$year=date("Y")+543;
						$i=1;
						while ($i<=10){
							if ($i!=10){
					?>
                        <option value="<?php echo $i;?>" <?php if ($this->post->checkPost('OwnerYear')==$i){echo "selected";};?> ><?php echo $year;?></option>
					<?php
							} else {
					?>
                        <option value="<?php echo $i;?>" <?php if ($this->post->checkPost('OwnerYear')==$i){echo "selected";};?> ><?php echo $year;?> หรือต่ำกว่า</option>
					<?php
							}
							$year=$year-1;
							$i++;
						}
					?>
                    </select>
                 </div>
                 
                 <div class="col-md-4">
                   <h5>ถือครองในนาม</h5>
                   <select class="form-control input-md" disabled>
                          <option value="personal" <?php if ($this->post->checkPost('TOOwner')==1){echo "selected";};?>>บุคคลธรรมดา</option>
                          <option value="company" <?php if ($this->post->checkPost('TOOwner')==2){echo "selected";};?>>นิติบุคคล</option>
                   </select>
                </div>
                <div class="col-md-4">
                    <h5>ราคาประเมินกรมที่เดินปัจจุบัน</h5>
                    <input class="form-control input-md" type="text" placeholder="อัตโนมัติ (ถ้ามีข้อมูลใน DB)"id="AssetPrice2" name="AssetPrice2" onchange="changeAssetPrice();" value="฿<?php echo number_format((($this->post->checkPost('AssetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม." onclick="this.value='';">
                 </div>
                <br/>
				          <div class="col-md-4 padding-top10">
                           <input type="checkbox" name="Inhabit" id="Inhabit" <?php if ($this->post->checkPost('Inhabit')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Inhabit');?>" onclick="changeValue2('Inhabit');"> มีชื่ออยู่ในทะเบียนบ้านเกิน 1ปี
                        </div>
				          <div class="col-md-4 padding-top10">
                           <input type="checkbox" name="Inheritance" id="Inheritance" <?php if ($this->post->checkPost('Inheritance')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Inheritance');?>" onclick="changeValue2('Inheritance');"> สินทรัพย์มาจากมรดก
                        </div>
			         	<div class="clearfix"></div><br/>
                <div class="col-md-12">
                  <h5>ประมาณการภาษีและค่าธรรมเนียมการขาย</h5>
                  <table class="table bg-grey2 borderless padding-top10 padding-bottom20">
                    <tr class="td-no-border">
                      <td class="padding-l20">- ค่าธรรมเนียมการทำนิติกรรม (2% ของราคาประเมิน/ราคาซื้อขายที่สูงกว่า)</td><td id="showTax1">฿<?php echo number_format($this->post->checkPost('Tax1'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- ภาษีธุรกิจเฉพาะ (3.3% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)</td><td id="showTax2">฿<?php echo number_format($this->post->checkPost('Tax2'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- อากรสแตมป์ 0.5% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน</td><td id="showTax3">
					  <?php
						if ($this->post->checkPost('Tax2')>0){
							echo "ไม่เสียเพราะจ่ายภาษีธุรกิจเฉพาะ";
						} else {
							echo "฿".number_format($this->post->checkPost('Tax3'),0,'.',',');
						}
					  ?>
					  </td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- ภาษีเงินได้บุคคลธรรมดา</td><td id="showTax4">฿<?php echo number_format($this->post->checkPost('Tax4'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- ราคาประเมิน<span id="showAssetPrice1">฿<?php echo number_format((($this->post->checkPost('AssetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span> หรือ<span id="showAssetPrice2">฿<?php echo number_format($this->post->checkPost('AssetPrice'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- ถือครองมา <span id="showOwnerYear"><?php echo $this->post->checkPost('OwnerYear');?></span>ปี หักค่าใช้จ่าย<span id="showPercentTax"><?php echo $this->post->checkPost('PercentTax');?></span>% เหลือ<span id="showTax5">฿<?php echo number_format($this->post->checkPost('Tax5'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- เงินได้เฉลี่ยต่อปี <span id="showTax6">฿<?php echo number_format($this->post->checkPost('Tax6'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td class="padding-l20">- ภาษีเงินได้ต่อปี <span id="showTax7">฿<?php echo number_format($this->post->checkPost('Tax7'),0,'.',',');?></span></td><td></td>
                    </tr>
                     <tr><td></td><td></td></tr>
                  </table>
                </div>
                
            </div>

			<hr/>
            <div class="row">
              <div class="col-md-12"><h3 class="text-primary">กำหนดค่าเช่าและเงื่อนไขการเช่า</h3></div>
              <div class="col-md-12">
                  <p class="text-primary">เพื่อป้องกันความสับสน ค่าเช่าที่ประกาศเป็นค่าเช่าที่รวมค่าใช้่จ่ายส่วนกลางแล้ว</p>
              </div>
                <div>
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

                <div class="col-md-12 padding-top10">
                         <h5><span>ค่าเช่าสุทธิที่ต้องการ* (บาท/เดือน)</span> รวมค่าใช้จ่ายส่วนกลางแล้ว</h5>
                </div>
                <div class="col-md-4">
                    <input class="form-control input-md" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value='';" onchange="changeformat2();"  value="<?php echo '฿'.number_format($this->post->checkPost('PRentPrice'),0,'.',',');?>" >
                </div>
                
                <div class="col-md-12 padding-pro3"> <p class="text-red">* อัตราค่าเช่าสุทธินี้ ไม่รวมค่าใช้จ่ายอื่นๆ ได้แก่ ค่าสาธารณูปโภค และบริการอื่นๆ เช่นเคเบิ้ลทีวี อินเตอร์เน็ท แม่บ้าน ฯลฯ ซึ่งต้องตกลงกับผู้เช่า และระบุในสัญญาให้ครบถ้วน</p>
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

          <div class="col-md-3 col-md-push-2 property-info hidden-xs">
              <div class="text-center">
                <h3 class="z-tip">ให้ราคา-ค่าใช้จ่ายครบ<div class="padding-tip-top">
     ผู้ซื้อพิจารณาง่าย</div></h3>
                 <br>
                <div class="savetime">ประหยัดเวลาขึ้น</div>
            
            
                <div><img src="/img/clock-15.png" class="img-responsive center-block"></div>
                <div id="title_panel" class="center-block display-none" style="width:85%;">
                  <br/>
                  <div><img src="/img/tip.png"></div>
                  <h2 class="z-tip"><?=$qLabel['description'][0];?></h3>
                  <h3 class="z-tip" id="title_detail"></h3>
                </div>
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
            <ul class="nav padding-top8">
              <li><a href="/zhome/changePage2/1">เริ่มต้น</a></li>
              <li><a href="/zhome/changePage2/2">พื้นฐาน</a></li>
              <li class="active"><a href="#">ตั้งราคา</a></li>
              <li><a href="/zhome/changePage2/4">รูปถ่าย</a></li>
              <li><a href="/zhome/changePage2/5">การสื่อสาร</a></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="padding-l15"><div>เหลือ <span class="green">2 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
            </ul>
           
          </aside>
          </div>
      </div>
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs">
