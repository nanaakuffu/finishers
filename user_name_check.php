<?php

  require_once "db_functions.php";
  require_once 'public_functions.php';

  $db = new Database();
  $con = $db->connect_to_db();

  $value = mysqli_real_escape_string($con, $_GET['choice']);

  // $value = $_GET['user_name'];
  $sql = "SELECT user_name FROM user_details WHERE user_name="."'".$value."'";

  $result = mysqli_query($con, $sql);
  if ($result) {
    $users = mysqli_num_rows($result);
    if ($users > 0) {
      echo json_encode(array('flag'=>1, 'message' => '<ul><li> This user name already exists, please choose a new one. </li></ul>' ));
    }
  } else {
    echo json_encode(array('flag'=>0, 'message' => '<ul><li>'.mysqli_error($con).'</li></ul>'));
  }

  $db->close_connection($con);
?>
