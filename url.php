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
  $id = $_GET['id'];
	require("connect.php");
	if($id){
	$sql = mysql_query("SELECT * FROM Links WHERE id='$id'");
	$numrows = mysql_num_rows($sql);
	if($numrows == 1){

	$row = mysql_fetch_assoc($sql);
	$id = $row['id'];
	$name = $row['Name'];
	$url = $row['url'];
	$date = $row['date'];

	header("LOCATION: $url");

	}
	else header("LOCATION: http://nxt.comxa.com/");
	
	}
	else header("LOCATION: http://nxt.comxa.com/");

      ?></td>
     
    </tr>
  </tbody>
</table>
<div class="alert alert-info">
NXT 2013 - Mundi informationes<br />
<a target='_blank' href='http://thenxt.tumblr.com/'>Blog</a> | <a target='_blank' href='http://twitter.com/asknxt'>@AskNXT</a> | <a href='https://github.com/bossman759/nxt' target='_blank'>Github</a>
</div>
</body>
</html>
