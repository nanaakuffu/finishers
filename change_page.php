<?php

  include_once 'public_functions.php';

  login_check();

  base_header('Change Password');
  create_header();
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
        <h3> Change User Password </h3>
    </div>
    <form class='w3-form w3-border' action='change_password.php' method='POST' id="change_p">
      <div class="row">
        <div class="col-sm-5">
          <div class='form-group'>
              <label> User Name: </label>
              <input class='form-control' type='text' name='user_name' value='<?php echo $_SESSION['user_name'] ?>'
                       id='uname' placeholder='User Name' readonly>
          </div>
          <div class='form-group'>
              <label> Old Password: </label>
              <input class='form-control' type='password' name='old_password' value=''
                       id='opass' placeholder='Old Password' required>
          </div>
        </div>
        <div class="col-sm-5">
          <div class='control-group'>
              <label class="control-label"> New Password: </label>
              <div class="controls">
                <input class='form-control' type='password' name='new_password' value=''
                         minlength='8' id='npass' placeholder='New Password' required>
                <p class="help-block"></p>
              </div>
          </div>
          <div class='control-group' style="margin-top:15px">
              <label class="control-label"> Confirm New Password: </label>
              <div class="controls">
                <input class='form-control' type='password' name='confirm_password' value=''
                    data-validation-match-match="new_password"
                    id='cpass' placeholder='New Password' required>
                <p class="help-block"></p>
              </div>
          </div>
        </div>
        <div class="col-sm-2">
          <div class='form-group'>
            <label> Control </label>
            <button class='btn btn-primary' type='submit' name='submit'
                form='change_p' value='Change Password'> Change Password <i class='fa fa-fw fa-plus'></i></button>
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
        $('input,select,textarea').jqBootstrapValidation();
    	});
    </script>
  </body>
</html>
