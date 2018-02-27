<?php
    session_start();

    require_once("db_functions.php");
    require_once("public_functions.php");

    if (isset($_POST['verify'])) {
        // Connect to database and get user access levels as he/she logs in
        $db = new Database();
        $con = $db->connect_to_db();

        $login_sql = "SELECT * FROM login_security WHERE user_name = "."'".$_POST['user_name']."'";

        $result = mysqli_query($con, $login_sql) or die("Couldn't execute query for login security.");
        $num = mysqli_num_rows($result);

        if ($num > 0) {   // user name was found
          while($record = mysqli_fetch_assoc($result)){
            $rows[] = $record;
          }
          if ($_POST['security_question'] == $rows[0]['security_question']) {
            if ($_POST['answer'] == decrypt_data($rows[0]['answer'])) {

              $user_sql = "SELECT user_password, first_name, middle_name, last_name FROM user_details WHERE user_name = "."'".$_POST['user_name']."'";
              $user_result = mysqli_query($con, $user_sql) or die("Couldn't execute query for getting user.");
              while($record = mysqli_fetch_assoc($user_result)){
                $user[] = $record;
              }

              $full_name = $user[0]['first_name']." ".$user[0]['first_name']." ".$user[0]['last_name'];
              $password = decryption($user[0]['user_password'], $full_name);

              // Add user activity
              $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'System was able to succesfully verify you as the user with the name: ' $_SESSION['user_name']);

              $db->close_connection($con);
              $message = "<i class='fa fa-check-square-o'></i> Your answer has been verified. Your password is <b>$password</b> Please
                        click <a href='login_page.php'> HERE </a> to login.";
              $_SESSION['message'] = $message;
              include_once 'forgotten_pass.php';
              exit();

            } else {
              // Add user activity
              $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'System was not able to succesfully verify due to an incorrect answer to the security question.');
              $db->close_connection($con);
              $message = "<i class='fa fa-fw fa-close'></i> Your answer and question does not match. Please
                        try again.";
              $_SESSION['message'] = $message;
              include_once 'forgotten_pass.php';
              exit();
            }
          } else {
            // Add user activity
            $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'System was not able to succesfully verify due to an incorrect answer to the security question.');
            $db->close_connection($con);
            $message = "<i class='fa fa-fw fa-close'></i> Your question does not match your user name.
                        Please try again.";
            $_SESSION['message'] = $message;
            include_once 'reset_login.php';
            exit();
          }
        } else {
          $db->close_connection($con);
          $message = "<i class='fa fa-fw fa-close'></i> You may not have updated your security credentials. Please contact the system Administrator.";
          $_SESSION['message'] = $message;
          include_once 'forgotten_pass.php';
          exit();
        }
    } else {
      include 'forgotten_pass.php';
      exit();
    }
?>
