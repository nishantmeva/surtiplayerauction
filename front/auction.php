<?php 
  require_once('header.php'); 
?>
<section class="auctionpage">

<div class="container-fluid">
  <div class="row" >
    <div class="col-sm-9 col-md-8">
      <div id="playerblock">
      </div>

      <div id="error" style="display: none;">
        <div class="alert alert-danger" role="alert">
            No Player found with this form no.
        </div>
      </div>
    </div>
    <div class="col-sm-3 col-md-4">
      <div class="formdata">
        <form class="form-inline auction-form">
          <div class="form-group mx-sm-2 mb-2 float-right">
              <label for="formno" class="sr-only">Form No:</label>
              <input type="text" class="form-control" id="formno" name="formno" placeholder="Form no" value="<?= isset($_POST['formno']) ? $_POST['formno'] : ""; ?>">
          </div>
          <button type="button" id="getPlayer" name="button" onClick="javascript:getPlayerData();" class="btn btn-primary mb-2">Find</button>
        </form>
      </div>

      <div id="AuctionSummaryData" class="AuctionSummaryData" >
        <div class="AuctionCountOuter">
          <div id="AuctionCount" class="AuctionCount"></div>
          <div id="BidTeam" class="BidTeamData">
          </div>
        </div>
      </div>

      <div id="teamButton">
      </div>

    </div>
  </div>
</div>
</section>

<?php require_once('footer.php'); ?>