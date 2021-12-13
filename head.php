<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="/heinsoe.ico" />
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,user-scalable=no" />

        <link rel="stylesheet" href="style/index.css">
        <meta name="referrer" content="never">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120150821-4"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120150821-4');
        </script>


<?php
function head_Tag($title, $desc, $img = '', $lnk, $type = 'website')
{
    $host = 'https://movie.heinsoe.com/';
    $link = $host.$lnk;
?>
   
        <link rel="canonical" href="<?= $link; ?>" />

        <title><?= $title; ?></title>

        <!-- meta data -->
        <meta name="description" content='<?= $desc; ?>' />
        <meta name="keywords" content="" />

        <!-- open graph -->
        <meta property="og:image" content="<?= $img; ?>" />
        <meta property="og:image:type" content="image/jpg" />
        <meta property="og:image:width" content="400" />
        <meta property="og:image:height" content="300" />
        <meta property="og:description" content="<?= $desc; ?>" />
        <meta property="og:title" content="<?= $title; ?>" />
        <meta property="og:url" content="<?= $link; ?>" />
        <meta property="og:type" content="<?= $type; ?>" />
        <meta property="og:site_name" content="Free Movie" />

        <!-- twitter -->
        <meta name="twitter:title" content="<?= $title; ?>" />
        <meta name="twitter:description" content="<?= $desc; ?>" />
        <meta name="twitter:url" content="<?= $link; ?>" />
        <meta name="twitter:image" content="<?= $img; ?>" />
        <meta name="twitter:card" content="summary_large_image" />

    </head>

    <body>

    <?php

} ?>
