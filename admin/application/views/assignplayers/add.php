<?php $this->load->view('assignplayers/head'); ?>

<div class=" box" style="margin-bottom: 0">
    <div class="box-header sea-blue-background">
        <div class="title">Assign Player</div>
    </div>
    <div class="box-content">
        <form id="FormData" class="form" role="form" method="post" >
            <div class="errDiv">
                <?php echo validation_errors(); ?>
            </div>
			<div class="form-group">
                <label>Team</label>
                <select id="team_id" name="team_id" class="form-control">
					<?php foreach($teams as $val) {?>
                    <option value="<?php echo $val['id']; ?>">
						<?php echo $val['name'];?>
					</option>
					<?php } ?>
                </select>
            </div>

			<div class="form-group">
                <label>Player</label>
                <select id="player_id" name="player_id" class="form-control">
					<?php foreach($players as $val) {?>
                    <option value="<?php echo $val['id']; ?>">
						<?php echo $val['name'];?>
					</option>
					<?php } ?>
                </select>
            </div>

            <div  class="form-group">
                <button class="btn btn-primary" type="submit">
                    <i class="icon-save"></i>
                    Save Changes
                </button>
                <a href='<?php echo site_url('assignplayers/list'); ?>' class="btn">Cancel</a>
            </div>
        </form>
    </div>
</div>
<?php $this->load->view('assignplayers/foot'); ?>
