<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $ci;

    function __construct() {
        $this->ci = & get_instance();
    }

//    function set($name, $value) {
//        $this->template_data[$name] = $value;
//    }
//
//    function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
//        $this->set('contents', $this->ci->load->view($view, $view_data, TRUE));
//        return $this->ci->load->view($template, $this->template_data, $return);
//    }

    function load($tpl_view, $body_view = null, $data = array()) {
        //pr($data); exit;
        if (!is_null($body_view)) {

            if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view . '.php')) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/' . $body_view)) {
                $body_view_path = $body_view;
            } else if (file_exists(APPPATH . 'views/' . $body_view . '.php')) {
                $body_view_path = $body_view;
            } else {
                show_error('Unable to load the requested file: ' . $tpl_view . '/' . $body_view . '.php');
            }
            $body = $this->ci->load->view($body_view_path, $data, TRUE);

            if (is_null($data)) {
                $data = array('body' => $body);
            } else if (is_array($data)) {
                $data['body'] = $body;
            } else if (is_object($data)) {
                $data->body = $body;
            }
        }

        $this->ci->load->view('Templates/' . $tpl_view, $data);
    }

}