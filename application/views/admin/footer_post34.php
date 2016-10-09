




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
          <small class="text-white">COPYRIGHT © 2015 , Z Estate CO, LTD ALL RIGHTS RESERVED </small>
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
<link rel="stylesheet" type="text/css" media="all" href="/css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<script type="text/javascript" src="/js/jsDatePick.jquery.min.1.3.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
       $('.selectpicker').selectpicker();
</script>
<script type='text/javascript'>

function updateCondoSpec(x)
{
	$.post("/admin/updateCondoSpec", { 'TOCSID': x, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function changeValue(x)
{
	var y=Number(document.getElementById(x).value);
	var HNetPrice=Number(document.getElementById('HNetPrice').value);
	var TotalTax=Number(document.getElementById('TotalTax').value);

	if (y==0)
	{
		document.getElementById(x).value=1;
		var BrokerPrice=HNetPrice*2/100;
		var TotalPriceBroker=HNetPrice+BrokerPrice+TotalTax;
	} else {
		document.getElementById(x).value=0;
		var BrokerPrice=0;
		var TotalPriceBroker=0;
	}
	document.getElementById('BrokerPrice').value=BrokerPrice;
	document.getElementById('TotalPriceBroker').value=TotalPriceBroker;
	updatePost('BrokerPrice');
	updatePost('TotalPriceBroker');

	var useArea=Number(document.getElementById('useArea').value);
	
	document.getElementById("showBrokerPrice").innerHTML = '฿'+formatDollar(BrokerPrice);
	document.getElementById("showTotalPriceBroker").innerHTML = '฿'+formatDollar(TotalPriceBroker);
	document.getElementById("showTotalPriceBroker2").innerHTML = '฿'+formatDollar(TotalPriceBroker/useArea)+'/ตร.ม.';	

}

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

	var HNetPrice=Number(document.getElementById('HNetPrice').value);

	CalTax1(HNetPrice);
	CalTax2(HNetPrice);
	CalTax3(HNetPrice);
	CalTax4();
	CalTotalTax();
	CalTotalPrice();
	showBroker();
}

function changeValue3(x)
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

function showBroker()
{
	var y=Number(document.getElementById('Broker').value);
	var HNetPrice=Number(document.getElementById('HNetPrice').value);
	var TotalTax=Number(document.getElementById('TotalTax').value);

	if (y==1)
	{
		var BrokerPrice=HNetPrice*2/100;
		var TotalPriceBroker=HNetPrice+BrokerPrice+TotalTax;
	} else {
		var BrokerPrice=0;
		var TotalPriceBroker=0;
	}
	document.getElementById('BrokerPrice').value=BrokerPrice;
	document.getElementById('TotalPriceBroker').value=TotalPriceBroker;
	updatePost('BrokerPrice');
	updatePost('TotalPriceBroker');

	var useArea=Number(document.getElementById('useArea').value);

	document.getElementById("showBrokerPrice").innerHTML = '฿'+formatDollar(BrokerPrice);
	document.getElementById("showTotalPriceBroker").innerHTML = '฿'+formatDollar(TotalPriceBroker);
	document.getElementById("showTotalPriceBroker2").innerHTML = '฿'+formatDollar(TotalPriceBroker/useArea)+'/ตร.ม.';
}
function updatePost(x)
{
	var y = document.getElementById(x).value;
	$.post("/admin/updatePost", { 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
}

function val1(x)
{		
	document.getElementById('key_change').value=x;
	document.getElementById('myform').submit();
}

function formatDollar(num) {
    var p = num.toFixed(0).split();
    return  p[0].split("").reverse().reduce(function(acc, num, i, orig) {
        return  num + (i && !(i % 3) ? "," : "") + acc;
    }, "");
}

function CalTax1(x)
{
	var tax1=x*2/100;
	document.getElementById('Tax1').value=tax1;
	updatePost('Tax1');
	document.getElementById("showTax1").innerHTML = '฿'+formatDollar(tax1);

}

function CalTax2(x)
{
	var y=Number(document.getElementById('OwnerYear').value);
	if (y>5)
	{
		var tax1=0;
	} else {
		var tax1=x*3.3/100;
	};

	var a=Number(document.getElementById("Inhabit").value);
	var b=Number(document.getElementById("Inheritance").value);

	if (a==1 || b==1)
	{
		tax1=0;
	};

	document.getElementById('Tax2').value=tax1;
	updatePost('Tax2');
	document.getElementById("showTax2").innerHTML = '฿'+formatDollar(tax1);

}

function CalTax3(x)
{
	var y=Number(document.getElementById('OwnerYear').value);
	if (y>5)
	{
		var tax1=x*0.5/100;
	} else {
		var tax1=0;
	};

	var a=Number(document.getElementById("Inhabit").value);
	var b=Number(document.getElementById("Inheritance").value);

	if (a==1 || b==1)
	{
		tax1=x*0.5/100;
	};

	document.getElementById('Tax3').value=tax1;
	updatePost('Tax3');

}

function CalTax4()
{
	var a=Number(document.getElementById('HNetPrice').value);
	var b=Number(document.getElementById('AssetPrice').value);
	var useArea=Number(document.getElementById('useArea').value);

	if (b==0)
	{
		var x=a;
	} else {
		var x=b;
	};
	document.getElementById("showAssetPrice1").innerHTML = '฿'+formatDollar(x/useArea)+'ตร.ม.';
	document.getElementById("showAssetPrice2").innerHTML = '฿'+formatDollar(x);

	var y=Number(document.getElementById('OwnerYear').value);
	var p=Number(document.getElementById('PercentTax').value);

	var Tax5=(x-(x*p/100));
	document.getElementById('Tax5').value=Tax5;
	updatePost('Tax5');
	document.getElementById("showTax5").innerHTML = '฿'+formatDollar(Tax5);
	document.getElementById("showPercentTax").innerHTML = p;
	document.getElementById("showOwnerYear").innerHTML = y;

	var Tax6=Tax5/y;
	document.getElementById('Tax6').value=Tax6;
	updatePost('Tax6');
	document.getElementById("showTax6").innerHTML = '฿'+formatDollar(Tax6);

	if (Tax6<100000)
	{
		var Tax7=Tax6*5/100;
	} else{
		if (Tax6<500000)
		{
			var Tax7=5000+((Tax6-100000)*10/100);
		} else{
			if (Tax6<1000000)
			{
				var Tax7=45000+((Tax6-500000)*20/100);
			} else {
				if (Tax6<4000000)
				{
					var Tax7=145000+((Tax6-1000000)*30/100);
				} else {
					var Tax7=1045000+((Tax6-4000000)*37/100)
				}
			}
		}
	}
	document.getElementById('Tax7').value=Tax7;
	updatePost('Tax7');
	document.getElementById("showTax7").innerHTML = '฿'+formatDollar(Tax7);

	var Tax4=Tax7*y;
	document.getElementById('Tax4').value=Tax4;	
	updatePost('Tax4');
	document.getElementById("showTax4").innerHTML = '฿'+formatDollar(Tax4);
}

function CalTotalTax()
{
	var a=Number(document.getElementById('Tax1').value);
	var b=Number(document.getElementById('Tax2').value);
	var c=Number(document.getElementById('Tax3').value);
	var d=Number(document.getElementById('Tax4').value);
	if (b!=0)
	{
		document.getElementById('TotalTax').value=a+b+d;
		document.getElementById("showTax3").innerHTML = "ไม่เสียเพราะจ่ายภาษีธุรกิจเฉพาะ";
	} else {
		document.getElementById('TotalTax').value=a+c+d;
		document.getElementById("showTax3").innerHTML = '฿'+formatDollar(c);
	}
	updatePost('TotalTax');

	var TotalTax=Number(document.getElementById('TotalTax').value);

	document.getElementById("showTotalTax").innerHTML = '฿'+formatDollar(TotalTax);
}

function CalTotalPrice()
{
	var a=Number(document.getElementById('HNetPrice').value);
	var b=Number(document.getElementById('TotalTax').value);
	var useArea=Number(document.getElementById('useArea').value);

	document.getElementById('TotalPrice').value=a+b;
	updatePost('TotalPrice');

	var TotalPrice=Number(document.getElementById('TotalPrice').value);

	document.getElementById("avg2").innerHTML = '฿'+formatDollar(TotalPrice);
	document.getElementById("avg3").innerHTML = '฿'+formatDollar(TotalPrice/useArea)+'/ตร.ม.';
}

function changeformat()
{
	var  myMoney=Number(document.getElementById('NetPrice').value);
	
	document.getElementById('HNetPrice').value=myMoney;
	
	var AssetPrice=Number(document.getElementById('AssetPrice').value);

	if (AssetPrice==0)
	{
		document.getElementById('AssetPrice').value=myMoney;
		updatePost('AssetPrice');
	}
	var HNetPrice=Number(document.getElementById('HNetPrice').value);
	var useArea=Number(document.getElementById('useArea').value);
	CalTax1(HNetPrice);
	CalTax2(HNetPrice);
	CalTax3(HNetPrice);
	CalTax4();
	CalTotalTax();
	CalTotalPrice();
	showBroker();
	document.getElementById("avg").innerHTML = '฿'+formatDollar(HNetPrice/useArea)+'/ตร.ม.';
	document.getElementById('NetPrice').value='฿'+formatDollar(myMoney);
}

function changeformat2()
{
	var  myMoney=Number(document.getElementById('showPRentPrice').value);
	document.getElementById('PRentPrice').value=myMoney;
	updatePost('PRentPrice');
	document.getElementById('showPRentPrice').value='฿'+formatDollar(myMoney);
}

function CalOwnerYear()
{
	var x=Number(document.getElementById('OwnerYear').value);
	var HNetPrice=Number(document.getElementById('HNetPrice').value);

	updatePost('OwnerYear');
	if (x==1)
	{
		document.getElementById('PercentTax').value=92;
	}
	if (x==2)
	{
		document.getElementById('PercentTax').value=84;
	}
	if (x==3)
	{
		document.getElementById('PercentTax').value=77;
	}
	if (x==4)
	{
		document.getElementById('PercentTax').value=71;
	}
	if (x==5)
	{
		document.getElementById('PercentTax').value=65;
	}
	if (x==6)
	{
		document.getElementById('PercentTax').value=60;
	}
	if (x==7)
	{
		document.getElementById('PercentTax').value=55;
	}
	if (x>7)
	{
		document.getElementById('PercentTax').value=50;
	}
	updatePost('PercentTax');
	CalTax2(HNetPrice);
	CalTax3(HNetPrice);
	CalTax4();	
	CalTotalTax();
	CalTotalPrice();
	showBroker();
}

function changeAssetPrice()
{
	var x=Number(document.getElementById('AssetPrice2').value);
	var useArea=Number(document.getElementById('useArea').value);
	var HNetPrice=Number(document.getElementById('HNetPrice').value);

	document.getElementById('AssetPrice').value=x*useArea;
	updatePost('AssetPrice');
	CalTax1(HNetPrice);
	CalTax2(HNetPrice);
	CalTax3(HNetPrice);
	CalTax4();
	CalTotalTax();
	CalTotalPrice();
	showBroker();
	document.getElementById("AssetPrice2").value = '฿'+formatDollar(x)+'/ตร.ม.';
}

function enableForm()
{
	var x=Number(document.getElementById('StatusPRent').value);
	if (x==1)
	{
		document.getElementById('PRentNational').disabled=false;
		document.getElementById('PRentEnd').disabled=false;
	} else {
		document.getElementById('PRentNational').disabled=true;
		document.getElementById('PRentEnd').disabled=true;
	}
}


</script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"PRentEnd",
			dateFormat:"%d-%M-%Y"
		});

	};
</script>
</body>
</html>