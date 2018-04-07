<?php
  require_once 'public_functions.php';
  require_once "db_functions.php";

  $db = new Database();
  $con = $db->connect_to_db();

  $id = mysqli_real_escape_string($con, $_GET['choice']);

  $starting_value = substr($id, 0, 2);

  switch ($starting_value) {
    case 'it':
      // deleting an item
      $db->delete_data($con, 'tblpurchaseorderitems', 'itemID', $id);
      break;

    case 'po':
      // Deleting a purchase order
      $db->delete_data($con, 'tblpurchaseorderitems', 'poID', $id);
      $db->delete_data($con, "tblpurchaseordertracker", "poID", $id);
      break;

    case 'pm':
      // Deleting a payment
      $db->delete_data($con, "tblpaymenttracker", "pmtID", $id);
      break;

    default:
      # code...
      break;
  }

  // echo json_encode(array('receipt_no' => $new_data['poReceiptNo'],
  //                        'amount' => $new_data['poAmount'],
  //                        'amtpaid' => $new_data['amtPaid'] ));

  $db->close_connection($con);

?>
