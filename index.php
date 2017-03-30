<!doctype html>
<?php
if($_POST) {
    $i;
    $l = $_POST['Left'];
    $r = $_POST['Right'];
    $txt['i'] = $i;
    $txt['l']=$l;
    $txt['r']=$r;
    $myfile = file_put_contents("data.txt", $txt);
}
?>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div id="page">
            <div class="container">
            <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="col-md-8">
                <div class="col-md-5">
                    <h2>Left Wheel</h2>
                    <input type="range" name="Left" id="" step="5"></div>
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-5">
                    <h2>Right</h2>
                    <input type="range" name="Right" id="" step="5"></div>
                <input type="submit" value="">
            </form>
                <div class="col-md-4">
                    <video src="" width="100%"></video>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
