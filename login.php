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

        $user_sql = "SELECT user_name, first_name, middle_name, last_name FROM user_details WHERE user_name = "."'".$_POST['user_name']."'";

        $result = mysqli_query($con, $user_sql) or die("Couldn't execute query for getting the user name.");
        $num = mysqli_num_rows($result);

        while($full_record = mysqli_fetch_assoc($result)){
          $full_rows[] = $full_record;
        }

        if ($num > 0) {   // user name was found
          $full_name = $full_rows[0]['first_name']." ".$full_rows[0]['middle_name']." ".$full_rows[0]['last_name'];
          $password = encryption($_POST['user_pass_word'], trim($full_name));
          $pass_sql = "SELECT * FROM user_details WHERE user_name="."'".$_POST['user_name']."'"." AND user_password=". "'".$password."'";
          $pass_result = mysqli_query($con, $pass_sql) or die("Couldn't execute query for getting the password.");
          $num_available = mysqli_num_rows($pass_result);

          if ($num_available > 0) { // Password did match
                $_SESSION = $user_array;
                $user_name = $_POST['user_name'];
                $_SESSION['user_name'] = $user_name;
                $_SESSION['full_name'] = $full_name;
                $_SESSION['auth'] = 'yes';

                $today_date = date('y-m-d h:i:s');
                $today_date_log = date('y-m-d');
                $log_id = create_id($today_date, "log");
                $_SESSION['log_id'] = $log_id;
                $_SESSION['login_time'] = time();

                // Create an array with the variables available
                $log_array = array('login_id'=>$log_id, 'user_name'=>$user_name, 'login_date_time'=>$today_date);
                // Update login Details
                $result = $db->add_new($con, $log_array, 'login_details');

                $db->close_connection($con);
                header("Location: index.php");
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
