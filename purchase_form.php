<?php
  if (isset($_GET['up_order'])) {
    session_start();
  }

  unset($_SESSION['update_order']);

  require_once 'public_functions.php';
  require_once 'db_functions.php';

  login_check();

  base_header("Purchase Order");
  create_header();

  $db = new Database();
  $con = $db->connect_to_db();

  $fields = array('itemID', 'itemDescription', 'itemType', 'itemUnit', 'itemQuantity', 'itemUnitPrice', 'itemCost');
  $fields_history = array('pmtID', 'poID', 'pmtAmount', 'pmtType', 'chqID', 'pmtBalance');
  $history_array = array('Payment ID', 'Amount Paid', 'Payment Type', 'Cheque ID', 'Balance');
  $summary_array = array('Order ID', 'Receipt Number', 'Order Cost', 'Amount Paid', 'Balance');

  if (isset($_GET['po_id'])) {
    $po_id = decrypt_data($_GET['po_id']);
    $_POST = $db->view_data($con, "tblpurchaseordertracker", "poID", $po_id );
    $_POST['add_order'] = 'Update Order';
    $_SESSION['update_order'] = TRUE;

    $records = $db->display_specific_data($con, "tblpurchaseorderitems", $fields, "poID", $po_id, "poID");
    // $records_summary = $db->display_specific_data($con, "tblpurchaseorderitems", $fields, "poID", $po_id, "poID");
    $summary = $db->get_payment_summary($con, $po_id);
    $history = $db->display_specific_data($con, "tblpaymenttracker", $fields_history, "poID", $po_id, "poID");
    $payments = $db->get_order_payments($con, $po_id);

    $disable_control = (!is_null($payments)) ? 'disabled' : 'required';
  }

  if (isset($_SESSION['po_id'])) {
    $po_id = $_SESSION['po_id'];
    $_SESSION['update_order'] = TRUE;
  }

  $station_array = $db->create_data_array($con, "tblpurchaseordertracker", "poStation", TRUE, TRUE);
  // echo "<pre>", var_dump($station_array), "</pre>";
  $amount = (isset($_POST['add_order'])) ? $_POST['poAmount'] : '' ;
  $receipt_no = (isset($_POST['add_order'])) ? $_POST['poReceiptNo'] : '' ;
  $station = (isset($_POST['add_order'])) ? $_POST['poStation'] : $station_array[0] ;
  $date = (isset($_POST['add_order'])) ? date("F-j-Y", strtotime($_POST['poDate'])) : date("F-j-Y");


?>
  <br />
  <div class='container topstart'>
    <?php
      if (isset($_SESSION['message'])) {
        echo "<div class='panel panel-default'>
                <div class='panel-heading'>Input Error(s)</div>
                <div class='panel-body'><ul class='fa-ul'>", $_SESSION['message'], "</ul></div>
              </div>";
        unset($_SESSION['message']);
      }
    if ( !isset($_GET['po_id'])) { ?>
      <div class='w3-container w3-blue'>
          <h3> Add Purchase Order </h3>
      </div>
      <form class='w3-form w3-border w3-round' action='purchase_order.php' method='POST' id='poForm'>
        <div class='row'>
          <div class='col-sm-3'>
            <div class='form-group'>
              <label class='bitterlabel' for='date'>Purchase Date: </label> <br />
              <div class='input-group date' id='form_datetime'>
                <input class='form-control' type='text' name='poDate' value='<?php echo $date; ?>' readonly>
                <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-calendar'></span>
                </span>
              </div>
            </div>

            <div class='form-group'>
              <label class='bitterlabel' for='receiptno'> Receipt Number: </label>
              <input class='form-control' type='text' name='poReceiptNo' value=''
                     placeholder='Receipt Number' required>
            </div>
          </div>

          <div class='col-sm-5'>
            <div class='form-group'>
              <label class='bitterlabel' for='amount'> Amount: </label>
              <input class='form-control' type='text' name='poAmount' id='amount'
                  onfocus='calculate_amount(quantity, unitcost, amount)'
                  value='' placeholder='0.00' readonly>
            </div>
            <div class='form-group'>
              <label class='bitterlabel' for='station'> Station: </label>
              <select class='form-control' name='poStation' id='poStation' required>
                <?php select_data($station_array, $station); ?>
              </select>
            </div>
          </div>

          <div class='col-sm-4'>
            <div class='form-group'>
              <label class='bitterlabel'> Control </label><br />
              <input class='btn btn-primary btn-block' type='submit' name='add_order'
              value='Add Purchase Order'>
            </div>
          </div>
        </div>
      </form>
    <?php } else { ?>
      <!-- Purchase Order Update form -->
      <div class="row">
        <div class="col-sm-4">
          <div class='w3-container w3-blue'>
              <h3> Update Purchase Order </h3>
          </div>
          <form class='w3-form w3-border w3-round' action='purchase_order.php' method='POST' id='poForm'>
            <?php
              if (isset($_SESSION['update_order'])) {
                 echo "<input type='hidden' name='poID' id='pID' value='{$po_id}'>";
              }
            ?>
            <div class='form-group'>
              <label class='bitterlabel' for='date'>Purchase Date: </label> <br />
              <div class='input-group date' id='form_datetime'>
                <input class='form-control' type='text' name='poDate' value='<?php echo $date; ?>' readonly>
                <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-calendar'></span>
                </span>
              </div>
            </div>

            <div class='form-group'>
              <label class='bitterlabel' for='receiptno'> Receipt Number: </label>
              <input class='form-control' type='text' name='poReceiptNo' value='<?php echo $receipt_no; ?>'
                     placeholder='Receipt Number' >
            </div>

            <div class='form-group'>
              <label class='bitterlabel' for='amount'> Amount: </label>
              <input class='form-control' type='text' name='poAmount' id='amount'
                  onfocus='calculate_amount(quantity, unitcost, amount)'
                  value='<?php echo $amount; ?>' placeholder='0.00' readonly>
            </div>

            <div class='form-group'>
              <label class='bitterlabel' for='station'> Company or Station: </label>
              <select class='form-control' name='poStation' id='poStation' required>
                <?php select_data($station_array, $station); ?>
              </select>
            </div>
            <?php
            if ($_SESSION['is_admin']) {
              echo "<div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <input class='btn btn-primary btn-block' type='submit' name='add_order' value='Update Order'>
                      <a class='btn btn-primary btn-block' data-toggle='modal'
                        data-target='#DeleteModal' id='modalButton' $disable_control>Delete Order</a>
                      <a class='btn btn-primary btn-block' href='display_purchases.php'>Back</a>
                    </div>";
            } else {
              echo "<div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                        <input class='btn btn-primary btn-block' type='submit' name='add_order' value='Update Order'>
                        <a class='btn btn-primary btn-block' href='display_purchases.php'>Back</a>
                    </div>";
            }
            ?>
          </form>
          <br />
        </div>
        <!-- Item Purchased view -->
        <div class="col-sm-8">
          <div class='w3-container w3-blue'>
              <h3> Items Ordered with ID <?php echo $po_id; ?> </h3>
          </div>
          <div class='table-responsive'>
            <table id='d_items' class='table table-hover' cellpadding='8' cellspacing='10'>
              <thead>
               <tr class='w3-blue'>
                 <?php
                   $headers = "";
                   foreach ($fields as $key => $value) {
                     if ($value != 'itemID') {
                       // Remove the 'item' from the table names
                       $value = substr(get_column_name($value), 4, strlen($value) - 2);
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
                        $itemID = encrypt_data($record['itemID']);
                        if ($rkey != 'itemID') {
                          echo "<td ><a href=item_form.php?itemID={$itemID}&up_item=1>", $value, "</a></td>";
                        }
                     }
                     echo "</tr>";
                   }
                 }
              ?>
            </tbody>
          </table>
        </div>
        <br />
        <?php if (sizeof($records) == 0) { ?>
          <div class='form-group'>
            <a class='btn btn-primary' href='item_form.php?po_id=<?php echo encrypt_data($po_id);?>&up_item=1'>Add Purchase Order</a>
          </div>
        <?php } else { ?>
          <!-- Payment Diaplsy View -->
          <br />
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#summary">Payment Summary</a></li>
            <li><a data-toggle="tab" href="#history">Payment History</a></li>
          </ul>

          <div class="tab-content">
            <div id="summary" class="tab-pane fade in active">
              <br />
              <div class='table-responsive'>
                <table class='table table-hover' cellpadding='8' cellspacing='10'>
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
                <table id='d_payment' class='table table-hover' cellpadding='8' cellspacing='10'>
                  <thead>
                   <tr class='w3-blue'>
                     <?php
                       $headers = "";
                       foreach ($history_array as $key => $value) {
                         // if ($value != 'pmtID') {
                           $headers .= "<th>".$value."</th>";
                         // }
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
                           if ($rkey != 'poID') {
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
        <?php } ?>
      <?php } ?>

      <!-- Beginning of Delete Modal -->
      <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel">
    	  <div class="modal-dialog" role="document">
    	    <div class="modal-content">
    	      <div class="modal-header">
    	        <h3 class="modal-title" id="DeleteModalLabel">Delete Data</h3>
    	      </div>

    	      <div class="modal-body">
  	          <div class="box-body pad">
            	  <h5>Are you sure you want to delete this data? </h5>
  	          </div>
    	      </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-primary" onclick="delete_unique_data(pID);"> Yes </button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"> No </button>
            </div>

    	    </div>
    	  </div>
    	 </div>
       <!-- End of Delete Modal -->
  </div>
<?php
  unset($_SESSION['id']); // Unset the id
  create_footer();
?>
<script type='text/javascript'>
  $(function () {
    $('#d_order').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': true,
			'ordering': true,
			'info': true,
			'autoWidth': true
		});
    $('#d_items').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': false,
			'ordering': true,
			'info': true,
			'autoWidth': true
		});
    $('#form_datetime').datepicker({
      format: 'MM-dd-yyyy',
      autoclose: true
    });
    $('#poStation').editableSelect({
      filter: false,
      effects: 'fade'
    });
    $('#poStation_2').editableSelect({
      filter: false,
      effects: 'fade'
    });
  });
</script>
</body>
</html>
