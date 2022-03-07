<?php

/**
 * Check admin login session
 * 
 * @return boolean true if adminis logged in otherwise false
 */
function is_admin_loggedin() {
    $ci = & get_instance();
    $ci->load->model('common_model');
    $admin_data = $ci->session->userdata('admin');    
    if (!empty($admin_data) && !empty($ci->common_model->get_row('tournament', [ 'email' => $admin_data['email'], 'active' => '1'], 'id'))) {
        return true;
    } else {
        return false;
    }
}

/**
 * Print array or variable in structured format
 * 
 * @param string/array $var
 * @return void
 */
function pr($var) {
    echo "<pre>"; print_r($var); echo "</pre>";
}

/**
 * Get page title with site name
 * 
 * @param string $title page tab title
 * @return string page title with site name
 */
function tab_title($title) {
    return SITENAME . " | " . $title;
}

/**
 * Prints message with format
 * 
 * @param string $msg message string
 * @param string $start_tag starting tag
 * @param string $end_tag ending tag
 * @return void
 */
function msg($msg = "", $start_tag = "<div class='flash-alert alert alert-danger' >", $end_tag = "</div>") {
    $alert_dismiss = '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
    if (!($msg == "" || $msg == null)) {
        echo $start_tag . $msg . $end_tag;
    }
}

/**
 * Prints set_flashMsg with format
 *
 * @param string $messages_type (info,error,warning,success) starting tag
 * @param string $msg ending tag
 * @return void
 */
function set_flashMsg($messages_type, $msg) {
    $ci = & get_instance();
    $mshStr = "<div class='alert alert-".$messages_type."'>".$msg."</div>";
    return $ci->session->set_flashdata('messages', $mshStr);
}

/**
 * Prints get_flashMsg with format
 * @return void
 */
function get_flashMsg() {
    $ci = & get_instance();
    if($ci->session->flashdata('messages')){
        return $ci->session->flashdata('messages');
    }
}

/**
 * Get CSS class name for highlighting current tab
 * 
 * @param string $url_segment url segment
 * @param string $value string value to be matched
 * @return string "active" or ""
 */
function get_active_class($url_segment, $value) {
    return $url_segment == $value ? "active" : "";
}

/**
 * Convert date to short format
 * 
 * @param string $date date
 * @return string date
 */
function to_long_date($date) {
    if($date == '' || $date == null || $date == '0000-00-00 00:00:00') {
        return '--';        
    }
    return date('d-m-Y h:i A', strtotime($date));
}

/**
 * Convert date to long format
 * 
 * @param string $date
 * @return string date
 */
function to_short_date($date) {
    if($date == '' || $date == null || $date == '0000-00-00') {
        return '--';        
    }
    return date('d-m-Y', strtotime($date));
}

/**
 * Generate random string
 * 
 * @param int $length
 * @return string
 */
function generateRandomString($length = 10) {
    return bin2hex(openssl_random_pseudo_bytes($length));
}


/**
 * Sends email message
 *
 * @param string $to
 * @param string $subject
 * @param string $message
 * @return boolean
 */
function send_email_message($to, $subject, $message) {
    $ci = & get_instance();
    $config = [
        'protocol' => 'smtp',
//        'smtp_host' => 'ssl://smtp.gmail.com',
//        'smtp_port' => 465,
//        'email' => 'nm.narola@gmail.com',
//        'password' => 'narola21@',
        'smtp_host' => 'ssl://smtp.1and1.com',
        'smtp_port' => 465,
        'smtp_user' => 'sus@narola.email',
        'smtp_pass' => 'qS3Zn663upwbdNJ',
        'mailtype' => 'html',
        'charset' => 'utf-8',
        'wordwrap' => TRUE,
        'newline' => "\r\n"
    ];

    $ci->load->library('email');
    $ci->email->initialize($config);
    $ci->email->from('nm.narola@gmail.com');
    $ci->email->to($to);
    $ci->email->subject($subject);
    $ci->email->message($message);

    if ($ci->email->send()) {
        return true;
    } else {
        //show_error($this->email->print_debugger());
        return false;
    }
}

/**
 * Get random domain from array
 * 
 * @return string
 */
function get_random_domain() {
    $domains = [
        /* Default domains included */
        "aol.com", "att.net", "comcast.net", "facebook.com", "gmail.com", "gmx.com", "googlemail.com",
        "google.com", "hotmail.com", "hotmail.co.uk", "mac.com", "me.com", "mail.com", "msn.com",
        "live.com", "sbcglobal.net", "verizon.net", "yahoo.com", "yahoo.co.uk",
        /* Other global domains */
        "email.com", "fastmail.fm", "games.com" /* AOL */, "gmx.net", "hush.com", "hushmail.com", "icloud.com",
        "iname.com", "inbox.com", "lavabit.com", "love.com" /* AOL */, "outlook.com", "pobox.com", "protonmail.com",
        "rocketmail.com" /* Yahoo */, "safe-mail.net", "wow.com" /* AOL */, "ygm.com" /* AOL */,
        "ymail.com" /* Yahoo */, "zoho.com", "yandex.com",
        /* United States ISP domains */
        "bellsouth.net", "charter.net", "cox.net", "earthlink.net", "juno.com",
        /* British ISP domains */
        "btinternet.com", "virginmedia.com", "blueyonder.co.uk", "freeserve.co.uk", "live.co.uk",
        "ntlworld.com", "o2.co.uk", "orange.net", "sky.com", "talktalk.co.uk", "tiscali.co.uk",
        "virgin.net", "wanadoo.co.uk", "bt.com",
        /* Domains used in Asia */
        "sina.com", "qq.com", "naver.com", "hanmail.net", "daum.net", "nate.com", "yahoo.co.jp", "yahoo.co.kr", "yahoo.co.id", "yahoo.co.in", "yahoo.com.sg", "yahoo.com.ph",
        /* French ISP domains */
        "hotmail.fr", "live.fr", "laposte.net", "yahoo.fr", "wanadoo.fr", "orange.fr", "gmx.fr", "sfr.fr", "neuf.fr", "free.fr",
        /* German ISP domains */
        "gmx.de", "hotmail.de", "live.de", "online.de", "t-online.de" /* T-Mobile */, "web.de", "yahoo.de",
        /* Italian ISP domains */
        "libero.it", "virgilio.it", "hotmail.it", "aol.it", "tiscali.it", "alice.it", "live.it", "yahoo.it", "email.it", "tin.it", "poste.it", "teletu.it",
        /* Russian ISP domains */
        "mail.ru", "rambler.ru", "yandex.ru", "ya.ru", "list.ru",
        /* Belgian ISP domains */
        "hotmail.be", "live.be", "skynet.be", "voo.be", "tvcablenet.be", "telenet.be",
        /* Argentinian ISP domains */
        "hotmail.com.ar", "live.com.ar", "yahoo.com.ar", "fibertel.com.ar", "speedy.com.ar", "arnet.com.ar",
        /* Domains used in Mexico */
        "yahoo.com.mx", "live.com.mx", "hotmail.es", "hotmail.com.mx", "prodigy.net.mx",
        /* Domains used in Brazil */
        "yahoo.com.br", "hotmail.com.br", "outlook.com.br", "uol.com.br", "bol.com.br", "terra.com.br", "ig.com.br", "itelefonica.com.br", "r7.com", "zipmail.com.br", "globo.com", "globomail.com", "oi.com.br"
    ];
    return $domains[array_rand($domains, 1)];
}
