<!DOCTYPE HTML>
<html>
  <head>
    <title>NXT</title>
  </head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="js/bootstrap.js"></script>
<body>
<style>
@iconSpritePath: asset-path('twitter/bootstrap/glyphicons-halflings.png');
</style>
<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <li><a href="http://nxt.comxa.com/"><img src="http://nxt.comxa.com/images/glyphicons_020_home.png"> Home</a></li>
      <li><a href="http://nxt.comxa.com/submit"><img src="http://nxt.comxa.com/images/glyphicons_150_edit.png"> Sumbit</a></li>
    </ul>
    <form class="navbar-search pull-right" method='get' action=''>
  <input type="text" name='search' class="search-query" placeholder="Search..." value="<?php echo $_GET['search'] ?>">
</form>
  </div>
</div>


<div class="page-header">
  <h1>NXT<small> The worlds information.</small></h1>
</div>
<table class="table table-bordered" cellspacing="10px">
  <caption></caption>
  <thead>
    <tr class="success">
      <th><img src="/images/glyphicons_027_search.png"> Results</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php
  require("connect.php");
	$search = strip_tags($_GET['search']);
	if($search){
	if(preg_match("/[A-Za-z-0-9]+/", $_GET['search'])){
	$date = date("F d, Y");
	mysql_query("INSERT INTO History VALUES('', '$search', '$date')");
	 
	$sql= mysql_query("SELECT * FROM Def WHERE Word LIKE '%" . $search . "%' OR Def LIKE '%" . $search  ."%'");
$numrows = mysql_num_rows($sql);
	if($numrows >= 1){
	while($row = mysql_fetch_assoc($sql)){
	

	$id = $row['id'];
	$word = $row['Word'];
	$def = $row['Def'];
	$date = $row['Date'];	
	echo "<b>$word</b><br />";
	echo "$def<br />";

	}

	}

	$sql= mysql_query("SELECT * FROM Graphs WHERE name LIKE '%" . $search . "%' OR source LIKE '%" . $search  ."%'");
$numrows = mysql_num_rows($sql);
	if($numrows >= 1){
	while($row = mysql_fetch_assoc($sql)){
	

	$id = $row['id'];
	$name = $row['name'];
	$html = $row['html'];
	$source = $row['source'];
	$date = $row['date'];
	echo "<a target='_blank' href='$source'>$name</a><br />";
	echo "$html <br />";

	}

	}


	$sql= mysql_query("SELECT * FROM Links WHERE url LIKE '%" . $search . "%' OR Name LIKE '%" . $search  ."%' OR Name='$search' OR url='$search' LIMIT 12");
	$numrows = mysql_num_rows($sql);
	if($numrows >= 1){
	while($row = mysql_fetch_assoc($sql)){
	
	$id = $row['id'];
	$name = $row['Name'];
	$url = $row['url'];
	$date = $row['date'];
	$tags = get_meta_tags("$url");
	$description = $tags["description"];
	$author = $tags['author'];
	$keywords = $tags['keywords'];
	//echo "<a target='_blank' href='$url'>$name</a> | <a href='http://nxt.comxa.com/save?url=$url&name=$name' class='btn btn-mini btn-success'>Save</a><br/>";

    	$str = file_get_contents($url);
        preg_match("/\<title\>(.*)\<\/title\>/",$str,$title);
        $Title = $title[1];
	if($Title){
	echo "<a target='_blank' href='$url'>$Title</a> | <a href='http://nxt.comxa.com/spam?id=$id'>Spam</a> |
	<a href='https://twitter.com/share' class='twitter-share-button' data-url='$url' data-text='$Title' data-related='AskNxt'>Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='//platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script><a href='http://bufferapp.com/add' class='buffer-add-button' data-text='$Title' data-url='$url' data-count='horizontal' >Buffer</a><script type='text/javascript' src='http://static.bufferapp.com/js/button.js'></script>
<br/>";
	}
	else 
	echo "<a target='_balnk' href='$url'>$name</a> |
	<a href='https://twitter.com/share' class='twitter-share-button' data-url='$url' data-text='$Title' data-related='AskNxt'>Tweet</a> | <a href='http://nxt.comxa.com/spam?id=$id'>Spam</a> | 
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='//platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','twitter-wjs');</script><a href='http://bufferapp.com/add' class='buffer-add-button' data-text='$Title' data-url='$url' data-count='horizontal' >Buffer</a><script type='text/javascript' src='http://static.bufferapp.com/js/button.js'></script>
<br/>";
    

	echo "$url<br />";
	echo "$description<br />";


	}

	}
	else
	echo "<center><div class='alert alert-error'>
No Link Results were<br />
Found for the entered search term<br />
Try another term</div></center>";

	}
	else
	echo "<center><div class='alert alert-error'>
	Improper Input<br />
Letters and numbers only<br />
Do not use symbols
</div></center>";
	}
	else
		header("Location: http://nxt.comxa.com/");

	$sql = mysql_query("SELECT * FROM LINKS ");
      ?></td>
     
    </tr>
  </tbody>
</table>
<div class="alert alert-info">
NXT 2013 - Mundi informationes<br />
<a target='_blank' href='http://thenxt.tumblr.com/'>Blog</a> | <a target='_blank' href='http://twitter.com/asknxt'>@AskNXT</a>
</div>
</body>
</html>