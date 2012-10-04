<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <title>Launchbored</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=0.8,user-scalable=no,maximum-scale=1,width=device-width">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Orienta' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/normalize.css" />


</head>
<body class="homepage">
    <?php include('view/header.php'); ?>
    
    <section id="content">
        <div id="usercontent"></div>
        
        <div id="containerwrapper">
            <div id="container" class="transitions-enabled clearfix">
                <?php echo $page_content; ?>
            </div>
        </div>
    </section>
    
    <?php include('view/footer.php'); ?>
</body>
</html>