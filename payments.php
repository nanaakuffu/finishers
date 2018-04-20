<?php
  /* Script name: add student scores */
  session_start();

  require_once "db_functions.php";
  // require_once "public_vars.php";
  require_once "public_functions.php";

  if (!isset($_POST['add_payment'])) {
    include_once "payment_form.php";
    exit();
  } else {
    // echo "<pre>", var_dump($_POST), "</pre>";
    // echo strtotime($_POST['poDate']), "<br />";
    // echo Date('Y-m-d', strtotime($_POST['poDate']));
      $errors = [];

      foreach($_POST as $field=>$value) {
         /* Checking for empty data */
         if (!empty($_POST[$field])) {
           /* Checking for invalid and empty data */
         }
       }
      //  Extracting and displaying all the errors collected
       if ( @sizeof($errors) > 0) {
          $error_message = "";
          foreach($errors as $field => $value) {
            $error_message .= "<li><i class='fa-li fa fa-check-square'></i>".$value." Please try again </li>";
          }
          $_SESSION['message'] = $error_message;
          if (isset($_SESSION['update_payment'])) {
            $_SESSION['pmtID'] = $_POST['pmtID'];
          }
          include_once "payment_form.php";
          exit();
        } else {
          /* If the code gets here, it means the data is really clean */
          $db = new Database();

          $con = $db->connect_to_db();

          // This is an array that holds the keys of the wanted field names
          $field_names_array = $db->get_field_names($con, "tblpaymenttracker");


          switch ($_POST['add_payment']) {
            // Actually save the data from the form.
            case 'Add Order Payment':

              $receipt_no = $_POST['poReceiptNo'];
              // Reset the date for the database format
              $_POST['pmtID'] = create_id(date('y-m-d'), "pmtID");

              /* Remove unwanted field names that came from the form */
              $_POST = filter_array($_POST, $field_names_array);

              $_POST = secure_data_array($_POST);

              // Check data redundancy
              $fields = array('poID', 'pmtAmount', 'pmtType', 'pmtBalance');
              $criteria = filter_array($_POST, $fields);
              $data_checked = $db->multiple_data_exists($con, "tblpaymenttracker", $fields, $criteria);

              if (!$data_checked) {
                  // Add new data
                  $save_data = $db->add_new($con, $_POST, "tblpaymenttracker");

                  if ($save_data) {
                    // Add user acitivty
                    $add_activity = $db->add_activity($con, 'login_activity', $_SESSION['user_name'], 'Added a new payment of '.$_POST['pmtAmount']. ' with receipt number '.$receipt_no);
                    include_once 'payment_form.php';
                  }
              } else {
                  $_SESSION['message'] = "The data you are trying to add already exists!";
                  // $_SESSION['id'] = $exam_id;
                  include_once "payment_form.php";
              }
              break;

            case 'Update Payment':
              // Reset the date for the database format
              // if ($_POST['pmtType'] == 'Cheque') {
              //   $_POST['pmtType'] = 'Cheque : '.$_POST['cheque_no'];
              // }
              $receipt_no = $_POST['poReceiptNo'];

              /* Removes unwanted field names that came from the form */
              $_POST = filter_array($_POST, $field_names_array);

              $_POST = secure_data_array($_POST);

              // Update the data
              $save_data = $db->update_data($con, $_POST, "tblpaymenttracker", "pmtID", $_POST['pmtID']);

              // Add user acitivty
              $add_activity = $db->add_activity($con, 'login_activity', $_SESSION['user_name'], 'Updated a payment with receipt number '.$receipt_no);

              unset($_SESSION['update_payment']);
              unset($_SESSION['poid']);
              header("Location: display_payments.php");
              break;

            // case 'Add Cheque Details':
            //
            //   break;

            default:

              $receipt_no = $_POST['poReceiptNo'];
              $delete_data = $db->delete_data($con, "tblpaymenttracker", "pmtID", $_POST['pmtID']);

              // Add user acitivty
              $add_activity = $db->add_activity($con, 'login_activity', $_SESSION['user_name'], 'Deleted an order with receipt number '.$receipt_no);

              if ($delete_data) {
                header("Location: display_payments.php");
              } else {
                echo DELETE_ERROR;
              }
              break;
          }

         // Closing the database
         $db->close_connection($con);
        }
  }

?>
