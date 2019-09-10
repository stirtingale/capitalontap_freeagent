<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Convert Captial on Tap to FreeAgent</title>
	<style>
		body {
			padding:3.6rem;
		}
		p {
			margin:3.6rem 0;
		}
		code {
			padding:1.8rem;
			background:#e9e9e9;
			display: inline-block;
			width:40rem;
			max-width: 100%;
		}
	</style>
</head>
<body>


	<p><strike>Lazy</strike> Simple script to convert input.csv (from Capital on Tap) to a FreeAgent friendly CSV for import.</p>
	<?php 
	$outputfile_location = fopen("output.csv", "w") or die("Unable to open file!");
	?>
	<code>
	<?php 
	$row = 1;
	$counter = 0;
	$complete_output = null;
	if (($handle = fopen("input.csv", "r")) !== FALSE) {
	  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	  	$counter++;
	  	$output = null; // reset
	  	if($counter!=1){
	  		$output .= $data[0].","; // date
	  		$amount = abs($data[2]) * -1; // invert
	  		$output .= $amount.","; // amount
	  		$output .= $data[1]\n; // description
			fwrite($outputfile_location, $output);
	  		$output .= "<br>";
	  		$complete_output .= $output;
		}
	  }
	  fclose($handle);
	}

	echo $complete_output;
	?>
	</code>
	
	<p>
		<?php
		fclose($outputfile_location);
		$cachebuster = time();
		 ?>		
		 <a href="output.csv?<?php echo $cachebuster ?>" download>Download output.csv</a>

	</p>

</body>
</html>