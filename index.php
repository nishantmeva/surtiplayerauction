<?php
include_once('front/config/conn.php');
$i = 0;
if ($_POST) {
    session_start();
    // username and password sent from Form
    $loginId = mysqli_real_escape_string($conn,$_POST['loginId']);
    $myPassword = md5(mysqli_real_escape_string($conn,$_POST['password']));

    $sql = "SELECT * FROM tournament WHERE email='".$loginId."' and password='".$myPassword."' and active=1 limit 1";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);

    $count = mysqli_num_rows($result);

    // If result matched email and password, table row must be 1 row
    if ($count == 1) {
        $_SESSION['user_login'] = $row['id'];
        header("location: front");
    } else {
        $i = 1;
    }
}
?>
<?php include_once('header.php'); ?>
<style>
    body, html {
        height: 100%;
    }

    body {
        /* //position: fixed; */
        /* The image used */
        background-image: url("common_uploads/bg_body.jpg");

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        font-size: 13px;
    }
    
    .presentCom{
        font-size: 17px;
        background: #f1f1f1;
        padding: 10px;
        margin: 10px auto;
        color: #353784;
        letter-spacing: 1px;
        box-shadow: 0 0 2px 2px #353784;
        font-weight: 700;
        text-align: center;
        opacity: 0.7;
    }
    .panel-info{
        font-size: 20px;
    }
    .nametxt{
        font-family: sans-serif;
        font-variant: all-small-caps;
        font-weight: 700;
        font-size: 32px;
    }
    #confetti{
        position: absolute;
        z-index: 99;
        width: 100%;
    }
    .subpresent{
        font-size: 18px;
    }
    .present{ font-size: 16px;}
   
    @media screen and (min-width: 1900px) {
        .container {
            width: 1870px;
            max-width: 2400px;
        }

        .nametxt{
            font-size: 48px;
        }
        .subpresent{
            font-size: 38px;
        }
        .present{ font-size: 25px;}
    }
</style>
<div class="container">
    <div class="row presentCom">
        <div class="col-sm-2">
            <img src="common_uploads/logo.png" style="width: 130px;"/>
        </div>
        <div class="col-sm-8">
            <p class="present">Presents By</p>
            <h1 class="nametxt"><?php echo SITENAME." ".YEAR;?></h1>
        </div>
        <div class="col-sm-2">
            <img src="common_uploads/Futurehat-trans.png" style="width: 130px;"/>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="row panel panel-default panel-info" style="margin-top: 25px;">

                <div class="panel-heading"> 
                    <strong class="">Login</strong>
                    <span id="clock" class="pull-right"></span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="index.php" method="post">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="loginId" class="form-control" id="loginId" placeholder="Email" required="" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="" />
                            </div>
                        </div>

                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-info btn-md">Sign in</button>
                            </div>
                        </div>
                    </form>
                    <?php if ($i == 1) { ?>
                        <p style='color: red;'>Your Email or Password is invalid!</p>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
   
</div>


<?php include_once('footer.php'); ?>
        
		
    

