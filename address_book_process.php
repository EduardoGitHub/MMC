<?php
/*
  $Id: address_book_process.php,v 1.79 2003/06/09 23:03:52 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
  
  $type_register = tep_db_query("select customers_type_register from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $type_is = tep_db_fetch_array($type_register);

// needs to be included earlier to set the success message in the messageStack
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADDRESS_BOOK_PROCESS);

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'deleteconfirm') && isset($HTTP_GET_VARS['delete']) && is_numeric($HTTP_GET_VARS['delete'])) {
    tep_db_query("delete from " . TABLE_ADDRESS_BOOK . " where address_book_id = '" . (int)$HTTP_GET_VARS['delete'] . "' and customers_id = '" . (int)$customer_id . "'");

    $messageStack->add_session('addressbook', SUCCESS_ADDRESS_BOOK_ENTRY_DELETED, 'success');

    tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
  }

// error checking when updating or adding an entry
  $process = false;
  if (isset($HTTP_POST_VARS['action']) && (($HTTP_POST_VARS['action'] == 'process') || ($HTTP_POST_VARS['action'] == 'update'))) {
    $process = true;
    $error = false;

    if ((ACCOUNT_GENDER == 'true')&&($type_is['customers_type_register']=='F')) $gender = tep_db_prepare_input($HTTP_POST_VARS['gender']);
    if ((ACCOUNT_COMPANY == 'true')||($type_is['customers_type_register']=='J')) $company = tep_db_prepare_input($HTTP_POST_VARS['company']);
    $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
    $lastname = tep_db_prepare_input($HTTP_POST_VARS['lastname']);
    $street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
	$street_number = tep_db_prepare_input($HTTP_POST_VARS['street_number']);
    if (ACCOUNT_SUBURB == 'true') $suburb = tep_db_prepare_input($HTTP_POST_VARS['suburb']);
	if (ACCOUNT_COMPLEMENTO == 'true') $complemento = tep_db_prepare_input($HTTP_POST_VARS['complemento']);
    $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
    $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
    $country = tep_db_prepare_input($HTTP_POST_VARS['country']);
    if (ACCOUNT_STATE == 'true') {
      if (isset($HTTP_POST_VARS['zone_id'])) {
        $zone_id = tep_db_prepare_input($HTTP_POST_VARS['zone_id']);
      } else {
        $zone_id = false;
      }
      $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
    }

    if ((ACCOUNT_GENDER == 'true') &&($type_is['customers_type_register']=='F')){
      if ( ($gender != 'm') && ($gender != 'f') ) {
        $error = true;

        $messageStack->add('addressbook', ENTRY_GENDER_ERROR);
      }
    }
	
	if($type_is['customers_type_register']=='F'){

		if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
		  $error = true;
	
		  $messageStack->add('addressbook', ENTRY_FIRST_NAME_ERROR);
		}
	
		if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
		  $error = true;
	
		  $messageStack->add('addressbook', ENTRY_LAST_NAME_ERROR);
		}
		
	}else if($type_is['customers_type_register']=='J'){
	
		if (strlen($firstname) < ENTRY_RAZAO_SOCIAL_MIN_LENGTH) {
		  $error = true;
	
		  $messageStack->add('addressbook', ENTRY_RAZAO_SOCIAL_ERROR);
		}
	
		if (strlen($lastname) < ENTRY_NOME_FANTASIA_MIN_LENGTH) {
		  $error = true;
	
		  $messageStack->add('addressbook', ENTRY_NOME_FANTASIA_ERROR);
		}
	
	}

    if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
      $error = true;

      $messageStack->add('addressbook', ENTRY_STREET_ADDRESS_ERROR);
    }
	
	
	if (strlen($street_number) < ENTRY_STREET_NUMBER_MIN_LENGTH) {
      $error = true;

      $messageStack->add('addressbook', ENTRY_STREET_NUMBER_ERROR);
    }
	

    if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
      $error = true;

      $messageStack->add('addressbook', ENTRY_POST_CODE_ERROR);
    }

    if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
      $error = true;

      $messageStack->add('addressbook', ENTRY_CITY_ERROR);
    }

    if (!is_numeric($country)) {
      $error = true;

      $messageStack->add('addressbook', ENTRY_COUNTRY_ERROR);
    }

    if (ACCOUNT_STATE == 'true') {
      $zone_id = 0;
      $check_query = tep_db_query("select count(*) as total from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "'");
      $check = tep_db_fetch_array($check_query);
      $entry_state_has_zones = ($check['total'] > 0);
      if ($entry_state_has_zones == true) {
        $zone_query = tep_db_query("select distinct zone_id from " . TABLE_ZONES . " where zone_country_id = '" . (int)$country . "' and (zone_name like '" . tep_db_input($state) . "%' or zone_code like '%" . tep_db_input($state) . "%')");
        if (tep_db_num_rows($zone_query) == 1) {
          $zone = tep_db_fetch_array($zone_query);
          $zone_id = $zone['zone_id'];
        } else {
          $error = true;

          $messageStack->add('addressbook', ENTRY_STATE_ERROR_SELECT);
        }
      } else {
        if (strlen($state) < ENTRY_STATE_MIN_LENGTH) {
          $error = true;

          $messageStack->add('addressbook', ENTRY_STATE_ERROR);
        }
      }
    }

    if ($error == false) {
      $sql_data_array = array('entry_firstname' => $firstname,
                              'entry_lastname' => $lastname,
                              'entry_street_address' => $street_address,
							  'entry_street_number' => $street_number,
                              'entry_postcode' => tep_removecaracters($postcode),
                              'entry_city' => $city,
                              'entry_country_id' => (int)$country);
							  
	 $sql_data_array2 = array('customers_modified' => '1');						  

      if ((ACCOUNT_GENDER == 'true')&&($type_is['customers_type_register']=='F')) $sql_data_array['entry_gender'] = $gender;
      if ((ACCOUNT_COMPANY == 'true')||($type_is['customers_type_register']=='J')) $sql_data_array['entry_company'] = $company;
	  if (ACCOUNT_COMPLEMENTO == 'true') $sql_data_array['entry_complemento'] = $complemento;
      if (ACCOUNT_SUBURB == 'true') $sql_data_array['entry_suburb'] = $suburb;
      if (ACCOUNT_STATE == 'true') {
        if ($zone_id > 0) {
          $sql_data_array['entry_zone_id'] = (int)$zone_id;
          $sql_data_array['entry_state'] = '';
        } else {
          $sql_data_array['entry_zone_id'] = '0';
          $sql_data_array['entry_state'] = $state;
        }
      }

      if ($HTTP_POST_VARS['action'] == 'update') {
        tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array, 'update', "address_book_id = '" . (int)$HTTP_GET_VARS['edit'] . "' and customers_id ='" . (int)$customer_id . "'");
		tep_db_perform(TABLE_CUSTOMERS, $sql_data_array2, 'update', "customers_id = '" . (int)$customer_id . "'");

// reregister session variables
        if ( (isset($HTTP_POST_VARS['primary']) && ($HTTP_POST_VARS['primary'] == 'on')) || ($HTTP_GET_VARS['edit'] == $customer_default_address_id) ) {
          $customer_first_name = $firstname;
          $customer_country_id = $country_id;
          $customer_zone_id = (($zone_id > 0) ? (int)$zone_id : '0');
          $customer_default_address_id = (int)$HTTP_GET_VARS['edit'];

          $sql_data_array = array('customers_firstname' => $firstname,
                                  'customers_lastname' => $lastname,
                                  'customers_default_address_id' => (int)$HTTP_GET_VARS['edit']);

          if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $gender;

          tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . (int)$customer_id . "'");
        }
      } else {
        $sql_data_array['customers_id'] = (int)$customer_id;
        tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);

        $new_address_book_id = tep_db_insert_id();

// reregister session variables
        if (isset($HTTP_POST_VARS['primary']) && ($HTTP_POST_VARS['primary'] == 'on')) {
          $customer_first_name = $firstname;
          $customer_country_id = $country_id;
          $customer_zone_id = (($zone_id > 0) ? (int)$zone_id : '0');
          if (isset($HTTP_POST_VARS['primary']) && ($HTTP_POST_VARS['primary'] == 'on')) $customer_default_address_id = $new_address_book_id;

          $sql_data_array = array('customers_firstname' => $firstname,
                                  'customers_lastname' => $lastname);

          if (ACCOUNT_GENDER == 'true') $sql_data_array['customers_gender'] = $gender;
          if (isset($HTTP_POST_VARS['primary']) && ($HTTP_POST_VARS['primary'] == 'on')) $sql_data_array['customers_default_address_id'] = $new_address_book_id;

          tep_db_perform(TABLE_CUSTOMERS, $sql_data_array, 'update', "customers_id = '" . (int)$customer_id . "'");
        }
      }

      $messageStack->add_session('addressbook', SUCCESS_ADDRESS_BOOK_ENTRY_UPDATED, 'success');

      tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
    }
  }

  if (isset($HTTP_GET_VARS['edit']) && is_numeric($HTTP_GET_VARS['edit'])) {
$entry_query = tep_db_query("select entry_gender, entry_company, entry_firstname, entry_lastname, entry_street_address, entry_street_number, entry_suburb, entry_complemento, entry_postcode, entry_city, entry_state, entry_zone_id, entry_country_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int)$customer_id . "' and address_book_id = '" . (int)$HTTP_GET_VARS['edit'] . "'");

    if (!tep_db_num_rows($entry_query)) {
      $messageStack->add_session('addressbook', ERROR_NONEXISTING_ADDRESS_BOOK_ENTRY);

      tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
    }

    $entry = tep_db_fetch_array($entry_query);
  } elseif (isset($HTTP_GET_VARS['delete']) && is_numeric($HTTP_GET_VARS['delete'])) {
    if ($HTTP_GET_VARS['delete'] == $customer_default_address_id) {
      $messageStack->add_session('addressbook', WARNING_PRIMARY_ADDRESS_DELETION, 'warning');

      tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
    } else {
      $check_query = tep_db_query("select count(*) as total from " . TABLE_ADDRESS_BOOK . " where address_book_id = '" . (int)$HTTP_GET_VARS['delete'] . "' and customers_id = '" . (int)$customer_id . "'");
      $check = tep_db_fetch_array($check_query);

      if ($check['total'] < 1) {
        $messageStack->add_session('addressbook', ERROR_NONEXISTING_ADDRESS_BOOK_ENTRY);

        tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
      }
    }
  } else {
    $entry = array();
  }

  if (!isset($HTTP_GET_VARS['delete']) && !isset($HTTP_GET_VARS['edit'])) {
    if (tep_count_customer_address_book_entries() >= MAX_ADDRESS_BOOK_ENTRIES) {
      $messageStack->add_session('addressbook', ERROR_ADDRESS_BOOK_FULL);

      tep_redirect(tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));
    }
  }

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_ACCOUNT, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2, tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL'));

  if (isset($HTTP_GET_VARS['edit']) && is_numeric($HTTP_GET_VARS['edit'])) {
    $breadcrumb->add(NAVBAR_TITLE_MODIFY_ENTRY, tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'edit=' . $HTTP_GET_VARS['edit'], 'SSL'));
  } elseif (isset($HTTP_GET_VARS['delete']) && is_numeric($HTTP_GET_VARS['delete'])) {
    $breadcrumb->add(NAVBAR_TITLE_DELETE_ENTRY, tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $HTTP_GET_VARS['delete'], 'SSL'));
  } else {
    $breadcrumb->add(NAVBAR_TITLE_ADD_ENTRY, tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, '', 'SSL'));
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php echo HTML_PARAMS; ?>>
<head>
<title><?php echo TITLE; ?></title>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<?php
  if (!isset($HTTP_GET_VARS['delete'])) {
    include('includes/form_check.js.php');
  }
?>
</head>
<body>
<div id="container">
  <div id="header"><?php require(DIR_WS_INCLUDES . 'header.php'); ?></div>
  <div id="mainContent">
	<div class="tituloCompra"><?php if (isset($HTTP_GET_VARS['edit'])) { echo HEADING_TITLE_MODIFY_ENTRY; } elseif (isset($HTTP_GET_VARS['delete'])) { echo HEADING_TITLE_DELETE_ENTRY; } else { echo HEADING_TITLE_ADD_ENTRY; } ?></div>
<!-- body //-->
<table border="0" width="99%" cellspacing="0" cellpadding="0">
  <tr>
<!-- body_text //-->
    <td width="100%" valign="top"><?php if($type_is['customers_type_register']=='F'){ if (!isset($HTTP_GET_VARS['delete'])) echo tep_draw_form('addressbook', tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, (isset($HTTP_GET_VARS['edit']) ? 'edit=' . $HTTP_GET_VARS['edit'] : ''), 'SSL'), 'post', 'onSubmit="return check_form(addressbook);"');}else if($type_is['customers_type_register']=='J'){if (!isset($HTTP_GET_VARS['delete'])) echo tep_draw_form('addressbook', tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, (isset($HTTP_GET_VARS['edit']) ? 'edit=' . $HTTP_GET_VARS['edit'] : ''), 'SSL'), 'post', 'onSubmit="return check_form2(addressbook);"');} ?>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  if ($messageStack->size('addressbook') > 0) {
?>
      <tr>
        <td><?php echo $messageStack->output('addressbook'); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
  }

  if (isset($HTTP_GET_VARS['delete'])) {
?>
      <tr>
        <td class="main"><b><?php echo DELETE_ADDRESS_TITLE; ?></b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox2">
          <tr class="infoBoxContents2">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td class="main" width="50%" valign="top"><?php echo DELETE_ADDRESS_DESCRIPTION; ?></td>
                <td align="right" width="50%" valign="top"><table border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="main" align="center" valign="top"><b><?php echo SELECTED_ADDRESS; ?></b><br><?php echo tep_image(DIR_WS_IMAGES . 'arrow_south_east.gif'); ?></td>
                    <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                    <td class="main" valign="top"><?php echo tep_address_label($customer_id, $HTTP_GET_VARS['delete'], true, ' ', '<br>'); ?></td>
                    <td><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox2">
          <tr class="infoBoxContents2">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td><?php echo '<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK_PROCESS, 'delete=' . $HTTP_GET_VARS['delete'] . '&action=deleteconfirm', 'SSL') . '">' . tep_image_button('button_delete.gif', IMAGE_BUTTON_DELETE) . '</a>'; ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
  } else {
?>
      <tr>
        <td><?php include(DIR_WS_MODULES . 'address_book_details.php'); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
    if (isset($HTTP_GET_VARS['edit']) && is_numeric($HTTP_GET_VARS['edit'])) {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox2">
          <tr class="infoBoxContents2">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td><?php echo '<a href="' . tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
                <td align="right"><?php echo tep_draw_hidden_field('action', 'update') . tep_draw_hidden_field('edit', $HTTP_GET_VARS['edit']) . tep_image_submit('button_update.gif', IMAGE_BUTTON_UPDATE); ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
    } else {
      if (sizeof($navigation->snapshot) > 0) {
        $back_link = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      } else {
        $back_link = tep_href_link(FILENAME_ADDRESS_BOOK, '', 'SSL');
      }
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox2">
          <tr class="infoBoxContents2">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td><?php echo '<a href="' . $back_link . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
                <td align="right"><?php echo tep_draw_hidden_field('action', 'process') . tep_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>

<?php
    }
  }
?>
    </table><?php if (!isset($HTTP_GET_VARS['delete'])) echo '</form>'; ?></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
<script type="text/javascript" src="includes/librays/jquery.maskedinput.js"></script>
<script type="text/javascript">
jQuery(function($){  
	$("#postcode").mask("99999-999"); 
});
</script>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>