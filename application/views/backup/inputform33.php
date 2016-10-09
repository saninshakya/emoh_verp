<?php
$this->session->set_userdata('last_page','33');
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
<input type="hidden" name="RRentPrice" id="RRentPrice" value="<?php echo $this->post->checkPost('RRentPrice');?>">

<div class="container">
        <div class="row">
          
          <div class="col-md-7 col-md-push-2">
            <h3 class="text-primary">ตั้งราคาขายพร้อมผู้เช่า</h3>
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
				          <div class="col-md-4">
                           <input type="checkbox" name="Inhabit" id="Inhabit" <?php if ($this->post->checkPost('Inhabit')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Inhabit');?>" onclick="changeValue2('Inhabit');">มีชื่ออยู่ในทะเบียนบ้านเกิน 1ปี
                        </div>
				          <div class="col-md-4">
                           <input type="checkbox" name="Inheritance" id="Inheritance" <?php if ($this->post->checkPost('Inheritance')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Inheritance');?>" onclick="changeValue2('Inheritance');">สินทรัพย์มาจากมรดก
                        </div>
				<br/>
                <div class="col-md-12">
                  <h5>ประมาณการภาษีและค่าธรรมเนียมการขาย</h5>
                  <table class="table bg-grey img-rounded">
                    <tr class="td-no-border">
                      <td>- ค่าธรรมเนียมการทำนิติกรรม (2% ของราคาประเมิน/ราคาซื้อขายที่สูงกว่า)</td><td id="showTax1">฿<?php echo number_format($this->post->checkPost('Tax1'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td>- ภาษีธุรกิจเฉพาะ (3.3% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)</td><td id="showTax2">฿<?php echo number_format($this->post->checkPost('Tax2'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td>- อากรสแตมป์ 0.5% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน</td><td id="showTax3">
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
                      <td>- ภาษีเงินได้บุคคลธรรมดา</td><td id="showTax4">฿<?php echo number_format($this->post->checkPost('Tax4'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td>- ราคาประเมิน<span id="showAssetPrice1">฿<?php echo number_format((($this->post->checkPost('AssetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span> หรือ<span id="showAssetPrice2">฿<?php echo number_format($this->post->checkPost('AssetPrice'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td>- ถือครองมา <span id="showOwnerYear"><?php echo $this->post->checkPost('OwnerYear');?></span>ปี หักค่าใช้จ่าย<span id="showPercentTax"><?php echo $this->post->checkPost('PercentTax');?></span>% เหลือ<span id="showTax5">฿<?php echo number_format($this->post->checkPost('Tax5'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td>- เงินได้เฉลี่ยต่อปี <span id="showTax6">฿<?php echo number_format($this->post->checkPost('Tax6'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td>- ภาษีเงินได้ต่อปี <span id="showTax7">฿<?php echo number_format($this->post->checkPost('Tax7'),0,'.',',');?></span></td><td></td>
                    </tr>
                  </table>
                </div>
                
            </div>
			<hr/>

            <div class="row">
              <div class="col-md-12"><h3 class="text-primary">รายละเอียดสัญญาเช่า</h3></div>
                <div class="col-md-12">
                  <div class="col-md-4">
                         <h5>คู่สัญญา</h5>
                          <select class="form-control input-md" name="RRentID" id="RRentID" onchange="updatePost('RRentID');">
						  <?php
							$query=$this->post->qTOOwner();
							foreach ($query->result() as $row){
								$i=$row->TOOID;
								$name=$row->TOOName_th;
						  ?>
                              <option value="<?php echo $i;?>" <?php if ($this->post->checkPost('RRentID')==$i){echo "selected";};?>><?php echo $name;?></option>
						  <?php
							}
						  ?>
                          </select>
                  </div>
                  <div class="col-md-4">
                         <h5>สัญชาติของผู้เช่า</h5>
                         <select class="form-control input-md" name="RRentNational" id="RRentNational" onchange="updatePost('RRentNational');">
						  <?php
							$query=$this->post->qRentNational();
							foreach ($query->result() as $row){
								$i=$row->RNID;
								$name=$row->Name_th;
						  ?>
                              <option value="<?php echo $i;?>" <?php if ($this->post->checkPost('RRentNational')==$i){echo "selected";};?>><?php echo $name;?></option>
						  <?php
							}
						  ?>
                         </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="col-md-4">
                         <h5>ระยะเวลาของสัญญา</h5>
                          <select class="form-control input-md" name="RRentYear" id="RRentYear" onchange="updatePost('RRentYear');">
						  <?php
							$i=1;
							while ($i<=5){
								$name=$i." ปี";
						  ?>
                              <option value="<?php echo $i;?>" <?php if ($this->post->checkPost('RRentYear')==$i){echo "selected";};?>><?php echo $name;?></option>
						  <?php
							  $i++;
							}
						  ?>
                          </select>
                  </div>
                  <div class="col-md-4">
                         <h5>วันเริ่มต้นสัญญา</h5>
                         <input class="form-control input-md" type="text" id="RRentStart" onblur="setTimeout(function(){updatePost('RRentStart')}, 500);" value="<?php echo $this->post->checkPost('RRentStart');?>">
                  </div>
                  <div class="col-md-4">
                         <h5>วันสิ้นสุดสัญญา</h5>
                         <input class="form-control input-md" type="text" id="RRentEnd" onblur="setTimeout(function(){updatePost('RRentEnd')}, 500);" value="<?php echo $this->post->checkPost('RRentEnd');?>">
                  </div>
                  <div class="col-md-12">
                         <h5><span class="text-green">ค่าเช่าสุทธิที่ต้องการ* (บาท/เดือน)</span> รวมค่าใช้จ่ายส่วนกลางแล้ว</h5>
                  </div>
                  <div class="col-md-4">
                    <input class="form-control input-md" type="text" id="showRRentPrice" name="showRRentPrice" onclick="this.value='';" onchange="changeformat2();"  value="<?php echo '฿'.number_format($this->post->checkPost('RRentPrice'),0,'.',',');?>" >
                  </div>
                
                  <div class="col-md-12 bg-grey padding-pro3"> <p>* อัตราค่าเช่าสุทธินี้ ไม่รวมค่าใช้จ่ายอื่นๆ ได้แก่ ค่าสาธารณูปโภค และบริการอื่นๆ เช่นเคเบิ้ลทีวี อินเตอร์เน็ท แม่บ้าน ฯลฯ ซึ่งต้องตกลงกับผู้เช่า และระบุในสัญญาให้ครบถ้วน</p>
                  </div>
                  <div class="col-md-12">
                    <h5> ผู้เช่าสามารถย้ายของก่อนหมดสัญญาเช่าได้โดยไม่ยึดเงินมัดจำ</h5>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control input-md" name="RRentMove" id="RRentMove" onchange="updatePost('RRentMove');">
                              <option value="1" <?php if ($this->post->checkPost('RRentMove')==1){echo "selected";};?>>ใช่</option>
                              <option value="0" <?php if ($this->post->checkPost('RRentMove')==0){echo "selected";};?>>ไม่</option>
                     </select>
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
