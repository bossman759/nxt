<!DOCTYPE HTML>
<html>
  <head>
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
    <form class="navbar-search pull-right" method='get' action='search'>
  <input type="text" name='search' class="search-query" placeholder="Search...">
</form>
  </div>
</div>


<div class="page-header">
  <h1>NXT<small> The world's information.</small></h1>
</div>
<table class="table table-bordered" cellspacing="10px">
  <caption></caption>
  <thead>
    <tr class="success">
      <th><img src="http://nxt.comxa.com/images/glyphicons_150_edit.png"></img> Articles</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
	<?php
	if($_GET['id']){
	require("connect.php");
	$id = $_GET['id'];
	$sql = mysql_query("SELECT * FROM Articles WHERE id='$id'");
	$numrows = mysql_num_rows($sql);
	if($numrows == 1){
	$row = mysql_fetch_assoc($sql);
	$id = $row['id'];
	$title = $row['title'];
	$text = nl2br($row['text']);
	$sources = nl2br($row['sources']);
	$date = $row['date'];

	echo "<h1>$title</h1><br />";

	echo "<blockquote>
	<p>$text</p>
	<small>$date <cite title='Source Title'>$title</cite></small>
	</blockquote><br />";

	
	echo "<p class='muted'>
	$sources
	</p>";

	}
	else
		header("Location: http://nxt.comxa.com/");
	}
	else{
	?>
      <form method='post'>
	<input type='text' name='title' placeholder='Title...' required><br />
	<textarea name='text' rows='7' placeholder='Text...' required></textarea><br />
	<textarea name='sources' rows='5' placeholder='Sources EX: Cain, Kevin. "The Negative Effects of Facebook on Communication." Social Media Today RSS N.p., 29 June 2012...' required></textarea><br />
	<input type='submit' name='submit' class='btn btn-success'>
      </form>
	<?php
	require("connect.php");
	$title = mysql_real_escape_string(stripslashes(strip_tags($_POST['title'])));
	$text = mysql_real_escape_string(stripslashes(strip_tags(nl2br($_POST['text']))));
	$sources = mysql_real_escape_string(stripslashes(strip_tags(nl2br($_POST['sources']))));
	if($_POST['submit']){
	if($title){

		if($text & $sources){
		
			$sql = mysql_query("SELECT * FROM Articles WHERE title='$title' AND text='$text' AND sources='$sources'");
			$numrows = mysql_num_rows($sql);
			if($numrows == 0){

			$date = date("M d, Y");

			$uniqid = uniqid();
			$id_start = rand(1,9);
			$id = substr($uniqid,$id_start,5);
			mysql_query("INSERT INTO Articles VALUES('$id', '$title', '$text', '$sources', '$date')");				
			
			$sql = mysql_query("SELECT * FROM Articles WHERE title='$title' AND text='$text' AND sources='$sources'");
			$numrows = mysql_num_rows($sql);
			if($numrows == 1){

			$url = "Http://nxt.comxa.com/article?id=$id";
			mysql_query("INSERT INTO Links VALUES('$id', '$title', '$url', '$date')")or die(mysql_error());

				header("Location: http://nxt.comxa.com");
			
			}
			else
				echo "<center><div class='alert alert-error'>
				An error occurred
				Your article was not
				submitted sadly
				</div></center>";

			}
			else
				echo "<center><div class='alert alert-error'>
				This article has<br />
				Been sumbitted already<br />
				Please don't plagiarise
				</div></center>";

		}
		else
			echo "<center><div class='alert alert-error'>
			You must submit some<br />
			Text for your article<br />
			Please try adding some
			</div></center>";

	}
	else
		echo "<center><div class='alert alert-error'>
		You must submit a<br />
		Name for your article<br />
		Please try adding one
		</div></center>";
	}
	}
	?>
     </td>
    </tr>
  </tbody>
</table>
<div class="alert alert-info">
NXT 2013 - Mundi informationes<br />
<a target='_blank' href='http://thenxt.tumblr.com/'>Blog</a> | <a target='_blank' href='http://twitter.com/asknxt'>@AskNXT</a> | <a href='https://github.com/bossman759/nxt' target='_blank'>Github</a>
</div>
</body>
</html>