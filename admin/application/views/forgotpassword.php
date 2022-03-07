<div class='login-container'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-4 col-sm-offset-4'>
                <h1 class='text-center title'>Forgot Password</h1>
                <form id="adminForgotpass" action="" method="post">
                    <div class='form-group'>
                        <div class='controls with-icon-over-input'>
                            <input placeholder="Email" class="form-control" data-rule-required="true" name="email" type="email" />
                            <i class='icon-user text-muted'></i>
                            <?= form_error('email', "<p class='text-danger'>", "</p>") ?>
                        </div>
                    </div>
                    <input id="forgotPassBtn" type="submit" class="btn btn-block" name="submit"/>
                </form>

                <div class='text-center'>
                    <hr class='hr-normal'>
                    <a href='<?php echo site_url('/'); ?>'><< Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#adminForgotpass").validate({
        rules: {
            email: {
                required: true,
                maxlength: 255,
                email: true
            },
        }
    });
</script>