<?php
  // if (isset($_GET['up_payments'])) {
    session_start();
  // }

  unset($_SESSION['update_payments']);

  require_once 'public_functions.php';
  require_once 'db_functions.php';

  login_check();

  base_header("Track Order Payments");
  create_header();

  $db = new Database();
  $con = $db->connect_to_db();

  if (isset($_GET['pmt_id'])) {
    $payment_id = decrypt_data($_GET['pmt_id']);
    $_POST = $db->view_data($con, "tblpaymenttracker", "pmtID", $payment_id );
    $_POST['add_payment'] = 'Update Payment';
    $_SESSION['update_payment'] = TRUE;
  }

  if (isset($_SESSION['pmtID'])) {
    $payment_id = $_SESSION['pmtID'];
    $_SESSION['update_payment'] = TRUE;
  }

  $receipt_no = (isset($_SESSION['update_payment'])) ? $db->get_order_payments($con, $_POST['poID']) : '';
  $payments = (isset($_SESSION['update_payment'])) ? $db->get_order_payments($con, $_POST['poID']) : '';
  $order_amount = (isset($_SESSION['update_payment'])) ? $db->get_order_amount($con, $_POST['poID']) : '' ;


  $order_array = $db->create_data_array($con, 'tblpurchaseordertracker', 'poID');
  $order_array['default'] = 'Select order ID ...';
  $type_array = array('Cash', 'Cheque');

  $order_id = (isset($_POST['add_payment'])) ? $_POST['poID'] : $order_array['default'] ;
  $amount_paid = (isset($_POST['add_payment'])) ? $_POST['pmtAmount'] : '' ;
  $payment_type = (isset($_POST['add_payment'])) ? $_POST['pmtType'] : 'Cash' ;
  $balance = (isset($_POST['add_payment'])) ? $_POST['pmtBalance'] : '' ;

  // echo "<pre>", var_dump($order_array), "</pre>";

  // $date = (isset($_POST['add_payment'])) ? date("F-j-Y", strtotime($_POST['poDate'])) : date("F-j-Y");
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
            <?php
              if (!isset($_SESSION['update_payment'])) {
                echo "<select class='form-control' name='poID' id='spoID' onchange='get_order_details(this.value);'>\n";
                  select_data($order_array, $order_id);
                echo "</select>";
              } else {
                echo "<input class='form-control' type='text' name='poID'
                      value=".trim($order_id)." id='tpoID' placeholder='Purchase Order ID' readonly>";
              }
            ?>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Receipt Number: </label>
            <input class='form-control' type='text' name='poReceiptNo' value='<?php $receipt_no; ?>'
                   id='receipt_no' placeholder='Receipt Number' readonly>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Order Cost: </label>
            <input class='form-control' type='text' name='poAmount' value='<?php $order_amount; ?>'
                   id='item_cost' placeholder='Order Cost' readonly>
          </div>
        </div>

        <div class='col-sm-4'>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Amount Redeemed </label>
            <input class='form-control' type='text' name='pmAmount' value='<?php $payments; ?>'
                   id='amt_paid' placeholder='Amount Redeemed' readonly>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='paid'>Amount Paid </label>
            <input class='form-control' type='text' name='pmtAmount'
                    oninput="calculate_balance(item_cost, amt_paid, current_payment, balance)"
                    value='<?php $amount_paid; ?>'
                   id='current_payment' placeholder='Amount To Pay' required>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='amount'> Payment Type </label>
            <?php
              if (!isset($_SESSION['update_payment'])) {
                echo "<select class='form-control' name='pmtType' id='ptype'>\n";
                  select_data($type_array, $payment_type);
                echo "</select>";
              } else {
                echo "<input class='form-control' type='text' name='pmtType'
                      value=".trim($payment_type)." id='pmttype' placeholder='Payment Type ' readonly>";
              }
            ?>
          </div>
        </div>

        <div class='col-sm-4'>
          <div class='form-group'>
            <label class='bitterlabel' for='station'> Balance: </label>
            <input class='form-control' type='text' name='pmtBalance' id='balance'
                    value='<?php $balance; ?>' placeholder='Amount Left' readonly>
          </div>

          <?php
                if (!isset($_SESSION['update_payment'])) {
                  echo "<div class='form-group'>
                          <label class='bitterlabel'> Control </label><br />
                          <input class='btn btn-primary' type='submit' name='add_payment'
                          value='Add Order Payment' >
                        </div>";
                } else {
                  if ($_SESSION['is_admin']) {
                    echo "<div class='form-group'>
                            <label class='bitterlabel'> Control </label><br />
                            <div class='btn-group'>
                              <input class='btn btn-primary' type='submit' name='add_payment' value='Update Payment'>
                              <input class='btn btn-primary' type='submit' name='add_payment' value='Delete Payment'>
                              <a class='btn btn-primary' href='display_purchases.php'>Back</a>
                            </div>
                          </div>";
                  } else {
                    echo "<div class='form-group'>
                            <label class='bitterlabel'> Control </label><br />
                            <div class='btn-group'>
                              <input class='btn btn-primary' type='submit' name='add_payment' value='Update Payment'>
                              <a class='btn btn-primary' href='display_purchases.php'>Back</a>
                            </div>
                          </div>";
                  }
                }
            ?>
        </div>
      </div>
    </form>
  </div>
  <!-- <script type="text/javascript">
    $('#spoID').change(function() {
      var choice = jQuery(this).val();
      alert(choice);
      $.ajax({
        url:'order_details.php',
        type:'POST'
        data : {'id' : choice},
        success : function(response) {
            $('input[name="poReceiptNo"]').val(response.receipt_no);
            $('input[name="poAmount"]').val(response.amount);
            $('input[name="pmAmount"]').val(response.amtpaid);
        }
      });
    });
  </script> -->
<?php
      unset($_SESSION['id']); // Unset the id
      create_footer();
?>
