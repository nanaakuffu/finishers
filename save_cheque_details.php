<?php

  require_once 'db_functions.php';
  require_once 'public_functions.php';

  $db = new Database();

  $con = $db->connect_to_db();

  // This is an array that holds the keys of the wanted field names
  $field_names_array = $db->get_field_names($con, "tblchequepayment");
  $_POST['chqDate'] = Date("Y-m-d", strtotime($_POST['chqDate']));

  /* Remove unwanted field names that came from the form */
  $_POST = filter_array($_POST, $field_names_array);

  $_POST = secure_data_array($_POST);

  // Check data redundancy
  $fields = array('chqNumber', 'chqBank', 'chqDate');
  $criteria = filter_array($_POST, $fields);
  $data_cheque = $db->multiple_data_exists($con, "tblchequepayment", $fields, $criteria);

  if (!$data_cheque) {
      // Add new data
      $save_cheque = $db->add_new($con, $_POST, "tblchequepayment");

      if ($save_cheque) {
        // Add user acitivty
        $add_activity = $db->add_activity($con, $_SESSION['user_name'], 'Added a new payment of '.$_POST['pmtAmount']. ' with receipt number '.$receipt_no);
        // include_once 'payment_form.php';

        echo json_encode(['success'=>'Cheque details added successfully.']);
        // echo json_encode(array('chqID' => $_POST['chqID']));
      }
  } else {
      $_SESSION['message'] = "The data you are trying to add already exists!";
      // $_SESSION['id'] = $exam_id;
      // include_once "payment_form.php";
  }
?>
