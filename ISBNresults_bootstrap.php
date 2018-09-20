<?php

function return_data(){
    $baseURLbegin = "http://10.3.104.26:8983/solr/live-gt/select?indent=on&q=ISBN:%22";
    $baseURLend   = "%22&wt=json";
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

function handle_upload(){
    
    $target_file = basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if($imageFileType == "xls" || $imageFileType == "xlsx" || $imageFileType == "csv"){
        $target_dir = "uploads/excel/";
    } elseif($imageFileType == "doc" || $imageFileType == "docx"){
        $target_dir = "uploads/word/";
    } else{
        $target_dir = "uploads/general_uploads/";
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


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <style>body {padding-top: 65px;}</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>ISBN Results | File Upload</title>
</head>

<body>
    <!--    Navbar start    -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand order-1" href="#">Handover</a>
            <div class="navbar-nav">
                <a style="color: white;" class="nav-item nav-link" href="handover_bootstrap.php">Home</a>
            </div>
        </div>
    </nav>
    <!--    Navbar end    -->

    <!--    Main Container-->
    <div class="container pt-4">
        <!--    About  Row   -->
        <section id="about" class="row">
            <article class="col-lg">
                <?php
                    if (isset($_POST['submit'])) {
                        return_data();
                    }
                    if(isset($_POST['submit2'])){
                        handle_upload();
                    }
                ?>
                <hr>
                <form enctype="multipart/form-data" name="myForm" method="POST">
                    <fieldset>
                        <legend>Upload file</legend>
                        Select file to upload: <input type="file" name="fileToUpload">
                        <br>
                        <input type="submit" name ="submit2" value="Upload File">
                    </fieldset>
                </form>
            </article>
        </section>
        <!--    About  Row End  -->

        <hr>
        
        <!-- footer start -->
        <footer class="row py-3">
            <aside class="col-md text-md-right">
                <small><?= date('Y'); ?></small>
            </aside>
        </footer>
        <!-- footer end -->
    </div>
    <!--    Main Container End-->
   
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>