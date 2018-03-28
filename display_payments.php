<?php
  session_start();

  require_once("db_functions.php");
  require_once("public_functions.php");

  login_check();

  $db = new Database();

  $con = $db->connect_to_db();

  $fields = array('pmtID', 'poID', 'pmtAmount', 'pmtType', 'pmtBalance');
  $history_array = array('pmtID', 'Order ID', 'Payment Amount', 'Payment Type', 'Balance');
  $summary_array = array('Order ID', 'Receipt Number', 'Order Cost', 'Amount Paid', 'Balance');

  base_header('Display Payments');
  create_header();

  // $active_users = $db->get_active_users($con);
  $summary = $db->get_payment_summary($con);
  $history = $db->display_data($con, "tblpaymenttracker", $fields, "poID");
?>
<br />
<div class="container topstart">
  <!-- <h2>Dynamic Tabs</h2>
  <p>To make the tabs toggleable, add the data-toggle="tab" attribute to each link. Then add a .tab-pane class with a unique ID for every tab and wrap them inside a div element with class .tab-content.</p> -->

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#summary">Payment Summary</a></li>
    <li><a data-toggle="tab" href="#history">Payment History</a></li>
  </ul>

  <div class="tab-content">
    <div id="summary" class="tab-pane fade in active">
      <br />
      <h3>Payment Summary</h3>
      <br />
      <div class='table-responsive'>
        <table id='d_payment' class='table table-hover' cellpadding='8' cellspacing='10'>
          <thead>
           <tr class='w3-blue'>
             <?php
               $heads = "";
               foreach ($summary_array as $key => $value) {
                  $heads .= "<th>".$value."</th>";
               }
               echo $heads;
             ?>
           </tr>
          </thead>
          <tbody>
           <?php
             if (sizeof($summary) != 0) {
               foreach ($summary as $key => $records) {
                 echo "<tr>";
                 foreach ($records as $rckey => $rvalue) {
                   echo "<td >", $rvalue, "</td>";
                 }
                 echo "</tr>";
               }
             }
          ?>
        </tbody>
      </table>
     </div>
    </div>

    <div id="history" class="tab-pane fade">
      <br />
      <div class='table-responsive'>
        <table id='d_order' class='table table-hover' cellpadding='8' cellspacing='10'>
          <thead>
           <tr class='w3-blue'>
             <?php
               $headers = "";
               foreach ($history_array as $key => $value) {
                 if ($value != 'pmtID') {
                   $headers .= "<th>".$value."</th>";
                 }
               }
               echo $headers;
             ?>
           </tr>
          </thead>
          <tbody>
           <?php
             if (sizeof($history) != 0) {
               foreach ($history as $key => $record) {
                 echo "<tr>";
                 foreach ($record as $rkey => $value) {
                   if ($rkey != 'pmtID') {
                     $pmtid = encrypt_data($record['pmtID']);
                     echo "<td ><a href=payment_form.php?pmtid={$pmtid}&up_pays=1>", $value, "</a></td>";
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
  </div>
</div>

<?php
  create_footer();
?>
