<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Players extends CI_Controller {
	public $battingStyles = array('Right Handed','Left Handed');
	public $bowlingStyles = array('No',
							'Left Arm Faster',
							'Right Arm Faster',
							'Left Arm Spin',
							'Right Arm Spin',
							'Left Arm Medium Fast',
							'Right Arm Medium Fast');

    public function __construct() {
        parent::__construct();

        if (!is_admin_loggedin()) {
            redirect(site_url('/'));
        }
		$this->load->library('upload');

    }

    public function list() {
        $data['title'] = "Players";
        $data['players_data'] = $this->common_model->get_all('players','*','','','id','asc');
        $this->template->load('default', 'players/list', $data);
    }

    public function add(){
        $data = array();
        if ($this->input->post()){
            $this->form_validation->set_rules('formno', 'Form No', 'required|is_unique[players.formno]|trim|max_length[10]');
            $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[100]');
            if ($this->form_validation->run()) {
				$filename = "no_photo.jpg";
				if($_FILES['photo']['name'] != ""){
					$fileExt = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
					$filename = strtolower(str_replace(" ","_",$this->input->post('name')))."_".date('ymdHis').".".$fileExt;
						$config = ['upload_path' => IMAGE_PATH."/players/",
							'allowed_types' => 'jpeg|jpg|png|gif',
							'max_size' => '2048',
							'file_name' => $filename,
							'overwrite' => TRUE,
							'remove_spaces' => TRUE];
					$this->upload->initialize($config);
					$this->upload->do_upload('photo');
				}
                //print_r($this->input->post()); exit;
                $data_arr = $this->input->post(null);
				$data_arr['photo'] = $filename;
                $this->common_model->insert('players',$data_arr);
                set_flashMsg('success','Record has been created successfully.');
                redirect(site_url('players/list'));
            }
        }
		$data['bowlingStyles'] = $this->bowlingStyles;
		$data['battingStyles'] = $this->battingStyles;
        $this->template->load('default', 'players/add', $data);
    }

    public function edit(){
        $data = array();
        $id = $this->uri->segment(3);
        if(!empty($id)){
            $check_data = $this->common_model->get_row('players', ['id' => $id], '*');
            if(!empty($check_data)){
                /* Edit Page data */
                $data['players_data'] = $check_data;
				if($this->input->post('formno') != $check_data['formno']) {
					$is_unique =  '|is_unique[players.formno]';
				} else {
					$is_unique =  '';
				}
				$this->form_validation->set_rules('formno', 'Form No', 'required|trim|max_length[10]' .$is_unique);
            	$this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[100]');
                if ($this->form_validation->run()) {
					$filename = $check_data['photo'];
					if($_FILES['photo']['name'] != ""){
						$fileExt = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
						$filename = strtolower(str_replace(" ","_",$this->input->post('name')))."_".date('ymdHis').".".$fileExt;
							$config = ['upload_path' => IMAGE_PATH."/players/",
								'allowed_types' => 'jpeg|jpg|png|gif',
								'max_size' => '2048',
								'file_name' => $filename,
								'overwrite' => TRUE,
								'remove_spaces' => TRUE];
							// pr($config); exit;
								
						$this->upload->initialize($config);
						$this->upload->do_upload('photo');
					}
                    $data_arr = $this->input->post(null);
                    $data_arr['photo'] = $filename;
                    $this->common_model->update_by_id('players',$data_arr, $id);
                    set_flashMsg('success','Record has been updated successfully.');
                    redirect(site_url('players/list'));
                }
            }else{
                redirect(site_url('players/list'));
            }
        }else{
            redirect(site_url('players/list'));
        }
		$data['bowlingStyles'] = $this->bowlingStyles;
		$data['battingStyles'] = $this->battingStyles;
        $this->template->load('default', 'players/edit', $data);
    }
}
