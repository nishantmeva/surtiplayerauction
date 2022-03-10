<?php 
require_once('header.php'); 

$playerList = getPlayerList();
$teamList = getTeams();
//  echo "<pre>"; print_r($teamList); exit;
?>

<!-- Page Content-->
<section>
    <div class="container-fluid">
        <div class="row teamplayerPage">
            <div class="col-sm-12 col-md-12">
                <center>
                <h2>Player List</h2>
                <p>No of Players: <?= count($playerList); ?></p>
                </center>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col" width="5%">Form No</th>
                    <th scope="col" width="5%">Member No</th>
                    <th scope="col">Photo</th>
                    <th scope="col" width="25%">Name</th>
                    <th scope="col" width="15%">Previous Team</th>
                    <th scope="col">Batting Style</th>
                    <th scope="col">Bowling Style</th>
                    <th scope="col">Is wicket keeper</th>
                    <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($playerList as $data){ ?>
                        <tr title="<?= $data['id']; ?>">
                            <th scope="row"><?= $data['formno']; ?></th>
                            <td><?= $data['memberno']; ?></td>
                            <td><img width="50px" src="../common_uploads/players/<?= $data['photo']; ?>"/></td>
                            <td>
                                <?= strtoupper($data['name']); ?></br>
                                <?php 
                                if(!empty($teamList[$data['team_id']])){ 
                                    $teamData = $teamList[$data['team_id']-1];
                                    $teamName = $teamData['name'];
                                    echo "<small><b>".$teamName."</b></small>";
                                    unset($teamName,$teamData);
                                } ?>
                                <?php if($data['is_captain']){
                                    echo " | <small><b>Captain</b></small>";
                                }?>
                                <?php if($data['sold_status']){
                                    echo " | <small><b>".$data['sold_status']."</b></small>";
                                }?>
                                <?php if(!empty($data['sold_points'])){
                                    echo " | <small><b>".$data['sold_points']."</b></small>";
                                }?>
                            </td>
                            <td><?= strtoupper($data['previous_team']); ?></td>
                            <td><?= strtoupper($data['batting_style']); ?></td>
                            <td><?= strtoupper($data['bowling_style']); ?></td>
                            <td><?= strtoupper($data['is_wk']); ?></td>
                            <td><?= $data['phone']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>