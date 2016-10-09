<?php
$this->session->set_userdata('last_page','31');
$unit_token=$this->session->userdata('token');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
$AgreePostDay=$this->post->checkPost('AgreePostDay');
if($AgreePostDay==''){
	$AgreePostDay=60;
}
?>
<input type="hidden" name="key_change" id="key_change" value="3">
<input type="hidden" name="last_page" id="last_page" value="31">
<input type="hidden" name="unit_token" id="unit_token" value="<?=$unit_token;?>">
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
<input type="hidden" name="HDepositPrice" id="HDepositPrice" value="<?php echo $this->post->checkPost('DepositPrice');?>">
<input type="hidden" name="DDepositPrice" id="DDepositPrice" value="<?php echo $this->post->checkPost('DDepositPrice');?>">
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
				<div class="col-md-12">
					<h5>กำหนดราคาและการชำระเงิน</h5>
				</div>

				<div class="col-md-8">
					<div class="title-z"><span id="showNetPrice"><?=$qLabel['netprice'][0];?></span></div>
					<ul class="list-inline">
						<li class="col-md-6"><input class="form-control input-z" type="text" placeholder="ราคาบาท" name="NetPrice" id="NetPrice" onclick="this.value=document.getElementById('HNetPrice').value;" onchange="changeformat();" value="<?php echo '฿'.number_format($this->post->checkPost('NetPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['netprice_title'][0];?>');" onmouseout="hide_title();"></li>
						<li class="col-md-6"><div class="input-z"><span id="avg">฿<?php echo number_format((($this->post->checkPost('NetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></div></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['agreepostday'][0];?></div>
					<select class="form-control input-z" name="AgreePostDay" id="AgreePostDay" onchange="updatePost('AgreePostDay')" onmouseover="show_title('<?=$qLabel['agreepostday_title'][0];?>');" onmouseout="hide_title();">
						<?php
						$i=30;
						while ($i<=180){
							?>
							<option value="<?php echo $i;?>" <?php if ($AgreePostDay==$i){echo "selected";};?>><?php echo $i;?>วัน</option>
							<?php
							$i=$i+30;
						}
						?>
					</select>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-8">
					<div class="title-z"><?=$qLabel['depositprice'][0];?></div>
					<ul class="list-inline">
						<li class="col-md-6"><input class="form-control input-z" type="text" placeholder="ระบุ" name="DepositPrice" id="DepositPrice" onclick="this.value=document.getElementById('HDepositPrice').value;" onchange="changeformat5();" value="<?php echo '฿'.number_format($this->post->checkPost('DepositPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['depositprice_title'][0];?>');" onmouseout="hide_title();"></li>
						<li class="col-md-6"><div class="input-z"><span>โอน <span id="ShowPrice"><?php echo '฿'.number_format($this->post->checkPost('DDepositPrice'),0,'.',',');?></span> บาท</span></div></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['dayofdeposit'][0];?></div>
					<input class="form-control input-z" type="text" placeholder="ระบุ" name="DayOfDeposit" id="DayOfDeposit" onchange="updatePost('DayOfDeposit')" onmouseover="show_title('<?=$qLabel['dayofdeposit_title'][0];?>');" onmouseout="hide_title();">
				</div>
			</div><br>

			<!--end new-->

			<hr/>

			<div class="row">
				<div class="col-md-12">
					<h5><?=$qLabel['broker'][0];?></h5>
					<ul class="list-inline">
						<li class="col-md-4">
							<div class="checkbox padding-pro2 table-bordered">
								<label>
									<input type="checkbox" name="Broker" id="Broker" <?php if ($this->post->checkPost('Broker')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Broker');?>" onclick="changeValue('Broker');updatePost('Broker');"><p class="text-grey">ตกลง</p>
								</label>
							</div>
						</li>
						<li class="col-md-8 padding-t11"><div class="input-z"><span class="text-danger"><?=$qLabel['broker_price'][0];?> </span><span class="text-danger" id="showBrokerPrice">฿<?php echo number_format($this->post->checkPost('BrokerPrice'),0,'.',',');?></span></div></li>
					</ul>
					<div class="clearfix"></div>
					<p class="text-grey"><?=$qLabel['broker_price_total'][0];?> <span class="text-green" id="showTotalPriceBroker">฿<?php echo number_format($this->post->checkPost('TotalPriceBroker'),0,'.',',');?></span> หรือ <span class="text-green" id="showTotalPriceBroker2">฿<?php echo number_format((($this->post->checkPost('TotalPriceBroker'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม.</span></p>
					<div class="clearfix"></div>
					<p class="text-red"><?=$qLabel['broker_description'][0];?></p>
				</div>
			</div>
			<hr/>
			<div class="row">
				<div class="col-md-12"><h5><?=$qLabel['residence_status'][0];?></div>
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowStatusPRent"><?=$qLabel['residence_status_now'][0];?></div>
					<select class="form-control input-z" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();" onmouseover="show_title('<?=$qLabel['residence_status_now_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected value="3">ว่าง/มีผู้เช่า</option>
						<option value="0" <?php if ($this->post->checkPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
						<option value="1" <?php if ($this->post->checkPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
					</select>
				</div>
				<div class="clearfix"></div>
				<br><br>
				<div class="col-md-12">
					<h5><?=$qLabel['residence_detail_rent'][0];?></h5>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowPRentPrice2"><?=$qLabel['residence_detail_rent_price'][0];?></div>
					<input class="form-control input-z" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value=document.getElementById('PRentPrice').value;" onchange="changeformat2();" value="<?php echo '฿'.number_format($this->post->checkPost('PRentPrice'),0,'.',',');?>" <?php if($this->post->checkPost('StatusPRent')==0){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['residence_detail_rent_price_title'][0];?>');" onmouseout="hide_title();">
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['residence_detail_rent_nation'][0];?></div>
					<select class="form-control input-z" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" <?php if($this->post->checkPost('StatusPRent')==0){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
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
					<div class="title-z"><?=$qLabel['residence_detail_rent_end'][0];?></div>
					<input class="form-control input-z" type="text" name="PRentEnd" id="PRentEnd" data-date-format="yyyy-mm-dd" onblur="setTimeout(function(){updatePost('PRentEnd')}, 500);" value="<?php echo $this->post->checkPost('PRentEnd');?>" <?php if ($this->post->checkPost('StatusPRent')==0){echo "disabled";};?> onmouseover="show_title('<?=$qLabel['residence_detail_rent_end_title'][0];?>');" onmouseout="hide_title();">
				</div>



				<div class="clearfix"></div>
			</div>
			<hr/>
			<div class="row">
				<!--<div class="col-md-12"><h5><u>ประมาณการ</u>ภาษีและค่าธรรมเนียม ณ กรมที่ดิน</h5></div>-->
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['owner_duration'][0];?></div>
					<select class="form-control input-z text-grey" name="OwnerYear" id="OwnerYear" onchange="CalOwnerYear();" onmouseover="show_title('<?=$qLabel['owner_duration_title'][0];?>');" onmouseout="hide_title();">
						<option value="0" selected="selected" disabled="disabled">เลือกปี</option>
						<?php
						$year=date("Y")+543;
						$i=1;
						while ($i<=10){
							if ($i!=10){
								?>
								<option  class="text-grey" value="<?php echo $i;?>" <?php if ($this->post->checkPost('OwnerYear')==$i){echo "selected";};?> ><?php echo $year;?></option>
								<?php
							} else {
								?>
								<option class="text-grey" value="<?php echo $i;?>" <?php if ($this->post->checkPost('OwnerYear')==$i){echo "selected";};?> ><?php echo $year;?> หรือต่ำกว่า</option>
								<?php
							}
							$year=$year-1;
							$i++;
						}
						?>
					</select>
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['owner_type'][0];?></div>
					<select class="form-control input-z" disabled onmouseover="show_title('<?=$qLabel['owner_type_title'][0];?>');" onmouseout="hide_title();">
						<option value="personal" <?php if ($this->post->checkPost('TOOwner')==1){echo "selected";};?>>บุคคลธรรมดา</option>
						<option value="company" <?php if ($this->post->checkPost('TOOwner')==2){echo "selected";};?>>นิติบุคคล</option>
					</select>
				</div>
				<div class="col-md-4">
					<a target="_blank" href="http://property.treasury.go.th/pvmwebsite/"> <div class="title-z padding-clear-bottom"><?=$qLabel['property_treasury'][0];?> <span class="glyphicon glyphicon-globe input-sm3 text-left fix-glyphicon padding-clear" aria-hidden="true"></span></div></a>


					<input class="form-control input-z class="padding-clear"" type="text" placeholder="อัตโนมัติ (ถ้ามีข้อมูลใน DB)"id="AssetPrice2" name="AssetPrice2" onchange="changeAssetPrice();" value="฿<?php echo number_format((($this->post->checkPost('AssetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?>/ตร.ม." onclick="this.value='';">
				</div>
				<div class="col-md-4">&nbsp;</div>
				<div class="clearfix"></div> 
				<br/>
				<div class="col-md-12">
					<span class="text-danger">เลือกหัวข้อด้านล่างให้ถูกต้อง</span> (เพื่อคำนวณภาษีให้ใกล้ความจริง)
				</div>
				<div class="col-md-4">
					<div class="checkbox padding-pro2">
						<label>
							<input type="checkbox" name="Inhabit" id="Inhabit" <?php if ($this->post->checkPost('Inhabit')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Inhabit');?>" onclick="changeValue2('Inhabit');"><p> มีชื่อในทะเบียนบ้านเกิน 1 ปี</p>
						</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="checkbox padding-pro2">
						<label>
							<input type="checkbox" name="Inheritance" id="Inheritance" <?php if ($this->post->checkPost('Inheritance')=='1'){echo "Checked";};?> value="<?php echo $this->post->checkPost('Inheritance');?>" onclick="changeValue2('Inheritance');"><p> สินทรัพย์มาจากมรดก</p>
						</label>
					</div>
				</div>
				<div class="clearfix"></div> 
				<br/>
				<div class="col-md-12">
					<div class="title-z">ประมาณการภาษีและค่าธรรมเนียมการขาย <span class="text-danger" id="showTotalTax">฿<?php echo number_format($this->post->checkPost('TotalTax'),0,'.',',');?></span></div>
					<table class="table bg-grey img-rounded form31-table">
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
							<td>- ราคาประเมิน <span id="showAssetPrice1">฿<?php echo number_format((($this->post->checkPost('AssetPrice'))/($this->post->checkPost('useArea'))),0,'.',','); ?> /ตร.ม.</span> หรือ <span id="showAssetPrice2">฿<?php echo number_format($this->post->checkPost('AssetPrice'),0,'.',',');?></span></td><td></td>
						</tr>
						<tr>
							<td>- ถือครองมา <span id="showOwnerYear"><?php echo $this->post->checkPost('OwnerYear');?></span> ปี หักค่าใช้จ่าย <span id="showPercentTax"><?php echo $this->post->checkPost('PercentTax');?></span>% เหลือ <span id="showTax5">฿<?php echo number_format($this->post->checkPost('Tax5'),0,'.',',');?></span></td><td></td>
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
			 <div class="clearfix"></div>
			 <div class="height20 visible-xs visible-sm"></div>
			 <div class="col-md-12 padding-none border-grey2 visible-xs visible-sm" >
			     <img src="/img/ZmyHome_BoostPostAds_CoverBanner_pc.jpg" class="img-responsive cursor">
			 </div>
			<hr>
			<div class="row">
				<div class="col-xs-6 col-md-5 col-lg-3">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1('2')" >ก่อนหน้า</button> 
				</div>
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1('4')" >ถัดไป</button>
				</div>
				<br>
			</div>
			<br>
		</div>

		<div class="col-md-3 col-md-push-2 property-info hidden-xs">
			<div class="text-center">
				<h3 class="z-tip">ให้ราคา-ค่าใช้จ่ายครบ<div class="padding-tip-top">
				ผู้ซื้อพิจารณาง่าย</div></h3>
				<br>
				<div class="savetime">ประหยัดเวลาขึ้น</div>
				<div><img src="/img/clock-05.png" class="img-responsive center-block"></div>
				<div id="title_panel" class="center-block display-none" style="width:85%;">
					<br/>
					<div><img src="/img/tip.png"></div>
					<h2 class="z-tip"><?=$qLabel['description'][0];?></h2>
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
					<div class="col-md-12 text-center padding-t120 padding-b120"><h4 class="text-grey">คุณกรอกข้อมูลไม่ครบถ้วน ต้องการไปยังหน้าถัดไป</h4></div>
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
					<div id="txt_alert" class="col-md-12 text-center padding-t120 padding-b120"><h4 class="text-grey"></h4></div>
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