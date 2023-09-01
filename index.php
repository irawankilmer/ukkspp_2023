<?php 
include 'core/init.php';
$auth->checkNotLogin();

include 'apps/themes/header.php';
require_once $url->getFile($_SESSION['level']);
include 'apps/themes/footer.php';