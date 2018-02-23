<?php
  /* Script name: users_page */
  session_start();

  require_once "db_functions.php";
  require_once "public_vars.php";
  require_once "public_functions.php";

  if(!isset($_POST['submit'])) {
    include_once "users_page.php";
    exit();
  } else {
      $errors = [];

      foreach($_POST as $field => $value) {
         /* Checking for invalid and empty data */
         $value = trim($value);
         if (preg_match("/user_name/i", $field)) {
           if (!ereg("^[A-Za-z0-9].*", $value)) {
             $errors[] = "<b>$value</b> is not a valid user name.,";
           }
         }
         if ( preg_match("/name/i", $field)) {
           if (!ereg("^[A-Za-z\-].*", $value )) {
             $errors[] = "$value is not a valid name.";
           }
         }
         if (preg_match("/password/i", $field)) {
           if (strlen($value) < 8 ) {
             $errors[] = "Password must be 8 characters or more.,";
           }
         }
       }
      //  Extracting and sisplaying all the errors collected
       if ( @sizeof($errors) > 0) {
          $error_message = "";
          foreach($errors as $field => $value) {
            $error_message .= "<li><i class='fa-li fa fa-check-square'></i>".$value." Please try again </li>";
          }
          $_SESSION['message'] = $error_message;

          if (isset($_SESSION['update_user'])) {
            $_SESSION['id'] = $_POST['user_name'];
          }

          include_once "users_page.php";
          exit();
        } else {

          /* If the code gets here, it means the data is really clean */
          $db = new Database();
          $con = $db->connect_to_db();

          // This is an array that holds the keys of the wanted field names
          $field_names_array = $db->get_field_names($con, "user_details");
          $today_date = date('y-m-d');
          $user_name = 'Admin'; //$_SESSION['user_name'];

          switch ($_POST['submit']) {

            case "Add New User":
              $full_name = $_POST['first_name']." ".$_POST['middle_name']." ".$_POST['last_name'];
              $_POST['user_password'] = encryption($_POST['user_password'], $full_name);
              $_POST['added_by'] = $user_name; //$_SESSION['full_name'];
              $_POST['date_added'] = date('y-m-d h:m:s');

              /* Removes unwanted field names that came from the form */
              $_POST = filter_array($_POST, $field_names_array);

              if (!$db->data_exists($con, "user_details", "user_name", $_POST['user_name'])) {
                // Actually save the data
                $_POST = secure_data_array($_POST);
                $save_data = $db->add_new($con, $_POST, "user_details");

                if ($save_data) {
                  // Add user acitivty
                  $activity_id = create_id($today_date, 'act_id');
                  $activity = 'Added a new user: '.$_POST['user_name'];
                  $date_time = date('y-m-d h:m:S');
                  $_ACT = array('activity_id' => $activity_id, 'user_name' => $user_name,
                          'activity_details' => $activity, 'activity_date_time' => $date_time);
                  $_ACT = secure_data_array($_ACT);
                  $add_activity = $db->add_activity($con, $_ACT, 'login_activity');

                  // If saving was possible try to set the access level
                  $_SESSION['new_user'] = $_POST['user_name'];
                  include_once 'user_query.php';
                } else {
                  $_SESSION['message'] = "<li><i class='fa-li fa fa-check-square'></i> ".SAVE_ERROR."</li>"; // Saving was not possible
                  include_once "users_page.php";
                }
              } else {
                $_SESSION['message'] = "<li><i class='fa-li fa fa-check-square'></i> User Name already exists </li>";
                include_once "users_page.php";
              }
              break;

            case 'Update User Details':
              // Encyprt the password being sent to the databse
              $full_name = $_POST['first_name']." ".$_POST['middle_name']." ".$_POST['last_name'];
              $_POST['user_password'] = encryption($_POST['user_password'], $full_name);
              $_POST['edited_by'] = $_POST['user_name'];
              $_POST['date_edited'] = date('y-m-d h:m:s');
              $_SESSION['full_name'] = $full_name;

              /* Removes unwanted field names that came from the form */
              $_POST = filter_array($_POST, $field_names_array);
              // Secure data
              $_POST = secure_data_array($_POST);
              // Update the data
              $save_data = $db->update_data($con, $_POST, "user_details", "user_name", $_POST['user_name']);

              // Add user acitivty
              $activity_id = create_id($today_date, 'act_id');
              $activity = 'Updated your account details';
              $date_time = date('y-m-d h:m:S');
              $_ACT = array('activity_id' => $activity_id, 'user_name' => $user_name,
                      'activity_details' => $activity, 'activity_date_time' => $date_time);
              $_ACT = secure_data_array($_ACT);
              $add_activity = $db->add_activity($con, $_ACT, 'login_activity');

              unset($_SESSION['update_user']);
              unset($_SESSION['id']);

              header("Location: index.php");
              break;

            default:
              # code...
              break;
          }

          // CLosing the database
          $db->close_connection($con);
        }
  }

?>
