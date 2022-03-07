<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();

        if(!is_admin_loggedin()) {
			redirect(site_url('/'));
        }
    }
    // Show login page
    public function index(){
        $data['title'] = "Dashboard";
		$selectArr = array('t.name as team_name','p.name as player_name','a.is_captain','p.is_wk');
		
		$query = $this->db->select($selectArr)
                  ->from('teams t')
                  ->join('teams_players a', 't.id = a.team_id','inner')
                  ->join('players p', 'p.id = a.player_id','inner')
				  ->where('a.tournament_id',$this->session->userdata('admin')['id'])
				  ->order_by('t.id', 'asc')
				  ->get();
		$teams_data = $query->result_array();
		$finTeamData = array();
		if(!empty($teams_data)){
			foreach ($teams_data as $key => $value) {
				$is_captain = $is_wk = '';
				if($value['is_captain'] == 1){
					$is_captain = " (C)";
				}
				if($value['is_wk'] == "Yes"){
					$is_wk = " (WK)";
				}
				$finTeamData[$value['team_name']][$key] = $value['player_name'].$is_wk.$is_captain;
			}
		}

		$data['teams_data'] = $finTeamData;
        $this->template->load('default','dashboard/index', $data);
    }

    public function logout() {
        $this->session->unset_userdata('admin');
        redirect(site_url('/'));
    }
}
