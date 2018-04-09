<?php
    session_start();

    require_once 'public_functions.php';
    require_once 'db_functions.php';

    login_check();

    base_header('Home | Welcome to ...');
    create_header();

    $db = new Database();
    $con = $db->connect_to_db();
    $total = 0;

    // echo "<pre>", var_dump($_SESSION), "</pre>";
?>
    <br />
    <div class='container topstart'>
      <?php home_search_bar('index.php'); ?>
      <br />
      <div class="table-responsive">
        <table id='display_result' class='table table-hover' cellpadding='8' cellspacing='10'>
          <thead>
            <tr class='w3-blue animated fadeIn'>
              <th> Stock ID </th>
              <th> Stock Name </th>
              <th> Unit Price </th>
              <th> Quantity Available </th>
              <th> Supplier </th>
              <th> Warehouse Available </th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
<?php
    // echo encryption("password", "Nana Baah Akuffu");
    $db->close_connection($con);
    create_footer();
?>
<script type='text/javascript'>
	$(function () {
		$('#display_result').DataTable({
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
