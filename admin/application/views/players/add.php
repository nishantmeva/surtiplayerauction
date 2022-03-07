<?php $this->load->view('players/head'); ?>

<div class=" box" style="margin-bottom: 0">
    <div class="box-header sea-blue-background">
        <div class="title">Add Player</div>
    </div>
    <div class="box-content">
        <form id="FormData" class="form" role="form" method="post" enctype="multipart/form-data" >
            <div class="errDiv">
                <?php echo validation_errors(); ?>
            </div>
			
			<div class="form-group">
                <label>Form No</label>
                <input type="text" id="formno" name="formno" class="form-control" />
			</div>
			<div class="form-group">
                <label>Member No</label>
                <input type="text" id="memberno" name="memberno" class="form-control" />
			</div>
			<div class="form-group">
				<label>Image</label>
				<input type="file" id="photo" name="photo" class="form-control">
				<br/>
				<b>Supported Files : </b>JPEG,JPG,PNG,GIF
			</div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" id="name" name="name" class="form-control" />
			</div>
			<div class="form-group">
                <label>Age</label>
                <input type="text" id="age" name="age" class="form-control" />
			</div>
			<div class="form-group">
                <label>Phone</label>
                <input type="text" id="phone" name="phone" class="form-control" />
            </div>
            <div class="form-group">
                <label>Previous Team</label>
                <input type="text" id="previous_team" name="previous_team" class="form-control" />
            </div>
			<div class="form-group">
                <label>Batting Style</label>
                <select id="batting_style" name="batting_style" class="form-control">
					<?php foreach($battingStyles as $val) {?>
					<option value="<?php echo $val; ?>">
						<?php echo $val;?>
					</option>
					<?php } ?>
                </select>
            </div>
			<div class="form-group">
                <label>Bowling Style</label>
                <select id="bowling_style" name="bowling_style" class="form-control">
                    <?php foreach($bowlingStyles as $val) {?>
					<option value="<?php echo $val; ?>">
						<?php echo $val;?>
					</option>
					<?php } ?>
                </select>
            </div>
			<div class="form-group">
                <label>Is Wicketkeeper?</label>
                <select id="is_wk" name="is_wk" class="form-control">
                    <option value="No">No</option>
                    <option value="Yes">Yes</option>
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
