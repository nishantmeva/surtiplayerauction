<?php $this->load->view('teams/head'); ?>

<div class=" box" style="margin-bottom: 0">
    <div class="box-header sea-blue-background">
        <div class="title">Assign Captain</div>
    </div>
    <div class="box-content">
        <form id="FormData" class="form" role="form" method="post" >
            <div class="errDiv">
                <?php echo validation_errors(); ?>
            </div>
			<div class="form-group">
                <label>Team: <?php echo $team['name']; ?></label>
            </div>

			<div class="form-group">
                <label>Select Captain: </label>
                <select id="team_player_id" name="team_player_id" class="form-control">
					<?php foreach($players as $val) {?>
                    <option value="<?php echo $val['id']; ?>">
						<?php echo $val['player_name'];?>
					</option>
					<?php } ?>
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
