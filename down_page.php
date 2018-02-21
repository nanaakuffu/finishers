<?php
  session_start();

  require_once 'public_functions.php';

  login_check();

  base_header('Back Up Database');
  create_header();

  echo "<br />
        <div class='container'>
          <div class='row'>
            <div class='col-sm-3'>
            </div>
            <div class='col-sm-6'>
              <div class='panel panel-default'>
                <div class='panel-heading w3-blue'> Database Backup System </div>
                <div class='panel-body'>
                  This feature helps you to create an <b>.sql</b> file of the database.<br />
                  It is saved with filename as <b>databasename_data_backup_day_month_year</b>. This file contains
                  the <b>SQL</b> format of the whole database. It is also not machine specific. Which means
                  if you have administrative access you can download on any machine you used to log in.
                  <p> To backup, click on the backup button below.</p>

                  <form action='download.php' id='btn_button' method='POST'>
                    <button class='btn btn-primary w3-round w3-padding-medium' type='submit' name='download'
                        form='btn_button'> Backup and Download Database <i class='fa fa-fw fa-download'></i></button>
                  </form>
                </div>
              </div>";
              if (isset($_SESSION['message'])) {
                echo "<div class='panel panel-default'>
                          <div class='panel-body'>", $_SESSION['message'], "</div>
                      </div>";
                unset($_SESSION['message']);
              }
      echo "</div>
            <div class='col-sm-3'>
            </div>
          </div>
        </div>";

  create_footer();

?>
