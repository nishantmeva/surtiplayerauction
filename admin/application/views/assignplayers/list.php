<?php $this->load->view('assignplayers/head'); ?>

<div class='box bordered-box orange-border' style='margin-bottom:0;'>
    <div class='box-header sea-blue-background'>
        <div class='title'>Assigned Players List</div>
    </div>
    <div class='box-content box-no-padding'>
        <div class='responsive-table'>
            <div class='scrollable-area'>
                <table class='data-table table table-bordered table-striped' id="example" style='margin-bottom:0;' >
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Team</th>
                        <th>Player</th>
                        <th>Sold Points</th>
                        <th>Status</th>
                        <th class='text-center'>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;

                    foreach ($teams_data as $k => $data){ ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $data['team_name']; ?></td>
                            <td><?php echo $data['player_name']; ?></td>
                            <td><?php echo $data['sold_points']; ?></td>
                            <td><?php echo $data['status']; ?></td>
                            <td>
                                <div class='text-center'>
									<a href='<?php echo site_url('assignplayers/delete/'.$data['id']); ?>' title="Delete" onclick="return confirm('Are you sure, you want to delete it?')"
                                       class="btn btn-danger btn-xs">
                                        <i class=icon-trash></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php $cnt++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
