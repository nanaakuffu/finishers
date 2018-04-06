<?php
  if (isset($_GET['up_item'])) {
    session_start();
  }

  unset($_SESSION['update_item']);

  require_once 'public_functions.php';
  require_once 'db_functions.php';

  login_check();

  base_header("Order Item");
  create_header();

  $db = new Database();
  $con = $db->connect_to_db();

  if (isset($_GET['itemID'])) {
    $item_id = decrypt_data($_GET['itemID']);
    $_POST = $db->view_data($con, "tblpurchaseorderitems", "itemID", $item_id );
    $_POST['add_item'] = 'Update Item';
    $_SESSION['update_item'] = TRUE;
  }
  //
  // echo "<pre>", print_r($_POST), "</pre>";

  if (isset($_SESSION['itemID'])) {
    $item_id = $_SESSION['itemID'];
    $_SESSION['update_item'] = TRUE;
  }

  $fields = array('itemID', 'itemDescription', 'itemType', 'itemUnit', 'itemQuantity', 'itemUnitPrice', 'itemCost');

  $unit_array = $db->create_data_array($con, "tblpurchaseorderitems", "itemUnit", TRUE, TRUE);
  $type_array = $db->create_data_array($con, "tblpurchaseorderitems", "itemType", TRUE, TRUE);
  $desc_array = $db->create_data_array($con, "tblpurchaseorderitems", "itemDescription", TRUE, TRUE);

  // echo $_GET['po_id'];

  // $order_id = (isset($_POST['add_item'])) ? $_POST['poID'] : '';
  $order_id = (isset($_GET['po_id'])) ? trim(decrypt_data($_GET['po_id'])) : $_POST['poID'];
  $records = $db->display_specific_data($con, "tblpurchaseorderitems", $fields, "poID", $order_id, "itemID");

  $po_id = encrypt_data($order_id);
  $quantity = (isset($_POST['add_item'])) ? $_POST['itemQuantity'] : '' ;
  $unit_price = (isset($_POST['add_item'])) ? $_POST['itemUnitPrice'] : '' ;
  $unit = (isset($_POST['add_item'])) ? $_POST['itemUnit'] : $unit_array[0] ;
  $type = (isset($_POST['add_item'])) ? $_POST['itemType'] : $type_array[0] ;
  $description = (isset($_POST['add_item'])) ? $_POST['itemDescription'] : $desc_array[0] ;
  $item_cost = (isset($_POST['add_item'])) ? $_POST['itemCost'] : '' ;

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
          if (isset($_SESSION['update_item'])) {
            echo "<h3> Update Order Item </h3>";
          } else {
            echo "<h3> Add Order Item </h3>";
          }
        ?>
    </div>
    <form class='w3-form w3-border w3-round' action='item_purchase.php' method='POST' id='itemForm'>
      <div class='row'>
        <div class='col-sm-4'>
          <?php
            if (isset($_SESSION['update_item'])) {
               echo "<input type='hidden' name='itemID' value='{$item_id}'>";
            }
          ?>
          <input type='hidden' name='poID' value='<?php echo $order_id; ?>' >
          <div class='form-group'>
            <label class='bitterlabel' for='receiptno'> Quantity: </label>
            <input class='form-control' type='text' name='itemQuantity'
                   id='itemQuantity' value='<?php echo $quantity; ?>'
                    placeholder='Item Quanity' required>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='receiptno'> Unit: </label>
            <select class='form-control' name='itemUnit' id='itemUnit'>
              <?php select_data($unit_array, $unit); ?>
            </select>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='itemDescription'> Description: </label>
            <select class='form-control' name='itemDescription' id='itemDescription'>
              <?php select_data($desc_array, $description); ?>
            </select>
          </div>
        </div>

        <div class='col-sm-4'>
          <div class='form-group'>
            <label class='bitterlabel' for='itemType'> Item Type: </label>
            <!-- <div class="select2-wrapper"> -->

            <select class='form-control' name='itemType' id='itemType'>
              <?php select_data($type_array, $type); ?>
            </select>
            <!-- </div> -->
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='itemUnitPrice'> Unit Price: </label>
            <input class='form-control' type='text' name='itemUnitPrice'
                   oninput='calculate_amount(itemQuantity, itemUnitPrice, itemCost);'
                   value='<?php echo $unit_price; ?>'
                   id='itemUnitPrice' placeholder='Item Unit Price' required>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='itemCost'> Item Cost: </label>
            <input class='form-control' type='text' name='itemCost' id="itemCost"
                   value='<?php echo $item_cost; ?>'
                   placeholder='Item Cost' readonly>
          </div>
        </div>

        <div class='col-sm-4'>
          <?php if (!isset($_SESSION['update_item'])) {
                  if (!isset($_GET['po_id'])) { ?>
                    <div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <input class='btn btn-primary btn-block' type='submit' name='add_item'
                      value='Add Purchase Item' >
                    </div>
            <?php } else { ?>
                    <div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <input class='btn btn-primary btn-block' type='submit' name='add_item'
                      value='Add Purchase Item' >
                      <a class='btn btn-primary btn-block' href='purchase_form.php?po_id=<?php echo $po_id; ?>&up_order=1'>Back</a>
                    </div>
            <?php }
                } else {
                  if ($_SESSION['is_admin']) { ?>
                    <div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <div class='btn-group btn-block'>
                        <input class='btn btn-primary' type='submit' name='add_item' value='Update Item'>
                        <input class='btn btn-primary' type='submit' name='add_item' value='Delete Item'>
                        <a class='btn btn-primary' href='purchase_form.php?po_id=<?php echo $po_id; ?>&up_order=1'>Back</a>
                      </div>
                    </div>
            <?php } else { ?>
                    <div class='form-group'>
                      <label class='bitterlabel'> Control </label><br />
                      <div class='btn-group btn-block'>
                        <input class='btn btn-primary' type='submit' name='add_item' value='Update Item'>
                        <a class='btn btn-primary' href='purchase_form.php?po_id=<?php echo $po_id; ?>&up_order=1'>Back</a>
                      </div>
                    </div>
            <?php }
                } ?>
        </div>
      </div>
    </form>

    <!-- Loading the table for items ordered -->
    <?php if (isset($_POST['poID'])): ?>
      <br />
      <div class='table-responsive'>
          <table id='item_order' class='table table-hover' cellpadding='8' cellspacing='10'>
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
                        echo "<td >", $value, "</td>";
                      }
                   }
                   echo "</tr>";
                 }
               }
            ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

  </div>

<?php
    unset($_SESSION['itemID']); // Unset the id
    create_footer();
?>
