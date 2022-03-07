<?php 
require_once('header.php'); 

$UnsoldPlayer = getUnsoldPlayer();
//echo "<pre>"; print_r($UnsoldPlayer); exit;
?>

<!-- Page Content-->
<section>
    <div class="container-fluid">
        <div class="row teamplayerPage">
            <div class="col-sm-12 col-md-12">
                <center>
                <h2>Unsold Players</h2>
                <p>No of Players: <?= count($UnsoldPlayer); ?></p>
                </center>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Form No</th>
                    <th scope="col">Member No</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Previous Team</th>
                    <th scope="col">Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($UnsoldPlayer as $data){ ?>
                        <tr title="<?= $data['id']; ?>">
                            <th scope="row"><?= $data['formno']; ?></th>
                            <td><?= $data['memberno']; ?></td>
                            <td><img width="50px" src="../common_uploads/players/<?= $data['photo']; ?>"/></td>
                            <td><?= strtoupper($data['name']); ?></td>
                            <td><?= strtoupper($data['previous_team']); ?></td>
                            <td><?= $data['phone']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once('footer.php'); ?>