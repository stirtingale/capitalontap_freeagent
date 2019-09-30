<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Convert Captial on Tap to FreeAgent</title>
	<?php $cachebuster = time(); ?>
	<link href="dropzone.css?<?php echo $cachebuster ?>" type="text/css" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/css?family=Roboto:500&display=swap" rel="stylesheet">
	<script src="dropzone.js?<?php echo $cachebuster ?>"></script>

	<style>
		body {
			padding:3.6rem;
			font-family: 'Roboto', sans-serif;
			font-weight:500;
		}
		p {
			margin:0.9rem 0 3.6rem 0;
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

	<h1>CapitalOnTap to FreeAgent</h1>

	<p>A <strike>very lazy</strike> simple script to convert CapitalOnTap CSV outputs to a FreeAgent friendly CSVs for import.</p>

	<form action="upload.php" class="dropzone"></form>

</body>
</html>