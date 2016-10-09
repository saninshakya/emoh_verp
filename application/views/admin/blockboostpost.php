<br>
<div align="center">
<h1><b>List Boost Post Status</b></h1>
</div>
<hr>
<br>
<?php
  if ($ListActive!="null"){
?>
<div align="center"><h1><b>Active</b></h1></div>
<table width="90%" border="1" align="center">
  <tr>
    <td align="center"><b>Order</b></td>
    <td align="center"><b>POID</b></td>
    <td align="center" width="30%"><b>Image</b></td>
    <td align="center"><b>Project Name</b></td>
    <td align="center"><b>Post Expire</b></td>
    <td align="center"><b>Post/Day</b></td>
	<td align="center"><b>Start Date</b></td>
    <td align="center"><b>End Date</b></td>
    <td align="center"><b>Type Post</b></td>
    <td align="center"><b>Show Ad Text</b></td>
    <td align="center"><b>User_id</b></td>
    <td align="center"><b>Email</b></td>
    <td align="center"><b>Telephone</b></td>
    <td align="center"><b>Block Boost Post</b></td>
  </tr>
<?php
 $i=1;
 foreach ($ListActive->result() as $row){
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td align="center"><?=$row->POID;?></td>
     <td align="center"><div class="col-md-12 bg-responsive2" onclick="window.open('/admin/boostPostEdit/<?=$row->POID;?>', '_blank')" style="background-image: linear-gradient(rgba(255,255,255,0.3),rgba(51,51,51,0.3)), url('<?=$this->dashboard->imageList($row->POID);?>');"></td>
    <td align="center"><?=$this->credit->ProjectName($row->POID);?></td>
    <td align="center">
      <?php
        if ($this->credit->PostExpire($row->POID)<date("Y-m-d")){
      ?>
          <font color="red">
      <?php
        } else {
      ?>
          <font color="black">
      <?php
        }
      ?>
      <?=$this->credit->PostExpire($row->POID);?>
    </font>
    </td>
    <td align="center"><?=$row->credit_limit_pday;?></td>
	<td align="center"><?=$row->start_date;?></td>
    <td align="center"><?=$row->end_date;?></td>
    <td align="center"><?=$this->credit->TypeAdv($row->POID);?></td>
    <td align="center"><?=$row->AdTXT;?></td>
    <td align="center"><?=$row->user_id;?></td>
    <td align="center"><?=$this->credit->FindEmail($row->user_id);?></td>
    <td align="center"><?=$this->credit->findAllPhone($row->user_id);?></td>
    <td align="center"><A href="/admin/blockboost/<?=$row->JobID;?>">Block</A></td>
  </tr>
<?php
  $i++;
 }
?>
</table>
<?php
  }
?>
<br>
<hr>
<?php
  if ($ListBlock!="null"){
?>
<div align="center"><h1><b>Block Boost Poost</b></h1></div>
<table width="90%" border="1" align="center">
  <tr>
    <td align="center"><b>Order</b></td>
    <td align="center"><b>POID</b></td>
    <td align="center" width="30%"><b>Image</b></td>
    <td align="center"><b>Project Name</b></td>
    <td align="center"><b>Post Expire</b></td>
    <td align="center"><b>Post/Day</b></td>
	<td align="center"><b>Start Date</b></td>
    <td align="center"><b>End Date</b></td>
    <td align="center"><b>Type Post</b></td>
    <td align="center"><b>Show Ad Text</b></td>
    <td align="center"><b>User_id</b></td>
    <td align="center"><b>Email</b></td>
    <td align="center"><b>Telephone</b></td>
    <td align="center"><b>Block Boost Post</b></td>
  </tr>
<?php
 $i=1;
 foreach ($ListBlock->result() as $row){
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td align="center"><?=$row->POID;?></td>
    <td align="center"><div class="col-md-12 bg-responsive2" onclick="window.open('/admin/boostPostEdit/<?=$row->POID;?>', '_blank')" style="background-image: linear-gradient(rgba(255,255,255,0.3),rgba(51,51,51,0.3)), url('<?=$this->dashboard->imageList($row->POID);?>');"></td>
    <td align="center"><?=$this->credit->ProjectName($row->POID);?></td>
    <td align="center">
      <?php
        if ($this->credit->PostExpire($row->POID)<date("Y-m-d")){
      ?>
          <font color="red">
      <?php
        } else {
      ?>
          <font color="black">
      <?php
        }
      ?>
      <?=$this->credit->PostExpire($row->POID);?>
    </font>
    </td>
    <td align="center"><?=$row->credit_limit_pday;?></td>
    <td align="center"><?=$row->start_date;?></td>
	<td align="center"><?=$row->end_date;?></td>
    <td align="center"><?=$this->credit->TypeAdv($row->POID);?></td>
    <td align="center"><?=$row->AdTXT;?></td>
    <td align="center"><?=$row->user_id;?></td>
    <td align="center"><?=$this->credit->FindEmail($row->user_id);?></td>
    <td align="center"><?=$this->credit->findAllPhone($row->user_id);?></td>
    <td align="center"><A href="/admin/unblockboost/<?=$row->JobID;?>"> UnBlock</A></td>
  </tr>
<?php
  $i++;
 }
?>
</table>
<?php
  }
?>
<br>
<?php
  if ($ListWait!="null"){
?>
<div align="center"><h1><b>Wait for Approve</b></h1></div>
<table width="90%" border="1" align="center">
  <tr>
    <td align="center"><b>Order</b></td>
    <td align="center"><b>POID</b></td>
    <td align="center" width="30%"><b>Image</b></td>
    <td align="center"><b>Project Name</b></td>
    <td align="center"><b>Post Expire</b></td>
    <td align="center"><b>Post/Day</b></td>
	<td align="center"><b>Start Date</b></td>
    <td align="center"><b>End Date</b></td>
    <td align="center"><b>Type Post</b></td>
    <td align="center"><b>Show Ad Text</b></td>
    <td align="center"><b>User_id</b></td>
    <td align="center"><b>Email</b></td>
    <td align="center"><b>Telephone</b></td>
    <td align="center"><b>Block Boost Post</b></td>
  </tr>
<?php
 $i=1;
 foreach ($ListWait->result() as $row){
?>
  <tr>
    <td align="center"><?=$i;?></td>
    <td align="center"><?=$row->POID;?></td>
    <td align="center"><div class="col-md-12 bg-responsive2" onclick="window.open('/admin/boostPostEdit/<?=$row->POID;?>', '_blank')" style="background-image: linear-gradient(rgba(255,255,255,0.3),rgba(51,51,51,0.3)), url('<?=$this->dashboard->imageList($row->POID);?>');"></td>
    <td align="center"><?=$this->credit->ProjectName($row->POID);?></td>
    <td align="center">
      <?php
        if ($this->credit->PostExpire($row->POID)<date("Y-m-d")){
      ?>
          <font color="red">
      <?php
        } else {
      ?>
          <font color="black">
      <?php
        }
      ?>
      <?=$this->credit->PostExpire($row->POID);?>
    </font>
    </td>
    <td align="center"><?=$row->credit_limit_pday;?></td>
    <td align="center"><?=$row->start_date;?></td>
	<td align="center"><?=$row->end_date;?></td>
    <td align="center"><?=$this->credit->TypeAdv($row->POID);?></td>
    <td align="center"><?=$row->AdTXT;?></td>
    <td align="center"><?=$row->user_id;?></td>
    <td align="center"><?=$this->credit->FindEmail($row->user_id);?></td>
    <td align="center"><?=$this->credit->findAllPhone($row->user_id);?></td>
    <td align="center"><A href="/admin/blockboost/<?=$row->JobID;?>"> Block</A>&nbsp;<A href="/admin/unblockboost/<?=$row->JobID;?>"> UnBlock</A></td>
  </tr>
<?php
  $i++;
 }
?>
</table>
<?php
  }
?>
<br>
