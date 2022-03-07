<div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='icon-cog'></i>
        <span><?php echo $title; ?></span>
    </h1>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header sea-blue-background">
                <div class="title">
                    <div class="icon-edit"></div>
                    Change Password
                </div>
            </div>
            <div class="box-content">
                <form id="changePasswordForm" class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email</label>
                        <div class="col-md-5">
                            <label class="control-label"><?= $this->session->userdata('admin')['email']; ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="passwordNew" class="col-md-2 control-label">New Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" name="new_password" id="new_password" />
                        </div>
                    </div>

                    <div class="form-actions form-actions-padding-sm">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Change</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#changePasswordForm").validate({
        rules: {
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 255
            },
        },
        submitHandler: function (form) {
            $.ajax({
                url: '<?= site_url('tournament/change_password') ?>',
                type: 'POST',
                data: $(form).serialize(),
                success: function (response) {
                    if (response.result == 'success') {
                        $.Notification.notify('success', 'top right', 'Change Password', response.message);
                        $(form).find('input:password').val('');
                    } else {
                        $.Notification.notify('error', 'top right', 'Change Password Error', response.message);
                        $(form).find('input:password').val('');
                    }
                }
            });
        }
    });
</script>
