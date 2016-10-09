<!--- footer -->
<div class="col-md-12 blog-bg-grey">

    <br>
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center">
		<!--<h3 class="text-white copyright">THE BETTER INFORMATION YOU GIVE,<br>THE FASTER YOU BUY & SELL</h3>-->
		<h3 class="text-white copyright">ZmyHome คอนโดเจ้าของขายเอง ให้เช่าเอง<br>ซื้อง่าย ขายคล่อง เชื่อถือได้</h3>
    </div>
    <div class="col-md-2"></div>
    <div class="clearfix"></div><br>
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
      <ul class="list-inline">
        <li><a href="https://www.facebook.com/ZmyHome-426180034240172" target="_blank"><img src="http://static.zmyhome.com/img/fb-icon.png"></a></li>
        <li><a href="#"><img src="http://static.zmyhome.com/img/twitter-icon.png"></a></li>
        <li><a href="#"><img src="http://static.zmyhome.com/img/gg-icon.png"></a></li>
        <li><a href="#"><img src="http://static.zmyhome.com/img/up-icon.png"></a></li>
      </ul>
    </div>
    <div class="col-md-4"></div>

    <div class="col-md-10">
        <p>
          <small class="text-white">COPYRIGHT © 2015 , Z Home, LTD ALL RIGHTS RESERVED </small>
        </p>
    </div>
    <div class="col-md-2">
          <div class="col-xs-2 pull-right"><small class="text-white">Security</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Terms</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Privacy</small></div>
          <div class="col-xs-2 pull-right"><small class="text-white">Policy</small></div>
        </div>
    </div>


  <br>
</div>
<!-- end footer -->
<link rel="stylesheet" type="text/css" media="all" href="/css/jsDatePick_ltr.min.css" />
<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/js/jsDatePick.jquery.min.1.3.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script type='text/javascript'>
$('.selectpicker').selectpicker();

function changeValue(x){
	var y=Number(document.getElementById(x).value);
	var DTotalPrice=Number(document.getElementById('DTotalPrice').value);

	if (y==0){
		document.getElementById(x).value=1;
		var DBrokerPrice=DTotalPrice*2/100;
		var DBrokerTotalPrice=DTotalPrice+DBrokerPrice;
	} else {
		document.getElementById(x).value=0;
		var DBrokerPrice=0;
		var DBrokerTotalPrice=0;
	}
	document.getElementById('DBrokerPrice').value=DBrokerPrice;
	document.getElementById('DBrokerTotalPrice').value=DBrokerTotalPrice;
	updatePost('DBrokerPrice');
	updatePost('DBrokerTotalPrice');

	document.getElementById("showDBrokerTotalPrice").innerHTML = '฿'+formatDollar(DBrokerTotalPrice);
	document.getElementById("showDBrokerPrice").innerHTML = '฿'+formatDollar(DBrokerPrice);

}

function changeValue2(x){
	var y=Number(document.getElementById(x).value);

	if (y==0){
		document.getElementById(x).value=1;
	} else {
		document.getElementById(x).value=0;
	}
	updatePost(x);
}

function updatePost(x){
	var y = document.getElementById(x).value;
	$.post("/zhome/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function updatePostDCondo(x){
	var y = document.getElementById(x).value;
	$.post("/zhome/updatePostDCondo", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function val1(x){
	document.getElementById('key_change').value=x;
	if (x=="4"){
		submitFormPage3();
	} else {
		document.getElementById('myform').submit();
	}
}

function formatDollar(num) {
    //alert(num);
    var p = num.toFixed(0).split();
    return  p[0].split("").reverse().reduce(function(acc, num, i, orig) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "");
}

function changeFormat(x,y){
	var myMoney=document.getElementById(x).value;
	if(myMoney==''){
		myMoney=0;
	}else{
		myMoney=parseInt(myMoney.replace(/\,/g,''));
	}
	if (myMoney<0){
		myMoney=myMoney*(-1);
	}
	document.getElementById(y).value=myMoney;
	updatePost(y);
	document.getElementById(x).value='฿'+formatDollar(myMoney);
}

function changeFormat5(x){
	var myMoney=document.getElementById(x).value;
	myMoney=parseInt(myMoney.replace(/\,/g,''));
	if (myMoney<0){
		myMoney=myMoney*(-1);
	}
	document.getElementById(x).value='฿'+formatDollar(myMoney);
}

function calDTotalPrice(){
	var a=document.getElementById('DNetPrice').value;
	var b=document.getElementById('DProfitPrice').value;
	var c=document.getElementById('DChangeContractPrice').value;
	var d=document.getElementById('PrefixDProfitPrice').value;
	var z=Number(document.getElementById('totalArea').value);
	a=parseInt(a.replace(/\,/g,''));
	b=parseInt(b.replace(/\,/g,''));
	c=parseInt(c.replace(/\,/g,''));
	d=parseInt(d.replace(/\,/g,''));
	if (d==0){//ขาดทุน
		b=b*(-1);
	}else if(d==2){//เท่าทุน
		b=0;
	} else if(d==1){

  } else {
    b=0;
  }
	var TotalPrice=a+b+c;
  //alert(TotalPrice);
	//var TotalPrice=a+b;
	var PricePerSq=TotalPrice/z
	document.getElementById('DTotalPrice').value=TotalPrice;
	updatePost('DTotalPrice');
	document.getElementById('PricePerSq').value=PricePerSq;
	updatePost('PricePerSq');

	document.getElementById('showDTotalPrice').innerHTML='฿'+formatDollar(TotalPrice);
	document.getElementById('showPricePerSq').innerHTML='฿'+formatDollar(PricePerSq);
	calDDownTotalPrice()
	calDTransfer();

	var DTotalPrice=Number(document.getElementById('DTotalPrice').value);
	if ($('#DBroker').is(':checked')){
		var DBrokerPrice=DTotalPrice*2/100;
		var DBrokerTotalPrice=DTotalPrice+DBrokerPrice;
	}
	document.getElementById('DBrokerPrice').value=DBrokerPrice;
	document.getElementById('DBrokerTotalPrice').value=DBrokerTotalPrice;
	updatePost('DBrokerPrice');
	updatePost('DBrokerTotalPrice');

	document.getElementById("showDBrokerTotalPrice").innerHTML = '฿'+formatDollar(DBrokerTotalPrice);
	document.getElementById("showDBrokerPrice").innerHTML = '฿'+formatDollar(DBrokerPrice);
}

function calDDownTotalPrice(){
	var a=Number(document.getElementById('DProfitPrice').value);
	var e=Number(document.getElementById('DChangeContractPrice').value);
//	var x=Number(document.getElementById('DBookStatus').value);
//	var y=Number(document.getElementById('DContractStatus1').value);
	var d=Number(document.getElementById('PrefixDProfitPrice').value);
	var f=Number(document.getElementById('DReadyPayment').value);
	var c=Number(document.getElementById('DBookPrice').value);
	var g=Number(document.getElementById('DContractPrice1').value);
	if (d==0){
		a=a*(-1);
	}
//	if (x==1)
//	{
//		var c=Number(document.getElementById('DBookPrice').value);
//	} else {
//		var c=0;
//	};
//	if (y==1)
//	{
//		var g=Number(document.getElementById('DContractPrice1').value);
//	} else {
//		var g=0;
//	}
	var DDownTotalPrice=a+c+g+e+f;
	document.getElementById('DDownTotalPrice').value=DDownTotalPrice;
	updatePost('DDownTotalPrice');
	document.getElementById('showDDownTotalPrice').innerHTML='฿'+formatDollar(DDownTotalPrice);
	calDTransfer();
	calDStalePayment();
}

function calDStalePayment(){
	var a=Number(document.getElementById('DNetPrice').value);
	var b=Number(document.getElementById('DReadyPayment').value);
	var c=Number(document.getElementById('DTransferPayment').value);
	var z=a-b-c;

	document.getElementById('DStalePayment').value=z;
	updatePost('DStalePayment');
	document.getElementById('showDStalePayment').innerHTML=' เหลือผ่อนดาวน์ ฿'+formatDollar(z);
	document.getElementById('showDStalePayment2').innerHTML='฿'+formatDollar(z);
	showDTransferPayment2();
}

function chkNumber(ele){
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
}

function calDTransfer(){
	var a=Number(document.getElementById('DNetPrice').value);
	var b=Number(document.getElementById('DDownPrice').value);
	var c=Number(document.getElementById('DBookPrice').value);
	var d=Number(document.getElementById('DContractPrice1').value);
	var DTransfer=a-b-c-d;
	document.getElementById('DTransfer').value=DTransfer;
	updatePost('DTransfer');
}

function changeStatus(){
	var a=Number(document.getElementById('DDownPaymentStatus').value);
	if (a==3){
		document.getElementById('DDownPaymentStale').disabled=false;
	} else {
		document.getElementById('DDownPaymentStale').disabled=true;
	}
}

function showDStalePaymentMonth(){
	var a=Number(document.getElementById('DStalePaymentMonth').value);
	document.getElementById('showDStalePaymentMonth').innerHTML=a;
}

function calDAllPayment(){
	var a=Number(document.getElementById('DAllPayment').value);
	var b=Number(document.getElementById('DNetPrice').value);
	var c=b-a;
	document.getElementById('DTransferPayment').value=c;
	updatePost('DTransferPayment');
	document.getElementById('showDTransferPayment3').innerHTML='ยอดโอน ฿'+formatDollar(c);
}

function showDTransferPayment2(){
	var a=Number(document.getElementById('DTransferPayment').value);
	document.getElementById('showDTransferPayment2').innerHTML='฿'+formatDollar(a);
}

var prevTotal = $('#DDownSeparatePayment').val();
$('#DDownSeparatePayment').change(createFormNode);
function createFormNode(){

	var total = $('#DDownSeparatePayment').val();
	total = parseInt(total);
	prevTotal = parseInt(prevTotal);
	if(total<prevTotal){
		deleteFormNode(total,prevTotal);
		return;
	}
	var formNode="";
	var start = prevTotal+1;


	var i = start;
	while(i<=total){
		formNode = '<div class="row" id="ddownSPay'+i+'">';

		formNode += '<div class="col-md-4">';
		formNode += '<p>ผ่อนดาวน์งวดที่ '+i+'(บาท)</p>';
		formNode += '<input type="text" class="form-control input-md" name="DP'+i+'" id="DP'+i+'" value="" >';
		formNode += '</div>';

		formNode += '<div class="col-md-4">';
		formNode += '<p>วันที่</p>';
		formNode += '<input class="form-control input-md" type="text" name="DD'+i+'" id="DD'+i+'" >';
		formNode += '</div>';

		formNode += '<div class="col-md-4">';
		formNode += '<p>ประวัติการชำระ</p>';
		formNode += '<select class="form-control input-md" name="DH'+i+'" id="DH'+i+'">';
		formNode += '<option value="1">ชำระตรงเวลา</option>';
		formNode += '<option value="2">ชำระล่าช้าเล็กน้อย</option>';
        formNode += '<option value="3">ค้างชำระ</option>';
        formNode += '</select>';
        formNode += '</div>';

		formNode +=	'</div>';

		if(i==1){
			$('#ddownSpayHid').after(formNode);
		}else{
			$('#ddownSPay'+(i-1)).after(formNode);
		}
		new JsDatePick({
			useMode:2,
			target:"DD"+i,
			dateFormat:"%d-%M-%Y"
		});
		$('#DP'+i).change(dpChange);
		$('#DP'+i).click(dpClick);
		$('#DD'+i).blur(ddBlur);
		$('#DH'+i).change(dhChange);
		i++;
	}

	prevTotal = total;

}

function ddBlur(evt){
	var id = evt.target.id;
	setTimeout(function(){updatePostDCondo(id)}, 500);
}

function dpChange(evt){
	var id = evt.target.id;
	updatePostDCondo(id);
	setTimeout(function(){changeFormat5(id);}, 100);
}

function dhChange(evt){
	var id = evt.target.id;
	updatePostDCondo(id);
}

function deleteFormNode(t,p){
	for(var i=p;i>t;i--){
		$('#ddownSPay'+i).remove();
	}
	prevTotal = t;
}

function dpClick(evt){
	this.value = '';
}

function submitFormPage3(){
	var a=document.getElementById("DNetPrice").value;
	var b=Number(document.getElementById("AgreePostDay").value);
	var c=Number(document.getElementById("PrefixDProfitPrice").value);
	var d=document.getElementById("DProfitPrice").value;

	if (a=="" || a=="0"){
		document.getElementById("showDNetPrice9").className = "error_msg";
	} else {
		document.getElementById("showDNetPrice9").className = "normal_msg";
	}
	if (b=="0"){
		document.getElementById("showAgreePostDay9").className = "error_msg";
	} else {
		document.getElementById("showAgreePostDay9").className = "normal_msg";
	}
	if (c=="3"){
		document.getElementById("showPrefixDProfitPrice9").className = "error_msg";
	} else {
		document.getElementById("showPrefixDProfitPrice9").className = "normal_msg";
	}
	if (d==""){
		document.getElementById("showDProfitPrice9").className = "error_msg";
	} else {
		document.getElementById("showDProfitPrice9").className = "normal_msg";
	}

	if (a!="" && a!="0" && b!="0" && c!="3" && d!=""){
		document.getElementById('myform').submit();
	} else {
		/*if (confirm('คุณกรอกข้อมูลไม่ครบถ้วน ต้องการไปยังหน้าถัดไป')==true){
			document.getElementById('myform').submit();
		}*/
		$('#myModalConfirm').modal('show');
	}
}

</script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"DBookDate",
			dateFormat:"%d-%M-%Y"
		});
		new JsDatePick({
			useMode:2,
			target:"DContractDate1",
			dateFormat:"%d-%M-%Y"
		});
		new JsDatePick({
			useMode:2,
			target:"DContractDate2",
			dateFormat:"%d-%M-%Y"
		});
		new JsDatePick({
			useMode:2,
			target:"DContractDate3",
			dateFormat:"%d-%M-%Y"
		});

	};
	<?php
	$i=1;
	$Total=$this->post->checkPost('DDownSeparatePayment');
	while ($i<=$Total){

?>
		new JsDatePick({
			useMode:2,
			target:"DD<?=$i?>",
			dateFormat:"%d-%M-%Y"
		});
<?php
		$i++;
	};
?>

function show_title(txt){
	if(txt!=''){
		$('#title_detail').text(txt);
		$('#title_panel').show();
	}
}

function hide_title(){
	$('#title_panel').hide();
	$('#title_detail').text('');
}
</script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?42acETw51qZfzw7TXT4AMPU6BnCJZ6Bf";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->

<!--
	<?php
	$i=1;
	$Total=$this->post->checkPost('DDownSeparatePayment');
	while ($i<=$Total){

?>
		new JsDatePick({
			useMode:2,
			target:"DD<?=$i?>",
			dateFormat:"%d-%M-%Y"
		});
<?php
		$i++;
	};
?>
-->
</body>
</html>
