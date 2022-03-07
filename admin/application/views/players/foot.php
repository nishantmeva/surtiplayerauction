<script>
    $("#FormData").validate({
        ignore: [],
        rules: {
			formno: {
                required: true,
                maxlength: 10
			},
            name: {
                required: true,
                maxlength: 60
			},
			photo: {
                extension: 'jpeg|jpg|png|gif'
            },
			phone: {
                maxlength: 30
            }
        },
    });
</script>
