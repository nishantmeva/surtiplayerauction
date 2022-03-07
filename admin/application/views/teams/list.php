<?php $this->load->view('teams/head'); ?>

<div class='box bordered-box orange-border' style='margin-bottom:0;'>
    <div class='box-header sea-blue-background'>
        <div class='title'>Teams List</div>
    </div>
    <div class='box-content box-no-padding'>
        <div class='responsive-table'>
            <div class='scrollable-area'>
                <table class='data-table table table-bordered table-striped' id="example" style='margin-bottom:0;' >
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Team Logo</th>
                        <th>Name</th>
                        <th>Owner Name</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th class='text-center'>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;

                    foreach ($teams_data as $k => $data){ ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td>
								<?php if($data['team_logo']){
									$team_logo = $data['team_logo'];
								}else{
									$team_logo = "dummy_logo.png";
								}?>
								<img  width="100" height="100" alt="" src="<?php echo IMAGE_URL . "/" . $team_logo; ?>">
							</td>
                            <td><?php echo $data['name']; ?><br/><?php echo $data['shortname']; ?></td>
                            <td><?php echo $data['ownername']; ?></td>
                            <td><?php echo $data['budget_point']; ?></td>
                            <td>
                                <?php if($data['status'] == 1){
                                    echo '<span style="color:green">Active</span>';
                                }else{
                                    echo '<span style="color:red">Deactived</span>';
                                } ?>
                            </td>
                            <td>
                                <div class='text-center'>
                                    <a href='<?php echo site_url('teams/edit/'.$data['id']); ?>' title="Edit"
                                       class="btn btn-success btn-xs">
                                        <i class=icon-edit></i>
                                    </a>
									<a href='<?php echo site_url('teams/assignCaptain/'.$data['id']); ?>' title="Assign Captain"
                                       class="btn btn-warning btn-xs">
                                        <i class=icon-male></i>
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
