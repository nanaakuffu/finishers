<?php
    require_once 'public_functions.php';
    require_once 'db_functions.php';

    base_header('Retrieve Password');

    $db = new Database();
    $con = $db->connect_to_db();

    if (isset($_GET['use'])) {
      $username = mysqli_real_escape_string($con, $_GET['use']);
      $username = decrypt_data($username);
      $query = "SELECT security_question FROM login_security WHERE user_name='$username'";

      $result = mysqli_query($con, $query);
      $record_count = mysqli_num_rows($result);

      if ($record_count > 0 ){
        while ($row = mysqli_fetch_array($result)) {
            $sec_ques = $row['security_question'];
        }
      }
    }
?>
<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
        <!-- <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button> -->
        <a class='navbar-brand bitterlabel' href='#'> <i class='fa fa-home fa-fw'></i> Finishers Co. Ltd </a>
    </div>
  </div>
</nav>

<div class="container">
  <!-- <div class="jumbotron">
    <h1> Welcome! </h1>
    <p> It appears you are having problems logging in.
        You only need to answer the question o retrieve your password.
        This is just to identify you. </p>
  </div> -->

  <div class='row'>
      <div class='col-md-3'>
        <br />
      </div>
      <div class='col-md-6'>
        <div class='panel panel-default' style='margin-top:90px'>
          <div class="panel-heading">
            Answer this question to <b>Retrieve Password</b>
          </div>
          <div class='panel-body'>
              <form action='verify_answer.php' id='reset' method='POST'>
                <div class='form-group'>
                    <label for='user_name'> Username: </label>
                    <input type='text' class='form-control' id='user_name' name='user_name'
                      value='<?php $user = (isset($_GET['use'])) ? $username : $_POST['user_name']; echo $user; ?>' placeholder='Enter username' readonly>
                </div>
                <div class='form-group'>
                    <label for='user_name'> Security Question: </label>
                    <input type='text' class='form-control' id='sec_ques' name='security_question'
                      value='<?php $sec_q = (isset($_GET['use'])) ? $sec_ques : $_POST['security_question']; echo $sec_q; ?>' placeholder='Security Question' readonly>
                </div>
                <div class='form-group'>
                    <label for='security_answer'> Answer: </label>
                    <input type='text' class='form-control' id='answer' name='answer'
                      placeholder='Answer' required>
                </div>
                <button class='btn btn-primary' type='submit' name='verify' form='reset'
                        value='retrieve'><i class='fa fa-check-square-o'></i> Verify Answer </button>
              </form>
          </div>
        </div>
          <?php
            if (isset($_SESSION['message'])) {
              echo "<div class='alert alert-danger'>
                        ", $_SESSION['message'],
                   "</div>";
              unset($_SESSION['message']);
            }
          ?>
      </div>
      <div class='col-md-3'>
        <br />
      </div>
  </div>
  <hr>
</div>

<?php
  create_footer();
?>
