<?php
if($auth == 0){
  logoutUser();
}
require view('profile');