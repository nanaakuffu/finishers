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

  if (isset($_GET['po_id'])) {
    $po_id = $_GET['po_id'];
    $_POST = $db->view_data($con, "tblpurchaseordertracker", "poID", $po_id );
    $_POST['add_order'] = 'Add Purchase Order';
    $_SESSION['update_order'] = TRUE;
  }
  //
  // echo "<pre>", print_r($_POST), "</pre>";

  if (isset($_SESSION['po_id'])) {
    $po_id = $_SESSION['po_id'];
    $_SESSION['update_order'] = TRUE;
  }

  // $quantity = (isset($_POST['add_order'])) ? $_POST['poQuantity'] : '' ;
  // $unit_cost = (isset($_POST['add_order'])) ? $_POST['poUnitCost'] : '' ;
  // $purchase_order_id = (isset($_POST['add_order'])) ? $_POST['poID'] : '' ;
  $amount = (isset($_POST['add_order'])) ? $_POST['poAmount'] : '' ;
  $receipt_no = (isset($_POST['add_order'])) ? $_POST['poReceiptNo'] : '' ;
  $station = (isset($_POST['add_order'])) ? $_POST['poStation'] : '' ;
  $date = (isset($_POST['add_order'])) ? date("F-j-Y", strtotime($_POST['poDate'])) : date("F-j-Y");
  // $type = (isset($_POST['add_order'])) ? $_POST['poType'] : '' ;
  // $description = (isset($_POST['add_order'])) ? $_POST['poDescription'] : '' ;

  // $required = (isset($_POST['poID'])) ? 'disabled' : 'required' ;
  // $readonly = (isset($_POST['poID'])) ? 'disabled' : 'readonly' ;


  // if (isset($_POST['poID'])) {
    // echo "<pre>", print_r($_POST), "</pre>";
  // }
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
          if (isset($_SESSION['update_order'])) {
            echo "<h3> Update Purchase Order </h3>";
          } else {
            echo "<h3> Add Purchase Order </h3>";
          }
        ?>
    </div>
    <form class='w3-form w3-border w3-round' action='purchase_order.php' method='POST' id='poForm'>
      <div class='row'>
        <div class='col-sm-3'>
          <?php
            if (isset($_SESSION['update_order'])) {
               echo "<input type='hidden' name='poID' value='{$po_id}'>";
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
        </div>

        <div class='col-sm-6'>
          <div class='form-group'>
            <label class='bitterlabel' for='amount'> Amount: </label>
            <input class='form-control' type='text' name='poAmount' id='amount'
                onfocus='calculate_amount(quantity, unitcost, amount)'
                value='<?php echo $amount; ?>' placeholder='0.00' readonly>
          </div>
          <div class='form-group'>
            <label class='bitterlabel' for='station'> Station: </label>
            <input class='form-control' type='text' name='poStation' value='<?php echo $station; ?>'
                   placeholder='Station' >
          </div>
        </div>

        <div class='col-sm-3'>
          <?php
          if (!isset($_SESSION['update_order'])) {
            echo "<div class='form-group'>
                    <label class='bitterlabel'> Control </label><br />
                    <input class='btn btn-primary btn-block' type='submit' name='add_order'
                    value='Add Purchase Order'>
                  </div>";
          } else {
            if ($_SESSION['is_admin']) {
              echo "<div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <div class='btn-group'>
                        <input class='btn btn-primary' type='submit' name='add_order' value='Update Order'>
                        <input class='btn btn-primary' type='submit' name='add_order' value='Delete Order'>
                        <a class='btn btn-primary' href='display_purchases.php'>Back</a>
                      </div>
                    </div>";
            } else {
              echo "<div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <div class='btn-group'>
                        <input class='btn btn-primary' type='submit' name='add_order' value='Update Order'>
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

<?php
      unset($_SESSION['id']); // Unset the id
      create_footer();
?>
