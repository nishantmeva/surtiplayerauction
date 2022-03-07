<div class='page-header page-header-with-buttons'>
    <h1 class='pull-left'>
        <i class='icon-user'></i>
        <span><?php echo $title; ?></span>
    </h1>
</div>
<?php
$sessionData = $this->session->userdata('admin');
if(!empty($sessionData['logo'])){
    $logo = IMAGE_URL."/".$sessionData['logo'];
}else{
    $logo = IMAGE_URL."/dummy_logo.png";
} ?>
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header sea-blue-background">
                <div class="title">
                    <div class="icon-edit"></div>
                    Profile Image
                </div>
            </div>
            <div class="box-content">
                <form id="profileImageForm" class="form form-horizontal" role="form" enctype="multipart/form-data" method="post">
                    <div class="form-group" >
                        <label for="logo" class="col-md-3 control-label">Logo</label>
                        <div class="col-md-5">
                            <input type="file" id="logo" name="logo" class="form-control">
                            <br/>
                            <b>Supported Files : </b>JPEG,JPG,PNG,GIF
                            <br/>
                            <img id="oldImagePreview" width="30%" src="<?php echo $logo; ?>" class="img-thumbnail" />
                        </div>
                    </div>

                    <div class="form-actions form-actions-padding-sm">
                        <div class="row">
                            <div class="col-md-9 col-md-offset-3">
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

    $("#profileImageForm").validate({
        rules: {
            logo: {
                required: true,
                extension: 'jpeg|jpg|png|gif'
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
                url: '<?= site_url('tournament/update_profile_image') ?>',
                data: formData,
                success: function (response) {
                    console.log(response);
                    if(response.result == 'success') {
                        $.Notification.notify('success', 'top right', 'Profile', response.message);
                        setTimeout(function() { location.reload(); }, 3000);
                    } else {
                        $.Notification.notify('error', 'top right', 'Profile', response.message);
                    }
                }
            });
        }
    });
</script>
