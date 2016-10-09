<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="Content-Language" content="en-us"/>
<meta http-equiv="Content-Style-Type" content="text/css"/>
<meta http-equiv="imagetoolbar" content="no"/>

<title>ZHome | Buy or Rent Your Home by Owner Directly</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" > 
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" >
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
</head>
<body  class="log-in-bg">
	<div class="container popup-signup">
    <div class="col-md-offset-4 col-md-4">
    <div class="panel panel-default">
<div class="panel-body">
	<div class="form-group">
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>
</table>
<?php echo form_submit('send', 'Send'); ?>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
</body>
</html>
