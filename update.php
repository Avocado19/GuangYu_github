<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<!-- Part 1 -->
<?php require_once 'nav.php'; ?>
<br><br>
<?php
if (isset($_POST["btnSearch"])){
?>
<!-- create a form to search for patrol cars based on id -->
<form name="form1" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?> ">
<table class="ContentStyle">
<tr></tr>
<tr>
<td>Patrol car Id</td>	
<td><input type="text" name="patrolCarId" id="patrolCarId"</td>
<td><input type="submit" name="btnSearch" id="btnSearch" value="Search"</td>
</tr>
</table>	
</form>
} ?>

<!-- Part 2 -->
<?php
}
/* if postback via clicking Search Button */
</body>
</html>