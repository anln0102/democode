<?php
require_once('Model/DBconnect.php');
if (!isset($_SESSION)) {
    session_start();
    
}
unset($_SESSION['student']);//huy tam thoi session vua khoi tao
    header('Location : http://localhost/hokokusho2021/?view=login');
