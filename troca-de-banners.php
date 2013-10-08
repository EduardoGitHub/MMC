<?php
  require('includes/application_top.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html <?php echo HTML_PARAMS; ?>>
<head>
<?php
if ( file_exists(DIR_WS_INCLUDES . 'header_tags.php') ) {
  require(DIR_WS_INCLUDES . 'header_tags.php');
} else {
?>
  <meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
  <title><?php echo TITLE; ?></title>
<?php
}
?>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
</head>
<body>
<div id="header"><?php require(DIR_WS_INCLUDES . 'header.php'); ?></div>
<div id="container">
  <div id="mainContent" style="margin: 5px 0 0 0; padding:5px;">
  
      <img src="images/troca_de_banners.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
      E-MAIL APRESENTAÇÃO E PROPOSTA<br />
A troca de banner serve como ponte de acesso para o seu blog/site e para o blog do Mudo Minha Casa. É um sistema de ajuda mútua para aumentar a audiência de ambas as partes e funciona por tempo indeterminado. Funciona da mesma forma que a troca de links, com a diferença de que o banner é mais atrativo e será muito mais eficaz.<br /><br />


Ao optar por este tipo de parceria, você receberá um banner do Mudo Minha Casa e deverá enviar o banner de divulgação da sua página. Os tamanhos dos banners serão definidos assim que você manifestar, por aqui, o seu interesse e nos deixar as medidas de confecção do banner. Nosso banner no seu blog ou site terá as mesmas medidas de tamanho que o seu dentro da nossa publicação.<br /><br />


Este sistema de troca é excelente para atrair novos visitantes para seu site, uma vez que entre blogs não há concorrência e sim uma colaboração mútua entre ambos. Optando pela troca de banner você não está impedido de conhecer nossos outros modelos de parceria e aderir à eles..

      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>