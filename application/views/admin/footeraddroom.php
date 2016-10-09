
<!--- footer -->
<div class="container-fluid footer">
	<div class="col-md-10"><p><small>COPYRIGHT © 2015 , Z Estate CO, LTD ALL RIGHTS RESERVED </small></p>
        </div>
        <div class="col-md-2">
          <div class="col-xs-2 pull-right"><small>Security</small></div>
          <div class="col-xs-2 pull-right"><small>Terms</small></div>
          <div class="col-xs-2 pull-right"><small>Privacy</small></div>
          <div class="col-xs-2 pull-right"><small>Policy</small></div>
        </div>
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

<script type='text/javascript' src='/js/quicksilver.js'></script>
<script type='text/javascript' src='/js/jquery.quickselect.js'></script>

<script type='text/javascript'>
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
				resizeAndUpload(files[i]);
        };
		$('#waiting4').waiting({
			className: 'waiting-circles',
			elements: 8,
			radius: 20,
			auto: true
		});
		var a=checkUpload(files.length);
		setTimeout(function(){location.reload();}, timex);
        }
    };
    document.getElementById('filesToUpload2').onchange = function(){
        var files = document.getElementById('filesToUpload2').files;
        if(files.length > 5){
                   alert("อัพโหลดรูปได้สูงสุด 5 รูปต่อครั้ง");
        } else {
		 for(var i = 0; i < files.length; i++) {
			resizeAndUpload(files[i]);
        };
		$('#waiting5').waiting({
			className: 'waiting-circles',
			elements: 8,
			radius: 20,
			auto: true
		});
		var a=checkUpload(files.length);
		setTimeout(function(){location.reload();}, timex);
		}
    };
    document.getElementById('filesToUpload3').onchange = function(){
        var files = document.getElementById('filesToUpload3').files;
        if(files.length > 5){
                   alert("อัพโหลดรูปได้สูงสุด 5 รูปต่อครั้ง");
        } else {
		for(var i = 0; i < files.length; i++) {
			resizeAndUpload(files[i]);
        };
		$('#waiting6').waiting({
			className: 'waiting-circles',
			elements: 8,
			radius: 20,
			auto: true
		});
		var a=checkUpload(files.length);
		setTimeout(function(){location.reload();}, timex);
		}
    };
}

function resizeAndUpload(file) {
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

        xhr.open('POST', '/admin/uploadResizedRoom', true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				var PID = document.getElementById("PID").value;
				var RoomName = document.getElementById("RoomName").value;
        var data = 'image=' + dataURL+'&PID='+PID+'&orit='+orit+'&RoomName='+RoomName;
        xhr.send(data);
		xhr.addEventListener('readystatechange', function(e) {
			if( this.readyState === 4) {
			location.reload();
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
