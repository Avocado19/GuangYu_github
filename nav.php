!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
</script>
</html>
</head>
<body>
<?php // import nav.php
require_once 'nav.php';
?>
<?php	// import db.php
require_once 'db.php';
// Create connection 
$conn = new mysql (DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check Connection
if ($mysqli->connect_errno){
	die("Failed to connect to MYSQL: ".$mysql->connect_errno);
}
$sql = "SELECT * FROM incident type"
if(!($stmt = $mysqli->prepare($sql))) {
	die("Failed to connect to MySQL: ".$mysql->connect_errno);
}
$sql = "SELECT * FROM incident_type";
if (!($stmt = $mysqli->prepare($sql))) {
	die("Prepare FAILED: ".$mysqli->errno);
}
if (!($stmt->execute()) {
	die("Execute Failed: ".$stmt->errno);
}
if(!($resultset = $stmt->get_result())) {
	die("Getting result test failed: ".$stmt->errno);
}
$incidentType; // an array variable
while ($row = $resultset->fetch_assoc()) {
	// create an associative array of an incidentType (incident_type_id
$conn->close();
?>	
<select name="incidentType" id="incidentType">
  <?php // populate a combo box with $incidentType
		foreach( $incidentType as $key => $value) {
	?>
		<option value="<?php echo $key ?>">
			<?php echo $value ?>
		</option>
  <?php
		}
	?>
</select>
<script type="text/javascript">
function validateForm()
{
	var x=document.forms["frmLogCall"]["callerName"].value;
	if (x==null || x=="")
	{
		alert("Caller Name is required.");
		return false;
	}
	// may add code for validating other inputs
}	
</script>