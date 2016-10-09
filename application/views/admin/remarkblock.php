<body>
<?php
$attributes = array('class' => 'email', 'id' => 'myform');
echo form_open('/admin/blockboost2', $attributes);
?>
<br>
<input type="hidden" name="JobID" value="<?=$JobID;?>">
<div align="center">
  <select name="Remark">
    <option value="1">คำอธิบายผิดกฎ</option>
    <option value="2">รูปผิดกฎ</option>
    <option value="3">คำอธิบาย และรูปผิดกฎ</option>
  </select>
</div>
<div align="center">
  <button onclick="document.getElementById('myform').submit();">บันทึก</button>
</div>
</form>
<br>
</body>
