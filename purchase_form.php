<?php
  if (isset($_GET['up_orders'])) {
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
    $purchase_order_id = decrypt_data($_GET['po_id']);
    $_POST = $db->view_data($con, "tblpurchaseordertracker", "poID", $purchase_order_id );
    $_POST['add_order'] = 'Update Order';
    $_SESSION['update_order'] = TRUE;
  }

  if (isset($_SESSION['poID'])) {
    $purchase_order_id = $_SESSION['poID'];
    $_SESSION['update_order'] = TRUE;
  }

  $quantity = (isset($_POST['add_order'])) ? $_POST['poQuantity'] : '' ;
  $unit_cost = (isset($_POST['add_order'])) ? $_POST['poUnitCost'] : '' ;
  $amount = (isset($_POST['add_order'])) ? $_POST['poAmount'] : '' ;
  $receipt_no = (isset($_POST['add_order'])) ? $_POST['poReceiptNo'] : '' ;
  $station = (isset($_POST['add_order'])) ? $_POST['poStation'] : '' ;
  $date = (isset($_POST['add_order'])) ? date("F-j-Y", strtotime($_POST['poDate'])) : date("F-j-Y");
  $type = (isset($_POST['add_order'])) ? $_POST['poType'] : '' ;
  $description = (isset($_POST['add_order'])) ? $_POST['poDescription'] : '' ;

  echo "<br />
        <div class='container topstart'>";
          if (isset($_SESSION['message'])) {
            echo "<div class='panel panel-default'>
                    <div class='panel-heading'>Input Error(s)</div>
                    <div class='panel-body'><ul class='fa-ul'>", $_SESSION['message'], "</ul></div>
                  </div>";
            unset($_SESSION['message']);
          }
  echo "  <div class='w3-container w3-blue'>";
              if (isset($_SESSION['update_order'])) {
                echo "<h3> Update Purchase Order </h3>";
              } else {
                echo "<h3> Add Purchase Order </h3>";
              }
  echo "  </div>
          <form class='w3-form w3-border w3-round' action='purchase_order.php' method='POST' id='poForm'>
            <div class='row'>
              <div class='col-sm-4'>";
                if (isset($_SESSION['update_order'])) {
                   echo "<input type='hidden' name='poID' value='{$purchase_order_id}'>";
                }

        echo "  <div class='form-group'>
                  <label class='bitterlabel' for='quantity'> Quantity: </label>
                  <input class='form-control' type='text' name='poQuantity' value='{$quantity}'
                         id='quantity' placeholder='Quantity' required>
                </div>

                <div class='form-group'>
                  <label class='bitterlabel' for='unitcost'>Unit Cost: </label>
                  <input class='form-control' type='text' name='poUnitCost' value='{$unit_cost}'
                         id='unitcost' placeholder='Unit Cost' required>
                </div>

                <div class='form-group'>
                  <label class='bitterlabel' for='amount'> Amount: </label>
                  <input class='form-control' type='text' name='poAmount' id='amount'
                      onfocus='calculate_amount(quantity, unitcost, amount)'
                      value='{$amount}' placeholder='Amount' readonly>
                </div>
              </div>

              <div class='col-sm-4'>
                <div class='form-group'>
                  <label class='bitterlabel' for='date'>Purchase Date: </label> <br />
                  <div class='input-group date' id='form_datetime'>
                    <input class='form-control' type='text' name='poDate' value='{$date}' readonly>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-calendar'></span>
                    </span>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='bitterlabel' for='station'> Station: </label>
                  <input class='form-control' type='text' name='poStation' value='{$station}'
                         placeholder='Station' required>
                </div>

                <div class='form-group'>
                  <label class='bitterlabel' for='receiptno'> Receipt Number: </label>
                  <input class='form-control' type='text' name='poReceiptNo' value='{$receipt_no}'
                         placeholder='Receipt Number' required>
                </div>
              </div>
              <div class='col-sm-4'>
                <div class='form-group'>
                  <label class='bitterlabel' for='type'> Type: </label>
                  <input class='form-control' type='text' name='poType' value='{$type}'
                         id='last_name' placeholder='Type' required>
                </div>
                <div class='form-group'>
                  <label class='bitterlabel' for='description'> Description: </label>
                  <input class='form-control' type='text' name='poDescription' value='{$description}'
                         id='last_name' placeholder='Description' required>
                </div>";
                if (!isset($_SESSION['update_order'])) {
                  echo "<div class='form-group'>
                          <label class='bitterlabel'> Control </label><br />
                          <input class='btn btn-primary' type='submit' name='add_order'
                          value='Add Purchase Order' >
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
    echo "    </div>
            </div>
          </form>
        </div>";

      unset($_SESSION['id']); // Unset the id
      create_footer();
?>
