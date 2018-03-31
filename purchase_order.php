<?php
  /* Script name: add student scores */
  session_start();

  require_once "db_functions.php";
  require_once "public_vars.php";
  require_once "public_functions.php";

  if (!isset($_POST['add_order'])) {
    include_once "purchase_form.php";
    exit();
  } else {
      // Check for errors in the data submitted!
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
          if (isset($_SESSION['update_order'])) {
            $_SESSION['poID'] = $_POST['poID'];
          }
          include_once "purchase_form.php";
          exit();
        } else {
          /* If the code gets here, it means the data is really clean */
          $db = new Database();

          $con = $db->connect_to_db();

          // This is an array that holds the keys of the wanted field names
          $field_names_array = $db->get_field_names($con, "tblpurchaseordertracker");

          switch ($_POST['add_order']) {
            // Actually save the data from the form.
            case 'Add Purchase Order':

              // Reset the date for the database format
              $_POST['poDate'] = Date("Y-m-d", strtotime($_POST['poDate']));
              $_POST['poID'] = create_id(date('y-m-d'), 'poID');
              // $_SESSION['poID'] = $_POST['poID'];

              /* Remove unwanted field names that came from the form */
              $_POST = filter_array($_POST, $field_names_array);

              $_POST = secure_data_array($_POST);

              // Check data redundancy
              // $fields = array('poQuantity', 'poUnitCost', 'poDate', 'poReceiptNo');
              // $criteria = filter_array($_POST, $fields);
              // $data_checked = $db->multiple_data_exists($con, "tblpurchaseordertracker", $fields, $criteria);
              // echo "<pre>", print_r($_POST), "</pre>";
              // if (!$data_checked) {
                  // Add new data
              $save_data = $db->add_new($con, $_POST, "tblpurchaseordertracker");

              if ($save_data) {
                // Add user acitivty
                $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Added a new order totalling '.$_POST['poAmount']);
                include_once 'item_purchase.php';
              }
              // } else {
              //     $_SESSION['message'] = "The data you are trying to add already exists!";
              //     // $_SESSION['id'] = $exam_id;
              //     include_once "purchase_form.php";
              // }
              break;

            case 'Update Order':
              // Reset the date for the database format
              $_POST['poDate'] = Date("Y-m-d", strtotime($_POST['poDate']));

              /* Removes unwanted field names that came from the form */
              $_POST = filter_array($_POST, $field_names_array);

              $_POST = secure_data_array($_POST);

              // Update the data
              $save_data = $db->update_data($con, $_POST, "tblpurchaseordertracker", "poID", $_POST['poID']);

              // Add user acitivty
              $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Updated an order with receipt number '.$_POST['poReceiptNo']);

              unset($_SESSION['update_order']);
              unset($_SESSION['poid']);
              header("Location: display_purchases.php");
              break;

            default:
              $delete_data = $db->delete_data($con, "tblpurchaseordertracker", "poid", $_POST['poID']);
              $item_data = $db->delete_data($con, 'tblpurchaseorderitems', 'poid', $_POST['poID']);

              // Add user acitivty
              $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Deleted an order with receipt number '.$_POST['poReceiptNo']);

              if ($delete_data) {
                header("Location: display_purchases.php");
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
