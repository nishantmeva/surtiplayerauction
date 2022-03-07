<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teams extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!is_admin_loggedin()) {
            redirect(site_url('/'));
        }
		$this->load->library('upload');
    }

    public function list() {
        $data['title'] = "Teams";
        $data['teams_data'] = $this->common_model->get_all('teams','*','','','id','asc');
        $this->template->load('default', 'teams/list', $data);
    }

    public function add(){
		
		if ($this->input->post()){
            $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[90]');
            $this->form_validation->set_rules('shortname', 'Short Name', 'required|trim|max_length[5]');
            $this->form_validation->set_rules('ownername', 'Owner Name', 'required|trim|max_length[200]');
            if ($this->form_validation->run()) {
				$filename = "dummy_logo.png";
				if($_FILES['team_logo']['name'] != ""){
					$fileExt = pathinfo($_FILES["team_logo"]["name"], PATHINFO_EXTENSION);
					$filename = strtolower(str_replace(" ","_",$this->input->post('shortname')))."_".date('ymdHis').".".$fileExt;
						$config = ['upload_path' => IMAGE_PATH."/",
							'allowed_types' => 'jpeg|jpg|png|gif',
							'max_size' => '2048',
							'file_name' => $filename,
							'overwrite' => TRUE,
							'remove_spaces' => TRUE];
							
					$this->upload->initialize($config);
					$this->upload->do_upload('team_logo');
				}
        
				$data_arr = $this->input->post(null);
				$data_arr['team_logo'] = $filename;
				$data_arr['last_update_by_admin_id'] = $this->session->userdata('admin')['id'];
				$this->common_model->insert('teams',$data_arr);
				set_flashMsg('success','Record has been created successfully.');
				redirect(site_url('teams/list'));
			}
		}

        $tournament_data['tournament_list'] = $this->common_model->get_all('tournament','id,name','','','id','asc');

        $this->template->load('default', 'teams/add',$tournament_data);
    }

    public function edit(){
        $data = array();
        $id = $this->uri->segment(3);
        if(!empty($id)){
			$check_data = $this->common_model->get_row('teams', ['id' => $id], '*');
            if(!empty($check_data)){
				/* Edit Page data */
                $data['teams_data'] = $check_data;
				
				$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[90]');
				$this->form_validation->set_rules('shortname', 'Short Name', 'required|trim|max_length[5]');
				$this->form_validation->set_rules('ownername', 'Owner Name', 'required|trim|max_length[200]');
				if ($this->form_validation->run()) {
					$filename = $check_data['team_logo'];
					if($_FILES['team_logo']['name'] != ""){
						$fileExt = pathinfo($_FILES["team_logo"]["name"], PATHINFO_EXTENSION);
						$filename = strtolower(str_replace(" ","_",$this->input->post('shortname')))."_".date('ymdHis').".".$fileExt;
						$config = ['upload_path' => IMAGE_PATH."/",
						'allowed_types' => 'jpeg|jpg|png|gif',
						'max_size' => '2048',
						'file_name' => $filename,
						'overwrite' => TRUE,
								'remove_spaces' => TRUE];
								
								$this->upload->initialize($config);
								$this->upload->do_upload('team_logo');
							}
							$data_arr = $this->input->post(null);
					$data_arr['team_logo'] = $filename;
                    $data_arr['last_update_by_admin_id'] = $this->session->userdata('admin')['id'];
                    $data_arr['last_modified'] = date('Y-m-d H:i:s');
                    $this->common_model->update_by_id('teams',$data_arr, $id);
                    set_flashMsg('success','Record has been updated successfully.');
                    redirect(site_url('teams/list'));
                }
            }else{
				redirect(site_url('teams/list'));
            }
        }else{
            redirect(site_url('teams/list'));
        }
		$data['tournament_list'] = $this->common_model->get_all('tournament','id,name','','','id','asc');
		
        $this->template->load('default', 'teams/edit', $data);
    }

	public function assignCaptain(){
		$data = array();
        $id = $this->uri->segment(3);
        if(!empty($id)){
			$check_data = $this->common_model->get_row('teams', ['id' => $id], '*');
            if(!empty($check_data)){
				if ($this->input->post()){
					$data_arr = $this->input->post(null);
                    $data_arr['is_captain'] = 1;
					unset($data_arr['team_player_id']);
					$this->db->query("update teams_players set is_captain=0 where team_id=$id");
                    $this->common_model->update_by_id('teams_players',$data_arr,  $this->input->post()['team_player_id']);
                    set_flashMsg('success','Record has been updated successfully.');
                    redirect(site_url('teams/list'));
				}else{
					$selectArr = array('p.name as player_name','a.*');
					$query = $this->db->select($selectArr)
						->from('teams_players a')
						->join('players p', 'p.id = a.player_id','inner')
						->where('a.team_id',$id)
						->order_by('id', 'asc')
						->get();
					$data['players'] = $query->result_array();
				}
			}else{
				redirect(site_url('teams/list'));
            }
        }else{
			redirect(site_url('teams/list'));
        }
		$data['team'] = $check_data;
		// pr($data);exit;
		
		$this->template->load('default', 'teams/assignCaptain', $data);
	}
}
