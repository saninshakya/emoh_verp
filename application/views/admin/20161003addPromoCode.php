<font color="blue">
	<?php
	$nowyear=date('Y');
	$nowmonth=date('m');
	$month=array('01' => 'มกราคม', '02' => 'กุมภาพันธ์', '03' => 'มีนาคม', '04' => 'เมษายน', '05' => 'พฤษภาคม', '06' => 'มิถุนายน', '07' => 'กรกฎาคม', '08' => 'สิงหาคม', '09' => 'กันยายน', '10' => 'ตุลาคม', '11' => 'พฤศจิกายน', '12' => 'ธันวาคม');
	$month_en=array('01' => 'Jan.', '02' => 'Feb.', '03' => 'Mar.', '04' => 'Apr.', '05' => 'May', '06' => 'Jun.', '07' => 'Jul.', '08' => 'Aug.', '09' => 'Sep.', '10' => 'Oct.', '11' => 'Nov.', '12' => 'Dec.');
//$startyear=$nowyear-5;
	if(!isset($SelMonth) or $SelMonth==''){$SelMonth=$nowmonth;}
	$startyear=2015;
	?>
	<div class="container-fluid">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
			<br>
			<?php
			echo form_open('/admin/savePromoCode');
			?>
			<div align="center">
				<h1><b>Add Promotion Code</b></h1>
			</div>
			<div class="table borderless">
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Promotion Code :</b></div>
					<div class="col-lg-8"><input type="text" name="PromoCode" size="10" value="<?php echo $promotionCode;?>" style="width:150px;"></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Promotion Type :</b></div>
					<div class="col-lg-8">
						<select name="PromoType">
							<option value="" selected disabled>Select</option>
							<?php
							foreach ($qPromoType->result() as $row){
								?>
								<option value="<?=$row->id;?>"><?=$row->name_th;?></option>
								<?php
							}
							?>
						</select>
					</div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>User Type :</b></div>
					<div class="col-lg-4">
						<select name="qPromoUserType" id="qPromoUserType">
							<option value="" selected disabled>Select</option>
							<?php
							foreach ($qPromoUserType->result() as $row){
								?>
								<option value="<?=$row->id;?>"><?=$row->name_th;?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-lg-4" id="noOfUsers" style="display:none;"><input type="text" name="noOfUsers" size="10" style="width:100px;" placeholder="No. of users"></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Reuse Type :</b></div>
					<div class="col-lg-4">
						<select name="qPromoReuseType" id="qPromoReuseType">
							<option value="" selected disabled>Select</option>
							<?php
							foreach ($qPromoReuseType->result() as $row){
								?>
								<option value="<?=$row->id;?>"><?=$row->name_th;?></option>
								<?php
							}
							?>
						</select>
					</div>
					<div class="col-lg-4" id="reuseLimit" style="display:none;"><input type="text" name="reuseLimit" size="10" style="width:100px;" placeholder="Reuse Limit"></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Value :</b></div>
					<div class="col-lg-8"><input type="text" name="PromotionValue" size="10" value="" style="width:100px;"></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>วันที่เริ่มต้น : </b></div>
					<div class="col-lg-8"><input type="text" id="start_date" name="start_date" class="input-md" style="width:100px;" value="<?php if($start_date!=""){echo $start_date;}else{echo $nowdate;}?>" data-date-format="yyyy-mm-dd" max="<?=date('Y-m-d');?>">
					</div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>วันที่สิ้นสุด : </b></div>
					<div class="col-lg-8"><input type="text" id="end_date" name="end_date" class="input-md" style="width:100px;" value="<?php if($end_date!=""){echo $end_date;}else{echo $nowdate;}?>" data-date-format="yyyy-mm-dd" max="<?=date('Y-m-d');?>">
					</div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-offfset-6 col-lg-6 text-right"><input type="submit" value="Submit"></div>
				</div>
			</div>
			</form>
			<br>
		</div>
	</div>
</font>
<script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
<script language="JavaScript">
	$('#start_date').datepicker();
	$('#end_date').datepicker();

	$(document).ready(function(){
		$('#qPromoUserType').on('change', function(event) {
			event.preventDefault();
			var qPromoUserType = this.value;
			// var qPromoUserType = $(this).find("option:selected").text();
			// console.log(qPromoUserType);
			console.log('qPromoUserType', qPromoUserType);
			
			//Limit User
			if(qPromoUserType == "2"){
				$('#noOfUsers').css({"display": "block"});
			}else{
				$("#noOfUsers").hide(0, function(){ $(this).hide(); });

			} 
		});

		$('#qPromoReuseType').on('change', function(event) {
			event.preventDefault();
			var qPromoReuseType = this.value;
			console.log('qPromoReuseType', qPromoReuseType);
			
			//Reuse with Limit
			if(qPromoReuseType == "2"){
				$('#reuseLimit').css({"display": "block"});
			}else{
				$("#reuseLimit").hide(0, function(){ $(this).hide(); });
				
			} 
		});
	});
</script>
