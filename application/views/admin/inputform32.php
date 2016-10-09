<?php
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/admin/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="5">
<input type="hidden" name="last_page" id="last_page" value="32">
<input type="hidden" name="DTotalPrice" id="DTotalPrice" value="<?php echo $this->post->AdminCheckPost('DTotalPrice');?>">
<input type="hidden" name="DNetPrice" id="DNetPrice" value="<?php echo $this->post->AdminCheckPost('DNetPrice');?>">
<input type="hidden" name="DProfitPrice" id="DProfitPrice" value="<?php echo $this->post->AdminCheckPost('DProfitPrice');?>">
<input type="hidden" name="DChangeContractPrice" id="DChangeContractPrice" value="<?php echo $this->post->AdminCheckPost('DChangeContractPrice');?>">
<input type="hidden" name="DBrokerPrice" id="DBrokerPrice" value="<?php echo $this->post->AdminCheckPost('DBrokerPrice');?>">
<input type="hidden" name="DBrokerTotalPrice" id="DBrokerTotalPrice" value="<?php echo $this->post->AdminCheckPost('DBrokerTotalPrice');?>">
<input type="hidden" name="DDownTotalPrice" id="DDownTotalPrice" value="<?php echo $this->post->AdminCheckPost('DDownTotalPrice');?>">
<input type="hidden" name="DBookPrice" id="DBookPrice" value="<?php echo $this->post->AdminCheckPost('DBookPrice');?>">
<input type="hidden" name="DContractPrice1" id="DContractPrice1" value="<?php echo $this->post->AdminCheckPost('DContractPrice1');?>">
<input type="hidden" name="DContractPrice2" id="DContractPrice2" value="<?php echo $this->post->AdminCheckPost('DContractPrice2');?>">
<input type="hidden" name="DContractPrice3" id="DContractPrice3" value="<?php echo $this->post->AdminCheckPost('DContractPrice3');?>">
<input type="hidden" name="DDownPrice" id="DDownPrice" value="<?php echo $this->post->AdminCheckPost('DDownPrice');?>">
<input type="hidden" name="DTransfer" id="DTransfer" value="<?php echo $this->post->AdminCheckPost('DTransfer');?>">
<input type="hidden" name="DDownPaymentReady" id="DDownPaymentReady" value="<?php echo $this->post->AdminCheckPost('DDownPaymentReady');?>">
<input type="hidden" name="DReadyPayment" id="DReadyPayment" value="<?php echo $this->post->AdminCheckPost('DReadyPayment');?>">
<input type="hidden" name="DStalePayment" id="DStalePayment" value="<?php echo $this->post->AdminCheckPost('DStalePayment');?>">
<input type="hidden" name="DTransferPayment" id="DTransferPayment" value="<?php echo $this->post->AdminCheckPost('DTransferPayment');?>">
<input type="hidden" name="DAllPayment" id="DAllPayment" value="<?php echo $this->post->AdminCheckPost('DAllPayment');?>">

<input type="hidden" name="useArea" id="useArea" value="<?php echo $this->post->AdminCheckPost('useArea');?>">
<input type="hidden" name="terraceArea" id="terraceArea" value="<?php echo $this->post->AdminCheckPost('terraceArea');?>">
<?php
	$totalArea=($this->post->AdminCheckPost('useArea'))+($this->post->AdminCheckPost('terraceArea'));
	$PricePerSq=$this->post->AdminCheckPost('PricePerSq');
?>
<input type="hidden" name="totalArea" id="totalArea" value="<?php echo $totalArea;?>">
<input type="hidden" name="PricePerSq" id="PricePerSq" value="<?php echo $PricePerSq;?>">
<div class="container">
        <div class="row">
          
            <div class="col-md-7 col-md-push-2">
              <h3 class="text-primary">ตั้งราคาขายดาวน์</h3>
                <p class="text-primary big2">การขายดาวน์ควรบอกรายละเอียดการผ่อนชำระ และค่าใช้จ่ายตามสัญญาให้ครบถ้วน<br>- ราคาขาย = ราคาที่ซื้อมาจากโครงการ + กำไรที่ต้องการ<br>- ราคาขายดาวน์ = เงินที่จ่ายโครงการแล้วทั้งหมด + กำไรที่เต้องการ<br>- ผ่อนดาวน์ต่อกับโครงการ =  เงินที่ต้องผ่อนโครงการต่อก่อนสร้างเสร็จ<br>- เงินโอน = เงินที่ต้องจ่ายโครงการเมื่อสร้างเสร็จและโอนที่กรมที่ดิน</p>
              <hr>
              <div class="row">
                 
            					<div class="col-md-12"><h5>สรุปรายละเอียดการขายใบจองหรือขายดาวน์</h5></div>
            					<div class="col-md-8">ราคาขาย</div>
            				
            					<div class="col-md-4">
            				    	<p><span class="text-green" id="showDTotalPrice">฿<?php echo number_format($this->post->AdminCheckPost('DTotalPrice'),0,'.',',');?></span> (<span class="text-green" id="showPricePerSq">฿<?php echo number_format($PricePerSq,0,'.',',');?></span>/ตร.ม.)</p>
            					</div>
  				      
			       </div>
        <div class="row">
            
                	<div class="col-md-8">
    					         - มูลค่าขายดาวน์ (รวมค่าเปลี่ยนสัญญา ถ้ามี)
    				      </div>
				          <div class="col-md-4">
					         <p><span class="text-green" id="showDDownTotalPrice">฿<?php echo number_format($this->post->AdminCheckPost('DDownTotalPrice'),0,'.',',');?></span></p>
				         </div>
			      
			  </div>
        <div class="row">
           
               <div class="col-md-8">- ผ่อนดาวน๋กับโครงการอีก</div>
            	 <div class="col-md-4">
                  <p><span class="text-green" id="showDStalePayment2">฿<?php echo number_format($this->post->AdminCheckPost('DStalePayment'),0,'.',',');?></span> (<span class="text-green" id="showDStalePaymentMonth"><?php echo  $this->post->AdminCheckPost('DStalePaymentMonth');?></span> งวด)</p>
               </div>
				  
        </div>
				
			
       <div class="row">
            
               <div class="col-md-8">- โอนกรรมสิทธิ ณ กรมที่ดิน</div>
            
				
		           <div class="col-md-4">
				        	<p><span class="text-green" id="showDTransferPayment2">฿<?php echo number_format($this->post->AdminCheckPost('DTransferPayment'),0,'.',',');?></span></p>
				       </div>
			      
       </div>
			

			<hr>
			<div class="row">
               <div class="col-md-8">
                 <h5 id="showDNetPrice9">ราคาที่ซื้อจากโครงการ(บาท)*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="หักส่วนลดแล้ว" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm  padding-clear" aria-hidden="true"></span></a></h5>
                 <div class="col-md-6" style="padding-left:0;">
                   <input class="form-control input-md" type="text" name="showDNetPrice" id="showDNetPrice" value="฿<?php echo number_format($this->post->AdminCheckPost('DNetPrice'),0,'.',',');?>" onclick="this.value=document.getElementById('DNetPrice').value" onchange="changeFormat('showDNetPrice','DNetPrice');calDAllPayment();setTimeout(function(){calDTotalPrice()}, 100);"  OnKeyPress="return chkNumber(this)">
                 </div>
                 <div class="col-md-6"></div>

               
               </div>
              
               <div class="col-md-4">
                <h5 id="showAgreePostDay9">ยืนยันราคาขาย(วัน)*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ไม่ขึ้นราคาเมื่อมีผู้โทรมาสอบถาม" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm  padding-clear" aria-hidden="true"></span></a></h5>
                <select class="form-control selectpicker input-md" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')">
					<option value=0 disabled selected>โปรดเลือก</option>
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
            <br/> 
            <div class="row">
               <div class="col-md-4">
                 <h5  id="showPrefixDProfitPrice9">ต้องการกำไร/ขาดทุน*</h5>
                   <select class="form-control selectpicker input-md" name="PrefixDProfitPrice" id="PrefixDProfitPrice" onchange="updatePost('PrefixDProfitPrice');calDTotalPrice();">
						  <option value="3" disabled selected>โปรดเลือก</option>
                          <option value="1" <?php if ($this->post->AdminCheckPost('PrefixDProfitPrice')==1){echo "selected";};?>>ต้องการกำไร</option>
                          <option value="0" <?php if ($this->post->AdminCheckPost('PrefixDProfitPrice')==0){echo "selected";};?>>ยอมขาดทุน</option>
						  <option value="2" <?php if ($this->post->AdminCheckPost('PrefixDProfitPrice')==2){echo "selected";};?>>ขายเท่าทุน</option>
                   </select>  
               </div>
               <div class="col-md-4">
                 <h5 id="showDProfitPrice9">กำไร/ขาดทุนที่ต้องการ(บาท)*</h5>
                 <input class="form-control input-md" type="text" name="showDProfitPrice" id="showDProfitPrice" value="฿<?php echo number_format($this->post->AdminCheckPost('DProfitPrice'),0,'.',',');?>" onclick="this.value=document.getElementById('DProfitPrice').value" onchange="changeFormat('showDProfitPrice','DProfitPrice');calDAllPayment();setTimeout(function(){calDTotalPrice()}, 100);" OnKeyPress="return chkNumber(this)">
               </div>
            </div>
            <br/>
            <div class="row">
               <div class="col-md-4">
                 <h5>ค่าธรรมเนียมเปลี่ยนสัญญา<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="ไม่ต้องระบุหากสามารถนำไปลดงวดโอนได้" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm padding-clear" aria-hidden="true"></span></a></h5>
                 <input class="form-control input-md" type="text" name="showDChangeContractPrice" id="showDChangeContractPrice" value="฿<?php echo number_format($this->post->AdminCheckPost('DChangeContractPrice'),0,'.',',');?>" onclick="this.value=document.getElementById('DChangeContractPrice').value" onchange="changeFormat('showDChangeContractPrice','DChangeContractPrice');setTimeout(function(){calDTotalPrice()}, 100);" OnKeyPress="return chkNumber(this)">
               </div>
               <div class="col-md-8 padding-top8">
                 <div>(กฎหมายห้ามไม่ให้โครงการเก็บ แต่ควรตรวจสอบสัญญาอีกครั้ง)</div>
               </div>
            </div>    
               
            <br>
            
            <hr/>
            <div class="row">
              <div class="col-md-12">
                   <h5>ต้องการใช้บริการนายหน้า</h5>
                    <ul class="list-inline">
                      <li>
                        <div class="checkbox table-bordered padding-pro4">
                          <label>
						   <input type="checkbox" name="DBroker" id="DBroker" <?php if ($this->post->AdminCheckPost('DBroker')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('DBroker');?>" onclick="changeValue('DBroker');updatePost('DBroker');">
						   <p class="text-grey">ยืนยันให้นายหน้าช่วยขาย</p>
                          </label>
                        </div>
                      </li>
                      <li><div style="margin-left:16px;"><span class="text-danger">ค่าบริการ 2.0%</span><span class="text-danger" id="showDBrokerPrice">฿<?php echo number_format($this->post->AdminCheckPost('DBrokerPrice'),0,'.',',');?></span></div></li>
                    </ul>
                    <p class="text-grey">ราคาขายรวมค่านายหน้า <span class="text-green" id="showDBrokerTotalPrice">฿<?php echo number_format($this->post->AdminCheckPost('DBrokerTotalPrice'),0,'.',',');?></span>
              </div>
            </div>
            <hr/>
			<div class="row">
             
          <div class="col-md-12"><h5>การชำระเงินทำสัญญาและเงินดาวน์</h5></div>
          <div class="clearfix"></div><br>
				  <div class="col-md-12">
				      <h5 id="showDAllPayment9">เงินจอง ทำสัญญา ดาวน์(บาท)*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="รวมเงินจอง ทำสัญญา ผ่อนดาวน์ที่ต้องชำระกับโครงการทั้งหมดไม่รวมโอน" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm padding-clear" aria-hidden="true"></span></a></h5>
          </div>
          <br>
          <div class="col-md-4">
                <input class="form-control input-md" type="text" name="showDAllPayment" id="showDAllPayment" value="฿<?php echo number_format($this->post->AdminCheckPost('DAllPayment'),0,'.',',');?>" onclick="this.value=document.getElementById('DAllPayment').value" onchange="changeFormat('showDAllPayment','DAllPayment');calDAllPayment();setTimeout(function(){calDDownTotalPrice()}, 100);showDTransferPayment2();" OnKeyPress="return chkNumber(this)">
         </div>
              <div class="col-md-4" id="showDTransferPayment3" style="padding-top:8px;">
                <span> <?php if($this->post->AdminCheckPost('DTransferPayment')!=0){?>
          ยอดโอน ฿<?=number_format($this->post->AdminCheckPost('DTransferPayment'),0,'.',',');?></span>
        <?php } else {echo "&nbsp;";};?>
              </div>
             
       
				 
				  
			</div>
      <br>
			<div class="row">
                  <div class="col-md-4">
                   <h5 id="showDReadyPayment9">ชำระแล้ว(บาท)*<a class="tip" href="#" data-toggle="tooltip" data-placement="top" data-original-title="เงินจอง+ทำสัญญา+ผ่อนดาวน์ที่จ่ายไปแล้ว" ><span class="glyphicon glyphicon-info-sign text-turq2 input-sm padding-clear" aria-hidden="true"></span></a></h5>
                   <input class="form-control input-md" type="text" name="showDReadyPayment" id="showDReadyPayment" value="฿<?php echo number_format($this->post->AdminCheckPost('DReadyPayment'),0,'.',',');?>" onclick="this.value=document.getElementById('DReadyPayment').value" onchange="changeFormat('showDReadyPayment','DReadyPayment');setTimeout(function(){calDDownTotalPrice()}, 100);" OnKeyPress="return chkNumber(this)">
                  </div>
				          <div class="col-md-4">
                      
                      <div id="showDStalePayment" class="padding-top38">
                       <?php
            						if ($this->post->AdminCheckPost('DStalePayment')!=0){
            					?>
            						เหลือผ่อนดาวน์ ฿<?=number_format($this->post->AdminCheckPost('DStalePayment'),0,'.',',');?>
            					<?};?>
                      </div>   
                  </div>
                  <div class="col-md-4">
                   <h5>ประวัติการชำระ</h5>
                   <select class="form-control selectpicker input-md" name="HistoryDPayment" id="HistoryDPayment" onchange="updatePost('HistoryDPayment');">
                          <option value="0" <?php if ($this->post->AdminCheckPost('HistoryDPayment')==0){echo "selected";};?>>ชำระตรงตามเวลา</option>
                          <option value="1" <?php if ($this->post->AdminCheckPost('HistoryDPayment')==1){echo "selected";};?>>ชำระล่าช้าไม่เกิน 1 เดือน</option>
                          <option value="2" <?php if ($this->post->AdminCheckPost('HistoryDPayment')==2){echo "selected";};?>>ค้างชำระ</option>
                   </select>                  
                  </div>
			</div>
      <br>
			<div class="row">
				   <div class="col-md-4">
                   <h5 id="showDStalePaymentMonth9">เหลือผ่อนดาวน์อีก(งวด)*</h5>
                   <input class="form-control input-md" type="text" name="DStalePaymentMonth" id="DStalePaymentMonth" value="<?php echo $this->post->AdminCheckPost('DStalePaymentMonth');?>" onchange="updatePost('DStalePaymentMonth');showDStalePaymentMonth();"  OnKeyPress="return chkNumber(this)" >
                  </div>
			</div>
			<div class="row">
                  <div class="col-md-4">
                   <input class="form-control input-md" type="hidden" name="showDTransferPayment" id="showDTransferPayment" value="฿<?php echo number_format($this->post->AdminCheckPost('DTransferPayment'),0,'.',',');?>" onclick="this.value=''" onchange="changeFormat('showDTransferPayment','DTransferPayment');setTimeout(function(){calDDownTotalPrice()}, 100);showDTransferPayment2();">
                  </div>
			</div>
      <br>
			<hr/>
            
            <div class="row">
           
                  <div class="col-md-12"><h5>โปรโมชั่นที่ได้รับจากโครงการ</h5></div>
                  <div class="clearfix"></div>
                  <br>
                  <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro4">
                          <label>
                           <input type="checkbox" name="DFreeTransfer" id="DFreeTransfer" <?php if ($this->post->AdminCheckPost('DFreeTransfer')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('DFreeTransfer');?>" onclick="changeValue2('DFreeTransfer');"><p class="text-grey">ฟรีค่าธรรมเนียมการโอน</p>
                          </label>
                    </div>
                     <div style="padding-top:36px"></div>
                    <div class="checkbox table-bordered padding-pro6">
                          <label>
                           <input type="checkbox" name="DFreeMember" id="DFreeMember" <?php if ($this->post->AdminCheckPost('DFreeMember')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('DFreeMember');?>" onclick="changeValue2('DFreeMember');"><div class="text-grey">ฟรีเงินกองทุนนิติบุคคลฯ</div>
                          </label>
                    </div>
                    <div style="padding-top:8px; padding-bottom:11px;"><h5 class="padding-clear">เฟอร์นิเจอร์</h5></div>
                    <input class="form-control input-md" type="text" placeholder="ระบุ"name="DFreeFurniture" id="DFreeFurniture"  value="<?php echo $this->post->AdminCheckPost('DFreeFurniture');?>" onchange="updatePost('DFreeFurniture');">
                    <h5 class="padding-top5">อื่นๆ</h5>
                    <input class="form-control input-md" type="text" placeholder="ระบุ"name="DFreeETC" id="DFreeETC"  value="<?php echo $this->post->AdminCheckPost('DFreeETC');?>" onchange="updatePost('DFreeETC');">
                  </div>


                  <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="DFreeContract" id="DFreeContract" <?php if ($this->post->AdminCheckPost('DFreeContract')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('DFreeContract');?>" onclick="changeValue2('DFreeContract');"><p class="text-grey">ฟรีค่าจดจำนอง</p>
                          </label>
                    </div>

                    <div style="padding-top:7px"><h5>ฟรีค่าส่วนกลาง</h5></div>
                    <select class="form-control selectpicker input-md" name="DFreeFeeMember" id="DFreeFeeMember" onchange="updatePost('DFreeFeeMember');">
				   <?php
						$i=0;
						while ($i<=10){
				   ?>
                          <option value="<?php echo $i;?>" <?php if ($this->post->AdminCheckPost('DFreeFeeMember')==$i){echo "selected";};?>><?php echo $i;?>ปี</option>
				   <?php
							$i++;
						}
				   ?>
                    </select>
                    <br/>
                    <p class="margin-top11"><h5>เครื่องใช้ไฟฟ้า</h5></p>
                    <input class="form-control input-md" type="text" placeholder="ระบุ"name="DFreeElectric" id="DFreeElectric"  value="<?php echo $this->post->AdminCheckPost('DFreeElectric');?>" onchange="updatePost('DFreeElectric');">       
                  </div>
                  <div class="col-md-4">
                    <div class="checkbox table-bordered padding-pro2">
                          <label>
                           <input type="checkbox" name="DFreeMeter" id="DFreeMeter" <?php if ($this->post->AdminCheckPost('DFreeMeter')=='1'){echo "Checked";};?> value="<?php echo $this->post->AdminCheckPost('DFreeMeter');?>" onclick="changeValue2('DFreeMeter');"><p class="text-grey">เงินประกันมิเตอร์ น้ำ/ไฟ</p>
                          </label>
                    </div>
                     <div style="padding-top:7px"><h5>ส่วนลดจากโครงการ (บาท)</h5></div>
                    <input class="form-control input-md" type="text" placeholder="ระบุ"name="DDiscount" id="DDiscount"  value="<?php echo $this->post->AdminCheckPost('DDiscount');?>" onchange="updatePost('DDiscount');">
                         
                    <h5 style="margin-bottom:0px; padding-bottom:10px; padding-top:10px;">Voucher</h5>
                    <input class="form-control input-md" type="text" placeholder="ระบุ"name="DFreeVoucher" id="DFreeVoucher"  value="<?php echo $this->post->AdminCheckPost('DFreeVoucher');?>" onchange="updatePost('DFreeVoucher');">
                  </div>                 
            </div>
            <br>
			</hr>
			<hr>
            <!-- <div class="row">
                  <div class="col-md-12"><h5>แสดงเบอร์โทรฟรีเพิ่ม 1 สัปดาห์ เพียงกรอกข้อมูลด้านล่าง (เพิ่มเติมภายหลังได้)</h5></div>
                  <div class="col-md-4">
                   <p>จอง (บาท)</p>
                   <input class="form-control input-md" type="text" name="showDBookPrice" id="showDBookPrice" value="฿<?php echo number_format($this->post->AdminCheckPost('DBookPrice'),0,'.',',');?>" onclick="this.value=''" onchange="changeFormat('showDBookPrice','DBookPrice');">
                  </div>
                  <div class="col-md-4">
                   <p>วันที่</p>
                   <input class="form-control input-md" type="text" name="DBookDate" id="DBookDate" onblur="setTimeout(function(){updatePost('DBookDate')}, 500);" value="<?php echo $this->post->AdminCheckPost('DBookDate');?>">
                  </div>
                  <div class="col-md-4">
                   <p>สถานะการชำระ</p>
                   <select class="form-control input-md" name="DBookStatus" id="DBookStatus" onchange="updatePost('DBookStatus');setTimeout(function(){calDDownTotalPrice()}, 100);">
                          <option value="1" <?php if ($this->post->AdminCheckPost('DBookStatus')==1){echo "selected";};?>>ชำระแล้ว</option>
                          <option value="0" <?php if ($this->post->AdminCheckPost('DBookStatus')==0){echo "selected";};?>>ยังไม่ชำระ</option>
                   </select>                  
                  </div>

                  <div class="col-md-4">
                   <p>ทำสัญญางวดที่ 1 (บาท)</p>
                   <input class="form-control input-md" type="text" name="showDContractPrice1" id="showDContractPrice1" value="฿<?php echo number_format($this->post->AdminCheckPost('DContractPrice1'),0,'.',',');?>" onclick="this.value=''" onchange="changeFormat('showDContractPrice1','DContractPrice1');">
                  </div>
                  <div class="col-md-4">
                   <p>วันที่</p>
                   <input class="form-control input-md" type="text" name="DContractDate1" id="DContractDate1" onblur="setTimeout(function(){updatePost('DContractDate1')}, 500);" value="<?php echo $this->post->AdminCheckPost('DContractDate1');?>">
                  </div>
                  <div class="col-md-4">
                   <p>สถานะการชำระ</p>
                   <select class="form-control input-md" name="DContractStatus1" id="DContractStatus1" onchange="updatePost('DContractStatus1');">
                          <option value="1" <?php if ($this->post->AdminCheckPost('DContractStatus1')==1){echo "selected";};?>>ชำระแล้ว</option>
                          <option value="0" <?php if ($this->post->AdminCheckPost('DContractStatus1')==0){echo "selected";};?>>ยังไม่ชำระ</option>
                   </select>                  
                  </div>
                  <div class="col-md-4">
                   <p>ทำสัญญางวดที่ 2 (บาท)</p>
                   <input class="form-control input-md" type="text" name="showDContractPrice2" id="showDContractPrice2" value="฿<?php echo number_format($this->post->AdminCheckPost('DContractPrice2'),0,'.',',');?>" onclick="this.value=''" onchange="changeFormat('showDContractPrice2','DContractPrice2');">
                  </div>
                  <div class="col-md-4">
                   <p>วันที่ ถ้ามี</p>
                   <input class="form-control input-md" type="text" name="DContractDate2" id="DContractDate2" onblur="setTimeout(function(){updatePost('DContractDate2')}, 500);" value="<?php echo $this->post->AdminCheckPost('DContractDate2');?>">
                  </div>
                  <div class="col-md-4">
                   <p>สถานะการชำระ ถ้ามี</p>
                   <select class="form-control input-md" name="DContractStatus2" id="DContractStatus2" onchange="updatePost('DContractStatus2');">
                          <option value="1" <?php if ($this->post->AdminCheckPost('DContractStatus2')==1){echo "selected";};?>>ชำระแล้ว</option>
                          <option value="0" <?php if ($this->post->AdminCheckPost('DContractStatus2')==0){echo "selected";};?>>ยังไม่ชำระ</option>
                   </select>                  
                  </div>
                  <div class="col-md-4">
                   <p>ทำสัญญางวดที่ 3 (บาท)</p>
                   <input class="form-control input-md" type="text" name="showDContractPrice3" id="showDContractPrice3" value="฿<?php echo number_format($this->post->AdminCheckPost('DContractPrice3'),0,'.',',');?>" onclick="this.value=''" onchange="changeFormat('showDContractPrice3','DContractPrice3');">
                  </div>
                  <div class="col-md-4">
                   <p>วันที่ ถ้ามี</p>
                   <input class="form-control input-md" type="text" name="DContractDate3" id="DContractDate3" onblur="setTimeout(function(){updatePost('DContractDate3')}, 500);" value="<?php echo $this->post->AdminCheckPost('DContractDate3');?>">
                  </div>
                  <div class="col-md-4">
                   <p>สถานะการชำระ ถ้ามี</p>
                   <select class="form-control input-md" name="DContractStatus3" id="DContractStatus3" onchange="updatePost('DContractStatus3');">
                          <option value="1" <?php if ($this->post->AdminCheckPost('DContractStatus3')==1){echo "selected";};?>>ชำระแล้ว</option>
                          <option value="0" <?php if ($this->post->AdminCheckPost('DContractStatus3')==0){echo "selected";};?>>ยังไม่ชำระ</option>
                   </select>                  
                  </div>
            </div>
            <hr/>
          
            <div class="row">
                  <div class="col-md-12"><h5>การผ่อนดาวน์</h5></div>
                  <div class="col-md-4">
                   <p>จำนวนงวดที่ผ่อนดาวน์</p>
                   <input type="text" class="form-control input-md" name="DDownSeparatePayment" id="DDownSeparatePayment" onchange="updatePost('DDownSeparatePayment');" value="<?=$this->post->AdminCheckPost('DDownSeparatePayment')?>" >
                  </div>
                  <div class="col-md-4">
                   <p>&nbsp;</p>
				  </div>
                  <div class="col-md-4">
                   <p>&nbsp;</p>
				  </div>
			</div>
			<input type="hidden" id="ddownSpayHid" name="ddownSpayHid" value="">
<?php
	$i=1;
	$Total=$this->post->AdminCheckPost('DDownSeparatePayment');
	while ($i<=$Total){
?>
            <div class="row" id="ddownSPay<?php echo $i; ?>">
                  <div class="col-md-4">
                   <p>ผ่อนดาวน์งวดที่ <?=$i?> (บาท)</p>
                   <input type="text" class="form-control input-md" name="DP<?=$i?>" id="DP<?=$i?>" value="฿<?php echo number_format($this->post->checkPostDCondo('DP'.$i),0,'.',',');?>" onclick="this.value=''" onchange="updatePostDCondo('DP<?=$i?>');setTimeout(function(){changeFormat5('DP<?=$i?>')}, 100);">

                  </div>
                  <div class="col-md-4">
                   <p>วันที่</p>
                   <input class="form-control input-md" type="text" name="DD<?=$i?>" id="DD<?=$i?>" onblur="setTimeout(function(){updatePostDCondo('DD<?=$i?>')}, 500);" value="<?=$this->post->checkPostDCondo('DD'.$i);?>">
                  </div>
				   <div class="col-md-4">
                   <p>ประวัติการชำระ</p>
                   <select class="form-control input-md" name="DH<?=$i?>" id="DH<?=$i?>" onchange="updatePostDCondo('DH<?=$i?>');">
						  <option value="0" <?php if ($this->post->checkPostDCondo('DH'.$i)=='0'){echo "selected";};?>>ยังไม่ถึงกำหนดชำระ</option>	
                          <option value="1" <?php if ($this->post->checkPostDCondo('DH'.$i)=='1'){echo "selected";};?>>ชำระตรงเวลา</option>
                          <option value="2" <?php if ($this->post->checkPostDCondo('DH'.$i)=='2'){echo "selected";};?>>ชำระล่าช้าเล็กน้อย</option>
                          <option value="3" <?php if ($this->post->checkPostDCondo('DH'.$i)=='3'){echo "selected";};?>>ค้างชำระ</option>
                   </select>                  
                  </div>
			</div>
<?php
		$i++;
	};
?>
			<hr/> -->
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
            <br/>
            <br/>
            <img src="/img/zhome-table.png" class="img-responsive center-block margin-top-237 hidden-xs display-none ">
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