<!--- footer -->
<p id="demo"></p>
<div class="col-md-12 blog-bg-grey">

    <br>
    <div class="col-md-2"></div>
    <div class="col-md-8 text-center"><h3 class="text-white copyright">THE BETTER INFORMATION YOU GIVE,<br>
THE FASTER YOU BUY & SELL</h3>
    </div>
    <div class="col-md-2"></div>
    <div class="clearfix"></div><br>
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
      <ul class="list-inline">
        <li><a href="https://www.facebook.com/ZmyHome-426180034240172" target="_blank"><img src="/img/fb-icon.png"></a></li>
        <li><a href="#"><img src="/img/twitter-icon.png"></a></li>
        <li><a href="#"><img src="/img/gg-icon.png"></a></li>
        <li><a href="#"><img src="/img/up-icon.png"></a></li>
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

  </div>
  <br>
</div>
<!-- end footer -->

<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
       $('.selectpicker').selectpicker();
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type='text/javascript'>

function updateCondoSpec(x)
{
	$.post("/admin/updateCondoSpec", { 'TOCSID': x, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function updatePost(x)
{
	var y = document.getElementById(x).value;
	$.post("/admin/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function val1()
{		
	document.getElementById('key_change').value=1;
	document.getElementById('myform').submit();
}

function val2()
{		
	document.getElementById('key_change').value=3;
	submitFormPage2();
}

function chkNumber(ele)
{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
}

function submitFormPage2()
{
	
	var b=document.getElementById("Address").value;
	var c=document.getElementById("Floor").value;
	var d=Number(document.getElementById("Bedroom").value);
	var e=Number(document.getElementById("Bathroom").value);
	var f=document.getElementById("useArea").value;


<?php 
	 if($this->post->checkPost('TOAdvertising')!="2")
	 { 
?>			
	if (b=="")
	{
		document.getElementById("ShowAddress").className = "error_msg";
	} else {
		document.getElementById("ShowAddress").className = "normal_msg";
	}
<?php
	 };
?>
	if (c=="")
	{
		document.getElementById("ShowFloor").className = "error_msg";
	} else {
		document.getElementById("ShowFloor").className = "normal_msg";
	}

	if (d=="0")
	{
		document.getElementById("ShowBedroom").className = "error_msg";
	} else {
		document.getElementById("ShowBedroom").className = "normal_msg";
	}

	if (e=="0")
	{
		document.getElementById("ShowBathroom").className = "error_msg";
	} else {
		document.getElementById("ShowBathroom").className = "normal_msg";
	}

	if (f=="")
	{
		document.getElementById("ShowuseArea").className = "error_msg";
	} else {
		document.getElementById("ShowuseArea").className = "normal_msg";
	}

<?php 
	 if($this->post->AdminCheckPost('TOAdvertising')!="2")
	 { 
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
		alert('กรุณากรอกข้อมูลให้ครบถ้วน ในช่องสีแดง');
	}
}

</script>

</body>
</html>