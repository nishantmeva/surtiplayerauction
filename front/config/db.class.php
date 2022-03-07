<?php
require_once('conn.php');

class database {

	private $connection;
    var $_sql = '';

    /** @var Internal variable to hold the connector resource */
    var $_resource = '';

    /** @var Internal variable to hold the query result */
    var $_result = '';

    /** @var Internal variable to hold the query result */
    var $_insertId = '';

    //$host = '';
    /**
     * Database object constructor
     * @param string Database host
     * @param string Database user name
     * @param string Database user password
     * @param string Database name
     * @param string Common prefix for all tables
     * @param boolean If true and there is an error, go offline
     */
	function __construct() {
		$this->Connect();
	}
	
	function __destruct() {
		//$this->close();
	}
	
	function Connect(){
		$this->database(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
	}
	
	function database($db_host='', $db_user='', $db_pass='', $db_name='') {
		$this->connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

		// Check connection
        if (mysqli_connect_errno()){
            echo "<br/>Failed to connect to MySQL: " . mysqli_connect_error();
        }
	}

    /**
     * Execute the query
     * @return mixed A database resource if successful, FALSE if not.
     */
    function query($sql) {
        $_sql = $sql;
        return $_result = mysqli_query($this->connection, $_sql);
    }

    /**
     * Execute the query for insert
     * @return auto increment id
     */
    function insert($table, $dbFields, $debug = false) {

        $field = array();
        $value = array();

        foreach ($dbFields as $k => $v) {
            $v = addslashes(stripslashes($v));

            $field[] = $k;
            $value[] = $v;
        }

        $f = implode('`,`', $field);
        $val = implode("','", $value);

        $insertSql = "INSERT INTO `$table` (`$f`) VALUES ('$val')";
        if ($debug)
            die($insertSql);

        $result = mysqli_query($this->connection, $insertSql) or die('Error while executing insert query: ' . mysqli_error($this->connection));

        $this->_insertId = mysqli_insert_id($this->connection);
        if (!mysqli_error($this->connection)) {
            return $this->_insertId;
        } else {
            echo mysqli_error($this->connection);
        }
    }

    /**
     * Execute the query for update
     * @return true for success
     */
    function update($table, $dbFields, $strWhere, $debug = false) {

        $updateSql = "UPDATE $table SET ";
        $i = 0;
        foreach ($dbFields as $k => $v) {
            //$v = addslashes(stripslashes($v));  
            if ($i == 0) {
                if ($v != 'NULL') {
                    $updateSql .= " $k = '$v' ";
                } else {
                    $updateSql .= " $k = NULL ";
                }
            } else {
                if ($v != 'NULL') {
                    $updateSql .= ", $k = '$v' ";
                } else {
                    $updateSql .= ", $k = NULL ";
                }
            }
            $i++;
        }


        $updateSql .= " WHERE $strWhere";
        if ($debug)
            echo $updateSql;

        $result = mysqli_query($this->connection, $updateSql);

        return $result;
    }

    /**
     * Execute the query for sekect
     * @return array contains result
     */
    function select($debug = false, $vars = "*", $table = null, $where = "", $orderBy = "", $groupBy = "", $resultType = "") {

        if ($vars != "*") {
            if (is_array($vars)) {
                $vars = implode(",", $vars);
            }
        }

        $selectSql = "SELECT " . $vars . " FROM " . $table . " WHERE 1 = 1 AND " . $where . " " . $groupBy . " " . $orderBy;

        if ($debug) {
            echo $selectSql;
            exit;
        }


        $resource = mysqli_query($this->connection, $selectSql);

        $result = array();

        while ($row = mysqli_fetch_array($resource)) {
            $result[] = $row;
        }
        return $result;
    }

    function get_results($selectSql, $data_type = null, $resultType = "") {

        $resource = mysqli_query($this->connection,$selectSql) or die('Error while executing get result query: ' . mysqli_error($this->connection));

        $result = array();

        while ($row = mysqli_fetch_assoc($resource)) {
            $result[] = $row;
        }

        if ($data_type == 'json') {
            return json_encode($result);
        } else {
            return $result;
        }
    }

    function get_row($selectSql, $data_type = null, $resultType = "") {

        $resource = mysqli_query($this->connection, $selectSql) or die('Error while executing get row query: ' . mysqli_error($this->connection));

        $result = array();

        while ($row = mysqli_fetch_assoc($resource)) {
            $result = $row;
        }
        if ($data_type == 'json') {
            return json_encode($result);
        } else {
            return $result;
        }
    }

    /**
     * Execute the query for delete
     * @return true
     */
    function delete($table, $where) {

        $deleteSql = "DELETE FROM $table WHERE $where ";

        $result = mysqli_query($this->connection,$deleteSql) or die('Error while executing Delete query: ' . mysqli_error($this->connection));

        return true;
    }

    function getNextId($table) {
        $result = mysqli_query($this->connection,"SHOW TABLE STATUS LIKE '" . $table . "'");
        $row = mysqli_fetch_array($result);
        $nextId = $row['Auto_increment'];
        return $nextId;
    }

    function getName($id, $idValue, $table, $name) {
        error_reporting(0);
        $sqlSelect = "SELECT `" . $name . "`
                         FROM `" . $table . "`
                         WHERE `" . $id . "` = '" . $idValue . "'";
        //    echo $sqlSelect;             

        $relSelect = mysqli_query($this->connection,$sqlSelect);
        $nameValue = "";
        while ($row = mysqli_fetch_array($relSelect)) {
            $nameValue = $row[$name];
        }

        if ($nameValue)
            return $nameValue;
        else
            return '';
    }

    function checkFieldValueExist($field_name = null, $field_value = null, $table_name = null, $debug = FALSE) {
        if ($field_name != null && $table_name != null) {
            $sqlSelect = "SELECT *
                         FROM `" . $table_name . "`
                         WHERE `" . $field_name . "` = '" . $field_value . "'";
            if ($debug)
                die($sqlSelect);

            return $this->get_row($sqlSelect, "");
        } else {
            die("please pass valid field name of table and table name.");
        }
    }

    /**
     * Called for taking last insert id
     * @return last inserted id
     */
    function getInsertId() {
        echo $this->_insertId;
    }

    /**
     * Execute the query for num of row count
     * @return number of rows for result
     */
    function numRows($sql) {
        $_sql = $sql;
        $_result = mysqli_query($this->connection, $_sql);
        $results = mysqli_num_rows($_result);
        mysqli_free_result($_result);
        return $results;
    }

    /**
     * Clode db connection
     */
    function dbClose() {
        mysqli_close($this->connection);
    }

    /**
     * fetch the mysql result resource
     * @return fetched array
     */
    function fetchArray($rs) {
        return mysqli_fetch_array($rs);
    }

    function str_to_time($date) {
        $date = date_create_from_format('m-d-Y', $date);
        $date = date_format($date, 'Y-m-d');
        $d3 = strtotime($date);
        return $d3;
    }

}

?>