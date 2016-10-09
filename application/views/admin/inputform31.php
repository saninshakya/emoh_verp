<?php
$this->session->set_userdata('last_page','31');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/admin/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="3">
<input type="hidden" name="last_page" id="last_page" value="31">
<input type="hidden" name="TotalPrice" id="TotalPrice" value="<?php echo $this->post->AdminCheckPost('TotalPrice');?>">
<input type="hidden" name="HNetPrice" id="HNetPrice" value="<?php echo $this->post->AdminCheckPost('NetPrice');?>">
<input type="hidden" name="BrokerPrice" id="BrokerPrice" value="<?php echo $this->post->AdminCheckPost('BrokerPrice');?>">
<input type="hidden" name="AssetPrice" id="AssetPrice" value="<?php echo $this->post->AdminCheckPost('AssetPrice');?>">
<input type="hidden" name="TotalPriceBroker" id="TotalPriceBroker" value="<?php echo $this->post->AdminCheckPost('TotalPriceBroker');?>">
<input type="hidden" name="Tax1" id="Tax1" value="<?php echo $this->post->AdminCheckPost('Tax1');?>">
<input type="hidden" name="Tax2" id="Tax2" value="<?php echo $this->post->AdminCheckPost('Tax2');?>">
<input type="hidden" name="Tax3" id="Tax3" value="<?php echo $this->post->AdminCheckPost('Tax3');?>">
<input type="hidden" name="Tax4" id="Tax4" value="<?php echo $this->post->AdminCheckPost('Tax4');?>">
<input type="hidden" name="Tax5" id="Tax5" value="<?php echo $this->post->AdminCheckPost('Tax5');?>">
<input type="hidden" name="Tax6" id="Tax6" value="<?php echo $this->post->AdminCheckPost('Tax6');?>">
<input type="hidden" name="Tax7" id="Tax7" value="<?php echo $this->post->AdminCheckPost('Tax7');?>">
<input type="hidden" name="TotalTax" id="TotalTax" value="<?php echo $this->post->AdminCheckPost('TotalTax');?>">
<input type="hidden" name="useArea" id="useArea" value="<?php echo $this->post->AdminCheckPost('useArea');?>">
<input type="hidden" name="PercentTax" id="PercentTax" value="<?php echo $this->post->AdminCheckPost('PercentTax');?>">
<input type="hidden" name="HDepositPrice" id="HDepositPrice" value="<?php echo $this->post->AdminCheckPost('DepositPrice');?>">
<input type="hidden" name="DDepositPrice" id="DDepositPrice" value="<?php echo $this->post->AdminCheckPost('DDepositPrice');?>">
<input type="hidden" name="PRentPrice" id="PRentPrice" value="<?php echo $this->post->checkPost('PRentPrice');?>">


<div class="container">
        <div class="row">
          
          <div class="col-md-7 col-md-push-2">
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
                <h5>กำหนดราคาและการชำระเงิน</h5>
                <br>
               <div class="col-md-8">
                <h5><span id="showNetPrice">ราคาสุทธิที่ต้องการ (บาท)*</span></h5>
                <ul class="list-inline">
                  <li class="col-md-6"><input class="form-control input-md" type="text" placeholder="ราคาบาท" name="NetPrice" id="NetPrice" onclick="this.value=document.getElementById('HNetPrice').value;" onchange="updatePost('NetPrice');changeformat();"  value="<?php echo '฿'.number_format($this->post->AdminCheckPost('NetPrice'),0,'.',',');?>"></li>  
                  <li class="col-md-6 padding-top2"><span id="avg">฿<?php echo number_format((($this->post->AdminCheckPost('NetPrice'))/($this->post->AdminCheckPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></li>
                </ul>
               </div>
               <div class="col-md-4">
                  <h5>ยืนยันราคาขาย (วัน)*</h5>
                  <select class="form-control selectpicker input-md" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')">
				  <?php
					$i=30;
					while ($i<=180){
				  ?>
                    <option value="<?php echo $i;?>" <?php if ($this->post->AdminCheckPost('AgreePostDay')==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
				  <?php
					  $i=$i+30;
					}
				  ?>
                </select>
               </div>
            </div>
            
            <br>
            <!-Add New->
            <div class="row">
               <div class="col-md-8">
                 <h5>เงินทำสัญญาจะซื้อจะขาย (บาท)</h5>
                 <ul class="list-inline">
                  <li class="col-md-6"><input class="form-control input-md" type="text" placeholder="ระบุ" name="DepositPrice" id="DepositPrice" onclick="this.value=document.getElementById('HDepositPrice').value;" onchange="updatePost('DepositPrice');changeformat5();"  value="<?php echo '฿'.number_format($this->post->AdminCheckPost('DepositPrice'),0,'.',',');?>"></li>
                  <li class="col-md-6 padding-top2"><span>โอน <span id="ShowPrice"><?php echo '฿'.number_format($this->post->AdminCheckPost('DDepositPrice'),0,'.',',');?></span> บาท</span></li>
                 </ul>
               </div>
               <div class="col-md-4">
                  <h5>ต้องการโอนภายใน (วัน)</h5>
                  <input class="form-control input-md" type="text" placeholder="ระบุ" name="DayOfDeposit" id="DayOfDeposit" onchange="updatePost('DayOfDeposit')">
               </div>
            </div><br>

            <!-end new->  

            <hr/>

            <div class="row">
              <div class="col-md-12">
                   <h5>เพิ่มโอกาสในการขายด้วยนายหน้า</h5>
                    <ul class="list-inline">
                      <li class="col-md-4">
                        <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="Broker" id="Broker" <?php if ($this->post->AdminCheckPost('Broker')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('Broker');?>" onclick="changeValue('Broker');updatePost('Broker');"><p class="text-grey">ตกลง</p>
                          </label>
                        </div>
                      </li>
                      <li class="col-md-8 padding-top5"><span class="text-danger">ค่าบริการ 2.0% </span><span class="text-danger" id="showBrokerPrice">฿<?php echo number_format($this->post->AdminCheckPost('BrokerPrice'),0,'.',',');?></span></li>
                    </ul>
                    <div class="clearfix"></div>
                    <p class="text-grey">ราคาประกาศขายรวมค่านายหน้า <span class="text-green" id="showTotalPriceBroker">฿<?php echo number_format($this->post->AdminCheckPost('TotalPriceBroker'),0,'.',',');?></span> หรือ <span class="text-green" id="showTotalPriceBroker2">฿<?php echo number_format((($this->post->AdminCheckPost('TotalPriceBroker'))/($this->post->AdminCheckPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p> 
              </div>
            </div>
            <hr/>
            <div class="row">
                
                <div class="col-md-12"><h5>สถานะปัจจุบันของบ้าน/ห้องชุดที่จะขาย</div>
                <div class="col-md-4">
                         <h5 class="normal_msg" id="ShowStatusPRent">สถานะบ้าน/ห้องปัจจุบัน *</h5>
                          <select class="form-control input-md" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();" onmouseover="show_title('<?=$qLabel['residence_status_now_title'][0];?>');" onmouseout="hide_title();">
                              <option disabled selected value="3">ว่าง/มีผู้เช่า</option>
                              <option value="0" <?php if ($this->post->AdminCheckPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
                              <option value="1" <?php if ($this->post->AdminCheckPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
                          </select>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                         <h5>รายละเอียดการเช่า</h5>
                </div>
                <div class="col-md-4">
                    <h5 class="normal_msg" id="ShowPRentPrice2">ค่าเช่าสุทธิที่ได้(บาท/เดือน)</h5>
                     <input class="form-control input-md" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value=document.getElementById('PRentPrice').value;" onchange="changeformat2();" value="<?php echo '฿'.number_format($this->post->AdminCheckPost('PRentPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['residence_detail_rent_price_title'][0];?>');" onmouseout="hide_title();">               
                </div>
                <div class="col-md-4">
                         <h5>สัญชาติของผู้เช่า</h5>
                         <select class="form-control input-md" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
						 <option disabled selected>ระบุสัญชาติผู้เช่ากรณีมีผู้เช่าอยู่</option>
						  <?php
							$query=$this->post->qRentNational();
							foreach ($query->result() as $row){
								$i=$row->RNID;
								$name=$row->Name_th;
						  ?>
                              <option value="<?php echo $i;?>" <?php if ($this->post->AdminCheckPost('PRentNational')==$i){echo "selected";};?>><?php echo $name;?></option>
						  <?php
							}
						  ?>
                         </select>
                </div>
                
                <div class="col-md-4">
                         <h5>วันสิ้นสุดสัญญา</h5>
                         <input class="form-control input-md" type="text" name="PRentEnd" id="PRentEnd" onblur="setTimeout(function(){updatePost('PRentEnd')}, 500);" value="<?php echo $this->post->AdminCheckPost('PRentEnd');?>" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['residence_detail_rent_end_title'][0];?>');" onmouseout="hide_title();">
                </div>
                
              
               
                <div class="clearfix"></div>
            </div>
 			<hr/>           
            <div class="row">
           
                  <!--<div class="col-md-12"><h5><u>ประมาณการ</u>ภาษีและค่าธรรมเนียม ณ กรมที่ดิน</h5></div>-->
                  <div class="col-md-4">
                   <h5>ท่านเริ่มถือครองทรัพย์สินปีพ.ศ.</h5>
                    <select class="form-control selectpicker input-md text-grey" name="OwnerYear" id="OwnerYear" onchange="CalOwnerYear();">
                     <option value="0" selected="selected" disabled="disabled">เลือกปี</option>
					<?php
						$year=date("Y")+543;
						$i=1;
						while ($i<=10){
							if ($i!=10){
					?>
                        <option  class="text-grey" value="<?php echo $i;?>" <?php if ($this->post->AdminCheckPost('OwnerYear')==$i){echo "selected";};?> ><?php echo $year;?></option>
					<?php
							} else {
					?>
                        <option class="text-grey" value="<?php echo $i;?>" <?php if ($this->post->AdminCheckPost('OwnerYear')==$i){echo "selected";};?> ><?php echo $year;?> หรือต่ำกว่า</option>
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
                   <select class="form-control selectpicker input-md" disabled>
                          <option value="personal" <?php if ($this->post->AdminCheckPost('TOOwner')==1){echo "selected";};?>>บุคคลธรรมดา</option>
                          <option value="company" <?php if ($this->post->AdminCheckPost('TOOwner')==2){echo "selected";};?>>นิติบุคคล</option>
                   </select>
                </div>
                <div class="col-md-4">
                    
                     
                       <a target="_blank" href="http://property.treasury.go.th/pvmwebsite/"> <h5 class="padding-clear-bottom">ราคาประเมินกรมธนารักษ์ <span class="glyphicon glyphicon-globe input-sm text-left fix-glyphicon padding-clear" aria-hidden="true"></span></h5></a>
                     
              
                    <input class="form-control input-md class="padding-clear"" type="text" placeholder="อัตโนมัติ (ถ้ามีข้อมูลใน DB)"id="AssetPrice2" name="AssetPrice2" onchange="changeAssetPrice();" value="฿<?php echo number_format((($this->post->AdminCheckPost('AssetPrice'))/($this->post->AdminCheckPost('useArea'))),0,'.',','); ?>/ตร.ม." onclick="this.value='';">
                 </div>
                 <div class="col-md-4">&nbsp;</div>
               
				         
				        <div class="clearfix"></div> 
                <br/>
                <div class="col-md-12">
                  <span class="text-danger">เลือกหัวข้อด้านล่างให้ถูกต้อง</span> (เพื่อคำนวณภาษีให้ใกล้ความจริง)
                </div>
                <div class="col-md-4">
                          <div class="checkbox table-bordered padding-pro2">
                           <label>
                            <input type="checkbox" name="Inhabit" id="Inhabit" <?php if ($this->post->AdminCheckPost('Inhabit')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('Inhabit');?>" onclick="changeValue2('Inhabit');"><p> มีชื่อในทะเบียนบ้านเกิน 1 ปี</p>
                           </label>
                          </div>
                </div>
                <div class="col-md-4">
                           <div class="checkbox table-bordered padding-pro2">
                            <label>
                             <input type="checkbox" name="Inheritance" id="Inheritance" <?php if ($this->post->AdminCheckPost('Inheritance')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('Inheritance');?>" onclick="changeValue2('Inheritance');"><p> สินทรัพย์มาจากมรดก</p>
                            </label>
                           </div>
                </div>
 
                <div class="clearfix"></div> 
                <br/>
                <div class="col-md-12">
                  <h5>ประมาณการภาษีและค่าธรรมเนียมการขาย <span class="text-danger" id="showTotalTax">฿<?php echo number_format($this->post->checkPost('TotalTax'),0,'.',',');?></span></h5>
                  <table class="table bg-grey img-rounded">
                    <tr class="td-no-border">
                      <td>- ค่าธรรมเนียมการทำนิติกรรม (0.01% ของราคาประเมิน/ราคาซื้อขายที่สูงกว่า)</td><td id="showTax1">฿<?php echo number_format($this->post->AdminCheckPost('Tax1'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td>- ภาษีธุรกิจเฉพาะ (3.3% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน)</td><td id="showTax2">฿<?php echo number_format($this->post->AdminCheckPost('Tax2'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td>- อากรสแตมป์ 0.5% ของราคาซื้อขายแต่ไม่ต่ำกว่าราคาประเมิน</td><td id="showTax3">
					  <?php
						if ($this->post->AdminCheckPost('Tax2')>0){
							echo "ไม่เสียเพราะจ่ายภาษีธุรกิจเฉพาะ";
						} else {
							echo "฿".number_format($this->post->AdminCheckPost('Tax3'),0,'.',',');
						}
					  ?>
					  </td>
                    </tr>
                    <tr>
                      <td>- ภาษีเงินได้บุคคลธรรมดา</td><td id="showTax4">฿<?php echo number_format($this->post->AdminCheckPost('Tax4'),0,'.',',');?></td>
                    </tr>
                    <tr>
                      <td>- ราคาประเมิน <span id="showAssetPrice1">฿<?php echo number_format((($this->post->AdminCheckPost('AssetPrice'))/($this->post->AdminCheckPost('useArea'))),0,'.',','); ?> /ตร.ม.</span> หรือ <span id="showAssetPrice2">฿<?php echo number_format($this->post->AdminCheckPost('AssetPrice'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td>- ถือครองมา <span id="showOwnerYear"><?php echo $this->post->AdminCheckPost('OwnerYear');?></span> ปี หักค่าใช้จ่าย <span id="showPercentTax"><?php echo $this->post->AdminCheckPost('PercentTax');?></span>% เหลือ <span id="showTax5">฿<?php echo number_format($this->post->AdminCheckPost('Tax5'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td>- เงินได้เฉลี่ยต่อปี <span id="showTax6">฿<?php echo number_format($this->post->AdminCheckPost('Tax6'),0,'.',',');?></span></td><td></td>
                    </tr>
                    <tr>
                      <td>- ภาษีเงินได้ต่อปี <span id="showTax7">฿<?php echo number_format($this->post->AdminCheckPost('Tax7'),0,'.',',');?></span></td><td></td>
                    </tr>
                  </table>
                </div>
                
            </div>
              
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
                      <div class="display-none">
                        <hr/>
                        <div><img src="/img/tip-of-the-day.png" class="img-responsive center-block"></div>
                        <h5>ราคาประกาศขาย</h5>
                        <div class="col-md-12">
                            Z HOME กำหนดให้ราคาปรtกาศขาย
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
              <li><a>เริ่มต้น</a></li>
              <li><a>พื้นฐาน</a></li>
              <li class="active"><a>ตั้งราคา</a></li>
              <li><a>รูปถ่าย</a></li>
              <li><a>การสื่อสาร</a></li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li>&nbsp;</li>
              <li class="padding-l15"><div>เหลือ <span class="green">2 ขั้นตอน</span><br> เพื่อลงประกาศ</div></li>
            </ul>
          </aside>
          </div>
      </div>
    </div>
    <img src="/img/zhometable.png" class="img-responsive center-block ztable-image hidden-xs display-none">
