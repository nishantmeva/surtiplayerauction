<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(is_admin_loggedin()) {
            redirect(site_url('dashboard/'));
        }
    }

    public function index() {
        $data['title'] = "Data Panel";

        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[255]');
            $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[255]');

            if ($this->form_validation->run()) {
                $admin_login_data['email'] = $this->input->post('email');
				$admin_login_data['password'] = md5($this->input->post('password'));
                $admin_login_data['active'] = 1;
				$admin_data = $this->common_model->get_row('tournament', $admin_login_data, '*');
                if($admin_data) {
                    $this->session->set_userdata('admin', $admin_data);
                    redirect(site_url('dashboard/'));
                } else {
                    set_flashMsg('danger','Error : Email or Password are invalid !');
                }
            }
        }
        $this->template->load('login','index',$data);
    }

    public function forgotpassword() {
        $data['title'] = SITENAME;
        if ($this->input->post()){
            $this->form_validation->set_rules('email', 'Email', 'required|trim|max_length[255]');
            if($this->form_validation->run()){
                $admin_dataArr['email'] = $this->input->post('email');
                $admin_dataArr['active'] = 1;
                $admin_data = $this->common_model->get_row('tournament', $admin_dataArr, '*');
                if($admin_data){
                    $uid = $admin_data['id'];
                    $chars = "0123456789abcdzxynmbhjkopliytredf";
                    $new_password = substr(str_shuffle($chars), 0, 7);

                    $data_arr['password'] = md5($new_password);
                    $this->common_model->update_by_id('tournament', $data_arr, $uid);

                    // $to = $admin_data['email'];
                    // $subject = SITENAME." | New Password";

                    // $email_message_data['userName'] = $admin_data['username'];
                    // $email_message_data['new_password'] = $new_password;

                    // $message = $this->load->view('email_templates/recover_account', $email_message_data, true);
                    //$this->common_model->send_email_message($to, $subject, $message);
					//set_flashMsg('success', 'Please check your Email, You will get response on mail.');
					set_flashMsg('success', 'Your new password is '.$new_password);
                }else{
                    set_flashMsg('danger', 'Error: Email is invalid. Or User is inactive. Please confirm with database admin.');
                }
            }
        }
        $this->template->load('login','forgotpassword',$data);
    }

    public function resetpassword() {
        $id = base64_decode(base64_decode($this->uri->segment(4)));
        if(!empty($id)) {

            $data['title'] = SITENAME;
            if ($this->input->post()) {
                $this->form_validation->set_rules('reset_code', 'Reset Code', 'required|trim|max_length[6]');
                $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[20]');
                if($this->form_validation->run()){
                    $admin_dataArr['id'] = $id;
                    $checkResetData = $this->common_model->get_row('tournament', $admin_dataArr, '*');
                    if($checkResetData['reset_code'] != '100'){
                        $dataArr['id'] = $id;
                        $dataArr['reset_code'] = $this->input->post('reset_code');
                        $checknewcode = $this->common_model->get_row('tournament', $dataArr, '*');
                        if(!empty($checknewcode)){
                            $updateArr['reset_code'] = 100;
                            $updateArr['password'] = md5($this->input->post('password'));
                            if($this->common_model->update_by_id('tournament',$updateArr, $id)){
                                set_flashMsg('success','Success : Password has been successfully reseted.');
                                redirect(site_url(SITE_URL));
                            }
                        }else{
                            set_flashMsg('danger','Error : Invalid Reset Code');
                        }
                    }else{
                        set_flashMsg('danger','This Code has been already reseted. Please login with new password. If you forgot new password, Please do forgot password process again.');
                    }
                }
            }
            $this->template->load('login','resetpassword',$data);
        }else{
            redirect(site_url('site/forgotpassword'));
        }
    }
}
