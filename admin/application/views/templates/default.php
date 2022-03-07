<!DOCTYPE html>
<html>
<?php
$sessionData = $this->session->userdata['admin'];
$sessionData['name'] = $sessionData['name'];
if(!empty($sessionData['logo'])){
    $logo = IMAGE_URL."/".$sessionData['logo'];
}else{
    $logo = IMAGE_URL."/dummy_logo.png";
} ?>
<head>
    <meta content='text/html;charset=utf-8' http-equiv='content-type'>
    <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
    <title><?php echo SITENAME; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href='<?php echo SITE_IMAGES; ?>favicon.ico' rel='shortcut icon' type='image/x-icon'>

    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap.css" />
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>light-theme.css" />
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap-switch.css" />
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>bootstrap-datatable.css" />
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>theme-colors.css" />
    <link rel="stylesheet" href="<?php echo SITE_CSS; ?>demo.css" />
    <link rel="stylesheet" href="<?php echo ASSETS; ?>plugin/notifications/notification.css" />


    <script src="<?php echo SITE_JS; ?>jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS; ?>plugin/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>validate.min.js" type="text/javascript" ></script>
    <script src="<?php echo SITE_JS; ?>additional_methods.min.js" type="text/javascript"></script>

</head>
<body class='contrast-sea-blue'>

    <header>
        <nav class='navbar navbar-default'>
            <a class='navbar-brand' href='<?php echo site_url('dashboard/');?>' >
                <img width="125" height="35" src="<?php echo SITE_IMAGES; ?>AdminLogin.png" alt="<?php echo SITENAME; ?>" />
            </a>
            <a class='toggle-nav btn pull-left' href='#'>
                <i class='icon-reorder'></i>
            </a>
            <ul class='nav'>
                <li class='dropdown dark user-menu'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                        <img width="23" height="23" alt="<?php echo $sessionData['name']; ?>" src="<?php echo $logo; ?>" />
                        <span class='user-name'><?php echo $sessionData['name']; ?></span>
                        <b class='caret'></b>
                    </a>
                    <ul class='dropdown-menu'>
                        <li>
                            <a href='<?php echo site_url('tournament/profile'); ?>'>
                                <i class='icon-user'></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('tournament/change_password'); ?>'>
                                <i class="icon-cog"></i>
                                Change Password
                            </a>
                        </li>
                        <li>
                            <a href='<?php echo site_url('tournament/profile_image'); ?>'>
                                <i class="icon-camera"></i>
                                Profile Image
                            </a>
                        </li>
                        <li class='divider'></li>
                        <li>
                            <a href='<?php echo site_url('dashboard/logout'); ?>'>
                                <i class='icon-signout'></i>
                                Sign out
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div id='wrapper'>
        <div id='main-nav-bg'></div>
        <nav id='main-nav'>
            <div class='navigation'>
                <ul class='nav nav-stacked'>
                    <?php if($this->router->fetch_class()=="dashboard" && $this->router->fetch_method()=="index"){
                        $das_active = "active";
                    }else{
                        $das_active = "";
                    } ?>
                    <li class='<?php echo $das_active; ?>'>
                        <a href='<?php echo site_url('dashboard'); ?>'>
                            <i class='icon-dashboard'></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

					<?php if($this->router->fetch_class()=="teams"){
                        $team_active = "active";
                    }else{
                        $team_active = "";
                    } ?>
                    <li class='<?php echo $team_active; ?>'>
                        <a href='<?php echo site_url('teams/list'); ?>'>
                            <i class='icon-group'></i>
                            <span>Teams</span>
                        </a>
                    </li>

                    <?php if($this->router->fetch_class()=="players"){
                        $players_active = "active";
                    }else{
                        $players_active = "";
                    } ?>
                    <li class='<?php echo $players_active; ?>'>
                        <a href='<?php echo site_url('players/list'); ?>'>
                            <i class='icon-user'></i>
                            <span>Players</span>
                        </a>
                    </li>

					<?php if($this->router->fetch_class()=="assignplayers"){
                        $assign_players_active = "active";
                    }else{
                        $assign_players_active = "";
                    } ?>


                    <li class='<?php echo $assign_players_active; ?>'>
                        <a href='<?php echo site_url('assignplayers/list'); ?>'>
                            <i class='icon-sitemap'></i>
                            <span>Assign Players</span>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <section id='content'>
            <div class='container'>

                <!-- Content Area-->
                <?php echo $body; ?>
                <!-- End Content Area-->

                <footer id='footer'>
                    <div class='footer-wrapper'>
                        <div class='row'>
                            <div class='col-sm-6 text'>
                                Copyright © <?php echo date('Y')." ".SITENAME; ?>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </section>
    </div>

    <script src="<?php echo SITE_JS; ?>jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>jquery.mobile.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>bootstrapSwitch.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>jquery.dataTables.columnFilter.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>dataTables.overrides.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>theme.js" type="text/javascript"></script>
    <script src="<?php echo SITE_JS; ?>demo.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS; ?>plugin/notifications/notify.min.js"></script>
    <script src="<?php echo ASSETS; ?>plugin/notifications/notify-metro.js"></script>
    <script src="<?php echo ASSETS; ?>plugin/notifications/notifications.js"></script>
</body>
</html>

