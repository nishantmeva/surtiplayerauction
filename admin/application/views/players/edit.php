<?php $this->load->view('players/head'); ?>

<div class=" box" style="margin-bottom: 0">
    <div class="box-header sea-blue-background">
        <div class="title">Edit Player</div>
    </div>
    <div class="box-content">
        <form id="FormData" class="form" role="form" method="post" enctype="multipart/form-data" >

            <div class="errDiv">
                <?php echo validation_errors(); ?>
            </div>
			<div class="form-group">
                <label>Form No</label>
                <input type="text" id="formno" name="formno" class="form-control" value="<?php echo $players_data['formno']; ?>"/>
			</div>
			<div class="form-group">
                <label>Member No</label>
                <input type="text" id="memberno" name="memberno" class="form-control" value="<?php echo $players_data['memberno']; ?>" />
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" id="photo" name="photo" class="form-control">
				<br/>
				<b>Supported Files : </b>JPEG,JPG,PNG,GIF
				<br/>
				<?php if($players_data['photo']){
					$photo = "players/".$players_data['photo'];
				}else{
					$photo = "players/no_image.jpg";
				}?>
				<img id="oldImagePreview" width="100" src="<?php echo IMAGE_URL . "/" . $photo; ?>" class="img-thumbnail" />
			</div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $players_data['name']; ?>"/>
			</div>
			<div class="form-group">
                <label>Age</label>
                <input type="text" id="age" name="age" class="form-control" value="<?php echo $players_data['age']; ?>" />
			</div>
			<div class="form-group">
                <label>Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $players_data['phone']; ?>"/>
            </div>
            <div class="form-group">
                <label>Previous Team</label>
                <input type="text" id="previous_team" name="previous_team" class="form-control" value="<?php echo $players_data['previous_team']; ?>"/>
            </div>
			<div class="form-group">
                <label>Batting Style</label>
                <select id="batting_style" name="batting_style" class="form-control">
					<?php foreach($battingStyles as $val) {?>
					<option value="<?php echo $val; ?>" <?php echo $players_data['batting_style'] == $val ? 'selected' : ''; ?>>
						<?php echo $val;?>
					</option>
					<?php } ?>
                </select>
            </div>
			<div class="form-group">
                <label>Bowling Style</label>
                <select id="bowling_style" name="bowling_style" class="form-control">
					<?php foreach($bowlingStyles as $val) {?>
					<option value="<?php echo $val; ?>" <?php echo $players_data['bowling_style'] == $val ? 'selected' : ''; ?>>
						<?php echo $val;?>
					</option>
					<?php } ?>
                </select>
            </div>
			<div class="form-group">
                <label>Is Wicketkeeper?</label>
                <select id="is_wk" name="is_wk" class="form-control">
                    <option value="No" <?php echo $players_data['is_wk'] == 'No' ? 'selected' : ''; ?>>No</option>
                    <option value="Yes" <?php echo $players_data['is_wk'] == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                </select>
            </div>
			
            <div class="form-group">
                <label>Status</label>
                <select id="status" name="status" class="form-control">
                    <option value="1" <?php if($players_data['status'] == 1){ echo 'selected'; } ?>>Active</option>
                    <option value="2" <?php if($players_data['status'] == 2){ echo 'selected'; } ?>>Deactive</option>
                </select>
            </div>

            <div  class="form-group">
                <button class="btn btn-primary" type="submit">
                    <i class="icon-save"></i>
                    Save Changes
                </button>
                <a href='<?php echo site_url('players/list'); ?>' class="btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('players/foot'); ?>
