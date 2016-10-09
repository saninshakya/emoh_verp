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
    {'head':'ซื้อ / เช่า จากเจ้าของตัวจริง','sub':'มาตรฐานใหม่ของตลาดบ้านและคอนโดมิเนียม โดยคนไทยเพื่อคนไทย'},
    {'head':'คนไทยขายบ้าน ใช้เวลาเฉลี่ย 363 วัน','sub':'ประเทศพัฒนาแล้วใช้เวลา 27-180 วัน'},
    {'head':'เพราะเราขาดฐานข้อมูลที่สะท้อนสภาพตลาด','sub':'&nbsp;'},
    {'head':'เริ่มจากให้ข้อมูลและภาพถ่ายที่ครบถ้วน','sub':'เพื่อให้ผู้ซื้อซื้อสะดวก ผู้ขายอ้างอิงได้'},
    {'head':'ตั้งราคาให้ดึงดูด & โฆษณาตามที่จำเป็น','sub':'คุณจะ ซื้อ ขาย เช่า ได้อย่างที่ต้องการ <b>"ด้วยตัวคุณ"</b>'}];
	
	
	
	$(function () { 
		
		var index = 0;
		setInterval(function () {
		  $('#hMsg').fadeOut(2000, function() {
        	$('#hMsg').html(headMsg[index].head);
        	$('#hMsg').fadeIn(2000);
    	  });
    	  
    	  
    	  $('#sMsg').fadeOut(2600, function() {
        	$('#sMsg').html(headMsg[index].sub);
        	
        	$('#sMsg').fadeIn(2600);
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