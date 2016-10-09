<!--- footer -->
<!--<p id="demo"></p>-->

     <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
     <script type="text/javascript" src="/js/bootstrap.min.js"></script>
	 <script type='text/javascript' src='/js/quicksilver.js'></script>
	 <script type='text/javascript' src='/js/jquery.quickselect.js'></script>
<?php 
//if (!$this->agent->is_browser('Safari'))
//{
	$qMarker=$this->search->qMarker();
?>
    <script>

    $('#namePoint').quickselect({
      maxItemsToShow:10,
      data:[
		  
<?php
		$endLine=sizeof($qMarker); 
		$i=0;
		While ($i<$endLine)
		{
			if ($i!=$endLine){
				echo '"'.$qMarker[$i].'",';
			} else {
				echo '"'.$qMarker[$i].'"';
			}
			$i++;
		}
?>
	  ]
	  
	});
	
	var headMsg = [
    {'head':'บ้าน คอนโด เจ้าของขายเอง','sub':'แนวคิดใหม่ของการซื้อ-เช่าบ้าน เพื่อคนไทย'},
    {'head':'คนไทยใช้เวลาขายบ้านเฉลี่ย 363 วัน*','sub':'ประเทศพัฒนาแล้วใช้เวลา 27-55 วัน*'},
    {'head':'เริ่มจากให้ข้อมูลและภาพครบถ้วน','sub':'ขายตามราคาประกาศ ไม่ลงซ้ำ และอัพเดทเสมอ'},
    {'head':'คุณขายหรือเช่าได้ฟรี','sub':'เพียงประกาศอย่างที่มีคุณภาพ และให้ข้อมูลที่มีประโยชน์'},
    {'head':'ซื้อ ขาย เช่า ได้ตามต้องการ','sub':'"ด้วยตัวคุณ" และ "ZmyHome"'}];
	
	
	
	$(function () { 
		
		var index = 0;
		setInterval(function () {
		  $('#hMsg').fadeOut(2000, function() {
        	$('#hMsg').html(headMsg[index].head);
        	$('#hMsg').fadeIn(2000);
    	  });
    	  
    	  
    	  $('#sMsg').fadeOut(2000, function() {
        	$('#sMsg').html(headMsg[index].sub);
        	
        	$('#sMsg').fadeIn(2000);
    	  });
    	  if(index<(headMsg.length-1)){
    	  	index++;
    	  }else{
    	  	index = 0;
    	  }
   		},7000);
		
	});
    </script>
<?php
//};
?>

</body>
</html>