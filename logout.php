<?php
    session_start();

    // Get the unique log id. Important for recording logout date and time
    $log_id = $_SESSION['log_id'];

    // Get some files ready for reading
    require_once 'db_functions.php';
    require_once 'public_functions.php';

    // Initialize the database class
    $db = new Database();
    $con = $db->connect_to_db();

    // $today_time = date('h:i:s');
    $today_date_time = date('y-m-d h:i:s');

    $log_sql = "UPDATE login_details SET logout_date_time='$today_date_time' WHERE login_id ="."'".$log_id."'";

    // Actually save the data in the database
    $log_result = mysqli_query($con, $log_sql) or die("Couldn't execute query to successfully logout user.");

    // Add user activity
    $add_activity = $db->add_activity($con, 'login_activity', $_SESSION['user_name'], 'Logged out of the system.');

    // $user_sql = "UPDATE users SET status='0' WHERE user_name ="."'".$user_name."'";
    // $result = mysqli_query($con, $user_sql) or die("Couldn't execute query.");
    if ($log_result) {
        session_unset();
        session_destroy();
        $db->close_connection($con);
        header("Location: login_page.php");
        exit();
    }
?>
