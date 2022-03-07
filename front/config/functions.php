<?php
require_once('db.class.php');

if(isset($_REQUEST['method'])){
    try {
        if(isset($_REQUEST['data'])){
            $request_data = $_REQUEST['data'];
            $data = $_REQUEST['method']($request_data);
        }else{
            $data = $_REQUEST['method']();
        }
        header('Content-type: application/json');
        echo json_encode($data);
        exit;
    } catch (\Throwable $th) {
        // throw $th;
    }
}

function getTeams($request=array()){
    $where = "where 1 = 1";
    if(!empty($request['id'])){
        $id = $request['id'];
        $where .= " and id='".$id."'";
    }
    $db = new database;
    $sql = "SELECT * FROM teams $where";
    $result = $db->get_results($sql);
    if(!empty($result)){
        return $result; 
    }else{
        return 1; 
    }
}

function addTeamSummary($request=array()){
    $db = new database;
    if($db->insert('team_player_summary', $request)){
        return 1;
    }
    return 0;
}

function getTeamPlayer($id){
    if(!empty($id)){
        $db = new database;
		$where = "where t.id = ".$id;
        $sql1 = "SELECT t.name as team_name,p.name as player_name,a.is_captain,p.is_wk,a.sold_points,a.status,p.photo 
        FROM `teams` as `t` 
        inner join `teams_players` as `a` on `t`.`id` = `a`.`team_id` 
        inner join `players` as `p` on `p`.`id` = `a`.`player_id` ".$where." order by a.is_captain desc";
        return $db->get_results($sql1);
    }else{
        return 0;
    }
}

function getUnsoldPlayer(){
    $db = new database;
    $sql1 = "
        SELECT * FROM players as p WHERE p.status = 1 and p.id NOT IN (SELECT player_id FROM teams_players)
        order by p.id asc";
    return $db->get_results($sql1);
}

function getPlayerDetails($request=array()){
    $where = "where p.status = 1";
    if(!empty($request['formno'])){
        $formno = $request['formno'];
        $where .= " and `formno`='".$formno."'";
    }
    $db = new database;

    $sql1 = "SELECT 
        `p`.*, 
        `tp`.`sold_points` as `sold_points`,
        `tp`.`status` as `sold_status`,
        `tp`.`team_id`,
        `tps`.`points` as `tps_points`,
        `tps`.`team_id` as `tps_team_id`
        FROM `players` as `p` 
        left join `team_player_summary` as `tps` on `tps`.`player_id` = `p`.`id`
        left join `teams_players` as `tp` on `p`.`id` = `tp`.`player_id` ".$where." order by `tps`.`id` asc";
    $result = $db->get_row($sql1);
    // echo "<pre>"; print_r($result1); exit;
    // print_r(empty($result1));
    // exit;
    // if(!empty($result1)){
    //     return $result1; 
    // }

    // $sql = "SELECT 
    // `p`.*, 
    // `tp`.`status` as `sold_status`,
    // `tp`.`sold_points`,
    // `tp`.`team_id`
    // FROM `players` as `p` 
    // left join `teams_players` as `tp` on `tp`.`player_id` = `p`.`id` ".$where;
    // $result = $db->get_row($sql);
    
    if(!empty($result)){
        return $result; 
    }else{
        return 1; 
    }
}

function soldPlayer($request=array()){
    $db = new database;
    $sql = "insert into teams_players (`team_id`,`player_id`,`sold_points`,`tournament_id`,`status`) values (". $request['team_id'] .", ". $request['player_id'] .", " . $request['sold_points'] .", 1, 'Sold')";
    $db->query($sql);

    // $dataToUpdate = [];
    // $dataToUpdate['budget_points'] = `budget_points`-$request['sold_points'];

    $sql2 = 'update teams set `budget_point` = `budget_point`-' . $request['sold_points'] . " where `id` = " .  $request['team_id'];
    $db->query($sql2);
    // $db->update('teams',$dataToUpdate, '`id` =' . $request['team_id'], true);
    return 1;
}
?>
