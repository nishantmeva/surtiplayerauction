<div class='login-container'>
    <div class='container'>
        <div class='row'>
          <div class='col-sm-4 col-sm-offset-4'>
            <h1 class='text-center title'>Reset Password</h1>
            <form id="adminResetpass" action="" method="post">
                <div class='form-group'>
                    <div class='controls with-icon-over-input'>
                        <input placeholder="Security Code" class="form-control" data-rule-required="true" name="reset_code"
                               id="reset_code" type="password" />
                        <i class="icon-eye-close text-muted"></i>
                        <?= form_error('reset_code', "<p class='text-danger'>", "</p>") ?>
                    </div>
                </div>

                <div class='form-group'>
                    <div class='controls with-icon-over-input'>
                        <input placeholder="New Password" class="form-control" data-rule-required="true" name="password"
                               id="password" type="password" />
                        <i class="icon-key text-muted"></i>
                        <?= form_error('password', "<p class='text-danger'>", "</p>") ?>
                    </div>
                </div>

                <div class='form-group'>
                    <div class='controls with-icon-over-input'>
                        <input placeholder="Confirm Password" class="form-control" data-rule-required="true" name="conPassword"
                               id="conPassword" type="password" />
                        <i class="icon-key text-muted"></i>
                        <?= form_error('conPassword', "<p class='text-danger'>", "</p>") ?>
                    </div>
                </div>

                <input id="resetPassBtn" type="submit" class="btn btn-block" name="submit"/>
            </form>

            <div class='text-center'>
            <hr class='hr-normal'>
                <a href='<?php echo site_url('admin'); ?>'><< Sign in</a>
            </div>
          </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#adminResetpass").validate({
        rules: {
            reset_code: {
                required: true,
                maxlength: 6,
                digits: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 20
            },
            conPassword: {
                required: true,
                equalTo: "#password"
            },
        },

    });
</script>
    
    