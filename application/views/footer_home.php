<!--- footer -->
<!--<p id="demo"></p>-->

<!-- Modal Ad Promote -->
<div class="modal modalfade display-none modal-AdPromote no-border" id="AdPromoteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-right: auto;margin-left: auto;overflow: hidden;">
  <div class="modal-header modal-header-AdPromote" style="z-index:100000000000;"> 
    <div type="button" class="close padding-none text-black" data-dismiss="modal" aria-label="Close"><div aria-hidden="true" class="text-black padding-none font40" style="padding:3px 3px 0px 3px">&times;</div></div>
  </div>
 
   
	<div class="modal-dialog cursor modal-AdPromote-blank" role="document" onclick="location.href='/zhome/ad/'"  style="opacity:0; overflow: hidden!important;">
		<div class="modal-content text-cente no-border"  style="opacity:0; overflow: hidden!important;">
			
			<div class="modal-body padding-none"  style="opacity:0; overflow:hidden!important;">
				
			</div>
		</div>
	</div>
</div>
<!--End-->
     
	 <script type='text/javascript' src='/js/quicksilver.min.js'></script>
	 <script type='text/javascript' src='/js/jquery.quickselect.min.js'></script>
<?php 
//if (!$this->agent->is_browser('Safari'))
//{
$qMarker=$this->search->qMarker();
$showAd=$this->session->userdata('showAd');
if($showAd=='' or $showAd=='null' or $showAd==null){
	$showAd=0;
}
?>
<script type="text/javascript">
$(window).load(function(){
	<?if($showAd=='0'){?>
	$('#AdPromoteModal').modal('show');
	<?$this->session->set_userdata('showAd','1');}?>
});

$('#namePoint').quickselect({
	maxItemsToShow:10,
	exactMatch:true,
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
	],
	  	  /*onItemSelect:function(){
	  	var val = $('#namePoint').val();
	  	$('#namePoint').val(val);
	  }*/
	   //exactMatch:true,
	  //onItemSelect:function(){alert(this);},
	
	  
});

	var checkValNamePoint=[
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
	];
	  
	$('#btnSubmit').click(function(e){
		//alert($('#namePoint').val());
 	if($('#namePoint').val()){
 		$('#myform').submit();
 	}else{
 		e.preventDefault();
 		return false;
 	}
 });
   	$("#myform").submit(function(e) {
		if ($.inArray( $('#namePoint').val(), checkValNamePoint ) > -1){
			$(this)[0].submit();
		}else{
			e.preventDefault();
			return false;
		}
	});
	
	
	var headMsg = [
    {'head':'บ้าน คอนโด เจ้าของขายเอง','sub':'แนวคิดใหม่ของการซื้อ-เช่าบ้าน เพื่อคนไทย'},
    {'head':'คนไทยใช้เวลาขายบ้านเฉลี่ย 343 วัน*','sub':'ประเทศพัฒนาแล้วใช้เวลา 27-55 วัน*'},
    {'head':'เริ่มจากให้ข้อมูลและภาพครบถ้วน','sub':'ขายตามราคาประกาศ ไม่ลงซ้ำ และอัพเดทเสมอ'},
    {'head':'คุณขายหรือเช่าได้ฟรี','sub':'เพียงลงประกาศอย่างมีคุณภาพ และให้ข้อมูลที่มีประโยชน์'},
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
   		
   /*		$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });*/
 

		
	});
    </script>
<?php
//};
?>
<script type="text/javascript">
$(".buy-button").click(function(){
	$("#b1, #b2").toggleClass( "buy-button", 1000, "rent-button" );
	$("#b2, #b1").toggleClass( "rent-button", 1000, "buy-button" );
});

$(".rent-button").click(function(){
	$("#b2, #b1").toggleClass( "rent-button", 1000, "buy-button" );
	$("#b1, #b2").toggleClass( "buy-button", 1000, "rent-button" );
});

$("#dp-show").click(function(){
	$('#dp-show').addClass('display-none');
	$('#dp-hide').removeClass('display-none');
	$('.moreshow').removeClass('display-none');
});
$("#dp-hide").click(function(){
	$('#dp-show').removeClass('display-none');
	$('#dp-hide').addClass('display-none');
	$('.moreshow').addClass('display-none');
});

$("#dp-show2").click(function(){
	$('#dp-show2').addClass('display-none');
	$('#dp-hide2').removeClass('display-none');
	$('.moreshow2').removeClass('display-none');
});
$("#dp-hide2").click(function(){
	$('#dp-show2').removeClass('display-none');
	$('#dp-hide2').addClass('display-none');
	$('.moreshow2').addClass('display-none');
});
$(".btn-signupEmail").click(function(){
	$('#signupModal').hide();
});

    

<!--Start of Zopim Live Chat Script-->
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?42acETw51qZfzw7TXT4AMPU6BnCJZ6Bf";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
<!--End of Zopim Live Chat Script-->
</script>

</body>
</html>