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

  $unit_array = array('Drums' , 'Pieces');
  $type_array = array('Oil' , 'Liquid' );

  // echo $_GET['po_id'];

  // $order_id = (isset($_POST['add_item'])) ? $_POST['poID'] : '';
  $order_id = (isset($_GET['po_id'])) ? trim(decrypt_data($_GET['po_id'])) : $_POST['poID'];
  $po_id = encrypt_data($order_id);
  $quantity = (isset($_POST['add_item'])) ? $_POST['itemQuantity'] : '' ;
  $unit_price = (isset($_POST['add_item'])) ? $_POST['itemUnitPrice'] : '' ;
  $unit = (isset($_POST['add_item'])) ? $_POST['itemUnit'] : $unit_array[0] ;
  $type = (isset($_POST['add_item'])) ? $_POST['itemType'] : $type_array[0] ;
  $description = (isset($_POST['add_item'])) ? $_POST['itemDescription'] : '' ;
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
            <div class="input-group">
              <div class='input-group-btn'>
                  <a class='btn btn-primary' data-toggle="modal" data-target="#UnitModal">
                      <i class='fa fa-fw fa-plus'></i>
                  </a>
              </div>
              <select class='form-control' name='itemUnit' id='itemUnit'>
                <?php select_data($unit_array, $unit); ?>
              </select>
            </div>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='itemDescription'> Description: </label>
            <input class='form-control' type='text' name='itemDescription' value='<?php echo $description; ?>'
                   placeholder='item Description' required>
          </div>
        </div>

        <div class='col-sm-4'>
          <div class='form-group'>
            <label class='bitterlabel' for='receiptno'> Item Type: </label>
            <div class="input-group">
              <div class='input-group-btn'>
                  <a class='btn btn-primary' data-toggle="modal" data-target="#TypeModal">
                      <i class='fa fa-fw fa-plus'></i>
                  </a>
              </div>
              <select class='form-control' name='itemType' id='itemType'>
                <?php select_data($type_array, $type); ?>
              </select>
            </div>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='itemUnitPrice'> Unit Price: </label>
            <input class='form-control' type='text' name='itemUnitPrice'
                   value='<?php echo $unit_price; ?>'
                   id='itemUnitPrice' placeholder='Item Unit Price' required>
          </div>

          <div class='form-group'>
            <label class='bitterlabel' for='itemCost'> Item Cost: </label>
            <input class='form-control' type='text' name='itemCost' id="itemCost"
                   onfocus="calculate_amount(itemQuantity, itemUnitPrice, itemCost);"
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

    <!-- Beginning of Unit Modal -->
    <div class="modal fade" id="UnitModal" tabindex="-1" role="dialog" aria-labelledby="UnitModalLabel">
  	  <div class="modal-dialog" role="document">
  	    <div class="modal-content">

  	      <div class="modal-header">
  	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	        <h4 class="modal-title" id="UnitModalLabel">&nbsp;</h4>
  	      </div>

  	      <div class="modal-body">
  	          <div class="box-body pad">
  	            <form action="data.php" method="post" enctype="multipart/form-data">
                  <div class="form-group">
              	  	<label for="iUnit">Item Unit: </label>
                		<input type="text" class="form-control" id="iUnit" name="unit" placeholder="Item Unit">
                  </div>
                  <div class="form-group">
    	          		 <input type="submit" name="add_unit" value="Add Unit" class="btn btn-primary">
                 	</div>
  	            </form>
  	          </div>
  	      </div>

  	    </div>
  	  </div>
  	 </div>
     <!-- End of Unit Modal -->

     <!-- Beginning of Type Modal -->
     <div class="modal fade" id="TypeModal" tabindex="-1" role="dialog" aria-labelledby="TypeModalLabel">
   	  <div class="modal-dialog" role="document">
   	    <div class="modal-content">

   	      <div class="modal-header">
   	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
   	        <h4 class="modal-title" id="TypeModalLabel">&nbsp;</h4>
   	      </div>

   	      <div class="modal-body">
   	          <div class="box-body pad">
   	            <form action="data.php" method="post" enctype="multipart/form-data">
                   <div class="form-group">
               	  	<label for="iType">Item Type: </label>
                 		<input type="text" class="form-control" id="iType" name="unit" placeholder="Item Type">
                   </div>
                   <div class="form-group">
     	          		 <input type="submit" name="add_type" value="Add Type" class="btn btn-primary">
                  	</div>
   	            </form>
   	          </div>
   	      </div>

   	    </div>
   	  </div>
   	 </div>
      <!-- End of Unit Modal -->
  </div>

<?php
    unset($_SESSION['itemID']); // Unset the id
    create_footer();
?>
