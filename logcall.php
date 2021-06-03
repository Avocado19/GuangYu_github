<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Police Emergency Service System</title>

<link href="header_style.css" rel="stylesheet" type="text/css">

<link href="content_style_css" rel="stylesheet" type="text/css">

<script type="text/javascript">

</script>

</head>
<body>
<form name="frmLogCall" method="post"
	onSubmit="return validateForm()" action="dispatch.php">
<table>
	<tr>
		<td colspan="2">Log Call Panel</td>
	</tr>
	
	<tr>
		<td>Caller's Name :</td>
		<td><input type="text" name="callerName" id="callerName"</td>
	</tr>
	<tr>
		<td>Contact No :</td>
		<td><input type="text" name="contactNo" id="contactNo"</td>
	</tr>
	<tr>
		<td>Location :</td>
		<td><input type="text" name="Location" id="Location"</td>
	</tr>
	<tr>
		<td>Incident Type :</td>
		<td><textarea name="incidentDesc" id="incidentDesc" cols="45" rows="5"></textarea>
		</td>
	</tr>
	<tr>
		<td><input type="reset" name="btnCancel" id="btnCancel" value="Reset">
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnProcessCall" id="btnProcessCall" value="Process Call...">
		</td>
	</tr>

</table>		
</form>
</body>
</html>