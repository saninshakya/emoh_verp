</div>
<div class="container padding-right-clear padding-left-clear">
	<div class="margin-t50 hidden-sm hidden-xs"></div>
	<aside class="col-md-2 hidden-xs hidden-sm">
		<ul class="nav">
		    <li>
				<h4>
					 คุณมี <span><?=$this->credit->CreditBanlance();?></span>  เหรียญ
				</h4>
			</li>
			<br>
			<li>
				<h4>
					<a href="/zhome/dashboard/owner" id="owner" class="<?php if($type=='owner'){echo "nav-active";}else{echo "text-grey2";}?>">ประกาศของคุณ </a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/favourite" id="favourite" class="<?php if($type=='favourite'){echo "nav-active";}else{echo "text-grey2";}?>">ทรัพย์สินที่สนใจ</a>
				</h4>
			</li>
			<br>
			<li class="">
				<h4>
					<a href="/zhome/dashboard/lastview" id="lastview" class="<?php if($type=='lastview'){echo "nav-active";}else{echo "text-grey2";}?>">รายการล่าสุด</a>
				</h4>
			</li>
			<!--<br>
			<li class=""><h4><a href="#" id="agent" class="<?php if($type=='agent'){echo "nav-active";}else{echo "text-grey2";}?>">งานนายหน้า</a></h4></li>-->
			<br>
			<!--<li class="">
				<h4>
					<a href="/zhome/dashboard/profile" id="profile" class="<?php if($type=='profile'){echo "nav-active";}else{echo "text-grey2";}?>">ข้อมูลส่วนบุคคล</a>
				</h4>
			</li>-->
		</ul>
		<div class="h360 hidden-xs"></div>
	</aside>

	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding-none-pc" style="font-size: 1.125em;">
		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc" style="background-color: #FFFFFF;">
			<div class="text-left"><h3>ซื้อเหรียญเพื่อโปรโมทประกาศ</h3></div>
			<!--<div class="text-left"><h2><span>คุณมี</span><span class="text-red"> <?=$this->credit->CreditBanlance();?></span><span>  เหรียญ</span></h2></div>-->
			<div class="height25"></div>
			<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none">
				<div id="promotion_input" class="col-lg-8 col-md-8 entercode padding-none">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 padding-none">
						<input type="text" id="PromoCode" name="PromoCode" class="form-control input-z padding-left-clear" placeholder="PROMOCODE (ถ้ามี)" style="padding:0; margin:0">
					</div>
					<div class="col-lg-4 col-md-4 col-sm-8 col-xs-4 padding-none">
						<button class="btn  w50 btn-green2 cursor  text-white col-xs-4 col-xs-12 text-center padding-none" style="height:40px; " onclick="checkPromoCode();">
						<div class="text-center">ตกลง</div></button>
						<span class="glyphicon glyphicon-remove-circle cursor text-grey2" style="font-size: 1.75em;padding: 4px 5px 4px 5px;" aria-hidden="true" onclick="cancelPromoCode();"></span>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-lg-8 col-md-8 padding-none" style="padding-top: 10px;">
					<a href="#" id="promotion_txt" class="promotioncode text-grey" onclick="//promotioncode();"><span class="glyphicon glyphicon-tag"></span> ป้อนรหัสคูปองหรือโปรโมชั่น</a>
				</div>
				<div class="row"></div>
				<div class="height25"></div>
				<div id="promotion_warning" class="col-lg-6 col-md-6 display-none alert alert-warning" role="alert"><span class="text-red">Promotion Code ไม่ถูกต้อง กรุณาตรวจสอบ</span></div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc padding-right-clear padding-left-clear">
			<div class="clearfix"></div>
			<div class="height10 hidden-sm hidden-xs"></div>
			<div class="height25 hidden-sm hidden-xs"></div>
			<div id="promotion" class="display-none">
				<div class="col-xs-12 padding-none-pc"><h5>Promotion <span id="promotion_txt_get"></span></h5></div>
				<div class="clearfix"></div>
				<div class="col-xs-12 visible-sm visible-xs padding-none"><hr class="padding-none"></div>
				<div class="clearfix visible-sm visible-xs"></div>
				<div class="height15 visible-sm visible-xs"></div>
				<div id="promotion_list"></div>
			</div>
			<div id="standard">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none">
					<div class="col-xs-12 padding-none-pc"><h5>ซื้อเหรียญ</h5></div>
					<div class="clearfix"></div>
					<div class="col-xs-12 visible-sm visible-xs padding-none"><hr class="padding-none"></div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="height15 visible-sm visible-xs"></div>
					<?php
					$resultPayment=$this->credit->paymentcoin();
					$i=0;
					foreach ($resultPayment->result() as $row){
						$i++;
						if($i%3!=0){$radioClass="padding-r20c";}else{$radioClass="padding-r20c2";}
						$discount=(($row->Credit-$row->ThaiBaht)/$row->Credit)*100;
						if($discount>0){
							$discount_show=number_format($discount,0);
						}
					?>
					<div class="col-lg-4 col-md-4 radio padding-left-clear">
						<div class="col-md-12 border-boost2">
							<div class="col-lg-7 col-md-6 col-sm-6 col-xs-6 padding-none">
								<label class="padding-none vertical-center">
									<input type="radio" id="optionsRadios<?=$i;?>" name="optionsRadios" class="radioz" value="<?=$row->PType;?>" onclick="changePayment(this.value)">
									<span class="text-black"><?=$row->DisplayName1;?></span>
								</label>
							</div>
							<div class="col-lg-5 col-md-6 col-sm-6 col-xs-6 text-right padding-none">
							   <div class="padding-t3m">
								 <span class="text-payment2"><?=$row->DisplayName2;?></span><?if($discount>0){?><span class="text-payment2 text-red"> -<?=$discount_show;?>%</span><?}?>
							   </div>
							</div>
						</div>
					</div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="height10 visible-sm visible-xs"></div>
					<div class="col-xs-12 visible-sm visible-xs padding-none"><hr class="padding-none"></div>
					<div class="clearfix visible-sm visible-xs"></div>
					<div class="height10 visible-sm visible-xs"></div>

					<?php
					}
					?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="hidden-sm hidden-xs h15"></div>
		<div class="row visible-sm visible-xs"><hr class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>
		<div class="hidden-sm hidden-xs "><hr class="padding-none"></div>
		<div class="clearfix"></div>
	    <div class="height25 hidden-sm hidden-xs"></div>
	    <div class="height15 visible-sm visible-xs"></div>

		<div id="show_payment">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc padding-right-clear padding-left-clear">
				<div class="col-xs-12 padding-none-pc"><h5>ชำระเงินด้วยบัตรเครดิต</h5></div>
				<div class="clearfix"></div>
				<div class="height25"></div>
				<div class="col-md-12 padding-none">
					<div class="col-lg-4 col-md-4 col-xs-6  padding-none-pc"><p class="text-black padding-none">User Name : </p></div>
					<?php
						$user_data = $this->users->get_user_by_id($this->tank_auth->get_user_id(),1);
					?>
					<div class="col-lg-4 col-md-4 col-xs-6 text-right"><?=$user_data->firstname;?> <?=$user_data->lastname;?></div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="padding-none col-md-12">
					<div class="col-lg-4 col-md-4 col-xs-6 padding-none-pc"><p class="text-black padding-none">ซื้อเหรียญ :  </p></div>
					<div class="col-lg-4 col-md-4 col-xs-6 text-right" id="div1">-&nbsp;&nbsp;&nbsp;เหรียญ</div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="padding-none col-md-12">
					<div class="col-lg-4 col-md-4 col-xs-6 padding-none-pc"><p class="text-black padding-none">ค่าบริการใช้ซอฟต์แวร์ :  </p></div>
					<div class="col-lg-4 col-md-4 col-xs-6 text-right" id="div2">-&nbsp;&nbsp;&nbsp;บาท</div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="padding-none">
					<div class="col-lg-4 col-md-4 col-xs-6 padding-none-pc"><p class="text-black padding-none">ภาษีมูลค่าเพิ่ม :  </p></div>
					<div class="col-lg-4 col-md-4 col-xs-6 text-right" id="div3">-&nbsp;&nbsp;&nbsp;บาท</div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="padding-none">
					<div class="col-lg-4 col-md-4 col-xs-6 padding-none-pc"><p class="text-black padding-none">รวม:  </p></div>
					<div class="col-lg-4 col-md-4 col-xs-6 text-red text-right" id="div4">-&nbsp;&nbsp;&nbsp;บาท</div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
			</div>
			<div class="clearfix"></div>
			<div class="hidden-sm hidden-xs"><hr class="padding-none"></div>
			<div class="row visible-sm visible-xs"><hr id="bank_toggle" class="bg-grey7 height10 padding-none visible-xs visible-sm"></div>

			<div class="clearfix"></div>
			<div class="height15"></div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc padding-right-clear padding-left-clear">
				<div class="col-xs-12 padding-none-pc"><h5>ชำระเงินด้วยการโอนเงินเข้าบัญชีธนาคาร <u><a href="#bank_toggle" id="showBookBank_txt" style="color: #FF0000">แสดง</a></u></h5></div>
				<div id="showBookBank" class="display-none">
					<div class="clearfix"></div>
					<div class="height25"></div>
					<div class="col-xs-12 padding-none-pc"><p class="text-black">บัญชีธนาคารทหารไทย<br> บริษัท แซท โฮม จำกัด เลขที่บัญชี 269-2-03742-3 <br>และถ่ายภาพสลิปธนาคารแล้วส่งมายัง</p></div>
					<div class="clearfix"></div>
					<div class="height15"></div>
					<div class="col-xs-12 padding-none-pc"><p class="text-black">- Line@ZmyHome</p></div>
					<div class="col-xs-12 padding-none-pc"><p class="text-black">- email : Sale@zmyhome.com</p></div>
					<div class="col-xs-12 padding-none-pc"><p class="text-black">- Fax : 02-661-5004</p></div>
				</div>
			</div>

			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="row visible-xs visible-sm"><hr class="full padding-none"></div>
			<div class="hidden-sm hidden-xs "><hr class="padding-none"></div>
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-none-pc padding-right-clear padding-left-clear">
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="text-blue col-md-12 padding-none-pc"><p class="text-blue">หากท่านต้องการซื้อเหรียญเพื่อโปรโมทประกาศ ห้ามใช้ภาพถ่ายห้องแนวตั้ง กรุณาสอบถามคุณภาพภาพถ่ายก่อนซื้อเหรียญที่ Line@ZmyHome</p></div>
				<div class="clearfix"></div>
				<div class="height15"></div>
				<div class="col-xs-12 padding-none-pc"><h5>นโยบายการชำระและขอคืนเงิน (คลิกเพื่อยอมรับ)</h5></div>
				<div class="clearfix"></div>
				<div class="height10"></div>
				<div id="condition" class="checkbox col-xs-12 padding-none-pc">
					<div class="text-grey">
						<label><input type="checkbox" name="optionsCondition" id="optionsCondition3" value="" onclick="checkPaymentTerm();" ><span class="payment_txt">ข้าพเข้ายอมรับว่าเหรียญที่ซื้อแล้วจะไม่สามารถขอคืนเป็นเงินสดได้ ไม่ว่าจะเป็นบางส่วนหรือทั้งหมด รวมทั้งยอมรับ</span><span class="text-green">กฎและข้อจำกัด  ข้อตกลงการใช้งาน </span> <span class="payment_txt">และ</span><span class="text-green">นโยบายความเป็นส่วนตัว</span><span class="payment_txt">ทั้งหมดนี้</span></label>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="height15"></div>
			</div>

			<div class="clearfix"></div>
			<div class="height10"></div>
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div class="clearfix"></div>
			<div class="visible-sm visible-xs" style="height:10vh"></div>
		</div>

		<div id="temp_button" class="col-lg-12 col-md-12 boost-map-height footer-mobile bg-grey7">
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div id="temp_txt" align="center" class="btn btn-payment cursor" onclick="showPaymentTerm();">ชำระเงิน</div>
			<div class="clearfix"></div>
			<div class="height5"></div>
			<div class="text-black text-center">
				<small class="text-black"><i class="glyphicon glyphicon-lock"></i> เราใช้การถ่ายโอนข้อมูลที่ปลอดภัย และการจัดเก็บข้อมูลที่มีการเข้ารหัส เพือปกป้องข้อมูลส่วนบุคคลของคุณ
				</small>
			</div>
			<div class="clearfix"></div>
			<div class="height5"></div>
		</div>
		<!--payment bt-->
		<div id="payment_button" class="col-lg-12 col-md-12 boost-map-height footer-mobile bg-grey7 display-none">
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div align="center" class="cursor padding-none" onclick="usePromotion($('#PromoCode').val());">
				<form name="checkoutForm" method="POST" action="./checkout" class="padding-none">
					<input type="hidden" id="satang" name="satang">
					<input type="hidden" id="PType" name="PType">
					<input type="hidden" id="promotion_code" name="promotion_code">
					<input type="hidden" id="promotion_point" name="promotion_point">
					<script type="text/javascript" src="/js/zcard.js"
					data-key="<?=$this->credit->OmiseToken("public");?>"
					data-image="https://zhome.aofdev.com/img/ZmyHome_LogoHouse_orange400.svg"
					data-frame-label="ZmyHome.com"
					data-button-label="ชำระเงิน"
					data-submit-label="ยืนยันชำระ"
					data-location="no"
					data-currency="thb"
					>
					</script>
					<!--the script will render <input type="hidden" name="omiseToken"> for you automatically-->
				</form>
			</div>
			<div class="clearfix"></div>
			<div class="height5"></div>
			<div class="text-black text-center">
				<small class="text-black"><i class="glyphicon glyphicon-lock"></i> เราใช้การถ่ายโอนข้อมูลที่ปลอดภัย และการจัดเก็บข้อมูลที่มีการเข้ารหัส เพือปกป้องข้อมูลส่วนบุคคลของคุณ
				</small>
			</div>
			<div class="clearfix"></div>
			<div class="height5"></div>
		</div>
		<!--end payment bt-->

		<div id="promotion_button" class="col-lg-12 col-md-12 boost-map-height footer-mobile bg-grey7 display-none">
			<div class="clearfix"></div>
			<div class="height15"></div>
			<div align="center" class="btn btn-payment cursor" onclick="addPromotionCredit($('#PromoCode').val());">ใช้ Promotion</div>
			<div class="clearfix"></div>
			<div class="height5"></div>
			<div class="text-black text-center">
				<small class="text-black"><i class="glyphicon glyphicon-lock"></i> เราใช้การถ่ายโอนข้อมูลที่ปลอดภัย และการจัดเก็บข้อมูลที่มีการเข้ารหัส เพือปกป้องข้อมูลส่วนบุคคลของคุณ
				</small>
			</div>
			<div class="clearfix"></div>
			<div class="height5"></div>
		</div>
	</div>
</div>
<!-- Modal Check Condition -->
<div class="modal modal-sm fade display-none" id="modalCondition4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content text-center">
		<div class="modal-header bg-blue" style="padding:10px 15px 5px;">
			<div class="pull-right"><button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.href = '#condition'"><span aria-hidden="true"><big>x</big></span></button></div>
			<h4 class="text-white text-center padding-none padding-t3">กรุณาคลิกยอมรับข้อตกลง</h4>
		</div>
		<div class="modal-body">
			<br><br>
			<div style="height:10vh;"></div>
			<!--<h4>กรุณาคลิกยอมรับข้อตกลงในการชำระเงิน</h4>-->
			<span id="warning_txt"><h4 class="text-red">เลือกยอมรับข้อตกลงในการใช้งาน</h4>
			<h4 class="text-red">ก่อนชำระเงิน</h4></span>
			<div style="height:15vh;"></div>
			<br>
			<button class="btn btn-blue cursor text-white" style="padding: 10px 0 10px;" onclick="$('#modalCondition4').modal('hide');location.href = '#condition'";>ปิด</button>
		</div>
    </div>
  </div>
</div>
<!--End-->
</body>
<script type="text/javascript">
$(window).load(function(){
  $('.checkCondition4').addClass('disabled');
});

$('#showBookBank_txt').click(function(){
    var link = $(this);
    $('#showBookBank').slideToggle('fast', function() {
        if ($(this).is(':visible')) {
             link.text('ซ่อน');
        } else {
             link.text('แสดง');
        }
    });
});

$('#payment_button').click(function(){
	if( navigator.userAgent.match(/iPhone|iPad|iPod/i) ) {
		var offset = parseInt($('#OmiseCardJsIFrame').offset().top);
		var deviceHeight=$(window).height();
		var percent=0.6;
		var percentHeight=deviceHeight*percent;
		$('html,body').animate({scrollTop: offset - percentHeight}, 1000);
		$('#OmiseCardJsIFrame').height(deviceHeight);
		//$(window).scrollTop($('#OmiseCardJsIFrame').offset().top-250);
	}
});

function promotioncode(){
	$('.promotioncode').addClass('display-none');
	$('.entercode').removeClass('display-none');
	$('.entercode').addClass('display');
}

function changePayment(Price){
    var amount;
<?php
	$resultPayment=$this->credit->paymentcoin();
	$i=0;
	foreach ($resultPayment->result() as $row){
		$i++;
?>
		if (Price=="<?=$row->PType;?>"){
			//document.getElementById("button_id").innerHTML="<?=$row->DisplayName3;?>";
			//document.getElementById("button_id").innerHTML="ซื้อ <?=$row->Credit;?> เหรียญ ชำระ <?=$row->ThaiBaht;?> บาท";
			//document.getElementById("temp_txt").innerHTML="ซื้อ <?=$row->Credit;?> เหรียญ ชำระ <?=$row->ThaiBaht;?> บาท";
			document.getElementById("button_id").innerHTML="ชำระ <?=$row->ThaiBaht;?> บาท ด้วยบัตรเครดิต";
			document.getElementById("temp_txt").innerHTML="ชำระ <?=$row->ThaiBaht;?> บาท ด้วยบัตรเครดิต";
			document.getElementById("satang").value="<?=$row->ThaiBaht * 100;?>";
			document.getElementById("PType").value="<?=$row->PType;?>";
			document.getElementById("div1").innerHTML="<?=$row->DisplayName1;?>";
			document.getElementById("div2").innerHTML="<?=round(($row->ThaiBaht / 1.07),2);?> บาท";
			document.getElementById("div3").innerHTML="<?=round(($row->ThaiBaht*7/107),2);?> บาท";
			document.getElementById("div4").innerHTML="<?=$row->ThaiBaht;?> บาท";
		}
<?php
	}
?>
	checkPaymentTerm();
}

function changePayment2(Credit,Price,PType){
	price_satang=Price*100;
	price_service=(Price/1.07).toFixed(2);
	price_tax=(Price*7/107).toFixed(2);
	$('#button_id').html('ซื้อ '+Credit+' เหรียญ ชำระ '+Price+' บาท');
	$('#temp_txt').html('ซื้อ '+Credit+' เหรียญ ชำระ '+Price+' บาท');
	$('#satang').val(price_satang);
	$('#PType').val(PType);
	$('#div1').html(Credit+' เหรียญ');
	$('#div2').html(price_service+' บาท');
	$('#div3').html(price_tax+' บาท');
	$('#div4').html(Price+' บาท');
	$('#promotion_point').val(Credit);
	checkPaymentTerm();
}

function checkPromoCode(code){
	var PromoCode=$('#PromoCode').val();
	var getPromotion = $.getJSON("/zhome/checkPromoCode",{PromoCode: PromoCode}, function(json){
		console.log( "success" );
	})
	.done(function() {
		console.log( "second success" );
	})
	.fail(function() {
		console.log( "error" );
	})
	.always(function(json) {
		returnPromotion = json;
		console.log( "complete" );
	});

	// Set another completion function for the request above
	getPromotion.complete(function(json) {
		showPromotion();
	});
}

function showPromotion(){
	var listPromotion = "";
	checkpass=0;
	var txt_alert='Promotion Code ไม่ถูกต้อง กรุณาตรวจสอบ';
	if(returnPromotion.length>0){
		$('#standard').addClass('display-none');
		$('#promotion').removeClass('display-none');
		$('#promotion_list').removeClass('display-none');
		$('#promotion_list').empty();
		if(returnPromotion[0].checkCode==1){
			checkpass=1;
			$('#promotion_warning').addClass('display-none');
			if(returnPromotion[0].promotion_type==1 || returnPromotion[0].promotion_type==3){//1:Discount Payment , 3:Add on (Extra Credit)
				if($('#optionsCondition3').is(':checked')){
					$('#temp_button').addClass('display-none');
					$('#payment_button').removeClass('display-none');
				}else{
					$('#temp_button').removeClass('display-none');
					$('#payment_button').addClass('display-none');
				}
				$('#promotion_button').addClass('display-none');
				value=returnPromotion[0].value;
				if(returnPromotion[0].promotion_type==1){
					$('#promotion_txt_get').html('ได้รับส่วนลด '+value+'%');
				}else if(returnPromotion[0].promotion_type==3){
					$('#promotion_txt_get').html('ได้รับเหรียญเพิ่ม '+value+'%');
				}
				<?php
				$resultPayment=$this->credit->paymentcoin();
				$i=0;
				/*after enter promocodeb0001 edit here*/
				foreach($resultPayment->result() as $row){
					$i++;
					if($i%3!=0){$radioClass="padding-r20c";}else{$radioClass="padding-r20c2";}
				?>
					price=Number('<?=$row->ThaiBaht;?>');
					credit=Number('<?=$row->Credit;?>');
					if(returnPromotion[0].promotion_type==1){
						price_new=price-((price*value/100));
						value_show=value;
						credit_get=credit;
					}else if(returnPromotion[0].promotion_type==3){
						price_new=price;
						value_new=credit*value/100;
						value_show=parseInt((((credit+value_new)-price)/credit)*100);
						credit_get=credit+value_new;
					}
					listPromotion +='<div class="col-lg-4 col-md-4 padding-none radio <?=$radioClass;?>">';
					listPromotion +='<div class="col-lg-12 col-md-12 border-boost2">';
					if(returnPromotion[0].promotion_type==1){
						listPromotion +='<div class="col-lg-7 col-md-5 col-sm-6 col-xs-7 padding-none">';
					}else if(returnPromotion[0].promotion_type==3){
						listPromotion +='<div class="col-lg-7 col-md-5 col-sm-6 col-xs-7 padding-none">';
					}
					listPromotion +='<label class="padding-none vertical-center">';
					listPromotion +='<input type="radio" id="optionsRadios<?=$i;?>" name="optionsRadios" class="radioz" value="<?=$row->PType;?>" onclick="changePayment2('+credit_get+','+price_new+',this.value)">';
					if(returnPromotion[0].promotion_type==1){
						listPromotion +='<span class="text-black"><?=number_format($row->Credit);?> <img src="/img/zcoin01.png" class="coin-logo" width="12px" height="12px"></img></span>';
					}else if(returnPromotion[0].promotion_type==3){
						listPromotion +='<span class="text-black"><?=number_format($row->Credit);?>+'+value_new+ ' <img src="/img/zcoin01.png" style="margin-top:8px" class="coin-logo" width="12px" height="12px"></img></span>';
					}
					listPromotion +='</label>';
					listPromotion +='</div>';
					if(returnPromotion[0].promotion_type==1){
						listPromotion +='<div class="col-lg-5 col-md-7 col-sm-6 col-xs-5 text-right padding-t4 padding-none"><span class="text-payment2">฿'+price_new+'</span><span class="text-payment2 text-red"> - '+value+'%</span></div>';
					}else if(returnPromotion[0].promotion_type==3){
						listPromotion +='<div class="col-lg-5 col-md-7 col-sm-6 col-xs-5 text-right padding-t4 padding-none"><span class="text-payment2">฿'+price_new+' </span><span class="text-payment2 text-red"> + '+value_show+'%</span></div>';
					}
					listPromotion +='</div>';
					listPromotion +='</div>';
					listPromotion +='<div class="clearfix visible-sm visible-xs"></div>';
					listPromotion +='<div class="height10 visible-sm visible-xs"></div>';
					listPromotion +='<div class="col-xs-12 visible-sm visible-xs padding-none"><hr class="padding-none"></div>';
					listPromotion +='<div class="clearfix visible-sm visible-xs"></div>';
					listPromotion +='<div class="height10 visible-sm visible-xs"></div>';
				<?php
				}
				?>
			}else if(returnPromotion[0].promotion_type==2){//Free Credit
				$('#show_payment').addClass('display-none');
				$('#temp_button').addClass('display-none');
				$('#payment_button').addClass('display-none');
				$('#promotion_button').removeClass('display-none');
				$('#promotion_txt_get').html('เหรียญฟรี');
				listPromotion +='<div class="radio" style="padding-top: 25px;">';
				listPromotion +='<div class="col-xs-12">';
				listPromotion +='<label class="padding-none vertical-center">';
				listPromotion +='<input type="radio" name="optionsRadios_credit" class="radioz" value="'+returnPromotion[0].value+'" checked>';
				listPromotion +='<span class="text-black">ฟรี '+returnPromotion[0].value+' เหรียญ</span>';
				listPromotion +='</label>';
				listPromotion +='</div>';
				listPromotion +='</div>';
			}
			$('#promotion_list').append(listPromotion);
			$('#promotion_code').val(returnPromotion[0].promotion_code);
		}else{
			$('#promotion_warning').removeClass('display-none');
			if(returnPromotion[0].checkCode==0){var txt_alert='Promotion Code นี้เริ่มใช้ได้วันที่ '+returnPromotion[0].start_date_show+' เป็นต้นไป';}
			else if(returnPromotion[0].checkCode==2){var txt_alert='Promotion Code นี้ถูกใช้หมดแล้ว';}
			else if(returnPromotion[0].checkCode==3){var txt_alert='Promotion Code นี้หมดอายุแล้ว';}
			else if(returnPromotion[0].checkCode==4){
				var txt_alert='คุณได้ใช้ Promotion Code นี้ไปแล้ว';
			}
		}
	}
	if(checkpass==0){
		$('#promotion_warning span').html(txt_alert);
		$('#standard').removeClass('display-none');
		$('#show_payment').removeClass('display-none');
		$('#promotion_warning').removeClass('display-none');
		$('#promotion').addClass('display-none');
		$('#promotion_button').addClass('display-none');
		if($('#optionsCondition3').is(':checked')){
			$('#temp_button').addClass('display-none');
			$('#payment_button').removeClass('display-none');
		}else{
			$('#temp_button').removeClass('display-none');
			$('#payment_button').addClass('display-none');
		}
		//$('#promotion_code').val('');
	}
}

function cancelPromoCode(){
	$('#PromoCode').val('');
	$('#standard').removeClass('display-none');
	$('#show_payment').removeClass('display-none');
	$('#promotion_warning').addClass('display-none');
	$('#promotion').addClass('display-none');
	$('#promotion_list').addClass('display-none');
	/*$('#payment_button').removeClass('display-none');
	$('#promotion_button').addClass('display-none');
	$('#promotion_input').addClass('display-none');*/
	$('#promotion_txt').removeClass('display-none');
	$('#promotion_txt_get').html('');
}

function showPaymentTerm(){
	$('#modalCondition4').modal('show');
	$('.payment_txt').addClass('text-red');
	if($('#satang').val()==''){
		$('#warning_txt').html('<h4 class="text-red">กรุณาระบุจำนวนเหรียญที่ต้องการ</h4>');
	}else{
		$('#warning_txt').html('<h4 class="text-red">เลือกยอมรับข้อตกลงในการใช้งาน</h4><h4 class="text-red">ก่อนชำระเงิน</h4>');
	}
}

function checkPaymentTerm(){
    if($('#optionsCondition3').is(':checked') && $('#satang').val()!=''){
		//$('.checkCondition4').removeClass('disabled');
		$('#temp_button').addClass('display-none');
		$('#payment_button').removeClass('display-none');
		$('.payment_txt').removeClass('text-red');
    }else {
		//$('.checkCondition4').addClass('disabled');
		$('#temp_button').removeClass('display-none');
		$('#payment_button').addClass('display-none');
		if($('#satang').val()==''){
			$('#warning_txt').html('<h4 class="text-red">กรุณาระบุจำนวนเหรียญที่ต้องการ</h4>');
		}else{
			$('#warning_txt').html('<h4 class="text-red">เลือกยอมรับข้อตกลงในการใช้งาน</h4><h4 class="text-red">ก่อนชำระเงิน</h4>');
		}
    }
}

function addPromotionCredit(PromoCode){
	$.post('/zhome/addPromotionCredit', {PromoCode : PromoCode,Credit : $('input[name="optionsRadios_credit"]').val()} ,function(res){
		if(res==1){
			location.reload();
		}
	});
}

function usePromotion(PromoCode){
	/*$.post('/zhome/usePromotion', {PromoCode : PromoCode} ,function(res){
	});*/
}


</script>

</html>
