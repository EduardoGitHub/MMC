<?php


include('includes/configure.php');
require_once('includes/modules/email/class.phpmailer.php');
require(DIR_WS_INCLUDES  . 'general.php');
require(DIR_WS_INCLUDES  . 'filenames.php');
require(DIR_WS_INCLUDES  . 'database_tables.php');
require(DIR_WS_FUNCTIONS . 'database.php');
tep_db_connect() or die('Unable to connect to database server!');



$action = $_REQUEST['action'];

switch ($action){
	/*
	case 'cadastroAfiliados':
		require_once 'includes/classes/partner.php';
		$p = new Partner();
		$r = $p->newPartner($_POST);
		echo json_encode($r);
		break;
	*/
	case 'vEmailExist':
	 $email = process_db(TABLE_CUSTOMERS, array('customers_id'), ' WHERE customers_email_address="'.$_GET['email'].'"');
	break;
	case 'parceirosemail':

		 $html = '<table width="760" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCC; padding:15px; background-color:#D7AB00" align="center">

				  <tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
							<td width="56%" rowspan="2" align="center">'.$_POST['firstname'].'?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><span style="font-size:20px">Seja</span><br><span style="font-size:40px">Bem Vindo!</span></td>
							<td width="44%"><img src="images/mail/mudominhacasa.png" width="332" height="59"/></td>
						  </tr>
						  <tr>
							<td style="color:#000; font-weight:bold; text-align:right; padding-right:3px;">wwww.mudominhacasa.com.br</td>
						  </tr>
						</table>

					</td>
				  </tr>
				  <tr>
					<td class="texto">
						<table width="760" border="0" cellspacing="0" cellpadding="0" style="background-color:#FFF; margin:5px">
						  <tr>
							<td><b>Nome:</b></td>
							<td>'.$_POST['firstname'].'</td>
						  </tr>
						  <tr>
							<td><b>E-mail:</b></td>
							<td>'.$_POST['email_address'].'</td>
						  </tr>
						  <tr>
							<td><b>Telefone:</b></td>
							<td>'.$_POST['telephone'].'</td>
						  </tr>
						  <tr>
							<td><b>CEP:</b></td>
							<td>'.$_POST['postcode'].'</td>
						  </tr><tr>
							<td><b>Page Views:</b></td>
							<td>'.$_POST['pagaviews'].'</td>
						  </tr>
						  <tr>
							<td><b>F?s ou Amigo</b></td>
							<td>'.$_POST['fan'].'</td>
						  </tr>
						  <tr>
							<td><b>URL ou endere?o do perfil:</b></td>
							<td>'.$_POST['urle'].'</td>
						  </tr>
						  <tr>
							<td><b>Responsavel pelo Site:</b></td>
							<td>'.$_POST['responsavel'].'</td>
						  </tr>
						  <tr>
							<td><b>Area de Atua??o:</b></td>
							<td>'.$_POST['area'].'</td>
						  </tr>
						  <tr>
							<td><b>Descri??o:</b></td>
							<td>'.$_POST['desc'].'</td>
						  </tr>
						  <tr>
							<td><b>Nome do Produto:</b></td>
							<td>'.$_POST['produto'].'</td>
						  </tr><tr>
							<td><b>Tamanho:</b></td>
							<td>'.$_POST['tamanho'].'</td>
						  </tr>
						</table>
					</td>
				  </tr>
				  <tr>
					<td style="text-align:center; font-size:13px; font-family:Tahoma; padding:10px">
					Muito obrigado pela sua prefer?ncia e compreens?o!<br>
					Esperamos sua total satisfa??o na aquisi??o do seu produto Mudominhacasa - Adesivos Decorativos
					</td>
				  </tr>
				</table>';

		  tep_sendMailOrders('desenvolvedor.freelancer@gmail.com', 'Parceria - '.$_POST['sessao'], $html, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
		break;

}
?>