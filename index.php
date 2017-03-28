<!doctype html>
<?php
$index;
$dir; // remove $ and add string datatype
$msec; // remove $ and add int datatype
//on ardurino swap $ for &
sscanf(file_get_contents("data.txt"),"%d %s : %d",$index,$dir,$msec);
$txt = $index +1 ." ".$_GET['dir'] . " : ".$_GET['sec'];
$myfile = file_put_contents("data.txt",$txt);

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
            <?php if($_GET['dir'] && $_GET['sec']) {$divSize="6";} else {$divSize="12";} ?>
            <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="get" class="col-md-<?=$divSize?>">
                <input type="radio" name="dir" value="up">&uarr;<br>
                <input type="radio" name="dir" value="down">&darr;<br>
                <input type="radio" name="dir" value="left">&larr;<br>
                <input type="radio" name="dir" value="right">&rarr;<br>
                <input type="number" name="sec">
                <input type="submit">
            </form>
                <div class="col-md-<?=$divSize?>">
                    <?php

                    echo("you told the bot to move $dir for $msec milliseconds");
                    ?>
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
