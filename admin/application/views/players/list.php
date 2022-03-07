<?php $this->load->view('players/head'); ?>

<div class='box bordered-box orange-border' style='margin-bottom:0;'>
    <div class='box-header sea-blue-background'>
        <div class='title'>Players List</div>
    </div>
    <div class='box-content box-no-padding'>
        <div class='responsive-table'>
            <div class='scrollable-area'>
                <table class='data-table table table-bordered table-striped' id="example" style='margin-bottom:0;' >
                    <thead>
                    <tr>
                        <th>Form No.</th>
                        <th>Member No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Previous Team</th>
                        <th>Status</th>
                        <th class='text-center'>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1;

                    foreach ($players_data as $k => $data){ ?>
                        <tr>
                            <td><?php echo $data['formno']; ?></td>
                            <td><?php echo $data['memberno']; ?></td>
							<td>
								<?php if($data['photo']){
									$photo = "players/".$data['photo'];
								}else{
									$photo = "players/no_photo.jpg";
								}?>
								<img  width="100" height="100" alt="" src="<?php echo IMAGE_URL . "/" . $photo; ?>">
							</td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['previous_team'] != "" ? $data['previous_team'] : "-"; ?></td>
                            <td>
                                <?php if($data['status'] == 1){
                                    echo '<span style="color:green">Active</span>';
                                }else{
                                    echo '<span style="color:red">Deactived</span>';
                                } ?>
                            </td>
                            <td>
                                <div class='text-center'>
                                    <a href='<?php echo site_url('players/edit/'.$data['id']); ?>' title="Edit"
                                       class="btn btn-success btn-xs">
                                        <i class=icon-edit></i>
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
