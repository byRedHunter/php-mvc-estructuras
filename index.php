<?php
  error_reporting(E_ALL); // Error/Exception engine, always use E_ALL
  ini_set('ignore_repeated_errors', TRUE); // always use TRUE
  ini_set('display_errors', FALSE); // Error/Exception display, use FALSE only in production
  ini_set('log_errors', TRUE); // Error/Exception file logging engine.
  ini_set("error_log", "./php-error.log");
  error_log("\n \nHi, errors!!! \n");

  require_once 'config/config.php';
  require_once 'database.php';
  require_once 'clases/errorMessages.php';
  require_once 'clases/successMessages.php';
  require_once 'libs/model.php';
  require_once 'libs/controller.php';
  require_once 'libs/view.php';
  require_once 'libs/app.php';

  $app = new App();
?>