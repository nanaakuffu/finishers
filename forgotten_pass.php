<?php
    require_once 'public_functions.php';
    require_once 'db_functions.php';

    base_header('Retrieve Password');

    $db = new Database();
    $con = $db->connect_to_db();

    // $question_array = $db->create_data_array($con, 'login_security', 'security_question', TRUE, TRUE);

    $username = mysqli_real_escape_string($con, $_GET['user_name']);
    $query = "SELECT security_question FROM login_security WHERE user_name='$username'";

    $result = mysqli_query($con, $query);
    $record_count = mysqli_num_rows($result);

    if ($record_count > 0 ){
        while ($row = mysqli_fetch_array($result)) {
            $sec_ques = $row['security_question'];
        }
    }
?>
<nav class='navbar navbar-inverse navbar-fixed-top' role='navigation'>
  <div class='container'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
        <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
            <span class='sr-only'>Toggle navigation</span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
            <span class='icon-bar'></span>
        </button>
        <a class='navbar-brand bitterlabel' href='#'> <i class='fa fa-home fa-fw'></i> Finishers Co. Ltd </a>
    </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="container">
    <!-- <div class="jumbotron">
      <h1> Welcome! </h1>
      <p> It appears you are having problems in logging in.
          You only need to fill the form below to retrieve your password.
          This is just to identify you. </p>
    </div> -->

    <div class='row' style='margin-top:-50px'>
        <div class='col-md-3'>
          <br />
        </div>
        <div class='col-md-6'>
          <div class='panel panel-default' style='margin-top:90px'>
            <div class='panel-body'>
                <form action='#' id='reset' method='POST'>
                  <div class='form-group'>
                      <label for='user_name'> Username: </label>
                      <input type='text' class='form-control' id='user_name' name='user_name'
                        value='<?php echo $username; ?>' placeholder='Enter username' readonly>
                  </div>
                  <div class='form-group'>
                      <label for='user_name'> Security Question: </label>
                      <input type='text' class='form-control' id='sec_ques' name='security_question'
                        value='<?php echo $sec_ques; ?>' placeholder='Security Question' readonly>
                  </div>
                  <div class='form-group'>
                      <label for='security_answer'> Answer: </label>
                      <input type='text' class='form-control' id='answer' name='answer'
                        placeholder='Answer' required>
                  </div>
                  <button class='btn btn-primary' type='submit' name='retrieve' form='reset'
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
</div>

<?php
  create_footer();
?>