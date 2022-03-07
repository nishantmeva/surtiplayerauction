<script>
    $("#FormData").validate({
        ignore: [],
        rules: {
            name: {
                required: true,
                maxlength: 90
			},
			shortname: {
                required: true,
                maxlength: 5
            },
			ownername: {
                required: true,
                maxlength: 60
            },
            companyname: {
                maxlength: 150
			},
			budget_point: {
				maxlength: 10,
				number: true
			},
			team_logo: {
                extension: 'jpeg|jpg|png|gif'
            }
        },
    });
</script>
