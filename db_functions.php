<?php

  /**
   *This class handles all the database communications
   *in the whole system.
   */
  class Database
  {
    // Declaring data variables: host, account, password and db_name
    var $host = '';
    var $account = '';
    var $password = '';
    var $db_name = '';
    var $charset = '';

    function __construct()
    {
      // Loading database details and initializng class
      require_once("public_vars.php");
      $this->host = DB_HOST;
      $this->account = DB_USER_NAME;
      $this->password = DB_PASSWORD;
      $this->db_name = DB_NAME;
      $this->charset = 'utf-8';
    }

    function connect_to_db()
    {
      // Establishing data connection
      try {
        $sconnect = mysqli_connect($this->host, $this->account, $this->password, $this->db_name);
                    // or die("Database Connection Failed! <br>"."Reason: ".mysqli_connect_error());
        if ( mysqli_connect_errno()) {
          $error_string = "<li><b>Error</b>: Failed to connect to MySQL Server.</li>";
          $error_string .="<li><b>Reason</b>: ".mysqli_connect_error()."</li>";
          echo "<div class='container' style='margin-top:12.5%'>
                  <div class='alert alert-danger'>",
                    $error_string,
                 "</div>
                </div>
              </body>
            </html>";
        } else {
          return $sconnect;
        }

      } catch (Exception $e) {
        var_dump($e->getMessage());
        return FALSE;
      }


    }

    function get_field_names($connection, $table_name)
    {
      $query = "SHOW COLUMNS FROM $table_name";

      $result = mysqli_query($connection, $query);

      while ($field_array = mysqli_fetch_assoc($result)) {
        $fields[] = $field_array;
      }

      foreach ($fields as $key => $value) {
        foreach ($value as $field => $field_value) {
          if ($field == 'Field') {
            $field_list[] = $field_value;
          }
        }
      }

      return $field_list;
    }

    function add_new($connection, $form_data, $table_name)
    {
      if(!is_array($form_data))
      {
        return FALSE;
        exit();
      }

      foreach($form_data as $field => $value)
      {
        $form_data[$field] = mysqli_real_escape_string($connection, $form_data[$field]);

        $field_array[] = $field;
        $value_array[] = $form_data[$field];
      }

      $fields = implode(",", $field_array);
      $values = implode('","', $value_array);
      $query = "INSERT INTO $table_name ($fields) VALUES (\"$values\")";

      if (mysqli_query($connection, $query)) {
        return TRUE;
      } else {
        echo("Error description: " . mysqli_error($connection));
        return FALSE;
      }


    }

    function add_activity($connection, $table_name, $user_name, $activity)
    {
      // require_once 'public_functions.php';

      $form_data = array('activity_id' => create_id(date('y-m-d'), 'actID'),
                         'user_name' => $user_name,
                         'activity_details' => $activity,
                         'activity_date_time' => date('y-m-d h:i:s'));

      $add_act = $this->add_new($connection, $form_data, $table_name);

      if ($add_act) {
        return TRUE;
      } else {
        echo("Error description: ".mysqli_error($connection));
        return FALSE;
      }
    }

    function update_data($connection, $form_data, $table_name, $prim_key, $prim_value)
    {
      $query = "UPDATE $table_name SET ";

      if (is_array($form_data)) {
        foreach ($form_data as $field => $value) {
          $value = mysqli_real_escape_string($connection, $value);
          $query .= "$field ="."'".$value."'".", ";
        }
        $query = substr($query, 0, strlen($query) - 2)." WHERE $prim_key = "."'".$prim_value."'";

        if ($result = mysqli_query($connection, $query))
          return TRUE;
        else
          return FALSE;
      } else {
        return FALSE;
      }
    }

    function display_all($connection, $table_name, $order_field='')
    {
      $query = (strlen($order_field) > 0 ) ? "SELECT * FROM $table_name ORDER BY $order_field ASC" : "SELECT * FROM $table_name" ;

      $result = mysqli_query($connection, $query);
      $record_count = mysqli_num_rows($result);
      $rows = array();

      if ($record_count > 0) {
        while($record = mysqli_fetch_assoc($result)){
          $rows[] = $record;
        }
        return $rows;
      } else {
        return $rows;
      }
    }

    function display_data($connection, $table_name, $field_list, $order_field='')
    {
      $fields = implode(",", $field_list);
      $query = (strlen($order_field) > 0) ? "SELECT $fields FROM $table_name ORDER BY $order_field ASC" : "SELECT $fields FROM $table_name" ;

      $result = mysqli_query($connection, $query) or die("Could not execute query to display data.");
      $records = mysqli_num_rows($result);
      $rows = array();

      if ($records > 0) {
        while($record = mysqli_fetch_assoc($result)){
          $rows[] = $record;
        }
        return $rows;
      } else {
        return $rows;
      }
    }

    function display_specific_data($connection, $table_name, $field_list, $key_field, $key, $order_field='')
    {
      $fields = implode(",", $field_list);
      $query = (strlen($order_field) > 0) ? "SELECT $fields FROM $table_name WHERE $key_field="."'".$key."'"." ORDER BY $order_field ASC" : "SELECT $fields FROM $table_name WHERE $key_field="."'".$key."'";

      $result = mysqli_query($connection, $query) or die("Could not execute query to display data.");
      $records = mysqli_num_rows($result);
      $rows = array();

      if ($records > 0) {
        while($record = mysqli_fetch_assoc($result)){
          $rows[] = $record;
        }
        return $rows;
      } else {
        return $rows;
      }
    }

    function get_active_users($connection)
    {
      $active_users = [];
      $active_result = mysqli_query($connection, "SELECT user_name FROM user_privileges") or die("Couldn't perform query to load active users.");

      $active_num = mysqli_num_rows($active_result);
      if ( $active_num > 0 ) {
        while ($active_record = mysqli_fetch_assoc($active_result)) {
          $users[] = $active_record;
        }
        foreach ($users as $value) {
          foreach ($value as $key => $user) {
            $active_users[] = $user;
          }
        }
        return $active_users;
      } else {
        return $active_users;
      }
    }

    function get_item_amount($connection, $criteria)
    {
      $query = "SELECT SUM(itemCost) AS item_amount FROM tblpurchaseorderitems WHERE poID="."'".$criteria."'";

      $result = mysqli_query($connection, $query);
      $amounts = mysqli_num_rows($result) or die("Could not get amount.");
      $amount_array = [];

      if ($amounts > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
          $amount_array[] = $record;
        }
        return $amount_array;
      } else {
        return $amount_array;
      }
    }

    function update_order_amount($connection, $criteria)
    {
      $total_amount = $this->get_item_amount($connection, $criteria);
      $amount = (float)$total_amount[0]['item_amount'];
      $_sql = "UPDATE tblpurchaseordertracker SET poAmount="."'".$amount."'"." WHERE poID="."'".$criteria."'";

      $result = mysqli_query($connection, $_sql) or die("Could not execute query to update amount.");
    }

    function get_receipt_no($connection, $id_value)
    {
      $sql = "SELECT poReceiptNo FROM tblpurchaseordertracker WHERE poID="."'".$id_value."'";
      $result = mysqli_query($connection, $sql);
      $result_number = mysqli_num_rows($result);
      $receipt_no = '';

      if ($result_number > 0 ) {
        while ($records = mysqli_fetch_assoc($result)) {
          $amounts[] = $records;
        }
        return $amounts[0]['poReceiptNo'];
      } else {
        return $receipt_no;
      }
    }

    function get_order_amount($connection, $id_value)
    {
      $sql = "SELECT poAmount FROM tblpurchaseordertracker WHERE poID="."'".$id_value."'";
      $result = mysqli_query($connection, $sql);
      $result_number = mysqli_num_rows($result);
      $amount = 0.00;

      if ($result_number > 0 ) {
        while ($records = mysqli_fetch_assoc($result)) {
          $amounts[] = $records;
        }
        return $amounts[0]['poAmount'];
      } else {
        return $amount;
      }
    }

    function get_order_payments($connection, $id_value)
    {
      $sql = "SELECT SUM(pmtAmount) AS Amount_Paid FROM tblpaymenttracker WHERE poID="."'".$id_value."'";
      $result = mysqli_query($connection, $sql);
      $result_number = mysqli_num_rows($result);
      $amount_paid = 0.00;

      if ($result_number > 0 ) {
        while ($records = mysqli_fetch_assoc($result)) {
          $amounts[] = $records;
        }
        return $amounts[0]['Amount_Paid'];
      } else {
        return $amount_paid;
      }
    }

    function get_payment_summary($connection, $po_id)
    {
      $data = array();
      // $query = "SELECT tblpurchaseordertracker.poID,
      //                 tblpurchaseordertracker.poReceiptNo,
      //                 tblpurchaseordertracker.poAmount,
      //                 SUM(tblpaymenttracker.pmtAmount) AS amtPaid,
      //                 (tblpurchaseordertracker.poAmount - SUM(tblpaymenttracker.pmtAmount)) AS Balance
      //           FROM tblpaymenttracker
      //           INNER JOIN tblpurchaseordertracker
      //           ON tblpaymenttracker.poID = tblpurchaseordertracker.poID
      //           GROUP BY tblpurchaseordertracker.poID";
      $query = "SELECT tblpurchaseordertracker.poID,
                      tblpurchaseordertracker.poReceiptNo,
                      tblpurchaseordertracker.poAmount,
                      SUM(tblpaymenttracker.pmtAmount) AS amtPaid,
                      (tblpurchaseordertracker.poAmount - SUM(tblpaymenttracker.pmtAmount)) AS Balance
                FROM tblpaymenttracker, tblpurchaseordertracker
                WHERE tblpurchaseordertracker.poID="."'".$po_id."'
                AND tblpaymenttracker.poID="."'".$po_id."'";

      $result = mysqli_query($connection, $query);
      $record_count = mysqli_num_rows($result);

      if ($record_count > 0 ){
          while ($row = mysqli_fetch_assoc($result)) {
              $data[] = $row;
          }
        return $data;
      } else {
        return $data;
      }
    }

    function delete_data($connection, $table_name, $prim_key, $prim_value)
    {
      $query = "DELETE FROM $table_name WHERE $prim_key= "."'".$prim_value."'";

      if ($result = mysqli_query($connection, $query)) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

    function search_by_multiple($connection, $table_name, $fields, $search_array, $order_field)
    {
      $field_list = implode(", ", $fields);
      $query = "SELECT $field_list FROM $table_name WHERE ";
      foreach ($search_array as $key => $value) {
        $query .= $key." = "."'".$value."'"." AND ";
      }
      $query = substr($query, 0, strlen($query) - 4);
      $query .= "ORDER BY ".$order_field." ASC";

      $result = mysqli_query($connection, $query);
      $records = mysqli_num_rows($result);
      $rows = [];

      if ($records > 0) {
        while($record = mysqli_fetch_assoc($result)) {
          $rows[] = $record;
        }
        return $rows;
      } else {
        return $rows;
      }
    }

    function search_data($connection, $table_name, $fields, $prim_key, $criteria, $order_field)
    {
      $field_list = implode(", ", $fields);
      $query = "SELECT $field_list FROM $table_name WHERE $prim_key LIKE "."'%".$criteria."%' ORDER BY ".$order_field." ASC ";

      $result = mysqli_query($connection, $query);
      $records = mysqli_num_rows($result);
      $rows = [];

      if ($records > 0) {
        while($record = mysqli_fetch_assoc($result)) {
          $rows[] = $record;
        }
        return $rows;
      } else {
        return $rows;
      }
    }

    function view_data($connection, $table_name, $prim_key, $prim_value)
    {
      require_once("public_functions.php");

      $query = "SELECT * FROM $table_name WHERE $prim_key="."'".$prim_value."'";

      $result = mysqli_query($connection, $query);
      $view_num = mysqli_num_rows($result);
      $view_array = [];

      if ( $view_num > 0 ) {
        while($record = mysqli_fetch_array($result)){
          $rows[] = $record;
        }
        foreach ($rows as $value) {
          foreach ($value as $vkey => $kvalue) {
            $view_array[$vkey] = $kvalue;
          }
        }
        return $view_array;
      } else {
        return $view_array;
      }
    }

    function data_exists($connection, $tablename, $field, $value)
    {
      $sql = "SELECT $field FROM $tablename WHERE $field="."'".$value."'";

      $result = mysqli_query($connection, $sql);
      $users = mysqli_num_rows($result);

      if ($users > 0) {
        return TRUE;
      } else {
        return FALSE;
      }
    }

    function create_data_array($connection, $table_name, $field_name, $distinct = FALSE, $sorted = FALSE)
    {
      $sql = ($distinct) ? "SELECT DISTINCT $field_name FROM $table_name " : "SELECT $field_name FROM $table_name" ;

      $result = mysqli_query($connection, $sql);
      $result_number = mysqli_num_rows($result);
      $data_array = [];

      if ($result_number > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
          $rows[] = $record;
        }
        foreach ($rows as $value) {
          foreach ($value as $vkey => $kvalue) {
            $data_array[] = $kvalue;
          }
        }
        if ($sorted) {
          sort($data_array);
        }
        return $data_array;
      } else {
        return $data_array;
      }
    }

    function get_monthly_birthdays($connection)
    {
      $month_stamp = date('m', time());

      $sql = "SELECT first_name, last_name, status, date_of_birth FROM members WHERE ";
      $sql .= "MONTH(date_of_birth) = {$month_stamp} ORDER BY DAY(date_of_birth) ASC";

      $result = mysqli_query($connection, $sql);
      $records = mysqli_num_rows($result);

      $result_number = mysqli_num_rows($result);
      $rows = [];

      if ($result_number > 0) {
        while ($record = mysqli_fetch_assoc($result)) {
          $rows[] = $record;
        }
        return $rows;
      } else {
        return $rows;
      }
    }

    function get_id($connection, $table, $field, $key_field, $key)
    {
      $sql = "SELECT $field FROM $table WHERE $key_field="."'".$key."'";
      $result = mysqli_query($connection, $sql);
      $result_number = mysqli_num_rows($result);

      if ($result_number > 0 ) {
        while ($records = mysqli_fetch_assoc($result)) {
          $data[] = $records;
        }
        return $data[0][$field];
      }
    }

    function multiple_data_exists($connection, $table_name, $fields, $criteria)
    {

        $field_list = implode(",", $fields);
        $query = "SELECT $field_list FROM $table_name WHERE ";

        foreach($criteria as $key => $value) {
            $query .= $key." = "."'".$value."'"." AND ";
        }
        $query = substr($query, 0, strlen($query) - 4);

        $result = mysqli_query($connection, $query);
        $result_number = mysqli_num_rows($result);

        if ($result_number > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Backup the whole database or just some tables
     * Use '*' for whole database or 'table1 table2 table3...'
     * param string $tables
     */
    public function backup_database($connection, $tables = '*')
    {
        mysqli_query($connection, "SET NAMES '". $this->charset."'");
        try
        {
            /**
            * Tables to export
            */
            if ($tables == '*') {
                $tables = array();
                $result = mysqli_query($connection, 'SHOW TABLES');
                while($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
            }

            $sql = "SET SQL_MODE = "."'NO_AUTO_VALUE_ON_ZERO';\n";
            $sql .= "SET time_zone = "."'+00:00';\n\n";

            $sql .= 'CREATE DATABASE IF NOT EXISTS '.$this->db_name.";\n\n";
            $sql .= 'USE '.$this->db_name.";\n\n";

            /**
            * Iterate tables
            */
            foreach($tables as $table) {
                // echo "Backing up ".$table." table...";

                $result = mysqli_query($connection, 'SELECT * FROM '.$table);
                $numFields = mysqli_num_fields($result);

                $sql .= 'DROP TABLE IF EXISTS '.$table.';';
                $row2 = mysqli_fetch_row(mysqli_query($connection, 'SHOW CREATE TABLE '.$table));
                $sql.= "\n\n".$row2[1].";\n\n";

                for ($i = 0; $i < $numFields; $i++) {
                    while($row = mysqli_fetch_row($result))
                    {
                        $sql .= 'INSERT INTO '.$table.' VALUES(';
                        for($j=0; $j<$numFields; $j++)
                        {
                            $row[$j] = addslashes($row[$j]);
                            $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                            if (isset($row[$j])) {
                                $sql .= '"'.$row[$j].'"' ;
                            } else {
                                $sql.= '""';
                            }

                            if ($j < ($numFields-1)) {
                                $sql .= ',';
                            }
                        }

                        $sql.= ");\n";
                    }
                }

                $sql.="\n\n\n";

                // echo " OK" . "\n";
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return FALSE;
        }

        return $this->download_file($sql);
    }

    /**
     * Save SQL to file
     * param string $sql
     */
    protected function download_file(&$sql)
    {
        if (!$sql) return FALSE;

        try
        {
            $file_name = $this->db_name.'_data_backup_'.date("d", time()).'_'.date("M", time()).'_'.date("y", time()).'.sql';

            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"".$file_name."\"");
            echo $sql;
            exit;

        } catch (Exception $e) {
            var_dump($e->getMessage());
            return FALSE;
        }

        return TRUE;
    }

    function change_full_name($connection, $value_to_change, $prim_value)
    {
      // $user_details = "UPDATE login_details SET full_name="."'".$value_to_change."'"." WHERE user_name="."'".$prim_value."'";
      $user_sql = "UPDATE users SET edited_by="."'".$value_to_change."'"." WHERE user_name="."'".$prim_value."'";

      // $detials = mysqli_query($connection, $user_details);
      $sql_result = mysqli_query($connection, $user_sql);
    }

    function get_user_priveleges($connection, $user_name)
    {
      $user_sql = "SELECT * FROM user_privileges WHERE user_name="."'".$user_name."'";

      $user_result = mysqli_query($connection, $user_sql);
      $user_num = mysqli_num_rows($user_result);
      $user_array = [];

      $fields = $this->get_field_names($connection, 'user_privileges');

      if ($user_num > 0) {
        while ($record = mysqli_fetch_array($user_result)) {
          $rows[] = $record;
        }
        foreach ($rows as $key => $value) {
          $user_array = filter_array($value, $fields);
        }
        return $user_array;
      } else {
        return $user_array;
      }
    }

    function exec_query($connection, $query)
    {
      $result = mysqli_query($connection, $query) or
                die("Couldn't execute query!<br>"."Reason:".mysql_error());
      return $result;
    }

    function close_connection($connection)
    {
      $result = mysqli_close($connection) or die('Cannot close connection');
      return $result;
    }

  }

?>
