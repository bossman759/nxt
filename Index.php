<!DOCTYPE HTML>
<html>
  <head>
    <title>NXT - Mundi informationes</title>
  </head>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
var timeOut;
function scrollToTop() {
  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
    window.scrollBy(0,-50);
    timeOut=setTimeout('scrollToTop()',10);
  }
  else clearTimeout(timeOut);
}

$(document).ready(function() {
  $('#link1').click(function(){ 
       $('#world').slideToggle('fast'); 
        return false; 
      });

  $('#link2').click(function(){ 
       $('#sports').slideToggle('fast'); 
        return false; 
      });

  $('#link3').click(function(){ 
       $('#tech').slideToggle('fast'); 
        return false; 
      });

  $('#link4').click(function(){ 
       $('#other').slideToggle('fast'); 
        return false; 
      });

}); 

</script>
<body>
<style>
@iconSpritePath: asset-path('twitter/bootstrap/glyphicons-halflings.png');
</style>
<div class="navbar">
  <div class="navbar-inner">
    <ul class="nav">
      <li class="active"><a href="http://nxt.comxa.com/"><img src="http://nxt.comxa.com/images/glyphicons_020_home.png"> Home</a></li>
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
<th>News</th>
<th>Featured</th>
</tr>
</thead>
<tbody>
	<tr>
		<td>
		<a id='link1' href='#'><h2>World News</h2></a>
		<div id='world'>
		<?php
		$html = "";
		$url = "http://feeds.bbci.co.uk/news/rss.xml";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank' href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		
		<a id='link2' href='#'><h2>Sports</h2></a>
		<div id='sports'>
		<?php
		$html = "";
		$url = "http://news.yahoo.com/rss/sports";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		<a id='link3' href='#'><h2>Tech</h2></a>
		<div id='tech'>
		<?php
		$html = "";
		$url = "http://feeds.feedburner.com/TechCrunch/";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>

		<a id='link4' href='#'><h2>Other</h2></a>
		<div id='other'>
		<?php
		$html = "";
		$url = "http://digg.com/rss/top.rss";
		$xml = simplexml_load_file($url);
		for($i = 0; $i < 1; $i++){
	
			$title = $xml->channel->item[$i]->title;
			$link = $xml->channel->item[$i]->link;
			$description = $xml->channel->item[$i]->description;
			$pubDate = $xml->channel->item[$i]->pubDate;
	
			$html .= "<a target='_blank'  href='$link'>$title</a><br />";
			$html .= "$description";
			$html .= "<br />$pubDate<hr />";
		}
		echo $html;
		?>		
		</div>
	
      		</td>
		<td>
		<?php
		require("connect.php");
	
		$sql = mysql_query("SELECT * FROM Links ORDER BY RaND() LIMIT 5");
		$numrows = mysql_num_rows($sql);
		if($numrows >= 1){
		while($row = mysql_fetch_assoc($sql)){
			$id = $row['id'];
			$name = $row['Name'];
			$url = $row['url'];
			$date = $row['date'];

			echo "<a href='$url' target='_blank'>$name</a><br /><hr />";

		}
		}
		?>
		
		<b>Follow NXT</b><hr /> 

		<a href="https://twitter.com/AskNxt" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false">Follow @AskNxt</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script><hr />

		<iframe class="btn" frameborder="0" border="0" scrolling="no" allowtransparency="true" height="25" width="114" src="http://platform.tumblr.com/v1/follow_button.html?button_type=2&tumblelog=thenxt&color_scheme=light"></iframe><hr />

		<iframe src="http://ghbtns.com/github-btn.html?user=Officialnxt&type=follow"
  allowtransparency="true" frameborder="0" scrolling="0" width="132" height="20"></iframe><hr />

	</tr>
</tbody>
</table>
<div class="alert alert-info">
NXT 2013 - Mundi informationes<br />
<a target='_blank' href='http://thenxt.tumblr.com/'>Blog</a> | <a target='_blank' href='http://twitter.com/asknxt'>@AskNXT</a> | <a href='http://officialnxt.github.io/nxt' target='_blank'>Github</a> | <a href="#" onclick="scrollToTop();return false">Top</a>
</div>
</body>
</html>