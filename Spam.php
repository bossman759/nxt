	<?php
	if(strip_tags($_GET['id'])){
	echo "<form action='' method='post'>
	<input type='submit' name='submit' value='Spam?' class='btn btn-success'>
 	</form>";

	if($_POST['submit']){
	require("connect.php");
	$id = strip_tags(stripslashes($_GET['id']));
	mysql_query("DELETE FROM Links WHERE id='$id'")or die(mysql_error());

	header("LOCATION: http://nxt.comxa.com/");

	}

	}else{

	}
?>