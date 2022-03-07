<?php

class Common_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    /**
     * Insert new records in database
     * 
     * @param string $table table name
     * @param array $data array records
     * @param boolean $date check if created date to be inserted in table
     * @return int last inserted id
     */
    public function insert($table = null, $data = null, $date = true) {
        if($date == true) {
            $data['created'] = date('Y-m-d H:i:s');
        }
        $this->db->insert($table, $data);
        return $this->db->insert_id();
        //return $this->db->set($data)->get_compiled_insert($table);
    }

    /**
     * Update records by id in database
     * 
     * @param string $table table name
     * @param array $data array records
     * @param int $id primary key column of table
     * @return bool true on success otherwise false
     */
    public function update_by_id($table = null, $data = null, $id = null) {
        $this->db->where('id', $id)
                ->limit(1)
                // ->set($data)->get_compiled_update($table);
                ->update($table, $data);
        return $this->db->affected_rows();
        
    }

    /**
     * Delete record by id in database
     * 
     * @param string $table table name
     * @param int $id primary key column of table
     * @return bool true on success otherwise false
     */
    public function delete_by_id($table = null, $id) {
        return $this->db->where('id', $id)
                ->limit(1)
                ->delete($table);
    }

    /**
     * Fetch single record from table
     * 
     * @param string $table table name
     * @param array $data column value pair to be checked in sql condition
     * @param srint $select columns to be selected
     * @return array record array
     */
    public function get_row($table = null, $data = null, $select = '*') {
        return $this->db->select($select)
                ->where($data)
                ->limit(1)
                ->get($table)->row_array();
//        return $this->db->get_where($table, $data)->row();
    }

    /**
     * Fetch records from table
     * 
     * @param string $table table name
     * @param string $columns columns to be fetched separated by commas
     * @param int $start starting index
     * @param int $limit number of rows per request
     * @param string $order_by order by column name
     * @param string $sorty_by type of sort 'asc' or 'desc'
     * @param array $data columns to be filtered
     * @return array array of records 
     */
    public function get_all($table, $columns = '*', $start = 0, $limit = null, $order_by = 'id', $sort_by = 'desc', $data = null) {
        $this->db->select($columns);
        if ($data) {
            $this->db->where($data);
        }
        return $this->db->order_by($order_by, $sort_by)
                ->limit($limit, $start)
//                $this->db->get_compiled_select($table);
                ->get($table)->result_array();
    }

    /**
     * to fetch number of records from table
     * 
     * @param string $table table name
     * @param array $data column value pair to be checked in sql condition
     * @return int number of records
     */
    public function get_num_filter_row($table = null, $data = null) {
        if ($data) {
            $this->db->where($data);
        }
//        return $this->db->get_compiled_select($table);
        return $this->db->count_all_results($table);
    }

    /**
     * to fetch number of records from table
     * 
     * @param string $table table name
     * @param array $data column value pair to be checked in sql condition
     * @return int number of records
     */
    public function get_num_row($table = null, $data = null) {
        return $this->db->where($data)
//                ->get_compiled_select($table);
                  ->count_all_results($table);
    }

    /**
     * update table info
     * 
     * @param type $table table name
     * @param type $update_data data to be updated
     * @param type $where_data where statement or key/value pair to be matched
     * @return type true on success other wise false
     */
    public function update($table, $update_data, $where_data) {
        return $this->db->where($where_data)
                ->update($table, $update_data);
    }
    
    /**
     * Delete records 
     * 
     * @param type $table table name
     * @param type $where where constraint
     * @return boolean
     */
    public function delete($table, $where_data) {
        return $this->db->where($where_data)
                ->delete($table);
    }


    public function send_email_message($to,$subject,$body) {

        //SMTP & mail configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_timeout' => '7',
            'smtp_user' => 'nkmeva@gmail.com',
            'smtp_pass' => 'asadsd',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");

        $this->email->from('nkmeva@gmail.com', SITENAME);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($body);

        //Send email
        $this->email->send();
        return 1;
        //echo $this->email->print_debugger();
        //show_error($this->email->print_debugger());

    }

}
