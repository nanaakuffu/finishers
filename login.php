<?php
    session_start();

    require_once("db_functions.php");
    require_once("public_vars.php");
    require_once("public_functions.php");

    if (isset($_POST['login'])) {
        // Connect to database and get user access levels as he/she logs in
        $db = new Database();
        $con = $db->connect_to_db();

        $user_array = $db->get_user_priveleges($con, $_POST['user_name']);

        // $user_sql = "SELECT user_password, first_name, middle_name, last_name FROM user_details WHERE user_name = "."'".$_POST['user_name']."'";
        $user_sql = "SELECT user_details.user_name, user_password, first_name, middle_name, last_name,
                     COUNT(login_details.user_name) AS login_count
                     FROM user_details
                     INNER JOIN login_details
                     ON user_details.user_name = login_details.user_name
                     WHERE user_details.user_name = '".$_POST['user_name']."'";

        $result = mysqli_query($con, $user_sql) or die("Couldn't execute query for getting the user name.");
        $num = mysqli_num_rows($result);

        while($_record = mysqli_fetch_assoc($result)){
          $full_rows[] = $_record;
        }
        // SELECT user_password, first_name, middle_name, last_name, COUNT(`login_details`.user_name) AS CNT FROM `user_details`, `login_details` WHERE `user_details`.user_name='Admin'
        if ($num > 0) {   // user name was found
          $full_name = $full_rows[0]['first_name']." ".$full_rows[0]['middle_name']." ".$full_rows[0]['last_name'];
          $password = encryption($_POST['user_pass_word'], trim($full_name));

          if ( $password == $full_rows[0]['user_password'] ) { // Password did match
              $_SESSION = $user_array;
              $_SESSION['user_name'] = $_POST['user_name'];
              $_SESSION['full_name'] = $full_name;
              $_SESSION['auth'] = 'yes';
              $_SESSION['is_admin'] = 1;

              $_SESSION['login_time'] = time();

              // Create an array with the variables available
              $log_array = array('login_id'=>create_id(date('y-m-d'), "logID"), 'user_name'=>$_POST['user_name'], 'login_date_time'=>date('y-m-d h:i:s'));
              $log_array = secure_data_array($log_array);

              $_SESSION['log_id'] = $log_array['login_id'];

              // Update login Details
              $result = $db->add_new($con, $log_array, 'login_details');
              if ($result) {
                // Update login count
                $_SESSION['login_count'] = $full_rows[0]['login_count'] + 1;
                // Add user activity
                $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Logged into the system.');
              }

              $db->close_connection($con);
              header("Location: purchase_order.php");
            } else {
            $db->close_connection($con);
            $message = "<i class='fa fa-fw fa-close'></i> Password does not match your user name!";
            $_SESSION['message'] = $message;
            include_once 'login_page.php';
            exit();
          }
        } else {
          $db->close_connection($con);
          $message = "<i class='fa fa-fw fa-close'></i> Password does not match your user name!";
          $_SESSION['message'] = $message;
          include_once 'login_page.php';
          exit();
        }
    } else {
      include 'login_page.php';
      exit();
    }

?>
