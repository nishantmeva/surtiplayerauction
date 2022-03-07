<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tournament extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!is_admin_loggedin()) {
            redirect(site_url('/'));
        }
        $this->load->library('upload');
        $this->load->model('user_model');
    }

    public function profile() {
        $data['title'] = "Profile Control";
        $data['admin_profile'] = $this->common_model->get_row('tournament', ['id' => $this->session->userdata('admin')['id']], '*');
        $this->template->load('default', 'tournament/profile', $data);
    }

    public function update_profile() {
        $data = array();
        if($this->input->post()) {
            $this->form_validation->set_rules('name', "Name", 'trim|required|max_length[255]|strip_tags|xss_clean');
            $this->form_validation->set_rules('email', "Email", 'trim|required|max_length[255]|valid_email|strip_tags|xss_clean');
            if($this->form_validation->run()) {
                $profile_data = $this->input->post(null);
                if ($this->common_model->update_by_id('tournament', $profile_data, $this->session->userdata('admin')['id'])) {
                    $data['result'] = "success";
                    $data['message'] = "Profile data has been changed successfully.";
                }else{
                    $data['result'] = "error";
                    $data['message'] = "Error occurred while updating data!";
                }
            } else {
                $data['result'] = "error";
                $data['message'] = validation_errors();
            }
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function change_password(){
        $data1['title'] = "Password Control";
        $this->template->load('default', 'tournament/change_password', $data1);
        $data = array();
        if($this->input->post()) {
            $this->form_validation->set_rules('new_password', "New Password", 'required|trim|max_length[255]');
            if($this->form_validation->run()) {
                $admin_data['password'] = md5($this->input->post('new_password'));
                if($this->common_model->update('tournament', ['password' => $admin_data['password']], 'id='.$this->session->userdata('admin')['id'])) {
                    $data['result'] = "success";
                    $data['message'] = "Password has been changed successfully.";
                } else {
                    $data['result'] = "error";
                    $data['message'] = "Error occurred while updating password!";
                }
            } else {
                $data['result'] = "error";
                $data['message'] = validation_errors();
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
    }

    public function profile_image(){
        $data1['title'] = "Image Control";
        $this->template->load('default', 'tournament/profile_image', $data1);
    }

    public function update_profile_image(){
        $data = array();
		//pr($_FILES); exit;
        if($_FILES['logo']['name'] != ""){
            $config = ['upload_path' => IMAGE_PATH."/",
                'allowed_types' => 'jpeg|jpg|png|gif',
                'max_size' => '2048',
                'file_name' => 'logo',
                'overwrite' => TRUE,
                'remove_spaces' => TRUE];
				
            $this->upload->initialize($config);
            if($this->upload->do_upload('logo')){
                $data['result'] = "success";
                $data['message'] = 'Profile Picture has been uploaded.';
                $profile_pic_data['logo'] = $this->upload->data('file_name');
                $this->common_model->update_by_id('tournament', $profile_pic_data, $this->session->userdata('admin')['id']);
                $this->session->set_userdata('admin', $this->common_model->get_row('tournament', ['id' => $this->session->userdata('admin')['id']], '*'));
            }else{
                $data['result'] = "error";
                $data['message'] = $this->upload->display_errors();
            }
        }else{
            $data['result'] = "error";
            $data['message'] = "Invalid Image.";
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }



}
