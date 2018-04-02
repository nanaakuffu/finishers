<?php
  require_once "db_functions.php";

  $db = new Database();
  $con = $db->connect_to_db();

  $id = mysqli_real_escape_string($con, $_GET['id']);
  $query = "SELECT poReceiptNo, poAmount, SUM(tblpaymenttracker.pmtAmount) AS amtPaid
            FROM tblpurchaseordertracker, tblpaymenttracker
            WHERE tblpurchaseordertracker.poID='".$id."'
            AND tblpaymenttracker.poID='".$id."'";

  $result = mysqli_query($con, $query);
  $record_count = mysqli_num_rows($result);

  if ($record_count > 0 ){
      while ($row = mysqli_fetch_assoc($result)) {
          $data[] = $row;
      }
      foreach ($data as $value) {
        foreach ($value as $key => $new_value) {
          $new_data[$key] = $new_value;
        }
      }
      if ($new_data['amtPaid'] == NULL) {
        $new_data['amtPaid'] = '0.00';
      }
  } else {
    echo "";
  }

  echo json_encode(array('receipt_no' => $new_data['poReceiptNo'],
                         'amount' => $new_data['poAmount'],
                         'amtpaid' => $new_data['amtPaid'] ));

  $db->close_connection($con);

?>
