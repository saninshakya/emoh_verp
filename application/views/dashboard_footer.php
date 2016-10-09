	</div>
</div>

<input type="hidden" id="mobile_detect" value="0">
<input type="hidden" id="modal_token" value="">
<input type="hidden" id="modal_poid" value="">
<input type="hidden" id="modal_pic" value="">
<input type="hidden" id="modal_numexpire" value="">
<input type="hidden" id="modal_dateexpire" value="">
<input type="hidden" id="viewtelstatus" value="0">
<input type="hidden" id="TelephoneShow2" value="">
<?php
$FackbookID=$this->search->getFacebookID();
?>
<div id="fb-root"></div>


<script>
window.fbAsyncInit = function() {
  FB.init({
	appId                : "<?=$FackbookID;?>",
	status               : true, // check login status
	cookie               : true, // enable cookies to allow the server to access the session
	xfbml                : false,  // parse XFBML
	perms                : 'read_stream',
	access_token         : "USER ACCESS TOkEN",
	frictionlessRequests : true
  });
};

// Load the SDK Asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript">
$(document).ready(function() {
	//Check Mobile Device
	(function(a,b){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))$('#mobile_detect').val(b)})(navigator.userAgent||navigator.vendor||window.opera,'1');
});

function updateFavorite(POID){
	var user="<?echo $this->session->userdata('user_id');?>";
	if(!user){
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		fav_status=0;
		$.post("/zhome/updateFavorite", { 'POID':POID,'user_id':"<?echo $this->session->userdata('user_id');?>",'Token':"<?echo $this->session->userdata('token');?>",'favourite_status': fav_status });
		location.reload(true);
	}
}

function updateFavorite2(POID){
	var user="<?echo $this->session->userdata('user_id');?>";
	var fav=$('#favourite_check_'+POID).val();
	if(!user){
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		if(fav=='1'){
			$('#favourite_check_'+POID).val(0);
			$('#favourite_show_'+POID).removeClass('text-pink');
			$('#favourite_show_'+POID).addClass('text-white');
			fav_status=0;
		}else{
			$('#favourite_check_'+POID).val(1);
			$('#favourite_show_'+POID).removeClass('text-white');
			$('#favourite_show_'+POID).addClass('text-pink');
			fav_status=1;
		}
		$.post("/zhome/updateFavorite", { 'POID':POID,'user_id':"<?echo $this->session->userdata('user_id');?>",'Token':"<?echo $this->session->userdata('token');?>",'favourite_status': fav_status });
	}
}

function checkShowTel(POID,viewTelStatus,TelephoneShow){
	$('#modal_poid').val(POID);
	$('#viewtelstatus').val(viewTelStatus);
	$('#TelephoneShow2').val(TelephoneShow);
	if(viewTelStatus==0){
		$('#myModal3').modal('show');
	}else{
		$('#ownerTel'+POID).html($('#TelephoneShow2').val());
		$('#ownerTel_mb'+POID).html($('#TelephoneShow2').val());
		$.post('/zhome/recordViewTel', {POID : POID} ,function(res){
		});
	}
}

function getOwnerPhone(){
	var POID=$('#modal_poid').val();
	var viewtel=$('#viewtelstatus').val();
	var getOPhone = $.getJSON("/zhome/getOwnerNumber",{ POID:POID}, function(json) {
	  console.log( "success" );
	})
	.done(function() {
		console.log( "second success" );
	})
	.fail(function() {
		console.log( "error" );
	})
	.always(function(json) {
		var tresult = json;
		setShowTel(POID,tresult);
		console.log( "complete" );
	});
}

function setShowTel(POID,tel){
	if(tel==0){
		//alert('คุณใช้สิทธ์ดูเบอร์โทรหมดแล้ว\nแชร์ ZmyHome เพื่อดูเพิ่มวันนี้อีก 1 ครั้ง');
		$('#txt_freecall').addClass('display-none');
		$('#txt_quotacall').removeClass('display-none');
		$('#modal_submit').addClass('display-none');
		$('#modal_share').removeClass('display-none');
	}else if(tel==-1){
		if(confirm('คุณยังไม่ได้ login เข้าระบบ\nต้องการ login เข้าระบบเลยหรือไม่?')){
			window.location.replace("/auth/login/");
		}
	}else{
		var tel1 = tel.substring(0,3);
		var tel2 = tel.substring(3,6);
		var tel3 = tel.substring(6,tel.length);
		var telformat = tel1+"-"+tel2+"-"+tel3;
		$('#ownerTel'+POID).text(telformat);
		$('#ownerTel'+POID).prop('disabled',true);
		$('#ownerTel_mb'+POID).text(telformat);
		$('#ownerTel_mb'+POID).prop('disabled',true);
		$('#txt_freecall').removeClass('display-none');
		$('#txt_quotacall').addClass('display-none');
		$('#myModal3').modal('hide');
	}
}

function shareOnFacebook(){
	var POID=$('#modal_poid').val();
	var link_url="http://www.zmyhome.com/zhome/unitDetail2/"+POID;
	var link_pic=$('#modal_pic').val();
	var pic="http://www.zmyhome.com"+link_pic;
	FB.ui({
		method : 'share',
		display : 'iframe',
		//name : 'ZmyHome',
		//link : link_url,
		//picture : pic,
		//access_token : 'user access token',
		href : link_url,
	},function(response){
		if (response && response.post_id) {
			// HERE YOU CAN DO WHAT YOU NEED
			alert('OK! User has published on Facebook.');
			$.post("/zhome/add_view_facebook");
			$('#myModal3').modal('hide');
			//getOwnerPhone();
		} else {
			alert('Post was not published.');
		}
	});
}

function submitFormHelpdesk(){
	var a=document.getElementById("modal_poid").value;
	var b=document.getElementById("pfullname").value;
	var c=document.getElementById("pemail").value;
	var d=document.getElementById("ptelphone").value;
	var e=document.getElementById("ptype").value;
	var f=document.getElementById("pdetail").value;

	if (b=="")
	{
		document.getElementById("pfullname").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pfullname").style.borderColor = "#CCCCCC";
	}
	if (c=="")
	{
		document.getElementById("pemail").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pemail").style.borderColor = "#CCCCCC";
	}
	if (d=="")
	{
		document.getElementById("ptelphone").style.borderColor = "#FF0000";
	} else {
		document.getElementById("ptelphone").style.borderColor = "#CCCCCC";
	}
	if (e=="")
	{
		document.getElementById("ptype").style.borderColor = "#FF0000";
	} else {
		document.getElementById("ptype").style.borderColor = "#CCCCCC";
	}
	if (f=="")
	{
		document.getElementById("pdetail").style.borderColor = "#FF0000";
	} else {
		document.getElementById("pdetail").style.borderColor = "#CCCCCC";
	}

	if (b!="" && c!="" && d!="" && e!="" && f!="")
	{
		$('#ckproblem').hide();
		$.post("/zhome/add_Helpdesk", { 'poid':a, 'informer_name': b, 'informer_email':c, 'informer_telphone':d, 'problem_type':e, 'informer_detail':f });
		$('#myModal').modal('hide');
	} else {
		$('#ckproblem').show();
		return false;
	}
}

function submitFormLineAlert(){
	var sline='';
	var POID=$('#modal_poid').val();
	$('.LineAlert:checked').each(function(){
		var line = $(this).val();
		sline += line+',';
	});
	if($('#mobile_detect').val()==1){
		$('#line_add_pc').addClass('display-none');
		$('#line_add_mb').removeClass('display-none');
	}else{
		$('#line_add_pc').removeClass('display-none');
		$('#line_add_mb').addClass('display-none');
	}

	if (sline!=""){
		$.post("/zhome/add_LineAlert", {'POID':POID,'Alert_id':sline });
		$('#line_add').removeClass('display-none');
		$('#line_alert').addClass('display-none');
		$('.LineAlert:checkbox').removeAttr('checked');
		$('#myModal2').on('hidden.bs.modal', function () {
			$('#line_add').addClass('display-none');
			$('#line_alert').removeClass('display-none');
		})
	} else {
		return false;
	}
}

function getFromLineAlert($POID){

}

function updateUnit(){
	var Token=$('#modal_token').val();
	var select_month=$('#select_month').val();
	var select_year=$('#select_year').val();
	location.href='/zhome/closepost/'+Token+'/'+select_month+'/'+select_year;
}

function hideMobile(){
	var Token=$('#modal_token').val();
	location.href='/zhome/hpost/'+Token;
}

function showMobile(){
	var Token=$('#modal_token').val();
	location.href='/zhome/unhpost/'+Token;
}

function updateDate(){
	var Token=$('#modal_token').val();
	var select_day=$('#select_day').val();
	location.href='/zhome/AddDateExpire/'+Token+'/'+select_day;
}

function sendModalExpire(){
	var txt_date='ประกาศจะหมดอายุวันที่ '+$('#modal_dateexpire').val();
	var txt_date2='(เหลือ '+$('#modal_numexpire').val()+' วัน)';
	$('#txt_expire').text(txt_date);
	$('#txt_expire2').text(txt_date2);
}

function showBoostPost(POID){
	if($('#CreditBalance').val()>0){
		location.href='/zhome/boostpost/'+POID;
	}else{
		$('#modalNoCoin').modal('show');
	}

}

function custom_ads(){
    $('#div_custom').removeClass('display');
    $('#div_custom').addClass('display-none');
    $('#option_custom2').removeClass('display-none');
    $('#option_custom2').addClass('display');
    $('#div_custom2').removeClass('display-none');
    $('#div_custom2').addClass('display');
}
function custom_ads_clear(){
    $('#div_custom').removeClass('display-none');
    $('#div_custom').addClass('display');
    $('#div_custom2').removeClass('display');
    $('#div_custom2').addClass('display-none');
}
function custom_ads2(){
	$('#date_custom').removeClass('display');
    $('#date_custom').addClass('display-none');
	$('#date_custom2').removeClass('display-none');
    $('#date_custom2').addClass('display');
}

function clear_custom_ads(){
    $('#div_custom').removeClass('display-none');
    $('#div_custom').addClass('display');
    $('#option_custom2').removeClass('display');
    $('#option_custom2').addClass('display-none');
    $('#div_custom2').removeClass('display');
    $('#div_custom2').addClass('display-none');
}

</script>

</body>
</html>
