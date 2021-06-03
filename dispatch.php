<!doctype html>
<html>
<head>
<link href="header_style.css" rel="stylesheet" type="text/css">
<link href= "content_style.css" rel="stylesheet" type="text.css">
<!--- START OF STEP 12 IN THE PROJECT 6 PROGRAM AND DEPLOY_V1/DOCX---->
					<!-- PART 3 -->
<?php	// validate if request from logcall.php or post back
if (!isset($_POST["btnProcessCall"] && !isset($_POST["btnDispatch"]))
	header("Location: logcall.php");
?>
<!---END OF STEP 12 IN THE PROJECT 6 PROGRAM AND DEPLOY_V1.DOCX---->
<!---START OF STEP 10 IN THE PROJECT 6 PROGRAM AND DEPLOY_V1.DOCX---->
					<!-- PART 2 -->
<?php 	// if post back
if (isset($_POST["btnDispatch"]))
{
	require_once 'db.php';
	// create database connection_aborted
	$mysqli = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
		// Check Connection
	if ($mysqli->connect_errno){
		die("Failed to connect MySQL: ".$mysql->connect_errno);
	}
	
	$patrolcarDispatched = $_POST["chkPatrolcar"];
	// array of patrolcar being dispatched from post back 
	$numOfPatrolcarDispatched = count($patrolcarDispatched);
	// INSERT NEW INCIDENT
	$incidentStatus;
	if ($numOfPatrolcarDispatched > 0) {
		$incidentStatus="2";	// incident status to be set as Dispatched
	} else {
		$incidentStatus="1";	// incident status to be set as Pending
	}
	
	$sql = "INSERT INTO incident(caller_name, phone_number, incident_type_id, incident_location, incident_Desc, incident_status_id) VALUES (?, ?, ?, ?, ?, ?)";
	
	if(!($stmt - $mysqli->prepare($sql))) {
		die("Prepare FAILED: ".$mysql->errno);
	}
	
	if(!$stmt->bind_param('ssssss', $_POST['callerName'],
								$_POST['contactNo'],
								$_POST['incidentType'],
								$_POST['incidentDesc'],
								$incidentStatus)){
		die("Binding Parameters failed: ".$stmt->errno);
	}
	
	if (!$stmt->execute()) {
		die("Insert incident table failed: ".$stmt->errno);
	}
	
	// RETRIEVE INCIDENT ID FOR THE NEWLY INSETED INCIDENT
	$incidentId=mysqli_inset_id($mysqli);;
	
	// UPDATE PATROLCAR STATUS TABLE AND ADD INTO DISPATCH TABLE
	for($i=0; $i < $numOfPatrolcarDispatched; $i++)
	{
		// UPDATE PATROL CAR STATUS ////////////////
		$sql = "UPDATE patrolcar SET patrolcar_status_id='1' WHERE patrolcar_id = ?";
		
		if (!($stmt = $mysql->prepare($sql))) {
			die("Prepare FAILED: ".$mysqli->errno);
		}
		
		if (!($stmt->bind_param('s', $patrolcarDispatched[$1])){
			die("Binding Parameters failed: ".$stmt->errno);
			
		}
		
		// INSERT DISPATCH DATA ////////////////
		$sql = "INSERT INTO dispatch (incident_id, patrolcar_id, time_dispatch) VALUES (?, ?, NOW())";
		
		if (!($stmt = $mysqli ->prepare($sql))) {
			die("Prepare FAILING: ".$mysqli->errno);
		}
		
		if(!($stmt->bind_param('ss', $incidentId,
									 $patrolcarDispatched[$1])){
			die("Binding parameters failed: ".$stmt->errno);
		}
	}
	$stmt->close();
	$mysqli->close();
?>
<!-- After dispatching, redirect to logcall.php -->
<script type="text/javascript">window.location="./locall.php";</script>
<?php } ?>
</head>
<body>									 
<!---END OF STEP 10 IN THE PROJECT 6 PROGRAM AND DEPLOY_V1.DOCX---->
<!---START of Step 6 in the project 6 Program and deploy_v1.docx---->
				<!-- Part 1 : not post back-->
<title>Police Emergency Service System</title>
</head>
<body>
<!-- display the incident information passed from logcall.php -->
<form name="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> ">
<table>
<tr>
	<td colspan="2">Incident Detail</td>
</tr>
<tr>
	<td>Caller's Name :</td>
	<td><?php echo $_POST['callerName'] ?>
		<input type="hidden" name="callerName" id="callerName"
		value="<?php echo $_POST['callerName'] ?>"</td>
</tr>
<tr>
	<td>Contact No :</td>
	<td><?php echo $_POST['contactNo']?> <input type="hidden" name="location" id="location" value="<?php echo $_POST['location'} ?>"></td>
</tr>
<tr>
	<td>Location :</td>
	<td><?php echo $_POST['location'] ?> <input type="hidden" name="location" value="<?php echo $_POST['location'] ?>"></td>
</tr>
<tr>
	<td>Incident Type :</td>
	<td><?php echo $_POST['incidentType'] ?> <input type="hidden" name="incidentType" id="incidentType" value="<?php echo $_POST['incidentType'] ?>"></td>
</tr>
<tr>
	<td>Description :</td>
	<td><textarea name="incidentDesc" cole="45" rows="5" readonly id="incidentDesc"><?php echo $_POST['incidentDesc'] ?>"></td>
</tr>
<?php
// connect to a database
require_once 'db.php';
// Create Connection
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
// Check Connection
if ($conn->connect_error){
	die("Connection Failed: " . $conn->connect_error);
}

// retrieve from patrolcar table those patrol cars that are 2:Patrol or 3:Free
$sql = "SELECT patrolcar_id, patrolcar_status_desc FROM patrolcar JOIN patrolcar_status
ON patrolcar.patrolcar_status_id=patrolcar_status.patrolcar_status_id
WHERE patrolcar.patrolcar_status_id='2' OR patrolcar_status_id='3'";

if (!($stmt = $mysql->prepare($sql))) {
	die("prepare failed: ".$mysqli->errno);
}
if (!($stmt->execute()){
	die("Execute Failed: ".$stmt->errno);
}
if (!($resultstet = $stmt->get_result())) {
	die("Getting result set failed: ".$stmt->errno);
}
$patrolcarArray

while ($row = $resultset->fetch_assoc()) {
	$patrolcarArray[$row['patrolcar_id']] = $row['patrolcar_status_desc'];
}
$stmt->close();
$resultset->close();
$mysqli->close();
?>
<!--- END of STEP 8.1 in the project 6_Program and deploy_v1.docx---->
<!---Start of STEP 8.2 in the project 6 Program and deploy_v1.docx---->
<!-- populate table with patrol car data -->
<table class="ContentStyle">
	<tr>
		<td colspan="3">Dispatch Patrolcar Panel</td>
	</tr>
	<?php 
		foreach ($patrolcarArray as $key=>$value){
	?>
	<tr>
		<td><input type="checkbox" name="chkPatrolcar[]"
			value="<?php echo $key ?>"></td>
		<td><?php echo $key ?></td>
		<td><?php echo $value ?></td>
	</tr>
	<tr>
		<td><input type="reset"
			name="btnCancel" id="btnCancel" value="Reset"></td>
		<td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;nbsp;<input 
			type="submit" name="btnDispatch" id="btnDispatch" value="Dispatch">
		</td>
	</tr>	
</table>
<!---END of STEP 8.2 in the project 6_Program and deploy_v1.docx---->
</form>
</body>
</html>