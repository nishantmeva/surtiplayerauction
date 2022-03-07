<?php 
require_once('header.php'); 
$teams = getTeams();
?>

<!-- Page Content-->
<section>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 contHead">
      <h1 class="nametxt"><?php echo SITENAME." ".YEAR;?></h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-4">
      <div class="teamsLogos">
        <?php 
          if(!empty($teams)){
            for($i=0; $i<3; $i++){
              $id = $teams[$i]['id'];
              ?>
                <a id="lkn-<?= $id ?>" href="team_players.php?id=<?= $id ?>" >
                  <img id="im-<?= $id ?>" src="../common_uploads/<?= $teams[$i]['team_logo'] ?>" />
                </a>
              <?php
              unset($id);
            }
          }
        ?>
      </div>
    </div>
    <div class="col-sm-3 col-md-4">
      <div class="teamsLogos">
      <?php 
          if(!empty($teams)){
            for($i=6; $i<9; $i++){
              $id = $teams[$i]['id'];
              ?>
                <a id="lkn-<?= $id ?>" href="team_players.php?id=<?= $id ?>" >
                  <img id="im-<?= $id ?>" src="../common_uploads/<?= $teams[$i]['team_logo'] ?>" />
                </a>
              <?php
              unset($id);
            }
          }
        ?>
      </div>
    </div>
    <div class="col-sm-3 col-md-4">
      <div class="teamsLogos">
      <?php 
          if(!empty($teams)){
            for($i=3; $i<6; $i++){
              $id = $teams[$i]['id'];
              ?>
                <a id="lkn-<?= $id ?>" href="team_players.php?id=<?= $id ?>" >
                  <img id="im-<?= $id ?>" src="../common_uploads/<?= $teams[$i]['team_logo'] ?>" />
                </a>
              <?php
              unset($id);
            }
          }
        ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <p style="text-align: center;"><img src="../common_uploads/Futurehat-trans.png" style="width:180px"/><br/>
      <span class="namepretxt">Designed By Futurehat Technosys</span></p>
    </div>
  </div>
</div>
</section>

<?php require_once('footer.php'); ?>
        
