<hr>
<div align="center">รายละเอียด</div>
<font color="blue">
<table align="center"><tr><td>
	<table align="center" width="1000" border="1">
		<tr bgcolor="#b3ffff">
			<td align="center" width="5%">ลำดับ</td>
			<td align="center" width="10%">Date</td>
			<td align="center" width="20%">User ID</td>
			<td align="center" width="15%">Email</td>
			<td align="center" width="15%">Tel</td>
			<td align="center" width="15%">Line</td>
			<td align="center" width="5%">Views</td>
			<td align="center" width="5%">Tel. Views</td>
		</tr>
		<?php
		$colfix=14;
		$i=1;
		$countView=0;
		$countViewTel=0;
		$advertising_check="";
		$date_check="";
		foreach ($listUnit->result() as $row){
			$view=explode("/",$this->backend->listviewPost($row->user_id,$row->LastUpdate));
			$countView=$view[0];
			$countViewTel=$view[1];
			$PostData=$this->backend->searchUserLastPost($row->user_id);
			$Telephone1=$PostData->Telephone1;
			$Email1=$PostData->Email1;
		?>
			<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
				<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$row->LastUpdate;?>&nbsp;</td>
				<td align="left">&nbsp;<?=$row->user_id.":".$row->firstname." ".$row->lastname;?>&nbsp;</td>
				<td align="center">&nbsp;<?=$row->email;?>&nbsp;</td>
				<td align="left">&nbsp;<?=$Telephone1;?>&nbsp;</td>
				<td align="left">&nbsp;<?=$row->LineID;?>&nbsp;</td>
				<td align="right" nowrap>
					<a href="#showDetail" class="text-blue" onclick="getDetail('<?=$i?>','<?=$row->user_id;?>','1','<?=$row->LastUpdate;?>');"><?=$countView;?></a>&nbsp;
				</td>
				<td align="right" nowrap>
					<a href="#showDetail" class="text-blue" onclick="getDetail('<?=$i?>','<?=$row->user_id;?>','2','<?=$row->LastUpdate;?>');"><?=$countViewTel;?></a>&nbsp;
				</td>
			</tr>
			<tr bgcolor="#E6E6E6">
				<td colspan="<?=$colfix;?>" style="padding:3 3;"><div id="showDetail<?=$i.$row->user_id;?>"></div></td>
			</tr>
<?php
			$i++;
		}
?>
	</table>
</td></tr></table>
<br>

<script language="JavaScript">
var details = [];
function getDetail(row,user_id,viewType,OperateDate){
	var DetailCont = $.getJSON("/zhome/listUnitViewDetail2",{ user_id:user_id,viewType:viewType,OperateDate:OperateDate }, function(json) {
			console.log( "success" );
		})
		.done(function() {
			console.log( "second success" );
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function(json) {
			details = json;
			console.log( "complete" );
		});

	DetailCont.complete(function() {
		showDetail(row,user_id);
		console.log( "second complete" );
	});
}

function showDetail(row,user_id){
	$('#showDetail'+row+''+user_id).empty();
	var list="";
	if(details.length>0){
		list += '<span class="glyphicon glyphicon-remove pull-right" style="padding:2" aria-hidden="true" onclick="clearDetail('+row+','+user_id+');"></span>';
		list +=	'<table align="right" width="1000" border="1">';
		list +=	'<tr bgcolor="#FFFFFF">';
		list +=	'<td align="center" width="3%">ลำดับ</td>';
		list +=	'<td align="center" width="10%">วันที่ดูรายการ</td>';
		list +=	'<td align="center" width="20%">โครงการ</td>';
		list +=	'<td align="center" width="10%">วันที่ลงประกาศ</td>';
		list +=	'<td align="center" width="10%">ชื่อเจ้าของ</td>';
		list +=	'<td align="center" width="5%">เบอร์โทร</td>';
		list +=	'<td align="center" width="7%">LineID</td>';
		list +=	'<td align="center" width="10%">email</td>';
		list +=	'<td align="center" width="3%">ตึก</td>';
		list +=	'<td align="center" width="5%">Unit</td>';
		list +=	'<td align="center" width="7%">ที่อยู่</td>';
		list +=	'<td align="center" width="3%">ชั้น</td>';
		//list +=	'<td align="center" width="3%">Views</td>';
		//list +=	'<td align="center" width="3%">Tel. Views</td>';
		list +=	'</tr>';
		for(var i=0;i<details.length;i++){
			no=i+1;
			list +=	'<tr bgcolor="#FFFFFF" onmouseover=this.style.backgroundColor="#CCCCCC"; onmouseout=this.style.backgroundColor="#FFFFFF";>';
			list +=	'<td align="center">'+no+'</td>';
			list +=	'<td align="center">'+details[i].LastUpdate+'</td>';
			list +=	'<td align="left">'+details[i].ProjectName+'</td>';
			list +=	'<td align="center">'+details[i].DateCreate+'</td>';
			list +=	'<td align="left">'+details[i].OwnerName+'</td>';
			list +=	'<td align="left">'+details[i].Telephone1+'</td>';
			list +=	'<td align="left">'+details[i].LineID+'</td>';
			list +=	'<td align="left">'+details[i].Email1+'</td>';
			list +=	'<td align="center">'+details[i].Tower+'</td>';
			list +=	'<td align="center">'+details[i].RoomNumber+'</td>';
			list +=	'<td align="center">'+details[i].Address+'</td>';
			list +=	'<td align="center">'+details[i].Floor+'</td>';
			//list +=	'<td align="center">'+details[i].countView+'</td>';
			//list +=	'<td align="center">'+details[i].countViewTel+'</td>';
			list +=	'</tr>';
		}
		list +=	'</table>';
		$('#showDetail'+row+''+user_id).append(list);
	}
}

function clearDetail(row,user_id){
	$('#showDetail'+row+''+user_id).empty();
}
</script>