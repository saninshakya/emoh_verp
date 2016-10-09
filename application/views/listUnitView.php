<hr>
<div align="center">รายละเอียด</div>
<font color="blue">
<table align="center"><tr><td>
<?php
	$colfix=14;
	$i=1;
	$countView=0;
	$countViewTel=0;
	$advertising_check="";
	$date_check="";
	foreach ($listUnit->result() as $row){
		if($row->StatusPRent==1){
			$StatusPRent_txt="มีผู้เช่า";
		}else{
			$StatusPRent_txt="ว่าง";
		}
		$view=explode("/",$this->backend->listviewUser($row->POID,$StartDate,$EndDate));
		$countView=$view[0];
		$countViewTel=$view[1];
		
		if($advertising_check!=$row->TOAdvertising){
			echo "</td></tr></table><br><table align='center'><tr>";
			echo "<td bgcolor='#ffff80' style='color:#ff0000;font-weight:bold;'>&nbsp;ประเภทห้อง :&nbsp;".$row->AName_th."</td>";
			echo "</tr></table>";
			$advertising_check=$row->TOAdvertising;
			$date_check="";
			$i=1;
		}
		?>
		<?php if($i==1){?>
			<table align="center" width="1000" border="1">
				<tr bgcolor="#b3ffff">
					<td align="center" width="3%">ลำดับ</td>
					<td align="center" width="10%">วันที่ดูรายการ</td>
					<td align="center" width="20%">โครงการ</td>
					<td align="center" width="10%">วันที่ลงประกาศ</td>
					<td align="center" width="10%">ชื่อเจ้าของ</td>
					<td align="center" width="5%">เบอร์โทร</td>
					<td align="center" width="7%">LineID</td>
					<td align="center" width="10%">email</td>
					<td align="center" width="3%">ตึก</td>
					<td align="center" width="5%">Unit</td>
					<td align="center" width="7%">ที่อยู่</td>
					<td align="center" width="3%">ชั้น</td>
					<td align="center" width="3%">Views</td>
					<td align="center" width="3%">Tel. Views</td>
				</tr>
		<?}?>
		<?php
		/*if($date_check!=$row->LastUpdate){
			echo "<tr>";
			echo "<td colspan='".$colfix."' bgcolor='#b3ffff' style='color:#000000;font-weight:bold;'>&nbsp;วันที่ :&nbsp;".$row->LastUpdate."</td>";
			echo "</tr>";
			$date_check=$row->LastUpdate;
		}*/

?>
		<tr onmouseover="this.style.backgroundColor='#ffff80';" onmouseout="this.style.backgroundColor='';">
			<td align="center">&nbsp;<?=$i;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->LastUpdate;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->ProjectName;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->DateCreate;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->OwnerName;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->Telephone1;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->LineID;?>&nbsp;</td>
			<td align="left">&nbsp;<?=$row->Email1;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Tower;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->RoomNumber;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Address;?>&nbsp;</td>
			<td align="center">&nbsp;<?=$row->Floor;?>&nbsp;</td>
			<td align="right" nowrap>
				<a href="#showDetail" class="text-blue" onclick="getDetail('<?=$i?>','<?=$row->POID;?>','1','<?=$StartDate;?>','<?=$EndDate;?>');"><?=$countView;?></a>&nbsp;
			</td>
			<td align="right" nowrap>
				<a href="#showDetail" class="text-blue" onclick="getDetail('<?=$i?>','<?=$row->POID;?>','2','<?=$StartDate;?>','<?=$EndDate;?>');"><?=$countViewTel;?></a>&nbsp;
			</td>
		</tr>
		<tr bgcolor="#E6E6E6">
			<td colspan="<?=$colfix;?>" style="padding:3 0;"><div id="showDetail<?=$i.$row->POID;?>"></div></td>
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
function getDetail(row,POID,viewType,StartDate,EndDate){
	var DetailCont = $.getJSON("/zhome/listUnitViewDetail",{ POID:POID,viewType:viewType,StartDate:StartDate,EndDate:EndDate }, function(json) {
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
		showDetail(row,POID);
		console.log( "second complete" );
	});
}

function showDetail(row,POID){
	$('#showDetail'+row+''+POID).empty();
	var list="";
	if(details.length>0){
		list += '<span class="glyphicon glyphicon-remove pull-right" style="padding:2" aria-hidden="true" onclick="clearDetail('+row+','+POID+');"></span>';
		list +=	'<table align="right" width="800" border="1">';
		list +=	'<tr bgcolor="#FFFFFF">';
		list +=	'<td align="center" width="5%">ลำดับ</td>';
		list +=	'<td align="center" width="10%">Date</td>';
		list += '<td align="center" width="20%">User ID</td>';
		list += '<td align="center" width="15%">Email</td>';
		list += '<td align="center" width="15%">Tel</td>';
		list += '<td align="center" width="15%">Line</td>';
		list += '<td align="center" width="10%">Other Tel View</td>';
		list +=	'</tr>';
		for(var i=0;i<details.length;i++){
			no=i+1;
			list +=	'<tr bgcolor="#FFFFFF" onmouseover=this.style.backgroundColor="#CCCCCC"; onmouseout=this.style.backgroundColor="#FFFFFF";>';
			list +=	'<td align="center">'+no+'</td>';
			list +=	'<td align="center">'+details[i].Date+'</td>';
			list += '<td align="left">'+details[i].UserID+':'+details[i].UserName+'</td>';
			list += '<td align="left">'+details[i].Email+'</td>';
			list += '<td align="left">'+details[i].Tel+'</td>';
			list += '<td align="left">'+details[i].Line+'</td>';
			list += '<td align="right">'+details[i].View+'&nbsp;</td>';
			list +=	'</tr>';
		}
		list +=	'</table>';
		$('#showDetail'+row+''+POID).append(list);
	}
}

function clearDetail(row,POID){
	$('#showDetail'+row+''+POID).empty();
}
</script>