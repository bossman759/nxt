<?php
	if($_POST['submit']){
	require("connect.php");
	$url = mysql_real_escape_string(stripslashes(strip_tags($_POST['url'])));
	$name = mysql_real_escape_string(stripslashes(strip_tags($_POST['name'])));

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

		$uniqid = uniqid();

		$id_start = rand(1,9);

		$id = substr($uniqid,$id_start,5);

		$sql = mysql_query("SELECT * FROM Links WHERE url='$url'");
		$numrows = mysql_num_rows($sql);
		if($numrows == 0){

		$date = date("M d, Y");
			mysql_query("INSERT INTO Links VALUES('$id', '$name', '$url', '$date')");

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