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

<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
       $('.selectpicker').selectpicker();
</script>
<script type="text/javascript">
$(document).ready(function(){
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
       $('[data-toggle="tooltip"]').tooltip();   
	}   
});
</script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type='text/javascript'>
function show_tooltip(val){
	//alert(val);
	$(".show_tooltip").on({
		mouseover: function() {
			$("#text_tooltip").text(val);
			$("#show_tooltip").stop().show(1000);
		},

		mouseout: function() {
			$("#text_tooltip").text('');
			$("#show_tooltip").stop().hide(1000);
		}
	})
}

function updateCondoSpec(x){
	$.post("/zhome/updateCondoSpec", { 'TOCSID': x, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function updatePost(x){
	var y = document.getElementById(x).value;
	$.post("/zhome/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function val1(){
	document.getElementById('key_change').value=1;
	document.getElementById('myform').submit();
}

function val2(){
	document.getElementById('key_change').value=3;
	submitFormPage2();
}

function chkNumber(ele){
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
}

function submitFormPage2(){
	var b=document.getElementById("Address").value;
	var c=document.getElementById("Floor").value;
	var d=Number(document.getElementById("Bedroom").value);
	var e=Number(document.getElementById("Bathroom").value);
	var f=document.getElementById("useArea").value;

	<?php
	if($this->post->checkPost('TOAdvertising')!="2"){
	?>			
		if (b==""){
			//document.getElementById("ShowAddress").className = "error_msg";
			$('#ShowAddress').addClass('error_msg');
		} else {
			//document.getElementById("ShowAddress").className = "normal_msg";
			$('#ShowAddress').removeClass('error_msg');
		}
	<?php
	}
	?>
	if (c==""){
		$('#ShowFloor').addClass('error_msg');
	} else {
		$('#ShowFloor').removeClass('error_msg');
	}
	if (d=="0"){
		$('#ShowBedroom').addClass('error_msg');
	} else {
		$('#ShowBedroom').removeClass('error_msg');
	}
	if (e=="0"){
		$('#ShowBathroom').addClass('error_msg');
	} else {
		$('#ShowBathroom').removeClass('error_msg');
	}
	if (f==""){
		$('#ShowuseArea').addClass('error_msg');
	} else {
		$('#ShowuseArea').removeClass('error_msg');
	}

	<?php
		if($this->post->checkPost('TOAdvertising')!="2"){
	?>			
			if (b!="" && c!="" && d!="0" && e!="0" && f!="")
	<?php
		} else {
	?>
			if (c!="" && d!="0" && e!="0" && f!="")
	<?php
		}
	?>
	{
		document.getElementById('myform').submit();
	} else {
		/*if (confirm('คุณกรอกข้อมูลไม่ครบถ้วน ต้องการไปยังหน้าถัดไป')==true){
			document.getElementById('myform').submit();
		}*/
		$('#myModalConfirm').modal('show');
	}
}

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
</body>
</html>