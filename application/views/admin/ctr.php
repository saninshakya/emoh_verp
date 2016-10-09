<body>
  <br>
  <div align="center"><h1>Coin Transaction Report</h1></div>
  <table width="98%" border="1">
    <tr>
      <td width="7%" align="center"><b>Date Time</b></td>
      <td width="8%" align="center"><b>Order Number</b></td>
      <td width="7%" align="center"><b>User ID</b></td>
      <td width="8%" align="center"><b>Total Listing</b></td>
      <td width="7%" align="center"><b>Coin</b></td>
      <td width="8%" align="center"><b>Promo Code</b></td>
      <td width="8%" align="center"><b>Price</b></td>
      <td width="7%" align="center"><b>Vat</b></td>
      <td width="8%" align="center"><b>Net After Vat</b></td>
      <td width="8%" align="center"><b>Payment Type</b></td>
      <td width="8%" align="center"><b>Omesi Charge</b></td>
      <td width="8%" align="center"><b>Omesi Vat</b></td>
      <td width="8%" align="center"><b>ApproveBy</b></td>
    </tr>
<?php
  foreach ($cCoinTransaction->result() as $row){
?>
  <tr>
    <td width="7%" align="center"><?=$row->DateTime;?></td>
    <td width="8%" align="center"><?=$row->OrderNumber;?></td>
    <td width="7%" align="center"><?=$row->user_id;?></td>
    <td width="8%" align="center"><?=$row->TotalListing;?></td>
    <td width="7%" align="center"><?=$row->Coin;?></td>
    <td width="8%" align="center"><?=$row->PromotionCode;?></td>
    <td width="8%" align="Right"><?=$row->Price;?>&nbsp;</td>
    <td width="7%" align="Right"><?=$row->Vat;?>&nbsp;</td>
    <td width="8%" align="Right"><?=$row->NetAfterVat;?>&nbsp;</td>
    <td width="8%" align="center"><?=$row->PaymentType;?></td>
    <td width="8%" align="Right"><?=$row->OmesiCharge;?>&nbsp;</td>
    <td width="8%" align="Right"><?=$row->OmesiVat;?>&nbsp;</td>
    <td width="8%" align="center"><?=$row->ApproveBy;?></td>
  </tr>
<?php
  }
?>
  </table>
  <br>
</body>
