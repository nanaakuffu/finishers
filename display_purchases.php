<?php
    session_start();

    require_once("db_functions.php");
    require_once("public_functions.php");

    login_check();

    $db = new Database();

    $con = $db->connect_to_db();

    $fields = array('poID', 'PoQuantity', 'poAmount', 'poReceiptNo', 'poType', 'poDescription');

    base_header('Purchase Orders');
    create_header();

    // $active_users = $db->get_active_users($con);

    $records = $db->display_data($con, "tblpurchaseordertracker", $fields, "poQuantity");
?>
  <br />
  <div class='container topstart'>
    <div class='table-responsive'>
      <table id='d_order' class='table table-hover' cellpadding='8' cellspacing='10'>
        <thead>
         <tr class='w3-blue'>
           <?php
             $headers = "";
             foreach ($fields as $key => $value) {
               if ($value != 'poID') {
                 // Remove the 'po' from the table names
                 $value = substr(get_column_name($value), 2, strlen($value) - 2);
                 $headers .= "<th>".$value."</th>";
               }
             }
             echo $headers;
           ?>
         </tr>
        </thead>
        <tbody>
         <?php
           if (sizeof($records) != 0) {
             foreach ($records as $key => $record) {
               echo "<tr>";
               foreach ($record as $rkey => $value) {
                 if ($rkey != 'poID') {
                   $po_id = encrypt_data($record['poID']);
                   // $up_3 = encrypt_data('1');
                   echo "<td ><a href=purchase_form.php?po_id={$po_id}&up_orders=1>", $value, "</a></td>";
                 }
               }
               echo "</tr>";
             }
           }
        ?>
      </tbody>
    </table>
   </div>
  </div>

<?php
    create_footer();
?>
