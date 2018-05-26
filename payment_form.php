<?php
  if (isset($_GET['up_pays'])) {
    session_start();
  }

  unset($_SESSION['update_payment']);

  require_once 'public_functions.php';
  require_once 'db_functions.php';

  login_check();

  base_header("Track Order Payments");
  create_header();

  $db = new Database();
  $con = $db->connect_to_db();

  if (isset($_GET['pmtid'])) {
    $payment_id = decrypt_data($_GET['pmtid']);
    $_POST = $db->view_data($con, "tblpaymenttracker", "pmtID", $payment_id );
    $_chqDetails = $db->view_data($con, 'tblchequepayment', 'chqID', $_POST['chqID']);
    $_POST['add_payment'] = 'Update Payment';
    $_SESSION['update_payment'] = TRUE;
  }

  if (isset($_SESSION['pmtID'])) {
    $payment_id = $_SESSION['pmtID'];
    $_SESSION['update_payment'] = TRUE;
  }

  $receipt_no = (isset($_SESSION['update_payment'])) ? $db->get_receipt_no($con, $_POST['poID']) : '';
  $payments = (isset($_POST['add_payment'])) ? $db->get_order_payments($con, $_POST['poID']) : '';
  $order_amount = (isset($_POST['add_payment'])) ? $db->get_order_amount($con, $_POST['poID']) : '' ;


  $order_array = $db->create_data_array($con, 'tblpurchaseordertracker', 'poID');
  $order_array['default'] = 'Select order ID ...';
  $type_array = array('Cash', 'Cheque');
  $cheque = array();

  $order_id = (isset($_POST['add_payment'])) ? $_POST['poID'] : $order_array['default'] ;
  $po_id = encrypt_data($order_id);
  $amount_paid = (isset($_POST['add_payment'])) ? $_POST['pmtAmount'] : '' ;
  $cheque_id = (isset($_POST['add_payment'])) ? $_POST['chqID'] : '' ;
  $payment_type = (isset($_POST['add_payment'])) ? $_POST['pmtType'] : $type_array[0] ;
  $balance = (isset($_POST['add_payment'])) ? $_POST['pmtBalance'] : '' ;

  // Fill cheque modal forms
  if (isset($_chqDetails['chqID']) && $payment_type == 'Cheque' ) {
    $chqID = (isset($_POST['add_payment'])) ? $_chqDetails['chqID'] : create_id(date('y-m-d'), 'chqID');
    $chqNumber = (isset($_POST['add_payment'])) ? $_chqDetails['chqNumber'] : '';
    $chqBank = (isset($_POST['add_payment'])) ? $_chqDetails['chqBank'] : '';
    $chqDate = (isset($_POST['add_payment'])) ? date("F-j-Y", strtotime($_chqDetails['chqDate'])) : date("F-j-Y");
  }

  $chqBtn = (isset($_POST['add_payment'])) ? 'Update Cheque Details' : 'Add Cheque Details';

  $readonly = (isset($_POST['add_payment'])) ? 'readonly' : 'required' ;
  $disable_control = (!is_null($payments)) ? 'disabled' : 'required';

  if (isset($_POST['add_payment'])) {
    if ($_POST['pmtType'] == 'Cash') {
      $disabled = 'disabled';
    } else {
      $disabled = 'required';
    }
  } else {
    $disabled = 'disabled';
  }

?>
  <br />
  <div class='container topstart'>
    <?php
      // echo "<pre>", var_dump($_POST), "</pre>";
      if (isset($_SESSION['message'])) {
        echo "<div class='panel panel-default'>
                <div class='panel-heading'>Input Error(s)</div>
                <div class='panel-body'><ul class='fa-ul'>", $_SESSION['message'], "</ul></div>
              </div>";
        unset($_SESSION['message']);
      }
    ?>
    <div class='w3-container w3-blue'>
      <?php
        if (isset($_SESSION['update_payment'])) {
          echo "<h3> Update Order Payments </h3>";
        } else {
          echo "<h3> Add Order Payment </h3>";
        }
      ?>
    </div>
    <form class='w3-form w3-border w3-round' action='payments.php' method='POST' id='pmtForm'>
      <div class='row'>
        <div class='col-sm-4'>
          <?php
            if (isset($_SESSION['update_payment'])) {
               echo "<input type='hidden' name='pmtID' value='{$payment_id}'>";
            }
          ?>
          <div class='form-group'>
            <label class='bitterlabel' for='quantity'> Purchase Order ID </label>
            <?php if (!isset($_SESSION['update_payment'])): ?>
                <select class='form-control' name='poID' id='spoID'>\n";
                    <?php select_data($order_array, $order_id); ?>
                </select>
            <?php else: ?>
              <input class='form-control' type='text' name='poID' value="<?php echo trim($order_id); ?>"
              id='tpoID' placeholder='Purchase Order ID' readonly>
            <?php endif; ?>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Receipt Number: </label>
            <input class='form-control' type='text' name='poReceiptNo' value='<?php echo trim($receipt_no); ?>'
                   id='receipt_no' placeholder='Receipt Number' readonly>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Order Cost: </label>
            <input class='form-control' type='text' name='poAmount' value='<?php echo $order_amount; ?>'
                   id='item_cost' placeholder='Order Cost' readonly>
          </div>
        </div>

        <div class='col-sm-4'>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Amount Redeemed </label>
            <input class='form-control' type='text' name='pmAmount' value='<?php echo $payments; ?>'
                    oninput="calculate_balance(item_cost, amt_paid, current_payment, balance)"
                   id='amt_paid' placeholder='Amount Redeemed' readonly>
          </div>

          <div class='control-group'>
            <label class='control-label bitterlabel' for='paid'>Amount Paid </label>
            <div class="controls">
              <input class='form-control' type='number' name='pmtAmount'
                      oninput='calculate_balance(item_cost, amt_paid, current_payment, balance);'
                      value='<?php echo trim($amount_paid); ?>'
                     id='current_payment' placeholder='Amount To Pay' required>
            </div>
          </div>

          <div class='form-group row' style="margin-top:16px">
              <div class="col-xs-5">
                <label class='bitterlabel' for='amount'> Payment Type </label>
                  <?php
                    echo "<select class='form-control' name='pmtType' id='pType' onchange='get_cheque_id()'>\n";
                      select_data($type_array, $payment_type);
                    echo "</select>";
                  ?>
            </div>
            <div class="col-xs-7">
              <label for="chqID"> Cheque ID </label>
              <input class="form-control" id="chqID" type="text" name="chqID" value='<?php echo $cheque_id; ?>'
                  onfocus="invoke_modal();" placeholder="Cheque ID" value='' <?php echo $disabled; ?> >
            </div>
          </div>
        </div>

        <div class='col-sm-4'>
          <div class='form-group'>
            <label class='bitterlabel' for='station'> Balance: </label>
            <input class='form-control' type='text' name='pmtBalance' id='balance'
                    value='<?php echo $balance; ?>' placeholder='Amount Left' readonly>
          </div>

          <?php if (!isset($_SESSION['update_payment'])) { ?>
                  <div class='form-group'>
                      <label class='bitterlabel'>Control</label><br />
                      <input class='btn btn-primary btn-block' type='submit' name='add_payment'
                      value='Add Order Payment' >
                  </div>
          <?php } else {
                  if ($_SESSION['is_admin']) { ?>
                      <div class='form-group'>
                        <label class='bitterlabel'> Control </label><br />
                          <input class='btn btn-primary btn-block' type='submit' name='add_payment' value='Update Payment'>
                          <input class='btn btn-primary btn-block' type='submit' name='add_payment' value='Delete Payment' <?php echo $disable_control; ?> >
                          <a class='btn btn-primary btn-block' href='purchase_form.php?po_id=<?php echo $po_id; ?>&up_order=1'>Back</a>
                      </div>
          <?php   } else { ?>
                    <div class='form-group'>
                        <label class='bitterlabel'> Control </label><br />
                        <div class='btn-group'>
                          <input class='btn btn-primary' type='submit' name='add_payment' value='Update Payment'>
                          <a class='btn btn-primary' href='purchase_form.php?po_id=<?php echo $po_id; ?>&up_order=1'>Back</a>
                        </div>
                    </div>
          <?php   }
                }  ?>
        </div>
      </div>
    </form>

    <!-- Beginning of Cheque Modal -->
    <div class="modal fade" id="poTypeModal" tabindex="-1" role="dialog" aria-labelledby="ChequeModalLabel">
  	  <div class="modal-dialog" role="document">
  	    <div class="modal-content">

  	      <div class="modal-header">
  	        <h3 class="modal-title" id="ChequeModalLabel">Cheque Details</h3>
  	      </div>

  	      <div class="modal-body">
  	          <div class="box-body pad">
  	            <form name="chqForm" id="chqForm" method="post" enctype="multipart/form-data">
                  <div class="form-group">
              	  	<label for="ChequeID">Cheque ID: </label>
                		<input type="text" class="form-control" id="ChequeID" name="chqID" placeholder="Cheque Number"
                    value="<?php echo $chqID ?>" readonly>
                  </div>

                  <div class="control-group" style="margin-top:10px">
              	  	<label class="control-label" for="ChequeNumber">Cheque Number: </label>
                    <div class="controls">
                		  <input type="text" class="form-control" id="ChequeNumber" name="chqNumber"
                      placeholder="Cheque Number" value="<?php echo $chqNumber; ?>" required>
                      <p class="help-block"></p>
                    </div>
                  </div>

                  <div class="control-group" style="margin-top:10px">
              	  	<label class="control-label"  for="ChequeBank">Bank: </label>
                    <div class="controls">
                		  <input type="text" class="form-control" id="ChequeBank" name="chqBank"
                      placeholder="Bank of the Cheque" value="<?php echo $chqBank; ?>" required>
                      <p class="help-block"></p>
                    </div>
                  </div>

                  <div class="form-group" style="margin-top:10px">
              	  	<label for="ChequeDate">Cheque Date: </label>
                    <div class='input-group date' id='form_datetime'>
                      <input class='form-control' type='text' id="ChequeDate" name='chqDate'
                      value="<?php echo $chqDate; ?>" readonly>
                      <span class='input-group-addon'>
                          <span class='glyphicon glyphicon-calendar'></span>
                      </span>
                    </div>
                  </div>
  	            </form>
  	          </div>
  	      </div>

          <div class="modal-footer">
            <button type="submit" name="chqSave" form="chqForm" id="btnAdd" value="<?php echo $chqBtn; ?>" class="btn btn-primary"> <?php echo $chqBtn; ?> </button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"> Cancel </button>
          </div>

  	    </div>
  	  </div>
  	 </div>
     <!-- End of Unit Modal -->

  </div>

<?php
      unset($_SESSION['id']); // Unset the id
      create_footer();
?>
<script type='text/javascript'>
	$(function () {
		$('#spoID')
			.editableSelect({filter: false})
			.on('select.editable-select', function (e, li) {
				var str = li.text();
				$.ajax({
						type: 'GET',
						url: 'order_details.php',
						data: 'id='+str.trim(),
						success: function(data){
							var myjson = data;
							var myobj = JSON.parse(myjson);
							$('#receipt_no').val(myobj.receipt_no);
							$('#item_cost').val(myobj.amount);
							$('#amt_paid').val(myobj.amtpaid);
						}
				})
		});

    $('#ChequeDate').datepicker({
			format: 'MM-dd-yyyy',
			autoclose: true
		});
    $('#chqForm').on('submit', function(e){
      e.preventDefault();
      var value = $('#btnAdd').val();
      // alert($('#chqForm').serialize()+"&chqSave="+value);
      $.ajax({
         url: "save_cheque_details.php",
         method:"POST",
         data:$('#chqForm').serialize()+"&chqSave="+value,
         type:'json',
         success:function(data)
         {
           var value = $('#ChequeID').val();
           $('#chqID').val(value);
           $('#poTypeModal').modal('hide');
         }

      });
    })
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
	});
</script>
</body>
</html>
