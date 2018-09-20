<form action="index.php">
	<button>Back Home</button>
</form>

<?php

function return_data(){
	$baseURLbegin = "http://10.3.104.26:8983/solr/live-gt/select?indent=on&q=ISBN:%22";
	$baseURLend	  = "%22&wt=json";
	$userISBN = preg_replace("/-/", "", $_POST['isbn_input']);
	$fullURL = $baseURLbegin . $userISBN . $baseURLend;
	$JSONraw = file_get_contents($fullURL);
	$JSON = json_decode($JSONraw, true);
	$resultsArray = $JSON['response']['docs'][0];

	foreach($resultsArray AS $k => $v){
		if($k == 'DAC_KEY' || $k == 'TYPE' || $k == 'EBK_ISBN' || $k == 'ORDER_NO' || $k == 'AUTHORS' || $k == 'PUBLISHING_HOUSE_DESC' || $k == 'TITLE_FULL'){
				print "<pre>";
				print_r('['. $k . ']' . ' => ' . $v);
				print "</pre>";
		}
	}
	// print "<pre>";
	// print_r($JSON);
	// print "</pre>";
}

if (isset($_POST['submit'])) {
	return_data();
}

function handle_upload(){
	
	$target_file = basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if($imageFileType == "xls" || $imageFileType == "xlsx" || $imageFileType == "csv"){
	    $target_dir = "excel/";
	} elseif($imageFileType == "doc" || $imageFileType == "docx"){
	    $target_dir = "word/";
	} else{
		$target_dir = "uploads/";
	}

	$target_file = $target_dir . $target_file;

	$errorMsg = null;
		
	if (file_exists($target_file)) {
		$errorMsg = "Sorry, file already exists.";
	}

	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $errorMsg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $errorMsg = "Sorry, there was an error uploading your file.";
    }
	
	echo $errorMsg;
}

if(isset($_POST['submit2'])){
	handle_upload();
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ISBN Info</title>
	<style>
		div {
			width: 40%;
		}
	</style>
</head>

<body>

<div>
	<form enctype="multipart/form-data" name="myForm" method="POST">
		<fieldset>
			<legend>Upload file</legend>
			Select file to upload: <input type="file" name="fileToUpload">
			<br>
			<input type="submit2" name ="submit" value="Upload File">
		</fieldset>
</form>
</div>

</body>

</html> 
