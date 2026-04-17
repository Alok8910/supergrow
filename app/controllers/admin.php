<?php
if (isset($_SESSION["adminlogin"])):
  if (!route(1)) {
    $route[1] = "index";
  }
  if (!file_exists(admin_controller(route(1)))) {
    $route[1] = "index";
  }
  require admin_controller(route(1));
else:
  $route[1] = "login";
  require admin_controller(route(1));

endif;
