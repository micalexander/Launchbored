<html>
	<head>
		<title>Loops: foreach</title>
	</head>
	<body>
	<?php	/*	foreach loops

		foreach (array_expression as $value)
			statement;

		foreach (array_expression as $key => $value)
			statement;

		Works only on arrays!
	*/ ?>

	<?php
		$ages = array(4, 8, 15, 16, 23, 42);
	?>

	<?php
		// using each value
		foreach($ages as $age) {
			echo $age . ", ";
		}
	?>
	<br />
	<?php
		// using each key => value pair
		foreach($ages as $position => $age) {
			echo $position . ": " . $age . "<br />";
		}
	?>
	<br />
	<?php
		// Just for fun...
		$prices = array("Brand New Computer"=>2000, 
		"1 month in Lynda.com Training Library"=>25, 
		"Learning PHP" => "priceless");
		foreach($prices as $key => $value) {
			if (is_int($value)) {
				echo $key . ": $" . $value . "<br />";
			} else {
				echo $key . ": " . $value . "<br />";
			}
		}
	echo	"<br />";
	echo	"<br />";
	echo	"<br />";
	var_dump($prices);
	?>

	</body>
</html>