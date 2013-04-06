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
      <li class="active"><a href="http://nxt.comxa.com/submit"><img src="http://nxt.comxa.com/images/glyphicons_150_edit.png"> Sumbit</a></li>
    </ul>
    <form class="navbar-search pull-right" method='get' action='search'>
  <input type="text" name='search' class="search-query" placeholder="Search...">
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
      <th><img src="/images/glyphicons_050_link.png"></img> Sumbit a URL</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
	<form action='' method='post'>
	<input type='text' name='name' placeholder='Name...'><br />
	<input type='text' name='url' placeholder='Url...'><br />
	<input type='submit' name='submit' value='submit' class='btn btn-success'>
	</form>

	<?php
	if($_POST['submit']){
	
	$url = htmlentities(stripslashes(strip_tags($_POST['url'])));
	$name = htmlentities(stripslashes(strip_tags($_POST['name'])));

	if($name){

		if($url){

		$ch = curl_init($url);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch,  CURLOPT_HEADER, TRUE); //Include the headers
		curl_setopt($ch,  CURLOPT_NOBODY, TRUE); //Make HEAD request

		$response = curl_exec($ch);

		if ( $response === false ){
		    echo "<center><div class='alert alert-error'>Something Went Wrong!</div></center>";
		}

		//list of status codes you want to treat as valid:    
		$validStatus = array(200, 301, 302, 303, 307);

		if( !in_array(curl_getinfo($ch, CURLINFO_HTTP_CODE), $validStatus) ) {
		    echo "<center><div class='alert alert-error'>The Url is not vaild!</div></center>";
		}

		curl_close($ch);
		require("connect.php");
		$sql = mysql_query("SELECT * FROM Links WHERE url='$url'");
		$numrows = mysql_num_rows($sql);
		if($numrows == 0){

		$date = date("M d, Y");
			mysql_query("INSERT INTO Links VALUES('', '$name', '$url', '$date')")or die(mysql_error());

			$sql = mysql_query("SELECT * FROM Links WHERE url='$url' AND Name='$name'");
			$numrows = mysql_num_rows($sql);
			if($numrows == 1){

			
				header("Location: http://nxt.comxa.com");
			}
			else
				echo "<center><div class='alert alert-error'>
				An error occurred
				Your url was not
				submitted sadly
				</div></center>";

		}
		else
			echo "<center><div class='alert alert-error'>
			This url has been<br />
			Submitted already<br />
			Try another one
			</div></center>";


		}
		else
			echo "<center><div class='alert alert-error'>You must submit a<br />
			Url for this to work<br />
			Please try adding one
			</div></center>";

	}
	else
		echo "<center><div class='alert alert-error'>
		You must submit a<br />
		Name for your url<br />
		Please try adding one
		</div></center>";
	
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
