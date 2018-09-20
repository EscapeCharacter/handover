<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Handover</title>
</head>

<body>
    <!--    Navbar start    -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand order-1" href="#">Handover</a>
            <div class="navbar-nav">
                <a style="color: white;"  class="nav-item nav-link" href="#">Home</a>
            </div>
        </div>
    </nav>
    <!--    Navbar end    -->

    <!--    Main Container-->
    <div class="container pt-4">
        <!--    About  Row   -->
        <section id="about" class="row">
            <article class="col-lg">
                <form action="ISBNresults_bootstrap.php" method="POST" name="form2">
                    <fieldset>
                        <legend>Get ISBN Information</legend>
                        Enter ISBN: <input type="text" name="isbn_input">
                        <input type="submit" name="submit" value="Go">
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
   
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>