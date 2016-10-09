<?php
$this->session->set_userdata('last_page','35');
$unit_token=$this->session->userdata('token');
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/zhome/changePage1', $attributes);
?>
<input type="hidden" name="key_change" id="key_change" value="5">
<input type="hidden" name="last_page" id="last_page" value="35">
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
				<div class="col-md-12"><h5><?=$qLabel['residence_status_rent'][0];?></h5></div>
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowStatusPRent"><?=$qLabel['residence_status_now'][0];?></div>
					<select class="form-control input-z" name="StatusPRent" id="StatusPRent" onchange="updatePost('StatusPRent');enableForm();" onmouseover="show_title('<?=$qLabel['residence_status_now_title'][0];?>');" onmouseout="hide_title();">
						<option disabled selected value="3">ว่าง/มีผู้เช่า</option>
						<option value="0" <?php if ($this->post->checkPost('StatusPRent')==0){echo "selected";};?>>ว่าง</option>
						<option value="1" <?php if ($this->post->checkPost('StatusPRent')==1){echo "selected";};?>>มีผู้เช่า</option>
					</select>
				</div>
				<div class="col-md-4">
					<div class="title-z"><?=$qLabel['residence_detail_rent_nation'][0];?></div>
					<select class="form-control input-z" name="PRentNational" id="PRentNational" onchange="updatePost('PRentNational');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_nation_title'][0];?>');" onmouseout="hide_title();">
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
				<div class="col-md-12"><hr></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h5><?=$qLabel['residence_detail_rent'][0];?></h5>
				</div>
				<div class="col-md-8">
					<div class="title-z normal_msg" id="ShowPRentPrice2"><?=$qLabel['residence_detail_rent_price'][0];?></div>
					<div class="col-md-6 padding-right-clear-m padding-left-clear">
						<input class="form-control input-z" type="text" id="showPRentPrice" name="showPRentPrice" onclick="this.value=document.getElementById('PRentPrice').value;" onchange="changeformat2();"  value="<?php echo '฿'.number_format($this->post->checkPost('PRentPrice'),0,'.',',');?>" onmouseover="show_title('<?=$qLabel['residence_detail_rent_price_title'][0];?>');" onmouseout="hide_title();">
					</div>                
				</div>
			</div>
			<!--Edit-->
			<div class="row">
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowMinTimePRent"><?=$qLabel['residence_detail_rent_mintime'][0];?></div>
					<select class="form-control input-z" name="MinTimePRent" id="MinTimePRent" onchange="updatePost('MinTimePRent');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_mintime_title'][0];?>');" onmouseout="hide_title();">
						<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('MinTimePRent')=="1"){echo "selected";};?>>1 เดือน</option>
						<option value="2" <?php if ($this->post->checkPost('MinTimePRent')=="2"){echo "selected";};?>>2 เดือน</option>
						<option value="3" <?php if ($this->post->checkPost('MinTimePRent')=="3"){echo "selected";};?>>3 เดือน</option>
						<option value="6" <?php if ($this->post->checkPost('MinTimePRent')=="6"){echo "selected";};?>>6 เดือน</option>
						<option value="12" <?php if ($this->post->checkPost('MinTimePRent')=="12"){echo "selected";};?>>1 ปี</option>
					</select>
				</div>
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowDepositPRent"><?=$qLabel['residence_detail_rent_pledge'][0];?></div>
					<select class="form-control input-z" name="DepositPRent" id="DepositPRent" onchange="updatePost('DepositPRent');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_pledge_title'][0];?>');" onmouseout="hide_title();">
						<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('DepositPRent')=="1"){echo "selected";};?>>1เดือน</option>
						<option value="2" <?php if ($this->post->checkPost('DepositPRent')=="2"){echo "selected";};?>>2เดือน</option>
						<option value="3" <?php if ($this->post->checkPost('DepositPRent')=="3"){echo "selected";};?>>3เดือน</option>
					</select>
				</div>
				<br class="visible-xs visible-sm">
				<div class="col-md-4">
					<div class="title-z normal_msg" id="ShowAdvancePRent"><?=$qLabel['residence_detail_rent_advance'][0];?></div>
					<select class="form-control input-z" name="AdvancePRent" id="AdvancePRent" onchange="updatePost('AdvancePRent');" onmouseover="show_title('<?=$qLabel['residence_detail_rent_advance_title'][0];?>');" onmouseout="hide_title();">
						<option disabled="disabled" selected="selected" value="99">โปรดเลือก</option>
						<option value="1" <?php if ($this->post->checkPost('AdvancePRent')=="1"){echo "selected";};?>>1เดือน</option>
						<option value="2" <?php if ($this->post->checkPost('AdvancePRent')=="2"){echo "selected";};?>>2เดือน</option>
						<option value="3" <?php if ($this->post->checkPost('AdvancePRent')=="3"){echo "selected";};?>>3เดือน</option>            
					</select>
				</div>
			</div>
			<!--End Edit-->
			<br>
			<div class="row">
				<div class="col-xs-12">
					<span class="text-red">*ค่าเช่าที่ต้องการต่อเดือน โดยปกติจะรวมค่าส่วนกลาง แต่ไม่รวมค่าใช้จ่ายอื่นๆ เช่น เคเบิ้ลทีวี อินเตอร์เน็ท ยกเว้นการเช่าที่มีค่าเช่าสูง เจ้าของต้องถามความต้องการของผู้เช่าให้ครบถ้วนเมื่อมีการต่อรองเรื่องราคา</span>
				</div>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<div class="col-xs-12">
					<h5>ยอมรับผู้เช่าที่เซ็นสัญญาในนามบริษัท/นิติบุคคล</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="radio padding-checkbox">
						<label class="col-xs-12 radio-inline">
							<input type="radio" name="PRentCO2" id="ChkPRentCO" value="1" <?php if ($this->post->checkPost('PRentCO')=='1'){echo "Checked";};?> onclick="document.getElementById('PRentCO').value=1;updatePost('PRentCO');"><p class="text-grey"> ใช่</p>
						</label>
						<br>
						<label class="col-xs-12 radio-inline">
							<input type="radio" name="PRentCO2" id="UnChkPRentCO" value="0" <?php if ($this->post->checkPost('PRentCO')=='0'){echo "Checked";};?> onclick="document.getElementById('PRentCO').value=0;updatePost('PRentCO');"><p class="text-grey"> ไม่ใช่</p>
						</label>
					</div>
				</div>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<div class="col-xs-12">
					<h5>ต้องการนายหน้าที่เห็นประกาศช่วยหาลูกค้า (ค่าบริการ 1 เดือนต่อสัญญา1ปี)</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="radio padding-checkbox">
						<label class="col-xs-12 radio-inline">
							<input type="radio" name="AgentPRent2" id="ChkAgentPRent" value="1" <?php if ($this->post->checkPost('AgentPRent')=='1'){echo "Checked";};?> onclick="document.getElementById('AgentPRent').value=1;updatePost('AgentPRent');"><p class="text-grey"> ต้องการ</p>
						</label>     
						<br>
						<label class="col-xs-12 radio-inline">
							<input type="radio" name="AgentPRent2" id="ChkAgentPRen" value="0" <?php if ($this->post->checkPost('PRentCO')=='1'){echo "Checked";};?> onclick="document.getElementById('AgentPRent').value=0;updatePost('AgentPRent');"><p class="text-grey"> ไม่ต้องการ</p>
						</label>
					</div>
				</div>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<div class="col-xs-12">
					<h5>เลือกหากคุณยอมรับการเช่าลักษณะด้านล่างนี้ได้</h5>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="checkbox padding-checkbox">
						<label class="col-xs-12 checkbox-inline">
							<input type="checkbox" name="PRentAllNational" id="PRentAllNational" value="<?php echo $this->post->checkPost('PRentAllNational');?>" <?php if ($this->post->checkPost('PRentAllNational')=='1'){echo "Checked";};?> onclick="changeValue3('PRentAllNational');updatePost('PRentAllNational');"><p class="text-grey">ทุกสัญชาติ</p>
						</label>
						<br>
						<label class="col-xs-12 checkbox-inline">
							<input type="checkbox" name="PRentChild" id="PRentChild" value="<?php echo $this->post->checkPost('PRentChild');?>" <?php if ($this->post->checkPost('PRentChild')=='1'){echo "Checked";};?> onclick="changeValue3('PRentChild');updatePost('PRentChild');"><p class="text-grey">เด็กอายุไม่เกิน 8 ปี</p>
						</label>
						<br>
						<label class="col-xs-12 checkbox-inline">
							<input type="checkbox" name="PRentPet" id="PRentPet" value="<?php echo $this->post->checkPost('PRentPet');?>" <?php if ($this->post->checkPost('PRentPet')=='1'){echo "Checked";};?> onclick="changeValue3('PRentPet');updatePost('PRentPet');"><p class="text-grey">สุนัข-แมวเล็ก</p>
						</label>
						<br>
						<label class="col-xs-12 checkbox-inline">
							<input type="checkbox" name="PRentEmptyRoom" id="PRentEmptyRoom" value="<?php echo $this->post->checkPost('PRentEmptyRoom');?>" <?php if ($this->post->checkPost('PRentEmptyRoom')=='1'){echo "Checked";};?> onclick="changeValue3('PRentEmptyRoom');updatePost('PRentEmptyRoom');"><p class="text-grey">ให้เช่าห้องเปล่า</p>
						</label>
						<br>
						<label class="col-xs-12 checkbox-inline">
							<input type="checkbox" name="PRentGas" id="PRentGas" value="<?php echo $this->post->checkPost('PRentGas');?>" <?php if ($this->post->checkPost('PRentGas')=='1'){echo "Checked";};?> onclick="changeValue3('PRentGas');updatePost('PRentGas');"><p class="text-grey">ใช้เตาแก๊ส</p>
						</label>
					</div>
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
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1(2)">ก่อนหน้า</button> 
				</div>              
				<div class="col-xs-6 col-md-5 col-md-push-2 col-lg-3 col-lg-push-6">
					<button type="button" class="btn btn-warning col-xs-12 text-white" onclick="val1(4)">ถัดไป</button>
				</div>
			</div>
			<br>
		</div>
		<br>
		<div class="col-md-3 col-md-push-2 property-info hidden-xs">
			<div class="text-center">
				<h3 class="z-tip">
					<p>ให้ราคา-ค่าใช้จ่ายครบ</p>
					<p class="padding-tip-top">ผู้ซื้อพิจารณาง่าย</p>
				</h3>
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
