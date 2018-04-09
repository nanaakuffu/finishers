<?php
    session_start();

    require_once("db_functions.php");
    require_once("public_functions.php");

    login_check();

    $db = new Database();

    $con = $db->connect_to_db();

    $fields = array('user_name', 'first_name', 'middle_name', 'last_name', 'added_by', 'edited_by');

    base_header('Display Users');
    create_header();

    $active_users = $db->get_active_users($con);

    if (isset($_POST['submit'])) {
      $records = $db->search_data($con, "user_details", $fields, "first_name", $_POST['search'], 'first_name');
    } else {
      $records = $db->display_data($con, "user_details", $fields, "first_name");
    }

    echo "<br /><div class='container topstart'>",
            search_bar('display_users.php', 'Search ...'),
           "<br /><div class='table-responsive'>
              <table id='d_user' class='table table-hover' cellpadding='8' cellspacing='10'>
                <thead>
                  <tr class='w3-blue'>";
                    $headers = "";
                    foreach ($fields as $key => $value) {
                      if ($value != 'user_name') {
                        $headers .= "<th>".get_column_name($value)."</th>";
                      }
                    }
                    echo $headers .= "<th> Status </th>";
          echo "  </tr>
                </thead>
                <tbody>";

            if (sizeof($records) != 0) {
              foreach ($records as $key => $record) {
                echo "<tr>";
                foreach ($record as $rkey => $value) {
                  if ($rkey != 'user_name') {
                    $new_id = encrypt_data($record['user_name']);
                    $up_3 = encrypt_data('2');
                    echo "<td ><a href=user_levels.php?level={$new_id}&upd={$up_3}>", $value, "</a></td>";
                  }
                }
                $active = (is_element($active_users, $record['user_name'])) ? 'Active' : 'Inactive';
                echo "<td ><a href=user_levels.php?level={$new_id}&upd={$up_3}>", $active, "</a></td>";

                echo "</tr>";
              }
            }

    echo "</tbody></table>
        </div>
      </div>";

    create_footer();
?>
<script type='text/javascript'>
	$(function () {
		$('#d_user').DataTable({
			'paging': true,
			'lengthChange': false,
			'searching': false,
			'ordering': true,
			'info': true,
			'autoWidth': true
		});
	});
</script>
</body>
</html>
