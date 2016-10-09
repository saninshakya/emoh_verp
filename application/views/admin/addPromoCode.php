<font color="blue">
	<?php
	$nowdate=date('Y-m-d');
	?>
	<div class="container-fluid">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
			<br>
			<?php
			$attributes = array('class' => 'form-inline', 'id' => 'promocode_form');
			echo form_open('/admin/savePromoCode',$attributes);
			?>
			<div align="center">
				<h1><b>Add Promotion Code</b></h1>
			</div>
			<div class="table borderless">
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Promotion Code :</b></div>
					<div class="col-lg-8"><input type="text" id="PromoCode" name="PromoCode" size="10" value="<?php echo $promotionCode;?>" style="width:150px;"></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Promotion Type :</b></div>
					<div class="col-lg-4">
						<select id="PromoType" name="PromoType" onchange="changePromoUnit();">
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
					<div class="col-lg-4" id="divPromoValue" style="display:none;"><input type="text" id="PromotionValue" name="PromotionValue" size="10" value="" style="width:100px;" placeholder="ระบุจำนวน"> <span id="PromotionUnit"></span></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>User Type :</b></div>
					<div class="col-lg-4">
						<select id="qPromoUserType" name="qPromoUserType">
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
					<div class="col-lg-4" id="noOfUsers" style="display:none;"><input type="text" id="limit_users" name="noOfUsers" size="10" style="width:100px;" placeholder="No. of users"></div>
				</div>
				<div class="col-lg-12 padding-bottom5">
					<div class="col-lg-4 text-right"><b>Reuse Type :</b></div>
					<div class="col-lg-4">
						<select id="qPromoReuseType" name="qPromoReuseType">
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
					<div class="col-lg-4" id="reuseLimit" style="display:none;"><input type="text" id="limit_reuse" name="reuseLimit" size="10" style="width:100px;" placeholder="Reuse Limit"></div>
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
					<div class="col-lg-offfset-6 col-lg-6 text-right"><button type="button" onclick="checkData();">Submit</button></div>
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

function changePromoUnit(){
	if($('#PromoType').val()!=''){
		$('#divPromoValue').show();
	}
	if($('#PromoType').val()==2){
		var txtUnit='Coin';
	}else{
		var txtUnit='%';
	}
	$('#PromotionUnit').html(txtUnit);
}

function checkData(){
	if($('#PromoCode').val()!='' && $('#PromoType').val()!='' && $('#qPromoUserType').val()!='' && $('#qPromoReuseType').val()!='' && $('#PromotionValue').val()!=''){
		if($('#qPromoUserType').val()=='2' && $('#limit_users').val()==''){
			alert('1');
		}else if($('#qPromoReuseType').val()=='2' && $('#limit_reuse').val()==''){
			alert('2');
		}else{
			$('#promocode_form').submit();
		}
	}else{
		return false;
	}
}
</script>
