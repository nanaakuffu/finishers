<?php

  if (isset($_GET['up_user'])) {
    session_start();
  }

  unset($_SESSION['update_user']);

  require_once 'public_functions.php';
  require_once 'db_functions.php';

  login_check();

  base_header("Create Users");
  create_header();

  $db = new Database();
  $con = $db->connect_to_db();

  if (isset($_GET['u_id'])) {
    $user = decrypt_data($_GET['u_id']);
    $_POST = $db->view_data($con, "user_details", "user_name", $user);
    $_POST['submit'] = 'Update User Details';
    $_SESSION['update_user'] = TRUE;
  }

  if (isset($_SESSION['id'])) {
    $_SESSION['update_user'] = TRUE;
  }

  // Get deafult values
  $user_name = (isset($_POST['submit'])) ? $_POST['user_name'] : "" ;
  $user_password = (isset($_POST['submit'])) ? decryption($_POST['user_password'], $_SESSION['full_name']) : "" ;
  $first_name = (isset($_POST['submit'])) ? $_POST['first_name'] : '' ;
  $middle_name = (isset($_POST['submit'])) ? $_POST['middle_name'] : '' ;
  $last_name = (isset($_POST['submit'])) ? $_POST['last_name'] : '' ;
  $user_type = (isset($_POST['submit'])) ? $_POST['user_type'] : 'Standard User' ;

  $type_array = array('Standard User', 'Administrator', 'Guest', 'Semi-standard User' );

  // echo decryption($_POST['user_password'], $_POST['full_name']), "<br />";
  // echo decryption("02202134313131393135313531371132313", $_POST['full_name']), "<br>";
  // echo $_POST['full_name'], "<br>";
  // echo $user_password;

  $button = (isset($_SESSION['update_user'])) ? "Update User Details" : "Add New User" ;
  $title_bar = (isset($_SESSION['update_user'])) ? "Update User Details" : "Add User Details" ;
  $buttton_ctr = (isset($_SESSION['update_user'])) ? "readonly" : "required" ;
?>
<br/>
  <div class="container topstart">
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
        <h3> <?php echo $title_bar ?> </h3>
    </div>
    <form class='w3-form w3-border' action='create_users.php' method='POST'>
      <div class="row">
        <div class="col-sm-5">
          <?php if (isset($_POST['submit'])): ?>
            <div class='form-group'>
                <label> User Name: </label>
                <input class='form-control' type='text' name='user_name'
                    value='<?php echo $user_name; ?>' readonly >
            </div>
          <?php else: ?>
            <div class='control-group'>
                <label class="control-label"> User Name: </label>
                <div class="controls">
                  <input class='form-control' type='text' name='user_name'
                      value='' id='uname'
                      data-validatation-ajax-ajax = 'user_name_check.php'
                      placeholder='Enter User Name' required>
                  <p class="help-block"></p>
                </div>
            </div>
          <?php endif; ?>

          <div class='control-group'>
              <label class="control-label"> User Password: </label>
              <div class="controls">
                <input class='form-control' type='password' name='user_password' minlength='8' value='<?php echo trim($user_password); ?>'
                         id='upass' placeholder='Enter Password' <?php echo $buttton_ctr; ?> >
                <p class="help-block"></p>
              </div>
          </div>
          <div class='form-group'>
              <label> User Type: </label>
              <?php
                if (!isset($_SESSION['update_user'])) {
                  echo "<select class='form-control' id='userType' name='user_type'>";
                    select_data($type_array, $user_type);
                  echo "</select>";
                } else {
                  echo "<input class='form-control' type='text' name='user_type'
                        value=".trim($user_type)." id='utype' placeholder='User Type' readonly>";
                }
              ?>
          </div>
        </div>
        <div class="col-sm-5">
          <div class='form-group'>
              <label> First Name: </label>
              <input class='form-control' type='text' name='first_name' value='<?php echo $first_name ?>'
                       id='fname' placeholder='Enter user first name' required>
          </div>
          <div class='form-group'>
              <label> Middle Name (Optional): </label>
              <input class='form-control' type='text' name='middle_name' value='<?php echo $middle_name ?>'
                       id='mname' placeholder='Enter user middle name'>
          </div>
          <div class='form-group'>
              <label> Last Name: </label>
              <input class='form-control' type='text' name='last_name' value='<?php echo $last_name ?>'
                       id='lname' placeholder='Enter user last name' required>
          </div>
        </div>
        <div class="col-sm-2">
          <div class='form-group'>
            <label> Control </label>
            <input class='btn btn-primary btn-block' type='submit' name='submit'
                  value='<?php echo $button ?>'>
          </div>
        </div>
      </div>
    </form>
  </div>

<?php
  create_footer();
?>
<script type='text/javascript'>
	$(function () {
		$('#userType').editableSelect({filter: false, effects: 'fade'});
    $('input,select,textarea').jqBootstrapValidation();
	});
</script>
</body>
</html>
