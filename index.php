<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ice Blu</title>
        <!--[if lt IE 9]>
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="util/css/general.css">
        <style>
            nav ul li a#inicio{
                background-color:#daebef;
            }
        </style>
        <meta charset="UTF-8">
        <meta name="description" content="Sorveteria Ice Blu">
        <meta name="keywords" content="Sorveteria Ice Blu">
        <meta name="author" content="Leonardo Rodrigues">
        <meta http-equiv="refresh" content="30">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <nav>
            <?php include_once "./view/include/header.php"; ?>
        </nav>

        <footer>
            <?php include_once "./view/include/footer.php"; ?>
        </footer>
    </body>
</html>