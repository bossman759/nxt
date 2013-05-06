<?php
	$id = $_GET['id'];
	require("connect.php");
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);


	if($id){
	$sql = mysql_query("SELECT * FROM Links WHERE id='$id'");
	$numrows = mysql_num_rows($sql);
	if($numrows == 1){

	$row = mysql_fetch_assoc($sql);
	$id = $row['id'];
	$name = $row['Name'];
	$url = $row['url'];

	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date("F d, Y");


	mysql_query("INSERT INTO Analytics VALUES('', '$ip', '$id', '$url', '$lang', '$date')");

	header("LOCATION: $url");

	}
	else header("LOCATION: http://nxt.comxa.com/");
	
	}
	else header("LOCATION: http://nxt.comxa.com/");

      ?>
