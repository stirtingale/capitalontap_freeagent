<?php
$ds = DIRECTORY_SEPARATOR;  
$storeFolder = 'uploads';   
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  
    $targetFile =  $targetPath. $_FILES['file']['name'];  
    move_uploaded_file($tempFile,$targetFile); 
    // convert vars
    $outputFile =  $targetPath. 'converted-' .$_FILES['file']['name'];  
	$outputfile_location = fopen($outputFile, "w") or die("Unable to open file!");
	$row = 1;
	$counter = 0;
	$complete_output = null;
	// convert
	if (($handle = fopen($targetFile, "r")) !== FALSE) {
	  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	  	$counter++;
	  	$output = null; // reset
	  	if($counter!=1){
	  		$output .= $data[0].","; // date
	  		if($data[2]<0){
	  			$amount = abs($data[2]) * 1; // invert
	  		} else {
	  			$amount = abs($data[2]) * -1; // invert
	  		}
	  		$output .= $amount.","; // amount
	  		$output .= $data[1]."\n"; // description
			fwrite($outputfile_location, $output);
	  		$complete_output .= $output;
		}
	  }
	  fclose($handle);
	}
	fclose($outputfile_location);
}
?>     