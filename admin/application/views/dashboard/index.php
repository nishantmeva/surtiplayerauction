<div class='row' id='content-wrapper'>
    <div class='col-xs-12'>
        <div class='page-header page-header-with-buttons'>
            <h1 class='pull-left'>
                <i class='icon-dashboard'></i>
                <span><?php echo $title; ?></span>
            </h1>
        </div>
    </div>
	<div class='col-sm-12'>
		<?php if(!empty($teams_data)){ ?>
			<?php foreach ($teams_data as $k => $playerdata){ ?>
				<div class="col-sm-4">
					<div class="box box-bordered box-nomargin">
						<div class="box-header blue-background">
							<div class="title"><?php echo $k; ?></div>
						</div>
						<div class="box-content">
							<?php foreach ($playerdata as $k => $data){ ?>
							<?php echo "<p>".$data."</p>"; ?>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
