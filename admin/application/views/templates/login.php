<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo SITENAME; ?></title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href='<?php echo SITE_IMAGES; ?>favicon.ico' rel='shortcut icon' type='image/x-icon'>

    <!--[if lt IE 9]>
    <script src="<?php echo SITE_JS; ?>ie/html5shiv.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>ie/respond.min.js" type="text/javascript"></script>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap.css" >
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>light-theme.css" >
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>theme-colors.css" >
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>demo.css" >

    <script src="<?php echo SITE_JS; ?>jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>validate.min.js" type="text/javascript" ></script>
</head>
<body class='contrast-sea-blue login contrast-background'>
    <div class='middle-container'>
        <div class='middle-row'>
            <div class='middle-wrapper'>
                <div class='login-container-header'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='text-center'>
                                    <img src="<?php echo SITE_IMAGES; ?>AdminLogin.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='container'>
                    <div class='row'>
                        <div class='col-sm-4 col-sm-offset-4'>
                            <?php echo get_flashMsg(); ?>
                        </div>
                    </div>
                </div>
                <!-- Content Area-->
                <?php echo $body; ?>
                <!-- End Content Area-->

            </div>
        </div>
    </div>
    <script src="<?php echo SITE_JS; ?>bootstrap.min.js" type="text/javascript"></script>
</body>
</html>