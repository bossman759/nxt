<!DOCTYPE HTML>
<html>
  <head>
    <title>NXT</title>
  </head>
<body>
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


</body>
</html>