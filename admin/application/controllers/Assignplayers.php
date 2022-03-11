<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignplayers extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!is_admin_loggedin()) {
            redirect(site_url('/'));
        }
    }

    public function list() {
        $data['title'] = "Assign Players";
		$selectArr = array('t.name as team_name','p.name as player_name','p.formno as formno','a.*');
		$query = $this->db->select($selectArr)
                  ->from('teams_players a')
                  ->join('teams t', 't.id = a.team_id','inner')
                  ->join('players p', 'p.id = a.player_id','inner')
				  ->order_by('id', 'asc')
				  ->get();

		$data['teams_data'] = $query->result_array();
        // $data['teams_data'] = $this->common_model->get_all('teams_players','*','','','id','asc');
        $this->template->load('default', 'assignplayers/list', $data);
    }

    public function add(){
		$data = array();
		if ($this->input->post()){
			$data_arr = $this->input->post(null);
			$data_arr['status'] = 'Reserved';
			$data_arr['tournament_id'] = $this->session->userdata('admin')['id'];
			$this->common_model->insert('teams_players',$data_arr);
			set_flashMsg('success','Record has been created successfully.');
			redirect(site_url('assignplayers/list'));
		}

        $data['teams'] = $this->common_model->get_all('teams','id,name','','','id','asc');
		$query = $this->db->query('SELECT `id`,`name` FROM `players` WHERE id not in (SELECT `player_id` from `teams_players`) order by name');
		$data['players'] = $query->result_array();

        $this->template->load('default', 'assignplayers/add',$data);
    }

    public function delete(){
		$data = array();
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $check_data = $this->common_model->get_row('teams_players', ['id' => $id], '*');
            if(!empty($check_data)){
				$this->common_model->delete_by_id('teams_players',$id);
				set_flashMsg('success','Record has been deleted successfully.');
				redirect(site_url('assignplayers/list'));
            }
		}
		redirect(site_url('assignplayers/list'));
	}	
}
