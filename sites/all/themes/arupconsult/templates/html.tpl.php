<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en" class="no-js oldie lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]>    <html lang="en" class="no-js oldie lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]>    <html lang="en" class="no-js oldie lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>

<?php print $styles; ?>
<?php print $scripts; ?>

</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>><!--[if lt IE 7]>
<p class="chromeframe">You are using an<strong>outdated</strong>browser. Please<a href="http://browsehappy.com/">upgrade your browser</a>or<a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a>to improve your experience.</p><![endif]-->
<?php print $page_top; ?>
<div id="page">
    <?php print $page; ?>
</div>
<?php print $page_bottom; ?>
</body>
</html>