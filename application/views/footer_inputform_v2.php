<!-- Modal input1-->

<!-- End Modal input1-->
<?
$this->usermenu->inc_file('modal_loader.css','css');
//search Project Name for Condo
$qProject=$this->post->qProject2();
?>

<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>

<script type='text/javascript'>
$('.selectpicker').selectpicker();

<!--Start of Zopim Live Chat Script-->
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?42acETw51qZfzw7TXT4AMPU6BnCJZ6Bf";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
<!--End of Zopim Live Chat Script-->

$('.selectpicker').selectpicker();
$("select option").css('Color', '#000000');

$(document).ready(function(){
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
        $('[data-toggle="tooltip"]').tooltip();   
    }
	
	$('#ProjectName').quickselect({
		maxItemsToShow:10,
		data:[
		<?php
		$endLine=sizeof($qProject);
		$i=0;
		While ($i<$endLine){
			if ($i!=$endLine){
				echo '"'.$qProject[$i].'",';
			} else {
				echo '"'.$qProject[$i].'"';
			}
			$i++;
		}
		?>
		],onItemSelect:function(){updateProjectName();}

	});
});

<!--som added-->
function submitInput1(){
	var chk_showtype1 = document.getElementById('TOAdvertising').value;
	var chk_housetype1=document.getElementById('TOProperty').value;
	if($('#Telephone1').val()!=''){
		$('#showTelephone1').addClass('error_msg');
	}else{
		$('#showTelephone1').removeClass('error_msg');
	}
	if($('#TOOwner').val()!=''){
		$('#ShowTOOwner').addClass('error_msg');
	}else{
		$('#ShowTOOwner').removeClass('error_msg');
	}
	if($('#OwnerName').val()!=''){
		$('#ShowOwnerName').addClass('error_msg');
	}else{
		$('#ShowOwnerName').removeClass('error_msg');
	}
	if($('#TOAdvertising').val()!=''){
		$('#ShowTOAdvertising').addClass('error_msg');
	}else{
		$('#ShowTOAdvertising').removeClass('error_msg');
	}
	if($('#TOProperty').val()!=''){
		$('#ShowTOProperty').addClass('error_msg');
	}else{
		$('#ShowTOProperty').removeClass('error_msg');
	}
	if ((chk_housetype1 == '1') && (chk_showtype1 !== '5')) {
        $('.input1').show();
        $('.input2').hide();
        $('.input3').hide();
        $('.input4').hide();
        $('.input5').hide();
        $('.step1').addClass('active');
        $('.step2').removeClass('active');
        $('.step3').removeClass('active');
        $('.step4').removeClass('active');
        $('.step5').removeClass('active');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $(".showstepleft0").text("เหลือ");
        $(".showstepleft").text("4 ขั้นตอน").fadeIn();
        $('.inputhome2').removeClass('display');
        $('.inputhome2').addClass('display-none');
	}else if ((chk_housetype1 == '1') && (chk_showtype1 == '5')){
        $('.input1').show();
        $('.input2').hide();
        $('.input31').hide();
        $('.input4').hide();
        $('.input5').hide();
        $('.step1').addClass('active');
        $('.step2').removeClass('active');
        $('.step3').removeClass('active');
        $('.step4').removeClass('active');
        $('.step5').removeClass('active');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $(".showstepleft0").text("เหลือ");
        $(".showstepleft").text("4 ขั้นตอน").fadeIn();
        $('.inputhome2').removeClass('display');
        $('.inputhome2').addClass('display-none');
	}else if (chk_housetype1 !== '1') {
        $('.input1').show();
        $('.inputhome2').hide();
        $('.input2').hide();
        $('.inputhome3').hide();
        $('.inputhome4').hide();
        $('.input5').hide();
        $('.step1').addClass('active');
        $('.step2').removeClass('active');
        $('.step3').removeClass('active');
        $('.step4').removeClass('active');
        $('.step5').removeClass('active');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
	} else {
        $('.input1').show();
        $('.inputhome2').hide();
        $('.inputhome3').hide();
        $('.inputhome4').hide();
        $('.input5').hide();
        $('.step1').addClass('active');
        $('.step2').removeClass('active');
        $('.step3').removeClass('active');
        $('.step4').removeClass('active');
        $('.step5').removeClass('active');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
	}
}

function submitInput2()
{     
    var chk_showtype2 = document.getElementById('TOAdvertising').value;
    var chk_housetype2 = document.getElementById('TOProperty').value;
    if ((chk_housetype2 == '1') && (chk_showtype2 !== '5')){
    $('.input1').hide();
    $('.input2').show();
    $('.input3').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').addClass('active');
    $('.step3').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("3 ขั้นตอน").fadeIn();

    } else if ((chk_housetype2 == '1') && (chk_showtype2 == '5')){
    $('.input1').hide();
    $('.input2').show();
    $('.input31').hide();
     $('.input35').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').addClass('active');
    $('.step3').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("3 ขั้นตอน").fadeIn();

    } else if (chk_housetype2 !== '1'){
    $('.input1').hide();
    $('.inputhome2').show();
    $('.inputhome3').hide();
    $('.input3').hide();
    $('.input31').hide();
     $('.input35').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').addClass('active');
    $('.step3').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("3 ขั้นตอน").fadeIn();


     } else 
      {   
        $('.input1').hide();
        $('.inputhome2').show();
        $('.inputhome3').hide();
        $('.inputhome4').hide();
        $('.input5').hide(); 
        $('.step1').removeClass('active');
        $('.step2').addClass('active');
        $('.step3').removeClass('active');
        $('.step4').removeClass('active');
        $('.step5').removeClass('active');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $(".showstepleft0").text("เหลือ");
        $(".showstepleft").text("3 ขั้นตอน").fadeIn();
       }
        
}

function submitInput21()
{   
    var chk_showtype21 = document.getElementById('TOAdvertising').value;
    var chk_housetype21 = document.getElementById('TOProperty').value;
    if ((chk_housetype21 == '1') && (chk_showtype21 !== '5')){
    $('.input1').hide();
    $('.input2').show();
    $('.input3').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').addClass('active');
    $('.step3').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("3 ขั้นตอน").fadeIn();

    } else if ((chk_housetype21 == '1') && (chk_showtype21 == '5')){
    $('.input1').hide();
    $('.input2').hide();
    $('.input31').show();
     $('.input35').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').removeClass('active');
    $('.step3').addClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if ((chk_housetype21 !== '1') && (chk_showtype21 == '5')){
    $('.input1').hide();
    $('.input2').hide();
    $('.inputhome3').show();
     $('.input35').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').removeClass('active');
    $('.step3').addClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if (chk_housetype21 !== '1'){
    $('.input1').hide();
    $('.input2').show();
    $('.inputhome3').hide();
    $('.input3').hide();
    $('.input31').hide();
     $('.input35').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step2').addClass('active');
    $('.step3').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("3 ขั้นตอน").fadeIn();
 
     } else  {   
        $('.input1').hide();
        $('.inputhome2').show();
        $('.inputhome3').hide();
        $('.inputhome4').hide();
        $('.input5').hide(); 
        $('.step1').removeClass('active');
        $('.step2').addClass('active');
        $('.step3').removeClass('active');
        $('.step4').removeClass('active');
        $('.step5').removeClass('active');
        $('html, body').animate({ scrollTop: 0 }, 'fast');
        $(".showstepleft0").text("เหลือ");
        $(".showstepleft").text("3 ขั้นตอน").fadeIn();
       }
        
}
function submitInput3()
{   
   var chk_showtype3 = document.getElementById('TOAdvertising').value; 
   var chk_housetype3 = document.getElementById('TOProperty').value;
   if ((chk_housetype3 == '1') && (chk_showtype3 !== '5') && (chk_showtype3 !== '6')) {

    $('.input1').hide();
    $('.input2').hide();
    $('.input3').show();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if ((chk_housetype3 !== '1') && (chk_showtype3 == '2')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.inputhome2').hide();
    $('.inputhome4').hide();
    $('.input3').show();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if ((chk_housetype3 !== '1') && (chk_showtype3 == '3')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.inputhome2').hide();
    $('.input3').show();
    $('.inputhome4').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if ((chk_housetype3 == '1') && (chk_showtype3 == '5')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.input31').show();
    $('.input35').hide();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if ((chk_housetype3 == '1') && (chk_showtype3 == '6')) {
    
    $('.input1').hide();
    $('.input2').hide();
    $('.input36').show();
    $('.input4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();
    
    } else if ((chk_housetype3 !== '1') && (chk_showtype3 == '6')) {
    
    $('.input1').hide();
    $('.input2').hide();
    $('.inputhome2').hide();
    $('.input36').show();
    $('.input4').hide();
    $('.inputhome4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();


   } else{

    $('.input1').hide();
    $('.inputhome2').hide();
    $('.inputhome3').show();
    $('.inputhome4').hide();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } 
    
}

function submitInput4()
{   
   var chk_housetype4 = document.getElementById('TOProperty').value; 
   var chk_showtype4 = document.getElementById('TOAdvertising').value;


  
   if ((chk_housetype4 == '1') && (chk_showtype4 !== '5') && (chk_showtype4 !== '6')){
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input4').show();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();
   
   } else if ((chk_housetype4 == '1') && (chk_showtype4 == '5')){
    /* ขายพร้อมเช่าของคอนโด step ขาย*/
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input35').show();
    $('.input4').hide();
    $('.inputhome4').hide();
    $('.input5').hide();
    $('html,body').scrollTop(0);
   $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step1').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

   } else if ((chk_housetype4 !== '1') && (chk_showtype4 == '5')){
     /* ขายพร้อมเช่าของบ้าน step ขาย*/
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
     $('.inputhome31').hide(); 
     $('.inputhome3').hide();
    $('.input35').show();
    $('.inputhome4').hide();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step3').addClass('active');
    $('.step2').removeClass('active');
    $('.step1').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("2 ขั้นตอน").fadeIn();

    } else if ((chk_housetype4 !== '1') && (chk_showtype4 == '2')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
     $('.inputhome31').hide(); 
     $('.inputhome3').hide();
    $('.input35').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();

     } else if ((chk_housetype4 !== '1') && (chk_showtype4 == '3')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
    $('.inputhome31').hide(); 
    $('.inputhome3').hide();
    $('.input35').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();

     } else if ((chk_housetype4 == '1') && (chk_showtype4 == '3')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
    $('.inputhome31').hide(); 
    $('.inputhome3').hide();
    $('.input35').hide();
    $('.input4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();

    } else if ((chk_housetype4 == '1') && (chk_showtype4 == '6')){

    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input36').hide();
    $('.inputhome31').hide(); 
    $('.inputhome3').hide();
    $('.input35').hide();
    $('.input4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn(); 
    
    } else if ((chk_housetype4 !== '1') && (chk_showtype4 == '6')){

    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input36').hide();
    $('.inputhome31').hide(); 
    $('.inputhome3').hide();
    $('.input35').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn(); 


    } else {
    $('.input1').hide();
    $('.inputhome2').hide();
    $('.inputhome3').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();
    $('html,body').scrollTop(0);
   }
    
}

function submitInput41()
{   
   var chk_housetype41 = document.getElementById('TOProperty').value; 
   var chk_showtype41 = document.getElementById('TOAdvertising').value;
     /* ขายพร้อมเช่าของคอนโด step เช่า*/
    if ((chk_housetype41 == '1') && (chk_showtype41 == '5')){
 
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input35').hide();
    $('.input4').show();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();
    
    } else if ((chk_housetype41 !== '1') && (chk_showtype41 == '5')){

    /* ขายพร้อมเช่าของบ้าน step เช่า*/
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
    $('.input35').hide();
    $('.inputhome31').hide();
    $('.inputhome3').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $('html,body').scrollTop(0);
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();

     } else if ((chk_housetype41 == '1') && (chk_showtype41 == '3')) {
    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
    $('.inputhome31').hide(); 
    $('.inputhome3').hide();
    $('.input35').hide();
    $('.input4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();

    } else if (chk_housetype41 !== '1') {

    $('.input1').hide();
    $('.input2').hide();
    $('.input3').hide();
    $('.input31').hide();
    $('.inputhome31').hide(); 
    $('.inputhome3').hide();
    $('.input35').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('html,body').scrollTop(0);
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();

   } else {
    $('.input1').hide();
    $('.inputhome2').hide();
    $('.inputhome3').hide();
    $('.inputhome4').show();
    $('.input5').hide();
    $('.step1').removeClass('active');
    $('.step4').addClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step5').removeClass('active');
    $(".showstepleft0").text("เหลือ");
    $(".showstepleft").text("1 ขั้นตอน").fadeIn();
    $('html,body').scrollTop(0);
   }
    
}

function submitInput5()
{
    
    $('.input1').hide();
    $('.input2').hide();
    $('.inputhome2').hide();
    $('.inputhome3').hide();
    $('.inputhome4').hide();
    $('.input3').hide();
    $('.input4').hide();
    $('.input5').show();
    $('.step1').removeClass('active');
    $('.step2').removeClass('active');
    $('.step3').removeClass('active');
    $('.step4').removeClass('active');
    $('.step5').addClass('active');
    $('html, body').animate({ scrollTop: 0 }, 'fast');
    $(".showstepleft0").text("").fadeIn();      
    $(".showstepleft").text("ขั้นตอนสุดท้าย").fadeIn(); 
}

<!--input1-->
$('#TOAdvertising, #TOProperty').on('change',function () {
   var chk_showtype = document.getElementById('TOAdvertising').value;
   var chk_housetype = document.getElementById('TOProperty').value;

   if ((chk_showtype == '1') && (chk_housetype == '1')) {
    $('#t2').addClass('display-none');
    $('#t3').addClass('display-none');
    $('#t4').addClass('display-none');     
    $('#t1').removeClass('display-none');
    $('#t1').addClass('display-transition');    
    $('.input32').removeClass('input3');
    $('.input33').removeClass('input3');
    $('.input35').removeClass('input3');
    $('.input31').addClass('input3');
   } else if ((chk_showtype=='2') && (chk_housetype=='1')) {
    $('.input31').removeClass('input3');
    $('.input35').removeClass('input3');
    $('.input32').addClass('input3');
    $('#t1').addClass('display-none');
    $('#t3').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t2').removeClass('display-none');
    $('#t2').addClass('display-transition');
  
   } else if ((chk_showtype=='2') && (chk_housetype !== '1')) {
    $('.input31').removeClass('input3');
    $('.input35').removeClass('input3');
    $('.input32').addClass('input3');
    $('#t1').addClass('display-none');
    $('#t3').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t2').removeClass('display-none');
    $('#t2').addClass('display-transition');


   } else if ((chk_showtype=='3') && (chk_housetype=='1')) {
    $('#t1').addClass('display-none');
    $('#t2').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t3').removeClass('display-none');
    $('#t3').addClass('display-transition'); 
    $('.input31').removeClass('input3');
    $('.input32').removeClass('input3');
    $('.input35').addClass('input3');

    } else if ((chk_showtype=='3') && (chk_housetype !== '1')) {
    $('#t1').addClass('display-none');
    $('#t2').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t3').removeClass('display-none');
    $('#t3').addClass('display-transition'); 
    $('.input31').removeClass('input3');
    $('.input32').removeClass('input3');
    $('.input35').addClass('input3');


   }  else if ((chk_showtype == '4') && (chk_housetype == '1')) {
    $('#t1').addClass('display-none');
    $('#t2').addClass('display-none');
    $('#t3').addClass('display-none'); 
    $('#t4').removeClass('display-none');
    $('#t4').addClass('display-transition'); 
   
   }  else if ((chk_showtype=='5') && (chk_housetype=='1')) {
    $('#t1').addClass('display-none');
    $('#t2').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t3').removeClass('display-none');
    $('#t3').addClass('display-transition'); 
    $('.input35').removeClass('input3');
    $('.input32').removeClass('input3');
    $('.input31').addClass('input3');

   }  else if ((chk_showtype=='6') && (chk_housetype=='1')) {
    $('#t1').addClass('display-none');
    $('#t2').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t3').removeClass('display-none');
    $('#t3').addClass('display-transition'); 
    $('.input35').removeClass('input3');
    $('.input32').removeClass('input3');
    $('.input31').removeClass('input3');
    $('.input36').addClass('input3');

   }  else if ((chk_showtype=='6') && (chk_housetype !== '1')) {
    $('#t1').addClass('display-none');
    $('#t2').addClass('display-none');
    $('#t4').addClass('display-none'); 
    $('#t3').removeClass('display-none');
    $('#t3').addClass('display-transition'); 
    $('.input35').removeClass('input3');
    $('.input32').removeClass('input3');
    $('.input31').removeClass('input3');
    $('.input36').addClass('input3');
   }


});

$('#TOProperty').on('change',function () {
    if (this.value == '1'){
    $('#house-input').addClass('display-none');
    $('#condo-input').removeClass('display-none');
    $('#condo-input').addClass('display-transition');  

   } else {
    $('#condo-input').addClass('display-none');
    $('#house-input').removeClass('display-none');
    $('#house-input').addClass('display-transition'); 
    } 
});

<!--end input1-->
<!--input2-->
$('#ACarPark').on('change',function () {
    if (this.value !== '0'){
   
    $('#OCarPark').removeClass('is-disabled');

   } else  if (this.value == '0'){
   
    $('#OCarPark').addClass('is-disabled');

   } 
});
<!--end input2-->
<!--input3-->
$('#NetPrice').on('click',function () {
     if (this.value !== '') {
       $('.sqm').removeClass('display-none');
   }

});

$('#salewithtenant').change(function() {
    if(this.checked) {
      $('.salewithtenant-chk').removeClass('display-none');
      $('.salewithtenant-chk').show();
    } else {
      $('.salewithtenant-chk').hide();

    }
});

function rentalstatus() {
     alert();
}
<!--end input3-->

<!--end som added-->

function checkProperty(){
	if($('#TOProperty').val()!=0){
		$('#input1_detail').removeClass('display-none');
	}else{
		$('#input1_detail').addClass('display-none');
	}
}

<!-- Map -->
var markers_map=[];

function runinput(json) {
	if (json[0]=="0"){
		document.getElementById("demo").innerHTML="ไม่พบข้อมูลที่อยู่";
	} else {
		document.getElementById("demo").innerHTML="";
	}
	
	document.getElementById("lat").value=json[0];
	document.getElementById("lng").value=json[1];
	var x = document.getElementById("ProjectName").value;
	var y = document.getElementById("lat").value;
	var z = document.getElementById("lng").value;
	$.post("/zhome/update_ProjectName", { 'ProjectName': x, 'Lat':y, 'Lng':z, 'Token': "<?echo $this->session->userdata('token');?>" });
	if (Number(document.getElementById("lat").value)!=0){
		initMap();
	} else {
		//setTimeout(function(){location ="/zhome/post1";}, 1000);
		
	}
}

function initMap(){
	var x = Number(document.getElementById("lat").value);
	var y = Number(document.getElementById("lng").value);
	var myLatLng = {lat: x, lng: y};
	
	var myOptions = {
		zoom: 18,
		center: myLatLng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title: document.getElementById("ProjectName").value
	});
	
	// add a click event handler to the map object
	google.maps.event.addListener(map, "click", function(event)
	{
		// place a marker
		placeMarker(event.latLng);
	});
}

function placeMarker(location) {
	deleteMarkers();
	var shape = {
		coords: [1, 1, 1, 20, 18, 20, 18, 1],
		type: 'poly'
	};
	
	var marker = new google.maps.Marker({
		position: location,
		map: map,
		icon: {url: '/img/pin-property.png',
			//original size 30x36
			//scaleSize: new google.maps.Size(25, 30),
			origin: new google.maps.Point(0, 0),
			anchor: new google.maps.Point(25, 60)
		},
		animation: google.maps.Animation.DROP,
	});
	
	markers_map.push(marker);
	updateDatabase(location.lat(), location.lng());

	map.setCenter(location);
	//map.setZoom(16);
}

function deleteMarkers() {
	if (markers_map) {
		for (var i = 0; i < markers_map.length; i++) {
			markers_map[i].setMap(null);
		}
		markers_map.length = 0;
	}
}

function clearLatLng(){
	document.getElementById("lat").value=0;
	document.getElementById("lng").value=0;	
}
<!-- End Map -->

function checkPostNew(){
	$.post('/zhome/checkPostNew', {TOProperty : $('#TOProperty').val()} ,function(res){
		if(res==1){
			$('#post_record').val(1);
			if($('#TOProperty').val()==1){
				updateProjectName();
			}else{
				updatePost('HouseName');
			}
		}
	});
}

<!-- Update Post Data -->
function updateProjectName(){
	var x = $('#ProjectName').val();
	clearLatLng();
	updatePost('ProjectName');
	//$('#showProjectName').html(x);
	//document.getElementById("showProjectName").innerHTML=x;
	$.getJSON("/zhome/LatLngProject",{ id: x },runinput);
}

function updatePost(x){
	if($('#post_record').val()==0){
		checkPostNew();
	}else{
		var TOProperty=$('#TOProperty').val();
		if(x=='TOAdvertising'){
			if($('#'+x).val()==3){
				var y=5;
			}else if($('#'+x).val()==5){
				var y=7;
			}
		}else{
			var y = document.getElementById(x).value;
		}
		$.post("/zhome/updatePost", { 'TOProperty':TOProperty, 'Type': x, 'Value':y, 'Token': "<?echo $this->session->userdata('token');?>" });
	}
}
</script>