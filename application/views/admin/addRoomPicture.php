<br>
<div align="center">
<div id="waiting4"></div>
</div>
<form enctype="multipart/form-data" method="post" action="/zhome/uploadResizedProject" class="center-block">
  <input type="hidden" id="PID" name="PID" value="<?=$PID;?>">
	<input type="hidden" id="RoomName" name="RoomName" value="<?=$RoomName;?>">
	<div align="center">
		<h5>
				<a class="text-red2" style="position: relative;overflow: hidden;" href='#'>
						+ เพิ่มรูปห้องแบบ <b><?=$RoomName;?></b><input style="position:absolute;top:0;left:0;opacity:0;" type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" accept="image/*" />
				</a>
		</h5>
	</div>
</form>
<br>
<Table align="center" border=0 width="80%" cellpadding=10 cellspacing=10>
<?php
	$i=0;
	$fin= sizeof($queryImgRoom);
	while ( $i<$fin){
?>
<tr>
	<td align="center" width="50%">
		<img src="/<?=$queryImgRoom[$i];?>" height="300">
	</td>
<?php
		$ImgUse="/".$queryImgRoom[$i];
?>
	<td align="center">
		<a href="/admin/delImgRoomProject/<?=$queryImgRoom[$i];?>">Delete</a>
	</td>
	<td align="center">
		ชื่อรูป <?=$queryImgRoom[$i];?><?=$fin;?>
	</td>
</tr>
<tr>
	<td align="center" width="50%">
		&nbsp;
	</td>
	<td align="center">
		&nbsp;
	</td>
	<td align="center">
		&nbsp;
	</td>
</tr>
<?php
		$i++;
	};
?>
</table>

<br>
<br>
