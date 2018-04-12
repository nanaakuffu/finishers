<?php

  require_once "db_functions.php";
  require_once 'public_functions.php';

  $db = new Database();
  $con = $db->connect_to_db();

  $value = mysqli_real_escape_string($con, $_GET['user_name']);

  // $value = $_GET['user_name'];
  $sql = "SELECT user_name FROM user_details WHERE user_name="."'".$value."'";

  $result = mysqli_query($connection, $sql);
  $users = mysqli_num_rows($result);

  if ($users > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode(array('value' => $data[0]['user_name'],
                           'valid' => 0,
                           'message' => 'User Name already exists, please choose a new one.' ));
  } else {
    return "";
  }


?>
