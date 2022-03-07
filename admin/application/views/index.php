<div class='login-container'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-4 col-sm-offset-4'>
                <h1 class='text-center title'>Sign in</h1>
                <form id="adminLogin" action="" method="post">
                    <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                            <input placeholder="Email" class="form-control" data-rule-required="true" name="email" type="text" />
                            <i class='icon-user text-muted'></i>
                            <?= form_error('email', "<p class='text-danger'>", "</p>") ?>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                            <input placeholder="Password" class="form-control" data-rule-required="true" name="password" type="password" />
                            <i class='icon-lock text-muted'></i>
                            <?= form_error('password', "<p class='text-danger'>", "</p>") ?>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-block" value="Sign in" name="submit"/>
                </form>

                <div class='text-center'>
                    <hr class='hr-normal'>
                    <a href='<?php echo site_url('forgotpassword/'); ?>'>Forgot your password? >></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#adminLogin").validate({
        rules: {
            email: {
                required: true,
                maxlength: 255,
                email: true
            },
            password: {
                required: true,
                maxlength: 255
            },
        }
    });
</script>
