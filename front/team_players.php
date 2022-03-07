<?php 
require_once('header.php'); 

if(!isset($_REQUEST['id']) || empty($_REQUEST['id'])){
    header("Location: teams.php");
}
$team_players = getTeamPlayer($_REQUEST['id']);
$teamname = $team_players[0]['team_name'];
//echo "<pre>"; print_r($team_players);
?>

<!-- Page Content-->
<section>
    <div class="container-fluid">
        <div class="row teamplayerPage">
                <div class="col-sm-12 col-md-12">
                    <h2><center><?= $teamname; ?></center></h2>
                </div>
                <?php foreach($team_players as $data){ ?>
                    <div class="col-sm-2 col-md-2">
                        <div class="playesDataWrapper">
                            <img class="playerImg" src="../common_uploads/players/<?= $data['photo']; ?>" />
                            <div class="playerInner">
                                <span>
                                    <?php echo strtoupper($data['player_name']);?>
                                    <?= $data['is_captain']==1?" (C)": "" ?>
                                </span>
                                <p>
                                <?= $data['status']=='Reserved'?$data['status']: "Points: ".$data['sold_points'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>