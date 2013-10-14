<?php
$gmtDate = gmdate ( "D, d M Y H:i:s" );
header ( "Expires: {$gmtDate} GMT" );
header ( "Last-Modified: {$gmtDate} GMT" );
header ( "Cache-Control: no-cache, must-revalidate" );
header ( "Pragma: no-cache" );
header ( "Content-Type: application/json; charset=UTF-8", true );

include('includes/configure.php');
require(DIR_WS_INCLUDES  . 'filenames.php');
require(DIR_WS_INCLUDES  . 'database_tables.php');
require(DIR_WS_FUNCTIONS . 'database.php');
tep_db_connect() or die('Unable to connect to database server!');



$action = $_REQUEST['action'];

switch ($action){
	
	case 'cadastroAfiliados':
		require_once 'includes/classes/partner.php';
		$p = new Partner();
		$r = $p->newPartner($_POST);
		echo json_encode($r);
		break;
		
}



?>