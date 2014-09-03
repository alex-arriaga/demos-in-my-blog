<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<title>jQuery cookies complex JSON Object</title>
  	<meta name="description" content="jQuery cookies complex JSON Object">
  	<meta name="author" content="Alex Arriaga (@alex_arriaga_m)">
  	<link rel="stylesheet" href="css/style.css">

  	<!-- You MUST include json2 before jQuery Cookie and jQuery Cookies plugins -->
  	<!-- JSON2 Plugin (https://github.com/douglascrockford/JSON-js) -->
  	<script src="js/json2.js"></script>

  	<script src="js/jquery-1.10.2.min.js"></script>

  	<!-- jQuery Cookies (https://code.google.com/p/cookies/) -->
  	<script src="js/jquery.cookies.2.2.0.js"></script>
</head>
	<body>
	<?php
		// An array to simulate a complex JSON object
		$userSettings =  array(
			"personal_information" => array(
				"name" => "Alex",
				"last_name" => "Arriaga"
				),
			"extra_information" => array(
				"twitter" => "alex_arriaga_m",
				"facebook" => "alex.arriaga.m",
				"website" => "http://www.alex-arriaga.com/",
				"programming_languages" => array("HTML5", "CSS3", "JavaScript", "PHP", "Java", "C# .NET", "AWK", "LESS", "XML")
			)
		);


		// Creating the JSON object
		$jsonObject = json_encode($userSettings);
	?>
	<div class="container">
		<p>This is an example of a complex PHP array.This complex JSON object will be saved in a cookie. To see the saved object please use firebug (in cookie tab)</p>
		<?php
		echo "<pre>";
			print_r($userSettings);
		echo "</pre>";
		?>
		<p>This complex JSON object will be saved in a cookie. To see the saved object please use firebug (in cookie tab).</p>
		<textarea rows="4" cols="118">
		<?php print_r($jsonObject);?>
		</textarea>
		<p>For more interesting articles see my personal blog: <a href="http://www.alex-arriaga.com/" target="_blank">http://www.alex-arriaga.com/</a>.</p>
	</div>
	<script>
	(function($){
		$(document).on('ready', function(){
			//A cookie by the name 'userSettings' now exists with a serialized copy of $userSettings
			$.cookies.set( 'userSettings', <?php echo $jsonObject; ?> );

			//A variable named 'userSettings' now holds the unserialized object, it should be identical to the PHP variable 'userSettings'
			var userSettings = $.cookies.get( 'userSettings' );

			// Do something with the values read from cookie
			console.log(userSettings);
		});
	})(jQuery);
	</script>
	</body>
</html>