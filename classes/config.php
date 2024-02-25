<?php
session_start();

require_once('initialize.php');
require_once('DBConnection.php');

$db = new DBConnection;
$conn = $db->conn;

function redirect($url=''){
	if(!empty($url))
	echo '<script>location.href="'.base_url .$url.'"</script>';
}

?>