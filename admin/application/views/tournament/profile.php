<div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='icon-user'></i>
        <span><?php echo $title; ?></span>
    </h1>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header sea-blue-background">
                <div class="title">
                    <div class="icon-edit"></div>
                    Profile controls
                </div>
            </div>
            <div class="box-content">
                <form id="profileForm" class="validate-form form form-horizontal" role="form" method="post" style="margin-bottom: 0">
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" value="<?= $admin_profile['name'] ?>" id="name" name="name" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="col-md-2 control-label">Email</label>
                        <div class="col-md-5">
                            <input type="email" value="<?= $admin_profile['email'] ?>" id="email" name="email" class="form-control" />
                        </div>
                    </div>

                    <div class="form-actions form-actions-padding-sm">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $("#profileForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 255
            },
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function (form) {
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                url: '<?= site_url('tournament/update_profile') ?>',
                data: formData,
                success: function (response) {
                    if(response.result == 'success') {
                        $.Notification.notify('success', 'top right', 'Profile', response.message);
                        setTimeout(function() { location.reload(); }, 3000);
                    } else {
                        $.Notification.notify('error', 'top right', 'Profile', response.message);
                        setTimeout(function() { location.reload(); }, 3000);
                    }
                }
            });
        }
    });
</script>

