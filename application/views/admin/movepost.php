<?php
  if ($txtSus!="null"){
?>
<br>
<div align="center">
<h1><b><?=$txtSus;?></b></h1>
</div>
<?php
  }
?>
<br>
<div align="center">
<h1><b>ค้นหา user_id</b></h1>
</div>
<?php
echo form_open('/admin/movepost');
?>
<table border="0" width="80%" align="center">
  <tr>
      <td width="30%" align="right">POID</td>
      <td width="70%" align="left"><input name="search_poid" type="text" value="null" size="30"></td>
  </tr>
  <tr>
      <td width="30%" align="right">email</td>
      <td width="70%" align="left"><input name="search_email" type="text" value="null" size="60"></td>
  </tr>
  <tr>
      <td width="30%" align="right">Telphone</td>
      <td width="70%" align="left"><input name="search_telphone" type="text" value="null" size="30"></td>
  </tr>
  <tr>
      <td width="30%" align="right">ชื่อ</td>
      <td width="70%" align="left"><input name="search_firstname" type="text" value="null" size="60"></td>
  </tr>
  <tr>
      <td width="30%" align="right">นามสกุล</td>
      <td width="70%" align="left"><input name="search_lastname" type="text" value="null" size="30"></td>
  </tr>
  <tr>
      <td align="center" colspan="2"><input type="submit" value="ค้นหา"></td>
  </tr>
</table>
</form>
<br>
<?php
  if ($User!="null"){
    $chkRow=$User->num_rows();
  } else {
    $chkRow=0;
  }
  if ($chkRow!=0){
?>
<table border="1" width="80%" align="center">
    <tr>
      <td align="center"><b>user_id</b></td>
      <td align="center"><b>email</b></td>
      <td align="center"><b>Firstname</b></td>
      <td align="center"><b>Lastname</b></td>
      <td align="center"><b>Telephone 1</b></td>
      <td align="center"><b>Telephone 2</b></td>
      <td align="center"><b>Backup Telephone</b></td>
    </tr>
<?php
    foreach ($User->result() as $row) {
      $user_id=$row->id;
      $queryTel=$this->db->query('select Telephone1, Telephone2, BackupTelephone from Post Where user_id="'.$user_id.'" order by POID desc limit 1');
      $rowTel=$queryTel->row();
?>
    <tr>
      <td align="center"><b><?=$row->id;?></b></td>
      <td align="left"><?=$row->email;?></td>
      <td align="left"><?=$row->firstname;?></td>
      <td align="left"><?=$row->lastname;?></td>
      <td align="right"><?=$rowTel->Telephone1;?></td>
      <td align="right"><?=$rowTel->Telephone2;?></td>
      <td align="right"><?=$rowTel->BackupTelephone;?></td>
    </tr>
<?php
    }
?>
</table>
<?php
  }
?>
<br>
<?php
echo form_open('/admin/movepost');
?>
<div align="center">
<h1><b>ย้ายประกาศ</b></h1>
</div>
<table border="0" align="center" width="80%">
  <tr>
    <td width="20%" align="right"><b>POID :</b></td>
    <td width="80%" align="left"><input type="text" name="POID" size="10" value="null"></td>
  </tr>
  <tr>
    <td width="20%" align="right"><b>user_id :</b></td>
    <td width="80%" align="left"><input type="text" name="user_id" size="10" value="null"></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="เปลี่ยนเจ้าของประกาศ"></td>
  </tr>
</table>
</form>
<br>
