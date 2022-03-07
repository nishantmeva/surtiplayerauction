<?php $this->load->view('teams/head'); ?>

<div class=" box" style="margin-bottom: 0">
    <div class="box-header sea-blue-background">
        <div class="title">Edit Teams</div>
    </div>
    <div class="box-content">
        <form id="FormData" class="form" role="form" method="post" enctype="multipart/form-data" >

            <div class="errDiv">
                <?php echo validation_errors();?>
            </div>
			<div class="form-group">
                <label>Tournament</label>
                <select id="tournament_id" name="tournament_id" class="form-control">
					<?php foreach($tournament_list as $val) {?>
                    <option value="<?php echo $val['id']; ?>" <?php if($val['id'] == $teams_data['tournament_id']){ echo "selected"; }?>>
						<?php echo $val['name'];?>
					</option>
					<?php } ?>
                </select>
            </div>

			<div class="form-group">
				<label>Team Logo</label>
				<input type="file" id="team_logo" name="team_logo" class="form-control">
				<br/>
				<b>Supported Files : </b>JPEG,JPG,PNG,GIF
				<br/>
				<?php if($teams_data['team_logo']){
					$team_logo = $teams_data['team_logo'];
				}else{
					$team_logo = "dummy_logo.png";
				}?>
				<img id="oldImagePreview" width="100" src="<?php echo IMAGE_URL . "/" . $team_logo; ?>" class="img-thumbnail" />
			</div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $teams_data['name']; ?>" />
			</div>

			<div class="form-group">
                <label>Short Name</label>
                <input type="text" id="shortname" name="shortname" class="form-control" value="<?php echo $teams_data['shortname']; ?>"/>
            </div>
			<div class="form-group">
                <label>Owner Name</label>
                <input type="text" id="ownername" name="ownername" class="form-control" value="<?php echo $teams_data['ownername']; ?>"/>
            </div>
			<div class="form-group">
                <label>Company Name</label>
                <input type="text" id="companyname" name="companyname" class="form-control" value="<?php echo $teams_data['companyname']; ?>"/>
            </div>
			<div class="form-group">
                <label>Budget</label>
				<input type="text" id="budget_point" name="budget_point" class="form-control" value="<?php echo $teams_data['budget_point']; ?>"/>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="1" <?php if($teams_data['status'] == 1){ echo 'selected'; } ?>>Active</option>
                    <option value="2" <?php if($teams_data['status'] == 2){ echo 'selected'; } ?>>Deactive</option>
                </select>
            </div>

            <div  class="form-group">
                <button class="btn btn-primary" type="submit">
                    <i class="icon-save"></i>
                    Save Changes
                </button>
                <a href='<?php echo site_url('teams/list'); ?>' class="btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('teams/foot'); ?>
