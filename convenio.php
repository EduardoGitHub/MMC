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
  
      <img src="images/convenio_mudominhacasa.png" /><br /><br />
      
      <div class="pagestexto" style="text-align:justify; line-height:25px; font-size:16px">
      
Esta modalidade é ideal para quem quer fidelizar leitores e pode aumentar ainda mais o seu tráfego de visitas. Ao optar por este modelo, nós fornecemos ao administrador do blog/site um cupom de desconto personalizado para que o mesmo distribua o código de desconto com o nome do blog para seus leitores.<br /><br /> 

Esta parceria é muito benéfica para seus leitores e não implica em nenhum custo para você.<br /><br /> 

O cupom poderá ser publicado no seu site ou enviado por e-mail para seus leitores como um benefício ofertado à eles. A personalização do cupom, assim como a validação do mesmo, fica a cargo do Mudo Minha Casa. Você precisa, apenas, enviar-nos a logomarca e a identidade visual do seu blog para ter acesso ao brinde. Os cupons terão prazo de validade conforme estipulado ou definido por você na hora da solicitação do serviço.<br /><br />

A adesão ao convênio como modelo de parceria não implica e nem impede a participação do administrador do site em outras modalidades de publicidade e divulgação. 


      </div>
  </div>
  <br class="clearfloat" />
  <div id="footer"><?php require(DIR_WS_INCLUDES . 'footer.php'); ?></div>
</div>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>