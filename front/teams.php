<?php 
require_once('header.php'); 
$teams = getTeams();
// $i=1;
// //UPDATE `players` SET `photo`= CONCAT(memberno, '.jpg')
// foreach(getPlayerDetails() as $dt){
//     $photo = "../common_uploads/players/".$dt['photo'];
//     //$photo = "../common_uploads/players/no_photo.jpg";
//     if(!file_exists($photo)){
//     //if($dt['photo'] == "no_photo.jpg"){
//         //echo $i." - ".$dt['formno']." - ".$dt['memberno']." - ".$dt['name']."<br/>";
//         echo "'".$dt['memberno']."'<br/>";
//         $i++;
//     }
// }
?>

<!-- Page Content-->
<section>
    <div class="container-fluid">
        <div class="row teamsLogosWrap" >
            <?php foreach($teams as $data){ ?>

                <div class="col-sm-8 col-md-2">
                    <div class="card teamsLogos" id="team_id_<?php echo $data['id']; ?>">
                        <a id="lkn-<?= $data['id'] ?>" href="team_players.php?id=<?= $data['id'] ?>" >
                            <img class="card-img-top" src="../common_uploads/<?= $data['team_logo'] ?>" alt="<?= $data['name'] ?>">
                        </a>
                        <div class="card-body">
                            <p class="card-text"><b><?= $data['name'] ?></b><br/>
                            <?= $data['ownername'] ?></br>
                            <b>Point: </b><?= $data['budget_point'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>