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
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
       $('.selectpicker').selectpicker();
</script>
<script type='text/javascript'>

function changeValue2(x)
{
	var y=Number(document.getElementById(x).value);
	if (y==0)
	{
		document.getElementById(x).value=1;
	} else {
		document.getElementById(x).value=0;
	}
	updatePost(x);
}

function updatePost(x)
{
	var y = document.getElementById(x).value;
	$.post("/admin/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function val1(x)
{		
	document.getElementById('key_change').value=x;
	if (x=="6")
	{
		submitFormPage5();
	} else {
		document.getElementById('myform').submit();
	};
}

function chkNumber(ele)
{
	var vchar = String.fromCharCode(event.keyCode);
	if ((vchar<'0' || vchar>'9') && (vchar != '.')) return false;
	ele.onKeyPress=vchar;
}

function submitFormPage5()
{
	var a=document.getElementById("Telephone1").value;
	var b=document.getElementById("Email1").value;

	if (a=="")
	{
		document.getElementById("showTelephone1").className = "error_msg";
	} else {
		document.getElementById("showTelephone1").className = "normal_msg";
	}

	if (b=="")
	{
		document.getElementById("showEmail1").className = "error_msg";
	} else {
		document.getElementById("showEmail1").className = "normal_msg";
	}

	if (a!="" && b!="")
	{
		document.getElementById('myform').submit();
	} else {
		alert('กรุณากรอกข้อมูลให้ครบถ้วน ในช่องสีแดง');
	}
}

</script>

</body>
</html>