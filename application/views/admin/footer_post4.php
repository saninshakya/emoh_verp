



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
<script type="text/javascript" src="/js/hammer.min.js"></script>
<script type="text/javascript" src="/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="/js/jquery.cropbox.js"></script>
<script type="text/javascript" src="/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="/js/jquery-litelighter.js"></script>
<script type="text/javascript" src="/js/jquery-waiting.js"></script>
<script type="text/javascript" src="/js/exif.js"></script>
<script type="text/javascript">
       $('.selectpicker').selectpicker();
</script>
<script type='text/javascript'>
//// checking which type of image is click to add ////
	var roomtype = false;
	var view = false;
	var facilities = false;
	
		
    //// i for tracking image room ///
	var i= 0;
	//// j for tracking view///
	var j= 0;
	/// k for tracking image facilities ///
	var k = 0;
	
	/// keeping image data of crop image upload & preview ///
	var imgData;



/*$("#clicker").click(function(event){
			
			event.preventDefault();
			event = event || window.event;
			roomtype = true;
			
    		if(event.target.id != 'file'){
				
        		$("#file").click();
   			 }
			
    		
});*/

$("#clicker").click({imgType:"Room"},browseToGetFile);
$("#viewClicker").click({imgType:"View"},browseToGetFile);
$("#facClicker").click({imgType:"Facilities"},browseToGetFile);

function browseToGetFile(event){
			event.preventDefault();
			event = event || window.event;
			
			if(event.data.imgType=="Room"){
				roomtype = true;
				view = false;
		 		facilities = false;
			}else if(event.data.imgType=="View"){
				roomtype = false;
				view = true;
		 		facilities = false;
			}else if(event.data.imgType=="Facilities"){
				roomtype = false;
				view = false;
		 		facilities = true;
			}
			//alert(view);
			
			/// activate to browse file by input file ////
    		if(event.target.id != 'file'){
				
        		$("#file").click();
   			 }
}
	
	function readURL(input) {
		
        if (input.files && input.files[0]) {
            var reader = new FileReader();
			//alert(width);alert(height);
			$('.modal-dialog').css("width","700");
			$('#myModal').modal('show');

            reader.onload = function (e) {
				var image=new Image();
				image.src=e.target.result;
				image.onload=function(){
					var maxWidth=600;
					var maxHeight=450;
					var maxRatio=maxHeight/maxWidth;
					var width=image.width;
					var height=image.height;
					
					var curentratio=height/width;
					if(height>maxHeight){
						ratioHeight=maxHeight/height;
						width=width*ratioHeight;
						height=maxHeight;
					}
					
					$(this).css("width",width);
					$(this).css("height",height);
					image.width=width;
					image.height=height;
					$( "#imgUp" ).attr( "cropHeight", maxHeight );
					if(roomtype){
						$( "#imgUp" ).attr( "cropWidth", maxWidth );
					}else{
						//$('.modal-dialog').css("width",data[0]['imageWidth'] + "px");
						//$( "#imgUp" ).attr( "cropWidth", "800" );
					}
					$('#imgUp').attr('src', e.target.result);
				}
				
				iniCropImg();
            }

            reader.readAsDataURL(input.files[0]);
             /// checking which type of image (room,view, fac) is added ///////	
	 		checkingType();
        }
	 
    }
	
	function checkingType(){
		
		if(roomtype){
			i++;
		}else if(view){
			j++;
		}else if(facilities){
			k++;
		}
	}
	
	function iniCropImg(){
	
		 $( '.cropimage' ).each( function () {
	        var image = $(this),
	            cropwidth = image.attr('cropwidth'),
	            cropheight = image.attr('cropheight'),
	            results = image.next('.results' ),
				
				
	            download = $('#saveImg');
	
	          image.cropbox( {width: cropwidth, height: cropheight, showControls: 'never' } )
	            .on('cropbox', function( event, results, img ) {
	             
				 imgData = img.getDataURL();
				 console.log("crop box .... ");
				
	            });
	      
		  	 
		  
		  } );
	  
	}
	
	$('#saveImg').click(function(event){
		  event.preventDefault();
		  console.log("...........click..........");
		  
		 
		  
		  /// close popup //////
		  $('#myModal').modal('hide');
		  var imgtype = getImgType();
		
		 
		 //alert('imgtype : '+imgtype+"..... cap : "+cap);
		  
		 var uid = $('#user_id').val();
		 var poid = $('#poid').val();
		 var imgid;
		 //alert('uid : '+uid+"..... poid : "+poid+".... type : "+imgtype);
		 
		  $.ajax({
  				method: "POST",
  				url: "/Zhome/submit_img",
  				data: { img:imgData,userid:uid,postid:poid,type:imgtype },
				dataType: 'json',
            	
				})
  				.done(function( msg ) {
    			
    				if(msg!="Unable to save the file."){
    					imgid = msg;
    					  addImgRoomPreview(imgid);
    				}
					
  				})
				.fail(function(msg){
					
					console.log("fail to save : "+msg['error']+".... : "+msg['status']);			
				});
		  
		 
	  
	  }	);
	  
 
   

   $("#file").change(function(){
		/// start to choose file and select image /////
        readURL(this);
    });	
	 $("#file").on("click",function(){
		// set the value of select file so it can choose the same file again//
		$("#file").val("");
	
	});
function addImgRoomPreview(id){
	
	if(roomtype){
	 var imgNode = '<div class="col-md-6" id="'+"img"+id+'">';
	 imgNode += '<div class="thumbnail drop-shadow imgContainer">';
	 imgNode += '<span class="glyphicon glyphicon-trash binIcon" aria-hidden="true" id="'+"delImg"+id+'"></span>';
	 imgNode += '<img  alt="" src="'+imgData+'" id="'+"image"+id+'"/>';  
	 imgNode += '<div>';
	 imgNode += '<textarea class="form-control captext" placeholder="คำอธิบายรูปห้อง เช่น ห้องทำงาน" row="3" id="'+id+'"></textarea>';
	 imgNode += ' </div>';
	 imgNode += '</div>';
	 imgNode += '</div>';
	
	 
	 
	 $('#clicker').before(imgNode);
	 
	}else if(view){
	  var imgNode = '<div class="col-md-4" id="'+"img"+id+'">';
	 imgNode += '<div class="thumbnail drop-shadow imgContainer nclick">';
	 imgNode += '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'+"delImg"+id+'"></span>';
	 imgNode += '<img  alt="" src="'+imgData+'" id="'+"image"+id+'"/>';  
	 imgNode += '<div>';
	 imgNode += '<textarea class="form-control captext" placeholder="คำอธิบายรูปวิว เช่น วิวจากห้องทำงาน" row="3" id="'+id+'"></textarea> ';
	 imgNode += ' </div>';
	 imgNode += '</div>';
	 imgNode += '</div>';
	 
	 
	 $('#viewClicker').before(imgNode);	
	 
	}else if(facilities){
	 var imgNode = '<div class="col-md-4" id="'+"img"+id+'">';
	 imgNode += '<div class="thumbnail drop-shadow imgContainer nclick">';
	 imgNode += '<span class="glyphicon glyphicon-trash binIcon binIcon-s" aria-hidden="true" id="'+"delImg"+id+'"></span>';
	 imgNode += '<img  alt="" src="'+imgData+'" id="'+"image"+id+'"/>';  
	 imgNode += '<div>';
	 imgNode += '<textarea class="form-control captext" placeholder="คำอธิบายรูปพื้นที่ส่วนกลาง เช่น สระว่ายน้ำ" row="3" id="'+id+'"></textarea> ';
	 imgNode += ' </div>';
	 imgNode += '</div>';
	 
	 //imgNode+= '<div class="checkbox table-bordered padding-pro"><label><input type="checkbox"  id="'+"capAllow"+id+'"><p class="text-grey">ยินยอมให้เจ้าของท่านอื่นใช้</p></label></div>';
	 
	 imgNode += '</div>';
	 
	 
	 $('#facClicker').before(imgNode);	
	 $('#capAllow'+id).change(updateAllow);
		
	}
	
	/// add event listener for delete node and update image caption to db ///
	$('#'+id).change(updateCaption);
	
	
	$('#delImg'+id).click(deleteImg);
	
	
}
function updateCaption(evt){
	
	var cid = evt.target.id;
	var imgcap = $('#'+cid).val();
	
	$.ajax({
  				method: "POST",
  				url: "/Zhome/update_imgCap",
  				data: { cap:imgcap,id:cid },
				dataType: 'json',
            	
				})
  				.done(function( msg ) {
    			
    				
    				console.log(msg);
					
  				})
				.fail(function(msg){
					
					console.log(msg);
					
				});
	
}

function updateAllow(evt){
	var checkid = evt.target.id;
	var targetid = checkid.replace('capAllow','');
	var checkval = this.checked;
	alert(checkval);
	$.ajax({
  				method: "POST",
  				url: "/Zhome/update_imgAllow",
  				data: { allow:checkval,id:targetid },
				dataType: 'json',
            	
				})
  				.done(function( msg ) {
    			
    				console.log(msg);
					
  				})
				.fail(function(msg){
					console.log(msg);
					
				});
	
}
function deleteImg(event){
	
	var imgid = event.target.id;
	
	imgid = imgid.replace("delImg", "");
	
	$.ajax({
  				method: "POST",
  				url: "/Zhome/remove_img",
  				data: {id:imgid },
				dataType: 'json',
            	
				})
  				.done(function( msg ) {
    				$('#img'+imgid).remove();
    				console.log(msg);
    				
					
  				})
				.fail(function(msg){
					console.log(msg);
					
				});
}

function getImgType(){
	var imgtype;
	if(roomtype){
	imgtype="room";
	
	}else if(view){
		imgtype="view";
		
	}else if(facilities){
		imgtype="facilities";
	}
	return imgtype;
}


var totalImgShare = $('#totalImgShare').val();


for(var nimg=0;nimg<totalImgShare;nimg++){
	$('#share'+nimg).change(updateImgShare);
}

function updateImgShare(evt){
	var id = evt.target.id;
	var poid = $('#poid').val();

	var image_id = id.replace("share","");
	
	var image_src = $('#imgSh'+image_id).attr('src');
	
	
	if($('#'+id).prop('checked')){
		$.ajax({
	  				method: "POST",
	  				url: "/Zhome/submit_imgshare",
	  				data: {postid:poid,src:image_src },
					dataType: 'json',
	            	
					})
	  				.done(function( msg ) {
	    				
	    				console.log(msg);
	    				
						
	  				})
					.fail(function(msg){
						console.log(msg);
						
					});

	}else{
		$.ajax({
	  				method: "POST",
	  				url: "/Zhome/delete_imgshare",
	  				data: {postid:poid,src:image_src },
					dataType: 'json',
	            	
					})
	  				.done(function( msg ) {
	    				
	    				console.log(msg);
	    				
						
	  				})
					.fail(function(msg){
						console.log(msg);
						
					});/**/
	}
		
}

function val1(x)
{		
	document.getElementById('key_change').value=x;
	document.getElementById('myform').submit();
}
</script>
<?php
	echo '<script>';
	foreach ($imgFac->result() as $row)
	{
		$id = $row->ImgID;
		echo '$("#capAllow'.$id.'").change(updateAllow);';	
		echo '$("#delImg'.$id.'").click(deleteImg);';		
		
	} 
	
    foreach ($imgRoom->result() as $row)
	{
		$rid = $row->ImgID;
		echo '$("#'.$rid.'").change(updateCaption);';	
		echo '$("#delImg'.$rid.'").click(deleteImg);';					
	}
	
	foreach ($imgView->result() as $row)
	{
		$vid = $row->ImgID;
		echo '$("#'.$vid.'").change(updateCaption);';		
		echo '$("#delImg'.$vid.'").click(deleteImg);';	
	}       	
     
	
	echo '</script>';
?>
<script>
var NumberFiles=0;

function checkUpload(numFile) {
	var uid = $('#user_id').val();
    var request = new XMLHttpRequest();
	request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      if(request.responseText == "1234"){
		  setTimeout(function(){checkUpload(numFile);}, 10000);
	  } else {
		  location.reload();
	  }
    }
  };
   request.open("GET", "/uploadFinish.php?numFile=" + numFile+"&user_id="+uid, false);
   request.send();
//	alert(numFile);
}

function fileSelect(evt) {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
        var result = '';
        var file;
    for (var i = 0; file = files[i]; i++) {
//        result += '<li>' + file.name + ' ' + file.size + ' bytes</li>';
        }
//    document.getElementById('filesInfo').innerHTML = '<ul>' + result + '</ul>';
    }
}
document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
 
if (window.File && window.FileReader && window.FileList && window.Blob) {
<?php
	 if ($this->agent->is_mobile()){
		echo "var timex = 60000;";
	} else {
		echo "var timex = 60000;";
	}
?>
    document.getElementById('filesToUpload').onchange = function(){
        var files = document.getElementById('filesToUpload').files;
         if(files.length > 5){
                   alert("อัพโหลดรูปได้สูงสุด 5 รูปต่อครั้ง");
         } else {
        for(var i = 0; i < files.length; i++) {
				resizeAndUpload(files[i],files.length);
        };
		$('#waiting4').waiting({ 
			className: 'waiting-circles', 
			elements: 8, 
			radius: 20,
			auto: true 
		});
//		var a=checkUpload(files.length);
		setTimeout(function(){location.reload();}, timex);               
        }
    };
//    document.getElementById('filesToUpload2').onchange = function(){
//        var files = document.getElementById('filesToUpload2').files;
//        if(files.length > 5){
 //                  alert("อัพโหลดรูปได้สูงสุด 5 รูปต่อครั้ง");
//        } else {
//		 for(var i = 0; i < files.length; i++) {
//			resizeAndUpload(files[i]);
 //       };
//		$('#waiting5').waiting({ 
//			className: 'waiting-circles', 
//			elements: 8, 
//			radius: 20,
//			auto: true 
//		});
//		var a=checkUpload(files.length);
//		setTimeout(function(){location.reload();}, timex);
//		}
 //   };	
    document.getElementById('filesToUpload3').onchange = function(){
        var files = document.getElementById('filesToUpload3').files;
        if(files.length > 5){
                   alert("อัพโหลดรูปได้สูงสุด 5 รูปต่อครั้ง");
        } else {
		for(var i = 0; i < files.length; i++) {
			resizeAndUpload(files[i],files.length);
        };
		$('#waiting6').waiting({ 
			className: 'waiting-circles', 
			elements: 8, 
			radius: 20,
			auto: true 
		});
//		var a=checkUpload(files.length);
		setTimeout(function(){location.reload();}, timex);
		}
    };	
} 
 
function resizeAndUpload(file,checkFile) {
//Read Orientation
var orit;
var fileReader = new FileReader();
fileReader.onload = function (event) {
    var exif = EXIF.readFromBinaryFile(this.result);
	orit=exif.Orientation;
	if (!orit)
	{
		orit=1;
	};
	if (orit==2)
	{
		orit=1;
	};
	if (orit==7)
	{
		orit=8;
	};
	if (orit==4)
	{
		orit=3;
	};
	if (orit==5)
	{
		orit=6;
	};
};
fileReader.readAsArrayBuffer(file);
//End Read Orientation 
var uid = $('#user_id').val();
var reader = new FileReader();
    reader.onloadend = function() {
//	alert(orit);
    var tempImg = new Image();
    tempImg.src = reader.result;
    tempImg.onload = function() {
 
        var MAX_WIDTH = 400;
        var MAX_HEIGHT = 600;
        var tempW = tempImg.width;
        var tempH = tempImg.height;
//        if (tempW > tempH) {
//           if (tempW > MAX_WIDTH) {
		  if (orit==6 || orit==8)
		  {
			   tempH *= MAX_WIDTH / tempW;
               tempW = MAX_WIDTH;
		  }	
//            }
//       } else {
//            if (tempH > MAX_HEIGHT) {
			if (orit==1 || orit==3)
			{
			   tempW *= MAX_HEIGHT / tempH;
               tempH = MAX_HEIGHT;
			}
//           }
//        }
 
        var canvas = document.createElement('canvas');
        canvas.width = tempW;
        canvas.height = tempH;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(this, 0, 0, tempW, tempH);
        var dataURL = canvas.toDataURL("image/jpeg");
 
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(ev){
//            document.getElementById('filesInfo').innerHTML = 'Done!';
        };
 
        xhr.open('POST', '/admin/uploadResized', true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		var imgType = document.getElementById("imgType").value;
        var data = 'image=' + dataURL+'&imgType='+imgType+'&orit='+orit+"&user_id="+uid;
        xhr.send(data);
		xhr.addEventListener('readystatechange', function(e) {
			if( this.readyState === 4) {
				NumberFiles=NumberFiles+1;
				if (NumberFiles==checkFile){
					setTimeout(function(){location.reload();}, 200);
				}	
			// the transfer has completed and the server closed the connection.
			}
		});
      }
 
   }
   reader.readAsDataURL(file);

}
</script>

</body>
</html>