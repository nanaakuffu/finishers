<?php
  require_once 'public_functions.php';
  require_once "db_functions.php";

  $db = new Database();
  $con = $db->connect_to_db();

  $id = mysqli_real_escape_string($con, $_GET['choice']);

  $starting_value = substr($id, 0, 2);

  switch ($starting_value) {
    case 'it':
      $po_id = $db->get_id($con, 'tblpurchaseorderitems', 'poID', 'itemID', $id);
      // deleting an item
      $db->delete_data($con, 'tblpurchaseorderitems', 'itemID', $id);
      break;

    case 'po':
      // Deleting a purchase order
      $db->delete_data($con, 'tblpurchaseorderitems', 'poID', $id);
      $db->delete_data($con, "tblpurchaseordertracker", "poID", $id);
      break;

    case 'pm':
      $po_id = $db->get_id($con, 'tblpurchaseordertracker', 'poID', 'itemID', $id);
      // Deleting a payment
      $db->delete_data($con, "tblpaymenttracker", "pmtID", $id);
      break;

    default:
      # code...
      break;
  }

  $id_type = explode("_", $id)[0];
  $po_id = encrypt_data($po_id);

  if (!is_null($po_id)) {
    echo json_encode(array('id_type' => $id_type, 'po_id' => $po_id));
  } else {
    echo json_encode(array('id_type' => $id_type));
  }

  $db->close_connection($con);

?>
