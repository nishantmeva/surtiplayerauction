var teamData = [];
var selectedTeam;
var selectedPlayer;
let bid_amt = 0;
function getPlayerData(){
    if($('#formno').val() == ""){
        alert("Please enter form no");
        return false;
    }
    var formno = $('#formno').val();
    $('#error').hide();
    $('#playerblock').html('');
    $('#teamButton').html('');
    $.ajax({
        type: "POST",
        url: '/surtiplayerauction/front/config/functions.php',
        data: {method:"getPlayerDetails",data:{formno}},
        success: function (response) {
            if(response == 1){
                $('#error').show();
                $('#AuctionCount').html('');
                $('#BidTeam').html('');
            }else{
                selectedPlayer = currentPlayer = response;
                bid_amt = 0;
                var htmData = '<div class="playerblock row">';
                htmData += '<div class="imagedt col-sm-3  col-md-5">';
                htmData += '<img class="playerImg" src="../common_uploads/players/'+currentPlayer.photo+'" title="'+currentPlayer.id+'"/></div>';
                htmData += '<div class="playerInfo col-sm-9  col-md-7">';
                htmData += '<div class="playerName playerdetail">'+currentPlayer.name+'</div>';
                htmData += '<div class="playerOther playerdetail"><span>Age: </span>'+ currentPlayer.age+'</div>';
                htmData += '<div class="playerOther playerdetail"><span>Member No: </span>'+ currentPlayer.memberno+'</div>';
                htmData += '<div class="playerOther playerdetail"><span>Batting Style: </span>' + currentPlayer.batting_style.toUpperCase()+'</div>';
                htmData += '<div class="playerOther playerdetail"><span>Bowling Style: </span>' + currentPlayer.bowling_style.toUpperCase() +'</div>';
                htmData += '<div class="playerOther playerdetail"><span>Previous Team: </span>' + currentPlayer.previous_team.toUpperCase()+'</div><div class="finalCeleDiv">';
                htmData += '<div class="stampdiv"></div>';
                htmData += '<div class="celebdiv"></div>';
                htmData += '</div></div>';
                htmData += '<input type="hidden" value="' + currentPlayer.id + '" id="player_id" />';
                htmData += '</div>';
                $('#playerblock').html(htmData);
                $('#AuctionCount').html("");
                $('#BidTeam').html("");
                $.ajax({
                    type: "POST",
                    url: '/surtiplayerauction/front/config/functions.php',
                    data: {method:"getTeams"},
                    success: function (data) {
                        teamData = data;
                        if(currentPlayer.sold_status == 'Sold' || currentPlayer.sold_status =='Reserved'){
                            $('.stampdiv').html('<img src="../common_uploads/stamp_'+currentPlayer.sold_status+'.png" />');
                            $('.celebdiv').html('<img src="../common_uploads/fuegos-fired.gif" />');
                            if(currentPlayer.sold_status == 'Sold'){
                                $('#AuctionCount').html("Sold Points:<br /> " + currentPlayer.sold_points);
                            }
                            var tmhtml = '';
                            tmhtml += `<div class="teamName">Team: ${getTeamNamebyId(currentPlayer.team_id)}</div>`;
                            tmhtml += `<div class="teamimg"><img src='${getTeamImagebyId(currentPlayer.team_id)}' /></div>`;
                            $('#BidTeam').html(tmhtml);
                        }else if(currentPlayer.sold_points == null && currentPlayer.tps_points != null){
                            bid_amt = currentPlayer.tps_points;
                            console.log("B IDANDKSAHDKJAS => ",bid_amt)
                            selectedTeam = teamData.filter(item => item.id == currentPlayer.tps_team_id);
                            selectedTeam = selectedTeam[0];
                            selectedTeamName = getTeamNamebyId(currentPlayer.tps_team_id);
                            selectedTeamBudget = getTeamBudgetbyId(currentPlayer.tps_team_id);
                            $('#AuctionCount').html(bid_amt);
                            $('#BidTeam').html(`<div class="teamName">${selectedTeamName}</div>
                                <div class="pointData">Available Points: ${selectedTeamBudget}</div>
                                <div class="SoldBtn"><button type="button" name="button" onClick="javascript:playersold();" class="btn btn-warning mb-3">SOLD</button></div>`);
                            setTeamButtons();
                        }else if(currentPlayer.sold_status == null){
                            setTeamButtons();
                        }
                    }
                });
            }
        }
    });
}

function getTeamNamebyId(id){
    var teamName = teamData.find((x) => {
        return x.id == id;
    });
    return teamName.name;
}

function getTeamBudgetbyId(id){
    var teamName = teamData.find((x) => {
        return x.id == id;
    });
    return teamName.budget_point;
}

function getTeamImagebyId(id){
    var teamName = teamData.find((x) => {
        return x.id == id;
    });
    return "../common_uploads/"+teamName.team_logo;
}

function setTeamButtons(){
    var teamhtml = '';
    teamhtml += '<ul class="teamBtnUL">';
    $.each(teamData, function (index, value) {
        if(value.budget_point >0){
            teamhtml += '<li><a href="javascript:auctionbutton('+value.id+');" title="'+value.name+'">'+value.shortname+'</a></li>';
        }
    });
    teamhtml += '</ul>';
    $('#teamButton').html(teamhtml);
}
function playersold(){
    var payload = {
        player_id:selectedPlayer.id,
        team_id: selectedTeam.id,
        sold_points: bid_amt
    }
    if(getTeamBudgetbyId(payload.team_id) < bid_amt){
        alert("Insufficiant Budget !");
        return false;
    }
    console.log("Current => ", selectedPlayer);
    console.log("budget_point => ", bid_amt);
    console.log("selectedTeam => ", selectedTeam);
    $.ajax({
        type: "POST",
        url: '/surtiplayerauction/front/config/functions.php',
        data: { 
            method: "soldPlayer", 
            data: payload 
        },
        success: function (res) {
            console.log("res => ",res)
            if(res == 1){
                var htmData = '';
                htmData += '<div class="stampdiv"><img src="../common_uploads/stamp_SOLD.png" /></div>';
                htmData += '<div class="celebdiv"><img src="../common_uploads/fuegos-fired.gif" /></div>';
                $('.finalCeleDiv').html(htmData);

                //$('#AuctionSummaryData').html('');
                $('#teamButton').html('');
                $('#AuctionCount').html("Sold Points:<br /> " + payload.sold_points);

                var tmhtml = '';
                tmhtml += `<div class="teamName">Team: ${getTeamNamebyId(payload.team_id)}</div>`;
                tmhtml += `<div class="teamimg"><img src='${getTeamImagebyId(payload.team_id)}' /></div>`;
                $('#BidTeam').html(tmhtml);
            }
            $.ajax({
                type: "POST",
                url: '/surtiplayerauction/front/config/functions.php',
                data: {method:"getTeams"},
                success: function (data) {
                    teamData = data;
                }
            });
        }
    });
}

function auctionbutton(id){
    console.log("teamData => ",teamData);
    console.log("bid_amt => ",bid_amt);
    var player_id = selectedPlayer.id;
    var team_id = id;
    let newAmt = parseInt(bid_amt) + 10000;
    if(getTeamBudgetbyId(team_id) < newAmt){
        alert("Insufficiant Budget !");
        return false;
    }
    $.ajax({
        type: "POST",
        url: '/surtiplayerauction/front/config/functions.php',
        data: {method:"addTeamSummary", data:{player_id, team_id, points: newAmt}},
        success: function (res) {
            if(res==1){
                selectedTeam = teamData.filter(item => item.id == team_id);
                selectedTeam = selectedTeam[0];
                let teampoint_cur = getTeamBudgetbyId(team_id)-newAmt;
                $('#AuctionCount').html(newAmt);
                $('#BidTeam').html(`<div class="teamName">${getTeamNamebyId(team_id)}: ${teampoint_cur}</div>
                <div class="pointData">Available Points: ${getTeamBudgetbyId(team_id)}</div>
                <div class="SoldBtn"><button type="button" name="button" onClick="javascript:playersold();" class="btn btn-warning mb-3">SOLD</button></div>`);
                bid_amt = newAmt;
            }
        }
    });
}