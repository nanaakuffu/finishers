<?php
  /* Script name: add student scores */
  session_start();

  require_once "db_functions.php";
  require_once "public_vars.php";
  require_once "public_functions.php";

  // echo "<pre>", print_r($_POST) ,"</pre>";
  if (!isset($_POST['add_item'])) {
    include_once "item_form.php";
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
          if (isset($_SESSION['update_item'])) {
            $_SESSION['itemID'] = $_POST['itemID'];
          }
          include_once "item_form.php";
          exit();
        } else {
          /* If the code gets here, it means the data is really clean */
          $db = new Database();
          $con = $db->connect_to_db();

          // This is an array that holds the keys of the wanted field names
          $field_names_array = $db->get_field_names($con, "tblpurchaseorderitems");

          switch ($_POST['add_item']) {
            // Actually save the data from the form.
            case 'Add Purchase Item':

              // Reset the date for the database format
              $_POST['itemID'] = create_id(date('y-m-d'), 'itemID');

              /* Remove unwanted field names that came from the form  and secure data*/
              $_POST = filter_array($_POST, $field_names_array);
              $_POST = secure_data_array($_POST);

              // Actually save the data in the database
              $save_data = $db->add_new($con, $_POST, "tblpurchaseorderitems");

              if ($save_data) {
                // Update the order amount
                $update_amount = $db->update_order_amount($con, $_POST['poID']);

                // Add user acitivty
                $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Added '. $_POST['itemDescription'].' item for the order '.$_POST['poID']);

                // Raise a flag to keep showing the items being ordered
                $_POST['_items'] = 'Adding';
                include_once 'item_form.php';
              }
              break;

            case 'Update Item':
              // Reset the date for the database format

              /* Removes unwanted field names that came from the form and secure data*/
              $_POST = filter_array($_POST, $field_names_array);
              $_POST = secure_data_array($_POST);

              // Update the data
              $save_data = $db->update_data($con, $_POST, "tblpurchaseorderitems", "itemID", $_POST['itemID']);

              // Update the order amount
              $update_amount = $db->update_order_amount($con, $_POST['poID']);
              // Add user acitivty
              $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Updated an item with order ID '.$_POST['poID']);

              unset($_SESSION['update_item']);
              unset($_SESSION['itemID']);
              $po_id = encrypt_data($_POST['poID']);
              header("Location: purchase_form.php?po_id={$po_id}&up_order=1");
              // include_once "";
              break;

            default:
              $delete_data = $db->delete_data($con, "tblpurchaseorderitems", "itemID", $_POST['itemID']);

              // Add user acitivty
              $update_amount = $db->update_order_amount($con, $_POST['poID']);
              // Add user acitivty
              $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Deleted an item with ID '.$_POST['itemID']);

              if ($delete_data) {
                $po_id = encrypt_data($_POST['poID']);
                header("Location: purchase_form.php?po_id={$po_id}&up_order=1");
                // header("Location: display_items.php");
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
