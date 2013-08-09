<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<title>Sending an email using JavaScript</title>
  	<meta name="description" content="Sending an email using JavaScript">
  	<meta name="author" content="Alex Arriaga (@alex_arriaga_m)">
  	<link rel="stylesheet" href="css/style.css">
  	<script src="js/jquery-1.10.2.min.js"></script>
</head>
	<body>
	<?php
		// An array to simulate a complex JSON object
		$userAttributes =  array(
			"personal_information" => array(
				"name" => "Alex",
				"last_name" => "Arriaga",
				"age" => 25
				),
			"extra_information" => array(
				"twitter" => "alex_arriaga_m",
				"facebook" => "alex.arriaga.m",
				"website" => "http://www.alex-arriaga.com/",
				"programming_languages" => "HTML5, CSS3, JavaScript, PHP, Java, C# .NET, AWK, LESS, XML"
			)
		);


		// Creating the JSON object
		$jsonObject = json_encode($userAttributes);
	?>
	<div class="container">
		<p>This is an example of a complex PHP array. We will use this information to send a email using the mail client</p>
		<?php
		echo "<pre>";
			print_r($userAttributes);
		echo "</pre>";
		?>
		<p>This complex JSON object will be sent by email. <a id="sendByEmail" class="btn" href="#">Send now!</a></p>
		<textarea rows="4" cols="118">
		<?php print_r($jsonObject);?>
		</textarea>
		<p>For more interesting articles see my personal blog: <a href="http://www.alex-arriaga.com/" target="_blank">http://www.alex-arriaga.com/</a>.</p>
	</div>
	<script>
	(function($){
		var userAttributes = <?php echo $jsonObject;?>;

		// Function to "simulate" capitalize string
		String.prototype.capitalize = function() {
			return this.charAt(0).toUpperCase() + this.slice(1);
		}

		// Our sending by mail function (reads a PHP JSON object and throws mail client)
		function SendByMail() {
		    var body = "-- User Attributes --\r\n\r\n";
		    var list = "";

		    $.each( userAttributes, function( fkey, fvalue ) {
		    	list += fkey.toUpperCase().replace("_"," ") + "\n";
				   $.each(fvalue, function(skey, svalue){
				   		list += skey.replace("_"," ").capitalize() + ": " + svalue + "\n";
				   });
				list += "\n";
			}); // First level


		    body += list;
		    // Configure mailto
		    var uri = "mailto:?subject=";
		        uri += encodeURIComponent(document.title);
		        uri += "&body=";
		        uri += encodeURIComponent(body);
		        window.location.href = uri;
		}

		$(document).on('ready', function(){
			$("#sendByEmail").on('click', function(){
				SendByMail();
			});
		});
	})(jQuery);
	</script>
	</body>
</html>